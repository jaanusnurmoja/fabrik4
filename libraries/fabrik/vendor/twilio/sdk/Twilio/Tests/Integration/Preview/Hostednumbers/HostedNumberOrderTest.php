<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Preview\Hostednumbers;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Serialize;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class HostedNumberOrderTest extends HolodeckTestCase {
    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->hostedNumbers->hostedNumberOrders("HRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://preview.twilio.com/HostedNumbers/HostedNumberOrders/HRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "address_sid": "AD11111111111111111111111111111111",
                "call_delay": 15,
                "capabilities": {
                    "sms": true,
                    "voice": false
                },
                "cc_emails": [
                    "aaa@twilio.com",
                    "bbb@twilio.com"
                ],
                "date_created": "2017-03-28T20:06:39Z",
                "date_updated": "2017-03-28T20:06:39Z",
                "email": "test@twilio.com",
                "extension": "5105",
                "failure_reason": "",
                "friendly_name": "friendly_name",
                "incoming_phone_number_sid": "PN11111111111111111111111111111111",
                "phone_number": "+14153608311",
                "sid": "HRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "signing_document_sid": "PX11111111111111111111111111111111",
                "status": "received",
                "unique_name": "foobar",
                "url": "https://preview.twilio.com/HostedNumbers/HostedNumberOrders/HRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "verification_attempts": 0,
                "verification_call_sids": [
                    "CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                    "CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab"
                ],
                "verification_code": "8794",
                "verification_document_sid": null,
                "verification_type": "phone-call"
            }
            '
        ));

        $actual = $this->twilio->preview->hostedNumbers->hostedNumberOrders("HRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();

        $this->assertNotNull($actual);
    }

    public function testDeleteRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->hostedNumbers->hostedNumberOrders("HRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'delete',
            'https://preview.twilio.com/HostedNumbers/HostedNumberOrders/HRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testDeleteResponse() {
        $this->holodeck->mock(new Response(
            204,
            null
        ));

        $actual = $this->twilio->preview->hostedNumbers->hostedNumberOrders("HRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();

        $this->assertTrue($actual);
    }

    public function testUpdateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->hostedNumbers->hostedNumberOrders("HRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->update();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'post',
            'https://preview.twilio.com/HostedNumbers/HostedNumberOrders/HRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testUpdateResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "address_sid": "AD11111111111111111111111111111111",
                "call_delay": 15,
                "capabilities": {
                    "sms": true,
                    "voice": false
                },
                "cc_emails": [
                    "test1@twilio.com",
                    "test2@twilio.com"
                ],
                "date_created": "2017-03-28T20:06:39Z",
                "date_updated": "2017-03-28T20:06:39Z",
                "email": "test+hosted@twilio.com",
                "extension": "1234",
                "failure_reason": "",
                "friendly_name": "new friendly name",
                "incoming_phone_number_sid": "PN11111111111111111111111111111111",
                "phone_number": "+14153608311",
                "sid": "HRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "signing_document_sid": "PX11111111111111111111111111111111",
                "status": "pending-loa",
                "unique_name": "new unique name",
                "url": "https://preview.twilio.com/HostedNumbers/HostedNumberOrders/HRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "verification_attempts": 1,
                "verification_call_sids": [
                    "CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                    "CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab"
                ],
                "verification_code": "8794",
                "verification_document_sid": null,
                "verification_type": "phone-call"
            }
            '
        ));

        $actual = $this->twilio->preview->hostedNumbers->hostedNumberOrders("HRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->update();

        $this->assertNotNull($actual);
    }

    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->hostedNumbers->hostedNumberOrders->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://preview.twilio.com/HostedNumbers/HostedNumberOrders'
        ));
    }

    public function testReadEmptyResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "meta": {
                    "first_page_url": "https://preview.twilio.com/HostedNumbers/HostedNumberOrders?PageSize=50&Page=0",
                    "key": "items",
                    "next_page_url": null,
                    "page": 0,
                    "page_size": 50,
                    "previous_page_url": null,
                    "url": "https://preview.twilio.com/HostedNumbers/HostedNumberOrders?PageSize=50&Page=0"
                },
                "items": []
            }
            '
        ));

        $actual = $this->twilio->preview->hostedNumbers->hostedNumberOrders->read();

        $this->assertNotNull($actual);
    }

    public function testReadFullResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "meta": {
                    "first_page_url": "https://preview.twilio.com/HostedNumbers/HostedNumberOrders?PageSize=50&Page=0",
                    "key": "items",
                    "next_page_url": null,
                    "page": 0,
                    "page_size": 50,
                    "previous_page_url": null,
                    "url": "https://preview.twilio.com/HostedNumbers/HostedNumberOrders?PageSize=50&Page=0"
                },
                "items": [
                    {
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "address_sid": "AD11111111111111111111111111111111",
                        "call_delay": 15,
                        "capabilities": {
                            "sms": true,
                            "voice": false
                        },
                        "cc_emails": [
                            "aaa@twilio.com",
                            "bbb@twilio.com"
                        ],
                        "date_created": "2017-03-28T20:06:39Z",
                        "date_updated": "2017-03-28T20:06:39Z",
                        "email": "test@twilio.com",
                        "extension": "1234",
                        "failure_reason": "",
                        "friendly_name": "friendly_name",
                        "incoming_phone_number_sid": "PN11111111111111111111111111111111",
                        "phone_number": "+14153608311",
                        "sid": "HRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "signing_document_sid": "PX11111111111111111111111111111111",
                        "status": "received",
                        "unique_name": "foobar",
                        "url": "https://preview.twilio.com/HostedNumbers/HostedNumberOrders/HRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "verification_attempts": 0,
                        "verification_call_sids": [
                            "CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                            "CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab"
                        ],
                        "verification_code": "8794",
                        "verification_document_sid": null,
                        "verification_type": "phone-call"
                    }
                ]
            }
            '
        ));

        $actual = $this->twilio->preview->hostedNumbers->hostedNumberOrders->read();

        $this->assertGreaterThan(0, count($actual));
    }

    public function testCreateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->hostedNumbers->hostedNumberOrders->create("+15017122661", True);
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = array(
            'PhoneNumber' => "+15017122661",
            'SmsCapability' => Serialize::booleanToString(True),
        );

        $this->assertRequest(new Request(
            'post',
            'https://preview.twilio.com/HostedNumbers/HostedNumberOrders',
            null,
            $values
        ));
    }

    public function testCreateResponse() {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "address_sid": "AD11111111111111111111111111111111",
                "call_delay": 0,
                "capabilities": {
                    "sms": true,
                    "voice": false
                },
                "cc_emails": [],
                "date_created": "2017-03-28T20:06:39Z",
                "date_updated": "2017-03-28T20:06:39Z",
                "email": "test@twilio.com",
                "extension": null,
                "failure_reason": "",
                "friendly_name": null,
                "incoming_phone_number_sid": "PN11111111111111111111111111111111",
                "phone_number": "+14153608311",
                "sid": "HRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "signing_document_sid": null,
                "status": "received",
                "unique_name": null,
                "url": "https://preview.twilio.com/HostedNumbers/HostedNumberOrders/HRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "verification_attempts": 0,
                "verification_call_sids": null,
                "verification_code": null,
                "verification_document_sid": null,
                "verification_type": "phone-call"
            }
            '
        ));

        $actual = $this->twilio->preview->hostedNumbers->hostedNumberOrders->create("+15017122661", True);

        $this->assertNotNull($actual);
    }

    public function testCreateWithoutOptionalLoaFieldsResponse() {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "address_sid": null,
                "call_delay": 0,
                "capabilities": {
                    "sms": true,
                    "voice": false
                },
                "cc_emails": [],
                "date_created": "2017-03-28T20:06:39Z",
                "date_updated": "2017-03-28T20:06:39Z",
                "email": null,
                "extension": null,
                "failure_reason": "",
                "friendly_name": null,
                "incoming_phone_number_sid": "PN11111111111111111111111111111111",
                "phone_number": "+14153608311",
                "sid": "HRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "signing_document_sid": null,
                "status": "received",
                "unique_name": null,
                "url": "https://preview.twilio.com/HostedNumbers/HostedNumberOrders/HRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "verification_attempts": 0,
                "verification_call_sids": null,
                "verification_code": null,
                "verification_document_sid": null,
                "verification_type": "phone-call"
            }
            '
        ));

        $actual = $this->twilio->preview->hostedNumbers->hostedNumberOrders->create("+15017122661", True);

        $this->assertNotNull($actual);
    }

    public function testCreateWithPhoneBillVerificationResponse() {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "address_sid": null,
                "call_delay": 0,
                "capabilities": {
                    "sms": true,
                    "voice": false
                },
                "cc_emails": [],
                "date_created": "2017-03-28T20:06:39Z",
                "date_updated": "2017-03-28T20:06:39Z",
                "email": null,
                "extension": null,
                "failure_reason": "",
                "friendly_name": null,
                "incoming_phone_number_sid": "PN11111111111111111111111111111111",
                "phone_number": "+14153608311",
                "sid": "HRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "signing_document_sid": null,
                "status": "received",
                "unique_name": null,
                "url": "https://preview.twilio.com/HostedNumbers/HostedNumberOrders/HRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "verification_attempts": 0,
                "verification_call_sids": null,
                "verification_code": null,
                "verification_document_sid": "RIaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "verification_type": "phone-bill"
            }
            '
        ));

        $actual = $this->twilio->preview->hostedNumbers->hostedNumberOrders->create("+15017122661", True);

        $this->assertNotNull($actual);
    }
}