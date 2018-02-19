<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Video\V1\Room;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class ParticipantTest extends HolodeckTestCase {
    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->video->v1->rooms("RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                    ->participants("PAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://video.twilio.com/v1/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants/PAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "room_sid": "RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "2015-07-30T20:00:00Z",
                "date_updated": "2015-07-30T20:00:00Z",
                "start_time": "2015-07-30T20:00:00Z",
                "end_time": null,
                "sid": "PAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "identity": "bob",
                "status": "connected",
                "url": "https://video.twilio.com/v1/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants/PAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "duration": null,
                "links": {
                    "published_tracks": "https://video.twilio.com/v1/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants/PAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/PublishedTracks",
                    "subscribed_tracks": "https://video.twilio.com/v1/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants/PAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/SubscribedTracks"
                }
            }
            '
        ));

        $actual = $this->twilio->video->v1->rooms("RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                          ->participants("PAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();

        $this->assertNotNull($actual);
    }

    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->video->v1->rooms("RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                    ->participants->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://video.twilio.com/v1/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants'
        ));
    }

    public function testReadEmptyResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "participants": [],
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://video.twilio.com/v1/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants?PageSize=50&Page=0",
                    "previous_page_url": null,
                    "url": "https://video.twilio.com/v1/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants?PageSize=50&Page=0",
                    "next_page_url": null,
                    "key": "participants"
                }
            }
            '
        ));

        $actual = $this->twilio->video->v1->rooms("RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                          ->participants->read();

        $this->assertNotNull($actual);
    }

    public function testReadFiltersResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "participants": [
                    {
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "room_sid": "RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "date_created": "2017-07-30T20:00:00Z",
                        "date_updated": "2017-07-30T20:00:00Z",
                        "start_time": "2017-07-30T20:00:00Z",
                        "end_time": "2017-07-30T20:00:01Z",
                        "sid": "PAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "identity": "alice",
                        "status": "disconnected",
                        "url": "https://video.twilio.com/v1/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants/PAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "duration": 1,
                        "links": {
                            "published_tracks": "https://video.twilio.com/v1/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants/PAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/PublishedTracks",
                            "subscribed_tracks": "https://video.twilio.com/v1/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants/PAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/SubscribedTracks"
                        }
                    }
                ],
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://video.twilio.com/v1/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants?PageSize=50&Page=0",
                    "previous_page_url": null,
                    "url": "https://video.twilio.com/v1/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants?PageSize=50&Page=0",
                    "next_page_url": null,
                    "key": "participants"
                }
            }
            '
        ));

        $actual = $this->twilio->video->v1->rooms("RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                          ->participants->read();

        $this->assertNotNull($actual);
    }

    public function testUpdateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->video->v1->rooms("RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                    ->participants("PAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->update();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'post',
            'https://video.twilio.com/v1/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants/PAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testUpdateResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "room_sid": "RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "2017-07-30T20:00:00Z",
                "date_updated": "2017-07-30T20:00:00Z",
                "start_time": "2017-07-30T20:00:00Z",
                "end_time": "2017-07-30T20:00:01Z",
                "sid": "PAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "identity": "alice",
                "status": "disconnected",
                "url": "https://video.twilio.com/v1/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants/PAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "duration": 1,
                "links": {
                    "published_tracks": "https://video.twilio.com/v1/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants/PAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/PublishedTracks",
                    "subscribed_tracks": "https://video.twilio.com/v1/Rooms/RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants/PAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/SubscribedTracks"
                }
            }
            '
        ));

        $actual = $this->twilio->video->v1->rooms("RMaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                          ->participants("PAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->update();

        $this->assertNotNull($actual);
    }
}