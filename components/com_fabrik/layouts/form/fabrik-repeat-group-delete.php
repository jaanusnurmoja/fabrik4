<?php
/**
 * Repeat group delete button
 */

defined('JPATH_BASE') or die;

use Fabrik\Helpers\Html;

$d = $displayData;
?>
<a class="deleteGroup btn btn-small btn-danger" href="#">
	<?php echo Html::icon('icon-minus fabrikTip tip-small', '', 'data-role="fabrik_delete_group" opts="{trigger: \'hover\'}" title="' . FText::_('COM_FABRIK_DELETE_GROUP'). '"'); ?>
</a>