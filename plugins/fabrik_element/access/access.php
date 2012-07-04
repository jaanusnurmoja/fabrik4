<?php
/**
 * @package Joomla
 * @subpackage Fabrik
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

class PlgFabrik_ElementAccess extends PlgFabrik_Element
{

	/**
	 * formats the posted data for insertion into the database
	 * @param mixed thie elements posted form data
	 * @param   array posted form data
	 */

	function storeDatabaseFormat($val, $data)
	{
		// $$$ hugh - nope!
		//return $val[0];
		return $val;
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
		$name = $this->getHTMLName($repeatCounter);

		$arSelected = array('');

		if (isset($data[$name]))
		{

			if (!is_array($data[$name]))
			{
				$arSelected = explode(',', $data[$name]);
			}
			else
			{
				$arSelected = $data[$name];
			}
		}
		$gtree = $this->getOpts();
		if (!$this->_editable)
		{
			$row = new stdClass;
			return $this->renderListData($arSelected[0], $row);
		}
		return JHTML::_('select.genericlist', $gtree, $name, 'class="inputbox" size="6"', 'value', 'text', $arSelected[0]);
	}

	private function getOpts($allowAll = true)
	{
		$db = JFactory::getDbo();
		$db
			->setQuery(
				'SELECT a.id AS value, a.title AS text, COUNT(DISTINCT b.id) AS level' . ' FROM #__usergroups AS a'
					. ' LEFT JOIN `#__usergroups` AS b ON a.lft > b.lft AND a.rgt < b.rgt' . ' GROUP BY a.id' . ' ORDER BY a.lft ASC');
		$options = $db->loadObjectList();

		// Check for a database error.
		if ($db->getErrorNum())
		{
			JError::raiseNotice(500, $db->getErrorMsg());
			return null;
		}

		for ($i = 0, $n = count($options); $i < $n; $i++)
		{
			$options[$i]->text = str_repeat('- ', $options[$i]->level) . $options[$i]->text;
		}

		// If all usergroups is allowed, push it into the array.
		if ($allowAll)
		{
			array_unshift($options, JHtml::_('select.option', '', JText::_('JOPTION_ACCESS_SHOW_ALL_GROUPS')));
		}
		return $options;
	}

	/**
	 * Shows the data formatted for the list view
	 *
	 * @param   string  $data      elements data
	 * @param   object  &$thisRow  all the data in the lists current row
	 *
	 * @return  string	formatted value
	 */

	public function renderListData($data, &$thisRow)
	{
		$gtree = $this->getOpts();
		$filter = JFilterInput::getInstance(null, null, 1, 1);
		foreach ($gtree as $o)
		{
			if ($o->value == $data)
			{
				return JString::ltrim($filter->clean($o->text, 'word'), '&nbsp;');
			}
		}
	}

	/**
	 * defines the type of database table field that is created to store the element's data
	 */
	function getFieldDescription()
	{
		$p = $this->getParams();
		if ($this->encryptMe())
		{
			return 'BLOB';
		}
		return "INT(3)";
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
		$opts = json_encode($opts);
		return "new FbAccess('$id', $opts)";
	}

}
?>