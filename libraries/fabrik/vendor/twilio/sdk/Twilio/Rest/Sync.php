<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Sync\V1;

/**
 * @property \Twilio\Rest\Sync\V1 v1
 * @property \Twilio\Rest\Sync\V1\ServiceList services
 * @method \Twilio\Rest\Sync\V1\ServiceContext services(string $sid)
 */
class Sync extends Domain {
    protected $_v1 = null;

    /**
     * Construct the Sync Domain
     * 
     * @param \Twilio\Rest\Client $client Twilio\Rest\Client to communicate with
     *                                    Twilio
     * @return \Twilio\Rest\Sync Domain for Sync
     */
    public function __construct(Client $client) {
        parent::__construct($client);

        $this->baseUrl = 'https://sync.twilio.com';
    }

    /**
     * @return \Twilio\Rest\Sync\V1 Version v1 of sync
     */
    protected function getV1() {
        if (!$this->_v1) {
            $this->_v1 = new V1($this);
        }
        return $this->_v1;
    }

    /**
     * Magic getter to lazy load version
     * 
     * @param string $name Version to return
     * @return \Twilio\Version The requested version
     * @throws \Twilio\Exceptions\TwilioException For unknown versions
     */
    public function __get($name) {
        $method = 'get' . ucfirst($name);
        if (method_exists($this, $method)) {
            return $this->$method();
        }

        throw new TwilioException('Unknown version ' . $name);
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
        $method = 'context' . ucfirst($name);
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $arguments);
        }

        throw new TwilioException('Unknown context ' . $name);
    }

    /**
     * @return \Twilio\Rest\Sync\V1\ServiceList 
     */
    protected function getServices() {
        return $this->v1->services;
    }

    /**
     * @param string $sid The sid
     * @return \Twilio\Rest\Sync\V1\ServiceContext 
     */
    protected function contextServices($sid) {
        return $this->v1->services($sid);
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Sync]';
    }
}