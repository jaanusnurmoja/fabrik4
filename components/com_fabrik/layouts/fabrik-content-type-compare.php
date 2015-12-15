<?php
/**
 * Content type compare view levels layout
 */

defined('JPATH_BASE') or die;

use Joomla\Utilities\ArrayHelper;

$d                     = $displayData;
$viewLevels            = $d->viewLevels;
$contentTypeViewLevels = $d->contentTypeViewLevels;

$max = max(count($viewLevels), count($contentTypeViewLevels));

?>
	<hr />
<?php if (!empty($d->alteredGroups)) : ?>
	<div class="alert alert-warning"><span class="icon-stack"></span>
		<?php echo JText::_('COM_FABRIK_CONTENT_TYPE_ACL_GROUP_MISMATCH'); ?><hr />
		<p><?php echo JText::_('COM_FABRIK_CONTENT_TYPE_ACL_GROUP_MISMATCH_FOLLOWING'); ?></p>
		<div class="">
			<?php

			foreach ($d->alteredGroups as $group) :?>
				<span class="label label-warning"><?php echo $group['title']; ?></span>
				<?php
			endforeach ?>
		</div>
	</div>
	<?php
endif;?>
<hr />
<?php
if ($d->match) :
	?>
	<div class="alert alert-info"><span class="icon-ok"></span>
		<?php echo JText::_('COM_FABRIK_CONTENT_TYPE_ACL_MATCH'); ?>
	</div>
	<?php
else:
	?>
	<div class="alert alert-warning"><span class="icon-warning"></span>
		<?php echo JText::_('COM_FABRIK_CONTENT_TYPE_ACL_MISMATCH'); ?>
	</div>

	<div class="alert alert-info"><span class="icon-question"></span>
		<?php echo JText::_('COM_FABRIK_CONTENT_TYPE_ACL_MISMATCH_INFO'); ?>
	</div>

	<table class="table table-striped">
		<thead>
		<tr>
			<th><?php echo JText::_('COM_FABRIK_CONTENT_TYPE_ACCESS_LEVEL'); ?></th>
			<th class="muted"><?php echo JText::_('COM_FABRIK_GROUPS'); ?></th>
			<th><?php echo JText::_('COM_FABRIK_CONTENT_TYPE_SITE_ACCESS_LEVEL'); ?></th>
		</tr>
		<tbody>
		<?php
		for ($i = 0; $i < $max; $i++) :
			$viewLevel            = ArrayHelper::getValue($viewLevels, $i, array());
			$contentTypeViewLevel = ArrayHelper::getValue($contentTypeViewLevels, $i, array());
			$viewRules            = ArrayHelper::getValue($viewLevel, 'rules', '');
			$contentTypeViewRules = ArrayHelper::getValue($contentTypeViewLevel, 'rules', 'N/A');
			$matched              = $viewRules === $contentTypeViewRules;
			if (!$matched) :
				?>
				<tr>
					<td>
						<?php echo ArrayHelper::getValue($contentTypeViewLevel, 'title', 'N/A'); ?>
					</td>
					<td class="muted">
						<?php echo ArrayHelper::getValue($contentTypeViewLevel, 'rules_labels', 'N/A'); ?>
					</td>
					<td>
						<?php echo JHtml::_('access.level', 'aclMap[' . $contentTypeViewLevel['id'] . ']', '', '', array()); ?>
					</td>
				</tr>
				<?php
			endif;
		endfor;
		?>
		</tbody>
		</thead>
	</table>

<?php
endif;
