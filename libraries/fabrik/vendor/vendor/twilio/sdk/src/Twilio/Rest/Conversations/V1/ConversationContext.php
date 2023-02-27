<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Conversations\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Rest\Conversations\V1\Conversation\MessageList;
use Twilio\Rest\Conversations\V1\Conversation\ParticipantList;
use Twilio\Rest\Conversations\V1\Conversation\WebhookList;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 *
 * @property \Twilio\Rest\Conversations\V1\Conversation\ParticipantList $participants
 * @property \Twilio\Rest\Conversations\V1\Conversation\MessageList $messages
 * @property \Twilio\Rest\Conversations\V1\Conversation\WebhookList $webhooks
 * @method \Twilio\Rest\Conversations\V1\Conversation\ParticipantContext participants(string $sid)
 * @method \Twilio\Rest\Conversations\V1\Conversation\MessageContext messages(string $sid)
 * @method \Twilio\Rest\Conversations\V1\Conversation\WebhookContext webhooks(string $sid)
 */
class ConversationContext extends InstanceContext {
    protected $_participants = null;
    protected $_messages = null;
    protected $_webhooks = null;

    /**
     * Initialize the ConversationContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $sid A 34 character string that uniquely identifies this
     *                    resource.
     * @return \Twilio\Rest\Conversations\V1\ConversationContext
     */
    public function __construct(Version $version, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('sid' => $sid, );

        $this->uri = '/Conversations/' . \rawurlencode($sid) . '';
    }

    /**
     * Update the ConversationInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ConversationInstance Updated ConversationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'FriendlyName' => $options['friendlyName'],
            'DateCreated' => Serialize::iso8601DateTime($options['dateCreated']),
            'DateUpdated' => Serialize::iso8601DateTime($options['dateUpdated']),
            'Attributes' => $options['attributes'],
            'MessagingServiceSid' => $options['messagingServiceSid'],
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new ConversationInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Deletes the ConversationInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Fetch a ConversationInstance
     *
     * @return ConversationInstance Fetched ConversationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new ConversationInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Access the participants
     *
     * @return \Twilio\Rest\Conversations\V1\Conversation\ParticipantList
     */
    protected function getParticipants() {
        if (!$this->_participants) {
            $this->_participants = new ParticipantList($this->version, $this->solution['sid']);
        }

        return $this->_participants;
    }

    /**
     * Access the messages
     *
     * @return \Twilio\Rest\Conversations\V1\Conversation\MessageList
     */
    protected function getMessages() {
        if (!$this->_messages) {
            $this->_messages = new MessageList($this->version, $this->solution['sid']);
        }

        return $this->_messages;
    }

    /**
     * Access the webhooks
     *
     * @return \Twilio\Rest\Conversations\V1\Conversation\WebhookList
     */
    protected function getWebhooks() {
        if (!$this->_webhooks) {
            $this->_webhooks = new WebhookList($this->version, $this->solution['sid']);
        }

        return $this->_webhooks;
    }

    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get($name) {
        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown subresource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call($name, $arguments) {
        $property = $this->$name;
        if (\method_exists($property, 'getContext')) {
            return \call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
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
        return '[Twilio.Conversations.V1.ConversationContext ' . \implode(' ', $context) . ']';
    }
}