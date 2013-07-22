<?php
/**
 * Admin Element Edit - List view Tmpl
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
<div class="tab-pane" id="tab-listview">

	<ul class="nav nav-tabs">
		<li class="active">
	    	<a data-toggle="tab" href="#listview-details">
	    		<?php echo JText::_('COM_FABRIK_ELEMENT_LABEL_LIST_SETTINGS_DETAILS'); ?>
	    	</a>
	    </li>
	    <li>
	    	<a data-toggle="tab" href="#listview-icons">
	    		<?php echo JText::_('COM_FABRIK_ELEMENT_LABEL_ICONS_SETTINGS_DETAILS')?>
	    	</a>
	    </li>
	    <li>
	    	<a data-toggle="tab" href="#listview-filters">
	    		<?php echo JText::_('COM_FABRIK_ELEMENT_LABEL_FILTERS_DETAILS')?>
	    	</a>
	    </li>
	    <li>
	    	<a data-toggle="tab" href="#listview-css">
	    		<?php echo JText::_('COM_FABRIK_ELEMENT_LABEL_CSS_DETAILS')?>
	    	</a>
	    </li>
	    <li>
	    	<a data-toggle="tab" href="#listview-calculations">
	    		<?php echo JText::_('COM_FABRIK_ELEMENT_LABEL_CALCULATIONS_DETAILS')?>
	    	</a>
	    </li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane active" id="listview-details">
		    <fieldset class="form-horizontal">
				<?php foreach ($this->form->getFieldset('listsettings') as $this->field) :
					echo $this->loadTemplate('control_group');
				endforeach;
				?>
				<?php foreach ($this->form->getFieldset('listsettings2') as $this->field) :
					echo $this->loadTemplate('control_group');
				endforeach;
				?>
			</fieldset>
		</div>

		<div class="tab-pane" id="listview-icons">
			<fieldset class="form-horizontal">
				<?php foreach ($this->form->getFieldset('icons') as $this->field) :
					echo $this->loadTemplate('control_group');
				endforeach;
				?>
			</fieldset>
		</div>

		<div class="tab-pane" id="listview-filters">
			<fieldset class="form-horizontal">
				<?php foreach ($this->form->getFieldset('filters') as $this->field) :
					echo $this->loadTemplate('control_group');
				endforeach;
				?>
				<?php foreach ($this->form->getFieldset('filters2') as $this->field) :
					echo $this->loadTemplate('control_group');
				endforeach;
				?>
			</fieldset>
		</div>

		<div class="tab-pane" id="listview-css">
			<fieldset class="form-horizontal">
				<?php foreach ($this->form->getFieldset('viewcss') as $this->field) :
					echo $this->loadTemplate('control_group');
				endforeach;
				?>
			</fieldset>
		</div>

		<div class="tab-pane" id="listview-calculations">
			<fieldset class="form-horizontal">
				<div class="span6">
				<?php
				$fieldsets = $this->form->getFieldsets();
				$cals = array('calculations-sum', 'calculations-avg', 'calculations-median');
				foreach ($cals as $cal) :?>
					<legend><?php echo JText::_($fieldsets[$cal]->label); ?></legend>
					<?php foreach ($this->form->getFieldset($cal) as $this->field) :
						echo $this->loadTemplate('control_group');
					endforeach;
				endforeach;
				?>
				</div>
				<div class="span6">
				<?php
				$cals = array('calculations-count', 'calculations-custom');
				foreach ($cals as $cal) :?>
					<legend><?php echo JText::_($fieldsets[$cal]->label); ?></legend>
					<?php foreach ($this->form->getFieldset($cal) as $this->field) :
						echo $this->loadTemplate('control_group');
					endforeach;
				endforeach;
				?>
				</div>
			</fieldset>
		</div>
	</div>
</div>
