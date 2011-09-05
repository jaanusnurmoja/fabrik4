<?php

/**
 * @package		Joomla
 * @subpackage	Fabik
 * @copyright	Copyright (C) 2005 - 2008 Pollen 8 Design Ltd. All rights reserved.
 * @license		GNU/GPL
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport('joomla.application.component.view');

class FabrikViewList extends JView{

	public $isMambot 	= null;

	protected function getManagementJS($data = array())
	{
		$app = JFactory::getApplication();
		$menuItem = $app->getMenu('site')->getActive();
		$Itemid	= is_object($menuItem) ? $menuItem->id : 0;
		$model = $this->getModel();
		$item = $model->getTable();
		$listid = $model->getId();
		$formModel = $model->getFormModel();
		$elementsNotInTable = $formModel->getElementsNotInTable();

		if ($model->requiresSlimbox()) {
			FabrikHelperHTML::slimbox();
		}
		if ($model->requiresMocha()) {
			FabrikHelperHTML::mocha();
		}
		FabrikHelperHTML::script('media/com_fabrik/js/list.js', true);
		$tmpl = $this->get('tmpl');
		$this->assign('tmpl', $tmpl);

		$this->get('ListCss');
		// check for a custom js file and include it if it exists
		$aJsPath = JPATH_SITE.DS."components".DS."com_fabrik".DS."views".DS."list".DS."tmpl".DS.$tmpl.DS."javascript.js";
		if (JFile::exists($aJsPath)) {
			FabrikHelperHTML::script('components/com_fabrik/views/list/tmpl/'.$tmpl.'/javascript.js', true);
		}

		$origRows = $this->rows;
		$this->rows = array(array());

		$tmpItemid = !isset($Itemid) ?  0 : $Itemid;

		$this->_c = 0;
		$this->_row = new stdClass();
		$script = '';

		$opts = new stdClass();
		$opts->admin = $app->isAdmin();
		$opts->ajax = (int)$model->isAjax();
		$opts->filterMethod = $this->filter_action;
		$opts->form = 'listform_' . $listid;
		$opts->headings = $model->_jsonHeadings();
		$labels = $this->headings;
		foreach ($labels as &$l) {
			$l = strip_tags($l);
		}
		$opts->labels 		= $labels;
		$opts->primaryKey = $item->db_primary_key;
		$opts->Itemid 		= $tmpItemid;
		$opts->formid 		= $model->getFormModel()->getId();
		$opts->canEdit 		= $model->canEdit() ? "1" : "0";
		$opts->canView 		= $model->canView() ? "1" : "0";
		$opts->page 			= JRoute::_('index.php');
		$opts->isGrouped = $this->isGrouped;
		$opts->formels		= $elementsNotInTable;
		$opts->actionMethod = $model->getParams()->get('actionMethod');
		$opts->data = $data;
		//if table data starts as empty then we need the html from the row
		// template otherwise we can't add a row to the table

		if ($model->isAjax()) {
			ob_start();
			$this->_row = new stdClass();
			$this->_row->id = '';
			$this->_row->class = 'fabrik_row';
			require(COM_FABRIK_FRONTEND.DS.'views'.DS.'list'.DS.'tmpl'.DS.$tmpl.DS.'default_row.php');
			$opts->rowtemplate = ob_get_contents();
			ob_end_clean();
		}
		//$$$rob if you are loading a table in a window from a form db join select record option
		// then we want to know the id of the window so we can set its showSpinner() method
		$opts->winid = JRequest::getVar('winid', '');
		$opts = json_encode($opts);

		JText::script('COM_FABRIK_PREV');
		JText::script('COM_FABRIK_SELECT_ROWS_FOR_DELETION');
		JText::script('JYES');
		JText::script('JNO');
		JText::script('COM_FABRIK_SELECT_COLUMNS_TO_EXPORT');
		JText::script('COM_FABRIK_INCLUDE_FILTERS');
		JText::script('COM_FABRIK_INCLUDE_DATA');
		JText::script('COM_FABRIK_INCLUDE_RAW_DATA');
		JText::script('COM_FABRIK_INLCUDE_CALCULATIONS');
		JText::script('COM_FABRIK_EXPORT');
		JText::script('COM_FABRIK_START');
		JText::script('COM_FABRIK_NEXT');
		JText::script('COM_FABRIK_END');
		JText::script('COM_FABRIK_PAGE');
		JText::script('COM_FABRIK_OF');
		JText::script('COM_FABRIK_LOADING');
		JText::script('COM_FABRIK_RECORDS');
		JText::script('COM_FABRIK_SAVING_TO');
		JText::script('COM_FABRIK_CONFIRM_DROP');
		JText::script('COM_FABRIK_CONFIRM_DELETE');
		JText::script('COM_FABRIK_NO_RECORDS');
		JText::script('COM_FABRIK_CSV_COMPLETE');
		JText::script('COM_FABRIK_CSV_DOWNLOAD_HERE');
		JText::script('COM_FABRIK_CONFIRM_DELETE');
		JText::script('COM_FABRIK_CSV_DOWNLOADING');
		JText::script('COM_FABRIK_FILE_TYPE');
		//keyboard short cuts
		JText::script('COM_FABRIK_LIST_SHORTCUTS_ADD');
		JText::script('COM_FABRIK_LIST_SHORTCUTS_EDIT');
		JText::script('COM_FABRIK_LIST_SHORTCUTS_DELETE');
		JText::script('COM_FABRIK_LIST_SHORTCUTS_FILTER');

		$script .= "\n" . "var list = new FbList($listid,";
		$script .= $opts;
		$script .= "\n" . ");";
		$script .= "\n" . "Fabrik.addBlock('list_{$listid}', list);";

		//add in plugin objects
		$params = $model->getParams();
		//$activePlugins = $params->get('plugins');
		$pluginManager =& $model->getPluginManager();
		$c = 0;

		$pluginManager->runPlugins('onLoadJavascriptInstance', $model, 'list');
		$aObjs = $pluginManager->_data;

		$script .= "\nlist.addPlugins([\n";
		$script .= "  " . implode(",\n  ", $aObjs);
		$script .= "\n]);\n";

		//@since 3.0 inserts content before the start of the list render (currently on f3 tmpl only)
		$pluginManager->runPlugins('onGetContentBeforeList', $model, 'list');
		$this->assign('pluginBeforeList', $pluginManager->_data);

		$script = "
		head.ready(function() {
		".$model->filterJs."
		$script
		})";
		FabrikHelperHTML::addScriptDeclaration($script);
		$this->getElementJs();
		//reset data back to original settings
		$this->rows = $origRows;
	}

	protected function getElementJs()
	{
		$model =& $this->getModel();
		$model->getElementJs();
	}

	/**
	 * display the template
	 *
	 * @param sting $tpl
	 */

	function display($tpl = null)
	{
		FabrikHelperHTML::framework();
		if ($this->getLayout() == '_advancedsearch') {
			$this->advancedSearch($tpl);
			return;
		}

		global $_PROFILER;
		$app = JFactory::getApplication();
		require_once(COM_FABRIK_FRONTEND.DS.'views'.DS.'modifiers.php');
		$user = JFactory::getUser();

		$model = $this->getModel();
		$document = JFactory::getDocument();

		$item = $model->getTable();
		$model->render();

		$w = new FabrikWorker();

		$data = $this->get('Data');
		//add in some styling short cuts

		$c = 0;
		$form = $model->getFormModel();
		$nav =& $this->get('Pagination');
		foreach ($data as $groupk => $group) {
			$last_pk = '';
			$last_i = 0;
			$num_rows = 1;
			foreach (array_keys($group) as $i) {
				$o = new stdClass();
				// $$$ rob moved merge wip code to FabrikModelTable::formatForJoins() - should contain fix for pagination
				$o->data = $data[$groupk][$i];
				$o->cursor = $num_rows + $nav->limitstart;
				$o->total = $nav->total;
				$o->id = "list_".$item->id."_row_".@$o->data->__pk_val;
				$o->class = "fabrik_row oddRow".$c;
				$data[$groupk][$i] = $o;
				$c = 1-$c;
				$num_rows++;
			}
		}
		$groups =& $form->getGroupsHiarachy();
		foreach ($groups as $groupModel) {
			$elementModels =& $groupModel->getPublishedElements();
			foreach ($elementModels as $elementModel) {
				$elementModel->setContext($groupModel, $form, $model);
				$col = $elementModel->getFullName(false, true, false);
				$col .= "_raw";
				$rowclass = $elementModel->getParams()->get('use_as_row_class');
				if ($rowclass == 1) {
					foreach ($data as $groupk => $group) {
						for ($i=0; $i<count($group); $i++) {
							$c = preg_replace('/[^A-Z|a-z|0-9]/', '-', $data[$groupk][$i]->data->$col);
							// $$$ rob 24/02/2011 can't have numeric class names so prefix with element name
							if (is_numeric($c)) {
								$c = $elementModel->getElement()->name . $c;
							}
							$data[$groupk][$i]->class .= " " . $c;
						}
					}
				}
			}
		}
		$this->rows =& $data;
		reset($this->rows);

		$firstRow = current($this->rows); //cant use numeric key '0' as group by uses groupd name as key
		$this->assign('requiredFiltersFound', $this->get('RequiredFiltersFound'));
		$this->nodata = (empty($this->rows) || (count($this->rows) == 1 && empty($firstRow)) || !$this->requiredFiltersFound) ? true : false;
		$this->tableStyle = $this->nodata ? 'display:none' : '';
		$this->emptyStyle = $this->nodata ? '' : 'display:none';
		$params = $model->getParams();

		if (!$model->canPublish()) {
			echo JText::_('COM_FABRIK_LIST_NOT_PUBLISHED');
			return false;
		}
		if (!$model->canView()) {
			echo JText::_('JERROR_ALERTNOAUTHOR');
			return false;
		}

		if (!class_exists('JSite'))
		{
			require_once(JPATH_ROOT.DS.'includes'.DS.'application.php');
		}
		$menus = JSite::getMenu();
		$menu	= $menus->getActive();

		// because the application sets a default page title, we need to get it
		// right from the menu item itself
		//if there is a menu item available AND the form is not rendered in a content plugin or module
		if (is_object($menu) && !$this->isMambot) {
			$menu_params = new JParameter($menu->params);
			if (!$menu_params->get('page_title') || $menu_params->get('show_page_title') == 0) {
				$params->set('page_title', '');
				$params->set('show_page_title', 0);
			} else {
				$params->set('page_title', $menu_params->get('page_title'));
				$params->set('show_page_title', $menu_params->get('show_page_title', 0));
			}

		} else {
			$params->set('show_page_title', JRequest::getInt('show_page_title', 0));
			$params->set('page_title', JRequest::getVar('title', ''));
			$params->set('show-title', JRequest::getInt('show-title', 1));
		}

		if (!$this->isMambot) {
			$document->setTitle($w->parseMessageForPlaceHolder($params->get('page_title'), $_REQUEST));
		}
		/** depreciated (keep incase ppl use them in old tmpls**/
		$this->table 					= new stdClass();
		$this->table->label 	= $w->parseMessageForPlaceHolder($item->label, $_REQUEST);
		$this->table->intro 	= $w->parseMessageForPlaceHolder($item->introduction);
		$this->table->id			= $item->id;
		$this->table->db_table_name = $item->db_table_name;
		/** end **/
		$this->assign('list', $this->table);
		$this->group_by	= $item->group_by;
		$this->form = new stdClass();
		$this->form->id = $item->id;
		$this->formid = 'listform_'.$item->id;
		$form = $model->getFormModel();
		$this->table->action = $this->get('TableAction');
		$this->showCSV 				= $model->canCSVExport();
		$this->showCSVImport	= $model->canCSVImport();
		$this->assignRef('navigation', $nav);
		$this->nav = JRequest::getInt('fabrik_show_nav', $params->get('show-table-nav', 1)) ? $nav->getListFooter($item->id, $this->get('tmpl')) : '';
		$this->nav = '<div class="fabrikNav">'.$this->nav.'</div>';
		$this->fabrik_userid = $user->get('id');
		$this->canDelete = $model->deletePossible() ? true : false;
		$tmpl = $this->get('tmpl');
		// 3.0 observed in list.js & html moved into fabrik_actions rollover
		$this->showPDF = $params->get('pdf', 0);
		if ($this->showPDF) {
			$this->pdfLink = FabrikHelperHTML::pdfIcon($model, $params);
		}
		$this->emptyLink = $model->canEmpty() ? '#' : '';
		$this->csvImportLink = $this->showCSVImport ? JRoute::_("index.php?option=com_fabrik&view=import&filetype=csv&listid=" . $item->id) : '';
		$this->showAdd = $model->canAdd();
		if ($this->showAdd) {
			if ($params->get('show-table-add', 1)) {
				$this->assign('addRecordLink', $this->get('AddRecordLink'));
			}
			else {
				$this->showAdd = false;
			}
		}

		$this->showRSS = $params->get('rss', 0) == 0 ? 0 : 1;
		if ($this->showRSS) {
			$this->rssLink = $model->getRSSFeedLink();
			if ($this->rssLink != '') {
				$attribs = array('type' => 'application/rss+xml', 'title' => 'RSS 2.0');
				$document->addHeadLink($this->rssLink, 'alternate', 'rel', $attribs);
			}
		}
		list($this->headings, $groupHeadings, $this->headingClass, $this->cellClass) = $this->get('Headings');
		$this->assignRef('groupByHeadings', $this->get('GroupByHeadings'));
		$this->filter_action = $this->get('FilterAction');
		JDEBUG ? $_PROFILER->mark('fabrik getfilters start') : null;
		$this->filters =& $model->getFilters('listform_'. $item->id);
		$this->assign('clearFliterLink', $this->get('clearButton'));
		JDEBUG ? $_PROFILER->mark('fabrik getfilters end') : null;
		//$form->getGroupsHiarachy();
		$this->assign('showFilters', (count($this->filters) > 0 && $params->get('show-table-filters', 1) !== 0) && JRequest::getVar('showfilters', 1) == 1 ?  1 : 0);

		$this->assign('emptyDataMessage', $this->get('EmptyDataMsg'));
		$this->assignRef('groupheadings', $groupHeadings);
		$this->assignRef('calculations', $this->_getCalculations($this->headings));
		$this->assign('isGrouped', !($this->get('groupBy') == ''));
		$this->assign('colCount', count($this->headings));
		$this->assignRef('grouptemplates', $model->grouptemplates);
		$this->assignRef('params', $params);
		$this->_loadTemplateBottom();
		$this->getManagementJS($this->rows);

		// get dropdown list of other tables for quick nav in admin
		$this->tablePicker = $app->isAdmin() ? FabrikHelperHTML::tableList($this->table->id) : '';

		// 3.0 buttons now rendered in fabrik_action <ul>
		//$this->pluginButtons = $model->getPluginButtons();

		//force front end templates
		$this->_basePath = COM_FABRIK_FRONTEND.DS.'views';

		$this->addTemplatePath($this->_basePath.DS.$this->_name.DS.'tmpl'.DS.$tmpl);
		$this->addTemplatePath(JPATH_SITE.DS.'templates'.DS.$app->getTemplate().DS.'html'.DS.'com_fabrik'.DS.'list'.DS.$tmpl);

		$text = $this->loadTemplate();
		if ($params->get('process-jplugins')) {
			$opt = JRequest::getVar('option');
			JRequest::setVar('option', 'com_content');
			jimport('joomla.html.html.content');
			$text .= '{emailcloak=off}';
			$text = JHTML::_('content.prepare', $text);
			$text = preg_replace('/\{emailcloak\=off\}/', '', $text);
			JRequest::setVar('option', $opt);
		}

		JDEBUG ? $_PROFILER->mark('end fabrik display') : null;
		// $$$ rob 09/06/2011 no need for isMambot test? should use ob_start() in module / plugin to capture the output
		echo $text;
	}

	/**
	 * get the table calculations
	 */

	protected function _getCalculations($aCols)
	{
		$aData = array();
		$found = false;
		$model = $this->getModel();
		$modelCals = $model->getCalculations();

		foreach ($aCols as $key=>$val) {
			$calc = '';
			$res = '';
			$oCalcs = new stdClass();
			$oCalcs->grouped = array();

			if (array_key_exists($key, $modelCals['sums'])) {
				$found = true;
				$res = $modelCals['sums'][$key];
				$calc .= $res;
				$tmpKey = str_replace(".", "___", $key) . "_calc_sum";
				$oCalcs->$tmpKey = $res;
			}
			if (array_key_exists($key . '_obj', $modelCals['sums'])) {
				$found = true;
				$res = $modelCals['sums'][$key. '_obj'];
				foreach ($res as $k => $v) {
					if ($k != 'calc') {
						@$oCalcs->grouped[$k] .= "<span class=\"calclabel\">".$v->calLabel . ":</span> " . $v->value . "<br />";
					}
				}
			}

			if (array_key_exists($key, $modelCals['avgs'])) {
				$found = true;
				$res = $modelCals['avgs'][$key];
				$calc .= $res;
				$tmpKey = str_replace(".", "___", $key) . "_calc_average";
				$oCalcs->$tmpKey = $res;
			}

			if (array_key_exists($key . '_obj', $modelCals['avgs'])) {
				$found = true;
				$res = $modelCals['avgs'][$key. '_obj'];
				foreach ($res as $k => $v) {
					if ($k != 'calc') {
						@$oCalcs->grouped[$k] .=  "<span class=\"calclabel\">".$v->calLabel . ":</span> " . $v->value . "<br />";
					}
				}
			}

			if (array_key_exists($key. '_obj', $modelCals['medians'])) {
				$found = true;
				$res = $modelCals['medians'][$key. '_obj'];
				foreach ($res as $k => $v) {
					if ($k != 'calc') {
						@$oCalcs->grouped[$k] .=  "<span class=\"calclabel\">".$v->calLabel . ":</span> " . $v->value . "<br />";
					}
				}
			}

			if (array_key_exists($key, $modelCals['medians'])) {
				$found = true;
				$res = $modelCals['medians'][$key];
				$calc .= $res;
				$tmpKey = str_replace(".", "___", $key) . "_calc_median";
				$oCalcs->$tmpKey = $res;
			}

			if (array_key_exists($key. '_obj', $modelCals['count'])) {
				$found = true;
				$res = $modelCals['count'][$key. '_obj'];
				foreach ($res as $k => $v) {
					if ($k != 'calc') {
						@$oCalcs->grouped[$k] .= "<span class=\"calclabel\">".$v->calLabel . ":</span> " . $v->value . "<br />";
					}
				}
			}

			if (array_key_exists($key, $modelCals['count'])) {
				$res = $modelCals['count'][$key];
				$calc .= $res;
				$tmpKey = str_replace(".", "___", $key) . "_calc_count";
				$oCalcs->$tmpKey = $res;
				$found = true;
			}
			$key = str_replace(".", "___", $key);
			$oCalcs->calc = $calc;
			$aData[$key] = $oCalcs;
		}
		$this->assign('hasCalculations', $found);
		return $aData;
	}

	/**
	 * get the table's forms hidden fields
	 * @return string hidden fields
	 */

	protected function _loadTemplateBottom()
	{
		$app = JFactory::getApplication();
		$menuItem = $app->getMenu('site')->getActive();
		$Itemid	= is_object($menuItem) ? $menuItem->id : 0;
		$model =& $this->getModel();
		$item =& $model->getTable();

		$reffer = str_replace('&', '&amp;', JRequest::getVar('REQUEST_URI', '', 'server'));
		$this->hiddenFields = array();

		$this->hiddenFields[] = "<input type=\"hidden\" name=\"option\" value=\"".JRequest::getCmd('option', 'com_fabrik'). "\" />";
		$this->hiddenFields[] = "<input type=\"hidden\" name=\"orderdir\" value=\"\" />";
		$this->hiddenFields[] = "<input type=\"hidden\" name=\"orderby\" value=\"\" />";

		//$$$rob if the content plugin has temporarily set the view to table then get view from origview var, if that doesn't exist
		//revert to view var. Used when showing table in article/blog layouts
		$view = JRequest::getVar('origview', JRequest::getVar('view', 'list'));
		$this->hiddenFields[] = "<input type=\"hidden\" name=\"view\" value=\"" . $view . "\" id = \"table_".$item->id."_view\" />";

		$this->hiddenFields[] = "<input type=\"hidden\" name=\"listid\" value=\"$item->id\"/>";
		$this->hiddenFields[] = "<input type=\"hidden\" name=\"Itemid\" value=\"$Itemid\"/>";
		//removed in favour of using list_{id}_limit dorop down box

		$this->hiddenFields[] = "<input type=\"hidden\" name=\"fabrik_referrer\" value=\"$reffer\" />";
		$this->hiddenFields[] = JHTML::_('form.token');

		$this->hiddenFields[] = "<input type=\"hidden\" name=\"format\" value=\"html\" />";
		//$packageId = JRequest::getInt('_packageId', 0);
		// $$$ rob testing for ajax table in module
		$packageId = $model->packageId;
		$this->hiddenFields[] = "<input type=\"hidden\" name=\"_packageId\" value=\"$packageId\" />";
		if ($app->isAdmin()) {
			$this->hiddenFields[] = "<input type=\"hidden\" name=\"task\" value=\"list.view\" id=\"task\" />";
		} else {
			$this->hiddenFields[] = "<input type=\"hidden\" name=\"task\" value=\"\" />";
		}
		$this->hiddenFields[] = "<input type=\"hidden\" name=\"fabrik_listplugin_name\" value=\"\" />";
		$this->hiddenFields[] = "<input type=\"hidden\" name=\"fabrik_listplugin_renderOrder\" value=\"\" />";

		// $$$ hugh - added this so plugins have somewhere to stuff any random data they need during submit
		$this->hiddenFields[] = "<input type=\"hidden\" name=\"fabrik_listplugin_options\" value=\"\" />";

		$this->hiddenFields[] = "<input type=\"hidden\" name=\"incfilters\" value=\"1\" />";
		$this->hiddenFields = implode("\n", $this->hiddenFields);
	}

	protected function advancedSearch($tpl)
	{
		$id = $this->getModel()->getState('list.id');
		$this->assign('tmpl', $this->get('tmpl'));
		FabrikHelperHTML::script('media/com_fabrik/js/advanced-search.js');
		$this->assignRef('rows', $this->get('advancedSearchRows'));
		$this->get('AdvancedSearchOpts');
		$action = JRequest::getVar('HTTP_REFERER', 'index.php?option=com_fabrik', 'server');
		$this->assign('action', $action);
		$this->assign('listid', $id);
		parent::display($tpl);
	}
}
?>