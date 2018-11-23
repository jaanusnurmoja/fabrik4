<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Gather extends TwiML {
    /**
     * Gather constructor.
     * 
     * @param array $attributes Optional attributes
     */
    public function __construct($attributes = array()) {
        parent::__construct('Gather', null, $attributes);
    }

    /**
     * Add Say child.
     * 
     * @param string $message Message to say
     * @param array $attributes Optional attributes
     * @return TwiML Child element.
     */
    public function say($message, $attributes = array()) {
        return $this->nest(new Say($message, $attributes));
    }

    /**
     * Add Pause child.
     * 
     * @param array $attributes Optional attributes
     * @return TwiML Child element.
     */
    public function pause($attributes = array()) {
        return $this->nest(new Pause($attributes));
    }

    /**
     * Add Play child.
     * 
     * @param url $url Media URL
     * @param array $attributes Optional attributes
     * @return TwiML Child element.
     */
    public function play($url = null, $attributes = array()) {
        return $this->nest(new Play($url, $attributes));
    }

    /**
     * Add Input attribute.
     * 
     * @param gather:Enum:Input $input Input type Twilio should accept
     * @return $this
     */
    public function setInput($input) {
        return $this->setAttribute('input', $input);
    }

    /**
     * Add Action attribute.
     * 
     * @param url $action Action URL
     * @return $this
     */
    public function setAction($action) {
        return $this->setAttribute('action', $action);
    }

    /**
     * Add Method attribute.
     * 
     * @param httpMethod $method Action URL method
     * @return $this
     */
    public function setMethod($method) {
        return $this->setAttribute('method', $method);
    }

    /**
     * Add Timeout attribute.
     * 
     * @param integer $timeout Time to wait to gather input
     * @return $this
     */
    public function setTimeout($timeout) {
        return $this->setAttribute('timeout', $timeout);
    }

    /**
     * Add SpeechTimeout attribute.
     * 
     * @param string $speechTimeout Time to wait to gather speech input and it
     *                              should be either auto or a positive integer.
     * @return $this
     */
    public function setSpeechTimeout($speechTimeout) {
        return $this->setAttribute('speechTimeout', $speechTimeout);
    }

    /**
     * Add MaxSpeechTime attribute.
     * 
     * @param integer $maxSpeechTime Max allowed time for speech input
     * @return $this
     */
    public function setMaxSpeechTime($maxSpeechTime) {
        return $this->setAttribute('maxSpeechTime', $maxSpeechTime);
    }

    /**
     * Add ProfanityFilter attribute.
     * 
     * @param boolean $profanityFilter Profanity Filter on speech
     * @return $this
     */
    public function setProfanityFilter($profanityFilter) {
        return $this->setAttribute('profanityFilter', $profanityFilter);
    }

    /**
     * Add FinishOnKey attribute.
     * 
     * @param string $finishOnKey Finish gather on key
     * @return $this
     */
    public function setFinishOnKey($finishOnKey) {
        return $this->setAttribute('finishOnKey', $finishOnKey);
    }

    /**
     * Add NumDigits attribute.
     * 
     * @param integer $numDigits Number of digits to collect
     * @return $this
     */
    public function setNumDigits($numDigits) {
        return $this->setAttribute('numDigits', $numDigits);
    }

    /**
     * Add PartialResultCallback attribute.
     * 
     * @param url $partialResultCallback Partial result callback URL
     * @return $this
     */
    public function setPartialResultCallback($partialResultCallback) {
        return $this->setAttribute('partialResultCallback', $partialResultCallback);
    }

    /**
     * Add PartialResultCallbackMethod attribute.
     * 
     * @param httpMethod $partialResultCallbackMethod Partial result callback URL
     *                                                method
     * @return $this
     */
    public function setPartialResultCallbackMethod($partialResultCallbackMethod) {
        return $this->setAttribute('partialResultCallbackMethod', $partialResultCallbackMethod);
    }

    /**
     * Add Language attribute.
     * 
     * @param gather:Enum:Language $language Language to use
     * @return $this
     */
    public function setLanguage($language) {
        return $this->setAttribute('language', $language);
    }

    /**
     * Add Hints attribute.
     * 
     * @param string $hints Speech recognition hints
     * @return $this
     */
    public function setHints($hints) {
        return $this->setAttribute('hints', $hints);
    }

    /**
     * Add BargeIn attribute.
     * 
     * @param boolean $bargeIn Stop playing media upon speech
     * @return $this
     */
    public function setBargeIn($bargeIn) {
        return $this->setAttribute('bargeIn', $bargeIn);
    }

    /**
     * Add Debug attribute.
     * 
     * @param boolean $debug Allow debug for gather
     * @return $this
     */
    public function setDebug($debug) {
        return $this->setAttribute('debug', $debug);
    }
}