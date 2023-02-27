<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Taskrouter\V1\Workspace\TaskQueue;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $accountSid
 * @property array $cumulative
 * @property array $realtime
 * @property string $taskQueueSid
 * @property string $workspaceSid
 * @property string $url
 */
class TaskQueueStatisticsInstance extends InstanceResource {
    /**
     * Initialize the TaskQueueStatisticsInstance
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $workspaceSid The SID of the Workspace that contains the
     *                             TaskQueue
     * @param string $taskQueueSid The SID of the TaskQueue from which these
     *                             statistics were calculated
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\TaskQueue\TaskQueueStatisticsInstance
     */
    public function __construct(Version $version, array $payload, $workspaceSid, $taskQueueSid) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'cumulative' => Values::array_get($payload, 'cumulative'),
            'realtime' => Values::array_get($payload, 'realtime'),
            'taskQueueSid' => Values::array_get($payload, 'task_queue_sid'),
            'workspaceSid' => Values::array_get($payload, 'workspace_sid'),
            'url' => Values::array_get($payload, 'url'),
        );

        $this->solution = array('workspaceSid' => $workspaceSid, 'taskQueueSid' => $taskQueueSid, );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\TaskQueue\TaskQueueStatisticsContext Context for this
     *                                                                                   TaskQueueStatisticsInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new TaskQueueStatisticsContext(
                $this->version,
                $this->solution['workspaceSid'],
                $this->solution['taskQueueSid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a TaskQueueStatisticsInstance
     *
     * @param array|Options $options Optional Arguments
     * @return TaskQueueStatisticsInstance Fetched TaskQueueStatisticsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch($options = array()) {
        return $this->proxy()->fetch($options);
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
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
        return '[Twilio.Taskrouter.V1.TaskQueueStatisticsInstance ' . \implode(' ', $context) . ']';
    }
}