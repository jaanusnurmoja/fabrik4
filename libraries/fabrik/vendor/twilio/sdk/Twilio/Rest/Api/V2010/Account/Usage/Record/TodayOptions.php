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

abstract class TodayOptions {
    /**
     * @param string $category The category
     * @param string $startDateBefore The start_date
     * @param string $startDate The start_date
     * @param string $startDateAfter The start_date
     * @param string $endDateBefore The end_date
     * @param string $endDate The end_date
     * @param string $endDateAfter The end_date
     * @return ReadTodayOptions Options builder
     */
    public static function read($category = Values::NONE, $startDateBefore = Values::NONE, $startDate = Values::NONE, $startDateAfter = Values::NONE, $endDateBefore = Values::NONE, $endDate = Values::NONE, $endDateAfter = Values::NONE) {
        return new ReadTodayOptions($category, $startDateBefore, $startDate, $startDateAfter, $endDateBefore, $endDate, $endDateAfter);
    }
}

class ReadTodayOptions extends Options {
    /**
     * @param string $category The category
     * @param string $startDateBefore The start_date
     * @param string $startDate The start_date
     * @param string $startDateAfter The start_date
     * @param string $endDateBefore The end_date
     * @param string $endDate The end_date
     * @param string $endDateAfter The end_date
     */
    public function __construct($category = Values::NONE, $startDateBefore = Values::NONE, $startDate = Values::NONE, $startDateAfter = Values::NONE, $endDateBefore = Values::NONE, $endDate = Values::NONE, $endDateAfter = Values::NONE) {
        $this->options['category'] = $category;
        $this->options['startDateBefore'] = $startDateBefore;
        $this->options['startDate'] = $startDate;
        $this->options['startDateAfter'] = $startDateAfter;
        $this->options['endDateBefore'] = $endDateBefore;
        $this->options['endDate'] = $endDate;
        $this->options['endDateAfter'] = $endDateAfter;
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
     * @param string $startDateBefore The start_date
     * @return $this Fluent Builder
     */
    public function setStartDateBefore($startDateBefore) {
        $this->options['startDateBefore'] = $startDateBefore;
        return $this;
    }

    /**
     * The start_date
     * 
     * @param string $startDate The start_date
     * @return $this Fluent Builder
     */
    public function setStartDate($startDate) {
        $this->options['startDate'] = $startDate;
        return $this;
    }

    /**
     * The start_date
     * 
     * @param string $startDateAfter The start_date
     * @return $this Fluent Builder
     */
    public function setStartDateAfter($startDateAfter) {
        $this->options['startDateAfter'] = $startDateAfter;
        return $this;
    }

    /**
     * The end_date
     * 
     * @param string $endDateBefore The end_date
     * @return $this Fluent Builder
     */
    public function setEndDateBefore($endDateBefore) {
        $this->options['endDateBefore'] = $endDateBefore;
        return $this;
    }

    /**
     * The end_date
     * 
     * @param string $endDate The end_date
     * @return $this Fluent Builder
     */
    public function setEndDate($endDate) {
        $this->options['endDate'] = $endDate;
        return $this;
    }

    /**
     * The end_date
     * 
     * @param string $endDateAfter The end_date
     * @return $this Fluent Builder
     */
    public function setEndDateAfter($endDateAfter) {
        $this->options['endDateAfter'] = $endDateAfter;
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
        return '[Twilio.Api.V2010.ReadTodayOptions ' . implode(' ', $options) . ']';
    }
}