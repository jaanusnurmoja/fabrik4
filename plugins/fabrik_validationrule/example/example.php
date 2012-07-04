<?php
/**
*
* @package fabrikar
* @author Rob Clayburn
* @copyright (C) Rob Clayburn
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

/**
 * this is an example plugin validation rule.
 * To create a new validation rule from this example
 * 1) Copy the folder 'example' and the three files it containts (example.php, example.xml, index.html)
 * 2) Rename the folder and the php and xml file to the name of your plugin
 * e.g.
 * isurl, isurl.php and isurl.xml
 * 3) Edit isurl.xml and change the data to match your details, theer are 2 essential lines to change:
 *
 * a) <name>Example</name>
 * b) <filename plugin="example">example.php</filename>
 *
 * for these two lines replace 'example' with the name of your plugin, e.g.
 * a) <name>IsUrl</name>
 * b) <filename plugin="isurl">isurl.php</filename>
 *
 * 4) In the php file (e.g. isurl.php) , edit the lines:
 *
 * class FabrikModelIsexample extends FabrikModelValidationRule {
 * protected $pluginName = 'example';
 *
 * replacing 'example' with your plugin's name.
 *
 * 5) Now to the heart of the matter - the validation itself. This takes place inside the validate() function
 * 2 variables are passed to this function:
 *
 * i) $data - the data entered in the form
 * ii) $element - the element model that the validation rule has been attached to
 *
 * You will generally only need to run your test against the $data variable.
 *
 * The validate() function should return true or false. True for when the data meets the rule's criteria
 * False for when it fails. For our 'isurl' example a fail would occur if the person had not entered a url
 * Alter the validation function to suit your own needs.
 *
 * 6) Installation - make a zip file of your validation rule's folder (e.g. 'isurl')
 * Go to your site's administration panel and select components->fabrik->plugins
 * press the install button
 * from the file upload field, browse to find your zip file.
 * Press the upload button
 *
 *
 */
// Check to ensure this file is included in Joomla!

defined('_JEXEC') or die();

// Require the abstract plugin class
require_once(COM_FABRIK_FRONTEND . '/models/validation_rule.php');

class plgFabrik_ValidationruleExample extends plgFabrik_Validationrule
{

	protected $pluginName = 'example';

	/** @var bool if true uses icon of same name as validation, otherwise uses png icon specified by $icon */
	protected $icon = 'notempty';

	/**
	 * (non-PHPdoc)
	 * @see plgFabrik_Validationrule::validate()
	 */

	public function validate($data, &$elementModel, $pluginc, $repeatCounter)
	{
		$found = preg_match("/http:/i", $data);
		return $found;
	}

	/**
	 * replace the elements data with something else!
* @param   string	data to check
* @param   object	element model
* @param   int		plugin sequence ref
	 * @return  string	replaced data
	 */
	
 	function replace($data, &$element, $c)
 	{
 		return $data;
 	}
}
?>