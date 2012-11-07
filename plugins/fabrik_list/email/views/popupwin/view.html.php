<?php

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport('joomla.application.component.view');

class fabrikViewPopupwin extends JViewLegacy
{

	function display($tmpl = 'default')
	{
		$app = JFactory::getApplication();
		$input = $app->input;
		$renderOrder = $input->getInt('renderOrder');
		$usersConfig = JComponentHelper::getParams('com_fabrik');

		$tmplpath = JPATH_ROOT . '/plugins/fabrik_list/email/views/popupwin/tmpl/' . $tmpl;
		$this->_setPath('template', $tmplpath);

		$this->fieldList = $this->get('ToField');
		$records = $this->get('records');
		if (count($records) == 0)
		{
			JError::raiseNotice(500, 'None of the selected records can be emailed');
			return;
		}
		$this->recordcount = count($records);
		$this->renderOrder = $renderOrder;
		$this->recordids = implode(',', $records);
		$this->listid = $this->get('id', 'list');

		$this->subject = $this->get('subject');
		$this->message = $this->get('message');
		$this->allowAttachment', $this->get('allowAttachment'));
		return parent::display();
	}

}
