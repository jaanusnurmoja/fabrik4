<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.visualization.slideshow
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport('joomla.application.component.view');

/**
 * Slideshow Viz View
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.visualization.slideshow
 * @since       3.0
 */

class FabrikViewSlideshow extends JViewLegacy
{

	/**
	 * Execute and display a template script.
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise a JError object.
	 */

	function display($tpl = 'default')
	{
		$app = JFactory::getApplication();
		$input = $app->input;
		$srcs = FabrikHelperHTML::framework();
		$model = $this->getModel();
		$usersConfig = JComponentHelper::getParams('com_fabrik');
		$model->setId($input->getInt('id', $usersConfig->get('visualizationid', $input->getInt('visualizationid', 0))));
		$this->row = $model->getVisualization();
		if ($this->row->published == 0)
		{
			JError::raiseWarning(500, JText::_('JERROR_ALERTNOAUTHOR'));
			return '';
		}
		$this->assign('js', $this->get('JS'));
		$viewName = $this->getName();
		$params = $model->getParams();
		$this->assign('params', $params);
		$pluginManager = JModelLegacy::getInstance('Pluginmanager', 'FabrikFEModel');
		$plugin = $pluginManager->getPlugIn('slideshow', 'visualization');
		$this->assign('showFilters', $input->getInt('showfilters', $params->get('show_filters')) === 1 ? 1 : 0);
		$this->assign('filters', $this->get('Filters'));
		$this->assign('filterFormURL', $this->get('FilterFormURL'));
		$this->assign('params', $model->getParams());
		$this->assign('containerId', $this->get('ContainerId'));
		$tpl = $pluginParams->get('slideshow_viz_layout', $tpl);
		$tmplpath = $model->pathBase . 'slideshow/views/slideshow/tmpl/' . $tpl;
		$this->_setPath('template', $tmplpath);
		$srcs[] = 'media/com_fabrik/js/listfilter.js';
		if ($this->get('RequiredFiltersFound'))
		{
			$srcs[] = 'components/com_fabrik/libs/slideshow2/js/slideshow.js';
			$mode = $pluginParams->get('slideshow_viz_type', 1);
			switch ($mode)
			{
				case 1:
					break;
				case 2:
					$srcs[] = 'components/com_fabrik/libs/slideshow2/js/slideshow.kenburns.js';
					break;
				case 3:
					$srcs[] = 'components/com_fabrik/libs/slideshow2/js/slideshow.push.js';
					break;
				case 4:
					$srcs[] = 'components/com_fabrik/libs/slideshow2/js/slideshow.fold.js';
					break;
				default:
					break;
			}

			JHTML::stylesheet('components/com_fabrik/libs/slideshow2/css/slideshow.css');
			$srcs[] = 'plugins/fabrik_visualization/slideshow/slideshow.js';
		}
		FabrikHelperHTML::script($srcs, $this->js);

		$tmplpath = JPATH_ROOT . '/plugins/fabrik_visualization/slideshow/views/slideshow/tmpl/' . $tpl;
		$this->_setPath('template', $tmplpath);
		FabrikHelperHTML::stylesheetFromPath('plugins/fabrik_visualization/slideshow/views/slideshow/tmpl/' . $tpl . '/template.css');
		echo parent::display();
	}

}
