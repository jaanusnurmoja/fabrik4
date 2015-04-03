<?php

defined('JPATH_BASE') or die;

$d = $displayData;
$readOnly = $d->timerReadOnly ? 'readonly=\"readonly\"' : '';
$kls = $d->timerReadOnly ? 'readonly' : '';

if ($d->elementError != '') :
	$kls .= ' elementErrorHighlight';
endif;
?>

<?php
if (!$d->timerReadOnly) :
?>
	<div class="input-append">
<?php
endif;
?>
<input type="<?php echo $d->type;?>"
	class="fabrikinput input-small inputbox text <?php echo $kls;?>"
	name="<?php echo $d->name; ?>"
	<?php echo $readOnly;?>
	id="<?php echo $d->id; ?>" size="<?php echo $d->size; ?>"
	value="<?php echo $d->value; ?>" />

	<?php
	if (!$d->timerReadOnly) :
	?>
	<button class="btn" id="<?php echo $d->id; ?>_button">
		<i class="<?php echo $d->icon; ?>"></i> <span><?php echo FText::_('PLG_ELEMENT_TIMER_START'); ?></span>
	</button>
</div>
<?php
endif;
?>
