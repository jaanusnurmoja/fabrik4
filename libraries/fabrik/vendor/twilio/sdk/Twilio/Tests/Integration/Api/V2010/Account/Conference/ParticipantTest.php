<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Api\V2010\Account\Conference;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class ParticipantTest extends HolodeckTestCase {
    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->conferences("CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->participants("CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://api.twilio.com/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Conferences/CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants/CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.json'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "call_sid": "CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "conference_sid": "CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "Fri, 18 Feb 2011 21:07:19 +0000",
                "date_updated": "Fri, 18 Feb 2011 21:07:19 +0000",
                "end_conference_on_exit": false,
                "muted": false,
                "hold": false,
                "status": "complete",
                "start_conference_on_enter": true,
                "uri": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Conferences/CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants/CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.json"
            }
            '
        ));

        $actual = $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->conferences("CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->participants("CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();

        $this->assertNotNull($actual);
    }

    public function testUpdateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->conferences("CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->participants("CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->update();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'post',
            'https://api.twilio.com/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Conferences/CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants/CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.json'
        ));
    }

    public function testUpdateResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "call_sid": "CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "conference_sid": "CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "Fri, 18 Feb 2011 21:07:19 +0000",
                "date_updated": "Fri, 18 Feb 2011 21:07:19 +0000",
                "end_conference_on_exit": false,
                "muted": false,
                "hold": false,
                "status": "complete",
                "start_conference_on_enter": true,
                "uri": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Conferences/CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants/CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.json"
            }
            '
        ));

        $actual = $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->conferences("CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->participants("CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->update();

        $this->assertNotNull($actual);
    }

    public function testCreateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->conferences("CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->participants->create("+15017122661", "+15558675310");
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = array('From' => "+15017122661", 'To' => "+15558675310", );

        $this->assertRequest(new Request(
            'post',
            'https://api.twilio.com/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Conferences/CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants.json',
            null,
            $values
        ));
    }

    public function testCreateWithSidResponse() {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "call_sid": "CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "conference_sid": "CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "Fri, 18 Feb 2011 21:07:19 +0000",
                "date_updated": "Fri, 18 Feb 2011 21:07:19 +0000",
                "end_conference_on_exit": false,
                "muted": false,
                "hold": false,
                "status": "complete",
                "start_conference_on_enter": true,
                "uri": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Conferences/CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants/CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.json"
            }
            '
        ));

        $actual = $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->conferences("CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->participants->create("+15017122661", "+15558675310");

        $this->assertNotNull($actual);
    }

    public function testCreateWithFriendlyNameResponse() {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "call_sid": "CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "conference_sid": "CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "Fri, 18 Feb 2011 21:07:19 +0000",
                "date_updated": "Fri, 18 Feb 2011 21:07:19 +0000",
                "end_conference_on_exit": false,
                "muted": false,
                "hold": false,
                "status": "complete",
                "start_conference_on_enter": true,
                "uri": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Conferences/CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants/CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.json"
            }
            '
        ));

        $actual = $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->conferences("CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->participants->create("+15017122661", "+15558675310");

        $this->assertNotNull($actual);
    }

    public function testDeleteRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->conferences("CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->participants("CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'delete',
            'https://api.twilio.com/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Conferences/CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants/CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.json'
        ));
    }

    public function testDeleteResponse() {
        $this->holodeck->mock(new Response(
            204,
            null
        ));

        $actual = $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->conferences("CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->participants("CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();

        $this->assertTrue($actual);
    }

    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->conferences("CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->participants->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://api.twilio.com/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Conferences/CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants.json'
        ));
    }

    public function testReadFullResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "end": 0,
                "first_page_uri": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Conferences/CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants.json?Page=0&PageSize=50",
                "next_page_uri": null,
                "page": 0,
                "page_size": 50,
                "participants": [
                    {
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "call_sid": "CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "conference_sid": "CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "date_created": "Fri, 18 Feb 2011 21:07:19 +0000",
                        "date_updated": "Fri, 18 Feb 2011 21:07:19 +0000",
                        "end_conference_on_exit": false,
                        "muted": false,
                        "hold": false,
                        "status": "complete",
                        "start_conference_on_enter": true,
                        "uri": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Conferences/CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants/CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.json"
                    }
                ],
                "previous_page_uri": null,
                "start": 0,
                "uri": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Conferences/CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants.json"
            }
            '
        ));

        $actual = $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->conferences("CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->participants->read();

        $this->assertGreaterThan(0, count($actual));
    }

    public function testReadEmptyResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "end": 0,
                "first_page_uri": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Conferences/CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants.json?Page=0&PageSize=50",
                "next_page_uri": null,
                "page": 0,
                "page_size": 50,
                "participants": [],
                "previous_page_uri": null,
                "start": 0,
                "uri": "/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Conferences/CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Participants.json"
            }
            '
        ));

        $actual = $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->conferences("CFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->participants->read();

        $this->assertNotNull($actual);
    }
}