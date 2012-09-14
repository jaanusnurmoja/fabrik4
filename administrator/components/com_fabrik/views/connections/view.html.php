<?php
/**
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005 Fabrik. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View class for a list of connections.
 *
 * @package		Joomla.Administrator
 * @subpackage	Fabrik
 * @since		1.6
 */
class FabrikViewConnections extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $state;

	/**
	 * Display the view
	 *
	 * @param   string  $tpl  template name
	 *
	 * @return  void
	 */

	public function display($tpl = null)
	{
		// Initialise variables.
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');
		$this->state = $this->get('State');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}
		FabrikAdminHelper::setViewLayout($this);
		$this->addToolbar();
		parent::display($tpl);
		FabrikAdminHelper::addSubmenu(JRequest::getWord('view', 'lists'));
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @since	1.6
	 *
	 * @return  void
	 */

	protected function addToolbar()
	{
		require_once JPATH_COMPONENT . '/helpers/fabrik.php';
		$canDo	= FabrikAdminHelper::getActions($this->state->get('filter.category_id'));

		JToolBarHelper::title(JText::_('COM_FABRIK_MANAGER_CONNECTIONS'), 'connections.png');
		if ($canDo->get('core.create'))
		{
			JToolBarHelper::addNew('connection.add', 'JTOOLBAR_NEW');
		}
		if ($canDo->get('core.edit'))
		{
			JToolBarHelper::editList('connection.edit', 'JTOOLBAR_EDIT');
		}
		if ($canDo->get('core.edit.state'))
		{
			if ($this->state->get('filter.state') != 2)
			{
				JToolBarHelper::divider();
				JToolBarHelper::custom('connections.publish', 'publish.png', 'publish_f2.png', 'JTOOLBAR_PUBLISH', true);
				JToolBarHelper::custom('connections.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
			}
		}
		if (JFactory::getUser()->authorise('core.manage', 'com_checkin'))
		{
			JToolBarHelper::custom('connections.checkin', 'checkin.png', 'checkin_f2.png', 'JTOOLBAR_CHECKIN', true);
		}
		if ($this->state->get('filter.published') == -2 && $canDo->get('core.delete'))
		{
			JToolBarHelper::deleteList('', 'connections.delete', 'JTOOLBAR_EMPTY_TRASH');
		}
		elseif ($canDo->get('core.edit.state'))
		{
			JToolBarHelper::trash('connections.trash', 'JTOOLBAR_TRASH');
		}
		if ($canDo->get('core.admin'))
		{
			JToolBarHelper::divider();
			JToolBarHelper::preferences('com_fabrik');
		}
		JToolBarHelper::divider();
		JToolBarHelper::help('JHELP_COMPONENTS_FABRIK_CONNECTIONS', false, JText::_('JHELP_COMPONENTS_FABRIK_CONNECTIONS'));
	}
}
