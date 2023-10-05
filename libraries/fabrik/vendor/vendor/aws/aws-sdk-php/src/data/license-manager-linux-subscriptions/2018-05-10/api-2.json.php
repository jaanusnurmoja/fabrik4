<?php
// This file was auto-generated from sdk-root/src/data/license-manager-linux-subscriptions/2018-05-10/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2018-05-10', 'endpointPrefix' => 'license-manager-linux-subscriptions', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceFullName' => 'AWS License Manager Linux Subscriptions', 'serviceId' => 'License Manager Linux Subscriptions', 'signatureVersion' => 'v4', 'signingName' => 'license-manager-linux-subscriptions', 'uid' => 'license-manager-linux-subscriptions-2018-05-10', ], 'operations' => [ 'GetServiceSettings' => [ 'name' => 'GetServiceSettings', 'http' => [ 'method' => 'POST', 'requestUri' => '/subscription/GetServiceSettings', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetServiceSettingsRequest', ], 'output' => [ 'shape' => 'GetServiceSettingsResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], 'idempotent' => true, ], 'ListLinuxSubscriptionInstances' => [ 'name' => 'ListLinuxSubscriptionInstances', 'http' => [ 'method' => 'POST', 'requestUri' => '/subscription/ListLinuxSubscriptionInstances', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListLinuxSubscriptionInstancesRequest', ], 'output' => [ 'shape' => 'ListLinuxSubscriptionInstancesResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], 'idempotent' => true, ], 'ListLinuxSubscriptions' => [ 'name' => 'ListLinuxSubscriptions', 'http' => [ 'method' => 'POST', 'requestUri' => '/subscription/ListLinuxSubscriptions', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListLinuxSubscriptionsRequest', ], 'output' => [ 'shape' => 'ListLinuxSubscriptionsResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], 'idempotent' => true, ], 'UpdateServiceSettings' => [ 'name' => 'UpdateServiceSettings', 'http' => [ 'method' => 'POST', 'requestUri' => '/subscription/UpdateServiceSettings', 'responseCode' => 200, ], 'input' => [ 'shape' => 'UpdateServiceSettingsRequest', ], 'output' => [ 'shape' => 'UpdateServiceSettingsResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], 'idempotent' => true, ], ], 'shapes' => [ 'Boolean' => [ 'type' => 'boolean', 'box' => true, ], 'BoxInteger' => [ 'type' => 'integer', 'box' => true, ], 'BoxLong' => [ 'type' => 'long', 'box' => true, ], 'Filter' => [ 'type' => 'structure', 'members' => [ 'Name' => [ 'shape' => 'String', ], 'Operator' => [ 'shape' => 'Operator', ], 'Values' => [ 'shape' => 'StringList', ], ], ], 'FilterList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Filter', ], ], 'GetServiceSettingsRequest' => [ 'type' => 'structure', 'members' => [], ], 'GetServiceSettingsResponse' => [ 'type' => 'structure', 'members' => [ 'HomeRegions' => [ 'shape' => 'StringList', ], 'LinuxSubscriptionsDiscovery' => [ 'shape' => 'LinuxSubscriptionsDiscovery', ], 'LinuxSubscriptionsDiscoverySettings' => [ 'shape' => 'LinuxSubscriptionsDiscoverySettings', ], 'Status' => [ 'shape' => 'Status', ], 'StatusMessage' => [ 'shape' => 'StringMap', ], ], ], 'Instance' => [ 'type' => 'structure', 'members' => [ 'AccountID' => [ 'shape' => 'String', ], 'AmiId' => [ 'shape' => 'String', ], 'InstanceID' => [ 'shape' => 'String', ], 'InstanceType' => [ 'shape' => 'String', ], 'LastUpdatedTime' => [ 'shape' => 'String', ], 'ProductCode' => [ 'shape' => 'ProductCodeList', ], 'Region' => [ 'shape' => 'String', ], 'Status' => [ 'shape' => 'String', ], 'SubscriptionName' => [ 'shape' => 'String', ], 'UsageOperation' => [ 'shape' => 'String', ], ], ], 'InstanceList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Instance', ], ], 'InternalServerException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'exception' => true, 'fault' => true, ], 'LinuxSubscriptionsDiscovery' => [ 'type' => 'string', 'enum' => [ 'Enabled', 'Disabled', ], ], 'LinuxSubscriptionsDiscoverySettings' => [ 'type' => 'structure', 'required' => [ 'OrganizationIntegration', 'SourceRegions', ], 'members' => [ 'OrganizationIntegration' => [ 'shape' => 'OrganizationIntegration', ], 'SourceRegions' => [ 'shape' => 'StringList', ], ], ], 'ListLinuxSubscriptionInstancesRequest' => [ 'type' => 'structure', 'members' => [ 'Filters' => [ 'shape' => 'FilterList', ], 'MaxResults' => [ 'shape' => 'BoxInteger', ], 'NextToken' => [ 'shape' => 'ListLinuxSubscriptionInstancesRequestNextTokenString', ], ], ], 'ListLinuxSubscriptionInstancesRequestNextTokenString' => [ 'type' => 'string', 'max' => 16384, 'min' => 1, ], 'ListLinuxSubscriptionInstancesResponse' => [ 'type' => 'structure', 'members' => [ 'Instances' => [ 'shape' => 'InstanceList', ], 'NextToken' => [ 'shape' => 'String', ], ], ], 'ListLinuxSubscriptionsRequest' => [ 'type' => 'structure', 'members' => [ 'Filters' => [ 'shape' => 'FilterList', ], 'MaxResults' => [ 'shape' => 'BoxInteger', ], 'NextToken' => [ 'shape' => 'ListLinuxSubscriptionsRequestNextTokenString', ], ], ], 'ListLinuxSubscriptionsRequestNextTokenString' => [ 'type' => 'string', 'max' => 16384, 'min' => 1, ], 'ListLinuxSubscriptionsResponse' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'String', ], 'Subscriptions' => [ 'shape' => 'SubscriptionList', ], ], ], 'Operator' => [ 'type' => 'string', 'enum' => [ 'Equal', 'NotEqual', 'Contains', ], 'max' => 20, 'min' => 1, ], 'OrganizationIntegration' => [ 'type' => 'string', 'enum' => [ 'Enabled', 'Disabled', ], ], 'ProductCodeList' => [ 'type' => 'list', 'member' => [ 'shape' => 'String', ], ], 'Status' => [ 'type' => 'string', 'enum' => [ 'InProgress', 'Completed', 'Successful', 'Failed', ], ], 'String' => [ 'type' => 'string', ], 'StringList' => [ 'type' => 'list', 'member' => [ 'shape' => 'StringListMemberString', ], 'max' => 100, 'min' => 1, ], 'StringListMemberString' => [ 'type' => 'string', 'max' => 100, 'min' => 1, ], 'StringMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'String', ], 'value' => [ 'shape' => 'String', ], ], 'Subscription' => [ 'type' => 'structure', 'members' => [ 'InstanceCount' => [ 'shape' => 'BoxLong', ], 'Name' => [ 'shape' => 'String', ], 'Type' => [ 'shape' => 'String', ], ], ], 'SubscriptionList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Subscription', ], ], 'ThrottlingException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'UpdateServiceSettingsRequest' => [ 'type' => 'structure', 'required' => [ 'LinuxSubscriptionsDiscovery', 'LinuxSubscriptionsDiscoverySettings', ], 'members' => [ 'AllowUpdate' => [ 'shape' => 'Boolean', ], 'LinuxSubscriptionsDiscovery' => [ 'shape' => 'LinuxSubscriptionsDiscovery', ], 'LinuxSubscriptionsDiscoverySettings' => [ 'shape' => 'LinuxSubscriptionsDiscoverySettings', ], ], ], 'UpdateServiceSettingsResponse' => [ 'type' => 'structure', 'members' => [ 'HomeRegions' => [ 'shape' => 'StringList', ], 'LinuxSubscriptionsDiscovery' => [ 'shape' => 'LinuxSubscriptionsDiscovery', ], 'LinuxSubscriptionsDiscoverySettings' => [ 'shape' => 'LinuxSubscriptionsDiscoverySettings', ], 'Status' => [ 'shape' => 'Status', ], 'StatusMessage' => [ 'shape' => 'StringMap', ], ], ], 'ValidationException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'exception' => true, ], ],];
