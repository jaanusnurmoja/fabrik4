<?php
/**
 * Plugin element to render day/month/year dropdowns
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.element.birthday
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

/**
 * Plugin element to render day/month/year dropdowns
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.element.birthday
 * @since       3.0
 */

class PlgFabrik_ElementBirthday extends PlgFabrik_Element
{

	public $hasSubElements = true;

	/** @var  string  db table field type */

		public function getFieldDescription()
		{
		return 'DATE';
		}

		// protected $fieldDesc = 'DATE';

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
		/**
		 * Jaanus: needed also here to not to show 0000-00-00 in detail view;
		 * see also 58, added && !in_array($value, $aNullDates) (same reason).
		 */
		$db = JFactory::getDbo();
		$aNullDates = array('0000-00-000000-00-00', '0000-00-00 00:00:00', '0000-00-00', '', $db->getNullDate());
		$name = $this->getHTMLName($repeatCounter);
		$id = $this->getHTMLId($repeatCounter);
		$params = $this->getParams();
		$element = $this->getElement();
		$monthlabels = array(JText::_('January'), JText::_('February'), JText::_('March'), JText::_('April'), JText::_('May'), JText::_('June'),
			JText::_('July'), JText::_('August'), JText::_('September'), JText::_('October'), JText::_('November'), JText::_('December'));
		$monthlabels = array(JText::_('January'), JText::_('February'), JText::_('March'), JText::_('April'), JText::_('May'), JText::_('June'),
			JText::_('July'), JText::_('August'), JText::_('September'), JText::_('October'), JText::_('November'), JText::_('December'));
		$monthnumbers = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
		$daysys = array('01', '02', '03', '04', '05', '06', '07', '08', '09');
		$daysimple = array('1', '2', '3', '4', '5', '6', '7', '8', '9');

		$bits = array();
		/**
		 * $$$ rob - not sure why we are setting $data to the form's data
		 * but in table view when getting read only filter value from url filter this
		 * _form_data was not set to no readonly value was returned
		 * added little test to see if the data was actually an array before using it
		 */
		if (is_array($this->_form->_data))
		{
			$data = $this->getFormModel()->data;
		}
		$value = $this->getValue($data, $repeatCounter);
		$fd = $params->get('details_date_format', 'd.m.Y');
		$dateandage = (int) $params->get('details_dateandage', '0');

		if (!$this->isEditable())
		{
			if (!in_array($value, $aNullDates))
			{
				// Avoid 0000-00-00
				list($year, $month, $day) = strstr($value, '-') ? explode('-', $value) : explode(',', $value);
				$daydisp = str_replace($daysys, $daysimple, $day);
				$monthdisp = str_replace($monthnumbers, $monthlabels, $month);
				$thisyear = date('Y');
				$nextyear = date('Y') + 1;
				$lastyear = date('Y') - 1;

				// $$$ rob - all this below is nice but ... you still need to set a default
				$detailvalue = '';
				$year = JString::ltrim($year, '0');
				if (FabrikWorker::isDate($value))
				{
					$date = JFactory::getDate($value);
					$detailvalue = $date->format($fd);
				}
				if (date('m-d') < $month . '-' . $day)
				{
					$ageyear = $lastyear;
				}
				else
				{
					$ageyear = $thisyear;
				}
				if ($fd == 'd.m.Y')
				{
					$detailvalue = $day . '.' . $month . '.' . $year;
				}
				else
				{
					if ($fd == 'm.d.Y')
					{
						$detailvalue = $month . '/' . $day . '/' . $year;
					}
					if ($fd == 'D. month YYYY')
					{
						$detailvalue = $daydisp . '. ' . $monthdisp . ' ' . $year;
					}
					if ($fd == 'Month d, YYYY')
					{
						$detailvalue = $monthdisp . ' ' . $daydisp . ', ' . $year;
					}
					if ($fd == '{age}')
					{
						$detailvalue = $ageyear - $year;
					}
					if ($fd == '{age} d.m')
					{
						$mdvalue = $daydisp . '. ' . $monthdisp;
					}
					if ($fd == '{age} m.d')
					{
						$mdvalue = $monthdisp . ' ' . $daydisp;
					}
					if ($fd == '{age} d.m' || $fd == '{age} m.d')
					{
						// Always actual age
						$detailvalue = $ageyear - $year;
						if (date('m-d') == $month . '-' . $day)
						{
							$detailvalue .= '<font color = "#CC0000"><b> ' . JText::_('TODAY') . '!</b></font>';
							if (date('m') == '12')
							{
								$detailvalue .= ' / ' . $nextyear . ': ' . ($nextyear - $year);
							}
						}
						else
						{
							$detailvalue .= ' (' . $mdvalue;
							if (date('m-d') < $month . '-' . $day)
							{
								$detailvalue .= ': ' . ($thisyear - $year);
							}
							else
							{
								$detailvalue .= '';
							}
							if (date('m') == '12')
							{
								$detailvalue .= ' / ' . $nextyear . ': ' . ($nextyear - $year);
							}
							else
							{
								$detailvalue .= '';
							}
							$detailvalue .= ')';
						}
					}
					else
					{
						if ($fd != '{age}' && $dateandage == 1)
						{
							$detailvalue .= ' (' . ($ageyear - $year) . ')';
						}
					}
				}
				$value = $this->replaceWithIcons($detailvalue);
				return ($element->hidden == '1') ? "<!-- " . $detailvalue . " -->" : $detailvalue;
			}
			else
			{
				return '';
			}
		}
		else
		{
			// Wierdness for failed validaion
			$value = strstr($value, ',') ? array_reverse(explode(',', $value)) : explode('-', $value);
			$yearvalue = JArrayHelper::getValue($value, 0);
			$monthvalue = JArrayHelper::getValue($value, 1);
			$dayvalue = JArrayHelper::getValue($value, 2);

			$days = array(JHTML::_('select.option', '', $params->get('birthday_daylabel', JText::_('DAY'))));
			for ($i = 1; $i < 32; $i++)
			{
				$days[] = JHTML::_('select.option', $i);
			}
			$months = array(JHTML::_('select.option', '', $params->get('birthday_monthlabel', JText::_('MONTH'))));

			// Siin oli enne $monthlabels, viisin ülespoole
			for ($i = 0; $i < count($monthlabels); $i++)
			{
				$months[] = JHTML::_('select.option', $i + 1, $monthlabels[$i]);
			}
			$years = array(JHTML::_('select.option', '', $params->get('birthday_yearlabel', JText::_('YEAR'))));

			// Jaanus: now we can choose one exact year A.C to begin the dropdown AND would the latest year be current year or some years earlier/later.
			$date = date('Y') + (int) $params->get('birthday_forward', 0);
			$yearopt = $params->get('birthday_yearopt');
			$yearstart = (int) $params->get('birthday_yearstart');
			$yeardiff = $yearopt == 'number' ? $yearstart : $date - $yearstart;
			for ($i = $date; $i >= $date - $yeardiff; $i--)
			{
				$years[] = JHTML::_('select.option', $i);
			}
			$errorCSS = $this->elementError != '' ? " elementErrorHighlight" : '';
			$attribs = 'class="fabrikinput inputbox' . $errorCSS . '"';
			$str = array();
			$str[] = '<div class="fabrikSubElementContainer" id="' . $id . '">';

			// $name already suffixed with [] as element hasSubElements = true
			$str[] = JHTML::_('select.genericlist', $days, preg_replace('#(\[\])$#', '[0]', $name), $attribs, 'value', 'text', $dayvalue);
			$str[] = $params->get('birthday_separatorlabel', JText::_('/')) . ' '
				. JHTML::_('select.genericlist', $months, preg_replace('#(\[\])$#', '[1]', $name), $attribs, 'value', 'text', $monthvalue);
			$str[] = $params->get('birthday_separatorlabel', JText::_('/')) . ' '
				. JHTML::_('select.genericlist', $years, preg_replace('#(\[\])$#', '[2]', $name), $attribs, 'value', 'text', $yearvalue);
			$str[] = '</div>';
			return implode("\n", $str);
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
		/**
		 *  $$$ hugh - No need for this in 3.x, all repeated groups are now joins,
		 *  so we get called once per instance of repeat
		 */
		/*
		$groupModel = $this->getGroup();
		if ($groupModel->canRepeat()) {
		    if (is_array($val)) {
		        $res = array();
		        foreach ($val as $v) {
		            $res[] = $this->_indStoreDBFormat($v);
		        }
		        return json_encode($res);
		    }
		}
		 */
		return $this->_indStoreDBFormat($val);
	}

	/**
	 * Get the value to store the value in the db
	 * Jaanus: stores the value if all its parts (day, month, year) are selected in form, otherwise stores
	 * (or updates data to) null value. NULL is useful in many cases, e.g when using Fabrik for working
	 * with data of such components as EventList, where in #___eventlist_events.enddates (times and endtimes as well)
	 * empty data is always NULL otherwise nulldate is displayed in its views.
	 *
	 * @param   mixed  $val  (array normally but string on csv import)
	 *
	 * @TODO: if NULL value is the first in repeated group then in list view whole group is empty.
	 * Could anyone find a solution? I give up :-(
	 *
	 * @return  string	yyyy-mm-dd
	 */

	private function _indStoreDBFormat($val)
	{
		$params = $this->getParams();
		if ($params->get('empty_is_null') == 1)
		{
			if (is_array($val) && !in_array('', $val))
			{
				return $val[2] . '-' . $val[1] . '-' . $val[0];
			}
		}
		else
		{
			return is_array($val) ? $val[2] . '-' . $val[1] . '-' . $val[0] : '';
		}
	}

	/**
	 * Does the element conside the data to be empty
	 * Used in isempty validation rule
	 *
	 * @param   array  $data           data to test against
	 * @param   int    $repeatCounter  repeat group #
	 *
	 * @return  bool
	 */

	public function dataConsideredEmpty($data, $repeatCounter)
	{
		if (strstr($data, ','))
		{
			$data = explode(',', $data);
		}
		$data = (array) $data;
		foreach ($data as $d)
		{
			if (trim($d) == '')
			{
				return true;
			}
		}
		return false;
	}

	/**
	 * Returns javascript which creates an instance of the class defined in formJavascriptClass()
	 *
	 * @param   int  $repeatCounter  Repeat group counter
	 *
	 * @return  array
	 */

	public function elementJavascript($repeatCounter)
	{
		$params = $this->getParams();
		$id = $this->getHTMLId($repeatCounter);
		$opts = $this->getElementJSOptions($repeatCounter);
		$opts->separator = $params->get('birthday_separatorlabel', JText::_('/'));
		return array('FbBirthday', $id, $opts);
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
		$db = FabrikWorker::getDbo();
		$aNullDates = array('0000-00-000000-00-00', '0000-00-00 00:00:00', '0000-00-00', '', $db->getNullDate());
		$params = $this->getParams();
		$monthlabels = array(JText::_('January'), JText::_('February'), JText::_('March'), JText::_('April'), JText::_('May'), JText::_('June'),
			JText::_('July'), JText::_('August'), JText::_('September'), JText::_('October'), JText::_('November'), JText::_('December'));
		$monthnumbers = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
		$daysys = array('01', '02', '03', '04', '05', '06', '07', '08', '09');
		$daysimple = array('1', '2', '3', '4', '5', '6', '7', '8', '9');
		$jubileum = array('0', '25', '75');
		$groupModel = $this->getGroup();
		/**
		 * Jaanus: json_decode replaced with FabrikWorker::JSONtoData that made visible also single data in repeated group
		 *
		 * Jaanus: removed condition canrepeat() from renderListData: weird result such as 05",null,
		 * "1940.07.["1940 (2011) when not repeating but still join and merged. Using isJoin() instead
		 */
		$data = $groupModel->isJoin() ? FabrikWorker::JSONtoData($data, true) : array($data);
		$data = (array) $data;
		$ft = $params->get('list_date_format', 'd.m.Y');

		// $ft = $params->get('birthday_format', 'd.m.Y'); //$ft = $params->get('birthday_format', '%Y-%m-%d');
		$fta = $params->get('list_age_format', 'no');
		$format = array();

		foreach ($data as $d)
		{
			if (!in_array($d, $aNullDates))
			{
				/**
				 * $$$ rob default to a format date
				 * $date = JFactory::getDate($d);
				 * $datedisp = $date->format($ft);
				 * Jaanus: sorry, but in this manner the element doesn't work with dates earlier than 1901
				 */

				list($year, $month, $day) = explode('-', $d);
				$daydisp = str_replace($daysys, $daysimple, $day);
				$monthdisp = str_replace($monthnumbers, $monthlabels, $month);
				$nextyear = date('Y') + 1;
				$lastyear = date('Y') - 1;
				$thisyear = date('Y');
				$year = JString::ltrim($year, '0');
				$dmy = $day . '.' . $month . '.' . $year;
				$mdy = $month . '/' . $day . '/' . $year;
				$dmonthyear = $daydisp . '. ' . $monthdisp . ' ' . $year;
				$monthdyear = $monthdisp . ' ' . $daydisp . ', ' . $year;
				if ($ft == "d.m.Y")
				{
					$datedisp = $dmy;
				}
				else
				{
					if ($ft == "m.d.Y")
					{
						$datedisp = $mdy;
					}
					if ($ft == "D. month YYYY")
					{
						$datedisp = $dmonthyear;
					}
					if ($ft == "Month d, YYYY")
					{
						$datedisp = $monthdyear;
					}
				}
				if ($fta == 'no')
				{
					$format[] = $datedisp;
				}
				else
				{
					if (date('m-d') == $month . '-' . $day)
					{
						if ($fta == '{age}')
						{
							$format[] = '<font color ="#DD0000"><b>' . ($thisyear - $year) . "</b></font>";
						}
						else
						{
							if ($fta == '{age} date')
							{
								$format[] = '<font color ="#DD0000"><b>' . $datedisp . ' (' . ($thisyear - $year) . ')</b></font>';
							}
							if ($fta == '{age} this')
							{
								$format[] = '<font color ="#DD0000"><b>' . ($thisyear - $year) . ' (' . $datedisp . ')</b></font>';
							}
							if ($fta == '{age} next')
							{
								$format[] = '<font color ="#DD0000"><b>' . ($nextyear - $year) . ' (' . $datedisp . ')</b></font>';
							}
						}
					}
					else
					{
						if ($fta == '{age} date')
						{
							if (date('m-d') > $month . '-' . $day)
							{
								$format[] = $datedisp . ' (' . ($thisyear - $year) . ')';
							}
							else
							{
								$format[] = $datedisp . ' (' . ($lastyear - $year) . ')';
							}
						}
						else
						{
							if ($fta == '{age}')
							{
								if (date('m-d') > $month . '-' . $day)
								{
									$format[] = $thisyear - $year;
								}
								else
								{
									$format[] = $lastyear - $year;
								}
							}
							else
							{
								if ($fta == '{age} this')
								{
									if (in_array(substr(($thisyear - $year), -1), $jubileum) || in_array(substr(($thisyear - $year), -2), $jubileum))
									{
										$format[] = '<b>' . ($thisyear - $year) . ' (' . $datedisp . ')</b>';
									}
									else
									{
										$format[] = ($thisyear - $year) . ' (' . $datedisp . ')';
									}
								}
								if ($fta == '{age} next')
								{
									if (in_array(substr(($nextyear - $year), -1), $jubileum) || in_array(substr(($nextyear - $year), -2), $jubileum))
									{
										$format[] = '<b>' . ($nextyear - $year) . ' (' . $datedisp . ')</b>';
									}
									else
									{
										$format[] = ($nextyear - $year) . ' (' . $datedisp . ')';
									}
								}
							}
						}
					}
				}
			}
			else
			{
				$format[] = '';
			}
		}
		$data = json_encode($format);
		return parent::renderListData($data, $thisRow);
	}

}
