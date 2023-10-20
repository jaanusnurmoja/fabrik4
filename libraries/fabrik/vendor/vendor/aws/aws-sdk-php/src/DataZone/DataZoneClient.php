<?php
namespace Aws\DataZone;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon DataZone** service.
 * @method \Aws\Result acceptPredictions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptPredictionsAsync(array $args = [])
 * @method \Aws\Result acceptSubscriptionRequest(array $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptSubscriptionRequestAsync(array $args = [])
 * @method \Aws\Result cancelSubscription(array $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelSubscriptionAsync(array $args = [])
 * @method \Aws\Result createAsset(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssetAsync(array $args = [])
 * @method \Aws\Result createAssetRevision(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssetRevisionAsync(array $args = [])
 * @method \Aws\Result createAssetType(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssetTypeAsync(array $args = [])
 * @method \Aws\Result createDataSource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataSourceAsync(array $args = [])
 * @method \Aws\Result createDomain(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createDomainAsync(array $args = [])
 * @method \Aws\Result createEnvironment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentAsync(array $args = [])
 * @method \Aws\Result createEnvironmentProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentProfileAsync(array $args = [])
 * @method \Aws\Result createFormType(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createFormTypeAsync(array $args = [])
 * @method \Aws\Result createGlossary(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createGlossaryAsync(array $args = [])
 * @method \Aws\Result createGlossaryTerm(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createGlossaryTermAsync(array $args = [])
 * @method \Aws\Result createGroupProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createGroupProfileAsync(array $args = [])
 * @method \Aws\Result createListingChangeSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createListingChangeSetAsync(array $args = [])
 * @method \Aws\Result createProject(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createProjectAsync(array $args = [])
 * @method \Aws\Result createProjectMembership(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createProjectMembershipAsync(array $args = [])
 * @method \Aws\Result createSubscriptionGrant(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createSubscriptionGrantAsync(array $args = [])
 * @method \Aws\Result createSubscriptionRequest(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createSubscriptionRequestAsync(array $args = [])
 * @method \Aws\Result createSubscriptionTarget(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createSubscriptionTargetAsync(array $args = [])
 * @method \Aws\Result createUserProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserProfileAsync(array $args = [])
 * @method \Aws\Result deleteAsset(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssetAsync(array $args = [])
 * @method \Aws\Result deleteAssetType(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssetTypeAsync(array $args = [])
 * @method \Aws\Result deleteDataSource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataSourceAsync(array $args = [])
 * @method \Aws\Result deleteDomain(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainAsync(array $args = [])
 * @method \Aws\Result deleteEnvironment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array $args = [])
 * @method \Aws\Result deleteEnvironmentBlueprintConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentBlueprintConfigurationAsync(array $args = [])
 * @method \Aws\Result deleteEnvironmentProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentProfileAsync(array $args = [])
 * @method \Aws\Result deleteFormType(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFormTypeAsync(array $args = [])
 * @method \Aws\Result deleteGlossary(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGlossaryAsync(array $args = [])
 * @method \Aws\Result deleteGlossaryTerm(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGlossaryTermAsync(array $args = [])
 * @method \Aws\Result deleteListing(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteListingAsync(array $args = [])
 * @method \Aws\Result deleteProject(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProjectAsync(array $args = [])
 * @method \Aws\Result deleteProjectMembership(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProjectMembershipAsync(array $args = [])
 * @method \Aws\Result deleteSubscriptionGrant(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSubscriptionGrantAsync(array $args = [])
 * @method \Aws\Result deleteSubscriptionRequest(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSubscriptionRequestAsync(array $args = [])
 * @method \Aws\Result deleteSubscriptionTarget(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSubscriptionTargetAsync(array $args = [])
 * @method \Aws\Result getAsset(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssetAsync(array $args = [])
 * @method \Aws\Result getAssetType(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssetTypeAsync(array $args = [])
 * @method \Aws\Result getDataSource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataSourceAsync(array $args = [])
 * @method \Aws\Result getDataSourceRun(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataSourceRunAsync(array $args = [])
 * @method \Aws\Result getDomain(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainAsync(array $args = [])
 * @method \Aws\Result getEnvironment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentAsync(array $args = [])
 * @method \Aws\Result getEnvironmentBlueprint(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentBlueprintAsync(array $args = [])
 * @method \Aws\Result getEnvironmentBlueprintConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentBlueprintConfigurationAsync(array $args = [])
 * @method \Aws\Result getEnvironmentProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentProfileAsync(array $args = [])
 * @method \Aws\Result getFormType(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getFormTypeAsync(array $args = [])
 * @method \Aws\Result getGlossary(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getGlossaryAsync(array $args = [])
 * @method \Aws\Result getGlossaryTerm(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getGlossaryTermAsync(array $args = [])
 * @method \Aws\Result getGroupProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getGroupProfileAsync(array $args = [])
 * @method \Aws\Result getIamPortalLoginUrl(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getIamPortalLoginUrlAsync(array $args = [])
 * @method \Aws\Result getListing(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getListingAsync(array $args = [])
 * @method \Aws\Result getProject(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getProjectAsync(array $args = [])
 * @method \Aws\Result getSubscription(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSubscriptionAsync(array $args = [])
 * @method \Aws\Result getSubscriptionGrant(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSubscriptionGrantAsync(array $args = [])
 * @method \Aws\Result getSubscriptionRequestDetails(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSubscriptionRequestDetailsAsync(array $args = [])
 * @method \Aws\Result getSubscriptionTarget(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSubscriptionTargetAsync(array $args = [])
 * @method \Aws\Result getUserProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserProfileAsync(array $args = [])
 * @method \Aws\Result listAssetRevisions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetRevisionsAsync(array $args = [])
 * @method \Aws\Result listDataSourceRunActivities(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataSourceRunActivitiesAsync(array $args = [])
 * @method \Aws\Result listDataSourceRuns(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataSourceRunsAsync(array $args = [])
 * @method \Aws\Result listDataSources(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataSourcesAsync(array $args = [])
 * @method \Aws\Result listDomains(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainsAsync(array $args = [])
 * @method \Aws\Result listEnvironmentBlueprintConfigurations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentBlueprintConfigurationsAsync(array $args = [])
 * @method \Aws\Result listEnvironmentBlueprints(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentBlueprintsAsync(array $args = [])
 * @method \Aws\Result listEnvironmentProfiles(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentProfilesAsync(array $args = [])
 * @method \Aws\Result listEnvironments(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentsAsync(array $args = [])
 * @method \Aws\Result listNotifications(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listNotificationsAsync(array $args = [])
 * @method \Aws\Result listProjectMemberships(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listProjectMembershipsAsync(array $args = [])
 * @method \Aws\Result listProjects(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listProjectsAsync(array $args = [])
 * @method \Aws\Result listSubscriptionGrants(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listSubscriptionGrantsAsync(array $args = [])
 * @method \Aws\Result listSubscriptionRequests(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listSubscriptionRequestsAsync(array $args = [])
 * @method \Aws\Result listSubscriptionTargets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listSubscriptionTargetsAsync(array $args = [])
 * @method \Aws\Result listSubscriptions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listSubscriptionsAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result putEnvironmentBlueprintConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putEnvironmentBlueprintConfigurationAsync(array $args = [])
 * @method \Aws\Result rejectPredictions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectPredictionsAsync(array $args = [])
 * @method \Aws\Result rejectSubscriptionRequest(array $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectSubscriptionRequestAsync(array $args = [])
 * @method \Aws\Result revokeSubscription(array $args = [])
 * @method \GuzzleHttp\Promise\Promise revokeSubscriptionAsync(array $args = [])
 * @method \Aws\Result search(array $args = [])
 * @method \GuzzleHttp\Promise\Promise searchAsync(array $args = [])
 * @method \Aws\Result searchGroupProfiles(array $args = [])
 * @method \GuzzleHttp\Promise\Promise searchGroupProfilesAsync(array $args = [])
 * @method \Aws\Result searchListings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise searchListingsAsync(array $args = [])
 * @method \Aws\Result searchTypes(array $args = [])
 * @method \GuzzleHttp\Promise\Promise searchTypesAsync(array $args = [])
 * @method \Aws\Result searchUserProfiles(array $args = [])
 * @method \GuzzleHttp\Promise\Promise searchUserProfilesAsync(array $args = [])
 * @method \Aws\Result startDataSourceRun(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startDataSourceRunAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateDataSource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataSourceAsync(array $args = [])
 * @method \Aws\Result updateDomain(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDomainAsync(array $args = [])
 * @method \Aws\Result updateEnvironment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnvironmentAsync(array $args = [])
 * @method \Aws\Result updateEnvironmentProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnvironmentProfileAsync(array $args = [])
 * @method \Aws\Result updateGlossary(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGlossaryAsync(array $args = [])
 * @method \Aws\Result updateGlossaryTerm(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGlossaryTermAsync(array $args = [])
 * @method \Aws\Result updateGroupProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGroupProfileAsync(array $args = [])
 * @method \Aws\Result updateProject(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProjectAsync(array $args = [])
 * @method \Aws\Result updateSubscriptionGrantStatus(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSubscriptionGrantStatusAsync(array $args = [])
 * @method \Aws\Result updateSubscriptionRequest(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSubscriptionRequestAsync(array $args = [])
 * @method \Aws\Result updateSubscriptionTarget(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSubscriptionTargetAsync(array $args = [])
 * @method \Aws\Result updateUserProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserProfileAsync(array $args = [])
 */
class DataZoneClient extends AwsClient {}
