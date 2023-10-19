<?php
// This file was auto-generated from sdk-root/src/data/s3outposts/2017-07-25/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2017-07-25', 'endpointPrefix' => 's3-outposts', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceAbbreviation' => 'Amazon S3 Outposts', 'serviceFullName' => 'Amazon S3 on Outposts', 'serviceId' => 'S3Outposts', 'signatureVersion' => 'v4', 'signingName' => 's3-outposts', 'uid' => 's3outposts-2017-07-25', ], 'operations' => [ 'CreateEndpoint' => [ 'name' => 'CreateEndpoint', 'http' => [ 'method' => 'POST', 'requestUri' => '/S3Outposts/CreateEndpoint', ], 'input' => [ 'shape' => 'CreateEndpointRequest', ], 'output' => [ 'shape' => 'CreateEndpointResult', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'OutpostOfflineException', ], ], ], 'DeleteEndpoint' => [ 'name' => 'DeleteEndpoint', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/S3Outposts/DeleteEndpoint', ], 'input' => [ 'shape' => 'DeleteEndpointRequest', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'OutpostOfflineException', ], ], ], 'ListEndpoints' => [ 'name' => 'ListEndpoints', 'http' => [ 'method' => 'GET', 'requestUri' => '/S3Outposts/ListEndpoints', ], 'input' => [ 'shape' => 'ListEndpointsRequest', ], 'output' => [ 'shape' => 'ListEndpointsResult', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'ListOutpostsWithS3' => [ 'name' => 'ListOutpostsWithS3', 'http' => [ 'method' => 'GET', 'requestUri' => '/S3Outposts/ListOutpostsWithS3', ], 'input' => [ 'shape' => 'ListOutpostsWithS3Request', ], 'output' => [ 'shape' => 'ListOutpostsWithS3Result', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'ListSharedEndpoints' => [ 'name' => 'ListSharedEndpoints', 'http' => [ 'method' => 'GET', 'requestUri' => '/S3Outposts/ListSharedEndpoints', ], 'input' => [ 'shape' => 'ListSharedEndpointsRequest', ], 'output' => [ 'shape' => 'ListSharedEndpointsResult', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], ], ], ], 'shapes' => [ 'AccessDeniedException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 403, ], 'exception' => true, ], 'AwsAccountId' => [ 'type' => 'string', 'pattern' => '^\\d{12}$', ], 'CapacityInBytes' => [ 'type' => 'long', ], 'CidrBlock' => [ 'type' => 'string', ], 'ConflictException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 409, ], 'exception' => true, ], 'CreateEndpointRequest' => [ 'type' => 'structure', 'required' => [ 'OutpostId', 'SubnetId', 'SecurityGroupId', ], 'members' => [ 'OutpostId' => [ 'shape' => 'OutpostId', ], 'SubnetId' => [ 'shape' => 'SubnetId', ], 'SecurityGroupId' => [ 'shape' => 'SecurityGroupId', ], 'AccessType' => [ 'shape' => 'EndpointAccessType', ], 'CustomerOwnedIpv4Pool' => [ 'shape' => 'CustomerOwnedIpv4Pool', ], ], ], 'CreateEndpointResult' => [ 'type' => 'structure', 'members' => [ 'EndpointArn' => [ 'shape' => 'EndpointArn', ], ], ], 'CreationTime' => [ 'type' => 'timestamp', ], 'CustomerOwnedIpv4Pool' => [ 'type' => 'string', 'pattern' => '^ipv4pool-coip-([0-9a-f]{17})$', ], 'DeleteEndpointRequest' => [ 'type' => 'structure', 'required' => [ 'EndpointId', 'OutpostId', ], 'members' => [ 'EndpointId' => [ 'shape' => 'EndpointId', 'location' => 'querystring', 'locationName' => 'endpointId', ], 'OutpostId' => [ 'shape' => 'OutpostId', 'location' => 'querystring', 'locationName' => 'outpostId', ], ], ], 'Endpoint' => [ 'type' => 'structure', 'members' => [ 'EndpointArn' => [ 'shape' => 'EndpointArn', ], 'OutpostsId' => [ 'shape' => 'OutpostId', ], 'CidrBlock' => [ 'shape' => 'CidrBlock', ], 'Status' => [ 'shape' => 'EndpointStatus', ], 'CreationTime' => [ 'shape' => 'CreationTime', ], 'NetworkInterfaces' => [ 'shape' => 'NetworkInterfaces', ], 'VpcId' => [ 'shape' => 'VpcId', ], 'SubnetId' => [ 'shape' => 'SubnetId', ], 'SecurityGroupId' => [ 'shape' => 'SecurityGroupId', ], 'AccessType' => [ 'shape' => 'EndpointAccessType', ], 'CustomerOwnedIpv4Pool' => [ 'shape' => 'CustomerOwnedIpv4Pool', ], 'FailedReason' => [ 'shape' => 'FailedReason', ], ], ], 'EndpointAccessType' => [ 'type' => 'string', 'enum' => [ 'Private', 'CustomerOwnedIp', ], ], 'EndpointArn' => [ 'type' => 'string', 'pattern' => '^arn:(aws|aws-cn|aws-us-gov|aws-iso|aws-iso-b):s3-outposts:[a-z\\-0-9]*:[0-9]{12}:outpost/(op-[a-f0-9]{17}|ec2)/endpoint/[a-zA-Z0-9]{19}$', ], 'EndpointId' => [ 'type' => 'string', 'pattern' => '^[a-zA-Z0-9]{19}$', ], 'EndpointStatus' => [ 'type' => 'string', 'enum' => [ 'Pending', 'Available', 'Deleting', 'Create_Failed', 'Delete_Failed', ], ], 'Endpoints' => [ 'type' => 'list', 'member' => [ 'shape' => 'Endpoint', ], ], 'ErrorCode' => [ 'type' => 'string', ], 'ErrorMessage' => [ 'type' => 'string', ], 'FailedReason' => [ 'type' => 'structure', 'members' => [ 'ErrorCode' => [ 'shape' => 'ErrorCode', ], 'Message' => [ 'shape' => 'Message', ], ], ], 'InternalServerException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, 'fault' => true, ], 'ListEndpointsRequest' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'NextToken', 'location' => 'querystring', 'locationName' => 'nextToken', ], 'MaxResults' => [ 'shape' => 'MaxResults', 'location' => 'querystring', 'locationName' => 'maxResults', ], ], ], 'ListEndpointsResult' => [ 'type' => 'structure', 'members' => [ 'Endpoints' => [ 'shape' => 'Endpoints', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListOutpostsWithS3Request' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'NextToken', 'location' => 'querystring', 'locationName' => 'nextToken', ], 'MaxResults' => [ 'shape' => 'MaxResults', 'location' => 'querystring', 'locationName' => 'maxResults', ], ], ], 'ListOutpostsWithS3Result' => [ 'type' => 'structure', 'members' => [ 'Outposts' => [ 'shape' => 'Outposts', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListSharedEndpointsRequest' => [ 'type' => 'structure', 'required' => [ 'OutpostId', ], 'members' => [ 'NextToken' => [ 'shape' => 'NextToken', 'location' => 'querystring', 'locationName' => 'nextToken', ], 'MaxResults' => [ 'shape' => 'MaxResults', 'location' => 'querystring', 'locationName' => 'maxResults', ], 'OutpostId' => [ 'shape' => 'OutpostId', 'location' => 'querystring', 'locationName' => 'outpostId', ], ], ], 'ListSharedEndpointsResult' => [ 'type' => 'structure', 'members' => [ 'Endpoints' => [ 'shape' => 'Endpoints', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'MaxResults' => [ 'type' => 'integer', 'max' => 100, 'min' => 0, ], 'Message' => [ 'type' => 'string', ], 'NetworkInterface' => [ 'type' => 'structure', 'members' => [ 'NetworkInterfaceId' => [ 'shape' => 'NetworkInterfaceId', ], ], ], 'NetworkInterfaceId' => [ 'type' => 'string', ], 'NetworkInterfaces' => [ 'type' => 'list', 'member' => [ 'shape' => 'NetworkInterface', ], ], 'NextToken' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, 'pattern' => '^[A-Za-z0-9\\+\\:\\/\\=\\?\\#-_]+$', ], 'Outpost' => [ 'type' => 'structure', 'members' => [ 'OutpostArn' => [ 'shape' => 'OutpostArn', ], 'OutpostId' => [ 'shape' => 'OutpostId', ], 'OwnerId' => [ 'shape' => 'AwsAccountId', ], 'CapacityInBytes' => [ 'shape' => 'CapacityInBytes', ], ], ], 'OutpostArn' => [ 'type' => 'string', 'pattern' => '^arn:(aws|aws-cn|aws-us-gov|aws-iso|aws-iso-b):outposts:[a-z\\-0-9]*:[0-9]{12}:outpost/(op-[a-f0-9]{17}|ec2)$', ], 'OutpostId' => [ 'type' => 'string', 'pattern' => '^(op-[a-f0-9]{17}|\\d{12}|ec2)$', ], 'OutpostOfflineException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'Outposts' => [ 'type' => 'list', 'member' => [ 'shape' => 'Outpost', ], ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 404, ], 'exception' => true, ], 'SecurityGroupId' => [ 'type' => 'string', 'pattern' => '^sg-([0-9a-f]{8}|[0-9a-f]{17})$', ], 'SubnetId' => [ 'type' => 'string', 'pattern' => '^subnet-([0-9a-f]{8}|[0-9a-f]{17})$', ], 'ThrottlingException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 429, ], 'exception' => true, ], 'ValidationException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'VpcId' => [ 'type' => 'string', ], ],];
