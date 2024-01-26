<?php
// This file was auto-generated from sdk-root/src/data/repostspace/2022-05-13/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2022-05-13', 'endpointPrefix' => 'repostspace', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceFullName' => 'AWS re:Post Private', 'serviceId' => 'repostspace', 'signatureVersion' => 'v4', 'signingName' => 'repostspace', 'uid' => 'repostspace-2022-05-13', ], 'operations' => [ 'CreateSpace' => [ 'name' => 'CreateSpace', 'http' => [ 'method' => 'POST', 'requestUri' => '/spaces', 'responseCode' => 200, ], 'input' => [ 'shape' => 'CreateSpaceInput', ], 'output' => [ 'shape' => 'CreateSpaceOutput', ], 'errors' => [ [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServerException', ], ], 'idempotent' => true, ], 'DeleteSpace' => [ 'name' => 'DeleteSpace', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/spaces/{spaceId}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DeleteSpaceInput', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServerException', ], ], 'idempotent' => true, ], 'DeregisterAdmin' => [ 'name' => 'DeregisterAdmin', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/spaces/{spaceId}/admins/{adminId}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DeregisterAdminInput', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServerException', ], ], 'idempotent' => true, ], 'GetSpace' => [ 'name' => 'GetSpace', 'http' => [ 'method' => 'GET', 'requestUri' => '/spaces/{spaceId}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetSpaceInput', ], 'output' => [ 'shape' => 'GetSpaceOutput', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServerException', ], ], ], 'ListSpaces' => [ 'name' => 'ListSpaces', 'http' => [ 'method' => 'GET', 'requestUri' => '/spaces', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListSpacesInput', ], 'output' => [ 'shape' => 'ListSpacesOutput', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServerException', ], ], ], 'ListTagsForResource' => [ 'name' => 'ListTagsForResource', 'http' => [ 'method' => 'GET', 'requestUri' => '/tags/{resourceArn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListTagsForResourceRequest', ], 'output' => [ 'shape' => 'ListTagsForResourceResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServerException', ], ], ], 'RegisterAdmin' => [ 'name' => 'RegisterAdmin', 'http' => [ 'method' => 'POST', 'requestUri' => '/spaces/{spaceId}/admins/{adminId}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'RegisterAdminInput', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServerException', ], ], 'idempotent' => true, ], 'SendInvites' => [ 'name' => 'SendInvites', 'http' => [ 'method' => 'POST', 'requestUri' => '/spaces/{spaceId}/invite', 'responseCode' => 200, ], 'input' => [ 'shape' => 'SendInvitesInput', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServerException', ], ], 'idempotent' => true, ], 'TagResource' => [ 'name' => 'TagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/tags/{resourceArn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'TagResourceRequest', ], 'output' => [ 'shape' => 'TagResourceResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServerException', ], ], 'idempotent' => true, ], 'UntagResource' => [ 'name' => 'UntagResource', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/tags/{resourceArn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'UntagResourceRequest', ], 'output' => [ 'shape' => 'UntagResourceResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServerException', ], ], 'idempotent' => true, ], 'UpdateSpace' => [ 'name' => 'UpdateSpace', 'http' => [ 'method' => 'PUT', 'requestUri' => '/spaces/{spaceId}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'UpdateSpaceInput', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServerException', ], ], 'idempotent' => true, ], ], 'shapes' => [ 'AccessDeniedException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 403, 'senderFault' => true, ], 'exception' => true, ], 'AccessorId' => [ 'type' => 'string', ], 'AccessorIdList' => [ 'type' => 'list', 'member' => [ 'shape' => 'AccessorId', ], 'max' => 1000, 'min' => 0, ], 'AdminId' => [ 'type' => 'string', ], 'Arn' => [ 'type' => 'string', 'max' => 2048, 'min' => 20, ], 'ClientId' => [ 'type' => 'string', ], 'ConfigurationStatus' => [ 'type' => 'string', 'enum' => [ 'CONFIGURED', 'UNCONFIGURED', ], ], 'ConflictException' => [ 'type' => 'structure', 'required' => [ 'message', 'resourceId', 'resourceType', ], 'members' => [ 'message' => [ 'shape' => 'String', ], 'resourceId' => [ 'shape' => 'String', ], 'resourceType' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 409, 'senderFault' => true, ], 'exception' => true, ], 'ContentSize' => [ 'type' => 'long', 'box' => true, ], 'CreateSpaceInput' => [ 'type' => 'structure', 'required' => [ 'name', 'subdomain', 'tier', ], 'members' => [ 'description' => [ 'shape' => 'SpaceDescription', ], 'name' => [ 'shape' => 'SpaceName', ], 'roleArn' => [ 'shape' => 'Arn', ], 'subdomain' => [ 'shape' => 'SpaceSubdomain', ], 'tags' => [ 'shape' => 'Tags', ], 'tier' => [ 'shape' => 'TierLevel', ], 'userKMSKey' => [ 'shape' => 'KMSKey', ], ], ], 'CreateSpaceOutput' => [ 'type' => 'structure', 'required' => [ 'spaceId', ], 'members' => [ 'spaceId' => [ 'shape' => 'SpaceId', ], ], ], 'DeleteSpaceInput' => [ 'type' => 'structure', 'required' => [ 'spaceId', ], 'members' => [ 'spaceId' => [ 'shape' => 'SpaceId', 'location' => 'uri', 'locationName' => 'spaceId', ], ], ], 'DeregisterAdminInput' => [ 'type' => 'structure', 'required' => [ 'adminId', 'spaceId', ], 'members' => [ 'adminId' => [ 'shape' => 'AdminId', 'location' => 'uri', 'locationName' => 'adminId', ], 'spaceId' => [ 'shape' => 'SpaceId', 'location' => 'uri', 'locationName' => 'spaceId', ], ], ], 'GetSpaceInput' => [ 'type' => 'structure', 'required' => [ 'spaceId', ], 'members' => [ 'spaceId' => [ 'shape' => 'SpaceId', 'location' => 'uri', 'locationName' => 'spaceId', ], ], ], 'GetSpaceOutput' => [ 'type' => 'structure', 'required' => [ 'arn', 'clientId', 'configurationStatus', 'createDateTime', 'name', 'randomDomain', 'spaceId', 'status', 'storageLimit', 'tier', 'vanityDomain', 'vanityDomainStatus', ], 'members' => [ 'arn' => [ 'shape' => 'Arn', ], 'clientId' => [ 'shape' => 'ClientId', ], 'configurationStatus' => [ 'shape' => 'ConfigurationStatus', ], 'contentSize' => [ 'shape' => 'ContentSize', ], 'createDateTime' => [ 'shape' => 'SyntheticTimestamp_date_time', ], 'customerRoleArn' => [ 'shape' => 'Arn', ], 'deleteDateTime' => [ 'shape' => 'SyntheticTimestamp_date_time', ], 'description' => [ 'shape' => 'SpaceDescription', ], 'groupAdmins' => [ 'shape' => 'GroupAdmins', ], 'name' => [ 'shape' => 'SpaceName', ], 'randomDomain' => [ 'shape' => 'Url', ], 'spaceId' => [ 'shape' => 'SpaceId', ], 'status' => [ 'shape' => 'ProvisioningStatus', ], 'storageLimit' => [ 'shape' => 'StorageLimit', ], 'tier' => [ 'shape' => 'TierLevel', ], 'userAdmins' => [ 'shape' => 'UserAdmins', ], 'userCount' => [ 'shape' => 'UserCount', ], 'userKMSKey' => [ 'shape' => 'KMSKey', ], 'vanityDomain' => [ 'shape' => 'Url', ], 'vanityDomainStatus' => [ 'shape' => 'VanityDomainStatus', ], ], ], 'GroupAdmins' => [ 'type' => 'list', 'member' => [ 'shape' => 'AdminId', ], ], 'Integer' => [ 'type' => 'integer', 'box' => true, ], 'InternalServerException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], 'retryAfterSeconds' => [ 'shape' => 'Integer', 'location' => 'header', 'locationName' => 'Retry-After', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, 'fault' => true, 'retryable' => [ 'throttling' => false, ], ], 'InviteBody' => [ 'type' => 'string', 'max' => 600, 'min' => 1, 'sensitive' => true, ], 'InviteTitle' => [ 'type' => 'string', 'max' => 200, 'min' => 1, 'sensitive' => true, ], 'KMSKey' => [ 'type' => 'string', ], 'ListSpacesInput' => [ 'type' => 'structure', 'members' => [ 'maxResults' => [ 'shape' => 'ListSpacesLimit', 'location' => 'querystring', 'locationName' => 'maxResults', ], 'nextToken' => [ 'shape' => 'String', 'location' => 'querystring', 'locationName' => 'nextToken', ], ], ], 'ListSpacesLimit' => [ 'type' => 'integer', 'box' => true, 'max' => 100, 'min' => 1, ], 'ListSpacesOutput' => [ 'type' => 'structure', 'required' => [ 'spaces', ], 'members' => [ 'nextToken' => [ 'shape' => 'String', ], 'spaces' => [ 'shape' => 'SpacesList', ], ], ], 'ListTagsForResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', 'location' => 'uri', 'locationName' => 'resourceArn', ], ], ], 'ListTagsForResourceResponse' => [ 'type' => 'structure', 'members' => [ 'tags' => [ 'shape' => 'Tags', ], ], ], 'ProvisioningStatus' => [ 'type' => 'string', 'max' => 30, 'min' => 1, ], 'RegisterAdminInput' => [ 'type' => 'structure', 'required' => [ 'adminId', 'spaceId', ], 'members' => [ 'adminId' => [ 'shape' => 'AdminId', 'location' => 'uri', 'locationName' => 'adminId', ], 'spaceId' => [ 'shape' => 'SpaceId', 'location' => 'uri', 'locationName' => 'spaceId', ], ], ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'required' => [ 'message', 'resourceId', 'resourceType', ], 'members' => [ 'message' => [ 'shape' => 'String', ], 'resourceId' => [ 'shape' => 'String', ], 'resourceType' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 404, 'senderFault' => true, ], 'exception' => true, ], 'SendInvitesInput' => [ 'type' => 'structure', 'required' => [ 'accessorIds', 'body', 'spaceId', 'title', ], 'members' => [ 'accessorIds' => [ 'shape' => 'AccessorIdList', ], 'body' => [ 'shape' => 'InviteBody', ], 'spaceId' => [ 'shape' => 'SpaceId', 'location' => 'uri', 'locationName' => 'spaceId', ], 'title' => [ 'shape' => 'InviteTitle', ], ], ], 'ServiceQuotaExceededException' => [ 'type' => 'structure', 'required' => [ 'message', 'quotaCode', 'resourceId', 'resourceType', 'serviceCode', ], 'members' => [ 'message' => [ 'shape' => 'String', ], 'quotaCode' => [ 'shape' => 'String', ], 'resourceId' => [ 'shape' => 'String', ], 'resourceType' => [ 'shape' => 'String', ], 'serviceCode' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 402, 'senderFault' => true, ], 'exception' => true, ], 'SpaceData' => [ 'type' => 'structure', 'required' => [ 'arn', 'configurationStatus', 'createDateTime', 'name', 'randomDomain', 'spaceId', 'status', 'storageLimit', 'tier', 'vanityDomain', 'vanityDomainStatus', ], 'members' => [ 'arn' => [ 'shape' => 'Arn', ], 'configurationStatus' => [ 'shape' => 'ConfigurationStatus', ], 'contentSize' => [ 'shape' => 'ContentSize', ], 'createDateTime' => [ 'shape' => 'SyntheticTimestamp_date_time', ], 'deleteDateTime' => [ 'shape' => 'SyntheticTimestamp_date_time', ], 'description' => [ 'shape' => 'SpaceDescription', ], 'name' => [ 'shape' => 'SpaceName', ], 'randomDomain' => [ 'shape' => 'Url', ], 'spaceId' => [ 'shape' => 'SpaceId', ], 'status' => [ 'shape' => 'ProvisioningStatus', ], 'storageLimit' => [ 'shape' => 'StorageLimit', ], 'tier' => [ 'shape' => 'TierLevel', ], 'userCount' => [ 'shape' => 'UserCount', ], 'userKMSKey' => [ 'shape' => 'KMSKey', ], 'vanityDomain' => [ 'shape' => 'Url', ], 'vanityDomainStatus' => [ 'shape' => 'VanityDomainStatus', ], ], ], 'SpaceDescription' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'sensitive' => true, ], 'SpaceId' => [ 'type' => 'string', ], 'SpaceName' => [ 'type' => 'string', 'max' => 30, 'min' => 1, 'sensitive' => true, ], 'SpaceSubdomain' => [ 'type' => 'string', 'max' => 63, 'min' => 1, ], 'SpacesList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SpaceData', ], ], 'StorageLimit' => [ 'type' => 'long', 'box' => true, ], 'String' => [ 'type' => 'string', ], 'SyntheticTimestamp_date_time' => [ 'type' => 'timestamp', 'timestampFormat' => 'iso8601', ], 'TagKey' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^(?!aws:)[a-zA-Z+-=._:/]+$', ], 'TagKeyList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagKey', ], 'max' => 50, 'min' => 1, ], 'TagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'tags', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', 'location' => 'uri', 'locationName' => 'resourceArn', ], 'tags' => [ 'shape' => 'Tags', ], ], ], 'TagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'TagValue' => [ 'type' => 'string', 'max' => 256, 'min' => 1, ], 'Tags' => [ 'type' => 'map', 'key' => [ 'shape' => 'TagKey', ], 'value' => [ 'shape' => 'TagValue', ], 'sensitive' => true, ], 'ThrottlingException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], 'quotaCode' => [ 'shape' => 'String', ], 'retryAfterSeconds' => [ 'shape' => 'Integer', 'location' => 'header', 'locationName' => 'Retry-After', ], 'serviceCode' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 429, 'senderFault' => true, ], 'exception' => true, 'retryable' => [ 'throttling' => true, ], ], 'TierLevel' => [ 'type' => 'string', 'enum' => [ 'BASIC', 'STANDARD', ], ], 'UntagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'tagKeys', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', 'location' => 'uri', 'locationName' => 'resourceArn', ], 'tagKeys' => [ 'shape' => 'TagKeyList', 'location' => 'querystring', 'locationName' => 'tagKeys', ], ], ], 'UntagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'UpdateSpaceInput' => [ 'type' => 'structure', 'required' => [ 'spaceId', ], 'members' => [ 'description' => [ 'shape' => 'SpaceDescription', ], 'roleArn' => [ 'shape' => 'Arn', ], 'spaceId' => [ 'shape' => 'SpaceId', 'location' => 'uri', 'locationName' => 'spaceId', ], 'tier' => [ 'shape' => 'TierLevel', ], ], ], 'Url' => [ 'type' => 'string', ], 'UserAdmins' => [ 'type' => 'list', 'member' => [ 'shape' => 'AdminId', ], ], 'UserCount' => [ 'type' => 'integer', 'box' => true, ], 'ValidationException' => [ 'type' => 'structure', 'required' => [ 'message', 'reason', ], 'members' => [ 'fieldList' => [ 'shape' => 'ValidationExceptionFieldList', ], 'message' => [ 'shape' => 'String', ], 'reason' => [ 'shape' => 'ValidationExceptionReason', ], ], 'error' => [ 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'ValidationExceptionField' => [ 'type' => 'structure', 'required' => [ 'message', 'name', ], 'members' => [ 'message' => [ 'shape' => 'String', ], 'name' => [ 'shape' => 'String', ], ], ], 'ValidationExceptionFieldList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ValidationExceptionField', ], ], 'ValidationExceptionReason' => [ 'type' => 'string', 'enum' => [ 'unknownOperation', 'cannotParse', 'fieldValidationFailed', 'other', ], ], 'VanityDomainStatus' => [ 'type' => 'string', 'enum' => [ 'PENDING', 'APPROVED', 'UNAPPROVED', ], ], ],];
