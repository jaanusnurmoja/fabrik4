<?php
// This file was auto-generated from sdk-root/src/data/transfer/2018-11-05/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2018-11-05', 'endpointPrefix' => 'transfer', 'jsonVersion' => '1.1', 'protocol' => 'json', 'serviceAbbreviation' => 'AWS Transfer', 'serviceFullName' => 'AWS Transfer Family', 'serviceId' => 'Transfer', 'signatureVersion' => 'v4', 'signingName' => 'transfer', 'targetPrefix' => 'TransferService', 'uid' => 'transfer-2018-11-05', ], 'operations' => [ 'CreateAccess' => [ 'name' => 'CreateAccess', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateAccessRequest', ], 'output' => [ 'shape' => 'CreateAccessResponse', ], 'errors' => [ [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceExistsException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'CreateServer' => [ 'name' => 'CreateServer', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateServerRequest', ], 'output' => [ 'shape' => 'CreateServerResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceExistsException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'CreateUser' => [ 'name' => 'CreateUser', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateUserRequest', ], 'output' => [ 'shape' => 'CreateUserResponse', ], 'errors' => [ [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceExistsException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'DeleteAccess' => [ 'name' => 'DeleteAccess', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteAccessRequest', ], 'errors' => [ [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'DeleteServer' => [ 'name' => 'DeleteServer', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteServerRequest', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'DeleteSshPublicKey' => [ 'name' => 'DeleteSshPublicKey', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteSshPublicKeyRequest', ], 'errors' => [ [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'DeleteUser' => [ 'name' => 'DeleteUser', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteUserRequest', ], 'errors' => [ [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'DescribeAccess' => [ 'name' => 'DescribeAccess', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeAccessRequest', ], 'output' => [ 'shape' => 'DescribeAccessResponse', ], 'errors' => [ [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'DescribeSecurityPolicy' => [ 'name' => 'DescribeSecurityPolicy', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeSecurityPolicyRequest', ], 'output' => [ 'shape' => 'DescribeSecurityPolicyResponse', ], 'errors' => [ [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'DescribeServer' => [ 'name' => 'DescribeServer', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeServerRequest', ], 'output' => [ 'shape' => 'DescribeServerResponse', ], 'errors' => [ [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'DescribeUser' => [ 'name' => 'DescribeUser', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeUserRequest', ], 'output' => [ 'shape' => 'DescribeUserResponse', ], 'errors' => [ [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'ImportSshPublicKey' => [ 'name' => 'ImportSshPublicKey', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ImportSshPublicKeyRequest', ], 'output' => [ 'shape' => 'ImportSshPublicKeyResponse', ], 'errors' => [ [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceExistsException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'ListAccesses' => [ 'name' => 'ListAccesses', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListAccessesRequest', ], 'output' => [ 'shape' => 'ListAccessesResponse', ], 'errors' => [ [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidNextTokenException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'ListSecurityPolicies' => [ 'name' => 'ListSecurityPolicies', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListSecurityPoliciesRequest', ], 'output' => [ 'shape' => 'ListSecurityPoliciesResponse', ], 'errors' => [ [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidNextTokenException', ], [ 'shape' => 'InvalidRequestException', ], ], ], 'ListServers' => [ 'name' => 'ListServers', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListServersRequest', ], 'output' => [ 'shape' => 'ListServersResponse', ], 'errors' => [ [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidNextTokenException', ], [ 'shape' => 'InvalidRequestException', ], ], ], 'ListTagsForResource' => [ 'name' => 'ListTagsForResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListTagsForResourceRequest', ], 'output' => [ 'shape' => 'ListTagsForResourceResponse', ], 'errors' => [ [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidNextTokenException', ], [ 'shape' => 'InvalidRequestException', ], ], ], 'ListUsers' => [ 'name' => 'ListUsers', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListUsersRequest', ], 'output' => [ 'shape' => 'ListUsersResponse', ], 'errors' => [ [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidNextTokenException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'StartServer' => [ 'name' => 'StartServer', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'StartServerRequest', ], 'errors' => [ [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'StopServer' => [ 'name' => 'StopServer', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'StopServerRequest', ], 'errors' => [ [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'TagResource' => [ 'name' => 'TagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'TagResourceRequest', ], 'errors' => [ [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'TestIdentityProvider' => [ 'name' => 'TestIdentityProvider', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'TestIdentityProviderRequest', ], 'output' => [ 'shape' => 'TestIdentityProviderResponse', ], 'errors' => [ [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'UntagResource' => [ 'name' => 'UntagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UntagResourceRequest', ], 'errors' => [ [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'UpdateAccess' => [ 'name' => 'UpdateAccess', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateAccessRequest', ], 'output' => [ 'shape' => 'UpdateAccessResponse', ], 'errors' => [ [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceExistsException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'UpdateServer' => [ 'name' => 'UpdateServer', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateServerRequest', ], 'output' => [ 'shape' => 'UpdateServerResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceExistsException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'UpdateUser' => [ 'name' => 'UpdateUser', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateUserRequest', ], 'output' => [ 'shape' => 'UpdateUserResponse', ], 'errors' => [ [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'InternalServiceError', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], ], ], 'shapes' => [ 'AccessDeniedException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ServiceErrorMessage', ], ], 'exception' => true, 'synthetic' => true, ], 'AddressAllocationId' => [ 'type' => 'string', ], 'AddressAllocationIds' => [ 'type' => 'list', 'member' => [ 'shape' => 'AddressAllocationId', ], ], 'Arn' => [ 'type' => 'string', 'max' => 1600, 'min' => 20, 'pattern' => 'arn:.*', ], 'Certificate' => [ 'type' => 'string', 'max' => 1600, ], 'ConflictException' => [ 'type' => 'structure', 'required' => [ 'Message', ], 'members' => [ 'Message' => [ 'shape' => 'Message', ], ], 'exception' => true, ], 'CreateAccessRequest' => [ 'type' => 'structure', 'required' => [ 'Role', 'ServerId', 'ExternalId', ], 'members' => [ 'HomeDirectory' => [ 'shape' => 'HomeDirectory', ], 'HomeDirectoryType' => [ 'shape' => 'HomeDirectoryType', ], 'HomeDirectoryMappings' => [ 'shape' => 'HomeDirectoryMappings', ], 'Policy' => [ 'shape' => 'Policy', ], 'PosixProfile' => [ 'shape' => 'PosixProfile', ], 'Role' => [ 'shape' => 'Role', ], 'ServerId' => [ 'shape' => 'ServerId', ], 'ExternalId' => [ 'shape' => 'ExternalId', ], ], ], 'CreateAccessResponse' => [ 'type' => 'structure', 'required' => [ 'ServerId', 'ExternalId', ], 'members' => [ 'ServerId' => [ 'shape' => 'ServerId', ], 'ExternalId' => [ 'shape' => 'ExternalId', ], ], ], 'CreateServerRequest' => [ 'type' => 'structure', 'members' => [ 'Certificate' => [ 'shape' => 'Certificate', ], 'Domain' => [ 'shape' => 'Domain', ], 'EndpointDetails' => [ 'shape' => 'EndpointDetails', ], 'EndpointType' => [ 'shape' => 'EndpointType', ], 'HostKey' => [ 'shape' => 'HostKey', ], 'IdentityProviderDetails' => [ 'shape' => 'IdentityProviderDetails', ], 'IdentityProviderType' => [ 'shape' => 'IdentityProviderType', ], 'LoggingRole' => [ 'shape' => 'Role', ], 'Protocols' => [ 'shape' => 'Protocols', ], 'SecurityPolicyName' => [ 'shape' => 'SecurityPolicyName', ], 'Tags' => [ 'shape' => 'Tags', ], ], ], 'CreateServerResponse' => [ 'type' => 'structure', 'required' => [ 'ServerId', ], 'members' => [ 'ServerId' => [ 'shape' => 'ServerId', ], ], ], 'CreateUserRequest' => [ 'type' => 'structure', 'required' => [ 'Role', 'ServerId', 'UserName', ], 'members' => [ 'HomeDirectory' => [ 'shape' => 'HomeDirectory', ], 'HomeDirectoryType' => [ 'shape' => 'HomeDirectoryType', ], 'HomeDirectoryMappings' => [ 'shape' => 'HomeDirectoryMappings', ], 'Policy' => [ 'shape' => 'Policy', ], 'PosixProfile' => [ 'shape' => 'PosixProfile', ], 'Role' => [ 'shape' => 'Role', ], 'ServerId' => [ 'shape' => 'ServerId', ], 'SshPublicKeyBody' => [ 'shape' => 'SshPublicKeyBody', ], 'Tags' => [ 'shape' => 'Tags', ], 'UserName' => [ 'shape' => 'UserName', ], ], ], 'CreateUserResponse' => [ 'type' => 'structure', 'required' => [ 'ServerId', 'UserName', ], 'members' => [ 'ServerId' => [ 'shape' => 'ServerId', ], 'UserName' => [ 'shape' => 'UserName', ], ], ], 'DateImported' => [ 'type' => 'timestamp', ], 'DeleteAccessRequest' => [ 'type' => 'structure', 'required' => [ 'ServerId', 'ExternalId', ], 'members' => [ 'ServerId' => [ 'shape' => 'ServerId', ], 'ExternalId' => [ 'shape' => 'ExternalId', ], ], ], 'DeleteServerRequest' => [ 'type' => 'structure', 'required' => [ 'ServerId', ], 'members' => [ 'ServerId' => [ 'shape' => 'ServerId', ], ], ], 'DeleteSshPublicKeyRequest' => [ 'type' => 'structure', 'required' => [ 'ServerId', 'SshPublicKeyId', 'UserName', ], 'members' => [ 'ServerId' => [ 'shape' => 'ServerId', ], 'SshPublicKeyId' => [ 'shape' => 'SshPublicKeyId', ], 'UserName' => [ 'shape' => 'UserName', ], ], ], 'DeleteUserRequest' => [ 'type' => 'structure', 'required' => [ 'ServerId', 'UserName', ], 'members' => [ 'ServerId' => [ 'shape' => 'ServerId', ], 'UserName' => [ 'shape' => 'UserName', ], ], ], 'DescribeAccessRequest' => [ 'type' => 'structure', 'required' => [ 'ServerId', 'ExternalId', ], 'members' => [ 'ServerId' => [ 'shape' => 'ServerId', ], 'ExternalId' => [ 'shape' => 'ExternalId', ], ], ], 'DescribeAccessResponse' => [ 'type' => 'structure', 'required' => [ 'ServerId', 'Access', ], 'members' => [ 'ServerId' => [ 'shape' => 'ServerId', ], 'Access' => [ 'shape' => 'DescribedAccess', ], ], ], 'DescribeSecurityPolicyRequest' => [ 'type' => 'structure', 'required' => [ 'SecurityPolicyName', ], 'members' => [ 'SecurityPolicyName' => [ 'shape' => 'SecurityPolicyName', ], ], ], 'DescribeSecurityPolicyResponse' => [ 'type' => 'structure', 'required' => [ 'SecurityPolicy', ], 'members' => [ 'SecurityPolicy' => [ 'shape' => 'DescribedSecurityPolicy', ], ], ], 'DescribeServerRequest' => [ 'type' => 'structure', 'required' => [ 'ServerId', ], 'members' => [ 'ServerId' => [ 'shape' => 'ServerId', ], ], ], 'DescribeServerResponse' => [ 'type' => 'structure', 'required' => [ 'Server', ], 'members' => [ 'Server' => [ 'shape' => 'DescribedServer', ], ], ], 'DescribeUserRequest' => [ 'type' => 'structure', 'required' => [ 'ServerId', 'UserName', ], 'members' => [ 'ServerId' => [ 'shape' => 'ServerId', ], 'UserName' => [ 'shape' => 'UserName', ], ], ], 'DescribeUserResponse' => [ 'type' => 'structure', 'required' => [ 'ServerId', 'User', ], 'members' => [ 'ServerId' => [ 'shape' => 'ServerId', ], 'User' => [ 'shape' => 'DescribedUser', ], ], ], 'DescribedAccess' => [ 'type' => 'structure', 'members' => [ 'HomeDirectory' => [ 'shape' => 'HomeDirectory', ], 'HomeDirectoryMappings' => [ 'shape' => 'HomeDirectoryMappings', ], 'HomeDirectoryType' => [ 'shape' => 'HomeDirectoryType', ], 'Policy' => [ 'shape' => 'Policy', ], 'PosixProfile' => [ 'shape' => 'PosixProfile', ], 'Role' => [ 'shape' => 'Role', ], 'ExternalId' => [ 'shape' => 'ExternalId', ], ], ], 'DescribedSecurityPolicy' => [ 'type' => 'structure', 'required' => [ 'SecurityPolicyName', ], 'members' => [ 'Fips' => [ 'shape' => 'Fips', ], 'SecurityPolicyName' => [ 'shape' => 'SecurityPolicyName', ], 'SshCiphers' => [ 'shape' => 'SecurityPolicyOptions', ], 'SshKexs' => [ 'shape' => 'SecurityPolicyOptions', ], 'SshMacs' => [ 'shape' => 'SecurityPolicyOptions', ], 'TlsCiphers' => [ 'shape' => 'SecurityPolicyOptions', ], ], ], 'DescribedServer' => [ 'type' => 'structure', 'required' => [ 'Arn', ], 'members' => [ 'Arn' => [ 'shape' => 'Arn', ], 'Certificate' => [ 'shape' => 'Certificate', ], 'Domain' => [ 'shape' => 'Domain', ], 'EndpointDetails' => [ 'shape' => 'EndpointDetails', ], 'EndpointType' => [ 'shape' => 'EndpointType', ], 'HostKeyFingerprint' => [ 'shape' => 'HostKeyFingerprint', ], 'IdentityProviderDetails' => [ 'shape' => 'IdentityProviderDetails', ], 'IdentityProviderType' => [ 'shape' => 'IdentityProviderType', ], 'LoggingRole' => [ 'shape' => 'Role', ], 'Protocols' => [ 'shape' => 'Protocols', ], 'SecurityPolicyName' => [ 'shape' => 'SecurityPolicyName', ], 'ServerId' => [ 'shape' => 'ServerId', ], 'State' => [ 'shape' => 'State', ], 'Tags' => [ 'shape' => 'Tags', ], 'UserCount' => [ 'shape' => 'UserCount', ], ], ], 'DescribedUser' => [ 'type' => 'structure', 'required' => [ 'Arn', ], 'members' => [ 'Arn' => [ 'shape' => 'Arn', ], 'HomeDirectory' => [ 'shape' => 'HomeDirectory', ], 'HomeDirectoryMappings' => [ 'shape' => 'HomeDirectoryMappings', ], 'HomeDirectoryType' => [ 'shape' => 'HomeDirectoryType', ], 'Policy' => [ 'shape' => 'Policy', ], 'PosixProfile' => [ 'shape' => 'PosixProfile', ], 'Role' => [ 'shape' => 'Role', ], 'SshPublicKeys' => [ 'shape' => 'SshPublicKeys', ], 'Tags' => [ 'shape' => 'Tags', ], 'UserName' => [ 'shape' => 'UserName', ], ], ], 'DirectoryId' => [ 'type' => 'string', 'max' => 12, 'min' => 12, 'pattern' => '^d-[0-9a-f]{10}$', ], 'Domain' => [ 'type' => 'string', 'enum' => [ 'S3', 'EFS', ], ], 'EndpointDetails' => [ 'type' => 'structure', 'members' => [ 'AddressAllocationIds' => [ 'shape' => 'AddressAllocationIds', ], 'SubnetIds' => [ 'shape' => 'SubnetIds', ], 'VpcEndpointId' => [ 'shape' => 'VpcEndpointId', ], 'VpcId' => [ 'shape' => 'VpcId', ], 'SecurityGroupIds' => [ 'shape' => 'SecurityGroupIds', ], ], ], 'EndpointType' => [ 'type' => 'string', 'enum' => [ 'PUBLIC', 'VPC', 'VPC_ENDPOINT', ], ], 'ExternalId' => [ 'type' => 'string', 'max' => 256, 'min' => 1, 'pattern' => '^S-1-[\\d-]+$', ], 'Fips' => [ 'type' => 'boolean', ], 'HomeDirectory' => [ 'type' => 'string', 'max' => 1024, 'pattern' => '^$|/.*', ], 'HomeDirectoryMapEntry' => [ 'type' => 'structure', 'required' => [ 'Entry', 'Target', ], 'members' => [ 'Entry' => [ 'shape' => 'MapEntry', ], 'Target' => [ 'shape' => 'MapTarget', ], ], ], 'HomeDirectoryMappings' => [ 'type' => 'list', 'member' => [ 'shape' => 'HomeDirectoryMapEntry', ], 'max' => 50, 'min' => 1, ], 'HomeDirectoryType' => [ 'type' => 'string', 'enum' => [ 'PATH', 'LOGICAL', ], ], 'HostKey' => [ 'type' => 'string', 'max' => 4096, 'sensitive' => true, ], 'HostKeyFingerprint' => [ 'type' => 'string', ], 'IdentityProviderDetails' => [ 'type' => 'structure', 'members' => [ 'Url' => [ 'shape' => 'Url', ], 'InvocationRole' => [ 'shape' => 'Role', ], 'DirectoryId' => [ 'shape' => 'DirectoryId', ], ], ], 'IdentityProviderType' => [ 'type' => 'string', 'enum' => [ 'SERVICE_MANAGED', 'API_GATEWAY', 'AWS_DIRECTORY_SERVICE', ], ], 'ImportSshPublicKeyRequest' => [ 'type' => 'structure', 'required' => [ 'ServerId', 'SshPublicKeyBody', 'UserName', ], 'members' => [ 'ServerId' => [ 'shape' => 'ServerId', ], 'SshPublicKeyBody' => [ 'shape' => 'SshPublicKeyBody', ], 'UserName' => [ 'shape' => 'UserName', ], ], ], 'ImportSshPublicKeyResponse' => [ 'type' => 'structure', 'required' => [ 'ServerId', 'SshPublicKeyId', 'UserName', ], 'members' => [ 'ServerId' => [ 'shape' => 'ServerId', ], 'SshPublicKeyId' => [ 'shape' => 'SshPublicKeyId', ], 'UserName' => [ 'shape' => 'UserName', ], ], ], 'InternalServiceError' => [ 'type' => 'structure', 'required' => [ 'Message', ], 'members' => [ 'Message' => [ 'shape' => 'Message', ], ], 'exception' => true, 'fault' => true, ], 'InvalidNextTokenException' => [ 'type' => 'structure', 'required' => [ 'Message', ], 'members' => [ 'Message' => [ 'shape' => 'Message', ], ], 'exception' => true, ], 'InvalidRequestException' => [ 'type' => 'structure', 'required' => [ 'Message', ], 'members' => [ 'Message' => [ 'shape' => 'Message', ], ], 'exception' => true, ], 'ListAccessesRequest' => [ 'type' => 'structure', 'required' => [ 'ServerId', ], 'members' => [ 'MaxResults' => [ 'shape' => 'MaxResults', ], 'NextToken' => [ 'shape' => 'NextToken', ], 'ServerId' => [ 'shape' => 'ServerId', ], ], ], 'ListAccessesResponse' => [ 'type' => 'structure', 'required' => [ 'ServerId', 'Accesses', ], 'members' => [ 'NextToken' => [ 'shape' => 'NextToken', ], 'ServerId' => [ 'shape' => 'ServerId', ], 'Accesses' => [ 'shape' => 'ListedAccesses', ], ], ], 'ListSecurityPoliciesRequest' => [ 'type' => 'structure', 'members' => [ 'MaxResults' => [ 'shape' => 'MaxResults', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListSecurityPoliciesResponse' => [ 'type' => 'structure', 'required' => [ 'SecurityPolicyNames', ], 'members' => [ 'NextToken' => [ 'shape' => 'NextToken', ], 'SecurityPolicyNames' => [ 'shape' => 'SecurityPolicyNames', ], ], ], 'ListServersRequest' => [ 'type' => 'structure', 'members' => [ 'MaxResults' => [ 'shape' => 'MaxResults', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListServersResponse' => [ 'type' => 'structure', 'required' => [ 'Servers', ], 'members' => [ 'NextToken' => [ 'shape' => 'NextToken', ], 'Servers' => [ 'shape' => 'ListedServers', ], ], ], 'ListTagsForResourceRequest' => [ 'type' => 'structure', 'required' => [ 'Arn', ], 'members' => [ 'Arn' => [ 'shape' => 'Arn', ], 'MaxResults' => [ 'shape' => 'MaxResults', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListTagsForResourceResponse' => [ 'type' => 'structure', 'members' => [ 'Arn' => [ 'shape' => 'Arn', ], 'NextToken' => [ 'shape' => 'NextToken', ], 'Tags' => [ 'shape' => 'Tags', ], ], ], 'ListUsersRequest' => [ 'type' => 'structure', 'required' => [ 'ServerId', ], 'members' => [ 'MaxResults' => [ 'shape' => 'MaxResults', ], 'NextToken' => [ 'shape' => 'NextToken', ], 'ServerId' => [ 'shape' => 'ServerId', ], ], ], 'ListUsersResponse' => [ 'type' => 'structure', 'required' => [ 'ServerId', 'Users', ], 'members' => [ 'NextToken' => [ 'shape' => 'NextToken', ], 'ServerId' => [ 'shape' => 'ServerId', ], 'Users' => [ 'shape' => 'ListedUsers', ], ], ], 'ListedAccess' => [ 'type' => 'structure', 'members' => [ 'HomeDirectory' => [ 'shape' => 'HomeDirectory', ], 'HomeDirectoryType' => [ 'shape' => 'HomeDirectoryType', ], 'Role' => [ 'shape' => 'Role', ], 'ExternalId' => [ 'shape' => 'ExternalId', ], ], ], 'ListedAccesses' => [ 'type' => 'list', 'member' => [ 'shape' => 'ListedAccess', ], ], 'ListedServer' => [ 'type' => 'structure', 'required' => [ 'Arn', ], 'members' => [ 'Arn' => [ 'shape' => 'Arn', ], 'Domain' => [ 'shape' => 'Domain', ], 'IdentityProviderType' => [ 'shape' => 'IdentityProviderType', ], 'EndpointType' => [ 'shape' => 'EndpointType', ], 'LoggingRole' => [ 'shape' => 'Role', ], 'ServerId' => [ 'shape' => 'ServerId', ], 'State' => [ 'shape' => 'State', ], 'UserCount' => [ 'shape' => 'UserCount', ], ], ], 'ListedServers' => [ 'type' => 'list', 'member' => [ 'shape' => 'ListedServer', ], ], 'ListedUser' => [ 'type' => 'structure', 'required' => [ 'Arn', ], 'members' => [ 'Arn' => [ 'shape' => 'Arn', ], 'HomeDirectory' => [ 'shape' => 'HomeDirectory', ], 'HomeDirectoryType' => [ 'shape' => 'HomeDirectoryType', ], 'Role' => [ 'shape' => 'Role', ], 'SshPublicKeyCount' => [ 'shape' => 'SshPublicKeyCount', ], 'UserName' => [ 'shape' => 'UserName', ], ], ], 'ListedUsers' => [ 'type' => 'list', 'member' => [ 'shape' => 'ListedUser', ], ], 'MapEntry' => [ 'type' => 'string', 'max' => 1024, 'pattern' => '^/.*', ], 'MapTarget' => [ 'type' => 'string', 'max' => 1024, 'pattern' => '^/.*', ], 'MaxResults' => [ 'type' => 'integer', 'max' => 1000, 'min' => 1, ], 'Message' => [ 'type' => 'string', ], 'NextToken' => [ 'type' => 'string', 'max' => 6144, 'min' => 1, ], 'NullableRole' => [ 'type' => 'string', 'max' => 2048, 'pattern' => '^$|arn:.*role/.*', ], 'Policy' => [ 'type' => 'string', 'max' => 2048, ], 'PosixId' => [ 'type' => 'long', 'max' => 4294967295, 'min' => 0, ], 'PosixProfile' => [ 'type' => 'structure', 'required' => [ 'Uid', 'Gid', ], 'members' => [ 'Uid' => [ 'shape' => 'PosixId', ], 'Gid' => [ 'shape' => 'PosixId', ], 'SecondaryGids' => [ 'shape' => 'SecondaryGids', ], ], ], 'Protocol' => [ 'type' => 'string', 'enum' => [ 'SFTP', 'FTP', 'FTPS', ], ], 'Protocols' => [ 'type' => 'list', 'member' => [ 'shape' => 'Protocol', ], 'max' => 3, 'min' => 1, ], 'Resource' => [ 'type' => 'string', ], 'ResourceExistsException' => [ 'type' => 'structure', 'required' => [ 'Message', 'Resource', 'ResourceType', ], 'members' => [ 'Message' => [ 'shape' => 'Message', ], 'Resource' => [ 'shape' => 'Resource', ], 'ResourceType' => [ 'shape' => 'ResourceType', ], ], 'exception' => true, ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'required' => [ 'Message', 'Resource', 'ResourceType', ], 'members' => [ 'Message' => [ 'shape' => 'Message', ], 'Resource' => [ 'shape' => 'Resource', ], 'ResourceType' => [ 'shape' => 'ResourceType', ], ], 'exception' => true, ], 'ResourceType' => [ 'type' => 'string', ], 'Response' => [ 'type' => 'string', ], 'RetryAfterSeconds' => [ 'type' => 'string', ], 'Role' => [ 'type' => 'string', 'max' => 2048, 'min' => 20, 'pattern' => 'arn:.*role/.*', ], 'SecondaryGids' => [ 'type' => 'list', 'member' => [ 'shape' => 'PosixId', ], 'max' => 16, 'min' => 0, ], 'SecurityGroupId' => [ 'type' => 'string', 'max' => 20, 'min' => 11, 'pattern' => '^sg-[0-9a-f]{8,17}$', ], 'SecurityGroupIds' => [ 'type' => 'list', 'member' => [ 'shape' => 'SecurityGroupId', ], ], 'SecurityPolicyName' => [ 'type' => 'string', 'max' => 100, 'pattern' => 'TransferSecurityPolicy-.+', ], 'SecurityPolicyNames' => [ 'type' => 'list', 'member' => [ 'shape' => 'SecurityPolicyName', ], ], 'SecurityPolicyOption' => [ 'type' => 'string', 'max' => 50, ], 'SecurityPolicyOptions' => [ 'type' => 'list', 'member' => [ 'shape' => 'SecurityPolicyOption', ], ], 'ServerId' => [ 'type' => 'string', 'max' => 19, 'min' => 19, 'pattern' => '^s-([0-9a-f]{17})$', ], 'ServiceErrorMessage' => [ 'type' => 'string', ], 'ServiceUnavailableException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ServiceErrorMessage', ], ], 'exception' => true, 'fault' => true, 'synthetic' => true, ], 'SourceIp' => [ 'type' => 'string', 'max' => 32, 'pattern' => '^\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}$', ], 'SshPublicKey' => [ 'type' => 'structure', 'required' => [ 'DateImported', 'SshPublicKeyBody', 'SshPublicKeyId', ], 'members' => [ 'DateImported' => [ 'shape' => 'DateImported', ], 'SshPublicKeyBody' => [ 'shape' => 'SshPublicKeyBody', ], 'SshPublicKeyId' => [ 'shape' => 'SshPublicKeyId', ], ], ], 'SshPublicKeyBody' => [ 'type' => 'string', 'max' => 2048, 'pattern' => '^ssh-rsa\\s+[A-Za-z0-9+/]+[=]{0,3}(\\s+.+)?\\s*$', ], 'SshPublicKeyCount' => [ 'type' => 'integer', ], 'SshPublicKeyId' => [ 'type' => 'string', 'max' => 21, 'min' => 21, 'pattern' => '^key-[0-9a-f]{17}$', ], 'SshPublicKeys' => [ 'type' => 'list', 'member' => [ 'shape' => 'SshPublicKey', ], 'max' => 5, ], 'StartServerRequest' => [ 'type' => 'structure', 'required' => [ 'ServerId', ], 'members' => [ 'ServerId' => [ 'shape' => 'ServerId', ], ], ], 'State' => [ 'type' => 'string', 'enum' => [ 'OFFLINE', 'ONLINE', 'STARTING', 'STOPPING', 'START_FAILED', 'STOP_FAILED', ], ], 'StatusCode' => [ 'type' => 'integer', ], 'StopServerRequest' => [ 'type' => 'structure', 'required' => [ 'ServerId', ], 'members' => [ 'ServerId' => [ 'shape' => 'ServerId', ], ], ], 'SubnetId' => [ 'type' => 'string', ], 'SubnetIds' => [ 'type' => 'list', 'member' => [ 'shape' => 'SubnetId', ], ], 'Tag' => [ 'type' => 'structure', 'required' => [ 'Key', 'Value', ], 'members' => [ 'Key' => [ 'shape' => 'TagKey', ], 'Value' => [ 'shape' => 'TagValue', ], ], ], 'TagKey' => [ 'type' => 'string', 'max' => 128, ], 'TagKeys' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagKey', ], 'max' => 50, 'min' => 1, ], 'TagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'Arn', 'Tags', ], 'members' => [ 'Arn' => [ 'shape' => 'Arn', ], 'Tags' => [ 'shape' => 'Tags', ], ], ], 'TagValue' => [ 'type' => 'string', 'max' => 256, ], 'Tags' => [ 'type' => 'list', 'member' => [ 'shape' => 'Tag', ], 'max' => 50, 'min' => 1, ], 'TestIdentityProviderRequest' => [ 'type' => 'structure', 'required' => [ 'ServerId', 'UserName', ], 'members' => [ 'ServerId' => [ 'shape' => 'ServerId', ], 'ServerProtocol' => [ 'shape' => 'Protocol', ], 'SourceIp' => [ 'shape' => 'SourceIp', ], 'UserName' => [ 'shape' => 'UserName', ], 'UserPassword' => [ 'shape' => 'UserPassword', ], ], ], 'TestIdentityProviderResponse' => [ 'type' => 'structure', 'required' => [ 'StatusCode', 'Url', ], 'members' => [ 'Response' => [ 'shape' => 'Response', ], 'StatusCode' => [ 'shape' => 'StatusCode', ], 'Message' => [ 'shape' => 'Message', ], 'Url' => [ 'shape' => 'Url', ], ], ], 'ThrottlingException' => [ 'type' => 'structure', 'members' => [ 'RetryAfterSeconds' => [ 'shape' => 'RetryAfterSeconds', ], ], 'exception' => true, ], 'UntagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'Arn', 'TagKeys', ], 'members' => [ 'Arn' => [ 'shape' => 'Arn', ], 'TagKeys' => [ 'shape' => 'TagKeys', ], ], ], 'UpdateAccessRequest' => [ 'type' => 'structure', 'required' => [ 'ServerId', 'ExternalId', ], 'members' => [ 'HomeDirectory' => [ 'shape' => 'HomeDirectory', ], 'HomeDirectoryType' => [ 'shape' => 'HomeDirectoryType', ], 'HomeDirectoryMappings' => [ 'shape' => 'HomeDirectoryMappings', ], 'Policy' => [ 'shape' => 'Policy', ], 'PosixProfile' => [ 'shape' => 'PosixProfile', ], 'Role' => [ 'shape' => 'Role', ], 'ServerId' => [ 'shape' => 'ServerId', ], 'ExternalId' => [ 'shape' => 'ExternalId', ], ], ], 'UpdateAccessResponse' => [ 'type' => 'structure', 'required' => [ 'ServerId', 'ExternalId', ], 'members' => [ 'ServerId' => [ 'shape' => 'ServerId', ], 'ExternalId' => [ 'shape' => 'ExternalId', ], ], ], 'UpdateServerRequest' => [ 'type' => 'structure', 'required' => [ 'ServerId', ], 'members' => [ 'Certificate' => [ 'shape' => 'Certificate', ], 'EndpointDetails' => [ 'shape' => 'EndpointDetails', ], 'EndpointType' => [ 'shape' => 'EndpointType', ], 'HostKey' => [ 'shape' => 'HostKey', ], 'IdentityProviderDetails' => [ 'shape' => 'IdentityProviderDetails', ], 'LoggingRole' => [ 'shape' => 'NullableRole', ], 'Protocols' => [ 'shape' => 'Protocols', ], 'SecurityPolicyName' => [ 'shape' => 'SecurityPolicyName', ], 'ServerId' => [ 'shape' => 'ServerId', ], ], ], 'UpdateServerResponse' => [ 'type' => 'structure', 'required' => [ 'ServerId', ], 'members' => [ 'ServerId' => [ 'shape' => 'ServerId', ], ], ], 'UpdateUserRequest' => [ 'type' => 'structure', 'required' => [ 'ServerId', 'UserName', ], 'members' => [ 'HomeDirectory' => [ 'shape' => 'HomeDirectory', ], 'HomeDirectoryType' => [ 'shape' => 'HomeDirectoryType', ], 'HomeDirectoryMappings' => [ 'shape' => 'HomeDirectoryMappings', ], 'Policy' => [ 'shape' => 'Policy', ], 'PosixProfile' => [ 'shape' => 'PosixProfile', ], 'Role' => [ 'shape' => 'Role', ], 'ServerId' => [ 'shape' => 'ServerId', ], 'UserName' => [ 'shape' => 'UserName', ], ], ], 'UpdateUserResponse' => [ 'type' => 'structure', 'required' => [ 'ServerId', 'UserName', ], 'members' => [ 'ServerId' => [ 'shape' => 'ServerId', ], 'UserName' => [ 'shape' => 'UserName', ], ], ], 'Url' => [ 'type' => 'string', 'max' => 255, ], 'UserCount' => [ 'type' => 'integer', ], 'UserName' => [ 'type' => 'string', 'max' => 100, 'min' => 3, 'pattern' => '^[\\w][\\w@.-]{2,99}$', ], 'UserPassword' => [ 'type' => 'string', 'max' => 1024, 'sensitive' => true, ], 'VpcEndpointId' => [ 'type' => 'string', 'max' => 22, 'min' => 22, 'pattern' => '^vpce-[0-9a-f]{17}$', ], 'VpcId' => [ 'type' => 'string', ], ],];
