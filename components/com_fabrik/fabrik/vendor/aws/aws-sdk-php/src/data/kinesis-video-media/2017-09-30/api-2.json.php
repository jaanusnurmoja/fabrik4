<?php
// This file was auto-generated from sdk-root/src/data/kinesis-video-media/2017-09-30/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2017-09-30', 'endpointPrefix' => 'kinesisvideo', 'protocol' => 'rest-json', 'serviceAbbreviation' => 'Kinesis Video Media', 'serviceFullName' => 'Amazon Kinesis Video Streams Media', 'serviceId' => 'Kinesis Video Media', 'signatureVersion' => 'v4', 'uid' => 'kinesis-video-media-2017-09-30', ], 'operations' => [ 'GetMedia' => [ 'name' => 'GetMedia', 'http' => [ 'method' => 'POST', 'requestUri' => '/getMedia', ], 'input' => [ 'shape' => 'GetMediaInput', ], 'output' => [ 'shape' => 'GetMediaOutput', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'NotAuthorizedException', ], [ 'shape' => 'InvalidEndpointException', ], [ 'shape' => 'ClientLimitExceededException', ], [ 'shape' => 'ConnectionLimitExceededException', ], [ 'shape' => 'InvalidArgumentException', ], ], ], ], 'shapes' => [ 'ClientLimitExceededException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'ConnectionLimitExceededException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'ContentType' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^[a-zA-Z0-9_\\.\\-]+$', ], 'ContinuationToken' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^[a-zA-Z0-9_\\.\\-]+$', ], 'ErrorMessage' => [ 'type' => 'string', ], 'FragmentNumberString' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^[0-9]+$', ], 'GetMediaInput' => [ 'type' => 'structure', 'required' => [ 'StartSelector', ], 'members' => [ 'StreamName' => [ 'shape' => 'StreamName', ], 'StreamARN' => [ 'shape' => 'ResourceARN', ], 'StartSelector' => [ 'shape' => 'StartSelector', ], ], ], 'GetMediaOutput' => [ 'type' => 'structure', 'members' => [ 'ContentType' => [ 'shape' => 'ContentType', 'location' => 'header', 'locationName' => 'Content-Type', ], 'Payload' => [ 'shape' => 'Payload', ], ], 'payload' => 'Payload', ], 'InvalidArgumentException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'InvalidEndpointException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'NotAuthorizedException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 401, ], 'exception' => true, ], 'Payload' => [ 'type' => 'blob', 'streaming' => true, ], 'ResourceARN' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, 'pattern' => 'arn:aws:kinesisvideo:[a-z0-9-]+:[0-9]+:[a-z]+/[a-zA-Z0-9_.-]+/[0-9]+', ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 404, ], 'exception' => true, ], 'StartSelector' => [ 'type' => 'structure', 'required' => [ 'StartSelectorType', ], 'members' => [ 'StartSelectorType' => [ 'shape' => 'StartSelectorType', ], 'AfterFragmentNumber' => [ 'shape' => 'FragmentNumberString', ], 'StartTimestamp' => [ 'shape' => 'Timestamp', ], 'ContinuationToken' => [ 'shape' => 'ContinuationToken', ], ], ], 'StartSelectorType' => [ 'type' => 'string', 'enum' => [ 'FRAGMENT_NUMBER', 'SERVER_TIMESTAMP', 'PRODUCER_TIMESTAMP', 'NOW', 'EARLIEST', 'CONTINUATION_TOKEN', ], ], 'StreamName' => [ 'type' => 'string', 'max' => 256, 'min' => 1, 'pattern' => '[a-zA-Z0-9_.-]+', ], 'Timestamp' => [ 'type' => 'timestamp', ], ],];
