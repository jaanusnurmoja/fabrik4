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
namespace Pop\Shipping\Adapter;

/**
 * UPS shipping adapter class
 *
 * @category   Pop
 * @package    Pop_Shipping
 * @author     Nick Sagona, III <dev@nolainteractive.com>
 * @copyright  Copyright (c) 2009-2016 NOLA Interactive, LLC. (http://www.nolainteractive.com)
 * @license    http://www.popphp.org/license     New BSD License
 * @version    2.0.0
 */
class Ups extends AbstractAdapter
{

	/**
	 * Live API URL
	 *
	 * @var string
	 */
	protected $liveUrl = 'https://onlinetools.ups.com/ups.app/xml/Rate';

	/**
	 * Test API URL
	 *
	 * @var string
	 */
	protected $testUrl = 'https://wwwcie.ups.com/ups.app/xml/Rate';

	/**
	 * Test mode flag
	 *
	 * @var boolean
	 */
	protected $testMode = false;

	/**
	 * User ID
	 *
	 * @var string
	 */
	protected $userId = null;

	/**
	 * Access Request XML
	 *
	 * @var string
	 */
	protected $accessRequest = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<AccessRequest xml:lang=\"en-US\">";

	/**
	 * Selected Packaging code, see packagingTypes
	 * @var string
	 */
	protected $packageCode = '02';

	/**
	 * Selected shipment charge type
	 *  01 =Transportation • 02 = Duties and Taxes not required
	 * see page 43 of API docs
	 * @var string
	 */
	protected $shipmentChargeType = '01';

	protected $shipperNumber = 'XF3464';

	/**
	 * @var string base64 encoded shipping label
	 */
	protected $label;

	/**
	 * Rate Request XML
	 *
	 * @var string
	 */
	protected $rateRequest = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<RatingServiceSelectionRequest>";

	/**
	 * Pickup Types
	 *
	 * @var array
	 */
	protected static $pickupTypes = [
		'01' => 'Daily Pickup',
		'03' => 'Customer Counter',
		'06' => 'One Time Pickup',
		'07' => 'On Call Air',
		'19' => 'Letter Center',
		'20' => 'Air Service Center'
	];

	/**
	 * Pickup Types
	 *
	 * @var array
	 */
	protected static $packagingTypes = [
		'00' => 'UNKNOWN',
		'01' => 'UPS Letter',
		'02' => 'Package',
		'03' => 'Tube',
		'04' => 'Pak',
		'21' => 'Express Box',
		'24' => '25KG Box',
		'25' => '10KG Box',
		'30' => 'Pallet',
		'2a' => 'Small Express Box',
		'2b' => 'Medium Express Box',
		'2c' => 'Large Express Box'
	];

	/**
	 * Services
	 *
	 * @var array
	 */
	protected static $services = [
		'14' => 'Next Day Air Early AM',
		'01' => 'Next Day Air',
		'13' => 'Next Day Air Saver',
		'59' => '2nd Day Air AM',
		'02' => '2nd Day Air',
		'12' => '3 Day Select',
		'03' => 'Ground',
		'11' => 'Standard',
		'07' => 'Worldwide Express',
		'54' => 'Worldwide Express Plus',
		'08' => 'Worldwide Expedited',
		'65' => 'Saver'
	];

	/**
	 * Ship to fields
	 *
	 * @var array
	 */
	protected $shipTo = [
		'CompanyName' => null,
		'AddressLine1' => null,
		'AddressLine2' => null,
		'AddressLine3' => null,
		'City' => null,
		'StateProvinceCode' => 'CA',
		'PostalCode' => null,
		'CountryCode' => null
	];

	/**
	 * Ship from fields
	 *
	 * @var array
	 */
	protected $shipFrom = [
		'CompanyName' => null,
		'AddressLine1' => null,
		'AddressLine2' => null,
		'AddressLine3' => null,
		'City' => null,
		'StateProvinceCode' => 'CA',
		'PostalCode' => null,
		'CountryCode' => null
	];

	/**
	 * Pickup type
	 *
	 * @var string
	 */
	protected $pickupType = '01';

	/**
	 * Package type
	 *
	 * @var string
	 */
	protected $packageType = '02';

	/**
	 * Service
	 *
	 * @var string
	 */
	protected $service = '03';

	/**
	 * Package dimensions
	 *
	 * @var array
	 */
	protected $dimensions = [
		'UnitOfMeasurement' => 'IN',
		'Length' => null,
		'Width' => null,
		'Height' => null
	];

	/**
	 * Package weight
	 *
	 * @var array
	 */
	protected $weight = [
		'UnitOfMeasurement' => 'LBS',
		'Weight' => null
	];

	/**
	 * Constructor
	 *
	 * Method to instantiate an UPS shipping adapter object
	 *
	 * @param  string  $accessKey
	 * @param  string  $userId
	 * @param  string  $password
	 * @param  boolean $test
	 *
	 * @return Ups
	 */
	public function __construct($accessKey, $userId, $password, $test = false)
	{
		$this->testMode = (bool) $test;
		$this->userId   = $userId;
		$this->accessRequest .= PHP_EOL . '    <AccessLicenseNumber>' . $accessKey . '</AccessLicenseNumber>';
		$this->accessRequest .= PHP_EOL . '    <UserId>' . $userId . '</UserId>';
		$this->accessRequest .= PHP_EOL . '    <Password>' . $password . '</Password>';
		$this->accessRequest .= PHP_EOL . '</AccessRequest>' . PHP_EOL;
	}

	/**
	 * Static method to get the pickup types
	 *
	 * @return array
	 */
	public static function getPickupTypes()
	{
		return self::$pickupTypes;
	}

	/**
	 * Static method to get the packaging types
	 *
	 * @return array
	 */
	public static function getPackagingTypes()
	{
		return self::$packagingTypes;
	}

	/**
	 * Static method to get the services
	 *
	 * @return array
	 */
	public static function getServices()
	{
		return self::$services;
	}

	/**
	 * Set pickup type
	 *
	 * @param  string $code
	 *
	 * @throws Exception
	 * @return void
	 */
	public function setPickup($code)
	{
		if (!array_key_exists($code, self::$pickupTypes))
		{
			throw new Exception('Error: That pickup code does not exist.');
		}

		$this->pickupType = $code;
	}

	/**
	 * Set package type
	 *
	 * @param  string $code
	 *
	 * @throws Exception
	 * @return void
	 */
	public function setPackage($code)
	{
		if (!array_key_exists($code, self::$packagingTypes))
		{
			throw new Exception('Error: That package code does not exist.');
		}

		$this->packageType = $code;
	}

	/**
	 * Set service
	 *
	 * @param  string $code
	 *
	 * @throws Exception
	 * @return void
	 */
	public function setService($code)
	{
		if (!array_key_exists($code, self::$services))
		{
			throw new Exception('Error: That service code does not exist.');
		}

		$this->service = $code;
	}

	/**
	 * Set ship to
	 *
	 * @param  array $shipTo
	 *
	 * @return void
	 */
	public function shipTo(array $shipTo)
	{
		foreach ($shipTo as $key => $value)
		{
			if (stripos($key, 'company') !== false)
			{
				$this->shipTo['CompanyName'] = $value;
			}
			else
			{
				if ((strtolower($key) == 'addressline1') || (strtolower($key) == 'address1') || (strtolower($key) == 'address'))
				{
					$this->shipTo['AddressLine1'] = $value;
				}
				else
				{
					if ((strtolower($key) == 'addressline2') || (strtolower($key) == 'address2'))
					{
						$this->shipTo['AddressLine2'] = $value;
					}
					else
					{
						if ((strtolower($key) == 'addressline3') || (strtolower($key) == 'address3'))
						{
							$this->shipTo['AddressLine3'] = $value;
						}
						else
						{
							if (strtolower($key) == 'city')
							{
								$this->shipTo['City'] = $value;
							}
							else
							{
								if ((strtolower($key) == 'postalcode') || (strtolower($key) == 'zipcode') || (strtolower($key) == 'zip'))
								{
									$this->shipTo['PostalCode'] = $value;
								}
								else
								{
									if ((strtolower($key) == 'countrycode') || (strtolower($key) == 'country'))
									{
										$this->shipTo['CountryCode'] = $value;
									}
								}
							}
						}
					}
				}
			}
		}
	}

	/**
	 * Set ship from
	 *
	 * @param  array $shipFrom
	 *
	 * @return void
	 */
	public function shipFrom(array $shipFrom)
	{
		foreach ($shipFrom as $key => $value)
		{
			if (stripos($key, 'company') !== false)
			{
				$this->shipFrom['CompanyName'] = $value;
			}
			else
			{
				if ((strtolower($key) == 'addressline1') || (strtolower($key) == 'address1') || (strtolower($key) == 'address'))
				{
					$this->shipFrom['AddressLine1'] = $value;
				}
				else
				{
					if ((strtolower($key) == 'addressline2') || (strtolower($key) == 'address2'))
					{
						$this->shipFrom['AddressLine2'] = $value;
					}
					else
					{
						if ((strtolower($key) == 'addressline3') || (strtolower($key) == 'address3'))
						{
							$this->shipFrom['AddressLine3'] = $value;
						}
						else
						{
							if (strtolower($key) == 'city')
							{
								$this->shipFrom['City'] = $value;
							}
							else
							{
								if ((strtolower($key) == 'postalcode') || (strtolower($key) == 'zipcode') || (strtolower($key) == 'zip'))
								{
									$this->shipFrom['PostalCode'] = $value;
								}
								else
								{
									if ((strtolower($key) == 'countrycode') || (strtolower($key) == 'country'))
									{
										$this->shipFrom['CountryCode'] = $value;
									}
								}
							}
						}
					}
				}
			}
		}
	}

	/**
	 * Set dimensions
	 *
	 * @param  array  $dimensions
	 * @param  string $unit
	 *
	 * @return void
	 */
	public function setDimensions(array $dimensions, $unit = null)
	{
		if ((null !== $unit) && (($unit == 'IN') || ($unit == 'CM')))
		{
			$this->dimensions['UnitOfMeasurement'] = $unit;
		}

		foreach ($dimensions as $key => $value)
		{
			if (strtolower($key) == 'length')
			{
				$this->dimensions['Length'] = $value;
			}
			else
			{
				if (strtolower($key) == 'width')
				{
					$this->dimensions['Width'] = $value;
				}
				else
				{
					if (strtolower($key) == 'height')
					{
						$this->dimensions['Height'] = $value;
					}
				}
			}
		}
	}

	/**
	 * Set dimensions
	 *
	 * @param  string $weight
	 * @param  string $unit
	 *
	 * @return void
	 */
	public function setWeight($weight, $unit = null)
	{
		if ((null !== $unit) && (($unit == 'LBS') || ($unit == 'KGS')))
		{
			$this->weight['UnitOfMeasurement'] = $unit;
		}

		$this->weight['Weight'] = $weight;
	}

	/**
	 * Confirm a shipment
	 *
	 * @param bool $verifyPeer
	 *
	 * @return string Label
	 */
	public function sendConfirm($verifyPeer = true)
	{
		echo "ups sendConfirm";
		$xml = $this->buildConfirmRequest();

		$options = [
			CURLOPT_HEADER => false,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $this->accessRequest . $xml,
			CURLOPT_URL => 'https://wwwcie.ups.com/ups.app/xml/ShipConfirm',
			CURLOPT_RETURNTRANSFER => true
		];

		if (!$verifyPeer)
		{
			$options[CURLOPT_SSL_VERIFYPEER] = false;
		}

		$curl = curl_init();
		curl_setopt_array($curl, $options);
		$xml = $this->parseResponse($curl);

		if (curl_errno($curl) !== 0)
		{
			$this->responseCode    = 500;
			$this->responseMessage = curl_error($curl);

			return;
		}

		$this->response     = simplexml_load_string($xml);
		$this->responseCode = (int) $this->response->Response->ResponseStatusCode;

		if ($this->responseCode == 1)
		{
			$this->label = $this->sendAcceptRequest((string) $this->response->ShipmentDigest, $verifyPeer);
		}
		else
		{
			$this->responseCode    = (string) $this->response->Response->Error->ErrorCode;
			$this->responseMessage = (string) $this->response->Response->Error->ErrorDescription;
		}

		return $this->label;
	}

	/**
	 * Second part of accepting the confirmed shipment
	 *
	 * @param string $digest
	 * @param bool $verifyPeer
	 *
	 * @return bool|string
	 */
	protected function sendAcceptRequest($digest, $verifyPeer)
	{
		$xml = '<?xmlversion="1.0"?>';
		$xml .= PHP_EOL . '<ShipmentAcceptRequest>';
		$xml .= PHP_EOL . '    <Request>';
		$xml .= PHP_EOL . '        <TransactionReference>';
		$xml .= PHP_EOL . '            <CustomerContext>Accept shipping</CustomerContext>';
		$xml .= PHP_EOL . '            <XpciVersion>1.0</XpciVersion>';
		$xml .= PHP_EOL . '        </TransactionReference>';
		$xml .= PHP_EOL . '        <RequestAction>ShipAccept</RequestAction>';
		$xml .= PHP_EOL . '        <RequestOption>01</RequestOption>';
		$xml .= PHP_EOL . '    </Request>';
		$xml .= PHP_EOL . '    <ShipmentDigest>' . $digest . '</ShipmentDigest>';
		$xml .= PHP_EOL . '</ShipmentAcceptRequest>';

		$options = [
			CURLOPT_HEADER => false,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $this->accessRequest . $xml,
			CURLOPT_URL => 'https://wwwcie.ups.com/ups.app/xml/ShipAccept',
			CURLOPT_RETURNTRANSFER => true
		];

		if (!$verifyPeer)
		{
			$options[CURLOPT_SSL_VERIFYPEER] = false;
		}

		$curl = curl_init();
		curl_setopt_array($curl, $options);
		$xml = $this->parseResponse($curl);

		if (curl_errno($curl) !== 0)
		{
			$this->responseCode    = 500;
			$this->responseMessage = curl_error($curl);

			return false;
		}

		$this->response     = simplexml_load_string($xml);

		return (string) $this->response->ShipmentResults->PackageResults->LabelImage->GraphicImage;
	}

	/**
	 * Send transaction
	 *
	 * @param  boolean $verifyPeer
	 *
	 * @return void
	 */
	public function send($verifyPeer = true)
	{
		$this->buildRateRequest();

		$options = [
			CURLOPT_HEADER => false,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $this->accessRequest . $this->rateRequest,
			CURLOPT_URL => $this->testMode ? $this->testUrl : $this->liveUrl,
			CURLOPT_RETURNTRANSFER => true
		];

		if (!$verifyPeer)
		{
			$options[CURLOPT_SSL_VERIFYPEER] = false;
		}

		$curl = curl_init();
		curl_setopt_array($curl, $options);
		$xml = $this->parseResponse($curl);

		if (curl_errno($curl) !== 0)
		{
			$this->responseCode    = 500;
			$this->responseMessage = curl_error($curl);

			return;
		}

		$this->response     = simplexml_load_string($xml);
		$this->responseCode = (int) $this->response->Response->ResponseStatusCode;

		if ($this->responseCode == 1)
		{
			$this->responseMessage = (string) $this->response->Response->ResponseStatusDescription;

			foreach ($this->response->RatedShipment as $rate)
			{
				$this->rates[self::$services[(string) $rate->Service->Code]] = (string) $rate->TotalCharges->MonetaryValue;
			}
		}
		else
		{
			$this->responseCode    = (string) $this->response->Response->Error->ErrorCode;
			$this->responseMessage = (string) $this->response->Response->Error->ErrorDescription;
		}
	}

	/**
	 * Return whether the transaction is a success
	 *
	 * @return boolean
	 */
	public function isSuccess()
	{
		return ($this->responseCode == 1);
	}

	/**
	 * Return whether the transaction is an error
	 *
	 * @return boolean
	 */
	public function isError()
	{
		return ($this->responseCode != 1);
	}

	/**
	 * @return mixed
	 */
	protected function buildConfirmRequest()
	{
		$xml = '<?xml version="1.0" encoding="utf-8"?>';
		$xml .= PHP_EOL . '<ShipmentConfirmRequest xml:lang="en-US">';
		$xml .= PHP_EOL . '    <Request>';
		$xml .= PHP_EOL . '        <TransactionReference>';
		$xml .= PHP_EOL . '            <CustomerContext>Confirm shipping</CustomerContext>';
		$xml .= PHP_EOL . '            <XpciVersion/>';
		$xml .= PHP_EOL . '        </TransactionReference>';
		$xml .= PHP_EOL . '        <RequestAction>ShipConfirm</RequestAction>';
		$xml .= PHP_EOL . '        <RequestOption>validate</RequestOption>';
		$xml .= PHP_EOL . '    </Request>';
		$xml .= PHP_EOL . '    <Shipment>';
		$xml .= PHP_EOL . '        <Shipper>';
		$xml .= PHP_EOL . '            <Name>' . $this->shipFrom['CompanyName'] . '</Name>';
		$xml .= PHP_EOL . '            <ShipperNumber>' . $this->shipperNumber . '</ShipperNumber>';
        $xml .= PHP_EOL . '            <Address>';

		foreach ($this->shipFrom as $key => $value)
		{
			if ($key !== 'CompanyName')
			{
				if (null !== $value)
				{
					$xml .= PHP_EOL . '                <' . $key . '>' . $value . '</' . $key . '>';
				}
				else
				{
					$xml .= PHP_EOL . '                <' . $key . '></' . $key . '>';
				}
			}
		}

		$xml .= PHP_EOL . '            </Address>';
		$xml .= PHP_EOL . '        </Shipper>';

		$xml .= PHP_EOL . '        <ShipTo>';
		$xml .= PHP_EOL . '            <CompanyName>foo - ' . $this->shipTo['CompanyName']. '</CompanyName>';
		$xml .= PHP_EOL . '            <Address>';

		foreach ($this->shipTo as $key => $value)
		{
			if ($key !== 'CompanyName')
			{
				if (null !== $value)
				{
					$xml .= PHP_EOL . '                <' . $key . '>' . $value . '</' . $key . '>';
				}
				else
				{
					$xml .= PHP_EOL . '                <' . $key . '></' . $key . '>';
				}
			}
		}
		$xml .= PHP_EOL . '            </Address>';
		$xml .= PHP_EOL . '        </ShipTo>';


		$xml .= PHP_EOL . '        <ShipFrom>';
		$xml .= PHP_EOL . '            <CompanyName>' . $this->shipFrom['CompanyName'] . '</CompanyName>';
		$xml .= PHP_EOL . '            <Address>';

		foreach ($this->shipFrom as $key => $value)
		{
			if ($key !== 'CompanyName')
			{
				if (null !== $value)
				{
					$xml .= PHP_EOL . '                <' . $key . '>' . $value . '</' . $key . '>';
				}
				else
				{
					$xml .= PHP_EOL . '                <' . $key . '></' . $key . '>';
				}
			}
		}

		$xml .= PHP_EOL . '            </Address>';
		$xml .= PHP_EOL . '        </ShipFrom>';
		$xml .= PHP_EOL . '        <PaymentInformation>';
		$xml .= PHP_EOL . '            <Prepaid>';
		$xml .= PHP_EOL . '                <BillShipper>';
		$xml .= PHP_EOL . '                    <AccountNumber>' . $this->shipperNumber . '</AccountNumber>';
		$xml .= PHP_EOL . '                </BillShipper>';
		$xml .= PHP_EOL . '            </Prepaid>';
        $xml .= PHP_EOL . '        </PaymentInformation>';
		$xml .= PHP_EOL . '        <Service>';
		$xml .= PHP_EOL . '            <Code>' . $this->service . '</Code>';
		$xml .= PHP_EOL . '            <Description>' . self::$services[$this->service] . '</Description>';
		$xml .= PHP_EOL . '        </Service>';
		$xml .= PHP_EOL . '        <Package>';
		$xml .= PHP_EOL . '            <PackagingType>';
		$xml .= PHP_EOL . '                <Code>' . $this->packageCode . '</Code>';
		$xml .= PHP_EOL . '                <Description>' . self::$packagingTypes[$this->packageCode] . '</Description>';
		$xml .= PHP_EOL . '            </PackagingType>';
		$xml .= PHP_EOL . '            <Dimensions>';
		$xml .= PHP_EOL . '                <UnitOfMeasurement>';
		$xml .= PHP_EOL . '                    <Code>' . $this->dimensions['UnitOfMeasurement'] . '</Code>';
		$xml .= PHP_EOL . '                </UnitOfMeasurement>';
		$xml .= PHP_EOL . '                <Length>' . $this->dimensions['Length'] . '</Length>';
		$xml .= PHP_EOL . '                <Width>' . $this->dimensions['Width'] . '</Width>';
		$xml .= PHP_EOL . '                <Height>' . $this->dimensions['Height'] . '</Height>';
		$xml .= PHP_EOL . '            </Dimensions>';
		$xml .= PHP_EOL . '            <PackageWeight>';
		$xml .= PHP_EOL . '                <UnitOfMeasurement>';
		$xml .= PHP_EOL . '                    <Code>' . $this->weight['UnitOfMeasurement'] . '</Code>';
		$xml .= PHP_EOL . '                </UnitOfMeasurement>';
		$xml .= PHP_EOL . '                <Weight>' . $this->weight['Weight'] . '</Weight>';
		$xml .= PHP_EOL . '            	</PackageWeight>';
		$xml .= PHP_EOL . '        </Package>';
		$xml .= PHP_EOL . '    </Shipment>';
		$xml .= PHP_EOL . '    <LabelSpecification>';
		$xml .= PHP_EOL . '        <LabelPrintMethod>';
		$xml .= PHP_EOL . '            <Code>GIF</Code>';
		$xml .= PHP_EOL . '            <Description>GIF</Description>';
		$xml .= PHP_EOL . '        </LabelPrintMethod>';
		$xml .= PHP_EOL . '        <LabelImageFormat>';
		$xml .= PHP_EOL . '            <Code>GIF</Code>';
		$xml .= PHP_EOL . '        </LabelImageFormat>';
		$xml .= PHP_EOL . '    </LabelSpecification>';

		$xml .= PHP_EOL . '</ShipmentConfirmRequest>';

		return $xml;
	}

	/**
	 * Build rate request
	 *
	 * @return void
	 */
	protected function buildRateRequest()
	{
		$this->rateRequest .= PHP_EOL . '    <Request>';
		$this->rateRequest .= PHP_EOL . '        <TransactionReference>';
		$this->rateRequest .= PHP_EOL . '            <CustomerContext>Rating and Service</CustomerContext>';
		$this->rateRequest .= PHP_EOL . '            <XpciVersion>1.0</XpciVersion>';
		$this->rateRequest .= PHP_EOL . '        </TransactionReference>';
		$this->rateRequest .= PHP_EOL . '        <RequestAction>Rate</RequestAction>';
		$this->rateRequest .= PHP_EOL . '        <RequestOption>Shop</RequestOption>';
		$this->rateRequest .= PHP_EOL . '    </Request>';
		$this->rateRequest .= PHP_EOL . '    <PickupType>';
		$this->rateRequest .= PHP_EOL . '        <Code>' . $this->pickupType . '</Code>';
		$this->rateRequest .= PHP_EOL . '        <Description>' . self::$pickupTypes[$this->pickupType] . '</Description>';
		$this->rateRequest .= PHP_EOL . '    </PickupType>';
		$this->rateRequest .= PHP_EOL . '    <Shipment>';
		$this->rateRequest .= PHP_EOL . '        <Description>Rate</Description>';
		$this->rateRequest .= PHP_EOL . '        <Shipper>';
		$this->rateRequest .= PHP_EOL . '            <ShipperNumber>' . $this->userId . '</ShipperNumber>';
		$this->rateRequest .= PHP_EOL . '            <Address>';

		foreach ($this->shipFrom as $key => $value)
		{
			if ($key !== 'CompanyName')
			{
				if (null !== $value)
				{
					$this->rateRequest .= PHP_EOL . '                <' . $key . '>' . $value . '</' . $key . '>';
				}
				else
				{
					$this->rateRequest .= PHP_EOL . '                <' . $key . ' />';
				}
			}
		}

		$this->rateRequest .= PHP_EOL . '            </Address>';
		$this->rateRequest .= PHP_EOL . '        </Shipper>';
		$this->rateRequest .= PHP_EOL . '        <ShipTo>';

		if (null !== $this->shipTo['CompanyName'])
		{
			$this->rateRequest .= PHP_EOL . '            <CompanyName>' . $this->shipTo['CompanyName'] . '</CompanyName>';
		}

		$this->rateRequest .= PHP_EOL . '            <Address>';

		foreach ($this->shipTo as $key => $value)
		{
			if ($key !== 'CompanyName')
			{
				if (null !== $value)
				{
					$this->rateRequest .= PHP_EOL . '                <' . $key . '>' . $value . '</' . $key . '>';
				}
				else
				{
					$this->rateRequest .= PHP_EOL . '                <' . $key . ' />';
				}
			}
		}

		$this->rateRequest .= PHP_EOL . '            </Address>';
		$this->rateRequest .= PHP_EOL . '        </ShipTo>';
		$this->rateRequest .= PHP_EOL . '        <ShipFrom>';

		if (null !== $this->shipFrom['CompanyName'])
		{
			$this->rateRequest .= PHP_EOL . '            <CompanyName>' . $this->shipFrom['CompanyName'] . '</CompanyName>';
		}

		$this->rateRequest .= PHP_EOL . '            <Address>';

		foreach ($this->shipFrom as $key => $value)
		{
			if ($key !== 'CompanyName')
			{
				if (null !== $value)
				{
					$this->rateRequest .= PHP_EOL . '                <' . $key . '>' . $value . '</' . $key . '>';
				}
				else
				{
					$this->rateRequest .= PHP_EOL . '                <' . $key . ' />';
				}
			}
		}

		$this->rateRequest .= PHP_EOL . '            </Address>';
		$this->rateRequest .= PHP_EOL . '        </ShipFrom>';
		$this->rateRequest .= PHP_EOL . '        <Service>';
		$this->rateRequest .= PHP_EOL . '            <Code>' . $this->service . '</Code>';
		$this->rateRequest .= PHP_EOL . '            <Description>' . self::$services[$this->service] . '</Description>';
		$this->rateRequest .= PHP_EOL . '        </Service>';
		$this->rateRequest .= PHP_EOL . '        <Package>';
		$this->rateRequest .= PHP_EOL . '            <PackagingType>';
		$this->rateRequest .= PHP_EOL . '                <Code>' . $this->packageType . '</Code>';
		$this->rateRequest .= PHP_EOL . '                <Description>' . self::$packagingTypes[$this->packageType] . '</Description>';
		$this->rateRequest .= PHP_EOL . '            </PackagingType>';
		$this->rateRequest .= PHP_EOL . '            <Description>Rate</Description>';

		if ((null !== $this->dimensions['Length']) &&
			(null !== $this->dimensions['Width']) &&
			(null !== $this->dimensions['Height'])
		)
		{
			$this->rateRequest .= PHP_EOL . '            <Dimensions>';
			$this->rateRequest .= PHP_EOL . '                <UnitOfMeasurement>';
			$this->rateRequest .= PHP_EOL . '                    <Code>' . $this->dimensions['UnitOfMeasurement'] . '</Code>';
			$this->rateRequest .= PHP_EOL . '                </UnitOfMeasurement>';
			$this->rateRequest .= PHP_EOL . '                <Length>' . $this->dimensions['Length'] . '</Length>';
			$this->rateRequest .= PHP_EOL . '                <Width>' . $this->dimensions['Width'] . '</Width>';
			$this->rateRequest .= PHP_EOL . '                <Height>' . $this->dimensions['Height'] . '</Height>';
			$this->rateRequest .= PHP_EOL . '            </Dimensions>';
		}

		$this->rateRequest .= PHP_EOL . '            <PackageWeight>';
		$this->rateRequest .= PHP_EOL . '                <UnitOfMeasurement>';
		$this->rateRequest .= PHP_EOL . '                    <Code>' . $this->weight['UnitOfMeasurement'] . '</Code>';
		$this->rateRequest .= PHP_EOL . '                </UnitOfMeasurement>';
		$this->rateRequest .= PHP_EOL . '                <Weight>' . $this->weight['Weight'] . '</Weight>';
		$this->rateRequest .= PHP_EOL . '            </PackageWeight>';
		$this->rateRequest .= PHP_EOL . '        </Package>';

		$this->rateRequest .= PHP_EOL . '    </Shipment>';
		$this->rateRequest .= PHP_EOL . '</RatingServiceSelectionRequest>' . PHP_EOL;
	}

}
