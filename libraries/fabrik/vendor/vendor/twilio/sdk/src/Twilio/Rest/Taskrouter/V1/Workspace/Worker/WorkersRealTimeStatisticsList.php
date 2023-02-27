<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Taskrouter\V1\Workspace\Worker;

use Twilio\ListResource;
use Twilio\Version;

class WorkersRealTimeStatisticsList extends ListResource {
    /**
     * Construct the WorkersRealTimeStatisticsList
     *
     * @param Version $version Version that contains the resource
     * @param string $workspaceSid The SID of the Workspace that contains the
     *                             Workers
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkersRealTimeStatisticsList
     */
    public function __construct(Version $version, $workspaceSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('workspaceSid' => $workspaceSid, );
    }

    /**
     * Constructs a WorkersRealTimeStatisticsContext
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkersRealTimeStatisticsContext
     */
    public function getContext() {
        return new WorkersRealTimeStatisticsContext($this->version, $this->solution['workspaceSid']);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Taskrouter.V1.WorkersRealTimeStatisticsList]';
    }
}