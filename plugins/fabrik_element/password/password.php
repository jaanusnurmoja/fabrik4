<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.element.password
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

/**
 * Plugin element to render 2 fields to capture and confirm a password
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.element.password
 * @since       3.0
 */

class PlgFabrik_ElementPassword extends PlgFabrik_Element
{

	/**
	 * States if the element contains data which is recorded in the database
	 * some elements (eg buttons) dont
	 *
	 * @param   array  $data  posted data
	 *
	 * @return  bool
	 */

	public function recordInDatabase($data = null)
	{
		$element = $this->getElement();

		// If storing from inline edit then key may not exist
		if (!array_key_exists($element->name, $data))
		{
			return false;
		}
		if (trim($data[$element->name]) === '')
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	/**
	 * Manupulates posted form data for insertion into database
	 *
	 * @param   mixed  $val   this elements posted form data
	 * @param   array  $data  posted form data
	 *
	 * @return  mixed
	 */

	public function storeDatabaseFormat($val, $data)
	{
		jimport('joomla.user.helper');
		$salt = JUserHelper::genRandomPassword(32);
		$crypt = JUserHelper::getCryptedPassword($val, $salt);
		$val = $crypt . ':' . $salt;
		return $val;
	}

	/**
	 * Determines if the element can contain data used in sending receipts,
	 * e.g. fabrikfield returns true
	 *
	 * @deprecated - not used
	 *
	 * @return  bool
	 */

	public function isReceiptElement()
	{
		return true;
	}

	/**
	 * Draws the html form element
	 *
	 * @param   array  $data           to preopulate element with
	 * @param   int    $repeatCounter  repeat group counter
	 *
	 * @return  string	elements html
	 */

	public function render($data, $repeatCounter = 0)
	{
		$element = $this->getElement();
		$value = '';
		if (!$this->isEditable())
		{
			return $value;
		}
		$bits = $this->inputProperties($repeatCounter, 'password');
		$bits['value'] = $value;
		$bits['placeholder'] = JText::_('PLG_ELEMENT_PASSWORD_TYPE_PASSWORD');
		$pw1 = $this->buildInput('input', $bits);
		$origname = $element->name;
		$element->name = $element->name . '_check';
		$name = $this->getHTMLName($repeatCounter);
		$bits['placeholder'] = JText::_('PLG_ELEMENT_PASSWORD_CONFIRM_PASSWORD');
		$bits['class'] .= ' fabrikSubElement';
		$bits['name'] = $name;
		$bits['id'] = $name;
		$pw2 = $this->buildInput('input', $bits);
		$element->name = $origname;

		$html = array();
		$html[] = $pw1;
		if (FabrikWorker::j3())
		{
			$html[] = '<div class="strength progress progress-striped" style="margin-top:20px;width:40%;"></div>';
		}
		else
		{
			$html[] = '<span class="strength"></span>';
		}
		$html[] = $pw2;
		return implode("\n", $html);
	}

	/**
	 * Internal element validation
	 *
	 * @param   array  $data           form data
	 * @param   int    $repeatCounter  repeeat group counter
	 *
	 * @return bool
	 */

	public function validate($data, $repeatCounter = 0)
	{
		$app = JFactory::getApplication();
		$input = $app->input;
		$k = $this->getlistModel()->getTable()->db_primary_key;
		$k = FabrikString::safeColNameToArrayKey($k);
		$filter = JFilterInput::getInstance();
		$post = $filter->clean($_POST, 'array');
		$this->defaults = null;
		$element = $this->getElement();
		$origname = $element->name;

		$name = $this->getFullName(false, true, false);
		$name = str_replace($element->name, $element->name . '_check', $name);
		$this->setFullName($name, false, true, false);
		$checkvalue = $this->getValue($post, $repeatCounter);
		$element->name = $origname;
		if ($checkvalue != $data)
		{
			$this->validationError = JText::_('PLG_ELEMENT_PASSWORD_PASSWORD_CONFIRMATION_DOES_NOT_MATCH');
			return false;
		}
		else
		{
			$rowId = $input->get('rowid', '');
			// $$$ rob add rowid test as well as if using row=-1 and usekey=field $k may have a value
			if (($rowId === '' || empty($rowId)) && $input->getInt($k, 0, 'post') === 0 && $data === '')
			{
				$this->validationError .= JText::_('PLG_ELEMENT_PASSWORD_PASSWORD_CONFIRMATION_EMPTY_NOT_ALLOWED');
				return false;
			}
			return true;
		}
	}

	/**
	 * Returns javascript which creates an instance of the class defined in formJavascriptClass()
	 *
	 * @param   int  $repeatCounter  repeat group counter
	 *
	 * @return  string
	 */

	public function elementJavascript($repeatCounter)
	{
		$id = $this->getHTMLId($repeatCounter);
		$opts = $this->getElementJSOptions($repeatCounter);
		$formparams = $this->getForm()->getParams();
		$opts->ajax_validation = $formparams->get('ajax_validations') === '1';
		$opts->progressbar = FabrikWorker::j3() ? true : false;
		$opts = json_encode($opts);
		$lang = new stdClass;

		JText::script('PLG_ELEMENT_PASSWORD_STRONG');
		JText::script('PLG_ELEMENT_PASSWORD_MEDIUM');
		JText::script('PLG_ELEMENT_PASSWORD_WEAK');
		JText::script('PLG_ELEMENT_PASSWORD_TYPE_PASSWORD');
		JText::script('PLG_ELEMENT_PASSWORD_MORE_CHARACTERS');
		return "new FbPassword('$id', $opts)";
	}

	/**
	 * Get an array of element html ids and their corresponding
	 * js events which trigger a validation.
	 * Examples of where this would be overwritten include timedate element with time field enabled
	 *
	 * @param   int  $repeatCounter  repeat group counter
	 *
	 * @return  array  html ids to watch for validation
	 */

	public function getValidationWatchElements($repeatCounter)
	{
		$id = $this->getHTMLId($repeatCounter) . '_check';
		$ar = array('id' => $id, 'triggerEvent' => 'blur');
		return array($ar);
	}
}
