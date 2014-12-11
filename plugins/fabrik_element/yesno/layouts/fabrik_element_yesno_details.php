<?php
/**
 * Layout: Yes/No field list view
 *
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2014 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * @since       3.2
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

$data = $displayData['value'];
$tmpl = $displayData['tmpl'];
$j3 = FabrikWorker::j3();

if ($data == '1')
{
	$icon = $j3 ? 'checkmark.png' : '1.png';
	$opts = array('alt' => FText::_('JYES'));

	return FabrikHelperHTML::image($icon, 'list', $tmpl, $opts);
}
else
{
	$icon = $j3 ? 'remove.png' : '0.png';

	return FabrikHelperHTML::image($icon, 'list', $tmpl, array('alt' => FText::_('JNO')));
}
