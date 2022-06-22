<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Taskrouter\V1\Workspace;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkersStatisticsList;
use Twilio\Values;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkersStatisticsList $statistics
 * @method \Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkersStatisticsContext statistics()
 */
class WorkerList extends ListResource {
    protected $_statistics = null;

    /**
     * Construct the WorkerList
     *
     * @param Version $version Version that contains the resource
     * @param string $workspaceSid The SID of the Workspace that contains the Worker
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\WorkerList
     */
    public function __construct(Version $version, $workspaceSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('workspaceSid' => $workspaceSid, );

        $this->uri = '/Workspaces/' . \rawurlencode($workspaceSid) . '/Workers';
    }

    /**
     * Streams WorkerInstance records from the API as a generator stream.
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
     * Reads WorkerInstance records from the API as a list.
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
     * @return WorkerInstance[] Array of results
     */
    public function read($options = array(), $limit = null, $pageSize = null) {
        return \iterator_to_array($this->stream($options, $limit, $pageSize), false);
    }

    /**
     * Retrieve a single page of WorkerInstance records from the API.
     * Request is executed immediately
     *
     * @param array|Options $options Optional Arguments
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of WorkerInstance
     */
    public function page($options = array(), $pageSize = Values::NONE, $pageToken = Values::NONE, $pageNumber = Values::NONE) {
        $options = new Values($options);
        $params = Values::of(array(
            'ActivityName' => $options['activityName'],
            'ActivitySid' => $options['activitySid'],
            'Available' => $options['available'],
            'FriendlyName' => $options['friendlyName'],
            'TargetWorkersExpression' => $options['targetWorkersExpression'],
            'TaskQueueName' => $options['taskQueueName'],
            'TaskQueueSid' => $options['taskQueueSid'],
            'PageToken' => $pageToken,
            'Page' => $pageNumber,
            'PageSize' => $pageSize,
        ));

        $response = $this->version->page(
            'GET',
            $this->uri,
            $params
        );

        return new WorkerPage($this->version, $response, $this->solution);
    }

    /**
     * Retrieve a specific page of WorkerInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return \Twilio\Page Page of WorkerInstance
     */
    public function getPage($targetUrl) {
        $response = $this->version->getDomain()->getClient()->request(
            'GET',
            $targetUrl
        );

        return new WorkerPage($this->version, $response, $this->solution);
    }

    /**
     * Create a new WorkerInstance
     *
     * @param string $friendlyName A string to describe the resource
     * @param array|Options $options Optional Arguments
     * @return WorkerInstance Newly created WorkerInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create($friendlyName, $options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'FriendlyName' => $friendlyName,
            'ActivitySid' => $options['activitySid'],
            'Attributes' => $options['attributes'],
        ));

        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new WorkerInstance($this->version, $payload, $this->solution['workspaceSid']);
    }

    /**
     * Access the statistics
     */
    protected function getStatistics() {
        if (!$this->_statistics) {
            $this->_statistics = new WorkersStatisticsList($this->version, $this->solution['workspaceSid']);
        }

        return $this->_statistics;
    }

    /**
     * Constructs a WorkerContext
     *
     * @param string $sid The SID of the resource to fetch
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\WorkerContext
     */
    public function getContext($sid) {
        return new WorkerContext($this->version, $this->solution['workspaceSid'], $sid);
    }

    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get($name) {
        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown subresource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call($name, $arguments) {
        $property = $this->$name;
        if (\method_exists($property, 'getContext')) {
            return \call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Taskrouter.V1.WorkerList]';
    }
}