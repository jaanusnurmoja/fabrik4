<?php
/**
 * Email list plugin template example
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.list.email
 * @copyright   Copyright (C) 2005-2013 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

$this->filepath = "foo";
$formModel = $model->getFormModel();

foreach ($row as $name => $value)
{
	if (preg_match('#_raw$#', $name))
	{
		continue;
	}

	$elementModel = $formModel->getElement($name);

	if (empty($elementModel))
	{
		continue;
	}

	$element = $elementModel->getElement();
	$label = $element->label;
	$fval = $elementModel->renderTableData($val, $row);
	echo "$name : $label : $value : $fval<br />\n";
}
