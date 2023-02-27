<?php
// This file was auto-generated from sdk-root/src/data/finspace/2021-03-12/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2021-03-12', 'endpointPrefix' => 'finspace', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceAbbreviation' => 'finspace', 'serviceFullName' => 'FinSpace User Environment Management service', 'serviceId' => 'finspace', 'signatureVersion' => 'v4', 'signingName' => 'finspace', 'uid' => 'finspace-2021-03-12', ], 'operations' => [ 'CreateEnvironment' => [ 'name' => 'CreateEnvironment', 'http' => [ 'method' => 'POST', 'requestUri' => '/environment', ], 'input' => [ 'shape' => 'CreateEnvironmentRequest', ], 'output' => [ 'shape' => 'CreateEnvironmentResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'LimitExceededException', ], ], ], 'DeleteEnvironment' => [ 'name' => 'DeleteEnvironment', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/environment/{environmentId}', ], 'input' => [ 'shape' => 'DeleteEnvironmentRequest', ], 'output' => [ 'shape' => 'DeleteEnvironmentResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'GetEnvironment' => [ 'name' => 'GetEnvironment', 'http' => [ 'method' => 'GET', 'requestUri' => '/environment/{environmentId}', ], 'input' => [ 'shape' => 'GetEnvironmentRequest', ], 'output' => [ 'shape' => 'GetEnvironmentResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'AccessDeniedException', ], ], ], 'ListEnvironments' => [ 'name' => 'ListEnvironments', 'http' => [ 'method' => 'GET', 'requestUri' => '/environment', ], 'input' => [ 'shape' => 'ListEnvironmentsRequest', ], 'output' => [ 'shape' => 'ListEnvironmentsResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], ], ], 'ListTagsForResource' => [ 'name' => 'ListTagsForResource', 'http' => [ 'method' => 'GET', 'requestUri' => '/tags/{resourceArn}', ], 'input' => [ 'shape' => 'ListTagsForResourceRequest', ], 'output' => [ 'shape' => 'ListTagsForResourceResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'TagResource' => [ 'name' => 'TagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/tags/{resourceArn}', ], 'input' => [ 'shape' => 'TagResourceRequest', ], 'output' => [ 'shape' => 'TagResourceResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'UntagResource' => [ 'name' => 'UntagResource', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/tags/{resourceArn}', ], 'input' => [ 'shape' => 'UntagResourceRequest', ], 'output' => [ 'shape' => 'UntagResourceResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'UpdateEnvironment' => [ 'name' => 'UpdateEnvironment', 'http' => [ 'method' => 'PUT', 'requestUri' => '/environment/{environmentId}', ], 'input' => [ 'shape' => 'UpdateEnvironmentRequest', ], 'output' => [ 'shape' => 'UpdateEnvironmentResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], ], 'shapes' => [ 'AccessDeniedException' => [ 'type' => 'structure', 'members' => [], 'error' => [ 'httpStatusCode' => 403, ], 'exception' => true, ], 'AttributeMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'FederationAttributeKey', ], 'value' => [ 'shape' => 'url', ], ], 'CreateEnvironmentRequest' => [ 'type' => 'structure', 'required' => [ 'name', ], 'members' => [ 'name' => [ 'shape' => 'EnvironmentName', ], 'description' => [ 'shape' => 'Description', ], 'kmsKeyId' => [ 'shape' => 'KmsKeyId', ], 'tags' => [ 'shape' => 'TagMap', ], 'federationMode' => [ 'shape' => 'FederationMode', ], 'federationParameters' => [ 'shape' => 'FederationParameters', ], 'superuserParameters' => [ 'shape' => 'SuperuserParameters', ], 'dataBundles' => [ 'shape' => 'DataBundleArns', ], ], ], 'CreateEnvironmentResponse' => [ 'type' => 'structure', 'members' => [ 'environmentId' => [ 'shape' => 'IdType', ], 'environmentArn' => [ 'shape' => 'EnvironmentArn', ], 'environmentUrl' => [ 'shape' => 'url', ], ], ], 'DataBundleArn' => [ 'type' => 'string', 'max' => 2048, 'min' => 20, 'pattern' => '^arn:aws:finspace:[A-Za-z0-9_/.-]{0,63}:\\d*:data-bundle/[0-9A-Za-z_-]{1,128}$', ], 'DataBundleArns' => [ 'type' => 'list', 'member' => [ 'shape' => 'DataBundleArn', ], ], 'DeleteEnvironmentRequest' => [ 'type' => 'structure', 'required' => [ 'environmentId', ], 'members' => [ 'environmentId' => [ 'shape' => 'IdType', 'location' => 'uri', 'locationName' => 'environmentId', ], ], ], 'DeleteEnvironmentResponse' => [ 'type' => 'structure', 'members' => [], ], 'Description' => [ 'type' => 'string', 'max' => 1000, 'min' => 1, 'pattern' => '^[a-zA-Z0-9. ]{1,1000}$', ], 'EmailId' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '[A-Z0-9a-z._%+-]+@[A-Za-z0-9.-]+[.]+[A-Za-z]+', 'sensitive' => true, ], 'Environment' => [ 'type' => 'structure', 'members' => [ 'name' => [ 'shape' => 'EnvironmentName', ], 'environmentId' => [ 'shape' => 'IdType', ], 'awsAccountId' => [ 'shape' => 'IdType', ], 'status' => [ 'shape' => 'EnvironmentStatus', ], 'environmentUrl' => [ 'shape' => 'url', ], 'description' => [ 'shape' => 'Description', ], 'environmentArn' => [ 'shape' => 'EnvironmentArn', ], 'sageMakerStudioDomainUrl' => [ 'shape' => 'SmsDomainUrl', ], 'kmsKeyId' => [ 'shape' => 'KmsKeyId', ], 'dedicatedServiceAccountId' => [ 'shape' => 'IdType', ], 'federationMode' => [ 'shape' => 'FederationMode', ], 'federationParameters' => [ 'shape' => 'FederationParameters', ], ], ], 'EnvironmentArn' => [ 'type' => 'string', 'max' => 2048, 'min' => 20, 'pattern' => '^arn:aws:finspace:[A-Za-z0-9_/.-]{0,63}:\\d+:environment/[0-9A-Za-z_-]{1,128}$', ], 'EnvironmentList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Environment', ], ], 'EnvironmentName' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^[a-zA-Z0-9]+[a-zA-Z0-9-]*[a-zA-Z0-9]$', ], 'EnvironmentStatus' => [ 'type' => 'string', 'enum' => [ 'CREATE_REQUESTED', 'CREATING', 'CREATED', 'DELETE_REQUESTED', 'DELETING', 'DELETED', 'FAILED_CREATION', 'RETRY_DELETION', 'FAILED_DELETION', 'SUSPENDED', ], ], 'FederationAttributeKey' => [ 'type' => 'string', 'max' => 32, 'min' => 1, 'pattern' => '.*', ], 'FederationMode' => [ 'type' => 'string', 'enum' => [ 'FEDERATED', 'LOCAL', ], ], 'FederationParameters' => [ 'type' => 'structure', 'members' => [ 'samlMetadataDocument' => [ 'shape' => 'SamlMetadataDocument', ], 'samlMetadataURL' => [ 'shape' => 'url', ], 'applicationCallBackURL' => [ 'shape' => 'url', ], 'federationURN' => [ 'shape' => 'urn', ], 'federationProviderName' => [ 'shape' => 'FederationProviderName', ], 'attributeMap' => [ 'shape' => 'AttributeMap', ], ], ], 'FederationProviderName' => [ 'type' => 'string', 'max' => 32, 'min' => 1, 'pattern' => '[^_\\p{Z}][\\p{L}\\p{M}\\p{S}\\p{N}\\p{P}][^_\\p{Z}]+', ], 'GetEnvironmentRequest' => [ 'type' => 'structure', 'required' => [ 'environmentId', ], 'members' => [ 'environmentId' => [ 'shape' => 'IdType', 'location' => 'uri', 'locationName' => 'environmentId', ], ], ], 'GetEnvironmentResponse' => [ 'type' => 'structure', 'members' => [ 'environment' => [ 'shape' => 'Environment', ], ], ], 'IdType' => [ 'type' => 'string', 'max' => 26, 'min' => 1, 'pattern' => '^[a-zA-Z0-9]{1,26}$', ], 'InternalServerException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, ], 'InvalidRequestException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'KmsKeyId' => [ 'type' => 'string', 'max' => 1000, 'min' => 1, 'pattern' => '^[a-zA-Z-0-9-:\\/]*$', ], 'LimitExceededException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'ListEnvironmentsRequest' => [ 'type' => 'structure', 'members' => [ 'nextToken' => [ 'shape' => 'PaginationToken', 'location' => 'querystring', 'locationName' => 'nextToken', ], 'maxResults' => [ 'shape' => 'ResultLimit', 'location' => 'querystring', 'locationName' => 'maxResults', ], ], ], 'ListEnvironmentsResponse' => [ 'type' => 'structure', 'members' => [ 'environments' => [ 'shape' => 'EnvironmentList', ], 'nextToken' => [ 'shape' => 'PaginationToken', ], ], ], 'ListTagsForResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', ], 'members' => [ 'resourceArn' => [ 'shape' => 'EnvironmentArn', 'location' => 'uri', 'locationName' => 'resourceArn', ], ], ], 'ListTagsForResourceResponse' => [ 'type' => 'structure', 'members' => [ 'tags' => [ 'shape' => 'TagMap', ], ], ], 'NameString' => [ 'type' => 'string', 'max' => 50, 'min' => 1, 'pattern' => '^[a-zA-Z0-9]{1,50}$', ], 'PaginationToken' => [ 'type' => 'string', 'max' => 1000, 'min' => 1, 'pattern' => '.*', ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'ResultLimit' => [ 'type' => 'integer', 'max' => 100, 'min' => 0, ], 'SamlMetadataDocument' => [ 'type' => 'string', 'max' => 10000000, 'min' => 1000, 'pattern' => '.*', ], 'ServiceQuotaExceededException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'error' => [ 'httpStatusCode' => 402, ], 'exception' => true, ], 'SmsDomainUrl' => [ 'type' => 'string', 'max' => 1000, 'min' => 1, 'pattern' => '^[a-zA-Z-0-9-:\\/.]*$', ], 'SuperuserParameters' => [ 'type' => 'structure', 'required' => [ 'emailAddress', 'firstName', 'lastName', ], 'members' => [ 'emailAddress' => [ 'shape' => 'EmailId', ], 'firstName' => [ 'shape' => 'NameString', ], 'lastName' => [ 'shape' => 'NameString', ], ], ], 'TagKey' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^(?!aws:)[a-zA-Z+-=._:/]+$', ], 'TagKeyList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagKey', ], 'max' => 50, 'min' => 1, ], 'TagMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'TagKey', ], 'value' => [ 'shape' => 'TagValue', ], 'max' => 50, 'min' => 1, ], 'TagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'tags', ], 'members' => [ 'resourceArn' => [ 'shape' => 'EnvironmentArn', 'location' => 'uri', 'locationName' => 'resourceArn', ], 'tags' => [ 'shape' => 'TagMap', ], ], ], 'TagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'TagValue' => [ 'type' => 'string', 'max' => 256, 'min' => 1, 'pattern' => '^[a-zA-Z0-9+-=._:@ ]+$', ], 'ThrottlingException' => [ 'type' => 'structure', 'members' => [], 'error' => [ 'httpStatusCode' => 429, ], 'exception' => true, ], 'UntagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'tagKeys', ], 'members' => [ 'resourceArn' => [ 'shape' => 'EnvironmentArn', 'location' => 'uri', 'locationName' => 'resourceArn', ], 'tagKeys' => [ 'shape' => 'TagKeyList', 'location' => 'querystring', 'locationName' => 'tagKeys', ], ], ], 'UntagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'UpdateEnvironmentRequest' => [ 'type' => 'structure', 'required' => [ 'environmentId', ], 'members' => [ 'environmentId' => [ 'shape' => 'IdType', 'location' => 'uri', 'locationName' => 'environmentId', ], 'name' => [ 'shape' => 'EnvironmentName', ], 'description' => [ 'shape' => 'Description', ], 'federationMode' => [ 'shape' => 'FederationMode', ], 'federationParameters' => [ 'shape' => 'FederationParameters', ], ], ], 'UpdateEnvironmentResponse' => [ 'type' => 'structure', 'members' => [ 'environment' => [ 'shape' => 'Environment', ], ], ], 'ValidationException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'errorMessage' => [ 'type' => 'string', ], 'url' => [ 'type' => 'string', 'max' => 1000, 'min' => 1, 'pattern' => '^https?://[-a-zA-Z0-9+&@#/%?=~_|!:,.;]*[-a-zA-Z0-9+&@#/%=~_|]', ], 'urn' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^[A-Za-z0-9._\\-:\\/#\\+]+$', ], ],];
