<?php
namespace Aws\ChimeSDKVoice;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Chime SDK Voice** service.
 * @method \Aws\Result associatePhoneNumbersWithVoiceConnector(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associatePhoneNumbersWithVoiceConnectorAsync(array $args = [])
 * @method \Aws\Result associatePhoneNumbersWithVoiceConnectorGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associatePhoneNumbersWithVoiceConnectorGroupAsync(array $args = [])
 * @method \Aws\Result batchDeletePhoneNumber(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeletePhoneNumberAsync(array $args = [])
 * @method \Aws\Result batchUpdatePhoneNumber(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdatePhoneNumberAsync(array $args = [])
 * @method \Aws\Result createPhoneNumberOrder(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createPhoneNumberOrderAsync(array $args = [])
 * @method \Aws\Result createProxySession(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createProxySessionAsync(array $args = [])
 * @method \Aws\Result createSipMediaApplication(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createSipMediaApplicationAsync(array $args = [])
 * @method \Aws\Result createSipMediaApplicationCall(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createSipMediaApplicationCallAsync(array $args = [])
 * @method \Aws\Result createSipRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createSipRuleAsync(array $args = [])
 * @method \Aws\Result createVoiceConnector(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createVoiceConnectorAsync(array $args = [])
 * @method \Aws\Result createVoiceConnectorGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createVoiceConnectorGroupAsync(array $args = [])
 * @method \Aws\Result createVoiceProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createVoiceProfileAsync(array $args = [])
 * @method \Aws\Result createVoiceProfileDomain(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createVoiceProfileDomainAsync(array $args = [])
 * @method \Aws\Result deletePhoneNumber(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePhoneNumberAsync(array $args = [])
 * @method \Aws\Result deleteProxySession(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProxySessionAsync(array $args = [])
 * @method \Aws\Result deleteSipMediaApplication(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSipMediaApplicationAsync(array $args = [])
 * @method \Aws\Result deleteSipRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSipRuleAsync(array $args = [])
 * @method \Aws\Result deleteVoiceConnector(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorAsync(array $args = [])
 * @method \Aws\Result deleteVoiceConnectorEmergencyCallingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorEmergencyCallingConfigurationAsync(array $args = [])
 * @method \Aws\Result deleteVoiceConnectorGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorGroupAsync(array $args = [])
 * @method \Aws\Result deleteVoiceConnectorOrigination(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorOriginationAsync(array $args = [])
 * @method \Aws\Result deleteVoiceConnectorProxy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorProxyAsync(array $args = [])
 * @method \Aws\Result deleteVoiceConnectorStreamingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorStreamingConfigurationAsync(array $args = [])
 * @method \Aws\Result deleteVoiceConnectorTermination(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorTerminationAsync(array $args = [])
 * @method \Aws\Result deleteVoiceConnectorTerminationCredentials(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorTerminationCredentialsAsync(array $args = [])
 * @method \Aws\Result deleteVoiceProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceProfileAsync(array $args = [])
 * @method \Aws\Result deleteVoiceProfileDomain(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceProfileDomainAsync(array $args = [])
 * @method \Aws\Result disassociatePhoneNumbersFromVoiceConnector(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociatePhoneNumbersFromVoiceConnectorAsync(array $args = [])
 * @method \Aws\Result disassociatePhoneNumbersFromVoiceConnectorGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociatePhoneNumbersFromVoiceConnectorGroupAsync(array $args = [])
 * @method \Aws\Result getGlobalSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getGlobalSettingsAsync(array $args = [])
 * @method \Aws\Result getPhoneNumber(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getPhoneNumberAsync(array $args = [])
 * @method \Aws\Result getPhoneNumberOrder(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getPhoneNumberOrderAsync(array $args = [])
 * @method \Aws\Result getPhoneNumberSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getPhoneNumberSettingsAsync(array $args = [])
 * @method \Aws\Result getProxySession(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getProxySessionAsync(array $args = [])
 * @method \Aws\Result getSipMediaApplication(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSipMediaApplicationAsync(array $args = [])
 * @method \Aws\Result getSipMediaApplicationAlexaSkillConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSipMediaApplicationAlexaSkillConfigurationAsync(array $args = [])
 * @method \Aws\Result getSipMediaApplicationLoggingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSipMediaApplicationLoggingConfigurationAsync(array $args = [])
 * @method \Aws\Result getSipRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSipRuleAsync(array $args = [])
 * @method \Aws\Result getSpeakerSearchTask(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSpeakerSearchTaskAsync(array $args = [])
 * @method \Aws\Result getVoiceConnector(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorAsync(array $args = [])
 * @method \Aws\Result getVoiceConnectorEmergencyCallingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorEmergencyCallingConfigurationAsync(array $args = [])
 * @method \Aws\Result getVoiceConnectorGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorGroupAsync(array $args = [])
 * @method \Aws\Result getVoiceConnectorLoggingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorLoggingConfigurationAsync(array $args = [])
 * @method \Aws\Result getVoiceConnectorOrigination(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorOriginationAsync(array $args = [])
 * @method \Aws\Result getVoiceConnectorProxy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorProxyAsync(array $args = [])
 * @method \Aws\Result getVoiceConnectorStreamingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorStreamingConfigurationAsync(array $args = [])
 * @method \Aws\Result getVoiceConnectorTermination(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorTerminationAsync(array $args = [])
 * @method \Aws\Result getVoiceConnectorTerminationHealth(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorTerminationHealthAsync(array $args = [])
 * @method \Aws\Result getVoiceProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceProfileAsync(array $args = [])
 * @method \Aws\Result getVoiceProfileDomain(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceProfileDomainAsync(array $args = [])
 * @method \Aws\Result getVoiceToneAnalysisTask(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceToneAnalysisTaskAsync(array $args = [])
 * @method \Aws\Result listAvailableVoiceConnectorRegions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAvailableVoiceConnectorRegionsAsync(array $args = [])
 * @method \Aws\Result listPhoneNumberOrders(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPhoneNumberOrdersAsync(array $args = [])
 * @method \Aws\Result listPhoneNumbers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPhoneNumbersAsync(array $args = [])
 * @method \Aws\Result listProxySessions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listProxySessionsAsync(array $args = [])
 * @method \Aws\Result listSipMediaApplications(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listSipMediaApplicationsAsync(array $args = [])
 * @method \Aws\Result listSipRules(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listSipRulesAsync(array $args = [])
 * @method \Aws\Result listSupportedPhoneNumberCountries(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listSupportedPhoneNumberCountriesAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result listVoiceConnectorGroups(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listVoiceConnectorGroupsAsync(array $args = [])
 * @method \Aws\Result listVoiceConnectorTerminationCredentials(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listVoiceConnectorTerminationCredentialsAsync(array $args = [])
 * @method \Aws\Result listVoiceConnectors(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listVoiceConnectorsAsync(array $args = [])
 * @method \Aws\Result listVoiceProfileDomains(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listVoiceProfileDomainsAsync(array $args = [])
 * @method \Aws\Result listVoiceProfiles(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listVoiceProfilesAsync(array $args = [])
 * @method \Aws\Result putSipMediaApplicationAlexaSkillConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putSipMediaApplicationAlexaSkillConfigurationAsync(array $args = [])
 * @method \Aws\Result putSipMediaApplicationLoggingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putSipMediaApplicationLoggingConfigurationAsync(array $args = [])
 * @method \Aws\Result putVoiceConnectorEmergencyCallingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putVoiceConnectorEmergencyCallingConfigurationAsync(array $args = [])
 * @method \Aws\Result putVoiceConnectorLoggingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putVoiceConnectorLoggingConfigurationAsync(array $args = [])
 * @method \Aws\Result putVoiceConnectorOrigination(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putVoiceConnectorOriginationAsync(array $args = [])
 * @method \Aws\Result putVoiceConnectorProxy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putVoiceConnectorProxyAsync(array $args = [])
 * @method \Aws\Result putVoiceConnectorStreamingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putVoiceConnectorStreamingConfigurationAsync(array $args = [])
 * @method \Aws\Result putVoiceConnectorTermination(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putVoiceConnectorTerminationAsync(array $args = [])
 * @method \Aws\Result putVoiceConnectorTerminationCredentials(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putVoiceConnectorTerminationCredentialsAsync(array $args = [])
 * @method \Aws\Result restorePhoneNumber(array $args = [])
 * @method \GuzzleHttp\Promise\Promise restorePhoneNumberAsync(array $args = [])
 * @method \Aws\Result searchAvailablePhoneNumbers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise searchAvailablePhoneNumbersAsync(array $args = [])
 * @method \Aws\Result startSpeakerSearchTask(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startSpeakerSearchTaskAsync(array $args = [])
 * @method \Aws\Result startVoiceToneAnalysisTask(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startVoiceToneAnalysisTaskAsync(array $args = [])
 * @method \Aws\Result stopSpeakerSearchTask(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopSpeakerSearchTaskAsync(array $args = [])
 * @method \Aws\Result stopVoiceToneAnalysisTask(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopVoiceToneAnalysisTaskAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateGlobalSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGlobalSettingsAsync(array $args = [])
 * @method \Aws\Result updatePhoneNumber(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePhoneNumberAsync(array $args = [])
 * @method \Aws\Result updatePhoneNumberSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePhoneNumberSettingsAsync(array $args = [])
 * @method \Aws\Result updateProxySession(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProxySessionAsync(array $args = [])
 * @method \Aws\Result updateSipMediaApplication(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSipMediaApplicationAsync(array $args = [])
 * @method \Aws\Result updateSipMediaApplicationCall(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSipMediaApplicationCallAsync(array $args = [])
 * @method \Aws\Result updateSipRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSipRuleAsync(array $args = [])
 * @method \Aws\Result updateVoiceConnector(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVoiceConnectorAsync(array $args = [])
 * @method \Aws\Result updateVoiceConnectorGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVoiceConnectorGroupAsync(array $args = [])
 * @method \Aws\Result updateVoiceProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVoiceProfileAsync(array $args = [])
 * @method \Aws\Result updateVoiceProfileDomain(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVoiceProfileDomainAsync(array $args = [])
 * @method \Aws\Result validateE911Address(array $args = [])
 * @method \GuzzleHttp\Promise\Promise validateE911AddressAsync(array $args = [])
 */
class ChimeSDKVoiceClient extends AwsClient {}
