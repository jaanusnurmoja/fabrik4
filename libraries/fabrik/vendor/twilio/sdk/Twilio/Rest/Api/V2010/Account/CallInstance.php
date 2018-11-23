<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string accountSid
 * @property string annotation
 * @property string answeredBy
 * @property string apiVersion
 * @property string callerName
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 * @property string direction
 * @property string duration
 * @property \DateTime endTime
 * @property string forwardedFrom
 * @property string from
 * @property string fromFormatted
 * @property string groupSid
 * @property string parentCallSid
 * @property string phoneNumberSid
 * @property string price
 * @property string priceUnit
 * @property string sid
 * @property \DateTime startTime
 * @property string status
 * @property array subresourceUris
 * @property string to
 * @property string toFormatted
 * @property string uri
 */
class CallInstance extends InstanceResource {
    protected $_recordings = null;
    protected $_notifications = null;
    protected $_feedback = null;

    /**
     * Initialize the CallInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid The unique id of the Account responsible for
     *                           creating this Call
     * @param string $sid Call Sid that uniquely identifies the Call to fetch
     * @return \Twilio\Rest\Api\V2010\Account\CallInstance 
     */
    public function __construct(Version $version, array $payload, $accountSid, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'annotation' => Values::array_get($payload, 'annotation'),
            'answeredBy' => Values::array_get($payload, 'answered_by'),
            'apiVersion' => Values::array_get($payload, 'api_version'),
            'callerName' => Values::array_get($payload, 'caller_name'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'direction' => Values::array_get($payload, 'direction'),
            'duration' => Values::array_get($payload, 'duration'),
            'endTime' => Deserialize::dateTime(Values::array_get($payload, 'end_time')),
            'forwardedFrom' => Values::array_get($payload, 'forwarded_from'),
            'from' => Values::array_get($payload, 'from'),
            'fromFormatted' => Values::array_get($payload, 'from_formatted'),
            'groupSid' => Values::array_get($payload, 'group_sid'),
            'parentCallSid' => Values::array_get($payload, 'parent_call_sid'),
            'phoneNumberSid' => Values::array_get($payload, 'phone_number_sid'),
            'price' => Values::array_get($payload, 'price'),
            'priceUnit' => Values::array_get($payload, 'price_unit'),
            'sid' => Values::array_get($payload, 'sid'),
            'startTime' => Deserialize::dateTime(Values::array_get($payload, 'start_time')),
            'status' => Values::array_get($payload, 'status'),
            'subresourceUris' => Values::array_get($payload, 'subresource_uris'),
            'to' => Values::array_get($payload, 'to'),
            'toFormatted' => Values::array_get($payload, 'to_formatted'),
            'uri' => Values::array_get($payload, 'uri'),
        );

        $this->solution = array('accountSid' => $accountSid, 'sid' => $sid ?: $this->properties['sid'], );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\Api\V2010\Account\CallContext Context for this
     *                                                    CallInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new CallContext(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Deletes the CallInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Fetch a CallInstance
     * 
     * @return CallInstance Fetched CallInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the CallInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return CallInstance Updated CallInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        return $this->proxy()->update($options);
    }

    /**
     * Access the recordings
     * 
     * @return \Twilio\Rest\Api\V2010\Account\Call\RecordingList 
     */
    protected function getRecordings() {
        return $this->proxy()->recordings;
    }

    /**
     * Access the notifications
     * 
     * @return \Twilio\Rest\Api\V2010\Account\Call\NotificationList 
     */
    protected function getNotifications() {
        return $this->proxy()->notifications;
    }

    /**
     * Access the feedback
     * 
     * @return \Twilio\Rest\Api\V2010\Account\Call\FeedbackList 
     */
    protected function getFeedback() {
        return $this->proxy()->feedback;
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
        return '[Twilio.Api.V2010.CallInstance ' . implode(' ', $context) . ']';
    }
}