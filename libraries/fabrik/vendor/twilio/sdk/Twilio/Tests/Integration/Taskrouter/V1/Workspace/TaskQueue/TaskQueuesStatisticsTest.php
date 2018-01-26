<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Taskrouter\V1\Workspace\TaskQueue;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class TaskQueuesStatisticsTest extends HolodeckTestCase {
    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->taskrouter->v1->workspaces("WSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                         ->taskQueues
                                         ->statistics->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://taskrouter.twilio.com/v1/Workspaces/WSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/TaskQueues/Statistics'
        ));
    }

    public function testReadFullResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "meta": {
                    "first_page_url": "https://taskrouter.twilio.com/v1/Workspaces/WSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/TaskQueues/Statistics?PageSize=50&Page=0",
                    "key": "task_queues_statistics",
                    "next_page_url": null,
                    "page": 0,
                    "page_size": 50,
                    "previous_page_url": null,
                    "url": "https://taskrouter.twilio.com/v1/Workspaces/WSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/TaskQueues/Statistics?PageSize=50&Page=0"
                },
                "task_queues_statistics": [
                    {
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "cumulative": {
                            "avg_task_acceptance_time": 0.0,
                            "end_time": "2015-08-18T08:46:15Z",
                            "reservations_accepted": 0,
                            "reservations_canceled": 0,
                            "reservations_created": 0,
                            "reservations_rejected": 0,
                            "reservations_rescinded": 0,
                            "reservations_timed_out": 0,
                            "start_time": "2015-08-18T08:31:15Z",
                            "tasks_canceled": 0,
                            "tasks_deleted": 0,
                            "tasks_entered": 0,
                            "tasks_moved": 0
                        },
                        "realtime": {
                            "activity_statistics": [
                                {
                                    "friendly_name": "Offline",
                                    "sid": "WAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                                    "workers": 0
                                },
                                {
                                    "friendly_name": "Idle",
                                    "sid": "WAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                                    "workers": 0
                                },
                                {
                                    "friendly_name": "80fa2beb-3a05-11e5-8fc8-98e0d9a1eb73",
                                    "sid": "WAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                                    "workers": 0
                                },
                                {
                                    "friendly_name": "Reserved",
                                    "sid": "WAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                                    "workers": 0
                                },
                                {
                                    "friendly_name": "Busy",
                                    "sid": "WAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                                    "workers": 0
                                },
                                {
                                    "friendly_name": "817ca1c5-3a05-11e5-9292-98e0d9a1eb73",
                                    "sid": "WAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                                    "workers": 0
                                }
                            ],
                            "longest_task_waiting_age": 0,
                            "longest_task_waiting_sid": null,
                            "tasks_by_status": {
                                "assigned": 0,
                                "pending": 0,
                                "reserved": 0,
                                "wrapping": 0
                            },
                            "total_available_workers": 0,
                            "total_eligible_workers": 0,
                            "total_tasks": 0
                        },
                        "task_queue_sid": "WQaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "workspace_sid": "WSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
                    }
                ]
            }
            '
        ));

        $actual = $this->twilio->taskrouter->v1->workspaces("WSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                               ->taskQueues
                                               ->statistics->read();

        $this->assertGreaterThan(0, count($actual));
    }

    public function testReadEmptyResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "meta": {
                    "first_page_url": "https://taskrouter.twilio.com/v1/Workspaces/WSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/TaskQueues/Statistics?PageSize=50&Page=0",
                    "key": "task_queues_statistics",
                    "next_page_url": null,
                    "page": 0,
                    "page_size": 50,
                    "previous_page_url": null,
                    "url": "https://taskrouter.twilio.com/v1/Workspaces/WSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/TaskQueues/Statistics?PageSize=50&Page=0"
                },
                "task_queues_statistics": []
            }
            '
        ));

        $actual = $this->twilio->taskrouter->v1->workspaces("WSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                               ->taskQueues
                                               ->statistics->read();

        $this->assertNotNull($actual);
    }
}