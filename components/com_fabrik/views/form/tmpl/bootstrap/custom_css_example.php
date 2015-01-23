<?php
/**
 * Default Form Template: Custom CSS
 *
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2013 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * @since       3.0
 */

/**
 * If you need to make small adjustments or additions to the CSS for a Fabrik
 * template, you can create a custom_css.php file, which will be loaded after
 * the main template_css.php for the template.
 *
 * This file will be invoked as a PHP file, so the view type and form ID
 * can be used in order to narrow the scope of any style changes.  You do
 * this by prepending #{$view}_$c to any selectors you use.  This will become
 * (say) #form_12, or #details_11, which will be the HTML ID of your form
 * on the page.
 *
 * See examples below, which you should remove if you copy this file.
 *
 * Don't edit anything outside of the BEGIN and END comments.
 *
 * For more on custom CSS, see the Wiki at:
 *requirejs(['fab/fabrik'], function () {
var form = Fabrik.getBlock('form_1', false, function (block) {

var fieldNames = ['element_test___list', 'element_test___test'];
var fields = [];
for (var i = 0; i < fieldNames.length; i ++) {
fields.push(block.elements.get(fieldNames[i]));
}

var rad = block.elements.get('element_test___rad');

console.log(rad.get('value'));

if (rad.get('value') == 0) {
toggle(fields, false);
}
rad.addEvent('click', function () {
state = rad.get('value') == 0 ? false : true;
toggle(fields, state);
});

});
});

var toggle = function (fields, show) {
for (var i = 0; i < fields.length; i ++) {
if (show) {
fields[i].show();
} else {
fields[i].hide();
}
}
}
 * http://www.fabrikar.com/forums/index.php?wiki/form-and-details-templates/#the-custom-css-file
 *
 * NOTE - for backward compatibility with Fabrik 2.1, and in case you
 * just prefer a simpler CSS file, without the added PHP parsing that
 * allows you to be be more specific in your selectors, we will also include
 * a custom.css we find in the same location as this file.
 *
 */

header('Content-type: text/css');
$c = (int) $_REQUEST['c'];
$view = isset($_REQUEST['view']) ? $_REQUEST['view'] : 'form';
$rowid = isset($_REQUEST['rowid']) ? $_REQUEST['rowid'] : '';
$form = $view . '_' . $c;
if ($rowid !== '')
{
	$form .= '_' . $rowid;
}
echo "

/* BEGIN - Your CSS styling starts here */

#$form .foobar {
	display: none;
}

/* END - Your CSS styling ends here */

";
?>