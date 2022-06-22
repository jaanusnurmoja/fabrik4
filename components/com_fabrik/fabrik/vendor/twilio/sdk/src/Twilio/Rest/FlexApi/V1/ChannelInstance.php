<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\FlexApi\V1;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $accountSid
 * @property string $flexFlowSid
 * @property string $sid
 * @property string $userSid
 * @property string $taskSid
 * @property string $url
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 */
class ChannelInstance extends InstanceResource {
    /**
     * Initialize the ChannelInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The SID that identifies the Flex chat channel resource to
     *                    fetch
     * @return \Twilio\Rest\FlexApi\V1\ChannelInstance
     */
    public function __construct(Version $version, array $payload, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'flexFlowSid' => Values::array_get($payload, 'flex_flow_sid'),
            'sid' => Values::array_get($payload, 'sid'),
            'userSid' => Values::array_get($payload, 'user_sid'),
            'taskSid' => Values::array_get($payload, 'task_sid'),
            'url' => Values::array_get($payload, 'url'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
        );

        $this->solution = array('sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\FlexApi\V1\ChannelContext Context for this
     *                                                ChannelInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new ChannelContext($this->version, $this->solution['sid']);
        }

        return $this->context;
    }

    /**
     * Fetch a ChannelInstance
     *
     * @return ChannelInstance Fetched ChannelInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the ChannelInstance
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
        return '[Twilio.FlexApi.V1.ChannelInstance ' . \implode(' ', $context) . ']';
    }
}