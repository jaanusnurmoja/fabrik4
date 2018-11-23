<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Chat\V2\Service\User;

use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class UserBindingContext extends InstanceContext {
    /**
     * Initialize the UserBindingContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $serviceSid The service_sid
     * @param string $userSid The user_sid
     * @param string $sid The sid
     * @return \Twilio\Rest\Chat\V2\Service\User\UserBindingContext 
     */
    public function __construct(Version $version, $serviceSid, $userSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'userSid' => $userSid, 'sid' => $sid, );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Users/' . rawurlencode($userSid) . '/Bindings/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a UserBindingInstance
     * 
     * @return UserBindingInstance Fetched UserBindingInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new UserBindingInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['userSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the UserBindingInstance
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
        return '[Twilio.Chat.V2.UserBindingContext ' . implode(' ', $context) . ']';
    }
}