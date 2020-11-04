<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\ListResource;
use Twilio\Values;
use Twilio\Version;

class ConnectAppList extends ListResource {
    /**
     * Construct the ConnectAppList
     *
     * @param Version $version Version that contains the resource
     * @param string $accountSid The SID of the Account that created the resource
     * @return \Twilio\Rest\Api\V2010\Account\ConnectAppList
     */
    public function __construct(Version $version, $accountSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('accountSid' => $accountSid, );

        $this->uri = '/Accounts/' . \rawurlencode($accountSid) . '/ConnectApps.json';
    }

    /**
     * Streams ConnectAppInstance records from the API as a generator stream.
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
     * Reads ConnectAppInstance records from the API as a list.
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
     * @return ConnectAppInstance[] Array of results
     */
    public function read($limit = null, $pageSize = null) {
        return \iterator_to_array($this->stream($limit, $pageSize), false);
    }

    /**
     * Retrieve a single page of ConnectAppInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of ConnectAppInstance
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

        return new ConnectAppPage($this->version, $response, $this->solution);
    }

    /**
     * Retrieve a specific page of ConnectAppInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return \Twilio\Page Page of ConnectAppInstance
     */
    public function getPage($targetUrl) {
        $response = $this->version->getDomain()->getClient()->request(
            'GET',
            $targetUrl
        );

        return new ConnectAppPage($this->version, $response, $this->solution);
    }

    /**
     * Constructs a ConnectAppContext
     *
     * @param string $sid The unique string that identifies the resource
     * @return \Twilio\Rest\Api\V2010\Account\ConnectAppContext
     */
    public function getContext($sid) {
        return new ConnectAppContext($this->version, $this->solution['accountSid'], $sid);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Api.V2010.ConnectAppList]';
    }
}