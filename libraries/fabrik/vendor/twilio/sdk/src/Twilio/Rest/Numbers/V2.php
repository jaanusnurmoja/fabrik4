<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Numbers;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Numbers\V2\RegulatoryComplianceList;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Numbers\V2\RegulatoryComplianceList $regulatoryCompliance
 */
class V2 extends Version {
    protected $_regulatoryCompliance = null;

    /**
     * Construct the V2 version of Numbers
     *
     * @param \Twilio\Domain $domain Domain that contains the version
     * @return \Twilio\Rest\Numbers\V2 V2 version of Numbers
     */
    public function __construct(Domain $domain) {
        parent::__construct($domain);
        $this->version = 'v2';
    }

    /**
     * @return \Twilio\Rest\Numbers\V2\RegulatoryComplianceList
     */
    protected function getRegulatoryCompliance() {
        if (!$this->_regulatoryCompliance) {
            $this->_regulatoryCompliance = new RegulatoryComplianceList($this);
        }
        return $this->_regulatoryCompliance;
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
        return '[Twilio.Numbers.V2]';
    }
}