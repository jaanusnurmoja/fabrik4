<?php
/**
* @package Joomla
* @subpackage Fabrik
* @copyright Copyright (C) 2005 Rob Clayburn. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

// Check to ensure this file is within the rest of the framework
defined('JPATH_BASE') or die();

require_once(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_fabrik'.DS.'helpers'.DS.'element.php');

/**
 * Renders a upload size field
 *
 * @package 	Joomla.Framework
 * @subpackage		Parameter
 * @since		1.5
 */

class JFormFieldTextorwysiwyg extends JFormFieldText
{
	/**
	* Element name
	*
	* @access	protected
	* @var		string
	*/
	var	$_name = 'Textorwysiwyg';

	function getInput()
	{
		$config = JComponentHelper::getParams('com_fabrik');
		if ($config->get('fbConf_wysiwyg_label') == '0') {
			return parent::getInput();
		}
			// Initialize some field attributes.
		$rows		= (int) $this->element['rows'];
		$cols		= (int) $this->element['cols'];
		$height		= ((string) $this->element['height']) ? (string) $this->element['height'] : '250';
		$width		= ((string) $this->element['width']) ? (string) $this->element['width'] : '100%';
		$assetField	= $this->element['asset_field'] ? (string) $this->element['asset_field'] : 'asset_id';
		$authorField= $this->element['created_by_field'] ? (string) $this->element['created_by_field'] : 'created_by';
		$asset		= $this->form->getValue($assetField) ? $this->form->getValue($assetField) : (string) $this->element['asset_id'] ;

		// Build the buttons array.
		$buttons = (string) $this->element['buttons'];

		if ($buttons == 'true' || $buttons == 'yes' || $buttons == '1') {
			$buttons = true;
		}
		elseif ($buttons == 'false' || $buttons == 'no' || $buttons == '0') {
			$buttons = false;
		}
		else {
			$buttons = explode(',', $buttons);
		}

		$hide = ((string) $this->element['hide']) ? explode(',', (string) $this->element['hide']) : array();

		// Get an editor object.
		$editor = $this->getEditor();

		return $editor->display($this->name, htmlspecialchars($this->value, ENT_COMPAT, 'UTF-8'), $width, $height, $cols, $rows, $buttons ? (is_array($buttons) ? array_merge($buttons, $hide) : $hide) : false, $this->id, $asset, $this->form->getValue($authorField));
		
	}
	
	/**
	* Method to get a JEditor object based on the form field.
	*
	* @return  object  The JEditor object.
	* @since   11.1
	*/
	protected function &getEditor()
	{
		// Only create the editor if it is not already created.
		if (empty($this->editor)) {
			// Initialize variables.
			$editor = null;
	
			// Get the editor type attribute. Can be in the form of: editor="desired|alternative".
			$type = trim((string) $this->element['editor']);
	
			if ($type) {
				// Get the list of editor types.
				$types = explode('|', $type);
	
				// Get the database object.
				$db = JFactory::getDBO();
	
				// Iterate over teh types looking for an existing editor.
				foreach ($types as $element)
				{
					// Build the query.
					$query	= $db->getQuery(true);
					$query->select('element');
					$query->from('#__extensions');
					$query->where('element = '.$db->quote($element));
					$query->where('folder = '.$db->quote('editors'));
					$query->where('enabled = 1');
	
					// Check of the editor exists.
					$db->setQuery($query, 0, 1);
					$editor = $db->loadResult();
	
					// If an editor was found stop looking.
					if ($editor) {
						break;
					}
				}
			}
	
			// Create the JEditor intance based on the given editor.
			$this->editor = JFactory::getEditor($editor ? $editor : null);
		}
	
		return $this->editor;
	}

}