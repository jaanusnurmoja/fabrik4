<?php
defined('JPATH_BASE') or die;

use Joomla\CMS\HTML\HTMLHelper;

$d = $displayData;

echo HTMLHelper_('select.genericlist', $d->options, $d->name, $d->attributes, 'value', 'text', $d->default, $d->id);
