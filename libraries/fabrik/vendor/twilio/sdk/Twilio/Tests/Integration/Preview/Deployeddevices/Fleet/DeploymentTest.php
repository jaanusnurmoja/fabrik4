<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Preview\Deployeddevices\Fleet;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class DeploymentTest extends HolodeckTestCase {
    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->deployedDevices->fleets("FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                   ->deployments("DLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://preview.twilio.com/DeployedDevices/Fleets/FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Deployments/DLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sid": "DLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "friendly_name": "friendly_name",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "fleet_sid": "FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "sync_service_sid": "ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "2016-07-30T20:00:00Z",
                "date_updated": "2016-07-30T20:00:00Z",
                "url": "https://preview.twilio.com/DeployedDevices/Fleets/FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Deployments/DLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->preview->deployedDevices->fleets("FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                         ->deployments("DLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();

        $this->assertNotNull($actual);
    }

    public function testDeleteRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->deployedDevices->fleets("FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                   ->deployments("DLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'delete',
            'https://preview.twilio.com/DeployedDevices/Fleets/FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Deployments/DLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testDeleteResponse() {
        $this->holodeck->mock(new Response(
            204,
            null
        ));

        $actual = $this->twilio->preview->deployedDevices->fleets("FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                         ->deployments("DLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();

        $this->assertTrue($actual);
    }

    public function testCreateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->deployedDevices->fleets("FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                   ->deployments->create();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'post',
            'https://preview.twilio.com/DeployedDevices/Fleets/FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Deployments'
        ));
    }

    public function testCreateResponse() {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "sid": "DLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "friendly_name": "friendly_name",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "fleet_sid": "FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "sync_service_sid": "ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "2016-07-30T20:00:00Z",
                "date_updated": "2016-07-30T20:00:00Z",
                "url": "https://preview.twilio.com/DeployedDevices/Fleets/FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Deployments/DLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->preview->deployedDevices->fleets("FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                         ->deployments->create();

        $this->assertNotNull($actual);
    }

    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->deployedDevices->fleets("FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                   ->deployments->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://preview.twilio.com/DeployedDevices/Fleets/FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Deployments'
        ));
    }

    public function testReadEmptyResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "deployments": [],
                "meta": {
                    "first_page_url": "https://preview.twilio.com/DeployedDevices/Fleets/FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Deployments?PageSize=50&Page=0",
                    "key": "deployments",
                    "next_page_url": null,
                    "page": 0,
                    "page_size": 50,
                    "previous_page_url": null,
                    "url": "https://preview.twilio.com/DeployedDevices/Fleets/FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Deployments?PageSize=50&Page=0"
                }
            }
            '
        ));

        $actual = $this->twilio->preview->deployedDevices->fleets("FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                         ->deployments->read();

        $this->assertNotNull($actual);
    }

    public function testReadFullResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "deployments": [
                    {
                        "sid": "DLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "friendly_name": "friendly_name",
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "fleet_sid": "FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "sync_service_sid": "ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "date_created": "2016-07-30T20:00:00Z",
                        "date_updated": "2016-07-30T20:00:00Z",
                        "url": "https://preview.twilio.com/DeployedDevices/Fleets/FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Deployments/DLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
                    }
                ],
                "meta": {
                    "first_page_url": "https://preview.twilio.com/DeployedDevices/Fleets/FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Deployments?PageSize=50&Page=0",
                    "key": "deployments",
                    "next_page_url": null,
                    "page": 0,
                    "page_size": 50,
                    "previous_page_url": null,
                    "url": "https://preview.twilio.com/DeployedDevices/Fleets/FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Deployments?PageSize=50&Page=0"
                }
            }
            '
        ));

        $actual = $this->twilio->preview->deployedDevices->fleets("FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                         ->deployments->read();

        $this->assertGreaterThan(0, count($actual));
    }

    public function testUpdateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->deployedDevices->fleets("FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                   ->deployments("DLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->update();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'post',
            'https://preview.twilio.com/DeployedDevices/Fleets/FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Deployments/DLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testUpdateResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sid": "DLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "friendly_name": "friendly_name",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "fleet_sid": "FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "sync_service_sid": "ISaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "2016-07-30T20:00:00Z",
                "date_updated": "2016-07-30T20:00:00Z",
                "url": "https://preview.twilio.com/DeployedDevices/Fleets/FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Deployments/DLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->preview->deployedDevices->fleets("FLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                         ->deployments("DLaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->update();

        $this->assertNotNull($actual);
    }
}