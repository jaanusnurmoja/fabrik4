<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Call;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $accountSid
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $issues
 * @property int $qualityScore
 * @property string $sid
 */
class FeedbackInstance extends InstanceResource {
    /**
     * Initialize the FeedbackInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid The unique sid that identifies this account
     * @param string $callSid The unique string that identifies this resource
     * @return \Twilio\Rest\Api\V2010\Account\Call\FeedbackInstance
     */
    public function __construct(Version $version, array $payload, $accountSid, $callSid) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'issues' => Values::array_get($payload, 'issues'),
            'qualityScore' => Values::array_get($payload, 'quality_score'),
            'sid' => Values::array_get($payload, 'sid'),
        );

        $this->solution = array('accountSid' => $accountSid, 'callSid' => $callSid, );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Api\V2010\Account\Call\FeedbackContext Context for this
     *                                                             FeedbackInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new FeedbackContext(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['callSid']
            );
        }

        return $this->context;
    }

    /**
     * Create a new FeedbackInstance
     *
     * @param int $qualityScore The call quality expressed as an integer from 1 to 5
     * @param array|Options $options Optional Arguments
     * @return FeedbackInstance Newly created FeedbackInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($qualityScore, $options = array()) {
        return $this->proxy()->create($qualityScore, $options);
    }

    /**
     * Fetch a FeedbackInstance
     *
     * @return FeedbackInstance Fetched FeedbackInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the FeedbackInstance
     *
     * @param int $qualityScore The call quality expressed as an integer from 1 to 5
     * @param array|Options $options Optional Arguments
     * @return FeedbackInstance Updated FeedbackInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($qualityScore, $options = array()) {
        return $this->proxy()->update($qualityScore, $options);
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
        return '[Twilio.Api.V2010.FeedbackInstance ' . \implode(' ', $context) . ']';
    }
}