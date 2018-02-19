<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Proxy\Service\Session;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class InteractionOptions {
    /**
     * @param string $inboundParticipantStatus The Inbound Participant Status of
     *                                         this Interaction
     * @param string $outboundParticipantStatus The Outbound Participant Status of
     *                                          this Interaction
     * @return ReadInteractionOptions Options builder
     */
    public static function read($inboundParticipantStatus = Values::NONE, $outboundParticipantStatus = Values::NONE) {
        return new ReadInteractionOptions($inboundParticipantStatus, $outboundParticipantStatus);
    }
}

class ReadInteractionOptions extends Options {
    /**
     * @param string $inboundParticipantStatus The Inbound Participant Status of
     *                                         this Interaction
     * @param string $outboundParticipantStatus The Outbound Participant Status of
     *                                          this Interaction
     */
    public function __construct($inboundParticipantStatus = Values::NONE, $outboundParticipantStatus = Values::NONE) {
        $this->options['inboundParticipantStatus'] = $inboundParticipantStatus;
        $this->options['outboundParticipantStatus'] = $outboundParticipantStatus;
    }

    /**
     * The Inbound Participant Status of this Interaction. One of `completed`, `in-progress` or `failed`.
     * 
     * @param string $inboundParticipantStatus The Inbound Participant Status of
     *                                         this Interaction
     * @return $this Fluent Builder
     */
    public function setInboundParticipantStatus($inboundParticipantStatus) {
        $this->options['inboundParticipantStatus'] = $inboundParticipantStatus;
        return $this;
    }

    /**
     * The Outbound Participant Status of this Interaction. One of `completed`, `in-progress` or `failed`.
     * 
     * @param string $outboundParticipantStatus The Outbound Participant Status of
     *                                          this Interaction
     * @return $this Fluent Builder
     */
    public function setOutboundParticipantStatus($outboundParticipantStatus) {
        $this->options['outboundParticipantStatus'] = $outboundParticipantStatus;
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
        return '[Twilio.Preview.Proxy.ReadInteractionOptions ' . implode(' ', $options) . ']';
    }
}