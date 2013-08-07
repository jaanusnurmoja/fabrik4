<?php
/**
 * Execute PHP Code on any list event
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.list.phpevents
 * @copyright   Copyright (C) 2005-2013 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

// Require the abstract plugin class
require_once COM_FABRIK_FRONTEND . '/models/plugin-list.php';

/**
 * Execute PHP Code on any list event
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.list.phpevents
 * @since       3.0
 */

class PlgFabrik_ListPhp_Events extends PlgFabrik_List
{
	/**
	 * onFiltersGot method - run after the list has created filters
	 *
	 * @param   object  $params  Plugin params
	 * @param   object  &$model  List
	 *
	 * @return bol currently ignored
	 */

	public function onFiltersGot($params, &$model)
	{
		return $this->doEvaluate($params->get('list_phpevents_onfiltersgot'), $model);
	}

	/**
	 * Called when the list HTML filters are loaded
	 *
	 * @param   object  $params  Plugin params
	 * @param   object  &$model  List model
	 *
	 * @return  void
	 */

	public function onMakeFilters($params, &$model)
	{
		return $this->doEvaluate($params->get('list_phpevents_onmakefilters'), $model);
	}

	/**
	 * Do the plug-in action
	 *
	 * @param   object  $params  Plugin parameters
	 * @param   object  &$model  List model
	 * @param   array   $opts    Custom options
	 *
	 * @return  bool
	 */

	public function process($params, &$model, $opts = array())
	{
		return $this->doEvaluate($params->get('list_phpevents_process'), $model);
	}

	/**
	 * Run before the list loads its data
	 *
	 * @param   object  $params  Plugin params
	 * @param   object  &$model  List model
	 *
	 * @return  void
	 */

	public function onPreLoadData($params, &$model)
	{
		return $this->doEvaluate($params->get('list_phpevents_onpreloaddata'), $model);
	}

	/**
	 * onGetData method
	 *
	 * @param   object  $params  Calling the plugin table/form
	 * @param   object  &$model  List model
	 *
	 * @return bol currently ignored
	 */

	public function onLoadData($params, &$model)
	{
		return $this->doEvaluate($params->get('list_phpevents_onloaddata'), $model);
	}

	/**
	 * Called when the model deletes rows
	 *
	 * @param   object  $params  Plugin params
	 * @param   object  &$model  List model
	 *
	 * @return  bool  false if fail
	 */

	public function onDeleteRows($params, &$model)
	{
		return $this->doEvaluate($params->get('list_phpevents_ondeleterows'), $model);
	}

	/**
	 * Prep the button if needed
	 *
	 * @param   object  $params  Plugin params
	 * @param   object  &$model  List model
	 * @param   array   &$args   Arguements
	 *
	 * @return  bool;
	 */

	public function button($params, &$model, &$args)
	{
		parent::button($params, $model, $args);
		return true;
	}

	/**
	 * Build the HTML for the plug-in button
	 *
	 * @return  string
	 */

	public function button_result()
	{
		return '';
	}

	/**
	 * Determine if we use the plugin or not
	 * both location and event criteria have to be match when form plug-in
	 *
	 * @param   object  &$model    Calling the plugin table/form
	 * @param   string  $location  Location to trigger plugin on
	 * @param   string  $event     Event to trigger plugin on
	 *
	 * @return  bool  true if we should run the plugin otherwise false
	 */

	public function canUse(&$model = null, $location = null, $event = null)
	{
		return true;
	}

	/**
	 * Can the plug-in select list rows
	 *
	 * @return  bool
	 */

	public function canSelectRows()
	{
		return false;
	}

	/**
	 * Return the javascript to create an instance of the class defined in formJavascriptClass
	 *
	 * @param   object  $params  Plugin parameters
	 * @param   object  $model   List model
	 * @param   array   $args    Array [0] => string table's form id to contain plugin
	 *
	 * @return bool
	 */

	public function onLoadJavascriptInstance($params, $model, $args)
	{
		return true;
	}

	public function onBuildQueryWhere($params, $model)
	{
		return $this->doEvaluate($params->get('list_phpevents_onbuildquerywhere'), $model);
	}

	/**
	 * Evaluate supplied PHP
	 *
	 * @param   string  $code    Php code
	 * @param   object  &$model  List model
	 *
	 * @return bool
	 */

	protected function doEvaluate($code, &$model)
	{
		$w = new FabrikWorker;
		$code = $w->parseMessageForPlaceHolder($code);
		if ($code != '')
		{
			if (eval($code) === false)
			{
				return false;
			}
		}
		return true;
	}
}
