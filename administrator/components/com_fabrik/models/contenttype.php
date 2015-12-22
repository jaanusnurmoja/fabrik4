<?php
/**
 * Fabrik Admin Content Type Model
 *
 * @package     Joomla.Administrator
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2015 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * @since       3.3.5
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

require_once 'fabmodeladmin.php';

// Tmp fix until https://issues.joomla.org/tracker/joomla-cms/7378 is merged
require JPATH_COMPONENT_ADMINISTRATOR . '/models/databaseimporter.php';
require JPATH_COMPONENT_ADMINISTRATOR . '/models/databaseexporter.php';
use Joomla\Utilities\ArrayHelper;
use \Joomla\Registry\Registry;

/**
 * Fabrik Admin Content Type Model
 *
 * @package     Joomla.Administrator
 * @subpackage  Fabrik
 * @since       3.3.5
 */
class FabrikAdminModelContentType extends FabModelAdmin
{
	/**
	 * Include paths for searching for Content type XML files
	 *
	 * @var    array
	 */
	private static $_contentTypeIncludePaths = array();

	/**
	 * Content type DOM document
	 *
	 * @var DOMDocument
	 */
	private $doc;

	/**
	 * Admin List model
	 *
	 * @var FabrikAdminModelList
	 */
	private $listModel;

	/**
	 * Plugin names that we can not use in a content type
	 *
	 * @var array
	 */
	private $invalidPlugins = array('cascadingdropdown');

	/**
	 * Plugin names that require an import/export of a database table.
	 *
	 * @var array
	 */
	private $pluginsWithTables = array('databasejoin');

	/**
	 * This site's view levels
	 *
	 * @var array
	 */
	private $viewLevels;

	/**
	 * This site's groups
	 *
	 * @var array
	 */
	private $groups;

	/**
	 * Array of created join ids
	 *
	 * @var array
	 */
	private $joinIds = array();

	/**
	 * Array of created element ids
	 *
	 * @var array
	 */
	private $elementIds = array();

	/**
	 * Exported tables
	 *
	 * @var array
	 */
	private static $exportedTables = array();

	/**
	 * Constructor.
	 *
	 * @param   array $config An optional associative array of configuration settings.
	 *
	 * @throws UnexpectedValueException
	 */
	public function __construct($config = array())
	{
		parent::__construct($config);
		$listModel = ArrayHelper::getValue($config, 'listModel', JModelLegacy::getInstance('List', 'FabrikAdminModel'));

		if (!is_a($listModel, 'FabrikAdminModelList'))
		{
			throw new UnexpectedValueException('Content Type Constructor requires an Admin List Model');
		}

		$this->listModel               = $listModel;
		$this->doc                     = new DOMDocument();
		$this->doc->preserveWhiteSpace = false;
		$this->doc->formatOutput       = true;
	}

	/**
	 * Method to get the select content type form.
	 *
	 * @param   array $data     Data for the form.
	 * @param   bool  $loadData True if the form is to load its own data (default case), false if not.
	 *
	 * @return  mixed  A JForm object on success, false on failure
	 *
	 * @since    3.3.5
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm('com_fabrik.content-type', 'content-type', array('control' => 'jform', 'load_data' => $loadData));

		if (empty($form))
		{
			return false;
		}

		return $form;
	}

	/**
	 * Load in a content type
	 *
	 * @param   string $name File name
	 *
	 * @throws UnexpectedValueException
	 *
	 * @return FabrikAdminModelContentType  Allows for chaining
	 */
	public function loadContentType($name)
	{
		if ((string) $name === '')
		{
			throw new UnexpectedValueException('no content type supplied');
		}
		$paths = self::addContentTypeIncludePath();
		$path  = JPath::find($paths, $name);

		if (!$path)
		{
			throw new UnexpectedValueException('Content type not found in paths');
		}

		$xml = file_get_contents($path);
		$this->doc->loadXML($xml);

		return $this;
	}

	/**
	 * Create groups & elements from loaded content type
	 *
	 * @return array  Created Group Ids
	 */
	public function createGroupsFromContentType()
	{
		if (!$this->doc)
		{
			throw new UnexpectedValueException('A content type must be loaded before groups can be created');
		}

		$groupIds   = array();
		$fields     = array();
		$xpath      = new DOMXpath($this->doc);
		$groups     = $xpath->query('/contenttype/group');
		$i          = 1;
		$groupMap   = array();
		$elementMap = array();

		foreach ($groups as $group)
		{
			$groupData = array();
			$groupData = $this->domNodeAttributesToArray($group, $groupData);

			$groupData['params'] = $this->nodeParams($group);
			$this->mapGroupACL($groupData);

			$isJoin   = ArrayHelper::getValue($groupData, 'is_join', false);
			$isRepeat = isset($groupData['params']->repeat_group_button) ? $groupData['params']->repeat_group_button : false;

			$groupId                    = $this->listModel->createLinkedGroup($groupData, $isJoin, $isRepeat);
			$groupMap[$groupData['id']] = $groupId;
			$elements                   = $xpath->query('/contenttype/group[' . $i . ']/element');

			foreach ($elements as $element)
			{
				$elementData = $this->domNodeAttributesToArray($element);
				$oldId       = $elementData['id'];
				unset($elementData['id']);
				$elementData['params']   = json_encode($this->nodeParams($element));
				$elementData['group_id'] = $groupId;
				$this->mapElementACL($elementData);
				$name               = (string) $element->getAttribute('name');
				$fields[$name]      = $this->listModel->makeElement($name, $elementData);
				$elementMap[$oldId] = $fields[$name]->element->id;
				$this->elementIds[] = $elementMap[$oldId];
			}

			$groupIds[] = $groupId;
			$i++;
		}

		$this->mapElementIdParams($elementMap);
		$this->importTables();
		$this->importJoins($groupMap, $elementMap);

		return $fields;
	}

	/**
	 * Map any changes in element ACL parameters
	 *
	 * @param   &$data  Element Data
	 */
	private function mapElementACL(&$data)
	{
		$map            = $this->app->input->get('aclMap', array(), 'array');
		$params         = array('edit_access', 'view_access', 'list_view_access', 'filter_access', 'sum_access', 'avg_access',
			'median_access', 'count_access', 'custom_calc_access');
		$data['access'] = ArrayHelper::getValue($map, $data['access']);
		$origParams     = json_decode($data['params']);

		foreach ($params as $param)
		{
			if (isset($origParams->$param) && array_key_exists($origParams->$param, $map))
			{
				$origParams->$param = $map[$origParams->$param];
			}
		}

		$data['params'] = json_encode($origParams);
	}

	/**
	 * Map any ACL changes in group params
	 *
	 * @param   &$data
	 */
	private function mapGroupACL(&$data)
	{
		$map        = $this->app->input->get('aclMap', array(), 'array');
		$params     = array('access', 'repeat_add_access', 'repeat_delete_access');
		$origParams = $data['params'];

		foreach ($params as $param)
		{
			if (isset($origParams->$param) && array_key_exists($origParams->$param, $map))
			{
				$origParams->$param = $map[$origParams->$param];
			}
		}

	}

	/**
	 * Element's can have parameters which point to a specific element ID. We need to update those parameters
	 * to use the cloned element's ID
	 *
	 * @param   array $elementMap
	 *
	 * @return bool  True if all elements successfully saved
	 */
	private function mapElementIdParams($elementMap)
	{
		$return        = true;
		$formModel     = $this->listModel->getFormModel();
		$pluginManager = FabrikWorker::getPluginManager();

		foreach ($elementMap as $origId => $newId)
		{
			// The XML Dom object describing the element's plugin properties
			$pluginManifest = $pluginManager->getPluginFromId($newId)->getPluginForm()->getXml();

			// Get all listfield parameters where the value format property is no 'tableelement'
			$listFields = $pluginManifest->xpath('//field[@type=\'listfields\'][(@valueformat=\'tableelement\') != true()]');
			$paramNames = array();

			foreach ($listFields as $listField)
			{
				if ((string) $listField->attributes()->valueformat !== '')
				{
					$paramNames[] = (string) $listField->attributes()->name;
				}
			}

			if (!empty($paramNames))
			{
				$elementModel  = $formModel->getElement($newId, true);
				$element       = $elementModel->getElement();
				$elementParams = new Registry($element->params);

				foreach ($paramNames as $paramName)
				{
					$orig = $elementParams->get($paramName, null);

					if (!is_null($orig))
					{
						$elementParams->set($paramName, $elementMap[$orig]);
					}
				}

				$element->set('params', (string) $elementParams);
				$return = $return && $element->store();
			}
		}

		return $return;
	}

	/**
	 * Import any database table's defined in the XML's files '/contenttype/database/table_structure section
	 * These are table's needed for database join element's to work.
	 */
	private function importTables()
	{
		$xpath  = new DOMXpath($this->doc);
		$tables = $xpath->query('/contenttype/database/table_structure');
		// $importer = $this->db->getImporter();

		// Tmp fix until https://issues.joomla.org/tracker/joomla-cms/7378 is merged
		$importer = new JDatabaseImporterMysqli2;
		$importer->setDbo($this->db);

		foreach ($tables as $table)
		{
			$xmlDoc     = new DOMDocument;
			$database   = $xmlDoc->createElement('database');
			$root       = $xmlDoc->createElement('root');
			$tableClone = $xmlDoc->importNode($table, true);
			$database->appendChild($tableClone);
			$root->appendChild($database);
			$xml = simplexml_import_dom($root);

			try
			{
				$importer->from($xml)->mergeStructure();
			} catch (Exception $e)
			{
				echo "error: " . $e->getMessage();
			}

		}
	}

	/**
	 * Import any group join entries from in /contenttypes/group/join,
	 * and element join entries from /contenttypes/element/join
	 * For group joins, the list id is not available. The join is thus finalised in
	 * finaliseImport()
	 *
	 * @param   array $groupMap   array(oldGroupId => newGroupId)
	 * @param   array $elementMap array(oldElementId => newElementId)
	 *
	 * @return  void
	 */
	private function importJoins($groupMap, $elementMap)
	{
		$xpath    = new DOMXpath($this->doc);
		$joins    = $xpath->query('/contenttype/group[join]/join');
		$elements = $xpath->query('/contenttype/group/element[join]/join');

		foreach ($joins as $join)
		{
			$newGroupId = $groupMap[(string) $join->getAttribute('group_id')];
			$join->setAttribute('group_id', $newGroupId);
			$joinData           = $this->domNodeAttributesToArray($join);
			$joinData['params'] = json_encode($this->nodeParams($join));
			unset($joinData['list_id']);
			$joinTable = FabTable::getInstance('Join', 'FabrikTable');
			$joinTable->save($joinData);
			$this->joinIds[] = $joinTable->get('id');
		}

		foreach ($elements as $join)
		{
			$oldElementId = (string) $join->getAttribute('element_id');
			$newId        = $elementMap[$oldElementId];
			$newGroupId   = $groupMap[(string) $join->getAttribute('group_id')];
			$join->setAttribute('group_id', $newGroupId);
			$join->setAttribute('element_id', $newId);
			$joinData           = $this->domNodeAttributesToArray($join);
			$joinData['params'] = json_encode($this->nodeParams($join));
			$joinTable          = FabTable::getInstance('Join', 'FabrikTable');
			$joinTable->save($joinData);
			$this->joinIds[] = $joinTable->get('id');
		}
	}

	/**
	 * Get the source table name, defined in XML file.
	 *
	 * @return string
	 */
	private function getSourceTableName()
	{
		$xpath  = new DOMXpath($this->doc);
		$source = $xpath->query('/contenttype/database/source');
		$source = iterator_to_array($source);

		return (string) $source[0]->nodeValue;
	}

	/**
	 * Called at the end of a list save.
	 * Update the created joins with the created list's id and db_table_name
	 *
	 * @param   FabrikTableList $row List data
	 *
	 * @return  void
	 */
	public function finaliseImport($row)
	{
		$source      = $this->getSourceTableName();
		$targetTable = $row->get('db_table_name');

		foreach ($this->joinIds as $joinId)
		{
			$joinTable = FabTable::getInstance('Join', 'FabrikTable');
			$joinTable->load($joinId);

			if ((int) $joinTable->get('element_id') === 0)
			{
				// Group join
				$joinTable->set('list_id', $row->get('id'));
				$joinTable->set('join_from_table', $targetTable);
			}
			else
			{
				// Element join
				$tableLookUps = array('join_from_table', 'table_join', 'table_join_alias');

				foreach ($tableLookUps as $tableLookup)
				{
					if ($joinTable->get($tableLookup) === $source)
					{
						$joinTable->set($tableLookup, $targetTable);
					}
				}
			}

			$joinTable->store();
			echo "<pre>";
			print_r($joinTable);

		}

		// Update element params with source => target table name conversion
		foreach ($this->elementIds as $elementId)
		{
			/** @var FabrikTableElement $element */
			$element = FabTable::getInstance('Element', 'FabrikTable');
			$element->load($elementId);
			$elementParams = new Registry($element->params);

			if ($elementParams->get('join_db_name') === $source)
			{
				$elementParams->set('join_db_name', $targetTable);
				$element->set('params', $elementParams->toString());
				$element->store();
			}
		}
	}

	/**
	 * Create a params object based on a XML dom node.
	 *
	 * @param   DOMElement $node
	 *
	 * @return stdClass
	 */
	private function nodeParams($node)
	{
		$params = $node->getElementsByTagName('params');
		$return = new stdClass;
		$i      = 0;

		foreach ($params as $param)
		{
			// Avoid nested descendants when asking for group params
			if ($i > 0)
			{
				continue;
			}

			$i++;
			if ($param->hasAttributes())
			{
				foreach ($param->attributes as $attr)
				{
					$name  = $attr->nodeName;
					$value = (string) $attr->nodeValue;

					if (FabrikWorker::isJSON($value))
					{
						$value = json_decode($value);
					}

					$return->$name = $value;
				}
			}
		}

		return $return;
	}

	/**
	 * Convert a DOM node's properties into an array
	 *
	 * @param   DOMElement $node
	 * @param   array      $data
	 *
	 * @return array
	 */
	private function domNodeAttributesToArray($node, $data = array())
	{
		if ($node->hasAttributes())
		{
			foreach ($node->attributes as $attr)
			{
				$data[$attr->nodeName] = $attr->nodeValue;
			}
		}

		return $data;
	}

	/**
	 * Add a filesystem path where content type XML files should be searched for.
	 * You may either pass a string or an array of paths.
	 *
	 * @param   mixed $path A filesystem path or array of filesystem paths to add.
	 *
	 * @return  array  An array of filesystem paths to find Content type XML files.
	 */
	public static function addContentTypeIncludePath($path = null)
	{
		// If the internal paths have not been initialised, do so with the base table path.
		if (empty(self::$_contentTypeIncludePaths))
		{
			self::$_contentTypeIncludePaths = JPATH_COMPONENT_ADMINISTRATOR . '/models/content_types';
		}

		// Convert the passed path(s) to add to an array.
		settype($path, 'array');

		// If we have new paths to add, do so.
		if (!empty($path))
		{
			// Check and add each individual new path.
			foreach ($path as $dir)
			{
				// Sanitize path.
				$dir = trim($dir);

				// Add to the front of the list so that custom paths are searched first.
				if (!in_array($dir, self::$_contentTypeIncludePaths))
				{
					array_unshift(self::$_contentTypeIncludePaths, $dir);
				}
			}
		}

		return self::$_contentTypeIncludePaths;
	}

	/**
	 * Prepare the group and element models for form view preview
	 *
	 * @return array
	 */
	public function preview()
	{
		$pluginManager = FabrikWorker::getPluginManager();
		$xpath         = new DOMXpath($this->doc);
		$groups        = $xpath->query('/contenttype/group');
		$return        = array();
		$i             = 1;

		foreach ($groups as $group)
		{
			$groupData           = array();
			$groupData           = $this->domNodeAttributesToArray($group, $groupData);
			$groupData['params'] = $this->nodeParams($group);
			$groupModel          = JModelLegacy::getInstance('Group', 'FabrikFEModel');
			$groupTable          = FabTable::getInstance('Group', 'FabrikTable');
			$groupTable->bind($groupData);
			$groupModel->setGroup($groupTable);

			$elements      = $xpath->query('/contenttype/group[' . $i . ']/element');
			$elementModels = array();

			foreach ($elements as $element)
			{
				$elementData            = $this->domNodeAttributesToArray($element);
				$elementData['params']  = $this->nodeParams($element);
				$elementModel           = clone($pluginManager->getPlugIn($elementData['plugin'], 'element'));
				$elementModel->element  = $elementModel->getDefaultProperties($elementData);
				$elementModel->editable = true;
				$elementModels[]        = $elementModel;
			}

			$groupModel->elements = $elementModels;
			$return[]             = $groupModel;
			$i++;
		}

		return $return;
	}

	/**
	 * Get default insert fields - either from content type or defaultfields input value
	 *
	 * @param string|null $contentType
	 *
	 * @return array
	 */
	public function getDefaultInsertFields($contentType = null)
	{
		$input = $this->app->input;

		if (!empty($contentType))
		{
			$fields = $this->loadContentType($contentType)
				->createGroupsFromContentType();
		}
		else
		{
			// Could be importing from a CSV in which case default fields are set.
			$fields = $input->get('defaultfields', array('id' => 'internalid', 'date_time' => 'date'), 'array');
		}

		return $fields;
	}

	/**
	 * Pre-installation check
	 *
	 * Ensure that before creating a list/form from a content type, that all
	 * elements are installed and published
	 *
	 * @param   string $contentType
	 *
	 * @throws UnexpectedValueException
	 *
	 * @return bool
	 */
	public function check($contentType)
	{
		$this->loadContentType($contentType);
		$xpath    = new DOMXpath($this->doc);
		$elements = $xpath->query('/contenttype/group/element');
		$db       = $this->db;
		$query    = $db->getQuery(true);
		$query->select('element')->from('#__extensions')
			->where('folder =' . $db->q('fabrik_element'))
			->where('enabled = 1');
		$db->setQuery($query);
		$allowed = $db->loadColumn();

		foreach ($elements as $element)
		{
			$pluginName = $element->getAttribute('plugin');

			if (!in_array($pluginName, $allowed))
			{
				throw new UnexpectedValueException($pluginName . ' not installed or published');
			}
		}

		return true;
	}

	/**
	 * Initialise the table XML section.
	 * Add the source list name. Needed on import for mapping join table info from
	 * source main table to target main table
	 *
	 * @return DOMElement
	 */
	private function iniTableXML()
	{
		$tables    = $this->doc->createElement('database');
		$mainTable = $this->listModel->getTable()->get('db_table_name');
		$source    = $this->doc->createElement('source', $mainTable);
		$tables->appendChild($source);

		return $tables;
	}

	/**
	 * Create the content type
	 * Save it to /administrator/components/com_fabrik/models/content_types
	 * Update form model with content type path
	 *
	 * @param   FabrikFEModelForm $formModel
	 *
	 * @return  bool
	 */
	public function create($formModel)
	{
		// We don't want to export the main table, as a new one is created when importing the content type
		$this->listModel = $formModel->getListModel();
		$mainTable       = $this->listModel->getTable()->get('db_table_name');
		$tableParams     = array('table_join', 'join_from_table');
		$contentType     = $this->doc->createElement('contenttype');
		$tables          = $this->iniTableXML();

		$label = JFile::makeSafe($formModel->getForm()->get('label'));
		$name  = $this->doc->createElement('name', $label);
		$contentType->appendChild($name);
		$groups = $formModel->getGroupsHiarachy();

		foreach ($groups as $groupModel)
		{
			$groupData = $groupModel->getGroup()->getProperties();

			$group         = $this->buildExportNode('group', $groupData);
			$elementModels = $groupModel->getMyElements();

			if ($groupData['is_join'] === '1')
			{
				$join = FabTable::getInstance('Join', 'FabrikTable');
				$join->load($groupData['join_id']);

				foreach ($tableParams as $tableParam)
				{
					if ($join->get($tableParam) !== $mainTable)
					{
						$this->createTableXML($tables, $join->get($tableParam));
					}
				}

				$groupJoin = $this->buildExportNode('join', $join->getProperties(), array('id'));
				$group->appendChild($groupJoin);
			}

			foreach ($elementModels as $elementModel)
			{
				$elementData = $elementModel->getElement()->getProperties();

				if (in_array($elementData['plugin'], $this->invalidPlugins))
				{
					throw new UnexpectedValueException('Sorry we can not create content types with ' .
						$elementData['plugin'] . ' element plugins');
				}

				if (in_array($elementData['plugin'], $this->pluginsWithTables))
				{
					$elementParams = new Registry($elementData['params']);

					if ($elementParams->get('join_db_name') !== $mainTable)
					{
						$this->createTableXML($tables, $elementParams->get('join_db_name'));
					}
				};

				$element = $this->buildExportNode('element', $elementData);

				if (is_a($elementModel, 'PlgFabrik_ElementDatabasejoin'))
				{
					$join = FabTable::getInstance('Join', 'FabrikTable');
					$join->load(array('element_id' => $elementData['id']));
					$elementJoin = $this->buildExportNode('join', $join->getProperties(), array('id'));
					$element->appendChild($elementJoin);
				}

				$group->appendChild($element);
			}

			$contentType->appendChild($group);
		}

		$contentType->appendChild($tables);
		$contentType->appendChild($this->createViewLevelXML());
		$contentType->appendChild($this->createGroupXML());
		$this->doc->appendChild($contentType);
		$xml  = $this->doc->saveXML();
		$path = JPATH_COMPONENT_ADMINISTRATOR . '/models/content_types/' . $label . '.xml';

		if (JFile::write($path, $xml))
		{
			$form   = $formModel->getForm();
			$params = $formModel->getParams();
			$params->set('content_type_path', $path);
			$form->params = $params->toString();

			return $form->save($form->getProperties());
		}

		return false;
	}

	/**
	 * Create XML for table import
	 *
	 * @param   DOMElement $tables    Parent node to attach xml to
	 * @param   string     $tableName Table name to export
	 *
	 * @throws Exception
	 */
	private function createTableXML(&$tables, $tableName)
	{
		if (in_array($tableName, self::$exportedTables))
		{
			return;
		}

		self::$exportedTables[] = $tableName;
		//$exporter    = $this->db->getExporter();
		$exporter = new JDatabaseExporterMysqli2;
		$exporter->setDbo($this->db);
		$exporter->from($tableName);
		$tableDoc = new DOMDocument();
		$tableDoc->loadXML((string) $exporter);
		$structures = $tableDoc->getElementsByTagName('table_structure');

		foreach ($structures as $table)
		{
			$table = $this->doc->importNode($table, true);
			$tables->appendChild($table);
		}
	}

	/**
	 * Create the view levels ACL info
	 *
	 * @return DOMElement
	 */
	private function createViewLevelXML()
	{
		$rows       = $this->getViewLevels();
		$viewLevels = $this->doc->createElement('viewlevels');

		foreach ($rows as $row)
		{
			$viewLevel = $this->buildExportNode('viewlevel', $row);
			$viewLevels->appendChild($viewLevel);
		}

		return $viewLevels;
	}

	/**
	 * Create the group ACL info
	 *
	 * @return DOMElement
	 */
	private function createGroupXML()
	{
		$rows   = $this->getGroups();
		$groups = $this->doc->createElement('groups');

		foreach ($rows as $row)
		{
			$group = $this->doc->createElement('group');

			foreach ($row as $key => $value)
			{
				$group->setAttribute($key, $value);
			}
			$groups->appendChild($group);
		}

		return $groups;
	}

	/**
	 * Get the site's view levels
	 *
	 * @return array|mixed
	 */
	private function getViewLevels()
	{
		if (isset($this->viewLevels))
		{
			return $this->viewLevels;
		}

		$query = $this->db->getQuery(true);
		$query->select('*')->from('#__viewlevels');
		$this->viewLevels = $this->db->setQuery($query)->loadAssocList();

		return $this->viewLevels;
	}

	private function getGroups()
	{
		if (isset($this->groups))
		{
			return $this->groups;
		}

		$query = $this->db->getQuery(true);
		$query->select('*')->from('#__usergroups');
		$this->groups = $this->db->setQuery($query)->loadAssocList('id');

		return $this->groups;
	}

	/**
	 * Ensure that the content type's view level XML matches the site's view levels
	 *
	 * @throws Exception
	 *
	 * @return bool
	 */
	private function validateViewLevelXML()
	{
		$rows       = $this->getViewLevels();
		$xpath      = new DOMXpath($this->doc);
		$viewLevels = $xpath->query('/contenttype/viewlevels/viewlevel');

		if (count($rows) !== $viewLevels->length)
		{
			throw new Exception('Content type: View levels mismatch');
		}

		$i = 0;

		foreach ($viewLevels as $viewLevel)
		{
			$id = (int) $viewLevel->getAttribute('id');

			if (!($id === (int) $rows[$i]['id'] &&
				(string) $viewLevel->getAttribute('rules') === $rows[$i]['rules'])
			)
			{
				throw new Exception('Content type: view level data for ' . $id . ' not the same as server info');
			}

			$i++;
		}

		return false;
	}

	/**
	 * Create an export node presuming that the array has a params property which should be split into a child
	 * node
	 *
	 * @param   string $nodeName
	 * @param   array  $data
	 * @param   array  $ignore Array of keys to ignore when creating attributes
	 *
	 * @return DOMElement
	 */
	private function buildExportNode($nodeName, $data,
		$ignore = array('created_by', 'created_by_alias', 'group_id', 'modified', 'modified_by',
			'checked_out', 'checked_out_time'))
	{
		$node = $this->doc->createElement($nodeName);

		foreach ($data as $key => $value)
		{
			if (in_array($key, $ignore))
			{
				continue;
			}

			// Ensure elements are never listed as children.
			if ($key === 'parent_id')
			{
				$value = '0';
			}

			if ($key === 'params')
			{
				$params = json_decode($value);
				$p      = $this->doc->createElement('params');

				foreach ($params as $pKey => $pValue)
				{
					if (in_array($pKey, $ignore))
					{
						continue;
					}

					if (is_string($pValue) || is_numeric($pValue))
					{
						$p->setAttribute($pKey, $pValue);
					}
					else
					{
						$p->setAttribute($pKey, json_encode($pValue));
					}
				}

				$node->appendChild($p);
			}
			else
			{
				$node->setAttribute($key, $value);
			}
		}

		return $node;
	}

	/**
	 * Download the content type
	 *
	 * @param   FabrikFEModelForm $formModel
	 *
	 * @throws Exception
	 */
	public function download($formModel)
	{
		$params  = $formModel->getParams();
		$file    = $params->get('content_type_path');
		$label   = 'content-type-' . $formModel->getForm()->get('label');
		$label   = JFile::makeSafe($label);
		$zip     = new ZipArchive;
		$zipFile = $this->config->get('tmp_path') . '/' . $label . '.zip';
		$zipRes  = $zip->open($zipFile, ZipArchive::CREATE);

		if (!$zipRes)
		{
			throw new Exception('unable to create ZIP');
		}

		if (!JFile::exists($file))
		{
			throw new Exception('Content type file not found');
		}

		if (!$zip->addFile($file, basename($file)))
		{
			throw new Exception('unable to add file ' . $file . ' to zip');
		}

		$zip->close();
		header('Content-Type: application/zip');
		header('Content-Length: ' . filesize($zipFile));
		header('Content-Disposition: attachment; filename="' . basename($zipFile) . '"');
		echo file_get_contents($zipFile);

		// Must exit to produce valid Zip download
		exit;
	}

	/**
	 * Attempt to compare exported ACL setting with the site's existing ACL setting
	 *
	 * @return string
	 */
	public function aclCheckUI()
	{
		$xpath            = new DOMXpath($this->doc);
		$parent           = $xpath->query('/contenttype');
		$importViewLevels = $xpath->query('/contenttype/viewlevels/viewlevel');
		$importGroups     = $xpath->query('/contenttype/groups/group');

		$contentTypeViewLevels = array();
		$contentTypeGroups     = array();
		$alteredGroups         = array();

		foreach ($importGroups as $importGroup)
		{
			$group                           = $this->domNodeAttributesToArray($importGroup);
			$contentTypeGroups[$group['id']] = $group;
		}

		foreach ($importViewLevels as $importViewLevel)
		{
			$viewLevel = $this->domNodeAttributesToArray($importViewLevel);
			$rules     = json_decode($viewLevel['rules']);
			foreach ($rules as &$rule)
			{
				$rule = array_key_exists($rule, $contentTypeGroups) ? $contentTypeGroups[$rule]['title'] : $rule;
			}
			$viewLevel['rules_labels'] = implode(', ', $rules);
			$contentTypeViewLevels[]   = $viewLevel;
		}

		$viewLevels = $this->getViewLevels();
		$groups     = $this->getGroups();

		foreach ($viewLevels as &$viewLevel)
		{
			$rules = json_decode($viewLevel['rules']);

			foreach ($rules as &$rule)
			{
				$rule = array_key_exists($rule, $groups) ? $groups[$rule]['title'] : $rule;
			}

			$viewLevel['rules_labels'] = implode(', ', $rules);
		}

		foreach ($groups as $group)
		{
			if (array_key_exists($group['id'], $contentTypeGroups))
			{
				$importGroup = $contentTypeGroups[$group['id']];

				if ($group['lft'] !== $importGroup['lft'] || $group['rgt'] !== $importGroup['rgt'] || $group['parent_id'] !== $importGroup['parent_id'])
				{
					$alteredGroups[] = $group;
				}
			}
		}

		$layoutData = (object) array(
			'viewLevels' => $viewLevels,
			'contentTypeViewLevels' => $contentTypeViewLevels,
			'match' => true,
			'groups' => $groups,
			'importGroups' => $contentTypeGroups,
			'alteredGroups' => $alteredGroups
		);
		try
		{
			$this->validateViewLevelXML();
		} catch (Exception $e)
		{
			$layoutData->match = false;
		}

		if ($parent[0]->getAttribute('ignoreacl') === 'true')
		{
			$layoutData->match = true;
		}

		$layout = FabrikHelperHTML::getLayout('fabrik-content-type-compare');

		return $layout->render($layoutData);
	}
}
