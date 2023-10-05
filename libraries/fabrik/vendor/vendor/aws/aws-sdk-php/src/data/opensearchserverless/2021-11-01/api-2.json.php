<?php
// This file was auto-generated from sdk-root/src/data/opensearchserverless/2021-11-01/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2021-11-01', 'endpointPrefix' => 'aoss', 'jsonVersion' => '1.0', 'protocol' => 'json', 'serviceFullName' => 'OpenSearch Service Serverless', 'serviceId' => 'OpenSearchServerless', 'signatureVersion' => 'v4', 'signingName' => 'aoss', 'targetPrefix' => 'OpenSearchServerless', 'uid' => 'opensearchserverless-2021-11-01', ], 'operations' => [ 'BatchGetCollection' => [ 'name' => 'BatchGetCollection', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'BatchGetCollectionRequest', ], 'output' => [ 'shape' => 'BatchGetCollectionResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], ], ], 'BatchGetVpcEndpoint' => [ 'name' => 'BatchGetVpcEndpoint', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'BatchGetVpcEndpointRequest', ], 'output' => [ 'shape' => 'BatchGetVpcEndpointResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], ], ], 'CreateAccessPolicy' => [ 'name' => 'CreateAccessPolicy', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateAccessPolicyRequest', ], 'output' => [ 'shape' => 'CreateAccessPolicyResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], 'idempotent' => true, ], 'CreateCollection' => [ 'name' => 'CreateCollection', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateCollectionRequest', ], 'output' => [ 'shape' => 'CreateCollectionResponse', ], 'errors' => [ [ 'shape' => 'OcuLimitExceededException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], 'idempotent' => true, ], 'CreateSecurityConfig' => [ 'name' => 'CreateSecurityConfig', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateSecurityConfigRequest', ], 'output' => [ 'shape' => 'CreateSecurityConfigResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], 'idempotent' => true, ], 'CreateSecurityPolicy' => [ 'name' => 'CreateSecurityPolicy', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateSecurityPolicyRequest', ], 'output' => [ 'shape' => 'CreateSecurityPolicyResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], 'idempotent' => true, ], 'CreateVpcEndpoint' => [ 'name' => 'CreateVpcEndpoint', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateVpcEndpointRequest', ], 'output' => [ 'shape' => 'CreateVpcEndpointResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], 'idempotent' => true, ], 'DeleteAccessPolicy' => [ 'name' => 'DeleteAccessPolicy', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteAccessPolicyRequest', ], 'output' => [ 'shape' => 'DeleteAccessPolicyResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], ], 'idempotent' => true, ], 'DeleteCollection' => [ 'name' => 'DeleteCollection', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteCollectionRequest', ], 'output' => [ 'shape' => 'DeleteCollectionResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], ], 'idempotent' => true, ], 'DeleteSecurityConfig' => [ 'name' => 'DeleteSecurityConfig', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteSecurityConfigRequest', ], 'output' => [ 'shape' => 'DeleteSecurityConfigResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], ], 'idempotent' => true, ], 'DeleteSecurityPolicy' => [ 'name' => 'DeleteSecurityPolicy', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteSecurityPolicyRequest', ], 'output' => [ 'shape' => 'DeleteSecurityPolicyResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], ], 'idempotent' => true, ], 'DeleteVpcEndpoint' => [ 'name' => 'DeleteVpcEndpoint', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteVpcEndpointRequest', ], 'output' => [ 'shape' => 'DeleteVpcEndpointResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], ], 'idempotent' => true, ], 'GetAccessPolicy' => [ 'name' => 'GetAccessPolicy', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetAccessPolicyRequest', ], 'output' => [ 'shape' => 'GetAccessPolicyResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ValidationException', ], ], ], 'GetAccountSettings' => [ 'name' => 'GetAccountSettings', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetAccountSettingsRequest', ], 'output' => [ 'shape' => 'GetAccountSettingsResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], ], ], 'GetPoliciesStats' => [ 'name' => 'GetPoliciesStats', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetPoliciesStatsRequest', ], 'output' => [ 'shape' => 'GetPoliciesStatsResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], ], ], 'GetSecurityConfig' => [ 'name' => 'GetSecurityConfig', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetSecurityConfigRequest', ], 'output' => [ 'shape' => 'GetSecurityConfigResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ValidationException', ], ], ], 'GetSecurityPolicy' => [ 'name' => 'GetSecurityPolicy', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetSecurityPolicyRequest', ], 'output' => [ 'shape' => 'GetSecurityPolicyResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ValidationException', ], ], ], 'ListAccessPolicies' => [ 'name' => 'ListAccessPolicies', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListAccessPoliciesRequest', ], 'output' => [ 'shape' => 'ListAccessPoliciesResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], ], ], 'ListCollections' => [ 'name' => 'ListCollections', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListCollectionsRequest', ], 'output' => [ 'shape' => 'ListCollectionsResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], ], ], 'ListSecurityConfigs' => [ 'name' => 'ListSecurityConfigs', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListSecurityConfigsRequest', ], 'output' => [ 'shape' => 'ListSecurityConfigsResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], ], ], 'ListSecurityPolicies' => [ 'name' => 'ListSecurityPolicies', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListSecurityPoliciesRequest', ], 'output' => [ 'shape' => 'ListSecurityPoliciesResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], ], ], 'ListTagsForResource' => [ 'name' => 'ListTagsForResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListTagsForResourceRequest', ], 'output' => [ 'shape' => 'ListTagsForResourceResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ValidationException', ], ], ], 'ListVpcEndpoints' => [ 'name' => 'ListVpcEndpoints', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListVpcEndpointsRequest', ], 'output' => [ 'shape' => 'ListVpcEndpointsResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], ], ], 'TagResource' => [ 'name' => 'TagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'TagResourceRequest', ], 'output' => [ 'shape' => 'TagResourceResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], ], 'UntagResource' => [ 'name' => 'UntagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UntagResourceRequest', ], 'output' => [ 'shape' => 'UntagResourceResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], ], ], 'UpdateAccessPolicy' => [ 'name' => 'UpdateAccessPolicy', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateAccessPolicyRequest', ], 'output' => [ 'shape' => 'UpdateAccessPolicyResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], ], 'idempotent' => true, ], 'UpdateAccountSettings' => [ 'name' => 'UpdateAccountSettings', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateAccountSettingsRequest', ], 'output' => [ 'shape' => 'UpdateAccountSettingsResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], ], ], 'UpdateCollection' => [ 'name' => 'UpdateCollection', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateCollectionRequest', ], 'output' => [ 'shape' => 'UpdateCollectionResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], ], 'idempotent' => true, ], 'UpdateSecurityConfig' => [ 'name' => 'UpdateSecurityConfig', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateSecurityConfigRequest', ], 'output' => [ 'shape' => 'UpdateSecurityConfigResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], ], 'idempotent' => true, ], 'UpdateSecurityPolicy' => [ 'name' => 'UpdateSecurityPolicy', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateSecurityPolicyRequest', ], 'output' => [ 'shape' => 'UpdateSecurityPolicyResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], 'idempotent' => true, ], 'UpdateVpcEndpoint' => [ 'name' => 'UpdateVpcEndpoint', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateVpcEndpointRequest', ], 'output' => [ 'shape' => 'UpdateVpcEndpointResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], ], 'idempotent' => true, ], ], 'shapes' => [ 'AccessPolicyDetail' => [ 'type' => 'structure', 'members' => [ 'createdDate' => [ 'shape' => 'Long', ], 'description' => [ 'shape' => 'PolicyDescription', ], 'lastModifiedDate' => [ 'shape' => 'Long', ], 'name' => [ 'shape' => 'PolicyName', ], 'policy' => [ 'shape' => 'Document', ], 'policyVersion' => [ 'shape' => 'PolicyVersion', ], 'type' => [ 'shape' => 'AccessPolicyType', ], ], ], 'AccessPolicyStats' => [ 'type' => 'structure', 'members' => [ 'DataPolicyCount' => [ 'shape' => 'Long', ], ], ], 'AccessPolicySummaries' => [ 'type' => 'list', 'member' => [ 'shape' => 'AccessPolicySummary', ], ], 'AccessPolicySummary' => [ 'type' => 'structure', 'members' => [ 'createdDate' => [ 'shape' => 'Long', ], 'description' => [ 'shape' => 'PolicyDescription', ], 'lastModifiedDate' => [ 'shape' => 'Long', ], 'name' => [ 'shape' => 'PolicyName', ], 'policyVersion' => [ 'shape' => 'PolicyVersion', ], 'type' => [ 'shape' => 'AccessPolicyType', ], ], ], 'AccessPolicyType' => [ 'type' => 'string', 'enum' => [ 'data', ], ], 'AccountSettingsDetail' => [ 'type' => 'structure', 'members' => [ 'capacityLimits' => [ 'shape' => 'CapacityLimits', ], ], ], 'Arn' => [ 'type' => 'string', 'max' => 1011, 'min' => 1, ], 'BatchGetCollectionRequest' => [ 'type' => 'structure', 'members' => [ 'ids' => [ 'shape' => 'CollectionIds', ], 'names' => [ 'shape' => 'CollectionNames', ], ], ], 'BatchGetCollectionResponse' => [ 'type' => 'structure', 'members' => [ 'collectionDetails' => [ 'shape' => 'CollectionDetails', ], 'collectionErrorDetails' => [ 'shape' => 'CollectionErrorDetails', ], ], ], 'BatchGetVpcEndpointRequest' => [ 'type' => 'structure', 'required' => [ 'ids', ], 'members' => [ 'ids' => [ 'shape' => 'VpcEndpointIds', ], ], ], 'BatchGetVpcEndpointResponse' => [ 'type' => 'structure', 'members' => [ 'vpcEndpointDetails' => [ 'shape' => 'VpcEndpointDetails', ], 'vpcEndpointErrorDetails' => [ 'shape' => 'VpcEndpointErrorDetails', ], ], ], 'CapacityLimits' => [ 'type' => 'structure', 'members' => [ 'maxIndexingCapacityInOCU' => [ 'shape' => 'IndexingCapacityValue', ], 'maxSearchCapacityInOCU' => [ 'shape' => 'SearchCapacityValue', ], ], ], 'ClientToken' => [ 'type' => 'string', 'max' => 512, 'min' => 1, ], 'CollectionDetail' => [ 'type' => 'structure', 'members' => [ 'arn' => [ 'shape' => 'String', ], 'collectionEndpoint' => [ 'shape' => 'String', ], 'createdDate' => [ 'shape' => 'Long', ], 'dashboardEndpoint' => [ 'shape' => 'String', ], 'description' => [ 'shape' => 'String', ], 'id' => [ 'shape' => 'CollectionId', ], 'kmsKeyArn' => [ 'shape' => 'String', ], 'lastModifiedDate' => [ 'shape' => 'Long', ], 'name' => [ 'shape' => 'CollectionName', ], 'status' => [ 'shape' => 'CollectionStatus', ], 'type' => [ 'shape' => 'CollectionType', ], ], ], 'CollectionDetails' => [ 'type' => 'list', 'member' => [ 'shape' => 'CollectionDetail', ], ], 'CollectionErrorDetail' => [ 'type' => 'structure', 'members' => [ 'errorCode' => [ 'shape' => 'String', ], 'errorMessage' => [ 'shape' => 'String', ], 'id' => [ 'shape' => 'CollectionId', ], 'name' => [ 'shape' => 'CollectionName', ], ], ], 'CollectionErrorDetails' => [ 'type' => 'list', 'member' => [ 'shape' => 'CollectionErrorDetail', ], ], 'CollectionFilters' => [ 'type' => 'structure', 'members' => [ 'name' => [ 'shape' => 'CollectionName', ], 'status' => [ 'shape' => 'CollectionStatus', ], ], ], 'CollectionId' => [ 'type' => 'string', 'max' => 40, 'min' => 3, 'pattern' => '^[a-z0-9]{3,40}$', ], 'CollectionIds' => [ 'type' => 'list', 'member' => [ 'shape' => 'CollectionId', ], 'max' => 100, 'min' => 1, ], 'CollectionName' => [ 'type' => 'string', 'max' => 32, 'min' => 3, 'pattern' => '^[a-z][a-z0-9-]+$', ], 'CollectionNames' => [ 'type' => 'list', 'member' => [ 'shape' => 'CollectionName', ], 'max' => 100, 'min' => 1, ], 'CollectionStatus' => [ 'type' => 'string', 'enum' => [ 'CREATING', 'DELETING', 'ACTIVE', 'FAILED', ], ], 'CollectionSummaries' => [ 'type' => 'list', 'member' => [ 'shape' => 'CollectionSummary', ], ], 'CollectionSummary' => [ 'type' => 'structure', 'members' => [ 'arn' => [ 'shape' => 'String', ], 'id' => [ 'shape' => 'CollectionId', ], 'name' => [ 'shape' => 'CollectionName', ], 'status' => [ 'shape' => 'CollectionStatus', ], ], ], 'CollectionType' => [ 'type' => 'string', 'enum' => [ 'SEARCH', 'TIMESERIES', 'VECTORSEARCH', ], ], 'ConfigDescription' => [ 'type' => 'string', 'max' => 1000, 'min' => 1, ], 'ConfigName' => [ 'type' => 'string', 'max' => 32, 'min' => 3, 'pattern' => '^[a-z][a-z0-9-]+$', ], 'ConflictException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'CreateAccessPolicyRequest' => [ 'type' => 'structure', 'required' => [ 'name', 'policy', 'type', ], 'members' => [ 'clientToken' => [ 'shape' => 'ClientToken', 'idempotencyToken' => true, ], 'description' => [ 'shape' => 'PolicyDescription', ], 'name' => [ 'shape' => 'PolicyName', ], 'policy' => [ 'shape' => 'PolicyDocument', ], 'type' => [ 'shape' => 'AccessPolicyType', ], ], ], 'CreateAccessPolicyResponse' => [ 'type' => 'structure', 'members' => [ 'accessPolicyDetail' => [ 'shape' => 'AccessPolicyDetail', ], ], ], 'CreateCollectionDetail' => [ 'type' => 'structure', 'members' => [ 'arn' => [ 'shape' => 'String', ], 'createdDate' => [ 'shape' => 'Long', ], 'description' => [ 'shape' => 'String', ], 'id' => [ 'shape' => 'CollectionId', ], 'kmsKeyArn' => [ 'shape' => 'String', ], 'lastModifiedDate' => [ 'shape' => 'Long', ], 'name' => [ 'shape' => 'CollectionName', ], 'status' => [ 'shape' => 'CollectionStatus', ], 'type' => [ 'shape' => 'CollectionType', ], ], ], 'CreateCollectionRequest' => [ 'type' => 'structure', 'required' => [ 'name', ], 'members' => [ 'clientToken' => [ 'shape' => 'ClientToken', 'idempotencyToken' => true, ], 'description' => [ 'shape' => 'CreateCollectionRequestDescriptionString', ], 'name' => [ 'shape' => 'CollectionName', ], 'tags' => [ 'shape' => 'Tags', ], 'type' => [ 'shape' => 'CollectionType', ], ], ], 'CreateCollectionRequestDescriptionString' => [ 'type' => 'string', 'max' => 1000, 'min' => 0, ], 'CreateCollectionResponse' => [ 'type' => 'structure', 'members' => [ 'createCollectionDetail' => [ 'shape' => 'CreateCollectionDetail', ], ], ], 'CreateSecurityConfigRequest' => [ 'type' => 'structure', 'required' => [ 'name', 'type', ], 'members' => [ 'clientToken' => [ 'shape' => 'ClientToken', 'idempotencyToken' => true, ], 'description' => [ 'shape' => 'ConfigDescription', ], 'name' => [ 'shape' => 'ConfigName', ], 'samlOptions' => [ 'shape' => 'SamlConfigOptions', ], 'type' => [ 'shape' => 'SecurityConfigType', ], ], ], 'CreateSecurityConfigResponse' => [ 'type' => 'structure', 'members' => [ 'securityConfigDetail' => [ 'shape' => 'SecurityConfigDetail', ], ], ], 'CreateSecurityPolicyRequest' => [ 'type' => 'structure', 'required' => [ 'name', 'policy', 'type', ], 'members' => [ 'clientToken' => [ 'shape' => 'ClientToken', 'idempotencyToken' => true, ], 'description' => [ 'shape' => 'PolicyDescription', ], 'name' => [ 'shape' => 'PolicyName', ], 'policy' => [ 'shape' => 'PolicyDocument', ], 'type' => [ 'shape' => 'SecurityPolicyType', ], ], ], 'CreateSecurityPolicyResponse' => [ 'type' => 'structure', 'members' => [ 'securityPolicyDetail' => [ 'shape' => 'SecurityPolicyDetail', ], ], ], 'CreateVpcEndpointDetail' => [ 'type' => 'structure', 'members' => [ 'id' => [ 'shape' => 'VpcEndpointId', ], 'name' => [ 'shape' => 'VpcEndpointName', ], 'status' => [ 'shape' => 'VpcEndpointStatus', ], ], ], 'CreateVpcEndpointRequest' => [ 'type' => 'structure', 'required' => [ 'name', 'subnetIds', 'vpcId', ], 'members' => [ 'clientToken' => [ 'shape' => 'ClientToken', 'idempotencyToken' => true, ], 'name' => [ 'shape' => 'VpcEndpointName', ], 'securityGroupIds' => [ 'shape' => 'SecurityGroupIds', ], 'subnetIds' => [ 'shape' => 'SubnetIds', ], 'vpcId' => [ 'shape' => 'VpcId', ], ], ], 'CreateVpcEndpointResponse' => [ 'type' => 'structure', 'members' => [ 'createVpcEndpointDetail' => [ 'shape' => 'CreateVpcEndpointDetail', ], ], ], 'DeleteAccessPolicyRequest' => [ 'type' => 'structure', 'required' => [ 'name', 'type', ], 'members' => [ 'clientToken' => [ 'shape' => 'ClientToken', 'idempotencyToken' => true, ], 'name' => [ 'shape' => 'PolicyName', ], 'type' => [ 'shape' => 'AccessPolicyType', ], ], ], 'DeleteAccessPolicyResponse' => [ 'type' => 'structure', 'members' => [], ], 'DeleteCollectionDetail' => [ 'type' => 'structure', 'members' => [ 'id' => [ 'shape' => 'CollectionId', ], 'name' => [ 'shape' => 'CollectionName', ], 'status' => [ 'shape' => 'CollectionStatus', ], ], ], 'DeleteCollectionRequest' => [ 'type' => 'structure', 'required' => [ 'id', ], 'members' => [ 'clientToken' => [ 'shape' => 'ClientToken', 'idempotencyToken' => true, ], 'id' => [ 'shape' => 'CollectionId', ], ], ], 'DeleteCollectionResponse' => [ 'type' => 'structure', 'members' => [ 'deleteCollectionDetail' => [ 'shape' => 'DeleteCollectionDetail', ], ], ], 'DeleteSecurityConfigRequest' => [ 'type' => 'structure', 'required' => [ 'id', ], 'members' => [ 'clientToken' => [ 'shape' => 'ClientToken', 'idempotencyToken' => true, ], 'id' => [ 'shape' => 'SecurityConfigId', ], ], ], 'DeleteSecurityConfigResponse' => [ 'type' => 'structure', 'members' => [], ], 'DeleteSecurityPolicyRequest' => [ 'type' => 'structure', 'required' => [ 'name', 'type', ], 'members' => [ 'clientToken' => [ 'shape' => 'ClientToken', 'idempotencyToken' => true, ], 'name' => [ 'shape' => 'PolicyName', ], 'type' => [ 'shape' => 'SecurityPolicyType', ], ], ], 'DeleteSecurityPolicyResponse' => [ 'type' => 'structure', 'members' => [], ], 'DeleteVpcEndpointDetail' => [ 'type' => 'structure', 'members' => [ 'id' => [ 'shape' => 'VpcEndpointId', ], 'name' => [ 'shape' => 'VpcEndpointName', ], 'status' => [ 'shape' => 'VpcEndpointStatus', ], ], ], 'DeleteVpcEndpointRequest' => [ 'type' => 'structure', 'required' => [ 'id', ], 'members' => [ 'clientToken' => [ 'shape' => 'ClientToken', 'idempotencyToken' => true, ], 'id' => [ 'shape' => 'VpcEndpointId', ], ], ], 'DeleteVpcEndpointResponse' => [ 'type' => 'structure', 'members' => [ 'deleteVpcEndpointDetail' => [ 'shape' => 'DeleteVpcEndpointDetail', ], ], ], 'Document' => [ 'type' => 'structure', 'members' => [], 'document' => true, ], 'GetAccessPolicyRequest' => [ 'type' => 'structure', 'required' => [ 'name', 'type', ], 'members' => [ 'name' => [ 'shape' => 'PolicyName', ], 'type' => [ 'shape' => 'AccessPolicyType', ], ], ], 'GetAccessPolicyResponse' => [ 'type' => 'structure', 'members' => [ 'accessPolicyDetail' => [ 'shape' => 'AccessPolicyDetail', ], ], ], 'GetAccountSettingsRequest' => [ 'type' => 'structure', 'members' => [], ], 'GetAccountSettingsResponse' => [ 'type' => 'structure', 'members' => [ 'accountSettingsDetail' => [ 'shape' => 'AccountSettingsDetail', ], ], ], 'GetPoliciesStatsRequest' => [ 'type' => 'structure', 'members' => [], ], 'GetPoliciesStatsResponse' => [ 'type' => 'structure', 'members' => [ 'AccessPolicyStats' => [ 'shape' => 'AccessPolicyStats', ], 'SecurityConfigStats' => [ 'shape' => 'SecurityConfigStats', ], 'SecurityPolicyStats' => [ 'shape' => 'SecurityPolicyStats', ], 'TotalPolicyCount' => [ 'shape' => 'Long', ], ], ], 'GetSecurityConfigRequest' => [ 'type' => 'structure', 'required' => [ 'id', ], 'members' => [ 'id' => [ 'shape' => 'SecurityConfigId', ], ], ], 'GetSecurityConfigResponse' => [ 'type' => 'structure', 'members' => [ 'securityConfigDetail' => [ 'shape' => 'SecurityConfigDetail', ], ], ], 'GetSecurityPolicyRequest' => [ 'type' => 'structure', 'required' => [ 'name', 'type', ], 'members' => [ 'name' => [ 'shape' => 'PolicyName', ], 'type' => [ 'shape' => 'SecurityPolicyType', ], ], ], 'GetSecurityPolicyResponse' => [ 'type' => 'structure', 'members' => [ 'securityPolicyDetail' => [ 'shape' => 'SecurityPolicyDetail', ], ], ], 'IndexingCapacityValue' => [ 'type' => 'integer', 'box' => true, 'min' => 2, ], 'InternalServerException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'exception' => true, 'fault' => true, ], 'ListAccessPoliciesRequest' => [ 'type' => 'structure', 'required' => [ 'type', ], 'members' => [ 'maxResults' => [ 'shape' => 'ListAccessPoliciesRequestMaxResultsInteger', ], 'nextToken' => [ 'shape' => 'String', ], 'resource' => [ 'shape' => 'ListAccessPoliciesRequestResourceList', ], 'type' => [ 'shape' => 'AccessPolicyType', ], ], ], 'ListAccessPoliciesRequestMaxResultsInteger' => [ 'type' => 'integer', 'box' => true, 'max' => 100, 'min' => 1, ], 'ListAccessPoliciesRequestResourceList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Resource', ], 'max' => 1000, 'min' => 1, ], 'ListAccessPoliciesResponse' => [ 'type' => 'structure', 'members' => [ 'accessPolicySummaries' => [ 'shape' => 'AccessPolicySummaries', ], 'nextToken' => [ 'shape' => 'String', ], ], ], 'ListCollectionsRequest' => [ 'type' => 'structure', 'members' => [ 'collectionFilters' => [ 'shape' => 'CollectionFilters', ], 'maxResults' => [ 'shape' => 'ListCollectionsRequestMaxResultsInteger', ], 'nextToken' => [ 'shape' => 'String', ], ], ], 'ListCollectionsRequestMaxResultsInteger' => [ 'type' => 'integer', 'box' => true, 'max' => 100, 'min' => 1, ], 'ListCollectionsResponse' => [ 'type' => 'structure', 'members' => [ 'collectionSummaries' => [ 'shape' => 'CollectionSummaries', ], 'nextToken' => [ 'shape' => 'String', ], ], ], 'ListSecurityConfigsRequest' => [ 'type' => 'structure', 'required' => [ 'type', ], 'members' => [ 'maxResults' => [ 'shape' => 'ListSecurityConfigsRequestMaxResultsInteger', ], 'nextToken' => [ 'shape' => 'String', ], 'type' => [ 'shape' => 'SecurityConfigType', ], ], ], 'ListSecurityConfigsRequestMaxResultsInteger' => [ 'type' => 'integer', 'box' => true, 'max' => 100, 'min' => 1, ], 'ListSecurityConfigsResponse' => [ 'type' => 'structure', 'members' => [ 'nextToken' => [ 'shape' => 'String', ], 'securityConfigSummaries' => [ 'shape' => 'SecurityConfigSummaries', ], ], ], 'ListSecurityPoliciesRequest' => [ 'type' => 'structure', 'required' => [ 'type', ], 'members' => [ 'maxResults' => [ 'shape' => 'ListSecurityPoliciesRequestMaxResultsInteger', ], 'nextToken' => [ 'shape' => 'String', ], 'resource' => [ 'shape' => 'ListSecurityPoliciesRequestResourceList', ], 'type' => [ 'shape' => 'SecurityPolicyType', ], ], ], 'ListSecurityPoliciesRequestMaxResultsInteger' => [ 'type' => 'integer', 'box' => true, 'max' => 100, 'min' => 1, ], 'ListSecurityPoliciesRequestResourceList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Resource', ], 'max' => 1000, 'min' => 1, ], 'ListSecurityPoliciesResponse' => [ 'type' => 'structure', 'members' => [ 'nextToken' => [ 'shape' => 'String', ], 'securityPolicySummaries' => [ 'shape' => 'SecurityPolicySummaries', ], ], ], 'ListTagsForResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', ], ], ], 'ListTagsForResourceResponse' => [ 'type' => 'structure', 'members' => [ 'tags' => [ 'shape' => 'Tags', ], ], ], 'ListVpcEndpointsRequest' => [ 'type' => 'structure', 'members' => [ 'maxResults' => [ 'shape' => 'ListVpcEndpointsRequestMaxResultsInteger', ], 'nextToken' => [ 'shape' => 'String', ], 'vpcEndpointFilters' => [ 'shape' => 'VpcEndpointFilters', ], ], ], 'ListVpcEndpointsRequestMaxResultsInteger' => [ 'type' => 'integer', 'box' => true, 'max' => 100, 'min' => 1, ], 'ListVpcEndpointsResponse' => [ 'type' => 'structure', 'members' => [ 'nextToken' => [ 'shape' => 'String', ], 'vpcEndpointSummaries' => [ 'shape' => 'VpcEndpointSummaries', ], ], ], 'Long' => [ 'type' => 'long', 'box' => true, ], 'OcuLimitExceededException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'PolicyDescription' => [ 'type' => 'string', 'max' => 1000, 'min' => 0, ], 'PolicyDocument' => [ 'type' => 'string', 'max' => 20480, 'min' => 1, 'pattern' => '[\\u0009\\u000A\\u000D\\u0020-\\u007E\\u00A1-\\u00FF]+', ], 'PolicyName' => [ 'type' => 'string', 'max' => 32, 'min' => 3, 'pattern' => '^[a-z][a-z0-9-]+$', ], 'PolicyVersion' => [ 'type' => 'string', 'max' => 36, 'min' => 20, 'pattern' => '^([0-9a-zA-Z+/]{4})*(([0-9a-zA-Z+/]{2}==)|([0-9a-zA-Z+/]{3}=))?$', ], 'Resource' => [ 'type' => 'string', ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'SamlConfigOptions' => [ 'type' => 'structure', 'required' => [ 'metadata', ], 'members' => [ 'groupAttribute' => [ 'shape' => 'samlGroupAttribute', ], 'metadata' => [ 'shape' => 'samlMetadata', ], 'sessionTimeout' => [ 'shape' => 'SamlConfigOptionsSessionTimeoutInteger', ], 'userAttribute' => [ 'shape' => 'samlUserAttribute', ], ], ], 'SamlConfigOptionsSessionTimeoutInteger' => [ 'type' => 'integer', 'box' => true, 'max' => 720, 'min' => 5, ], 'SearchCapacityValue' => [ 'type' => 'integer', 'box' => true, 'min' => 2, ], 'SecurityConfigDetail' => [ 'type' => 'structure', 'members' => [ 'configVersion' => [ 'shape' => 'PolicyVersion', ], 'createdDate' => [ 'shape' => 'Long', ], 'description' => [ 'shape' => 'ConfigDescription', ], 'id' => [ 'shape' => 'SecurityConfigId', ], 'lastModifiedDate' => [ 'shape' => 'Long', ], 'samlOptions' => [ 'shape' => 'SamlConfigOptions', ], 'type' => [ 'shape' => 'SecurityConfigType', ], ], ], 'SecurityConfigId' => [ 'type' => 'string', 'max' => 100, 'min' => 1, ], 'SecurityConfigStats' => [ 'type' => 'structure', 'members' => [ 'SamlConfigCount' => [ 'shape' => 'Long', ], ], ], 'SecurityConfigSummaries' => [ 'type' => 'list', 'member' => [ 'shape' => 'SecurityConfigSummary', ], ], 'SecurityConfigSummary' => [ 'type' => 'structure', 'members' => [ 'configVersion' => [ 'shape' => 'PolicyVersion', ], 'createdDate' => [ 'shape' => 'Long', ], 'description' => [ 'shape' => 'ConfigDescription', ], 'id' => [ 'shape' => 'SecurityConfigId', ], 'lastModifiedDate' => [ 'shape' => 'Long', ], 'type' => [ 'shape' => 'SecurityConfigType', ], ], ], 'SecurityConfigType' => [ 'type' => 'string', 'enum' => [ 'saml', ], ], 'SecurityGroupId' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^[\\w+\\-]+$', ], 'SecurityGroupIds' => [ 'type' => 'list', 'member' => [ 'shape' => 'SecurityGroupId', ], 'max' => 5, 'min' => 1, ], 'SecurityPolicyDetail' => [ 'type' => 'structure', 'members' => [ 'createdDate' => [ 'shape' => 'Long', ], 'description' => [ 'shape' => 'PolicyDescription', ], 'lastModifiedDate' => [ 'shape' => 'Long', ], 'name' => [ 'shape' => 'PolicyName', ], 'policy' => [ 'shape' => 'Document', ], 'policyVersion' => [ 'shape' => 'PolicyVersion', ], 'type' => [ 'shape' => 'SecurityPolicyType', ], ], ], 'SecurityPolicyStats' => [ 'type' => 'structure', 'members' => [ 'EncryptionPolicyCount' => [ 'shape' => 'Long', ], 'NetworkPolicyCount' => [ 'shape' => 'Long', ], ], ], 'SecurityPolicySummaries' => [ 'type' => 'list', 'member' => [ 'shape' => 'SecurityPolicySummary', ], ], 'SecurityPolicySummary' => [ 'type' => 'structure', 'members' => [ 'createdDate' => [ 'shape' => 'Long', ], 'description' => [ 'shape' => 'PolicyDescription', ], 'lastModifiedDate' => [ 'shape' => 'Long', ], 'name' => [ 'shape' => 'PolicyName', ], 'policyVersion' => [ 'shape' => 'PolicyVersion', ], 'type' => [ 'shape' => 'SecurityPolicyType', ], ], ], 'SecurityPolicyType' => [ 'type' => 'string', 'enum' => [ 'encryption', 'network', ], ], 'ServiceQuotaExceededException' => [ 'type' => 'structure', 'required' => [ 'message', 'serviceCode', ], 'members' => [ 'message' => [ 'shape' => 'String', ], 'quotaCode' => [ 'shape' => 'String', ], 'resourceId' => [ 'shape' => 'String', ], 'resourceType' => [ 'shape' => 'String', ], 'serviceCode' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'String' => [ 'type' => 'string', ], 'SubnetId' => [ 'type' => 'string', 'max' => 32, 'min' => 1, 'pattern' => '^subnet-([0-9a-f]{8}|[0-9a-f]{17})$', ], 'SubnetIds' => [ 'type' => 'list', 'member' => [ 'shape' => 'SubnetId', ], 'max' => 6, 'min' => 1, ], 'Tag' => [ 'type' => 'structure', 'required' => [ 'key', 'value', ], 'members' => [ 'key' => [ 'shape' => 'TagKey', ], 'value' => [ 'shape' => 'TagValue', ], ], ], 'TagKey' => [ 'type' => 'string', 'max' => 128, 'min' => 1, ], 'TagKeys' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagKey', ], 'max' => 50, 'min' => 0, ], 'TagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'tags', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', ], 'tags' => [ 'shape' => 'Tags', ], ], ], 'TagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'TagValue' => [ 'type' => 'string', 'max' => 256, 'min' => 0, ], 'Tags' => [ 'type' => 'list', 'member' => [ 'shape' => 'Tag', ], 'max' => 50, 'min' => 0, ], 'UntagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'tagKeys', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', ], 'tagKeys' => [ 'shape' => 'TagKeys', ], ], ], 'UntagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'UpdateAccessPolicyRequest' => [ 'type' => 'structure', 'required' => [ 'name', 'policyVersion', 'type', ], 'members' => [ 'clientToken' => [ 'shape' => 'ClientToken', 'idempotencyToken' => true, ], 'description' => [ 'shape' => 'PolicyDescription', ], 'name' => [ 'shape' => 'PolicyName', ], 'policy' => [ 'shape' => 'PolicyDocument', ], 'policyVersion' => [ 'shape' => 'PolicyVersion', ], 'type' => [ 'shape' => 'AccessPolicyType', ], ], ], 'UpdateAccessPolicyResponse' => [ 'type' => 'structure', 'members' => [ 'accessPolicyDetail' => [ 'shape' => 'AccessPolicyDetail', ], ], ], 'UpdateAccountSettingsRequest' => [ 'type' => 'structure', 'members' => [ 'capacityLimits' => [ 'shape' => 'CapacityLimits', ], ], ], 'UpdateAccountSettingsResponse' => [ 'type' => 'structure', 'members' => [ 'accountSettingsDetail' => [ 'shape' => 'AccountSettingsDetail', ], ], ], 'UpdateCollectionDetail' => [ 'type' => 'structure', 'members' => [ 'arn' => [ 'shape' => 'String', ], 'createdDate' => [ 'shape' => 'Long', ], 'description' => [ 'shape' => 'String', ], 'id' => [ 'shape' => 'CollectionId', ], 'lastModifiedDate' => [ 'shape' => 'Long', ], 'name' => [ 'shape' => 'CollectionName', ], 'status' => [ 'shape' => 'CollectionStatus', ], 'type' => [ 'shape' => 'CollectionType', ], ], ], 'UpdateCollectionRequest' => [ 'type' => 'structure', 'required' => [ 'id', ], 'members' => [ 'clientToken' => [ 'shape' => 'ClientToken', 'idempotencyToken' => true, ], 'description' => [ 'shape' => 'UpdateCollectionRequestDescriptionString', ], 'id' => [ 'shape' => 'CollectionId', ], ], ], 'UpdateCollectionRequestDescriptionString' => [ 'type' => 'string', 'max' => 1000, 'min' => 0, ], 'UpdateCollectionResponse' => [ 'type' => 'structure', 'members' => [ 'updateCollectionDetail' => [ 'shape' => 'UpdateCollectionDetail', ], ], ], 'UpdateSecurityConfigRequest' => [ 'type' => 'structure', 'required' => [ 'configVersion', 'id', ], 'members' => [ 'clientToken' => [ 'shape' => 'ClientToken', 'idempotencyToken' => true, ], 'configVersion' => [ 'shape' => 'PolicyVersion', ], 'description' => [ 'shape' => 'ConfigDescription', ], 'id' => [ 'shape' => 'SecurityConfigId', ], 'samlOptions' => [ 'shape' => 'SamlConfigOptions', ], ], ], 'UpdateSecurityConfigResponse' => [ 'type' => 'structure', 'members' => [ 'securityConfigDetail' => [ 'shape' => 'SecurityConfigDetail', ], ], ], 'UpdateSecurityPolicyRequest' => [ 'type' => 'structure', 'required' => [ 'name', 'policyVersion', 'type', ], 'members' => [ 'clientToken' => [ 'shape' => 'ClientToken', 'idempotencyToken' => true, ], 'description' => [ 'shape' => 'PolicyDescription', ], 'name' => [ 'shape' => 'PolicyName', ], 'policy' => [ 'shape' => 'PolicyDocument', ], 'policyVersion' => [ 'shape' => 'PolicyVersion', ], 'type' => [ 'shape' => 'SecurityPolicyType', ], ], ], 'UpdateSecurityPolicyResponse' => [ 'type' => 'structure', 'members' => [ 'securityPolicyDetail' => [ 'shape' => 'SecurityPolicyDetail', ], ], ], 'UpdateVpcEndpointDetail' => [ 'type' => 'structure', 'members' => [ 'id' => [ 'shape' => 'VpcEndpointId', ], 'lastModifiedDate' => [ 'shape' => 'Long', ], 'name' => [ 'shape' => 'VpcEndpointName', ], 'securityGroupIds' => [ 'shape' => 'SecurityGroupIds', ], 'status' => [ 'shape' => 'VpcEndpointStatus', ], 'subnetIds' => [ 'shape' => 'SubnetIds', ], ], ], 'UpdateVpcEndpointRequest' => [ 'type' => 'structure', 'required' => [ 'id', ], 'members' => [ 'addSecurityGroupIds' => [ 'shape' => 'SecurityGroupIds', ], 'addSubnetIds' => [ 'shape' => 'SubnetIds', ], 'clientToken' => [ 'shape' => 'ClientToken', 'idempotencyToken' => true, ], 'id' => [ 'shape' => 'VpcEndpointId', ], 'removeSecurityGroupIds' => [ 'shape' => 'SecurityGroupIds', ], 'removeSubnetIds' => [ 'shape' => 'SubnetIds', ], ], ], 'UpdateVpcEndpointResponse' => [ 'type' => 'structure', 'members' => [ 'UpdateVpcEndpointDetail' => [ 'shape' => 'UpdateVpcEndpointDetail', ], ], ], 'ValidationException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'VpcEndpointDetail' => [ 'type' => 'structure', 'members' => [ 'createdDate' => [ 'shape' => 'Long', ], 'id' => [ 'shape' => 'VpcEndpointId', ], 'name' => [ 'shape' => 'VpcEndpointName', ], 'securityGroupIds' => [ 'shape' => 'SecurityGroupIds', ], 'status' => [ 'shape' => 'VpcEndpointStatus', ], 'subnetIds' => [ 'shape' => 'SubnetIds', ], 'vpcId' => [ 'shape' => 'VpcId', ], ], ], 'VpcEndpointDetails' => [ 'type' => 'list', 'member' => [ 'shape' => 'VpcEndpointDetail', ], ], 'VpcEndpointErrorDetail' => [ 'type' => 'structure', 'members' => [ 'errorCode' => [ 'shape' => 'String', ], 'errorMessage' => [ 'shape' => 'String', ], 'id' => [ 'shape' => 'VpcEndpointId', ], ], ], 'VpcEndpointErrorDetails' => [ 'type' => 'list', 'member' => [ 'shape' => 'VpcEndpointErrorDetail', ], ], 'VpcEndpointFilters' => [ 'type' => 'structure', 'members' => [ 'status' => [ 'shape' => 'VpcEndpointStatus', ], ], ], 'VpcEndpointId' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^vpce-[0-9a-z]*$', ], 'VpcEndpointIds' => [ 'type' => 'list', 'member' => [ 'shape' => 'VpcEndpointId', ], 'min' => 1, ], 'VpcEndpointName' => [ 'type' => 'string', 'max' => 32, 'min' => 3, 'pattern' => '^[a-z][a-z0-9-]+$', ], 'VpcEndpointStatus' => [ 'type' => 'string', 'enum' => [ 'PENDING', 'DELETING', 'ACTIVE', 'FAILED', ], ], 'VpcEndpointSummaries' => [ 'type' => 'list', 'member' => [ 'shape' => 'VpcEndpointSummary', ], ], 'VpcEndpointSummary' => [ 'type' => 'structure', 'members' => [ 'id' => [ 'shape' => 'VpcEndpointId', ], 'name' => [ 'shape' => 'VpcEndpointName', ], 'status' => [ 'shape' => 'VpcEndpointStatus', ], ], ], 'VpcId' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^vpc-[0-9a-z]*$', ], 'samlGroupAttribute' => [ 'type' => 'string', 'max' => 2048, 'min' => 1, 'pattern' => '[\\w+=,.@-]+', ], 'samlMetadata' => [ 'type' => 'string', 'max' => 51200, 'min' => 1, 'pattern' => '[\\u0009\\u000A\\u000D\\u0020-\\u007E\\u00A1-\\u00FF]+', ], 'samlUserAttribute' => [ 'type' => 'string', 'max' => 2048, 'min' => 1, 'pattern' => '[\\w+=,.@-]+', ], ],];
