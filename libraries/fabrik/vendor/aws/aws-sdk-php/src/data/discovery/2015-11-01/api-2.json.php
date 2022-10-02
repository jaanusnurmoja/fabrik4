<?php
// This file was auto-generated from sdk-root/src/data/discovery/2015-11-01/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2015-11-01', 'endpointPrefix' => 'discovery', 'jsonVersion' => '1.1', 'protocol' => 'json', 'serviceFullName' => 'AWS Application Discovery Service', 'serviceId' => 'Application Discovery Service', 'signatureVersion' => 'v4', 'targetPrefix' => 'AWSPoseidonService_V2015_11_01', 'uid' => 'discovery-2015-11-01', ], 'operations' => [ 'AssociateConfigurationItemsToApplication' => [ 'name' => 'AssociateConfigurationItemsToApplication', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AssociateConfigurationItemsToApplicationRequest', ], 'output' => [ 'shape' => 'AssociateConfigurationItemsToApplicationResponse', ], 'errors' => [ [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], ], 'BatchDeleteImportData' => [ 'name' => 'BatchDeleteImportData', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'BatchDeleteImportDataRequest', ], 'output' => [ 'shape' => 'BatchDeleteImportDataResponse', ], 'errors' => [ [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], ], 'CreateApplication' => [ 'name' => 'CreateApplication', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateApplicationRequest', ], 'output' => [ 'shape' => 'CreateApplicationResponse', ], 'errors' => [ [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], ], 'CreateTags' => [ 'name' => 'CreateTags', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateTagsRequest', ], 'output' => [ 'shape' => 'CreateTagsResponse', ], 'errors' => [ [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], ], 'DeleteApplications' => [ 'name' => 'DeleteApplications', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteApplicationsRequest', ], 'output' => [ 'shape' => 'DeleteApplicationsResponse', ], 'errors' => [ [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], ], 'DeleteTags' => [ 'name' => 'DeleteTags', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteTagsRequest', ], 'output' => [ 'shape' => 'DeleteTagsResponse', ], 'errors' => [ [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], ], 'DescribeAgents' => [ 'name' => 'DescribeAgents', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeAgentsRequest', ], 'output' => [ 'shape' => 'DescribeAgentsResponse', ], 'errors' => [ [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], ], 'DescribeConfigurations' => [ 'name' => 'DescribeConfigurations', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeConfigurationsRequest', ], 'output' => [ 'shape' => 'DescribeConfigurationsResponse', ], 'errors' => [ [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], ], 'DescribeContinuousExports' => [ 'name' => 'DescribeContinuousExports', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeContinuousExportsRequest', ], 'output' => [ 'shape' => 'DescribeContinuousExportsResponse', ], 'errors' => [ [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'OperationNotPermittedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], ], 'DescribeExportConfigurations' => [ 'name' => 'DescribeExportConfigurations', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeExportConfigurationsRequest', ], 'output' => [ 'shape' => 'DescribeExportConfigurationsResponse', ], 'errors' => [ [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], 'deprecated' => true, ], 'DescribeExportTasks' => [ 'name' => 'DescribeExportTasks', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeExportTasksRequest', ], 'output' => [ 'shape' => 'DescribeExportTasksResponse', ], 'errors' => [ [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], ], 'DescribeImportTasks' => [ 'name' => 'DescribeImportTasks', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeImportTasksRequest', ], 'output' => [ 'shape' => 'DescribeImportTasksResponse', ], 'errors' => [ [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], ], 'DescribeTags' => [ 'name' => 'DescribeTags', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeTagsRequest', ], 'output' => [ 'shape' => 'DescribeTagsResponse', ], 'errors' => [ [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], ], 'DisassociateConfigurationItemsFromApplication' => [ 'name' => 'DisassociateConfigurationItemsFromApplication', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DisassociateConfigurationItemsFromApplicationRequest', ], 'output' => [ 'shape' => 'DisassociateConfigurationItemsFromApplicationResponse', ], 'errors' => [ [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], ], 'ExportConfigurations' => [ 'name' => 'ExportConfigurations', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'output' => [ 'shape' => 'ExportConfigurationsResponse', ], 'errors' => [ [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'OperationNotPermittedException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], 'deprecated' => true, ], 'GetDiscoverySummary' => [ 'name' => 'GetDiscoverySummary', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetDiscoverySummaryRequest', ], 'output' => [ 'shape' => 'GetDiscoverySummaryResponse', ], 'errors' => [ [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], ], 'ListConfigurations' => [ 'name' => 'ListConfigurations', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListConfigurationsRequest', ], 'output' => [ 'shape' => 'ListConfigurationsResponse', ], 'errors' => [ [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], ], 'ListServerNeighbors' => [ 'name' => 'ListServerNeighbors', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListServerNeighborsRequest', ], 'output' => [ 'shape' => 'ListServerNeighborsResponse', ], 'errors' => [ [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], ], 'StartContinuousExport' => [ 'name' => 'StartContinuousExport', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'StartContinuousExportRequest', ], 'output' => [ 'shape' => 'StartContinuousExportResponse', ], 'errors' => [ [ 'shape' => 'ConflictErrorException', ], [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'OperationNotPermittedException', ], [ 'shape' => 'ResourceInUseException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], ], 'StartDataCollectionByAgentIds' => [ 'name' => 'StartDataCollectionByAgentIds', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'StartDataCollectionByAgentIdsRequest', ], 'output' => [ 'shape' => 'StartDataCollectionByAgentIdsResponse', ], 'errors' => [ [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], ], 'StartExportTask' => [ 'name' => 'StartExportTask', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'StartExportTaskRequest', ], 'output' => [ 'shape' => 'StartExportTaskResponse', ], 'errors' => [ [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'OperationNotPermittedException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], ], 'StartImportTask' => [ 'name' => 'StartImportTask', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'StartImportTaskRequest', ], 'output' => [ 'shape' => 'StartImportTaskResponse', ], 'errors' => [ [ 'shape' => 'ResourceInUseException', ], [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], ], 'StopContinuousExport' => [ 'name' => 'StopContinuousExport', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'StopContinuousExportRequest', ], 'output' => [ 'shape' => 'StopContinuousExportResponse', ], 'errors' => [ [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'OperationNotPermittedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ResourceInUseException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], ], 'StopDataCollectionByAgentIds' => [ 'name' => 'StopDataCollectionByAgentIds', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'StopDataCollectionByAgentIdsRequest', ], 'output' => [ 'shape' => 'StopDataCollectionByAgentIdsResponse', ], 'errors' => [ [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], ], 'UpdateApplication' => [ 'name' => 'UpdateApplication', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateApplicationRequest', ], 'output' => [ 'shape' => 'UpdateApplicationResponse', ], 'errors' => [ [ 'shape' => 'AuthorizationErrorException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ServerInternalErrorException', ], [ 'shape' => 'HomeRegionNotSetException', ], ], ], ], 'shapes' => [ 'AgentConfigurationStatus' => [ 'type' => 'structure', 'members' => [ 'agentId' => [ 'shape' => 'String', ], 'operationSucceeded' => [ 'shape' => 'Boolean', ], 'description' => [ 'shape' => 'String', ], ], ], 'AgentConfigurationStatusList' => [ 'type' => 'list', 'member' => [ 'shape' => 'AgentConfigurationStatus', ], ], 'AgentId' => [ 'type' => 'string', 'max' => 20, 'min' => 10, 'pattern' => '\\S+', ], 'AgentIds' => [ 'type' => 'list', 'member' => [ 'shape' => 'AgentId', ], ], 'AgentInfo' => [ 'type' => 'structure', 'members' => [ 'agentId' => [ 'shape' => 'AgentId', ], 'hostName' => [ 'shape' => 'String', ], 'agentNetworkInfoList' => [ 'shape' => 'AgentNetworkInfoList', ], 'connectorId' => [ 'shape' => 'String', ], 'version' => [ 'shape' => 'String', ], 'health' => [ 'shape' => 'AgentStatus', ], 'lastHealthPingTime' => [ 'shape' => 'String', ], 'collectionStatus' => [ 'shape' => 'String', ], 'agentType' => [ 'shape' => 'String', ], 'registeredTime' => [ 'shape' => 'String', ], ], ], 'AgentNetworkInfo' => [ 'type' => 'structure', 'members' => [ 'ipAddress' => [ 'shape' => 'String', ], 'macAddress' => [ 'shape' => 'String', ], ], ], 'AgentNetworkInfoList' => [ 'type' => 'list', 'member' => [ 'shape' => 'AgentNetworkInfo', ], ], 'AgentStatus' => [ 'type' => 'string', 'enum' => [ 'HEALTHY', 'UNHEALTHY', 'RUNNING', 'UNKNOWN', 'BLACKLISTED', 'SHUTDOWN', ], ], 'AgentsInfo' => [ 'type' => 'list', 'member' => [ 'shape' => 'AgentInfo', ], ], 'ApplicationDescription' => [ 'type' => 'string', 'max' => 1000, 'pattern' => '(^$|[\\s\\S]*\\S[\\s\\S]*)', ], 'ApplicationId' => [ 'type' => 'string', 'max' => 200, 'pattern' => '\\S+', ], 'ApplicationIdsList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ApplicationId', ], ], 'ApplicationName' => [ 'type' => 'string', 'max' => 127, 'pattern' => '[\\s\\S]*\\S[\\s\\S]*', ], 'AssociateConfigurationItemsToApplicationRequest' => [ 'type' => 'structure', 'required' => [ 'applicationConfigurationId', 'configurationIds', ], 'members' => [ 'applicationConfigurationId' => [ 'shape' => 'ApplicationId', ], 'configurationIds' => [ 'shape' => 'ConfigurationIdList', ], ], ], 'AssociateConfigurationItemsToApplicationResponse' => [ 'type' => 'structure', 'members' => [], ], 'AuthorizationErrorException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'Message', ], ], 'exception' => true, ], 'BatchDeleteImportDataError' => [ 'type' => 'structure', 'members' => [ 'importTaskId' => [ 'shape' => 'ImportTaskIdentifier', ], 'errorCode' => [ 'shape' => 'BatchDeleteImportDataErrorCode', ], 'errorDescription' => [ 'shape' => 'BatchDeleteImportDataErrorDescription', ], ], ], 'BatchDeleteImportDataErrorCode' => [ 'type' => 'string', 'enum' => [ 'NOT_FOUND', 'INTERNAL_SERVER_ERROR', 'OVER_LIMIT', ], ], 'BatchDeleteImportDataErrorDescription' => [ 'type' => 'string', ], 'BatchDeleteImportDataErrorList' => [ 'type' => 'list', 'member' => [ 'shape' => 'BatchDeleteImportDataError', ], ], 'BatchDeleteImportDataRequest' => [ 'type' => 'structure', 'required' => [ 'importTaskIds', ], 'members' => [ 'importTaskIds' => [ 'shape' => 'ToDeleteIdentifierList', ], ], ], 'BatchDeleteImportDataResponse' => [ 'type' => 'structure', 'members' => [ 'errors' => [ 'shape' => 'BatchDeleteImportDataErrorList', ], ], ], 'Boolean' => [ 'type' => 'boolean', ], 'BoxedInteger' => [ 'type' => 'integer', 'box' => true, ], 'ClientRequestToken' => [ 'type' => 'string', 'max' => 100, 'min' => 1, ], 'Condition' => [ 'type' => 'string', 'max' => 200, 'pattern' => '\\S+', ], 'Configuration' => [ 'type' => 'map', 'key' => [ 'shape' => 'String', ], 'value' => [ 'shape' => 'String', ], ], 'ConfigurationId' => [ 'type' => 'string', 'max' => 200, 'pattern' => '\\S*', ], 'ConfigurationIdList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ConfigurationId', ], ], 'ConfigurationItemType' => [ 'type' => 'string', 'enum' => [ 'SERVER', 'PROCESS', 'CONNECTION', 'APPLICATION', ], ], 'ConfigurationTag' => [ 'type' => 'structure', 'members' => [ 'configurationType' => [ 'shape' => 'ConfigurationItemType', ], 'configurationId' => [ 'shape' => 'ConfigurationId', ], 'key' => [ 'shape' => 'TagKey', ], 'value' => [ 'shape' => 'TagValue', ], 'timeOfCreation' => [ 'shape' => 'TimeStamp', ], ], ], 'ConfigurationTagSet' => [ 'type' => 'list', 'member' => [ 'shape' => 'ConfigurationTag', ], ], 'Configurations' => [ 'type' => 'list', 'member' => [ 'shape' => 'Configuration', ], ], 'ConfigurationsDownloadUrl' => [ 'type' => 'string', ], 'ConfigurationsExportId' => [ 'type' => 'string', 'max' => 200, 'pattern' => '\\S*', ], 'ConflictErrorException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'Message', ], ], 'exception' => true, ], 'ContinuousExportDescription' => [ 'type' => 'structure', 'members' => [ 'exportId' => [ 'shape' => 'ConfigurationsExportId', ], 'status' => [ 'shape' => 'ContinuousExportStatus', ], 'statusDetail' => [ 'shape' => 'StringMax255', ], 's3Bucket' => [ 'shape' => 'S3Bucket', ], 'startTime' => [ 'shape' => 'TimeStamp', ], 'stopTime' => [ 'shape' => 'TimeStamp', ], 'dataSource' => [ 'shape' => 'DataSource', ], 'schemaStorageConfig' => [ 'shape' => 'SchemaStorageConfig', ], ], ], 'ContinuousExportDescriptions' => [ 'type' => 'list', 'member' => [ 'shape' => 'ContinuousExportDescription', ], ], 'ContinuousExportIds' => [ 'type' => 'list', 'member' => [ 'shape' => 'ConfigurationsExportId', ], ], 'ContinuousExportStatus' => [ 'type' => 'string', 'enum' => [ 'START_IN_PROGRESS', 'START_FAILED', 'ACTIVE', 'ERROR', 'STOP_IN_PROGRESS', 'STOP_FAILED', 'INACTIVE', ], ], 'CreateApplicationRequest' => [ 'type' => 'structure', 'required' => [ 'name', ], 'members' => [ 'name' => [ 'shape' => 'ApplicationName', ], 'description' => [ 'shape' => 'ApplicationDescription', ], ], ], 'CreateApplicationResponse' => [ 'type' => 'structure', 'members' => [ 'configurationId' => [ 'shape' => 'String', ], ], ], 'CreateTagsRequest' => [ 'type' => 'structure', 'required' => [ 'configurationIds', 'tags', ], 'members' => [ 'configurationIds' => [ 'shape' => 'ConfigurationIdList', ], 'tags' => [ 'shape' => 'TagSet', ], ], ], 'CreateTagsResponse' => [ 'type' => 'structure', 'members' => [], ], 'CustomerAgentInfo' => [ 'type' => 'structure', 'required' => [ 'activeAgents', 'healthyAgents', 'blackListedAgents', 'shutdownAgents', 'unhealthyAgents', 'totalAgents', 'unknownAgents', ], 'members' => [ 'activeAgents' => [ 'shape' => 'Integer', ], 'healthyAgents' => [ 'shape' => 'Integer', ], 'blackListedAgents' => [ 'shape' => 'Integer', ], 'shutdownAgents' => [ 'shape' => 'Integer', ], 'unhealthyAgents' => [ 'shape' => 'Integer', ], 'totalAgents' => [ 'shape' => 'Integer', ], 'unknownAgents' => [ 'shape' => 'Integer', ], ], ], 'CustomerAgentlessCollectorInfo' => [ 'type' => 'structure', 'required' => [ 'activeAgentlessCollectors', 'healthyAgentlessCollectors', 'denyListedAgentlessCollectors', 'shutdownAgentlessCollectors', 'unhealthyAgentlessCollectors', 'totalAgentlessCollectors', 'unknownAgentlessCollectors', ], 'members' => [ 'activeAgentlessCollectors' => [ 'shape' => 'Integer', ], 'healthyAgentlessCollectors' => [ 'shape' => 'Integer', ], 'denyListedAgentlessCollectors' => [ 'shape' => 'Integer', ], 'shutdownAgentlessCollectors' => [ 'shape' => 'Integer', ], 'unhealthyAgentlessCollectors' => [ 'shape' => 'Integer', ], 'totalAgentlessCollectors' => [ 'shape' => 'Integer', ], 'unknownAgentlessCollectors' => [ 'shape' => 'Integer', ], ], ], 'CustomerConnectorInfo' => [ 'type' => 'structure', 'required' => [ 'activeConnectors', 'healthyConnectors', 'blackListedConnectors', 'shutdownConnectors', 'unhealthyConnectors', 'totalConnectors', 'unknownConnectors', ], 'members' => [ 'activeConnectors' => [ 'shape' => 'Integer', ], 'healthyConnectors' => [ 'shape' => 'Integer', ], 'blackListedConnectors' => [ 'shape' => 'Integer', ], 'shutdownConnectors' => [ 'shape' => 'Integer', ], 'unhealthyConnectors' => [ 'shape' => 'Integer', ], 'totalConnectors' => [ 'shape' => 'Integer', ], 'unknownConnectors' => [ 'shape' => 'Integer', ], ], ], 'CustomerMeCollectorInfo' => [ 'type' => 'structure', 'required' => [ 'activeMeCollectors', 'healthyMeCollectors', 'denyListedMeCollectors', 'shutdownMeCollectors', 'unhealthyMeCollectors', 'totalMeCollectors', 'unknownMeCollectors', ], 'members' => [ 'activeMeCollectors' => [ 'shape' => 'Integer', ], 'healthyMeCollectors' => [ 'shape' => 'Integer', ], 'denyListedMeCollectors' => [ 'shape' => 'Integer', ], 'shutdownMeCollectors' => [ 'shape' => 'Integer', ], 'unhealthyMeCollectors' => [ 'shape' => 'Integer', ], 'totalMeCollectors' => [ 'shape' => 'Integer', ], 'unknownMeCollectors' => [ 'shape' => 'Integer', ], ], ], 'DataSource' => [ 'type' => 'string', 'enum' => [ 'AGENT', ], ], 'DatabaseName' => [ 'type' => 'string', 'max' => 252, 'min' => 1, ], 'DeleteApplicationsRequest' => [ 'type' => 'structure', 'required' => [ 'configurationIds', ], 'members' => [ 'configurationIds' => [ 'shape' => 'ApplicationIdsList', ], ], ], 'DeleteApplicationsResponse' => [ 'type' => 'structure', 'members' => [], ], 'DeleteTagsRequest' => [ 'type' => 'structure', 'required' => [ 'configurationIds', ], 'members' => [ 'configurationIds' => [ 'shape' => 'ConfigurationIdList', ], 'tags' => [ 'shape' => 'TagSet', ], ], ], 'DeleteTagsResponse' => [ 'type' => 'structure', 'members' => [], ], 'DescribeAgentsRequest' => [ 'type' => 'structure', 'members' => [ 'agentIds' => [ 'shape' => 'AgentIds', ], 'filters' => [ 'shape' => 'Filters', ], 'maxResults' => [ 'shape' => 'Integer', ], 'nextToken' => [ 'shape' => 'NextToken', ], ], ], 'DescribeAgentsResponse' => [ 'type' => 'structure', 'members' => [ 'agentsInfo' => [ 'shape' => 'AgentsInfo', ], 'nextToken' => [ 'shape' => 'NextToken', ], ], ], 'DescribeConfigurationsAttribute' => [ 'type' => 'map', 'key' => [ 'shape' => 'String', ], 'value' => [ 'shape' => 'String', ], ], 'DescribeConfigurationsAttributes' => [ 'type' => 'list', 'member' => [ 'shape' => 'DescribeConfigurationsAttribute', ], ], 'DescribeConfigurationsRequest' => [ 'type' => 'structure', 'required' => [ 'configurationIds', ], 'members' => [ 'configurationIds' => [ 'shape' => 'ConfigurationIdList', ], ], ], 'DescribeConfigurationsResponse' => [ 'type' => 'structure', 'members' => [ 'configurations' => [ 'shape' => 'DescribeConfigurationsAttributes', ], ], ], 'DescribeContinuousExportsMaxResults' => [ 'type' => 'integer', 'box' => true, 'max' => 100, 'min' => 1, ], 'DescribeContinuousExportsRequest' => [ 'type' => 'structure', 'members' => [ 'exportIds' => [ 'shape' => 'ContinuousExportIds', ], 'maxResults' => [ 'shape' => 'DescribeContinuousExportsMaxResults', ], 'nextToken' => [ 'shape' => 'NextToken', ], ], ], 'DescribeContinuousExportsResponse' => [ 'type' => 'structure', 'members' => [ 'descriptions' => [ 'shape' => 'ContinuousExportDescriptions', ], 'nextToken' => [ 'shape' => 'NextToken', ], ], ], 'DescribeExportConfigurationsRequest' => [ 'type' => 'structure', 'members' => [ 'exportIds' => [ 'shape' => 'ExportIds', ], 'maxResults' => [ 'shape' => 'Integer', ], 'nextToken' => [ 'shape' => 'NextToken', ], ], ], 'DescribeExportConfigurationsResponse' => [ 'type' => 'structure', 'members' => [ 'exportsInfo' => [ 'shape' => 'ExportsInfo', ], 'nextToken' => [ 'shape' => 'NextToken', ], ], ], 'DescribeExportTasksRequest' => [ 'type' => 'structure', 'members' => [ 'exportIds' => [ 'shape' => 'ExportIds', ], 'filters' => [ 'shape' => 'ExportFilters', ], 'maxResults' => [ 'shape' => 'Integer', ], 'nextToken' => [ 'shape' => 'NextToken', ], ], ], 'DescribeExportTasksResponse' => [ 'type' => 'structure', 'members' => [ 'exportsInfo' => [ 'shape' => 'ExportsInfo', ], 'nextToken' => [ 'shape' => 'NextToken', ], ], ], 'DescribeImportTasksFilterList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ImportTaskFilter', ], ], 'DescribeImportTasksMaxResults' => [ 'type' => 'integer', 'box' => true, 'max' => 100, 'min' => 1, ], 'DescribeImportTasksRequest' => [ 'type' => 'structure', 'members' => [ 'filters' => [ 'shape' => 'DescribeImportTasksFilterList', ], 'maxResults' => [ 'shape' => 'DescribeImportTasksMaxResults', ], 'nextToken' => [ 'shape' => 'NextToken', ], ], ], 'DescribeImportTasksResponse' => [ 'type' => 'structure', 'members' => [ 'nextToken' => [ 'shape' => 'NextToken', ], 'tasks' => [ 'shape' => 'ImportTaskList', ], ], ], 'DescribeTagsRequest' => [ 'type' => 'structure', 'members' => [ 'filters' => [ 'shape' => 'TagFilters', ], 'maxResults' => [ 'shape' => 'Integer', ], 'nextToken' => [ 'shape' => 'NextToken', ], ], ], 'DescribeTagsResponse' => [ 'type' => 'structure', 'members' => [ 'tags' => [ 'shape' => 'ConfigurationTagSet', ], 'nextToken' => [ 'shape' => 'NextToken', ], ], ], 'DisassociateConfigurationItemsFromApplicationRequest' => [ 'type' => 'structure', 'required' => [ 'applicationConfigurationId', 'configurationIds', ], 'members' => [ 'applicationConfigurationId' => [ 'shape' => 'ApplicationId', ], 'configurationIds' => [ 'shape' => 'ConfigurationIdList', ], ], ], 'DisassociateConfigurationItemsFromApplicationResponse' => [ 'type' => 'structure', 'members' => [], ], 'ExportConfigurationsResponse' => [ 'type' => 'structure', 'members' => [ 'exportId' => [ 'shape' => 'ConfigurationsExportId', ], ], ], 'ExportDataFormat' => [ 'type' => 'string', 'enum' => [ 'CSV', 'GRAPHML', ], ], 'ExportDataFormats' => [ 'type' => 'list', 'member' => [ 'shape' => 'ExportDataFormat', ], ], 'ExportFilter' => [ 'type' => 'structure', 'required' => [ 'name', 'values', 'condition', ], 'members' => [ 'name' => [ 'shape' => 'FilterName', ], 'values' => [ 'shape' => 'FilterValues', ], 'condition' => [ 'shape' => 'Condition', ], ], ], 'ExportFilters' => [ 'type' => 'list', 'member' => [ 'shape' => 'ExportFilter', ], ], 'ExportIds' => [ 'type' => 'list', 'member' => [ 'shape' => 'ConfigurationsExportId', ], ], 'ExportInfo' => [ 'type' => 'structure', 'required' => [ 'exportId', 'exportStatus', 'statusMessage', 'exportRequestTime', ], 'members' => [ 'exportId' => [ 'shape' => 'ConfigurationsExportId', ], 'exportStatus' => [ 'shape' => 'ExportStatus', ], 'statusMessage' => [ 'shape' => 'ExportStatusMessage', ], 'configurationsDownloadUrl' => [ 'shape' => 'ConfigurationsDownloadUrl', ], 'exportRequestTime' => [ 'shape' => 'ExportRequestTime', ], 'isTruncated' => [ 'shape' => 'Boolean', ], 'requestedStartTime' => [ 'shape' => 'TimeStamp', ], 'requestedEndTime' => [ 'shape' => 'TimeStamp', ], ], ], 'ExportRequestTime' => [ 'type' => 'timestamp', ], 'ExportStatus' => [ 'type' => 'string', 'enum' => [ 'FAILED', 'SUCCEEDED', 'IN_PROGRESS', ], ], 'ExportStatusMessage' => [ 'type' => 'string', ], 'ExportsInfo' => [ 'type' => 'list', 'member' => [ 'shape' => 'ExportInfo', ], ], 'Filter' => [ 'type' => 'structure', 'required' => [ 'name', 'values', 'condition', ], 'members' => [ 'name' => [ 'shape' => 'String', ], 'values' => [ 'shape' => 'FilterValues', ], 'condition' => [ 'shape' => 'Condition', ], ], ], 'FilterName' => [ 'type' => 'string', 'max' => 1000, 'pattern' => '[\\s\\S]*\\S[\\s\\S]*', ], 'FilterValue' => [ 'type' => 'string', 'max' => 1000, 'pattern' => '(^$|[\\s\\S]*\\S[\\s\\S]*)', ], 'FilterValues' => [ 'type' => 'list', 'member' => [ 'shape' => 'FilterValue', ], ], 'Filters' => [ 'type' => 'list', 'member' => [ 'shape' => 'Filter', ], ], 'GetDiscoverySummaryRequest' => [ 'type' => 'structure', 'members' => [], ], 'GetDiscoverySummaryResponse' => [ 'type' => 'structure', 'members' => [ 'servers' => [ 'shape' => 'Long', ], 'applications' => [ 'shape' => 'Long', ], 'serversMappedToApplications' => [ 'shape' => 'Long', ], 'serversMappedtoTags' => [ 'shape' => 'Long', ], 'agentSummary' => [ 'shape' => 'CustomerAgentInfo', ], 'connectorSummary' => [ 'shape' => 'CustomerConnectorInfo', ], 'meCollectorSummary' => [ 'shape' => 'CustomerMeCollectorInfo', ], 'agentlessCollectorSummary' => [ 'shape' => 'CustomerAgentlessCollectorInfo', ], ], ], 'HomeRegionNotSetException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'Message', ], ], 'exception' => true, ], 'ImportStatus' => [ 'type' => 'string', 'enum' => [ 'IMPORT_IN_PROGRESS', 'IMPORT_COMPLETE', 'IMPORT_COMPLETE_WITH_ERRORS', 'IMPORT_FAILED', 'IMPORT_FAILED_SERVER_LIMIT_EXCEEDED', 'IMPORT_FAILED_RECORD_LIMIT_EXCEEDED', 'DELETE_IN_PROGRESS', 'DELETE_COMPLETE', 'DELETE_FAILED', 'DELETE_FAILED_LIMIT_EXCEEDED', 'INTERNAL_ERROR', ], ], 'ImportTask' => [ 'type' => 'structure', 'members' => [ 'importTaskId' => [ 'shape' => 'ImportTaskIdentifier', ], 'clientRequestToken' => [ 'shape' => 'ClientRequestToken', ], 'name' => [ 'shape' => 'ImportTaskName', ], 'importUrl' => [ 'shape' => 'ImportURL', ], 'status' => [ 'shape' => 'ImportStatus', ], 'importRequestTime' => [ 'shape' => 'TimeStamp', ], 'importCompletionTime' => [ 'shape' => 'TimeStamp', ], 'importDeletedTime' => [ 'shape' => 'TimeStamp', ], 'serverImportSuccess' => [ 'shape' => 'Integer', ], 'serverImportFailure' => [ 'shape' => 'Integer', ], 'applicationImportSuccess' => [ 'shape' => 'Integer', ], 'applicationImportFailure' => [ 'shape' => 'Integer', ], 'errorsAndFailedEntriesZip' => [ 'shape' => 'S3PresignedUrl', ], ], ], 'ImportTaskFilter' => [ 'type' => 'structure', 'members' => [ 'name' => [ 'shape' => 'ImportTaskFilterName', ], 'values' => [ 'shape' => 'ImportTaskFilterValueList', ], ], ], 'ImportTaskFilterName' => [ 'type' => 'string', 'enum' => [ 'IMPORT_TASK_ID', 'STATUS', 'NAME', ], ], 'ImportTaskFilterValue' => [ 'type' => 'string', 'max' => 100, 'min' => 1, ], 'ImportTaskFilterValueList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ImportTaskFilterValue', ], 'max' => 100, 'min' => 1, ], 'ImportTaskIdentifier' => [ 'type' => 'string', 'max' => 200, 'pattern' => '\\S*', ], 'ImportTaskList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ImportTask', ], ], 'ImportTaskName' => [ 'type' => 'string', 'max' => 100, 'min' => 1, 'pattern' => '[\\s\\S]*\\S[\\s\\S]*', ], 'ImportURL' => [ 'type' => 'string', 'max' => 4000, 'min' => 1, 'pattern' => '\\S+://\\S+/[\\s\\S]*\\S[\\s\\S]*', ], 'Integer' => [ 'type' => 'integer', ], 'InvalidParameterException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'Message', ], ], 'exception' => true, ], 'InvalidParameterValueException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'Message', ], ], 'exception' => true, ], 'ListConfigurationsRequest' => [ 'type' => 'structure', 'required' => [ 'configurationType', ], 'members' => [ 'configurationType' => [ 'shape' => 'ConfigurationItemType', ], 'filters' => [ 'shape' => 'Filters', ], 'maxResults' => [ 'shape' => 'Integer', ], 'nextToken' => [ 'shape' => 'NextToken', ], 'orderBy' => [ 'shape' => 'OrderByList', ], ], ], 'ListConfigurationsResponse' => [ 'type' => 'structure', 'members' => [ 'configurations' => [ 'shape' => 'Configurations', ], 'nextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListServerNeighborsRequest' => [ 'type' => 'structure', 'required' => [ 'configurationId', ], 'members' => [ 'configurationId' => [ 'shape' => 'ConfigurationId', ], 'portInformationNeeded' => [ 'shape' => 'Boolean', ], 'neighborConfigurationIds' => [ 'shape' => 'ConfigurationIdList', ], 'maxResults' => [ 'shape' => 'Integer', ], 'nextToken' => [ 'shape' => 'String', ], ], ], 'ListServerNeighborsResponse' => [ 'type' => 'structure', 'required' => [ 'neighbors', ], 'members' => [ 'neighbors' => [ 'shape' => 'NeighborDetailsList', ], 'nextToken' => [ 'shape' => 'String', ], 'knownDependencyCount' => [ 'shape' => 'Long', ], ], ], 'Long' => [ 'type' => 'long', ], 'Message' => [ 'type' => 'string', ], 'NeighborConnectionDetail' => [ 'type' => 'structure', 'required' => [ 'sourceServerId', 'destinationServerId', 'connectionsCount', ], 'members' => [ 'sourceServerId' => [ 'shape' => 'ConfigurationId', ], 'destinationServerId' => [ 'shape' => 'ConfigurationId', ], 'destinationPort' => [ 'shape' => 'BoxedInteger', ], 'transportProtocol' => [ 'shape' => 'String', ], 'connectionsCount' => [ 'shape' => 'Long', ], ], ], 'NeighborDetailsList' => [ 'type' => 'list', 'member' => [ 'shape' => 'NeighborConnectionDetail', ], ], 'NextToken' => [ 'type' => 'string', ], 'OperationNotPermittedException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'Message', ], ], 'exception' => true, ], 'OrderByElement' => [ 'type' => 'structure', 'required' => [ 'fieldName', ], 'members' => [ 'fieldName' => [ 'shape' => 'OrderByElementFieldName', ], 'sortOrder' => [ 'shape' => 'orderString', ], ], ], 'OrderByElementFieldName' => [ 'type' => 'string', 'max' => 1000, 'pattern' => '[\\s\\S]*\\S[\\s\\S]*', ], 'OrderByList' => [ 'type' => 'list', 'member' => [ 'shape' => 'OrderByElement', ], ], 'ResourceInUseException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'Message', ], ], 'exception' => true, ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'Message', ], ], 'exception' => true, ], 'S3Bucket' => [ 'type' => 'string', ], 'S3PresignedUrl' => [ 'type' => 'string', ], 'SchemaStorageConfig' => [ 'type' => 'map', 'key' => [ 'shape' => 'DatabaseName', ], 'value' => [ 'shape' => 'String', ], ], 'ServerInternalErrorException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'Message', ], ], 'exception' => true, 'fault' => true, ], 'StartContinuousExportRequest' => [ 'type' => 'structure', 'members' => [], ], 'StartContinuousExportResponse' => [ 'type' => 'structure', 'members' => [ 'exportId' => [ 'shape' => 'ConfigurationsExportId', ], 's3Bucket' => [ 'shape' => 'S3Bucket', ], 'startTime' => [ 'shape' => 'TimeStamp', ], 'dataSource' => [ 'shape' => 'DataSource', ], 'schemaStorageConfig' => [ 'shape' => 'SchemaStorageConfig', ], ], ], 'StartDataCollectionByAgentIdsRequest' => [ 'type' => 'structure', 'required' => [ 'agentIds', ], 'members' => [ 'agentIds' => [ 'shape' => 'AgentIds', ], ], ], 'StartDataCollectionByAgentIdsResponse' => [ 'type' => 'structure', 'members' => [ 'agentsConfigurationStatus' => [ 'shape' => 'AgentConfigurationStatusList', ], ], ], 'StartExportTaskRequest' => [ 'type' => 'structure', 'members' => [ 'exportDataFormat' => [ 'shape' => 'ExportDataFormats', ], 'filters' => [ 'shape' => 'ExportFilters', ], 'startTime' => [ 'shape' => 'TimeStamp', ], 'endTime' => [ 'shape' => 'TimeStamp', ], ], ], 'StartExportTaskResponse' => [ 'type' => 'structure', 'members' => [ 'exportId' => [ 'shape' => 'ConfigurationsExportId', ], ], ], 'StartImportTaskRequest' => [ 'type' => 'structure', 'required' => [ 'name', 'importUrl', ], 'members' => [ 'clientRequestToken' => [ 'shape' => 'ClientRequestToken', 'idempotencyToken' => true, ], 'name' => [ 'shape' => 'ImportTaskName', ], 'importUrl' => [ 'shape' => 'ImportURL', ], ], ], 'StartImportTaskResponse' => [ 'type' => 'structure', 'members' => [ 'task' => [ 'shape' => 'ImportTask', ], ], ], 'StopContinuousExportRequest' => [ 'type' => 'structure', 'required' => [ 'exportId', ], 'members' => [ 'exportId' => [ 'shape' => 'ConfigurationsExportId', ], ], ], 'StopContinuousExportResponse' => [ 'type' => 'structure', 'members' => [ 'startTime' => [ 'shape' => 'TimeStamp', ], 'stopTime' => [ 'shape' => 'TimeStamp', ], ], ], 'StopDataCollectionByAgentIdsRequest' => [ 'type' => 'structure', 'required' => [ 'agentIds', ], 'members' => [ 'agentIds' => [ 'shape' => 'AgentIds', ], ], ], 'StopDataCollectionByAgentIdsResponse' => [ 'type' => 'structure', 'members' => [ 'agentsConfigurationStatus' => [ 'shape' => 'AgentConfigurationStatusList', ], ], ], 'String' => [ 'type' => 'string', 'max' => 10000, 'pattern' => '[\\s\\S]*', ], 'StringMax255' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '[\\s\\S]*\\S[\\s\\S]*', ], 'Tag' => [ 'type' => 'structure', 'required' => [ 'key', 'value', ], 'members' => [ 'key' => [ 'shape' => 'TagKey', ], 'value' => [ 'shape' => 'TagValue', ], ], ], 'TagFilter' => [ 'type' => 'structure', 'required' => [ 'name', 'values', ], 'members' => [ 'name' => [ 'shape' => 'FilterName', ], 'values' => [ 'shape' => 'FilterValues', ], ], ], 'TagFilters' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagFilter', ], ], 'TagKey' => [ 'type' => 'string', ], 'TagSet' => [ 'type' => 'list', 'member' => [ 'shape' => 'Tag', ], ], 'TagValue' => [ 'type' => 'string', ], 'TimeStamp' => [ 'type' => 'timestamp', ], 'ToDeleteIdentifierList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ImportTaskIdentifier', ], 'max' => 10, 'min' => 1, ], 'UpdateApplicationRequest' => [ 'type' => 'structure', 'required' => [ 'configurationId', ], 'members' => [ 'configurationId' => [ 'shape' => 'ApplicationId', ], 'name' => [ 'shape' => 'ApplicationName', ], 'description' => [ 'shape' => 'ApplicationDescription', ], ], ], 'UpdateApplicationResponse' => [ 'type' => 'structure', 'members' => [], ], 'orderString' => [ 'type' => 'string', 'enum' => [ 'ASC', 'DESC', ], ], ],];
