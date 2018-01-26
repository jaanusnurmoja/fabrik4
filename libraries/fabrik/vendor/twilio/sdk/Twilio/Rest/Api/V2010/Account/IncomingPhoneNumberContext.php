<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Rest\Api\V2010\Account\IncomingPhoneNumber\AssignedAddOnList;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Api\V2010\Account\IncomingPhoneNumber\AssignedAddOnList assignedAddOns
 * @method \Twilio\Rest\Api\V2010\Account\IncomingPhoneNumber\AssignedAddOnContext assignedAddOns(string $sid)
 */
class IncomingPhoneNumberContext extends InstanceContext {
    protected $_assignedAddOns = null;

    /**
     * Initialize the IncomingPhoneNumberContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $accountSid The account_sid
     * @param string $sid Fetch by unique incoming-phone-number Sid
     * @return \Twilio\Rest\Api\V2010\Account\IncomingPhoneNumberContext 
     */
    public function __construct(Version $version, $accountSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('accountSid' => $accountSid, 'sid' => $sid, );

        $this->uri = '/Accounts/' . rawurlencode($accountSid) . '/IncomingPhoneNumbers/' . rawurlencode($sid) . '.json';
    }

    /**
     * Update the IncomingPhoneNumberInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return IncomingPhoneNumberInstance Updated IncomingPhoneNumberInstance
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'AccountSid' => $options['accountSid'],
            'ApiVersion' => $options['apiVersion'],
            'FriendlyName' => $options['friendlyName'],
            'SmsApplicationSid' => $options['smsApplicationSid'],
            'SmsFallbackMethod' => $options['smsFallbackMethod'],
            'SmsFallbackUrl' => $options['smsFallbackUrl'],
            'SmsMethod' => $options['smsMethod'],
            'SmsUrl' => $options['smsUrl'],
            'StatusCallback' => $options['statusCallback'],
            'StatusCallbackMethod' => $options['statusCallbackMethod'],
            'VoiceApplicationSid' => $options['voiceApplicationSid'],
            'VoiceCallerIdLookup' => Serialize::booleanToString($options['voiceCallerIdLookup']),
            'VoiceFallbackMethod' => $options['voiceFallbackMethod'],
            'VoiceFallbackUrl' => $options['voiceFallbackUrl'],
            'VoiceMethod' => $options['voiceMethod'],
            'VoiceUrl' => $options['voiceUrl'],
            'EmergencyStatus' => $options['emergencyStatus'],
            'EmergencyAddressSid' => $options['emergencyAddressSid'],
            'TrunkSid' => $options['trunkSid'],
            'VoiceReceiveMode' => $options['voiceReceiveMode'],
            'IdentitySid' => $options['identitySid'],
            'AddressSid' => $options['addressSid'],
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new IncomingPhoneNumberInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['sid']
        );
    }

    /**
     * Fetch a IncomingPhoneNumberInstance
     * 
     * @return IncomingPhoneNumberInstance Fetched IncomingPhoneNumberInstance
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new IncomingPhoneNumberInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the IncomingPhoneNumberInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Access the assignedAddOns
     * 
     * @return \Twilio\Rest\Api\V2010\Account\IncomingPhoneNumber\AssignedAddOnList 
     */
    protected function getAssignedAddOns() {
        if (!$this->_assignedAddOns) {
            $this->_assignedAddOns = new AssignedAddOnList(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['sid']
            );
        }

        return $this->_assignedAddOns;
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
        return '[Twilio.Api.V2010.IncomingPhoneNumberContext ' . implode(' ', $context) . ']';
    }
}