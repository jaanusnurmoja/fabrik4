<?php
/**
 *  Redirects the browser to subscriptions to perform payment
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.form.subscriptions
 * @copyright   Copyright (C) 2005-2020  Media A-Team, Inc. - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\Model\BaseDatabaseModel;
use Joomla\CMS\Table\Table;
use Joomla\CMS\Filter\InputFilter;
use Joomla\CMS\Log\Log;
use Joomla\CMS\Factory;
use Joomla\CMS\Filesystem\File;
use Joomla\String\StringHelper;
use Joomla\Utilities\ArrayHelper;

// Require the abstract plugin class
require_once COM_FABRIK_FRONTEND . '/models/plugin-form.php';
Table::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_fabrik/tables');
Table::addIncludePath(JPATH_SITE . '/plugins/fabrik_form/subscriptions/tables');

/**
 * Redirects the browser to subscriptions to perform payment
 *
 * @package     Joomla.Plugin
 * @subpackage  Fabrik.form.subscriptions
 * @since       3.0
 */
class PlgFabrik_FormSubscriptions extends PlgFabrik_Form
{
	/**
	 * Gateway
	 *
	 * @var object
	 */
	protected $gateway = null;

	/**
	 * Billing Cycle
	 *
	 * @var object
	 */
	protected $billingCycle = null;

	/**
	 * Construct
	 *
	 * @param   object  &$subject  Subject to observer
	 * @param   array   $config    Config
	 */
	public function __construct(&$subject, $config = array())
	{
		// Include the Log class.
		jimport('joomla.log.log');

		// Add the logger.
		Log::addLogger(array('text_file' => 'fabrik.subs.log.php'));
		parent::__construct($subject, $config);
	}

	/**
	 * Get the business email either based on the accountemail field or the value
	 * found in the selected accountemail_element
	 *
	 * @return  string  email
	 */
	protected function getBusinessEmail()
	{
		$w = $this->getWorker();
		$data = $this->getProcessData();
		$params = $this->getParams();
		$field = $params->get('subscriptions_testmode') == 1 ? 'subscriptions_sandbox_email' : 'subscriptions_accountemail';

		return $w->parseMessageForPlaceHolder($params->get($field), $data);
	}

	/**
	 * Get transaction amount based on the cost field or the value
	 * found in the selected cost_element
	 *
	 * @return  string  cost
	 */
	protected function getAmount()
	{
		$billingCycle = $this->getBillingCycle();

		return $billingCycle->cost;
	}

	/**
	 * Get the select billing cycles row
	 *
	 * @return  object  row
	 */
	protected function getBillingCycle()
	{
		if (!isset($this->billingCycle))
		{
			try
			{
				$db = $this->_db;
				$query = $db->getQuery(true);
				$data = $this->getProcessData();
				$cycleField = $db->replacePrefix('#__fabrik_subs_users___billing_cycle');
				$cycleId = (int) $data[$cycleField . '_raw'][0];

				if ($cycleId === 0)
				{
					throw new Exception('No billing cycle found in request', 404);
				}

				$query->select('*')->from('#__fabrik_subs_plan_billing_cycle')->where('id = ' . $cycleId);
				$db->setQuery($query);
				$this->billingCycle = $db->loadObject();

				if ($error = $db->getErrorMsg())
				{
					throw new Exception($error);
				}

				if (empty($this->billingCycle))
				{
					throw new Exception('No billing cycle found', 404);
				}
			}
			catch (Exception $e)
			{
				$this->setError($e);

				return false;
			}
		}

		return $this->billingCycle;
	}

	/**
	 * Get the selected gateway (paypal single payment / subscription)
	 *
	 * @return  false|object  row or false
	 */
	protected function getGateway()
	{
		if (!isset($this->gateway))
		{
			try
			{
				$db = $this->_db;
				$query = $db->getQuery(true);
				$data = $this->getProcessData();
				$gatewayField = $db->replacePrefix('#__fabrik_subs_users___gateway');

				$id = (int) $data[$gatewayField . '_raw'][0];
				$query->select('*')->from('#__fabrik_subs_payment_gateways')->where('id = ' . $id);
				$db->setQuery($query);
				$this->gateway = $db->loadObject();

				if ($error = $db->getErrorMsg())
				{
					throw new Exception($error);
				}

				if (empty($this->gateway))
				{
					throw new Exception('No gateway cycle found', 404);
				}
			}
			catch (Exception $e)
			{
				$this->setError($e);

				return false;
			}
		}

		return $this->gateway;
	}

	/**
	 * Get transaction item name based on the item field or the value
	 * found in the selected item_element
	 *
	 * @return  array  item name
	 */
	protected function getItemName()
	{
		$data = $this->getProcessData();

		// @TODO replace with look up of plan name and billing cycle
		return array($data['jos_fabrik_subs_users___plan_id_raw'], $data['jos_fabrik_subs_users___plan_id'][0]);
	}

	/**
	 * Append additional paypal values to the data to send to paypal
	 *
	 * @param   array  &$opts  paypal options
	 *
	 * @return  void
	 */
	protected function setSubscriptionValues(&$opts)
	{
		$w = $this->getWorker();
		$data = $this->getProcessData();
		$gateWay = $this->getGateway();

		$item = $data['jos_fabrik_subs_users___billing_cycle'][0] . ' ' . $data['jos_fabrik_subs_users___gateway'][0];
		$item_raw = $data['jos_fabrik_subs_users___billing_cycle_raw'][0];

		$db = $this->_db;
		$query = $db->getQuery(true);
		$query->select('cost, label, plan_name, duration AS p3, period_unit AS t3, ' . $db->quote($item_raw) . ' AS item_number ')
		->from('#__fabrik_subs_plan_billing_cycle')->where('id = ' . $db->quote($item_raw));

		$db->setQuery($query);
		$sub = $db->loadObject();

		// @TODO test replace various placeholders
		$filter = InputFilter::getInstance();
		$post = $filter->clean($_REQUEST, 'array');
		$name = $this->config->get('sitename') . ' {plan_name}  User: {jos_fabrik_subs_users___name} ({jos_fabrik_subs_users___username})';
		$tmp = array_merge($post, ArrayHelper::fromObject($sub));

		// 'http://fabrikar.com/ '.$sub->item_name. ' - User: subtest26012010 (subtest26012010)';
		$opts['item_name'] = $w->parseMessageForPlaceHolder($name, $tmp);
		$opts['invoice'] = uniqid('', true);

		if ($gateWay->subscription == 1)
		{
			if (is_object($sub))
			{
				$opts['p3'] = $sub->p3;
				$opts['t3'] = $sub->t3;
				$opts['a3'] = $sub->cost;
				$opts['no_note'] = 1;
				$opts['custom'] = '';
				$opts['src'] = 1;
				unset($opts['amount']);
			}
			else
			{
				throw new RuntimeException('Could not determine subscription period, please check your settings', 500);
			}
		}
	}

	/**
	 * Get FabrikWorker
	 *
	 * @return FabrikWorker
	 */
	protected function getWorker()
	{
		if (!isset($this->w))
		{
			$this->w = new FabrikWorker;
		}

		return $this->w;
	}

	/**
	 * Set up the html to be injected into the bottom of the form
	 *
	 * @return  void
	 */
	public function getBottomContent()
	{
		$pendingSub = $this->pendingSub();

		if ($pendingSub !== false)
		{
			$this->html = '<input type="hidden" name="subscription_id" value="' . (int) $pendingSub->id . '" />';
		}
	}

	/**
	 * Inject custom html into the bottom of the form
	 *
	 * @param   int  $c  Plugin counter
	 *
	 * @return  string  html
	 */
	public function getBottomContent_result($c)
	{
		return $this->html;
	}

	/**
	 * Run when the form is loaded - before its data has been created
	 * data found in $formModel->data
	 *
	 * @return	bool
	 */
	public function onBeforeLoad()
	{
		$pendingSub = $this->pendingSub();

		if ($pendingSub !== false)
		{
			/* $input->set('usekey', false);
			$formModel->unsetData();
			$formModel->setRowId($pendingSub->id); */
			$this->app->enqueueMessage('We found an existing pending subscription from ' . $pendingSub->signup_date);
		}

		return true;
	}
/*
	public function onLoad()
	{
		$params = $this->getParams();
		$formModel = $this->getModel();
		$app = Factory::getApplication();
		$pendingSub = $this->pendingSub($formModel, false);
		if ($pendingSub !== false)
		{
			$app->enqueueMessage('We found an existing pending subscription from ' . $pendingSub->signup_date);
			$formModel->setRowId($pendingSub->id);
			$formModel->data['jos_fabrik_subs_users___gateway'] = $pendingSub->type;
			$formModel->data['jos_fabrik_subs_users___gateway_raw'] = $pendingSub->type;
			$formModel->data['jos_fabrik_subs_users___billing_cycle'] = $pendingSub->billing_cycle_id;
			$formModel->data['jos_fabrik_subs_users___billing_cycle_raw'] = $pendingSub->billing_cycle_id;
		}
	} */

	/**
	 * Test if the subscription is pending
	 *
	 * @param   bool  $newRow  Is it a  new subscription
	 *
	 * @return  bool
	 */
	protected function pendingSub($newRow = true)
	{
		// Check if the user has pending subscriptions
		$formModel = $this->getModel();
		$rowId = $formModel->getRowId();

		if (($rowId === '' || !$newRow) && $this->user->get('id') !== 0)
		{
			$db = $this->_db;
			$query = $db->getQuery(true);
			$query->select('*')->from('#__fabrik_subs_subscriptions')->where('userid = ' . (int) $this->user->get('id'))
			->where('status = ' . $db->quote('Pending'))
			->order('signup_date DESC');
			$db->setQuery($query);
			$pendingSubs = $db->loadObjectList();

			if (!empty($pendingSubs))
			{
				// Found so set the row id to the found pending subscription
				$pendingSub = $pendingSubs[0];

				return $pendingSub;
			}
		}

		return false;
	}

	/**
	 * Run right at the end of the form processing
	 * form needs to be set to record in database for this to hook to be called
	 *
	 * @return	bool
	 */
	public function onAfterProcess()
	{
		$formModel = $this->getModel();
		$params = $this->getParams();
		$input = $this->app->input;
		$this->data = $formModel->fullFormData;

		if (!$this->shouldProcess('subscriptions_conditon', null, $params))
		{
			return true;
		}

		$w = $this->getWorker();
		$ipn = $this->getIPNHandler();
		$testMode = $params->get('subscriptions_testmode', false);
		$url = $testMode == 1 ? 'https://www.sandbox.paypal.com/us/cgi-bin/webscr?' : 'https://www.paypal.com/cgi-bin/webscr?';
		$opts = array();
		$gateway = $this->getGateway();
		$opts['cmd'] = $gateway->subscription ? '_xclick-subscriptions' : '_xclick';
		$opts['business'] = $this->getBusinessEmail();
		$opts['amount'] = $this->getAmount();
		list($item_raw, $item) = $this->getItemName();
		$opts['item_name'] = $item;
		$this->setSubscriptionValues($opts);
		$opts['currency_code'] = $this->getCurrencyCode();
		$opts['notify_url'] = $this->getNotifyUrl();
		$opts['return'] = $this->getReturnUrl();
		$sub = $this->createSubscription();

		// If paying for an existing subscription get the id
		$subscriptionId = $input->getInt('subscription_id', 0);

		if ($subscriptionId !== 0)
		{
			// Updating a subscription - load the invoice
			$invoice = Table::getInstance('Invoice', 'FabrikTable');
			$invoice->load(array('subscr_id' => $sub->id));
			$opts['invoice'] = $invoice->invoice_number;

			// In case the user has altered the pending subscriptions plan.
			$this->setInvoicePaymentOptions($invoice);
		}
		else
		{
			$invoice = $this->createInvoice($sub);
		}

		$opts['custom'] = $this->data['formid'] . ':' . $invoice->id;
		$qs = array();

		foreach ($opts as $k => $v)
		{
			$qs[] = $k . '=' . $v;
		}

		$url .= implode('&', $qs);

		// $$$ rob 04/02/2011 no longer doing redirect from ANY plugin EXCEPT the redirect plugin
		// - instead a session var is set as the preferred redirect url

		$context = $formModel->getRedirectContext();
		$surl = (array) $this->session->get($context . 'url', array());
		$surl[$this->renderOrder] = $url;
		$this->session->set($context . 'url', $surl);

		// @TODO use Log instead of fabrik log
		// Log::add($subject . ', ' . $body, Log::NOTICE, 'com_fabrik');
		return true;
	}

	/**
	 * Get the currency code for the transaction e.g. USD
	 *
	 * @return  string  currency code
	 */
	protected function getCurrencyCode()
	{
		$cycle = $this->getBillingCycle();
		$data = $this->getProcessData();

		return $this->getWorker()->parseMessageForPlaceHolder($cycle->currency, $data);
	}

	/**
	 * Get the url that payment notifications (IPN) are sent to
	 *
	 * @return  string  url
	 */
	protected function getNotifyUrl()
	{
		/** @var FabrikFEModelForm $formModel */
		$formModel = $this->getModel();
		$params = $this->getParams();
		$testSite = $params->get('subscriptions_test_site', '');
		$testSiteQs = $params->get('subscriptions_test_site_qs', '');
		$testMode = $params->get('subscriptions_testmode', false);
		$ppurl = ($testMode == 1 && !empty($testSite)) ? $testSite : COM_FABRIK_LIVESITE;
		$ppurl .= '/index.php?option=com_' . $this->package . '&task=plugin.pluginAjax&formid=' . $formModel->get('id')
		. '&g=form&plugin=subscriptions&method=ipn';

		if ($testMode == 1 && !empty($testSiteQs))
		{
			$ppurl .= $testSiteQs;
		}

		$ppurl .= '&renderOrder=' . $this->renderOrder;

		return urlencode($ppurl);
	}

	/**
	 * Make the return url, this is the page you return to after paypal has component the transaction.
	 *
	 * @return  string  url.
	 */
	protected function getReturnUrl()
	{
		$formModel = $this->getModel();
		$url = '';
		$params = $this->getParams();
		$testSite = $params->get('subscriptions_test_site', '');
		$testSiteQs = $params->get('subscriptions_test_site_qs', '');
		$testMode = (bool) $params->get('subscriptions_testmode', false);

		$qs = 'index.php?option=com_' . $this->package . '&task=plugin.pluginAjax&formid=' . $formModel->get('id')
		. '&g=form&plugin=subscriptions&method=thanks&rowid=' . $this->data['rowid'] . '&renderOrder=' . $this->renderOrder;

		if ($testMode)
		{
			$url = !empty($testSite) ? $testSite . $qs : COM_FABRIK_LIVESITE . $qs;

			if (!empty($testSiteQs))
			{
				$url .= $testSiteQs;
			}
		}
		else
		{
			$url = COM_FABRIK_LIVESITE . $qs;
		}

		return urlencode($url);
	}

	/**
	 * Thanks message
	 *
	 * @return  void
	 */
	public function onThanks()
	{
		$input = $this->app->input;
		$formId = $input->getInt('formid');
		$rowId = $input->getString('rowid', '', 'string');
		BaseDatabaseModel::addIncludePath(COM_FABRIK_FRONTEND . '/models');

		/** @var FabrikFEModelForm $formModel */
		$formModel = BaseDatabaseModel::getInstance('Form', 'FabrikFEModel');
		$formModel->setId($formId);
		$params = $formModel->getParams();
		$msg = (array) $params->get('subscriptions_return_msg');
		$msg = array_values($msg);
		$msg = FArrayHelper::getValue($msg, 0);

		if ($msg)
		{
			$w = $this->getWorker();
			$listModel = $formModel->getlistModel();
			$row = $listModel->getRow($rowId);
			$msg = $w->parseMessageForPlaceHolder($msg, $row);

			if (StringHelper::stristr($msg, '[show_all]'))
			{
				$all_data = array();

				foreach ($_REQUEST as $key => $val)
				{
					$all_data[] = "$key: $val";
				}

				$input->set('show_all', implode('<br />', $all_data));
			}

			$msg = str_replace('[', '{', $msg);
			$msg = str_replace(']', '}', $msg);
			$msg = $w->parseMessageForPlaceHolder($msg, $_REQUEST);
			echo $msg;
		}
		else
		{
			echo Text::_("thanks");
		}
	}

	/**
	 * Called from subscriptions at the end of the transaction
	 *
	 * TO test the IPN you can login to your paypal acc, and go to history -> IPN History
	 * then use the 'Notification URL' along with the 'IPN Message' as the querystring
	 * PLUS "&fakeit=1"
	 *
	 * @return  void
	 */
	public function onIpn()
	{
		$input = $this->app->input;
		Log::add($input->server->getString('REQUEST_URI') . ' ' . http_build_query($_REQUEST), Log::INFO, 'fabrik.ipn.start');

		// Lets try to load in the custom returned value so we can load up the form and its parameters
		$custom = $input->get('custom', '', 'string');
		list($formId, $invoiceId) = explode(':', $custom);

		$input->set('invoiceid', $invoiceId);
		$mail = Factory::getMailer();

		// Pretty sure they are added but double add
		BaseDatabaseModel::addIncludePath(COM_FABRIK_FRONTEND . '/models');
		$formModel = BaseDatabaseModel::getInstance('Form', 'FabrikFEModel');
		$formModel->setId($formId);
		$listModel = $formModel->getlistModel();
		$params = $formModel->getParams();
		$table = $listModel->getTable();
		$db = $listModel->getDb();

		$renderOrder = $input->getInt('renderOrder');
		$ipn_txn_field = 'pp_txn_id';
		$ipn_payment_field = 'amount';

		$ipn_status_field = 'pp_payment_status';

		$w = $this->getWorker();

		$email_from = $adminEmail = $this->config->get('mailfrom');

		// Read the post from Subscriptions system and add 'cmd'
		$req = 'cmd=_notify-validate';

		// For
		$fake = $input->getInt('fakeit');

		if ($fake == 1)
		{
			$request = $_GET;
		}
		else
		{
			$request = $_POST;
		}

		foreach ($request as $key => $value)
		{
			if ($key !== 'fakeit')
			{
				$value = urlencode(stripslashes($value));
				$req .= '&' . $key . '=' . $value;
			}
		}

		$sandBox = $input->get('test_ipn') == 1;

		// Post back to Paypal to validate
		$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
		$header .= $sandBox ? "Host: www.sandbox.paypal.com:443\r\n" : "Host: www.paypal.com:443\r\n";
		$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
		$header .= "Content-Length: " . StringHelper::strlen($req) . "\r\n\r\n";

		$subscriptionsurl = $sandBox ? 'ssl://www.sandbox.paypal.com' : 'ssl://www.paypal.com';

		// Assign posted variables to local variables
		$item_name = $input->get('item_name', '', 'string');
		$item_number = $input->get('item_number', '', 'string');
		$payment_status = $input->get('payment_status', '', 'string');
		$payment_amount = $input->get('mc_gross', '', 'string');
		$payment_currency = $input->get('mc_currency', '', 'string');
		$txn_id = $input->get('txn_id', '', 'string');
		$txn_type = $input->get('txn_type', '', 'string');
		$receiver_email = $input->get('receiver_email', '', 'string');
		$payer_email = $input->get('payer_email', '', 'string');

		$status = true;
		$res = 'IPN never fired';
		$err_msg = '';
		$err_title = '';

		if (empty($formId) || empty($invoiceId))
		{
			$status = false;
			$err_title = 'form.subscriptions.ipnfailure.custom_error';
			$err_msg = "formid or rowid empty in custom: $custom";
		}
		else
		{
			// @TODO implement a curl alternative as fsockopen is not always available
			$fp = fsockopen($subscriptionsurl, 443, $errno, $errstr, 30);

			if (!$fp)
			{
				$status = false;
				$err_title = 'form.subscriptions.ipnfailure.fsock_error';
				$err_msg = "fsock error: $errno;$errstr";
			}
			else
			{
				fputs($fp, $header . $req);

				while (!feof($fp))
				{
					$res = fgets($fp, 1024);
					/*subscriptions steps (from their docs):
					 * check the payment_status is Completed
					* check that txn_id has not been previously processed
					* check that receiver_email is your Primary Subscriptions email
					* check that payment_amount/payment_currency are correct
					* process payment
					*/
					if (StringHelper::strcmp(strtoupper($res), "VERIFIED") == 0)
					{
						$query = $db->getQuery(true);
						$query->select($ipn_status_field)->from('#__fabrik_subs_invoices')
						->where($db->quoteName($ipn_txn_field) . ' = ' . $db->quote($txn_id));
						$db->setQuery($query);
						$txn_result = $db->loadResult();

						if ($txn_type == 'subscr_signup')
						{
							// Just a notification - no payment yet
						}
						else
						{
							if (!empty($txn_result) && $txn_type != 'subscr_signup')
							{
								if ($txn_result == 'Completed')
								{
									if ($payment_status != 'Reversed' && $payment_status != 'Refunded')
									{
										$status = false;
										$err_title = 'form.subscriptions.ipnfailure.txn_seen';
										$err_msg = "transaction id already seen as Completed, new payment status makes no sense: $txn_id, $payment_status"
										. (string) $query;
									}
								}
								elseif ($txn_result == 'Reversed')
								{
									if ($payment_status != 'Canceled_Reversal')
									{
										$status = false;
										$err_title = 'form.subscriptions.ipnfailure.txn_seen';
										$err_msg = "transaction id already seen as Reversed, new payment status makes no sense: $txn_id, $payment_status";
									}
								}
							}

							if ($status)
							{
								$set_list = array();

								$set_list[$ipn_txn_field] = $txn_id;
								$set_list[$ipn_payment_field] = $payment_amount;
								$set_list[$ipn_status_field] = $payment_status;

								$ipn = $this->getIPNHandler($params, $renderOrder);

								if ($ipn !== false)
								{
									$request = $_REQUEST;
									$ipn_function = 'payment_status_' . $payment_status;

									if (method_exists($ipn, $ipn_function))
									{
										$status = $ipn->$ipn_function($listModel, $request, $set_list, $err_msg);

										if ($status == false)
										{
											break;
										}
									}
									else
									{
										$txn_type_function = 'txn_type_' . $txn_type;

										if (method_exists($ipn, $txn_type_function))
										{
											$status = $ipn->$txn_type_function($listModel, $request, $set_list, $err_msg);

											if ($status == false)
											{
												break;
											}
										}
									}
								}

								if (!empty($set_list))
								{
									$set_array = array();

									foreach ($set_list as $set_field => $set_value)
									{
										$set_value = $db->quote($set_value);
										$set_field = $db->quoteName($set_field);
										$set_array[] = "$set_field = $set_value";
									}

									$query = $db->getQuery(true);
									$query->update('#__fabrik_subs_invoices')->set(implode(',', $set_array))->where('id = ' . $db->quote($invoiceId));
									$db->setQuery($query);

									if (!$db->execute())
									{
										$status = false;
										$err_title = 'form.subscriptions.ipnfailure.query_error';
										$err_msg = 'sql query error: ' . $db->getErrorMsg();
									}
								}
							}
						}
					}
					elseif (StringHelper::strcmp($res, "INVALID") == 0)
					{
						$status = false;
						$err_title = 'form.subscriptions.ipnfailure.invalid';
						$err_msg = 'subscriptions postback failed with INVALID';
					}
				}

				fclose($fp);
			}
		}

		$receive_debug_emails = (array) $params->get('subscriptions_receive_debug_emails');
		$send_default_email = (array) $params->get('subscriptions_send_default_email');
		$emailtext = '';

		foreach ($_POST as $key => $value)
		{
			$emailtext .= $key . " = " . $value . "\n\n";
		}

		$logLevel = Log::INFO;
		$logMessage = "transaction type: $txn_type \n///////////////// \n emailtext: " . $emailtext . "\n//////////////\nres= " . $res
		. "\n//////////////\n" . $req . "\n//////////////\n";

		if ($status == false)
		{
			$logLevel = Log::CRITICAL;
			$subject = $this->config->get('sitename') . ": Error with Fabrik Subscriptions IPN";
			$logMessageTitle = $err_title;
			$logMessage .= $err_msg;
			$payer_emailtext = "There was an error processing your Subscriptions payment.  The administrator of this site has been informed.";
		}
		else
		{
			$subject = $this->config->get('sitename') . ': IPN ' . $payment_status;
			$logMessageTitle = 'form.subscriptions.ipn.' . $payment_status;
			$payer_subject = "Subscriptions success";
			$payer_emailtext = "Your Subscriptions payment was successfully processed.  The Subscriptions transaction id was $txn_id";
		}

		if ($receive_debug_emails == '1')
		{
			$mail->sendMail($email_from, $email_from, $adminEmail, $subject, $emailtext, false);
		}

		if ($send_default_email == '1')
		{
			$mail->sendMail($email_from, $email_from, $payer_email, $payer_subject, $payer_emailtext, false);
		}

		if (isset($ipn_function))
		{
			$logMessage .= "\n IPN custom function = $ipn_function";
		}
		else
		{
			$logMessage .= "\n No IPN custom function";
		}

		if (isset($txn_type_function))
		{
			$logMessage .= "\n IPN custom transaction function = $txn_type_function";
		}
		else
		{
			$logMessage .= "\n No IPN custom transaction function ";
		}

		Log::add($logMessage, $logLevel, $logMessageTitle);
		jexit();
	}

	/**
	 * Get the custom IPN class
	 *
	 * @return	object	ipn handler class
	 */

	protected function getIPNHandler()
	{
		$ipn = 'plugins/fabrik_form/subscriptions/scripts/ipn.php';

		if (File::exists($ipn))
		{
			require_once $ipn;

			return new fabrikSubscriptionsIPN;
		}
		else
		{
			throw new RuntimeException('Missing subs IPN file', 404);
		}
	}

	/**
	 * Get plan
	 *
	 * @return  object  plan
	 */
	protected function getPlan()
	{
		if (!isset($this->plan))
		{
			try
			{
				$input = $this->app->input;
				$db = $this->_db;
				$planField = $db->replacePrefix('#__fabrik_subs_users___plan_id');
				$planId = $input->getInt($planField, $input->getInt($planField . '_raw'));
				$query = $db->getQuery(true);

				$query->select('*')->from('#__fabrik_subs_plans')->where('id = ' . $planId);
				$db->setQuery($query);
				$this->plan = $db->loadObject();

				if ($error = $db->getErrorMsg())
				{
					throw new Exception($error);
				}

				if (empty($this->plan))
				{
					throw new Exception('No plan found', 404);
				}
			}
			catch (Exception $e)
			{
				$this->setError($e);

				return false;
			}
		}

		return $this->plan;
	}

	/**
	 * Create the subscription
	 *
	 * @return  Table subscription
	 */
	protected function createSubscription()
	{
		$gateway = $this->getGateway();
		$plan = $this->getPlan();
		$input = $this->app->input;
		$sub = Table::getInstance('Subscription', 'FabrikTable');

		// Replace fields with db prefix
		$billingCycle = $this->getBillingCycle();

		// If paying for an existing subscription get the id
		$subscriptionId = $input->getInt('subscription_id', 0);

		if ($subscriptionId !== 0)
		{
			$sub->id = $subscriptionId;
		}

		// If upgrading fall back to logged in user id
		$sub->userid = $input->getInt('newuserid', $this->user->get('id'));
		$sub->primary = 1;
		$sub->type = $gateway->id;
		$sub->status = $plan->free == 1 ? 'Active' : 'Pending';
		$sub->signup_date = $this->date->toSql();
		$sub->plan = $billingCycle->plan_id;
		$sub->lifetime = $input->getInt('lifetime', 0);
		$sub->recurring = $gateway->subscription;
		$sub->billing_cycle_id = $billingCycle->id;
		$input->set('recurring', $sub->recurring);
		$sub->store();

		return $sub;
	}

	/**
	 * Create an invoice for a subscription
	 *
	 * @param   Table  $sub  Subscription row
	 *
	 * @return  Table Invoice
	 */
	protected function createInvoice($sub)
	{
		$input = $this->app->input;

		$invoice = Table::getInstance('Invoice', 'FabrikTable');
		$invoice->invoice_number = uniqid('', true);
		$input->setVar('invoice_number', $invoice->invoice_number);

		$this->setInvoicePaymentOptions($invoice);
		$invoice->created_date = $this->date->toSql();
		$invoice->subscr_id = $sub->id;
		$invoice->store();

		return $invoice;
	}

	/**
	 * Set the Invoice payment options
	 *
	 * @param   Table  &$invoice  Invoice
	 *
	 * @return  void
	 */
	protected function setInvoicePaymentOptions(&$invoice)
	{
		$gateway = $this->getGateway();
		$invoice->gateway_id = $gateway->id;
		$billingCycle = $this->getBillingCycle();
		$invoice->currency = $billingCycle->currency;
		$invoice->amount = $billingCycle->cost;
	}
	
	/**
	 * Render the element admin settings
	 *
	 * @param   array   $data           admin data
	 * @param   int     $repeatCounter  repeat plugin counter
	 * @param   string  $mode           how the fieldsets should be rendered currently support 'nav-tabs' (@since 3.1)
	 *
	 * @return  string	admin html
	 */
	public function onRenderAdminSettings($data = array(), $repeatCounter = null, $mode = null)
	{
		$this->install();

		return parent::onRenderAdminSettings($data, $repeatCounter, $mode);
	}

	/**
	 * Install the plugin db tables
	 *
	 * @return  void
	 */
	public function install()
	{
		$db = FabrikWorker::getDbo();
		/* The tables */
		$tables = [
			"CREATE TABLE IF NOT EXISTS `#__fabrik_subs_invoices` (
			  `id` int(6) NOT NULL auto_increment,
			  `subscr_id` int(6) default NULL DEFAULT 0,
			  `invoice_number` varchar(255) DEFAULT '',
			  `created_date` TIMESTAMP NOT NULL,
			  `transaction_date` datetime NOT NULL,
			  `gateway_id` int(6) DEFAULT 0,
			  `amount` varchar(40) DEFAULT 0,
			  `currency` varchar(10) DEFAULT '',
			  `paid` INT(1) DEFAULT 0,
			  `pp_txn_id` varchar(255) DEFAULT '',
			  `pp_payment_amount` varchar(20) DEFAULT '',
			  `pp_payment_status` varchar(20) DEFAULT '',
			  `pp_txn_type` varchar(20) DEFAULT '',
			  `pp_fee` varchar(255) DEFAULT '',
			  `pp_payer_email` varchar(255) DEFAULT '',
			  PRIMARY KEY  (`id`),
			  KEY `fb_prefilter_method_INDEX` (`gateway_id`),
			  KEY `fb_filter_invoice_number_INDEX` (`invoice_number`(10)),
			  KEY `fb_filter_subscr_id_INDEX` (`subscr_id`),
			  KEY `fb_filter_pp_payer_email_INDEX` (`pp_payer_email`(10)),
			  KEY `fb_filter_pp_txn_id_INDEX` (`pp_txn_id`(10));",
			"CREATE TABLE IF NOT EXISTS `#__fabrik_subs_plans` (
			  `id` int(11) NOT NULL auto_increment,
			  `active` tinyint(1) DEFAULT 0,
			  `visible` tinyint(1) DEFAULT 0,
			  `ordering` int(11) NOT NULL default '999999',
			  `plan_name` varchar(255) DEFAULT '',
			  `desc` text,
			  `usergroup` int(3) DEFAULT 0,
			  `free` text,
			  `strapline` varchar(255) DEFAULT '',
			  PRIMARY KEY  (`id`),
			  KEY `fb_prefilter_active_INDEX` (`active`),
			  KEY `fb_prefilter_visible_INDEX` (`visible`));",
			"CREATE TABLE IF NOT EXISTS `#__fabrik_subs_cron_emails` (
			  `id` int(6) NOT NULL auto_increment,
			  `subject` varchar(255) NOT NULL DEFAULT '',
			  `body` text,
			  `event_type` varchar(20) NOT NULL DEFAULT '',
			  `timeunit` varchar(2) NOT NULL DEFAULT '',
			  `time_value` int(3) NOT NULL DEFAULT 0,
			  PRIMARY KEY  (`id`),
			  KEY `fb_filter_event_type_INDEX` (`event_type`(10))
			);",
			"CREATE TABLE IF NOT EXISTS `#__fabrik_subs_payment_gateways` (
			  `id` int(6) NOT NULL auto_increment,
			  `name` varchar(255) DEFAULT '',
			  `active` text,
			  `description` text,
			  `subscription` text,
			  PRIMARY KEY  (`id`));",
			"CREATE TABLE IF NOT EXISTS `#__fabrik_subs_plan_billing_cycle` (
			  `id` int(11) NOT NULL auto_increment,
			  `plan_id` int(6) NOT NULL DEFAULT 0,
			  `duration` int(6) NOT NULL DEFAULT 0,
			  `period_unit` char(1) NOT NULL DEFAULT '',
			  `cost` int(6) NOT NULL DEFAULT 0,
			  `currency` char(4) NOT NULL DEFAULT '',
			  `description` varchar(255) NOT NULL DEFAULT '',
			  `label` varchar(255) DEFAULT '',
			  `plan_name` varchar(255) DEFAULT '',
			  PRIMARY KEY  (`id`));",
			"CREATE TABLE IF NOT EXISTS `#__fabrik_subs_subscriptions` (
			  `id` int(11) NOT NULL auto_increment,
			  `userid` int(11) DEFAULT 0,
			  `primary` int(1) NOT NULL DEFAULT 0,
			  `type` int(6) DEFAULT 0,
			  `status` varchar(10) DEFAULT '',
			  `signup_date` datetime NOT NULL,
			  `lastpay_date` datetime NULL DEFAULT NULL,
			  `cancel_date` datetime NULL DEFAULT NULL,
			  `eot_date` datetime NULL DEFAULT NULL,
			  `eot_cause` varchar(30) DEFAULT '',
			  `plan` int(6) DEFAULT 0,
			  `recurring` int(1) NOT NULL DEFAULT 0,
			  `lifetime` int(1) NOT NULL DEFAULT 0,
			  `expiration` datetime NULL DEFAULT NULL,
			  PRIMARY KEY  (`id`),
			  KEY `fb_filter_status_INDEX` (`status`),
			  KEY `fb_order_userid_INDEX` (`userid`),
			  KEY `fb_filter_plan_INDEX` (`plan`),
			  KEY `fb_order_lastpay_date_INDEX` (`lastpay_date`),
			  KEY `fb_filter_lastpay_date_INDEX` (`lastpay_date`),
			  KEY `fb_filter_type_INDEX` (`type`),
			  KEY `fb_order_signup_date_INDEX` (`signup_date`));",
			"CREATE TABLE IF NOT EXISTS `#__fabrik_subs_users` (
			  `id` int(6) NOT NULL auto_increment,
			  `time_date` datetime NOT NULL,
			  `userid` varchar(255) DEFAULT '',
			  `name` varchar(255) DEFAULT '',
			  `username` varchar(255) DEFAULT '',
			  `email` varchar(255) DEFAULT '',
			  `password` varchar(255) DEFAULT '',
			  `plan_id` int(11) DEFAULT 0,
			  `terms` text,
			  `termstext` text,
			  `gateway` int(6) DEFAULT 0,
			  `pp_txn_id` varchar(255) DEFAULT '',
			  `pp_payment_amount` varchar(255) DEFAULT '',
			  `pp_payment_status` varchar(255) DEFAULT '',
			  `billing_cycle` int(11) DEFAULT 0,
			  `billing_duration` varchar(255) DEFAULT '',
			  `billing_period` varchar(255) DEFAULT '',
			  PRIMARY KEY  (`id`),
			  KEY `fb_filter_userid_INDEX` (`userid`(10)));",
		];

		foreach($tables as $table) {
			$db->setQuery($table)->execute();
		}

		/* Update existing tables */
		$sqls = [
			"ALTER TABLE `#__fabrik_subs_invoices` ALTER `subscr_id` SET DEFAULT 0;",
			"ALTER TABLE `#__fabrik_subs_invoices` ALTER `invoice_number` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_invoices` MODIFY `transaction_date` datetime;",
			"ALTER TABLE `#__fabrik_subs_invoices` ALTER `transaction_date` DROP DEFAULT;",
			"UPDATE `#__fabrik_subs_invoices` SET `transaction_date` = '1980-01-01 00:00:00' WHERE `transaction_date` < '1000-01-01' OR `transaction_date` IS NULL;",
			"ALTER TABLE `#__fabrik_subs_invoices` ALTER `gateway_id` SET DEFAULT 0;",
			"ALTER TABLE `#__fabrik_subs_invoices` ALTER `amount` SET DEFAULT 0;",
			"ALTER TABLE `#__fabrik_subs_invoices` ALTER `currency` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_invoices` ALTER `paid` SET DEFAULT 0;",
			"ALTER TABLE `#__fabrik_subs_invoices` ALTER `pp_txn_id` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_invoices` ALTER `pp_payment_amount` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_invoices` ALTER `pp_payment_status` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_invoices` ALTER `pp_txn_type` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_invoices` ALTER `pp_fee` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_invoices` ALTER `pp_payer_email` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_plans` ALTER `active` SET DEFAULT 0;",
			"ALTER TABLE `#__fabrik_subs_plans` ALTER `visible` SET DEFAULT 0;",
			"ALTER TABLE `#__fabrik_subs_plans` ALTER `ordering` SET DEFAULT '999999';",
			"ALTER TABLE `#__fabrik_subs_plans` ALTER `plan_name` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_plans` ALTER `usergroup` SET DEFAULT 0;",
			"ALTER TABLE `#__fabrik_subs_plans` ALTER `strapline` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_cron_emails` ALTER `subject` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_cron_emails` ALTER `event_type` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_cron_emails` ALTER `timeunit` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_cron_emails` ALTER `time_value` SET DEFAULT 0;",
			"ALTER TABLE `#__fabrik_subs_payment_gateways` ALTER `name` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_plan_billing_cycle` ALTER `plan_id` SET DEFAULT 0;",
			"ALTER TABLE `#__fabrik_subs_plan_billing_cycle` ALTER `duration` SET DEFAULT 0;",
			"ALTER TABLE `#__fabrik_subs_plan_billing_cycle` ALTER `period_unit` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_plan_billing_cycle` ALTER `cost` SET DEFAULT 0;",
			"ALTER TABLE `#__fabrik_subs_plan_billing_cycle` ALTER `currency` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_plan_billing_cycle` ALTER `description` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_plan_billing_cycle` ALTER `label` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_plan_billing_cycle` ALTER `plan_name` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_subscriptions` ALTER `userid` SET DEFAULT 0;",
			"ALTER TABLE `#__fabrik_subs_subscriptions` ALTER `primary` SET DEFAULT 0;",
			"ALTER TABLE `#__fabrik_subs_subscriptions` ALTER `type` SET DEFAULT 0;",
			"ALTER TABLE `#__fabrik_subs_subscriptions` ALTER `status` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_subscriptions` MODIFY `signup_date` datetime NOT NULL;",
			"ALTER TABLE `#__fabrik_subs_subscriptions` ALTER `signup_date` DROP DEFAULT;",
			"UPDATE `#__fabrik_subs_subscriptions` SET `signup_date` = '1980-01-01 00:00:00' WHERE `signup_date` < '1000-01-01' OR `signup_date` IS NULL;",
			"ALTER TABLE `#__fabrik_subs_subscriptions` MODIFY `lastpay_date` datetime NULL DEFAULT NULL;",
			"ALTER TABLE `#__fabrik_subs_subscriptions` MODIFY `cancel_date` datetime NULL DEFAULT NULL;",
			"ALTER TABLE `#__fabrik_subs_subscriptions` MODIFY `eot_date` datetime NULL DEFAULT NULL;",
			"ALTER TABLE `#__fabrik_subs_subscriptions` ALTER `eot_cause` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_subscriptions` ALTER `plan` SET DEFAULT 0;",
			"ALTER TABLE `#__fabrik_subs_subscriptions` ALTER `recurring` SET DEFAULT 0;",
			"ALTER TABLE `#__fabrik_subs_subscriptions` ALTER `lifetime` SET DEFAULT 0;",
			"ALTER TABLE `#__fabrik_subs_subscriptions` MODIFY `expiration` datetime NULL DEFAULT NULL;",
			"ALTER TABLE `#__fabrik_subs_users` MODIFY `time_date` datetime NOT NULL;",
			"ALTER TABLE `#__fabrik_subs_users` ALTER `time_date` DROP DEFAULT;",
			"UPDATE `#__fabrik_subs_users` SET `time_date` = '1980-01-01 00:00:00' WHERE `time_date` < '1000-01-01' OR `time_date` IS NULL;",
			"ALTER TABLE `#__fabrik_subs_users` ALTER `userid` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_users` ALTER `name` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_users` ALTER `username` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_users` ALTER `email` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_users` ALTER `password` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_users` ALTER `plan_id` SET DEFAULT 0;",
			"ALTER TABLE `#__fabrik_subs_users` ALTER `gateway` SET DEFAULT 0;",
			"ALTER TABLE `#__fabrik_subs_users` ALTER `pp_txn_id` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_users` ALTER `pp_payment_amount` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_users` ALTER `pp_payment_status` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_users` ALTER `billing_cycle` SET DEFAULT 0;",
			"ALTER TABLE `#__fabrik_subs_users` ALTER `billing_duration` SET DEFAULT '';",
			"ALTER TABLE `#__fabrik_subs_users` ALTER `billing_period` SET DEFAULT '';",
		];
		foreach ($sqls as $sql) {
			$db->setQuery($sql)->execute();
		}
	}
}
