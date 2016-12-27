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

class WorkerStatisticsContext extends InstanceContext {
    /**
     * Initialize the WorkerStatisticsContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $workspaceSid The workspace_sid
     * @param string $workerSid The worker_sid
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\Worker\WorkerStatisticsContext 
     */
    public function __construct(Version $version, $workspaceSid, $workerSid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'workspaceSid' => $workspaceSid,
            'workerSid' => $workerSid,
        );
        
        $this->uri = '/Workspaces/' . rawurlencode($workspaceSid) . '/Workers/' . rawurlencode($workerSid) . '/Statistics';
    }

    /**
     * Fetch a WorkerStatisticsInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return WorkerStatisticsInstance Fetched WorkerStatisticsInstance
     */
    public function fetch($options = array()) {
        $options = new Values($options);
        
        $params = Values::of(array(
            'Minutes' => $options['minutes'],
            'StartDate' => $options['startDate'],
            'EndDate' => $options['endDate'],
        ));
        
        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );
        
        return new WorkerStatisticsInstance(
            $this->version,
            $payload,
            $this->solution['workspaceSid'],
            $this->solution['workerSid']
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
        return '[Twilio.Taskrouter.V1.WorkerStatisticsContext ' . implode(' ', $context) . ']';
    }
}