<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Proxy\V1;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class ServiceTest extends HolodeckTestCase {
    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->proxy->v1->services("KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://proxy.twilio.com/v1/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sid": "KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "unique_name": "unique_name",
                "default_ttl": 3600,
                "callback_url": "http://www.example.com",
                "geo_match_level": "country",
                "number_selection_behavior": "prefer_sticky",
                "intercept_callback_url": "http://www.example.com",
                "out_of_session_callback_url": "http://www.example.com",
                "date_created": "2015-07-30T20:00:00Z",
                "date_updated": "2015-07-30T20:00:00Z",
                "url": "https://proxy.twilio.com/v1/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "links": {
                    "sessions": "https://proxy.twilio.com/v1/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Sessions",
                    "phone_numbers": "https://proxy.twilio.com/v1/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/PhoneNumbers",
                    "short_codes": "https://proxy.twilio.com/v1/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/ShortCodes"
                }
            }
            '
        ));

        $actual = $this->twilio->proxy->v1->services("KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();

        $this->assertNotNull($actual);
    }

    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->proxy->v1->services->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://proxy.twilio.com/v1/Services'
        ));
    }

    public function testReadEmptyResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "services": [],
                "meta": {
                    "first_page_url": "https://proxy.twilio.com/v1/Services?PageSize=50&Page=0",
                    "key": "services",
                    "next_page_url": null,
                    "page": 0,
                    "page_size": 50,
                    "previous_page_url": null,
                    "url": "https://proxy.twilio.com/v1/Services?PageSize=50&Page=0"
                }
            }
            '
        ));

        $actual = $this->twilio->proxy->v1->services->read();

        $this->assertNotNull($actual);
    }

    public function testCreateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->proxy->v1->services->create("uniqueName");
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = array('UniqueName' => "uniqueName", );

        $this->assertRequest(new Request(
            'post',
            'https://proxy.twilio.com/v1/Services',
            null,
            $values
        ));
    }

    public function testCreateResponse() {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "sid": "KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "unique_name": "unique_name",
                "default_ttl": 3600,
                "callback_url": "http://www.example.com",
                "geo_match_level": "country",
                "number_selection_behavior": "prefer_sticky",
                "intercept_callback_url": "http://www.example.com",
                "out_of_session_callback_url": "http://www.example.com",
                "date_created": "2015-07-30T20:00:00Z",
                "date_updated": "2015-07-30T20:00:00Z",
                "url": "https://proxy.twilio.com/v1/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "links": {
                    "sessions": "https://proxy.twilio.com/v1/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Sessions",
                    "phone_numbers": "https://proxy.twilio.com/v1/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/PhoneNumbers",
                    "short_codes": "https://proxy.twilio.com/v1/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/ShortCodes"
                }
            }
            '
        ));

        $actual = $this->twilio->proxy->v1->services->create("uniqueName");

        $this->assertNotNull($actual);
    }

    public function testDeleteRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->proxy->v1->services("KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'delete',
            'https://proxy.twilio.com/v1/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testDeleteResponse() {
        $this->holodeck->mock(new Response(
            204,
            null
        ));

        $actual = $this->twilio->proxy->v1->services("KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();

        $this->assertTrue($actual);
    }

    public function testUpdateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->proxy->v1->services("KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->update();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'post',
            'https://proxy.twilio.com/v1/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testUpdateResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sid": "KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "unique_name": "unique_name",
                "default_ttl": 3600,
                "callback_url": "http://www.example.com",
                "geo_match_level": "country",
                "number_selection_behavior": "prefer_sticky",
                "intercept_callback_url": "http://www.example.com",
                "out_of_session_callback_url": "http://www.example.com",
                "date_created": "2015-07-30T20:00:00Z",
                "date_updated": "2015-07-30T20:00:00Z",
                "url": "https://proxy.twilio.com/v1/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "links": {
                    "sessions": "https://proxy.twilio.com/v1/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Sessions",
                    "phone_numbers": "https://proxy.twilio.com/v1/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/PhoneNumbers",
                    "short_codes": "https://proxy.twilio.com/v1/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/ShortCodes"
                }
            }
            '
        ));

        $actual = $this->twilio->proxy->v1->services("KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->update();

        $this->assertNotNull($actual);
    }
}