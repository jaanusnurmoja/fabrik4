<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Queue;

use Twilio\ListResource;
use Twilio\Values;
use Twilio\Version;

class MemberList extends ListResource {
    /**
     * Construct the MemberList
     * 
     * @param Version $version Version that contains the resource
     * @param string $accountSid The account_sid
     * @param string $queueSid A string that uniquely identifies this queue
     * @return \Twilio\Rest\Api\V2010\Account\Queue\MemberList 
     */
    public function __construct(Version $version, $accountSid, $queueSid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'accountSid' => $accountSid,
            'queueSid' => $queueSid,
        );
        
        $this->uri = '/Accounts/' . rawurlencode($accountSid) . '/Queues/' . rawurlencode($queueSid) . '/Members.json';
    }

    /**
     * Streams MemberInstance records from the API as a generator stream.
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
     * Reads MemberInstance records from the API as a list.
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
     * @return MemberInstance[] Array of results
     */
    public function read($limit = null, $pageSize = Values::NONE) {
        return iterator_to_array($this->stream($limit, $pageSize), false);
    }

    /**
     * Retrieve a single page of MemberInstance records from the API.
     * Request is executed immediately
     * 
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of MemberInstance
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
        
        return new MemberPage($this->version, $response, $this->solution);
    }

    /**
     * Constructs a MemberContext
     * 
     * @param string $callSid The call_sid
     * @return \Twilio\Rest\Api\V2010\Account\Queue\MemberContext 
     */
    public function getContext($callSid) {
        return new MemberContext(
            $this->version,
            $this->solution['accountSid'],
            $this->solution['queueSid'],
            $callSid
        );
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Api.V2010.MemberList]';
    }
}