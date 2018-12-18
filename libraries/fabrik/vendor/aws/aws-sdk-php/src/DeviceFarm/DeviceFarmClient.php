<?php
namespace Aws\DeviceFarm;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon DeviceFarm** service.
 *
 * @method \Aws\Result createDevicePool(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createDevicePoolAsync(array $args = [])
 * @method \Aws\Result createInstanceProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createInstanceProfileAsync(array $args = [])
 * @method \Aws\Result createNetworkProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createNetworkProfileAsync(array $args = [])
 * @method \Aws\Result createProject(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createProjectAsync(array $args = [])
 * @method \Aws\Result createRemoteAccessSession(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createRemoteAccessSessionAsync(array $args = [])
 * @method \Aws\Result createUpload(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createUploadAsync(array $args = [])
 * @method \Aws\Result createVPCEConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createVPCEConfigurationAsync(array $args = [])
 * @method \Aws\Result deleteDevicePool(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDevicePoolAsync(array $args = [])
 * @method \Aws\Result deleteInstanceProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInstanceProfileAsync(array $args = [])
 * @method \Aws\Result deleteNetworkProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNetworkProfileAsync(array $args = [])
 * @method \Aws\Result deleteProject(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProjectAsync(array $args = [])
 * @method \Aws\Result deleteRemoteAccessSession(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRemoteAccessSessionAsync(array $args = [])
 * @method \Aws\Result deleteRun(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRunAsync(array $args = [])
 * @method \Aws\Result deleteUpload(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUploadAsync(array $args = [])
 * @method \Aws\Result deleteVPCEConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVPCEConfigurationAsync(array $args = [])
 * @method \Aws\Result getAccountSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountSettingsAsync(array $args = [])
 * @method \Aws\Result getDevice(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeviceAsync(array $args = [])
 * @method \Aws\Result getDeviceInstance(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeviceInstanceAsync(array $args = [])
 * @method \Aws\Result getDevicePool(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDevicePoolAsync(array $args = [])
 * @method \Aws\Result getDevicePoolCompatibility(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDevicePoolCompatibilityAsync(array $args = [])
 * @method \Aws\Result getInstanceProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getInstanceProfileAsync(array $args = [])
 * @method \Aws\Result getJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getJobAsync(array $args = [])
 * @method \Aws\Result getNetworkProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getNetworkProfileAsync(array $args = [])
 * @method \Aws\Result getOfferingStatus(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getOfferingStatusAsync(array $args = [])
 * @method \Aws\Result getProject(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getProjectAsync(array $args = [])
 * @method \Aws\Result getRemoteAccessSession(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getRemoteAccessSessionAsync(array $args = [])
 * @method \Aws\Result getRun(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getRunAsync(array $args = [])
 * @method \Aws\Result getSuite(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSuiteAsync(array $args = [])
 * @method \Aws\Result getTest(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getTestAsync(array $args = [])
 * @method \Aws\Result getUpload(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getUploadAsync(array $args = [])
 * @method \Aws\Result getVPCEConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVPCEConfigurationAsync(array $args = [])
 * @method \Aws\Result installToRemoteAccessSession(array $args = [])
 * @method \GuzzleHttp\Promise\Promise installToRemoteAccessSessionAsync(array $args = [])
 * @method \Aws\Result listArtifacts(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listArtifactsAsync(array $args = [])
 * @method \Aws\Result listDeviceInstances(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeviceInstancesAsync(array $args = [])
 * @method \Aws\Result listDevicePools(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listDevicePoolsAsync(array $args = [])
 * @method \Aws\Result listDevices(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listDevicesAsync(array $args = [])
 * @method \Aws\Result listInstanceProfiles(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listInstanceProfilesAsync(array $args = [])
 * @method \Aws\Result listJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @method \Aws\Result listNetworkProfiles(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listNetworkProfilesAsync(array $args = [])
 * @method \Aws\Result listOfferingPromotions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listOfferingPromotionsAsync(array $args = [])
 * @method \Aws\Result listOfferingTransactions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listOfferingTransactionsAsync(array $args = [])
 * @method \Aws\Result listOfferings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listOfferingsAsync(array $args = [])
 * @method \Aws\Result listProjects(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listProjectsAsync(array $args = [])
 * @method \Aws\Result listRemoteAccessSessions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listRemoteAccessSessionsAsync(array $args = [])
 * @method \Aws\Result listRuns(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listRunsAsync(array $args = [])
 * @method \Aws\Result listSamples(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listSamplesAsync(array $args = [])
 * @method \Aws\Result listSuites(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listSuitesAsync(array $args = [])
 * @method \Aws\Result listTests(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTestsAsync(array $args = [])
 * @method \Aws\Result listUniqueProblems(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listUniqueProblemsAsync(array $args = [])
 * @method \Aws\Result listUploads(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listUploadsAsync(array $args = [])
 * @method \Aws\Result listVPCEConfigurations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listVPCEConfigurationsAsync(array $args = [])
 * @method \Aws\Result purchaseOffering(array $args = [])
 * @method \GuzzleHttp\Promise\Promise purchaseOfferingAsync(array $args = [])
 * @method \Aws\Result renewOffering(array $args = [])
 * @method \GuzzleHttp\Promise\Promise renewOfferingAsync(array $args = [])
 * @method \Aws\Result scheduleRun(array $args = [])
 * @method \GuzzleHttp\Promise\Promise scheduleRunAsync(array $args = [])
 * @method \Aws\Result stopJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopJobAsync(array $args = [])
 * @method \Aws\Result stopRemoteAccessSession(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopRemoteAccessSessionAsync(array $args = [])
 * @method \Aws\Result stopRun(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopRunAsync(array $args = [])
 * @method \Aws\Result updateDeviceInstance(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDeviceInstanceAsync(array $args = [])
 * @method \Aws\Result updateDevicePool(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDevicePoolAsync(array $args = [])
 * @method \Aws\Result updateInstanceProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInstanceProfileAsync(array $args = [])
 * @method \Aws\Result updateNetworkProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNetworkProfileAsync(array $args = [])
 * @method \Aws\Result updateProject(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProjectAsync(array $args = [])
 * @method \Aws\Result updateUpload(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUploadAsync(array $args = [])
 * @method \Aws\Result updateVPCEConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVPCEConfigurationAsync(array $args = [])
 */
class DeviceFarmClient extends AwsClient {}