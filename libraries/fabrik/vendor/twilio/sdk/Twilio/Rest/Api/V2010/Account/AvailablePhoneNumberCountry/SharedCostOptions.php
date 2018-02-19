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

abstract class SharedCostOptions {
    /**
     * @param integer $areaCode The area_code
     * @param string $contains The contains
     * @param boolean $smsEnabled The sms_enabled
     * @param boolean $mmsEnabled The mms_enabled
     * @param boolean $voiceEnabled The voice_enabled
     * @param boolean $excludeAllAddressRequired The exclude_all_address_required
     * @param boolean $excludeLocalAddressRequired The
     *                                             exclude_local_address_required
     * @param boolean $excludeForeignAddressRequired The
     *                                               exclude_foreign_address_required
     * @param boolean $beta The beta
     * @param string $nearNumber The near_number
     * @param string $nearLatLong The near_lat_long
     * @param integer $distance The distance
     * @param string $inPostalCode The in_postal_code
     * @param string $inRegion The in_region
     * @param string $inRateCenter The in_rate_center
     * @param string $inLata The in_lata
     * @param string $inLocality The in_locality
     * @param boolean $faxEnabled The fax_enabled
     * @return ReadSharedCostOptions Options builder
     */
    public static function read($areaCode = Values::NONE, $contains = Values::NONE, $smsEnabled = Values::NONE, $mmsEnabled = Values::NONE, $voiceEnabled = Values::NONE, $excludeAllAddressRequired = Values::NONE, $excludeLocalAddressRequired = Values::NONE, $excludeForeignAddressRequired = Values::NONE, $beta = Values::NONE, $nearNumber = Values::NONE, $nearLatLong = Values::NONE, $distance = Values::NONE, $inPostalCode = Values::NONE, $inRegion = Values::NONE, $inRateCenter = Values::NONE, $inLata = Values::NONE, $inLocality = Values::NONE, $faxEnabled = Values::NONE) {
        return new ReadSharedCostOptions($areaCode, $contains, $smsEnabled, $mmsEnabled, $voiceEnabled, $excludeAllAddressRequired, $excludeLocalAddressRequired, $excludeForeignAddressRequired, $beta, $nearNumber, $nearLatLong, $distance, $inPostalCode, $inRegion, $inRateCenter, $inLata, $inLocality, $faxEnabled);
    }
}

class ReadSharedCostOptions extends Options {
    /**
     * @param integer $areaCode The area_code
     * @param string $contains The contains
     * @param boolean $smsEnabled The sms_enabled
     * @param boolean $mmsEnabled The mms_enabled
     * @param boolean $voiceEnabled The voice_enabled
     * @param boolean $excludeAllAddressRequired The exclude_all_address_required
     * @param boolean $excludeLocalAddressRequired The
     *                                             exclude_local_address_required
     * @param boolean $excludeForeignAddressRequired The
     *                                               exclude_foreign_address_required
     * @param boolean $beta The beta
     * @param string $nearNumber The near_number
     * @param string $nearLatLong The near_lat_long
     * @param integer $distance The distance
     * @param string $inPostalCode The in_postal_code
     * @param string $inRegion The in_region
     * @param string $inRateCenter The in_rate_center
     * @param string $inLata The in_lata
     * @param string $inLocality The in_locality
     * @param boolean $faxEnabled The fax_enabled
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
     * The area_code
     * 
     * @param integer $areaCode The area_code
     * @return $this Fluent Builder
     */
    public function setAreaCode($areaCode) {
        $this->options['areaCode'] = $areaCode;
        return $this;
    }

    /**
     * The contains
     * 
     * @param string $contains The contains
     * @return $this Fluent Builder
     */
    public function setContains($contains) {
        $this->options['contains'] = $contains;
        return $this;
    }

    /**
     * The sms_enabled
     * 
     * @param boolean $smsEnabled The sms_enabled
     * @return $this Fluent Builder
     */
    public function setSmsEnabled($smsEnabled) {
        $this->options['smsEnabled'] = $smsEnabled;
        return $this;
    }

    /**
     * The mms_enabled
     * 
     * @param boolean $mmsEnabled The mms_enabled
     * @return $this Fluent Builder
     */
    public function setMmsEnabled($mmsEnabled) {
        $this->options['mmsEnabled'] = $mmsEnabled;
        return $this;
    }

    /**
     * The voice_enabled
     * 
     * @param boolean $voiceEnabled The voice_enabled
     * @return $this Fluent Builder
     */
    public function setVoiceEnabled($voiceEnabled) {
        $this->options['voiceEnabled'] = $voiceEnabled;
        return $this;
    }

    /**
     * The exclude_all_address_required
     * 
     * @param boolean $excludeAllAddressRequired The exclude_all_address_required
     * @return $this Fluent Builder
     */
    public function setExcludeAllAddressRequired($excludeAllAddressRequired) {
        $this->options['excludeAllAddressRequired'] = $excludeAllAddressRequired;
        return $this;
    }

    /**
     * The exclude_local_address_required
     * 
     * @param boolean $excludeLocalAddressRequired The
     *                                             exclude_local_address_required
     * @return $this Fluent Builder
     */
    public function setExcludeLocalAddressRequired($excludeLocalAddressRequired) {
        $this->options['excludeLocalAddressRequired'] = $excludeLocalAddressRequired;
        return $this;
    }

    /**
     * The exclude_foreign_address_required
     * 
     * @param boolean $excludeForeignAddressRequired The
     *                                               exclude_foreign_address_required
     * @return $this Fluent Builder
     */
    public function setExcludeForeignAddressRequired($excludeForeignAddressRequired) {
        $this->options['excludeForeignAddressRequired'] = $excludeForeignAddressRequired;
        return $this;
    }

    /**
     * The beta
     * 
     * @param boolean $beta The beta
     * @return $this Fluent Builder
     */
    public function setBeta($beta) {
        $this->options['beta'] = $beta;
        return $this;
    }

    /**
     * The near_number
     * 
     * @param string $nearNumber The near_number
     * @return $this Fluent Builder
     */
    public function setNearNumber($nearNumber) {
        $this->options['nearNumber'] = $nearNumber;
        return $this;
    }

    /**
     * The near_lat_long
     * 
     * @param string $nearLatLong The near_lat_long
     * @return $this Fluent Builder
     */
    public function setNearLatLong($nearLatLong) {
        $this->options['nearLatLong'] = $nearLatLong;
        return $this;
    }

    /**
     * The distance
     * 
     * @param integer $distance The distance
     * @return $this Fluent Builder
     */
    public function setDistance($distance) {
        $this->options['distance'] = $distance;
        return $this;
    }

    /**
     * The in_postal_code
     * 
     * @param string $inPostalCode The in_postal_code
     * @return $this Fluent Builder
     */
    public function setInPostalCode($inPostalCode) {
        $this->options['inPostalCode'] = $inPostalCode;
        return $this;
    }

    /**
     * The in_region
     * 
     * @param string $inRegion The in_region
     * @return $this Fluent Builder
     */
    public function setInRegion($inRegion) {
        $this->options['inRegion'] = $inRegion;
        return $this;
    }

    /**
     * The in_rate_center
     * 
     * @param string $inRateCenter The in_rate_center
     * @return $this Fluent Builder
     */
    public function setInRateCenter($inRateCenter) {
        $this->options['inRateCenter'] = $inRateCenter;
        return $this;
    }

    /**
     * The in_lata
     * 
     * @param string $inLata The in_lata
     * @return $this Fluent Builder
     */
    public function setInLata($inLata) {
        $this->options['inLata'] = $inLata;
        return $this;
    }

    /**
     * The in_locality
     * 
     * @param string $inLocality The in_locality
     * @return $this Fluent Builder
     */
    public function setInLocality($inLocality) {
        $this->options['inLocality'] = $inLocality;
        return $this;
    }

    /**
     * The fax_enabled
     * 
     * @param boolean $faxEnabled The fax_enabled
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
        return '[Twilio.Api.V2010.ReadSharedCostOptions ' . implode(' ', $options) . ']';
    }
}