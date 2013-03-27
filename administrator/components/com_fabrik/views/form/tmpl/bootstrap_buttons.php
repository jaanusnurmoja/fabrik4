<?php
/**
 * Admin Bootstrap Form Edit: Buttons Tmpl
 *
 * @package     Joomla.Administrator
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @since       3.0
 */
?>
<div class="tab-pane" id="tab-buttons">

<div class="row-fluid">
	<div class="span6">
		<fieldset class="form-horizontal">
			<legend><?php echo JText::_('COM_FABRIK_RESET');?></legend>
			<?php foreach ($this->form->getFieldset('buttons-reset') as $this->field) :
				echo $this->loadTemplate('control_group');
			endforeach;
			?>
		</fieldset>
	</div>

	<div class="span6">
		<fieldset class="form-horizontal">
			<legend><?php echo JText::_('COM_FABRIK_COPY');?></legend>
			<?php foreach ($this->form->getFieldset('buttons-copy') as $this->field) :
				echo $this->loadTemplate('control_group');
			endforeach;
			?>
		</fieldset>
	</div>

</div>

<div class="row-fluid">
	<div class="span6">
		<fieldset class="form-horizontal">
			<legend><?php echo JText::_('COM_FABRIK_BACK');?></legend>
			<?php foreach ($this->form->getFieldset('buttons-goback') as $this->field) :
				echo $this->loadTemplate('control_group');
			endforeach;
			?>
		</fieldset>
	</div>

	<div class="span6">
		<fieldset class="form-horizontal">
			<legend><?php echo JText::_('COM_FABRIK_APPLY');?></legend>
			<?php foreach ($this->form->getFieldset('buttons-apply') as $this->field) :
				echo $this->loadTemplate('control_group');
			endforeach;
			?>
		</fieldset>
	</div>

</div>

<div class="row-fluid">
	<div class="span6">
		<fieldset class="form-horizontal">
			<legend><?php echo JText::_('COM_FABRIK_SAVE');?></legend>
			<?php foreach ($this->form->getFieldset('buttons-save') as $this->field) :
				echo $this->loadTemplate('control_group');
			endforeach;
			?>
		</fieldset>
	</div>
	<div class="span6">
		<fieldset class="form-horizontal">
			<legend><?php echo JText::_('COM_FABRIK_DELETE');?></legend>
			<?php foreach ($this->form->getFieldset('buttons-delete') as $this->field) :
				echo $this->loadTemplate('control_group');
			endforeach;
			?>
		</fieldset>
	</div>
</div>
</div>