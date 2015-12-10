<?php
/**
 * Entry point to Fabrik's administration pages
 *
 * @package     Joomla.Administrator
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2015 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

use Joomla\String\String;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_fabrik'))
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'), 404);
}

// Load front end language file as well
$lang = JFactory::getLanguage();
$lang->load('com_fabrik', JPATH_SITE . '/components/com_fabrik');

// Test if the system plugin is installed and published
if (!defined('COM_FABRIK_FRONTEND'))
{
	throw new RuntimeException(JText::_('COM_FABRIK_SYSTEM_PLUGIN_NOT_ACTIVE'), 400);
}

$app = JFactory::getApplication();
$input = $app->input;

// Include dependencies
jimport('joomla.application.component.controller');
jimport('joomla.filesystem.file');

JHTML::stylesheet('administrator/components/com_fabrik/headings.css');

// Check for plugin views (e.g. list email plugin's "email form"
$cName = $input->getCmd('controller');

if (String::strpos($cName, '.') != false)
{
	list($type, $name) = explode('.', $cName);

	if ($type == 'visualization')
	{
		require_once JPATH_COMPONENT . '/controllers/visualization.php';
	}

	$path = JPATH_SITE . '/plugins/fabrik_' . $type . '/' . $name . '/controllers/' . $name . '.php';

	if (JFile::exists($path))
	{
		require_once $path;
		$controller = $type . $name;

		$className = 'FabrikController' . String::ucfirst($controller);
		$controller = new $className;

		// Add in plugin view
		$controller->addViewPath(JPATH_SITE . '/plugins/fabrik_' . $type . '/' . $name . '/views');

		// Add the model path
		JModelLegacy::addIncludePath(JPATH_SITE . '/plugins/fabrik_' . $type . '/' . $name . '/models');
	}
}
else
{
	$controller	= JControllerLegacy::getInstance('FabrikAdmin');
}

// Test that they've published some element plugins!
$db = JFactory::getDbo();
$query = $db->getQuery(true);
$query->select('COUNT(extension_id)')->from('#__extensions')->where('enabled = 1 AND folder = "fabrik_element"');
$db->setQuery($query);

if (count($db->loadResult()) === 0)
{
	$app->enqueueMessage(JText::_('COM_FABRIK_PUBLISH_AT_LEAST_ONE_ELEMENT_PLUGIN'), 'notice');
}


/*$pluginManager = FabrikWorker::getPluginManager();

	// The XML Dom object describing the element's plugin properties
	$pluginManifest = $pluginManager->getPluginFromId(459)->getPluginForm()->getXml();

	// Get all listfield parameters where the value format property is no 'tableelement'
	$listFields = $pluginManifest->xpath('//field[@type=\'listfields\'][(@valueformat=\'tableelement\') != true()]');
foreach ($listFields as $field) {
	if ((string) $field->attributes()->valueformat === '') {
		echo "hh";
	}
}
echo "<pre>";print_r($listFields);exit;*/

// Execute the task.
$controller->execute($input->get('task', 'home.display'));

if ($input->get('format', 'html') === 'html')
{
	FabrikHelperHTML::framework();
}

$controller->redirect();
