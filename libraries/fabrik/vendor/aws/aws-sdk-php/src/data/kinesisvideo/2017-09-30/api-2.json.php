<?php
// This file was auto-generated from sdk-root/src/data/kinesisvideo/2017-09-30/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2017-09-30', 'endpointPrefix' => 'kinesisvideo', 'protocol' => 'rest-json', 'serviceAbbreviation' => 'Kinesis Video', 'serviceFullName' => 'Amazon Kinesis Video Streams', 'serviceId' => 'Kinesis Video', 'signatureVersion' => 'v4', 'uid' => 'kinesisvideo-2017-09-30', ], 'operations' => [ 'CreateStream' => [ 'name' => 'CreateStream', 'http' => [ 'method' => 'POST', 'requestUri' => '/createStream', ], 'input' => [ 'shape' => 'CreateStreamInput', ], 'output' => [ 'shape' => 'CreateStreamOutput', ], 'errors' => [ [ 'shape' => 'AccountStreamLimitExceededException', ], [ 'shape' => 'DeviceStreamLimitExceededException', ], [ 'shape' => 'ResourceInUseException', ], [ 'shape' => 'InvalidDeviceException', ], [ 'shape' => 'InvalidArgumentException', ], [ 'shape' => 'ClientLimitExceededException', ], ], ], 'DeleteStream' => [ 'name' => 'DeleteStream', 'http' => [ 'method' => 'POST', 'requestUri' => '/deleteStream', ], 'input' => [ 'shape' => 'DeleteStreamInput', ], 'output' => [ 'shape' => 'DeleteStreamOutput', ], 'errors' => [ [ 'shape' => 'ClientLimitExceededException', ], [ 'shape' => 'InvalidArgumentException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'NotAuthorizedException', ], ], ], 'DescribeStream' => [ 'name' => 'DescribeStream', 'http' => [ 'method' => 'POST', 'requestUri' => '/describeStream', ], 'input' => [ 'shape' => 'DescribeStreamInput', ], 'output' => [ 'shape' => 'DescribeStreamOutput', ], 'errors' => [ [ 'shape' => 'InvalidArgumentException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ClientLimitExceededException', ], [ 'shape' => 'NotAuthorizedException', ], ], ], 'GetDataEndpoint' => [ 'name' => 'GetDataEndpoint', 'http' => [ 'method' => 'POST', 'requestUri' => '/getDataEndpoint', ], 'input' => [ 'shape' => 'GetDataEndpointInput', ], 'output' => [ 'shape' => 'GetDataEndpointOutput', ], 'errors' => [ [ 'shape' => 'InvalidArgumentException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ClientLimitExceededException', ], [ 'shape' => 'NotAuthorizedException', ], ], ], 'ListStreams' => [ 'name' => 'ListStreams', 'http' => [ 'method' => 'POST', 'requestUri' => '/listStreams', ], 'input' => [ 'shape' => 'ListStreamsInput', ], 'output' => [ 'shape' => 'ListStreamsOutput', ], 'errors' => [ [ 'shape' => 'ClientLimitExceededException', ], [ 'shape' => 'InvalidArgumentException', ], ], ], 'ListTagsForStream' => [ 'name' => 'ListTagsForStream', 'http' => [ 'method' => 'POST', 'requestUri' => '/listTagsForStream', ], 'input' => [ 'shape' => 'ListTagsForStreamInput', ], 'output' => [ 'shape' => 'ListTagsForStreamOutput', ], 'errors' => [ [ 'shape' => 'ClientLimitExceededException', ], [ 'shape' => 'InvalidArgumentException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'NotAuthorizedException', ], [ 'shape' => 'InvalidResourceFormatException', ], ], ], 'TagStream' => [ 'name' => 'TagStream', 'http' => [ 'method' => 'POST', 'requestUri' => '/tagStream', ], 'input' => [ 'shape' => 'TagStreamInput', ], 'output' => [ 'shape' => 'TagStreamOutput', ], 'errors' => [ [ 'shape' => 'ClientLimitExceededException', ], [ 'shape' => 'InvalidArgumentException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'NotAuthorizedException', ], [ 'shape' => 'InvalidResourceFormatException', ], [ 'shape' => 'TagsPerResourceExceededLimitException', ], ], ], 'UntagStream' => [ 'name' => 'UntagStream', 'http' => [ 'method' => 'POST', 'requestUri' => '/untagStream', ], 'input' => [ 'shape' => 'UntagStreamInput', ], 'output' => [ 'shape' => 'UntagStreamOutput', ], 'errors' => [ [ 'shape' => 'ClientLimitExceededException', ], [ 'shape' => 'InvalidArgumentException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'NotAuthorizedException', ], [ 'shape' => 'InvalidResourceFormatException', ], ], ], 'UpdateDataRetention' => [ 'name' => 'UpdateDataRetention', 'http' => [ 'method' => 'POST', 'requestUri' => '/updateDataRetention', ], 'input' => [ 'shape' => 'UpdateDataRetentionInput', ], 'output' => [ 'shape' => 'UpdateDataRetentionOutput', ], 'errors' => [ [ 'shape' => 'ClientLimitExceededException', ], [ 'shape' => 'InvalidArgumentException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ResourceInUseException', ], [ 'shape' => 'NotAuthorizedException', ], [ 'shape' => 'VersionMismatchException', ], ], ], 'UpdateStream' => [ 'name' => 'UpdateStream', 'http' => [ 'method' => 'POST', 'requestUri' => '/updateStream', ], 'input' => [ 'shape' => 'UpdateStreamInput', ], 'output' => [ 'shape' => 'UpdateStreamOutput', ], 'errors' => [ [ 'shape' => 'ClientLimitExceededException', ], [ 'shape' => 'InvalidArgumentException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ResourceInUseException', ], [ 'shape' => 'NotAuthorizedException', ], [ 'shape' => 'VersionMismatchException', ], ], ], ], 'shapes' => [ 'APIName' => [ 'type' => 'string', 'enum' => [ 'PUT_MEDIA', 'GET_MEDIA', 'LIST_FRAGMENTS', 'GET_MEDIA_FOR_FRAGMENT_LIST', 'GET_HLS_STREAMING_SESSION_URL', ], ], 'AccountStreamLimitExceededException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'ClientLimitExceededException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'ComparisonOperator' => [ 'type' => 'string', 'enum' => [ 'BEGINS_WITH', ], ], 'CreateStreamInput' => [ 'type' => 'structure', 'required' => [ 'StreamName', ], 'members' => [ 'DeviceName' => [ 'shape' => 'DeviceName', ], 'StreamName' => [ 'shape' => 'StreamName', ], 'MediaType' => [ 'shape' => 'MediaType', ], 'KmsKeyId' => [ 'shape' => 'KmsKeyId', ], 'DataRetentionInHours' => [ 'shape' => 'DataRetentionInHours', ], ], ], 'CreateStreamOutput' => [ 'type' => 'structure', 'members' => [ 'StreamARN' => [ 'shape' => 'ResourceARN', ], ], ], 'DataEndpoint' => [ 'type' => 'string', ], 'DataRetentionChangeInHours' => [ 'type' => 'integer', 'min' => 1, ], 'DataRetentionInHours' => [ 'type' => 'integer', 'min' => 0, ], 'DeleteStreamInput' => [ 'type' => 'structure', 'required' => [ 'StreamARN', ], 'members' => [ 'StreamARN' => [ 'shape' => 'ResourceARN', ], 'CurrentVersion' => [ 'shape' => 'Version', ], ], ], 'DeleteStreamOutput' => [ 'type' => 'structure', 'members' => [], ], 'DescribeStreamInput' => [ 'type' => 'structure', 'members' => [ 'StreamName' => [ 'shape' => 'StreamName', ], 'StreamARN' => [ 'shape' => 'ResourceARN', ], ], ], 'DescribeStreamOutput' => [ 'type' => 'structure', 'members' => [ 'StreamInfo' => [ 'shape' => 'StreamInfo', ], ], ], 'DeviceName' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '[a-zA-Z0-9_.-]+', ], 'DeviceStreamLimitExceededException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'ErrorMessage' => [ 'type' => 'string', ], 'GetDataEndpointInput' => [ 'type' => 'structure', 'required' => [ 'APIName', ], 'members' => [ 'StreamName' => [ 'shape' => 'StreamName', ], 'StreamARN' => [ 'shape' => 'ResourceARN', ], 'APIName' => [ 'shape' => 'APIName', ], ], ], 'GetDataEndpointOutput' => [ 'type' => 'structure', 'members' => [ 'DataEndpoint' => [ 'shape' => 'DataEndpoint', ], ], ], 'InvalidArgumentException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'InvalidDeviceException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'InvalidResourceFormatException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'KmsKeyId' => [ 'type' => 'string', 'max' => 2048, 'min' => 1, ], 'ListStreamsInput' => [ 'type' => 'structure', 'members' => [ 'MaxResults' => [ 'shape' => 'ListStreamsInputLimit', ], 'NextToken' => [ 'shape' => 'NextToken', ], 'StreamNameCondition' => [ 'shape' => 'StreamNameCondition', ], ], ], 'ListStreamsInputLimit' => [ 'type' => 'integer', 'max' => 10000, 'min' => 1, ], 'ListStreamsOutput' => [ 'type' => 'structure', 'members' => [ 'StreamInfoList' => [ 'shape' => 'StreamInfoList', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListTagsForStreamInput' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'NextToken', ], 'StreamARN' => [ 'shape' => 'ResourceARN', ], 'StreamName' => [ 'shape' => 'StreamName', ], ], ], 'ListTagsForStreamOutput' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'NextToken', ], 'Tags' => [ 'shape' => 'ResourceTags', ], ], ], 'MediaType' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '[\\w\\-\\.\\+]+/[\\w\\-\\.\\+]+', ], 'NextToken' => [ 'type' => 'string', 'max' => 512, 'min' => 0, ], 'NotAuthorizedException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 401, ], 'exception' => true, ], 'ResourceARN' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, 'pattern' => 'arn:aws:kinesisvideo:[a-z0-9-]+:[0-9]+:[a-z]+/[a-zA-Z0-9_.-]+/[0-9]+', ], 'ResourceInUseException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 404, ], 'exception' => true, ], 'ResourceTags' => [ 'type' => 'map', 'key' => [ 'shape' => 'TagKey', ], 'value' => [ 'shape' => 'TagValue', ], 'max' => 50, 'min' => 1, ], 'Status' => [ 'type' => 'string', 'enum' => [ 'CREATING', 'ACTIVE', 'UPDATING', 'DELETING', ], ], 'StreamInfo' => [ 'type' => 'structure', 'members' => [ 'DeviceName' => [ 'shape' => 'DeviceName', ], 'StreamName' => [ 'shape' => 'StreamName', ], 'StreamARN' => [ 'shape' => 'ResourceARN', ], 'MediaType' => [ 'shape' => 'MediaType', ], 'KmsKeyId' => [ 'shape' => 'KmsKeyId', ], 'Version' => [ 'shape' => 'Version', ], 'Status' => [ 'shape' => 'Status', ], 'CreationTime' => [ 'shape' => 'Timestamp', ], 'DataRetentionInHours' => [ 'shape' => 'DataRetentionInHours', ], ], ], 'StreamInfoList' => [ 'type' => 'list', 'member' => [ 'shape' => 'StreamInfo', ], ], 'StreamName' => [ 'type' => 'string', 'max' => 256, 'min' => 1, 'pattern' => '[a-zA-Z0-9_.-]+', ], 'StreamNameCondition' => [ 'type' => 'structure', 'members' => [ 'ComparisonOperator' => [ 'shape' => 'ComparisonOperator', ], 'ComparisonValue' => [ 'shape' => 'StreamName', ], ], ], 'TagKey' => [ 'type' => 'string', 'max' => 128, 'min' => 1, ], 'TagKeyList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagKey', ], 'max' => 50, 'min' => 1, ], 'TagStreamInput' => [ 'type' => 'structure', 'required' => [ 'Tags', ], 'members' => [ 'StreamARN' => [ 'shape' => 'ResourceARN', ], 'StreamName' => [ 'shape' => 'StreamName', ], 'Tags' => [ 'shape' => 'ResourceTags', ], ], ], 'TagStreamOutput' => [ 'type' => 'structure', 'members' => [], ], 'TagValue' => [ 'type' => 'string', 'max' => 256, 'min' => 0, ], 'TagsPerResourceExceededLimitException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'Timestamp' => [ 'type' => 'timestamp', ], 'UntagStreamInput' => [ 'type' => 'structure', 'required' => [ 'TagKeyList', ], 'members' => [ 'StreamARN' => [ 'shape' => 'ResourceARN', ], 'StreamName' => [ 'shape' => 'StreamName', ], 'TagKeyList' => [ 'shape' => 'TagKeyList', ], ], ], 'UntagStreamOutput' => [ 'type' => 'structure', 'members' => [], ], 'UpdateDataRetentionInput' => [ 'type' => 'structure', 'required' => [ 'CurrentVersion', 'Operation', 'DataRetentionChangeInHours', ], 'members' => [ 'StreamName' => [ 'shape' => 'StreamName', ], 'StreamARN' => [ 'shape' => 'ResourceARN', ], 'CurrentVersion' => [ 'shape' => 'Version', ], 'Operation' => [ 'shape' => 'UpdateDataRetentionOperation', ], 'DataRetentionChangeInHours' => [ 'shape' => 'DataRetentionChangeInHours', ], ], ], 'UpdateDataRetentionOperation' => [ 'type' => 'string', 'enum' => [ 'INCREASE_DATA_RETENTION', 'DECREASE_DATA_RETENTION', ], ], 'UpdateDataRetentionOutput' => [ 'type' => 'structure', 'members' => [], ], 'UpdateStreamInput' => [ 'type' => 'structure', 'required' => [ 'CurrentVersion', ], 'members' => [ 'StreamName' => [ 'shape' => 'StreamName', ], 'StreamARN' => [ 'shape' => 'ResourceARN', ], 'CurrentVersion' => [ 'shape' => 'Version', ], 'DeviceName' => [ 'shape' => 'DeviceName', ], 'MediaType' => [ 'shape' => 'MediaType', ], ], ], 'UpdateStreamOutput' => [ 'type' => 'structure', 'members' => [], ], 'Version' => [ 'type' => 'string', 'max' => 64, 'min' => 1, 'pattern' => '[a-zA-Z0-9]+', ], 'VersionMismatchException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], ],];
