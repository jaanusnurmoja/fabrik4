<?php
/**
 * Send sms's
 *
 * @package     Joomla
 * @subpackage  Fabrik.helpers
 * @copyright   Copyright (C) 2005-2013 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Send sms's
 *
 * @package     Joomla
 * @subpackage  Fabrik.helpers
 * @since       3.0
 */

class FabrikSMS
{
	/**
	 * Send sms
	 *
	 * @param   string  $method    post/get
	 * @param   string  $url       url to request
	 * @param   string  $vars      querystring vars to post
	 * @param   string  $auth      auth
	 * @param   string  $callback  method
	 *
	 * @return  mixed data or curl error
	 */

	public static function doRequest($method, $url, $vars, $auth = '', $callback = false)
	{
		if (!function_exists('curl_init'))
		{
			throw new RuntimeException(FText::_('COM_FABRIK_ERR_CURL_NOT_INSTALLED'));

			return;
		}

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
		curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');

		if ($method == 'POST')
		{
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
		}

		if (!empty($auth))
		{
			curl_setopt($ch, CURLOPT_USERPWD, $auth);
		}

		$data = curl_exec($ch);
		curl_close($ch);

		if ($data)
		{
			if ($callback)
			{
				return call_user_func($callback, $data);
			}
			else
			{
				return $data;
			}
		}
		else
		{
			return curl_error($ch);
		}
	}
}
