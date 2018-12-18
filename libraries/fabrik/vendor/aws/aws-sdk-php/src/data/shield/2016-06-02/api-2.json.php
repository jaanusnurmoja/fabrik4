<?php
// This file was auto-generated from sdk-root/src/data/shield/2016-06-02/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2016-06-02', 'endpointPrefix' => 'shield', 'jsonVersion' => '1.1', 'protocol' => 'json', 'serviceAbbreviation' => 'AWS Shield', 'serviceFullName' => 'AWS Shield', 'serviceId' => 'Shield', 'signatureVersion' => 'v4', 'targetPrefix' => 'AWSShield_20160616', 'uid' => 'shield-2016-06-02', ], 'operations' => [ 'AssociateDRTLogBucket' => [ 'name' => 'AssociateDRTLogBucket', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AssociateDRTLogBucketRequest', ], 'output' => [ 'shape' => 'AssociateDRTLogBucketResponse', ], 'errors' => [ [ 'shape' => 'InternalErrorException', ], [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'NoAssociatedRoleException', ], [ 'shape' => 'LimitsExceededException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'AccessDeniedForDependencyException', ], [ 'shape' => 'OptimisticLockException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'AssociateDRTRole' => [ 'name' => 'AssociateDRTRole', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AssociateDRTRoleRequest', ], 'output' => [ 'shape' => 'AssociateDRTRoleResponse', ], 'errors' => [ [ 'shape' => 'InternalErrorException', ], [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'AccessDeniedForDependencyException', ], [ 'shape' => 'OptimisticLockException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'CreateProtection' => [ 'name' => 'CreateProtection', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateProtectionRequest', ], 'output' => [ 'shape' => 'CreateProtectionResponse', ], 'errors' => [ [ 'shape' => 'InternalErrorException', ], [ 'shape' => 'InvalidResourceException', ], [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'LimitsExceededException', ], [ 'shape' => 'ResourceAlreadyExistsException', ], [ 'shape' => 'OptimisticLockException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'CreateSubscription' => [ 'name' => 'CreateSubscription', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateSubscriptionRequest', ], 'output' => [ 'shape' => 'CreateSubscriptionResponse', ], 'errors' => [ [ 'shape' => 'InternalErrorException', ], [ 'shape' => 'ResourceAlreadyExistsException', ], ], ], 'DeleteProtection' => [ 'name' => 'DeleteProtection', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteProtectionRequest', ], 'output' => [ 'shape' => 'DeleteProtectionResponse', ], 'errors' => [ [ 'shape' => 'InternalErrorException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'OptimisticLockException', ], ], ], 'DeleteSubscription' => [ 'name' => 'DeleteSubscription', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteSubscriptionRequest', ], 'output' => [ 'shape' => 'DeleteSubscriptionResponse', ], 'errors' => [ [ 'shape' => 'InternalErrorException', ], [ 'shape' => 'LockedSubscriptionException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'deprecated' => true, ], 'DescribeAttack' => [ 'name' => 'DescribeAttack', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeAttackRequest', ], 'output' => [ 'shape' => 'DescribeAttackResponse', ], 'errors' => [ [ 'shape' => 'InternalErrorException', ], [ 'shape' => 'AccessDeniedException', ], ], ], 'DescribeDRTAccess' => [ 'name' => 'DescribeDRTAccess', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeDRTAccessRequest', ], 'output' => [ 'shape' => 'DescribeDRTAccessResponse', ], 'errors' => [ [ 'shape' => 'InternalErrorException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'DescribeEmergencyContactSettings' => [ 'name' => 'DescribeEmergencyContactSettings', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeEmergencyContactSettingsRequest', ], 'output' => [ 'shape' => 'DescribeEmergencyContactSettingsResponse', ], 'errors' => [ [ 'shape' => 'InternalErrorException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'DescribeProtection' => [ 'name' => 'DescribeProtection', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeProtectionRequest', ], 'output' => [ 'shape' => 'DescribeProtectionResponse', ], 'errors' => [ [ 'shape' => 'InternalErrorException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'DescribeSubscription' => [ 'name' => 'DescribeSubscription', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeSubscriptionRequest', ], 'output' => [ 'shape' => 'DescribeSubscriptionResponse', ], 'errors' => [ [ 'shape' => 'InternalErrorException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'DisassociateDRTLogBucket' => [ 'name' => 'DisassociateDRTLogBucket', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DisassociateDRTLogBucketRequest', ], 'output' => [ 'shape' => 'DisassociateDRTLogBucketResponse', ], 'errors' => [ [ 'shape' => 'InternalErrorException', ], [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'NoAssociatedRoleException', ], [ 'shape' => 'AccessDeniedForDependencyException', ], [ 'shape' => 'OptimisticLockException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'DisassociateDRTRole' => [ 'name' => 'DisassociateDRTRole', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DisassociateDRTRoleRequest', ], 'output' => [ 'shape' => 'DisassociateDRTRoleResponse', ], 'errors' => [ [ 'shape' => 'InternalErrorException', ], [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'OptimisticLockException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'GetSubscriptionState' => [ 'name' => 'GetSubscriptionState', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetSubscriptionStateRequest', ], 'output' => [ 'shape' => 'GetSubscriptionStateResponse', ], 'errors' => [ [ 'shape' => 'InternalErrorException', ], ], ], 'ListAttacks' => [ 'name' => 'ListAttacks', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListAttacksRequest', ], 'output' => [ 'shape' => 'ListAttacksResponse', ], 'errors' => [ [ 'shape' => 'InternalErrorException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'InvalidOperationException', ], ], ], 'ListProtections' => [ 'name' => 'ListProtections', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListProtectionsRequest', ], 'output' => [ 'shape' => 'ListProtectionsResponse', ], 'errors' => [ [ 'shape' => 'InternalErrorException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidPaginationTokenException', ], ], ], 'UpdateEmergencyContactSettings' => [ 'name' => 'UpdateEmergencyContactSettings', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateEmergencyContactSettingsRequest', ], 'output' => [ 'shape' => 'UpdateEmergencyContactSettingsResponse', ], 'errors' => [ [ 'shape' => 'InternalErrorException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'OptimisticLockException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'UpdateSubscription' => [ 'name' => 'UpdateSubscription', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateSubscriptionRequest', ], 'output' => [ 'shape' => 'UpdateSubscriptionResponse', ], 'errors' => [ [ 'shape' => 'InternalErrorException', ], [ 'shape' => 'LockedSubscriptionException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'OptimisticLockException', ], ], ], ], 'shapes' => [ 'AccessDeniedException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'exception' => true, ], 'AccessDeniedForDependencyException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'exception' => true, ], 'AssociateDRTLogBucketRequest' => [ 'type' => 'structure', 'required' => [ 'LogBucket', ], 'members' => [ 'LogBucket' => [ 'shape' => 'LogBucket', ], ], ], 'AssociateDRTLogBucketResponse' => [ 'type' => 'structure', 'members' => [], ], 'AssociateDRTRoleRequest' => [ 'type' => 'structure', 'required' => [ 'RoleArn', ], 'members' => [ 'RoleArn' => [ 'shape' => 'RoleArn', ], ], ], 'AssociateDRTRoleResponse' => [ 'type' => 'structure', 'members' => [], ], 'AttackDetail' => [ 'type' => 'structure', 'members' => [ 'AttackId' => [ 'shape' => 'AttackId', ], 'ResourceArn' => [ 'shape' => 'ResourceArn', ], 'SubResources' => [ 'shape' => 'SubResourceSummaryList', ], 'StartTime' => [ 'shape' => 'AttackTimestamp', ], 'EndTime' => [ 'shape' => 'AttackTimestamp', ], 'AttackCounters' => [ 'shape' => 'SummarizedCounterList', ], 'AttackProperties' => [ 'shape' => 'AttackProperties', ], 'Mitigations' => [ 'shape' => 'MitigationList', ], ], ], 'AttackId' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '[a-zA-Z0-9\\\\-]*', ], 'AttackLayer' => [ 'type' => 'string', 'enum' => [ 'NETWORK', 'APPLICATION', ], ], 'AttackProperties' => [ 'type' => 'list', 'member' => [ 'shape' => 'AttackProperty', ], ], 'AttackProperty' => [ 'type' => 'structure', 'members' => [ 'AttackLayer' => [ 'shape' => 'AttackLayer', ], 'AttackPropertyIdentifier' => [ 'shape' => 'AttackPropertyIdentifier', ], 'TopContributors' => [ 'shape' => 'TopContributors', ], 'Unit' => [ 'shape' => 'Unit', ], 'Total' => [ 'shape' => 'Long', ], ], ], 'AttackPropertyIdentifier' => [ 'type' => 'string', 'enum' => [ 'DESTINATION_URL', 'REFERRER', 'SOURCE_ASN', 'SOURCE_COUNTRY', 'SOURCE_IP_ADDRESS', 'SOURCE_USER_AGENT', ], ], 'AttackSummaries' => [ 'type' => 'list', 'member' => [ 'shape' => 'AttackSummary', ], ], 'AttackSummary' => [ 'type' => 'structure', 'members' => [ 'AttackId' => [ 'shape' => 'String', ], 'ResourceArn' => [ 'shape' => 'String', ], 'StartTime' => [ 'shape' => 'AttackTimestamp', ], 'EndTime' => [ 'shape' => 'AttackTimestamp', ], 'AttackVectors' => [ 'shape' => 'AttackVectorDescriptionList', ], ], ], 'AttackTimestamp' => [ 'type' => 'timestamp', ], 'AttackVectorDescription' => [ 'type' => 'structure', 'required' => [ 'VectorType', ], 'members' => [ 'VectorType' => [ 'shape' => 'String', ], ], ], 'AttackVectorDescriptionList' => [ 'type' => 'list', 'member' => [ 'shape' => 'AttackVectorDescription', ], ], 'AutoRenew' => [ 'type' => 'string', 'enum' => [ 'ENABLED', 'DISABLED', ], ], 'Contributor' => [ 'type' => 'structure', 'members' => [ 'Name' => [ 'shape' => 'String', ], 'Value' => [ 'shape' => 'Long', ], ], ], 'CreateProtectionRequest' => [ 'type' => 'structure', 'required' => [ 'Name', 'ResourceArn', ], 'members' => [ 'Name' => [ 'shape' => 'ProtectionName', ], 'ResourceArn' => [ 'shape' => 'ResourceArn', ], ], ], 'CreateProtectionResponse' => [ 'type' => 'structure', 'members' => [ 'ProtectionId' => [ 'shape' => 'ProtectionId', ], ], ], 'CreateSubscriptionRequest' => [ 'type' => 'structure', 'members' => [], ], 'CreateSubscriptionResponse' => [ 'type' => 'structure', 'members' => [], ], 'DeleteProtectionRequest' => [ 'type' => 'structure', 'required' => [ 'ProtectionId', ], 'members' => [ 'ProtectionId' => [ 'shape' => 'ProtectionId', ], ], ], 'DeleteProtectionResponse' => [ 'type' => 'structure', 'members' => [], ], 'DeleteSubscriptionRequest' => [ 'type' => 'structure', 'members' => [], 'deprecated' => true, ], 'DeleteSubscriptionResponse' => [ 'type' => 'structure', 'members' => [], 'deprecated' => true, ], 'DescribeAttackRequest' => [ 'type' => 'structure', 'required' => [ 'AttackId', ], 'members' => [ 'AttackId' => [ 'shape' => 'AttackId', ], ], ], 'DescribeAttackResponse' => [ 'type' => 'structure', 'members' => [ 'Attack' => [ 'shape' => 'AttackDetail', ], ], ], 'DescribeDRTAccessRequest' => [ 'type' => 'structure', 'members' => [], ], 'DescribeDRTAccessResponse' => [ 'type' => 'structure', 'members' => [ 'RoleArn' => [ 'shape' => 'RoleArn', ], 'LogBucketList' => [ 'shape' => 'LogBucketList', ], ], ], 'DescribeEmergencyContactSettingsRequest' => [ 'type' => 'structure', 'members' => [], ], 'DescribeEmergencyContactSettingsResponse' => [ 'type' => 'structure', 'members' => [ 'EmergencyContactList' => [ 'shape' => 'EmergencyContactList', ], ], ], 'DescribeProtectionRequest' => [ 'type' => 'structure', 'required' => [ 'ProtectionId', ], 'members' => [ 'ProtectionId' => [ 'shape' => 'ProtectionId', ], ], ], 'DescribeProtectionResponse' => [ 'type' => 'structure', 'members' => [ 'Protection' => [ 'shape' => 'Protection', ], ], ], 'DescribeSubscriptionRequest' => [ 'type' => 'structure', 'members' => [], ], 'DescribeSubscriptionResponse' => [ 'type' => 'structure', 'members' => [ 'Subscription' => [ 'shape' => 'Subscription', ], ], ], 'DisassociateDRTLogBucketRequest' => [ 'type' => 'structure', 'required' => [ 'LogBucket', ], 'members' => [ 'LogBucket' => [ 'shape' => 'LogBucket', ], ], ], 'DisassociateDRTLogBucketResponse' => [ 'type' => 'structure', 'members' => [], ], 'DisassociateDRTRoleRequest' => [ 'type' => 'structure', 'members' => [], ], 'DisassociateDRTRoleResponse' => [ 'type' => 'structure', 'members' => [], ], 'Double' => [ 'type' => 'double', ], 'DurationInSeconds' => [ 'type' => 'long', 'min' => 0, ], 'EmailAddress' => [ 'type' => 'string', 'max' => 150, 'min' => 1, 'pattern' => '^\\S+@\\S+\\.\\S+$', ], 'EmergencyContact' => [ 'type' => 'structure', 'required' => [ 'EmailAddress', ], 'members' => [ 'EmailAddress' => [ 'shape' => 'EmailAddress', ], ], ], 'EmergencyContactList' => [ 'type' => 'list', 'member' => [ 'shape' => 'EmergencyContact', ], 'max' => 10, 'min' => 0, ], 'GetSubscriptionStateRequest' => [ 'type' => 'structure', 'members' => [], ], 'GetSubscriptionStateResponse' => [ 'type' => 'structure', 'required' => [ 'SubscriptionState', ], 'members' => [ 'SubscriptionState' => [ 'shape' => 'SubscriptionState', ], ], ], 'Integer' => [ 'type' => 'integer', ], 'InternalErrorException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'exception' => true, 'fault' => true, ], 'InvalidOperationException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'exception' => true, ], 'InvalidPaginationTokenException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'exception' => true, ], 'InvalidParameterException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'exception' => true, ], 'InvalidResourceException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'exception' => true, ], 'Limit' => [ 'type' => 'structure', 'members' => [ 'Type' => [ 'shape' => 'String', ], 'Max' => [ 'shape' => 'Long', ], ], ], 'LimitNumber' => [ 'type' => 'long', ], 'LimitType' => [ 'type' => 'string', ], 'Limits' => [ 'type' => 'list', 'member' => [ 'shape' => 'Limit', ], ], 'LimitsExceededException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], 'Type' => [ 'shape' => 'LimitType', ], 'Limit' => [ 'shape' => 'LimitNumber', ], ], 'exception' => true, ], 'ListAttacksRequest' => [ 'type' => 'structure', 'members' => [ 'ResourceArns' => [ 'shape' => 'ResourceArnFilterList', ], 'StartTime' => [ 'shape' => 'TimeRange', ], 'EndTime' => [ 'shape' => 'TimeRange', ], 'NextToken' => [ 'shape' => 'Token', ], 'MaxResults' => [ 'shape' => 'MaxResults', ], ], ], 'ListAttacksResponse' => [ 'type' => 'structure', 'members' => [ 'AttackSummaries' => [ 'shape' => 'AttackSummaries', ], 'NextToken' => [ 'shape' => 'Token', ], ], ], 'ListProtectionsRequest' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'Token', ], 'MaxResults' => [ 'shape' => 'MaxResults', ], ], ], 'ListProtectionsResponse' => [ 'type' => 'structure', 'members' => [ 'Protections' => [ 'shape' => 'Protections', ], 'NextToken' => [ 'shape' => 'Token', ], ], ], 'LockedSubscriptionException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'exception' => true, ], 'LogBucket' => [ 'type' => 'string', 'max' => 63, 'min' => 3, 'pattern' => '^([a-z]|(\\d(?!\\d{0,2}\\.\\d{1,3}\\.\\d{1,3}\\.\\d{1,3})))([a-z\\d]|(\\.(?!(\\.|-)))|(-(?!\\.))){1,61}[a-z\\d]$', ], 'LogBucketList' => [ 'type' => 'list', 'member' => [ 'shape' => 'LogBucket', ], 'max' => 10, 'min' => 0, ], 'Long' => [ 'type' => 'long', ], 'MaxResults' => [ 'type' => 'integer', 'box' => true, 'max' => 10000, 'min' => 0, ], 'Mitigation' => [ 'type' => 'structure', 'members' => [ 'MitigationName' => [ 'shape' => 'String', ], ], ], 'MitigationList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Mitigation', ], ], 'NoAssociatedRoleException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'exception' => true, ], 'OptimisticLockException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'exception' => true, ], 'Protection' => [ 'type' => 'structure', 'members' => [ 'Id' => [ 'shape' => 'ProtectionId', ], 'Name' => [ 'shape' => 'ProtectionName', ], 'ResourceArn' => [ 'shape' => 'ResourceArn', ], ], ], 'ProtectionId' => [ 'type' => 'string', 'max' => 36, 'min' => 1, 'pattern' => '[a-zA-Z0-9\\\\-]*', ], 'ProtectionName' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '[ a-zA-Z0-9_\\\\.\\\\-]*', ], 'Protections' => [ 'type' => 'list', 'member' => [ 'shape' => 'Protection', ], ], 'ResourceAlreadyExistsException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'exception' => true, ], 'ResourceArn' => [ 'type' => 'string', 'max' => 2048, 'min' => 1, 'pattern' => '^arn:aws.*', ], 'ResourceArnFilterList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ResourceArn', ], ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'exception' => true, ], 'RoleArn' => [ 'type' => 'string', 'max' => 2048, 'min' => 1, 'pattern' => '^arn:aws:iam::\\d{12}:role/?[a-zA-Z_0-9+=,.@\\-_/]+', ], 'String' => [ 'type' => 'string', ], 'SubResourceSummary' => [ 'type' => 'structure', 'members' => [ 'Type' => [ 'shape' => 'SubResourceType', ], 'Id' => [ 'shape' => 'String', ], 'AttackVectors' => [ 'shape' => 'SummarizedAttackVectorList', ], 'Counters' => [ 'shape' => 'SummarizedCounterList', ], ], ], 'SubResourceSummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SubResourceSummary', ], ], 'SubResourceType' => [ 'type' => 'string', 'enum' => [ 'IP', 'URL', ], ], 'Subscription' => [ 'type' => 'structure', 'members' => [ 'StartTime' => [ 'shape' => 'Timestamp', ], 'EndTime' => [ 'shape' => 'Timestamp', ], 'TimeCommitmentInSeconds' => [ 'shape' => 'DurationInSeconds', ], 'AutoRenew' => [ 'shape' => 'AutoRenew', ], 'Limits' => [ 'shape' => 'Limits', ], ], ], 'SubscriptionState' => [ 'type' => 'string', 'enum' => [ 'ACTIVE', 'INACTIVE', ], ], 'SummarizedAttackVector' => [ 'type' => 'structure', 'required' => [ 'VectorType', ], 'members' => [ 'VectorType' => [ 'shape' => 'String', ], 'VectorCounters' => [ 'shape' => 'SummarizedCounterList', ], ], ], 'SummarizedAttackVectorList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SummarizedAttackVector', ], ], 'SummarizedCounter' => [ 'type' => 'structure', 'members' => [ 'Name' => [ 'shape' => 'String', ], 'Max' => [ 'shape' => 'Double', ], 'Average' => [ 'shape' => 'Double', ], 'Sum' => [ 'shape' => 'Double', ], 'N' => [ 'shape' => 'Integer', ], 'Unit' => [ 'shape' => 'String', ], ], ], 'SummarizedCounterList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SummarizedCounter', ], ], 'TimeRange' => [ 'type' => 'structure', 'members' => [ 'FromInclusive' => [ 'shape' => 'AttackTimestamp', ], 'ToExclusive' => [ 'shape' => 'AttackTimestamp', ], ], ], 'Timestamp' => [ 'type' => 'timestamp', ], 'Token' => [ 'type' => 'string', 'max' => 4096, 'min' => 1, 'pattern' => '^.*$', ], 'TopContributors' => [ 'type' => 'list', 'member' => [ 'shape' => 'Contributor', ], ], 'Unit' => [ 'type' => 'string', 'enum' => [ 'BITS', 'BYTES', 'PACKETS', 'REQUESTS', ], ], 'UpdateEmergencyContactSettingsRequest' => [ 'type' => 'structure', 'members' => [ 'EmergencyContactList' => [ 'shape' => 'EmergencyContactList', ], ], ], 'UpdateEmergencyContactSettingsResponse' => [ 'type' => 'structure', 'members' => [], ], 'UpdateSubscriptionRequest' => [ 'type' => 'structure', 'members' => [ 'AutoRenew' => [ 'shape' => 'AutoRenew', ], ], ], 'UpdateSubscriptionResponse' => [ 'type' => 'structure', 'members' => [], ], 'errorMessage' => [ 'type' => 'string', ], ],];
