<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Message;

use Twilio\Page;

class MediaPage extends Page {
    public function __construct($version, $response, $solution) {
        parent::__construct($version, $response);
        
        // Path Solution
        $this->solution = $solution;
    }

    public function buildInstance(array $payload) {
        return new MediaInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['messageSid']
        );
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Api.V2010.MediaPage]';
    }
}