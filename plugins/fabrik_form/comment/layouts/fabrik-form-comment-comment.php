<?php
defined('JPATH_BASE') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper;

$d = $displayData;
?>

<div class="metadata muted">
	<small><?php echo FabrikHelperHTML::icon('icon-user'); ?>
		<?php echo $d->name; ?>, <?php echo Text::_('PLG_FORM_COMMENT_WROTE_ON'); ?> 
	</small>
	<?php echo FabrikHelperHTML::icon('icon-calendar'); ?>
	<small><?php echo HTMLHelper::date($d->comment->time_date, $d->dateFormat, 'UTC'); ?></small>
	<?php
	if ($d->internalRating) :
	?>
	<div class="rating">
	<?php 
	$r = (int) $d->comment->rating;
	for ($i = 0; $i < $r; $i++) :
		if ($d->j3) :
			?>
			<?php echo FabrikHelperHTML::icon('icon-star'); ?>
		<?php
		else :
			?><img src="' . $d->insrc . '" alt="star" />
		<?php
		endif;
	endfor;
	?>
	</div>
	<?php 
	endif;
?>
</div>

<div class="comment" id="comment-<?php echo $d->comment->id; ?>">
	<div class="comment-content"><?php echo $d->comment->comment; ?></div>
	<div class="reply">
		<?php
		if ($d->canAdd) :
			?>
				<a href="#" class="replybutton btn btn-small btn-link"><?php echo Text::_('PLG_FORM_COMMENT_REPLY'); ?></a>
			<?php endif;

			if ($d->canDelete) :
				?>
				<a href="#" class="del-comment btn btn-danger btn-small"><?php echo Text::_('PLG_FORM_COMMENT_DELETE');?></a>
			<?php
				endif;
			if ($d->useThumbsPlugin) :
				echo $d->thumbs;
			endif;
			?>
	</div>
</div>

<?php
if (!$d->commentsLocked) :
	echo $d->form;
endif;

