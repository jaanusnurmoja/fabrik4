<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Api\V2010;

/**
 * @property \Twilio\Rest\Api\V2010 v2010
 * @property \Twilio\Rest\Api\V2010\AccountList accounts
 * @property \Twilio\Rest\Api\V2010\AccountContext account
 * @property \Twilio\Rest\Api\V2010\Account\AddressList addresses
 * @property \Twilio\Rest\Api\V2010\Account\ApplicationList applications
 * @property \Twilio\Rest\Api\V2010\Account\AuthorizedConnectAppList authorizedConnectApps
 * @property \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountryList availablePhoneNumbers
 * @property \Twilio\Rest\Api\V2010\Account\CallList calls
 * @property \Twilio\Rest\Api\V2010\Account\ConferenceList conferences
 * @property \Twilio\Rest\Api\V2010\Account\ConnectAppList connectApps
 * @property \Twilio\Rest\Api\V2010\Account\IncomingPhoneNumberList incomingPhoneNumbers
 * @property \Twilio\Rest\Api\V2010\Account\KeyList keys
 * @property \Twilio\Rest\Api\V2010\Account\MessageList messages
 * @property \Twilio\Rest\Api\V2010\Account\NewKeyList newKeys
 * @property \Twilio\Rest\Api\V2010\Account\NewSigningKeyList newSigningKeys
 * @property \Twilio\Rest\Api\V2010\Account\NotificationList notifications
 * @property \Twilio\Rest\Api\V2010\Account\OutgoingCallerIdList outgoingCallerIds
 * @property \Twilio\Rest\Api\V2010\Account\QueueList queues
 * @property \Twilio\Rest\Api\V2010\Account\RecordingList recordings
 * @property \Twilio\Rest\Api\V2010\Account\SandboxList sandbox
 * @property \Twilio\Rest\Api\V2010\Account\SigningKeyList signingKeys
 * @property \Twilio\Rest\Api\V2010\Account\SipList sip
 * @property \Twilio\Rest\Api\V2010\Account\ShortCodeList shortCodes
 * @property \Twilio\Rest\Api\V2010\Account\TokenList tokens
 * @property \Twilio\Rest\Api\V2010\Account\TranscriptionList transcriptions
 * @property \Twilio\Rest\Api\V2010\Account\UsageList usage
 * @property \Twilio\Rest\Api\V2010\Account\ValidationRequestList validationRequests
 * @method \Twilio\Rest\Api\V2010\Account\AddressContext addresses(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\ApplicationContext applications(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\AuthorizedConnectAppContext authorizedConnectApps(string $connectAppSid)
 * @method \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountryContext availablePhoneNumbers(string $countryCode)
 * @method \Twilio\Rest\Api\V2010\Account\CallContext calls(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\ConferenceContext conferences(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\ConnectAppContext connectApps(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\IncomingPhoneNumberContext incomingPhoneNumbers(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\KeyContext keys(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\MessageContext messages(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\NotificationContext notifications(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\OutgoingCallerIdContext outgoingCallerIds(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\QueueContext queues(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\RecordingContext recordings(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\SandboxContext sandbox()
 * @method \Twilio\Rest\Api\V2010\Account\SigningKeyContext signingKeys(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\ShortCodeContext shortCodes(string $sid)
 * @method \Twilio\Rest\Api\V2010\Account\TranscriptionContext transcriptions(string $sid)
 * @method \Twilio\Rest\Api\V2010\AccountContext accounts(string $sid)
 */
class Api extends Domain {
    protected $_v2010 = null;

    /**
     * Construct the Api Domain
     * 
     * @param \Twilio\Rest\Client $client Twilio\Rest\Client to communicate with
     *                                    Twilio
     * @return \Twilio\Rest\Api Domain for Api
     */
    public function __construct(Client $client) {
        parent::__construct($client);
        
        $this->baseUrl = 'https://api.twilio.com';
    }

    /**
     * @return \Twilio\Rest\Api\V2010 Version v2010 of api
     */
    protected function getV2010() {
        if (!$this->_v2010) {
            $this->_v2010 = new V2010($this);
        }
        return $this->_v2010;
    }

    /**
     * Magic getter to lazy load version
     * 
     * @param string $name Version to return
     * @return \Twilio\Version The requested version
     * @throws \Twilio\Exceptions\TwilioException For unknown versions
     */
    public function __get($name) {
        $method = 'get' . ucfirst($name);
        if (method_exists($this, $method)) {
            return $this->$method();
        }
        
        throw new TwilioException('Unknown version ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     * 
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws \Twilio\Exceptions\TwilioException For unknown resource
     */
    public function __call($name, $arguments) {
        $method = 'context' . ucfirst($name);
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $arguments);
        }
        
        throw new TwilioException('Unknown context ' . $name);
    }

    /**
     * @return \Twilio\Rest\Api\V2010\AccountContext Account provided as the
     *                                               authenticating account
     */
    protected function getAccount() {
        return $this->v2010->account;
    }

    /**
     * @return \Twilio\Rest\Api\V2010\AccountList 
     */
    protected function getAccounts() {
        return $this->v2010->accounts;
    }

    /**
     * @param string $sid Fetch by unique Account Sid
     * @return \Twilio\Rest\Api\V2010\AccountContext 
     */
    protected function contextAccounts($sid) {
        return $this->v2010->accounts($sid);
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\AddressList 
     */
    protected function getAddresses() {
        return $this->v2010->account->addresses;
    }

    /**
     * @param string $sid The sid
     * @return \Twilio\Rest\Api\V2010\Account\AddressContext 
     */
    protected function contextAddresses($sid) {
        return $this->v2010->account->addresses($sid);
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\ApplicationList 
     */
    protected function getApplications() {
        return $this->v2010->account->applications;
    }

    /**
     * @param string $sid Fetch by unique Application Sid
     * @return \Twilio\Rest\Api\V2010\Account\ApplicationContext 
     */
    protected function contextApplications($sid) {
        return $this->v2010->account->applications($sid);
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\AuthorizedConnectAppList 
     */
    protected function getAuthorizedConnectApps() {
        return $this->v2010->account->authorizedConnectApps;
    }

    /**
     * @param string $connectAppSid The connect_app_sid
     * @return \Twilio\Rest\Api\V2010\Account\AuthorizedConnectAppContext 
     */
    protected function contextAuthorizedConnectApps($connectAppSid) {
        return $this->v2010->account->authorizedConnectApps($connectAppSid);
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountryList 
     */
    protected function getAvailablePhoneNumbers() {
        return $this->v2010->account->availablePhoneNumbers;
    }

    /**
     * @param string $countryCode The country_code
     * @return \Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountryContext 
     */
    protected function contextAvailablePhoneNumbers($countryCode) {
        return $this->v2010->account->availablePhoneNumbers($countryCode);
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\CallList 
     */
    protected function getCalls() {
        return $this->v2010->account->calls;
    }

    /**
     * @param string $sid Call Sid that uniquely identifies the Call to fetch
     * @return \Twilio\Rest\Api\V2010\Account\CallContext 
     */
    protected function contextCalls($sid) {
        return $this->v2010->account->calls($sid);
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\ConferenceList 
     */
    protected function getConferences() {
        return $this->v2010->account->conferences;
    }

    /**
     * @param string $sid Fetch by unique conference Sid
     * @return \Twilio\Rest\Api\V2010\Account\ConferenceContext 
     */
    protected function contextConferences($sid) {
        return $this->v2010->account->conferences($sid);
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\ConnectAppList 
     */
    protected function getConnectApps() {
        return $this->v2010->account->connectApps;
    }

    /**
     * @param string $sid Fetch by unique connect-app Sid
     * @return \Twilio\Rest\Api\V2010\Account\ConnectAppContext 
     */
    protected function contextConnectApps($sid) {
        return $this->v2010->account->connectApps($sid);
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\IncomingPhoneNumberList 
     */
    protected function getIncomingPhoneNumbers() {
        return $this->v2010->account->incomingPhoneNumbers;
    }

    /**
     * @param string $sid Fetch by unique incoming-phone-number Sid
     * @return \Twilio\Rest\Api\V2010\Account\IncomingPhoneNumberContext 
     */
    protected function contextIncomingPhoneNumbers($sid) {
        return $this->v2010->account->incomingPhoneNumbers($sid);
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\KeyList 
     */
    protected function getKeys() {
        return $this->v2010->account->keys;
    }

    /**
     * @param string $sid The sid
     * @return \Twilio\Rest\Api\V2010\Account\KeyContext 
     */
    protected function contextKeys($sid) {
        return $this->v2010->account->keys($sid);
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\MessageList 
     */
    protected function getMessages() {
        return $this->v2010->account->messages;
    }

    /**
     * @param string $sid Fetch by unique message Sid
     * @return \Twilio\Rest\Api\V2010\Account\MessageContext 
     */
    protected function contextMessages($sid) {
        return $this->v2010->account->messages($sid);
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\NewKeyList 
     */
    protected function getNewKeys() {
        return $this->v2010->account->newKeys;
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\NewSigningKeyList 
     */
    protected function getNewSigningKeys() {
        return $this->v2010->account->newSigningKeys;
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\NotificationList 
     */
    protected function getNotifications() {
        return $this->v2010->account->notifications;
    }

    /**
     * @param string $sid Fetch by unique notification Sid
     * @return \Twilio\Rest\Api\V2010\Account\NotificationContext 
     */
    protected function contextNotifications($sid) {
        return $this->v2010->account->notifications($sid);
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\OutgoingCallerIdList 
     */
    protected function getOutgoingCallerIds() {
        return $this->v2010->account->outgoingCallerIds;
    }

    /**
     * @param string $sid Fetch by unique outgoing-caller-id Sid
     * @return \Twilio\Rest\Api\V2010\Account\OutgoingCallerIdContext 
     */
    protected function contextOutgoingCallerIds($sid) {
        return $this->v2010->account->outgoingCallerIds($sid);
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\QueueList 
     */
    protected function getQueues() {
        return $this->v2010->account->queues;
    }

    /**
     * @param string $sid Fetch by unique queue Sid
     * @return \Twilio\Rest\Api\V2010\Account\QueueContext 
     */
    protected function contextQueues($sid) {
        return $this->v2010->account->queues($sid);
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\RecordingList 
     */
    protected function getRecordings() {
        return $this->v2010->account->recordings;
    }

    /**
     * @param string $sid Fetch by unique recording Sid
     * @return \Twilio\Rest\Api\V2010\Account\RecordingContext 
     */
    protected function contextRecordings($sid) {
        return $this->v2010->account->recordings($sid);
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\SandboxList 
     */
    protected function getSandbox() {
        return $this->v2010->account->sandbox;
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\SandboxContext 
     */
    protected function contextSandbox() {
        return $this->v2010->account->sandbox();
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\SigningKeyList 
     */
    protected function getSigningKeys() {
        return $this->v2010->account->signingKeys;
    }

    /**
     * @param string $sid The sid
     * @return \Twilio\Rest\Api\V2010\Account\SigningKeyContext 
     */
    protected function contextSigningKeys($sid) {
        return $this->v2010->account->signingKeys($sid);
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\SipList 
     */
    protected function getSip() {
        return $this->v2010->account->sip;
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\ShortCodeList 
     */
    protected function getShortCodes() {
        return $this->v2010->account->shortCodes;
    }

    /**
     * @param string $sid Fetch by unique short-code Sid
     * @return \Twilio\Rest\Api\V2010\Account\ShortCodeContext 
     */
    protected function contextShortCodes($sid) {
        return $this->v2010->account->shortCodes($sid);
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\TokenList 
     */
    protected function getTokens() {
        return $this->v2010->account->tokens;
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\TranscriptionList 
     */
    protected function getTranscriptions() {
        return $this->v2010->account->transcriptions;
    }

    /**
     * @param string $sid Fetch by unique transcription Sid
     * @return \Twilio\Rest\Api\V2010\Account\TranscriptionContext 
     */
    protected function contextTranscriptions($sid) {
        return $this->v2010->account->transcriptions($sid);
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\UsageList 
     */
    protected function getUsage() {
        return $this->v2010->account->usage;
    }

    /**
     * @return \Twilio\Rest\Api\V2010\Account\ValidationRequestList 
     */
    protected function getValidationRequests() {
        return $this->v2010->account->validationRequests;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Api]';
    }
}