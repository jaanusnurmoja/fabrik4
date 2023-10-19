<?php
// This file was auto-generated from sdk-root/src/data/elastic-inference/2017-07-25/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2017-07-25', 'endpointPrefix' => 'api.elastic-inference', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceAbbreviation' => 'Amazon Elastic Inference', 'serviceFullName' => 'Amazon Elastic Inference', 'serviceId' => 'Elastic Inference', 'signatureVersion' => 'v4', 'signingName' => 'elastic-inference', 'uid' => 'elastic-inference-2017-07-25', ], 'operations' => [ 'DescribeAcceleratorOfferings' => [ 'name' => 'DescribeAcceleratorOfferings', 'http' => [ 'method' => 'POST', 'requestUri' => '/describe-accelerator-offerings', ], 'input' => [ 'shape' => 'DescribeAcceleratorOfferingsRequest', ], 'output' => [ 'shape' => 'DescribeAcceleratorOfferingsResponse', ], 'errors' => [ [ 'shape' => 'BadRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], ], ], 'DescribeAcceleratorTypes' => [ 'name' => 'DescribeAcceleratorTypes', 'http' => [ 'method' => 'GET', 'requestUri' => '/describe-accelerator-types', ], 'input' => [ 'shape' => 'DescribeAcceleratorTypesRequest', ], 'output' => [ 'shape' => 'DescribeAcceleratorTypesResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], ], ], 'DescribeAccelerators' => [ 'name' => 'DescribeAccelerators', 'http' => [ 'method' => 'POST', 'requestUri' => '/describe-accelerators', ], 'input' => [ 'shape' => 'DescribeAcceleratorsRequest', ], 'output' => [ 'shape' => 'DescribeAcceleratorsResponse', ], 'errors' => [ [ 'shape' => 'BadRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], ], ], 'ListTagsForResource' => [ 'name' => 'ListTagsForResource', 'http' => [ 'method' => 'GET', 'requestUri' => '/tags/{resourceArn}', ], 'input' => [ 'shape' => 'ListTagsForResourceRequest', ], 'output' => [ 'shape' => 'ListTagsForResourceResult', ], 'errors' => [ [ 'shape' => 'BadRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], ], ], 'TagResource' => [ 'name' => 'TagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/tags/{resourceArn}', ], 'input' => [ 'shape' => 'TagResourceRequest', ], 'output' => [ 'shape' => 'TagResourceResult', ], 'errors' => [ [ 'shape' => 'BadRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], ], ], 'UntagResource' => [ 'name' => 'UntagResource', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/tags/{resourceArn}', ], 'input' => [ 'shape' => 'UntagResourceRequest', ], 'output' => [ 'shape' => 'UntagResourceResult', ], 'errors' => [ [ 'shape' => 'BadRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], ], ], ], 'shapes' => [ 'AcceleratorHealthStatus' => [ 'type' => 'string', 'max' => 256, 'min' => 1, ], 'AcceleratorId' => [ 'type' => 'string', 'max' => 256, 'min' => 1, 'pattern' => '^eia-[0-9a-f]+$', ], 'AcceleratorIdList' => [ 'type' => 'list', 'member' => [ 'shape' => 'AcceleratorId', ], 'max' => 1000, 'min' => 0, ], 'AcceleratorType' => [ 'type' => 'structure', 'members' => [ 'acceleratorTypeName' => [ 'shape' => 'AcceleratorTypeName', ], 'memoryInfo' => [ 'shape' => 'MemoryInfo', ], 'throughputInfo' => [ 'shape' => 'ThroughputInfoList', ], ], ], 'AcceleratorTypeList' => [ 'type' => 'list', 'member' => [ 'shape' => 'AcceleratorType', ], 'max' => 100, 'min' => 0, ], 'AcceleratorTypeName' => [ 'type' => 'string', 'max' => 256, 'min' => 1, 'pattern' => '^\\S+$', ], 'AcceleratorTypeNameList' => [ 'type' => 'list', 'member' => [ 'shape' => 'AcceleratorTypeName', ], 'max' => 100, 'min' => 0, ], 'AcceleratorTypeOffering' => [ 'type' => 'structure', 'members' => [ 'acceleratorType' => [ 'shape' => 'AcceleratorTypeName', ], 'locationType' => [ 'shape' => 'LocationType', ], 'location' => [ 'shape' => 'Location', ], ], ], 'AcceleratorTypeOfferingList' => [ 'type' => 'list', 'member' => [ 'shape' => 'AcceleratorTypeOffering', ], 'max' => 100, 'min' => 0, ], 'AvailabilityZone' => [ 'type' => 'string', 'max' => 256, 'min' => 1, ], 'BadRequestException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'DescribeAcceleratorOfferingsRequest' => [ 'type' => 'structure', 'required' => [ 'locationType', ], 'members' => [ 'locationType' => [ 'shape' => 'LocationType', ], 'acceleratorTypes' => [ 'shape' => 'AcceleratorTypeNameList', ], ], ], 'DescribeAcceleratorOfferingsResponse' => [ 'type' => 'structure', 'members' => [ 'acceleratorTypeOfferings' => [ 'shape' => 'AcceleratorTypeOfferingList', ], ], ], 'DescribeAcceleratorTypesRequest' => [ 'type' => 'structure', 'members' => [], ], 'DescribeAcceleratorTypesResponse' => [ 'type' => 'structure', 'members' => [ 'acceleratorTypes' => [ 'shape' => 'AcceleratorTypeList', ], ], ], 'DescribeAcceleratorsRequest' => [ 'type' => 'structure', 'members' => [ 'acceleratorIds' => [ 'shape' => 'AcceleratorIdList', ], 'filters' => [ 'shape' => 'FilterList', ], 'maxResults' => [ 'shape' => 'MaxResults', ], 'nextToken' => [ 'shape' => 'NextToken', ], ], ], 'DescribeAcceleratorsResponse' => [ 'type' => 'structure', 'members' => [ 'acceleratorSet' => [ 'shape' => 'ElasticInferenceAcceleratorSet', ], 'nextToken' => [ 'shape' => 'NextToken', ], ], ], 'ElasticInferenceAccelerator' => [ 'type' => 'structure', 'members' => [ 'acceleratorHealth' => [ 'shape' => 'ElasticInferenceAcceleratorHealth', ], 'acceleratorType' => [ 'shape' => 'AcceleratorTypeName', ], 'acceleratorId' => [ 'shape' => 'AcceleratorId', ], 'availabilityZone' => [ 'shape' => 'AvailabilityZone', ], 'attachedResource' => [ 'shape' => 'ResourceArn', ], ], ], 'ElasticInferenceAcceleratorHealth' => [ 'type' => 'structure', 'members' => [ 'status' => [ 'shape' => 'AcceleratorHealthStatus', ], ], ], 'ElasticInferenceAcceleratorSet' => [ 'type' => 'list', 'member' => [ 'shape' => 'ElasticInferenceAccelerator', ], ], 'Filter' => [ 'type' => 'structure', 'members' => [ 'name' => [ 'shape' => 'FilterName', ], 'values' => [ 'shape' => 'ValueStringList', ], ], ], 'FilterList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Filter', ], 'max' => 100, 'min' => 0, ], 'FilterName' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^\\S+$', ], 'Integer' => [ 'type' => 'integer', ], 'InternalServerException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, ], 'Key' => [ 'type' => 'string', 'max' => 256, 'min' => 1, 'pattern' => '^\\S+$', ], 'KeyValuePair' => [ 'type' => 'structure', 'members' => [ 'key' => [ 'shape' => 'Key', ], 'value' => [ 'shape' => 'Value', ], ], ], 'ListTagsForResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', ], 'members' => [ 'resourceArn' => [ 'shape' => 'ResourceARN', 'location' => 'uri', 'locationName' => 'resourceArn', ], ], ], 'ListTagsForResourceResult' => [ 'type' => 'structure', 'members' => [ 'tags' => [ 'shape' => 'TagMap', ], ], ], 'Location' => [ 'type' => 'string', 'max' => 256, 'min' => 1, ], 'LocationType' => [ 'type' => 'string', 'enum' => [ 'region', 'availability-zone', 'availability-zone-id', ], 'max' => 256, 'min' => 1, ], 'MaxResults' => [ 'type' => 'integer', 'max' => 100, 'min' => 0, ], 'MemoryInfo' => [ 'type' => 'structure', 'members' => [ 'sizeInMiB' => [ 'shape' => 'Integer', ], ], ], 'NextToken' => [ 'type' => 'string', 'max' => 2048, 'min' => 1, 'pattern' => '^[A-Za-z0-9+/]+={0,2}$', ], 'ResourceARN' => [ 'type' => 'string', 'max' => 1011, 'min' => 1, 'pattern' => '^arn:aws[^\\s:]*:elastic-inference:[^\\s:]+:\\d{12}:elastic-inference-accelerator/eia-[0-9a-f]+$', ], 'ResourceArn' => [ 'type' => 'string', 'max' => 1283, 'min' => 1, ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 404, ], 'exception' => true, ], 'String' => [ 'type' => 'string', 'max' => 500000, 'pattern' => '^.*$', ], 'TagKey' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^\\S$', ], 'TagKeyList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagKey', ], 'max' => 50, 'min' => 1, ], 'TagMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'TagKey', ], 'value' => [ 'shape' => 'TagValue', ], 'max' => 50, 'min' => 1, ], 'TagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'tags', ], 'members' => [ 'resourceArn' => [ 'shape' => 'ResourceARN', 'location' => 'uri', 'locationName' => 'resourceArn', ], 'tags' => [ 'shape' => 'TagMap', ], ], ], 'TagResourceResult' => [ 'type' => 'structure', 'members' => [], ], 'TagValue' => [ 'type' => 'string', 'max' => 256, 'pattern' => '.*', ], 'ThroughputInfoList' => [ 'type' => 'list', 'member' => [ 'shape' => 'KeyValuePair', ], 'max' => 100, 'min' => 0, ], 'UntagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'tagKeys', ], 'members' => [ 'resourceArn' => [ 'shape' => 'ResourceARN', 'location' => 'uri', 'locationName' => 'resourceArn', ], 'tagKeys' => [ 'shape' => 'TagKeyList', 'location' => 'querystring', 'locationName' => 'tagKeys', ], ], ], 'UntagResourceResult' => [ 'type' => 'structure', 'members' => [], ], 'Value' => [ 'type' => 'integer', ], 'ValueStringList' => [ 'type' => 'list', 'member' => [ 'shape' => 'String', ], 'max' => 100, 'min' => 0, ], ],];
