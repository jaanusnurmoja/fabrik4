<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Preview\Proxy\ServiceList;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Preview\Proxy\ServiceList services
 * @method \Twilio\Rest\Preview\Proxy\ServiceContext services(string $sid)
 */
class Proxy extends Version {
    protected $_services = null;

    /**
     * Construct the Proxy version of Preview
     * 
     * @param \Twilio\Domain $domain Domain that contains the version
     * @return \Twilio\Rest\Preview\Proxy Proxy version of Preview
     */
    public function __construct(Domain $domain) {
        parent::__construct($domain);
        $this->version = 'Proxy';
    }

    /**
     * @return \Twilio\Rest\Preview\Proxy\ServiceList 
     */
    protected function getServices() {
        if (!$this->_services) {
            $this->_services = new ServiceList($this);
        }
        return $this->_services;
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
        return '[Twilio.Preview.Proxy]';
    }
}