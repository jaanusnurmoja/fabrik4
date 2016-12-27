<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Api\V2010\Account\Call;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class FeedbackTest extends HolodeckTestCase {
    public function testCreateRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->calls("CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->feedback()->create(1);
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $values = array(
            'QualityScore' => 1,
        );
        
        $this->assertRequest(new Request(
            'post',
            'https://api.twilio.com/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Calls/CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Feedback.json',
            null,
            $values
        ));
    }

    public function testCreateResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "Thu, 20 Aug 2015 21:45:46 +0000",
                "date_updated": "Thu, 20 Aug 2015 21:45:46 +0000",
                "issues": [
                    "imperfect-audio",
                    "post-dial-delay"
                ],
                "quality_score": 5,
                "sid": "CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));
        
        $actual = $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->calls("CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->feedback()->create(1);
        
        $this->assertNotNull($actual);
    }

    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->calls("CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->feedback()->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $this->assertRequest(new Request(
            'get',
            'https://api.twilio.com/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Calls/CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Feedback.json'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "Thu, 20 Aug 2015 21:45:46 +0000",
                "date_updated": "Thu, 20 Aug 2015 21:45:46 +0000",
                "issues": [
                    "imperfect-audio",
                    "post-dial-delay"
                ],
                "quality_score": 5,
                "sid": "CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));
        
        $actual = $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->calls("CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->feedback()->fetch();
        
        $this->assertNotNull($actual);
    }

    public function testUpdateRequest() {
        $this->holodeck->mock(new Response(500, ''));
        
        try {
            $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->calls("CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                     ->feedback()->update(1);
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}
        
        $values = array(
            'QualityScore' => 1,
        );
        
        $this->assertRequest(new Request(
            'post',
            'https://api.twilio.com/2010-04-01/Accounts/ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Calls/CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Feedback.json',
            null,
            $values
        ));
    }

    public function testUpdateResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "Thu, 20 Aug 2015 21:45:46 +0000",
                "date_updated": "Thu, 20 Aug 2015 21:45:46 +0000",
                "issues": [
                    "imperfect-audio",
                    "post-dial-delay"
                ],
                "quality_score": 5,
                "sid": "CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));
        
        $actual = $this->twilio->api->v2010->accounts("ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->calls("CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                           ->feedback()->update(1);
        
        $this->assertNotNull($actual);
    }
}