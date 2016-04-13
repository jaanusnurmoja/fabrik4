<?php
/**
 * Fabrik List Template: Custom Example Buttons
 *
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2015 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

use Fabrik\Helpers\Text;

?>
<?php if($this->showAdd) {?>
	<span class="addbutton" id="<?php echo $this->addRecordId;?>">
		<a href="<?php echo $this->addRecordLink;?>"><?php echo Text::_('ADD');?></a>
	</span>
<?php }?>

<?php if($this->showCSV) {?>
	<span class="csvExportButton" id="fabrikExportCSV">
		<a href="#"><?php echo Text::_('EXPORT TO CSV');?></a>
	</span>
<?php }?>

<?php if($this->showCSVImport) {?>
	<span class="csvImportButton" id="fabrikImportCSV">
		<a href="<?php echo $this->csvImportLink;?>"><?php echo Text::_('IMPORT FROM CSV');?></a>
	</span>
<?php }?>

<?php if($this->showRSS == 'sdfsd') {?>
	<span class="feedButton" id="fabrikShowRSS">
		<a href="<?php echo $this->rssLink;?>"><?php echo Text::_('SUBSCRIBE RSS');?></a>
	</span>
<?php }?>

<?php if($this->showPDF) {
echo $this->pdfLink;
}?>