<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Options;
use Twilio\Values;

abstract class CallOptions {
    /**
     * @param string $url Url from which to fetch TwiML
     * @param string $applicationSid ApplicationSid that configures from where to
     *                               fetch TwiML
     * @param string $method HTTP method to use to fetch TwiML
     * @param string $fallbackUrl Fallback URL in case of error
     * @param string $fallbackMethod HTTP Method to use with FallbackUrl
     * @param string $statusCallback Status Callback URL
     * @param string $statusCallbackEvent The status_callback_event
     * @param string $statusCallbackMethod HTTP Method to use with StatusCallback
     * @param string $sendDigits Digits to send
     * @param string $ifMachine Action to take if a machine has answered the call
     * @param string $timeout Number of seconds to wait for an answer
     * @param string $record Whether or not to record the Call
     * @param string $recordingChannels The recording_channels
     * @param string $recordingStatusCallback The recording_status_callback
     * @param string $recordingStatusCallbackMethod The
     *                                              recording_status_callback_method
     * @param string $sipAuthUsername The sip_auth_username
     * @param string $sipAuthPassword The sip_auth_password
     * @return CreateCallOptions Options builder
     */
    public static function create($url = Values::NONE, $applicationSid = Values::NONE, $method = Values::NONE, $fallbackUrl = Values::NONE, $fallbackMethod = Values::NONE, $statusCallback = Values::NONE, $statusCallbackEvent = Values::NONE, $statusCallbackMethod = Values::NONE, $sendDigits = Values::NONE, $ifMachine = Values::NONE, $timeout = Values::NONE, $record = Values::NONE, $recordingChannels = Values::NONE, $recordingStatusCallback = Values::NONE, $recordingStatusCallbackMethod = Values::NONE, $sipAuthUsername = Values::NONE, $sipAuthPassword = Values::NONE) {
        return new CreateCallOptions($url, $applicationSid, $method, $fallbackUrl, $fallbackMethod, $statusCallback, $statusCallbackEvent, $statusCallbackMethod, $sendDigits, $ifMachine, $timeout, $record, $recordingChannels, $recordingStatusCallback, $recordingStatusCallbackMethod, $sipAuthUsername, $sipAuthPassword);
    }

    /**
     * @param string $to Phone number or Client identifier to filter `to` on
     * @param string $from Phone number or Client identifier to filter `from` on
     * @param string $parentCallSid Parent Call Sid to filter on
     * @param string $status Status to filter on
     * @param string $startTimeBefore StartTime to filter on
     * @param string $startTime StartTime to filter on
     * @param string $startTimeAfter StartTime to filter on
     * @param string $endTimeBefore EndTime to filter on
     * @param string $endTime EndTime to filter on
     * @param string $endTimeAfter EndTime to filter on
     * @return ReadCallOptions Options builder
     */
    public static function read($to = Values::NONE, $from = Values::NONE, $parentCallSid = Values::NONE, $status = Values::NONE, $startTimeBefore = Values::NONE, $startTime = Values::NONE, $startTimeAfter = Values::NONE, $endTimeBefore = Values::NONE, $endTime = Values::NONE, $endTimeAfter = Values::NONE) {
        return new ReadCallOptions($to, $from, $parentCallSid, $status, $startTimeBefore, $startTime, $startTimeAfter, $endTimeBefore, $endTime, $endTimeAfter);
    }

    /**
     * @param string $url URL that returns TwiML
     * @param string $method HTTP method to use to fetch TwiML
     * @param string $status Status to update the Call with
     * @param string $fallbackUrl Fallback URL in case of error
     * @param string $fallbackMethod HTTP Method to use with FallbackUrl
     * @param string $statusCallback Status Callback URL
     * @param string $statusCallbackMethod HTTP Method to use with StatusCallback
     * @return UpdateCallOptions Options builder
     */
    public static function update($url = Values::NONE, $method = Values::NONE, $status = Values::NONE, $fallbackUrl = Values::NONE, $fallbackMethod = Values::NONE, $statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE) {
        return new UpdateCallOptions($url, $method, $status, $fallbackUrl, $fallbackMethod, $statusCallback, $statusCallbackMethod);
    }
}

class CreateCallOptions extends Options {
    /**
     * @param string $url Url from which to fetch TwiML
     * @param string $applicationSid ApplicationSid that configures from where to
     *                               fetch TwiML
     * @param string $method HTTP method to use to fetch TwiML
     * @param string $fallbackUrl Fallback URL in case of error
     * @param string $fallbackMethod HTTP Method to use with FallbackUrl
     * @param string $statusCallback Status Callback URL
     * @param string $statusCallbackEvent The status_callback_event
     * @param string $statusCallbackMethod HTTP Method to use with StatusCallback
     * @param string $sendDigits Digits to send
     * @param string $ifMachine Action to take if a machine has answered the call
     * @param string $timeout Number of seconds to wait for an answer
     * @param string $record Whether or not to record the Call
     * @param string $recordingChannels The recording_channels
     * @param string $recordingStatusCallback The recording_status_callback
     * @param string $recordingStatusCallbackMethod The
     *                                              recording_status_callback_method
     * @param string $sipAuthUsername The sip_auth_username
     * @param string $sipAuthPassword The sip_auth_password
     */
    public function __construct($url = Values::NONE, $applicationSid = Values::NONE, $method = Values::NONE, $fallbackUrl = Values::NONE, $fallbackMethod = Values::NONE, $statusCallback = Values::NONE, $statusCallbackEvent = Values::NONE, $statusCallbackMethod = Values::NONE, $sendDigits = Values::NONE, $ifMachine = Values::NONE, $timeout = Values::NONE, $record = Values::NONE, $recordingChannels = Values::NONE, $recordingStatusCallback = Values::NONE, $recordingStatusCallbackMethod = Values::NONE, $sipAuthUsername = Values::NONE, $sipAuthPassword = Values::NONE) {
        $this->options['url'] = $url;
        $this->options['applicationSid'] = $applicationSid;
        $this->options['method'] = $method;
        $this->options['fallbackUrl'] = $fallbackUrl;
        $this->options['fallbackMethod'] = $fallbackMethod;
        $this->options['statusCallback'] = $statusCallback;
        $this->options['statusCallbackEvent'] = $statusCallbackEvent;
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        $this->options['sendDigits'] = $sendDigits;
        $this->options['ifMachine'] = $ifMachine;
        $this->options['timeout'] = $timeout;
        $this->options['record'] = $record;
        $this->options['recordingChannels'] = $recordingChannels;
        $this->options['recordingStatusCallback'] = $recordingStatusCallback;
        $this->options['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;
        $this->options['sipAuthUsername'] = $sipAuthUsername;
        $this->options['sipAuthPassword'] = $sipAuthPassword;
    }

    /**
     * The fully qualified URL that should be consulted when the call connects. Just like when you set a URL on a phone number for handling inbound calls.
     * 
     * @param string $url Url from which to fetch TwiML
     * @return $this Fluent Builder
     */
    public function setUrl($url) {
        $this->options['url'] = $url;
        return $this;
    }

    /**
     * The 34 character sid of the application Twilio should use to handle this phone call. If this parameter is present, Twilio will ignore all of the voice URLs passed and use the URLs set on the application.
     * 
     * @param string $applicationSid ApplicationSid that configures from where to
     *                               fetch TwiML
     * @return $this Fluent Builder
     */
    public function setApplicationSid($applicationSid) {
        $this->options['applicationSid'] = $applicationSid;
        return $this;
    }

    /**
     * The HTTP method Twilio should use when requesting the URL. Defaults to `POST`. If an `ApplicationSid` was provided, this parameter is ignored.
     * 
     * @param string $method HTTP method to use to fetch TwiML
     * @return $this Fluent Builder
     */
    public function setMethod($method) {
        $this->options['method'] = $method;
        return $this;
    }

    /**
     * A URL that Twilio will request if an error occurs requesting or executing the TwiML at `Url`. If an `ApplicationSid` was provided, this parameter is ignored.
     * 
     * @param string $fallbackUrl Fallback URL in case of error
     * @return $this Fluent Builder
     */
    public function setFallbackUrl($fallbackUrl) {
        $this->options['fallbackUrl'] = $fallbackUrl;
        return $this;
    }

    /**
     * The HTTP method that Twilio should use to request the `FallbackUrl`. Must be either `GET` or `POST`. Defaults to `POST`. If an `ApplicationSid` was provided, this parameter is ignored.
     * 
     * @param string $fallbackMethod HTTP Method to use with FallbackUrl
     * @return $this Fluent Builder
     */
    public function setFallbackMethod($fallbackMethod) {
        $this->options['fallbackMethod'] = $fallbackMethod;
        return $this;
    }

    /**
     * A URL that Twilio will request when the call ends to notify your app. If an `ApplicationSid` was provided, this parameter is ignored.
     * 
     * @param string $statusCallback Status Callback URL
     * @return $this Fluent Builder
     */
    public function setStatusCallback($statusCallback) {
        $this->options['statusCallback'] = $statusCallback;
        return $this;
    }

    /**
     * The status_callback_event
     * 
     * @param string $statusCallbackEvent The status_callback_event
     * @return $this Fluent Builder
     */
    public function setStatusCallbackEvent($statusCallbackEvent) {
        $this->options['statusCallbackEvent'] = $statusCallbackEvent;
        return $this;
    }

    /**
     * The HTTP method that Twilio should use to request the `StatusCallback`. Defaults to `POST`. If an `ApplicationSid` was provided, this parameter is ignored.
     * 
     * @param string $statusCallbackMethod HTTP Method to use with StatusCallback
     * @return $this Fluent Builder
     */
    public function setStatusCallbackMethod($statusCallbackMethod) {
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        return $this;
    }

    /**
     * A string of keys to dial after connecting to the number. Valid digits in the string include: any digit (`0`-`9`), '`#`', '`*`' and '`w`' (to insert a half second pause). For example, if you connected to a company phone number, and wanted to pause for one second, dial extension 1234 and then the pound key, use `ww1234#`.
     * 
     * @param string $sendDigits Digits to send
     * @return $this Fluent Builder
     */
    public function setSendDigits($sendDigits) {
        $this->options['sendDigits'] = $sendDigits;
        return $this;
    }

    /**
     * Tell Twilio to try and determine if a machine (like voicemail) or a human has answered the call. Possible value are `Continue` and `Hangup`.
     * 
     * @param string $ifMachine Action to take if a machine has answered the call
     * @return $this Fluent Builder
     */
    public function setIfMachine($ifMachine) {
        $this->options['ifMachine'] = $ifMachine;
        return $this;
    }

    /**
     * The integer number of seconds that Twilio should allow the phone to ring before assuming there is no answer. Default is `60` seconds, the maximum is `999` seconds. Note, you could set this to a low value, such as `15`, to hangup before reaching an answering machine or voicemail.
     * 
     * @param string $timeout Number of seconds to wait for an answer
     * @return $this Fluent Builder
     */
    public function setTimeout($timeout) {
        $this->options['timeout'] = $timeout;
        return $this;
    }

    /**
     * Set this parameter to true to record the entirety of a phone call. The RecordingUrl will be sent to the StatusCallback URL. Defaults to false.
     * 
     * @param string $record Whether or not to record the Call
     * @return $this Fluent Builder
     */
    public function setRecord($record) {
        $this->options['record'] = $record;
        return $this;
    }

    /**
     * The recording_channels
     * 
     * @param string $recordingChannels The recording_channels
     * @return $this Fluent Builder
     */
    public function setRecordingChannels($recordingChannels) {
        $this->options['recordingChannels'] = $recordingChannels;
        return $this;
    }

    /**
     * The recording_status_callback
     * 
     * @param string $recordingStatusCallback The recording_status_callback
     * @return $this Fluent Builder
     */
    public function setRecordingStatusCallback($recordingStatusCallback) {
        $this->options['recordingStatusCallback'] = $recordingStatusCallback;
        return $this;
    }

    /**
     * The recording_status_callback_method
     * 
     * @param string $recordingStatusCallbackMethod The
     *                                              recording_status_callback_method
     * @return $this Fluent Builder
     */
    public function setRecordingStatusCallbackMethod($recordingStatusCallbackMethod) {
        $this->options['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;
        return $this;
    }

    /**
     * The sip_auth_username
     * 
     * @param string $sipAuthUsername The sip_auth_username
     * @return $this Fluent Builder
     */
    public function setSipAuthUsername($sipAuthUsername) {
        $this->options['sipAuthUsername'] = $sipAuthUsername;
        return $this;
    }

    /**
     * The sip_auth_password
     * 
     * @param string $sipAuthPassword The sip_auth_password
     * @return $this Fluent Builder
     */
    public function setSipAuthPassword($sipAuthPassword) {
        $this->options['sipAuthPassword'] = $sipAuthPassword;
        return $this;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Api.V2010.CreateCallOptions ' . implode(' ', $options) . ']';
    }
}

class ReadCallOptions extends Options {
    /**
     * @param string $to Phone number or Client identifier to filter `to` on
     * @param string $from Phone number or Client identifier to filter `from` on
     * @param string $parentCallSid Parent Call Sid to filter on
     * @param string $status Status to filter on
     * @param string $startTimeBefore StartTime to filter on
     * @param string $startTime StartTime to filter on
     * @param string $startTimeAfter StartTime to filter on
     * @param string $endTimeBefore EndTime to filter on
     * @param string $endTime EndTime to filter on
     * @param string $endTimeAfter EndTime to filter on
     */
    public function __construct($to = Values::NONE, $from = Values::NONE, $parentCallSid = Values::NONE, $status = Values::NONE, $startTimeBefore = Values::NONE, $startTime = Values::NONE, $startTimeAfter = Values::NONE, $endTimeBefore = Values::NONE, $endTime = Values::NONE, $endTimeAfter = Values::NONE) {
        $this->options['to'] = $to;
        $this->options['from'] = $from;
        $this->options['parentCallSid'] = $parentCallSid;
        $this->options['status'] = $status;
        $this->options['startTimeBefore'] = $startTimeBefore;
        $this->options['startTime'] = $startTime;
        $this->options['startTimeAfter'] = $startTimeAfter;
        $this->options['endTimeBefore'] = $endTimeBefore;
        $this->options['endTime'] = $endTime;
        $this->options['endTimeAfter'] = $endTimeAfter;
    }

    /**
     * Only show calls to this phone number or Client identifier
     * 
     * @param string $to Phone number or Client identifier to filter `to` on
     * @return $this Fluent Builder
     */
    public function setTo($to) {
        $this->options['to'] = $to;
        return $this;
    }

    /**
     * Only show calls from this phone number or Client identifier
     * 
     * @param string $from Phone number or Client identifier to filter `from` on
     * @return $this Fluent Builder
     */
    public function setFrom($from) {
        $this->options['from'] = $from;
        return $this;
    }

    /**
     * Only show calls spawned by the call with this Sid
     * 
     * @param string $parentCallSid Parent Call Sid to filter on
     * @return $this Fluent Builder
     */
    public function setParentCallSid($parentCallSid) {
        $this->options['parentCallSid'] = $parentCallSid;
        return $this;
    }

    /**
     * Only show calls currently in this status
     * 
     * @param string $status Status to filter on
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * Only show calls that started on this date
     * 
     * @param string $startTimeBefore StartTime to filter on
     * @return $this Fluent Builder
     */
    public function setStartTimeBefore($startTimeBefore) {
        $this->options['startTimeBefore'] = $startTimeBefore;
        return $this;
    }

    /**
     * Only show calls that started on this date
     * 
     * @param string $startTime StartTime to filter on
     * @return $this Fluent Builder
     */
    public function setStartTime($startTime) {
        $this->options['startTime'] = $startTime;
        return $this;
    }

    /**
     * Only show calls that started on this date
     * 
     * @param string $startTimeAfter StartTime to filter on
     * @return $this Fluent Builder
     */
    public function setStartTimeAfter($startTimeAfter) {
        $this->options['startTimeAfter'] = $startTimeAfter;
        return $this;
    }

    /**
     * Only show call that ended on this date
     * 
     * @param string $endTimeBefore EndTime to filter on
     * @return $this Fluent Builder
     */
    public function setEndTimeBefore($endTimeBefore) {
        $this->options['endTimeBefore'] = $endTimeBefore;
        return $this;
    }

    /**
     * Only show call that ended on this date
     * 
     * @param string $endTime EndTime to filter on
     * @return $this Fluent Builder
     */
    public function setEndTime($endTime) {
        $this->options['endTime'] = $endTime;
        return $this;
    }

    /**
     * Only show call that ended on this date
     * 
     * @param string $endTimeAfter EndTime to filter on
     * @return $this Fluent Builder
     */
    public function setEndTimeAfter($endTimeAfter) {
        $this->options['endTimeAfter'] = $endTimeAfter;
        return $this;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Api.V2010.ReadCallOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateCallOptions extends Options {
    /**
     * @param string $url URL that returns TwiML
     * @param string $method HTTP method to use to fetch TwiML
     * @param string $status Status to update the Call with
     * @param string $fallbackUrl Fallback URL in case of error
     * @param string $fallbackMethod HTTP Method to use with FallbackUrl
     * @param string $statusCallback Status Callback URL
     * @param string $statusCallbackMethod HTTP Method to use with StatusCallback
     */
    public function __construct($url = Values::NONE, $method = Values::NONE, $status = Values::NONE, $fallbackUrl = Values::NONE, $fallbackMethod = Values::NONE, $statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE) {
        $this->options['url'] = $url;
        $this->options['method'] = $method;
        $this->options['status'] = $status;
        $this->options['fallbackUrl'] = $fallbackUrl;
        $this->options['fallbackMethod'] = $fallbackMethod;
        $this->options['statusCallback'] = $statusCallback;
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
    }

    /**
     * A valid URL that returns TwiML. Twilio will immediately redirect the call to the new TwiML upon execution.
     * 
     * @param string $url URL that returns TwiML
     * @return $this Fluent Builder
     */
    public function setUrl($url) {
        $this->options['url'] = $url;
        return $this;
    }

    /**
     * The HTTP method Twilio should use when requesting the URL. Defaults to `POST`.
     * 
     * @param string $method HTTP method to use to fetch TwiML
     * @return $this Fluent Builder
     */
    public function setMethod($method) {
        $this->options['method'] = $method;
        return $this;
    }

    /**
     * Either `canceled` or `completed`. Specifying `canceled` will attempt to hangup calls that are queued or ringing but not affect calls already in progress. Specifying `completed` will attempt to hang up a call even if it's already in progress.
     * 
     * @param string $status Status to update the Call with
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * A URL that Twilio will request if an error occurs requesting or executing the TwiML at `Url`.
     * 
     * @param string $fallbackUrl Fallback URL in case of error
     * @return $this Fluent Builder
     */
    public function setFallbackUrl($fallbackUrl) {
        $this->options['fallbackUrl'] = $fallbackUrl;
        return $this;
    }

    /**
     * The HTTP method that Twilio should use to request the `FallbackUrl`. Must be either `GET` or `POST`. Defaults to `POST`.
     * 
     * @param string $fallbackMethod HTTP Method to use with FallbackUrl
     * @return $this Fluent Builder
     */
    public function setFallbackMethod($fallbackMethod) {
        $this->options['fallbackMethod'] = $fallbackMethod;
        return $this;
    }

    /**
     * A URL that Twilio will request when the call ends to notify your app.
     * 
     * @param string $statusCallback Status Callback URL
     * @return $this Fluent Builder
     */
    public function setStatusCallback($statusCallback) {
        $this->options['statusCallback'] = $statusCallback;
        return $this;
    }

    /**
     * The HTTP method that Twilio should use to request the `StatusCallback`. Defaults to `POST`.
     * 
     * @param string $statusCallbackMethod HTTP Method to use with StatusCallback
     * @return $this Fluent Builder
     */
    public function setStatusCallbackMethod($statusCallbackMethod) {
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        return $this;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Api.V2010.UpdateCallOptions ' . implode(' ', $options) . ']';
    }
}