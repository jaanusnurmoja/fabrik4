<?php
namespace Aws\Iam;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Identity and Access Management (AWS IAM)** service.
 *
 * @method \Aws\Result addClientIDToOpenIDConnectProvider(array $args = [])
 * @method \GuzzleHttp\Promise\Promise addClientIDToOpenIDConnectProviderAsync(array $args = [])
 * @method \Aws\Result addRoleToInstanceProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise addRoleToInstanceProfileAsync(array $args = [])
 * @method \Aws\Result addUserToGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise addUserToGroupAsync(array $args = [])
 * @method \Aws\Result attachGroupPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise attachGroupPolicyAsync(array $args = [])
 * @method \Aws\Result attachRolePolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise attachRolePolicyAsync(array $args = [])
 * @method \Aws\Result attachUserPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise attachUserPolicyAsync(array $args = [])
 * @method \Aws\Result changePassword(array $args = [])
 * @method \GuzzleHttp\Promise\Promise changePasswordAsync(array $args = [])
 * @method \Aws\Result createAccessKey(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccessKeyAsync(array $args = [])
 * @method \Aws\Result createAccountAlias(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccountAliasAsync(array $args = [])
 * @method \Aws\Result createGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createGroupAsync(array $args = [])
 * @method \Aws\Result createInstanceProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createInstanceProfileAsync(array $args = [])
 * @method \Aws\Result createLoginProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createLoginProfileAsync(array $args = [])
 * @method \Aws\Result createOpenIDConnectProvider(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createOpenIDConnectProviderAsync(array $args = [])
 * @method \Aws\Result createPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createPolicyAsync(array $args = [])
 * @method \Aws\Result createPolicyVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createPolicyVersionAsync(array $args = [])
 * @method \Aws\Result createRole(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createRoleAsync(array $args = [])
 * @method \Aws\Result createSAMLProvider(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createSAMLProviderAsync(array $args = [])
 * @method \Aws\Result createServiceLinkedRole(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceLinkedRoleAsync(array $args = [])
 * @method \Aws\Result createServiceSpecificCredential(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceSpecificCredentialAsync(array $args = [])
 * @method \Aws\Result createUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserAsync(array $args = [])
 * @method \Aws\Result createVirtualMFADevice(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createVirtualMFADeviceAsync(array $args = [])
 * @method \Aws\Result deactivateMFADevice(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deactivateMFADeviceAsync(array $args = [])
 * @method \Aws\Result deleteAccessKey(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessKeyAsync(array $args = [])
 * @method \Aws\Result deleteAccountAlias(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccountAliasAsync(array $args = [])
 * @method \Aws\Result deleteAccountPasswordPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccountPasswordPolicyAsync(array $args = [])
 * @method \Aws\Result deleteGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGroupAsync(array $args = [])
 * @method \Aws\Result deleteGroupPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGroupPolicyAsync(array $args = [])
 * @method \Aws\Result deleteInstanceProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInstanceProfileAsync(array $args = [])
 * @method \Aws\Result deleteLoginProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLoginProfileAsync(array $args = [])
 * @method \Aws\Result deleteOpenIDConnectProvider(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOpenIDConnectProviderAsync(array $args = [])
 * @method \Aws\Result deletePolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePolicyAsync(array $args = [])
 * @method \Aws\Result deletePolicyVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePolicyVersionAsync(array $args = [])
 * @method \Aws\Result deleteRole(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRoleAsync(array $args = [])
 * @method \Aws\Result deleteRolePermissionsBoundary(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRolePermissionsBoundaryAsync(array $args = [])
 * @method \Aws\Result deleteRolePolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRolePolicyAsync(array $args = [])
 * @method \Aws\Result deleteSAMLProvider(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSAMLProviderAsync(array $args = [])
 * @method \Aws\Result deleteSSHPublicKey(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSSHPublicKeyAsync(array $args = [])
 * @method \Aws\Result deleteServerCertificate(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServerCertificateAsync(array $args = [])
 * @method \Aws\Result deleteServiceLinkedRole(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceLinkedRoleAsync(array $args = [])
 * @method \Aws\Result deleteServiceSpecificCredential(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceSpecificCredentialAsync(array $args = [])
 * @method \Aws\Result deleteSigningCertificate(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSigningCertificateAsync(array $args = [])
 * @method \Aws\Result deleteUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserAsync(array $args = [])
 * @method \Aws\Result deleteUserPermissionsBoundary(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserPermissionsBoundaryAsync(array $args = [])
 * @method \Aws\Result deleteUserPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserPolicyAsync(array $args = [])
 * @method \Aws\Result deleteVirtualMFADevice(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVirtualMFADeviceAsync(array $args = [])
 * @method \Aws\Result detachGroupPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise detachGroupPolicyAsync(array $args = [])
 * @method \Aws\Result detachRolePolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise detachRolePolicyAsync(array $args = [])
 * @method \Aws\Result detachUserPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise detachUserPolicyAsync(array $args = [])
 * @method \Aws\Result enableMFADevice(array $args = [])
 * @method \GuzzleHttp\Promise\Promise enableMFADeviceAsync(array $args = [])
 * @method \Aws\Result generateCredentialReport(array $args = [])
 * @method \GuzzleHttp\Promise\Promise generateCredentialReportAsync(array $args = [])
 * @method \Aws\Result generateOrganizationsAccessReport(array $args = [])
 * @method \GuzzleHttp\Promise\Promise generateOrganizationsAccessReportAsync(array $args = [])
 * @method \Aws\Result generateServiceLastAccessedDetails(array $args = [])
 * @method \GuzzleHttp\Promise\Promise generateServiceLastAccessedDetailsAsync(array $args = [])
 * @method \Aws\Result getAccessKeyLastUsed(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessKeyLastUsedAsync(array $args = [])
 * @method \Aws\Result getAccountAuthorizationDetails(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountAuthorizationDetailsAsync(array $args = [])
 * @method \Aws\Result getAccountPasswordPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountPasswordPolicyAsync(array $args = [])
 * @method \Aws\Result getAccountSummary(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountSummaryAsync(array $args = [])
 * @method \Aws\Result getContextKeysForCustomPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getContextKeysForCustomPolicyAsync(array $args = [])
 * @method \Aws\Result getContextKeysForPrincipalPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getContextKeysForPrincipalPolicyAsync(array $args = [])
 * @method \Aws\Result getCredentialReport(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getCredentialReportAsync(array $args = [])
 * @method \Aws\Result getGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getGroupAsync(array $args = [])
 * @method \Aws\Result getGroupPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getGroupPolicyAsync(array $args = [])
 * @method \Aws\Result getInstanceProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getInstanceProfileAsync(array $args = [])
 * @method \Aws\Result getLoginProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getLoginProfileAsync(array $args = [])
 * @method \Aws\Result getOpenIDConnectProvider(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getOpenIDConnectProviderAsync(array $args = [])
 * @method \Aws\Result getOrganizationsAccessReport(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getOrganizationsAccessReportAsync(array $args = [])
 * @method \Aws\Result getPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getPolicyAsync(array $args = [])
 * @method \Aws\Result getPolicyVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getPolicyVersionAsync(array $args = [])
 * @method \Aws\Result getRole(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getRoleAsync(array $args = [])
 * @method \Aws\Result getRolePolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getRolePolicyAsync(array $args = [])
 * @method \Aws\Result getSAMLProvider(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSAMLProviderAsync(array $args = [])
 * @method \Aws\Result getSSHPublicKey(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSSHPublicKeyAsync(array $args = [])
 * @method \Aws\Result getServerCertificate(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getServerCertificateAsync(array $args = [])
 * @method \Aws\Result getServiceLastAccessedDetails(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceLastAccessedDetailsAsync(array $args = [])
 * @method \Aws\Result getServiceLastAccessedDetailsWithEntities(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceLastAccessedDetailsWithEntitiesAsync(array $args = [])
 * @method \Aws\Result getServiceLinkedRoleDeletionStatus(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceLinkedRoleDeletionStatusAsync(array $args = [])
 * @method \Aws\Result getUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserAsync(array $args = [])
 * @method \Aws\Result getUserPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserPolicyAsync(array $args = [])
 * @method \Aws\Result listAccessKeys(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessKeysAsync(array $args = [])
 * @method \Aws\Result listAccountAliases(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountAliasesAsync(array $args = [])
 * @method \Aws\Result listAttachedGroupPolicies(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAttachedGroupPoliciesAsync(array $args = [])
 * @method \Aws\Result listAttachedRolePolicies(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAttachedRolePoliciesAsync(array $args = [])
 * @method \Aws\Result listAttachedUserPolicies(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAttachedUserPoliciesAsync(array $args = [])
 * @method \Aws\Result listEntitiesForPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listEntitiesForPolicyAsync(array $args = [])
 * @method \Aws\Result listGroupPolicies(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupPoliciesAsync(array $args = [])
 * @method \Aws\Result listGroups(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupsAsync(array $args = [])
 * @method \Aws\Result listGroupsForUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listGroupsForUserAsync(array $args = [])
 * @method \Aws\Result listInstanceProfiles(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listInstanceProfilesAsync(array $args = [])
 * @method \Aws\Result listInstanceProfilesForRole(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listInstanceProfilesForRoleAsync(array $args = [])
 * @method \Aws\Result listMFADevices(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listMFADevicesAsync(array $args = [])
 * @method \Aws\Result listOpenIDConnectProviders(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listOpenIDConnectProvidersAsync(array $args = [])
 * @method \Aws\Result listPolicies(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPoliciesAsync(array $args = [])
 * @method \Aws\Result listPoliciesGrantingServiceAccess(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPoliciesGrantingServiceAccessAsync(array $args = [])
 * @method \Aws\Result listPolicyVersions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPolicyVersionsAsync(array $args = [])
 * @method \Aws\Result listRolePolicies(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listRolePoliciesAsync(array $args = [])
 * @method \Aws\Result listRoleTags(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listRoleTagsAsync(array $args = [])
 * @method \Aws\Result listRoles(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listRolesAsync(array $args = [])
 * @method \Aws\Result listSAMLProviders(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listSAMLProvidersAsync(array $args = [])
 * @method \Aws\Result listSSHPublicKeys(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listSSHPublicKeysAsync(array $args = [])
 * @method \Aws\Result listServerCertificates(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listServerCertificatesAsync(array $args = [])
 * @method \Aws\Result listServiceSpecificCredentials(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceSpecificCredentialsAsync(array $args = [])
 * @method \Aws\Result listSigningCertificates(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listSigningCertificatesAsync(array $args = [])
 * @method \Aws\Result listUserPolicies(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listUserPoliciesAsync(array $args = [])
 * @method \Aws\Result listUserTags(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listUserTagsAsync(array $args = [])
 * @method \Aws\Result listUsers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsersAsync(array $args = [])
 * @method \Aws\Result listVirtualMFADevices(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listVirtualMFADevicesAsync(array $args = [])
 * @method \Aws\Result putGroupPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putGroupPolicyAsync(array $args = [])
 * @method \Aws\Result putRolePermissionsBoundary(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putRolePermissionsBoundaryAsync(array $args = [])
 * @method \Aws\Result putRolePolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putRolePolicyAsync(array $args = [])
 * @method \Aws\Result putUserPermissionsBoundary(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putUserPermissionsBoundaryAsync(array $args = [])
 * @method \Aws\Result putUserPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putUserPolicyAsync(array $args = [])
 * @method \Aws\Result removeClientIDFromOpenIDConnectProvider(array $args = [])
 * @method \GuzzleHttp\Promise\Promise removeClientIDFromOpenIDConnectProviderAsync(array $args = [])
 * @method \Aws\Result removeRoleFromInstanceProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise removeRoleFromInstanceProfileAsync(array $args = [])
 * @method \Aws\Result removeUserFromGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise removeUserFromGroupAsync(array $args = [])
 * @method \Aws\Result resetServiceSpecificCredential(array $args = [])
 * @method \GuzzleHttp\Promise\Promise resetServiceSpecificCredentialAsync(array $args = [])
 * @method \Aws\Result resyncMFADevice(array $args = [])
 * @method \GuzzleHttp\Promise\Promise resyncMFADeviceAsync(array $args = [])
 * @method \Aws\Result setDefaultPolicyVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise setDefaultPolicyVersionAsync(array $args = [])
 * @method \Aws\Result setSecurityTokenServicePreferences(array $args = [])
 * @method \GuzzleHttp\Promise\Promise setSecurityTokenServicePreferencesAsync(array $args = [])
 * @method \Aws\Result simulateCustomPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise simulateCustomPolicyAsync(array $args = [])
 * @method \Aws\Result simulatePrincipalPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise simulatePrincipalPolicyAsync(array $args = [])
 * @method \Aws\Result tagRole(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagRoleAsync(array $args = [])
 * @method \Aws\Result tagUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagUserAsync(array $args = [])
 * @method \Aws\Result untagRole(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagRoleAsync(array $args = [])
 * @method \Aws\Result untagUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagUserAsync(array $args = [])
 * @method \Aws\Result updateAccessKey(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccessKeyAsync(array $args = [])
 * @method \Aws\Result updateAccountPasswordPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountPasswordPolicyAsync(array $args = [])
 * @method \Aws\Result updateAssumeRolePolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssumeRolePolicyAsync(array $args = [])
 * @method \Aws\Result updateGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGroupAsync(array $args = [])
 * @method \Aws\Result updateLoginProfile(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLoginProfileAsync(array $args = [])
 * @method \Aws\Result updateOpenIDConnectProviderThumbprint(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOpenIDConnectProviderThumbprintAsync(array $args = [])
 * @method \Aws\Result updateRole(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRoleAsync(array $args = [])
 * @method \Aws\Result updateRoleDescription(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRoleDescriptionAsync(array $args = [])
 * @method \Aws\Result updateSAMLProvider(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSAMLProviderAsync(array $args = [])
 * @method \Aws\Result updateSSHPublicKey(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSSHPublicKeyAsync(array $args = [])
 * @method \Aws\Result updateServerCertificate(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServerCertificateAsync(array $args = [])
 * @method \Aws\Result updateServiceSpecificCredential(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceSpecificCredentialAsync(array $args = [])
 * @method \Aws\Result updateSigningCertificate(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSigningCertificateAsync(array $args = [])
 * @method \Aws\Result updateUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserAsync(array $args = [])
 * @method \Aws\Result uploadSSHPublicKey(array $args = [])
 * @method \GuzzleHttp\Promise\Promise uploadSSHPublicKeyAsync(array $args = [])
 * @method \Aws\Result uploadServerCertificate(array $args = [])
 * @method \GuzzleHttp\Promise\Promise uploadServerCertificateAsync(array $args = [])
 * @method \Aws\Result uploadSigningCertificate(array $args = [])
 * @method \GuzzleHttp\Promise\Promise uploadSigningCertificateAsync(array $args = [])
 */
class IamClient extends AwsClient {}
