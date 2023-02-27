<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Understand\Assistant\FieldType;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class FieldValueOptions {
    /**
     * @param string $language An ISO language-country string of the value. For
     *                         example: en-US
     * @return ReadFieldValueOptions Options builder
     */
    public static function read($language = Values::NONE) {
        return new ReadFieldValueOptions($language);
    }

    /**
     * @param string $synonymOf A value that indicates this field value is a
     *                          synonym of. Empty if the value is not a synonym.
     * @return CreateFieldValueOptions Options builder
     */
    public static function create($synonymOf = Values::NONE) {
        return new CreateFieldValueOptions($synonymOf);
    }
}

class ReadFieldValueOptions extends Options {
    /**
     * @param string $language An ISO language-country string of the value. For
     *                         example: en-US
     */
    public function __construct($language = Values::NONE) {
        $this->options['language'] = $language;
    }

    /**
     * An ISO language-country string of the value. For example: *en-US*
     *
     * @param string $language An ISO language-country string of the value. For
     *                         example: en-US
     * @return $this Fluent Builder
     */
    public function setLanguage($language) {
        $this->options['language'] = $language;
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
        return '[Twilio.Preview.Understand.ReadFieldValueOptions ' . \implode(' ', $options) . ']';
    }
}

class CreateFieldValueOptions extends Options {
    /**
     * @param string $synonymOf A value that indicates this field value is a
     *                          synonym of. Empty if the value is not a synonym.
     */
    public function __construct($synonymOf = Values::NONE) {
        $this->options['synonymOf'] = $synonymOf;
    }

    /**
     * A value that indicates this field value is a synonym of. Empty if the value is not a synonym.
     *
     * @param string $synonymOf A value that indicates this field value is a
     *                          synonym of. Empty if the value is not a synonym.
     * @return $this Fluent Builder
     */
    public function setSynonymOf($synonymOf) {
        $this->options['synonymOf'] = $synonymOf;
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
        return '[Twilio.Preview.Understand.CreateFieldValueOptions ' . \implode(' ', $options) . ']';
    }
}