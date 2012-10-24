<?php

/**
 * A cron task to grab data from a REST API and insert it into a list
 * @package     Joomla
 * @subpackage  Fabrik
 * @author Rob Clayburn
 * @copyright (C) Rob Clayburn
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

// Require the abstract plugin class
require_once COM_FABRIK_FRONTEND . '/models/plugin-cron.php';

class plgFabrik_CronRest extends plgFabrik_Cron {

	/**
	 * do the plugin action
	 * @param array data
	 * @param object list model
	 * @param object admin list model
	 * @return number of records updated
	 *
	 */
	public function process(&$data, &$listModel, &$adminListModel)
	{
		$this->oAuth();
		$params = $this->getParams();

		$config_method = 'GET';
		$config_userpass = $params->get('username').':'.$params->get('password');
		$config_headers[] = 'Accept: application/xml';
		$endpoint = $params->get('endpoint');

		// Here we set up CURL to grab the data from Unfuddle
		$chandle = curl_init();
		curl_setopt($chandle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($chandle, CURLOPT_URL, $endpoint);
		curl_setopt($chandle, CURLOPT_HTTPHEADER, $config_headers);
		curl_setopt($chandle, CURLOPT_USERPWD, $config_userpass);
		curl_setopt($chandle, CURLOPT_CUSTOMREQUEST, $config_method);
		$output = curl_exec($chandle);
		curl_close($chandle);

		$xml = new SimpleXMLElement($output);
		//drill down to the specified xpath location for our data
		$xpath = $params->get('xpath');
		if ($xpath !== '') {
			$xml = $xml->xpath($xpath);
		}
		$adminListModel->dbTableFromXML($params->get('key'), $params->get('create_list'), $xml);
		$this->createList($listModel, $adminListModel);

	}

	protected function oAuth()
	{
		require_once JPATH_SITE . '/plugins/fabrik_cron/rest/oauth/FabrikOAuth.php';
		$host = 'pollen8.openphoto.me';
		$consumerKey = '84deeeb1a9237ab5ffa91d57fb2123';
		$consumerSecret = '9004587505';
		$oauthToken = '6fe780fbf89bdb3ef258a351c57e14';
		$oauthTokenSecret = '53da8ccff3';
		$client = new FabrikOAuth($host, $consumerKey, $consumerSecret, $oauthToken, $oauthTokenSecret);
		$response = $client->get("/photos/list.json?returnSizes=20x20&auth=true", array('auth' => 'true'));
		//$response = $client->get("/photo/1/view.json?returnSizes=20x20", array('auth' => 'true'));

		//$response = $client->get("/hello.json", array('auth' => 'true'));
		$response = json_decode($response);
		if ($response->code == 200) {
			$data = $response->result;
		}
		echo "<Pre>";print_r($response);

		//echo "cleinit = ";
		//print_r($client);
		exit;
	}

	protected function createList($listModel, $adminListModel)
	{
		$params = $this->getParams();
		$table = $params->get('create_list');
		if ($table == '') {
			return;
		}
		$db = FabrikWorker::getDbo();
		//see if we have a list that already points to the table
		$query = $db->getQuery(true);
		$query->select('id')->from('#__{package}_lists')->where('db_table_name = ' . $db->quoteName($table));
		$db->setQuery($query);
		$res = (int) $db->loadResult();

		$now = JFactory::getDate()->toSql();
		$user = JFactory::getUser();

		$data = array();

		//fill in some default data
		$data['filter_action'] = 'onchange';
		$data['access'] = 1;
		$data['id'] = $res;
		$data['label'] = $table;
		$data['connection_id'] = 1;
		$data['db_table_name'] = $table;
		$data['published'] = 1;
		$data['created'] = $now;
		$data['created_by']= $user->get('id');

		JRequest::setVar('jform', $data);
		$adminListModel->save($data);
	}

}
?>