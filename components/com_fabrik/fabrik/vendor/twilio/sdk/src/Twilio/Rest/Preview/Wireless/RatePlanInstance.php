<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Wireless;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $sid
 * @property string $uniqueName
 * @property string $accountSid
 * @property string $friendlyName
 * @property bool $dataEnabled
 * @property string $dataMetering
 * @property int $dataLimit
 * @property bool $messagingEnabled
 * @property bool $voiceEnabled
 * @property bool $nationalRoamingEnabled
 * @property string $internationalRoaming
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $url
 */
class RatePlanInstance extends InstanceResource {
    /**
     * Initialize the RatePlanInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The sid
     * @return \Twilio\Rest\Preview\Wireless\RatePlanInstance
     */
    public function __construct(Version $version, array $payload, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => Values::array_get($payload, 'sid'),
            'uniqueName' => Values::array_get($payload, 'unique_name'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'dataEnabled' => Values::array_get($payload, 'data_enabled'),
            'dataMetering' => Values::array_get($payload, 'data_metering'),
            'dataLimit' => Values::array_get($payload, 'data_limit'),
            'messagingEnabled' => Values::array_get($payload, 'messaging_enabled'),
            'voiceEnabled' => Values::array_get($payload, 'voice_enabled'),
            'nationalRoamingEnabled' => Values::array_get($payload, 'national_roaming_enabled'),
            'internationalRoaming' => Values::array_get($payload, 'international_roaming'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array('sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Preview\Wireless\RatePlanContext Context for this
     *                                                       RatePlanInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new RatePlanContext($this->version, $this->solution['sid']);
        }

        return $this->context;
    }

    /**
     * Fetch a RatePlanInstance
     *
     * @return RatePlanInstance Fetched RatePlanInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the RatePlanInstance
     *
     * @param array|Options $options Optional Arguments
     * @return RatePlanInstance Updated RatePlanInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        return $this->proxy()->update($options);
    }

    /**
     * Deletes the RatePlanInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
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
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Preview.Wireless.RatePlanInstance ' . \implode(' ', $context) . ']';
    }
}