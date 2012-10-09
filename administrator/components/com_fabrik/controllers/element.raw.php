<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @since       1.6
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Element controller class.
 *
 * @package		Joomla.Administrator
 * @subpackage	Fabrik
 * @since		3.0
 */

class FabrikAdminControllerElement extends JControllerForm
{
	/**
	 * @var		string	The prefix to use with controller messages.
	 * @since	1.6
	 */
	protected $text_prefix = 'COM_FABRIK_ELEMENT';

	protected $default_view = 'element';

	/**
	 * Called via ajax to load in a given plugin's HTML settings
	 *
	 * @return  void
	 */

	public function getPluginHTML()
	{
		$app = JFactory::getApplication();
		$input = $app->input;
		$plugin = $input->get('plugin');
		$model = $this->getModel();
		$model->setState('element.id', $input->getInt('id'));
		$model->getForm();
		echo $model->getPluginHTML($plugin);
	}

	/**
	 * Method to save a record.
	 *
	 * @param   string  $key     The name of the primary key of the URL variable.
	 * @param   string  $urlVar  The name of the URL variable if different from the primary key (sometimes required to avoid router collisions).
	 *
	 * @return  boolean  True if successful, false otherwise.
	 */

	public function save($key = null, $urlVar = null)
	{
		$app = JFactory::getApplication();
		$input = $app->input;
		$listModel = $this->getModel('list', 'FabrikFEModel');
		$listModel->setId($input->getInt('listid'));
		$rowId = $input->get('rowid', '', 'string');
		$key = $input->get('element');
		$key = array_pop(explode('___', $key));
		$value = $input->get('value', '', 'string');
		$listModel->storeCell($rowId, $key, $value);
		$this->mode = 'readonly';
		$this->display();
	}

}
