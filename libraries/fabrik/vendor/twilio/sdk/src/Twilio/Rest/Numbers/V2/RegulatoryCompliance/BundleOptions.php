<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Numbers\V2\RegulatoryCompliance;

use Twilio\Options;
use Twilio\Values;

abstract class BundleOptions {
    /**
     * @param string $statusCallback The URL we call to inform your application of
     *                               status changes.
     * @param string $regulationSid The unique string of a regulation.
     * @param string $isoCountry The ISO country code of the country
     * @param string $endUserType The type of End User of the Bundle resource
     * @param string $numberType The type of phone number
     * @return CreateBundleOptions Options builder
     */
    public static function create($statusCallback = Values::NONE, $regulationSid = Values::NONE, $isoCountry = Values::NONE, $endUserType = Values::NONE, $numberType = Values::NONE) {
        return new CreateBundleOptions($statusCallback, $regulationSid, $isoCountry, $endUserType, $numberType);
    }

    /**
     * @param string $status The verification status of the Bundle resource
     * @param string $friendlyName The string that you assigned to describe the
     *                             resource
     * @param string $regulationSid The unique string of a regulation.
     * @param string $isoCountry The ISO country code of the country
     * @param string $numberType The type of phone number
     * @return ReadBundleOptions Options builder
     */
    public static function read($status = Values::NONE, $friendlyName = Values::NONE, $regulationSid = Values::NONE, $isoCountry = Values::NONE, $numberType = Values::NONE) {
        return new ReadBundleOptions($status, $friendlyName, $regulationSid, $isoCountry, $numberType);
    }

    /**
     * @param string $status The verification status of the Bundle resource
     * @param string $statusCallback The URL we call to inform your application of
     *                               status changes.
     * @param string $friendlyName The string that you assigned to describe the
     *                             resource
     * @param string $email The email address
     * @return UpdateBundleOptions Options builder
     */
    public static function update($status = Values::NONE, $statusCallback = Values::NONE, $friendlyName = Values::NONE, $email = Values::NONE) {
        return new UpdateBundleOptions($status, $statusCallback, $friendlyName, $email);
    }
}

class CreateBundleOptions extends Options {
    /**
     * @param string $statusCallback The URL we call to inform your application of
     *                               status changes.
     * @param string $regulationSid The unique string of a regulation.
     * @param string $isoCountry The ISO country code of the country
     * @param string $endUserType The type of End User of the Bundle resource
     * @param string $numberType The type of phone number
     */
    public function __construct($statusCallback = Values::NONE, $regulationSid = Values::NONE, $isoCountry = Values::NONE, $endUserType = Values::NONE, $numberType = Values::NONE) {
        $this->options['statusCallback'] = $statusCallback;
        $this->options['regulationSid'] = $regulationSid;
        $this->options['isoCountry'] = $isoCountry;
        $this->options['endUserType'] = $endUserType;
        $this->options['numberType'] = $numberType;
    }

    /**
     * The URL we call to inform your application of status changes.
     *
     * @param string $statusCallback The URL we call to inform your application of
     *                               status changes.
     * @return $this Fluent Builder
     */
    public function setStatusCallback($statusCallback) {
        $this->options['statusCallback'] = $statusCallback;
        return $this;
    }

    /**
     * The unique string of a regulation that is associated to the Bundle resource.
     *
     * @param string $regulationSid The unique string of a regulation.
     * @return $this Fluent Builder
     */
    public function setRegulationSid($regulationSid) {
        $this->options['regulationSid'] = $regulationSid;
        return $this;
    }

    /**
     * The ISO country code of the Bundle's phone number country ownership request.
     *
     * @param string $isoCountry The ISO country code of the country
     * @return $this Fluent Builder
     */
    public function setIsoCountry($isoCountry) {
        $this->options['isoCountry'] = $isoCountry;
        return $this;
    }

    /**
     * The type of End User of the Bundle resource.
     *
     * @param string $endUserType The type of End User of the Bundle resource
     * @return $this Fluent Builder
     */
    public function setEndUserType($endUserType) {
        $this->options['endUserType'] = $endUserType;
        return $this;
    }

    /**
     * The type of phone number of the Bundle's ownership request.
     *
     * @param string $numberType The type of phone number
     * @return $this Fluent Builder
     */
    public function setNumberType($numberType) {
        $this->options['numberType'] = $numberType;
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
        return '[Twilio.Numbers.V2.CreateBundleOptions ' . \implode(' ', $options) . ']';
    }
}

class ReadBundleOptions extends Options {
    /**
     * @param string $status The verification status of the Bundle resource
     * @param string $friendlyName The string that you assigned to describe the
     *                             resource
     * @param string $regulationSid The unique string of a regulation.
     * @param string $isoCountry The ISO country code of the country
     * @param string $numberType The type of phone number
     */
    public function __construct($status = Values::NONE, $friendlyName = Values::NONE, $regulationSid = Values::NONE, $isoCountry = Values::NONE, $numberType = Values::NONE) {
        $this->options['status'] = $status;
        $this->options['friendlyName'] = $friendlyName;
        $this->options['regulationSid'] = $regulationSid;
        $this->options['isoCountry'] = $isoCountry;
        $this->options['numberType'] = $numberType;
    }

    /**
     * The verification status of the Bundle resource.
     *
     * @param string $status The verification status of the Bundle resource
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * The string that you assigned to describe the resource.
     *
     * @param string $friendlyName The string that you assigned to describe the
     *                             resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The unique string of a regulation that is associated to the Bundle resource.
     *
     * @param string $regulationSid The unique string of a regulation.
     * @return $this Fluent Builder
     */
    public function setRegulationSid($regulationSid) {
        $this->options['regulationSid'] = $regulationSid;
        return $this;
    }

    /**
     * The ISO country code of the Bundle's phone number country ownership request.
     *
     * @param string $isoCountry The ISO country code of the country
     * @return $this Fluent Builder
     */
    public function setIsoCountry($isoCountry) {
        $this->options['isoCountry'] = $isoCountry;
        return $this;
    }

    /**
     * The type of phone number of the Bundle's ownership request.
     *
     * @param string $numberType The type of phone number
     * @return $this Fluent Builder
     */
    public function setNumberType($numberType) {
        $this->options['numberType'] = $numberType;
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
        return '[Twilio.Numbers.V2.ReadBundleOptions ' . \implode(' ', $options) . ']';
    }
}

class UpdateBundleOptions extends Options {
    /**
     * @param string $status The verification status of the Bundle resource
     * @param string $statusCallback The URL we call to inform your application of
     *                               status changes.
     * @param string $friendlyName The string that you assigned to describe the
     *                             resource
     * @param string $email The email address
     */
    public function __construct($status = Values::NONE, $statusCallback = Values::NONE, $friendlyName = Values::NONE, $email = Values::NONE) {
        $this->options['status'] = $status;
        $this->options['statusCallback'] = $statusCallback;
        $this->options['friendlyName'] = $friendlyName;
        $this->options['email'] = $email;
    }

    /**
     * The verification status of the Bundle resource.
     *
     * @param string $status The verification status of the Bundle resource
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * The URL we call to inform your application of status changes.
     *
     * @param string $statusCallback The URL we call to inform your application of
     *                               status changes.
     * @return $this Fluent Builder
     */
    public function setStatusCallback($statusCallback) {
        $this->options['statusCallback'] = $statusCallback;
        return $this;
    }

    /**
     * The string that you assigned to describe the resource.
     *
     * @param string $friendlyName The string that you assigned to describe the
     *                             resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The email address that will receive updates when the Bundle resource changes status.
     *
     * @param string $email The email address
     * @return $this Fluent Builder
     */
    public function setEmail($email) {
        $this->options['email'] = $email;
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
        return '[Twilio.Numbers.V2.UpdateBundleOptions ' . \implode(' ', $options) . ']';
    }
}