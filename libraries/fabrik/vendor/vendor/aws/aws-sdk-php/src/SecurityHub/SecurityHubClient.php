<?php
namespace Aws\SecurityHub;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS SecurityHub** service.
 * @method \Aws\Result acceptAdministratorInvitation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptAdministratorInvitationAsync(array $args = [])
 * @method \Aws\Result acceptInvitation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptInvitationAsync(array $args = [])
 * @method \Aws\Result batchDeleteAutomationRules(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteAutomationRulesAsync(array $args = [])
 * @method \Aws\Result batchDisableStandards(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDisableStandardsAsync(array $args = [])
 * @method \Aws\Result batchEnableStandards(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchEnableStandardsAsync(array $args = [])
 * @method \Aws\Result batchGetAutomationRules(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetAutomationRulesAsync(array $args = [])
 * @method \Aws\Result batchGetConfigurationPolicyAssociations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetConfigurationPolicyAssociationsAsync(array $args = [])
 * @method \Aws\Result batchGetSecurityControls(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetSecurityControlsAsync(array $args = [])
 * @method \Aws\Result batchGetStandardsControlAssociations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetStandardsControlAssociationsAsync(array $args = [])
 * @method \Aws\Result batchImportFindings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchImportFindingsAsync(array $args = [])
 * @method \Aws\Result batchUpdateAutomationRules(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateAutomationRulesAsync(array $args = [])
 * @method \Aws\Result batchUpdateFindings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateFindingsAsync(array $args = [])
 * @method \Aws\Result batchUpdateStandardsControlAssociations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateStandardsControlAssociationsAsync(array $args = [])
 * @method \Aws\Result createActionTarget(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createActionTargetAsync(array $args = [])
 * @method \Aws\Result createAutomationRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAutomationRuleAsync(array $args = [])
 * @method \Aws\Result createConfigurationPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfigurationPolicyAsync(array $args = [])
 * @method \Aws\Result createFindingAggregator(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createFindingAggregatorAsync(array $args = [])
 * @method \Aws\Result createInsight(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createInsightAsync(array $args = [])
 * @method \Aws\Result createMembers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createMembersAsync(array $args = [])
 * @method \Aws\Result declineInvitations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise declineInvitationsAsync(array $args = [])
 * @method \Aws\Result deleteActionTarget(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteActionTargetAsync(array $args = [])
 * @method \Aws\Result deleteConfigurationPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfigurationPolicyAsync(array $args = [])
 * @method \Aws\Result deleteFindingAggregator(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFindingAggregatorAsync(array $args = [])
 * @method \Aws\Result deleteInsight(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInsightAsync(array $args = [])
 * @method \Aws\Result deleteInvitations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInvitationsAsync(array $args = [])
 * @method \Aws\Result deleteMembers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMembersAsync(array $args = [])
 * @method \Aws\Result describeActionTargets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeActionTargetsAsync(array $args = [])
 * @method \Aws\Result describeHub(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeHubAsync(array $args = [])
 * @method \Aws\Result describeOrganizationConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOrganizationConfigurationAsync(array $args = [])
 * @method \Aws\Result describeProducts(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProductsAsync(array $args = [])
 * @method \Aws\Result describeStandards(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStandardsAsync(array $args = [])
 * @method \Aws\Result describeStandardsControls(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStandardsControlsAsync(array $args = [])
 * @method \Aws\Result disableImportFindingsForProduct(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disableImportFindingsForProductAsync(array $args = [])
 * @method \Aws\Result disableOrganizationAdminAccount(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disableOrganizationAdminAccountAsync(array $args = [])
 * @method \Aws\Result disableSecurityHub(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disableSecurityHubAsync(array $args = [])
 * @method \Aws\Result disassociateFromAdministratorAccount(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateFromAdministratorAccountAsync(array $args = [])
 * @method \Aws\Result disassociateFromMasterAccount(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateFromMasterAccountAsync(array $args = [])
 * @method \Aws\Result disassociateMembers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateMembersAsync(array $args = [])
 * @method \Aws\Result enableImportFindingsForProduct(array $args = [])
 * @method \GuzzleHttp\Promise\Promise enableImportFindingsForProductAsync(array $args = [])
 * @method \Aws\Result enableOrganizationAdminAccount(array $args = [])
 * @method \GuzzleHttp\Promise\Promise enableOrganizationAdminAccountAsync(array $args = [])
 * @method \Aws\Result enableSecurityHub(array $args = [])
 * @method \GuzzleHttp\Promise\Promise enableSecurityHubAsync(array $args = [])
 * @method \Aws\Result getAdministratorAccount(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAdministratorAccountAsync(array $args = [])
 * @method \Aws\Result getConfigurationPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfigurationPolicyAsync(array $args = [])
 * @method \Aws\Result getConfigurationPolicyAssociation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfigurationPolicyAssociationAsync(array $args = [])
 * @method \Aws\Result getEnabledStandards(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnabledStandardsAsync(array $args = [])
 * @method \Aws\Result getFindingAggregator(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getFindingAggregatorAsync(array $args = [])
 * @method \Aws\Result getFindingHistory(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getFindingHistoryAsync(array $args = [])
 * @method \Aws\Result getFindings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getFindingsAsync(array $args = [])
 * @method \Aws\Result getInsightResults(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getInsightResultsAsync(array $args = [])
 * @method \Aws\Result getInsights(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getInsightsAsync(array $args = [])
 * @method \Aws\Result getInvitationsCount(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getInvitationsCountAsync(array $args = [])
 * @method \Aws\Result getMasterAccount(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getMasterAccountAsync(array $args = [])
 * @method \Aws\Result getMembers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getMembersAsync(array $args = [])
 * @method \Aws\Result getSecurityControlDefinition(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSecurityControlDefinitionAsync(array $args = [])
 * @method \Aws\Result inviteMembers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise inviteMembersAsync(array $args = [])
 * @method \Aws\Result listAutomationRules(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutomationRulesAsync(array $args = [])
 * @method \Aws\Result listConfigurationPolicies(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfigurationPoliciesAsync(array $args = [])
 * @method \Aws\Result listConfigurationPolicyAssociations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfigurationPolicyAssociationsAsync(array $args = [])
 * @method \Aws\Result listEnabledProductsForImport(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnabledProductsForImportAsync(array $args = [])
 * @method \Aws\Result listFindingAggregators(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listFindingAggregatorsAsync(array $args = [])
 * @method \Aws\Result listInvitations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listInvitationsAsync(array $args = [])
 * @method \Aws\Result listMembers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listMembersAsync(array $args = [])
 * @method \Aws\Result listOrganizationAdminAccounts(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listOrganizationAdminAccountsAsync(array $args = [])
 * @method \Aws\Result listSecurityControlDefinitions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listSecurityControlDefinitionsAsync(array $args = [])
 * @method \Aws\Result listStandardsControlAssociations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listStandardsControlAssociationsAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result startConfigurationPolicyAssociation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startConfigurationPolicyAssociationAsync(array $args = [])
 * @method \Aws\Result startConfigurationPolicyDisassociation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startConfigurationPolicyDisassociationAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateActionTarget(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateActionTargetAsync(array $args = [])
 * @method \Aws\Result updateConfigurationPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConfigurationPolicyAsync(array $args = [])
 * @method \Aws\Result updateFindingAggregator(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFindingAggregatorAsync(array $args = [])
 * @method \Aws\Result updateFindings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFindingsAsync(array $args = [])
 * @method \Aws\Result updateInsight(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInsightAsync(array $args = [])
 * @method \Aws\Result updateOrganizationConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOrganizationConfigurationAsync(array $args = [])
 * @method \Aws\Result updateSecurityControl(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSecurityControlAsync(array $args = [])
 * @method \Aws\Result updateSecurityHubConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSecurityHubConfigurationAsync(array $args = [])
 * @method \Aws\Result updateStandardsControl(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStandardsControlAsync(array $args = [])
 */
class SecurityHubClient extends AwsClient {}
