<?php
// This file was auto-generated from sdk-root/src/data/emr-serverless/2021-07-13/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2021-07-13', 'endpointPrefix' => 'emr-serverless', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceFullName' => 'EMR Serverless', 'serviceId' => 'EMR Serverless', 'signatureVersion' => 'v4', 'signingName' => 'emr-serverless', 'uid' => 'emr-serverless-2021-07-13', ], 'operations' => [ 'CancelJobRun' => [ 'name' => 'CancelJobRun', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/applications/{applicationId}/jobruns/{jobRunId}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'CancelJobRunRequest', ], 'output' => [ 'shape' => 'CancelJobRunResponse', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], ], 'idempotent' => true, ], 'CreateApplication' => [ 'name' => 'CreateApplication', 'http' => [ 'method' => 'POST', 'requestUri' => '/applications', 'responseCode' => 200, ], 'input' => [ 'shape' => 'CreateApplicationRequest', ], 'output' => [ 'shape' => 'CreateApplicationResponse', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ConflictException', ], ], 'idempotent' => true, ], 'DeleteApplication' => [ 'name' => 'DeleteApplication', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/applications/{applicationId}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DeleteApplicationRequest', ], 'output' => [ 'shape' => 'DeleteApplicationResponse', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], ], 'idempotent' => true, ], 'GetApplication' => [ 'name' => 'GetApplication', 'http' => [ 'method' => 'GET', 'requestUri' => '/applications/{applicationId}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetApplicationRequest', ], 'output' => [ 'shape' => 'GetApplicationResponse', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], ], ], 'GetDashboardForJobRun' => [ 'name' => 'GetDashboardForJobRun', 'http' => [ 'method' => 'GET', 'requestUri' => '/applications/{applicationId}/jobruns/{jobRunId}/dashboard', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetDashboardForJobRunRequest', ], 'output' => [ 'shape' => 'GetDashboardForJobRunResponse', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], ], ], 'GetJobRun' => [ 'name' => 'GetJobRun', 'http' => [ 'method' => 'GET', 'requestUri' => '/applications/{applicationId}/jobruns/{jobRunId}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetJobRunRequest', ], 'output' => [ 'shape' => 'GetJobRunResponse', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], ], ], 'ListApplications' => [ 'name' => 'ListApplications', 'http' => [ 'method' => 'GET', 'requestUri' => '/applications', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListApplicationsRequest', ], 'output' => [ 'shape' => 'ListApplicationsResponse', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], ], ], 'ListJobRuns' => [ 'name' => 'ListJobRuns', 'http' => [ 'method' => 'GET', 'requestUri' => '/applications/{applicationId}/jobruns', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListJobRunsRequest', ], 'output' => [ 'shape' => 'ListJobRunsResponse', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], ], ], 'ListTagsForResource' => [ 'name' => 'ListTagsForResource', 'http' => [ 'method' => 'GET', 'requestUri' => '/tags/{resourceArn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListTagsForResourceRequest', ], 'output' => [ 'shape' => 'ListTagsForResourceResponse', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], ], ], 'StartApplication' => [ 'name' => 'StartApplication', 'http' => [ 'method' => 'POST', 'requestUri' => '/applications/{applicationId}/start', 'responseCode' => 200, ], 'input' => [ 'shape' => 'StartApplicationRequest', ], 'output' => [ 'shape' => 'StartApplicationResponse', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], 'idempotent' => true, ], 'StartJobRun' => [ 'name' => 'StartJobRun', 'http' => [ 'method' => 'POST', 'requestUri' => '/applications/{applicationId}/jobruns', 'responseCode' => 200, ], 'input' => [ 'shape' => 'StartJobRunRequest', ], 'output' => [ 'shape' => 'StartJobRunResponse', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ConflictException', ], ], 'idempotent' => true, ], 'StopApplication' => [ 'name' => 'StopApplication', 'http' => [ 'method' => 'POST', 'requestUri' => '/applications/{applicationId}/stop', 'responseCode' => 200, ], 'input' => [ 'shape' => 'StopApplicationRequest', ], 'output' => [ 'shape' => 'StopApplicationResponse', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], ], 'idempotent' => true, ], 'TagResource' => [ 'name' => 'TagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/tags/{resourceArn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'TagResourceRequest', ], 'output' => [ 'shape' => 'TagResourceResponse', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], ], ], 'UntagResource' => [ 'name' => 'UntagResource', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/tags/{resourceArn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'UntagResourceRequest', ], 'output' => [ 'shape' => 'UntagResourceResponse', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], ], 'idempotent' => true, ], 'UpdateApplication' => [ 'name' => 'UpdateApplication', 'http' => [ 'method' => 'PATCH', 'requestUri' => '/applications/{applicationId}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'UpdateApplicationRequest', ], 'output' => [ 'shape' => 'UpdateApplicationResponse', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], ], ], ], 'shapes' => [ 'Application' => [ 'type' => 'structure', 'required' => [ 'applicationId', 'arn', 'releaseLabel', 'type', 'state', 'createdAt', 'updatedAt', ], 'members' => [ 'applicationId' => [ 'shape' => 'ApplicationId', ], 'name' => [ 'shape' => 'ApplicationName', ], 'arn' => [ 'shape' => 'ApplicationArn', ], 'releaseLabel' => [ 'shape' => 'ReleaseLabel', ], 'type' => [ 'shape' => 'EngineType', ], 'state' => [ 'shape' => 'ApplicationState', ], 'stateDetails' => [ 'shape' => 'String256', ], 'initialCapacity' => [ 'shape' => 'InitialCapacityConfigMap', ], 'maximumCapacity' => [ 'shape' => 'MaximumAllowedResources', ], 'createdAt' => [ 'shape' => 'Date', ], 'updatedAt' => [ 'shape' => 'Date', ], 'tags' => [ 'shape' => 'TagMap', ], 'autoStartConfiguration' => [ 'shape' => 'AutoStartConfig', ], 'autoStopConfiguration' => [ 'shape' => 'AutoStopConfig', ], 'networkConfiguration' => [ 'shape' => 'NetworkConfiguration', ], 'architecture' => [ 'shape' => 'Architecture', ], 'imageConfiguration' => [ 'shape' => 'ImageConfiguration', ], 'workerTypeSpecifications' => [ 'shape' => 'WorkerTypeSpecificationMap', ], 'runtimeConfiguration' => [ 'shape' => 'ConfigurationList', ], 'monitoringConfiguration' => [ 'shape' => 'MonitoringConfiguration', ], ], ], 'ApplicationArn' => [ 'type' => 'string', 'max' => 1024, 'min' => 60, 'pattern' => 'arn:(aws[a-zA-Z0-9-]*):emr-serverless:.+:(\\d{12}):\\/applications\\/[0-9a-zA-Z]+', ], 'ApplicationId' => [ 'type' => 'string', 'max' => 64, 'min' => 1, 'pattern' => '[0-9a-z]+', ], 'ApplicationList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ApplicationSummary', ], ], 'ApplicationName' => [ 'type' => 'string', 'max' => 64, 'min' => 1, 'pattern' => '[A-Za-z0-9._/#-]+', ], 'ApplicationState' => [ 'type' => 'string', 'enum' => [ 'CREATING', 'CREATED', 'STARTING', 'STARTED', 'STOPPING', 'STOPPED', 'TERMINATED', ], ], 'ApplicationStateSet' => [ 'type' => 'list', 'member' => [ 'shape' => 'ApplicationState', ], 'max' => 7, 'min' => 1, ], 'ApplicationSummary' => [ 'type' => 'structure', 'required' => [ 'id', 'arn', 'releaseLabel', 'type', 'state', 'createdAt', 'updatedAt', ], 'members' => [ 'id' => [ 'shape' => 'ApplicationId', ], 'name' => [ 'shape' => 'ApplicationName', ], 'arn' => [ 'shape' => 'ApplicationArn', ], 'releaseLabel' => [ 'shape' => 'ReleaseLabel', ], 'type' => [ 'shape' => 'EngineType', ], 'state' => [ 'shape' => 'ApplicationState', ], 'stateDetails' => [ 'shape' => 'String256', ], 'createdAt' => [ 'shape' => 'Date', ], 'updatedAt' => [ 'shape' => 'Date', ], 'architecture' => [ 'shape' => 'Architecture', ], ], ], 'Architecture' => [ 'type' => 'string', 'enum' => [ 'ARM64', 'X86_64', ], ], 'AutoStartConfig' => [ 'type' => 'structure', 'members' => [ 'enabled' => [ 'shape' => 'Boolean', ], ], ], 'AutoStopConfig' => [ 'type' => 'structure', 'members' => [ 'enabled' => [ 'shape' => 'Boolean', ], 'idleTimeoutMinutes' => [ 'shape' => 'AutoStopConfigIdleTimeoutMinutesInteger', ], ], ], 'AutoStopConfigIdleTimeoutMinutesInteger' => [ 'type' => 'integer', 'box' => true, 'max' => 10080, 'min' => 1, ], 'Boolean' => [ 'type' => 'boolean', 'box' => true, ], 'CancelJobRunRequest' => [ 'type' => 'structure', 'required' => [ 'applicationId', 'jobRunId', ], 'members' => [ 'applicationId' => [ 'shape' => 'ApplicationId', 'location' => 'uri', 'locationName' => 'applicationId', ], 'jobRunId' => [ 'shape' => 'JobRunId', 'location' => 'uri', 'locationName' => 'jobRunId', ], ], ], 'CancelJobRunResponse' => [ 'type' => 'structure', 'required' => [ 'applicationId', 'jobRunId', ], 'members' => [ 'applicationId' => [ 'shape' => 'ApplicationId', ], 'jobRunId' => [ 'shape' => 'JobRunId', ], ], ], 'ClientToken' => [ 'type' => 'string', 'max' => 64, 'min' => 1, 'pattern' => '[A-Za-z0-9._-]+', ], 'CloudWatchLoggingConfiguration' => [ 'type' => 'structure', 'required' => [ 'enabled', ], 'members' => [ 'enabled' => [ 'shape' => 'Boolean', ], 'logGroupName' => [ 'shape' => 'LogGroupName', ], 'logStreamNamePrefix' => [ 'shape' => 'LogStreamNamePrefix', ], 'encryptionKeyArn' => [ 'shape' => 'EncryptionKeyArn', ], 'logTypes' => [ 'shape' => 'LogTypeMap', ], ], ], 'Configuration' => [ 'type' => 'structure', 'required' => [ 'classification', ], 'members' => [ 'classification' => [ 'shape' => 'String1024', ], 'properties' => [ 'shape' => 'SensitivePropertiesMap', ], 'configurations' => [ 'shape' => 'ConfigurationList', ], ], ], 'ConfigurationList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Configuration', ], 'max' => 100, 'min' => 0, ], 'ConfigurationOverrides' => [ 'type' => 'structure', 'members' => [ 'applicationConfiguration' => [ 'shape' => 'ConfigurationList', ], 'monitoringConfiguration' => [ 'shape' => 'MonitoringConfiguration', ], ], ], 'ConflictException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String1024', ], ], 'error' => [ 'httpStatusCode' => 409, 'senderFault' => true, ], 'exception' => true, ], 'CpuSize' => [ 'type' => 'string', 'max' => 15, 'min' => 1, 'pattern' => '[1-9][0-9]*(\\s)?(vCPU|vcpu|VCPU)?', ], 'CreateApplicationRequest' => [ 'type' => 'structure', 'required' => [ 'releaseLabel', 'type', 'clientToken', ], 'members' => [ 'name' => [ 'shape' => 'ApplicationName', ], 'releaseLabel' => [ 'shape' => 'ReleaseLabel', ], 'type' => [ 'shape' => 'EngineType', ], 'clientToken' => [ 'shape' => 'ClientToken', 'idempotencyToken' => true, ], 'initialCapacity' => [ 'shape' => 'InitialCapacityConfigMap', ], 'maximumCapacity' => [ 'shape' => 'MaximumAllowedResources', ], 'tags' => [ 'shape' => 'TagMap', ], 'autoStartConfiguration' => [ 'shape' => 'AutoStartConfig', ], 'autoStopConfiguration' => [ 'shape' => 'AutoStopConfig', ], 'networkConfiguration' => [ 'shape' => 'NetworkConfiguration', ], 'architecture' => [ 'shape' => 'Architecture', ], 'imageConfiguration' => [ 'shape' => 'ImageConfigurationInput', ], 'workerTypeSpecifications' => [ 'shape' => 'WorkerTypeSpecificationInputMap', ], 'runtimeConfiguration' => [ 'shape' => 'ConfigurationList', ], 'monitoringConfiguration' => [ 'shape' => 'MonitoringConfiguration', ], ], ], 'CreateApplicationResponse' => [ 'type' => 'structure', 'required' => [ 'applicationId', 'arn', ], 'members' => [ 'applicationId' => [ 'shape' => 'ApplicationId', ], 'name' => [ 'shape' => 'ApplicationName', ], 'arn' => [ 'shape' => 'ApplicationArn', ], ], ], 'Date' => [ 'type' => 'timestamp', ], 'DeleteApplicationRequest' => [ 'type' => 'structure', 'required' => [ 'applicationId', ], 'members' => [ 'applicationId' => [ 'shape' => 'ApplicationId', 'location' => 'uri', 'locationName' => 'applicationId', ], ], ], 'DeleteApplicationResponse' => [ 'type' => 'structure', 'members' => [], ], 'DiskSize' => [ 'type' => 'string', 'max' => 15, 'min' => 1, 'pattern' => '[1-9][0-9]*(\\s)?(GB|gb|gB|Gb)', ], 'Double' => [ 'type' => 'double', 'box' => true, ], 'Duration' => [ 'type' => 'long', 'max' => 1000000, 'min' => 0, ], 'EncryptionKeyArn' => [ 'type' => 'string', 'max' => 2048, 'min' => 20, 'pattern' => 'arn:(aws[a-zA-Z0-9-]*):kms:[a-zA-Z0-9\\-]*:(\\d{12})?:key\\/[a-zA-Z0-9-]+', ], 'EngineType' => [ 'type' => 'string', 'max' => 64, 'min' => 1, ], 'EntryPointArgument' => [ 'type' => 'string', 'max' => 10280, 'min' => 1, 'pattern' => '.*\\S.*', 'sensitive' => true, ], 'EntryPointArguments' => [ 'type' => 'list', 'member' => [ 'shape' => 'EntryPointArgument', ], ], 'EntryPointPath' => [ 'type' => 'string', 'max' => 256, 'min' => 1, 'pattern' => '.*\\S.*', 'sensitive' => true, ], 'GetApplicationRequest' => [ 'type' => 'structure', 'required' => [ 'applicationId', ], 'members' => [ 'applicationId' => [ 'shape' => 'ApplicationId', 'location' => 'uri', 'locationName' => 'applicationId', ], ], ], 'GetApplicationResponse' => [ 'type' => 'structure', 'required' => [ 'application', ], 'members' => [ 'application' => [ 'shape' => 'Application', ], ], ], 'GetDashboardForJobRunRequest' => [ 'type' => 'structure', 'required' => [ 'applicationId', 'jobRunId', ], 'members' => [ 'applicationId' => [ 'shape' => 'ApplicationId', 'location' => 'uri', 'locationName' => 'applicationId', ], 'jobRunId' => [ 'shape' => 'JobRunId', 'location' => 'uri', 'locationName' => 'jobRunId', ], ], ], 'GetDashboardForJobRunResponse' => [ 'type' => 'structure', 'members' => [ 'url' => [ 'shape' => 'Url', ], ], ], 'GetJobRunRequest' => [ 'type' => 'structure', 'required' => [ 'applicationId', 'jobRunId', ], 'members' => [ 'applicationId' => [ 'shape' => 'ApplicationId', 'location' => 'uri', 'locationName' => 'applicationId', ], 'jobRunId' => [ 'shape' => 'JobRunId', 'location' => 'uri', 'locationName' => 'jobRunId', ], ], ], 'GetJobRunResponse' => [ 'type' => 'structure', 'required' => [ 'jobRun', ], 'members' => [ 'jobRun' => [ 'shape' => 'JobRun', ], ], ], 'Hive' => [ 'type' => 'structure', 'required' => [ 'query', ], 'members' => [ 'query' => [ 'shape' => 'Query', ], 'initQueryFile' => [ 'shape' => 'InitScriptPath', ], 'parameters' => [ 'shape' => 'HiveCliParameters', ], ], ], 'HiveCliParameters' => [ 'type' => 'string', 'max' => 102400, 'min' => 1, 'pattern' => '.*\\S.*', 'sensitive' => true, ], 'IAMRoleArn' => [ 'type' => 'string', 'max' => 2048, 'min' => 20, 'pattern' => 'arn:(aws[a-zA-Z0-9-]*):iam::(\\d{12})?:(role((\\u002F)|(\\u002F[\\u0021-\\u007F]+\\u002F))[\\w+=,.@-]+)', ], 'ImageConfiguration' => [ 'type' => 'structure', 'required' => [ 'imageUri', ], 'members' => [ 'imageUri' => [ 'shape' => 'ImageUri', ], 'resolvedImageDigest' => [ 'shape' => 'ImageDigest', ], ], ], 'ImageConfigurationInput' => [ 'type' => 'structure', 'members' => [ 'imageUri' => [ 'shape' => 'ImageUri', ], ], ], 'ImageDigest' => [ 'type' => 'string', 'pattern' => 'sha256:[0-9a-f]{64}', ], 'ImageUri' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, 'pattern' => '([a-z0-9]+[a-z0-9-.]*)\\/((?:[a-z0-9]+(?:[._-][a-z0-9]+)*\\/)*[a-z0-9]+(?:[._-][a-z0-9]+)*)(?:\\:([a-zA-Z0-9_][a-zA-Z0-9-._]{0,299})|@(sha256:[0-9a-f]{64}))', ], 'InitScriptPath' => [ 'type' => 'string', 'max' => 256, 'min' => 1, 'pattern' => '.*\\S.*', 'sensitive' => true, ], 'InitialCapacityConfig' => [ 'type' => 'structure', 'required' => [ 'workerCount', ], 'members' => [ 'workerCount' => [ 'shape' => 'WorkerCounts', ], 'workerConfiguration' => [ 'shape' => 'WorkerResourceConfig', ], ], ], 'InitialCapacityConfigMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'WorkerTypeString', ], 'value' => [ 'shape' => 'InitialCapacityConfig', ], 'max' => 10, 'min' => 0, ], 'Integer' => [ 'type' => 'integer', 'box' => true, ], 'InternalServerException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String1024', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, 'fault' => true, ], 'JobArn' => [ 'type' => 'string', 'max' => 1024, 'min' => 60, 'pattern' => 'arn:(aws[a-zA-Z0-9-]*):emr-serverless:.+:(\\d{12}):\\/applications\\/[0-9a-zA-Z]+\\/jobruns\\/[0-9a-zA-Z]+', ], 'JobDriver' => [ 'type' => 'structure', 'members' => [ 'sparkSubmit' => [ 'shape' => 'SparkSubmit', ], 'hive' => [ 'shape' => 'Hive', ], ], 'union' => true, ], 'JobRun' => [ 'type' => 'structure', 'required' => [ 'applicationId', 'jobRunId', 'arn', 'createdBy', 'createdAt', 'updatedAt', 'executionRole', 'state', 'stateDetails', 'releaseLabel', 'jobDriver', ], 'members' => [ 'applicationId' => [ 'shape' => 'ApplicationId', ], 'jobRunId' => [ 'shape' => 'JobRunId', ], 'name' => [ 'shape' => 'String256', ], 'arn' => [ 'shape' => 'JobArn', ], 'createdBy' => [ 'shape' => 'RequestIdentityUserArn', ], 'createdAt' => [ 'shape' => 'Date', ], 'updatedAt' => [ 'shape' => 'Date', ], 'executionRole' => [ 'shape' => 'IAMRoleArn', ], 'state' => [ 'shape' => 'JobRunState', ], 'stateDetails' => [ 'shape' => 'String256', ], 'releaseLabel' => [ 'shape' => 'ReleaseLabel', ], 'configurationOverrides' => [ 'shape' => 'ConfigurationOverrides', ], 'jobDriver' => [ 'shape' => 'JobDriver', ], 'tags' => [ 'shape' => 'TagMap', ], 'totalResourceUtilization' => [ 'shape' => 'TotalResourceUtilization', ], 'networkConfiguration' => [ 'shape' => 'NetworkConfiguration', ], 'totalExecutionDurationSeconds' => [ 'shape' => 'Integer', ], 'executionTimeoutMinutes' => [ 'shape' => 'Duration', 'box' => true, ], 'billedResourceUtilization' => [ 'shape' => 'ResourceUtilization', ], ], ], 'JobRunId' => [ 'type' => 'string', 'max' => 64, 'min' => 1, 'pattern' => '[0-9a-z]+', ], 'JobRunState' => [ 'type' => 'string', 'enum' => [ 'SUBMITTED', 'PENDING', 'SCHEDULED', 'RUNNING', 'SUCCESS', 'FAILED', 'CANCELLING', 'CANCELLED', ], ], 'JobRunStateSet' => [ 'type' => 'list', 'member' => [ 'shape' => 'JobRunState', ], 'max' => 8, 'min' => 0, ], 'JobRunSummary' => [ 'type' => 'structure', 'required' => [ 'applicationId', 'id', 'arn', 'createdBy', 'createdAt', 'updatedAt', 'executionRole', 'state', 'stateDetails', 'releaseLabel', ], 'members' => [ 'applicationId' => [ 'shape' => 'ApplicationId', ], 'id' => [ 'shape' => 'JobRunId', ], 'name' => [ 'shape' => 'String256', ], 'arn' => [ 'shape' => 'JobArn', ], 'createdBy' => [ 'shape' => 'RequestIdentityUserArn', ], 'createdAt' => [ 'shape' => 'Date', ], 'updatedAt' => [ 'shape' => 'Date', ], 'executionRole' => [ 'shape' => 'IAMRoleArn', ], 'state' => [ 'shape' => 'JobRunState', ], 'stateDetails' => [ 'shape' => 'String256', ], 'releaseLabel' => [ 'shape' => 'ReleaseLabel', ], 'type' => [ 'shape' => 'JobRunType', ], ], ], 'JobRunType' => [ 'type' => 'string', ], 'JobRuns' => [ 'type' => 'list', 'member' => [ 'shape' => 'JobRunSummary', ], ], 'ListApplicationsRequest' => [ 'type' => 'structure', 'members' => [ 'nextToken' => [ 'shape' => 'NextToken', 'location' => 'querystring', 'locationName' => 'nextToken', ], 'maxResults' => [ 'shape' => 'ListApplicationsRequestMaxResultsInteger', 'location' => 'querystring', 'locationName' => 'maxResults', ], 'states' => [ 'shape' => 'ApplicationStateSet', 'location' => 'querystring', 'locationName' => 'states', ], ], ], 'ListApplicationsRequestMaxResultsInteger' => [ 'type' => 'integer', 'box' => true, 'max' => 50, 'min' => 1, ], 'ListApplicationsResponse' => [ 'type' => 'structure', 'required' => [ 'applications', ], 'members' => [ 'applications' => [ 'shape' => 'ApplicationList', ], 'nextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListJobRunsRequest' => [ 'type' => 'structure', 'required' => [ 'applicationId', ], 'members' => [ 'applicationId' => [ 'shape' => 'ApplicationId', 'location' => 'uri', 'locationName' => 'applicationId', ], 'nextToken' => [ 'shape' => 'NextToken', 'location' => 'querystring', 'locationName' => 'nextToken', ], 'maxResults' => [ 'shape' => 'ListJobRunsRequestMaxResultsInteger', 'location' => 'querystring', 'locationName' => 'maxResults', ], 'createdAtAfter' => [ 'shape' => 'Date', 'location' => 'querystring', 'locationName' => 'createdAtAfter', ], 'createdAtBefore' => [ 'shape' => 'Date', 'location' => 'querystring', 'locationName' => 'createdAtBefore', ], 'states' => [ 'shape' => 'JobRunStateSet', 'location' => 'querystring', 'locationName' => 'states', ], ], ], 'ListJobRunsRequestMaxResultsInteger' => [ 'type' => 'integer', 'box' => true, 'max' => 50, 'min' => 1, ], 'ListJobRunsResponse' => [ 'type' => 'structure', 'required' => [ 'jobRuns', ], 'members' => [ 'jobRuns' => [ 'shape' => 'JobRuns', ], 'nextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListTagsForResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', ], 'members' => [ 'resourceArn' => [ 'shape' => 'ResourceArn', 'location' => 'uri', 'locationName' => 'resourceArn', ], ], ], 'ListTagsForResourceResponse' => [ 'type' => 'structure', 'members' => [ 'tags' => [ 'shape' => 'TagMap', ], ], ], 'LogGroupName' => [ 'type' => 'string', 'max' => 512, 'min' => 1, 'pattern' => '[\\.\\-_/#A-Za-z0-9]+', ], 'LogStreamNamePrefix' => [ 'type' => 'string', 'max' => 512, 'min' => 1, 'pattern' => '[^:*]*', ], 'LogTypeList' => [ 'type' => 'list', 'member' => [ 'shape' => 'LogTypeString', ], 'max' => 5, 'min' => 1, ], 'LogTypeMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'WorkerTypeString', ], 'value' => [ 'shape' => 'LogTypeList', ], 'max' => 4, 'min' => 1, ], 'LogTypeString' => [ 'type' => 'string', 'max' => 50, 'min' => 1, 'pattern' => '[a-zA-Z]+[-_]*[a-zA-Z]+', ], 'ManagedPersistenceMonitoringConfiguration' => [ 'type' => 'structure', 'members' => [ 'enabled' => [ 'shape' => 'Boolean', ], 'encryptionKeyArn' => [ 'shape' => 'EncryptionKeyArn', ], ], ], 'MaximumAllowedResources' => [ 'type' => 'structure', 'required' => [ 'cpu', 'memory', ], 'members' => [ 'cpu' => [ 'shape' => 'CpuSize', ], 'memory' => [ 'shape' => 'MemorySize', ], 'disk' => [ 'shape' => 'DiskSize', ], ], ], 'MemorySize' => [ 'type' => 'string', 'max' => 15, 'min' => 1, 'pattern' => '[1-9][0-9]*(\\s)?(GB|gb|gB|Gb)?', ], 'MonitoringConfiguration' => [ 'type' => 'structure', 'members' => [ 's3MonitoringConfiguration' => [ 'shape' => 'S3MonitoringConfiguration', ], 'managedPersistenceMonitoringConfiguration' => [ 'shape' => 'ManagedPersistenceMonitoringConfiguration', ], 'cloudWatchLoggingConfiguration' => [ 'shape' => 'CloudWatchLoggingConfiguration', ], ], ], 'NetworkConfiguration' => [ 'type' => 'structure', 'members' => [ 'subnetIds' => [ 'shape' => 'SubnetIds', ], 'securityGroupIds' => [ 'shape' => 'SecurityGroupIds', ], ], ], 'NextToken' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, 'pattern' => '[A-Za-z0-9_=-]+', ], 'Query' => [ 'type' => 'string', 'max' => 10280, 'min' => 1, 'pattern' => '.*\\S.*', 'sensitive' => true, ], 'ReleaseLabel' => [ 'type' => 'string', 'max' => 64, 'min' => 1, 'pattern' => '[A-Za-z0-9._/-]+', ], 'RequestIdentityUserArn' => [ 'type' => 'string', 'max' => 2048, 'min' => 20, 'pattern' => 'arn:(aws[a-zA-Z0-9-]*):(iam|sts)::(\\d{12})?:[\\w/+=,.@-]+', ], 'ResourceArn' => [ 'type' => 'string', 'max' => 1024, 'min' => 60, 'pattern' => 'arn:(aws[a-zA-Z0-9-]*):emr-serverless:.+:(\\d{12}):\\/applications\\/[0-9a-zA-Z]+(\\/jobruns\\/[0-9a-zA-Z]+)?', ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String1024', ], ], 'error' => [ 'httpStatusCode' => 404, 'senderFault' => true, ], 'exception' => true, ], 'ResourceUtilization' => [ 'type' => 'structure', 'members' => [ 'vCPUHour' => [ 'shape' => 'Double', ], 'memoryGBHour' => [ 'shape' => 'Double', ], 'storageGBHour' => [ 'shape' => 'Double', ], ], ], 'S3MonitoringConfiguration' => [ 'type' => 'structure', 'members' => [ 'logUri' => [ 'shape' => 'UriString', ], 'encryptionKeyArn' => [ 'shape' => 'EncryptionKeyArn', ], ], ], 'SecurityGroupIds' => [ 'type' => 'list', 'member' => [ 'shape' => 'SecurityGroupString', ], 'max' => 5, 'min' => 0, ], 'SecurityGroupString' => [ 'type' => 'string', 'max' => 32, 'min' => 1, 'pattern' => '[-0-9a-zA-Z]+.*', ], 'SensitivePropertiesMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'String1024', ], 'value' => [ 'shape' => 'String1024', ], 'max' => 100, 'min' => 0, 'sensitive' => true, ], 'ServiceQuotaExceededException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String1024', ], ], 'error' => [ 'httpStatusCode' => 402, 'senderFault' => true, ], 'exception' => true, ], 'SparkSubmit' => [ 'type' => 'structure', 'required' => [ 'entryPoint', ], 'members' => [ 'entryPoint' => [ 'shape' => 'EntryPointPath', ], 'entryPointArguments' => [ 'shape' => 'EntryPointArguments', ], 'sparkSubmitParameters' => [ 'shape' => 'SparkSubmitParameters', ], ], ], 'SparkSubmitParameters' => [ 'type' => 'string', 'max' => 102400, 'min' => 1, 'pattern' => '.*\\S.*', 'sensitive' => true, ], 'StartApplicationRequest' => [ 'type' => 'structure', 'required' => [ 'applicationId', ], 'members' => [ 'applicationId' => [ 'shape' => 'ApplicationId', 'location' => 'uri', 'locationName' => 'applicationId', ], ], ], 'StartApplicationResponse' => [ 'type' => 'structure', 'members' => [], ], 'StartJobRunRequest' => [ 'type' => 'structure', 'required' => [ 'applicationId', 'clientToken', 'executionRoleArn', ], 'members' => [ 'applicationId' => [ 'shape' => 'ApplicationId', 'location' => 'uri', 'locationName' => 'applicationId', ], 'clientToken' => [ 'shape' => 'ClientToken', 'idempotencyToken' => true, ], 'executionRoleArn' => [ 'shape' => 'IAMRoleArn', ], 'jobDriver' => [ 'shape' => 'JobDriver', ], 'configurationOverrides' => [ 'shape' => 'ConfigurationOverrides', ], 'tags' => [ 'shape' => 'TagMap', ], 'executionTimeoutMinutes' => [ 'shape' => 'Duration', 'box' => true, ], 'name' => [ 'shape' => 'String256', ], ], ], 'StartJobRunResponse' => [ 'type' => 'structure', 'required' => [ 'applicationId', 'jobRunId', 'arn', ], 'members' => [ 'applicationId' => [ 'shape' => 'ApplicationId', ], 'jobRunId' => [ 'shape' => 'JobRunId', ], 'arn' => [ 'shape' => 'JobArn', ], ], ], 'StopApplicationRequest' => [ 'type' => 'structure', 'required' => [ 'applicationId', ], 'members' => [ 'applicationId' => [ 'shape' => 'ApplicationId', 'location' => 'uri', 'locationName' => 'applicationId', ], ], ], 'StopApplicationResponse' => [ 'type' => 'structure', 'members' => [], ], 'String1024' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, 'pattern' => '.*\\S.*', ], 'String256' => [ 'type' => 'string', 'max' => 256, 'min' => 1, 'pattern' => '.*\\S.*', ], 'SubnetIds' => [ 'type' => 'list', 'member' => [ 'shape' => 'SubnetString', ], 'max' => 16, 'min' => 0, ], 'SubnetString' => [ 'type' => 'string', 'max' => 32, 'min' => 1, 'pattern' => '[-0-9a-zA-Z]+.*', ], 'TagKey' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '[A-Za-z0-9 /_.:=+@-]+', ], 'TagKeyList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagKey', ], 'max' => 200, 'min' => 1, ], 'TagMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'TagKey', ], 'value' => [ 'shape' => 'TagValue', ], 'max' => 200, 'min' => 0, ], 'TagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'tags', ], 'members' => [ 'resourceArn' => [ 'shape' => 'ResourceArn', 'location' => 'uri', 'locationName' => 'resourceArn', ], 'tags' => [ 'shape' => 'TagMap', ], ], ], 'TagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'TagValue' => [ 'type' => 'string', 'max' => 256, 'min' => 0, 'pattern' => '[A-Za-z0-9 /_.:=+@-]*', ], 'TotalResourceUtilization' => [ 'type' => 'structure', 'members' => [ 'vCPUHour' => [ 'shape' => 'Double', ], 'memoryGBHour' => [ 'shape' => 'Double', ], 'storageGBHour' => [ 'shape' => 'Double', ], ], ], 'UntagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'tagKeys', ], 'members' => [ 'resourceArn' => [ 'shape' => 'ResourceArn', 'location' => 'uri', 'locationName' => 'resourceArn', ], 'tagKeys' => [ 'shape' => 'TagKeyList', 'location' => 'querystring', 'locationName' => 'tagKeys', ], ], ], 'UntagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'UpdateApplicationRequest' => [ 'type' => 'structure', 'required' => [ 'applicationId', 'clientToken', ], 'members' => [ 'applicationId' => [ 'shape' => 'ApplicationId', 'location' => 'uri', 'locationName' => 'applicationId', ], 'clientToken' => [ 'shape' => 'ClientToken', 'idempotencyToken' => true, ], 'initialCapacity' => [ 'shape' => 'InitialCapacityConfigMap', ], 'maximumCapacity' => [ 'shape' => 'MaximumAllowedResources', ], 'autoStartConfiguration' => [ 'shape' => 'AutoStartConfig', ], 'autoStopConfiguration' => [ 'shape' => 'AutoStopConfig', ], 'networkConfiguration' => [ 'shape' => 'NetworkConfiguration', ], 'architecture' => [ 'shape' => 'Architecture', ], 'imageConfiguration' => [ 'shape' => 'ImageConfigurationInput', ], 'workerTypeSpecifications' => [ 'shape' => 'WorkerTypeSpecificationInputMap', ], 'releaseLabel' => [ 'shape' => 'ReleaseLabel', ], 'runtimeConfiguration' => [ 'shape' => 'ConfigurationList', ], 'monitoringConfiguration' => [ 'shape' => 'MonitoringConfiguration', ], ], ], 'UpdateApplicationResponse' => [ 'type' => 'structure', 'required' => [ 'application', ], 'members' => [ 'application' => [ 'shape' => 'Application', ], ], ], 'UriString' => [ 'type' => 'string', 'max' => 10280, 'min' => 1, 'pattern' => '.*[\\u0020-\\uD7FF\\uE000-\\uFFFD\\uD800\\uDBFF-\\uDC00\\uDFFF\\r\\n\\t]*.*', ], 'Url' => [ 'type' => 'string', 'max' => 2048, 'min' => 1, ], 'ValidationException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String1024', ], ], 'error' => [ 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'WorkerCounts' => [ 'type' => 'long', 'max' => 1000000, 'min' => 1, ], 'WorkerResourceConfig' => [ 'type' => 'structure', 'required' => [ 'cpu', 'memory', ], 'members' => [ 'cpu' => [ 'shape' => 'CpuSize', ], 'memory' => [ 'shape' => 'MemorySize', ], 'disk' => [ 'shape' => 'DiskSize', ], ], ], 'WorkerTypeSpecification' => [ 'type' => 'structure', 'members' => [ 'imageConfiguration' => [ 'shape' => 'ImageConfiguration', ], ], ], 'WorkerTypeSpecificationInput' => [ 'type' => 'structure', 'members' => [ 'imageConfiguration' => [ 'shape' => 'ImageConfigurationInput', ], ], ], 'WorkerTypeSpecificationInputMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'WorkerTypeString', ], 'value' => [ 'shape' => 'WorkerTypeSpecificationInput', ], ], 'WorkerTypeSpecificationMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'WorkerTypeString', ], 'value' => [ 'shape' => 'WorkerTypeSpecification', ], ], 'WorkerTypeString' => [ 'type' => 'string', 'max' => 50, 'min' => 1, 'pattern' => '[a-zA-Z]+[-_]*[a-zA-Z]+', ], ],];
