<?php
// This file was auto-generated from sdk-root/src/data/marketplace-deployment/2023-01-25/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2023-01-25', 'endpointPrefix' => 'deployment-marketplace', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceFullName' => 'AWS Marketplace Deployment Service', 'serviceId' => 'Marketplace Deployment', 'signatureVersion' => 'v4', 'signingName' => 'aws-marketplace', 'uid' => 'marketplace-deployment-2023-01-25', ], 'operations' => [ 'ListTagsForResource' => [ 'name' => 'ListTagsForResource', 'http' => [ 'method' => 'GET', 'requestUri' => '/tags/{resourceArn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListTagsForResourceRequest', ], 'output' => [ 'shape' => 'ListTagsForResourceResponse', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], ], ], 'PutDeploymentParameter' => [ 'name' => 'PutDeploymentParameter', 'http' => [ 'method' => 'POST', 'requestUri' => '/catalogs/{catalog}/products/{productId}/deployment-parameters', 'responseCode' => 200, ], 'input' => [ 'shape' => 'PutDeploymentParameterRequest', ], 'output' => [ 'shape' => 'PutDeploymentParameterResponse', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], ], 'idempotent' => true, ], 'TagResource' => [ 'name' => 'TagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/tags/{resourceArn}', 'responseCode' => 204, ], 'input' => [ 'shape' => 'TagResourceRequest', ], 'output' => [ 'shape' => 'TagResourceResponse', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], ], ], 'UntagResource' => [ 'name' => 'UntagResource', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/tags/{resourceArn}', 'responseCode' => 204, ], 'input' => [ 'shape' => 'UntagResourceRequest', ], 'output' => [ 'shape' => 'UntagResourceResponse', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], ], 'idempotent' => true, ], ], 'shapes' => [ 'AccessDeniedException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 403, 'senderFault' => true, ], 'exception' => true, ], 'Catalog' => [ 'type' => 'string', 'max' => 64, 'min' => 1, 'pattern' => '^[a-zA-Z_-]+$', ], 'ClientToken' => [ 'type' => 'string', 'max' => 64, 'min' => 32, 'pattern' => '^[a-zA-Z0-9/_+=.:@-]+$', ], 'ConflictException' => [ 'type' => 'structure', 'required' => [ 'message', 'resourceId', ], 'members' => [ 'message' => [ 'shape' => 'String', ], 'resourceId' => [ 'shape' => 'ResourceId', ], ], 'error' => [ 'httpStatusCode' => 409, 'senderFault' => true, ], 'exception' => true, ], 'DeploymentParameterInput' => [ 'type' => 'structure', 'required' => [ 'name', 'secretString', ], 'members' => [ 'name' => [ 'shape' => 'DeploymentParameterName', ], 'secretString' => [ 'shape' => 'SecretString', ], ], ], 'DeploymentParameterName' => [ 'type' => 'string', 'max' => 400, 'min' => 1, 'pattern' => '^[a-zA-Z0-9/_+=.@-]+$', ], 'DeploymentParameterResourceIdentifier' => [ 'type' => 'string', 'max' => 32, 'min' => 1, 'pattern' => '^dp-[a-zA-Z0-9]+$', ], 'InternalServerException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, 'fault' => true, 'retryable' => [ 'throttling' => false, ], ], 'ListTagsForResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', ], 'members' => [ 'resourceArn' => [ 'shape' => 'String', 'location' => 'uri', 'locationName' => 'resourceArn', ], ], ], 'ListTagsForResourceResponse' => [ 'type' => 'structure', 'members' => [ 'tags' => [ 'shape' => 'Tags', ], ], ], 'PutDeploymentParameterRequest' => [ 'type' => 'structure', 'required' => [ 'agreementId', 'catalog', 'deploymentParameter', 'productId', ], 'members' => [ 'agreementId' => [ 'shape' => 'ResourceId', ], 'catalog' => [ 'shape' => 'Catalog', 'location' => 'uri', 'locationName' => 'catalog', ], 'clientToken' => [ 'shape' => 'ClientToken', 'idempotencyToken' => true, ], 'deploymentParameter' => [ 'shape' => 'DeploymentParameterInput', ], 'expirationDate' => [ 'shape' => 'SyntheticTimestamp_date_time', ], 'productId' => [ 'shape' => 'ResourceId', 'location' => 'uri', 'locationName' => 'productId', ], 'tags' => [ 'shape' => 'TagsMap', ], ], ], 'PutDeploymentParameterResponse' => [ 'type' => 'structure', 'required' => [ 'agreementId', 'deploymentParameterId', 'resourceArn', ], 'members' => [ 'agreementId' => [ 'shape' => 'ResourceId', ], 'deploymentParameterId' => [ 'shape' => 'DeploymentParameterResourceIdentifier', ], 'resourceArn' => [ 'shape' => 'ResourceArn', ], 'tags' => [ 'shape' => 'TagsMap', ], ], ], 'ResourceArn' => [ 'type' => 'string', 'max' => 2048, 'min' => 1, 'pattern' => '^[a-zA-Z0-9:*/-]+$', ], 'ResourceId' => [ 'type' => 'string', 'max' => 64, 'min' => 1, 'pattern' => '^[A-Za-z0-9_/-]+$', ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 404, 'senderFault' => true, ], 'exception' => true, ], 'SecretString' => [ 'type' => 'string', 'max' => 15000, 'min' => 1, 'sensitive' => true, ], 'ServiceQuotaExceededException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 402, 'senderFault' => true, ], 'exception' => true, ], 'String' => [ 'type' => 'string', ], 'StringList' => [ 'type' => 'list', 'member' => [ 'shape' => 'String', ], ], 'SyntheticTimestamp_date_time' => [ 'type' => 'timestamp', 'timestampFormat' => 'iso8601', ], 'TagKey' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^[a-zA-Z0-9/_+=.:@-]+$', ], 'TagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', ], 'members' => [ 'resourceArn' => [ 'shape' => 'String', 'location' => 'uri', 'locationName' => 'resourceArn', ], 'tags' => [ 'shape' => 'Tags', ], ], ], 'TagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'TagValue' => [ 'type' => 'string', 'max' => 256, 'min' => 1, 'pattern' => '^[a-zA-Z0-9/_+=.:@-]+$', ], 'Tags' => [ 'type' => 'map', 'key' => [ 'shape' => 'String', ], 'value' => [ 'shape' => 'String', ], ], 'TagsMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'TagKey', ], 'value' => [ 'shape' => 'TagValue', ], 'max' => 50, 'min' => 0, ], 'ThrottlingException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 429, 'senderFault' => true, ], 'exception' => true, 'retryable' => [ 'throttling' => true, ], ], 'UntagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'tagKeys', ], 'members' => [ 'resourceArn' => [ 'shape' => 'String', 'location' => 'uri', 'locationName' => 'resourceArn', ], 'tagKeys' => [ 'shape' => 'StringList', 'location' => 'querystring', 'locationName' => 'tagKeys', ], ], ], 'UntagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'ValidationException' => [ 'type' => 'structure', 'required' => [ 'fieldName', 'message', ], 'members' => [ 'fieldName' => [ 'shape' => 'String', ], 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], ],];
