<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Pricing\V1\PhoneNumber;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class CountryTest extends HolodeckTestCase {
    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->pricing->v1->phoneNumbers
                                      ->countries->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://pricing.twilio.com/v1/PhoneNumbers/Countries'
        ));
    }

    public function testReadFullResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "countries": [
                    {
                        "country": "Austria",
                        "iso_country": "AT",
                        "url": "https://pricing.twilio.com/v1/PhoneNumbers/Countries/AT"
                    }
                ],
                "meta": {
                    "first_page_url": "https://pricing.twilio.com/v1/PhoneNumbers/Countries?PageSize=1&Page=0",
                    "key": "countries",
                    "next_page_url": null,
                    "page": 0,
                    "page_size": 1,
                    "previous_page_url": null,
                    "url": "https://pricing.twilio.com/v1/PhoneNumbers/Countries?PageSize=1&Page=0"
                }
            }
            '
        ));

        $actual = $this->twilio->pricing->v1->phoneNumbers
                                            ->countries->read();

        $this->assertGreaterThan(0, count($actual));
    }

    public function testReadEmptyResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "countries": [],
                "meta": {
                    "first_page_url": "https://pricing.twilio.com/v1/PhoneNumbers/Countries?PageSize=1&Page=0",
                    "key": "countries",
                    "next_page_url": null,
                    "page": 0,
                    "page_size": 1,
                    "previous_page_url": null,
                    "url": "https://pricing.twilio.com/v1/PhoneNumbers/Countries?PageSize=1&Page=0"
                }
            }
            '
        ));

        $actual = $this->twilio->pricing->v1->phoneNumbers
                                            ->countries->read();

        $this->assertNotNull($actual);
    }

    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->pricing->v1->phoneNumbers
                                      ->countries("US")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://pricing.twilio.com/v1/PhoneNumbers/Countries/US'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "country": "Estonia",
                "iso_country": "EE",
                "phone_number_prices": [
                    {
                        "base_price": 3.0,
                        "current_price": 3.0,
                        "type": "mobile"
                    },
                    {
                        "base_price": 1.0,
                        "current_price": 1.0,
                        "type": "national"
                    }
                ],
                "price_unit": "usd",
                "url": "https://pricing.twilio.com/v1/PhoneNumbers/Countries/US"
            }
            '
        ));

        $actual = $this->twilio->pricing->v1->phoneNumbers
                                            ->countries("US")->fetch();

        $this->assertNotNull($actual);
    }
}