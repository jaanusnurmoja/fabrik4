<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Autopilot\V1\Assistant;

use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class DefaultsContext extends InstanceContext {
    /**
     * Initialize the DefaultsContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $assistantSid The assistant_sid
     * @return \Twilio\Rest\Autopilot\V1\Assistant\DefaultsContext 
     */
    public function __construct(Version $version, $assistantSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('assistantSid' => $assistantSid, );

        $this->uri = '/Assistants/' . rawurlencode($assistantSid) . '/Defaults';
    }

    /**
     * Fetch a DefaultsInstance
     * 
     * @return DefaultsInstance Fetched DefaultsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new DefaultsInstance($this->version, $payload, $this->solution['assistantSid']);
    }

    /**
     * Update the DefaultsInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return DefaultsInstance Updated DefaultsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array('Defaults' => Serialize::jsonObject($options['defaults']), ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new DefaultsInstance($this->version, $payload, $this->solution['assistantSid']);
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
        return '[Twilio.Autopilot.V1.DefaultsContext ' . implode(' ', $context) . ']';
    }
}