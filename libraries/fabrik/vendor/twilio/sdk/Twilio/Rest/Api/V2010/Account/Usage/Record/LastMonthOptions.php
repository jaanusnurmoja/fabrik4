<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Usage\Record;

use Twilio\Options;
use Twilio\Values;

abstract class LastMonthOptions {
    /**
     * @param string $category The category
     * @param \DateTime $startDate The start_date
     * @param \DateTime $endDate The end_date
     * @return ReadLastMonthOptions Options builder
     */
    public static function read($category = Values::NONE, $startDate = Values::NONE, $endDate = Values::NONE) {
        return new ReadLastMonthOptions($category, $startDate, $endDate);
    }
}

class ReadLastMonthOptions extends Options {
    /**
     * @param string $category The category
     * @param \DateTime $startDate The start_date
     * @param \DateTime $endDate The end_date
     */
    public function __construct($category = Values::NONE, $startDate = Values::NONE, $endDate = Values::NONE) {
        $this->options['category'] = $category;
        $this->options['startDate'] = $startDate;
        $this->options['endDate'] = $endDate;
    }

    /**
     * The category
     * 
     * @param string $category The category
     * @return $this Fluent Builder
     */
    public function setCategory($category) {
        $this->options['category'] = $category;
        return $this;
    }

    /**
     * The start_date
     * 
     * @param \DateTime $startDate The start_date
     * @return $this Fluent Builder
     */
    public function setStartDate($startDate) {
        $this->options['startDate'] = $startDate;
        return $this;
    }

    /**
     * The end_date
     * 
     * @param \DateTime $endDate The end_date
     * @return $this Fluent Builder
     */
    public function setEndDate($endDate) {
        $this->options['endDate'] = $endDate;
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
        return '[Twilio.Api.V2010.ReadLastMonthOptions ' . implode(' ', $options) . ']';
    }
}