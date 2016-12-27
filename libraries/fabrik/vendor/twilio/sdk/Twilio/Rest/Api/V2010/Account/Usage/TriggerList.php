<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Usage;

use Twilio\ListResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

class TriggerList extends ListResource {
    /**
     * Construct the TriggerList
     * 
     * @param Version $version Version that contains the resource
     * @param string $accountSid A 34 character string that uniquely identifies
     *                           this resource.
     * @return \Twilio\Rest\Api\V2010\Account\Usage\TriggerList 
     */
    public function __construct(Version $version, $accountSid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'accountSid' => $accountSid,
        );
        
        $this->uri = '/Accounts/' . rawurlencode($accountSid) . '/Usage/Triggers.json';
    }

    /**
     * Create a new TriggerInstance
     * 
     * @param string $callbackUrl URL Twilio will request when the trigger fires
     * @param string $triggerValue the value at which the trigger will fire
     * @param string $usageCategory The usage category the trigger watches
     * @param array|Options $options Optional Arguments
     * @return TriggerInstance Newly created TriggerInstance
     */
    public function create($callbackUrl, $triggerValue, $usageCategory, $options = array()) {
        $options = new Values($options);
        
        $data = Values::of(array(
            'CallbackUrl' => $callbackUrl,
            'TriggerValue' => $triggerValue,
            'UsageCategory' => $usageCategory,
            'CallbackMethod' => $options['callbackMethod'],
            'FriendlyName' => $options['friendlyName'],
            'Recurring' => $options['recurring'],
            'TriggerBy' => $options['triggerBy'],
        ));
        
        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );
        
        return new TriggerInstance(
            $this->version,
            $payload,
            $this->solution['accountSid']
        );
    }

    /**
     * Streams TriggerInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     * 
     * @param array|Options $options Optional Arguments
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
    public function stream($options = array(), $limit = null, $pageSize = null) {
        $limits = $this->version->readLimits($limit, $pageSize);
        
        $page = $this->page($options, $limits['pageSize']);
        
        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }

    /**
     * Reads TriggerInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     * 
     * @param array|Options $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, read()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return TriggerInstance[] Array of results
     */
    public function read($options = array(), $limit = null, $pageSize = Values::NONE) {
        return iterator_to_array($this->stream($options, $limit, $pageSize), false);
    }

    /**
     * Retrieve a single page of TriggerInstance records from the API.
     * Request is executed immediately
     * 
     * @param array|Options $options Optional Arguments
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of TriggerInstance
     */
    public function page($options = array(), $pageSize = Values::NONE, $pageToken = Values::NONE, $pageNumber = Values::NONE) {
        $options = new Values($options);
        $params = Values::of(array(
            'Recurring' => $options['recurring'],
            'TriggerBy' => $options['triggerBy'],
            'UsageCategory' => $options['usageCategory'],
            'PageToken' => $pageToken,
            'Page' => $pageNumber,
            'PageSize' => $pageSize,
        ));
        
        $response = $this->version->page(
            'GET',
            $this->uri,
            $params
        );
        
        return new TriggerPage($this->version, $response, $this->solution);
    }

    /**
     * Constructs a TriggerContext
     * 
     * @param string $sid Fetch by unique usage-trigger Sid
     * @return \Twilio\Rest\Api\V2010\Account\Usage\TriggerContext 
     */
    public function getContext($sid) {
        return new TriggerContext(
            $this->version,
            $this->solution['accountSid'],
            $sid
        );
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Api.V2010.TriggerList]';
    }
}