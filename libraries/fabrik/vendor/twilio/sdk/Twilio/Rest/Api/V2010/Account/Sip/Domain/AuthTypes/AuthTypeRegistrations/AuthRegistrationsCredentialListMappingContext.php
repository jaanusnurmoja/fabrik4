<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Sip\Domain\AuthTypes\AuthTypeRegistrations;

use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class AuthRegistrationsCredentialListMappingContext extends InstanceContext {
    /**
     * Initialize the AuthRegistrationsCredentialListMappingContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $accountSid The account_sid
     * @param string $domainSid The domain_sid
     * @param string $sid Fetch by unique credential list Sid
     * @return \Twilio\Rest\Api\V2010\Account\Sip\Domain\AuthTypes\AuthTypeRegistrations\AuthRegistrationsCredentialListMappingContext 
     */
    public function __construct(Version $version, $accountSid, $domainSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('accountSid' => $accountSid, 'domainSid' => $domainSid, 'sid' => $sid, );

        $this->uri = '/Accounts/' . rawurlencode($accountSid) . '/SIP/Domains/' . rawurlencode($domainSid) . '/Auth/Registrations/CredentialListMappings/' . rawurlencode($sid) . '.json';
    }

    /**
     * Fetch a AuthRegistrationsCredentialListMappingInstance
     * 
     * @return AuthRegistrationsCredentialListMappingInstance Fetched
     *                                                        AuthRegistrationsCredentialListMappingInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new AuthRegistrationsCredentialListMappingInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['domainSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the AuthRegistrationsCredentialListMappingInstance
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
        return '[Twilio.Api.V2010.AuthRegistrationsCredentialListMappingContext ' . implode(' ', $context) . ']';
    }
}