<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Pricing\V2\Voice;

use Twilio\ListResource;
use Twilio\Version;

class NumberList extends ListResource {
    /**
     * Construct the NumberList
     * 
     * @param Version $version Version that contains the resource
     * @return \Twilio\Rest\Pricing\V2\Voice\NumberList 
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array();
    }

    /**
     * Constructs a NumberContext
     * 
     * @param string $destinationNumber Fetches voice prices for number
     * @return \Twilio\Rest\Pricing\V2\Voice\NumberContext 
     */
    public function getContext($destinationNumber) {
        return new NumberContext($this->version, $destinationNumber);
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Pricing.V2.NumberList]';
    }
}