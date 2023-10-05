<?php
// This file was auto-generated from sdk-root/src/data/simspaceweaver/2022-10-28/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2022-10-28', 'endpointPrefix' => 'simspaceweaver', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceFullName' => 'AWS SimSpace Weaver', 'serviceId' => 'SimSpaceWeaver', 'signatureVersion' => 'v4', 'signingName' => 'simspaceweaver', 'uid' => 'simspaceweaver-2022-10-28', ], 'operations' => [ 'CreateSnapshot' => [ 'name' => 'CreateSnapshot', 'http' => [ 'method' => 'POST', 'requestUri' => '/createsnapshot', 'responseCode' => 200, ], 'input' => [ 'shape' => 'CreateSnapshotInput', ], 'output' => [ 'shape' => 'CreateSnapshotOutput', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], ], ], 'DeleteApp' => [ 'name' => 'DeleteApp', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/deleteapp', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DeleteAppInput', ], 'output' => [ 'shape' => 'DeleteAppOutput', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], ], 'idempotent' => true, ], 'DeleteSimulation' => [ 'name' => 'DeleteSimulation', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/deletesimulation', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DeleteSimulationInput', ], 'output' => [ 'shape' => 'DeleteSimulationOutput', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], ], 'idempotent' => true, ], 'DescribeApp' => [ 'name' => 'DescribeApp', 'http' => [ 'method' => 'GET', 'requestUri' => '/describeapp', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DescribeAppInput', ], 'output' => [ 'shape' => 'DescribeAppOutput', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], ], ], 'DescribeSimulation' => [ 'name' => 'DescribeSimulation', 'http' => [ 'method' => 'GET', 'requestUri' => '/describesimulation', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DescribeSimulationInput', ], 'output' => [ 'shape' => 'DescribeSimulationOutput', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], ], ], 'ListApps' => [ 'name' => 'ListApps', 'http' => [ 'method' => 'GET', 'requestUri' => '/listapps', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListAppsInput', ], 'output' => [ 'shape' => 'ListAppsOutput', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], ], ], 'ListSimulations' => [ 'name' => 'ListSimulations', 'http' => [ 'method' => 'GET', 'requestUri' => '/listsimulations', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListSimulationsInput', ], 'output' => [ 'shape' => 'ListSimulationsOutput', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], ], ], 'ListTagsForResource' => [ 'name' => 'ListTagsForResource', 'http' => [ 'method' => 'GET', 'requestUri' => '/tags/{ResourceArn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListTagsForResourceInput', ], 'output' => [ 'shape' => 'ListTagsForResourceOutput', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ValidationException', ], ], ], 'StartApp' => [ 'name' => 'StartApp', 'http' => [ 'method' => 'POST', 'requestUri' => '/startapp', 'responseCode' => 200, ], 'input' => [ 'shape' => 'StartAppInput', ], 'output' => [ 'shape' => 'StartAppOutput', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'ConflictException', ], ], ], 'StartClock' => [ 'name' => 'StartClock', 'http' => [ 'method' => 'POST', 'requestUri' => '/startclock', 'responseCode' => 200, ], 'input' => [ 'shape' => 'StartClockInput', ], 'output' => [ 'shape' => 'StartClockOutput', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], ], ], 'StartSimulation' => [ 'name' => 'StartSimulation', 'http' => [ 'method' => 'POST', 'requestUri' => '/startsimulation', 'responseCode' => 200, ], 'input' => [ 'shape' => 'StartSimulationInput', ], 'output' => [ 'shape' => 'StartSimulationOutput', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'ConflictException', ], ], ], 'StopApp' => [ 'name' => 'StopApp', 'http' => [ 'method' => 'POST', 'requestUri' => '/stopapp', 'responseCode' => 200, ], 'input' => [ 'shape' => 'StopAppInput', ], 'output' => [ 'shape' => 'StopAppOutput', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], ], ], 'StopClock' => [ 'name' => 'StopClock', 'http' => [ 'method' => 'POST', 'requestUri' => '/stopclock', 'responseCode' => 200, ], 'input' => [ 'shape' => 'StopClockInput', ], 'output' => [ 'shape' => 'StopClockOutput', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], ], ], 'StopSimulation' => [ 'name' => 'StopSimulation', 'http' => [ 'method' => 'POST', 'requestUri' => '/stopsimulation', 'responseCode' => 200, ], 'input' => [ 'shape' => 'StopSimulationInput', ], 'output' => [ 'shape' => 'StopSimulationOutput', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], ], ], 'TagResource' => [ 'name' => 'TagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/tags/{ResourceArn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'TagResourceInput', ], 'output' => [ 'shape' => 'TagResourceOutput', ], 'errors' => [ [ 'shape' => 'TooManyTagsException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ValidationException', ], ], ], 'UntagResource' => [ 'name' => 'UntagResource', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/tags/{ResourceArn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'UntagResourceInput', ], 'output' => [ 'shape' => 'UntagResourceOutput', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ValidationException', ], ], ], ], 'shapes' => [ 'AccessDeniedException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'NonEmptyString', ], ], 'error' => [ 'httpStatusCode' => 403, 'senderFault' => true, ], 'exception' => true, ], 'AppPortMappings' => [ 'type' => 'list', 'member' => [ 'shape' => 'SimulationAppPortMapping', ], ], 'BucketName' => [ 'type' => 'string', 'max' => 63, 'min' => 3, ], 'ClientToken' => [ 'type' => 'string', 'max' => 128, 'min' => 32, 'pattern' => '^[a-zA-Z0-9-]+$', 'sensitive' => true, ], 'ClockStatus' => [ 'type' => 'string', 'enum' => [ 'UNKNOWN', 'STARTING', 'STARTED', 'STOPPING', 'STOPPED', ], ], 'ClockTargetStatus' => [ 'type' => 'string', 'enum' => [ 'UNKNOWN', 'STARTED', 'STOPPED', ], ], 'CloudWatchLogsLogGroup' => [ 'type' => 'structure', 'members' => [ 'LogGroupArn' => [ 'shape' => 'LogGroupArn', ], ], ], 'ConflictException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'NonEmptyString', ], ], 'error' => [ 'httpStatusCode' => 409, 'senderFault' => true, ], 'exception' => true, ], 'CreateSnapshotInput' => [ 'type' => 'structure', 'required' => [ 'Destination', 'Simulation', ], 'members' => [ 'Destination' => [ 'shape' => 'S3Destination', ], 'Simulation' => [ 'shape' => 'SimSpaceWeaverResourceName', ], ], ], 'CreateSnapshotOutput' => [ 'type' => 'structure', 'members' => [], ], 'DeleteAppInput' => [ 'type' => 'structure', 'required' => [ 'App', 'Domain', 'Simulation', ], 'members' => [ 'App' => [ 'shape' => 'SimSpaceWeaverResourceName', 'location' => 'querystring', 'locationName' => 'app', ], 'Domain' => [ 'shape' => 'SimSpaceWeaverResourceName', 'location' => 'querystring', 'locationName' => 'domain', ], 'Simulation' => [ 'shape' => 'SimSpaceWeaverResourceName', 'location' => 'querystring', 'locationName' => 'simulation', ], ], ], 'DeleteAppOutput' => [ 'type' => 'structure', 'members' => [], ], 'DeleteSimulationInput' => [ 'type' => 'structure', 'required' => [ 'Simulation', ], 'members' => [ 'Simulation' => [ 'shape' => 'SimSpaceWeaverResourceName', 'location' => 'querystring', 'locationName' => 'simulation', ], ], ], 'DeleteSimulationOutput' => [ 'type' => 'structure', 'members' => [], ], 'DescribeAppInput' => [ 'type' => 'structure', 'required' => [ 'App', 'Domain', 'Simulation', ], 'members' => [ 'App' => [ 'shape' => 'SimSpaceWeaverLongResourceName', 'location' => 'querystring', 'locationName' => 'app', ], 'Domain' => [ 'shape' => 'SimSpaceWeaverResourceName', 'location' => 'querystring', 'locationName' => 'domain', ], 'Simulation' => [ 'shape' => 'SimSpaceWeaverResourceName', 'location' => 'querystring', 'locationName' => 'simulation', ], ], ], 'DescribeAppOutput' => [ 'type' => 'structure', 'members' => [ 'Description' => [ 'shape' => 'Description', ], 'Domain' => [ 'shape' => 'SimSpaceWeaverResourceName', ], 'EndpointInfo' => [ 'shape' => 'SimulationAppEndpointInfo', ], 'LaunchOverrides' => [ 'shape' => 'LaunchOverrides', ], 'Name' => [ 'shape' => 'SimSpaceWeaverLongResourceName', ], 'Simulation' => [ 'shape' => 'SimSpaceWeaverResourceName', ], 'Status' => [ 'shape' => 'SimulationAppStatus', ], 'TargetStatus' => [ 'shape' => 'SimulationAppTargetStatus', ], ], ], 'DescribeSimulationInput' => [ 'type' => 'structure', 'required' => [ 'Simulation', ], 'members' => [ 'Simulation' => [ 'shape' => 'SimSpaceWeaverResourceName', 'location' => 'querystring', 'locationName' => 'simulation', ], ], ], 'DescribeSimulationOutput' => [ 'type' => 'structure', 'members' => [ 'Arn' => [ 'shape' => 'SimSpaceWeaverArn', ], 'CreationTime' => [ 'shape' => 'Timestamp', ], 'Description' => [ 'shape' => 'Description', ], 'ExecutionId' => [ 'shape' => 'UUID', ], 'LiveSimulationState' => [ 'shape' => 'LiveSimulationState', ], 'LoggingConfiguration' => [ 'shape' => 'LoggingConfiguration', ], 'MaximumDuration' => [ 'shape' => 'TimeToLiveString', ], 'Name' => [ 'shape' => 'SimSpaceWeaverResourceName', ], 'RoleArn' => [ 'shape' => 'RoleArn', ], 'SchemaError' => [ 'shape' => 'OptionalString', 'deprecated' => true, 'deprecatedMessage' => 'SchemaError is no longer used, check StartError instead.', ], 'SchemaS3Location' => [ 'shape' => 'S3Location', ], 'SnapshotS3Location' => [ 'shape' => 'S3Location', ], 'StartError' => [ 'shape' => 'OptionalString', ], 'Status' => [ 'shape' => 'SimulationStatus', ], 'TargetStatus' => [ 'shape' => 'SimulationTargetStatus', ], ], ], 'Description' => [ 'type' => 'string', 'max' => 500, 'min' => 0, ], 'Domain' => [ 'type' => 'structure', 'members' => [ 'Lifecycle' => [ 'shape' => 'LifecycleManagementStrategy', ], 'Name' => [ 'shape' => 'SimSpaceWeaverResourceName', ], ], ], 'DomainList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Domain', ], ], 'InternalServerException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'NonEmptyString', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, 'fault' => true, ], 'LaunchCommandList' => [ 'type' => 'list', 'member' => [ 'shape' => 'NonEmptyString', ], ], 'LaunchOverrides' => [ 'type' => 'structure', 'members' => [ 'LaunchCommands' => [ 'shape' => 'LaunchCommandList', ], ], ], 'LifecycleManagementStrategy' => [ 'type' => 'string', 'enum' => [ 'Unknown', 'PerWorker', 'BySpatialSubdivision', 'ByRequest', ], ], 'ListAppsInput' => [ 'type' => 'structure', 'required' => [ 'Simulation', ], 'members' => [ 'Domain' => [ 'shape' => 'SimSpaceWeaverResourceName', 'location' => 'querystring', 'locationName' => 'domain', ], 'MaxResults' => [ 'shape' => 'PositiveInteger', 'location' => 'querystring', 'locationName' => 'maxResults', ], 'NextToken' => [ 'shape' => 'OptionalString', 'location' => 'querystring', 'locationName' => 'nextToken', ], 'Simulation' => [ 'shape' => 'SimSpaceWeaverResourceName', 'location' => 'querystring', 'locationName' => 'simulation', ], ], ], 'ListAppsOutput' => [ 'type' => 'structure', 'members' => [ 'Apps' => [ 'shape' => 'SimulationAppList', ], 'NextToken' => [ 'shape' => 'OptionalString', ], ], ], 'ListSimulationsInput' => [ 'type' => 'structure', 'members' => [ 'MaxResults' => [ 'shape' => 'PositiveInteger', 'location' => 'querystring', 'locationName' => 'maxResults', ], 'NextToken' => [ 'shape' => 'OptionalString', 'location' => 'querystring', 'locationName' => 'nextToken', ], ], ], 'ListSimulationsOutput' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'OptionalString', ], 'Simulations' => [ 'shape' => 'SimulationList', ], ], ], 'ListTagsForResourceInput' => [ 'type' => 'structure', 'required' => [ 'ResourceArn', ], 'members' => [ 'ResourceArn' => [ 'shape' => 'SimSpaceWeaverArn', 'location' => 'uri', 'locationName' => 'ResourceArn', ], ], ], 'ListTagsForResourceOutput' => [ 'type' => 'structure', 'members' => [ 'Tags' => [ 'shape' => 'TagMap', ], ], ], 'LiveSimulationState' => [ 'type' => 'structure', 'members' => [ 'Clocks' => [ 'shape' => 'SimulationClockList', ], 'Domains' => [ 'shape' => 'DomainList', ], ], ], 'LogDestination' => [ 'type' => 'structure', 'members' => [ 'CloudWatchLogsLogGroup' => [ 'shape' => 'CloudWatchLogsLogGroup', ], ], ], 'LogDestinations' => [ 'type' => 'list', 'member' => [ 'shape' => 'LogDestination', ], ], 'LogGroupArn' => [ 'type' => 'string', 'max' => 1600, 'min' => 0, 'pattern' => '^arn:(?:aws|aws-cn|aws-us-gov):log-group:([a-z]{2}-[a-z]+-\\d{1}):(\\d{12})?:role\\/(.+)$', ], 'LoggingConfiguration' => [ 'type' => 'structure', 'members' => [ 'Destinations' => [ 'shape' => 'LogDestinations', ], ], ], 'NonEmptyString' => [ 'type' => 'string', 'max' => 1600, 'min' => 1, ], 'ObjectKey' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, ], 'ObjectKeyPrefix' => [ 'type' => 'string', 'max' => 1024, 'min' => 0, ], 'OptionalString' => [ 'type' => 'string', ], 'PortNumber' => [ 'type' => 'integer', 'box' => true, 'max' => 65535, 'min' => 0, ], 'PositiveInteger' => [ 'type' => 'integer', 'box' => true, 'min' => 1, ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'NonEmptyString', ], ], 'error' => [ 'httpStatusCode' => 404, 'senderFault' => true, ], 'exception' => true, ], 'RoleArn' => [ 'type' => 'string', 'max' => 1600, 'min' => 0, 'pattern' => '^arn:(?:aws|aws-cn|aws-us-gov):iam::(\\d{12})?:role\\/(.+)$', ], 'S3Destination' => [ 'type' => 'structure', 'required' => [ 'BucketName', ], 'members' => [ 'BucketName' => [ 'shape' => 'BucketName', ], 'ObjectKeyPrefix' => [ 'shape' => 'ObjectKeyPrefix', ], ], ], 'S3Location' => [ 'type' => 'structure', 'required' => [ 'BucketName', 'ObjectKey', ], 'members' => [ 'BucketName' => [ 'shape' => 'BucketName', ], 'ObjectKey' => [ 'shape' => 'ObjectKey', ], ], ], 'ServiceQuotaExceededException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'NonEmptyString', ], ], 'error' => [ 'httpStatusCode' => 402, 'senderFault' => true, ], 'exception' => true, ], 'SimSpaceWeaverArn' => [ 'type' => 'string', 'max' => 1600, 'min' => 0, 'pattern' => '^arn:(?:aws|aws-cn|aws-us-gov):simspaceweaver:([a-z]{2}-[a-z]+-\\d{1}):(\\d{12})?:([a-z]+)\\/(.+)$', ], 'SimSpaceWeaverLongResourceName' => [ 'type' => 'string', 'max' => 256, 'min' => 1, 'pattern' => '^[a-zA-Z0-9_.-]+$', ], 'SimSpaceWeaverResourceName' => [ 'type' => 'string', 'max' => 64, 'min' => 1, 'pattern' => '^[a-zA-Z0-9_.-]+$', ], 'SimulationAppEndpointInfo' => [ 'type' => 'structure', 'members' => [ 'Address' => [ 'shape' => 'NonEmptyString', ], 'IngressPortMappings' => [ 'shape' => 'AppPortMappings', ], ], ], 'SimulationAppList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SimulationAppMetadata', ], ], 'SimulationAppMetadata' => [ 'type' => 'structure', 'members' => [ 'Domain' => [ 'shape' => 'SimSpaceWeaverResourceName', ], 'Name' => [ 'shape' => 'SimSpaceWeaverLongResourceName', ], 'Simulation' => [ 'shape' => 'SimSpaceWeaverResourceName', ], 'Status' => [ 'shape' => 'SimulationAppStatus', ], 'TargetStatus' => [ 'shape' => 'SimulationAppTargetStatus', ], ], ], 'SimulationAppPortMapping' => [ 'type' => 'structure', 'members' => [ 'Actual' => [ 'shape' => 'PortNumber', ], 'Declared' => [ 'shape' => 'PortNumber', ], ], ], 'SimulationAppStatus' => [ 'type' => 'string', 'enum' => [ 'STARTING', 'STARTED', 'STOPPING', 'STOPPED', 'ERROR', 'UNKNOWN', ], ], 'SimulationAppTargetStatus' => [ 'type' => 'string', 'enum' => [ 'UNKNOWN', 'STARTED', 'STOPPED', ], ], 'SimulationClock' => [ 'type' => 'structure', 'members' => [ 'Status' => [ 'shape' => 'ClockStatus', ], 'TargetStatus' => [ 'shape' => 'ClockTargetStatus', ], ], ], 'SimulationClockList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SimulationClock', ], ], 'SimulationList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SimulationMetadata', ], ], 'SimulationMetadata' => [ 'type' => 'structure', 'members' => [ 'Arn' => [ 'shape' => 'SimSpaceWeaverArn', ], 'CreationTime' => [ 'shape' => 'Timestamp', ], 'Name' => [ 'shape' => 'SimSpaceWeaverResourceName', ], 'Status' => [ 'shape' => 'SimulationStatus', ], 'TargetStatus' => [ 'shape' => 'SimulationTargetStatus', ], ], ], 'SimulationStatus' => [ 'type' => 'string', 'enum' => [ 'UNKNOWN', 'STARTING', 'STARTED', 'STOPPING', 'STOPPED', 'FAILED', 'DELETING', 'DELETED', 'SNAPSHOT_IN_PROGRESS', ], ], 'SimulationTargetStatus' => [ 'type' => 'string', 'enum' => [ 'UNKNOWN', 'STARTED', 'STOPPED', 'DELETED', ], ], 'StartAppInput' => [ 'type' => 'structure', 'required' => [ 'Domain', 'Name', 'Simulation', ], 'members' => [ 'ClientToken' => [ 'shape' => 'ClientToken', 'idempotencyToken' => true, ], 'Description' => [ 'shape' => 'Description', ], 'Domain' => [ 'shape' => 'SimSpaceWeaverResourceName', ], 'LaunchOverrides' => [ 'shape' => 'LaunchOverrides', ], 'Name' => [ 'shape' => 'SimSpaceWeaverResourceName', ], 'Simulation' => [ 'shape' => 'SimSpaceWeaverResourceName', ], ], ], 'StartAppOutput' => [ 'type' => 'structure', 'members' => [ 'Domain' => [ 'shape' => 'SimSpaceWeaverResourceName', ], 'Name' => [ 'shape' => 'SimSpaceWeaverResourceName', ], 'Simulation' => [ 'shape' => 'SimSpaceWeaverResourceName', ], ], ], 'StartClockInput' => [ 'type' => 'structure', 'required' => [ 'Simulation', ], 'members' => [ 'Simulation' => [ 'shape' => 'SimSpaceWeaverResourceName', ], ], ], 'StartClockOutput' => [ 'type' => 'structure', 'members' => [], ], 'StartSimulationInput' => [ 'type' => 'structure', 'required' => [ 'Name', 'RoleArn', ], 'members' => [ 'ClientToken' => [ 'shape' => 'ClientToken', 'idempotencyToken' => true, ], 'Description' => [ 'shape' => 'Description', ], 'MaximumDuration' => [ 'shape' => 'TimeToLiveString', ], 'Name' => [ 'shape' => 'SimSpaceWeaverResourceName', ], 'RoleArn' => [ 'shape' => 'RoleArn', ], 'SchemaS3Location' => [ 'shape' => 'S3Location', ], 'SnapshotS3Location' => [ 'shape' => 'S3Location', ], 'Tags' => [ 'shape' => 'TagMap', ], ], ], 'StartSimulationOutput' => [ 'type' => 'structure', 'members' => [ 'Arn' => [ 'shape' => 'SimSpaceWeaverArn', ], 'CreationTime' => [ 'shape' => 'Timestamp', ], 'ExecutionId' => [ 'shape' => 'UUID', ], ], ], 'StopAppInput' => [ 'type' => 'structure', 'required' => [ 'App', 'Domain', 'Simulation', ], 'members' => [ 'App' => [ 'shape' => 'SimSpaceWeaverResourceName', ], 'Domain' => [ 'shape' => 'SimSpaceWeaverResourceName', ], 'Simulation' => [ 'shape' => 'SimSpaceWeaverResourceName', ], ], ], 'StopAppOutput' => [ 'type' => 'structure', 'members' => [], ], 'StopClockInput' => [ 'type' => 'structure', 'required' => [ 'Simulation', ], 'members' => [ 'Simulation' => [ 'shape' => 'SimSpaceWeaverResourceName', ], ], ], 'StopClockOutput' => [ 'type' => 'structure', 'members' => [], ], 'StopSimulationInput' => [ 'type' => 'structure', 'required' => [ 'Simulation', ], 'members' => [ 'Simulation' => [ 'shape' => 'SimSpaceWeaverResourceName', ], ], ], 'StopSimulationOutput' => [ 'type' => 'structure', 'members' => [], ], 'TagKey' => [ 'type' => 'string', 'max' => 128, 'min' => 1, ], 'TagKeyList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagKey', ], 'max' => 50, 'min' => 1, ], 'TagMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'TagKey', ], 'value' => [ 'shape' => 'TagValue', ], 'max' => 50, 'min' => 1, ], 'TagResourceInput' => [ 'type' => 'structure', 'required' => [ 'ResourceArn', 'Tags', ], 'members' => [ 'ResourceArn' => [ 'shape' => 'SimSpaceWeaverArn', 'location' => 'uri', 'locationName' => 'ResourceArn', ], 'Tags' => [ 'shape' => 'TagMap', ], ], ], 'TagResourceOutput' => [ 'type' => 'structure', 'members' => [], ], 'TagValue' => [ 'type' => 'string', 'max' => 256, 'min' => 0, ], 'TimeToLiveString' => [ 'type' => 'string', 'max' => 6, 'min' => 2, 'pattern' => '^\\d{1,5}[mhdMHD]$', ], 'Timestamp' => [ 'type' => 'timestamp', ], 'TooManyTagsException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'NonEmptyString', ], ], 'error' => [ 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'UUID' => [ 'type' => 'string', 'min' => 36, 'pattern' => '^[a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12}$', ], 'UntagResourceInput' => [ 'type' => 'structure', 'required' => [ 'ResourceArn', 'TagKeys', ], 'members' => [ 'ResourceArn' => [ 'shape' => 'SimSpaceWeaverArn', 'location' => 'uri', 'locationName' => 'ResourceArn', ], 'TagKeys' => [ 'shape' => 'TagKeyList', 'location' => 'querystring', 'locationName' => 'tagKeys', ], ], ], 'UntagResourceOutput' => [ 'type' => 'structure', 'members' => [], ], 'ValidationException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'NonEmptyString', ], ], 'error' => [ 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], ],];
