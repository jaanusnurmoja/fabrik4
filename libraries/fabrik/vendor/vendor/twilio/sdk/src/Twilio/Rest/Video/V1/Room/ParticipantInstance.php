<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Video\V1\Room;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $sid
 * @property string $roomSid
 * @property string $accountSid
 * @property string $status
 * @property string $identity
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property \DateTime $startTime
 * @property \DateTime $endTime
 * @property int $duration
 * @property string $url
 * @property array $links
 */
class ParticipantInstance extends InstanceResource {
    protected $_publishedTracks = null;
    protected $_subscribedTracks = null;
    protected $_subscribeRules = null;

    /**
     * Initialize the ParticipantInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $roomSid The SID of the participant's room
     * @param string $sid The SID that identifies the resource to fetch
     * @return \Twilio\Rest\Video\V1\Room\ParticipantInstance
     */
    public function __construct(Version $version, array $payload, $roomSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => Values::array_get($payload, 'sid'),
            'roomSid' => Values::array_get($payload, 'room_sid'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'status' => Values::array_get($payload, 'status'),
            'identity' => Values::array_get($payload, 'identity'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'startTime' => Deserialize::dateTime(Values::array_get($payload, 'start_time')),
            'endTime' => Deserialize::dateTime(Values::array_get($payload, 'end_time')),
            'duration' => Values::array_get($payload, 'duration'),
            'url' => Values::array_get($payload, 'url'),
            'links' => Values::array_get($payload, 'links'),
        );

        $this->solution = array('roomSid' => $roomSid, 'sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Video\V1\Room\ParticipantContext Context for this
     *                                                       ParticipantInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new ParticipantContext(
                $this->version,
                $this->solution['roomSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a ParticipantInstance
     *
     * @return ParticipantInstance Fetched ParticipantInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the ParticipantInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ParticipantInstance Updated ParticipantInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        return $this->proxy()->update($options);
    }

    /**
     * Access the publishedTracks
     *
     * @return \Twilio\Rest\Video\V1\Room\Participant\PublishedTrackList
     */
    protected function getPublishedTracks() {
        return $this->proxy()->publishedTracks;
    }

    /**
     * Access the subscribedTracks
     *
     * @return \Twilio\Rest\Video\V1\Room\Participant\SubscribedTrackList
     */
    protected function getSubscribedTracks() {
        return $this->proxy()->subscribedTracks;
    }

    /**
     * Access the subscribeRules
     *
     * @return \Twilio\Rest\Video\V1\Room\Participant\SubscribeRulesList
     */
    protected function getSubscribeRules() {
        return $this->proxy()->subscribeRules;
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
        return '[Twilio.Video.V1.ParticipantInstance ' . \implode(' ', $context) . ']';
    }
}