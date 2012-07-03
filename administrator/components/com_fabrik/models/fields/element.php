<?php
/**
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 */

// Check to ensure this file is within the rest of the framework
defined('JPATH_BASE') or die();

require_once JPATH_ADMINISTRATOR . '/components/com_fabrik/helpers/element.php';

/**
 * Renders a fabrik element drop down
 *
 * @author 		rob clayburn
 * @package 	fabrikar
 * @subpackage		Parameter
 * @since		1.6
 */

jimport('joomla.html.html');
jimport('joomla.form.formfield');
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * Renders a list of elements
 *
 * @package  Fabrik
 * @since    3.0
 */

class JFormFieldElement extends JFormFieldList
{
	/**
	 * Element name
	 * @var		string
	 */
	protected $name = 'Element';

	/**
	 * Method to get the field options.
	 *
	 * @return  array	The field option objects.
	 */

	protected function getOptions()
	{
		$cnns = array(JHTML::_('select.option', '-1', JText::_('COM_FABRIK_PLEASE_SELECT')));
		return;
	}

	/**
	 * Method to get the field input markup.
	 *
	 * @return  string	The field input markup.
	 */

	protected function getInput()
	{
		static $fabrikelements;
		if (!isset($fabrikelements))
		{
			$fabrikelements = array();
		}
		JDEBUG ? JHtml::_('script', 'media/com_fabrik/js/lib/head/head.js') : JHtml::_('script', 'media/com_fabrik/js/lib/head/head.min.js');
		FabrikHelperHTML::script('administrator/components/com_fabrik/views/namespace.js');
		$c = (int) @$this->form->repeatCounter;
		$table = $this->element['table'];
		if ($table == '')
		{
			$table = $this->form->getValue('params.list_id');
		}
		$include_calculations = (int) $this->element['include_calculations'];
		$published = (int) $this->element['published'];
		$showintable = (int) $this->element['showintable'];
		if ($include_calculations != 1)
		{
			$include_calculations = 0;
		}

		$opts = new stdClass;
		if ($this->form->repeat)
		{
			// In repeat fieldset/group
			$conn = $this->element['connection'] . '-' . $this->form->repeatCounter;
			$opts->table = 'jform_' . $table . '-' . $this->form->repeatCounter;
		}
		else
		{
			$conn = ($c === false || $this->element['connection_in_repeat'] == 'false') ? $this->element['connection']
				: $this->element['connection'] . '-' . $c;
			$opts->table = ($c === false || $this->element['connection_in_repeat'] == 'false') ? 'jform_' . $table : 'jform_' . $table . '-' . $c;
		}

		$opts->published = $published;
		$opts->showintable = $showintable;
		$opts->excludejoined = (int) $this->element['excludejoined'];
		$opts->livesite = COM_FABRIK_LIVESITE;
		$opts->conn = 'jform_' . $conn;
		$opts->value = $this->value;
		$opts->include_calculations = $include_calculations;
		$opts = json_encode($opts);
		$script = array();
		$script[] = "var p = new elementElement('$this->id', $opts);";
		$script[] = "FabrikAdmin.model.fields.element['$this->id'] = p;";
		$script = implode("\n", $script);
		$fabrikelements[$this->id] = true;
		FabrikHelperHTML::script('administrator/components/com_fabrik/models/fields/element.js', $script);
		$return = parent::getInput();
		$return .= '<img style="margin-left:10px;display:none" id="' . $this->id
			. '_loader" src="components/com_fabrik/images/ajax-loader.gif" alt="' . JText::_('COM_FABRIK_LOADING') . '" />';
		return $return;
	}
}
