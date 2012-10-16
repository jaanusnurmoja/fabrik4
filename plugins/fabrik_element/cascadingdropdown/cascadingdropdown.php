<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.element.cascadingdropdown
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

require_once JPATH_SITE . '/plugins/fabrik_element/databasejoin/databasejoin.php';

/**
 * Plugin element to render cascading dropdown
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.element.cascadingdropdown
 * @since       3.0
 */

class plgFabrik_ElementCascadingdropdown extends plgFabrik_ElementDatabasejoin
{

	/**
	 * Returns javascript which creates an instance of the class defined in formJavascriptClass()
	 *
	 * @param   int  $repeatCounter  repeat group counter
	 *
	 * @return  string
	 */

	public function elementJavascript($repeatCounter)
	{
		$app = JFactory::getApplication();
		$input = $app->input;
		$id = $this->getHTMLId($repeatCounter);
		$params = $this->getParams();
		if ($params->get('cdd_display_type') == 'auto-complete')
		{
			FabrikHelperHTML::autoComplete($id, $this->getElement()->id, 'fabrikcascadingdropdown');
		}
		FabrikHelperHTML::script('media/com_fabrik/js/lib/Event.mock.js');
		$opts = $this->getElementJSOptions($repeatCounter);
		$opts->showPleaseSelect = $this->showPleaseSelect();
		$opts->watch = $this->_getWatchId($repeatCounter);
		$opts->id = $this->_id;

		// This bizarre chunk of code handles the case of setting a CDD value on the QS on a new form
		$rowid = $input->getInt('rowid', 0);
		$fullName = $this->getFullName(false, true, true);
		$watchName = $this->getWatchFullName();
		$qsValue = $input->get($fullName, '');
		$qsWatchValue = $input->get($watchName, '');
		$opts->def = $this->isEditable() && $rowid == 0 && !empty($qsValue) && !empty($qsWatchValue) ? $qsValue : $this->getValue(array(), $repeatCounter);

		$watchGroup = $this->getWatchElement()->getGroup()->getGroup();
		$group = $this->getGroup()->getGroup();
		$opts->watchInSameGroup = $watchGroup->id === $group->id;
		$opts->editing = ($this->isEditable() && JRequest::getInt('rowid', 0) != 0);
		$opts->showDesc = $params->get('cdd_desc_column', '') === '' ? false : true;
		$opts = json_encode($opts);
		return "new FbCascadingdropdown('$id', $opts)";
	}

	/**
	 * Get the field name to use as the column that contains the join's label data
	 *
	 * @param   bool  $useStep  use step in element name
	 *
	 * @return	string join label column either returns concat statement or quotes `tablename`.`elementname`
	 */

	public function getJoinLabelColumn($useStep = false)
	{
		$params = $this->getParams();
		$join = $this->getJoin();
		$db = $this->getDb();
		if (($params->get('cascadingdropdown_label_concat') != '') && JRequest::getVar('overide_join_val_column_concat') != 1)
		{
			$val = str_replace("{thistable}", $join->table_join_alias, $params->get('cascadingdropdown_label_concat'));
			return 'CONCAT(' . $val . ')';
		}
		$label = FabrikString::shortColName($join->_params->get('join-label'));
		if ($label == '')
		{
			JError::raiseWarning(500, 'Could not find the join label for ' . $this->getElement()->name . ' try unlinking and saving it');
			$label = $this->getElement()->name;
		}
		$joinTableName = $join->table_join_alias;
		return $useStep ? $joinTableName . '___' . $label : $db->quoteName($joinTableName) . '.' . $db->quoteName($label);
	}

	/**
	 * Reset cached data, needed when rendering table if CDD
	 * is in repeat group, so we can build optionVals
	 *
	 * @deprecated - not used
	 *
	 * @return  void
	 */

	protected function _resetCache()
	{
		unset($this->_optionVals);
		unset($this->_sql);
	}

	/**
	 * Draws the html form element
	 *
	 * @param   array  $data           to preopulate element with
	 * @param   int    $repeatCounter  repeat group counter
	 *
	 * @return  string	elements html
	 */

	public function render($data, $repeatCounter = 0)
	{
		$app = JFactory::getApplication();
		$input = $app->input;
		$db = $this->getDb();
		$params = $this->getParams();
		$element = $this->getElement();
		$name = $this->getHTMLName($repeatCounter);
		$default = (array) $this->getValue($data, $repeatCounter);

		/* $$$ rob don't bother getting the options if editable as the js event is going to get them.
		 * However if in readonly mode the we do need to get the options
		 * $$$ hugh - need to rethink this approach, see ticket #725. When editing, we need
		 * to build options and selection on server side, otherwise daisy chained CDD's don't
		 * work due to timing issues in JS between onComplete and get_options calls.
		 * $tmp = 	$this->isEditable() ? array() : $this->_getOptions($data);
		 * So ... we want to get options if not editable, or if editing an existing row.
		 * See also small change to attachedToForm() in JS, and new 'editing' option in
		 * elementJavascript() above, so the JS won't get options on init when editing an existing row
		 */
		$tmp = array();
		$rowid = JRequest::getInt('rowid', 0);
		$show_please = $this->showPleaseSelect();
		if (!$this->isEditable() || ($this->isEditable() && $rowid != 0))
		{
			$tmp = $this->_getOptions($data, $repeatCounter);
		}
		else
		{
			if ($show_please)
			{
				$tmp[] = JHTML::_('select.option', '', $this->_getSelectLabel());
			}
		}
		$imageOpts = array('alt' => JText::_('PLG_ELEMENT_CALC_LOADING'), 'style' => 'display:none;padding-left:10px;', 'class' => 'loader');
		$this->loadingImg = FabrikHelperHTML::image("ajax-loader.gif", 'form', @$this->tmpl, $imageOpts);

		// Get the default label for the drop down (use in read only templates)
		$defaultLabel = '';
		$defaultValue = '';
		foreach ($tmp as $obj)
		{
			if (in_array($obj->value, $default))
			{
				$defaultValue = $obj->value;
				$defaultLabel = $obj->text;
				break;
			}
		}
		$id = $this->getHTMLId($repeatCounter);
		$class = "fabrikinput inputbox";
		if (count($tmp) == 1)
		{
			$class .= " readonly";
			$disabled = 'readonly="readonly"';
		}
		else
		{
			$disabled = '';
		}

		$w = new FabrikWorker;
		foreach ($default as &$d)
		{
			$d = $w->parseMessageForPlaceHolder($d);
		}
		// Not yet implemented always going to use dropdown for now
		$displayType = $params->get('cdd_display_type', 'dropdown');
		$str = array();
		if ($this->canUse())
		{
			// $$$ rob display type not set up in parameters as not had time to test fully yet

			/*		<param name="cdd_display_type" type="list" default="dropdown" label="RENDERJOIN" description="RENDERJOINDESC">
			 <option value="dropdown">Drop down list</option>
			<option value="radio">Radio Buttons</option>
			<option value="auto-complete">Auto-complete</option>
			</param>
			 */

			switch ($displayType)
			{
				/*case 'auto-complete':
				    $str .= "<input type=\"text\" size=\"20\" name=\"{$name}-auto-complete\" id=\"{$id}-auto-complete\"
				    value=\"$defaultLabel\" class=\"fabrikinput inputbox autocomplete-trigger\"/>";
				$str .= "<input type=\"hidden\" size=\"20\" name=\"{$name}\" id=\"{$id}\" value=\"$default\"/>";
				break;
				break;
				case 'radio':
				$str .= "<div class='fabrikSubElementContainer' id='$id'>";
				$str .= FabrikHelperHTML::radioList($tmp, $name, 'class="'.$class.'" '.$disabled.' id="'.$id.'"', $default, 'value', 'text');
				$str .= " <img src=\''.COM_FABRIK_LIVESITE."media/com_fabrik/images/ajax-loader.gif\" class=\"loader\" alt=\''.JText::_('Loading')
				."\" style=\"display:none;padding-left:10px;\" />";
				break;*/
				default:
				case 'dropdown':
					$attribs = 'class="' . $class . '" ' . $disabled . ' size="1"';
					$str[] = JHTML::_('select.genericlist', $tmp, $name, $attribs, 'value', 'text', $default, $id);
					break;
			}
			$str[] = $this->loadingImg;
			$str[] = ($displayType == "radio") ? "</div>" : '';
		}

		if (!$this->isEditable())
		{
			if ($params->get('cascadingdropdown_readonly_link') == 1)
			{
				$listid = (int) $params->get('cascadingdropdown_table');
				if ($listid !== 0)
				{
					$query = $db->getQuery(true);
					$query->select('form_id')->from(' #__{package}_lists')->where('id = ' . $listid);
					$db->setQuery($query);
					$popupformid = $db->loadResult();
					$url = 'index.php?option=com_fabrik&view=details&formid=' . $popupformid . '&listid=' . $listid . '&rowid=' . $defaultValue;
					$defaultLabel = '<a href="' . JRoute::_($url) . '">' . $defaultLabel . '</a>';
				}
			}
			return $defaultLabel . $this->loadingImg;
		}

		if ($params->get('cdd_desc_column', '') !== '')
		{
			$str[] = '<div class="dbjoin-description">';
			for ($i = 0; $i < count($this->_optionVals); $i++)
			{
				$opt = $this->_optionVals[$i];
				$display = in_array($opt->value, $default) ? '' : 'none';
				$c = $i + 1;
				$str[] = '<div style="display:' . $display . '" class="notice description-' . $c . '">' . $opt->description . '</div>';
			}
			$str[] = '</div>';
		}
		return implode("\n", $str);
	}

	/**
	 * Get a list of the HTML options used in the database join drop down / radio buttons
	 *
	 * @param   array  $data           from current record (when editing form?)
	 * @param   int    $repeatCounter  repeat group counter
	 * @param   bool   $incWhere       do we include custom where in query
	 *
	 * @return  array	option objects
	 */

	protected function _getOptions($data = array(), $repeatCounter = 0, $incWhere = true)
	{
		$this->joinDb = $this->getDb();
		$tmp = $this->_getOptionVals($data, $repeatCounter);
		return $tmp;
	}

	/**
	 * Gets the options for the drop down - used in package when forms update
	 *
	 * @return  void
	 */

	public function onAjax_getOptions()
	{
		$this->loadMeForAjax();
		$params = $this->getParams();

		// $$$ rob commented out for http://fabrikar.com/forums/showthread.php?t=11224
		// must have been a reason why it was there though?

		// OK its due to table filters so lets test if we are in the table view (posted from filter.js)
		if (JRequest::getVar('filterview') == 'table')
		{
			$params->set('cascadingdropdown_showpleaseselect', true);
		}
		$this->_table = $this->_form->getlistModel();
		$data = JRequest::get('post');
		$opts = $this->_getOptionVals($data);
		$this->_replaceAjaxOptsWithDbJoinOpts($opts);
		echo json_encode($opts);
	}

	/**
	 * Test for db join element - if so update option labels with related join labels
	 *
	 * @param   array  &$opts  standard options
	 *
	 * @return  void
	 */

	protected function _replaceAjaxOptsWithDbJoinOpts(&$opts)
	{
		$groups = $this->getFormModel()->getGroupsHiarachy();
		$watch = $this->getWatchFullName();
		foreach ($groups as $groupModel)
		{
			$elementModels = $groupModel->getPublishedElements();
			foreach ($elementModels as $elementModel)
			{
				$fullName = $elementModel->getFullName(false, true, true);
				if ($fullName == $watch)
				{
					$element = $elementModel->getElement();
					if (get_parent_class($elementModel) == 'FabrikModelFabrikDatabasejoin')
					{
						$data = array();
						$joinopts = $elementModel->_getOptions($data);
					}
				}
			}
		}
		if (isset($joinopts))
		{
			$matrix = array();
			foreach ($joinopts as $j)
			{
				$matrix[$j->value] = $j->text;
			}
			foreach ($opts as &$opt)
			{
				if (array_key_exists($opt->text, $matrix))
				{
					$opt->text = $matrix[$opt->text];
				}
			}
		}
	}

	/**
	 * Get array of option values
	 *
	 * @param   array  $data           data
	 * @param   int	   $repeatCounter  repeat group counter
	 * @param   bool   $incWhere       include where sql statement
	 *
	 * @return  array
	 */

	protected function _getOptionVals($data = array(), $repeatCounter = 0, $incWhere = true)
	{
		if (!isset($this->_optionVals))
		{
			$this->_optionVals = array();
		}
		$db = $this->getDb();
		$opts = array();
		$opts['repeatCounter'] = $repeatCounter;
		$sql = $this->_buildQuery($data, $incWhere, $opts);
		$sqlKey = (string) $sql;
		$db->setQuery($sql);
		if (array_key_exists($sqlKey, $this->_optionVals))
		{
			return $this->_optionVals[$sqlKey];
		}

		FabrikHelperHTML::debug($db->getQuery(), 'cascadingdropdown _getOptionVals');
		$this->_optionVals[$sqlKey] = $db->loadObjectList();
		if ($db->getErrorNum())
		{
			JError::raiseError(501, $db->getErrorMsg());
		}
		if ($this->showPleaseSelect())
		{
			array_unshift($this->_optionVals[$sqlKey], JHTML::_('select.option', '', $this->_getSelectLabel()));
		}
		return $this->_optionVals[$sqlKey];
	}

	/**
	 * Do you add a please select option to the cdd list
	 *
	 * @since 3.0b
	 *
	 * @return  bool
	 */

	protected function showPleaseSelect()
	{
		$params = $this->getParams();
		if (!$this->canUse())
		{
			return false;
		}
		if (!$this->isEditable() && JRequest::getVar('method') !== 'ajax_getOptions')
		{
			return false;
		}
		return (bool) $params->get('cascadingdropdown_showpleaseselect', true);
	}

	/**
	 * Get the full name of the element to observe. When this element changes
	 * state, the cdd should perform an ajax lookup to update its options
	 *
	 * @return  string
	 */

	protected function getWatchFullName()
	{
		$listModel = $this->getlistModel();
		$elementModel = $this->getWatchElement();
		return $elementModel->getFullName();
	}

	/**
	 * Get the HTML id for the watch element
	 *
	 * @param   int  $repeatCounter  repeat group counter
	 *
	 * @return  string
	 */

	protected function _getWatchId($repeatCounter = 0)
	{
		$listModel = $this->getlistModel();
		$elementModel = $this->getWatchElement();
		return $elementModel->getHTMLId($repeatCounter);
	}

	/**
	 * Get the element to watch. Changes to this element will trigger the cdd's lookup
	 *
	 * @return  plgFabrik_Element
	 */

	protected function getWatchElement()
	{
		if (!isset($this->watchElement))
		{
			$watch = $this->getParams()->get('cascadingdropdown_observe');
			if ($watch == '')
			{
				JError::raiseError(500, 'No watch element set up for cdd' . $this->getElement()->id);
			}

			$this->watchElement = $this->getFormModel()->getElement($watch, true);
			if (!$this->watchElement)
			{
				// This element is a child element, so $watch is in the parent element (in another form)
				$pluginManager = FabrikWorker::getPluginManager();
				$parent = $pluginManager->getElementPlugin($watch);

				// These are the possible watch elements
				$children = $parent->getElementDescendents();

				// Match the possible element ids with the current form's element ids
				$elids = $this->getFormModel()->getElementIds();
				$matched = array_values(array_intersect($elids, $children));

				// Load the matched element
				$this->watchElement = $pluginManager->getElementPlugin($matched[0]);
			}
		}
		return $this->watchElement;
	}

	/**
	 * Create the sql query used to get the join data
	 *
	 * @param   array  $data      data
	 * @param   bool   $incWhere  include where
	 * @param   array  $opts      query options
	 *
	 * @return  mixed	JDatabaseQuery or false if query can't be built
	 */

	protected function _buildQuery($data = array(), $incWhere = true, $opts = array())
	{
		$sig = isset($this->_autocomplete_where) ? $this->_autocomplete_where . '.' . $incWhere : $incWhere;
		$sig .= '.' . serialize($opts);
		$repeatCounter = JArrayHelper::getValue($opts, 'repeatCounter', 0);
		$db = FabrikWorker::getDbo();
		if (isset($this->_sql[$sig]))
		{
			return $this->_sql[$sig];
		}
		$params = $this->getParams();
		$element = $this->getElement();

		$watch = $this->getWatchFullName();
		$whereval = null;
		$groups = $this->getForm()->getGroupsHiarachy();

		foreach ($groups as $groupModel)
		{
			$elementModels = $groupModel->getPublishedElements();
			foreach ($elementModels as $elementModel)
			{
				$fullName = $elementModel->getFullName(true, true, true);
				if ($fullName == $watch)
				{
					// Test for ajax update
					if (JRequest::getVar('fabrik_cascade_ajax_update') == 1)
					{
						$whereval = JRequest::getVar('v');
					}
					else
					{
						if (isset($this->_form->_data) || isset($this->_form->_formData))
						{
							if (isset($this->_form->_data))
							{
								$whereval = $elementModel->getValue($this->_form->_data, $repeatCounter);
							}
							else
							{
								$whereval = $elementModel->getValue($this->_form->_formData, $repeatCounter);
							}
							/* $$$ hugh - temporary bandaid to fix 'array' issue in view=details
							 * @TODO fix underlying cause in database join getValue
							 * http://fabrikar.com/forums/showthread.php?p=63512#post63512
							 */
							if (is_array($whereval))
							{
								$whereval = JArrayHelper::getValue($whereval, 0);
							}
							// $$$ hugh - if not set, set to '' to avoid selecting entire table
							elseif (!isset($whereval))
							{
								$whereval = '';
							}
						}
						else
						{
							// $$$ hugh - prolly rendering table view ...
							$watch_raw = $watch . '_raw';
							if (isset($data[$watch_raw]))
							{
								$whereval = $data[$watch_raw];
							}
							else
							{
								// $$$ hugh ::sigh:: might be coming in via swapLabelsForvalues in pre_process phase
								// and join array in data will have been flattened.  So try regular element name for watch.
								$no_join_watch_raw = $elementModel->getFullName(false, true, false) . '_raw';
								if (isset($data[$no_join_watch_raw]))
								{
									$whereval = $data[$no_join_watch_raw];
								}
								else
								{
									// $$$ hugh - if watched element has no value, we have been selecting all rows from CDD table
									// but should probably select none.
									$whereval = '';
								}
							}
						}
					}
					continue 2;
				}
			}
		}
		$where = '';
		$wherekey = $params->get('cascadingdropdown_key');
		if (!is_null($whereval) && $wherekey != '')
		{
			$whereBits = explode('___', $wherekey);
			$wherekey = array_pop($whereBits);
			$where = $wherekey . ' = ' . $db->quote($whereval);
		}
		$filter = $params->get('cascadingdropdown_filter');

		/* $$$ hugh - temporary hack to work around this issue:
		 * http://fabrikar.com/forums/showthread.php?p=71288#post71288
		 * ... which is basically that if they are using {placeholders} in their
		 * filter query, there's no point trying to apply that filter if we
		 * aren't in form view, for instance when building a search filter
		 * or in table view when the cdd is in a repeat group, 'cos there won't
		 * be any {placeholder} data to use.
		 * So ... for now, if the filter contains {...}, and view!=form ... skip it
		 * $$$ testing fix for the bandaid, ccd JS should not be submitting data from form
		 */
		if (trim($filter) != '')
		{
			$where .= ($where == '') ? ' ' : ' AND ';
			$where .= $filter;
		}
		$w = new FabrikWorker;

		// $$$ hugh - add some useful stuff to search data
		if (!is_null($whereval))
		{
			$placeholders = array('whereval' => $whereval, 'wherekey' => $wherekey);
		}
		else
		{
			$placeholders = array();
		}
		$join = $this->getJoin();
		$where = str_replace("{thistable}", $join->table_join_alias, $where);

		if (!empty($this->_autocomplete_where))
		{
			$where .= $where == '' ? ' AND ' . $this->_autocomplete_where : $this->_autocomplete_where;

		}
		$data = array_merge($data, $placeholders);
		$where = $w->parseMessageForPlaceHolder($where, $data);

		$table = $this->getDbName();

		$key = FabrikString::safeColName($params->get('cascadingdropdown_id'));
		$key = str_replace($db->quoteName($table), $db->quoteName($join->table_join_alias), $key);
		$orderby = 'text';
		$tables = $this->getForm()->getLinkedFabrikLists($params->get('join_db_name'));
		$listModel = JModel::getInstance('List', 'FabrikFEModel');
		$val = $params->get('cascadingdropdown_label_concat');
		if (!empty($val))
		{
			$val = str_replace("{thistable}", $join->table_join_alias, $val);
			$val = $w->parseMessageForPlaceHolder($val, $data);
			$val = 'CONCAT(' . $val . ')';
			$orderby = $val;
		}
		else
		{
			$val = FabrikString::safeColName($params->get('cascadingdropdown_label'));
			$val = preg_replace("#^`($table)`\.#", $db->quoteName($join->table_join_alias) . '.', $val);
			foreach ($tables as $tid)
			{
				$listModel->setId($tid);
				$listModel->getTable();
				$formModel = $this->getForm();
				$formModel->getGroupsHiarachy();

				$orderby = $val;

				// See if any of the tables elements match the db joins val/text
				foreach ($groups as $groupModel)
				{
					$elementModels = $groupModel->getPublishedElements();
					foreach ($elementModels as $elementModel)
					{
						$element = $elementModel->_element;
						if ($element->name == $val)
						{
							$val = $elementModel->modifyJoinQuery($val);
						}
					}
				}
			}
		}
		$val = str_replace($db->quoteName($table), $db->quoteName($join->table_join_alias), $val);

		$query = $db->getQuery(true);
		$query->select('DISTINCT(' . $key . ') AS value, ' . $val . 'AS text');

		$desc = $params->get('cdd_desc_column', '');
		if ($desc !== '')
		{
			$query->select(FabrikString::safeColName($desc) . ' AS description');
		}

		$query->from($db->quoteName($table) . ' AS ' . $db->quoteName($join->table_join_alias));

		$query->where(FabrikString::rtrimword($where));

		if (!JString::stristr($where, 'order by'))
		{
			$query->order($orderby . ' ASC');

		}
		$this->_sql[$sig] = $query;
		FabrikHelperHTML::debug($this->_sql[$sig]);
		return $this->_sql[$sig];
	}

	/**
	 * Get the element name or concat statement used to build the dropdown labels or
	 * table data field
	 *
	 * @return  string
	 */

	protected function getValColumn()
	{
		$params = $this->getParams();
		$join = $this->getJoin();
		if ($params->get('cascadingdropdown_label_concat') == '')
		{
			// $$$ rob testing this - if 2 cdd's to same db think we need this change:
			$bits = explode('___', $params->get('cascadingdropdown_label'));
			return $join->table_join_alias . '___' . $bits[1];
		}
		else
		{
			$val = str_replace("{thistable}", $join->table_join_alias, $params->get('cascadingdropdown_label_concat'));
			return 'CONCAT(' . $val . ')';
		}
	}

	/**
	 * Get the name of the field to order the table data by
	 * can be overwritten in plugin class - but not currently done so
	 * $$$ hugh - commenting this out as it needs to be same as databasejoin element
	 *
	 * @return string column to order by tablename___elementname and yes you can use aliases in the order by clause
	 */
/*
	public function getOrderByName()
	{
		$params = $this->getParams();
		$join = $this->getJoin();
		$joinTable = $join->table_join_alias;
		$joinVal = $this->getValColumn();
		$return = !strstr($joinVal, 'CONCAT') ? $joinTable . '.' . $joinVal : $joinVal;
		if ($return == '.')
		{
			$return = parent::getOrderByName();
		}
		return $return;
	}
*/

	/**
	 * Load connection object
	 *
	 * @return  object	connection table
	 */

	protected function &_loadConnection()
	{
		$params = $this->getParams();
		$id = $params->get('cascadingdropdown_connection');
		$cid = $this->getlistModel()->getConnection()->getConnection()->id;
		if ($cid == $id)
		{
			$this->cn = $this->getlistModel()->getConnection();
		}
		else
		{
			$this->cn = JModel::getInstance('Connection', 'FabrikFEModel');
			$this->cn->setId($id);
		}
		return $this->cn->getConnection();
	}

	/**
	 * Get the cdd's database name
	 *
	 * @return  db name or false if unable to get name
	 */

	protected function getDbName()
	{
		if (!isset($this->dbname) || $this->dbname == '')
		{
			$params = $this->getParams();
			$id = $params->get('cascadingdropdown_table');
			if ($id == '')
			{
				JError::raiseWarning(500, 'Unable to get table for cascading dropdown (ignore if creating a new element)');
				return false;
			}
			$db = FabrikWorker::getDbo(true);
			$query = $db->getQuery(true);
			$query->select('db_table_name')->from('#__{package}_lists')->where('id = ' . (int) $id);
			$db->setQuery($query);
			$this->dbname = $db->loadResult();
		}
		return $this->dbname;
	}

	/**
	 * Get the table filter for the element
	 *
	 * @param   int   $counter  filter order
	 * @param   bool  $normal   do we render as a normal filter or as an advanced search filter
	 * if normal include the hidden fields as well (default true, use false for advanced filter rendering)
	 *
	 * @return  string	filter html
	 */

	public function getFilter($counter = 0, $normal = true)
	{
		$params = $this->getParams();
		$element = $this->getElement();
		$listModel = $this->getlistModel();
		$table = $listModel->getTable();
		$fabrikDb = $listModel->getDb();
		$elName = $this->getFilterFullName();
		$htmlid = $this->getHTMLId() . 'value';
		$default = $this->getDefaultFilterVal($normal, $counter);
		$v = $this->filterName($counter, $normal);

		$id = array_pop(explode('___', $params->get('cascadingdropdown_id')));
		$label = array_pop(explode('___', $params->get('cascadingdropdown_label')));

		$dbname = $fabrikDb->quoteName($this->getDbName());
		$size = $params->get('filter_length', 20);
		$return = array();
		switch ($element->filter_type)
		{
			case "dropdown":
				$oDistinctData = array();
				$rows[] = JHTML::_('select.option', '', JText::_('COM_FABRIK_FILTER_PLEASE_SELECT'));
				if (is_array($oDistinctData))
				{
					$rows = array_merge($rows, $oDistinctData);
				}
				$return[] = JHTML::_('select.genericlist', $rows, $v, 'class="inputbox fabrik_filter" size="1" ', "value", 'text', $default, $htmlid);
				break;

			case "field":
			case '':
				$default = htmlspecialchars($default);
				$return[] = '<input type="text" name="' . $v . '" class="inputbox fabrik_filter" value="' . $default . '" size="' . $size . '" id="'
					. $htmlid . '" />';
				break;

			case 'hidden':
				$default = htmlspecialchars($default);
				$return[] = '<input type="hidden" name="' . $v . '" class="inputbox fabrik_filter" value="' . $default . '" id="' . $htmlid . '" />';
				break;

			case "auto-complete":
				$defaultLabel = $this->getLabelForValue($default);
				$default = htmlspecialchars($default);
				$return[] = '<input type="hidden" name="' . $v . '" class="inputbox fabrik_filter" value="' . $default . '" id="' . $htmlid . '" />';
				$return[] = '<input type="text" name="' . $element->id . '-auto-complete" class="inputbox fabrik_filter autocomplete-trigger" size="'
					. $size . '" value="' . $defaultLabel . '" id="' . $htmlid . '-auto-complete" />';
				break;

		}
		if ($normal)
		{
			$return[] = $this->getFilterHiddenFields($counter, $elName);
		}
		else
		{
			$return[] = $this->getAdvancedFilterHiddenFields();
		}
		return implode("\n", $return);
	}

	/**
	 * If used as a filter add in some JS code to watch observed filter element's changes
	 * when it changes update the contents of this elements dd filter's options
	 *
	 * @param   bool    $normal     is the filter a normal (true) or advanced filter
	 * @param   string  $container  container
	 *
	 * @return  void
	 */

	public function filterJS($normal, $container)
	{
		$params = $this->getParams();
		$element = $this->getElement();
		$observerid = $this->_getWatchId();
		$observerid .= 'value';
		if ($element->filter_type == 'auto-complete')
		{
			FabrikHelperHTML::autoCompleteScript();
			$htmlid = $this->getHTMLId() . 'value';
			$opts = new stdClass;
			$opts->observerid = $observerid;
			$opts->url = COM_FABRIK_LIVESITE . '/index.php?option=com_fabrik&format=raw&view=plugin&task=pluginAjax&g=element&element_id='
				. $element->id . '&plugin=cascadingdropdown&method=autocomplete_options';
			$opts = json_encode($opts);

			FabrikHelperHTML::addScriptDeclaration("head.ready(function() { new FabCddAutocomplete('$htmlid', $opts); });");
		}
		if ($element->filter_type == 'dropdown')
		{
			$default = $this->getDefaultFilterVal($normal);
			$observed = $this->_getObserverElement();
			$filterid = $this->getHTMLId() . 'value';
			$formModel = $this->getForm();
			FabrikHelperHTML::script('plugins/fabrik_element/cascadingdropdown/filter.js');
			$opts = new stdClass;
			$opts->formid = $formModel->get('id');
			$opts->filterid = $filterid;
			$opts->elid = $this->_id;
			$opts->def = $default;
			$opts->filterobj = 'Fabrik.filter_' . $container;
			$opts = json_encode($opts);
			return "Fabrik.filter_{$container}.addFilter('$element->plugin', new CascadeFilter('$observerid', $opts));\n";
		}
	}

	/**
	 * Get the observed element's element model
	 *
	 * @return mixed element model or false
	 */

	protected function _getObserverElement()
	{
		$params = $this->getParams();
		$observer = $params->get('cascadingdropdown_observe');
		$formModel = $this->getForm();
		$groups = $formModel->getGroupsHiarachy();
		foreach ($groups as $groupModel)
		{
			$elementModels = $groupModel->getMyElements();
			foreach ($elementModels as $elementModel)
			{
				$element = $elementModel->getElement();
				if ($observer == $element->name)
				{
					return $elementModel;
				}
			}
		}
		return false;
	}

	/**
	 * Called from admin element controller when element saved
	 *
	 * @param   array  $data  posted element save data
	 *
	 * @return  bool  save ok or not
	 */

	public function onSave($data)
	{
		$params = json_decode($data['params']);
		if (!$this->canEncrypt() && !empty($params->encrypt))
		{
			JError::raiseNotice(500, 'The encryption option is only available for field and text area plugins');
			return false;
		}
		$element = $this->getElement();
		$table_join = $this->getDbName();
		if (!$table_join)
		{
			return false;
		}
		$table_join_key = str_replace($table_join . '___', '', $params->cascadingdropdown_id);
		$join_label = str_replace($table_join . '___', '', $params->cascadingdropdown_label);

		// Load join based on this element id
		$join = FabTable::getInstance('Join', 'FabrikTable');
		$join->load(array('element_id' => $this->_id));
		$join->table_join = $table_join;
		$join->join_type = 'left';
		$join->group_id = $data['group_id'];
		$join->element_id = $element->id;
		$join->table_key = str_replace('`', '', $element->name);
		$join->table_join_key = $table_join_key;
		$join->join_from_table = '';
		$o = new stdClass;
		$l = 'join-label';
		$o->$l = $join_label;
		$o->type = 'element';
		$join->params = json_encode($o);
		$join->store();
		return true;
	}

	/**
	 * Run before the element is saved
	 *
	 * @param   object  &$row  that is going to be updated
	 *
	 * @return null
	 */

	public function beforeSave(&$row)
	{
		/*
		 * do nothing, just here to prevent join element method from running
		 * instead (which removed join table
		 * entry if not pluginname==databasejoin
		 */
		return true;
	}

	/**
	 * Get an array of element html ids and their corresponding
	 * js events which trigger a validation.
	 * Examples of where this would be overwritten include timedate element with time field enabled
	 *
	 * @param   int  $repeatCounter  repeat group counter
	 *
	 * @return  array  html ids to watch for validation
	 */

	public function getValidationWatchElements($repeatCounter)
	{
		$id = $this->getHTMLId($repeatCounter);
		$ar = array('id' => $id, 'triggerEvent' => 'change');
		return array($ar);
	}

	/**
	 * When copying elements from an existing table
	 * once a copy of all elements has been made run them through this method
	 * to ensure that things like watched element id's are updated
	 *
	 * @param   array  $elementMap  copied element ids (keyed on original element id)
	 *
	 * @return  mixed JError:void
	 */

	public function finalCopyCheck($elementMap)
	{
		$element = $this->getElement();
		unset($this->_params);
		$params = $this->getParams();
		$oldObeserveId = $params->get('cascadingdropdown_observe');
		if (!array_key_exists($oldObeserveId, $elementMap))
		{
			JError::raiseWarning(E_ERROR, 'cascade dropdown: no id ' . $oldObeserveId . ' found in ' . implode(",", array_keys($elementMap)));
		}
		$newObserveId = $elementMap[$oldObeserveId];
		$params->set('cascadingdropdown_observe', $newObserveId);

		// Save params
		$element->params = $params->toString();
		if (!$element->store())
		{
			return JError::raiseWarning(500, $element->getError());
		}
	}

	/**
	 * Return an array of parameter names which should not get updated if a linked element's parent is saved
	 * notably any paramter which references another element id should be returned in this array
	 * called from admin element model updateChildIds()
	 * see cascadingdropdown element for example
	 *
	 * @return  array	parameter names to not alter
	 */

	public function getFixedChildParameters()
	{
		return array('cascadingdropdown_observe');
	}

	/**
	 * Build the filter query for the given element.
	 * Can be overwritten in plugin - e.g. see checkbox element which checks for partial matches
	 *
	 * @param   string  $key            element name in format `tablename`.`elementname`
	 * @param   string  $condition      =/like etc
	 * @param   string  $value          search string - already quoted if specified in filter array options
	 * @param   string  $originalValue  original filter value without quotes or %'s applied
	 * @param   string  $type           filter type advanced/normal/prefilter/search/querystring/searchall
	 *
	 * @return  string	sql query part e,g, "key = value"
	 */

	public function getFilterQuery($key, $condition, $value, $originalValue, $type = 'normal')
	{
		/* $$$ rob $this->_rawFilter set in tableModel::getFilterArray()
		 used in prefilter dropdown in admin to allow users to prefilter on raw db join value*/
		$db = $this->getDb();
		$params = $this->getParams();
		if ($type == 'querystring')
		{
			$key2 = FabrikString::safeColNameToArrayKey($key);

			/* $$$ rob no matter whether you use elementname_raw or elementname in the querystring filter
			 * by the time it gets here we have normalized to elementname. So we check if the original qs filter was looking at the raw
			 * value if it was then we want to filter on the key and not the label
			 */
			if (!array_key_exists($key2, JRequest::get('get')))
			{
				if (!$this->_rawFilter)
				{
					$k = $db->quoteName($params->get('join_db_name')) . '.' . $db->quoteName($params->get('join_key_column'));
				}
				else
				{
					$k = $key;
				}
				$this->encryptFieldName($k);
				return "$k $condition $value";
			}
		}
		if (!$this->_rawFilter && ($type == 'searchall' || $type == 'prefilter'))
		{
			$key = FabrikString::safeColName($params->get('cascadingdropdown_label'));
		}
		$this->encryptFieldName($key);
		$str = "$key $condition $value";
		return $str;
	}

	/**
	 * Get select option label
	 *
	 * @return  string
	 */

	protected function _getSelectLabel()
	{
		return $this->getParams()->get('cascadingdropdown_noselectionlabel', JText::_('COM_FABRIK_PLEASE_SELECT'));
	}

	/**
	 * Should the 'label' field be quoted.  Overridden by databasejoin and extended classes,
	 * which may use a CONCAT'ed label which musn't be quoted.
	 *
	 * @since	3.0.6
	 *
	 * @return boolean
	 */

	protected function quoteLabel()
	{
		$params = $this->getParams();
		return $params->get('cascadingdropdown_label_concat', '') == '';
	}

}
