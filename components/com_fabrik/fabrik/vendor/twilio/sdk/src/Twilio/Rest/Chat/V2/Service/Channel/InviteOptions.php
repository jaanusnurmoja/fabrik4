<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Chat\V2\Service\Channel;

use Twilio\Options;
use Twilio\Values;

abstract class InviteOptions {
    /**
     * @param string $roleSid The Role assigned to the new member
     * @return CreateInviteOptions Options builder
     */
    public static function create($roleSid = Values::NONE) {
        return new CreateInviteOptions($roleSid);
    }

    /**
     * @param string $identity The `identity` value of the resources to read
     * @return ReadInviteOptions Options builder
     */
    public static function read($identity = Values::NONE) {
        return new ReadInviteOptions($identity);
    }
}

class CreateInviteOptions extends Options {
    /**
     * @param string $roleSid The Role assigned to the new member
     */
    public function __construct($roleSid = Values::NONE) {
        $this->options['roleSid'] = $roleSid;
    }

    /**
     * The SID of the [Role](https://www.twilio.com/docs/chat/rest/role-resource) assigned to the new member.
     *
     * @param string $roleSid The Role assigned to the new member
     * @return $this Fluent Builder
     */
    public function setRoleSid($roleSid) {
        $this->options['roleSid'] = $roleSid;
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
        return '[Twilio.Chat.V2.CreateInviteOptions ' . \implode(' ', $options) . ']';
    }
}

class ReadInviteOptions extends Options {
    /**
     * @param string $identity The `identity` value of the resources to read
     */
    public function __construct($identity = Values::NONE) {
        $this->options['identity'] = $identity;
    }

    /**
     * The [User](https://www.twilio.com/docs/chat/rest/user-resource)'s `identity` value of the resources to read. See [access tokens](https://www.twilio.com/docs/chat/create-tokens) for more details.
     *
     * @param string $identity The `identity` value of the resources to read
     * @return $this Fluent Builder
     */
    public function setIdentity($identity) {
        $this->options['identity'] = $identity;
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
        return '[Twilio.Chat.V2.ReadInviteOptions ' . \implode(' ', $options) . ']';
    }
}