<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Sync\V1\Service;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Rest\Sync\V1\Service\SyncMap\SyncMapItemList;
use Twilio\Rest\Sync\V1\Service\SyncMap\SyncMapPermissionList;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 * 
 * @property \Twilio\Rest\Sync\V1\Service\SyncMap\SyncMapItemList syncMapItems
 * @property \Twilio\Rest\Sync\V1\Service\SyncMap\SyncMapPermissionList syncMapPermissions
 * @method \Twilio\Rest\Sync\V1\Service\SyncMap\SyncMapItemContext syncMapItems(string $key)
 * @method \Twilio\Rest\Sync\V1\Service\SyncMap\SyncMapPermissionContext syncMapPermissions(string $identity)
 */
class SyncMapContext extends InstanceContext {
    protected $_syncMapItems = null;
    protected $_syncMapPermissions = null;

    /**
     * Initialize the SyncMapContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $serviceSid The service_sid
     * @param string $sid The sid
     * @return \Twilio\Rest\Sync\V1\Service\SyncMapContext 
     */
    public function __construct(Version $version, $serviceSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'sid' => $sid, );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Maps/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a SyncMapInstance
     * 
     * @return SyncMapInstance Fetched SyncMapInstance
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new SyncMapInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the SyncMapInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Update the SyncMapInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return SyncMapInstance Updated SyncMapInstance
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array('Ttl' => $options['ttl'], ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new SyncMapInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['sid']
        );
    }

    /**
     * Access the syncMapItems
     * 
     * @return \Twilio\Rest\Sync\V1\Service\SyncMap\SyncMapItemList 
     */
    protected function getSyncMapItems() {
        if (!$this->_syncMapItems) {
            $this->_syncMapItems = new SyncMapItemList(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['sid']
            );
        }

        return $this->_syncMapItems;
    }

    /**
     * Access the syncMapPermissions
     * 
     * @return \Twilio\Rest\Sync\V1\Service\SyncMap\SyncMapPermissionList 
     */
    protected function getSyncMapPermissions() {
        if (!$this->_syncMapPermissions) {
            $this->_syncMapPermissions = new SyncMapPermissionList(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['sid']
            );
        }

        return $this->_syncMapPermissions;
    }

    /**
     * Magic getter to lazy load subresources
     * 
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws \Twilio\Exceptions\TwilioException For unknown subresources
     */
    public function __get($name) {
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown subresource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     * 
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws \Twilio\Exceptions\TwilioException For unknown resource
     */
    public function __call($name, $arguments) {
        $property = $this->$name;
        if (method_exists($property, 'getContext')) {
            return call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
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
        return '[Twilio.Sync.V1.SyncMapContext ' . implode(' ', $context) . ']';
    }
}