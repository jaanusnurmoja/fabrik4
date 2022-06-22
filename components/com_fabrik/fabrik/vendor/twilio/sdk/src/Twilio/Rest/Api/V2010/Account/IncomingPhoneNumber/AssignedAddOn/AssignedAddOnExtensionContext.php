<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\IncomingPhoneNumber\AssignedAddOn;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class AssignedAddOnExtensionContext extends InstanceContext {
    /**
     * Initialize the AssignedAddOnExtensionContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $accountSid The SID of the Account that created the resource
     *                           to fetch
     * @param string $resourceSid The SID of the Phone Number to which the Add-on
     *                            is assigned
     * @param string $assignedAddOnSid The SID that uniquely identifies the
     *                                 assigned Add-on installation
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Api\V2010\Account\IncomingPhoneNumber\AssignedAddOn\AssignedAddOnExtensionContext
     */
    public function __construct(Version $version, $accountSid, $resourceSid, $assignedAddOnSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array(
            'accountSid' => $accountSid,
            'resourceSid' => $resourceSid,
            'assignedAddOnSid' => $assignedAddOnSid,
            'sid' => $sid,
        );

        $this->uri = '/Accounts/' . \rawurlencode($accountSid) . '/IncomingPhoneNumbers/' . \rawurlencode($resourceSid) . '/AssignedAddOns/' . \rawurlencode($assignedAddOnSid) . '/Extensions/' . \rawurlencode($sid) . '.json';
    }

    /**
     * Fetch a AssignedAddOnExtensionInstance
     *
     * @return AssignedAddOnExtensionInstance Fetched AssignedAddOnExtensionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new AssignedAddOnExtensionInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['resourceSid'],
            $this->solution['assignedAddOnSid'],
            $this->solution['sid']
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
        return '[Twilio.Api.V2010.AssignedAddOnExtensionContext ' . \implode(' ', $context) . ']';
    }
}