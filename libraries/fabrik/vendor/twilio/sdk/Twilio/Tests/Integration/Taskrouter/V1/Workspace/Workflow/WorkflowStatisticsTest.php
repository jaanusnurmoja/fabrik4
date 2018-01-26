<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Taskrouter\V1\Workspace\Workflow;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class WorkflowStatisticsTest extends HolodeckTestCase {
    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->taskrouter->v1->workspaces("WSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                         ->workflows("WWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                         ->statistics()->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://taskrouter.twilio.com/v1/Workspaces/WSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Workflows/WWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Statistics'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "url": "https://taskrouter.twilio.com/v1/Workspaces/WSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Workflows/WWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Statistics",
                "cumulative": {
                    "avg_task_acceptance_time": 0.0,
                    "end_time": "2008-01-02T00:00:00Z",
                    "reservations_accepted": 0,
                    "reservations_rejected": 0,
                    "reservations_timed_out": 0,
                    "start_time": "2008-01-02T00:00:00Z",
                    "tasks_canceled": 0,
                    "tasks_entered": 0,
                    "tasks_moved": 0,
                    "tasks_timed_out_in_workflow": 0
                },
                "realtime": {
                    "longest_task_waiting_age": 0,
                    "longest_task_waiting_sid": null,
                    "tasks_by_status": {
                        "assigned": 1,
                        "pending": 0,
                        "reserved": 0,
                        "wrapping": 0
                    },
                    "total_tasks": 1
                },
                "workflow_sid": "WWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "workspace_sid": "WSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->taskrouter->v1->workspaces("WSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                               ->workflows("WWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                               ->statistics()->fetch();

        $this->assertNotNull($actual);
    }
}