<?php
// This file was auto-generated from sdk-root/src/data/marketplace-catalog/2018-09-17/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2018-09-17', 'endpointPrefix' => 'catalog.marketplace', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceAbbreviation' => 'AWS Marketplace Catalog', 'serviceFullName' => 'AWS Marketplace Catalog Service', 'serviceId' => 'Marketplace Catalog', 'signatureVersion' => 'v4', 'signingName' => 'aws-marketplace', 'uid' => 'marketplace-catalog-2018-09-17', ], 'operations' => [ 'CancelChangeSet' => [ 'name' => 'CancelChangeSet', 'http' => [ 'method' => 'PATCH', 'requestUri' => '/CancelChangeSet', ], 'input' => [ 'shape' => 'CancelChangeSetRequest', ], 'output' => [ 'shape' => 'CancelChangeSetResponse', ], 'errors' => [ [ 'shape' => 'InternalServiceException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ResourceInUseException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'DescribeChangeSet' => [ 'name' => 'DescribeChangeSet', 'http' => [ 'method' => 'GET', 'requestUri' => '/DescribeChangeSet', ], 'input' => [ 'shape' => 'DescribeChangeSetRequest', ], 'output' => [ 'shape' => 'DescribeChangeSetResponse', ], 'errors' => [ [ 'shape' => 'InternalServiceException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'DescribeEntity' => [ 'name' => 'DescribeEntity', 'http' => [ 'method' => 'GET', 'requestUri' => '/DescribeEntity', ], 'input' => [ 'shape' => 'DescribeEntityRequest', ], 'output' => [ 'shape' => 'DescribeEntityResponse', ], 'errors' => [ [ 'shape' => 'InternalServiceException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotSupportedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'ListChangeSets' => [ 'name' => 'ListChangeSets', 'http' => [ 'method' => 'POST', 'requestUri' => '/ListChangeSets', ], 'input' => [ 'shape' => 'ListChangeSetsRequest', ], 'output' => [ 'shape' => 'ListChangeSetsResponse', ], 'errors' => [ [ 'shape' => 'InternalServiceException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'ListEntities' => [ 'name' => 'ListEntities', 'http' => [ 'method' => 'POST', 'requestUri' => '/ListEntities', ], 'input' => [ 'shape' => 'ListEntitiesRequest', ], 'output' => [ 'shape' => 'ListEntitiesResponse', ], 'errors' => [ [ 'shape' => 'InternalServiceException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'StartChangeSet' => [ 'name' => 'StartChangeSet', 'http' => [ 'method' => 'POST', 'requestUri' => '/StartChangeSet', ], 'input' => [ 'shape' => 'StartChangeSetRequest', ], 'output' => [ 'shape' => 'StartChangeSetResponse', ], 'errors' => [ [ 'shape' => 'InternalServiceException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ResourceInUseException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], ], ], 'shapes' => [ 'ARN' => [ 'type' => 'string', 'max' => 2048, 'min' => 1, 'pattern' => '^[a-zA-Z0-9:*/-]+$', ], 'AccessDeniedException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ExceptionMessageContent', ], ], 'error' => [ 'httpStatusCode' => 403, ], 'exception' => true, 'synthetic' => true, ], 'CancelChangeSetRequest' => [ 'type' => 'structure', 'required' => [ 'Catalog', 'ChangeSetId', ], 'members' => [ 'Catalog' => [ 'shape' => 'Catalog', 'location' => 'querystring', 'locationName' => 'catalog', ], 'ChangeSetId' => [ 'shape' => 'ResourceId', 'location' => 'querystring', 'locationName' => 'changeSetId', ], ], ], 'CancelChangeSetResponse' => [ 'type' => 'structure', 'members' => [ 'ChangeSetId' => [ 'shape' => 'ResourceId', ], 'ChangeSetArn' => [ 'shape' => 'ARN', ], ], ], 'Catalog' => [ 'type' => 'string', 'max' => 64, 'min' => 1, 'pattern' => '^[a-zA-Z]+$', ], 'Change' => [ 'type' => 'structure', 'required' => [ 'ChangeType', 'Entity', 'Details', ], 'members' => [ 'ChangeType' => [ 'shape' => 'ChangeType', ], 'Entity' => [ 'shape' => 'Entity', ], 'Details' => [ 'shape' => 'Json', ], 'ChangeName' => [ 'shape' => 'ChangeName', ], ], ], 'ChangeName' => [ 'type' => 'string', 'max' => 72, 'min' => 1, 'pattern' => '^[a-zA-Z]$', ], 'ChangeSetDescription' => [ 'type' => 'list', 'member' => [ 'shape' => 'ChangeSummary', ], ], 'ChangeSetName' => [ 'type' => 'string', 'max' => 100, 'min' => 1, 'pattern' => '^[\\w\\s+=.:@-]+$', ], 'ChangeSetSummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ChangeSetSummaryListItem', ], ], 'ChangeSetSummaryListItem' => [ 'type' => 'structure', 'members' => [ 'ChangeSetId' => [ 'shape' => 'ResourceId', ], 'ChangeSetArn' => [ 'shape' => 'ARN', ], 'ChangeSetName' => [ 'shape' => 'ChangeSetName', ], 'StartTime' => [ 'shape' => 'DateTimeISO8601', ], 'EndTime' => [ 'shape' => 'DateTimeISO8601', ], 'Status' => [ 'shape' => 'ChangeStatus', ], 'EntityIdList' => [ 'shape' => 'ResourceIdList', ], 'FailureCode' => [ 'shape' => 'FailureCode', ], ], ], 'ChangeStatus' => [ 'type' => 'string', 'enum' => [ 'PREPARING', 'APPLYING', 'SUCCEEDED', 'CANCELLED', 'FAILED', ], ], 'ChangeSummary' => [ 'type' => 'structure', 'members' => [ 'ChangeType' => [ 'shape' => 'ChangeType', ], 'Entity' => [ 'shape' => 'Entity', ], 'Details' => [ 'shape' => 'Json', ], 'ErrorDetailList' => [ 'shape' => 'ErrorDetailList', ], 'ChangeName' => [ 'shape' => 'ChangeName', ], ], ], 'ChangeType' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^[A-Z][\\w]*$', ], 'ClientRequestToken' => [ 'type' => 'string', 'max' => 36, 'min' => 1, 'pattern' => '^[\\w\\-]+$', ], 'DateTimeISO8601' => [ 'type' => 'string', 'max' => 20, 'min' => 20, 'pattern' => '^([\\d]{4})\\-(1[0-2]|0[1-9])\\-(3[01]|0[1-9]|[12][\\d])T(2[0-3]|[01][\\d]):([0-5][\\d]):([0-5][\\d])Z$', ], 'DescribeChangeSetRequest' => [ 'type' => 'structure', 'required' => [ 'Catalog', 'ChangeSetId', ], 'members' => [ 'Catalog' => [ 'shape' => 'Catalog', 'location' => 'querystring', 'locationName' => 'catalog', ], 'ChangeSetId' => [ 'shape' => 'ResourceId', 'location' => 'querystring', 'locationName' => 'changeSetId', ], ], ], 'DescribeChangeSetResponse' => [ 'type' => 'structure', 'members' => [ 'ChangeSetId' => [ 'shape' => 'ResourceId', ], 'ChangeSetArn' => [ 'shape' => 'ARN', ], 'ChangeSetName' => [ 'shape' => 'ChangeSetName', ], 'StartTime' => [ 'shape' => 'DateTimeISO8601', ], 'EndTime' => [ 'shape' => 'DateTimeISO8601', ], 'Status' => [ 'shape' => 'ChangeStatus', ], 'FailureCode' => [ 'shape' => 'FailureCode', ], 'FailureDescription' => [ 'shape' => 'ExceptionMessageContent', ], 'ChangeSet' => [ 'shape' => 'ChangeSetDescription', ], ], ], 'DescribeEntityRequest' => [ 'type' => 'structure', 'required' => [ 'Catalog', 'EntityId', ], 'members' => [ 'Catalog' => [ 'shape' => 'Catalog', 'location' => 'querystring', 'locationName' => 'catalog', ], 'EntityId' => [ 'shape' => 'ResourceId', 'location' => 'querystring', 'locationName' => 'entityId', ], ], ], 'DescribeEntityResponse' => [ 'type' => 'structure', 'members' => [ 'EntityType' => [ 'shape' => 'EntityType', ], 'EntityIdentifier' => [ 'shape' => 'Identifier', ], 'EntityArn' => [ 'shape' => 'ARN', ], 'LastModifiedDate' => [ 'shape' => 'DateTimeISO8601', ], 'Details' => [ 'shape' => 'Json', ], ], ], 'Entity' => [ 'type' => 'structure', 'required' => [ 'Type', ], 'members' => [ 'Type' => [ 'shape' => 'EntityType', ], 'Identifier' => [ 'shape' => 'Identifier', ], ], ], 'EntityNameString' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^\\\\S+[\\\\S\\\\s]*', ], 'EntitySummary' => [ 'type' => 'structure', 'members' => [ 'Name' => [ 'shape' => 'EntityNameString', ], 'EntityType' => [ 'shape' => 'EntityType', ], 'EntityId' => [ 'shape' => 'ResourceId', ], 'EntityArn' => [ 'shape' => 'ARN', ], 'LastModifiedDate' => [ 'shape' => 'DateTimeISO8601', ], 'Visibility' => [ 'shape' => 'VisibilityValue', ], ], ], 'EntitySummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'EntitySummary', ], ], 'EntityType' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^[a-zA-Z]+$', ], 'ErrorCodeString' => [ 'type' => 'string', 'max' => 72, 'min' => 1, 'pattern' => '^[a-zA-Z_]+$', ], 'ErrorDetail' => [ 'type' => 'structure', 'members' => [ 'ErrorCode' => [ 'shape' => 'ErrorCodeString', ], 'ErrorMessage' => [ 'shape' => 'ExceptionMessageContent', ], ], ], 'ErrorDetailList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ErrorDetail', ], ], 'ExceptionMessageContent' => [ 'type' => 'string', 'max' => 2048, 'min' => 1, 'pattern' => '^(.)+$', ], 'FailureCode' => [ 'type' => 'string', 'enum' => [ 'CLIENT_ERROR', 'SERVER_FAULT', ], ], 'Filter' => [ 'type' => 'structure', 'members' => [ 'Name' => [ 'shape' => 'FilterName', ], 'ValueList' => [ 'shape' => 'ValueList', ], ], ], 'FilterList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Filter', ], 'max' => 8, 'min' => 1, ], 'FilterName' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^[a-zA-Z]+$', ], 'FilterValueContent' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^(.)+$', ], 'Identifier' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^[\\w\\-@]+$', ], 'InternalServiceException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ExceptionMessageContent', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, 'synthetic' => true, ], 'Json' => [ 'type' => 'string', 'max' => 16384, 'min' => 2, 'pattern' => '^[\\s]*\\{[\\s\\S]*\\}[\\s]*$', ], 'ListChangeSetsRequest' => [ 'type' => 'structure', 'required' => [ 'Catalog', ], 'members' => [ 'Catalog' => [ 'shape' => 'Catalog', ], 'FilterList' => [ 'shape' => 'FilterList', ], 'Sort' => [ 'shape' => 'Sort', ], 'MaxResults' => [ 'shape' => 'MaxResultInteger', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListChangeSetsResponse' => [ 'type' => 'structure', 'members' => [ 'ChangeSetSummaryList' => [ 'shape' => 'ChangeSetSummaryList', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListEntitiesRequest' => [ 'type' => 'structure', 'required' => [ 'Catalog', 'EntityType', ], 'members' => [ 'Catalog' => [ 'shape' => 'Catalog', ], 'EntityType' => [ 'shape' => 'EntityType', ], 'FilterList' => [ 'shape' => 'FilterList', ], 'Sort' => [ 'shape' => 'Sort', ], 'NextToken' => [ 'shape' => 'NextToken', ], 'MaxResults' => [ 'shape' => 'MaxResultInteger', ], ], ], 'ListEntitiesResponse' => [ 'type' => 'structure', 'members' => [ 'EntitySummaryList' => [ 'shape' => 'EntitySummaryList', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'MaxResultInteger' => [ 'type' => 'integer', 'box' => true, 'max' => 20, 'min' => 1, ], 'NextToken' => [ 'type' => 'string', 'max' => 2048, 'min' => 1, 'pattern' => '^[\\w+=.:@\\-\\/]$', ], 'RequestedChangeList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Change', ], 'max' => 20, 'min' => 1, ], 'ResourceId' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^[\\w\\-]+$', ], 'ResourceIdList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ResourceId', ], ], 'ResourceInUseException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ExceptionMessageContent', ], ], 'error' => [ 'httpStatusCode' => 423, ], 'exception' => true, 'synthetic' => true, ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ExceptionMessageContent', ], ], 'error' => [ 'httpStatusCode' => 404, ], 'exception' => true, 'synthetic' => true, ], 'ResourceNotSupportedException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ExceptionMessageContent', ], ], 'error' => [ 'httpStatusCode' => 415, ], 'exception' => true, 'synthetic' => true, ], 'ServiceQuotaExceededException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ExceptionMessageContent', ], ], 'error' => [ 'httpStatusCode' => 402, ], 'exception' => true, 'synthetic' => true, ], 'Sort' => [ 'type' => 'structure', 'members' => [ 'SortBy' => [ 'shape' => 'SortBy', ], 'SortOrder' => [ 'shape' => 'SortOrder', ], ], ], 'SortBy' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^[a-zA-Z]+$', ], 'SortOrder' => [ 'type' => 'string', 'enum' => [ 'ASCENDING', 'DESCENDING', ], ], 'StartChangeSetRequest' => [ 'type' => 'structure', 'required' => [ 'Catalog', 'ChangeSet', ], 'members' => [ 'Catalog' => [ 'shape' => 'Catalog', ], 'ChangeSet' => [ 'shape' => 'RequestedChangeList', ], 'ChangeSetName' => [ 'shape' => 'ChangeSetName', ], 'ClientRequestToken' => [ 'shape' => 'ClientRequestToken', 'idempotencyToken' => true, ], ], ], 'StartChangeSetResponse' => [ 'type' => 'structure', 'members' => [ 'ChangeSetId' => [ 'shape' => 'ResourceId', ], 'ChangeSetArn' => [ 'shape' => 'ARN', ], ], ], 'ThrottlingException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ExceptionMessageContent', ], ], 'error' => [ 'httpStatusCode' => 429, ], 'exception' => true, 'synthetic' => true, ], 'ValidationException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ExceptionMessageContent', ], ], 'error' => [ 'httpStatusCode' => 422, ], 'exception' => true, 'synthetic' => true, ], 'ValueList' => [ 'type' => 'list', 'member' => [ 'shape' => 'FilterValueContent', ], 'max' => 10, 'min' => 1, ], 'VisibilityValue' => [ 'type' => 'string', 'max' => 64, 'min' => 1, 'pattern' => '^[a-zA-Z]+$', ], ],];
