<?php
// This file was auto-generated from sdk-root/src/data/servicediscovery/2017-03-14/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2017-03-14', 'endpointPrefix' => 'servicediscovery', 'jsonVersion' => '1.1', 'protocol' => 'json', 'serviceAbbreviation' => 'ServiceDiscovery', 'serviceFullName' => 'AWS Cloud Map', 'serviceId' => 'ServiceDiscovery', 'signatureVersion' => 'v4', 'targetPrefix' => 'Route53AutoNaming_v20170314', 'uid' => 'servicediscovery-2017-03-14', ], 'operations' => [ 'CreateHttpNamespace' => [ 'name' => 'CreateHttpNamespace', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateHttpNamespaceRequest', ], 'output' => [ 'shape' => 'CreateHttpNamespaceResponse', ], 'errors' => [ [ 'shape' => 'InvalidInput', ], [ 'shape' => 'NamespaceAlreadyExists', ], [ 'shape' => 'ResourceLimitExceeded', ], [ 'shape' => 'DuplicateRequest', ], [ 'shape' => 'TooManyTagsException', ], ], ], 'CreatePrivateDnsNamespace' => [ 'name' => 'CreatePrivateDnsNamespace', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreatePrivateDnsNamespaceRequest', ], 'output' => [ 'shape' => 'CreatePrivateDnsNamespaceResponse', ], 'errors' => [ [ 'shape' => 'InvalidInput', ], [ 'shape' => 'NamespaceAlreadyExists', ], [ 'shape' => 'ResourceLimitExceeded', ], [ 'shape' => 'DuplicateRequest', ], [ 'shape' => 'TooManyTagsException', ], ], ], 'CreatePublicDnsNamespace' => [ 'name' => 'CreatePublicDnsNamespace', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreatePublicDnsNamespaceRequest', ], 'output' => [ 'shape' => 'CreatePublicDnsNamespaceResponse', ], 'errors' => [ [ 'shape' => 'InvalidInput', ], [ 'shape' => 'NamespaceAlreadyExists', ], [ 'shape' => 'ResourceLimitExceeded', ], [ 'shape' => 'DuplicateRequest', ], [ 'shape' => 'TooManyTagsException', ], ], ], 'CreateService' => [ 'name' => 'CreateService', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateServiceRequest', ], 'output' => [ 'shape' => 'CreateServiceResponse', ], 'errors' => [ [ 'shape' => 'InvalidInput', ], [ 'shape' => 'ResourceLimitExceeded', ], [ 'shape' => 'NamespaceNotFound', ], [ 'shape' => 'ServiceAlreadyExists', ], [ 'shape' => 'TooManyTagsException', ], ], ], 'DeleteNamespace' => [ 'name' => 'DeleteNamespace', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteNamespaceRequest', ], 'output' => [ 'shape' => 'DeleteNamespaceResponse', ], 'errors' => [ [ 'shape' => 'InvalidInput', ], [ 'shape' => 'NamespaceNotFound', ], [ 'shape' => 'ResourceInUse', ], [ 'shape' => 'DuplicateRequest', ], ], ], 'DeleteService' => [ 'name' => 'DeleteService', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteServiceRequest', ], 'output' => [ 'shape' => 'DeleteServiceResponse', ], 'errors' => [ [ 'shape' => 'InvalidInput', ], [ 'shape' => 'ServiceNotFound', ], [ 'shape' => 'ResourceInUse', ], ], ], 'DeregisterInstance' => [ 'name' => 'DeregisterInstance', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeregisterInstanceRequest', ], 'output' => [ 'shape' => 'DeregisterInstanceResponse', ], 'errors' => [ [ 'shape' => 'DuplicateRequest', ], [ 'shape' => 'InvalidInput', ], [ 'shape' => 'InstanceNotFound', ], [ 'shape' => 'ResourceInUse', ], [ 'shape' => 'ServiceNotFound', ], ], ], 'DiscoverInstances' => [ 'name' => 'DiscoverInstances', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DiscoverInstancesRequest', ], 'output' => [ 'shape' => 'DiscoverInstancesResponse', ], 'errors' => [ [ 'shape' => 'ServiceNotFound', ], [ 'shape' => 'NamespaceNotFound', ], [ 'shape' => 'InvalidInput', ], [ 'shape' => 'RequestLimitExceeded', ], ], 'endpoint' => [ 'hostPrefix' => 'data-', ], ], 'DiscoverInstancesRevision' => [ 'name' => 'DiscoverInstancesRevision', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DiscoverInstancesRevisionRequest', ], 'output' => [ 'shape' => 'DiscoverInstancesRevisionResponse', ], 'errors' => [ [ 'shape' => 'ServiceNotFound', ], [ 'shape' => 'NamespaceNotFound', ], [ 'shape' => 'InvalidInput', ], [ 'shape' => 'RequestLimitExceeded', ], ], 'endpoint' => [ 'hostPrefix' => 'data-', ], ], 'GetInstance' => [ 'name' => 'GetInstance', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetInstanceRequest', ], 'output' => [ 'shape' => 'GetInstanceResponse', ], 'errors' => [ [ 'shape' => 'InstanceNotFound', ], [ 'shape' => 'InvalidInput', ], [ 'shape' => 'ServiceNotFound', ], ], ], 'GetInstancesHealthStatus' => [ 'name' => 'GetInstancesHealthStatus', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetInstancesHealthStatusRequest', ], 'output' => [ 'shape' => 'GetInstancesHealthStatusResponse', ], 'errors' => [ [ 'shape' => 'InstanceNotFound', ], [ 'shape' => 'InvalidInput', ], [ 'shape' => 'ServiceNotFound', ], ], ], 'GetNamespace' => [ 'name' => 'GetNamespace', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetNamespaceRequest', ], 'output' => [ 'shape' => 'GetNamespaceResponse', ], 'errors' => [ [ 'shape' => 'InvalidInput', ], [ 'shape' => 'NamespaceNotFound', ], ], ], 'GetOperation' => [ 'name' => 'GetOperation', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetOperationRequest', ], 'output' => [ 'shape' => 'GetOperationResponse', ], 'errors' => [ [ 'shape' => 'InvalidInput', ], [ 'shape' => 'OperationNotFound', ], ], ], 'GetService' => [ 'name' => 'GetService', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetServiceRequest', ], 'output' => [ 'shape' => 'GetServiceResponse', ], 'errors' => [ [ 'shape' => 'InvalidInput', ], [ 'shape' => 'ServiceNotFound', ], ], ], 'ListInstances' => [ 'name' => 'ListInstances', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListInstancesRequest', ], 'output' => [ 'shape' => 'ListInstancesResponse', ], 'errors' => [ [ 'shape' => 'ServiceNotFound', ], [ 'shape' => 'InvalidInput', ], ], ], 'ListNamespaces' => [ 'name' => 'ListNamespaces', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListNamespacesRequest', ], 'output' => [ 'shape' => 'ListNamespacesResponse', ], 'errors' => [ [ 'shape' => 'InvalidInput', ], ], ], 'ListOperations' => [ 'name' => 'ListOperations', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListOperationsRequest', ], 'output' => [ 'shape' => 'ListOperationsResponse', ], 'errors' => [ [ 'shape' => 'InvalidInput', ], ], ], 'ListServices' => [ 'name' => 'ListServices', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListServicesRequest', ], 'output' => [ 'shape' => 'ListServicesResponse', ], 'errors' => [ [ 'shape' => 'InvalidInput', ], ], ], 'ListTagsForResource' => [ 'name' => 'ListTagsForResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListTagsForResourceRequest', ], 'output' => [ 'shape' => 'ListTagsForResourceResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidInput', ], ], ], 'RegisterInstance' => [ 'name' => 'RegisterInstance', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'RegisterInstanceRequest', ], 'output' => [ 'shape' => 'RegisterInstanceResponse', ], 'errors' => [ [ 'shape' => 'DuplicateRequest', ], [ 'shape' => 'InvalidInput', ], [ 'shape' => 'ResourceInUse', ], [ 'shape' => 'ResourceLimitExceeded', ], [ 'shape' => 'ServiceNotFound', ], ], ], 'TagResource' => [ 'name' => 'TagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'TagResourceRequest', ], 'output' => [ 'shape' => 'TagResourceResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyTagsException', ], [ 'shape' => 'InvalidInput', ], ], ], 'UntagResource' => [ 'name' => 'UntagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UntagResourceRequest', ], 'output' => [ 'shape' => 'UntagResourceResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidInput', ], ], ], 'UpdateHttpNamespace' => [ 'name' => 'UpdateHttpNamespace', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateHttpNamespaceRequest', ], 'output' => [ 'shape' => 'UpdateHttpNamespaceResponse', ], 'errors' => [ [ 'shape' => 'InvalidInput', ], [ 'shape' => 'NamespaceNotFound', ], [ 'shape' => 'ResourceInUse', ], [ 'shape' => 'DuplicateRequest', ], ], ], 'UpdateInstanceCustomHealthStatus' => [ 'name' => 'UpdateInstanceCustomHealthStatus', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateInstanceCustomHealthStatusRequest', ], 'errors' => [ [ 'shape' => 'InstanceNotFound', ], [ 'shape' => 'ServiceNotFound', ], [ 'shape' => 'CustomHealthNotFound', ], [ 'shape' => 'InvalidInput', ], ], ], 'UpdatePrivateDnsNamespace' => [ 'name' => 'UpdatePrivateDnsNamespace', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdatePrivateDnsNamespaceRequest', ], 'output' => [ 'shape' => 'UpdatePrivateDnsNamespaceResponse', ], 'errors' => [ [ 'shape' => 'InvalidInput', ], [ 'shape' => 'NamespaceNotFound', ], [ 'shape' => 'ResourceInUse', ], [ 'shape' => 'DuplicateRequest', ], ], ], 'UpdatePublicDnsNamespace' => [ 'name' => 'UpdatePublicDnsNamespace', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdatePublicDnsNamespaceRequest', ], 'output' => [ 'shape' => 'UpdatePublicDnsNamespaceResponse', ], 'errors' => [ [ 'shape' => 'InvalidInput', ], [ 'shape' => 'NamespaceNotFound', ], [ 'shape' => 'ResourceInUse', ], [ 'shape' => 'DuplicateRequest', ], ], ], 'UpdateService' => [ 'name' => 'UpdateService', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateServiceRequest', ], 'output' => [ 'shape' => 'UpdateServiceResponse', ], 'errors' => [ [ 'shape' => 'DuplicateRequest', ], [ 'shape' => 'InvalidInput', ], [ 'shape' => 'ServiceNotFound', ], ], ], ], 'shapes' => [ 'AmazonResourceName' => [ 'type' => 'string', 'max' => 1011, 'min' => 1, ], 'Arn' => [ 'type' => 'string', 'max' => 255, ], 'AttrKey' => [ 'type' => 'string', 'max' => 255, 'pattern' => '^[a-zA-Z0-9!-~]+$', ], 'AttrValue' => [ 'type' => 'string', 'max' => 1024, 'pattern' => '^([a-zA-Z0-9!-~][ \\ta-zA-Z0-9!-~]*){0,1}[a-zA-Z0-9!-~]{0,1}$', ], 'Attributes' => [ 'type' => 'map', 'key' => [ 'shape' => 'AttrKey', ], 'value' => [ 'shape' => 'AttrValue', ], ], 'Code' => [ 'type' => 'string', ], 'CreateHttpNamespaceRequest' => [ 'type' => 'structure', 'required' => [ 'Name', ], 'members' => [ 'Name' => [ 'shape' => 'NamespaceNameHttp', ], 'CreatorRequestId' => [ 'shape' => 'ResourceId', 'idempotencyToken' => true, ], 'Description' => [ 'shape' => 'ResourceDescription', ], 'Tags' => [ 'shape' => 'TagList', ], ], ], 'CreateHttpNamespaceResponse' => [ 'type' => 'structure', 'members' => [ 'OperationId' => [ 'shape' => 'OperationId', ], ], ], 'CreatePrivateDnsNamespaceRequest' => [ 'type' => 'structure', 'required' => [ 'Name', 'Vpc', ], 'members' => [ 'Name' => [ 'shape' => 'NamespaceNamePrivate', ], 'CreatorRequestId' => [ 'shape' => 'ResourceId', 'idempotencyToken' => true, ], 'Description' => [ 'shape' => 'ResourceDescription', ], 'Vpc' => [ 'shape' => 'ResourceId', ], 'Tags' => [ 'shape' => 'TagList', ], 'Properties' => [ 'shape' => 'PrivateDnsNamespaceProperties', ], ], ], 'CreatePrivateDnsNamespaceResponse' => [ 'type' => 'structure', 'members' => [ 'OperationId' => [ 'shape' => 'OperationId', ], ], ], 'CreatePublicDnsNamespaceRequest' => [ 'type' => 'structure', 'required' => [ 'Name', ], 'members' => [ 'Name' => [ 'shape' => 'NamespaceNamePublic', ], 'CreatorRequestId' => [ 'shape' => 'ResourceId', 'idempotencyToken' => true, ], 'Description' => [ 'shape' => 'ResourceDescription', ], 'Tags' => [ 'shape' => 'TagList', ], 'Properties' => [ 'shape' => 'PublicDnsNamespaceProperties', ], ], ], 'CreatePublicDnsNamespaceResponse' => [ 'type' => 'structure', 'members' => [ 'OperationId' => [ 'shape' => 'OperationId', ], ], ], 'CreateServiceRequest' => [ 'type' => 'structure', 'required' => [ 'Name', ], 'members' => [ 'Name' => [ 'shape' => 'ServiceName', ], 'NamespaceId' => [ 'shape' => 'ResourceId', ], 'CreatorRequestId' => [ 'shape' => 'ResourceId', 'idempotencyToken' => true, ], 'Description' => [ 'shape' => 'ResourceDescription', ], 'DnsConfig' => [ 'shape' => 'DnsConfig', ], 'HealthCheckConfig' => [ 'shape' => 'HealthCheckConfig', ], 'HealthCheckCustomConfig' => [ 'shape' => 'HealthCheckCustomConfig', ], 'Tags' => [ 'shape' => 'TagList', ], 'Type' => [ 'shape' => 'ServiceTypeOption', ], ], ], 'CreateServiceResponse' => [ 'type' => 'structure', 'members' => [ 'Service' => [ 'shape' => 'Service', ], ], ], 'CustomHealthNotFound' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'CustomHealthStatus' => [ 'type' => 'string', 'enum' => [ 'HEALTHY', 'UNHEALTHY', ], ], 'DeleteNamespaceRequest' => [ 'type' => 'structure', 'required' => [ 'Id', ], 'members' => [ 'Id' => [ 'shape' => 'ResourceId', ], ], ], 'DeleteNamespaceResponse' => [ 'type' => 'structure', 'members' => [ 'OperationId' => [ 'shape' => 'OperationId', ], ], ], 'DeleteServiceRequest' => [ 'type' => 'structure', 'required' => [ 'Id', ], 'members' => [ 'Id' => [ 'shape' => 'ResourceId', ], ], ], 'DeleteServiceResponse' => [ 'type' => 'structure', 'members' => [], ], 'DeregisterInstanceRequest' => [ 'type' => 'structure', 'required' => [ 'ServiceId', 'InstanceId', ], 'members' => [ 'ServiceId' => [ 'shape' => 'ResourceId', ], 'InstanceId' => [ 'shape' => 'ResourceId', ], ], ], 'DeregisterInstanceResponse' => [ 'type' => 'structure', 'members' => [ 'OperationId' => [ 'shape' => 'OperationId', ], ], ], 'DiscoverInstancesRequest' => [ 'type' => 'structure', 'required' => [ 'NamespaceName', 'ServiceName', ], 'members' => [ 'NamespaceName' => [ 'shape' => 'NamespaceName', ], 'ServiceName' => [ 'shape' => 'ServiceName', ], 'MaxResults' => [ 'shape' => 'DiscoverMaxResults', ], 'QueryParameters' => [ 'shape' => 'Attributes', ], 'OptionalParameters' => [ 'shape' => 'Attributes', ], 'HealthStatus' => [ 'shape' => 'HealthStatusFilter', ], ], ], 'DiscoverInstancesResponse' => [ 'type' => 'structure', 'members' => [ 'Instances' => [ 'shape' => 'HttpInstanceSummaryList', ], 'InstancesRevision' => [ 'shape' => 'Revision', ], ], ], 'DiscoverInstancesRevisionRequest' => [ 'type' => 'structure', 'required' => [ 'NamespaceName', 'ServiceName', ], 'members' => [ 'NamespaceName' => [ 'shape' => 'NamespaceName', ], 'ServiceName' => [ 'shape' => 'ServiceName', ], ], ], 'DiscoverInstancesRevisionResponse' => [ 'type' => 'structure', 'members' => [ 'InstancesRevision' => [ 'shape' => 'Revision', ], ], ], 'DiscoverMaxResults' => [ 'type' => 'integer', 'max' => 1000, 'min' => 1, ], 'DnsConfig' => [ 'type' => 'structure', 'required' => [ 'DnsRecords', ], 'members' => [ 'NamespaceId' => [ 'shape' => 'ResourceId', 'deprecated' => true, 'deprecatedMessage' => 'Top level attribute in request should be used to reference namespace-id', ], 'RoutingPolicy' => [ 'shape' => 'RoutingPolicy', ], 'DnsRecords' => [ 'shape' => 'DnsRecordList', ], ], ], 'DnsConfigChange' => [ 'type' => 'structure', 'required' => [ 'DnsRecords', ], 'members' => [ 'DnsRecords' => [ 'shape' => 'DnsRecordList', ], ], ], 'DnsProperties' => [ 'type' => 'structure', 'members' => [ 'HostedZoneId' => [ 'shape' => 'ResourceId', ], 'SOA' => [ 'shape' => 'SOA', ], ], ], 'DnsRecord' => [ 'type' => 'structure', 'required' => [ 'Type', 'TTL', ], 'members' => [ 'Type' => [ 'shape' => 'RecordType', ], 'TTL' => [ 'shape' => 'RecordTTL', ], ], ], 'DnsRecordList' => [ 'type' => 'list', 'member' => [ 'shape' => 'DnsRecord', ], ], 'DuplicateRequest' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], 'DuplicateOperationId' => [ 'shape' => 'ResourceId', ], ], 'exception' => true, ], 'ErrorMessage' => [ 'type' => 'string', ], 'FailureThreshold' => [ 'type' => 'integer', 'max' => 10, 'min' => 1, ], 'FilterCondition' => [ 'type' => 'string', 'enum' => [ 'EQ', 'IN', 'BETWEEN', 'BEGINS_WITH', ], ], 'FilterValue' => [ 'type' => 'string', 'max' => 255, 'min' => 1, ], 'FilterValues' => [ 'type' => 'list', 'member' => [ 'shape' => 'FilterValue', ], ], 'GetInstanceRequest' => [ 'type' => 'structure', 'required' => [ 'ServiceId', 'InstanceId', ], 'members' => [ 'ServiceId' => [ 'shape' => 'ResourceId', ], 'InstanceId' => [ 'shape' => 'ResourceId', ], ], ], 'GetInstanceResponse' => [ 'type' => 'structure', 'members' => [ 'Instance' => [ 'shape' => 'Instance', ], ], ], 'GetInstancesHealthStatusRequest' => [ 'type' => 'structure', 'required' => [ 'ServiceId', ], 'members' => [ 'ServiceId' => [ 'shape' => 'ResourceId', ], 'Instances' => [ 'shape' => 'InstanceIdList', ], 'MaxResults' => [ 'shape' => 'MaxResults', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'GetInstancesHealthStatusResponse' => [ 'type' => 'structure', 'members' => [ 'Status' => [ 'shape' => 'InstanceHealthStatusMap', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'GetNamespaceRequest' => [ 'type' => 'structure', 'required' => [ 'Id', ], 'members' => [ 'Id' => [ 'shape' => 'ResourceId', ], ], ], 'GetNamespaceResponse' => [ 'type' => 'structure', 'members' => [ 'Namespace' => [ 'shape' => 'Namespace', ], ], ], 'GetOperationRequest' => [ 'type' => 'structure', 'required' => [ 'OperationId', ], 'members' => [ 'OperationId' => [ 'shape' => 'ResourceId', ], ], ], 'GetOperationResponse' => [ 'type' => 'structure', 'members' => [ 'Operation' => [ 'shape' => 'Operation', ], ], ], 'GetServiceRequest' => [ 'type' => 'structure', 'required' => [ 'Id', ], 'members' => [ 'Id' => [ 'shape' => 'ResourceId', ], ], ], 'GetServiceResponse' => [ 'type' => 'structure', 'members' => [ 'Service' => [ 'shape' => 'Service', ], ], ], 'HealthCheckConfig' => [ 'type' => 'structure', 'required' => [ 'Type', ], 'members' => [ 'Type' => [ 'shape' => 'HealthCheckType', ], 'ResourcePath' => [ 'shape' => 'ResourcePath', ], 'FailureThreshold' => [ 'shape' => 'FailureThreshold', ], ], ], 'HealthCheckCustomConfig' => [ 'type' => 'structure', 'members' => [ 'FailureThreshold' => [ 'shape' => 'FailureThreshold', 'deprecated' => true, 'deprecatedMessage' => 'Configurable FailureThreshold of HealthCheckCustomConfig is deprecated. It will always have value 1.', ], ], ], 'HealthCheckType' => [ 'type' => 'string', 'enum' => [ 'HTTP', 'HTTPS', 'TCP', ], ], 'HealthStatus' => [ 'type' => 'string', 'enum' => [ 'HEALTHY', 'UNHEALTHY', 'UNKNOWN', ], ], 'HealthStatusFilter' => [ 'type' => 'string', 'enum' => [ 'HEALTHY', 'UNHEALTHY', 'ALL', 'HEALTHY_OR_ELSE_ALL', ], ], 'HttpInstanceSummary' => [ 'type' => 'structure', 'members' => [ 'InstanceId' => [ 'shape' => 'ResourceId', ], 'NamespaceName' => [ 'shape' => 'NamespaceNameHttp', ], 'ServiceName' => [ 'shape' => 'ServiceName', ], 'HealthStatus' => [ 'shape' => 'HealthStatus', ], 'Attributes' => [ 'shape' => 'Attributes', ], ], ], 'HttpInstanceSummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'HttpInstanceSummary', ], ], 'HttpNamespaceChange' => [ 'type' => 'structure', 'required' => [ 'Description', ], 'members' => [ 'Description' => [ 'shape' => 'ResourceDescription', ], ], ], 'HttpProperties' => [ 'type' => 'structure', 'members' => [ 'HttpName' => [ 'shape' => 'NamespaceName', ], ], ], 'Instance' => [ 'type' => 'structure', 'required' => [ 'Id', ], 'members' => [ 'Id' => [ 'shape' => 'ResourceId', ], 'CreatorRequestId' => [ 'shape' => 'ResourceId', ], 'Attributes' => [ 'shape' => 'Attributes', ], ], ], 'InstanceHealthStatusMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'ResourceId', ], 'value' => [ 'shape' => 'HealthStatus', ], ], 'InstanceId' => [ 'type' => 'string', 'max' => 64, 'pattern' => '^[0-9a-zA-Z_/:.@-]+$', ], 'InstanceIdList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ResourceId', ], 'min' => 1, ], 'InstanceNotFound' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'InstanceSummary' => [ 'type' => 'structure', 'members' => [ 'Id' => [ 'shape' => 'ResourceId', ], 'Attributes' => [ 'shape' => 'Attributes', ], ], ], 'InstanceSummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'InstanceSummary', ], ], 'InvalidInput' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'ListInstancesRequest' => [ 'type' => 'structure', 'required' => [ 'ServiceId', ], 'members' => [ 'ServiceId' => [ 'shape' => 'ResourceId', ], 'NextToken' => [ 'shape' => 'NextToken', ], 'MaxResults' => [ 'shape' => 'MaxResults', ], ], ], 'ListInstancesResponse' => [ 'type' => 'structure', 'members' => [ 'Instances' => [ 'shape' => 'InstanceSummaryList', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListNamespacesRequest' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'NextToken', ], 'MaxResults' => [ 'shape' => 'MaxResults', ], 'Filters' => [ 'shape' => 'NamespaceFilters', ], ], ], 'ListNamespacesResponse' => [ 'type' => 'structure', 'members' => [ 'Namespaces' => [ 'shape' => 'NamespaceSummariesList', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListOperationsRequest' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'NextToken', ], 'MaxResults' => [ 'shape' => 'MaxResults', ], 'Filters' => [ 'shape' => 'OperationFilters', ], ], ], 'ListOperationsResponse' => [ 'type' => 'structure', 'members' => [ 'Operations' => [ 'shape' => 'OperationSummaryList', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListServicesRequest' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'NextToken', ], 'MaxResults' => [ 'shape' => 'MaxResults', ], 'Filters' => [ 'shape' => 'ServiceFilters', ], ], ], 'ListServicesResponse' => [ 'type' => 'structure', 'members' => [ 'Services' => [ 'shape' => 'ServiceSummariesList', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListTagsForResourceRequest' => [ 'type' => 'structure', 'required' => [ 'ResourceARN', ], 'members' => [ 'ResourceARN' => [ 'shape' => 'AmazonResourceName', ], ], ], 'ListTagsForResourceResponse' => [ 'type' => 'structure', 'members' => [ 'Tags' => [ 'shape' => 'TagList', ], ], ], 'MaxResults' => [ 'type' => 'integer', 'max' => 100, 'min' => 1, ], 'Message' => [ 'type' => 'string', ], 'Namespace' => [ 'type' => 'structure', 'members' => [ 'Id' => [ 'shape' => 'ResourceId', ], 'Arn' => [ 'shape' => 'Arn', ], 'Name' => [ 'shape' => 'NamespaceName', ], 'Type' => [ 'shape' => 'NamespaceType', ], 'Description' => [ 'shape' => 'ResourceDescription', ], 'ServiceCount' => [ 'shape' => 'ResourceCount', ], 'Properties' => [ 'shape' => 'NamespaceProperties', ], 'CreateDate' => [ 'shape' => 'Timestamp', ], 'CreatorRequestId' => [ 'shape' => 'ResourceId', ], ], ], 'NamespaceAlreadyExists' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], 'CreatorRequestId' => [ 'shape' => 'ResourceId', ], 'NamespaceId' => [ 'shape' => 'ResourceId', ], ], 'exception' => true, ], 'NamespaceFilter' => [ 'type' => 'structure', 'required' => [ 'Name', 'Values', ], 'members' => [ 'Name' => [ 'shape' => 'NamespaceFilterName', ], 'Values' => [ 'shape' => 'FilterValues', ], 'Condition' => [ 'shape' => 'FilterCondition', ], ], ], 'NamespaceFilterName' => [ 'type' => 'string', 'enum' => [ 'TYPE', 'NAME', 'HTTP_NAME', ], ], 'NamespaceFilters' => [ 'type' => 'list', 'member' => [ 'shape' => 'NamespaceFilter', ], ], 'NamespaceName' => [ 'type' => 'string', 'max' => 1024, ], 'NamespaceNameHttp' => [ 'type' => 'string', 'max' => 1024, 'pattern' => '^[!-~]{1,1024}$', ], 'NamespaceNamePrivate' => [ 'type' => 'string', 'max' => 253, 'pattern' => '^[!-~]{1,253}$', ], 'NamespaceNamePublic' => [ 'type' => 'string', 'max' => 253, 'pattern' => '^([a-zA-Z0-9]([a-zA-Z0-9\\-]{0,61}[a-zA-Z0-9])?\\.)+[a-zA-Z0-9]([a-zA-Z0-9\\-]{0,61}[a-zA-Z0-9])?$', ], 'NamespaceNotFound' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'NamespaceProperties' => [ 'type' => 'structure', 'members' => [ 'DnsProperties' => [ 'shape' => 'DnsProperties', ], 'HttpProperties' => [ 'shape' => 'HttpProperties', ], ], ], 'NamespaceSummariesList' => [ 'type' => 'list', 'member' => [ 'shape' => 'NamespaceSummary', ], ], 'NamespaceSummary' => [ 'type' => 'structure', 'members' => [ 'Id' => [ 'shape' => 'ResourceId', ], 'Arn' => [ 'shape' => 'Arn', ], 'Name' => [ 'shape' => 'NamespaceName', ], 'Type' => [ 'shape' => 'NamespaceType', ], 'Description' => [ 'shape' => 'ResourceDescription', ], 'ServiceCount' => [ 'shape' => 'ResourceCount', ], 'Properties' => [ 'shape' => 'NamespaceProperties', ], 'CreateDate' => [ 'shape' => 'Timestamp', ], ], ], 'NamespaceType' => [ 'type' => 'string', 'enum' => [ 'DNS_PUBLIC', 'DNS_PRIVATE', 'HTTP', ], ], 'NextToken' => [ 'type' => 'string', 'max' => 4096, ], 'Operation' => [ 'type' => 'structure', 'members' => [ 'Id' => [ 'shape' => 'OperationId', ], 'Type' => [ 'shape' => 'OperationType', ], 'Status' => [ 'shape' => 'OperationStatus', ], 'ErrorMessage' => [ 'shape' => 'Message', ], 'ErrorCode' => [ 'shape' => 'Code', ], 'CreateDate' => [ 'shape' => 'Timestamp', ], 'UpdateDate' => [ 'shape' => 'Timestamp', ], 'Targets' => [ 'shape' => 'OperationTargetsMap', ], ], ], 'OperationFilter' => [ 'type' => 'structure', 'required' => [ 'Name', 'Values', ], 'members' => [ 'Name' => [ 'shape' => 'OperationFilterName', ], 'Values' => [ 'shape' => 'FilterValues', ], 'Condition' => [ 'shape' => 'FilterCondition', ], ], ], 'OperationFilterName' => [ 'type' => 'string', 'enum' => [ 'NAMESPACE_ID', 'SERVICE_ID', 'STATUS', 'TYPE', 'UPDATE_DATE', ], ], 'OperationFilters' => [ 'type' => 'list', 'member' => [ 'shape' => 'OperationFilter', ], ], 'OperationId' => [ 'type' => 'string', 'max' => 255, ], 'OperationNotFound' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'OperationStatus' => [ 'type' => 'string', 'enum' => [ 'SUBMITTED', 'PENDING', 'SUCCESS', 'FAIL', ], ], 'OperationSummary' => [ 'type' => 'structure', 'members' => [ 'Id' => [ 'shape' => 'OperationId', ], 'Status' => [ 'shape' => 'OperationStatus', ], ], ], 'OperationSummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'OperationSummary', ], ], 'OperationTargetType' => [ 'type' => 'string', 'enum' => [ 'NAMESPACE', 'SERVICE', 'INSTANCE', ], ], 'OperationTargetsMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'OperationTargetType', ], 'value' => [ 'shape' => 'ResourceId', ], ], 'OperationType' => [ 'type' => 'string', 'enum' => [ 'CREATE_NAMESPACE', 'DELETE_NAMESPACE', 'UPDATE_NAMESPACE', 'UPDATE_SERVICE', 'REGISTER_INSTANCE', 'DEREGISTER_INSTANCE', ], ], 'PrivateDnsNamespaceChange' => [ 'type' => 'structure', 'members' => [ 'Description' => [ 'shape' => 'ResourceDescription', ], 'Properties' => [ 'shape' => 'PrivateDnsNamespacePropertiesChange', ], ], ], 'PrivateDnsNamespaceProperties' => [ 'type' => 'structure', 'required' => [ 'DnsProperties', ], 'members' => [ 'DnsProperties' => [ 'shape' => 'PrivateDnsPropertiesMutable', ], ], ], 'PrivateDnsNamespacePropertiesChange' => [ 'type' => 'structure', 'required' => [ 'DnsProperties', ], 'members' => [ 'DnsProperties' => [ 'shape' => 'PrivateDnsPropertiesMutableChange', ], ], ], 'PrivateDnsPropertiesMutable' => [ 'type' => 'structure', 'required' => [ 'SOA', ], 'members' => [ 'SOA' => [ 'shape' => 'SOA', ], ], ], 'PrivateDnsPropertiesMutableChange' => [ 'type' => 'structure', 'required' => [ 'SOA', ], 'members' => [ 'SOA' => [ 'shape' => 'SOAChange', ], ], ], 'PublicDnsNamespaceChange' => [ 'type' => 'structure', 'members' => [ 'Description' => [ 'shape' => 'ResourceDescription', ], 'Properties' => [ 'shape' => 'PublicDnsNamespacePropertiesChange', ], ], ], 'PublicDnsNamespaceProperties' => [ 'type' => 'structure', 'required' => [ 'DnsProperties', ], 'members' => [ 'DnsProperties' => [ 'shape' => 'PublicDnsPropertiesMutable', ], ], ], 'PublicDnsNamespacePropertiesChange' => [ 'type' => 'structure', 'required' => [ 'DnsProperties', ], 'members' => [ 'DnsProperties' => [ 'shape' => 'PublicDnsPropertiesMutableChange', ], ], ], 'PublicDnsPropertiesMutable' => [ 'type' => 'structure', 'required' => [ 'SOA', ], 'members' => [ 'SOA' => [ 'shape' => 'SOA', ], ], ], 'PublicDnsPropertiesMutableChange' => [ 'type' => 'structure', 'required' => [ 'SOA', ], 'members' => [ 'SOA' => [ 'shape' => 'SOAChange', ], ], ], 'RecordTTL' => [ 'type' => 'long', 'max' => 2147483647, 'min' => 0, ], 'RecordType' => [ 'type' => 'string', 'enum' => [ 'SRV', 'A', 'AAAA', 'CNAME', ], ], 'RegisterInstanceRequest' => [ 'type' => 'structure', 'required' => [ 'ServiceId', 'InstanceId', 'Attributes', ], 'members' => [ 'ServiceId' => [ 'shape' => 'ResourceId', ], 'InstanceId' => [ 'shape' => 'InstanceId', ], 'CreatorRequestId' => [ 'shape' => 'ResourceId', 'idempotencyToken' => true, ], 'Attributes' => [ 'shape' => 'Attributes', ], ], ], 'RegisterInstanceResponse' => [ 'type' => 'structure', 'members' => [ 'OperationId' => [ 'shape' => 'OperationId', ], ], ], 'RequestLimitExceeded' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'ResourceCount' => [ 'type' => 'integer', ], 'ResourceDescription' => [ 'type' => 'string', 'max' => 1024, ], 'ResourceId' => [ 'type' => 'string', 'max' => 64, ], 'ResourceInUse' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'ResourceLimitExceeded' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'ResourcePath' => [ 'type' => 'string', 'max' => 255, ], 'Revision' => [ 'type' => 'long', ], 'RoutingPolicy' => [ 'type' => 'string', 'enum' => [ 'MULTIVALUE', 'WEIGHTED', ], ], 'SOA' => [ 'type' => 'structure', 'required' => [ 'TTL', ], 'members' => [ 'TTL' => [ 'shape' => 'RecordTTL', ], ], ], 'SOAChange' => [ 'type' => 'structure', 'required' => [ 'TTL', ], 'members' => [ 'TTL' => [ 'shape' => 'RecordTTL', ], ], ], 'Service' => [ 'type' => 'structure', 'members' => [ 'Id' => [ 'shape' => 'ResourceId', ], 'Arn' => [ 'shape' => 'Arn', ], 'Name' => [ 'shape' => 'ServiceName', ], 'NamespaceId' => [ 'shape' => 'ResourceId', ], 'Description' => [ 'shape' => 'ResourceDescription', ], 'InstanceCount' => [ 'shape' => 'ResourceCount', ], 'DnsConfig' => [ 'shape' => 'DnsConfig', ], 'Type' => [ 'shape' => 'ServiceType', ], 'HealthCheckConfig' => [ 'shape' => 'HealthCheckConfig', ], 'HealthCheckCustomConfig' => [ 'shape' => 'HealthCheckCustomConfig', ], 'CreateDate' => [ 'shape' => 'Timestamp', ], 'CreatorRequestId' => [ 'shape' => 'ResourceId', ], ], ], 'ServiceAlreadyExists' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], 'CreatorRequestId' => [ 'shape' => 'ResourceId', ], 'ServiceId' => [ 'shape' => 'ResourceId', ], ], 'exception' => true, ], 'ServiceChange' => [ 'type' => 'structure', 'members' => [ 'Description' => [ 'shape' => 'ResourceDescription', ], 'DnsConfig' => [ 'shape' => 'DnsConfigChange', ], 'HealthCheckConfig' => [ 'shape' => 'HealthCheckConfig', ], ], ], 'ServiceFilter' => [ 'type' => 'structure', 'required' => [ 'Name', 'Values', ], 'members' => [ 'Name' => [ 'shape' => 'ServiceFilterName', ], 'Values' => [ 'shape' => 'FilterValues', ], 'Condition' => [ 'shape' => 'FilterCondition', ], ], ], 'ServiceFilterName' => [ 'type' => 'string', 'enum' => [ 'NAMESPACE_ID', ], ], 'ServiceFilters' => [ 'type' => 'list', 'member' => [ 'shape' => 'ServiceFilter', ], ], 'ServiceName' => [ 'type' => 'string', 'pattern' => '((?=^.{1,127}$)^([a-zA-Z0-9_][a-zA-Z0-9-_]{0,61}[a-zA-Z0-9_]|[a-zA-Z0-9])(\\.([a-zA-Z0-9_][a-zA-Z0-9-_]{0,61}[a-zA-Z0-9_]|[a-zA-Z0-9]))*$)|(^\\.$)', ], 'ServiceNotFound' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'ServiceSummariesList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ServiceSummary', ], ], 'ServiceSummary' => [ 'type' => 'structure', 'members' => [ 'Id' => [ 'shape' => 'ResourceId', ], 'Arn' => [ 'shape' => 'Arn', ], 'Name' => [ 'shape' => 'ServiceName', ], 'Type' => [ 'shape' => 'ServiceType', ], 'Description' => [ 'shape' => 'ResourceDescription', ], 'InstanceCount' => [ 'shape' => 'ResourceCount', ], 'DnsConfig' => [ 'shape' => 'DnsConfig', ], 'HealthCheckConfig' => [ 'shape' => 'HealthCheckConfig', ], 'HealthCheckCustomConfig' => [ 'shape' => 'HealthCheckCustomConfig', ], 'CreateDate' => [ 'shape' => 'Timestamp', ], ], ], 'ServiceType' => [ 'type' => 'string', 'enum' => [ 'HTTP', 'DNS_HTTP', 'DNS', ], ], 'ServiceTypeOption' => [ 'type' => 'string', 'enum' => [ 'HTTP', ], ], 'Tag' => [ 'type' => 'structure', 'required' => [ 'Key', 'Value', ], 'members' => [ 'Key' => [ 'shape' => 'TagKey', ], 'Value' => [ 'shape' => 'TagValue', ], ], ], 'TagKey' => [ 'type' => 'string', 'max' => 128, 'min' => 1, ], 'TagKeyList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagKey', ], 'max' => 200, 'min' => 0, ], 'TagList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Tag', ], 'max' => 200, 'min' => 0, ], 'TagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'ResourceARN', 'Tags', ], 'members' => [ 'ResourceARN' => [ 'shape' => 'AmazonResourceName', ], 'Tags' => [ 'shape' => 'TagList', ], ], ], 'TagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'TagValue' => [ 'type' => 'string', 'max' => 256, 'min' => 0, ], 'Timestamp' => [ 'type' => 'timestamp', ], 'TooManyTagsException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], 'ResourceName' => [ 'shape' => 'AmazonResourceName', ], ], 'exception' => true, ], 'UntagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'ResourceARN', 'TagKeys', ], 'members' => [ 'ResourceARN' => [ 'shape' => 'AmazonResourceName', ], 'TagKeys' => [ 'shape' => 'TagKeyList', ], ], ], 'UntagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'UpdateHttpNamespaceRequest' => [ 'type' => 'structure', 'required' => [ 'Id', 'Namespace', ], 'members' => [ 'Id' => [ 'shape' => 'ResourceId', ], 'UpdaterRequestId' => [ 'shape' => 'ResourceId', 'idempotencyToken' => true, ], 'Namespace' => [ 'shape' => 'HttpNamespaceChange', ], ], ], 'UpdateHttpNamespaceResponse' => [ 'type' => 'structure', 'members' => [ 'OperationId' => [ 'shape' => 'OperationId', ], ], ], 'UpdateInstanceCustomHealthStatusRequest' => [ 'type' => 'structure', 'required' => [ 'ServiceId', 'InstanceId', 'Status', ], 'members' => [ 'ServiceId' => [ 'shape' => 'ResourceId', ], 'InstanceId' => [ 'shape' => 'ResourceId', ], 'Status' => [ 'shape' => 'CustomHealthStatus', ], ], ], 'UpdatePrivateDnsNamespaceRequest' => [ 'type' => 'structure', 'required' => [ 'Id', 'Namespace', ], 'members' => [ 'Id' => [ 'shape' => 'ResourceId', ], 'UpdaterRequestId' => [ 'shape' => 'ResourceId', 'idempotencyToken' => true, ], 'Namespace' => [ 'shape' => 'PrivateDnsNamespaceChange', ], ], ], 'UpdatePrivateDnsNamespaceResponse' => [ 'type' => 'structure', 'members' => [ 'OperationId' => [ 'shape' => 'OperationId', ], ], ], 'UpdatePublicDnsNamespaceRequest' => [ 'type' => 'structure', 'required' => [ 'Id', 'Namespace', ], 'members' => [ 'Id' => [ 'shape' => 'ResourceId', ], 'UpdaterRequestId' => [ 'shape' => 'ResourceId', 'idempotencyToken' => true, ], 'Namespace' => [ 'shape' => 'PublicDnsNamespaceChange', ], ], ], 'UpdatePublicDnsNamespaceResponse' => [ 'type' => 'structure', 'members' => [ 'OperationId' => [ 'shape' => 'OperationId', ], ], ], 'UpdateServiceRequest' => [ 'type' => 'structure', 'required' => [ 'Id', 'Service', ], 'members' => [ 'Id' => [ 'shape' => 'ResourceId', ], 'Service' => [ 'shape' => 'ServiceChange', ], ], ], 'UpdateServiceResponse' => [ 'type' => 'structure', 'members' => [ 'OperationId' => [ 'shape' => 'OperationId', ], ], ], ],];
