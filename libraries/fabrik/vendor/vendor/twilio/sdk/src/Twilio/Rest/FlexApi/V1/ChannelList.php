<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\FlexApi\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

class ChannelList extends ListResource {
    /**
     * Construct the ChannelList
     *
     * @param Version $version Version that contains the resource
     * @return \Twilio\Rest\FlexApi\V1\ChannelList
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array();

        $this->uri = '/Channels';
    }

    /**
     * Streams ChannelInstance records from the API as a generator stream.
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
     * Reads ChannelInstance records from the API as a list.
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
     * @return ChannelInstance[] Array of results
     */
    public function read($limit = null, $pageSize = null) {
        return \iterator_to_array($this->stream($limit, $pageSize), false);
    }

    /**
     * Retrieve a single page of ChannelInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of ChannelInstance
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

        return new ChannelPage($this->version, $response, $this->solution);
    }

    /**
     * Retrieve a specific page of ChannelInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return \Twilio\Page Page of ChannelInstance
     */
    public function getPage($targetUrl) {
        $response = $this->version->getDomain()->getClient()->request(
            'GET',
            $targetUrl
        );

        return new ChannelPage($this->version, $response, $this->solution);
    }

    /**
     * Create a new ChannelInstance
     *
     * @param string $flexFlowSid The SID of the FlexFlow
     * @param string $identity The identity value that identifies the new
     *                         resource's chat User
     * @param string $chatUserFriendlyName The chat participant's friendly name
     * @param string $chatFriendlyName The chat channel's friendly name
     * @param array|Options $options Optional Arguments
     * @return ChannelInstance Newly created ChannelInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($flexFlowSid, $identity, $chatUserFriendlyName, $chatFriendlyName, $options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'FlexFlowSid' => $flexFlowSid,
            'Identity' => $identity,
            'ChatUserFriendlyName' => $chatUserFriendlyName,
            'ChatFriendlyName' => $chatFriendlyName,
            'Target' => $options['target'],
            'ChatUniqueName' => $options['chatUniqueName'],
            'PreEngagementData' => $options['preEngagementData'],
            'TaskSid' => $options['taskSid'],
            'TaskAttributes' => $options['taskAttributes'],
            'LongLived' => Serialize::booleanToString($options['longLived']),
        ));

        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new ChannelInstance($this->version, $payload);
    }

    /**
     * Constructs a ChannelContext
     *
     * @param string $sid The SID that identifies the Flex chat channel resource to
     *                    fetch
     * @return \Twilio\Rest\FlexApi\V1\ChannelContext
     */
    public function getContext($sid) {
        return new ChannelContext($this->version, $sid);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.FlexApi.V1.ChannelList]';
    }
}