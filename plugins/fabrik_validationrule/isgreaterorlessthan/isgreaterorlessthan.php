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

class plgFabrik_validationruleIsgreaterorlessthan extends plgFabrik_Validationrule
{

	protected $pluginName = 'isgreaterorlessthan';

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
		// Could be a dropdown with multivalues
		if (is_array($data))
		{
			$data = implode('', $data);
		}
		$params = $this->getParams();
		$formdata = $elementModel->getForm()->formData;
		$cond = $params->get('isgreaterorlessthan-greaterthan');
		$cond = $cond[$pluginc];
		switch ($cond)
		{
			case '0':
				$cond = '<';
				break;
			case '1':
				$cond = '>';
				break;
			case '2':
				$cond = '<=';
				break;
			case '3':
				$cond = '>=';
				break;
			case '4':
			default:
				$cond = '==';
				break;
		}
		$otherElementModel = $this->getOtherElement($elementModel, $pluginc);
		$otherFullName = $otherElementModel->getFullName(false, true, false);
		$compare = $otherElementModel->getValue($formdata, $repeatCounter);
		if ($this->allowEmpty($elementModel, $pluginc) && ($data === '' || $compare === ''))
		{
			return true;
		}
		$res = $elementModel->greaterOrLessThan($data, $cond, $compare);
		return $res;
	}

	/**
	 * Does the validation allow empty value?
	 * Default is false, can be overrideen on per-validation basis (such as isnumeric)
	 *
	 * @param   object  $elementModel  element model
	 * @param   int     $pluginc       validation render order
	 *
	 * @return	bool
	 */

	protected function allowEmpty($elementModel, $pluginc)
	{
		$params = $this->getParams();
		$allow_empty = $params->get('isgreaterorlessthan-allow_empty');
		$allow_empty = $allow_empty[$pluginc];
		return $allow_empty == '1';
	}

	/**
	 * Get the other element to compare this elements data against
	 *
	 * @param   object  $elementModel  element model
	 * @param   int     $pluginc       validation render order
	 *
	 * @return  object element model
	 */

	private function getOtherElement($elementModel, $pluginc)
	{
		$params = $this->getParams();
		$otherfield = (array) $params->get('isgreaterorlessthan-comparewith', array());
		$otherfield = $otherfield[$pluginc];
		return FabrikWorker::getPluginManager()->getElementPlugin($otherfield);
	}

}
