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
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 * 
 * @property string accountSid
 * @property string friendlyName
 * @property boolean enabled
 * @property \DateTime dateCreated
 * @property string dateUpdated
 * @property string sid
 * @property string audioSources
 * @property string audioSourcesExcluded
 * @property array videoLayout
 * @property string resolution
 * @property boolean trim
 * @property string format
 * @property string statusCallback
 * @property string statusCallbackMethod
 * @property string url
 */
class CompositionHookInstance extends InstanceResource {
    /**
     * Initialize the CompositionHookInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The Composition Hook Sid that uniquely identifies the
     *                    Composition Hook to fetch.
     * @return \Twilio\Rest\Video\V1\CompositionHookInstance 
     */
    public function __construct(Version $version, array $payload, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'enabled' => Values::array_get($payload, 'enabled'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Values::array_get($payload, 'date_updated'),
            'sid' => Values::array_get($payload, 'sid'),
            'audioSources' => Values::array_get($payload, 'audio_sources'),
            'audioSourcesExcluded' => Values::array_get($payload, 'audio_sources_excluded'),
            'videoLayout' => Values::array_get($payload, 'video_layout'),
            'resolution' => Values::array_get($payload, 'resolution'),
            'trim' => Values::array_get($payload, 'trim'),
            'format' => Values::array_get($payload, 'format'),
            'statusCallback' => Values::array_get($payload, 'status_callback'),
            'statusCallbackMethod' => Values::array_get($payload, 'status_callback_method'),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array('sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\Video\V1\CompositionHookContext Context for this
     *                                                      CompositionHookInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new CompositionHookContext($this->version, $this->solution['sid']);
        }

        return $this->context;
    }

    /**
     * Fetch a CompositionHookInstance
     * 
     * @return CompositionHookInstance Fetched CompositionHookInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the CompositionHookInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Update the CompositionHookInstance
     * 
     * @param string $friendlyName Friendly name of the Composition Hook to be
     *                             shown in the console.
     * @param array|Options $options Optional Arguments
     * @return CompositionHookInstance Updated CompositionHookInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($friendlyName, $options = array()) {
        return $this->proxy()->update($friendlyName, $options);
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
        return '[Twilio.Video.V1.CompositionHookInstance ' . implode(' ', $context) . ']';
    }
}