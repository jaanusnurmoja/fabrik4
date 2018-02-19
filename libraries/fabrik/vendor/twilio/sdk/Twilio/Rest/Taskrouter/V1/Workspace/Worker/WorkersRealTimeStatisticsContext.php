<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Taskrouter\V1\Workspace\Worker;

use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

class WorkersRealTimeStatisticsContext extends InstanceContext {
    /**
     * Initialize the WorkersRealTimeStatisticsContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $workspaceSid The workspace_sid
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkersRealTimeStatisticsContext 
     */
    public function __construct(Version $version, $workspaceSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('workspaceSid' => $workspaceSid, );

        $this->uri = '/Workspaces/' . rawurlencode($workspaceSid) . '/Workers/RealTimeStatistics';
    }

    /**
     * Fetch a WorkersRealTimeStatisticsInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return WorkersRealTimeStatisticsInstance Fetched
     *                                           WorkersRealTimeStatisticsInstance
     */
    public function fetch($options = array()) {
        $options = new Values($options);

        $params = Values::of(array('TaskChannel' => $options['taskChannel'], ));

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new WorkersRealTimeStatisticsInstance(
            $this->version,
            $payload,
            $this->solution['workspaceSid']
        );
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Taskrouter.V1.WorkersRealTimeStatisticsContext ' . implode(' ', $context) . ']';
    }
}