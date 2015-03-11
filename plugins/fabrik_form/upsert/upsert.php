<?php
/**
 * Update / insert a database record into any table
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.form.upsert
 * @copyright   Copyright (C) 2005-2013 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

// Require the abstract plugin class
require_once COM_FABRIK_FRONTEND . '/models/plugin-form.php';

/**
 * Update / insert a database record into any table
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.form.upsert
 * @since       3.0.7
 */

class PlgFabrik_FormUpsert extends PlgFabrik_Form
{
	/**
	 * Database driver
	 *
	 * @var JDatabaseDriver
	 */
	protected $upsert_db = null;

	/**
	 * process the plugin, called after form is submitted
	 *
	 * @return  bool
	 */

	public function onAfterProcess()
	{
		$params = $this->getParams();
		$w = new FabrikWorker;
		$formModel = $this->getModel();
		$upsert_db = $this->getDb();
		$query = $upsert_db->getQuery(true);
		$this->data = $this->getProcessData();

		$table = $this->getTableName();
		$pk = FabrikString::safeColName($params->get('primary_key'));

		$rowid = $params->get('row_value', '');

		// Used for updating previously added records. Need previous pk val to ensure new records are still created.
		$origData = $formModel->getOrigData();
		$origData = FArrayHelper::getValue($origData, 0, new stdClass);

		if (isset($origData->__pk_val))
		{
			$this->data['origid'] = $origData->__pk_val;
		}

		$rowid = $w->parseMessageForPlaceholder($rowid, $this->data, false);
		$fields = $this->upsertData($rowid);
		$query->set($fields);

		if ($rowid === '')
		{
			$query->insert($table);
		}
		else
		{
			$query->update($table)->where($pk . ' = ' . $rowid);
		}

		$upsert_db->setQuery($query);
		$sql = (string)$query;
		$upsert_db->execute();

		return true;
	}

	/**
	 * Get db
	 *
	 * @return JDatabaseDriver
	 */

	protected function getDb()
	{
		if (!isset($this->upsert_db))
		{
			$params = $this->getParams();
			$cid = $params->get('connection_id');
			$connectionModel = JModelLegacy::getInstance('connection', 'FabrikFEModel');
			$connectionModel->setId($cid);
			$this->upsert_db = $connectionModel->getDb();
		}

		return $this->upsert_db;
	}

	/**
	 * Get fields to update/insert
	 *
	 * @return  array
	 */

	protected function upsertData($rowid)
	{
		$params = $this->getParams();
		$w = new FabrikWorker;
		$upsert_db = $this->getDb();
		$upsert = json_decode($params->get('upsert_fields'));
		$fields = array();

		for ($i = 0; $i < count($upsert->upsert_key); $i++)
		{
			$k = FabrikString::shortColName($upsert->upsert_key[$i]);
			$k = $upsert_db->quoteName($k);
			$v = $upsert->upsert_value[$i];
			$v = $w->parseMessageForPlaceholder($v, $this->data);

			if ($v == '')
			{
				$v = $w->parseMessageForPlaceholder($upsert->upsert_default[$i], $this->data);
			}

			/*
			 * $$$ hugh - permit the use of expressions, by putting the value in parens, with option use
			 * of double :: to provide a default for new row (rowid is empty).  This default is seperate from
			 * the simple default used above, which is predicated on value being empty.  So simple usage
			 * might be ..
			 * 
			 * (counter+1::0)
			 * 
			 * ... if you want to increment a 'counter' field.  Or you might use a subquery, like ...
			 * 
			 * ((SELECT foo FROM other_table WHERE fk_id = {rowid})::'foo default')
			 */
			
			if (!preg_match('#^\((.*)\)$#', $v))
			{
				$v = $insert_db->quote($v);
			}
			else
			{
				$matches = array();
				preg_match('#^\((.*)\)$#', $v, $matches);
				$v = $matches[1];
				$v = explode('::', $v);
				if (count($v) == 1)
				{
					$v = $v[0];
				}
				else
				{
					if (empty($rowid))
					{
						$v = $v[1];
					}
					else
					{
						$v = $v[0];
					}
				}	
			}
			
			$fields[] = $k . ' = ' . $v;
		}

		return $fields;
	}

	/**
	 * Get the table name to insert / update to
	 *
	 * @return  string
	 */

	protected function getTableName()
	{
		$params = $this->getParams();
		$listid = $params->get('table');
		$listModel = JModelLegacy::getInstance('list', 'FabrikFEModel');
		$listModel->setId($listid);

		return $listModel->getTable()->db_table_name;
	}
}
