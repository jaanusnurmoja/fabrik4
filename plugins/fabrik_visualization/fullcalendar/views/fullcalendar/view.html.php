<?php
/**
 * Fabrik Calendar HTML View
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.visualization.calendar
 * @copyright   Copyright (C) 2005-2013 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

/**
 * Fabrik Calendar HTML View
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.visualization.calendar
 * @since       3.0
 */
class FabrikViewFullcalendar extends JViewLegacy
{
	/**
	 * Execute and display a template script.
	 *
	 * @param   string $tpl The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise a JError object.
	 */
	public function display($tpl = 'default')
	{
		$app         = JFactory::getApplication();
		$input       = $app->input;
		$model       = $this->getModel();
		$usersConfig = JComponentHelper::getParams('com_fabrik');
		$id          = $input->get('id', $usersConfig->get('visualizationid', $input->get('visualizationid', 0)));
		$model->setId($id);
		$this->row = $model->getVisualization();

		if (!$model->canView())
		{
			echo FText::_('JERROR_ALERTNOAUTHOR');

			return false;
		}

		$params              = $model->getParams();
		$this->events        = $model->setUpEvents();
		$this->params        = $params;
		$this->containerId   = $model->getJSRenderContext();
		$this->filters       = $this->get('Filters');
		$this->showFilters   = $model->showFilters();
		$this->showTitle     = $input->getInt('show-title', 1);
		$this->filterFormURL = $this->get('FilterFormURL');

		$this->canAdd               = (bool) $params->get('fullcalendar-read-only', 0) == 1 ? false : $model->getCanAdd();
		$this->requiredFiltersFound = $this->get('RequiredFiltersFound');

		if ($params->get('fullcalendar_show_messages', '1') == '1' && $this->canAdd && $this->requiredFiltersFound)
		{
			$msg = FText::_('PLG_VISUALIZATION_FULLCALENDAR_DOUBLE_CLICK_TO_ADD');
			$msg .= $model->getDateLimitsMsg();
			$app->enqueueMessage($msg);
		}

		$this->jLayouts();
		$this->jsText();
		$this->iniJs();

		$this->params = $model->getParams();
		$tpl          = $params->get('calendar_layout', $tpl);
		$tmplPath     = JPATH_ROOT . '/plugins/fabrik_visualization/fullcalendar/views/fullcalendar/tmpl/' . $tpl;
		$this->_setPath('template', $tmplPath);

		$this->css($tpl);

		return parent::display();
	}

	/**
	 * Add CSS
	 *
	 * @param $tpl
	 */
	private function css($tpl)
	{
		$lib = COM_FABRIK_LIVESITE . 'plugins/fabrik_visualization/fullcalendar/libs/fullcalendar/';
		FabrikHelperHTML::styleSheet($lib . 'fullcalendar.css');

		// Add our css
		FabrikHelperHTML::stylesheetFromPath('plugins/fabrik_visualization/fullcalendar/fullcalendar.css');
		JHTML::stylesheet('media/com_fabrik/css/list.css');
		FabrikHelperHTML::stylesheetFromPath('plugins/fabrik_visualization/fullcalendar/views/fullcalendar/tmpl/' . $tpl . '/template.css');

		// Adding custom.css, just for the heck of it
		FabrikHelperHTML::stylesheetFromPath('plugins/fabrik_visualization/fullcalendar/views/fullcalendar/tmpl/' . $tpl . '/custom.css');
	}

	/**
	 * Get Js Options
	 *
	 * @return stdClass
	 * @throws Exception
	 */
	private function jsOptions()
	{
		$model    = $this->getModel();
		$app      = JFactory::getApplication();
		$package  = $app->getUserState('com_fabrik.package', 'fabrik');
		$params   = $model->getParams();
		$Itemid   = FabrikWorker::itemId();
		$urls     = new stdClass;
		$calendar = $this->row;
		$j3       = FabrikWorker::j3();
		$tpl      = $params->get('fullcalendar_layout', $j3);

		// Get all list where statements - which are then included in the ajax call to ensure we get the correct data set loaded
		$urlFilters        = new stdClass;
		$urlFilters->where = $model->buildQueryWhere();

		// Don't JRoute as its wont load with sef?
		$urls->del = 'index.php?option=com_' . $package
			. '&controller=visualization.fullcalendar&view=visualization&task=deleteEvent&format=raw&Itemid=' . $Itemid
			. '&id=' . $model->getId();
		$urls->add = 'index.php?option=com_' . $package . '&view=visualization&format=raw&Itemid=' . $Itemid
			. '&id=' . $model->getId();

		$options                  = new stdClass;
		$options->url             = $urls;
		$options->dateLimits      = $model->getDateLimits();
		$options->deleteables     = $model->getDeleteAccess();
		$options->eventLists      = $model->getEventLists();
		$options->calendarId      = $calendar->id;
		$options->popwiny         = $params->get('yoffset', 0);
		$options->urlfilters      = $urlFilters;
		$options->canAdd          = $this->canAdd;
		$options->showFullDetails = (bool) $params->get('show_full_details', false);
		$options->restFilterStart = FabrikWorker::getMenuOrRequestVar('resetfilters', 0, false, 'request');
		$options->tmpl            = $tpl;

		// $$$rob @TODO not sure this is need - it isn't in the timeline viz
		$model->setRequestFilters();
		$options->filters = $model->filters;

		// End not sure
		$options->Itemid         = $Itemid;
		$options->show_day       = (bool) $params->get('show_day', true);
		$options->show_week      = (bool) $params->get('show_week', true);
		$options->default_view   = $params->get('fullcalendar_default_view', 'month');
		$options->add_type       = $params->get('add_type', 'both');
		$options->time_format    = $params->get('time_format', 'H(:mm)');
		$options->first_week_day = (int) $params->get('first_week_day', 0);
		$options->minDuration    = $params->get('minimum_duration', "00:30:00");
		$options->open           = $params->get('open-hour', "00:00:00");
		$options->close          = $params->get('close-hour', "23:59:59");
		$options->lang           = FabrikWorker::getShortLang();
		$options->showweekends   = (bool) $params->get('calendar-show-weekends', true);
		$options->readonly       = (bool) $params->get('calendar-read-only', false);
		$options->timeFormat     = $params->get('time_format', '%X');
		$options->readonlyMonth  = (bool) $params->get('readonly_monthview', false);
		$options->j3             = FabrikWorker::j3();
		$options->calOptions     = $params->get('calOptions', '{}');

		return $options;
	}

	/**
	 * Add text for javascript translations
	 */
	private function jsText()
	{
		JText::script('PLG_VISUALIZATION_FULLCALENDAR_CONF_DELETE');
		JText::script('PLG_VISUALIZATION_FULLCALENDAR_DELETE');
		JText::script('PLG_VISUALIZATION_FULLCALENDAR_VIEW');
		JText::script('PLG_VISUALIZATION_FULLCALENDAR_EDIT');
		JText::script('PLG_VISUALIZATION_FULLCALENDAR_ADD_EVENT');
		JText::script('PLG_VISUALIZATION_FULLCALENDAR_EDIT_EVENT');
		JText::script('PLG_VISUALIZATION_FULLCALENDAR_VIEW_EVENT');
		JText::script('PLG_VISUALIZATION_FULLCALENDAR_EVENT_START_END');
		JText::script('PLG_VISUALIZATION_FULLCALENDAR_DATE_ADD_TOO_LATE');
		JText::script('PLG_VISUALIZATION_FULLCALENDAR_DATE_ADD_TOO_EARLY');
		JText::script('PLG_VISUALIZATION_FULLCALENDAR_CLOSE');
	}

	/**
	 * Initialize the js
	 *
	 * @return void
	 */
	private function iniJs()
	{
		$model = $this->getModel();
		$ref   = $model->getJSRenderContext();
		$json  = json_encode($this->jsOptions());
		$js    = array();
		$js[]  = "\tvar $ref = new fabrikFullcalendar('$ref', $json);";
		$js[]  = "\tFabrik.addBlock('" . $ref . "', $ref);";
		$js[]  = "" . $model->getFilterJs();
		$js    = implode("\n", $js);

		$srcs   = FabrikHelperHTML::framework();
		$srcs[] = 'media/com_fabrik/js/listfilter.js';
		$srcs[] = 'plugins/fabrik_visualization/fullcalendar/fullcalendar.js';

		$shim = $model->getShim();

		$shim['viz/fullcalendar/libs/fullcalendar/fullcalendar'] = (object) array('deps' =>
			array('fab/fabrik', 'fab/lib/moment/moment')
		);

		$shim['viz/fullcalendar/fullcalendar'] = (object) array('deps' =>
			array('viz/fullcalendar/libs/fullcalendar/fullcalendar')
		);

		FabrikHelperHTML::iniRequireJs($shim);
		FabrikHelperHTML::script($srcs, $js);
	}

	/**
	 * Create JS JLayout data
	 *
	 * @return void
	 */
	private function jLayouts()
	{
		FabrikHelperHTML::jLayoutJs(
			'fabrik-visualization-fullcalendar-viewbuttons',
			'fabrik-visualization-fullcalendar-viewbuttons',
			(object) array(),
			array(JPATH_PLUGINS . '/fabrik_visualization/fullcalendar/layouts/')
		);

		FabrikHelperHTML::jLayoutJs(
			'fabrik-visualization-fullcalendar-event-popup',
			'fabrik-visualization-fullcalendar-event-popup',
			(object) array(),
			array(JPATH_PLUGINS . '/fabrik_visualization/fullcalendar/layouts/')
		);

		FabrikHelperHTML::jLayoutJs(
			'fabrik-visualization-fullcalendar-viewevent',
			'fabrik-visualization-fullcalendar-viewevent',
			(object) array(),
			array(JPATH_PLUGINS . '/fabrik_visualization/fullcalendar/layouts/')
		);

		$modalOpts = array(
			'content' => '',
			'id' => 'fullcalendar_addeventwin',
			'title' => FText::_('PLG_VISUALIZATION_FULLCALENDAR_ADD_EVENT'),
			'modal' => false,
			'expandable' => true
		);

		FabrikHelperHTML::jLayoutJs(
			'fullcalendar_addeventwin',
			'fabrik-modal',
			(object) $modalOpts
		);

		$modalOpts = array(
			'content' => '',
			'id' => 'fullcalendar_chooseeventwin',
			'title' => FText::_('PLG_VISUALIZATION_FULLCALENDAR_PLEASE_SELECT'),
			'modal' => false,
			'expandable' => true
		);

		$srcs[] = 'media/com_fabrik/js/listfilter.js';
		$srcs[] = 'plugins/fabrik_visualization/fullcalendar/fullcalendar.js';

		FabrikHelperHTML::iniRequireJs($model->getShim());
		FabrikHelperHTML::script($srcs, $js);

		// Add our css
		FabrikHelperHTML::stylesheetFromPath('plugins/fabrik_visualization/fullcalendar/fullcalendar.css');

		$viewName = $this->getName();
		$this->params = $model->getParams();
		$tpl = $params->get('calendar_layout', $tpl);
		$tmplpath = JPATH_ROOT . '/plugins/fabrik_visualization/fullcalendar/views/fullcalendar/tmpl/' . $tpl;
		$this->_setPath('template', $tmplpath);
		FabrikHelperHTML::stylesheetFromPath('plugins/fabrik_visualization/fullcalendar/views/fullcalendar/tmpl/' . $tpl . '/template.css');

		// Adding custom.css, just for the heck of it
		FabrikHelperHTML::stylesheetFromPath('plugins/fabrik_visualization/fullcalendar/views/fullcalendar/tmpl/' . $tpl . '/custom.css');

		$document = JFactory::getDocument();
		$lib = COM_FABRIK_LIVESITE . 'plugins/fabrik_visualization/fullcalendar/libs/fullcalendar/';
		$document->addScript($lib . 'lib/moment.min.js');
//		$document->addScript('//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js');
		$document->addScript($lib . 'fullcalendar.js');
		$document->addScript($lib . 'lang/' . FabrikWorker::getShortLang() . '.js');

		return parent::display();
	}

	/**
	 * Choose which list to add an event to
	 *
	 * @return  void
	 */

	public function chooseaddevent()
	{
		$app = JFactory::getApplication();
		$input = $app->input;
		$this->setLayout('chooseaddevent');
		$model = $this->getModel();
		$usersConfig = JComponentHelper::getParams('com_fabrik');
		$model->setId($input->getInt('id', $usersConfig->get('visualizationid', $input->getInt('visualizationid', 0))));
		$rows = $model->getEventLists();
		$calendar = $model->getVisualization();
		$options = array();
		$options[] = JHTML::_('select.option', '', FText::_('PLG_VISUALIZATION_FULLCALENDAR_PLEASE_SELECT'));

		$model->getEvents();
		$config = JFactory::getConfig();
		$prefix = $config->get('dbprefix');
		$attribs = 'class="inputbox" size="1" ';
		$options = array_merge($options, $rows);
		$this->_eventTypeDd = JHTML::_('select.genericlist', $options, 'event_type', $attribs, 'value', 'text', '', 'fabrik_event_type');

		/*
		 * Tried loading in iframe and as an ajax request directly - however
		 * in the end decided to set a call back to the main calendar object (via the package manager)
		 * to load up the new add event form
		 */
		$ref = $model->getJSRenderContext();
		$script = array();
		//$script[] = "window.addEvent('fabrik.loaded', function() {";
		$script[] = "document.id('fabrik_event_type').addEvent('change', function(e) {";
		$script[] = "var fid = e.target.get('value');";
		$script[] = "var o = ({'id':'','listid':fid,'rowid':0});";
		$script[] = "o.title = Joomla.JText._('PLG_VISUALIZATION_FULLCALENDAR_ADD_EVENT');";

		$script[] = "Fabrik.blocks['" . $ref . "'].addEvForm(o);";
		$script[] = "Fabrik.Windows.chooseeventwin.close();";
		$script[] = "});";

		echo '<h2>' . FText::_('PLG_VISUALIZATION_FULLCALENDAR_PLEASE_CHOOSE_AN_EVENT_TYPE') . ':</h2>';
		echo $this->_eventTypeDd;
		FabrikHelperHTML::addScriptDeclaration(implode("\n", $script));
	}
}
