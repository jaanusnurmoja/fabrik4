<?php
// This file was auto-generated from sdk-root/src/data/runtime.sagemaker/2017-05-13/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2017-05-13', 'endpointPrefix' => 'runtime.sagemaker', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceFullName' => 'Amazon SageMaker Runtime', 'serviceId' => 'SageMaker Runtime', 'signatureVersion' => 'v4', 'signingName' => 'sagemaker', 'uid' => 'runtime.sagemaker-2017-05-13', ], 'operations' => [ 'InvokeEndpoint' => [ 'name' => 'InvokeEndpoint', 'http' => [ 'method' => 'POST', 'requestUri' => '/endpoints/{EndpointName}/invocations', ], 'input' => [ 'shape' => 'InvokeEndpointInput', ], 'output' => [ 'shape' => 'InvokeEndpointOutput', ], 'errors' => [ [ 'shape' => 'InternalFailure', ], [ 'shape' => 'ServiceUnavailable', ], [ 'shape' => 'ValidationError', ], [ 'shape' => 'ModelError', ], [ 'shape' => 'InternalDependencyException', ], [ 'shape' => 'ModelNotReadyException', ], ], ], 'InvokeEndpointAsync' => [ 'name' => 'InvokeEndpointAsync', 'http' => [ 'method' => 'POST', 'requestUri' => '/endpoints/{EndpointName}/async-invocations', 'responseCode' => 202, ], 'input' => [ 'shape' => 'InvokeEndpointAsyncInput', ], 'output' => [ 'shape' => 'InvokeEndpointAsyncOutput', ], 'errors' => [ [ 'shape' => 'InternalFailure', ], [ 'shape' => 'ServiceUnavailable', ], [ 'shape' => 'ValidationError', ], ], ], 'InvokeEndpointWithResponseStream' => [ 'name' => 'InvokeEndpointWithResponseStream', 'http' => [ 'method' => 'POST', 'requestUri' => '/endpoints/{EndpointName}/invocations-response-stream', ], 'input' => [ 'shape' => 'InvokeEndpointWithResponseStreamInput', ], 'output' => [ 'shape' => 'InvokeEndpointWithResponseStreamOutput', ], 'errors' => [ [ 'shape' => 'InternalFailure', ], [ 'shape' => 'ServiceUnavailable', ], [ 'shape' => 'ValidationError', ], [ 'shape' => 'ModelError', ], [ 'shape' => 'ModelStreamError', ], [ 'shape' => 'InternalStreamFailure', ], ], ], ], 'shapes' => [ 'BodyBlob' => [ 'type' => 'blob', 'max' => 6291456, 'sensitive' => true, ], 'CustomAttributesHeader' => [ 'type' => 'string', 'max' => 1024, 'pattern' => '\\p{ASCII}*', 'sensitive' => true, ], 'EnableExplanationsHeader' => [ 'type' => 'string', 'max' => 64, 'min' => 1, 'pattern' => '.*', ], 'EndpointName' => [ 'type' => 'string', 'max' => 63, 'pattern' => '^[a-zA-Z0-9](-*[a-zA-Z0-9])*', ], 'ErrorCode' => [ 'type' => 'string', ], 'Header' => [ 'type' => 'string', 'max' => 1024, 'pattern' => '\\p{ASCII}*', ], 'InferenceComponentHeader' => [ 'type' => 'string', 'max' => 63, 'pattern' => '^[a-zA-Z0-9]([\\-a-zA-Z0-9]*[a-zA-Z0-9])?$', ], 'InferenceId' => [ 'type' => 'string', 'max' => 64, 'min' => 1, 'pattern' => '\\A\\S[\\p{Print}]*\\z', ], 'InputLocationHeader' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, 'pattern' => '^(https|s3)://([^/]+)/?(.*)$', ], 'InternalDependencyException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'Message', ], ], 'error' => [ 'httpStatusCode' => 530, ], 'exception' => true, 'fault' => true, 'synthetic' => true, ], 'InternalFailure' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'Message', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, 'fault' => true, 'synthetic' => true, ], 'InternalStreamFailure' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'Message', ], ], 'exception' => true, 'fault' => true, 'synthetic' => true, ], 'InvocationTimeoutSecondsHeader' => [ 'type' => 'integer', 'max' => 3600, 'min' => 1, ], 'InvokeEndpointAsyncInput' => [ 'type' => 'structure', 'required' => [ 'EndpointName', 'InputLocation', ], 'members' => [ 'EndpointName' => [ 'shape' => 'EndpointName', 'location' => 'uri', 'locationName' => 'EndpointName', ], 'ContentType' => [ 'shape' => 'Header', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-Content-Type', ], 'Accept' => [ 'shape' => 'Header', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-Accept', ], 'CustomAttributes' => [ 'shape' => 'CustomAttributesHeader', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-Custom-Attributes', ], 'InferenceId' => [ 'shape' => 'InferenceId', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-Inference-Id', ], 'InputLocation' => [ 'shape' => 'InputLocationHeader', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-InputLocation', ], 'RequestTTLSeconds' => [ 'shape' => 'RequestTTLSecondsHeader', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-RequestTTLSeconds', ], 'InvocationTimeoutSeconds' => [ 'shape' => 'InvocationTimeoutSecondsHeader', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-InvocationTimeoutSeconds', ], ], ], 'InvokeEndpointAsyncOutput' => [ 'type' => 'structure', 'members' => [ 'InferenceId' => [ 'shape' => 'Header', ], 'OutputLocation' => [ 'shape' => 'Header', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-OutputLocation', ], 'FailureLocation' => [ 'shape' => 'Header', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-FailureLocation', ], ], ], 'InvokeEndpointInput' => [ 'type' => 'structure', 'required' => [ 'EndpointName', 'Body', ], 'members' => [ 'EndpointName' => [ 'shape' => 'EndpointName', 'location' => 'uri', 'locationName' => 'EndpointName', ], 'Body' => [ 'shape' => 'BodyBlob', ], 'ContentType' => [ 'shape' => 'Header', 'location' => 'header', 'locationName' => 'Content-Type', ], 'Accept' => [ 'shape' => 'Header', 'location' => 'header', 'locationName' => 'Accept', ], 'CustomAttributes' => [ 'shape' => 'CustomAttributesHeader', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-Custom-Attributes', ], 'TargetModel' => [ 'shape' => 'TargetModelHeader', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-Target-Model', ], 'TargetVariant' => [ 'shape' => 'TargetVariantHeader', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-Target-Variant', ], 'TargetContainerHostname' => [ 'shape' => 'TargetContainerHostnameHeader', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-Target-Container-Hostname', ], 'InferenceId' => [ 'shape' => 'InferenceId', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-Inference-Id', ], 'EnableExplanations' => [ 'shape' => 'EnableExplanationsHeader', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-Enable-Explanations', ], 'InferenceComponentName' => [ 'shape' => 'InferenceComponentHeader', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-Inference-Component', ], ], 'payload' => 'Body', ], 'InvokeEndpointOutput' => [ 'type' => 'structure', 'required' => [ 'Body', ], 'members' => [ 'Body' => [ 'shape' => 'BodyBlob', ], 'ContentType' => [ 'shape' => 'Header', 'location' => 'header', 'locationName' => 'Content-Type', ], 'InvokedProductionVariant' => [ 'shape' => 'Header', 'location' => 'header', 'locationName' => 'x-Amzn-Invoked-Production-Variant', ], 'CustomAttributes' => [ 'shape' => 'CustomAttributesHeader', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-Custom-Attributes', ], ], 'payload' => 'Body', ], 'InvokeEndpointWithResponseStreamInput' => [ 'type' => 'structure', 'required' => [ 'EndpointName', 'Body', ], 'members' => [ 'EndpointName' => [ 'shape' => 'EndpointName', 'location' => 'uri', 'locationName' => 'EndpointName', ], 'Body' => [ 'shape' => 'BodyBlob', ], 'ContentType' => [ 'shape' => 'Header', 'location' => 'header', 'locationName' => 'Content-Type', ], 'Accept' => [ 'shape' => 'Header', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-Accept', ], 'CustomAttributes' => [ 'shape' => 'CustomAttributesHeader', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-Custom-Attributes', ], 'TargetVariant' => [ 'shape' => 'TargetVariantHeader', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-Target-Variant', ], 'TargetContainerHostname' => [ 'shape' => 'TargetContainerHostnameHeader', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-Target-Container-Hostname', ], 'InferenceId' => [ 'shape' => 'InferenceId', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-Inference-Id', ], 'InferenceComponentName' => [ 'shape' => 'InferenceComponentHeader', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-Inference-Component', ], ], 'payload' => 'Body', ], 'InvokeEndpointWithResponseStreamOutput' => [ 'type' => 'structure', 'required' => [ 'Body', ], 'members' => [ 'Body' => [ 'shape' => 'ResponseStream', ], 'ContentType' => [ 'shape' => 'Header', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-Content-Type', ], 'InvokedProductionVariant' => [ 'shape' => 'Header', 'location' => 'header', 'locationName' => 'x-Amzn-Invoked-Production-Variant', ], 'CustomAttributes' => [ 'shape' => 'CustomAttributesHeader', 'location' => 'header', 'locationName' => 'X-Amzn-SageMaker-Custom-Attributes', ], ], 'payload' => 'Body', ], 'LogStreamArn' => [ 'type' => 'string', ], 'Message' => [ 'type' => 'string', 'max' => 2048, ], 'ModelError' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'Message', ], 'OriginalStatusCode' => [ 'shape' => 'StatusCode', ], 'OriginalMessage' => [ 'shape' => 'Message', ], 'LogStreamArn' => [ 'shape' => 'LogStreamArn', ], ], 'error' => [ 'httpStatusCode' => 424, ], 'exception' => true, ], 'ModelNotReadyException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'Message', ], ], 'error' => [ 'httpStatusCode' => 429, ], 'exception' => true, 'synthetic' => true, ], 'ModelStreamError' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'Message', ], 'ErrorCode' => [ 'shape' => 'ErrorCode', ], ], 'exception' => true, 'synthetic' => true, ], 'PartBlob' => [ 'type' => 'blob', 'sensitive' => true, ], 'PayloadPart' => [ 'type' => 'structure', 'members' => [ 'Bytes' => [ 'shape' => 'PartBlob', 'eventpayload' => true, ], ], 'event' => true, ], 'RequestTTLSecondsHeader' => [ 'type' => 'integer', 'max' => 21600, 'min' => 60, ], 'ResponseStream' => [ 'type' => 'structure', 'members' => [ 'PayloadPart' => [ 'shape' => 'PayloadPart', ], 'ModelStreamError' => [ 'shape' => 'ModelStreamError', ], 'InternalStreamFailure' => [ 'shape' => 'InternalStreamFailure', ], ], 'eventstream' => true, ], 'ServiceUnavailable' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'Message', ], ], 'error' => [ 'httpStatusCode' => 503, ], 'exception' => true, 'fault' => true, 'synthetic' => true, ], 'StatusCode' => [ 'type' => 'integer', ], 'TargetContainerHostnameHeader' => [ 'type' => 'string', 'max' => 63, 'pattern' => '^[a-zA-Z0-9](-*[a-zA-Z0-9])*', ], 'TargetModelHeader' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, 'pattern' => '\\A\\S[\\p{Print}]*\\z', ], 'TargetVariantHeader' => [ 'type' => 'string', 'max' => 63, 'pattern' => '^[a-zA-Z0-9](-*[a-zA-Z0-9])*', ], 'ValidationError' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'Message', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, 'synthetic' => true, ], ],];
