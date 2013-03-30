<?php
/**
 * Not Empty Validation Rule
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.validationrule.notempty
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

// Require the abstract plugin class
require_once COM_FABRIK_FRONTEND . '/models/validation_rule.php';

/**
 * Not Empty Validation Rule
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.validationrule.notempty
 * @since       3.0
 */

class PlgFabrik_ValidationruleNotempty extends PlgFabrik_Validationrule
{

	/**
	 * Plugin name
	 *
	 * @var string
	 */
	protected $pluginName = 'notempty';

	/**
	 * Validate the elements data against the rule
	 *
	 * @param   string  $data           To check
	 * @param   object  &$elementModel  Element Model
	 * @param   int     $pluginc        Plugin sequence ref
	 * @param   int     $repeatCounter  Repeat group counter
	 *
	 * @return  bool  true if validation passes, false if fails
	 */

	public function validate($data, &$elementModel, $pluginc, $repeatCounter)
	{
		$ok = $elementModel->dataConsideredEmpty($data, $repeatCounter);
		return !$ok;
	}

}
