<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Sip;

use Twilio\Options;
use Twilio\Values;

abstract class DomainOptions {
    /**
     * @param string $friendlyName A user-specified, human-readable name for the
     *                             trigger.
     * @param string $authType The types of authentication mapped to the domain
     * @param string $voiceUrl URL Twilio will request when receiving a call
     * @param string $voiceMethod HTTP method to use with voice_url
     * @param string $voiceFallbackUrl URL Twilio will request if an error occurs
     *                                 in executing TwiML
     * @param string $voiceFallbackMethod HTTP method used with voice_fallback_url
     * @param string $voiceStatusCallbackUrl URL that Twilio will request with
     *                                       status updates
     * @param string $voiceStatusCallbackMethod The HTTP method Twilio will use to
     *                                          make requests to the StatusCallback
     *                                          URL.
     * @param boolean $sipRegistration The sip_registration
     * @return CreateDomainOptions Options builder
     */
    public static function create($friendlyName = Values::NONE, $authType = Values::NONE, $voiceUrl = Values::NONE, $voiceMethod = Values::NONE, $voiceFallbackUrl = Values::NONE, $voiceFallbackMethod = Values::NONE, $voiceStatusCallbackUrl = Values::NONE, $voiceStatusCallbackMethod = Values::NONE, $sipRegistration = Values::NONE) {
        return new CreateDomainOptions($friendlyName, $authType, $voiceUrl, $voiceMethod, $voiceFallbackUrl, $voiceFallbackMethod, $voiceStatusCallbackUrl, $voiceStatusCallbackMethod, $sipRegistration);
    }

    /**
     * @param string $authType The auth_type
     * @param string $friendlyName A user-specified, human-readable name for the
     *                             trigger.
     * @param string $voiceFallbackMethod The voice_fallback_method
     * @param string $voiceFallbackUrl The voice_fallback_url
     * @param string $voiceMethod HTTP method to use with voice_url
     * @param string $voiceStatusCallbackMethod The voice_status_callback_method
     * @param string $voiceStatusCallbackUrl The voice_status_callback_url
     * @param string $voiceUrl The voice_url
     * @param boolean $sipRegistration The sip_registration
     * @return UpdateDomainOptions Options builder
     */
    public static function update($authType = Values::NONE, $friendlyName = Values::NONE, $voiceFallbackMethod = Values::NONE, $voiceFallbackUrl = Values::NONE, $voiceMethod = Values::NONE, $voiceStatusCallbackMethod = Values::NONE, $voiceStatusCallbackUrl = Values::NONE, $voiceUrl = Values::NONE, $sipRegistration = Values::NONE) {
        return new UpdateDomainOptions($authType, $friendlyName, $voiceFallbackMethod, $voiceFallbackUrl, $voiceMethod, $voiceStatusCallbackMethod, $voiceStatusCallbackUrl, $voiceUrl, $sipRegistration);
    }
}

class CreateDomainOptions extends Options {
    /**
     * @param string $friendlyName A user-specified, human-readable name for the
     *                             trigger.
     * @param string $authType The types of authentication mapped to the domain
     * @param string $voiceUrl URL Twilio will request when receiving a call
     * @param string $voiceMethod HTTP method to use with voice_url
     * @param string $voiceFallbackUrl URL Twilio will request if an error occurs
     *                                 in executing TwiML
     * @param string $voiceFallbackMethod HTTP method used with voice_fallback_url
     * @param string $voiceStatusCallbackUrl URL that Twilio will request with
     *                                       status updates
     * @param string $voiceStatusCallbackMethod The HTTP method Twilio will use to
     *                                          make requests to the StatusCallback
     *                                          URL.
     * @param boolean $sipRegistration The sip_registration
     */
    public function __construct($friendlyName = Values::NONE, $authType = Values::NONE, $voiceUrl = Values::NONE, $voiceMethod = Values::NONE, $voiceFallbackUrl = Values::NONE, $voiceFallbackMethod = Values::NONE, $voiceStatusCallbackUrl = Values::NONE, $voiceStatusCallbackMethod = Values::NONE, $sipRegistration = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['authType'] = $authType;
        $this->options['voiceUrl'] = $voiceUrl;
        $this->options['voiceMethod'] = $voiceMethod;
        $this->options['voiceFallbackUrl'] = $voiceFallbackUrl;
        $this->options['voiceFallbackMethod'] = $voiceFallbackMethod;
        $this->options['voiceStatusCallbackUrl'] = $voiceStatusCallbackUrl;
        $this->options['voiceStatusCallbackMethod'] = $voiceStatusCallbackMethod;
        $this->options['sipRegistration'] = $sipRegistration;
    }

    /**
     * A human readable descriptive text, up to 64 characters long.
     * 
     * @param string $friendlyName A user-specified, human-readable name for the
     *                             trigger.
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The types of authentication you have mapped to your domain
     * 
     * @param string $authType The types of authentication mapped to the domain
     * @return $this Fluent Builder
     */
    public function setAuthType($authType) {
        $this->options['authType'] = $authType;
        return $this;
    }

    /**
     * The URL Twilio will request when this domain receives a call.
     * 
     * @param string $voiceUrl URL Twilio will request when receiving a call
     * @return $this Fluent Builder
     */
    public function setVoiceUrl($voiceUrl) {
        $this->options['voiceUrl'] = $voiceUrl;
        return $this;
    }

    /**
     * The HTTP method Twilio will use when requesting the above Url. Either `GET` or `POST`.
     * 
     * @param string $voiceMethod HTTP method to use with voice_url
     * @return $this Fluent Builder
     */
    public function setVoiceMethod($voiceMethod) {
        $this->options['voiceMethod'] = $voiceMethod;
        return $this;
    }

    /**
     * The URL that Twilio will request if an error occurs retrieving or executing the TwiML requested by VoiceUrl.
     * 
     * @param string $voiceFallbackUrl URL Twilio will request if an error occurs
     *                                 in executing TwiML
     * @return $this Fluent Builder
     */
    public function setVoiceFallbackUrl($voiceFallbackUrl) {
        $this->options['voiceFallbackUrl'] = $voiceFallbackUrl;
        return $this;
    }

    /**
     * The HTTP method Twilio will use when requesting the VoiceFallbackUrl. Either `GET` or `POST`.
     * 
     * @param string $voiceFallbackMethod HTTP method used with voice_fallback_url
     * @return $this Fluent Builder
     */
    public function setVoiceFallbackMethod($voiceFallbackMethod) {
        $this->options['voiceFallbackMethod'] = $voiceFallbackMethod;
        return $this;
    }

    /**
     * The URL that Twilio will request to pass status parameters (such as call ended) to your application.
     * 
     * @param string $voiceStatusCallbackUrl URL that Twilio will request with
     *                                       status updates
     * @return $this Fluent Builder
     */
    public function setVoiceStatusCallbackUrl($voiceStatusCallbackUrl) {
        $this->options['voiceStatusCallbackUrl'] = $voiceStatusCallbackUrl;
        return $this;
    }

    /**
     * The HTTP method Twilio will use to make requests to the StatusCallback URL. Either `GET` or `POST`.
     * 
     * @param string $voiceStatusCallbackMethod The HTTP method Twilio will use to
     *                                          make requests to the StatusCallback
     *                                          URL.
     * @return $this Fluent Builder
     */
    public function setVoiceStatusCallbackMethod($voiceStatusCallbackMethod) {
        $this->options['voiceStatusCallbackMethod'] = $voiceStatusCallbackMethod;
        return $this;
    }

    /**
     * The sip_registration
     * 
     * @param boolean $sipRegistration The sip_registration
     * @return $this Fluent Builder
     */
    public function setSipRegistration($sipRegistration) {
        $this->options['sipRegistration'] = $sipRegistration;
        return $this;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Api.V2010.CreateDomainOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateDomainOptions extends Options {
    /**
     * @param string $authType The auth_type
     * @param string $friendlyName A user-specified, human-readable name for the
     *                             trigger.
     * @param string $voiceFallbackMethod The voice_fallback_method
     * @param string $voiceFallbackUrl The voice_fallback_url
     * @param string $voiceMethod HTTP method to use with voice_url
     * @param string $voiceStatusCallbackMethod The voice_status_callback_method
     * @param string $voiceStatusCallbackUrl The voice_status_callback_url
     * @param string $voiceUrl The voice_url
     * @param boolean $sipRegistration The sip_registration
     */
    public function __construct($authType = Values::NONE, $friendlyName = Values::NONE, $voiceFallbackMethod = Values::NONE, $voiceFallbackUrl = Values::NONE, $voiceMethod = Values::NONE, $voiceStatusCallbackMethod = Values::NONE, $voiceStatusCallbackUrl = Values::NONE, $voiceUrl = Values::NONE, $sipRegistration = Values::NONE) {
        $this->options['authType'] = $authType;
        $this->options['friendlyName'] = $friendlyName;
        $this->options['voiceFallbackMethod'] = $voiceFallbackMethod;
        $this->options['voiceFallbackUrl'] = $voiceFallbackUrl;
        $this->options['voiceMethod'] = $voiceMethod;
        $this->options['voiceStatusCallbackMethod'] = $voiceStatusCallbackMethod;
        $this->options['voiceStatusCallbackUrl'] = $voiceStatusCallbackUrl;
        $this->options['voiceUrl'] = $voiceUrl;
        $this->options['sipRegistration'] = $sipRegistration;
    }

    /**
     * The auth_type
     * 
     * @param string $authType The auth_type
     * @return $this Fluent Builder
     */
    public function setAuthType($authType) {
        $this->options['authType'] = $authType;
        return $this;
    }

    /**
     * A user-specified, human-readable name for the trigger.
     * 
     * @param string $friendlyName A user-specified, human-readable name for the
     *                             trigger.
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The voice_fallback_method
     * 
     * @param string $voiceFallbackMethod The voice_fallback_method
     * @return $this Fluent Builder
     */
    public function setVoiceFallbackMethod($voiceFallbackMethod) {
        $this->options['voiceFallbackMethod'] = $voiceFallbackMethod;
        return $this;
    }

    /**
     * The voice_fallback_url
     * 
     * @param string $voiceFallbackUrl The voice_fallback_url
     * @return $this Fluent Builder
     */
    public function setVoiceFallbackUrl($voiceFallbackUrl) {
        $this->options['voiceFallbackUrl'] = $voiceFallbackUrl;
        return $this;
    }

    /**
     * The HTTP method to use with the voice_url
     * 
     * @param string $voiceMethod HTTP method to use with voice_url
     * @return $this Fluent Builder
     */
    public function setVoiceMethod($voiceMethod) {
        $this->options['voiceMethod'] = $voiceMethod;
        return $this;
    }

    /**
     * The voice_status_callback_method
     * 
     * @param string $voiceStatusCallbackMethod The voice_status_callback_method
     * @return $this Fluent Builder
     */
    public function setVoiceStatusCallbackMethod($voiceStatusCallbackMethod) {
        $this->options['voiceStatusCallbackMethod'] = $voiceStatusCallbackMethod;
        return $this;
    }

    /**
     * The voice_status_callback_url
     * 
     * @param string $voiceStatusCallbackUrl The voice_status_callback_url
     * @return $this Fluent Builder
     */
    public function setVoiceStatusCallbackUrl($voiceStatusCallbackUrl) {
        $this->options['voiceStatusCallbackUrl'] = $voiceStatusCallbackUrl;
        return $this;
    }

    /**
     * The voice_url
     * 
     * @param string $voiceUrl The voice_url
     * @return $this Fluent Builder
     */
    public function setVoiceUrl($voiceUrl) {
        $this->options['voiceUrl'] = $voiceUrl;
        return $this;
    }

    /**
     * The sip_registration
     * 
     * @param boolean $sipRegistration The sip_registration
     * @return $this Fluent Builder
     */
    public function setSipRegistration($sipRegistration) {
        $this->options['sipRegistration'] = $sipRegistration;
        return $this;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Api.V2010.UpdateDomainOptions ' . implode(' ', $options) . ']';
    }
}