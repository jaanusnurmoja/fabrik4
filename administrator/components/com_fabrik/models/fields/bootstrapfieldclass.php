<?php
/**
 * Renders a list of Bootstrap field class sizes
 *
 * @package     Joomla
 * @subpackage  Form
 * @copyright   Copyright (C) 2005-2020  Media A-Team, Inc. - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Form\FormHelper;
use Joomla\CMS\HTML\HTMLHelper;

FormHelper::loadFieldClass('list');

/**
 * Renders a list of Bootstrap field class sizes
 *
 * @package     Joomla
 * @subpackage  Form
 * @since       1.5
 */

class JFormFieldBootstrapfieldclass extends JFormFieldList
{
	/**
	 * Method to get the field options.
	 *
	 * @return  array  The field option objects.
	 */

	protected function getOptions()
	{
		$sizes = array();
		$sizes[] = HTMLHelper_('select.option', 'input-mini');
		$sizes[] = HTMLHelper_('select.option', 'input-small');
		$sizes[] = HTMLHelper_('select.option', 'input-medium');
		$sizes[] = HTMLHelper_('select.option', 'input-large');
		$sizes[] = HTMLHelper_('select.option', 'input-xlarge');
		$sizes[] = HTMLHelper_('select.option', 'input-xxlarge');
		$sizes[] = HTMLHelper_('select.option', 'input-block-level');
		$sizes[] = HTMLHelper_('select.option', 'span1');
		$sizes[] = HTMLHelper_('select.option', 'span2');
		$sizes[] = HTMLHelper_('select.option', 'span3');
		$sizes[] = HTMLHelper_('select.option', 'span4');
		$sizes[] = HTMLHelper_('select.option', 'span5');
		$sizes[] = HTMLHelper_('select.option', 'span6');
		$sizes[] = HTMLHelper_('select.option', 'span7');
		$sizes[] = HTMLHelper_('select.option', 'span8');
		$sizes[] = HTMLHelper_('select.option', 'span9');
		$sizes[] = HTMLHelper_('select.option', 'span10');
		$sizes[] = HTMLHelper_('select.option', 'span11');
		$sizes[] = HTMLHelper_('select.option', 'span12');
		$sizes[] = HTMLHelper_('select.option', 'col-md-1');
		$sizes[] = HTMLHelper_('select.option', 'col-md-2');
		$sizes[] = HTMLHelper_('select.option', 'col-md-3');
		$sizes[] = HTMLHelper_('select.option', 'col-md-4');
		$sizes[] = HTMLHelper_('select.option', 'col-md-5');
		$sizes[] = HTMLHelper_('select.option', 'col-md-6');
		$sizes[] = HTMLHelper_('select.option', 'col-md-7');
		$sizes[] = HTMLHelper_('select.option', 'col-md-8');
		$sizes[] = HTMLHelper_('select.option', 'col-md-9');
		$sizes[] = HTMLHelper_('select.option', 'col-md-10');
		$sizes[] = HTMLHelper_('select.option', 'col-md-11');
		$sizes[] = HTMLHelper_('select.option', 'col-md-12');

		return $sizes;
	}
}
