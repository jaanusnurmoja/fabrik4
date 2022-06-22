<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Messaging;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Messaging\V1\ServiceList;
use Twilio\Rest\Messaging\V1\SessionList;
use Twilio\Rest\Messaging\V1\WebhookList;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Messaging\V1\ServiceList $services
 * @property \Twilio\Rest\Messaging\V1\SessionList $sessions
 * @property \Twilio\Rest\Messaging\V1\WebhookList $webhooks
 * @method \Twilio\Rest\Messaging\V1\ServiceContext services(string $sid)
 * @method \Twilio\Rest\Messaging\V1\SessionContext sessions(string $sid)
 */
class V1 extends Version {
    protected $_services = null;
    protected $_sessions = null;
    protected $_webhooks = null;

    /**
     * Construct the V1 version of Messaging
     *
     * @param \Twilio\Domain $domain Domain that contains the version
     * @return \Twilio\Rest\Messaging\V1 V1 version of Messaging
     */
    public function __construct(Domain $domain) {
        parent::__construct($domain);
        $this->version = 'v1';
    }

    /**
     * @return \Twilio\Rest\Messaging\V1\ServiceList
     */
    protected function getServices() {
        if (!$this->_services) {
            $this->_services = new ServiceList($this);
        }
        return $this->_services;
    }

    /**
     * @return \Twilio\Rest\Messaging\V1\SessionList
     */
    protected function getSessions() {
        if (!$this->_sessions) {
            $this->_sessions = new SessionList($this);
        }
        return $this->_sessions;
    }

    /**
     * @return \Twilio\Rest\Messaging\V1\WebhookList
     */
    protected function getWebhooks() {
        if (!$this->_webhooks) {
            $this->_webhooks = new WebhookList($this);
        }
        return $this->_webhooks;
    }

    /**
     * Magic getter to lazy load root resources
     *
     * @param string $name Resource to return
     * @return \Twilio\ListResource The requested resource
     * @throws TwilioException For unknown resource
     */
    public function __get($name) {
        $method = 'get' . \ucfirst($name);
        if (\method_exists($this, $method)) {
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
     * @throws TwilioException For unknown resource
     */
    public function __call($name, $arguments) {
        $property = $this->$name;
        if (\method_exists($property, 'getContext')) {
            return \call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Messaging.V1]';
    }
}