<?php
/**
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

// Require the abstract plugin class
require_once COM_FABRIK_FRONTEND . '/models/validation_rule.php';

class PlgFabrik_ValidationruleSpecialChars extends PlgFabrik_Validationrule
{

	protected $pluginName = 'specialchars';

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
		$domatch = $params->get('specialchars-match');
		$domatch = $domatch[$pluginc];
		if ($domatch)
		{
			$v = $params->get('specalchars');
			$v = explode(',', $v[$pluginc]);
			foreach ($v as $c)
			{
				if (strstr($data, $c))
				{
					return false;
				}
			}
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
		$domatch = (array) $params->get('specialchars-match');
		$domatch = $domatch[$pluginc];
		if (!$domatch)
		{
			$v = $params->get($this->pluginName . '-expression');
			$replace = $params->get('specialchars-replacestring');
			$replace = $replace[$pluginc];
			if ($replace === '_default')
			{
				$replace = '';
			}
			$v = $params->get('specalchars');
			$v = explode(',', $v[$pluginc]);
			foreach ($v as $c)
			{
				$data = str_replace($c, $replace, $data);
			}
		}
		return $data;
	}
}
