<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Wireless\V1;

use Twilio\Options;
use Twilio\Values;

abstract class SimOptions {
    /**
     * @param string $status Only return Sims with this status.
     * @param string $iccid Return Sims with this Iccid.
     * @param string $ratePlan Only return Sims with this Rate Plan.
     * @param string $eId Only return Sims with this EID.
     * @param string $simRegistrationCode Only return Sims with this registration
     *                                    code.
     * @return ReadSimOptions Options builder
     */
    public static function read($status = Values::NONE, $iccid = Values::NONE, $ratePlan = Values::NONE, $eId = Values::NONE, $simRegistrationCode = Values::NONE) {
        return new ReadSimOptions($status, $iccid, $ratePlan, $eId, $simRegistrationCode);
    }

    /**
     * @param string $uniqueName A user-provided string that uniquely identifies
     *                           this resource as an alternative to the Sid.
     * @param string $callbackMethod The HTTP method Twilio will use when making a
     *                               request to the callback URL.
     * @param string $callbackUrl Twilio will make a request to this URL when the
     *                            Sim has finished updating.
     * @param string $friendlyName A user-provided string that identifies this
     *                             resource.
     * @param string $ratePlan The Sid or UniqueName of the RatePlan that this Sim
     *                         should use.
     * @param string $status A string representing the status of the Sim.
     * @param string $commandsCallbackMethod A string representing the HTTP method
     *                                       to use when making a request to
     *                                       CommandsCallbackUrl.
     * @param string $commandsCallbackUrl The URL that will receive a webhook when
     *                                    this Sim originates a Command.
     * @param string $smsFallbackMethod The HTTP method Twilio will use when
     *                                  requesting the sms_fallback_url.
     * @param string $smsFallbackUrl The URL that Twilio will request if an error
     *                               occurs retrieving or executing the TwiML
     *                               requested by sms_url.
     * @param string $smsMethod The HTTP method Twilio will use when requesting the
     *                          above Url.
     * @param string $smsUrl The URL Twilio will request when the SIM-connected
     *                       device sends an SMS message that is not a Command.
     * @param string $voiceFallbackMethod The HTTP method Twilio will use when
     *                                    requesting the voice_fallback_url.
     * @param string $voiceFallbackUrl The URL that Twilio will request if an error
     *                                 occurs retrieving or executing the TwiML
     *                                 requested by voice_url.
     * @param string $voiceMethod The HTTP method Twilio will use when requesting
     *                            the above Url.
     * @param string $voiceUrl The URL Twilio will request when the SIM-connected
     *                         device makes a call.
     * @return UpdateSimOptions Options builder
     */
    public static function update($uniqueName = Values::NONE, $callbackMethod = Values::NONE, $callbackUrl = Values::NONE, $friendlyName = Values::NONE, $ratePlan = Values::NONE, $status = Values::NONE, $commandsCallbackMethod = Values::NONE, $commandsCallbackUrl = Values::NONE, $smsFallbackMethod = Values::NONE, $smsFallbackUrl = Values::NONE, $smsMethod = Values::NONE, $smsUrl = Values::NONE, $voiceFallbackMethod = Values::NONE, $voiceFallbackUrl = Values::NONE, $voiceMethod = Values::NONE, $voiceUrl = Values::NONE) {
        return new UpdateSimOptions($uniqueName, $callbackMethod, $callbackUrl, $friendlyName, $ratePlan, $status, $commandsCallbackMethod, $commandsCallbackUrl, $smsFallbackMethod, $smsFallbackUrl, $smsMethod, $smsUrl, $voiceFallbackMethod, $voiceFallbackUrl, $voiceMethod, $voiceUrl);
    }
}

class ReadSimOptions extends Options {
    /**
     * @param string $status Only return Sims with this status.
     * @param string $iccid Return Sims with this Iccid.
     * @param string $ratePlan Only return Sims with this Rate Plan.
     * @param string $eId Only return Sims with this EID.
     * @param string $simRegistrationCode Only return Sims with this registration
     *                                    code.
     */
    public function __construct($status = Values::NONE, $iccid = Values::NONE, $ratePlan = Values::NONE, $eId = Values::NONE, $simRegistrationCode = Values::NONE) {
        $this->options['status'] = $status;
        $this->options['iccid'] = $iccid;
        $this->options['ratePlan'] = $ratePlan;
        $this->options['eId'] = $eId;
        $this->options['simRegistrationCode'] = $simRegistrationCode;
    }

    /**
     * Only return Sims with this status.
     * 
     * @param string $status Only return Sims with this status.
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * Return Sims with this Iccid. Currently this should be a list with maximum size 1.
     * 
     * @param string $iccid Return Sims with this Iccid.
     * @return $this Fluent Builder
     */
    public function setIccid($iccid) {
        $this->options['iccid'] = $iccid;
        return $this;
    }

    /**
     * Only return Sims with this Rate Plan.
     * 
     * @param string $ratePlan Only return Sims with this Rate Plan.
     * @return $this Fluent Builder
     */
    public function setRatePlan($ratePlan) {
        $this->options['ratePlan'] = $ratePlan;
        return $this;
    }

    /**
     * Only return Sims with this EID.
     * 
     * @param string $eId Only return Sims with this EID.
     * @return $this Fluent Builder
     */
    public function setEId($eId) {
        $this->options['eId'] = $eId;
        return $this;
    }

    /**
     * Only return Sims with this registration code.
     * 
     * @param string $simRegistrationCode Only return Sims with this registration
     *                                    code.
     * @return $this Fluent Builder
     */
    public function setSimRegistrationCode($simRegistrationCode) {
        $this->options['simRegistrationCode'] = $simRegistrationCode;
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
        return '[Twilio.Wireless.V1.ReadSimOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateSimOptions extends Options {
    /**
     * @param string $uniqueName A user-provided string that uniquely identifies
     *                           this resource as an alternative to the Sid.
     * @param string $callbackMethod The HTTP method Twilio will use when making a
     *                               request to the callback URL.
     * @param string $callbackUrl Twilio will make a request to this URL when the
     *                            Sim has finished updating.
     * @param string $friendlyName A user-provided string that identifies this
     *                             resource.
     * @param string $ratePlan The Sid or UniqueName of the RatePlan that this Sim
     *                         should use.
     * @param string $status A string representing the status of the Sim.
     * @param string $commandsCallbackMethod A string representing the HTTP method
     *                                       to use when making a request to
     *                                       CommandsCallbackUrl.
     * @param string $commandsCallbackUrl The URL that will receive a webhook when
     *                                    this Sim originates a Command.
     * @param string $smsFallbackMethod The HTTP method Twilio will use when
     *                                  requesting the sms_fallback_url.
     * @param string $smsFallbackUrl The URL that Twilio will request if an error
     *                               occurs retrieving or executing the TwiML
     *                               requested by sms_url.
     * @param string $smsMethod The HTTP method Twilio will use when requesting the
     *                          above Url.
     * @param string $smsUrl The URL Twilio will request when the SIM-connected
     *                       device sends an SMS message that is not a Command.
     * @param string $voiceFallbackMethod The HTTP method Twilio will use when
     *                                    requesting the voice_fallback_url.
     * @param string $voiceFallbackUrl The URL that Twilio will request if an error
     *                                 occurs retrieving or executing the TwiML
     *                                 requested by voice_url.
     * @param string $voiceMethod The HTTP method Twilio will use when requesting
     *                            the above Url.
     * @param string $voiceUrl The URL Twilio will request when the SIM-connected
     *                         device makes a call.
     */
    public function __construct($uniqueName = Values::NONE, $callbackMethod = Values::NONE, $callbackUrl = Values::NONE, $friendlyName = Values::NONE, $ratePlan = Values::NONE, $status = Values::NONE, $commandsCallbackMethod = Values::NONE, $commandsCallbackUrl = Values::NONE, $smsFallbackMethod = Values::NONE, $smsFallbackUrl = Values::NONE, $smsMethod = Values::NONE, $smsUrl = Values::NONE, $voiceFallbackMethod = Values::NONE, $voiceFallbackUrl = Values::NONE, $voiceMethod = Values::NONE, $voiceUrl = Values::NONE) {
        $this->options['uniqueName'] = $uniqueName;
        $this->options['callbackMethod'] = $callbackMethod;
        $this->options['callbackUrl'] = $callbackUrl;
        $this->options['friendlyName'] = $friendlyName;
        $this->options['ratePlan'] = $ratePlan;
        $this->options['status'] = $status;
        $this->options['commandsCallbackMethod'] = $commandsCallbackMethod;
        $this->options['commandsCallbackUrl'] = $commandsCallbackUrl;
        $this->options['smsFallbackMethod'] = $smsFallbackMethod;
        $this->options['smsFallbackUrl'] = $smsFallbackUrl;
        $this->options['smsMethod'] = $smsMethod;
        $this->options['smsUrl'] = $smsUrl;
        $this->options['voiceFallbackMethod'] = $voiceFallbackMethod;
        $this->options['voiceFallbackUrl'] = $voiceFallbackUrl;
        $this->options['voiceMethod'] = $voiceMethod;
        $this->options['voiceUrl'] = $voiceUrl;
    }

    /**
     * A user-provided string that uniquely identifies this resource as an alternative to the `Sid`.
     * 
     * @param string $uniqueName A user-provided string that uniquely identifies
     *                           this resource as an alternative to the Sid.
     * @return $this Fluent Builder
     */
    public function setUniqueName($uniqueName) {
        $this->options['uniqueName'] = $uniqueName;
        return $this;
    }

    /**
     * The HTTP method Twilio will use when making a request to the callback URL (valid options are GET or POST). Defaults to POST.
     * 
     * @param string $callbackMethod The HTTP method Twilio will use when making a
     *                               request to the callback URL.
     * @return $this Fluent Builder
     */
    public function setCallbackMethod($callbackMethod) {
        $this->options['callbackMethod'] = $callbackMethod;
        return $this;
    }

    /**
     * Twilio will make a request to this URL when the Sim has finished updating. In the case of a transition from the Sim's `new` status to its `ready` status, or from any status to its `deactivated` status, you will receive two callbacks. One when the Sim moves to its intermediary status (`ready` or `deactivated`), and a second when it transitions to its final status (`active` or `canceled`).
     * 
     * @param string $callbackUrl Twilio will make a request to this URL when the
     *                            Sim has finished updating.
     * @return $this Fluent Builder
     */
    public function setCallbackUrl($callbackUrl) {
        $this->options['callbackUrl'] = $callbackUrl;
        return $this;
    }

    /**
     * A user-provided string that identifies this resource. Non-unique.
     * 
     * @param string $friendlyName A user-provided string that identifies this
     *                             resource.
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The Sid or UniqueName of the [RatePlan](https://www.twilio.com/docs/api/wireless/rest-api/rate-plan) that this Sim should use. *Note:* the RatePlan of a Sim can only be modified when the Sim has a `suspended` or `deactivated` status.
     * 
     * @param string $ratePlan The Sid or UniqueName of the RatePlan that this Sim
     *                         should use.
     * @return $this Fluent Builder
     */
    public function setRatePlan($ratePlan) {
        $this->options['ratePlan'] = $ratePlan;
        return $this;
    }

    /**
     * A string representing the status of the Sim. Valid options depend on the current state of the Sim, but may include `ready`, `active`, `suspended` or `deactivated`.
     * 
     * @param string $status A string representing the status of the Sim.
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * A string representing the HTTP method to use when making a request to `CommandsCallbackUrl`.  Can be one of `POST` or `GET`. Defaults to `POST`.
     * 
     * @param string $commandsCallbackMethod A string representing the HTTP method
     *                                       to use when making a request to
     *                                       CommandsCallbackUrl.
     * @return $this Fluent Builder
     */
    public function setCommandsCallbackMethod($commandsCallbackMethod) {
        $this->options['commandsCallbackMethod'] = $commandsCallbackMethod;
        return $this;
    }

    /**
     * The URL that will receive a webhook when this Sim originates a [Command](https://www.twilio.com/docs/api/wireless/rest-api/command). Your server should respond with an HTTP status code in the 200 range; any response body will be ignored.
     * 
     * @param string $commandsCallbackUrl The URL that will receive a webhook when
     *                                    this Sim originates a Command.
     * @return $this Fluent Builder
     */
    public function setCommandsCallbackUrl($commandsCallbackUrl) {
        $this->options['commandsCallbackUrl'] = $commandsCallbackUrl;
        return $this;
    }

    /**
     * The HTTP method Twilio will use when requesting the sms_fallback_url. Either `GET` or `POST`.
     * 
     * @param string $smsFallbackMethod The HTTP method Twilio will use when
     *                                  requesting the sms_fallback_url.
     * @return $this Fluent Builder
     */
    public function setSmsFallbackMethod($smsFallbackMethod) {
        $this->options['smsFallbackMethod'] = $smsFallbackMethod;
        return $this;
    }

    /**
     * The URL that Twilio will request if an error occurs retrieving or executing the TwiML requested by `sms_url`.
     * 
     * @param string $smsFallbackUrl The URL that Twilio will request if an error
     *                               occurs retrieving or executing the TwiML
     *                               requested by sms_url.
     * @return $this Fluent Builder
     */
    public function setSmsFallbackUrl($smsFallbackUrl) {
        $this->options['smsFallbackUrl'] = $smsFallbackUrl;
        return $this;
    }

    /**
     * The HTTP method Twilio will use when requesting the above Url. Either `GET` or `POST`.
     * 
     * @param string $smsMethod The HTTP method Twilio will use when requesting the
     *                          above Url.
     * @return $this Fluent Builder
     */
    public function setSmsMethod($smsMethod) {
        $this->options['smsMethod'] = $smsMethod;
        return $this;
    }

    /**
     * The URL Twilio will request when the SIM-connected device sends an SMS message that is not a [Command](https://www.twilio.com/docs/api/wireless/rest-api/command).
     * 
     * @param string $smsUrl The URL Twilio will request when the SIM-connected
     *                       device sends an SMS message that is not a Command.
     * @return $this Fluent Builder
     */
    public function setSmsUrl($smsUrl) {
        $this->options['smsUrl'] = $smsUrl;
        return $this;
    }

    /**
     * The HTTP method Twilio will use when requesting the voice_fallback_url. Either `GET` or `POST`.
     * 
     * @param string $voiceFallbackMethod The HTTP method Twilio will use when
     *                                    requesting the voice_fallback_url.
     * @return $this Fluent Builder
     */
    public function setVoiceFallbackMethod($voiceFallbackMethod) {
        $this->options['voiceFallbackMethod'] = $voiceFallbackMethod;
        return $this;
    }

    /**
     * The URL that Twilio will request if an error occurs retrieving or executing the TwiML requested by `voice_url`.
     * 
     * @param string $voiceFallbackUrl The URL that Twilio will request if an error
     *                                 occurs retrieving or executing the TwiML
     *                                 requested by voice_url.
     * @return $this Fluent Builder
     */
    public function setVoiceFallbackUrl($voiceFallbackUrl) {
        $this->options['voiceFallbackUrl'] = $voiceFallbackUrl;
        return $this;
    }

    /**
     * The HTTP method Twilio will use when requesting the above Url. Either `GET` or `POST`.
     * 
     * @param string $voiceMethod The HTTP method Twilio will use when requesting
     *                            the above Url.
     * @return $this Fluent Builder
     */
    public function setVoiceMethod($voiceMethod) {
        $this->options['voiceMethod'] = $voiceMethod;
        return $this;
    }

    /**
     * The URL Twilio will request when the SIM-connected device makes a call.
     * 
     * @param string $voiceUrl The URL Twilio will request when the SIM-connected
     *                         device makes a call.
     * @return $this Fluent Builder
     */
    public function setVoiceUrl($voiceUrl) {
        $this->options['voiceUrl'] = $voiceUrl;
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
        return '[Twilio.Wireless.V1.UpdateSimOptions ' . implode(' ', $options) . ']';
    }
}