<?php
/**
* @package Joomla
* @subpackage Fabrik
* @copyright Copyright (C) 2005 Rob Clayburn. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport('joomla.application.component.model');
/**
 * @package fabrik
 * @Copyright (C) Rob Clayburn
 * @version $Revision: 1.3 $
 */

require_once(JPATH_SITE.DS.'components'.DS.'com_fabrik'.DS.'models'.DS.'plugin.php');

class plgFabrik_Validationrule extends FabrikPlugin
{

	var $_pluginName = null;

	var $_counter = null;

	var $pluginParams = null;

	var $_rule = null;

	/**
	 * validate the elements data against the rule
	 * @param string data to check
	 * @param object element
	 * @param int plugin sequence ref
	 * @return bol true if validation passes, false if fails
	 */

	function validate($data, &$element, $c)
	{
		return true;
	}

	/**
	 * looks at the validation condition & evaulates it
	 * if evaulation is true then the validation rule is applied
	 *@return bol apply validation
	 */

	function shouldValidate($data, $c)
	{
		$params =& $this->getParams();
		$post	= JRequest::get('post');
		$v = $params->get($this->_pluginName .'-validation_condition', '', '_default', 'array', $c);

		if (!array_key_exists($c, $v)) {
			return true;
		}
		$condition = $v[$c];
		if ($condition == '') {
			return true;
		}

		$w = new FabrikWorker();

		// $$$ rob merge join data into main array so we can access them in parseMessageForPlaceHolder()
		$joindata = JArrayHelper::getValue($post, 'join', array());
		foreach ($joindata as $joinid => $joind) {
			foreach ($joind as $k => $v) {
				if ($k !== 'rowid') {
					$post[$k] = $v;
				}
			}
		}

		$condition = trim($w->parseMessageForPlaceHolder($condition, $post));
		// $$$ hugh - this screws things up if it's more than one line of code.
		/*
		if (substr(strtolower($condition ), 0, 6) !== 'return') {
			$condition = "return $condition";
		}
		*/

		$res = @eval($condition);
		if (is_null($res)) {
			return true;
		}
		return $res;
	}

	function getParams()
	{
		return $this->elementModel->getParams();
	}

 	function getPluginParams()
	{
		if (!isset($this->pluginParams)) {
			$this->pluginParams = $this->_loadPluginParams();
		}
		return $this->pluginParams;
	}

	function _loadPluginParams()
	{
		return $this->elementModel->getParams();
	}

	function &getValidationRule()
	{
		if (!$this->_rule) {
			JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_fabrik'.DS.'tables');
			$row = FabTable::getInstance('Validationrule', 'FabrikTable');
			$row->load($this->_id);
			$this->_rule = $row;
		}
		return $this->_rule;
	}


	/**
	 * get the warning message
	 *
	 * @return string
	 */

	function getMessage($c)
	{
		$params = $this->getParams();
		$v = $params->get($this->_pluginName .'-message', JText::_('COM_FABRIK_FAILED_VALIDATION'), '_default', 'array', $c);
		return $v[$c];
	}

}
?>
