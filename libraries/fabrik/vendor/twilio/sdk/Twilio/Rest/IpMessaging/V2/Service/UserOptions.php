<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\IpMessaging\V2\Service;

use Twilio\Options;
use Twilio\Values;

abstract class UserOptions {
    /**
     * @param string $roleSid The unique id of the Role assigned to this user.
     * @param string $attributes An optional string used to contain any metadata or
     *                           other information for the User.
     * @param string $friendlyName An optional human readable string representing
     *                             the user.
     * @return CreateUserOptions Options builder
     */
    public static function create($roleSid = Values::NONE, $attributes = Values::NONE, $friendlyName = Values::NONE) {
        return new CreateUserOptions($roleSid, $attributes, $friendlyName);
    }

    /**
     * @param string $roleSid The unique id of the [Role][role] assigned to this
     *                        user.
     * @param string $attributes An optional string used to contain any metadata or
     *                           other information for the User.
     * @param string $friendlyName An optional human readable string representing
     *                             the user.
     * @return UpdateUserOptions Options builder
     */
    public static function update($roleSid = Values::NONE, $attributes = Values::NONE, $friendlyName = Values::NONE) {
        return new UpdateUserOptions($roleSid, $attributes, $friendlyName);
    }
}

class CreateUserOptions extends Options {
    /**
     * @param string $roleSid The unique id of the Role assigned to this user.
     * @param string $attributes An optional string used to contain any metadata or
     *                           other information for the User.
     * @param string $friendlyName An optional human readable string representing
     *                             the user.
     */
    public function __construct($roleSid = Values::NONE, $attributes = Values::NONE, $friendlyName = Values::NONE) {
        $this->options['roleSid'] = $roleSid;
        $this->options['attributes'] = $attributes;
        $this->options['friendlyName'] = $friendlyName;
    }

    /**
     * The unique id of the [Role](https://www.twilio.com/docs/api/chat/rest/roles) assigned to this user.
     * 
     * @param string $roleSid The unique id of the Role assigned to this user.
     * @return $this Fluent Builder
     */
    public function setRoleSid($roleSid) {
        $this->options['roleSid'] = $roleSid;
        return $this;
    }

    /**
     * An optional string used to contain any metadata or other information for the User.  The string must contain structurally valid JSON if specified.
     * 
     * @param string $attributes An optional string used to contain any metadata or
     *                           other information for the User.
     * @return $this Fluent Builder
     */
    public function setAttributes($attributes) {
        $this->options['attributes'] = $attributes;
        return $this;
    }

    /**
     * An optional human readable string representing the user.  Often used for display purposes.
     * 
     * @param string $friendlyName An optional human readable string representing
     *                             the user.
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
        return '[Twilio.IpMessaging.V2.CreateUserOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateUserOptions extends Options {
    /**
     * @param string $roleSid The unique id of the [Role][role] assigned to this
     *                        user.
     * @param string $attributes An optional string used to contain any metadata or
     *                           other information for the User.
     * @param string $friendlyName An optional human readable string representing
     *                             the user.
     */
    public function __construct($roleSid = Values::NONE, $attributes = Values::NONE, $friendlyName = Values::NONE) {
        $this->options['roleSid'] = $roleSid;
        $this->options['attributes'] = $attributes;
        $this->options['friendlyName'] = $friendlyName;
    }

    /**
     * The unique id of the [Role][role] assigned to this user.
     * 
     * @param string $roleSid The unique id of the [Role][role] assigned to this
     *                        user.
     * @return $this Fluent Builder
     */
    public function setRoleSid($roleSid) {
        $this->options['roleSid'] = $roleSid;
        return $this;
    }

    /**
     * An optional string used to contain any metadata or other information for the User.  The string must contain structurally valid JSON if specified.
     * 
     * @param string $attributes An optional string used to contain any metadata or
     *                           other information for the User.
     * @return $this Fluent Builder
     */
    public function setAttributes($attributes) {
        $this->options['attributes'] = $attributes;
        return $this;
    }

    /**
     * An optional human readable string representing the user.  Often used for display purposes.
     * 
     * @param string $friendlyName An optional human readable string representing
     *                             the user.
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
        return '[Twilio.IpMessaging.V2.UpdateUserOptions ' . implode(' ', $options) . ']';
    }
}