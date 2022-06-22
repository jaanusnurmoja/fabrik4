<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Voice\V1\DialingPermissions;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class CountryOptions {
    /**
     * @param string $isoCode Filter to retrieve the country permissions by
     *                        specifying the ISO country code
     * @param string $continent Filter to retrieve the country permissions by
     *                          specifying the continent
     * @param string $countryCode Country code filter
     * @param bool $lowRiskNumbersEnabled Filter to retrieve the country
     *                                    permissions with dialing to low-risk
     *                                    numbers enabled
     * @param bool $highRiskSpecialNumbersEnabled Filter to retrieve the country
     *                                            permissions with dialing to
     *                                            high-risk special service numbers
     *                                            enabled
     * @param bool $highRiskTollfraudNumbersEnabled Filter to retrieve the country
     *                                              permissions with dialing to
     *                                              high-risk toll fraud numbers
     *                                              enabled
     * @return ReadCountryOptions Options builder
     */
    public static function read($isoCode = Values::NONE, $continent = Values::NONE, $countryCode = Values::NONE, $lowRiskNumbersEnabled = Values::NONE, $highRiskSpecialNumbersEnabled = Values::NONE, $highRiskTollfraudNumbersEnabled = Values::NONE) {
        return new ReadCountryOptions($isoCode, $continent, $countryCode, $lowRiskNumbersEnabled, $highRiskSpecialNumbersEnabled, $highRiskTollfraudNumbersEnabled);
    }
}

class ReadCountryOptions extends Options {
    /**
     * @param string $isoCode Filter to retrieve the country permissions by
     *                        specifying the ISO country code
     * @param string $continent Filter to retrieve the country permissions by
     *                          specifying the continent
     * @param string $countryCode Country code filter
     * @param bool $lowRiskNumbersEnabled Filter to retrieve the country
     *                                    permissions with dialing to low-risk
     *                                    numbers enabled
     * @param bool $highRiskSpecialNumbersEnabled Filter to retrieve the country
     *                                            permissions with dialing to
     *                                            high-risk special service numbers
     *                                            enabled
     * @param bool $highRiskTollfraudNumbersEnabled Filter to retrieve the country
     *                                              permissions with dialing to
     *                                              high-risk toll fraud numbers
     *                                              enabled
     */
    public function __construct($isoCode = Values::NONE, $continent = Values::NONE, $countryCode = Values::NONE, $lowRiskNumbersEnabled = Values::NONE, $highRiskSpecialNumbersEnabled = Values::NONE, $highRiskTollfraudNumbersEnabled = Values::NONE) {
        $this->options['isoCode'] = $isoCode;
        $this->options['continent'] = $continent;
        $this->options['countryCode'] = $countryCode;
        $this->options['lowRiskNumbersEnabled'] = $lowRiskNumbersEnabled;
        $this->options['highRiskSpecialNumbersEnabled'] = $highRiskSpecialNumbersEnabled;
        $this->options['highRiskTollfraudNumbersEnabled'] = $highRiskTollfraudNumbersEnabled;
    }

    /**
     * Filter to retrieve the country permissions by specifying the [ISO country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2)
     *
     * @param string $isoCode Filter to retrieve the country permissions by
     *                        specifying the ISO country code
     * @return $this Fluent Builder
     */
    public function setIsoCode($isoCode) {
        $this->options['isoCode'] = $isoCode;
        return $this;
    }

    /**
     * Filter to retrieve the country permissions by specifying the continent
     *
     * @param string $continent Filter to retrieve the country permissions by
     *                          specifying the continent
     * @return $this Fluent Builder
     */
    public function setContinent($continent) {
        $this->options['continent'] = $continent;
        return $this;
    }

    /**
     * Filter the results by specified [country codes](https://www.itu.int/itudoc/itu-t/ob-lists/icc/e164_763.html)
     *
     * @param string $countryCode Country code filter
     * @return $this Fluent Builder
     */
    public function setCountryCode($countryCode) {
        $this->options['countryCode'] = $countryCode;
        return $this;
    }

    /**
     * Filter to retrieve the country permissions with dialing to low-risk numbers enabled. Can be: `true` or `false`.
     *
     * @param bool $lowRiskNumbersEnabled Filter to retrieve the country
     *                                    permissions with dialing to low-risk
     *                                    numbers enabled
     * @return $this Fluent Builder
     */
    public function setLowRiskNumbersEnabled($lowRiskNumbersEnabled) {
        $this->options['lowRiskNumbersEnabled'] = $lowRiskNumbersEnabled;
        return $this;
    }

    /**
     * Filter to retrieve the country permissions with dialing to high-risk special service numbers enabled. Can be: `true` or `false`
     *
     * @param bool $highRiskSpecialNumbersEnabled Filter to retrieve the country
     *                                            permissions with dialing to
     *                                            high-risk special service numbers
     *                                            enabled
     * @return $this Fluent Builder
     */
    public function setHighRiskSpecialNumbersEnabled($highRiskSpecialNumbersEnabled) {
        $this->options['highRiskSpecialNumbersEnabled'] = $highRiskSpecialNumbersEnabled;
        return $this;
    }

    /**
     * Filter to retrieve the country permissions with dialing to high-risk [toll fraud](https://www.twilio.com/learn/voice-and-video/toll-fraud) numbers enabled. Can be: `true` or `false`.
     *
     * @param bool $highRiskTollfraudNumbersEnabled Filter to retrieve the country
     *                                              permissions with dialing to
     *                                              high-risk toll fraud numbers
     *                                              enabled
     * @return $this Fluent Builder
     */
    public function setHighRiskTollfraudNumbersEnabled($highRiskTollfraudNumbersEnabled) {
        $this->options['highRiskTollfraudNumbersEnabled'] = $highRiskTollfraudNumbersEnabled;
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
        return '[Twilio.Voice.V1.ReadCountryOptions ' . \implode(' ', $options) . ']';
    }
}