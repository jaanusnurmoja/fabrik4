<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry;

use Twilio\Options;
use Twilio\Values;

abstract class MobileOptions {
    /**
     * @param integer $areaCode Find phone numbers in the specified area code.
     * @param string $contains A pattern on which to match phone numbers.
     * @param boolean $smsEnabled This indicates whether the phone numbers can
     *                            receive text messages.
     * @param boolean $mmsEnabled This indicates whether the phone numbers can
     *                            receive MMS messages.
     * @param boolean $voiceEnabled This indicates whether the phone numbers can
     *                              receive calls.
     * @param boolean $excludeAllAddressRequired Indicates whether the response
     *                                           includes phone numbers which
     *                                           require any Address.
     * @param boolean $excludeLocalAddressRequired Indicates whether the response
     *                                             includes phone numbers which
     *                                             require a local Address.
     * @param boolean $excludeForeignAddressRequired Indicates whether the response
     *                                               includes phone numbers which
     *                                               require a foreign Address.
     * @param boolean $beta Include phone numbers new to the Twilio platform.
     * @param string $nearNumber Given a phone number, find a geographically close
     *                           number within Distance miles. (US/Canada only)
     * @param string $nearLatLong Given a latitude/longitude pair lat,long find
     *                            geographically close numbers within Distance
     *                            miles. (US/Canada only)
     * @param integer $distance Specifies the search radius for a Near- query in
     *                          miles. (US/Canada only)
     * @param string $inPostalCode Limit results to a particular postal code.
     *                             (US/Canada only)
     * @param string $inRegion Limit results to a particular region. (US/Canada
     *                         only)
     * @param string $inRateCenter Limit results to a specific rate center, or
     *                             given a phone number search within the same rate
     *                             center as that number. (US/Canada only)
     * @param string $inLata Limit results to a specific Local access and transport
     *                       area. (US/Canada only)
     * @param string $inLocality Limit results to a particular locality.
     * @param boolean $faxEnabled This indicates whether the phone numbers can
     *                            receive faxes.
     * @return ReadMobileOptions Options builder
     */
    public static function read($areaCode = Values::NONE, $contains = Values::NONE, $smsEnabled = Values::NONE, $mmsEnabled = Values::NONE, $voiceEnabled = Values::NONE, $excludeAllAddressRequired = Values::NONE, $excludeLocalAddressRequired = Values::NONE, $excludeForeignAddressRequired = Values::NONE, $beta = Values::NONE, $nearNumber = Values::NONE, $nearLatLong = Values::NONE, $distance = Values::NONE, $inPostalCode = Values::NONE, $inRegion = Values::NONE, $inRateCenter = Values::NONE, $inLata = Values::NONE, $inLocality = Values::NONE, $faxEnabled = Values::NONE) {
        return new ReadMobileOptions($areaCode, $contains, $smsEnabled, $mmsEnabled, $voiceEnabled, $excludeAllAddressRequired, $excludeLocalAddressRequired, $excludeForeignAddressRequired, $beta, $nearNumber, $nearLatLong, $distance, $inPostalCode, $inRegion, $inRateCenter, $inLata, $inLocality, $faxEnabled);
    }
}

class ReadMobileOptions extends Options {
    /**
     * @param integer $areaCode Find phone numbers in the specified area code.
     * @param string $contains A pattern on which to match phone numbers.
     * @param boolean $smsEnabled This indicates whether the phone numbers can
     *                            receive text messages.
     * @param boolean $mmsEnabled This indicates whether the phone numbers can
     *                            receive MMS messages.
     * @param boolean $voiceEnabled This indicates whether the phone numbers can
     *                              receive calls.
     * @param boolean $excludeAllAddressRequired Indicates whether the response
     *                                           includes phone numbers which
     *                                           require any Address.
     * @param boolean $excludeLocalAddressRequired Indicates whether the response
     *                                             includes phone numbers which
     *                                             require a local Address.
     * @param boolean $excludeForeignAddressRequired Indicates whether the response
     *                                               includes phone numbers which
     *                                               require a foreign Address.
     * @param boolean $beta Include phone numbers new to the Twilio platform.
     * @param string $nearNumber Given a phone number, find a geographically close
     *                           number within Distance miles. (US/Canada only)
     * @param string $nearLatLong Given a latitude/longitude pair lat,long find
     *                            geographically close numbers within Distance
     *                            miles. (US/Canada only)
     * @param integer $distance Specifies the search radius for a Near- query in
     *                          miles. (US/Canada only)
     * @param string $inPostalCode Limit results to a particular postal code.
     *                             (US/Canada only)
     * @param string $inRegion Limit results to a particular region. (US/Canada
     *                         only)
     * @param string $inRateCenter Limit results to a specific rate center, or
     *                             given a phone number search within the same rate
     *                             center as that number. (US/Canada only)
     * @param string $inLata Limit results to a specific Local access and transport
     *                       area. (US/Canada only)
     * @param string $inLocality Limit results to a particular locality.
     * @param boolean $faxEnabled This indicates whether the phone numbers can
     *                            receive faxes.
     */
    public function __construct($areaCode = Values::NONE, $contains = Values::NONE, $smsEnabled = Values::NONE, $mmsEnabled = Values::NONE, $voiceEnabled = Values::NONE, $excludeAllAddressRequired = Values::NONE, $excludeLocalAddressRequired = Values::NONE, $excludeForeignAddressRequired = Values::NONE, $beta = Values::NONE, $nearNumber = Values::NONE, $nearLatLong = Values::NONE, $distance = Values::NONE, $inPostalCode = Values::NONE, $inRegion = Values::NONE, $inRateCenter = Values::NONE, $inLata = Values::NONE, $inLocality = Values::NONE, $faxEnabled = Values::NONE) {
        $this->options['areaCode'] = $areaCode;
        $this->options['contains'] = $contains;
        $this->options['smsEnabled'] = $smsEnabled;
        $this->options['mmsEnabled'] = $mmsEnabled;
        $this->options['voiceEnabled'] = $voiceEnabled;
        $this->options['excludeAllAddressRequired'] = $excludeAllAddressRequired;
        $this->options['excludeLocalAddressRequired'] = $excludeLocalAddressRequired;
        $this->options['excludeForeignAddressRequired'] = $excludeForeignAddressRequired;
        $this->options['beta'] = $beta;
        $this->options['nearNumber'] = $nearNumber;
        $this->options['nearLatLong'] = $nearLatLong;
        $this->options['distance'] = $distance;
        $this->options['inPostalCode'] = $inPostalCode;
        $this->options['inRegion'] = $inRegion;
        $this->options['inRateCenter'] = $inRateCenter;
        $this->options['inLata'] = $inLata;
        $this->options['inLocality'] = $inLocality;
        $this->options['faxEnabled'] = $faxEnabled;
    }

    /**
     * Find phone numbers in the specified area code. (US and Canada only)
     * 
     * @param integer $areaCode Find phone numbers in the specified area code.
     * @return $this Fluent Builder
     */
    public function setAreaCode($areaCode) {
        $this->options['areaCode'] = $areaCode;
        return $this;
    }

    /**
     * A pattern on which to match phone numbers. Valid characters are `'*'` and `[0-9a-zA-Z]`. The `'*'` character will match any single digit. See [Example 2](https://www.twilio.com/docs/api/rest/available-phone-numbers#local-get-basic-example-2) and [Example 3](https://www.twilio.com/docs/api/rest/available-phone-numbers#local-get-basic-example-3) below. *NOTE:* Patterns must be at least two characters long.
     * 
     * @param string $contains A pattern on which to match phone numbers.
     * @return $this Fluent Builder
     */
    public function setContains($contains) {
        $this->options['contains'] = $contains;
        return $this;
    }

    /**
     * This indicates whether the phone numbers can receive text messages. Possible values are `true` or `false`.
     * 
     * @param boolean $smsEnabled This indicates whether the phone numbers can
     *                            receive text messages.
     * @return $this Fluent Builder
     */
    public function setSmsEnabled($smsEnabled) {
        $this->options['smsEnabled'] = $smsEnabled;
        return $this;
    }

    /**
     * This indicates whether the phone numbers can receive MMS messages. Possible values are `true` or `false`.
     * 
     * @param boolean $mmsEnabled This indicates whether the phone numbers can
     *                            receive MMS messages.
     * @return $this Fluent Builder
     */
    public function setMmsEnabled($mmsEnabled) {
        $this->options['mmsEnabled'] = $mmsEnabled;
        return $this;
    }

    /**
     * This indicates whether the phone numbers can receive calls. Possible values are `true` or `false`.
     * 
     * @param boolean $voiceEnabled This indicates whether the phone numbers can
     *                              receive calls.
     * @return $this Fluent Builder
     */
    public function setVoiceEnabled($voiceEnabled) {
        $this->options['voiceEnabled'] = $voiceEnabled;
        return $this;
    }

    /**
     * Indicates whether the response includes phone numbers which require any [Address](https://www.twilio.com/docs/usage/api/addresses). Possible values are `true` or `false`. If not specified, the default is `false`, and results could include phone numbers with an Address required.
     * 
     * @param boolean $excludeAllAddressRequired Indicates whether the response
     *                                           includes phone numbers which
     *                                           require any Address.
     * @return $this Fluent Builder
     */
    public function setExcludeAllAddressRequired($excludeAllAddressRequired) {
        $this->options['excludeAllAddressRequired'] = $excludeAllAddressRequired;
        return $this;
    }

    /**
     * Indicates whether the response includes phone numbers which require a local [Address](https://www.twilio.com/docs/usage/api/addresses). Possible values are `true` or `false`. If not specified, the default is `false`, and results could include phone numbers with a local Address required.
     * 
     * @param boolean $excludeLocalAddressRequired Indicates whether the response
     *                                             includes phone numbers which
     *                                             require a local Address.
     * @return $this Fluent Builder
     */
    public function setExcludeLocalAddressRequired($excludeLocalAddressRequired) {
        $this->options['excludeLocalAddressRequired'] = $excludeLocalAddressRequired;
        return $this;
    }

    /**
     * Indicates whether the response includes phone numbers which require a foreign [Address](https://www.twilio.com/docs/usage/api/addresses). Possible values are `true` or `false`. If not specified, the default is `false`, and results could include phone numbers with a foreign Address required.
     * 
     * @param boolean $excludeForeignAddressRequired Indicates whether the response
     *                                               includes phone numbers which
     *                                               require a foreign Address.
     * @return $this Fluent Builder
     */
    public function setExcludeForeignAddressRequired($excludeForeignAddressRequired) {
        $this->options['excludeForeignAddressRequired'] = $excludeForeignAddressRequired;
        return $this;
    }

    /**
     * Include phone numbers new to the Twilio platform. Possible values are either `true` or `false`. Default is `true`.
     * 
     * @param boolean $beta Include phone numbers new to the Twilio platform.
     * @return $this Fluent Builder
     */
    public function setBeta($beta) {
        $this->options['beta'] = $beta;
        return $this;
    }

    /**
     * Given a phone number, find a geographically close number within `Distance` miles. Distance defaults to 25 miles. *Limited to US and Canadian phone numbers.*
     * 
     * @param string $nearNumber Given a phone number, find a geographically close
     *                           number within Distance miles. (US/Canada only)
     * @return $this Fluent Builder
     */
    public function setNearNumber($nearNumber) {
        $this->options['nearNumber'] = $nearNumber;
        return $this;
    }

    /**
     * Given a latitude/longitude pair `lat,long` find geographically close numbers within `Distance` miles. *Limited to US and Canadian phone numbers.*
     * 
     * @param string $nearLatLong Given a latitude/longitude pair lat,long find
     *                            geographically close numbers within Distance
     *                            miles. (US/Canada only)
     * @return $this Fluent Builder
     */
    public function setNearLatLong($nearLatLong) {
        $this->options['nearLatLong'] = $nearLatLong;
        return $this;
    }

    /**
     * Specifies the search radius for a `Near-` query in miles. If not specified this defaults to 25 miles. Maximum searchable distance is 500 miles. *Limited to US and Canadian phone numbers.*
     * 
     * @param integer $distance Specifies the search radius for a Near- query in
     *                          miles. (US/Canada only)
     * @return $this Fluent Builder
     */
    public function setDistance($distance) {
        $this->options['distance'] = $distance;
        return $this;
    }

    /**
     * Limit results to a particular postal code. Given a phone number, search within the same postal code as that number. *Limited to US and Canadian phone numbers.*
     * 
     * @param string $inPostalCode Limit results to a particular postal code.
     *                             (US/Canada only)
     * @return $this Fluent Builder
     */
    public function setInPostalCode($inPostalCode) {
        $this->options['inPostalCode'] = $inPostalCode;
        return $this;
    }

    /**
     * Limit results to a particular region (i.e. State/Province). Given a phone number, search within the same Region as that number. *Limited to US and Canadian phone numbers.*
     * 
     * @param string $inRegion Limit results to a particular region. (US/Canada
     *                         only)
     * @return $this Fluent Builder
     */
    public function setInRegion($inRegion) {
        $this->options['inRegion'] = $inRegion;
        return $this;
    }

    /**
     * Limit results to a specific rate center, or given a phone number search within the same rate center as that number. Requires InLata to be set as well. *Limited to US and Canadian phone numbers.*
     * 
     * @param string $inRateCenter Limit results to a specific rate center, or
     *                             given a phone number search within the same rate
     *                             center as that number. (US/Canada only)
     * @return $this Fluent Builder
     */
    public function setInRateCenter($inRateCenter) {
        $this->options['inRateCenter'] = $inRateCenter;
        return $this;
    }

    /**
     * Limit results to a specific Local access and transport area ([LATA](http://en.wikipedia.org/wiki/Local_access_and_transport_area)). Given a phone number, search within the same [LATA](http://en.wikipedia.org/wiki/Local_access_and_transport_area) as that number. *Limited to US and Canadian phone numbers.*
     * 
     * @param string $inLata Limit results to a specific Local access and transport
     *                       area. (US/Canada only)
     * @return $this Fluent Builder
     */
    public function setInLata($inLata) {
        $this->options['inLata'] = $inLata;
        return $this;
    }

    /**
     * Limit results to a particular locality (i.e.  City). Given a phone number, search within the same Locality as that number.
     * 
     * @param string $inLocality Limit results to a particular locality.
     * @return $this Fluent Builder
     */
    public function setInLocality($inLocality) {
        $this->options['inLocality'] = $inLocality;
        return $this;
    }

    /**
     * This indicates whether the phone numbers can receive faxes. Possible values are `true` or `false`.
     * 
     * @param boolean $faxEnabled This indicates whether the phone numbers can
     *                            receive faxes.
     * @return $this Fluent Builder
     */
    public function setFaxEnabled($faxEnabled) {
        $this->options['faxEnabled'] = $faxEnabled;
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
        return '[Twilio.Api.V2010.ReadMobileOptions ' . implode(' ', $options) . ']';
    }
}