<?php
/**
 * Add a radius search option to the list filters
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.list.radiussearch
 * @copyright   Copyright (C) 2005-2013 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

// Require the abstract plugin class
require_once COM_FABRIK_FRONTEND . '/models/plugin-list.php';

/**
 * Add a radius search option to the list filters
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.list.radiussearch
 * @since       3.0
 */

class PlgFabrik_ListRadius_Search extends PlgFabrik_List
{
	/**
	 * Place coordinates
	 *
	 * @var array
	 */
	protected $placeCoordinates = null;

	/**
	 * Build the select list which enables users to determine how the search is performed
	 *
	 * @param   array  $type  Selected search type
	 *
	 * @return mixed
	 */
	protected function searchSelectList($type)
	{
		$options = array();
		$params = $this->getParams();
		$default_search = $type[0];

		if ($params->get('myloc', 1) == 1)
		{
			$options[] = JHtml::_('select.option', 'mylocation', FText::_('PLG_VIEW_RADIUS_MY_LOCATION'));
		}
		else if ($default_search == 'mylocation')
		{
			$default_search = 'place';
		}

		if ($params->get('place', 1) == 1)
		{
			$placeElement = $this->getPlaceElement()->getElement();
			$options[] = JHtml::_('select.option', 'place', strip_tags($placeElement->label));
		}
		else if ($default_search == 'place')
		{
			$default_search = 'coords';
		}

		if ($params->get('coords', 1) == 1)
		{
			$options[] = JHtml::_('select.option', 'latlon', FText::_('PLG_VIEW_RADIUS_COORDINATES'));
		}
		else if ($default_search == 'latlon')
		{
			$default_search = 'geocode';
		}

		if ($params->get('geocode', 1) == 1)
		{
			$options[] = JHtml::_('select.option', 'geocode', FText::_('PLG_VIEW_RADIUS_GEOCODE'));
		}

		$selectName = 'radius_search_type' . $this->renderOrder . '[]';
		$select = JHtml::_('select.genericlist', $options, $selectName, '', 'value', 'text', $default_search);

		return $select;
	}

	/**
	 * Build the radius search HTML
	 *
	 * @param   array  &$args  Plugin args
	 *
	 * @return  void
	 */
	public function onMakeFilters(&$args)
	{
		if (!is_object($this->getMapElement()))
		{
			return;
		}
		$model = $this->getModel();
		$params = $this->getParams();
		$f = new stdClass;
		$f->label = FText::_($params->get('radius_label', 'Radius search'));
		$app = JFactory::getApplication();
		FabrikHelperHTML::stylesheet('plugins/fabrik_list/radius_search/radius_search.css');


		$layoutData = new stdClass;
		$layoutData->renderOrder = $this->renderOrder;
		$layoutData->baseContext = $this->getSessionContext();
		$layoutData->defaultSearch = $params->get('default_search', 'mylocation');
		$layoutData->geocodeDefault = $params->get('geocode_default', '');
		$layoutData->unit = $this->getParams()->get('radius_unit', 'km');
		$layoutData->distance = $this->getValue();
		$layoutData->startActive = $params->get('start_active', 0);
		$typeKey = $layoutData->baseContext . 'radius_search_type' . $this->renderOrder;
		$type = $app->getUserStateFromRequest($typeKey, 'radius_search_type' . $this->renderOrder, array($layoutData->defaultSearch));
		$layoutData->select = $this->searchSelectList($type);
		$layoutData->type = $type[0];
		list($layoutData->searchLatitude, $layoutData->searchLongitude) = $this->getSearchLatLon();
		$layoutData->geocodeAsYouType = $params->get('geocode_as_type', 1);
		$layoutData->hasGeocode = $params->get('geocode', 1) == 1;
		$layoutData->address = $address = $app->getUserStateFromRequest($layoutData->baseContext . 'geocode' . $this->renderOrder, 'radius_search_geocode_field' . $this->renderOrder);

		$lat   = $app->getUserStateFromRequest($layoutData->baseContext . 'lat' . $this->renderOrder, 'radius_search_lat' . $this->renderOrder);
		$lon   = $app->getUserStateFromRequest($layoutData->baseContext . 'lon' . $this->renderOrder, 'radius_search_lon' . $this->renderOrder);
		$o = FabrikString::mapStrToCoords($layoutData->geocodeDefault);
		$layoutData->defaultLat  = $lat ? $lat : (float) $o->lat;
		$layoutData->defaultLon  = $lon ? $lon : (float) $o->long;
		$layoutData->defaultZoom = (int) $o->zoom === 0 ? 7 : (int) $o->zoom;
		$layoutData->lat = $lat;
		$layoutData->lon = $lon;
		$active    = $app->getUserStateFromRequest($layoutData->baseContext . 'radius_search_active', 'radius_search_active' . $this->renderOrder, array($layoutData->startActive));
		$layoutData->active = $active[0];
		$layout = $this->getLayout('filters');
		$str = $layout->render($layoutData);

		$f->element = $str;
		$f->required = '';

		if (JFactory::getApplication()->input->get('format') !== 'raw')
		{
			FabrikHelperHTML::addStyleDeclaration("table.radius_table{border-collapse:collapse;border:0;}
			table.radius_table td{border:0;}");
		}

		JText::script('PLG_VIEW_RADIUS_NO_GEOLOCATION_AVAILABLE');
		JText::script('COM_FABRIK_SEARCH');
		JText::script('PLG_LIST_RADIUS_SEARCH');

		$mapElement = $this->getMapElement();
		$mapName = $mapElement->getFullName(true, false);
		$model->viewfilters[$mapName] = $f;
	}


	/**
	 * Get the coordinates for a place
	 *
	 * @param   string  $place  value selected in widget
	 *
	 * @return  array
	 */

	private function placeCoordinates($place)
	{
		if (isset($this->placeCoordinates))
		{
			return $this->placeCoordinates;
		}

		$session = JFactory::getSession();
		$session->set('fabrik.list.radius_search.filtersGot.ignore', true);

		$app = JFactory::getApplication();
		$input = $app->input;

		/** @var  $model FabrikFEModelList */
		$model = $this->getModel();
		$mapElement = $this->getMapElement();
		$mapName = $mapElement->getFullName(true, false);
		$placeElement = $this->getPlaceElement()->getElement();
		$useKey = $input->get('usekey');
		$input->set('usekey', $placeElement->name);
		$row = $model->getRow($place);
		$input->set('usekey', $useKey);

		if (is_object($row))
		{
			$coords = explode(':', str_replace(array('(', ')'), '', $row->$mapName));
			$this->placeCoordinates = explode(',', $coords[0]);
		}
		else
		{
			// No exact match lets unset the query and try to find a partial match
			// (perhaps the user didn't select anything from the dropdown?)
			unset($model->getForm()->query);
			$row = $model->findRow($placeElement->name, $place);

			if (is_object($row))
			{
				$coords = explode(':', str_replace(array('(', ')'), '', $row->$mapName));
				$this->placeCoordinates = explode(',', $coords[0]);
			}
			else
			{
				$this->placeCoordinates = array('', '');
			}
		}

		return $this->placeCoordinates;
	}

	/**
	 * Not used I think
	 *
	 * @param   array  &$args  Filters created from listfilter::getPostFilters();
	 *
	 * @return  void
	 */

	public function onGetPostFilter(&$args)
	{
		// Returning here as was creating odd results with empty filters for other elements - seems to work without this anyway???
		return;
	}

	/**
	 * Build the sql query to filter the data
	 *
	 * @param   object  $params  plugin params
	 *
	 * @return  string  query's where statement
	 */

	protected function getQuery($params)
	{
		$app = JFactory::getApplication();
		$input = $app->input;
		list($latitude, $longitude) = $this->getSearchLatLon();

		if (trim($latitude) === '' && trim($longitude) === '')
		{
			$input->set('radius_search_active' . $this->renderOrder, array(0));

			return '';
		}
		// Need to unset for multiple radius searches to work
		unset($this->mapElement);
		$el = $this->getMapElement();
		$el = FabrikString::safeColName($el->getFullName(false, false));

		// Crazy sql to get the lat/lon from google map element
		$latfield = "SUBSTRING_INDEX(TRIM(LEADING '(' FROM $el), ',', 1)";
		$lonfield = "SUBSTRING_INDEX(SUBSTRING_INDEX($el, ',', -1), ')', 1)";
		$v = $this->getValue();

		if ($params->get('radius_unit', 'km') == 'km')
		{
			$query = "(((acos(sin((" . $latitude . "*pi()/180)) * sin(($latfield *pi()/180))+cos((" . $latitude
				. "*pi()/180)) * cos(($latfield *pi()/180)) * cos(((" . $longitude . "- $lonfield)*pi()/180))))*180/pi())*60*1.1515*1.609344) <= "
				. $v;
		}
		else
		{
			$query = "(((acos(sin((" . $latitude . "*pi()/180)) * sin(($latfield *pi()/180))+cos((" . $latitude
				. "*pi()/180)) * cos(($latfield *pi()/180)) * cos(((" . $longitude . "- $lonfield)*pi()/180))))*180/pi())*60*1.1515) <= " . $v;
		}

		return $query;
	}

	/**
	 * Get the searched for lat/lon
	 *
	 * @since   3.0.8
	 *
	 * @return  array
	 */

	protected function getSearchLatLon()
	{
		$app = JFactory::getApplication();
		$baseContext = $this->getSessionContext();
		$type = $app->input->get('radius_search_type' . $this->renderOrder, array(), 'array');
		$type = FArrayHelper::getValue($type, 0);

		switch ($type)
		{
			case 'place':
				$place = $app->getUserStateFromRequest($baseContext . 'radius_search_place' . $this->renderOrder, 'radius_search_place' . $this->renderOrder);
				list($latitude, $longitude) = $this->placeCoordinates($place);
				break;
			default:
				$latitude = $app->getUserStateFromRequest($baseContext . 'lat' . $this->renderOrder, 'radius_search_lat' . $this->renderOrder);
				$longitude = $app->getUserStateFromRequest($baseContext . 'lon' . $this->renderOrder, 'radius_search_lon' . $this->renderOrder);
				break;
			case 'geocode':
				$latitude = $app->getUserStateFromRequest($baseContext . 'lat' . $this->renderOrder, 'radius_search_geocode_lat' . $this->renderOrder);
				$longitude = $app->getUserStateFromRequest($baseContext . 'lon' . $this->renderOrder, 'radius_search_geocode_lon' . $this->renderOrder);
				break;
		}

		return array($latitude, $longitude);
	}

	/**
	 * onFiltersGot method - run after the list has created filters
	 *
	 * @return bool currently ignored
	 */

	public function onFiltersGot()
	{
		$session = JFactory::getSession();

		if ($session->get('fabrik.list.radius_search.filtersGot.ignore'))
		{
			$session->clear('fabrik.list.radius_search.filtersGot.ignore');
			return true;
		}

		$params = $this->getParams();

		/** @var  $model FabrikFEModelList */
		$model = $this->getModel();
		$app = JFactory::getApplication();
		$active = $app->input->get('radius_search_active' . $this->renderOrder, array(0), 'array');

		if ($active[0] == 0)
		{
			return true;
		}

		$v = $this->getValue();
		$query = $this->getQuery($params);
		$key = 'rs_test___map';
		$model->filters['elementid'][] = null;
		$model->filters['value'][] = $v;
		$model->filters['condition'][] = '=';
		$model->filters['join'][] = 'AND';
		$model->filters['no-filter-setup'][] = 0;
		$model->filters['hidden'][] = 0;
		$model->filters['key'][] = $key;
		$model->filters['search_type'][] = 'normal';
		$model->filters['match'][] = 0;
		$model->filters['full_words_only'][] = 0;
		$model->filters['eval'][] = 0;
		$model->filters['required'][] = 0;
		$model->filters['access'][] = 0;
		$model->filters['grouped_to_previous'][] = 0;
		$model->filters['label'][] = $params->get('radius_label', 'Radius search');
		$model->filters['sqlCond'][] = $query;
		$model->filters['origvalue'][] = $v;
		$model->filters['filter'][] = $v;
	}

	/**
	 * Get radius search distance value
	 *
	 * @return number
	 */

	protected function getValue()
	{
		$baseContext = $this->getSessionContext();
		$app = JFactory::getApplication();
		$v = $app->getUserStateFromRequest($baseContext . 'radius_search_distance' . $this->renderOrder, 'radius_search_distance' . $this->renderOrder, '');

		if ($v == '')
		{
			return;
		}

		$v = (int) $v;

		return $v;
	}


	/**
	 * Can the plug-in select list rows
	 *
	 * @return  bool
	 */

	public function canSelectRows()
	{
		return false;
	}

	/**
	 * Get the place element model
	 * Don't get a cached version as 2 plugins may be set
	 *
	 * @return  object  Place element model
	 */

	private function getPlaceElement()
	{
		$model = $this->getModel();
		$elements = $model->getElements('id', false);
		$params = $this->getParams();

		if (!array_key_exists($params->get('radius_placeelement'), $elements))
		{
			throw new RuntimeException('No place element found for radius search plugin', 500);
		}
		else
		{
			$this->placeElement = $elements[$params->get('radius_placeelement')];

			return $this->placeElement;
		}
	}

	/**
	 * Get the map element model
	 * Don't get a cached version as 2 plugins may be set
	 *
	 * @return  object  Element model
	 */

	private function getMapElement()
	{
		$params = $this->getParams();
		$model = $this->getModel();
		$elements = $model->getElements('id');
		$this->mapElement = FArrayHelper::getValue($elements, $params->get('radius_mapelement'), false);

		if ($this->mapElement === false)
		{
			throw new RuntimeException('Radius Search Plugin: no map element selected', 500);
		}

		return $this->mapElement;
	}

	/**
	 * Load the javascript class that manages plugin interaction
	 * should only be called once
	 *
	 * @return  string  Javascript class file
	 */

	public function loadJavascriptClass()
	{
		$params = $this->getParams();
		$model = $this->getModel();
		$mapElement = $this->getMapElement();

		if (!is_object($mapElement))
		{
			throw new RuntimeException('Radius search plug-in active but map element unpublished');

			return;
		}

		$opts = array();
		$opts['container'] = 'radius_search_place_container';

		// Increase z-index with advanced class
		$opts['menuclass'] = 'auto-complete-container advanced';
		$formId = $model->getFormModel()->get('id');

		if ($params->get('place', 1) == 1)
		{
			$el = $this->getPlaceElement();
			FabrikHelperHTML::autoComplete("radius_search_place{$this->renderOrder}", $el->getElement()->id, $formId, $el->getElement()->plugin, $opts);
		}

		if ($params->get('myloc', 1) == 1)
		{
			$ext = FabrikHelperHTML::isDebug() ? '.js' : '-min.js';
			FabrikHelperHTML::script('media/com_fabrik/js/lib/geo-location/geo' . $ext);
		}

		parent::loadJavascriptClass();
	}

	/**
	 * Return the javascript to create an instance of the class defined in formJavascriptClass
	 *
	 * @param   array  $args  Array [0] => string table's form id to contain plugin
	 *
	 * @return bool
	 */

	public function onLoadJavascriptInstance($args)
	{
		parent::onLoadJavascriptInstance($args);

		if (!is_object($this->getMapElement()))
		{
			return false;
		}

		$params = $this->getParams();
		$app = JFactory::getApplication();
		list($latitude, $longitude) = $this->getSearchLatLon();
		$opts = $this->getElementJSOptions();
		$containerOverride = FArrayHelper::getValue($args, 0, '');

		if (strstr($containerOverride, 'visualization'))
		{
			$opts->ref = str_replace('visualization_', '', $containerOverride);
		}

		$opts->steps = (int) $params->get('radius_max', 100);
		$opts->unit = $params->get('radius_unit', 'km');
		$opts->value = $this->getValue();
		$opts->lat = $latitude;
		$opts->lon = $longitude;
		$preFilterDistance = $params->get('prefilter_distance', '');
		$opts->prefilter = $preFilterDistance === '' ? false : true;
		$opts->prefilterDone = (bool) $app->input->getBool('radius_prefilter', false);
		$opts->prefilterDistance = $preFilterDistance;
		$opts->myloc = $params->get('myloc', 1) == 1 ? true : false;
		$o = FabrikString::mapStrToCoords($params->get('geocode_default', ''));
		$opts->geocode_default_lat = $o->lat;
		$opts->geocode_default_long = $o->long;
		$opts->geocode_default_zoom = (int) $o->zoom;
		$opts->geoCodeAsType = $params->get('geocode_as_type', 1);
		$opts->renderOrder = $this->renderOrder;
		$opts->offset_y = (int)$params->get('window_offset_y', '0');
		$opts = json_encode($opts);
		$this->jsInstance = "new FbListRadiusSearch($opts)";

		JText::script('PLG_LIST_RADIUS_SEARCH_CLEAR_CONFIRM');
		JText::script('PLG_LIST_RADIUS_SEARCH_GEOCODE_ERROR');

		return true;
	}

	/**
	 * Overridden by plugins if necessary.
	 * If the plugin is a filter plugin, return true if it needs the 'form submit'
	 * method, i.e. the Go button.  Implemented specifically for radius search plugin.
	 *
	 * @return  bool
	 */

	public function requireFilterSubmit()
	{
	}

	/**
	 * Overridden by plugins if necessary.
	 * If the plugin is a filter plugin, return true if it needs the 'form submit'
	 * method, i.e. the Go button.  Implemented specifically for radius search plugin.
	 *
	 * @return  bool
	 */
	public function requireFilterSubmit_result()
	{
		return true;
	}
}
