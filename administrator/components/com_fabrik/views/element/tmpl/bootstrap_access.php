<?php
/**
 * Admin Element Edit - Access Tmpl
 *
 * @package     Joomla.Administrator
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2013 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * @since       3.0
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

?>
<div class="tab-pane" id="tab-access">
	<legend><?php echo JText::_('COM_FABRIK_GROUP_LABAEL_RULES_DETAILS'); ?></legend>
	<fieldset class="form-horizontal">
		<?php
		foreach ($this->form->getFieldset('access') as $this->field) :
			echo $this->loadTemplate('control_group');
		endforeach;
		foreach ($this->form->getFieldset('access2') as $this->field) :
			echo $this->loadTemplate('control_group');
		endforeach;
		?>
	</fieldset>
</div>
