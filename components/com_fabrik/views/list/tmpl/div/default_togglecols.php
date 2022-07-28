<?php

use Joomla\CMS\Language\Text;

/**
 * Bootstrap List Template - Toggle columns widget
 *
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2020  Media A-Team, Inc. - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * @since       3.1
 */
 defined('_JEXEC') or die;
 
?>
<li class="dropdown togglecols">
	<a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
		<?php echo FabrikHelperHTML::icon('icon-eye-open', Text::_('COM_FABRIK_TOGGLE')); ?>
		<b class="caret"></b>
	</a>
	<ul class="dropdown-menu">
	<?php
	$groups = array();

	foreach ($this->toggleCols as $group) :
		?>
		<li>
			<a data-bs-toggle-group="<?php echo $group['name']?>" data-bs-toggle-state="open">
				<?php echo FabrikHelperHTML::icon('icon-eye-open'); ?>
				<strong><?php echo $group['name'];?></strong>
			</a>
		</li>
		<?php
		foreach ($group['elements'] as $element => $label) :
		?>
		<li>
			<a data-bs-toggle-col="<?php echo $element?>" data-bs-toggle-parent-group="<?php echo $group['name']?>" data-bs-toggle-state="open">
				<?php echo FabrikHelperHTML::icon('icon-eye-open', $label); ?>
			</a>
		</li>
		<?php
		endforeach;

	endforeach;

	?>
	</ul>
</li>
