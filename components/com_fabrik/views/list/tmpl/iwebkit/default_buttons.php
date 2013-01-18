<?php
/**
 * Fabrik List Template: IWebKit Buttons
 *
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 */

// No direct access
defined('_JEXEC') or die;
?>
<?php if ($this->showAdd) {?>
	<span class="addbutton">
		<a class="addRecord" href="<?php echo $this->addRecordLink;?>">
			<?php echo FabrikHelperHTML::image('add.png', 'list', $this->tmpl);?>
			<?php echo $this->addLabel?>
		</a>
	</span>
<?php }?>

<?php if ($this->showCSV) {?>
	<span class="csvExportButton">
		<a href="#">
			<?php echo FabrikHelperHTML::image('csv-export.png', 'list', $this->tmpl);?>
			<?php echo JText::_('COM_FABRIK_EXPORT_TO_CSV');?>
		</a>
	</span>
<?php }?>

<?php if ($this->showCSVImport) {?>
	<span class="csvImportButton">
		<a href="<?php echo $this->csvImportLink;?>">
			<?php echo FabrikHelperHTML::image('csv-import.png', 'list', $this->tmpl);?>
			<?php echo JText::_('COM_FABRIK_IMPORT_FROM_CSV');?>
		</a>
	</span>
<?php }?>

<?php if ($this->showRSS) {?>
	<span class="feedButton">
		<a href="<?php echo $this->rssLink;?>">
			<?php echo FabrikHelperHTML::image('feed.png', 'list', $this->tmpl);?>
			<?php echo JText::_('COM_FABRIK_SUBSCRIBE_RSS');?>
		</a>
	</span>
<?php }
	if ($this->showPDF) {?>
		<span class="pdfButton">
			<a href="<?php echo $this->pdfLink;?>">
				<?php echo $this->buttons->pdf;?>
				<span><?php echo JText::_('COM_FABRIK_PDF');?></span>
			</a>
		</span>
	<?php }?>