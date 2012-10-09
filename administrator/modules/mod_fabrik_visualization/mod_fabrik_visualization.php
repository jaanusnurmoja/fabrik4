<?php
/**
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 */

// No direct access
defined('_JEXEC') or die('Restricted access');
jimport('joomla.filesystem.file');

// Load front end language file as well
$lang = JFactory::getLanguage();
$lang->load('com_fabrik', JPATH_SITE . '/components/com_fabrik');
if (!defined('COM_FABRIK_FRONTEND'))
{
	JError::raiseError(400, JText::_('COM_FABRIK_SYSTEM_PLUGIN_NOT_ACTIVE'));
}
jimport('joomla.application.component.model');
jimport('joomla.application.component.helper');
JModel::addIncludePath(COM_FABRIK_FRONTEND . '/models', 'FabrikFEModel');

$app = JFactory::getApplication();
$input = $app->input;

require_once(COM_FABRIK_FRONTEND . '/controller.php');
require_once(COM_FABRIK_FRONTEND . '/controllers/visualization.php');

// $$$rob looks like including the view does something to the layout variable
$origLayout = $input->get('layout', '', 'string');
require_once(COM_FABRIK_FRONTEND . '/views/list/view.html.php');
$input->set('layout', $origLayout);

require_once(COM_FABRIK_FRONTEND . '/views/package/view.html.php');

JModel::addIncludePath(COM_FABRIK_FRONTEND . '/models');
JTable::addIncludePath(COM_FABRIK_BASE . '/administrator/components/com_fabrik/tables');
$document = JFactory::getDocument();

require_once(COM_FABRIK_FRONTEND . '/controllers/package.php');
require_once(COM_FABRIK_FRONTEND . '/views/form/view.html.php');

$id = intval($params->get('id', 1));

/*
 * This all works fine for a list
 * going to try to load a package so u can access the form and list
 */
$moduleclass_sfx = $params->get('moduleclass_sfx', '');

$viewName = 'visualization';
$db = FabrikWorker::getDbo();
$query = $db->getQuery(true);
$query->select('plugin')->from('#__{package}_visualizations')->where('id = ' . (int) $id);
$db->setQuery($query);
$name = $db->loadResult();
$path = JPATH_SITE . '/plugins/fabrik_visualization/' . $name . '/controllers/' . $name . '.php';
if (file_exists($path))
{
	require_once $path;
}
else
{
	JError::raiseNotice(400, 'could not load viz:' . $name);
	return;
}
$controllerName = 'FabrikControllerVisualization' . $name;
$controller = new $controllerName();
$controller->addViewPath(JPATH_SITE . '/plugins/fabrik_visualization/' . $name . '/views');
$controller->addViewPath(COM_FABRIK_FRONTEND . '/views');

// Add the model path
$modelpaths = JModel::addIncludePath(JPATH_SITE . '/plugins/fabrik_visualization/' . $name . '/models');
$modelpaths = JModel::addIncludePath(COM_FABRIK_FRONTEND . '/models');

$origId = $input->getInt('visualizationid');
$input->set('visualizationid', $id);
$controller->display();
$input->set('visualizationid', $origId);
