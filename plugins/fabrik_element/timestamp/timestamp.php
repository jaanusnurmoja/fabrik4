<?php
/**
* Slightly modified fabriktimestamp element (see lines 49-52)
* By Nathan Cook 4/22/2010
*
* Plugin element to render fields
* @package fabrikar
* @author Rob Clayburn
* @copyright (C) Rob Clayburn
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

require_once(JPATH_SITE . '/components/com_fabrik/models/element.php');

class plgFabrik_ElementTimestamp extends plgFabrik_Element {

	protected $recordInDatabase = false;

	function getLabel($repeatCounter, $tmpl = '')
	{
		return '';
	}

	function setIsRecordedInDatabase()
	{
		$this->recordInDatabase = false;
	}

	/**
	 * draws a field element
	 * @param	int		repeat group counter
	 * @return	string	returns element html
	 */

	function render($data, $repeatCounter = 0)
	{
		$name = $this->getHTMLName($repeatCounter);
		$id	= $this->getHTMLId($repeatCounter);
		$date = JFactory::getDate();
		$config = JFactory::getConfig();
		$tz = DateTimeZone($config->get('offset'));
		$date->setTimezone($tz);
		$params = $this->getParams();
		$gmt_or_local = $params->get('gmt_or_local');
		$gmt_or_local += 0;
		return '<input name="' . $name . '" id="' . $id . '" type="hidden" value="' . $date->toSql($gmt_or_local) . '" />';
	}

	/**
	 * (non-PHPdoc)
	 * @see plgFabrik_Element::renderListData()
	 */
	
	public function renderListData($data, &$thisRow)
	{
		$params = $this->getParams();
		$data = JHTML::_('date', $data, JText::_($params->get('timestamp_format', 'DATE_FORMAT_LC2')));
		return parent::renderListData($data, $thisRow);
	}
	/**
	 * defines the type of database table field that is created to store the element's data
	 * @return	string	db field description
	 */

	function getFieldDescription()
	{
		$params = $this->getParams();
		if ($params->get('encrypt', false))
		{
			return 'BLOB';
		}
		if ($params->get('timestamp_update_on_edit'))
		{
			return "TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";
		}
		else
		{
			return "TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP";
		}
	}
	
	function isHidden()
	{
		return true;
	}

}
?>