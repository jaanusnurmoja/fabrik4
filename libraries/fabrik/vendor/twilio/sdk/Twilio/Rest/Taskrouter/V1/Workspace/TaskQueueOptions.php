<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Taskrouter\V1\Workspace;

use Twilio\Options;
use Twilio\Values;

abstract class TaskQueueOptions {
    /**
     * @param string $friendlyName Human readable description of this TaskQueue
     * @param string $targetWorkers A string describing the Worker selection
     *                              criteria for any Tasks that enter this
     *                              TaskQueue.
     * @param string $reservationActivitySid ActivitySID that will be assigned to
     *                                       Workers when they are reserved for a
     *                                       task from this TaskQueue.
     * @param string $assignmentActivitySid ActivitySID that will be assigned to
     *                                      Workers when they are assigned a task
     *                                      from this TaskQueue.
     * @param integer $maxReservedWorkers The maximum amount of workers to create
     *                                    reservations for the assignment of a task
     *                                    while in this queue.
     * @param string $taskOrder TaskOrder will determine which order the Tasks will
     *                          be assigned to Workers.
     * @return UpdateTaskQueueOptions Options builder
     */
    public static function update($friendlyName = Values::NONE, $targetWorkers = Values::NONE, $reservationActivitySid = Values::NONE, $assignmentActivitySid = Values::NONE, $maxReservedWorkers = Values::NONE, $taskOrder = Values::NONE) {
        return new UpdateTaskQueueOptions($friendlyName, $targetWorkers, $reservationActivitySid, $assignmentActivitySid, $maxReservedWorkers, $taskOrder);
    }

    /**
     * @param string $friendlyName Filter by a human readable description of a
     *                             TaskQueue
     * @param string $evaluateWorkerAttributes Provide a Worker attributes
     *                                         expression, and this will return the
     *                                         list of TaskQueues that would
     *                                         distribute tasks to a worker with
     *                                         these attributes.
     * @param string $workerSid The worker_sid
     * @return ReadTaskQueueOptions Options builder
     */
    public static function read($friendlyName = Values::NONE, $evaluateWorkerAttributes = Values::NONE, $workerSid = Values::NONE) {
        return new ReadTaskQueueOptions($friendlyName, $evaluateWorkerAttributes, $workerSid);
    }

    /**
     * @param string $targetWorkers A string describing the Worker selection
     *                              criteria for any Tasks that enter this
     *                              TaskQueue.
     * @param integer $maxReservedWorkers The maximum amount of workers to create
     *                                    reservations for the assignment of a task
     *                                    while in this queue.
     * @param string $taskOrder TaskOrder will determine which order the Tasks will
     *                          be assigned to Workers.
     * @param string $reservationActivitySid ActivitySID to assign workers once a
     *                                       task is reserved for them
     * @param string $assignmentActivitySid ActivitySID to assign workers once a
     *                                      task is assigned for them
     * @return CreateTaskQueueOptions Options builder
     */
    public static function create($targetWorkers = Values::NONE, $maxReservedWorkers = Values::NONE, $taskOrder = Values::NONE, $reservationActivitySid = Values::NONE, $assignmentActivitySid = Values::NONE) {
        return new CreateTaskQueueOptions($targetWorkers, $maxReservedWorkers, $taskOrder, $reservationActivitySid, $assignmentActivitySid);
    }
}

class UpdateTaskQueueOptions extends Options {
    /**
     * @param string $friendlyName Human readable description of this TaskQueue
     * @param string $targetWorkers A string describing the Worker selection
     *                              criteria for any Tasks that enter this
     *                              TaskQueue.
     * @param string $reservationActivitySid ActivitySID that will be assigned to
     *                                       Workers when they are reserved for a
     *                                       task from this TaskQueue.
     * @param string $assignmentActivitySid ActivitySID that will be assigned to
     *                                      Workers when they are assigned a task
     *                                      from this TaskQueue.
     * @param integer $maxReservedWorkers The maximum amount of workers to create
     *                                    reservations for the assignment of a task
     *                                    while in this queue.
     * @param string $taskOrder TaskOrder will determine which order the Tasks will
     *                          be assigned to Workers.
     */
    public function __construct($friendlyName = Values::NONE, $targetWorkers = Values::NONE, $reservationActivitySid = Values::NONE, $assignmentActivitySid = Values::NONE, $maxReservedWorkers = Values::NONE, $taskOrder = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['targetWorkers'] = $targetWorkers;
        $this->options['reservationActivitySid'] = $reservationActivitySid;
        $this->options['assignmentActivitySid'] = $assignmentActivitySid;
        $this->options['maxReservedWorkers'] = $maxReservedWorkers;
        $this->options['taskOrder'] = $taskOrder;
    }

    /**
     * Human readable description of this TaskQueue (for example "Support – Tier 1", "Sales" or "Escalation")
     * 
     * @param string $friendlyName Human readable description of this TaskQueue
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * A string describing the Worker selection criteria for any Tasks that enter this TaskQueue. For example '"language" == "spanish"' If no TargetWorkers parameter is provided, Tasks will wait in this queue until they are either deleted or moved to another queue. Additional examples on how to describing Worker selection criteria below.
     * 
     * @param string $targetWorkers A string describing the Worker selection
     *                              criteria for any Tasks that enter this
     *                              TaskQueue.
     * @return $this Fluent Builder
     */
    public function setTargetWorkers($targetWorkers) {
        $this->options['targetWorkers'] = $targetWorkers;
        return $this;
    }

    /**
     * ActivitySID that will be assigned to Workers when they are reserved for a task from this TaskQueue.
     * 
     * @param string $reservationActivitySid ActivitySID that will be assigned to
     *                                       Workers when they are reserved for a
     *                                       task from this TaskQueue.
     * @return $this Fluent Builder
     */
    public function setReservationActivitySid($reservationActivitySid) {
        $this->options['reservationActivitySid'] = $reservationActivitySid;
        return $this;
    }

    /**
     * ActivitySID that will be assigned to Workers when they are assigned a task from this TaskQueue.
     * 
     * @param string $assignmentActivitySid ActivitySID that will be assigned to
     *                                      Workers when they are assigned a task
     *                                      from this TaskQueue.
     * @return $this Fluent Builder
     */
    public function setAssignmentActivitySid($assignmentActivitySid) {
        $this->options['assignmentActivitySid'] = $assignmentActivitySid;
        return $this;
    }

    /**
     * The maximum amount of workers to create reservations for the assignment of a task while in this queue. Maximum of 50.
     * 
     * @param integer $maxReservedWorkers The maximum amount of workers to create
     *                                    reservations for the assignment of a task
     *                                    while in this queue.
     * @return $this Fluent Builder
     */
    public function setMaxReservedWorkers($maxReservedWorkers) {
        $this->options['maxReservedWorkers'] = $maxReservedWorkers;
        return $this;
    }

    /**
     * TaskOrder will determine which order the Tasks will be assigned to Workers. Set this parameter to LIFO to assign most recently created Task first or FIFO to assign the oldest Task. Default is FIFO. [Click here](https://www.twilio.com/docs/api/taskrouter/last-first-out-lifo) to learn more.
     * 
     * @param string $taskOrder TaskOrder will determine which order the Tasks will
     *                          be assigned to Workers.
     * @return $this Fluent Builder
     */
    public function setTaskOrder($taskOrder) {
        $this->options['taskOrder'] = $taskOrder;
        return $this;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Taskrouter.V1.UpdateTaskQueueOptions ' . implode(' ', $options) . ']';
    }
}

class ReadTaskQueueOptions extends Options {
    /**
     * @param string $friendlyName Filter by a human readable description of a
     *                             TaskQueue
     * @param string $evaluateWorkerAttributes Provide a Worker attributes
     *                                         expression, and this will return the
     *                                         list of TaskQueues that would
     *                                         distribute tasks to a worker with
     *                                         these attributes.
     * @param string $workerSid The worker_sid
     */
    public function __construct($friendlyName = Values::NONE, $evaluateWorkerAttributes = Values::NONE, $workerSid = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['evaluateWorkerAttributes'] = $evaluateWorkerAttributes;
        $this->options['workerSid'] = $workerSid;
    }

    /**
     * Filter by a human readable description of a TaskQueue (for example "Customer Support" or "2014 Election Campaign")
     * 
     * @param string $friendlyName Filter by a human readable description of a
     *                             TaskQueue
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * Provide a Worker attributes expression, and this will return the list of TaskQueues that would distribute tasks to a worker with these attributes.
     * 
     * @param string $evaluateWorkerAttributes Provide a Worker attributes
     *                                         expression, and this will return the
     *                                         list of TaskQueues that would
     *                                         distribute tasks to a worker with
     *                                         these attributes.
     * @return $this Fluent Builder
     */
    public function setEvaluateWorkerAttributes($evaluateWorkerAttributes) {
        $this->options['evaluateWorkerAttributes'] = $evaluateWorkerAttributes;
        return $this;
    }

    /**
     * The worker_sid
     * 
     * @param string $workerSid The worker_sid
     * @return $this Fluent Builder
     */
    public function setWorkerSid($workerSid) {
        $this->options['workerSid'] = $workerSid;
        return $this;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Taskrouter.V1.ReadTaskQueueOptions ' . implode(' ', $options) . ']';
    }
}

class CreateTaskQueueOptions extends Options {
    /**
     * @param string $targetWorkers A string describing the Worker selection
     *                              criteria for any Tasks that enter this
     *                              TaskQueue.
     * @param integer $maxReservedWorkers The maximum amount of workers to create
     *                                    reservations for the assignment of a task
     *                                    while in this queue.
     * @param string $taskOrder TaskOrder will determine which order the Tasks will
     *                          be assigned to Workers.
     * @param string $reservationActivitySid ActivitySID to assign workers once a
     *                                       task is reserved for them
     * @param string $assignmentActivitySid ActivitySID to assign workers once a
     *                                      task is assigned for them
     */
    public function __construct($targetWorkers = Values::NONE, $maxReservedWorkers = Values::NONE, $taskOrder = Values::NONE, $reservationActivitySid = Values::NONE, $assignmentActivitySid = Values::NONE) {
        $this->options['targetWorkers'] = $targetWorkers;
        $this->options['maxReservedWorkers'] = $maxReservedWorkers;
        $this->options['taskOrder'] = $taskOrder;
        $this->options['reservationActivitySid'] = $reservationActivitySid;
        $this->options['assignmentActivitySid'] = $assignmentActivitySid;
    }

    /**
     * A string describing the Worker selection criteria for any Tasks that enter this TaskQueue. For example `'"language" == "spanish"'` If no TargetWorkers parameter is provided, Tasks will wait in this TaskQueue until they are either deleted or moved to another TaskQueue. Additional examples on how to describing Worker selection criteria below. Defaults to 1==1.
     * 
     * @param string $targetWorkers A string describing the Worker selection
     *                              criteria for any Tasks that enter this
     *                              TaskQueue.
     * @return $this Fluent Builder
     */
    public function setTargetWorkers($targetWorkers) {
        $this->options['targetWorkers'] = $targetWorkers;
        return $this;
    }

    /**
     * The maximum amount of workers to create reservations for the assignment of a task while in this queue. Defaults to 1, with a Maximum of 50.
     * 
     * @param integer $maxReservedWorkers The maximum amount of workers to create
     *                                    reservations for the assignment of a task
     *                                    while in this queue.
     * @return $this Fluent Builder
     */
    public function setMaxReservedWorkers($maxReservedWorkers) {
        $this->options['maxReservedWorkers'] = $maxReservedWorkers;
        return $this;
    }

    /**
     * TaskOrder will determine which order the Tasks will be assigned to Workers. Set this parameter to LIFO to assign most recently created Task first or FIFO to assign the oldest Task. Default is FIFO. [Click here](https://www.twilio.com/docs/api/taskrouter/last-first-out-lifo) to learn more.
     * 
     * @param string $taskOrder TaskOrder will determine which order the Tasks will
     *                          be assigned to Workers.
     * @return $this Fluent Builder
     */
    public function setTaskOrder($taskOrder) {
        $this->options['taskOrder'] = $taskOrder;
        return $this;
    }

    /**
     * ActivitySID to assign workers once a task is reserved for them
     * 
     * @param string $reservationActivitySid ActivitySID to assign workers once a
     *                                       task is reserved for them
     * @return $this Fluent Builder
     */
    public function setReservationActivitySid($reservationActivitySid) {
        $this->options['reservationActivitySid'] = $reservationActivitySid;
        return $this;
    }

    /**
     * ActivitySID to assign workers once a task is assigned for them
     * 
     * @param string $assignmentActivitySid ActivitySID to assign workers once a
     *                                      task is assigned for them
     * @return $this Fluent Builder
     */
    public function setAssignmentActivitySid($assignmentActivitySid) {
        $this->options['assignmentActivitySid'] = $assignmentActivitySid;
        return $this;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Taskrouter.V1.CreateTaskQueueOptions ' . implode(' ', $options) . ']';
    }
}