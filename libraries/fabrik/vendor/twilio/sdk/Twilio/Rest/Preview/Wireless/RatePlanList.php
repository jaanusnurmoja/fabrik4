<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Wireless;

use Twilio\ListResource;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class RatePlanList extends ListResource {
    /**
     * Construct the RatePlanList
     * 
     * @param Version $version Version that contains the resource
     * @return \Twilio\Rest\Preview\Wireless\RatePlanList 
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array();

        $this->uri = '/RatePlans';
    }

    /**
     * Streams RatePlanInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     * 
     * @param int $limit Upper limit for the number of records to return. stream()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, stream()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return \Twilio\Stream stream of results
     */
    public function stream($limit = null, $pageSize = null) {
        $limits = $this->version->readLimits($limit, $pageSize);

        $page = $this->page($limits['pageSize']);

        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }

    /**
     * Reads RatePlanInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     * 
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, read()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return RatePlanInstance[] Array of results
     */
    public function read($limit = null, $pageSize = null) {
        return iterator_to_array($this->stream($limit, $pageSize), false);
    }

    /**
     * Retrieve a single page of RatePlanInstance records from the API.
     * Request is executed immediately
     * 
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of RatePlanInstance
     */
    public function page($pageSize = Values::NONE, $pageToken = Values::NONE, $pageNumber = Values::NONE) {
        $params = Values::of(array(
            'PageToken' => $pageToken,
            'Page' => $pageNumber,
            'PageSize' => $pageSize,
        ));

        $response = $this->version->page(
            'GET',
            $this->uri,
            $params
        );

        return new RatePlanPage($this->version, $response, $this->solution);
    }

    /**
     * Retrieve a specific page of RatePlanInstance records from the API.
     * Request is executed immediately
     * 
     * @param string $targetUrl API-generated URL for the requested results page
     * @return \Twilio\Page Page of RatePlanInstance
     */
    public function getPage($targetUrl) {
        $response = $this->version->getDomain()->getClient()->request(
            'GET',
            $targetUrl
        );

        return new RatePlanPage($this->version, $response, $this->solution);
    }

    /**
     * Create a new RatePlanInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return RatePlanInstance Newly created RatePlanInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'UniqueName' => $options['uniqueName'],
            'FriendlyName' => $options['friendlyName'],
            'DataEnabled' => Serialize::booleanToString($options['dataEnabled']),
            'DataLimit' => $options['dataLimit'],
            'DataMetering' => $options['dataMetering'],
            'MessagingEnabled' => Serialize::booleanToString($options['messagingEnabled']),
            'VoiceEnabled' => Serialize::booleanToString($options['voiceEnabled']),
            'CommandsEnabled' => Serialize::booleanToString($options['commandsEnabled']),
            'NationalRoamingEnabled' => Serialize::booleanToString($options['nationalRoamingEnabled']),
            'InternationalRoaming' => Serialize::map($options['internationalRoaming'], function($e) { return $e; }),
        ));

        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new RatePlanInstance($this->version, $payload);
    }

    /**
     * Constructs a RatePlanContext
     * 
     * @param string $sid The sid
     * @return \Twilio\Rest\Preview\Wireless\RatePlanContext 
     */
    public function getContext($sid) {
        return new RatePlanContext($this->version, $sid);
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Preview.Wireless.RatePlanList]';
    }
}