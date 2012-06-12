<?php

/**
 * @package		Joomla
 * @subpackage	Fabik
 * @copyright	Copyright (C) 2005 - 2008 Pollen 8 Design Ltd. All rights reserved.
 * @license		GNU/GPL
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport('joomla.application.component.view');
require_once('components/com_fabrik/views/list/view.base.php');

class FabrikViewList extends FabrikViewListBase {

	function display($tpl = null)
	{
		parent::display($tpl);
		$this->output();
	}
}
?>