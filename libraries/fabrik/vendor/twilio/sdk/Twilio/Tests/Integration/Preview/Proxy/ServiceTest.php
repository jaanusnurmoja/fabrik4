<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Preview\Proxy;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class ServiceTest extends HolodeckTestCase {
    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->proxy->services("KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://preview.twilio.com/Proxy/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "friendly_name": "friendly_name",
                "date_created": "2015-07-30T20:00:00Z",
                "url": "https://preview.twilio.com/Proxy/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_updated": "2015-07-30T20:00:00Z",
                "sid": "KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "links": {
                    "sessions": "https://preview.twilio.com/Proxy/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Sessions",
                    "phone_numbers": "https://preview.twilio.com/Proxy/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/PhoneNumbers",
                    "short_codes": "https://preview.twilio.com/Proxy/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/ShortCodes"
                },
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "callback_url": "http://www.example.com",
                "auto_create": false
            }
            '
        ));

        $actual = $this->twilio->preview->proxy->services("KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();

        $this->assertNotNull($actual);
    }

    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->proxy->services->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://preview.twilio.com/Proxy/Services'
        ));
    }

    public function testReadEmptyResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "meta": {
                    "previous_page_url": null,
                    "next_page_url": null,
                    "url": "https://preview.twilio.com/Proxy/Services?PageSize=50&Page=0",
                    "page": 0,
                    "first_page_url": "https://preview.twilio.com/Proxy/Services?PageSize=50&Page=0",
                    "page_size": 50,
                    "key": "services"
                },
                "services": []
            }
            '
        ));

        $actual = $this->twilio->preview->proxy->services->read();

        $this->assertNotNull($actual);
    }

    public function testCreateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->proxy->services->create();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'post',
            'https://preview.twilio.com/Proxy/Services'
        ));
    }

    public function testCreateResponse() {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "friendly_name": "friendly_name",
                "date_created": "2015-07-30T20:00:00Z",
                "url": "https://preview.twilio.com/Proxy/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_updated": "2015-07-30T20:00:00Z",
                "sid": "KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "links": {
                    "sessions": "https://preview.twilio.com/Proxy/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Sessions",
                    "phone_numbers": "https://preview.twilio.com/Proxy/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/PhoneNumbers",
                    "short_codes": "https://preview.twilio.com/Proxy/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/ShortCodes"
                },
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "callback_url": "http://www.example.com",
                "auto_create": false
            }
            '
        ));

        $actual = $this->twilio->preview->proxy->services->create();

        $this->assertNotNull($actual);
    }

    public function testDeleteRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->proxy->services("KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'delete',
            'https://preview.twilio.com/Proxy/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testDeleteResponse() {
        $this->holodeck->mock(new Response(
            204,
            null
        ));

        $actual = $this->twilio->preview->proxy->services("KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();

        $this->assertTrue($actual);
    }

    public function testUpdateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->proxy->services("KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->update();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'post',
            'https://preview.twilio.com/Proxy/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testUpdateResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "friendly_name": "friendly_name",
                "date_created": "2015-07-30T20:00:00Z",
                "url": "https://preview.twilio.com/Proxy/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_updated": "2015-07-30T20:00:00Z",
                "sid": "KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "links": {
                    "sessions": "https://preview.twilio.com/Proxy/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Sessions",
                    "phone_numbers": "https://preview.twilio.com/Proxy/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/PhoneNumbers",
                    "short_codes": "https://preview.twilio.com/Proxy/Services/KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/ShortCodes"
                },
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "callback_url": "http://www.example.com",
                "auto_create": false
            }
            '
        ));

        $actual = $this->twilio->preview->proxy->services("KSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->update();

        $this->assertNotNull($actual);
    }
}