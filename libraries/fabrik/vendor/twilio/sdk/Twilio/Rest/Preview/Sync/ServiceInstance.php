<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Sync;

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
 * @property string accountSid
 * @property string friendlyName
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 * @property string url
 * @property string webhookUrl
 * @property boolean reachabilityWebhooksEnabled
 * @property boolean aclEnabled
 * @property array links
 */
class ServiceInstance extends InstanceResource {
    protected $_documents = null;
    protected $_syncLists = null;
    protected $_syncMaps = null;

    /**
     * Initialize the ServiceInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The sid
     * @return \Twilio\Rest\Preview\Sync\ServiceInstance 
     */
    public function __construct(Version $version, array $payload, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => Values::array_get($payload, 'sid'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'url' => Values::array_get($payload, 'url'),
            'webhookUrl' => Values::array_get($payload, 'webhook_url'),
            'reachabilityWebhooksEnabled' => Values::array_get($payload, 'reachability_webhooks_enabled'),
            'aclEnabled' => Values::array_get($payload, 'acl_enabled'),
            'links' => Values::array_get($payload, 'links'),
        );

        $this->solution = array('sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\Preview\Sync\ServiceContext Context for this
     *                                                  ServiceInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new ServiceContext($this->version, $this->solution['sid']);
        }

        return $this->context;
    }

    /**
     * Fetch a ServiceInstance
     * 
     * @return ServiceInstance Fetched ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the ServiceInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Update the ServiceInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return ServiceInstance Updated ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        return $this->proxy()->update($options);
    }

    /**
     * Access the documents
     * 
     * @return \Twilio\Rest\Preview\Sync\Service\DocumentList 
     */
    protected function getDocuments() {
        return $this->proxy()->documents;
    }

    /**
     * Access the syncLists
     * 
     * @return \Twilio\Rest\Preview\Sync\Service\SyncListList 
     */
    protected function getSyncLists() {
        return $this->proxy()->syncLists;
    }

    /**
     * Access the syncMaps
     * 
     * @return \Twilio\Rest\Preview\Sync\Service\SyncMapList 
     */
    protected function getSyncMaps() {
        return $this->proxy()->syncMaps;
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
        return '[Twilio.Preview.Sync.ServiceInstance ' . implode(' ', $context) . ']';
    }
}