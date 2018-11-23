<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Video\V1;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 * 
 * @property string accountSid
 * @property string status
 * @property \DateTime dateCreated
 * @property string dateCompleted
 * @property string dateDeleted
 * @property string sid
 * @property string roomSid
 * @property string audioSources
 * @property string audioSourcesExcluded
 * @property array videoLayout
 * @property string resolution
 * @property boolean trim
 * @property string format
 * @property integer bitrate
 * @property string size
 * @property integer duration
 * @property string url
 * @property array links
 */
class CompositionInstance extends InstanceResource {
    /**
     * Initialize the CompositionInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The Composition Sid that uniquely identifies the
     *                    Composition to fetch.
     * @return \Twilio\Rest\Video\V1\CompositionInstance 
     */
    public function __construct(Version $version, array $payload, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'status' => Values::array_get($payload, 'status'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateCompleted' => Values::array_get($payload, 'date_completed'),
            'dateDeleted' => Values::array_get($payload, 'date_deleted'),
            'sid' => Values::array_get($payload, 'sid'),
            'roomSid' => Values::array_get($payload, 'room_sid'),
            'audioSources' => Values::array_get($payload, 'audio_sources'),
            'audioSourcesExcluded' => Values::array_get($payload, 'audio_sources_excluded'),
            'videoLayout' => Values::array_get($payload, 'video_layout'),
            'resolution' => Values::array_get($payload, 'resolution'),
            'trim' => Values::array_get($payload, 'trim'),
            'format' => Values::array_get($payload, 'format'),
            'bitrate' => Values::array_get($payload, 'bitrate'),
            'size' => Values::array_get($payload, 'size'),
            'duration' => Values::array_get($payload, 'duration'),
            'url' => Values::array_get($payload, 'url'),
            'links' => Values::array_get($payload, 'links'),
        );

        $this->solution = array('sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\Video\V1\CompositionContext Context for this
     *                                                  CompositionInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new CompositionContext($this->version, $this->solution['sid']);
        }

        return $this->context;
    }

    /**
     * Fetch a CompositionInstance
     * 
     * @return CompositionInstance Fetched CompositionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the CompositionInstance
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
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
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
        return '[Twilio.Video.V1.CompositionInstance ' . implode(' ', $context) . ']';
    }
}