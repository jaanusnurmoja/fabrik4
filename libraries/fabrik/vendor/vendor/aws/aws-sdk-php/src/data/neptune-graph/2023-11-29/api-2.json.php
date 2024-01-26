<?php
// This file was auto-generated from sdk-root/src/data/neptune-graph/2023-11-29/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2023-11-29', 'endpointPrefix' => 'neptune-graph', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'ripServiceName' => 'neptune-graph', 'serviceAbbreviation' => 'Neptune Graph', 'serviceFullName' => 'Amazon Neptune Graph', 'serviceId' => 'Neptune Graph', 'signatureVersion' => 'v4', 'signingName' => 'neptune-graph', 'uid' => 'neptune-graph-2023-11-29', ], 'operations' => [ 'CancelImportTask' => [ 'name' => 'CancelImportTask', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/importtasks/{taskIdentifier}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'CancelImportTaskInput', ], 'output' => [ 'shape' => 'CancelImportTaskOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'staticContextParams' => [ 'ApiType' => [ 'value' => 'ControlPlane', ], ], ], 'CreateGraph' => [ 'name' => 'CreateGraph', 'http' => [ 'method' => 'POST', 'requestUri' => '/graphs', 'responseCode' => 201, ], 'input' => [ 'shape' => 'CreateGraphInput', ], 'output' => [ 'shape' => 'CreateGraphOutput', ], 'errors' => [ [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], ], 'staticContextParams' => [ 'ApiType' => [ 'value' => 'ControlPlane', ], ], ], 'CreateGraphSnapshot' => [ 'name' => 'CreateGraphSnapshot', 'http' => [ 'method' => 'POST', 'requestUri' => '/snapshots', 'responseCode' => 201, ], 'input' => [ 'shape' => 'CreateGraphSnapshotInput', ], 'output' => [ 'shape' => 'CreateGraphSnapshotOutput', ], 'errors' => [ [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'staticContextParams' => [ 'ApiType' => [ 'value' => 'ControlPlane', ], ], ], 'CreateGraphUsingImportTask' => [ 'name' => 'CreateGraphUsingImportTask', 'http' => [ 'method' => 'POST', 'requestUri' => '/importtasks', 'responseCode' => 201, ], 'input' => [ 'shape' => 'CreateGraphUsingImportTaskInput', ], 'output' => [ 'shape' => 'CreateGraphUsingImportTaskOutput', ], 'errors' => [ [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], ], 'staticContextParams' => [ 'ApiType' => [ 'value' => 'ControlPlane', ], ], ], 'CreatePrivateGraphEndpoint' => [ 'name' => 'CreatePrivateGraphEndpoint', 'http' => [ 'method' => 'POST', 'requestUri' => '/graphs/{graphIdentifier}/endpoints/', 'responseCode' => 201, ], 'input' => [ 'shape' => 'CreatePrivateGraphEndpointInput', ], 'output' => [ 'shape' => 'CreatePrivateGraphEndpointOutput', ], 'errors' => [ [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'staticContextParams' => [ 'ApiType' => [ 'value' => 'ControlPlane', ], ], ], 'DeleteGraph' => [ 'name' => 'DeleteGraph', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/graphs/{graphIdentifier}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DeleteGraphInput', ], 'output' => [ 'shape' => 'DeleteGraphOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'staticContextParams' => [ 'ApiType' => [ 'value' => 'ControlPlane', ], ], ], 'DeleteGraphSnapshot' => [ 'name' => 'DeleteGraphSnapshot', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/snapshots/{snapshotIdentifier}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DeleteGraphSnapshotInput', ], 'output' => [ 'shape' => 'DeleteGraphSnapshotOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'staticContextParams' => [ 'ApiType' => [ 'value' => 'ControlPlane', ], ], ], 'DeletePrivateGraphEndpoint' => [ 'name' => 'DeletePrivateGraphEndpoint', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/graphs/{graphIdentifier}/endpoints/{vpcId}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DeletePrivateGraphEndpointInput', ], 'output' => [ 'shape' => 'DeletePrivateGraphEndpointOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'staticContextParams' => [ 'ApiType' => [ 'value' => 'ControlPlane', ], ], ], 'GetGraph' => [ 'name' => 'GetGraph', 'http' => [ 'method' => 'GET', 'requestUri' => '/graphs/{graphIdentifier}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetGraphInput', ], 'output' => [ 'shape' => 'GetGraphOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'staticContextParams' => [ 'ApiType' => [ 'value' => 'ControlPlane', ], ], ], 'GetGraphSnapshot' => [ 'name' => 'GetGraphSnapshot', 'http' => [ 'method' => 'GET', 'requestUri' => '/snapshots/{snapshotIdentifier}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetGraphSnapshotInput', ], 'output' => [ 'shape' => 'GetGraphSnapshotOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'staticContextParams' => [ 'ApiType' => [ 'value' => 'ControlPlane', ], ], ], 'GetImportTask' => [ 'name' => 'GetImportTask', 'http' => [ 'method' => 'GET', 'requestUri' => '/importtasks/{taskIdentifier}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetImportTaskInput', ], 'output' => [ 'shape' => 'GetImportTaskOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'staticContextParams' => [ 'ApiType' => [ 'value' => 'ControlPlane', ], ], ], 'GetPrivateGraphEndpoint' => [ 'name' => 'GetPrivateGraphEndpoint', 'http' => [ 'method' => 'GET', 'requestUri' => '/graphs/{graphIdentifier}/endpoints/{vpcId}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetPrivateGraphEndpointInput', ], 'output' => [ 'shape' => 'GetPrivateGraphEndpointOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'staticContextParams' => [ 'ApiType' => [ 'value' => 'ControlPlane', ], ], ], 'ListGraphSnapshots' => [ 'name' => 'ListGraphSnapshots', 'http' => [ 'method' => 'GET', 'requestUri' => '/snapshots', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListGraphSnapshotsInput', ], 'output' => [ 'shape' => 'ListGraphSnapshotsOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'staticContextParams' => [ 'ApiType' => [ 'value' => 'ControlPlane', ], ], ], 'ListGraphs' => [ 'name' => 'ListGraphs', 'http' => [ 'method' => 'GET', 'requestUri' => '/graphs', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListGraphsInput', ], 'output' => [ 'shape' => 'ListGraphsOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'staticContextParams' => [ 'ApiType' => [ 'value' => 'ControlPlane', ], ], ], 'ListImportTasks' => [ 'name' => 'ListImportTasks', 'http' => [ 'method' => 'GET', 'requestUri' => '/importtasks', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListImportTasksInput', ], 'output' => [ 'shape' => 'ListImportTasksOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'staticContextParams' => [ 'ApiType' => [ 'value' => 'ControlPlane', ], ], ], 'ListPrivateGraphEndpoints' => [ 'name' => 'ListPrivateGraphEndpoints', 'http' => [ 'method' => 'GET', 'requestUri' => '/graphs/{graphIdentifier}/endpoints/', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListPrivateGraphEndpointsInput', ], 'output' => [ 'shape' => 'ListPrivateGraphEndpointsOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'staticContextParams' => [ 'ApiType' => [ 'value' => 'ControlPlane', ], ], ], 'ListTagsForResource' => [ 'name' => 'ListTagsForResource', 'http' => [ 'method' => 'GET', 'requestUri' => '/tags/{resourceArn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListTagsForResourceInput', ], 'output' => [ 'shape' => 'ListTagsForResourceOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'staticContextParams' => [ 'ApiType' => [ 'value' => 'ControlPlane', ], ], ], 'ResetGraph' => [ 'name' => 'ResetGraph', 'http' => [ 'method' => 'PUT', 'requestUri' => '/graphs/{graphIdentifier}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ResetGraphInput', ], 'output' => [ 'shape' => 'ResetGraphOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'staticContextParams' => [ 'ApiType' => [ 'value' => 'ControlPlane', ], ], ], 'RestoreGraphFromSnapshot' => [ 'name' => 'RestoreGraphFromSnapshot', 'http' => [ 'method' => 'POST', 'requestUri' => '/snapshots/{snapshotIdentifier}/restore', 'responseCode' => 201, ], 'input' => [ 'shape' => 'RestoreGraphFromSnapshotInput', ], 'output' => [ 'shape' => 'RestoreGraphFromSnapshotOutput', ], 'errors' => [ [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'staticContextParams' => [ 'ApiType' => [ 'value' => 'ControlPlane', ], ], ], 'TagResource' => [ 'name' => 'TagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/tags/{resourceArn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'TagResourceInput', ], 'output' => [ 'shape' => 'TagResourceOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'idempotent' => true, 'staticContextParams' => [ 'ApiType' => [ 'value' => 'ControlPlane', ], ], ], 'UntagResource' => [ 'name' => 'UntagResource', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/tags/{resourceArn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'UntagResourceInput', ], 'output' => [ 'shape' => 'UntagResourceOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'idempotent' => true, 'staticContextParams' => [ 'ApiType' => [ 'value' => 'ControlPlane', ], ], ], 'UpdateGraph' => [ 'name' => 'UpdateGraph', 'http' => [ 'method' => 'PATCH', 'requestUri' => '/graphs/{graphIdentifier}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'UpdateGraphInput', ], 'output' => [ 'shape' => 'UpdateGraphOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'staticContextParams' => [ 'ApiType' => [ 'value' => 'ControlPlane', ], ], ], ], 'shapes' => [ 'Arn' => [ 'type' => 'string', 'max' => 1011, 'min' => 1, 'pattern' => 'arn:.+', ], 'Boolean' => [ 'type' => 'boolean', 'box' => true, ], 'CancelImportTaskInput' => [ 'type' => 'structure', 'required' => [ 'taskIdentifier', ], 'members' => [ 'taskIdentifier' => [ 'shape' => 'TaskId', 'location' => 'uri', 'locationName' => 'taskIdentifier', ], ], ], 'CancelImportTaskOutput' => [ 'type' => 'structure', 'required' => [ 'taskId', 'source', 'roleArn', 'status', ], 'members' => [ 'graphId' => [ 'shape' => 'GraphId', ], 'taskId' => [ 'shape' => 'TaskId', ], 'source' => [ 'shape' => 'String', ], 'format' => [ 'shape' => 'Format', ], 'roleArn' => [ 'shape' => 'RoleArn', ], 'status' => [ 'shape' => 'ImportTaskStatus', ], ], ], 'ConflictException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], 'reason' => [ 'shape' => 'ConflictExceptionReason', ], ], 'error' => [ 'httpStatusCode' => 409, 'senderFault' => true, ], 'exception' => true, ], 'ConflictExceptionReason' => [ 'type' => 'string', 'enum' => [ 'CONCURRENT_MODIFICATION', ], ], 'CreateGraphInput' => [ 'type' => 'structure', 'required' => [ 'graphName', 'provisionedMemory', ], 'members' => [ 'graphName' => [ 'shape' => 'GraphName', ], 'tags' => [ 'shape' => 'TagMap', ], 'publicConnectivity' => [ 'shape' => 'Boolean', ], 'kmsKeyIdentifier' => [ 'shape' => 'KmsKeyArn', ], 'vectorSearchConfiguration' => [ 'shape' => 'VectorSearchConfiguration', ], 'replicaCount' => [ 'shape' => 'ReplicaCount', ], 'deletionProtection' => [ 'shape' => 'Boolean', ], 'provisionedMemory' => [ 'shape' => 'ProvisionedMemory', ], ], ], 'CreateGraphOutput' => [ 'type' => 'structure', 'required' => [ 'id', 'name', 'arn', ], 'members' => [ 'id' => [ 'shape' => 'GraphId', ], 'name' => [ 'shape' => 'GraphName', ], 'arn' => [ 'shape' => 'String', ], 'status' => [ 'shape' => 'GraphStatus', ], 'statusReason' => [ 'shape' => 'String', ], 'createTime' => [ 'shape' => 'Timestamp', ], 'provisionedMemory' => [ 'shape' => 'ProvisionedMemory', ], 'endpoint' => [ 'shape' => 'String', ], 'publicConnectivity' => [ 'shape' => 'Boolean', ], 'vectorSearchConfiguration' => [ 'shape' => 'VectorSearchConfiguration', ], 'replicaCount' => [ 'shape' => 'ReplicaCount', ], 'kmsKeyIdentifier' => [ 'shape' => 'KmsKeyArn', ], 'sourceSnapshotId' => [ 'shape' => 'SnapshotId', ], 'deletionProtection' => [ 'shape' => 'Boolean', ], 'buildNumber' => [ 'shape' => 'String', ], ], ], 'CreateGraphSnapshotInput' => [ 'type' => 'structure', 'required' => [ 'graphIdentifier', 'snapshotName', ], 'members' => [ 'graphIdentifier' => [ 'shape' => 'GraphIdentifier', ], 'snapshotName' => [ 'shape' => 'SnapshotName', ], 'tags' => [ 'shape' => 'TagMap', ], ], ], 'CreateGraphSnapshotOutput' => [ 'type' => 'structure', 'required' => [ 'id', 'name', 'arn', ], 'members' => [ 'id' => [ 'shape' => 'SnapshotId', ], 'name' => [ 'shape' => 'SnapshotName', ], 'arn' => [ 'shape' => 'String', ], 'sourceGraphId' => [ 'shape' => 'GraphId', ], 'snapshotCreateTime' => [ 'shape' => 'Timestamp', ], 'status' => [ 'shape' => 'SnapshotStatus', ], 'kmsKeyIdentifier' => [ 'shape' => 'KmsKeyArn', ], ], ], 'CreateGraphUsingImportTaskInput' => [ 'type' => 'structure', 'required' => [ 'graphName', 'source', 'roleArn', ], 'members' => [ 'graphName' => [ 'shape' => 'GraphName', ], 'tags' => [ 'shape' => 'TagMap', ], 'publicConnectivity' => [ 'shape' => 'Boolean', ], 'kmsKeyIdentifier' => [ 'shape' => 'KmsKeyArn', ], 'vectorSearchConfiguration' => [ 'shape' => 'VectorSearchConfiguration', ], 'replicaCount' => [ 'shape' => 'ReplicaCount', ], 'deletionProtection' => [ 'shape' => 'Boolean', ], 'importOptions' => [ 'shape' => 'ImportOptions', ], 'maxProvisionedMemory' => [ 'shape' => 'ProvisionedMemory', ], 'minProvisionedMemory' => [ 'shape' => 'ProvisionedMemory', ], 'failOnError' => [ 'shape' => 'Boolean', ], 'source' => [ 'shape' => 'String', ], 'format' => [ 'shape' => 'Format', ], 'roleArn' => [ 'shape' => 'RoleArn', ], ], ], 'CreateGraphUsingImportTaskOutput' => [ 'type' => 'structure', 'required' => [ 'taskId', 'source', 'roleArn', 'status', ], 'members' => [ 'graphId' => [ 'shape' => 'GraphId', ], 'taskId' => [ 'shape' => 'TaskId', ], 'source' => [ 'shape' => 'String', ], 'format' => [ 'shape' => 'Format', ], 'roleArn' => [ 'shape' => 'RoleArn', ], 'status' => [ 'shape' => 'ImportTaskStatus', ], 'importOptions' => [ 'shape' => 'ImportOptions', ], ], ], 'CreatePrivateGraphEndpointInput' => [ 'type' => 'structure', 'required' => [ 'graphIdentifier', ], 'members' => [ 'graphIdentifier' => [ 'shape' => 'GraphIdentifier', 'location' => 'uri', 'locationName' => 'graphIdentifier', ], 'vpcId' => [ 'shape' => 'VpcId', ], 'subnetIds' => [ 'shape' => 'SubnetIds', ], 'vpcSecurityGroupIds' => [ 'shape' => 'SecurityGroupIds', ], ], ], 'CreatePrivateGraphEndpointOutput' => [ 'type' => 'structure', 'required' => [ 'vpcId', 'subnetIds', 'status', ], 'members' => [ 'vpcId' => [ 'shape' => 'VpcId', ], 'subnetIds' => [ 'shape' => 'SubnetIds', ], 'status' => [ 'shape' => 'PrivateGraphEndpointStatus', ], 'vpcEndpointId' => [ 'shape' => 'VpcEndpointId', ], ], ], 'DeleteGraphInput' => [ 'type' => 'structure', 'required' => [ 'graphIdentifier', 'skipSnapshot', ], 'members' => [ 'graphIdentifier' => [ 'shape' => 'GraphIdentifier', 'location' => 'uri', 'locationName' => 'graphIdentifier', ], 'skipSnapshot' => [ 'shape' => 'Boolean', 'location' => 'querystring', 'locationName' => 'skipSnapshot', ], ], ], 'DeleteGraphOutput' => [ 'type' => 'structure', 'required' => [ 'id', 'name', 'arn', ], 'members' => [ 'id' => [ 'shape' => 'GraphId', ], 'name' => [ 'shape' => 'GraphName', ], 'arn' => [ 'shape' => 'String', ], 'status' => [ 'shape' => 'GraphStatus', ], 'statusReason' => [ 'shape' => 'String', ], 'createTime' => [ 'shape' => 'Timestamp', ], 'provisionedMemory' => [ 'shape' => 'ProvisionedMemory', ], 'endpoint' => [ 'shape' => 'String', ], 'publicConnectivity' => [ 'shape' => 'Boolean', ], 'vectorSearchConfiguration' => [ 'shape' => 'VectorSearchConfiguration', ], 'replicaCount' => [ 'shape' => 'ReplicaCount', ], 'kmsKeyIdentifier' => [ 'shape' => 'KmsKeyArn', ], 'sourceSnapshotId' => [ 'shape' => 'SnapshotId', ], 'deletionProtection' => [ 'shape' => 'Boolean', ], 'buildNumber' => [ 'shape' => 'String', ], ], ], 'DeleteGraphSnapshotInput' => [ 'type' => 'structure', 'required' => [ 'snapshotIdentifier', ], 'members' => [ 'snapshotIdentifier' => [ 'shape' => 'SnapshotIdentifier', 'location' => 'uri', 'locationName' => 'snapshotIdentifier', ], ], ], 'DeleteGraphSnapshotOutput' => [ 'type' => 'structure', 'required' => [ 'id', 'name', 'arn', ], 'members' => [ 'id' => [ 'shape' => 'SnapshotId', ], 'name' => [ 'shape' => 'SnapshotName', ], 'arn' => [ 'shape' => 'String', ], 'sourceGraphId' => [ 'shape' => 'GraphId', ], 'snapshotCreateTime' => [ 'shape' => 'Timestamp', ], 'status' => [ 'shape' => 'SnapshotStatus', ], 'kmsKeyIdentifier' => [ 'shape' => 'KmsKeyArn', ], ], ], 'DeletePrivateGraphEndpointInput' => [ 'type' => 'structure', 'required' => [ 'graphIdentifier', 'vpcId', ], 'members' => [ 'graphIdentifier' => [ 'shape' => 'GraphIdentifier', 'location' => 'uri', 'locationName' => 'graphIdentifier', ], 'vpcId' => [ 'shape' => 'VpcId', 'location' => 'uri', 'locationName' => 'vpcId', ], ], ], 'DeletePrivateGraphEndpointOutput' => [ 'type' => 'structure', 'required' => [ 'vpcId', 'subnetIds', 'status', ], 'members' => [ 'vpcId' => [ 'shape' => 'VpcId', ], 'subnetIds' => [ 'shape' => 'SubnetIds', ], 'status' => [ 'shape' => 'PrivateGraphEndpointStatus', ], 'vpcEndpointId' => [ 'shape' => 'VpcEndpointId', ], ], ], 'Format' => [ 'type' => 'string', 'enum' => [ 'CSV', 'OPEN_CYPHER', ], ], 'GetGraphInput' => [ 'type' => 'structure', 'required' => [ 'graphIdentifier', ], 'members' => [ 'graphIdentifier' => [ 'shape' => 'GraphIdentifier', 'location' => 'uri', 'locationName' => 'graphIdentifier', ], ], ], 'GetGraphOutput' => [ 'type' => 'structure', 'required' => [ 'id', 'name', 'arn', ], 'members' => [ 'id' => [ 'shape' => 'GraphId', ], 'name' => [ 'shape' => 'GraphName', ], 'arn' => [ 'shape' => 'String', ], 'status' => [ 'shape' => 'GraphStatus', ], 'statusReason' => [ 'shape' => 'String', ], 'createTime' => [ 'shape' => 'Timestamp', ], 'provisionedMemory' => [ 'shape' => 'ProvisionedMemory', ], 'endpoint' => [ 'shape' => 'String', ], 'publicConnectivity' => [ 'shape' => 'Boolean', ], 'vectorSearchConfiguration' => [ 'shape' => 'VectorSearchConfiguration', ], 'replicaCount' => [ 'shape' => 'ReplicaCount', ], 'kmsKeyIdentifier' => [ 'shape' => 'KmsKeyArn', ], 'sourceSnapshotId' => [ 'shape' => 'SnapshotId', ], 'deletionProtection' => [ 'shape' => 'Boolean', ], 'buildNumber' => [ 'shape' => 'String', ], ], ], 'GetGraphSnapshotInput' => [ 'type' => 'structure', 'required' => [ 'snapshotIdentifier', ], 'members' => [ 'snapshotIdentifier' => [ 'shape' => 'SnapshotIdentifier', 'location' => 'uri', 'locationName' => 'snapshotIdentifier', ], ], ], 'GetGraphSnapshotOutput' => [ 'type' => 'structure', 'required' => [ 'id', 'name', 'arn', ], 'members' => [ 'id' => [ 'shape' => 'SnapshotId', ], 'name' => [ 'shape' => 'SnapshotName', ], 'arn' => [ 'shape' => 'String', ], 'sourceGraphId' => [ 'shape' => 'GraphId', ], 'snapshotCreateTime' => [ 'shape' => 'Timestamp', ], 'status' => [ 'shape' => 'SnapshotStatus', ], 'kmsKeyIdentifier' => [ 'shape' => 'KmsKeyArn', ], ], ], 'GetImportTaskInput' => [ 'type' => 'structure', 'required' => [ 'taskIdentifier', ], 'members' => [ 'taskIdentifier' => [ 'shape' => 'TaskId', 'location' => 'uri', 'locationName' => 'taskIdentifier', ], ], ], 'GetImportTaskOutput' => [ 'type' => 'structure', 'required' => [ 'taskId', 'source', 'roleArn', 'status', ], 'members' => [ 'graphId' => [ 'shape' => 'GraphId', ], 'taskId' => [ 'shape' => 'TaskId', ], 'source' => [ 'shape' => 'String', ], 'format' => [ 'shape' => 'Format', ], 'roleArn' => [ 'shape' => 'RoleArn', ], 'status' => [ 'shape' => 'ImportTaskStatus', ], 'importOptions' => [ 'shape' => 'ImportOptions', ], 'importTaskDetails' => [ 'shape' => 'ImportTaskDetails', ], 'attemptNumber' => [ 'shape' => 'Integer', ], 'statusReason' => [ 'shape' => 'String', ], ], ], 'GetPrivateGraphEndpointInput' => [ 'type' => 'structure', 'required' => [ 'graphIdentifier', 'vpcId', ], 'members' => [ 'graphIdentifier' => [ 'shape' => 'GraphIdentifier', 'location' => 'uri', 'locationName' => 'graphIdentifier', ], 'vpcId' => [ 'shape' => 'VpcId', 'location' => 'uri', 'locationName' => 'vpcId', ], ], ], 'GetPrivateGraphEndpointOutput' => [ 'type' => 'structure', 'required' => [ 'vpcId', 'subnetIds', 'status', ], 'members' => [ 'vpcId' => [ 'shape' => 'VpcId', ], 'subnetIds' => [ 'shape' => 'SubnetIds', ], 'status' => [ 'shape' => 'PrivateGraphEndpointStatus', ], 'vpcEndpointId' => [ 'shape' => 'VpcEndpointId', ], ], ], 'GraphId' => [ 'type' => 'string', 'pattern' => 'g-[a-z0-9]{10}', ], 'GraphIdentifier' => [ 'type' => 'string', 'pattern' => 'g-[a-z0-9]{10}', ], 'GraphName' => [ 'type' => 'string', 'max' => 63, 'min' => 1, 'pattern' => '(?!g-)[a-z][a-z0-9]*(-[a-z0-9]+)*', ], 'GraphSnapshotSummary' => [ 'type' => 'structure', 'required' => [ 'id', 'name', 'arn', ], 'members' => [ 'id' => [ 'shape' => 'SnapshotId', ], 'name' => [ 'shape' => 'SnapshotName', ], 'arn' => [ 'shape' => 'String', ], 'sourceGraphId' => [ 'shape' => 'GraphId', ], 'snapshotCreateTime' => [ 'shape' => 'Timestamp', ], 'status' => [ 'shape' => 'SnapshotStatus', ], 'kmsKeyIdentifier' => [ 'shape' => 'KmsKeyArn', ], ], ], 'GraphSnapshotSummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'GraphSnapshotSummary', ], ], 'GraphStatus' => [ 'type' => 'string', 'enum' => [ 'CREATING', 'AVAILABLE', 'DELETING', 'RESETTING', 'UPDATING', 'SNAPSHOTTING', 'FAILED', ], ], 'GraphSummary' => [ 'type' => 'structure', 'required' => [ 'id', 'name', 'arn', ], 'members' => [ 'id' => [ 'shape' => 'GraphId', ], 'name' => [ 'shape' => 'GraphName', ], 'arn' => [ 'shape' => 'String', ], 'status' => [ 'shape' => 'GraphStatus', ], 'provisionedMemory' => [ 'shape' => 'ProvisionedMemory', ], 'publicConnectivity' => [ 'shape' => 'Boolean', ], 'endpoint' => [ 'shape' => 'String', ], 'replicaCount' => [ 'shape' => 'ReplicaCount', ], 'kmsKeyIdentifier' => [ 'shape' => 'String', ], 'deletionProtection' => [ 'shape' => 'Boolean', ], ], ], 'GraphSummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'GraphSummary', ], ], 'ImportOptions' => [ 'type' => 'structure', 'members' => [ 'neptune' => [ 'shape' => 'NeptuneImportOptions', ], ], 'union' => true, ], 'ImportTaskDetails' => [ 'type' => 'structure', 'required' => [ 'status', 'startTime', 'timeElapsedSeconds', 'progressPercentage', 'errorCount', 'statementCount', 'dictionaryEntryCount', ], 'members' => [ 'status' => [ 'shape' => 'String', ], 'startTime' => [ 'shape' => 'Timestamp', ], 'timeElapsedSeconds' => [ 'shape' => 'Long', ], 'progressPercentage' => [ 'shape' => 'Integer', ], 'errorCount' => [ 'shape' => 'Integer', ], 'errorDetails' => [ 'shape' => 'String', ], 'statementCount' => [ 'shape' => 'Long', ], 'dictionaryEntryCount' => [ 'shape' => 'Long', ], ], ], 'ImportTaskStatus' => [ 'type' => 'string', 'enum' => [ 'INITIALIZING', 'EXPORTING', 'ANALYZING_DATA', 'IMPORTING', 'REPROVISIONING', 'ROLLING_BACK', 'SUCCEEDED', 'FAILED', 'CANCELLING', 'CANCELLED', ], ], 'ImportTaskSummary' => [ 'type' => 'structure', 'required' => [ 'taskId', 'source', 'roleArn', 'status', ], 'members' => [ 'graphId' => [ 'shape' => 'GraphId', ], 'taskId' => [ 'shape' => 'TaskId', ], 'source' => [ 'shape' => 'String', ], 'format' => [ 'shape' => 'Format', ], 'roleArn' => [ 'shape' => 'RoleArn', ], 'status' => [ 'shape' => 'ImportTaskStatus', ], ], ], 'ImportTaskSummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ImportTaskSummary', ], ], 'Integer' => [ 'type' => 'integer', 'box' => true, ], 'InternalServerException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, 'fault' => true, 'retryable' => [ 'throttling' => false, ], ], 'KmsKeyArn' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, 'pattern' => 'arn:aws(|-cn|-us-gov):kms:[a-zA-Z0-9-]*:[0-9]{12}:key/[a-zA-Z0-9-]{36}', ], 'ListGraphSnapshotsInput' => [ 'type' => 'structure', 'members' => [ 'graphIdentifier' => [ 'shape' => 'GraphIdentifier', 'location' => 'querystring', 'locationName' => 'graphIdentifier', ], 'nextToken' => [ 'shape' => 'PaginationToken', 'location' => 'querystring', 'locationName' => 'nextToken', ], 'maxResults' => [ 'shape' => 'MaxResults', 'location' => 'querystring', 'locationName' => 'maxResults', ], ], ], 'ListGraphSnapshotsOutput' => [ 'type' => 'structure', 'required' => [ 'graphSnapshots', ], 'members' => [ 'graphSnapshots' => [ 'shape' => 'GraphSnapshotSummaryList', ], 'nextToken' => [ 'shape' => 'PaginationToken', ], ], ], 'ListGraphsInput' => [ 'type' => 'structure', 'members' => [ 'nextToken' => [ 'shape' => 'PaginationToken', 'location' => 'querystring', 'locationName' => 'nextToken', ], 'maxResults' => [ 'shape' => 'MaxResults', 'location' => 'querystring', 'locationName' => 'maxResults', ], ], ], 'ListGraphsOutput' => [ 'type' => 'structure', 'required' => [ 'graphs', ], 'members' => [ 'graphs' => [ 'shape' => 'GraphSummaryList', ], 'nextToken' => [ 'shape' => 'PaginationToken', ], ], ], 'ListImportTasksInput' => [ 'type' => 'structure', 'members' => [ 'nextToken' => [ 'shape' => 'PaginationToken', 'location' => 'querystring', 'locationName' => 'nextToken', ], 'maxResults' => [ 'shape' => 'MaxResults', 'location' => 'querystring', 'locationName' => 'maxResults', ], ], ], 'ListImportTasksOutput' => [ 'type' => 'structure', 'required' => [ 'tasks', ], 'members' => [ 'tasks' => [ 'shape' => 'ImportTaskSummaryList', ], 'nextToken' => [ 'shape' => 'PaginationToken', ], ], ], 'ListPrivateGraphEndpointsInput' => [ 'type' => 'structure', 'required' => [ 'graphIdentifier', ], 'members' => [ 'graphIdentifier' => [ 'shape' => 'GraphIdentifier', 'location' => 'uri', 'locationName' => 'graphIdentifier', ], 'nextToken' => [ 'shape' => 'PaginationToken', 'location' => 'querystring', 'locationName' => 'nextToken', ], 'maxResults' => [ 'shape' => 'MaxResults', 'location' => 'querystring', 'locationName' => 'maxResults', ], ], ], 'ListPrivateGraphEndpointsOutput' => [ 'type' => 'structure', 'required' => [ 'privateGraphEndpoints', ], 'members' => [ 'privateGraphEndpoints' => [ 'shape' => 'PrivateGraphEndpointSummaryList', ], 'nextToken' => [ 'shape' => 'PaginationToken', ], ], ], 'ListTagsForResourceInput' => [ 'type' => 'structure', 'required' => [ 'resourceArn', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', 'location' => 'uri', 'locationName' => 'resourceArn', ], ], ], 'ListTagsForResourceOutput' => [ 'type' => 'structure', 'members' => [ 'tags' => [ 'shape' => 'TagMap', ], ], ], 'Long' => [ 'type' => 'long', 'box' => true, ], 'MaxResults' => [ 'type' => 'integer', 'box' => true, 'max' => 100, 'min' => 1, ], 'NeptuneImportOptions' => [ 'type' => 'structure', 'required' => [ 's3ExportPath', 's3ExportKmsKeyId', ], 'members' => [ 's3ExportPath' => [ 'shape' => 'NeptuneImportOptionsS3ExportPathString', ], 's3ExportKmsKeyId' => [ 'shape' => 'NeptuneImportOptionsS3ExportKmsKeyIdString', ], 'preserveDefaultVertexLabels' => [ 'shape' => 'Boolean', ], 'preserveEdgeIds' => [ 'shape' => 'Boolean', ], ], ], 'NeptuneImportOptionsS3ExportKmsKeyIdString' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, ], 'NeptuneImportOptionsS3ExportPathString' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, ], 'PaginationToken' => [ 'type' => 'string', 'max' => 8192, 'min' => 1, ], 'PrivateGraphEndpointStatus' => [ 'type' => 'string', 'enum' => [ 'CREATING', 'AVAILABLE', 'DELETING', 'FAILED', ], ], 'PrivateGraphEndpointSummary' => [ 'type' => 'structure', 'required' => [ 'vpcId', 'subnetIds', 'status', ], 'members' => [ 'vpcId' => [ 'shape' => 'VpcId', ], 'subnetIds' => [ 'shape' => 'SubnetIds', ], 'status' => [ 'shape' => 'PrivateGraphEndpointStatus', ], 'vpcEndpointId' => [ 'shape' => 'VpcEndpointId', ], ], ], 'PrivateGraphEndpointSummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'PrivateGraphEndpointSummary', ], ], 'ProvisionedMemory' => [ 'type' => 'integer', 'box' => true, 'max' => 24576, 'min' => 128, ], 'ReplicaCount' => [ 'type' => 'integer', 'box' => true, 'max' => 2, 'min' => 0, ], 'ResetGraphInput' => [ 'type' => 'structure', 'required' => [ 'graphIdentifier', 'skipSnapshot', ], 'members' => [ 'graphIdentifier' => [ 'shape' => 'GraphIdentifier', 'location' => 'uri', 'locationName' => 'graphIdentifier', ], 'skipSnapshot' => [ 'shape' => 'Boolean', ], ], ], 'ResetGraphOutput' => [ 'type' => 'structure', 'required' => [ 'id', 'name', 'arn', ], 'members' => [ 'id' => [ 'shape' => 'GraphId', ], 'name' => [ 'shape' => 'GraphName', ], 'arn' => [ 'shape' => 'String', ], 'status' => [ 'shape' => 'GraphStatus', ], 'statusReason' => [ 'shape' => 'String', ], 'createTime' => [ 'shape' => 'Timestamp', ], 'provisionedMemory' => [ 'shape' => 'ProvisionedMemory', ], 'endpoint' => [ 'shape' => 'String', ], 'publicConnectivity' => [ 'shape' => 'Boolean', ], 'vectorSearchConfiguration' => [ 'shape' => 'VectorSearchConfiguration', ], 'replicaCount' => [ 'shape' => 'ReplicaCount', ], 'kmsKeyIdentifier' => [ 'shape' => 'KmsKeyArn', ], 'sourceSnapshotId' => [ 'shape' => 'SnapshotId', ], 'deletionProtection' => [ 'shape' => 'Boolean', ], 'buildNumber' => [ 'shape' => 'String', ], ], ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 404, 'senderFault' => true, ], 'exception' => true, ], 'RestoreGraphFromSnapshotInput' => [ 'type' => 'structure', 'required' => [ 'snapshotIdentifier', 'graphName', ], 'members' => [ 'snapshotIdentifier' => [ 'shape' => 'SnapshotIdentifier', 'location' => 'uri', 'locationName' => 'snapshotIdentifier', ], 'graphName' => [ 'shape' => 'GraphName', ], 'provisionedMemory' => [ 'shape' => 'ProvisionedMemory', ], 'deletionProtection' => [ 'shape' => 'Boolean', ], 'tags' => [ 'shape' => 'TagMap', ], 'replicaCount' => [ 'shape' => 'ReplicaCount', ], 'publicConnectivity' => [ 'shape' => 'Boolean', ], ], ], 'RestoreGraphFromSnapshotOutput' => [ 'type' => 'structure', 'required' => [ 'id', 'name', 'arn', ], 'members' => [ 'id' => [ 'shape' => 'GraphId', ], 'name' => [ 'shape' => 'GraphName', ], 'arn' => [ 'shape' => 'String', ], 'status' => [ 'shape' => 'GraphStatus', ], 'statusReason' => [ 'shape' => 'String', ], 'createTime' => [ 'shape' => 'Timestamp', ], 'provisionedMemory' => [ 'shape' => 'ProvisionedMemory', ], 'endpoint' => [ 'shape' => 'String', ], 'publicConnectivity' => [ 'shape' => 'Boolean', ], 'vectorSearchConfiguration' => [ 'shape' => 'VectorSearchConfiguration', ], 'replicaCount' => [ 'shape' => 'ReplicaCount', ], 'kmsKeyIdentifier' => [ 'shape' => 'KmsKeyArn', ], 'sourceSnapshotId' => [ 'shape' => 'SnapshotId', ], 'deletionProtection' => [ 'shape' => 'Boolean', ], 'buildNumber' => [ 'shape' => 'String', ], ], ], 'RoleArn' => [ 'type' => 'string', 'pattern' => 'arn:aws[^:]*:iam::\\d{12}:(role|role/service-role)/[\\w+=,.@-]*', ], 'SecurityGroupId' => [ 'type' => 'string', 'pattern' => 'sg-[a-z0-9]+', ], 'SecurityGroupIds' => [ 'type' => 'list', 'member' => [ 'shape' => 'SecurityGroupId', ], 'max' => 10, 'min' => 1, ], 'ServiceQuotaExceededException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], 'resourceId' => [ 'shape' => 'String', ], 'resourceType' => [ 'shape' => 'String', ], 'serviceCode' => [ 'shape' => 'String', ], 'quotaCode' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 402, 'senderFault' => true, ], 'exception' => true, ], 'SnapshotId' => [ 'type' => 'string', 'pattern' => 'gs-[a-z0-9]{10}', ], 'SnapshotIdentifier' => [ 'type' => 'string', 'pattern' => 'gs-[a-z0-9]{10}', ], 'SnapshotName' => [ 'type' => 'string', 'max' => 63, 'min' => 1, 'pattern' => '(?!gs-)[a-z][a-z0-9]*(-[a-z0-9]+)*', ], 'SnapshotStatus' => [ 'type' => 'string', 'enum' => [ 'CREATING', 'AVAILABLE', 'DELETING', 'FAILED', ], ], 'String' => [ 'type' => 'string', ], 'SubnetId' => [ 'type' => 'string', 'pattern' => 'subnet-[a-z0-9]+', ], 'SubnetIds' => [ 'type' => 'list', 'member' => [ 'shape' => 'SubnetId', ], 'max' => 6, 'min' => 1, ], 'TagKey' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '(?!aws:)[a-zA-Z+-=._:/]+', ], 'TagKeyList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagKey', ], 'max' => 50, 'min' => 0, ], 'TagMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'TagKey', ], 'value' => [ 'shape' => 'TagValue', ], 'max' => 50, 'min' => 0, ], 'TagResourceInput' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'tags', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', 'location' => 'uri', 'locationName' => 'resourceArn', ], 'tags' => [ 'shape' => 'TagMap', ], ], ], 'TagResourceOutput' => [ 'type' => 'structure', 'members' => [], ], 'TagValue' => [ 'type' => 'string', 'max' => 256, 'min' => 0, ], 'TaskId' => [ 'type' => 'string', 'pattern' => 't-[a-z0-9]{10}', ], 'ThrottlingException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 429, 'senderFault' => true, ], 'exception' => true, 'retryable' => [ 'throttling' => true, ], ], 'Timestamp' => [ 'type' => 'timestamp', ], 'UntagResourceInput' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'tagKeys', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', 'location' => 'uri', 'locationName' => 'resourceArn', ], 'tagKeys' => [ 'shape' => 'TagKeyList', 'location' => 'querystring', 'locationName' => 'tagKeys', ], ], ], 'UntagResourceOutput' => [ 'type' => 'structure', 'members' => [], ], 'UpdateGraphInput' => [ 'type' => 'structure', 'required' => [ 'graphIdentifier', ], 'members' => [ 'graphIdentifier' => [ 'shape' => 'GraphIdentifier', 'location' => 'uri', 'locationName' => 'graphIdentifier', ], 'publicConnectivity' => [ 'shape' => 'Boolean', ], 'provisionedMemory' => [ 'shape' => 'ProvisionedMemory', ], 'deletionProtection' => [ 'shape' => 'Boolean', ], ], ], 'UpdateGraphOutput' => [ 'type' => 'structure', 'required' => [ 'id', 'name', 'arn', ], 'members' => [ 'id' => [ 'shape' => 'GraphId', ], 'name' => [ 'shape' => 'GraphName', ], 'arn' => [ 'shape' => 'String', ], 'status' => [ 'shape' => 'GraphStatus', ], 'statusReason' => [ 'shape' => 'String', ], 'createTime' => [ 'shape' => 'Timestamp', ], 'provisionedMemory' => [ 'shape' => 'ProvisionedMemory', ], 'endpoint' => [ 'shape' => 'String', ], 'publicConnectivity' => [ 'shape' => 'Boolean', ], 'vectorSearchConfiguration' => [ 'shape' => 'VectorSearchConfiguration', ], 'replicaCount' => [ 'shape' => 'ReplicaCount', ], 'kmsKeyIdentifier' => [ 'shape' => 'KmsKeyArn', ], 'sourceSnapshotId' => [ 'shape' => 'SnapshotId', ], 'deletionProtection' => [ 'shape' => 'Boolean', ], 'buildNumber' => [ 'shape' => 'String', ], ], ], 'ValidationException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], 'reason' => [ 'shape' => 'ValidationExceptionReason', ], ], 'error' => [ 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'ValidationExceptionReason' => [ 'type' => 'string', 'enum' => [ 'CONSTRAINT_VIOLATION', 'ILLEGAL_ARGUMENT', 'MALFORMED_QUERY', 'QUERY_CANCELLED', 'QUERY_TOO_LARGE', 'UNSUPPORTED_OPERATION', 'BAD_REQUEST', ], ], 'VectorSearchConfiguration' => [ 'type' => 'structure', 'required' => [ 'dimension', ], 'members' => [ 'dimension' => [ 'shape' => 'VectorSearchDimension', ], ], ], 'VectorSearchDimension' => [ 'type' => 'integer', 'box' => true, 'max' => 65536, 'min' => 1, ], 'VpcEndpointId' => [ 'type' => 'string', 'pattern' => 'vpce-[0-9a-f]{17}', ], 'VpcId' => [ 'type' => 'string', 'pattern' => 'vpc-[a-z0-9]+', ], ],];
