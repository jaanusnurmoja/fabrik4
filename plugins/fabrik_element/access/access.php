<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.element.access
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

/**
* Access element
*
* @package		Joomla.Plugin
* @subpackage	Fabrik.element.access
*/

class plgFabrik_ElementAccess extends plgFabrik_Element
{

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
		// $$$ hugh - nope!
		//return $val[0];
		return $val;
	}

	/**
	 * draws the form element
	 * @param int repeat group counter
	 * @return string returns element html
	 */

	function render($data, $repeatCounter = 0)
	{
		$name = $this->getHTMLName($repeatCounter);

		$arSelected = array('');

		if (isset($data[$name])) {

			if (!is_array($data[$name])) {
				$arSelected = explode(',', $data[$name]);
			} else {
				$arSelected = $data[$name];
			}
		}
		$gtree = $this->getOpts();
		if (!$this->_editable) {
			$row = new stdClass;
			return $this->renderListData($arSelected[0], $row);
		}
		return JHTML::_('select.genericlist', $gtree, $name, 'class="inputbox" size="6"', 'value', 'text', $arSelected[0]);
	}

	private function getOpts($allowAll = true)
	{
		$db = JFactory::getDbo();
		$db->setQuery(
			'SELECT a.id AS value, a.title AS text, COUNT(DISTINCT b.id) AS level' .
			' FROM #__usergroups AS a' .
			' LEFT JOIN `#__usergroups` AS b ON a.lft > b.lft AND a.rgt < b.rgt' .
			' GROUP BY a.id' .
			' ORDER BY a.lft ASC'
		);
		$options = $db->loadObjectList();

		// Check for a database error.
		if ($db->getErrorNum()) {
			JError::raiseNotice(500, $db->getErrorMsg());
			return null;
		}

		for ($i=0,$n=count($options); $i < $n; $i++) {
			$options[$i]->text = str_repeat('- ',$options[$i]->level).$options[$i]->text;
		}

		// If all usergroups is allowed, push it into the array.
		if ($allowAll) {
			array_unshift($options, JHtml::_('select.option', '', JText::_('JOPTION_ACCESS_SHOW_ALL_GROUPS')));
		}
		return $options;
	}

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
	 * Get database field description
	 *
	 * @return  string  db field type
	 */

	public function getFieldDescription()
	{
		$p = $this->getParams();
		if ($this->encryptMe()) {
			return 'BLOB';
		}
		return "INT(3)";
	}

	/**
 	* return the javascript to create an instance of the class defined in formJavascriptClass
	 * @return string javascript to create instance. Instance name must be 'el'
	 */

	function elementJavascript($repeatCounter)
	{
		$id = $this->getHTMLId($repeatCounter);
		$opts = $this->getElementJSOptions($repeatCounter);
		$opts = json_encode($opts);
		return "new FbAccess('$id', $opts)";
	}

}
?>