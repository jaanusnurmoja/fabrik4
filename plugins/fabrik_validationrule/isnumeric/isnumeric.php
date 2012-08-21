<?php
/**
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

// Require the abstract plugin classes
require_once COM_FABRIK_FRONTEND . '/models/validation_rule.php';

class plgFabrik_ValidationruleIsNumeric extends plgFabrik_Validationrule
{

	var $_pluginName = 'isnumeric';

	/** @param string classname used for formatting error messages generated by plugin */
	var $_className = 'notempty isnumeric';

	/**
	 * If true uses icon of same name as validation, otherwise uses png icon specified by $icon
	 *
	 *  @var bool
	 */
	protected $icon = 'isnumeric';

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
		// Could be a dropdown with multivalues
		if (is_array($data))
		{
			$data = implode('', $data);
		}
		$params = $this->getParams();
		$allow_empty = $params->get('isnumeric-allow_empty');
		$allow_empty = $allow_empty[$pluginc];
		if ($allow_empty == '1' and empty($data))
		{
			return true;
		}
		return is_numeric($elementModel->unNumberFormat($data));
	}

	/**
	 * Does the validation allow empty value?
	 * Default is false, can be overrideen on per-validation basis (such as isnumeric)
	 *
	 * @param   object  $elementModel  element model
	 * @param   int     $pluginc       validation render order
	 *
	 * @return bool
	 */

	protected function allowEmpty($elementModel, $pluginc)
	{
		$params = $this->getParams();
		$allow_empty = $params->get('isnumeric-allow_empty');
		$allow_empty = $allow_empty[$pluginc];
		return $allow_empty == '1';
	}
}
