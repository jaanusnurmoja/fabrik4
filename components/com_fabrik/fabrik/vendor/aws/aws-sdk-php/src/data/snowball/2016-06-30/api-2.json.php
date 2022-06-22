<?php
// This file was auto-generated from sdk-root/src/data/snowball/2016-06-30/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2016-06-30', 'endpointPrefix' => 'snowball', 'jsonVersion' => '1.1', 'protocol' => 'json', 'serviceAbbreviation' => 'Amazon Snowball', 'serviceFullName' => 'Amazon Import/Export Snowball', 'serviceId' => 'Snowball', 'signatureVersion' => 'v4', 'targetPrefix' => 'AWSIESnowballJobManagementService', 'uid' => 'snowball-2016-06-30', ], 'operations' => [ 'CancelCluster' => [ 'name' => 'CancelCluster', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CancelClusterRequest', ], 'output' => [ 'shape' => 'CancelClusterResult', ], 'errors' => [ [ 'shape' => 'KMSRequestFailedException', ], [ 'shape' => 'InvalidJobStateException', ], [ 'shape' => 'InvalidResourceException', ], ], ], 'CancelJob' => [ 'name' => 'CancelJob', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CancelJobRequest', ], 'output' => [ 'shape' => 'CancelJobResult', ], 'errors' => [ [ 'shape' => 'InvalidResourceException', ], [ 'shape' => 'InvalidJobStateException', ], [ 'shape' => 'KMSRequestFailedException', ], ], ], 'CreateAddress' => [ 'name' => 'CreateAddress', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateAddressRequest', ], 'output' => [ 'shape' => 'CreateAddressResult', ], 'errors' => [ [ 'shape' => 'InvalidAddressException', ], [ 'shape' => 'UnsupportedAddressException', ], ], ], 'CreateCluster' => [ 'name' => 'CreateCluster', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateClusterRequest', ], 'output' => [ 'shape' => 'CreateClusterResult', ], 'errors' => [ [ 'shape' => 'InvalidResourceException', ], [ 'shape' => 'KMSRequestFailedException', ], [ 'shape' => 'InvalidInputCombinationException', ], [ 'shape' => 'Ec2RequestFailedException', ], ], ], 'CreateJob' => [ 'name' => 'CreateJob', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateJobRequest', ], 'output' => [ 'shape' => 'CreateJobResult', ], 'errors' => [ [ 'shape' => 'InvalidResourceException', ], [ 'shape' => 'KMSRequestFailedException', ], [ 'shape' => 'InvalidInputCombinationException', ], [ 'shape' => 'ClusterLimitExceededException', ], [ 'shape' => 'Ec2RequestFailedException', ], ], ], 'CreateLongTermPricing' => [ 'name' => 'CreateLongTermPricing', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateLongTermPricingRequest', ], 'output' => [ 'shape' => 'CreateLongTermPricingResult', ], 'errors' => [ [ 'shape' => 'InvalidResourceException', ], ], ], 'CreateReturnShippingLabel' => [ 'name' => 'CreateReturnShippingLabel', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateReturnShippingLabelRequest', ], 'output' => [ 'shape' => 'CreateReturnShippingLabelResult', ], 'errors' => [ [ 'shape' => 'InvalidResourceException', ], [ 'shape' => 'InvalidJobStateException', ], [ 'shape' => 'InvalidInputCombinationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ReturnShippingLabelAlreadyExistsException', ], ], ], 'DescribeAddress' => [ 'name' => 'DescribeAddress', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeAddressRequest', ], 'output' => [ 'shape' => 'DescribeAddressResult', ], 'errors' => [ [ 'shape' => 'InvalidResourceException', ], ], ], 'DescribeAddresses' => [ 'name' => 'DescribeAddresses', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeAddressesRequest', ], 'output' => [ 'shape' => 'DescribeAddressesResult', ], 'errors' => [ [ 'shape' => 'InvalidResourceException', ], [ 'shape' => 'InvalidNextTokenException', ], ], ], 'DescribeCluster' => [ 'name' => 'DescribeCluster', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeClusterRequest', ], 'output' => [ 'shape' => 'DescribeClusterResult', ], 'errors' => [ [ 'shape' => 'InvalidResourceException', ], ], ], 'DescribeJob' => [ 'name' => 'DescribeJob', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeJobRequest', ], 'output' => [ 'shape' => 'DescribeJobResult', ], 'errors' => [ [ 'shape' => 'InvalidResourceException', ], ], ], 'DescribeReturnShippingLabel' => [ 'name' => 'DescribeReturnShippingLabel', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeReturnShippingLabelRequest', ], 'output' => [ 'shape' => 'DescribeReturnShippingLabelResult', ], 'errors' => [ [ 'shape' => 'InvalidResourceException', ], [ 'shape' => 'InvalidJobStateException', ], [ 'shape' => 'ConflictException', ], ], ], 'GetJobManifest' => [ 'name' => 'GetJobManifest', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetJobManifestRequest', ], 'output' => [ 'shape' => 'GetJobManifestResult', ], 'errors' => [ [ 'shape' => 'InvalidResourceException', ], [ 'shape' => 'InvalidJobStateException', ], ], ], 'GetJobUnlockCode' => [ 'name' => 'GetJobUnlockCode', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetJobUnlockCodeRequest', ], 'output' => [ 'shape' => 'GetJobUnlockCodeResult', ], 'errors' => [ [ 'shape' => 'InvalidResourceException', ], [ 'shape' => 'InvalidJobStateException', ], ], ], 'GetSnowballUsage' => [ 'name' => 'GetSnowballUsage', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetSnowballUsageRequest', ], 'output' => [ 'shape' => 'GetSnowballUsageResult', ], ], 'GetSoftwareUpdates' => [ 'name' => 'GetSoftwareUpdates', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetSoftwareUpdatesRequest', ], 'output' => [ 'shape' => 'GetSoftwareUpdatesResult', ], 'errors' => [ [ 'shape' => 'InvalidResourceException', ], [ 'shape' => 'InvalidJobStateException', ], ], ], 'ListClusterJobs' => [ 'name' => 'ListClusterJobs', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListClusterJobsRequest', ], 'output' => [ 'shape' => 'ListClusterJobsResult', ], 'errors' => [ [ 'shape' => 'InvalidResourceException', ], [ 'shape' => 'InvalidNextTokenException', ], ], ], 'ListClusters' => [ 'name' => 'ListClusters', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListClustersRequest', ], 'output' => [ 'shape' => 'ListClustersResult', ], 'errors' => [ [ 'shape' => 'InvalidNextTokenException', ], ], ], 'ListCompatibleImages' => [ 'name' => 'ListCompatibleImages', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListCompatibleImagesRequest', ], 'output' => [ 'shape' => 'ListCompatibleImagesResult', ], 'errors' => [ [ 'shape' => 'InvalidNextTokenException', ], [ 'shape' => 'Ec2RequestFailedException', ], ], ], 'ListJobs' => [ 'name' => 'ListJobs', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListJobsRequest', ], 'output' => [ 'shape' => 'ListJobsResult', ], 'errors' => [ [ 'shape' => 'InvalidNextTokenException', ], ], ], 'ListLongTermPricing' => [ 'name' => 'ListLongTermPricing', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListLongTermPricingRequest', ], 'output' => [ 'shape' => 'ListLongTermPricingResult', ], 'errors' => [ [ 'shape' => 'InvalidResourceException', ], [ 'shape' => 'InvalidNextTokenException', ], ], ], 'UpdateCluster' => [ 'name' => 'UpdateCluster', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateClusterRequest', ], 'output' => [ 'shape' => 'UpdateClusterResult', ], 'errors' => [ [ 'shape' => 'InvalidResourceException', ], [ 'shape' => 'InvalidJobStateException', ], [ 'shape' => 'KMSRequestFailedException', ], [ 'shape' => 'InvalidInputCombinationException', ], [ 'shape' => 'Ec2RequestFailedException', ], ], ], 'UpdateJob' => [ 'name' => 'UpdateJob', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateJobRequest', ], 'output' => [ 'shape' => 'UpdateJobResult', ], 'errors' => [ [ 'shape' => 'InvalidResourceException', ], [ 'shape' => 'InvalidJobStateException', ], [ 'shape' => 'KMSRequestFailedException', ], [ 'shape' => 'InvalidInputCombinationException', ], [ 'shape' => 'ClusterLimitExceededException', ], [ 'shape' => 'Ec2RequestFailedException', ], ], ], 'UpdateJobShipmentState' => [ 'name' => 'UpdateJobShipmentState', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateJobShipmentStateRequest', ], 'output' => [ 'shape' => 'UpdateJobShipmentStateResult', ], 'errors' => [ [ 'shape' => 'InvalidResourceException', ], [ 'shape' => 'InvalidJobStateException', ], ], ], 'UpdateLongTermPricing' => [ 'name' => 'UpdateLongTermPricing', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateLongTermPricingRequest', ], 'output' => [ 'shape' => 'UpdateLongTermPricingResult', ], 'errors' => [ [ 'shape' => 'InvalidResourceException', ], ], ], ], 'shapes' => [ 'Address' => [ 'type' => 'structure', 'members' => [ 'AddressId' => [ 'shape' => 'AddressId', ], 'Name' => [ 'shape' => 'String', ], 'Company' => [ 'shape' => 'String', ], 'Street1' => [ 'shape' => 'String', ], 'Street2' => [ 'shape' => 'String', ], 'Street3' => [ 'shape' => 'String', ], 'City' => [ 'shape' => 'String', ], 'StateOrProvince' => [ 'shape' => 'String', ], 'PrefectureOrDistrict' => [ 'shape' => 'String', ], 'Landmark' => [ 'shape' => 'String', ], 'Country' => [ 'shape' => 'String', ], 'PostalCode' => [ 'shape' => 'String', ], 'PhoneNumber' => [ 'shape' => 'String', ], 'IsRestricted' => [ 'shape' => 'Boolean', ], ], ], 'AddressId' => [ 'type' => 'string', 'max' => 40, 'min' => 40, 'pattern' => 'ADID[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}', ], 'AddressList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Address', ], ], 'AmiId' => [ 'type' => 'string', 'max' => 21, 'min' => 12, 'pattern' => '(ami-[0-9a-f]{8})|(ami-[0-9a-f]{17})', ], 'Boolean' => [ 'type' => 'boolean', ], 'CancelClusterRequest' => [ 'type' => 'structure', 'required' => [ 'ClusterId', ], 'members' => [ 'ClusterId' => [ 'shape' => 'ClusterId', ], ], ], 'CancelClusterResult' => [ 'type' => 'structure', 'members' => [], ], 'CancelJobRequest' => [ 'type' => 'structure', 'required' => [ 'JobId', ], 'members' => [ 'JobId' => [ 'shape' => 'JobId', ], ], ], 'CancelJobResult' => [ 'type' => 'structure', 'members' => [], ], 'ClusterId' => [ 'type' => 'string', 'max' => 39, 'min' => 39, 'pattern' => 'CID[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}', ], 'ClusterLimitExceededException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'ClusterListEntry' => [ 'type' => 'structure', 'members' => [ 'ClusterId' => [ 'shape' => 'String', ], 'ClusterState' => [ 'shape' => 'ClusterState', ], 'CreationDate' => [ 'shape' => 'Timestamp', ], 'Description' => [ 'shape' => 'String', ], ], ], 'ClusterListEntryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ClusterListEntry', ], ], 'ClusterMetadata' => [ 'type' => 'structure', 'members' => [ 'ClusterId' => [ 'shape' => 'String', ], 'Description' => [ 'shape' => 'String', ], 'KmsKeyARN' => [ 'shape' => 'KmsKeyARN', ], 'RoleARN' => [ 'shape' => 'RoleARN', ], 'ClusterState' => [ 'shape' => 'ClusterState', ], 'JobType' => [ 'shape' => 'JobType', ], 'SnowballType' => [ 'shape' => 'SnowballType', ], 'CreationDate' => [ 'shape' => 'Timestamp', ], 'Resources' => [ 'shape' => 'JobResource', ], 'AddressId' => [ 'shape' => 'AddressId', ], 'ShippingOption' => [ 'shape' => 'ShippingOption', ], 'Notification' => [ 'shape' => 'Notification', ], 'ForwardingAddressId' => [ 'shape' => 'AddressId', ], 'TaxDocuments' => [ 'shape' => 'TaxDocuments', ], ], ], 'ClusterState' => [ 'type' => 'string', 'enum' => [ 'AwaitingQuorum', 'Pending', 'InUse', 'Complete', 'Cancelled', ], ], 'CompatibleImage' => [ 'type' => 'structure', 'members' => [ 'AmiId' => [ 'shape' => 'String', ], 'Name' => [ 'shape' => 'String', ], ], ], 'CompatibleImageList' => [ 'type' => 'list', 'member' => [ 'shape' => 'CompatibleImage', ], ], 'ConflictException' => [ 'type' => 'structure', 'members' => [ 'ConflictResource' => [ 'shape' => 'String', ], 'Message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'CreateAddressRequest' => [ 'type' => 'structure', 'required' => [ 'Address', ], 'members' => [ 'Address' => [ 'shape' => 'Address', ], ], ], 'CreateAddressResult' => [ 'type' => 'structure', 'members' => [ 'AddressId' => [ 'shape' => 'String', ], ], ], 'CreateClusterRequest' => [ 'type' => 'structure', 'required' => [ 'JobType', 'Resources', 'AddressId', 'RoleARN', 'SnowballType', 'ShippingOption', ], 'members' => [ 'JobType' => [ 'shape' => 'JobType', ], 'Resources' => [ 'shape' => 'JobResource', ], 'Description' => [ 'shape' => 'String', ], 'AddressId' => [ 'shape' => 'AddressId', ], 'KmsKeyARN' => [ 'shape' => 'KmsKeyARN', ], 'RoleARN' => [ 'shape' => 'RoleARN', ], 'SnowballType' => [ 'shape' => 'SnowballType', ], 'ShippingOption' => [ 'shape' => 'ShippingOption', ], 'Notification' => [ 'shape' => 'Notification', ], 'ForwardingAddressId' => [ 'shape' => 'AddressId', ], 'TaxDocuments' => [ 'shape' => 'TaxDocuments', ], ], ], 'CreateClusterResult' => [ 'type' => 'structure', 'members' => [ 'ClusterId' => [ 'shape' => 'ClusterId', ], ], ], 'CreateJobRequest' => [ 'type' => 'structure', 'members' => [ 'JobType' => [ 'shape' => 'JobType', ], 'Resources' => [ 'shape' => 'JobResource', ], 'Description' => [ 'shape' => 'String', ], 'AddressId' => [ 'shape' => 'AddressId', ], 'KmsKeyARN' => [ 'shape' => 'KmsKeyARN', ], 'RoleARN' => [ 'shape' => 'RoleARN', ], 'SnowballCapacityPreference' => [ 'shape' => 'SnowballCapacity', ], 'ShippingOption' => [ 'shape' => 'ShippingOption', ], 'Notification' => [ 'shape' => 'Notification', ], 'ClusterId' => [ 'shape' => 'ClusterId', ], 'SnowballType' => [ 'shape' => 'SnowballType', ], 'ForwardingAddressId' => [ 'shape' => 'AddressId', ], 'TaxDocuments' => [ 'shape' => 'TaxDocuments', ], 'DeviceConfiguration' => [ 'shape' => 'DeviceConfiguration', ], 'LongTermPricingId' => [ 'shape' => 'LongTermPricingId', ], ], ], 'CreateJobResult' => [ 'type' => 'structure', 'members' => [ 'JobId' => [ 'shape' => 'JobId', ], ], ], 'CreateLongTermPricingRequest' => [ 'type' => 'structure', 'required' => [ 'LongTermPricingType', ], 'members' => [ 'LongTermPricingType' => [ 'shape' => 'LongTermPricingType', ], 'IsLongTermPricingAutoRenew' => [ 'shape' => 'JavaBoolean', ], 'SnowballType' => [ 'shape' => 'SnowballType', ], ], ], 'CreateLongTermPricingResult' => [ 'type' => 'structure', 'members' => [ 'LongTermPricingId' => [ 'shape' => 'LongTermPricingId', ], ], ], 'CreateReturnShippingLabelRequest' => [ 'type' => 'structure', 'required' => [ 'JobId', ], 'members' => [ 'JobId' => [ 'shape' => 'JobId', ], 'ShippingOption' => [ 'shape' => 'ShippingOption', ], ], ], 'CreateReturnShippingLabelResult' => [ 'type' => 'structure', 'members' => [ 'Status' => [ 'shape' => 'ShippingLabelStatus', ], ], ], 'DataTransfer' => [ 'type' => 'structure', 'members' => [ 'BytesTransferred' => [ 'shape' => 'Long', ], 'ObjectsTransferred' => [ 'shape' => 'Long', ], 'TotalBytes' => [ 'shape' => 'Long', ], 'TotalObjects' => [ 'shape' => 'Long', ], ], ], 'DescribeAddressRequest' => [ 'type' => 'structure', 'required' => [ 'AddressId', ], 'members' => [ 'AddressId' => [ 'shape' => 'AddressId', ], ], ], 'DescribeAddressResult' => [ 'type' => 'structure', 'members' => [ 'Address' => [ 'shape' => 'Address', ], ], ], 'DescribeAddressesRequest' => [ 'type' => 'structure', 'members' => [ 'MaxResults' => [ 'shape' => 'ListLimit', ], 'NextToken' => [ 'shape' => 'String', ], ], ], 'DescribeAddressesResult' => [ 'type' => 'structure', 'members' => [ 'Addresses' => [ 'shape' => 'AddressList', ], 'NextToken' => [ 'shape' => 'String', ], ], ], 'DescribeClusterRequest' => [ 'type' => 'structure', 'required' => [ 'ClusterId', ], 'members' => [ 'ClusterId' => [ 'shape' => 'ClusterId', ], ], ], 'DescribeClusterResult' => [ 'type' => 'structure', 'members' => [ 'ClusterMetadata' => [ 'shape' => 'ClusterMetadata', ], ], ], 'DescribeJobRequest' => [ 'type' => 'structure', 'required' => [ 'JobId', ], 'members' => [ 'JobId' => [ 'shape' => 'JobId', ], ], ], 'DescribeJobResult' => [ 'type' => 'structure', 'members' => [ 'JobMetadata' => [ 'shape' => 'JobMetadata', ], 'SubJobMetadata' => [ 'shape' => 'JobMetadataList', ], ], ], 'DescribeReturnShippingLabelRequest' => [ 'type' => 'structure', 'required' => [ 'JobId', ], 'members' => [ 'JobId' => [ 'shape' => 'JobId', ], ], ], 'DescribeReturnShippingLabelResult' => [ 'type' => 'structure', 'members' => [ 'Status' => [ 'shape' => 'ShippingLabelStatus', ], 'ExpirationDate' => [ 'shape' => 'Timestamp', ], ], ], 'DeviceConfiguration' => [ 'type' => 'structure', 'members' => [ 'SnowconeDeviceConfiguration' => [ 'shape' => 'SnowconeDeviceConfiguration', ], ], ], 'Ec2AmiResource' => [ 'type' => 'structure', 'required' => [ 'AmiId', ], 'members' => [ 'AmiId' => [ 'shape' => 'AmiId', ], 'SnowballAmiId' => [ 'shape' => 'String', ], ], ], 'Ec2AmiResourceList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Ec2AmiResource', ], ], 'Ec2RequestFailedException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'EventTriggerDefinition' => [ 'type' => 'structure', 'members' => [ 'EventResourceARN' => [ 'shape' => 'ResourceARN', ], ], ], 'EventTriggerDefinitionList' => [ 'type' => 'list', 'member' => [ 'shape' => 'EventTriggerDefinition', ], ], 'GSTIN' => [ 'type' => 'string', 'pattern' => '\\d{2}[A-Z]{5}\\d{4}[A-Z]{1}[A-Z\\d]{1}[Z]{1}[A-Z\\d]{1}', ], 'GetJobManifestRequest' => [ 'type' => 'structure', 'required' => [ 'JobId', ], 'members' => [ 'JobId' => [ 'shape' => 'JobId', ], ], ], 'GetJobManifestResult' => [ 'type' => 'structure', 'members' => [ 'ManifestURI' => [ 'shape' => 'String', ], ], ], 'GetJobUnlockCodeRequest' => [ 'type' => 'structure', 'required' => [ 'JobId', ], 'members' => [ 'JobId' => [ 'shape' => 'JobId', ], ], ], 'GetJobUnlockCodeResult' => [ 'type' => 'structure', 'members' => [ 'UnlockCode' => [ 'shape' => 'String', ], ], ], 'GetSnowballUsageRequest' => [ 'type' => 'structure', 'members' => [], ], 'GetSnowballUsageResult' => [ 'type' => 'structure', 'members' => [ 'SnowballLimit' => [ 'shape' => 'Integer', ], 'SnowballsInUse' => [ 'shape' => 'Integer', ], ], ], 'GetSoftwareUpdatesRequest' => [ 'type' => 'structure', 'required' => [ 'JobId', ], 'members' => [ 'JobId' => [ 'shape' => 'JobId', ], ], ], 'GetSoftwareUpdatesResult' => [ 'type' => 'structure', 'members' => [ 'UpdatesURI' => [ 'shape' => 'String', ], ], ], 'INDTaxDocuments' => [ 'type' => 'structure', 'members' => [ 'GSTIN' => [ 'shape' => 'GSTIN', ], ], ], 'Integer' => [ 'type' => 'integer', ], 'InvalidAddressException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'InvalidInputCombinationException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'InvalidJobStateException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'InvalidNextTokenException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'InvalidResourceException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], 'ResourceType' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'JavaBoolean' => [ 'type' => 'boolean', ], 'JobId' => [ 'type' => 'string', 'max' => 39, 'min' => 39, 'pattern' => '(M|J)ID[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}', ], 'JobListEntry' => [ 'type' => 'structure', 'members' => [ 'JobId' => [ 'shape' => 'String', ], 'JobState' => [ 'shape' => 'JobState', ], 'IsMaster' => [ 'shape' => 'Boolean', ], 'JobType' => [ 'shape' => 'JobType', ], 'SnowballType' => [ 'shape' => 'SnowballType', ], 'CreationDate' => [ 'shape' => 'Timestamp', ], 'Description' => [ 'shape' => 'String', ], ], ], 'JobListEntryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'JobListEntry', ], ], 'JobLogs' => [ 'type' => 'structure', 'members' => [ 'JobCompletionReportURI' => [ 'shape' => 'String', ], 'JobSuccessLogURI' => [ 'shape' => 'String', ], 'JobFailureLogURI' => [ 'shape' => 'String', ], ], ], 'JobMetadata' => [ 'type' => 'structure', 'members' => [ 'JobId' => [ 'shape' => 'String', ], 'JobState' => [ 'shape' => 'JobState', ], 'JobType' => [ 'shape' => 'JobType', ], 'SnowballType' => [ 'shape' => 'SnowballType', ], 'CreationDate' => [ 'shape' => 'Timestamp', ], 'Resources' => [ 'shape' => 'JobResource', ], 'Description' => [ 'shape' => 'String', ], 'KmsKeyARN' => [ 'shape' => 'KmsKeyARN', ], 'RoleARN' => [ 'shape' => 'RoleARN', ], 'AddressId' => [ 'shape' => 'AddressId', ], 'ShippingDetails' => [ 'shape' => 'ShippingDetails', ], 'SnowballCapacityPreference' => [ 'shape' => 'SnowballCapacity', ], 'Notification' => [ 'shape' => 'Notification', ], 'DataTransferProgress' => [ 'shape' => 'DataTransfer', ], 'JobLogInfo' => [ 'shape' => 'JobLogs', ], 'ClusterId' => [ 'shape' => 'String', ], 'ForwardingAddressId' => [ 'shape' => 'AddressId', ], 'TaxDocuments' => [ 'shape' => 'TaxDocuments', ], 'DeviceConfiguration' => [ 'shape' => 'DeviceConfiguration', ], 'LongTermPricingId' => [ 'shape' => 'LongTermPricingId', ], ], ], 'JobMetadataList' => [ 'type' => 'list', 'member' => [ 'shape' => 'JobMetadata', ], ], 'JobResource' => [ 'type' => 'structure', 'members' => [ 'S3Resources' => [ 'shape' => 'S3ResourceList', ], 'LambdaResources' => [ 'shape' => 'LambdaResourceList', ], 'Ec2AmiResources' => [ 'shape' => 'Ec2AmiResourceList', ], ], ], 'JobState' => [ 'type' => 'string', 'enum' => [ 'New', 'PreparingAppliance', 'PreparingShipment', 'InTransitToCustomer', 'WithCustomer', 'InTransitToAWS', 'WithAWSSortingFacility', 'WithAWS', 'InProgress', 'Complete', 'Cancelled', 'Listing', 'Pending', ], ], 'JobStateList' => [ 'type' => 'list', 'member' => [ 'shape' => 'JobState', ], ], 'JobType' => [ 'type' => 'string', 'enum' => [ 'IMPORT', 'EXPORT', 'LOCAL_USE', ], ], 'KMSRequestFailedException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'KeyRange' => [ 'type' => 'structure', 'members' => [ 'BeginMarker' => [ 'shape' => 'String', ], 'EndMarker' => [ 'shape' => 'String', ], ], ], 'KmsKeyARN' => [ 'type' => 'string', 'max' => 255, 'pattern' => 'arn:aws.*:kms:.*:[0-9]{12}:key/.*', ], 'LambdaResource' => [ 'type' => 'structure', 'members' => [ 'LambdaArn' => [ 'shape' => 'ResourceARN', ], 'EventTriggers' => [ 'shape' => 'EventTriggerDefinitionList', ], ], ], 'LambdaResourceList' => [ 'type' => 'list', 'member' => [ 'shape' => 'LambdaResource', ], ], 'ListClusterJobsRequest' => [ 'type' => 'structure', 'required' => [ 'ClusterId', ], 'members' => [ 'ClusterId' => [ 'shape' => 'ClusterId', ], 'MaxResults' => [ 'shape' => 'ListLimit', ], 'NextToken' => [ 'shape' => 'String', ], ], ], 'ListClusterJobsResult' => [ 'type' => 'structure', 'members' => [ 'JobListEntries' => [ 'shape' => 'JobListEntryList', ], 'NextToken' => [ 'shape' => 'String', ], ], ], 'ListClustersRequest' => [ 'type' => 'structure', 'members' => [ 'MaxResults' => [ 'shape' => 'ListLimit', ], 'NextToken' => [ 'shape' => 'String', ], ], ], 'ListClustersResult' => [ 'type' => 'structure', 'members' => [ 'ClusterListEntries' => [ 'shape' => 'ClusterListEntryList', ], 'NextToken' => [ 'shape' => 'String', ], ], ], 'ListCompatibleImagesRequest' => [ 'type' => 'structure', 'members' => [ 'MaxResults' => [ 'shape' => 'ListLimit', ], 'NextToken' => [ 'shape' => 'String', ], ], ], 'ListCompatibleImagesResult' => [ 'type' => 'structure', 'members' => [ 'CompatibleImages' => [ 'shape' => 'CompatibleImageList', ], 'NextToken' => [ 'shape' => 'String', ], ], ], 'ListJobsRequest' => [ 'type' => 'structure', 'members' => [ 'MaxResults' => [ 'shape' => 'ListLimit', ], 'NextToken' => [ 'shape' => 'String', ], ], ], 'ListJobsResult' => [ 'type' => 'structure', 'members' => [ 'JobListEntries' => [ 'shape' => 'JobListEntryList', ], 'NextToken' => [ 'shape' => 'String', ], ], ], 'ListLimit' => [ 'type' => 'integer', 'max' => 100, 'min' => 0, ], 'ListLongTermPricingRequest' => [ 'type' => 'structure', 'members' => [ 'MaxResults' => [ 'shape' => 'ListLimit', ], 'NextToken' => [ 'shape' => 'String', ], ], ], 'ListLongTermPricingResult' => [ 'type' => 'structure', 'members' => [ 'LongTermPricingEntries' => [ 'shape' => 'LongTermPricingEntryList', ], 'NextToken' => [ 'shape' => 'String', ], ], ], 'Long' => [ 'type' => 'long', ], 'LongTermPricingAssociatedJobIdList' => [ 'type' => 'list', 'member' => [ 'shape' => 'JobId', ], ], 'LongTermPricingEntryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'LongTermPricingListEntry', ], ], 'LongTermPricingId' => [ 'type' => 'string', 'max' => 41, 'min' => 41, 'pattern' => 'LTPID[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}', ], 'LongTermPricingListEntry' => [ 'type' => 'structure', 'members' => [ 'LongTermPricingId' => [ 'shape' => 'LongTermPricingId', ], 'LongTermPricingEndDate' => [ 'shape' => 'Timestamp', ], 'LongTermPricingStartDate' => [ 'shape' => 'Timestamp', ], 'LongTermPricingType' => [ 'shape' => 'LongTermPricingType', ], 'CurrentActiveJob' => [ 'shape' => 'JobId', ], 'ReplacementJob' => [ 'shape' => 'JobId', ], 'IsLongTermPricingAutoRenew' => [ 'shape' => 'JavaBoolean', ], 'LongTermPricingStatus' => [ 'shape' => 'String', ], 'SnowballType' => [ 'shape' => 'SnowballType', ], 'JobIds' => [ 'shape' => 'LongTermPricingAssociatedJobIdList', ], ], ], 'LongTermPricingType' => [ 'type' => 'string', 'enum' => [ 'OneYear', 'ThreeYear', ], ], 'Notification' => [ 'type' => 'structure', 'members' => [ 'SnsTopicARN' => [ 'shape' => 'SnsTopicARN', ], 'JobStatesToNotify' => [ 'shape' => 'JobStateList', ], 'NotifyAll' => [ 'shape' => 'Boolean', ], ], ], 'ResourceARN' => [ 'type' => 'string', 'max' => 255, 'pattern' => 'arn:aws.*:*', ], 'ReturnShippingLabelAlreadyExistsException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'RoleARN' => [ 'type' => 'string', 'max' => 255, 'pattern' => 'arn:aws.*:iam::[0-9]{12}:role/.*', ], 'S3Resource' => [ 'type' => 'structure', 'members' => [ 'BucketArn' => [ 'shape' => 'ResourceARN', ], 'KeyRange' => [ 'shape' => 'KeyRange', ], ], ], 'S3ResourceList' => [ 'type' => 'list', 'member' => [ 'shape' => 'S3Resource', ], ], 'Shipment' => [ 'type' => 'structure', 'members' => [ 'Status' => [ 'shape' => 'String', ], 'TrackingNumber' => [ 'shape' => 'String', ], ], ], 'ShipmentState' => [ 'type' => 'string', 'enum' => [ 'RECEIVED', 'RETURNED', ], ], 'ShippingDetails' => [ 'type' => 'structure', 'members' => [ 'ShippingOption' => [ 'shape' => 'ShippingOption', ], 'InboundShipment' => [ 'shape' => 'Shipment', ], 'OutboundShipment' => [ 'shape' => 'Shipment', ], ], ], 'ShippingLabelStatus' => [ 'type' => 'string', 'enum' => [ 'InProgress', 'TimedOut', 'Succeeded', 'Failed', ], ], 'ShippingOption' => [ 'type' => 'string', 'enum' => [ 'SECOND_DAY', 'NEXT_DAY', 'EXPRESS', 'STANDARD', ], ], 'SnowballCapacity' => [ 'type' => 'string', 'enum' => [ 'T50', 'T80', 'T100', 'T42', 'T98', 'T8', 'T14', 'NoPreference', ], ], 'SnowballType' => [ 'type' => 'string', 'enum' => [ 'STANDARD', 'EDGE', 'EDGE_C', 'EDGE_CG', 'EDGE_S', 'SNC1_HDD', 'SNC1_SSD', ], ], 'SnowconeDeviceConfiguration' => [ 'type' => 'structure', 'members' => [ 'WirelessConnection' => [ 'shape' => 'WirelessConnection', ], ], ], 'SnsTopicARN' => [ 'type' => 'string', 'max' => 255, 'pattern' => 'arn:aws.*:sns:.*:[0-9]{12}:.*', ], 'String' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, ], 'TaxDocuments' => [ 'type' => 'structure', 'members' => [ 'IND' => [ 'shape' => 'INDTaxDocuments', ], ], ], 'Timestamp' => [ 'type' => 'timestamp', ], 'UnsupportedAddressException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'UpdateClusterRequest' => [ 'type' => 'structure', 'required' => [ 'ClusterId', ], 'members' => [ 'ClusterId' => [ 'shape' => 'ClusterId', ], 'RoleARN' => [ 'shape' => 'RoleARN', ], 'Description' => [ 'shape' => 'String', ], 'Resources' => [ 'shape' => 'JobResource', ], 'AddressId' => [ 'shape' => 'AddressId', ], 'ShippingOption' => [ 'shape' => 'ShippingOption', ], 'Notification' => [ 'shape' => 'Notification', ], 'ForwardingAddressId' => [ 'shape' => 'AddressId', ], ], ], 'UpdateClusterResult' => [ 'type' => 'structure', 'members' => [], ], 'UpdateJobRequest' => [ 'type' => 'structure', 'required' => [ 'JobId', ], 'members' => [ 'JobId' => [ 'shape' => 'JobId', ], 'RoleARN' => [ 'shape' => 'RoleARN', ], 'Notification' => [ 'shape' => 'Notification', ], 'Resources' => [ 'shape' => 'JobResource', ], 'AddressId' => [ 'shape' => 'AddressId', ], 'ShippingOption' => [ 'shape' => 'ShippingOption', ], 'Description' => [ 'shape' => 'String', ], 'SnowballCapacityPreference' => [ 'shape' => 'SnowballCapacity', ], 'ForwardingAddressId' => [ 'shape' => 'AddressId', ], ], ], 'UpdateJobResult' => [ 'type' => 'structure', 'members' => [], ], 'UpdateJobShipmentStateRequest' => [ 'type' => 'structure', 'required' => [ 'JobId', 'ShipmentState', ], 'members' => [ 'JobId' => [ 'shape' => 'JobId', ], 'ShipmentState' => [ 'shape' => 'ShipmentState', ], ], ], 'UpdateJobShipmentStateResult' => [ 'type' => 'structure', 'members' => [], ], 'UpdateLongTermPricingRequest' => [ 'type' => 'structure', 'required' => [ 'LongTermPricingId', ], 'members' => [ 'LongTermPricingId' => [ 'shape' => 'LongTermPricingId', ], 'ReplacementJob' => [ 'shape' => 'JobId', ], 'IsLongTermPricingAutoRenew' => [ 'shape' => 'JavaBoolean', ], ], ], 'UpdateLongTermPricingResult' => [ 'type' => 'structure', 'members' => [], ], 'WirelessConnection' => [ 'type' => 'structure', 'members' => [ 'IsWifiEnabled' => [ 'shape' => 'Boolean', ], ], ], ],];
