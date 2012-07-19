<?php
/**
 * @package     Joomla
 * @subpackage  Fabrik
* @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
* @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport('joomla.application.component.view');

class FabrikViewList extends JViewLegacy
{

	function display()
	{
		$session = JFactory::getSession();
		$exporter = JModelLegacy::getInstance('Csvexport', 'FabrikFEModel');
		$model = JModelLegacy::getInstance('list', 'FabrikFEModel');
		$model->setId(JRequest::getInt('listid'));
		$model->setOutPutFormat('csv');
		$exporter->model = $model;
		JRequest::setVar('limitstart' . $model->getId(), JRequest::getInt('start', 0));
		JRequest::setVar('limit' . $model->getId(), $exporter->getStep());

		// $$$ rob moved here from csvimport::getHeadings as we need to do this before we get
		// the table total
		$selectedFields = JRequest::getVar('fields', array(), 'default', 'array');
		$model->setHeadingsForCSV($selectedFields);

		$request = $model->getRequestData();
		$model->storeRequestData($request);

		$total = $model->getTotalRecords();

		$key = 'fabrik.list.' . $model->getId() . 'csv.total';
		if (is_null($session->get($key)))
		{
			$session->set($key, $total);
		}

		$start = JRequest::getInt('start', 0);
		//echo "<!-- $start <= $total -->";
		if ($start <= $total)
		{
			$exporter->writeFile($total);
		}
		else
		{
			JRequest::setVar('limitstart' . $model->getId(), 0);
			$session->clear($key);
			$exporter->downloadFile();
		}
		return;
	}

}
?>