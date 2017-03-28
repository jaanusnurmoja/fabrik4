<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\IpMessaging\V1\Service;

use Twilio\Options;
use Twilio\Values;

abstract class UserOptions {
    /**
     * @param string $roleSid The role_sid
     * @param string $attributes The attributes
     * @param string $friendlyName The friendly_name
     * @return CreateUserOptions Options builder
     */
    public static function create($roleSid = Values::NONE, $attributes = Values::NONE, $friendlyName = Values::NONE) {
        return new CreateUserOptions($roleSid, $attributes, $friendlyName);
    }

    /**
     * @param string $roleSid The role_sid
     * @param string $attributes The attributes
     * @param string $friendlyName The friendly_name
     * @return UpdateUserOptions Options builder
     */
    public static function update($roleSid = Values::NONE, $attributes = Values::NONE, $friendlyName = Values::NONE) {
        return new UpdateUserOptions($roleSid, $attributes, $friendlyName);
    }
}

class CreateUserOptions extends Options {
    /**
     * @param string $roleSid The role_sid
     * @param string $attributes The attributes
     * @param string $friendlyName The friendly_name
     */
    public function __construct($roleSid = Values::NONE, $attributes = Values::NONE, $friendlyName = Values::NONE) {
        $this->options['roleSid'] = $roleSid;
        $this->options['attributes'] = $attributes;
        $this->options['friendlyName'] = $friendlyName;
    }

    /**
     * The role_sid
     * 
     * @param string $roleSid The role_sid
     * @return $this Fluent Builder
     */
    public function setRoleSid($roleSid) {
        $this->options['roleSid'] = $roleSid;
        return $this;
    }

    /**
     * The attributes
     * 
     * @param string $attributes The attributes
     * @return $this Fluent Builder
     */
    public function setAttributes($attributes) {
        $this->options['attributes'] = $attributes;
        return $this;
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
        return '[Twilio.IpMessaging.V1.CreateUserOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateUserOptions extends Options {
    /**
     * @param string $roleSid The role_sid
     * @param string $attributes The attributes
     * @param string $friendlyName The friendly_name
     */
    public function __construct($roleSid = Values::NONE, $attributes = Values::NONE, $friendlyName = Values::NONE) {
        $this->options['roleSid'] = $roleSid;
        $this->options['attributes'] = $attributes;
        $this->options['friendlyName'] = $friendlyName;
    }

    /**
     * The role_sid
     * 
     * @param string $roleSid The role_sid
     * @return $this Fluent Builder
     */
    public function setRoleSid($roleSid) {
        $this->options['roleSid'] = $roleSid;
        return $this;
    }

    /**
     * The attributes
     * 
     * @param string $attributes The attributes
     * @return $this Fluent Builder
     */
    public function setAttributes($attributes) {
        $this->options['attributes'] = $attributes;
        return $this;
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
        return '[Twilio.IpMessaging.V1.UpdateUserOptions ' . implode(' ', $options) . ']';
    }
}