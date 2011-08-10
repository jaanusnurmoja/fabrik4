<?php
/**
 * @package Joomla
 * @subpackage Fabrik
 * @copyright Copyright (C) 2005 Rob Clayburn. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport('joomla.application.component.view');

class FabrikViewList extends JView{

	function display()
	{
		$session = JFactory::getSession();
		$exporter = JModel::getInstance('Csvexport', 'FabrikFEModel');
		$model = JModel::getInstance('list', 'FabrikFEModel');
		$model->setId(JRequest::getInt('listid'));
		$model->set('_outPutFormat', 'csv');
		$exporter->model =& $model;
		JRequest::setVar('limitstart'.$model->getId(), JRequest::getInt('start', 0));
		JRequest::setVar('limit'.$model->getId(), $exporter->_getStep());

		// $$$ rob moved here from csvimport::getHeadings as we need to do this before we get
		// the table total
		$selectedFields = JRequest::getVar('fields', array(), 'default', 'array');
		$model->setHeadingsForCSV($selectedFields);

		$total = $model->getTotalRecords();

		$key = 'fabrik.table.'.$model->getId().'csv.total';
		if (is_null($session->get($key))) {
			$session->set($key, $total);
		}

		$start = JRequest::getInt('start', 0);
		if ($start <= $total) {
			$exporter->writeFile($total);
		} else {
			$session->clear($key);
			$exporter->downloadFile();
		}
		return;
	}

}
?>