<?php

/**
 * Display a json loaded window with a repeatble set of sub fields
 *
 * @package     Joomla
 * @subpackage  Form
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 */

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

/**
 * Display a json loaded window with a repeatble set of sub fields
 *
 * @package     Joomla
 * @subpackage  Form
 * @since       1.6
 */

class JFormFieldFabrikModalrepeat extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $type = 'FabrikModalrepeat';

	/**
	 * Method to get the field input markup.
	 *
	 * @since	1.6
	 *
	 * @return	string	The field input markup.
	 */

	protected function getInput()
	{
		// Initialize variables.
		$app = JFactory::getApplication();
		$document = JFactory::getDocument();
		$options = array();
		JHTML::stylesheet('administrator/components/com_fabrik/views/fabrikadmin.css');
		$subForm = new JForm($this->name, array('control' => 'jform'));
		$xml = $this->element->children()->asXML();
		$subForm->load($xml);

		// Needed for repeating modals in gmaps viz
		$subForm->repeatCounter = (int) @$this->form->repeatCounter;

		/**
		 * f3 hack
		 */

		$input = $app->input;
		$view = $input->get('view', 'list');
		switch ($view)
		{
			case 'item':
				$view = 'list';
				$id = (int) $this->form->getValue('request.listid');
				break;
			case 'module':
				$view = 'list';
				$id = (int) $this->form->getValue('params.list_id');
				break;
			default:
				$id = $input->getInt('id');
				break;
		}
		if ($view === 'element')
		{
			$pluginManager = FabrikWorker::getPluginManager();
			$feModel = $pluginManager->getPluginFromId($id);
		}
		else
		{
			$feModel = JModelLegacy::getInstance($view, 'FabrikFEModel');
			$feModel->setId($id);
		}

		$subForm->model = $feModel;

		// Hack for order by elements which we now want to store as ids
		$v = json_decode($this->value);
		if (isset($v->order_by))
		{
			$formModel = $feModel->getFormModel();
			foreach ($v->order_by as &$orderBy)
			{
				$elementModel = $formModel->getElement($orderBy, true);
				$orderBy = $elementModel ? $elementModel->getId() : $orderBy;
			}
		}
		$this->value = json_encode($v);

		/*
		 * end
		 */
		$children = $this->element->children();

		// $$$ rob 19/07/2012 not sure y but this fires a strict standard warning deep in JForm, suppress error for now
		@$subForm->setFields($children);

		$str = array();
		$modalid = $this->id . '_modal';

		// As JForm will render child fieldsets we have to hide it via CSS
		$fieldSetId = str_replace('jform_params_', '', $modalid);
		$css = '#' . $fieldSetId . ' { display: none; }';
		$document->addStyleDeclaration($css);

		$path = 'templates/' . $app->getTemplate() . '/images/menu/';
		$str[] = '<div id="' . $modalid . '" style="display:none">';
		$str[] = '<table class="adminlist ' . $this->element['class'] . ' table table-striped">';
		$str[] = '<thead><tr class="row0">';
		$names = array();
		$attributes = $this->element->attributes();
		foreach ($subForm->getFieldset($attributes->name . '_modal') as $field)
		{
			$names[] = (string) $field->element->attributes()->name;
			$str[] = '<th>' . strip_tags($field->getLabel($field->name));
			$str[] = '<br /><small style="font-weight:normal">' . JText::_($field->description) . '</small>';
			$str[] = '</th>';
		}
		if (FabrikWorker::j3())
		{
			$str[] = '<th><a href="#" class="add btn button btn-success"><i class="icon-plus"></i> </a></th>';
		}
		else
		{
			$str[] = '<th><a href="#" class="add"><img src="' . $path . '/icon-16-new.png" alt="' . JText::_('ADD') . '" /></a></th>';
		}
		$str[] = '</tr></thead>';

		$str[] = '<tbody><tr>';

		foreach ($subForm->getFieldset($attributes->name . '_modal') as $field)
		{
			$str[] = '<td>' . $field->getInput() . '</td>';
		}
		$str[] = '<td>';

		if (FabrikWorker::j3())
		{
			$str[] = '<div class="btn-group"><a class="add btn button btn-success"><i class="icon-plus"></i> </a>';
			$str[] = '<a class="remove btn button btn-danger"><i class="icon-minus"></i> </a></div>';
		}
		else
		{
			$str[] = '<a href="#" class="add"><img src="' . $path . '/icon-16-new.png" alt="' . JText::_('ADD') . '" /></a>';
			$str[] = '<a href="#" class="remove"><img src="' . $path . '/icon-16-delete.png" alt="' . JText::_('REMOVE') . '" /></a>';
		}
		$str[] = '</td>';
		$str[] = '</tr></tbody>';
		$str[] = '</table>';
		$str[] = '</div>';
		$form = implode("\n", $str);
		static $modalrepeat;
		if (!isset($modalrepeat))
		{
			$modalrepeat = array();
		}
		if (!array_key_exists($modalid, $modalrepeat))
		{
			$modalrepeat[$modalid] = array();
		}
		if (!isset($this->form->repeatCounter))
		{
			$this->form->repeatCounter = 0;
		}
		if (!array_key_exists($this->form->repeatCounter, $modalrepeat[$modalid]))
		{

			// If loaded as js template then we don't want to repeat this again. (fabrik)
			$names = json_encode($names);
			$pane = str_replace('jform_params_', '', $modalid) . '-options';

			$modalrepeat[$modalid][$this->form->repeatCounter] = true;
			$script = str_replace('-', '', $modalid) . " = new FabrikModalRepeat('$modalid', $names, '$this->id');";
			$option = $input->get('option');
			if ($option === 'com_fabrik')
			{
				FabrikHelperHTML::script('administrator/components/com_fabrik/models/fields/fabrikmodalrepeat.js', $script);
			}
			else
			{
				if (FabrikWorker::j3())
				{
					$context = strtoupper($option);
					if ($context === 'COM_ADVANCEDMODULES')
					{
						$context = 'COM_MODULES';
					}
					$j3pane = $context . '_' . str_replace('jform_params_', '', $modalid) . '_FIELDSET_LABEL';

					$script = "window.addEvent('domready', function() {
				var a = jQuery(\"a:contains('$j3pane')\");
						if (a.length > 0) {
							a = a[0];
							var href= a.get('href');
							jQuery(href)[0].destroy();

							var accord = a.getParent('.accordion-group');
							if (typeOf(accord) !== 'null') {
								accord.destroy();
							} else {
								a.destroy();
							}
							" . $script . "
						}
					});";
				}
				else
				{
					$script = "window.addEvent('domready', function() {
			" . $script . "
			if (typeOf($('$pane')) !== 'null') {
			  $('$pane').getParent().hide();
			}
			});";
				}

				// Wont work when rendering in admin module page
				// @TODO test this now that the list and form pages are loading plugins via ajax (18/08/2012)
				FabrikHelperHTML::script('administrator/components/com_fabrik/models/fields/fabrikmodalrepeat.js', $script);
			}
		}
		$close = "function(c){" . $modalid . ".onClose(c);}";

		if (FabrikWorker::j3())
		{
			$icon = $this->element['icon'] ? '<i class="icon-' . $this->element['icon'] . '"></i> ' : '';
			$str[] = '<button class="btn" id="' . $modalid . '_button" data-modal="' . $modalid . '">' . $icon . JText::_('JLIB_FORM_BUTTON_SELECT') . '</button>';
		}
		else
		{
			$str[] = '<div class="button2-left">';
			$str[] = '	<div class="blank">';
			$str[] = '<a id="' . $modalid . '_button" data-modal="' . $modalid . '">' . JText::_('JLIB_FORM_BUTTON_SELECT') . '</a>';
			$str[] = '	</div>';
			$str[] = '</div>';
		}

		if (is_array($this->value))
		{
			$this->value = array_shift($this->value);
		}
		$value = htmlspecialchars($this->value, ENT_COMPAT, 'UTF-8');
		$str[] = '<input type="hidden" name="' . $this->name . '" id="' . $this->id . '" value="' . $value . '" />';

		return implode("\n", $str);
	}
}
