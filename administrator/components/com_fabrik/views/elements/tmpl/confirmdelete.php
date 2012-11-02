<?php
/**
 * Admin Elements Confirm Delete Tmpl
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

<form action="<?php JRoute::_('index.php?option=com_fabrik'); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
	<fieldset class="adminform">
		<legend><?php echo JText::_('COM_FABRIK_ELEMENTS');?></legend>
		<ul class="adminformlist">
		<?php for ($i = 0; $i < count($this->items); $i++)
		{
		$element = $this->items[$i];?>
  		<li>
  			<label for="drop-<?php echo $element->id?>">
  				<?php echo $element->label; ?>
  			</label>
	  		<fieldset id="drop-<?php echo $element->id?>" class="radio">
		  		<label><input type="radio" name="drop[<?php echo $element->id ?>][]" value="0" checked="checked" /><?php echo JText::_('JNO') ?></label>
					<label><input type="radio" name="drop[<?php echo $element->id ?>][]" value="1" /><?php echo JText::_('JYES') ?></label>
				</fieldset>
				<input type="hidden" name="cid[]" value="<?php echo $element->id ?>" />
  		</li>
<?php
}
?>
		</ul>

	</fieldset>
	<input type="hidden" name="task" value="" />
  	<?php echo JHTML::_('form.token');
	echo JHTML::_('behavior.keepalive'); ?>
</form>