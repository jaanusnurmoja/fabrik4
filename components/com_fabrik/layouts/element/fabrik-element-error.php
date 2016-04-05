<?php
/**
 * Element error JLayout
 *
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2016 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
defined('JPATH_BASE') or die;

use Fabrik\Helpers\Html;

$d = $displayData;
$usersConfig = JComponentHelper::getParams('com_fabrik');
$icon        = $usersConfig->get('error_icon', 'exclamation-sign') . '.png';
?>
<span class="fabrikErrorMessage">

<?php
if ($d->err !== '') :
	?>
	<a href="#" class="fabrikTip" title="<span><?php echo $d->err;?></span>" opts="{notice:true}">
	<?php echo Html::image($icon, 'form', $d->tmpl);?>
	</a>
<?php
endif;
?>

</span>
