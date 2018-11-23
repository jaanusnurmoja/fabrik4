<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Authy;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Authy\V1\FormList;
use Twilio\Rest\Authy\V1\ServiceList;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Authy\V1\ServiceList services
 * @property \Twilio\Rest\Authy\V1\FormList forms
 * @method \Twilio\Rest\Authy\V1\ServiceContext services(string $sid)
 * @method \Twilio\Rest\Authy\V1\FormContext forms(string $formType)
 */
class V1 extends Version {
    protected $_services = null;
    protected $_forms = null;

    /**
     * Construct the V1 version of Authy
     * 
     * @param \Twilio\Domain $domain Domain that contains the version
     * @return \Twilio\Rest\Authy\V1 V1 version of Authy
     */
    public function __construct(Domain $domain) {
        parent::__construct($domain);
        $this->version = 'v1';
    }

    /**
     * @return \Twilio\Rest\Authy\V1\ServiceList 
     */
    protected function getServices() {
        if (!$this->_services) {
            $this->_services = new ServiceList($this);
        }
        return $this->_services;
    }

    /**
     * @return \Twilio\Rest\Authy\V1\FormList 
     */
    protected function getForms() {
        if (!$this->_forms) {
            $this->_forms = new FormList($this);
        }
        return $this->_forms;
    }

    /**
     * Magic getter to lazy load root resources
     * 
     * @param string $name Resource to return
     * @return \Twilio\ListResource The requested resource
     * @throws \Twilio\Exceptions\TwilioException For unknown resource
     */
    public function __get($name) {
        $method = 'get' . ucfirst($name);
        if (method_exists($this, $method)) {
            return $this->$method();
        }

        throw new TwilioException('Unknown resource ' . $name);
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
        return '[Twilio.Authy.V1]';
    }
}