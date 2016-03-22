<?php
/**
 * Pop PHP Framework (http://www.popphp.org/)
 *
 * @link       https://github.com/popphp/popphp-framework
 * @author     Nick Sagona, III <dev@nolainteractive.com>
 * @copyright  Copyright (c) 2009-2016 NOLA Interactive, LLC. (http://www.nolainteractive.com)
 * @license    http://www.popphp.org/license     New BSD License
 */

/**
 * @namespace
 */
namespace Pop\Shipping;

/**
 * Shipping class
 *
 * @category   Pop
 * @package    Pop_Shipping
 * @author     Nick Sagona, III <dev@nolainteractive.com>
 * @copyright  Copyright (c) 2009-2016 NOLA Interactive, LLC. (http://www.nolainteractive.com)
 * @license    http://www.popphp.org/license     New BSD License
 * @version    2.0.0
 */
class Shipping
{

	/**
	 * Shipping adapter
	 *
	 * @var mixed
	 */
	protected $adapter = null;

	/**
	 * Constructor
	 *
	 * Instantiate the shipping object
	 *
	 * @param  Adapter\AbstractAdapter $adapter
	 *
	 * @return Shipping
	 */
	public function __construct(Adapter\AbstractAdapter $adapter)
	{
		$this->adapter = $adapter;
	}

	/**
	 * Access the adapter
	 *
	 * @return Adapter\AbstractAdapter
	 */
	public function adapter()
	{
		return $this->adapter;
	}

	/**
	 * Set ship to
	 *
	 * @param  array $shipTo
	 *
	 * @return self
	 */
	public function shipTo(array $shipTo)
	{
		$this->adapter->shipTo($shipTo);

		return $this;
	}

	/**
	 * Set ship from
	 *
	 * @param  array $shipFrom
	 *
	 * @return self
	 */
	public function shipFrom(array $shipFrom)
	{
		$this->adapter->shipFrom($shipFrom);

		return $this;
	}

	/**
	 * Set dimensions
	 *
	 * @param  array  $dimensions
	 * @param  string $unit
	 *
	 * @return self
	 */
	public function setDimensions(array $dimensions, $unit = null)
	{
		$this->adapter->setDimensions($dimensions, $unit);

		return $this;
	}

	/**
	 * Set dimensions
	 *
	 * @param  string $weight
	 * @param  string $unit
	 *
	 * @return self
	 */
	public function setWeight($weight, $unit = null)
	{
		$this->adapter->setWeight($weight, $unit);

		return $this;
	}

	/**
	 * Set whether the package contains alcohol
	 *
	 * @param   string $alcohol
	 * @param   string $recipientType LICENSEE|CONSUMER
	 *
	 * @return self
	 */
	public function setAlcohol($alcohol, $recipientType = 'LICENSEE')
	{
		$this->adapter->setAlcohol($alcohol, $recipientType);

		return $this;
	}

	/**
	 * Send transaction data
	 *
	 * @param  boolean $verifyPeer
	 *
	 * @return void
	 */
	public function send($verifyPeer = true)
	{
		$this->adapter->send($verifyPeer);
	}

	/**
	 * Send a shipping request
	 *
	 * @param bool $verifyPeer
	 *
	 * @return string Shipping label
	 */
	public function ship($verifyPeer = true)
	{
		return $this->adapter()->ship($verifyPeer);
	}

	/**
	 * Return whether the transaction is success
	 *
	 * @return boolean
	 */
	public function isSuccess()
	{
		return $this->adapter->isSuccess();
	}

	/**
	 * Return whether the transaction is an error
	 *
	 * @return boolean
	 */
	public function isError()
	{
		return $this->adapter->isError();
	}

	/**
	 * Get response
	 *
	 * @return object
	 */
	public function getResponse()
	{
		return $this->adapter->getResponse();
	}

	/**
	 * Get response code
	 *
	 * @return int
	 */
	public function getResponseCode()
	{
		return $this->adapter->getResponseCode();
	}

	/**
	 * Get response message
	 *
	 * @return string
	 */
	public function getResponseMessage()
	{
		return $this->adapter->getResponseMessage();
	}

	/**
	 * Get service rates
	 *
	 * @return array
	 */
	public function getRates()
	{
		return $this->adapter->getRates();
	}

	/**
	 * Get extended service rates
	 *
	 * @return array
	 */
	public function getExtendedRates()
	{
		return $this->adapter->getExtendedRates();
	}

	/**
	 * @param $info
	 *
	 * @return mixed
	 */
	public function shipmentInfo($info)
	{
		return $this->adapter->shipmentInfo($info);
	}

	/**
	 * @param $value
	 */
	public function setInsurance($value = 0)
	{
		$this->adapter->setInsurance($value);
	}

	/**
	 * Add a package
	 *
	 * @param PackageAdapter\AbstractAdapter $package
	 */
	public function addPackage(PackageAdapter\AbstractAdapter $package)
	{
		$this->adapter->addPackage($package);
	}

	/**
	 * Set the total declared shipment value
	 * @param float $value
	 */
	public function declaredValue($value)
	{
		$this->adapter->declaredValue($value);
	}

}
