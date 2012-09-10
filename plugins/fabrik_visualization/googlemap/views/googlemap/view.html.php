<?php
/**
 * Fabrik Google Map Viz HTML View
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.visualization.googlemap
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport('joomla.application.component.view');

/**
 * Fabrik Google Map Viz HTML View
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.visualization.googlemap
 * @since       3.0
 */

class fabrikViewGooglemap extends JViewLegacy
{

	/**
	 * Execute and display a template script.
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise a JError object.
	 */

	public function display($tpl = 'default')
	{
		$srcs = FabrikHelperHTML::framework();
		FabrikHelperHTML::slimbox();
		$document = JFactory::getDocument();
		$usersConfig = JComponentHelper::getParams('com_fabrik');
		$model = $this->getModel();
		$model->setId(JRequest::getVar('id', $usersConfig->get('visualizationid', JRequest::getInt('visualizationid', 0))));
		$this->row = $model->getVisualization();
		$js = $model->getJs();
		$this->txt = $model->getText();
		$params = $model->getParams();
		$this->assign('params', $params);
		$tpl = $params->get('fb_gm_layout', $tpl);
		$tmplpath = JPATH_ROOT . '/plugins/fabrik_visualization/googlemap/views/googlemap/tmpl/' . $tpl;
		$srcs[] = 'media/com_fabrik/js/listfilter.js';

		$uri = JURI::getInstance();
		if ($params->get('fb_gm_center') == 'userslocation')
		{
			$document->addScript($uri->getScheme() . '://code.google.com/apis/gears/gears_init.js');
			$srcs[] = 'components/com_fabrik/libs/geo-location/geo.js';
		}

		$model->getPluginJsClasses($srcs);
		global $ispda;
		if ($ispda == 1)
		{
			// Pdabot
			$template = 'static';
			$this->assign('staticmap', $this->get('StaticMap'));
		}
		else
		{
			$src = $uri->getScheme() . '://maps.google.com/maps/api/js?sensor=' . $params->get('fb_gm_sensor', 'false');
			$document->addScript($src);
			if (FabrikHelperHTML::isDebug())
			{
				$srcs[] = 'plugins/fabrik_visualization/googlemap/googlemap.js';
			}
			else
			{
				$srcs[] = 'plugins/fabrik_visualization/googlemap/googlemap-min.js';
			}

			if ((int) $this->params->get('fb_gm_clustering', '0') == 1)
			{
				if (FabrikHelperHTML::isDebug())
				{
					$srcs[] = 'components/com_fabrik/libs/googlemaps/markerclustererplus/src/markerclusterer.js';
				}
				else
				{
					$srcs[] = 'components/com_fabrik/libs/googlemaps/markerclustererplus/src/markerclusterer_packed.js';
				}
			}
			else
			{
				// Doesn't work in v3
				// FabrikHelperHTML::script('components/com_fabrik/libs/googlemaps/markermanager.js');
			}

			FabrikHelperHTML::addScriptDeclaration($js);
			$template = null;
		}
		$js = $this->get('PluginJsObjects');
		$js .= $model->getFilterJs();
		FabrikHelperHTML::script($srcs, $js);
		FabrikHelperHTML::stylesheetFromPath('plugins/fabrik_visualization/googlemap/views/googlemap/tmpl/' . $tpl . '/template.css');

		// Check and add a general fabrik custom css file overrides template css and generic table css
		FabrikHelperHTML::stylesheetFromPath('media/com_fabrik/css/custom.css');

		// Check and add a specific viz template css file overrides template css generic table css and generic custom css
		FabrikHelperHTML::stylesheetFromPath('plugins/fabrik_visualization/googlemap/views/googlemap/tmpl/' . $tpl . '/custom.css');
		$this->assignRef('filters', $this->get('Filters'));
		$this->assign('showFilters', JRequest::getInt('showfilters', $params->get('show_filters')) === 1 ? 1 : 0);
		$this->assign('filterFormURL', $this->get('FilterFormURL'));
		$this->assign('sidebarPosition', $params->get('fb_gm_use_overlays_sidebar'));
		if ($this->get('ShowSideBar'))
		{
			$this->assign('showSidebar', 1);
			$this->assign('overlayUrls', (array) $params->get('fb_gm_overlay_urls'));
			$this->assign('overlayLabels', (array) $params->get('fb_gm_overlay_labels'));
		}
		else
		{
			$this->assign('showSidebar', 0);
		}
		$this->_setPath('template', $tmplpath);
		$this->assign('containerId', $this->get('ContainerId'));
		$this->assignRef('grouptemplates', $this->get('GroupTemplates'));
		echo parent::display($template);
	}

}
