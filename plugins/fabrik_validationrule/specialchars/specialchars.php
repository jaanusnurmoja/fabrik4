<?php
/**
 * @package fabrikar
 * @author Rob Clayburn
 * @copyright (C) Rob Clayburn
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

//require the abstract plugin class
require_once(COM_FABRIK_FRONTEND . '/models/validation_rule.php');

class plgFabrik_ValidationruleSpecialChars extends plgFabrik_Validationrule
{

	protected $pluginName = 'specialchars';

	/** @var bool if true uses icon of same name as validation, otherwise uses png icon specified by $icon */
	protected $icon = 'notempty';

	/**
	 * (non-PHPdoc)
	 * @see plgFabrik_Validationrule::validate()
	 */

	public function validate($data, &$elementModel, $pluginc, $repeatCounter)
	{
		//for multiselect elements
		if (is_array($data))
		{
			$data = implode('', $data);
		}
		$params = $this->getParams();
		$domatch = $params->get('specialchars-match');
		$domatch = $domatch[$pluginc];
		if ($domatch)
		{
			$v = $params->get('specalchars');
			$v = explode(',', $v[$pluginc]);
			foreach($v as $c)
			{
				if (strstr($data, $c))
				{
					return false;
				}
			}
		}
		return true;
	}

	function replace($data, &$element, $pluginc)
	{
		$params = $this->getParams();
		$domatch = (array) $params->get('specialchars-match');
		$domatch = $domatch[$pluginc];
		if (!$domatch)
		{
			$v = $params->get($this->pluginName . '-expression');
			$replace = $params->get('specialchars-replacestring');
			$replace = $replace[$pluginc];
			if ($replace === '_default')
			{
				$replace = '';
			}
			$v = $params->get('specalchars');
			$v = explode(',', $v[$pluginc]);
			foreach ($v as $c)
			{
				$data = str_replace($c, $replace, $data);
			}
		}
		return $data;
	}
}
?>