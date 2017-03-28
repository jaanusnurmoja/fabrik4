<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Trunking\V1\Trunk;

use Twilio\Options;
use Twilio\Values;

abstract class OriginationUrlOptions {
    /**
     * @param string $weight The weight
     * @param string $priority The priority
     * @param string $enabled The enabled
     * @param string $friendlyName The friendly_name
     * @param string $sipUrl The sip_url
     * @return UpdateOriginationUrlOptions Options builder
     */
    public static function update($weight = Values::NONE, $priority = Values::NONE, $enabled = Values::NONE, $friendlyName = Values::NONE, $sipUrl = Values::NONE) {
        return new UpdateOriginationUrlOptions($weight, $priority, $enabled, $friendlyName, $sipUrl);
    }
}

class UpdateOriginationUrlOptions extends Options {
    /**
     * @param string $weight The weight
     * @param string $priority The priority
     * @param string $enabled The enabled
     * @param string $friendlyName The friendly_name
     * @param string $sipUrl The sip_url
     */
    public function __construct($weight = Values::NONE, $priority = Values::NONE, $enabled = Values::NONE, $friendlyName = Values::NONE, $sipUrl = Values::NONE) {
        $this->options['weight'] = $weight;
        $this->options['priority'] = $priority;
        $this->options['enabled'] = $enabled;
        $this->options['friendlyName'] = $friendlyName;
        $this->options['sipUrl'] = $sipUrl;
    }

    /**
     * The weight
     * 
     * @param string $weight The weight
     * @return $this Fluent Builder
     */
    public function setWeight($weight) {
        $this->options['weight'] = $weight;
        return $this;
    }

    /**
     * The priority
     * 
     * @param string $priority The priority
     * @return $this Fluent Builder
     */
    public function setPriority($priority) {
        $this->options['priority'] = $priority;
        return $this;
    }

    /**
     * The enabled
     * 
     * @param string $enabled The enabled
     * @return $this Fluent Builder
     */
    public function setEnabled($enabled) {
        $this->options['enabled'] = $enabled;
        return $this;
    }

    /**
     * The friendly_name
     * 
     * @param string $friendlyName The friendly_name
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The sip_url
     * 
     * @param string $sipUrl The sip_url
     * @return $this Fluent Builder
     */
    public function setSipUrl($sipUrl) {
        $this->options['sipUrl'] = $sipUrl;
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
        return '[Twilio.Trunking.V1.UpdateOriginationUrlOptions ' . implode(' ', $options) . ']';
    }
}