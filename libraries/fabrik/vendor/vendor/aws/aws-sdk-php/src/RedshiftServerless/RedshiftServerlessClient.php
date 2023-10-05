<?php
namespace Aws\RedshiftServerless;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Redshift Serverless** service.
 * @method \Aws\Result convertRecoveryPointToSnapshot(array $args = [])
 * @method \GuzzleHttp\Promise\Promise convertRecoveryPointToSnapshotAsync(array $args = [])
 * @method \Aws\Result createEndpointAccess(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createEndpointAccessAsync(array $args = [])
 * @method \Aws\Result createNamespace(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createNamespaceAsync(array $args = [])
 * @method \Aws\Result createSnapshot(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createSnapshotAsync(array $args = [])
 * @method \Aws\Result createUsageLimit(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createUsageLimitAsync(array $args = [])
 * @method \Aws\Result createWorkgroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkgroupAsync(array $args = [])
 * @method \Aws\Result deleteEndpointAccess(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEndpointAccessAsync(array $args = [])
 * @method \Aws\Result deleteNamespace(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNamespaceAsync(array $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @method \Aws\Result deleteSnapshot(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSnapshotAsync(array $args = [])
 * @method \Aws\Result deleteUsageLimit(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUsageLimitAsync(array $args = [])
 * @method \Aws\Result deleteWorkgroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkgroupAsync(array $args = [])
 * @method \Aws\Result getCredentials(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getCredentialsAsync(array $args = [])
 * @method \Aws\Result getEndpointAccess(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getEndpointAccessAsync(array $args = [])
 * @method \Aws\Result getNamespace(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getNamespaceAsync(array $args = [])
 * @method \Aws\Result getRecoveryPoint(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecoveryPointAsync(array $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @method \Aws\Result getSnapshot(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSnapshotAsync(array $args = [])
 * @method \Aws\Result getTableRestoreStatus(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableRestoreStatusAsync(array $args = [])
 * @method \Aws\Result getUsageLimit(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getUsageLimitAsync(array $args = [])
 * @method \Aws\Result getWorkgroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkgroupAsync(array $args = [])
 * @method \Aws\Result listEndpointAccess(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listEndpointAccessAsync(array $args = [])
 * @method \Aws\Result listNamespaces(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listNamespacesAsync(array $args = [])
 * @method \Aws\Result listRecoveryPoints(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecoveryPointsAsync(array $args = [])
 * @method \Aws\Result listSnapshots(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listSnapshotsAsync(array $args = [])
 * @method \Aws\Result listTableRestoreStatus(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTableRestoreStatusAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result listUsageLimits(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsageLimitsAsync(array $args = [])
 * @method \Aws\Result listWorkgroups(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkgroupsAsync(array $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @method \Aws\Result restoreFromRecoveryPoint(array $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreFromRecoveryPointAsync(array $args = [])
 * @method \Aws\Result restoreFromSnapshot(array $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreFromSnapshotAsync(array $args = [])
 * @method \Aws\Result restoreTableFromSnapshot(array $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreTableFromSnapshotAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateEndpointAccess(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEndpointAccessAsync(array $args = [])
 * @method \Aws\Result updateNamespace(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNamespaceAsync(array $args = [])
 * @method \Aws\Result updateSnapshot(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSnapshotAsync(array $args = [])
 * @method \Aws\Result updateUsageLimit(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUsageLimitAsync(array $args = [])
 * @method \Aws\Result updateWorkgroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkgroupAsync(array $args = [])
 */
class RedshiftServerlessClient extends AwsClient {}
