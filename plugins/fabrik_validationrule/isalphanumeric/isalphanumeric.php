<?php
/**
* @package Joomla
* @subpackage Fabrik
* @copyright Copyright (C) 2005 Rob Clayburn. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

//require the abstract plugin class
require_once(COM_FABRIK_FRONTEND.DS.'models'.DS.'plugin.php');
require_once(COM_FABRIK_FRONTEND.DS.'models'.DS.'validation_rule.php');

class plgFabrik_ValidationruleIsalphanumeric extends plgFabrik_Validationrule
{
	var $_pluginName = 'isalphanumeric';

	/** @param string classname used for formatting error messages generated by plugin */
	var $_className = 'notempty isalphanumeric';

	/**
	 * validate the elements data against the rule
	 * @param string data to check
	 * @param object element
	 * @param int plugin sequence ref
	 * @return bol true if validation passes, false if fails
	 */

	function validate($data, &$element, $c)
	{
		//could be a dropdown with multivalues
		if (is_array($data)) {
			$data = implode('', $data);
		}
		if ($data == '') {
			return false;
		}
		preg_match('/[^\w\s]/', $data, $matches); //not a word character
		return empty($matches) ? true : false;
	}

}
?>