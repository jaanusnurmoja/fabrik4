<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Sync\V1\Service\SyncMap;

use Twilio\ListResource;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class SyncMapItemList extends ListResource {
    /**
     * Construct the SyncMapItemList
     * 
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The unique SID identifier of the Service Instance
     *                           that hosts this Map object.
     * @param string $mapSid The unique 34-character SID identifier of the Map
     *                       containing this Item.
     * @return \Twilio\Rest\Sync\V1\Service\SyncMap\SyncMapItemList 
     */
    public function __construct(Version $version, $serviceSid, $mapSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'mapSid' => $mapSid, );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Maps/' . rawurlencode($mapSid) . '/Items';
    }

    /**
     * Create a new SyncMapItemInstance
     * 
     * @param string $key The unique user-defined key of this Map Item.
     * @param array $data Contains arbitrary user-defined, schema-less data that
     *                    this Map Item stores, represented by a JSON object, up to
     *                    16KB.
     * @param array|Options $options Optional Arguments
     * @return SyncMapItemInstance Newly created SyncMapItemInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($key, $data, $options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'Key' => $key,
            'Data' => Serialize::jsonObject($data),
            'Ttl' => $options['ttl'],
            'ItemTtl' => $options['itemTtl'],
            'CollectionTtl' => $options['collectionTtl'],
        ));

        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new SyncMapItemInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['mapSid']
        );
    }

    /**
     * Streams SyncMapItemInstance records from the API as a generator stream.
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
     * Reads SyncMapItemInstance records from the API as a list.
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
     * @return SyncMapItemInstance[] Array of results
     */
    public function read($options = array(), $limit = null, $pageSize = null) {
        return iterator_to_array($this->stream($options, $limit, $pageSize), false);
    }

    /**
     * Retrieve a single page of SyncMapItemInstance records from the API.
     * Request is executed immediately
     * 
     * @param array|Options $options Optional Arguments
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of SyncMapItemInstance
     */
    public function page($options = array(), $pageSize = Values::NONE, $pageToken = Values::NONE, $pageNumber = Values::NONE) {
        $options = new Values($options);
        $params = Values::of(array(
            'Order' => $options['order'],
            'From' => $options['from'],
            'Bounds' => $options['bounds'],
            'PageToken' => $pageToken,
            'Page' => $pageNumber,
            'PageSize' => $pageSize,
        ));

        $response = $this->version->page(
            'GET',
            $this->uri,
            $params
        );

        return new SyncMapItemPage($this->version, $response, $this->solution);
    }

    /**
     * Retrieve a specific page of SyncMapItemInstance records from the API.
     * Request is executed immediately
     * 
     * @param string $targetUrl API-generated URL for the requested results page
     * @return \Twilio\Page Page of SyncMapItemInstance
     */
    public function getPage($targetUrl) {
        $response = $this->version->getDomain()->getClient()->request(
            'GET',
            $targetUrl
        );

        return new SyncMapItemPage($this->version, $response, $this->solution);
    }

    /**
     * Constructs a SyncMapItemContext
     * 
     * @param string $key The key
     * @return \Twilio\Rest\Sync\V1\Service\SyncMap\SyncMapItemContext 
     */
    public function getContext($key) {
        return new SyncMapItemContext(
            $this->version,
            $this->solution['serviceSid'],
            $this->solution['mapSid'],
            $key
        );
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Sync.V1.SyncMapItemList]';
    }
}