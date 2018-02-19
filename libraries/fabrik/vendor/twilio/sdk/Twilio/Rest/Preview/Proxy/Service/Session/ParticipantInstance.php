<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Proxy\Service\Session;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 * 
 * @property string sid
 * @property string sessionSid
 * @property string serviceSid
 * @property string accountSid
 * @property string friendlyName
 * @property string participantType
 * @property string identifier
 * @property string proxyIdentifier
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 * @property string url
 * @property array links
 */
class ParticipantInstance extends InstanceResource {
    protected $_messageInteractions = null;

    /**
     * Initialize the ParticipantInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid Service Sid.
     * @param string $sessionSid Session Sid.
     * @param string $sid A string that uniquely identifies this Participant.
     * @return \Twilio\Rest\Preview\Proxy\Service\Session\ParticipantInstance 
     */
    public function __construct(Version $version, array $payload, $serviceSid, $sessionSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => Values::array_get($payload, 'sid'),
            'sessionSid' => Values::array_get($payload, 'session_sid'),
            'serviceSid' => Values::array_get($payload, 'service_sid'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'participantType' => Values::array_get($payload, 'participant_type'),
            'identifier' => Values::array_get($payload, 'identifier'),
            'proxyIdentifier' => Values::array_get($payload, 'proxy_identifier'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'url' => Values::array_get($payload, 'url'),
            'links' => Values::array_get($payload, 'links'),
        );

        $this->solution = array(
            'serviceSid' => $serviceSid,
            'sessionSid' => $sessionSid,
            'sid' => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\Preview\Proxy\Service\Session\ParticipantContext Context for this ParticipantInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new ParticipantContext(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['sessionSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a ParticipantInstance
     * 
     * @return ParticipantInstance Fetched ParticipantInstance
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the ParticipantInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Update the ParticipantInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return ParticipantInstance Updated ParticipantInstance
     */
    public function update($options = array()) {
        return $this->proxy()->update($options);
    }

    /**
     * Access the messageInteractions
     * 
     * @return \Twilio\Rest\Preview\Proxy\Service\Session\Participant\MessageInteractionList 
     */
    protected function getMessageInteractions() {
        return $this->proxy()->messageInteractions;
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
        return '[Twilio.Preview.Proxy.ParticipantInstance ' . implode(' ', $context) . ']';
    }
}