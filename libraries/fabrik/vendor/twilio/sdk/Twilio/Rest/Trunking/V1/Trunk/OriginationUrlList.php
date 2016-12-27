<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Trunking\V1\Trunk;

use Twilio\ListResource;
use Twilio\Values;
use Twilio\Version;

class OriginationUrlList extends ListResource {
    /**
     * Construct the OriginationUrlList
     * 
     * @param Version $version Version that contains the resource
     * @param string $trunkSid The trunk_sid
     * @return \Twilio\Rest\Trunking\V1\Trunk\OriginationUrlList 
     */
    public function __construct(Version $version, $trunkSid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'trunkSid' => $trunkSid,
        );
        
        $this->uri = '/Trunks/' . rawurlencode($trunkSid) . '/OriginationUrls';
    }

    /**
     * Create a new OriginationUrlInstance
     * 
     * @param string $weight The weight
     * @param string $priority The priority
     * @param string $enabled The enabled
     * @param string $friendlyName The friendly_name
     * @param string $sipUrl The sip_url
     * @return OriginationUrlInstance Newly created OriginationUrlInstance
     */
    public function create($weight, $priority, $enabled, $friendlyName, $sipUrl) {
        $data = Values::of(array(
            'Weight' => $weight,
            'Priority' => $priority,
            'Enabled' => $enabled,
            'FriendlyName' => $friendlyName,
            'SipUrl' => $sipUrl,
        ));
        
        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );
        
        return new OriginationUrlInstance(
            $this->version,
            $payload,
            $this->solution['trunkSid']
        );
    }

    /**
     * Streams OriginationUrlInstance records from the API as a generator stream.
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
     * Reads OriginationUrlInstance records from the API as a list.
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
     * @return OriginationUrlInstance[] Array of results
     */
    public function read($limit = null, $pageSize = Values::NONE) {
        return iterator_to_array($this->stream($limit, $pageSize), false);
    }

    /**
     * Retrieve a single page of OriginationUrlInstance records from the API.
     * Request is executed immediately
     * 
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of OriginationUrlInstance
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
        
        return new OriginationUrlPage($this->version, $response, $this->solution);
    }

    /**
     * Constructs a OriginationUrlContext
     * 
     * @param string $sid The sid
     * @return \Twilio\Rest\Trunking\V1\Trunk\OriginationUrlContext 
     */
    public function getContext($sid) {
        return new OriginationUrlContext(
            $this->version,
            $this->solution['trunkSid'],
            $sid
        );
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Trunking.V1.OriginationUrlList]';
    }
}