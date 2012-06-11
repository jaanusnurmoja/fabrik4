<?php
/**
 * Plugin element to render facebook open graph activity feed widget
 * @package fabrikar
 * @author Rob Clayburn
 * @copyright (C) Rob Clayburn
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport('joomla.application.component.model');

require_once(JPATH_SITE . '/components/com_fabrik/models/element.php');

class plgFabrik_ElementFbrecommendations extends plgFabrik_Element {

	protected $hasLabel = false;

	protected $fieldDesc = 'INT(%s)';

	protected $fieldSize = '1';

	/**
	 * (non-PHPdoc)
	 * @see plgFabrik_Element::render()
	 */

	function render($data, $repeatCounter = 0)
	{
		$params = $this->getParams();
		$str = FabrikHelperHTML::facebookGraphAPI( $params->get('opengraph_applicationid'));
		$domain = $params->get('fbrecommendations_domain');
		$width = $params->get('fbrecommendations_width', 300);
		$height = $params->get('fbrecommendations_height', 300);
		$header = $params->get('fbrecommendations_header', 1) == 1 ? 'true' : 'false';
		$border = $params->get('fbrecommendations_border', '');
		$font = $params->get('fbrecommendations_font', 'arial');
		$colorscheme = $params->get('fbrecommendations_colorscheme', 'light');
		$str .= '<fb:recommendations site="' . $domain . '" width="' . $width . '" height="' . $height . '" header="' . $header . '" colorscheme="' . $colorscheme . '" font="' . $font . '" border_color="' . $border . '" />';
		return $str;
	}

	/**
	 * (non-PHPdoc)
	 * @see plgFabrik_Element::elementJavascript()
	 */

	function elementJavascript($repeatCounter)
	{
		$id = $this->getHTMLId($repeatCounter);
		$opts = $this->getElementJSOptions($repeatCounter);
		$opts = json_encode($opts);
		return "new FbRecommendations('$id', $opts)";
	}

}
?>