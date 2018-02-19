<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Accounts\V1\Credential;

use Twilio\Options;
use Twilio\Values;

abstract class AwsOptions {
    /**
     * @param string $friendlyName The friendly_name
     * @param string $accountSid The account_sid
     * @return CreateAwsOptions Options builder
     */
    public static function create($friendlyName = Values::NONE, $accountSid = Values::NONE) {
        return new CreateAwsOptions($friendlyName, $accountSid);
    }

    /**
     * @param string $friendlyName The friendly_name
     * @return UpdateAwsOptions Options builder
     */
    public static function update($friendlyName = Values::NONE) {
        return new UpdateAwsOptions($friendlyName);
    }
}

class CreateAwsOptions extends Options {
    /**
     * @param string $friendlyName The friendly_name
     * @param string $accountSid The account_sid
     */
    public function __construct($friendlyName = Values::NONE, $accountSid = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['accountSid'] = $accountSid;
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
     * The account_sid
     * 
     * @param string $accountSid The account_sid
     * @return $this Fluent Builder
     */
    public function setAccountSid($accountSid) {
        $this->options['accountSid'] = $accountSid;
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
        return '[Twilio.Accounts.V1.CreateAwsOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateAwsOptions extends Options {
    /**
     * @param string $friendlyName The friendly_name
     */
    public function __construct($friendlyName = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
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
        return '[Twilio.Accounts.V1.UpdateAwsOptions ' . implode(' ', $options) . ']';
    }
}