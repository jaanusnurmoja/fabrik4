<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Sip\Domain;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string accountSid
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 * @property string friendlyName
 * @property string sid
 * @property string uri
 * @property array subresourceUris
 */
class CredentialListMappingInstance extends InstanceResource {
    /**
     * Initialize the CredentialListMappingInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid The account_sid
     * @param string $domainSid A string that uniquely identifies the SIP Domain
     * @param string $sid The sid
     * @return \Twilio\Rest\Api\V2010\Account\Sip\Domain\CredentialListMappingInstance 
     */
    public function __construct(Version $version, array $payload, $accountSid, $domainSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'sid' => Values::array_get($payload, 'sid'),
            'uri' => Values::array_get($payload, 'uri'),
            'subresourceUris' => Values::array_get($payload, 'subresource_uris'),
        );

        $this->solution = array(
            'accountSid' => $accountSid,
            'domainSid' => $domainSid,
            'sid' => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\Api\V2010\Account\Sip\Domain\CredentialListMappingContext Context for this
     *                                                                                CredentialListMappingInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new CredentialListMappingContext(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['domainSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a CredentialListMappingInstance
     * 
     * @return CredentialListMappingInstance Fetched CredentialListMappingInstance
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the CredentialListMappingInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
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
        return '[Twilio.Api.V2010.CredentialListMappingInstance ' . implode(' ', $context) . ']';
    }
}