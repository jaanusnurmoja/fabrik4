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
     * @param string $friendlyName The friendly_name
     * @param integer $callDelay The call_delay
     * @param string $extension The extension
     * @param string $statusCallback The status_callback
     * @param string $statusCallbackMethod The status_callback_method
     * @return CreateValidationRequestOptions Options builder
     */
    public static function create($friendlyName = Values::NONE, $callDelay = Values::NONE, $extension = Values::NONE, $statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE) {
        return new CreateValidationRequestOptions($friendlyName, $callDelay, $extension, $statusCallback, $statusCallbackMethod);
    }
}

class CreateValidationRequestOptions extends Options {
    /**
     * @param string $friendlyName The friendly_name
     * @param integer $callDelay The call_delay
     * @param string $extension The extension
     * @param string $statusCallback The status_callback
     * @param string $statusCallbackMethod The status_callback_method
     */
    public function __construct($friendlyName = Values::NONE, $callDelay = Values::NONE, $extension = Values::NONE, $statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['callDelay'] = $callDelay;
        $this->options['extension'] = $extension;
        $this->options['statusCallback'] = $statusCallback;
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
    }

    /**
     * The friendly_name
     * 
     * @param string $friendlyName The friendly_name
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The call_delay
     * 
     * @param integer $callDelay The call_delay
     * @return $this Fluent Builder
     */
    public function setCallDelay($callDelay) {
        $this->options['callDelay'] = $callDelay;
        return $this;
    }

    /**
     * The extension
     * 
     * @param string $extension The extension
     * @return $this Fluent Builder
     */
    public function setExtension($extension) {
        $this->options['extension'] = $extension;
        return $this;
    }

    /**
     * The status_callback
     * 
     * @param string $statusCallback The status_callback
     * @return $this Fluent Builder
     */
    public function setStatusCallback($statusCallback) {
        $this->options['statusCallback'] = $statusCallback;
        return $this;
    }

    /**
     * The status_callback_method
     * 
     * @param string $statusCallbackMethod The status_callback_method
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