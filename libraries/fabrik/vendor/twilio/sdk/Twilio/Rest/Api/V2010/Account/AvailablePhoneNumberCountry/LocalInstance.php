<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Version;

/**
 * @property string friendlyName
 * @property string phoneNumber
 * @property string lata
 * @property string rateCenter
 * @property string latitude
 * @property string longitude
 * @property string region
 * @property string postalCode
 * @property string isoCountry
 * @property string addressRequirements
 * @property string beta
 * @property string capabilities
 */
class LocalInstance extends InstanceResource {
    /**
     * Initialize the LocalInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid A 34 character string that uniquely identifies
     *                           this resource.
     * @param string $countryCode The country_code
     * @return \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\LocalInstance 
     */
    public function __construct(Version $version, array $payload, $accountSid, $countryCode) {
        parent::__construct($version);
        
        // Marshaled Properties
        $this->properties = array(
            'friendlyName' => $payload['friendly_name'],
            'phoneNumber' => $payload['phone_number'],
            'lata' => $payload['lata'],
            'rateCenter' => $payload['rate_center'],
            'latitude' => $payload['latitude'],
            'longitude' => $payload['longitude'],
            'region' => $payload['region'],
            'postalCode' => $payload['postal_code'],
            'isoCountry' => $payload['iso_country'],
            'addressRequirements' => $payload['address_requirements'],
            'beta' => $payload['beta'],
            'capabilities' => $payload['capabilities'],
        );
        
        $this->solution = array(
            'accountSid' => $accountSid,
            'countryCode' => $countryCode,
        );
    }

    /**
     * Magic getter to access properties
     * 
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }
        
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }
        
        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Api.V2010.LocalInstance]';
    }
}