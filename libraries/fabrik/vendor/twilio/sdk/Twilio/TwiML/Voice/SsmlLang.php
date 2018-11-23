<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class SsmlLang extends TwiML {
    /**
     * SsmlLang constructor.
     * 
     * @param string $words Words to speak
     * @param array $attributes Optional attributes
     */
    public function __construct($words, $attributes = array()) {
        parent::__construct('lang', $words, $attributes);
    }

    /**
     * Add Xml:Lang attribute.
     * 
     * @param ssmlLang:Enum:XmlLang $xml:Lang Specify the language
     * @return $this
     */
    public function setXmlLang($xmlLang) {
        return $this->setAttribute('xml:Lang', $xmlLang);
    }
}