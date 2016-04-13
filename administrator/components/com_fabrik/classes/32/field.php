<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Form
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

use Fabrik\Helpers\StringHelper;
use Fabrik\Helpers\Text;

/**
 * Abstract Form Field class for the Joomla Platform.
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @since       11.1
 */
abstract class JFormField
{
	/**
	 * The description text for the form field. Usually used in tooltips.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $description;

	/**
	 * The hint text for the form field used to display hint inside the field.
	 *
	 * @var    string
	 * @since  3.2
	 */
	protected $hint;

	/**
	 * The autocomplete state for the form field.  If 'off' element will not be automatically
	 * completed by browser.
	 *
	 * @var    mixed
	 * @since  3.2
	 */
	protected $autocomplete = 'on';

	/**
	 * The spellcheck state for the form field.
	 *
	 * @var    boolean
	 * @since  3.2
	 */
	protected $spellcheck = true;

	/**
	 * The autofocus request for the form field.  If true element will be automatically
	 * focused on document load.
	 *
	 * @var    boolean
	 * @since  3.2
	 */
	protected $autofocus = false;

	/**
	 * The SimpleXMLElement object of the <field /> XML element that describes the form field.
	 *
	 * @var    SimpleXMLElement
	 * @since  11.1
	 */
	protected $element;

	/**
	 * The JForm object of the form attached to the form field.
	 *
	 * @var    JForm
	 * @since  11.1
	 */
	protected $form;

	/**
	 * The form control prefix for field names from the JForm object attached to the form field.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $formControl;

	/**
	 * The hidden state for the form field.
	 *
	 * @var    boolean
	 * @since  11.1
	 */
	protected $hidden = false;

	/**
	 * True to translate the field label string.
	 *
	 * @var    boolean
	 * @since  11.1
	 */
	protected $translateLabel = true;

	/**
	 * True to translate the field description string.
	 *
	 * @var    boolean
	 * @since  11.1
	 */
	protected $translateDescription = true;

	/**
	 * True to translate the field hint string.
	 *
	 * @var    boolean
	 * @since  3.2
	 */
	protected $translateHint = true;

	/**
	 * The document id for the form field.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $id;

	/**
	 * The input for the form field.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $input;

	/**
	 * The label for the form field.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $label;

	/**
	 * The multiple state for the form field.  If true then multiple values are allowed for the
	 * field.  Most often used for list field types.
	 *
	 * @var    boolean
	 * @since  11.1
	 */
	protected $multiple = false;

	/**
	 * Allows extensions to create repeat elements
	 *
	 * @var    mixed
	 * @since  3.2
	 */
	public $repeat = false;

	/**
	 * The pattern (Reg Ex) of value of the form field.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $pattern;

	/**
	 * The name of the form field.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $name;

	/**
	 * The name of the field.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $fieldname;

	/**
	 * The group of the field.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $group;

	/**
	 * The required state for the form field.  If true then there must be a value for the field to
	 * be considered valid.
	 *
	 * @var    boolean
	 * @since  11.1
	 */
	protected $required = false;

	/**
	 * The disabled state for the form field.  If true then the field will be disabled and user can't
	 * interact with the field.
	 *
	 * @var    boolean
	 * @since  3.2
	 */
	protected $disabled = false;

	/**
	 * The readonly state for the form field.  If true then the field will be readonly.
	 *
	 * @var    boolean
	 * @since  3.2
	 */
	protected $readonly = false;

	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $type;

	/**
	 * The validation method for the form field.  This value will determine which method is used
	 * to validate the value for a field.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $validate;

	/**
	 * The value of the form field.
	 *
	 * @var    mixed
	 * @since  11.1
	 */
	protected $value;

	/**
	 * The default value of the form field.
	 *
	 * @var    mixed
	 * @since  11.1
	 */
	protected $default;

	/**
	 * The size of the form field.
	 *
	 * @var    integer
	 * @since  3.2
	 */
	protected $size;

	/**
	 * The class of the form field
	 *
	 * @var    mixed
	 * @since  3.2
	 */
	protected $class;

	/**
	 * The label's CSS class of the form field
	 *
	 * @var    mixed
	 * @since  11.1
	 */
	protected $labelclass;

	/**
	 * The javascript onchange of the form field.
	 *
	 * @var    string
	 * @since  3.2
	 */
	protected $onchange;

	/**
	 * The javascript onclick of the form field.
	 *
	 * @var    string
	 * @since  3.2
	 */
	protected $onclick;

	/**
	 * The count value for generated name field
	 *
	 * @var    integer
	 * @since  11.1
	 */
	protected static $count = 0;

	/**
	 * The string used for generated fields names
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected static $generated_fieldname = '__field';

	/**
	 * Layout to render the form field
	 *
	 * @var  string
	 */
	protected $renderLayout = 'joomla.form.renderfield';

	/**
	 * Method to instantiate the form field object.
	 *
	 * @param   JForm  $form  The form to attach to the form field object.
	 *
	 * @since   11.1
	 */
	public function __construct($form = null)
	{
		// If there is a form passed into the constructor set the form and form control properties.
		if ($form instanceof JForm)
		{
			$this->form = $form;
			$this->formControl = $form->getFormControl();
		}

		// Detect the field type if not set
		if (!isset($this->type))
		{
			$parts = JStringNormalise::fromCamelCase(get_called_class(), true);

			if ($parts[0] == 'J')
			{
				$this->type = StringHelper::ucfirst($parts[count($parts) - 1], '_');
			}
			else
			{
				$this->type = StringHelper::ucfirst($parts[0], '_') . StringHelper::ucfirst($parts[count($parts) - 1], '_');
			}
		}
	}

	/**
	 * Method to get certain otherwise inaccessible properties from the form field object.
	 *
	 * @param   string  $name  The property name for which to the the value.
	 *
	 * @return  mixed  The property value or null.
	 *
	 * @since   11.1
	 */
	public function __get($name)
	{
		switch ($name)
		{
			case 'description':
			case 'hint':
			case 'formControl':
			case 'hidden':
			case 'id':
			case 'multiple':
			case 'name':
			case 'required':
			case 'type':
			case 'validate':
			case 'value':
			case 'class':
			case 'labelclass':
			case 'size':
			case 'onchange':
			case 'onclick':
			case 'fieldname':
			case 'group':
			case 'disabled':
			case 'readonly':
			case 'autofocus':
			case 'autocomplete':
			case 'spellcheck':
				return $this->$name;

			case 'input':
				// If the input hasn't yet been generated, generate it.
				if (empty($this->input))
				{
					$this->input = $this->getInput();
				}

				return $this->input;

			case 'label':
				// If the label hasn't yet been generated, generate it.
				if (empty($this->label))
				{
					$this->label = $this->getLabel();
				}

				return $this->label;

			case 'title':
				return $this->getTitle();
		}

		return null;
	}

	/**
	 * Method to set certain otherwise inaccessible properties of the form field object.
	 *
	 * @param   string  $name   The property name for which to the the value.
	 * @param   mixed   $value  The value of the property.
	 *
	 * @return  void
	 *
	 * @since   3.2
	 */
	public function __set($name, $value)
	{
		switch ($name)
		{
			case 'class':
				// Removes spaces from left & right and extra spaces from middle
				$value = preg_replace('/\s+/', ' ', trim((string) $value));

			case 'description':
			case 'hint':
			case 'value':
			case 'labelclass':
			case 'onchange':
			case 'onclick':
			case 'validate':
			case 'pattern':
			case 'group':
			case 'default':
				$this->$name = (string) $value;
				break;

			case 'id':
				$this->id = $this->getId((string) $value, $this->fieldname);
				break;

			case 'fieldname':
				$this->fieldname = $this->getFieldName((string) $value);
				break;

			case 'name':
				$this->fieldname = $this->getFieldName((string) $value);
				$this->name = $this->getName($this->fieldname);
				break;

			case 'multiple':
				// Allow for field classes to force the multiple values option.
				$value = (string) $value;
				$value = $value === '' && isset($this->forceMultiple) ? (string) $this->forceMultiple : $value;

			case 'required':
			case 'disabled':
			case 'readonly':
			case 'autofocus':
			case 'hidden':
				$value = (string) $value;
				$this->$name = ($value === 'true' || $value === $name || $value === '1');
				break;

			case 'autocomplete':
				$value = (string) $value;
				$value = ($value == 'on' || $value == '') ? 'on' : $value;
				$this->$name = ($value === 'false' || $value === 'off' || $value === '0') ? false : $value;
				break;

			case 'spellcheck':
			case 'translateLabel':
			case 'translateDescription':
			case 'translateHint':
				$value = (string) $value;
				$this->$name = !($value === 'false' || $value === 'off' || $value === '0');
				break;

			case 'translate_label':
				$value = (string) $value;
				$this->translateLabel = $this->translateLabel && !($value === 'false' || $value === 'off' || $value === '0');
				break;

			case 'translate_description':
				$value = (string) $value;
				$this->translateDescription = $this->translateDescription && !($value === 'false' || $value === 'off' || $value === '0');
				break;

			case 'size':
				$this->$name = (int) $value;
				break;

			default:
				if (property_exists(__CLASS__, $name))
				{
					JLog::add("Cannot access protected / private property $name of " . __CLASS__);
				}
				else
				{
					$this->$name = $value;
				}
		}
	}

	/**
	 * Method to attach a JForm object to the field.
	 *
	 * @param   JForm  $form  The JForm object to attach to the form field.
	 *
	 * @return  JFormField  The form field object so that the method can be used in a chain.
	 *
	 * @since   11.1
	 */
	public function setForm(JForm $form)
	{
		$this->form = $form;
		$this->formControl = $form->getFormControl();

		return $this;
	}

	/**
	 * Method to attach a JForm object to the field.
	 *
	 * @param   SimpleXMLElement  $element  The SimpleXMLElement object representing the <field /> tag for the form field object.
	 * @param   mixed             $value    The form field value to validate.
	 * @param   string            $group    The field name group control value. This acts as as an array container for the field.
	 *                                      For example if the field has name="foo" and the group value is set to "bar" then the
	 *                                      full field name would end up being "bar[foo]".
	 *
	 * @return  boolean  True on success.
	 *
	 * @since   11.1
	 */
	public function setup(SimpleXMLElement $element, $value, $group = null)
	{
		// Make sure there is a valid JFormField XML element.
		if ((string) $element->getName() != 'field')
		{
			return false;
		}

		// Reset the input and label values.
		$this->input = null;
		$this->label = null;

		// Set the XML element object.
		$this->element = $element;

		// Set the group of the field.
		$this->group = $group;

		// Allow for repeatable elements
		$repeat = (string) $element['repeat'];
		$this->repeat = ($repeat == 'true' || $repeat == 'multiple' || (!empty($this->form->repeat) && $this->form->repeat == 1));


		$attributes = array(
			'multiple', 'name', 'id', 'hint', 'class', 'description', 'labelclass', 'onchange',
			'onclick', 'validate', 'pattern', 'default', 'required',
			'disabled', 'readonly', 'autofocus', 'hidden', 'autocomplete', 'spellcheck',
			'translateHint', 'translateLabel','translate_label', 'translateDescription',
			'translate_description' ,'size');

		$this->default = isset($element['value']) ? (string) $element['value'] : $this->default;

		// Set the field default value.
		$this->value = $value;

		foreach ($attributes as $attributeName)
		{
			$this->__set($attributeName, $element[$attributeName]);
		}

		// Allow for repeatable elements
		$repeat = (string) $element['repeat'];
		$this->repeat = ($repeat == 'true' || $repeat == 'multiple' || (!empty($this->form->repeat) && $this->form->repeat == 1));

		// Set the visibility.
		$this->hidden = ($this->hidden || (string) $element['type'] == 'hidden');

		return true;
	}

	/**
	 * Simple method to set the value
	 *
	 * @param   mixed  $value  Value to set
	 *
	 * @return  void
	 *
	 * @since   3.2
	 */
	public function setValue($value)
	{
		$this->value = $value;
	}

	/**
	 * Method to get the id used for the field input tag.
	 *
	 * @param   string  $fieldId    The field element id.
	 * @param   string  $fieldName  The field element name.
	 *
	 * @return  string  The id to be used for the field input tag.
	 *
	 * @since   11.1
	 */
	protected function getId($fieldId, $fieldName)
	{
		$id = '';

		// If there is a form control set for the attached form add it first.
		if ($this->formControl)
		{
			$id .= $this->formControl;
		}

		// If the field is in a group add the group control to the field id.
		if ($this->group)
		{
			// If we already have an id segment add the group control as another level.
			if ($id)
			{
				$id .= '_' . str_replace('.', '_', $this->group);
			}
			else
			{
				$id .= str_replace('.', '_', $this->group);
			}
		}

		// If we already have an id segment add the field id/name as another level.
		if ($id)
		{
			$id .= '_' . ($fieldId ? $fieldId : $fieldName);
		}
		else
		{
			$id .= ($fieldId ? $fieldId : $fieldName);
		}

		// Clean up any invalid characters.
		$id = preg_replace('#\W#', '_', $id);

		// If this is a repeatable element, add the repeat count to the ID
		if ($this->repeat)
		{
			$repeatCounter = empty($this->form->repeatCounter) ? 0 : $this->form->repeatCounter;
			$id .= '-' . $repeatCounter;

			if (strtolower($this->type) == 'radio')
			{
				$id .= '-';
			}
		}

		return $id;
	}

	/**
	 * Method to get the field input markup.
	 *
	 * @return  string  The field input markup.
	 *
	 * @since   11.1
	 */
	abstract protected function getInput();

	/**
	 * Method to get the field title.
	 *
	 * @return  string  The field title.
	 *
	 * @since   11.1
	 */
	protected function getTitle()
	{
		$title = '';

		if ($this->hidden)
		{
			return $title;
		}

		// Get the label text from the XML element, defaulting to the element name.
		$title = $this->element['label'] ? (string) $this->element['label'] : (string) $this->element['name'];
		$title = $this->translateLabel ? Text::_($title) : $title;

		return $title;
	}

	/**
	 * Method to get the field label markup.
	 *
	 * @return  string  The field label markup.
	 *
	 * @since   11.1
	 */
	protected function getLabel()
	{
		$label = '';

		if ($this->hidden)
		{
			return $label;
		}

		// Get the label text from the XML element, defaulting to the element name.
		$text = $this->element['label'] ? (string) $this->element['label'] : (string) $this->element['name'];
		$text = $this->translateLabel ? Text::_($text) : $text;

		// Build the class for the label.
		$class = !empty($this->description) ? 'hasTooltip' : '';
		$class = $this->required == true ? $class . ' required' : $class;
		$class = !empty($this->labelclass) ? $class . ' ' . $this->labelclass : $class;

		// Add the opening label tag and main attributes attributes.
		$label .= '<label id="' . $this->id . '-lbl" for="' . $this->id . '" class="' . $class . '"';

		// If a description is specified, use it to build a tooltip.
		if (!empty($this->description))
		{
			// Don't translate discription if specified in the field xml.
			$description = $this->translateDescription ? Text::_($this->description) : $this->description;
			JHtml::_('bootstrap.tooltip');
			$label .= ' title="' . JHtml::tooltipText(trim($text, ':'), $description, 0) . '"';
		}

		// Add the label text and closing tag.
		if ($this->required)
		{
			$label .= '>' . $text . '<span class="star">&#160;*</span></label>';
		}
		else
		{
			$label .= '>' . $text . '</label>';
		}

		return $label;
	}

	/**
	 * Method to get the name used for the field input tag.
	 *
	 * @param   string  $fieldName  The field element name.
	 *
	 * @return  string  The name to be used for the field input tag.
	 *
	 * @since   11.1
	 */
	protected function getName($fieldName)
	{
		// To support repeated element, extensions can set this in plugin->onRenderSettings
		$repeatCounter = empty($this->form->repeatCounter) ? 0 : $this->form->repeatCounter;

		$name = '';

		// If there is a form control set for the attached form add it first.
		if ($this->formControl)
		{
			$name .= $this->formControl;
		}

		// If the field is in a group add the group control to the field name.
		if ($this->group)
		{
			// If we already have a name segment add the group control as another level.
			$groups = explode('.', $this->group);

			if ($name)
			{
				foreach ($groups as $group)
				{
					$name .= '[' . $group . ']';
				}
			}
			else
			{
				$name .= array_shift($groups);

				foreach ($groups as $group)
				{
					$name .= '[' . $group . ']';
				}
			}
		}

		// If we already have a name segment add the field name as another level.
		if ($name)
		{
			$name .= '[' . $fieldName . ']';
		}
		else
		{
			$name .= $fieldName;
		}

		// $$$ rob elements that are repeatable need to have repeat="true' as a property
		if ($this->repeat)
		{
			$name .= '[' . $repeatCounter . ']';
		}

		// If the field should support multiple values add the final array segment.
		if ($this->multiple)
		{
			switch (strtolower((string) $this->element['type']))
			{
				case 'text':
				case 'textarea':
				case 'email':
				case 'password':
				case 'radio':
				case 'calendar':
				case 'editor':
				case 'hidden':
					break;
				default:
					$name .= '[]';
			}
		}

		return $name;
	}

	/**
	 * Method to get the field name used.
	 *
	 * @param   string  $fieldName  The field element name.
	 *
	 * @return  string  The field name
	 *
	 * @since   11.1
	 */
	protected function getFieldName($fieldName)
	{
		if ($fieldName)
		{
			return $fieldName;
		}
		else
		{
			self::$count = self::$count + 1;

			return self::$generated_fieldname . self::$count;
		}
	}

	/**
	 * Method to get an attribute of the field
	 *
	 * @param   string  $name     Name of the attribute to get
	 * @param   mixed   $default  Optional value to return if attribute not found
	 *
	 * @return  mixed             Value of the attribute / default
	 *
	 * @since   3.2
	 */
	public function getAttribute($name, $default = null)
	{
		if ($this->element instanceof SimpleXMLElement)
		{
			$attributes = $this->element->attributes();

			// Ensure that the attribute exists
			if (property_exists($attributes, $name))
			{
				$value = $attributes->$name;

				if ($value !== null)
				{
					return (string) $value;
				}
			}
		}

		return $default;
	}

	/**
	 * Method to get a control group with label and input.
	 *
	 * @return  string  A string containing the html for the control group
	 *
	 * @since      3.2
	 * @deprecated 3.2.3 Use renderField() instead
	 */
	public function getControlGroup()
	{
		JLog::add('JFormField->getControlGroup() is deprecated use JFormField->renderField().', JLog::WARNING, 'deprecated');

		return $this->renderField();
	}

	/**
	 * Method to get a control group with label and input.
	 *
	 * @param   array  $options  Options to be passed into the rendering of the field
	 *
	 * @return  string  A string containing the html for the control group
	 *
	 * @since   3.2
	 */
	public function renderField($options = array())
	{
		if ($this->hidden)
		{
			return $this->getInput();
		}

		if (!isset($options['class']))
		{
			$options['class'] = '';
		}

		$options['rel'] = '';

		if (empty($options['hiddenLabel']) && $this->getAttribute('hiddenLabel'))
		{
			$options['hiddenLabel'] = true;
		}

		if ($showon = $this->getAttribute('showon'))
		{
			$showon   = explode(':', $showon, 2);
			$options['class'] .= ' showon_' . implode(' showon_', explode(',', $showon[1]));
			$id = $this->getName($showon[0]);
			$options['rel'] = ' rel="showon_' . $id . '"';
			$options['showonEnabled'] = true;
		}

		return JLayoutHelper::render($this->renderLayout, array('input' => $this->getInput(), 'label' => $this->getLabel(), 'options' => $options));
	}
}
