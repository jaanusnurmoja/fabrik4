<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Usage;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string accountSid
 * @property string apiVersion
 * @property string callbackMethod
 * @property string callbackUrl
 * @property string currentValue
 * @property \DateTime dateCreated
 * @property \DateTime dateFired
 * @property \DateTime dateUpdated
 * @property string friendlyName
 * @property string recurring
 * @property string sid
 * @property string triggerBy
 * @property string triggerValue
 * @property string uri
 * @property string usageCategory
 * @property string usageRecordUri
 */
class TriggerInstance extends InstanceResource {
    /**
     * Initialize the TriggerInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid A 34 character string that uniquely identifies
     *                           this resource.
     * @param string $sid Fetch by unique usage-trigger Sid
     * @return \Twilio\Rest\Api\V2010\Account\Usage\TriggerInstance 
     */
    public function __construct(Version $version, array $payload, $accountSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'apiVersion' => Values::array_get($payload, 'api_version'),
            'callbackMethod' => Values::array_get($payload, 'callback_method'),
            'callbackUrl' => Values::array_get($payload, 'callback_url'),
            'currentValue' => Values::array_get($payload, 'current_value'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateFired' => Deserialize::dateTime(Values::array_get($payload, 'date_fired')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'recurring' => Values::array_get($payload, 'recurring'),
            'sid' => Values::array_get($payload, 'sid'),
            'triggerBy' => Values::array_get($payload, 'trigger_by'),
            'triggerValue' => Values::array_get($payload, 'trigger_value'),
            'uri' => Values::array_get($payload, 'uri'),
            'usageCategory' => Values::array_get($payload, 'usage_category'),
            'usageRecordUri' => Values::array_get($payload, 'usage_record_uri'),
        );

        $this->solution = array('accountSid' => $accountSid, 'sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\Api\V2010\Account\Usage\TriggerContext Context for this
     *                                                             TriggerInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new TriggerContext(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a TriggerInstance
     * 
     * @return TriggerInstance Fetched TriggerInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the TriggerInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return TriggerInstance Updated TriggerInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        return $this->proxy()->update($options);
    }

    /**
     * Deletes the TriggerInstance
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
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Api.V2010.TriggerInstance ' . implode(' ', $context) . ']';
    }
}