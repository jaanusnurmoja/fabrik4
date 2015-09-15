<?php
/**
 * Bootstrap Details Template
 *
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2013 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * @since       3.1
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

if ($this->showEmail): ?>
	<a class="btn fabrikWin" rel='{"title":"<?php echo FText::_('JGLOBAL_EMAIL'); ?>", "loadMethod":"iframe", "height":"300px"}' href="<?php echo $this->emailURL?>">
		<?php echo FabrikHelperHTML::icon('icon-envelope');?>
		<?php echo FText::_('JGLOBAL_EMAIL'); ?>
	</a>
<?php endif;

if ($this->showPDF): ?>
	<a class="btn" href="<?php echo $this->pdfURL?>">
		<?php echo FabrikHelperHTML::icon('icon-file');?>
		<?php echo FText::_('COM_FABRIK_PDF')?>
	</a>
<?php endif;

if ($this->showPrint): ?>
	<a class="btn" data-fabrik-print href="<?php echo $this->printURL?>">
		<?php echo FabrikHelperHTML::icon('icon-print');?>
		<?php echo FText::_('COM_FABRIK_PRINT')?>
	</a>
<?php
endif;
