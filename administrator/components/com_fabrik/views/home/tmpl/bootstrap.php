<?php
/**
 * Admin Home Bootstrap Tmpl
 *
 * @package     Joomla.Administrator
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2020  Media A-Team, Inc. - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * @since       3.0
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Toolbar\ToolbarHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Factory;

HTMLHelper::stylesheet('media/com_fabrik/css/admin.css');
ToolBarHelper::title(Text::_('COM_FABRIK_WELCOME'), 'fabrik.png');
$user = Factory::getUser();
$is_suadmin = $user->authorise('core.admin');
?>

<div id="j-main-container">
	<div class="row">
		<div class="col">
			<div style="margin:0 0 25px;width:250px;"><?php echo HTMLHelper::image('media/com_fabrik/images/logo.png', 'Fabrik'); ?></div>
		</div>
		<div class="col-sm-12">
			<ul class="nav nav-tabs" id="Fab_Home_Nav" role="tablist">
				<li class="nav-item" role="">
					<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-about" type="button" role="tab" aria-controls="" aria-selected="true">
						<?php echo Text::_('COM_FABRIK_HOME_ABOUT'); ?>
					</button>
				</li>
				<li class="nav-item" role="">
					<button class="nav-link" id="links-tab" data-bs-toggle="tab" data-bs-target="#home-links" type="button" role="tab" aria-controls="" aria-selected="true">
						<?php echo Text::_('COM_FABRIK_HOME_USEFUL_LINKS'); ?>
					</button>
				</li>

				<li class="nav-item" role="">
					<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#home-tools" type="button" role="tab" aria-controls="" aria-selected="false">
						<?php echo Text::_('COM_FABRIK_HOME_TOOLS')?>
					</button>
				</li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="home-about">
					<?php 
					$xml = file_get_contents(COM_FABRIK_BACKEND. '/fabrik.xml');
					$xmltags = json_decode(json_encode(simplexml_load_string($xml)),true);
					echo '<br><h4>Fabrik Version: '.$xmltags['version'];
					if (array_key_exists('githubversion',$xmltags)) echo ' /GitHub: ' . $xmltags['githubversion'];
					echo '</h4><br>';
					echo Text::_('COM_FABRIK_HOME_ABOUT_TEXT'); 
					
					?>
				</div>

				<div class="tab-pane" id="home-links">
					<ul class="adminlist list-group">
						<li class="list-group-item"><a href="https://fabrikar.com/" target="_blank"><?php echo Text::_('COM_FABRIK_HOME_FABRIK_WEB_SITE')?></a></li>
						<li class="list-group-item"><a href="https://fabrikar.com/forums" target="_blank"><?php echo Text::_('COM_FABRIK_HOME_FORUM')?></a>
						<li class="list-group-item"><a href="https://fabrikar.com/forums/index.php?wiki/index/" target="_blank"><?php echo Text::_('COM_FABRIK_HOME_DOCUMENTATION_WIKI')?></a></li>
					</ul>
				</div>

				<div class="tab-pane" id="home-tools">
				<?php if ($is_suadmin):?>
					<div class=" alert alert-danger ">
					<?php echo Text::_('COM_FABRIK_HOME_RESET_FABRIK'); ?>
						<h4><?php echo Text::_('COM_FABRIK_HOME_CONFIRM_WIPE', true);?><h4>
						<a class="btn btn-danger" onclick="return confirm('<?php echo Text::_('COM_FABRIK_HOME_CONFIRM_WIPE', true);?>')" href="index.php?option=com_fabrik&task=home.reset">
						<?php echo Text::_('COM_FABRIK_HOME_RESET_FABRIK') ?></a>
					<div>
				<?php endif?>
				</div>
			</div>
		</div>
	</div>
</div>
