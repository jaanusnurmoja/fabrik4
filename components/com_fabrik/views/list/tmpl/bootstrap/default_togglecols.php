<?php
/**
 * Bootstrap List Template - Toggle columns widget
 *
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2015 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * @since       3.1
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

use Fabrik\Helpers\Html;
use Fabrik\Helpers\Text;

?>
<li class="dropdown togglecols">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<?php echo Html::icon('icon-eye-open', Text::_('COM_FABRIK_TOGGLE')); ?>
		<b class="caret"></b>
	</a>
	<ul class="dropdown-menu">
	<?php
	$groups = array();

	foreach ($this->toggleCols as $group) :
		?>
		<li>
			<a data-toggle-group="<?php echo $group['name']?>" data-toggle-state="open">
				<?php echo Html::icon('icon-eye-open'); ?>
				<strong><?php echo $group['name'];?></strong>
			</a>
		</li>
		<?php
		foreach ($group['elements'] as $element => $label) :
		?>
		<li>
			<a data-toggle-col="<?php echo $element?>" data-toggle-parent-group="<?php echo $group['name']?>" data-toggle-state="open">
				<?php echo Html::icon('icon-eye-open', $label); ?>
			</a>
		</li>
		<?php
		endforeach;

	endforeach;

	?>
	</ul>
</li>
