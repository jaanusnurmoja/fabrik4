<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Trunking\V1\Trunk;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Version;

/**
 * @property string accountSid
 * @property string sid
 * @property string trunkSid
 * @property string friendlyName
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 * @property string url
 */
class IpAccessControlListInstance extends InstanceResource {
    /**
     * Initialize the IpAccessControlListInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $trunkSid The trunk_sid
     * @param string $sid The sid
     * @return \Twilio\Rest\Trunking\V1\Trunk\IpAccessControlListInstance 
     */
    public function __construct(Version $version, array $payload, $trunkSid, $sid = null) {
        parent::__construct($version);
        
        // Marshaled Properties
        $this->properties = array(
            'accountSid' => $payload['account_sid'],
            'sid' => $payload['sid'],
            'trunkSid' => $payload['trunk_sid'],
            'friendlyName' => $payload['friendly_name'],
            'dateCreated' => Deserialize::iso8601DateTime($payload['date_created']),
            'dateUpdated' => Deserialize::iso8601DateTime($payload['date_updated']),
            'url' => $payload['url'],
        );
        
        $this->solution = array(
            'trunkSid' => $trunkSid,
            'sid' => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\Trunking\V1\Trunk\IpAccessControlListContext Context
     *                                                                   for this
     *                                                                   IpAccessControlListInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new IpAccessControlListContext(
                $this->version,
                $this->solution['trunkSid'],
                $this->solution['sid']
            );
        }
        
        return $this->context;
    }

    /**
     * Fetch a IpAccessControlListInstance
     * 
     * @return IpAccessControlListInstance Fetched IpAccessControlListInstance
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the IpAccessControlListInstance
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
        return '[Twilio.Trunking.V1.IpAccessControlListInstance ' . implode(' ', $context) . ']';
    }
}