<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Proxy\V1\Service\Session;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Rest\Proxy\V1\Service\Session\Participant\MessageInteractionList;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 * 
 * @property \Twilio\Rest\Proxy\V1\Service\Session\Participant\MessageInteractionList messageInteractions
 * @method \Twilio\Rest\Proxy\V1\Service\Session\Participant\MessageInteractionContext messageInteractions(string $sid)
 */
class ParticipantContext extends InstanceContext {
    protected $_messageInteractions = null;

    /**
     * Initialize the ParticipantContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $serviceSid Service Sid.
     * @param string $sessionSid Session Sid.
     * @param string $sid A string that uniquely identifies this Participant.
     * @return \Twilio\Rest\Proxy\V1\Service\Session\ParticipantContext 
     */
    public function __construct(Version $version, $serviceSid, $sessionSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'sessionSid' => $sessionSid, 'sid' => $sid, );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Sessions/' . rawurlencode($sessionSid) . '/Participants/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a ParticipantInstance
     * 
     * @return ParticipantInstance Fetched ParticipantInstance
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new ParticipantInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['sessionSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the ParticipantInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Update the ParticipantInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return ParticipantInstance Updated ParticipantInstance
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'Identifier' => $options['identifier'],
            'FriendlyName' => $options['friendlyName'],
            'ProxyIdentifier' => $options['proxyIdentifier'],
            'ProxyIdentifierSid' => $options['proxyIdentifierSid'],
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new ParticipantInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['sessionSid'],
            $this->solution['sid']
        );
    }

    /**
     * Access the messageInteractions
     * 
     * @return \Twilio\Rest\Proxy\V1\Service\Session\Participant\MessageInteractionList 
     */
    protected function getMessageInteractions() {
        if (!$this->_messageInteractions) {
            $this->_messageInteractions = new MessageInteractionList(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['sessionSid'],
                $this->solution['sid']
            );
        }

        return $this->_messageInteractions;
    }

    /**
     * Magic getter to lazy load subresources
     * 
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws \Twilio\Exceptions\TwilioException For unknown subresources
     */
    public function __get($name) {
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
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
     * @throws \Twilio\Exceptions\TwilioException For unknown resource
     */
    public function __call($name, $arguments) {
        $property = $this->$name;
        if (method_exists($property, 'getContext')) {
            return call_user_func_array(array($property, 'getContext'), $arguments);
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
        return '[Twilio.Proxy.V1.ParticipantContext ' . implode(' ', $context) . ']';
    }
}