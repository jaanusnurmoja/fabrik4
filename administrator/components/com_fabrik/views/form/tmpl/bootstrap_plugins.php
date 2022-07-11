<?php
/**
 * Admin Form Edit Tmpl
 *
 * @package     Joomla.Administrator
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2020  Media A-Team, Inc. - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * @since       3.0
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Language\Text;

?>
<div class="tab-pane" id="tab-plugins">

	    <fieldset class="form-horizontal">
			<div id="plugins"></div>
			<a href="#" class="btn" id="addPlugin">
				<i class="icon-plus"></i> <?php echo Text::_('COM_FABRIK_ADD'); ?></a>
		</fieldset>
</div>
