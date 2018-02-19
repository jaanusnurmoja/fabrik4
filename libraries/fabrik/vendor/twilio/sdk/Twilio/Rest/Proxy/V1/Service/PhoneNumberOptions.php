<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Proxy\V1\Service;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
abstract class PhoneNumberOptions {
    /**
     * @param string $sid A string that uniquely identifies this Phone Number.
     * @param string $phoneNumber The phone_number
     * @return CreatePhoneNumberOptions Options builder
     */
    public static function create($sid = Values::NONE, $phoneNumber = Values::NONE) {
        return new CreatePhoneNumberOptions($sid, $phoneNumber);
    }
}

class CreatePhoneNumberOptions extends Options {
    /**
     * @param string $sid A string that uniquely identifies this Phone Number.
     * @param string $phoneNumber The phone_number
     */
    public function __construct($sid = Values::NONE, $phoneNumber = Values::NONE) {
        $this->options['sid'] = $sid;
        $this->options['phoneNumber'] = $phoneNumber;
    }

    /**
     * A 34 character string that uniquely identifies this Phone Number.
     * 
     * @param string $sid A string that uniquely identifies this Phone Number.
     * @return $this Fluent Builder
     */
    public function setSid($sid) {
        $this->options['sid'] = $sid;
        return $this;
    }

    /**
     * The phone_number
     * 
     * @param string $phoneNumber The phone_number
     * @return $this Fluent Builder
     */
    public function setPhoneNumber($phoneNumber) {
        $this->options['phoneNumber'] = $phoneNumber;
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
        return '[Twilio.Proxy.V1.CreatePhoneNumberOptions ' . implode(' ', $options) . ']';
    }
}