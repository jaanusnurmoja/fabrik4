<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Trunking\V1\Trunk;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $accountSid
 * @property string $apiVersion
 * @property string $authType
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $domainName
 * @property string $friendlyName
 * @property string $sid
 * @property string $url
 * @property string $voiceFallbackMethod
 * @property string $voiceFallbackUrl
 * @property string $voiceMethod
 * @property string $voiceStatusCallbackMethod
 * @property string $voiceStatusCallbackUrl
 * @property string $voiceUrl
 * @property bool $sipRegistration
 * @property string $trunkSid
 * @property array $links
 */
class TerminatingSipDomainInstance extends InstanceResource {
    /**
     * Initialize the TerminatingSipDomainInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $trunkSid The SID of the Trunk to which we should route calls
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Trunking\V1\Trunk\TerminatingSipDomainInstance
     */
    public function __construct(Version $version, array $payload, $trunkSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'apiVersion' => Values::array_get($payload, 'api_version'),
            'authType' => Values::array_get($payload, 'auth_type'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'domainName' => Values::array_get($payload, 'domain_name'),
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'sid' => Values::array_get($payload, 'sid'),
            'url' => Values::array_get($payload, 'url'),
            'voiceFallbackMethod' => Values::array_get($payload, 'voice_fallback_method'),
            'voiceFallbackUrl' => Values::array_get($payload, 'voice_fallback_url'),
            'voiceMethod' => Values::array_get($payload, 'voice_method'),
            'voiceStatusCallbackMethod' => Values::array_get($payload, 'voice_status_callback_method'),
            'voiceStatusCallbackUrl' => Values::array_get($payload, 'voice_status_callback_url'),
            'voiceUrl' => Values::array_get($payload, 'voice_url'),
            'sipRegistration' => Values::array_get($payload, 'sip_registration'),
            'trunkSid' => Values::array_get($payload, 'trunk_sid'),
            'links' => Values::array_get($payload, 'links'),
        );

        $this->solution = array('trunkSid' => $trunkSid, 'sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Trunking\V1\Trunk\TerminatingSipDomainContext Context
     *                                                                    for this
     *                                                                    TerminatingSipDomainInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new TerminatingSipDomainContext(
                $this->version,
                $this->solution['trunkSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a TerminatingSipDomainInstance
     *
     * @return TerminatingSipDomainInstance Fetched TerminatingSipDomainInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the TerminatingSipDomainInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
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
        return '[Twilio.Trunking.V1.TerminatingSipDomainInstance ' . \implode(' ', $context) . ']';
    }
}