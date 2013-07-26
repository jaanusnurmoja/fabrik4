<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Serach.fabrik
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Content Search plugin
 *
 * @package     Joomla.Plugin
 * @subpackage  Serach.fabrik
 * @since       3.0
 */

class PlgSearchFabrik extends JPlugin
{

	/**
	 * Get the search areas
	 *
	 * @return  array  Search areas
	 */

	public function onContentSearchAreas()
	{
		// Load plugin params info
		$section = $this->params->get('search_section_heading');
		$areas = array('fabrik' => $section);
		return $areas;
	}

	/**
	 * Fabrik Search method
	 *
	 * The sql must return the following fields that are
	 * used in a common display routine: href, title, section, created, text,
	 * browsernav
	 *
	 * @param   string  $text      Target search string
	 * @param   string  $phrase    Mathcing option, exact|any|all
	 * @param   string  $ordering  Ordering option, newest|oldest|popular|alpha|category
	 * @param   mixed   $areas     An array if restricted to areas, null if search all
	 *
	 * @return  array
	 */

	public function onContentSearch($text, $phrase = '', $ordering = '', $areas = null)
	{
		if (is_array($areas))
		{
			if (!array_intersect($areas, array_keys($this->onContentSearchAreas())))
			{
				return array();
			}
		}
		return plgSystemFabrik::onDoContentSearch($text, $phrase, $ordering, $areas);
	}

}
