<?php
/**
 * Admin Lists Confirm Delete Tmpl
 *
 * @package     Joomla.Administrator
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @since       3.0
 */

// No direct access
defined('_JEXEC') or die;
?>
<script type="text/javascript">
Joomla.submitform = function(task, form) {
	if (typeof(form) === 'undefined') {
		form = document.getElementById('fabrik-form');
	}
	if (typeof(task) !== 'undefined') {
	form.task.value = task;
	}
	// Submit the form.
	if (typeof form.onsubmit == 'function') {
		form.onsubmit();
	}
	if (typeof form.fireEvent == "function") {
		form.fireEvent('submit');
	}
	form.submit();
};
</script>
<form action="<?php JRoute::_('index.php?option=com_fabrik'); ?>" method="post" name="adminForm" id="fabrik-form" class="form-validate">

	<?php
	$cid	= JRequest::getVar('cid', array(), 'post', 'array');
	foreach ($cid as $id) { ?>
		<input type="hidden" name="cid[]" value="<?php echo $id ;?>" />
	<?php } ?>

	<fieldset class="adminform">
		<legend><?php echo JText::_('COM_FABRIK_DELETE_FROM');?></legend>
		<ul class="adminformlist">
		<?php for ($i=0; $i < count($this->items); $i++) {?>
  		<li><?php echo $this->items[$i]?></li>
		<?php }?>
		</ul>

		<ul>
		<?php foreach ($this->form->getFieldset('details') as $field) :?>
			<li>
				<?php echo $field->label; ?><?php echo $field->input; ?>
			</li>
			<?php endforeach; ?>
		</ul>
	</fieldset>
	<input type="hidden" name="task" value="" />
  	<?php echo JHTML::_('form.token');
	echo JHTML::_('behavior.keepalive'); ?>
</form>