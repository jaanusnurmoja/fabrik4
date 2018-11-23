<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Sip\IpAccessControlList;

use Twilio\Options;
use Twilio\Values;

abstract class IpAddressOptions {
    /**
     * @param integer $cidrPrefixLength The cidr_prefix_length
     * @return CreateIpAddressOptions Options builder
     */
    public static function create($cidrPrefixLength = Values::NONE) {
        return new CreateIpAddressOptions($cidrPrefixLength);
    }

    /**
     * @param string $ipAddress The ip_address
     * @param string $friendlyName The friendly_name
     * @param integer $cidrPrefixLength The cidr_prefix_length
     * @return UpdateIpAddressOptions Options builder
     */
    public static function update($ipAddress = Values::NONE, $friendlyName = Values::NONE, $cidrPrefixLength = Values::NONE) {
        return new UpdateIpAddressOptions($ipAddress, $friendlyName, $cidrPrefixLength);
    }
}

class CreateIpAddressOptions extends Options {
    /**
     * @param integer $cidrPrefixLength The cidr_prefix_length
     */
    public function __construct($cidrPrefixLength = Values::NONE) {
        $this->options['cidrPrefixLength'] = $cidrPrefixLength;
    }

    /**
     * The cidr_prefix_length
     * 
     * @param integer $cidrPrefixLength The cidr_prefix_length
     * @return $this Fluent Builder
     */
    public function setCidrPrefixLength($cidrPrefixLength) {
        $this->options['cidrPrefixLength'] = $cidrPrefixLength;
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
        return '[Twilio.Api.V2010.CreateIpAddressOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateIpAddressOptions extends Options {
    /**
     * @param string $ipAddress The ip_address
     * @param string $friendlyName The friendly_name
     * @param integer $cidrPrefixLength The cidr_prefix_length
     */
    public function __construct($ipAddress = Values::NONE, $friendlyName = Values::NONE, $cidrPrefixLength = Values::NONE) {
        $this->options['ipAddress'] = $ipAddress;
        $this->options['friendlyName'] = $friendlyName;
        $this->options['cidrPrefixLength'] = $cidrPrefixLength;
    }

    /**
     * The ip_address
     * 
     * @param string $ipAddress The ip_address
     * @return $this Fluent Builder
     */
    public function setIpAddress($ipAddress) {
        $this->options['ipAddress'] = $ipAddress;
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
     * The cidr_prefix_length
     * 
     * @param integer $cidrPrefixLength The cidr_prefix_length
     * @return $this Fluent Builder
     */
    public function setCidrPrefixLength($cidrPrefixLength) {
        $this->options['cidrPrefixLength'] = $cidrPrefixLength;
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
        return '[Twilio.Api.V2010.UpdateIpAddressOptions ' . implode(' ', $options) . ']';
    }
}