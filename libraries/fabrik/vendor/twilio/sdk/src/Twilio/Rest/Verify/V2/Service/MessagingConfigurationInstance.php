<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Verify\V2\Service;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $accountSid
 * @property string $serviceSid
 * @property string $country
 * @property string $messagingServiceSid
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $url
 */
class MessagingConfigurationInstance extends InstanceResource {
    /**
     * Initialize the MessagingConfigurationInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid The SID of the Service that the resource is
     *                           associated with
     * @param string $country The ISO-3166-1 country code of the country or `all`.
     * @return \Twilio\Rest\Verify\V2\Service\MessagingConfigurationInstance
     */
    public function __construct(Version $version, array $payload, $serviceSid, $country = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'serviceSid' => Values::array_get($payload, 'service_sid'),
            'country' => Values::array_get($payload, 'country'),
            'messagingServiceSid' => Values::array_get($payload, 'messaging_service_sid'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array(
            'serviceSid' => $serviceSid,
            'country' => $country ?: $this->properties['country'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Verify\V2\Service\MessagingConfigurationContext Context
     *                                                                      for
     *                                                                      this
     *                                                                      MessagingConfigurationInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new MessagingConfigurationContext(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['country']
            );
        }

        return $this->context;
    }

    /**
     * Update the MessagingConfigurationInstance
     *
     * @param string $messagingServiceSid The SID of the Messaging Service used for
     *                                    this configuration.
     * @return MessagingConfigurationInstance Updated MessagingConfigurationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($messagingServiceSid) {
        return $this->proxy()->update($messagingServiceSid);
    }

    /**
     * Fetch a MessagingConfigurationInstance
     *
     * @return MessagingConfigurationInstance Fetched MessagingConfigurationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the MessagingConfigurationInstance
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
        return '[Twilio.Verify.V2.MessagingConfigurationInstance ' . \implode(' ', $context) . ']';
    }
}