<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Call;

use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class NotificationContext extends InstanceContext {
    /**
     * Initialize the NotificationContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $accountSid The account_sid
     * @param string $callSid The call_sid
     * @param string $sid The sid
     * @return \Twilio\Rest\Api\V2010\Account\Call\NotificationContext 
     */
    public function __construct(Version $version, $accountSid, $callSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('accountSid' => $accountSid, 'callSid' => $callSid, 'sid' => $sid, );

        $this->uri = '/Accounts/' . rawurlencode($accountSid) . '/Calls/' . rawurlencode($callSid) . '/Notifications/' . rawurlencode($sid) . '.json';
    }

    /**
     * Fetch a NotificationInstance
     * 
     * @return NotificationInstance Fetched NotificationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new NotificationInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['callSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the NotificationInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
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
        return '[Twilio.Api.V2010.NotificationContext ' . implode(' ', $context) . ']';
    }
}