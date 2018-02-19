<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Proxy\Service\Session\Participant;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class MessageInteractionOptions {
    /**
     * @param string $body The body of the message. Up to 1600 characters long.
     * @param string $mediaUrl The url of an image or video.
     * @return CreateMessageInteractionOptions Options builder
     */
    public static function create($body = Values::NONE, $mediaUrl = Values::NONE) {
        return new CreateMessageInteractionOptions($body, $mediaUrl);
    }
}

class CreateMessageInteractionOptions extends Options {
    /**
     * @param string $body The body of the message. Up to 1600 characters long.
     * @param string $mediaUrl The url of an image or video.
     */
    public function __construct($body = Values::NONE, $mediaUrl = Values::NONE) {
        $this->options['body'] = $body;
        $this->options['mediaUrl'] = $mediaUrl;
    }

    /**
     * The text body of the message to send to the Participant. Up to 1600 characters long.
     * 
     * @param string $body The body of the message. Up to 1600 characters long.
     * @return $this Fluent Builder
     */
    public function setBody($body) {
        $this->options['body'] = $body;
        return $this;
    }

    /**
     * The public url of an image or video to send to the Participant.
     * 
     * @param string $mediaUrl The url of an image or video.
     * @return $this Fluent Builder
     */
    public function setMediaUrl($mediaUrl) {
        $this->options['mediaUrl'] = $mediaUrl;
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
        return '[Twilio.Preview.Proxy.CreateMessageInteractionOptions ' . implode(' ', $options) . ']';
    }
}