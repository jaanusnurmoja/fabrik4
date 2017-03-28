<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class AuthorizedConnectAppContext extends InstanceContext {
    /**
     * Initialize the AuthorizedConnectAppContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $accountSid The account_sid
     * @param string $connectAppSid The connect_app_sid
     * @return \Twilio\Rest\Api\V2010\Account\AuthorizedConnectAppContext 
     */
    public function __construct(Version $version, $accountSid, $connectAppSid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'accountSid' => $accountSid,
            'connectAppSid' => $connectAppSid,
        );
        
        $this->uri = '/Accounts/' . rawurlencode($accountSid) . '/AuthorizedConnectApps/' . rawurlencode($connectAppSid) . '.json';
    }

    /**
     * Fetch a AuthorizedConnectAppInstance
     * 
     * @return AuthorizedConnectAppInstance Fetched AuthorizedConnectAppInstance
     */
    public function fetch() {
        $params = Values::of(array());
        
        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );
        
        return new AuthorizedConnectAppInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['connectAppSid']
        );
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
        return '[Twilio.Api.V2010.AuthorizedConnectAppContext ' . implode(' ', $context) . ']';
    }
}