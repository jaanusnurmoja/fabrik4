<?php
/**
 * Regular Expression Validation Rule
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.validationrule.regex
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

// Require the abstract plugin class
require_once COM_FABRIK_FRONTEND . '/models/validation_rule.php';

/**
 * Regular Expression Validation Rule
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.validationrule.regex
 * @since       3.0
 */

class PlgFabrik_ValidationruleRegex extends PlgFabrik_Validationrule
{

	/**
	 * Plugin name
	 *
	 * @var string
	 */
	protected $pluginName = 'regex';

	/**
	 * If true uses icon of same name as validation, otherwise uses png icon specified by $icon
	 *
	 *  @var bool
	 */
	protected $icon = 'notempty';

	/**
	 * Validate the elements data against the rule
	 *
	 * @param   string  $data           to check
	 * @param   object  &$elementModel  element Model
	 * @param   int     $pluginc        plugin sequence ref
	 * @param   int     $repeatCounter  repeat group counter
	 *
	 * @return  bool  true if validation passes, false if fails
	 */

	public function validate($data, &$elementModel, $pluginc, $repeatCounter)
	{
		// For multiselect elements
		if (is_array($data))
		{
			$data = implode('', $data);
		}
		$params = $this->getParams();
		$domatch = $params->get('regex-match');
		$domatch = $domatch[$pluginc];
		if ($domatch)
		{
			$matches = array();
			$v = (array) $params->get('regex-expression');
			$v = JArrayHelper::getValue($v, $pluginc);
			$v = trim($v);
			$found = empty($v) ? true : preg_match($v, $data, $matches);
			return $found;
		}
		return true;
	}

	/**
	 * Checks if the validation should replace the submitted element data
	 * if so then the replaced data is returned otherwise original data returned
	 *
	 * @param   string  $data           original data
	 * @param   model   &$elementModel  element model
	 * @param   int     $pluginc        validation plugin counter
	 * @param   int     $repeatCounter  repeat group counter
	 *
	 * @return  string	original or replaced data
	 */

	public function replace($data, &$elementModel, $pluginc, $repeatCounter)
	{
		$params = $this->getParams();
		$domatch = (array) $params->get('regex-match');
		$domatch = JArrayHelper::getValue($domatch, $pluginc);
		if (!$domatch)
		{
			$v = (array) $params->get($this->pluginName . '-expression');
			$v = JArrayHelper::getValue($v, $pluginc);
			$v = trim($v);
			$replace = (array) $params->get('regex-replacestring');
			$return = empty($v) ? $data : preg_replace($v, JArrayHelper::getValue($replace, $pluginc), $data);
			return $return;
		}
		return $data;
	}
}
