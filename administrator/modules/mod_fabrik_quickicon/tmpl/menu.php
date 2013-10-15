<?php
/**
 * Administrator QuickIcon
 *
 * @package		Joomla.Administrator
 * @subpackage	mod_quickicon
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

?>
<?php if (!empty($buttons)): ?>

<ul class="nav">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Fabrik</a>
        <ul class="dropdown-menu">
            <?php foreach ($buttons as $button) :?>
            <li>
                <a class="menu-lists" href="<?php echo $button['link']; ?>"><?php echo $button['text']?></a></li>
            <li>
            <?php endforeach; ?>
        </ul>
    </li>
</ul>

<?php endif;?>