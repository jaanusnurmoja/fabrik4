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

class WorkersStatisticsList extends ListResource {
    /**
     * Construct the WorkersStatisticsList
     * 
     * @param Version $version Version that contains the resource
     * @param string $workspaceSid The ID of the Workflow this worker is associated
     *                             with
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkersStatisticsList 
     */
    public function __construct(Version $version, $workspaceSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('workspaceSid' => $workspaceSid, );
    }

    /**
     * Constructs a WorkersStatisticsContext
     * 
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkersStatisticsContext 
     */
    public function getContext() {
        return new WorkersStatisticsContext($this->version, $this->solution['workspaceSid']);
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Taskrouter.V1.WorkersStatisticsList]';
    }
}