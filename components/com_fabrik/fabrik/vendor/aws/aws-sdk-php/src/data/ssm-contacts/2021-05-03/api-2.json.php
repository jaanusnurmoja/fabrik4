<?php
// This file was auto-generated from sdk-root/src/data/ssm-contacts/2021-05-03/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2021-05-03', 'endpointPrefix' => 'ssm-contacts', 'jsonVersion' => '1.1', 'protocol' => 'json', 'serviceAbbreviation' => 'SSM Contacts', 'serviceFullName' => 'AWS Systems Manager Incident Manager Contacts', 'serviceId' => 'SSM Contacts', 'signatureVersion' => 'v4', 'signingName' => 'ssm-contacts', 'targetPrefix' => 'SSMContacts', 'uid' => 'ssm-contacts-2021-05-03', ], 'operations' => [ 'AcceptPage' => [ 'name' => 'AcceptPage', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AcceptPageRequest', ], 'output' => [ 'shape' => 'AcceptPageResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'ActivateContactChannel' => [ 'name' => 'ActivateContactChannel', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ActivateContactChannelRequest', ], 'output' => [ 'shape' => 'ActivateContactChannelResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'CreateContact' => [ 'name' => 'CreateContact', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateContactRequest', ], 'output' => [ 'shape' => 'CreateContactResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'DataEncryptionException', ], ], ], 'CreateContactChannel' => [ 'name' => 'CreateContactChannel', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateContactChannelRequest', ], 'output' => [ 'shape' => 'CreateContactChannelResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'DataEncryptionException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'DeactivateContactChannel' => [ 'name' => 'DeactivateContactChannel', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeactivateContactChannelRequest', ], 'output' => [ 'shape' => 'DeactivateContactChannelResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'DeleteContact' => [ 'name' => 'DeleteContact', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteContactRequest', ], 'output' => [ 'shape' => 'DeleteContactResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'DeleteContactChannel' => [ 'name' => 'DeleteContactChannel', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteContactChannelRequest', ], 'output' => [ 'shape' => 'DeleteContactChannelResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'DescribeEngagement' => [ 'name' => 'DescribeEngagement', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeEngagementRequest', ], 'output' => [ 'shape' => 'DescribeEngagementResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'DataEncryptionException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'DescribePage' => [ 'name' => 'DescribePage', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribePageRequest', ], 'output' => [ 'shape' => 'DescribePageResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'DataEncryptionException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'GetContact' => [ 'name' => 'GetContact', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetContactRequest', ], 'output' => [ 'shape' => 'GetContactResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'DataEncryptionException', ], ], ], 'GetContactChannel' => [ 'name' => 'GetContactChannel', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetContactChannelRequest', ], 'output' => [ 'shape' => 'GetContactChannelResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'DataEncryptionException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'GetContactPolicy' => [ 'name' => 'GetContactPolicy', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetContactPolicyRequest', ], 'output' => [ 'shape' => 'GetContactPolicyResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'ListContactChannels' => [ 'name' => 'ListContactChannels', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListContactChannelsRequest', ], 'output' => [ 'shape' => 'ListContactChannelsResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'DataEncryptionException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'ListContacts' => [ 'name' => 'ListContacts', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListContactsRequest', ], 'output' => [ 'shape' => 'ListContactsResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'ListEngagements' => [ 'name' => 'ListEngagements', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListEngagementsRequest', ], 'output' => [ 'shape' => 'ListEngagementsResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'ListPageReceipts' => [ 'name' => 'ListPageReceipts', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListPageReceiptsRequest', ], 'output' => [ 'shape' => 'ListPageReceiptsResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'ListPagesByContact' => [ 'name' => 'ListPagesByContact', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListPagesByContactRequest', ], 'output' => [ 'shape' => 'ListPagesByContactResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'ListPagesByEngagement' => [ 'name' => 'ListPagesByEngagement', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListPagesByEngagementRequest', ], 'output' => [ 'shape' => 'ListPagesByEngagementResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'ListTagsForResource' => [ 'name' => 'ListTagsForResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListTagsForResourceRequest', ], 'output' => [ 'shape' => 'ListTagsForResourceResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], ], ], 'PutContactPolicy' => [ 'name' => 'PutContactPolicy', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'PutContactPolicyRequest', ], 'output' => [ 'shape' => 'PutContactPolicyResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalServerException', ], ], ], 'SendActivationCode' => [ 'name' => 'SendActivationCode', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'SendActivationCodeRequest', ], 'output' => [ 'shape' => 'SendActivationCodeResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'DataEncryptionException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'StartEngagement' => [ 'name' => 'StartEngagement', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'StartEngagementRequest', ], 'output' => [ 'shape' => 'StartEngagementResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'DataEncryptionException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], 'StopEngagement' => [ 'name' => 'StopEngagement', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'StopEngagementRequest', ], 'output' => [ 'shape' => 'StopEngagementResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], ], ], 'TagResource' => [ 'name' => 'TagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'TagResourceRequest', ], 'output' => [ 'shape' => 'TagResourceResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'ValidationException', ], ], ], 'UntagResource' => [ 'name' => 'UntagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UntagResourceRequest', ], 'output' => [ 'shape' => 'UntagResourceResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], ], ], 'UpdateContact' => [ 'name' => 'UpdateContact', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateContactRequest', ], 'output' => [ 'shape' => 'UpdateContactResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'DataEncryptionException', ], ], ], 'UpdateContactChannel' => [ 'name' => 'UpdateContactChannel', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateContactChannelRequest', ], 'output' => [ 'shape' => 'UpdateContactChannelResult', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'DataEncryptionException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], ], ], ], 'shapes' => [ 'AcceptCode' => [ 'type' => 'string', 'max' => 10, 'min' => 6, 'pattern' => '^[0-9]*$', ], 'AcceptPageRequest' => [ 'type' => 'structure', 'required' => [ 'PageId', 'AcceptType', 'AcceptCode', ], 'members' => [ 'PageId' => [ 'shape' => 'SsmContactsArn', ], 'ContactChannelId' => [ 'shape' => 'SsmContactsArn', ], 'AcceptType' => [ 'shape' => 'AcceptType', ], 'Note' => [ 'shape' => 'ReceiptInfo', ], 'AcceptCode' => [ 'shape' => 'AcceptCode', ], ], ], 'AcceptPageResult' => [ 'type' => 'structure', 'members' => [], ], 'AcceptType' => [ 'type' => 'string', 'enum' => [ 'DELIVERED', 'READ', ], ], 'AccessDeniedException' => [ 'type' => 'structure', 'required' => [ 'Message', ], 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'ActivateContactChannelRequest' => [ 'type' => 'structure', 'required' => [ 'ContactChannelId', 'ActivationCode', ], 'members' => [ 'ContactChannelId' => [ 'shape' => 'SsmContactsArn', ], 'ActivationCode' => [ 'shape' => 'ActivationCode', ], ], ], 'ActivateContactChannelResult' => [ 'type' => 'structure', 'members' => [], ], 'ActivationCode' => [ 'type' => 'string', 'max' => 10, 'min' => 6, 'pattern' => '^[0-9]*$', ], 'ActivationStatus' => [ 'type' => 'string', 'enum' => [ 'ACTIVATED', 'NOT_ACTIVATED', ], ], 'AmazonResourceName' => [ 'type' => 'string', 'max' => 1011, 'min' => 1, ], 'ChannelName' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^[a-zA-Z0-9_\\-\\s\\.]*$', ], 'ChannelTargetInfo' => [ 'type' => 'structure', 'required' => [ 'ContactChannelId', ], 'members' => [ 'ContactChannelId' => [ 'shape' => 'SsmContactsArn', ], 'RetryIntervalInMinutes' => [ 'shape' => 'RetryIntervalInMinutes', ], ], ], 'ChannelType' => [ 'type' => 'string', 'enum' => [ 'SMS', 'VOICE', 'EMAIL', ], ], 'ConflictException' => [ 'type' => 'structure', 'required' => [ 'Message', 'ResourceId', 'ResourceType', ], 'members' => [ 'Message' => [ 'shape' => 'String', ], 'ResourceId' => [ 'shape' => 'String', ], 'ResourceType' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'Contact' => [ 'type' => 'structure', 'required' => [ 'ContactArn', 'Alias', 'Type', ], 'members' => [ 'ContactArn' => [ 'shape' => 'SsmContactsArn', ], 'Alias' => [ 'shape' => 'ContactAlias', ], 'DisplayName' => [ 'shape' => 'ContactName', ], 'Type' => [ 'shape' => 'ContactType', ], ], ], 'ContactAlias' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^[a-z0-9_\\-]*$', ], 'ContactChannel' => [ 'type' => 'structure', 'required' => [ 'ContactChannelArn', 'ContactArn', 'Name', 'DeliveryAddress', 'ActivationStatus', ], 'members' => [ 'ContactChannelArn' => [ 'shape' => 'SsmContactsArn', ], 'ContactArn' => [ 'shape' => 'SsmContactsArn', ], 'Name' => [ 'shape' => 'ChannelName', ], 'Type' => [ 'shape' => 'ChannelType', ], 'DeliveryAddress' => [ 'shape' => 'ContactChannelAddress', ], 'ActivationStatus' => [ 'shape' => 'ActivationStatus', ], ], ], 'ContactChannelAddress' => [ 'type' => 'structure', 'members' => [ 'SimpleAddress' => [ 'shape' => 'SimpleAddress', ], ], ], 'ContactChannelList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ContactChannel', ], ], 'ContactName' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^[a-zA-Z0-9_\\-\\s\\.]*$', ], 'ContactTargetInfo' => [ 'type' => 'structure', 'required' => [ 'IsEssential', ], 'members' => [ 'ContactId' => [ 'shape' => 'SsmContactsArn', ], 'IsEssential' => [ 'shape' => 'IsEssential', ], ], ], 'ContactType' => [ 'type' => 'string', 'enum' => [ 'PERSONAL', 'ESCALATION', ], ], 'ContactsList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Contact', ], ], 'Content' => [ 'type' => 'string', 'max' => 8192, 'min' => 1, 'pattern' => '^[.\\s\\S]*$', ], 'CreateContactChannelRequest' => [ 'type' => 'structure', 'required' => [ 'ContactId', 'Name', 'Type', 'DeliveryAddress', ], 'members' => [ 'ContactId' => [ 'shape' => 'SsmContactsArn', ], 'Name' => [ 'shape' => 'ChannelName', ], 'Type' => [ 'shape' => 'ChannelType', ], 'DeliveryAddress' => [ 'shape' => 'ContactChannelAddress', ], 'DeferActivation' => [ 'shape' => 'DeferActivation', ], 'IdempotencyToken' => [ 'shape' => 'IdempotencyToken', 'idempotencyToken' => true, ], ], ], 'CreateContactChannelResult' => [ 'type' => 'structure', 'required' => [ 'ContactChannelArn', ], 'members' => [ 'ContactChannelArn' => [ 'shape' => 'SsmContactsArn', ], ], ], 'CreateContactRequest' => [ 'type' => 'structure', 'required' => [ 'Alias', 'Type', 'Plan', ], 'members' => [ 'Alias' => [ 'shape' => 'ContactAlias', ], 'DisplayName' => [ 'shape' => 'ContactName', ], 'Type' => [ 'shape' => 'ContactType', ], 'Plan' => [ 'shape' => 'Plan', ], 'Tags' => [ 'shape' => 'TagsList', ], 'IdempotencyToken' => [ 'shape' => 'IdempotencyToken', 'idempotencyToken' => true, ], ], ], 'CreateContactResult' => [ 'type' => 'structure', 'required' => [ 'ContactArn', ], 'members' => [ 'ContactArn' => [ 'shape' => 'SsmContactsArn', ], ], ], 'DataEncryptionException' => [ 'type' => 'structure', 'required' => [ 'Message', ], 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'DateTime' => [ 'type' => 'timestamp', ], 'DeactivateContactChannelRequest' => [ 'type' => 'structure', 'required' => [ 'ContactChannelId', ], 'members' => [ 'ContactChannelId' => [ 'shape' => 'SsmContactsArn', ], ], ], 'DeactivateContactChannelResult' => [ 'type' => 'structure', 'members' => [], ], 'DeferActivation' => [ 'type' => 'boolean', 'box' => true, ], 'DeleteContactChannelRequest' => [ 'type' => 'structure', 'required' => [ 'ContactChannelId', ], 'members' => [ 'ContactChannelId' => [ 'shape' => 'SsmContactsArn', ], ], ], 'DeleteContactChannelResult' => [ 'type' => 'structure', 'members' => [], ], 'DeleteContactRequest' => [ 'type' => 'structure', 'required' => [ 'ContactId', ], 'members' => [ 'ContactId' => [ 'shape' => 'SsmContactsArn', ], ], ], 'DeleteContactResult' => [ 'type' => 'structure', 'members' => [], ], 'DescribeEngagementRequest' => [ 'type' => 'structure', 'required' => [ 'EngagementId', ], 'members' => [ 'EngagementId' => [ 'shape' => 'SsmContactsArn', ], ], ], 'DescribeEngagementResult' => [ 'type' => 'structure', 'required' => [ 'ContactArn', 'EngagementArn', 'Sender', 'Subject', 'Content', ], 'members' => [ 'ContactArn' => [ 'shape' => 'SsmContactsArn', ], 'EngagementArn' => [ 'shape' => 'SsmContactsArn', ], 'Sender' => [ 'shape' => 'Sender', ], 'Subject' => [ 'shape' => 'Subject', ], 'Content' => [ 'shape' => 'Content', ], 'PublicSubject' => [ 'shape' => 'PublicSubject', ], 'PublicContent' => [ 'shape' => 'PublicContent', ], 'IncidentId' => [ 'shape' => 'IncidentId', ], 'StartTime' => [ 'shape' => 'DateTime', ], 'StopTime' => [ 'shape' => 'DateTime', ], ], ], 'DescribePageRequest' => [ 'type' => 'structure', 'required' => [ 'PageId', ], 'members' => [ 'PageId' => [ 'shape' => 'SsmContactsArn', ], ], ], 'DescribePageResult' => [ 'type' => 'structure', 'required' => [ 'PageArn', 'EngagementArn', 'ContactArn', 'Sender', 'Subject', 'Content', ], 'members' => [ 'PageArn' => [ 'shape' => 'SsmContactsArn', ], 'EngagementArn' => [ 'shape' => 'SsmContactsArn', ], 'ContactArn' => [ 'shape' => 'SsmContactsArn', ], 'Sender' => [ 'shape' => 'Sender', ], 'Subject' => [ 'shape' => 'Subject', ], 'Content' => [ 'shape' => 'Content', ], 'PublicSubject' => [ 'shape' => 'PublicSubject', ], 'PublicContent' => [ 'shape' => 'PublicContent', ], 'IncidentId' => [ 'shape' => 'IncidentId', ], 'SentTime' => [ 'shape' => 'DateTime', ], 'ReadTime' => [ 'shape' => 'DateTime', ], 'DeliveryTime' => [ 'shape' => 'DateTime', ], ], ], 'Engagement' => [ 'type' => 'structure', 'required' => [ 'EngagementArn', 'ContactArn', 'Sender', ], 'members' => [ 'EngagementArn' => [ 'shape' => 'SsmContactsArn', ], 'ContactArn' => [ 'shape' => 'SsmContactsArn', ], 'Sender' => [ 'shape' => 'Sender', ], 'IncidentId' => [ 'shape' => 'IncidentId', ], 'StartTime' => [ 'shape' => 'DateTime', ], 'StopTime' => [ 'shape' => 'DateTime', ], ], ], 'EngagementsList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Engagement', ], ], 'GetContactChannelRequest' => [ 'type' => 'structure', 'required' => [ 'ContactChannelId', ], 'members' => [ 'ContactChannelId' => [ 'shape' => 'SsmContactsArn', ], ], ], 'GetContactChannelResult' => [ 'type' => 'structure', 'required' => [ 'ContactArn', 'ContactChannelArn', 'Name', 'Type', 'DeliveryAddress', ], 'members' => [ 'ContactArn' => [ 'shape' => 'SsmContactsArn', ], 'ContactChannelArn' => [ 'shape' => 'SsmContactsArn', ], 'Name' => [ 'shape' => 'ChannelName', ], 'Type' => [ 'shape' => 'ChannelType', ], 'DeliveryAddress' => [ 'shape' => 'ContactChannelAddress', ], 'ActivationStatus' => [ 'shape' => 'ActivationStatus', ], ], ], 'GetContactPolicyRequest' => [ 'type' => 'structure', 'required' => [ 'ContactArn', ], 'members' => [ 'ContactArn' => [ 'shape' => 'SsmContactsArn', ], ], ], 'GetContactPolicyResult' => [ 'type' => 'structure', 'members' => [ 'ContactArn' => [ 'shape' => 'SsmContactsArn', ], 'Policy' => [ 'shape' => 'Policy', ], ], ], 'GetContactRequest' => [ 'type' => 'structure', 'required' => [ 'ContactId', ], 'members' => [ 'ContactId' => [ 'shape' => 'SsmContactsArn', ], ], ], 'GetContactResult' => [ 'type' => 'structure', 'required' => [ 'ContactArn', 'Alias', 'Type', 'Plan', ], 'members' => [ 'ContactArn' => [ 'shape' => 'SsmContactsArn', ], 'Alias' => [ 'shape' => 'ContactAlias', ], 'DisplayName' => [ 'shape' => 'ContactName', ], 'Type' => [ 'shape' => 'ContactType', ], 'Plan' => [ 'shape' => 'Plan', ], ], ], 'IdempotencyToken' => [ 'type' => 'string', 'max' => 2048, 'pattern' => '^[\\\\\\/a-zA-Z0-9_+=\\-]*$', ], 'IncidentId' => [ 'type' => 'string', 'max' => 1024, 'pattern' => '^[\\\\a-zA-Z0-9_@#%*+=:?.\\/!\\s-]*$', ], 'InternalServerException' => [ 'type' => 'structure', 'required' => [ 'Message', ], 'members' => [ 'Message' => [ 'shape' => 'String', ], 'RetryAfterSeconds' => [ 'shape' => 'RetryAfterSeconds', ], ], 'exception' => true, 'fault' => true, ], 'IsEssential' => [ 'type' => 'boolean', 'box' => true, ], 'ListContactChannelsRequest' => [ 'type' => 'structure', 'required' => [ 'ContactId', ], 'members' => [ 'ContactId' => [ 'shape' => 'SsmContactsArn', ], 'NextToken' => [ 'shape' => 'PaginationToken', ], 'MaxResults' => [ 'shape' => 'MaxResults', ], ], ], 'ListContactChannelsResult' => [ 'type' => 'structure', 'required' => [ 'ContactChannels', ], 'members' => [ 'NextToken' => [ 'shape' => 'PaginationToken', ], 'ContactChannels' => [ 'shape' => 'ContactChannelList', ], ], ], 'ListContactsRequest' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'PaginationToken', ], 'MaxResults' => [ 'shape' => 'MaxResults', ], 'AliasPrefix' => [ 'shape' => 'ContactAlias', ], 'Type' => [ 'shape' => 'ContactType', ], ], ], 'ListContactsResult' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'PaginationToken', ], 'Contacts' => [ 'shape' => 'ContactsList', ], ], ], 'ListEngagementsRequest' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'PaginationToken', ], 'MaxResults' => [ 'shape' => 'MaxResults', ], 'IncidentId' => [ 'shape' => 'IncidentId', ], 'TimeRangeValue' => [ 'shape' => 'TimeRange', ], ], ], 'ListEngagementsResult' => [ 'type' => 'structure', 'required' => [ 'Engagements', ], 'members' => [ 'NextToken' => [ 'shape' => 'PaginationToken', ], 'Engagements' => [ 'shape' => 'EngagementsList', ], ], ], 'ListPageReceiptsRequest' => [ 'type' => 'structure', 'required' => [ 'PageId', ], 'members' => [ 'PageId' => [ 'shape' => 'SsmContactsArn', ], 'NextToken' => [ 'shape' => 'PaginationToken', ], 'MaxResults' => [ 'shape' => 'MaxResults', ], ], ], 'ListPageReceiptsResult' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'PaginationToken', ], 'Receipts' => [ 'shape' => 'ReceiptsList', ], ], ], 'ListPagesByContactRequest' => [ 'type' => 'structure', 'required' => [ 'ContactId', ], 'members' => [ 'ContactId' => [ 'shape' => 'SsmContactsArn', ], 'NextToken' => [ 'shape' => 'PaginationToken', ], 'MaxResults' => [ 'shape' => 'MaxResults', ], ], ], 'ListPagesByContactResult' => [ 'type' => 'structure', 'required' => [ 'Pages', ], 'members' => [ 'NextToken' => [ 'shape' => 'PaginationToken', ], 'Pages' => [ 'shape' => 'PagesList', ], ], ], 'ListPagesByEngagementRequest' => [ 'type' => 'structure', 'required' => [ 'EngagementId', ], 'members' => [ 'EngagementId' => [ 'shape' => 'SsmContactsArn', ], 'NextToken' => [ 'shape' => 'PaginationToken', ], 'MaxResults' => [ 'shape' => 'MaxResults', ], ], ], 'ListPagesByEngagementResult' => [ 'type' => 'structure', 'required' => [ 'Pages', ], 'members' => [ 'NextToken' => [ 'shape' => 'PaginationToken', ], 'Pages' => [ 'shape' => 'PagesList', ], ], ], 'ListTagsForResourceRequest' => [ 'type' => 'structure', 'required' => [ 'ResourceARN', ], 'members' => [ 'ResourceARN' => [ 'shape' => 'AmazonResourceName', ], ], ], 'ListTagsForResourceResult' => [ 'type' => 'structure', 'members' => [ 'Tags' => [ 'shape' => 'TagsList', ], ], ], 'MaxResults' => [ 'type' => 'integer', 'box' => true, 'max' => 1024, 'min' => 0, ], 'Page' => [ 'type' => 'structure', 'required' => [ 'PageArn', 'EngagementArn', 'ContactArn', 'Sender', ], 'members' => [ 'PageArn' => [ 'shape' => 'SsmContactsArn', ], 'EngagementArn' => [ 'shape' => 'SsmContactsArn', ], 'ContactArn' => [ 'shape' => 'SsmContactsArn', ], 'Sender' => [ 'shape' => 'Sender', ], 'IncidentId' => [ 'shape' => 'IncidentId', ], 'SentTime' => [ 'shape' => 'DateTime', ], 'DeliveryTime' => [ 'shape' => 'DateTime', ], 'ReadTime' => [ 'shape' => 'DateTime', ], ], ], 'PagesList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Page', ], ], 'PaginationToken' => [ 'type' => 'string', 'max' => 2048, 'pattern' => '^[\\\\\\/a-zA-Z0-9_+=\\-]*$', ], 'Plan' => [ 'type' => 'structure', 'required' => [ 'Stages', ], 'members' => [ 'Stages' => [ 'shape' => 'StagesList', ], ], ], 'Policy' => [ 'type' => 'string', 'max' => 395000, 'min' => 1, 'pattern' => '.*\\S.*', ], 'PublicContent' => [ 'type' => 'string', 'max' => 8192, 'min' => 1, 'pattern' => '^[.\\s\\S]*$', ], 'PublicSubject' => [ 'type' => 'string', 'max' => 2048, 'min' => 1, 'pattern' => '^[.\\s\\S]*$', ], 'PutContactPolicyRequest' => [ 'type' => 'structure', 'required' => [ 'ContactArn', 'Policy', ], 'members' => [ 'ContactArn' => [ 'shape' => 'SsmContactsArn', ], 'Policy' => [ 'shape' => 'Policy', ], ], ], 'PutContactPolicyResult' => [ 'type' => 'structure', 'members' => [], ], 'Receipt' => [ 'type' => 'structure', 'required' => [ 'ReceiptType', 'ReceiptTime', ], 'members' => [ 'ContactChannelArn' => [ 'shape' => 'SsmContactsArn', ], 'ReceiptType' => [ 'shape' => 'ReceiptType', ], 'ReceiptInfo' => [ 'shape' => 'ReceiptInfo', ], 'ReceiptTime' => [ 'shape' => 'DateTime', ], ], ], 'ReceiptInfo' => [ 'type' => 'string', 'max' => 2048, 'min' => 1, 'pattern' => '^[.\\s\\S]*$', ], 'ReceiptType' => [ 'type' => 'string', 'enum' => [ 'DELIVERED', 'ERROR', 'READ', 'SENT', 'STOP', ], ], 'ReceiptsList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Receipt', ], ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'required' => [ 'Message', 'ResourceId', 'ResourceType', ], 'members' => [ 'Message' => [ 'shape' => 'String', ], 'ResourceId' => [ 'shape' => 'String', ], 'ResourceType' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'RetryAfterSeconds' => [ 'type' => 'integer', ], 'RetryIntervalInMinutes' => [ 'type' => 'integer', 'box' => true, 'max' => 60, 'min' => 0, ], 'SendActivationCodeRequest' => [ 'type' => 'structure', 'required' => [ 'ContactChannelId', ], 'members' => [ 'ContactChannelId' => [ 'shape' => 'SsmContactsArn', ], ], ], 'SendActivationCodeResult' => [ 'type' => 'structure', 'members' => [], ], 'Sender' => [ 'type' => 'string', 'max' => 255, 'pattern' => '^[\\\\a-zA-Z0-9_@#%*+=:?.\\/!\\s-]*$', ], 'ServiceQuotaExceededException' => [ 'type' => 'structure', 'required' => [ 'Message', 'QuotaCode', 'ServiceCode', ], 'members' => [ 'Message' => [ 'shape' => 'String', ], 'ResourceId' => [ 'shape' => 'String', ], 'ResourceType' => [ 'shape' => 'String', ], 'QuotaCode' => [ 'shape' => 'String', ], 'ServiceCode' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'SimpleAddress' => [ 'type' => 'string', 'max' => 320, 'min' => 1, ], 'SsmContactsArn' => [ 'type' => 'string', 'max' => 2048, 'min' => 1, 'pattern' => 'arn:(aws|aws-cn|aws-us-gov):ssm-contacts:[-\\w+=\\/,.@]*:[0-9]+:([\\w+=\\/,.@:-]+)*', ], 'Stage' => [ 'type' => 'structure', 'required' => [ 'DurationInMinutes', 'Targets', ], 'members' => [ 'DurationInMinutes' => [ 'shape' => 'StageDurationInMins', ], 'Targets' => [ 'shape' => 'TargetsList', ], ], ], 'StageDurationInMins' => [ 'type' => 'integer', 'box' => true, 'max' => 30, 'min' => 0, ], 'StagesList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Stage', ], ], 'StartEngagementRequest' => [ 'type' => 'structure', 'required' => [ 'ContactId', 'Sender', 'Subject', 'Content', ], 'members' => [ 'ContactId' => [ 'shape' => 'SsmContactsArn', ], 'Sender' => [ 'shape' => 'Sender', ], 'Subject' => [ 'shape' => 'Subject', ], 'Content' => [ 'shape' => 'Content', ], 'PublicSubject' => [ 'shape' => 'PublicSubject', ], 'PublicContent' => [ 'shape' => 'PublicContent', ], 'IncidentId' => [ 'shape' => 'IncidentId', ], 'IdempotencyToken' => [ 'shape' => 'IdempotencyToken', 'idempotencyToken' => true, ], ], ], 'StartEngagementResult' => [ 'type' => 'structure', 'required' => [ 'EngagementArn', ], 'members' => [ 'EngagementArn' => [ 'shape' => 'SsmContactsArn', ], ], ], 'StopEngagementRequest' => [ 'type' => 'structure', 'required' => [ 'EngagementId', ], 'members' => [ 'EngagementId' => [ 'shape' => 'SsmContactsArn', ], 'Reason' => [ 'shape' => 'StopReason', ], ], ], 'StopEngagementResult' => [ 'type' => 'structure', 'members' => [], ], 'StopReason' => [ 'type' => 'string', 'max' => 255, 'pattern' => '^[.\\s\\S]*$', ], 'String' => [ 'type' => 'string', ], 'Subject' => [ 'type' => 'string', 'max' => 2048, 'min' => 1, 'pattern' => '^[.\\s\\S]*$', ], 'Tag' => [ 'type' => 'structure', 'members' => [ 'Key' => [ 'shape' => 'TagKey', ], 'Value' => [ 'shape' => 'TagValue', ], ], ], 'TagKey' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^[\\\\\\/a-zA-Z0-9_+=\\-]*$', ], 'TagKeyList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagKey', ], 'max' => 200, 'min' => 0, ], 'TagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'ResourceARN', 'Tags', ], 'members' => [ 'ResourceARN' => [ 'shape' => 'AmazonResourceName', ], 'Tags' => [ 'shape' => 'TagsList', ], ], ], 'TagResourceResult' => [ 'type' => 'structure', 'members' => [], ], 'TagValue' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^[\\p{L}\\p{Z}\\p{N}_.:\\/=+\\-@]*$', ], 'TagsList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Tag', ], 'max' => 50, 'min' => 0, ], 'Target' => [ 'type' => 'structure', 'members' => [ 'ChannelTargetInfo' => [ 'shape' => 'ChannelTargetInfo', ], 'ContactTargetInfo' => [ 'shape' => 'ContactTargetInfo', ], ], ], 'TargetsList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Target', ], ], 'ThrottlingException' => [ 'type' => 'structure', 'required' => [ 'Message', ], 'members' => [ 'Message' => [ 'shape' => 'String', ], 'QuotaCode' => [ 'shape' => 'String', ], 'ServiceCode' => [ 'shape' => 'String', ], 'RetryAfterSeconds' => [ 'shape' => 'RetryAfterSeconds', ], ], 'exception' => true, ], 'TimeRange' => [ 'type' => 'structure', 'members' => [ 'StartTime' => [ 'shape' => 'DateTime', ], 'EndTime' => [ 'shape' => 'DateTime', ], ], ], 'UntagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'ResourceARN', 'TagKeys', ], 'members' => [ 'ResourceARN' => [ 'shape' => 'AmazonResourceName', ], 'TagKeys' => [ 'shape' => 'TagKeyList', ], ], ], 'UntagResourceResult' => [ 'type' => 'structure', 'members' => [], ], 'UpdateContactChannelRequest' => [ 'type' => 'structure', 'required' => [ 'ContactChannelId', ], 'members' => [ 'ContactChannelId' => [ 'shape' => 'SsmContactsArn', ], 'Name' => [ 'shape' => 'ChannelName', ], 'DeliveryAddress' => [ 'shape' => 'ContactChannelAddress', ], ], ], 'UpdateContactChannelResult' => [ 'type' => 'structure', 'members' => [], ], 'UpdateContactRequest' => [ 'type' => 'structure', 'required' => [ 'ContactId', ], 'members' => [ 'ContactId' => [ 'shape' => 'SsmContactsArn', ], 'DisplayName' => [ 'shape' => 'ContactName', ], 'Plan' => [ 'shape' => 'Plan', ], ], ], 'UpdateContactResult' => [ 'type' => 'structure', 'members' => [], ], 'ValidationException' => [ 'type' => 'structure', 'required' => [ 'Message', ], 'members' => [ 'Message' => [ 'shape' => 'String', ], 'Reason' => [ 'shape' => 'ValidationExceptionReason', ], 'Fields' => [ 'shape' => 'ValidationExceptionFieldList', ], ], 'exception' => true, ], 'ValidationExceptionField' => [ 'type' => 'structure', 'required' => [ 'Name', 'Message', ], 'members' => [ 'Name' => [ 'shape' => 'String', ], 'Message' => [ 'shape' => 'String', ], ], ], 'ValidationExceptionFieldList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ValidationExceptionField', ], ], 'ValidationExceptionReason' => [ 'type' => 'string', 'enum' => [ 'UNKNOWN_OPERATION', 'CANNOT_PARSE', 'FIELD_VALIDATION_FAILED', 'OTHER', ], ], ],];
