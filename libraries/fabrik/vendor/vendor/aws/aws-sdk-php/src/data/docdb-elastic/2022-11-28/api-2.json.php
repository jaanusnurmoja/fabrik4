<?php
// This file was auto-generated from sdk-root/src/data/docdb-elastic/2022-11-28/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2022-11-28', 'endpointPrefix' => 'docdb-elastic', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceAbbreviation' => 'DocDB Elastic', 'serviceFullName' => 'Amazon DocumentDB Elastic Clusters', 'serviceId' => 'DocDB Elastic', 'signatureVersion' => 'v4', 'signingName' => 'docdb-elastic', 'uid' => 'docdb-elastic-2022-11-28', ], 'operations' => [ 'CreateCluster' => [ 'name' => 'CreateCluster', 'http' => [ 'method' => 'POST', 'requestUri' => '/cluster', 'responseCode' => 200, ], 'input' => [ 'shape' => 'CreateClusterInput', ], 'output' => [ 'shape' => 'CreateClusterOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], ], 'idempotent' => true, ], 'CreateClusterSnapshot' => [ 'name' => 'CreateClusterSnapshot', 'http' => [ 'method' => 'POST', 'requestUri' => '/cluster-snapshot', 'responseCode' => 200, ], 'input' => [ 'shape' => 'CreateClusterSnapshotInput', ], 'output' => [ 'shape' => 'CreateClusterSnapshotOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'AccessDeniedException', ], ], 'idempotent' => true, ], 'DeleteCluster' => [ 'name' => 'DeleteCluster', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/cluster/{clusterArn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DeleteClusterInput', ], 'output' => [ 'shape' => 'DeleteClusterOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'AccessDeniedException', ], ], 'idempotent' => true, ], 'DeleteClusterSnapshot' => [ 'name' => 'DeleteClusterSnapshot', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/cluster-snapshot/{snapshotArn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DeleteClusterSnapshotInput', ], 'output' => [ 'shape' => 'DeleteClusterSnapshotOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'AccessDeniedException', ], ], 'idempotent' => true, ], 'GetCluster' => [ 'name' => 'GetCluster', 'http' => [ 'method' => 'GET', 'requestUri' => '/cluster/{clusterArn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetClusterInput', ], 'output' => [ 'shape' => 'GetClusterOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'AccessDeniedException', ], ], ], 'GetClusterSnapshot' => [ 'name' => 'GetClusterSnapshot', 'http' => [ 'method' => 'GET', 'requestUri' => '/cluster-snapshot/{snapshotArn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetClusterSnapshotInput', ], 'output' => [ 'shape' => 'GetClusterSnapshotOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'AccessDeniedException', ], ], ], 'ListClusterSnapshots' => [ 'name' => 'ListClusterSnapshots', 'http' => [ 'method' => 'GET', 'requestUri' => '/cluster-snapshots', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListClusterSnapshotsInput', ], 'output' => [ 'shape' => 'ListClusterSnapshotsOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], ], ], 'ListClusters' => [ 'name' => 'ListClusters', 'http' => [ 'method' => 'GET', 'requestUri' => '/clusters', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListClustersInput', ], 'output' => [ 'shape' => 'ListClustersOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], ], ], 'ListTagsForResource' => [ 'name' => 'ListTagsForResource', 'http' => [ 'method' => 'GET', 'requestUri' => '/tags/{resourceArn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListTagsForResourceRequest', ], 'output' => [ 'shape' => 'ListTagsForResourceResponse', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'RestoreClusterFromSnapshot' => [ 'name' => 'RestoreClusterFromSnapshot', 'http' => [ 'method' => 'POST', 'requestUri' => '/cluster-snapshot/{snapshotArn}/restore', 'responseCode' => 200, ], 'input' => [ 'shape' => 'RestoreClusterFromSnapshotInput', ], 'output' => [ 'shape' => 'RestoreClusterFromSnapshotOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'AccessDeniedException', ], ], 'idempotent' => true, ], 'TagResource' => [ 'name' => 'TagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/tags/{resourceArn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'TagResourceRequest', ], 'output' => [ 'shape' => 'TagResourceResponse', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'UntagResource' => [ 'name' => 'UntagResource', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/tags/{resourceArn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'UntagResourceRequest', ], 'output' => [ 'shape' => 'UntagResourceResponse', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'idempotent' => true, ], 'UpdateCluster' => [ 'name' => 'UpdateCluster', 'http' => [ 'method' => 'PUT', 'requestUri' => '/cluster/{clusterArn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'UpdateClusterInput', ], 'output' => [ 'shape' => 'UpdateClusterOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'AccessDeniedException', ], ], 'idempotent' => true, ], ], 'shapes' => [ 'AccessDeniedException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 403, 'senderFault' => true, ], 'exception' => true, ], 'Arn' => [ 'type' => 'string', 'max' => 1011, 'min' => 1, ], 'Auth' => [ 'type' => 'string', 'enum' => [ 'PLAIN_TEXT', 'SECRET_ARN', ], ], 'Cluster' => [ 'type' => 'structure', 'required' => [ 'adminUserName', 'authType', 'clusterArn', 'clusterEndpoint', 'clusterName', 'createTime', 'kmsKeyId', 'preferredMaintenanceWindow', 'shardCapacity', 'shardCount', 'status', 'subnetIds', 'vpcSecurityGroupIds', ], 'members' => [ 'adminUserName' => [ 'shape' => 'String', ], 'authType' => [ 'shape' => 'Auth', ], 'clusterArn' => [ 'shape' => 'String', ], 'clusterEndpoint' => [ 'shape' => 'String', ], 'clusterName' => [ 'shape' => 'String', ], 'createTime' => [ 'shape' => 'String', ], 'kmsKeyId' => [ 'shape' => 'String', ], 'preferredMaintenanceWindow' => [ 'shape' => 'String', ], 'shardCapacity' => [ 'shape' => 'Integer', ], 'shardCount' => [ 'shape' => 'Integer', ], 'status' => [ 'shape' => 'Status', ], 'subnetIds' => [ 'shape' => 'StringList', ], 'vpcSecurityGroupIds' => [ 'shape' => 'StringList', ], ], ], 'ClusterInList' => [ 'type' => 'structure', 'required' => [ 'clusterArn', 'clusterName', 'status', ], 'members' => [ 'clusterArn' => [ 'shape' => 'String', ], 'clusterName' => [ 'shape' => 'String', ], 'status' => [ 'shape' => 'Status', ], ], ], 'ClusterList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ClusterInList', ], ], 'ClusterSnapshot' => [ 'type' => 'structure', 'required' => [ 'adminUserName', 'clusterArn', 'clusterCreationTime', 'kmsKeyId', 'snapshotArn', 'snapshotCreationTime', 'snapshotName', 'status', 'subnetIds', 'vpcSecurityGroupIds', ], 'members' => [ 'adminUserName' => [ 'shape' => 'String', ], 'clusterArn' => [ 'shape' => 'String', ], 'clusterCreationTime' => [ 'shape' => 'String', ], 'kmsKeyId' => [ 'shape' => 'String', ], 'snapshotArn' => [ 'shape' => 'String', ], 'snapshotCreationTime' => [ 'shape' => 'String', ], 'snapshotName' => [ 'shape' => 'String', ], 'status' => [ 'shape' => 'Status', ], 'subnetIds' => [ 'shape' => 'StringList', ], 'vpcSecurityGroupIds' => [ 'shape' => 'StringList', ], ], ], 'ClusterSnapshotInList' => [ 'type' => 'structure', 'required' => [ 'clusterArn', 'snapshotArn', 'snapshotCreationTime', 'snapshotName', 'status', ], 'members' => [ 'clusterArn' => [ 'shape' => 'String', ], 'snapshotArn' => [ 'shape' => 'String', ], 'snapshotCreationTime' => [ 'shape' => 'String', ], 'snapshotName' => [ 'shape' => 'String', ], 'status' => [ 'shape' => 'Status', ], ], ], 'ClusterSnapshotList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ClusterSnapshotInList', ], ], 'ConflictException' => [ 'type' => 'structure', 'required' => [ 'message', 'resourceId', 'resourceType', ], 'members' => [ 'message' => [ 'shape' => 'String', ], 'resourceId' => [ 'shape' => 'String', ], 'resourceType' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 409, 'senderFault' => true, ], 'exception' => true, ], 'CreateClusterInput' => [ 'type' => 'structure', 'required' => [ 'adminUserName', 'adminUserPassword', 'authType', 'clusterName', 'shardCapacity', 'shardCount', ], 'members' => [ 'adminUserName' => [ 'shape' => 'String', ], 'adminUserPassword' => [ 'shape' => 'Password', ], 'authType' => [ 'shape' => 'Auth', ], 'clientToken' => [ 'shape' => 'String', 'idempotencyToken' => true, ], 'clusterName' => [ 'shape' => 'String', ], 'kmsKeyId' => [ 'shape' => 'String', ], 'preferredMaintenanceWindow' => [ 'shape' => 'String', ], 'shardCapacity' => [ 'shape' => 'Integer', ], 'shardCount' => [ 'shape' => 'Integer', ], 'subnetIds' => [ 'shape' => 'StringList', ], 'tags' => [ 'shape' => 'TagMap', ], 'vpcSecurityGroupIds' => [ 'shape' => 'StringList', ], ], ], 'CreateClusterOutput' => [ 'type' => 'structure', 'required' => [ 'cluster', ], 'members' => [ 'cluster' => [ 'shape' => 'Cluster', ], ], ], 'CreateClusterSnapshotInput' => [ 'type' => 'structure', 'required' => [ 'clusterArn', 'snapshotName', ], 'members' => [ 'clusterArn' => [ 'shape' => 'String', ], 'snapshotName' => [ 'shape' => 'CreateClusterSnapshotInputSnapshotNameString', ], 'tags' => [ 'shape' => 'TagMap', ], ], ], 'CreateClusterSnapshotInputSnapshotNameString' => [ 'type' => 'string', 'max' => 63, 'min' => 1, ], 'CreateClusterSnapshotOutput' => [ 'type' => 'structure', 'required' => [ 'snapshot', ], 'members' => [ 'snapshot' => [ 'shape' => 'ClusterSnapshot', ], ], ], 'DeleteClusterInput' => [ 'type' => 'structure', 'required' => [ 'clusterArn', ], 'members' => [ 'clusterArn' => [ 'shape' => 'String', 'location' => 'uri', 'locationName' => 'clusterArn', ], ], ], 'DeleteClusterOutput' => [ 'type' => 'structure', 'required' => [ 'cluster', ], 'members' => [ 'cluster' => [ 'shape' => 'Cluster', ], ], ], 'DeleteClusterSnapshotInput' => [ 'type' => 'structure', 'required' => [ 'snapshotArn', ], 'members' => [ 'snapshotArn' => [ 'shape' => 'String', 'location' => 'uri', 'locationName' => 'snapshotArn', ], ], ], 'DeleteClusterSnapshotOutput' => [ 'type' => 'structure', 'required' => [ 'snapshot', ], 'members' => [ 'snapshot' => [ 'shape' => 'ClusterSnapshot', ], ], ], 'GetClusterInput' => [ 'type' => 'structure', 'required' => [ 'clusterArn', ], 'members' => [ 'clusterArn' => [ 'shape' => 'String', 'location' => 'uri', 'locationName' => 'clusterArn', ], ], ], 'GetClusterOutput' => [ 'type' => 'structure', 'required' => [ 'cluster', ], 'members' => [ 'cluster' => [ 'shape' => 'Cluster', ], ], ], 'GetClusterSnapshotInput' => [ 'type' => 'structure', 'required' => [ 'snapshotArn', ], 'members' => [ 'snapshotArn' => [ 'shape' => 'String', 'location' => 'uri', 'locationName' => 'snapshotArn', ], ], ], 'GetClusterSnapshotOutput' => [ 'type' => 'structure', 'required' => [ 'snapshot', ], 'members' => [ 'snapshot' => [ 'shape' => 'ClusterSnapshot', ], ], ], 'Integer' => [ 'type' => 'integer', 'box' => true, ], 'InternalServerException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, 'fault' => true, 'retryable' => [ 'throttling' => false, ], ], 'ListClusterSnapshotsInput' => [ 'type' => 'structure', 'members' => [ 'clusterArn' => [ 'shape' => 'String', 'location' => 'querystring', 'locationName' => 'clusterArn', ], 'maxResults' => [ 'shape' => 'ListClusterSnapshotsInputMaxResultsInteger', 'location' => 'querystring', 'locationName' => 'maxResults', ], 'nextToken' => [ 'shape' => 'PaginationToken', 'location' => 'querystring', 'locationName' => 'nextToken', ], ], ], 'ListClusterSnapshotsInputMaxResultsInteger' => [ 'type' => 'integer', 'box' => true, 'max' => 100, 'min' => 20, ], 'ListClusterSnapshotsOutput' => [ 'type' => 'structure', 'members' => [ 'nextToken' => [ 'shape' => 'PaginationToken', ], 'snapshots' => [ 'shape' => 'ClusterSnapshotList', ], ], ], 'ListClustersInput' => [ 'type' => 'structure', 'members' => [ 'maxResults' => [ 'shape' => 'ListClustersInputMaxResultsInteger', 'location' => 'querystring', 'locationName' => 'maxResults', ], 'nextToken' => [ 'shape' => 'PaginationToken', 'location' => 'querystring', 'locationName' => 'nextToken', ], ], ], 'ListClustersInputMaxResultsInteger' => [ 'type' => 'integer', 'box' => true, 'max' => 100, 'min' => 1, ], 'ListClustersOutput' => [ 'type' => 'structure', 'members' => [ 'clusters' => [ 'shape' => 'ClusterList', ], 'nextToken' => [ 'shape' => 'PaginationToken', ], ], ], 'ListTagsForResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', 'location' => 'uri', 'locationName' => 'resourceArn', ], ], ], 'ListTagsForResourceResponse' => [ 'type' => 'structure', 'members' => [ 'tags' => [ 'shape' => 'TagMap', ], ], ], 'PaginationToken' => [ 'type' => 'string', ], 'Password' => [ 'type' => 'string', 'sensitive' => true, ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'required' => [ 'message', 'resourceId', 'resourceType', ], 'members' => [ 'message' => [ 'shape' => 'String', ], 'resourceId' => [ 'shape' => 'String', ], 'resourceType' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 404, 'senderFault' => true, ], 'exception' => true, ], 'RestoreClusterFromSnapshotInput' => [ 'type' => 'structure', 'required' => [ 'clusterName', 'snapshotArn', ], 'members' => [ 'clusterName' => [ 'shape' => 'String', ], 'kmsKeyId' => [ 'shape' => 'String', ], 'snapshotArn' => [ 'shape' => 'String', 'location' => 'uri', 'locationName' => 'snapshotArn', ], 'subnetIds' => [ 'shape' => 'StringList', ], 'tags' => [ 'shape' => 'TagMap', ], 'vpcSecurityGroupIds' => [ 'shape' => 'StringList', ], ], ], 'RestoreClusterFromSnapshotOutput' => [ 'type' => 'structure', 'required' => [ 'cluster', ], 'members' => [ 'cluster' => [ 'shape' => 'Cluster', ], ], ], 'ServiceQuotaExceededException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 402, 'senderFault' => true, ], 'exception' => true, ], 'Status' => [ 'type' => 'string', 'enum' => [ 'CREATING', 'ACTIVE', 'DELETING', 'UPDATING', 'VPC_ENDPOINT_LIMIT_EXCEEDED', 'IP_ADDRESS_LIMIT_EXCEEDED', 'INVALID_SECURITY_GROUP_ID', 'INVALID_SUBNET_ID', 'INACCESSIBLE_ENCRYPTION_CREDS', ], ], 'String' => [ 'type' => 'string', ], 'StringList' => [ 'type' => 'list', 'member' => [ 'shape' => 'String', ], ], 'TagKey' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^(?!aws:)[a-zA-Z+-=._:/]+$', ], 'TagKeyList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagKey', ], 'max' => 50, 'min' => 0, ], 'TagMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'TagKey', ], 'value' => [ 'shape' => 'TagValue', ], ], 'TagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'tags', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', 'location' => 'uri', 'locationName' => 'resourceArn', ], 'tags' => [ 'shape' => 'TagMap', ], ], ], 'TagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'TagValue' => [ 'type' => 'string', 'max' => 256, 'min' => 0, ], 'ThrottlingException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], 'retryAfterSeconds' => [ 'shape' => 'Integer', 'location' => 'header', 'locationName' => 'Retry-After', ], ], 'error' => [ 'httpStatusCode' => 429, 'senderFault' => true, ], 'exception' => true, 'retryable' => [ 'throttling' => false, ], ], 'UntagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'tagKeys', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', 'location' => 'uri', 'locationName' => 'resourceArn', ], 'tagKeys' => [ 'shape' => 'TagKeyList', 'location' => 'querystring', 'locationName' => 'tagKeys', ], ], ], 'UntagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'UpdateClusterInput' => [ 'type' => 'structure', 'required' => [ 'clusterArn', ], 'members' => [ 'adminUserPassword' => [ 'shape' => 'Password', ], 'authType' => [ 'shape' => 'Auth', ], 'clientToken' => [ 'shape' => 'String', 'idempotencyToken' => true, ], 'clusterArn' => [ 'shape' => 'String', 'location' => 'uri', 'locationName' => 'clusterArn', ], 'preferredMaintenanceWindow' => [ 'shape' => 'String', ], 'shardCapacity' => [ 'shape' => 'Integer', ], 'shardCount' => [ 'shape' => 'Integer', ], 'subnetIds' => [ 'shape' => 'StringList', ], 'vpcSecurityGroupIds' => [ 'shape' => 'StringList', ], ], ], 'UpdateClusterOutput' => [ 'type' => 'structure', 'required' => [ 'cluster', ], 'members' => [ 'cluster' => [ 'shape' => 'Cluster', ], ], ], 'ValidationException' => [ 'type' => 'structure', 'required' => [ 'message', 'reason', ], 'members' => [ 'fieldList' => [ 'shape' => 'ValidationExceptionFieldList', ], 'message' => [ 'shape' => 'String', ], 'reason' => [ 'shape' => 'ValidationExceptionReason', ], ], 'error' => [ 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'ValidationExceptionField' => [ 'type' => 'structure', 'required' => [ 'message', 'name', ], 'members' => [ 'message' => [ 'shape' => 'String', ], 'name' => [ 'shape' => 'String', ], ], ], 'ValidationExceptionFieldList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ValidationExceptionField', ], ], 'ValidationExceptionReason' => [ 'type' => 'string', 'enum' => [ 'unknownOperation', 'cannotParse', 'fieldValidationFailed', 'other', ], ], ],];
