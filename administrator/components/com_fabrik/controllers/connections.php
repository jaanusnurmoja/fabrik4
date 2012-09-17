<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @since       1.6
 */

// No direct access.
defined('_JEXEC') or die;

require_once 'fabcontrolleradmin.php';

/**
 * Connections list controller class.
 *
 * @package		Joomla.Administrator
 * @subpackage	Fabrik
 * @since		1.6
 */

class FabrikAdminControllerConnections extends FabControllerAdmin
{
	/**
	 * @var		string	The prefix to use with controller messages.
	 * @since	1.6
	 */
	protected $text_prefix = 'COM_FABRIK_CONNECTIONS';

	protected $view_item = 'connections';

	/**
	 * Constructor.
	 *
	 * @param   array  $config  An optional associative array of configuration settings.
	 *
	 * @see		JController
	 *
	 * @since	1.6
	 */

	public function __construct($config = array())
	{
		parent::__construct($config);
		$this->registerTask('unsetDefault', 'setDefault');
	}

	/**
	 * Proxy for getModel.
	 *
	 * @param   string  $name    model name
	 * @param   string  $prefix  model prefix
	 *
	 * @since	1.6
	 *
	 * @return  J model
	 */

	public function &getModel($name = 'Connection', $prefix = 'FabrikAdminModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}

	/**
	 * Method to set the home property for a list of items
	 *
	 * @since	1.6
	 *
	 * @return null
	 */

	public function setDefault()
	{
		// Check for request forgeries
		JRequest::checkToken() or die(JText::_('JINVALID_TOKEN'));

		// Get items to publish from the request.
		$cid = JRequest::getVar('cid', array(), 'default', 'array');
		$data = array('setDefault' => 1, 'unsetDefault' => 0);
		$task = $this->getTask();
		$value = JArrayHelper::getValue($data, $task, 0, 'int');
		if ($value == 0)
		{
			$this->setMessage(JText::_('COM_FABRIK_CONNECTION_CANT_UNSET_DEFAULT'));
		}
		if (empty($cid))
		{
			JError::raiseWarning(500, JText::_($this->text_prefix . '_NO_ITEM_SELECTED'));
		}
		else
		{
			if ($value != 0)
			{
				$cid = $cid[0];

				// Get the model.
				$model = $this->getModel();

				// Publish the items.
				if (!$model->setDefault($cid, $value))
				{
					JError::raiseWarning(500, $model->getError());
				}
				else
				{
					$this->setMessage(JText::_('COM_FABRIK_CONNECTION_SET_DEFAULT'));
				}
			}
		}
		$this->setRedirect(JRoute::_('index.php?option=' . $this->option . '&view=' . $this->view_list, false));
	}
}
