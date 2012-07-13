<?php
/**
 *
 * @package fabrikar
 * @author Rob Clayburn
 * @copyright (C) Rob Clayburn
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

// Require the abstract plugin class
require_once COM_FABRIK_FRONTEND . '/models/validation_rule.php';

class PlgFabrik_ValidationruleIsUniqueValue extends PlgFabrik_Validationrule
{

	protected $pluginName = 'isuniquevalue';

	/** @var bool if true uses icon of same name as validation, otherwise uses png icon specified by $icon */
	protected $icon = 'notempty';

	/**
	 * (non-PHPdoc)
	 * @see PlgFabrik_Validationrule::validate()
	 */

	public function validate($data, &$elementModel, $pluginc, $repeatCounter)
	{
		//could be a dropdown with multivalues
		if (is_array($data))
		{
			$data = implode('', $data);
		}
		$params = $this->getParams();
		$element = $elementModel->getElement();
		$listModel = $elementModel->getlistModel();
		$table = $listModel->getTable();
		$db = $listModel->getDb();
		$lookuptable = $db->NameQuote($table->db_table_name);
		$data = $db->quote($data);
		$query = $db->getQuery(true);
		$cond = $params->get('isuniquevalue-caseinsensitive') == 1 ? 'LIKE' : '=';
		$query->select('COUNT(*)')
		->from($lookuptable)
		->where($element->name.' '.$cond.' '.$data);

		// $$$ hugh - need to check to see if we're editing a record, otherwise
		// will fail 'cos it finds the original record (assuming this element hasn't changed)
		// @TODO - is there a better way getting the rowid?  What if this is form a joined table?
		// $rowid = JRequest::getVar('rowid');
		// Have to do it by grabbing PK from request, 'cos rowid isn't set on AJAX validation
		$pk = FabrikString::safeColNameToArrayKey($table->db_primary_key);
		$rowid = JRequest::getVar($pk, '');
		if (!empty( $rowid))
		{
			$query->where($table->db_primary_key . ' != ' . $db->quote($rowid));
		}
		$db->setQuery($query);
		$c = $db->loadResult();
		return ($c == 0) ? true : false;
	}
}
?>