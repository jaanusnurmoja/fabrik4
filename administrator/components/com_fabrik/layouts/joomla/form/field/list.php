<?php

// This is a very quick hack to the joomla list field to remove the form-select class so that the modal repeat renders correctly

defined('_JEXEC') or die;

use Joomla\CMS\Factory;

/* The following is used by the install/upgrade script to validate whether an installed override is ours or not */
define('FABRIK_JOOMLA_LISTFIELD_LAYOUT_OVERRIDE', 1);

extract($displayData);

$originalListFile = JPATH_ROOT."/layouts/joomla/form/field/list.php";

$buffer = file_get_contents($originalListFile);

if ($size==-9999) {
	// Replace the form-select with inputbox
	$buffer = str_replace("form-select", "inputbox", $buffer);
}

// And then run it
eval('?>'.$buffer.PHP_EOL.'?>');
