<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Studio\V1\Flow;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Rest\Studio\V1\Flow\Engagement\StepList;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 * 
 * @property \Twilio\Rest\Studio\V1\Flow\Engagement\StepList steps
 * @method \Twilio\Rest\Studio\V1\Flow\Engagement\StepContext steps(string $sid)
 */
class EngagementContext extends InstanceContext {
    protected $_steps = null;

    /**
     * Initialize the EngagementContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $flowSid The flow_sid
     * @param string $sid The sid
     * @return \Twilio\Rest\Studio\V1\Flow\EngagementContext 
     */
    public function __construct(Version $version, $flowSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('flowSid' => $flowSid, 'sid' => $sid, );

        $this->uri = '/Flows/' . rawurlencode($flowSid) . '/Engagements/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a EngagementInstance
     * 
     * @return EngagementInstance Fetched EngagementInstance
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new EngagementInstance(
            $this->version,
            $payload,
            $this->solution['flowSid'],
            $this->solution['sid']
        );
    }

    /**
     * Access the steps
     * 
     * @return \Twilio\Rest\Studio\V1\Flow\Engagement\StepList 
     */
    protected function getSteps() {
        if (!$this->_steps) {
            $this->_steps = new StepList($this->version, $this->solution['flowSid'], $this->solution['sid']);
        }

        return $this->_steps;
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
        return '[Twilio.Studio.V1.EngagementContext ' . implode(' ', $context) . ']';
    }
}