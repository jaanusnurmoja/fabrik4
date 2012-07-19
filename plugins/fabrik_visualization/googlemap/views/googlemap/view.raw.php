<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.visualization.googlemap
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport('joomla.application.component.view');

/**
 * Fabrik Fuson Chart Raw View
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.visualization.fusionchart
 */

class fabrikViewGooglemap extends JViewLegacy
{

	function display($tmpl = 'default')
	{
		$document = JFactory::getDocument();
		$usersConfig = JComponentHelper::getParams('com_fabrik');
		$model = $this->getModel();
		$model->setId(JRequest::getVar('id', $usersConfig->get('visualizationid', JRequest::getInt('visualizationid', 0))));
		$this->row = $model->getVisualization();
		echo $model->getJSIcons();
	}
}
