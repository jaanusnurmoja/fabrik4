<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Wireless\Sim;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class UsageOptions {
    /**
     * @param string $end The end
     * @param string $start The start
     * @return FetchUsageOptions Options builder
     */
    public static function fetch($end = Values::NONE, $start = Values::NONE) {
        return new FetchUsageOptions($end, $start);
    }
}

class FetchUsageOptions extends Options {
    /**
     * @param string $end The end
     * @param string $start The start
     */
    public function __construct($end = Values::NONE, $start = Values::NONE) {
        $this->options['end'] = $end;
        $this->options['start'] = $start;
    }

    /**
     * The end
     *
     * @param string $end The end
     * @return $this Fluent Builder
     */
    public function setEnd($end) {
        $this->options['end'] = $end;
        return $this;
    }

    /**
     * The start
     *
     * @param string $start The start
     * @return $this Fluent Builder
     */
    public function setStart($start) {
        $this->options['start'] = $start;
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
        return '[Twilio.Preview.Wireless.FetchUsageOptions ' . \implode(' ', $options) . ']';
    }
}