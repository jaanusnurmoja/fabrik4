<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Options;
use Twilio\Values;

abstract class ValidationRequestOptions {
    /**
     * @param string $friendlyName A human readable description for the new caller
     *                             ID with maximum length 64 characters.
     * @param integer $callDelay The number of seconds, between 0 and 60, to delay
     *                           before initiating the verification call.
     * @param string $extension Digits to dial after connecting the verification
     *                          call.
     * @param string $statusCallback A URL that Twilio will request when the
     *                               verification call ends to notify your app if
     *                               the verification process was successful or not.
     * @param string $statusCallbackMethod The HTTP method Twilio should use when
     *                                     requesting the above URL.
     * @return CreateValidationRequestOptions Options builder
     */
    public static function create($friendlyName = Values::NONE, $callDelay = Values::NONE, $extension = Values::NONE, $statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE) {
        return new CreateValidationRequestOptions($friendlyName, $callDelay, $extension, $statusCallback, $statusCallbackMethod);
    }
}

class CreateValidationRequestOptions extends Options {
    /**
     * @param string $friendlyName A human readable description for the new caller
     *                             ID with maximum length 64 characters.
     * @param integer $callDelay The number of seconds, between 0 and 60, to delay
     *                           before initiating the verification call.
     * @param string $extension Digits to dial after connecting the verification
     *                          call.
     * @param string $statusCallback A URL that Twilio will request when the
     *                               verification call ends to notify your app if
     *                               the verification process was successful or not.
     * @param string $statusCallbackMethod The HTTP method Twilio should use when
     *                                     requesting the above URL.
     */
    public function __construct($friendlyName = Values::NONE, $callDelay = Values::NONE, $extension = Values::NONE, $statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['callDelay'] = $callDelay;
        $this->options['extension'] = $extension;
        $this->options['statusCallback'] = $statusCallback;
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
    }

    /**
     * A human readable description for the new caller ID with maximum length 64 characters. Defaults to a nicely formatted version of the number.
     * 
     * @param string $friendlyName A human readable description for the new caller
     *                             ID with maximum length 64 characters.
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The number of seconds, between 0 and 60, to delay before initiating the verification call. Defaults to 0.
     * 
     * @param integer $callDelay The number of seconds, between 0 and 60, to delay
     *                           before initiating the verification call.
     * @return $this Fluent Builder
     */
    public function setCallDelay($callDelay) {
        $this->options['callDelay'] = $callDelay;
        return $this;
    }

    /**
     * Digits to dial after connecting the verification call.
     * 
     * @param string $extension Digits to dial after connecting the verification
     *                          call.
     * @return $this Fluent Builder
     */
    public function setExtension($extension) {
        $this->options['extension'] = $extension;
        return $this;
    }

    /**
     * A URL that Twilio will request when the verification call ends to notify your app if the verification process was successful or not. See [StatusCallback parameter](https://www.twilio.com/docs/api/voice/outgoing-caller-ids#statuscallback-parameter) below.
     * 
     * @param string $statusCallback A URL that Twilio will request when the
     *                               verification call ends to notify your app if
     *                               the verification process was successful or not.
     * @return $this Fluent Builder
     */
    public function setStatusCallback($statusCallback) {
        $this->options['statusCallback'] = $statusCallback;
        return $this;
    }

    /**
     * The HTTP method Twilio should use when requesting the above URL. Defaults to POST.
     * 
     * @param string $statusCallbackMethod The HTTP method Twilio should use when
     *                                     requesting the above URL.
     * @return $this Fluent Builder
     */
    public function setStatusCallbackMethod($statusCallbackMethod) {
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
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
        return '[Twilio.Api.V2010.CreateValidationRequestOptions ' . implode(' ', $options) . ']';
    }
}