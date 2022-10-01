<?php
// This file was auto-generated from sdk-root/src/data/dlm/2018-01-12/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2018-01-12', 'endpointPrefix' => 'dlm', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceAbbreviation' => 'Amazon DLM', 'serviceFullName' => 'Amazon Data Lifecycle Manager', 'serviceId' => 'DLM', 'signatureVersion' => 'v4', 'signingName' => 'dlm', 'uid' => 'dlm-2018-01-12', ], 'operations' => [ 'CreateLifecyclePolicy' => [ 'name' => 'CreateLifecyclePolicy', 'http' => [ 'method' => 'POST', 'requestUri' => '/policies', ], 'input' => [ 'shape' => 'CreateLifecyclePolicyRequest', ], 'output' => [ 'shape' => 'CreateLifecyclePolicyResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'LimitExceededException', ], [ 'shape' => 'InternalServerException', ], ], ], 'DeleteLifecyclePolicy' => [ 'name' => 'DeleteLifecyclePolicy', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/policies/{policyId}/', ], 'input' => [ 'shape' => 'DeleteLifecyclePolicyRequest', ], 'output' => [ 'shape' => 'DeleteLifecyclePolicyResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'LimitExceededException', ], ], ], 'GetLifecyclePolicies' => [ 'name' => 'GetLifecyclePolicies', 'http' => [ 'method' => 'GET', 'requestUri' => '/policies', ], 'input' => [ 'shape' => 'GetLifecyclePoliciesRequest', ], 'output' => [ 'shape' => 'GetLifecyclePoliciesResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'LimitExceededException', ], ], ], 'GetLifecyclePolicy' => [ 'name' => 'GetLifecyclePolicy', 'http' => [ 'method' => 'GET', 'requestUri' => '/policies/{policyId}/', ], 'input' => [ 'shape' => 'GetLifecyclePolicyRequest', ], 'output' => [ 'shape' => 'GetLifecyclePolicyResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'LimitExceededException', ], ], ], 'ListTagsForResource' => [ 'name' => 'ListTagsForResource', 'http' => [ 'method' => 'GET', 'requestUri' => '/tags/{resourceArn}', ], 'input' => [ 'shape' => 'ListTagsForResourceRequest', ], 'output' => [ 'shape' => 'ListTagsForResourceResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'TagResource' => [ 'name' => 'TagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/tags/{resourceArn}', ], 'input' => [ 'shape' => 'TagResourceRequest', ], 'output' => [ 'shape' => 'TagResourceResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'UntagResource' => [ 'name' => 'UntagResource', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/tags/{resourceArn}', ], 'input' => [ 'shape' => 'UntagResourceRequest', ], 'output' => [ 'shape' => 'UntagResourceResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'UpdateLifecyclePolicy' => [ 'name' => 'UpdateLifecyclePolicy', 'http' => [ 'method' => 'PATCH', 'requestUri' => '/policies/{policyId}', ], 'input' => [ 'shape' => 'UpdateLifecyclePolicyRequest', ], 'output' => [ 'shape' => 'UpdateLifecyclePolicyResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'LimitExceededException', ], ], ], ], 'shapes' => [ 'Action' => [ 'type' => 'structure', 'required' => [ 'Name', 'CrossRegionCopy', ], 'members' => [ 'Name' => [ 'shape' => 'ActionName', ], 'CrossRegionCopy' => [ 'shape' => 'CrossRegionCopyActionList', ], ], ], 'ActionList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Action', ], 'max' => 1, 'min' => 1, ], 'ActionName' => [ 'type' => 'string', 'max' => 120, 'min' => 0, 'pattern' => '[0-9A-Za-z _-]+', ], 'ArchiveRetainRule' => [ 'type' => 'structure', 'required' => [ 'RetentionArchiveTier', ], 'members' => [ 'RetentionArchiveTier' => [ 'shape' => 'RetentionArchiveTier', ], ], ], 'ArchiveRule' => [ 'type' => 'structure', 'required' => [ 'RetainRule', ], 'members' => [ 'RetainRule' => [ 'shape' => 'ArchiveRetainRule', ], ], ], 'AvailabilityZone' => [ 'type' => 'string', 'max' => 16, 'min' => 0, 'pattern' => '([a-z]+-){2,3}\\d[a-z]', ], 'AvailabilityZoneList' => [ 'type' => 'list', 'member' => [ 'shape' => 'AvailabilityZone', ], 'max' => 10, 'min' => 1, ], 'AwsAccountId' => [ 'type' => 'string', 'max' => 12, 'min' => 12, 'pattern' => '^[0-9]{12}$', ], 'CmkArn' => [ 'type' => 'string', 'max' => 2048, 'min' => 0, 'pattern' => 'arn:aws(-[a-z]{1,3}){0,2}:kms:([a-z]+-){2,3}\\d:\\d+:key/.*', ], 'CopyTags' => [ 'type' => 'boolean', ], 'CopyTagsNullable' => [ 'type' => 'boolean', ], 'Count' => [ 'type' => 'integer', 'max' => 1000, 'min' => 1, ], 'CreateLifecyclePolicyRequest' => [ 'type' => 'structure', 'required' => [ 'ExecutionRoleArn', 'Description', 'State', 'PolicyDetails', ], 'members' => [ 'ExecutionRoleArn' => [ 'shape' => 'ExecutionRoleArn', ], 'Description' => [ 'shape' => 'PolicyDescription', ], 'State' => [ 'shape' => 'SettablePolicyStateValues', ], 'PolicyDetails' => [ 'shape' => 'PolicyDetails', ], 'Tags' => [ 'shape' => 'TagMap', ], ], ], 'CreateLifecyclePolicyResponse' => [ 'type' => 'structure', 'members' => [ 'PolicyId' => [ 'shape' => 'PolicyId', ], ], ], 'CreateRule' => [ 'type' => 'structure', 'members' => [ 'Location' => [ 'shape' => 'LocationValues', ], 'Interval' => [ 'shape' => 'Interval', ], 'IntervalUnit' => [ 'shape' => 'IntervalUnitValues', ], 'Times' => [ 'shape' => 'TimesList', ], 'CronExpression' => [ 'shape' => 'CronExpression', ], ], ], 'CronExpression' => [ 'type' => 'string', 'max' => 106, 'min' => 17, 'pattern' => 'cron\\([^\\n]{11,100}\\)', ], 'CrossRegionCopyAction' => [ 'type' => 'structure', 'required' => [ 'Target', 'EncryptionConfiguration', ], 'members' => [ 'Target' => [ 'shape' => 'Target', ], 'EncryptionConfiguration' => [ 'shape' => 'EncryptionConfiguration', ], 'RetainRule' => [ 'shape' => 'CrossRegionCopyRetainRule', ], ], ], 'CrossRegionCopyActionList' => [ 'type' => 'list', 'member' => [ 'shape' => 'CrossRegionCopyAction', ], 'max' => 3, 'min' => 0, ], 'CrossRegionCopyDeprecateRule' => [ 'type' => 'structure', 'members' => [ 'Interval' => [ 'shape' => 'Interval', ], 'IntervalUnit' => [ 'shape' => 'RetentionIntervalUnitValues', ], ], ], 'CrossRegionCopyRetainRule' => [ 'type' => 'structure', 'members' => [ 'Interval' => [ 'shape' => 'Interval', ], 'IntervalUnit' => [ 'shape' => 'RetentionIntervalUnitValues', ], ], ], 'CrossRegionCopyRule' => [ 'type' => 'structure', 'required' => [ 'Encrypted', ], 'members' => [ 'TargetRegion' => [ 'shape' => 'TargetRegion', ], 'Target' => [ 'shape' => 'Target', ], 'Encrypted' => [ 'shape' => 'Encrypted', ], 'CmkArn' => [ 'shape' => 'CmkArn', ], 'CopyTags' => [ 'shape' => 'CopyTagsNullable', ], 'RetainRule' => [ 'shape' => 'CrossRegionCopyRetainRule', ], 'DeprecateRule' => [ 'shape' => 'CrossRegionCopyDeprecateRule', ], ], ], 'CrossRegionCopyRules' => [ 'type' => 'list', 'member' => [ 'shape' => 'CrossRegionCopyRule', ], 'max' => 3, 'min' => 0, ], 'DeleteLifecyclePolicyRequest' => [ 'type' => 'structure', 'required' => [ 'PolicyId', ], 'members' => [ 'PolicyId' => [ 'shape' => 'PolicyId', 'location' => 'uri', 'locationName' => 'policyId', ], ], ], 'DeleteLifecyclePolicyResponse' => [ 'type' => 'structure', 'members' => [], ], 'DeprecateRule' => [ 'type' => 'structure', 'members' => [ 'Count' => [ 'shape' => 'Count', ], 'Interval' => [ 'shape' => 'Interval', ], 'IntervalUnit' => [ 'shape' => 'RetentionIntervalUnitValues', ], ], ], 'DescriptionRegex' => [ 'type' => 'string', 'max' => 1000, 'min' => 0, 'pattern' => '[\\p{all}]*', ], 'Encrypted' => [ 'type' => 'boolean', ], 'EncryptionConfiguration' => [ 'type' => 'structure', 'required' => [ 'Encrypted', ], 'members' => [ 'Encrypted' => [ 'shape' => 'Encrypted', ], 'CmkArn' => [ 'shape' => 'CmkArn', ], ], ], 'ErrorCode' => [ 'type' => 'string', ], 'ErrorMessage' => [ 'type' => 'string', ], 'EventParameters' => [ 'type' => 'structure', 'required' => [ 'EventType', 'SnapshotOwner', 'DescriptionRegex', ], 'members' => [ 'EventType' => [ 'shape' => 'EventTypeValues', ], 'SnapshotOwner' => [ 'shape' => 'SnapshotOwnerList', ], 'DescriptionRegex' => [ 'shape' => 'DescriptionRegex', ], ], ], 'EventSource' => [ 'type' => 'structure', 'required' => [ 'Type', ], 'members' => [ 'Type' => [ 'shape' => 'EventSourceValues', ], 'Parameters' => [ 'shape' => 'EventParameters', ], ], ], 'EventSourceValues' => [ 'type' => 'string', 'enum' => [ 'MANAGED_CWE', ], ], 'EventTypeValues' => [ 'type' => 'string', 'enum' => [ 'shareSnapshot', ], ], 'ExcludeBootVolume' => [ 'type' => 'boolean', ], 'ExcludeDataVolumeTagList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Tag', ], 'max' => 50, 'min' => 0, ], 'ExecutionRoleArn' => [ 'type' => 'string', 'max' => 2048, 'min' => 0, 'pattern' => 'arn:aws(-[a-z]{1,3}){0,2}:iam::\\d+:role/.*', ], 'FastRestoreRule' => [ 'type' => 'structure', 'required' => [ 'AvailabilityZones', ], 'members' => [ 'Count' => [ 'shape' => 'Count', ], 'Interval' => [ 'shape' => 'Interval', ], 'IntervalUnit' => [ 'shape' => 'RetentionIntervalUnitValues', ], 'AvailabilityZones' => [ 'shape' => 'AvailabilityZoneList', ], ], ], 'GetLifecyclePoliciesRequest' => [ 'type' => 'structure', 'members' => [ 'PolicyIds' => [ 'shape' => 'PolicyIdList', 'location' => 'querystring', 'locationName' => 'policyIds', ], 'State' => [ 'shape' => 'GettablePolicyStateValues', 'location' => 'querystring', 'locationName' => 'state', ], 'ResourceTypes' => [ 'shape' => 'ResourceTypeValuesList', 'location' => 'querystring', 'locationName' => 'resourceTypes', ], 'TargetTags' => [ 'shape' => 'TargetTagsFilterList', 'location' => 'querystring', 'locationName' => 'targetTags', ], 'TagsToAdd' => [ 'shape' => 'TagsToAddFilterList', 'location' => 'querystring', 'locationName' => 'tagsToAdd', ], ], ], 'GetLifecyclePoliciesResponse' => [ 'type' => 'structure', 'members' => [ 'Policies' => [ 'shape' => 'LifecyclePolicySummaryList', ], ], ], 'GetLifecyclePolicyRequest' => [ 'type' => 'structure', 'required' => [ 'PolicyId', ], 'members' => [ 'PolicyId' => [ 'shape' => 'PolicyId', 'location' => 'uri', 'locationName' => 'policyId', ], ], ], 'GetLifecyclePolicyResponse' => [ 'type' => 'structure', 'members' => [ 'Policy' => [ 'shape' => 'LifecyclePolicy', ], ], ], 'GettablePolicyStateValues' => [ 'type' => 'string', 'enum' => [ 'ENABLED', 'DISABLED', 'ERROR', ], ], 'InternalServerException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], 'Code' => [ 'shape' => 'ErrorCode', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, ], 'Interval' => [ 'type' => 'integer', 'min' => 1, ], 'IntervalUnitValues' => [ 'type' => 'string', 'enum' => [ 'HOURS', ], ], 'InvalidRequestException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], 'Code' => [ 'shape' => 'ErrorCode', ], 'RequiredParameters' => [ 'shape' => 'ParameterList', ], 'MutuallyExclusiveParameters' => [ 'shape' => 'ParameterList', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'LifecyclePolicy' => [ 'type' => 'structure', 'members' => [ 'PolicyId' => [ 'shape' => 'PolicyId', ], 'Description' => [ 'shape' => 'PolicyDescription', ], 'State' => [ 'shape' => 'GettablePolicyStateValues', ], 'StatusMessage' => [ 'shape' => 'StatusMessage', ], 'ExecutionRoleArn' => [ 'shape' => 'ExecutionRoleArn', ], 'DateCreated' => [ 'shape' => 'Timestamp', ], 'DateModified' => [ 'shape' => 'Timestamp', ], 'PolicyDetails' => [ 'shape' => 'PolicyDetails', ], 'Tags' => [ 'shape' => 'TagMap', ], 'PolicyArn' => [ 'shape' => 'PolicyArn', ], ], ], 'LifecyclePolicySummary' => [ 'type' => 'structure', 'members' => [ 'PolicyId' => [ 'shape' => 'PolicyId', ], 'Description' => [ 'shape' => 'PolicyDescription', ], 'State' => [ 'shape' => 'GettablePolicyStateValues', ], 'Tags' => [ 'shape' => 'TagMap', ], 'PolicyType' => [ 'shape' => 'PolicyTypeValues', ], ], ], 'LifecyclePolicySummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'LifecyclePolicySummary', ], ], 'LimitExceededException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], 'Code' => [ 'shape' => 'ErrorCode', ], 'ResourceType' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 429, ], 'exception' => true, ], 'ListTagsForResourceRequest' => [ 'type' => 'structure', 'required' => [ 'ResourceArn', ], 'members' => [ 'ResourceArn' => [ 'shape' => 'PolicyArn', 'location' => 'uri', 'locationName' => 'resourceArn', ], ], ], 'ListTagsForResourceResponse' => [ 'type' => 'structure', 'members' => [ 'Tags' => [ 'shape' => 'TagMap', ], ], ], 'LocationValues' => [ 'type' => 'string', 'enum' => [ 'CLOUD', 'OUTPOST_LOCAL', ], ], 'NoReboot' => [ 'type' => 'boolean', ], 'Parameter' => [ 'type' => 'string', ], 'ParameterList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Parameter', ], ], 'Parameters' => [ 'type' => 'structure', 'members' => [ 'ExcludeBootVolume' => [ 'shape' => 'ExcludeBootVolume', ], 'NoReboot' => [ 'shape' => 'NoReboot', ], 'ExcludeDataVolumeTags' => [ 'shape' => 'ExcludeDataVolumeTagList', ], ], ], 'PolicyArn' => [ 'type' => 'string', 'max' => 2048, 'min' => 0, 'pattern' => '^arn:aws(-[a-z]{1,3}){0,2}:dlm:[A-Za-z0-9_/.-]{0,63}:\\d+:policy/[0-9A-Za-z_-]{1,128}$', ], 'PolicyDescription' => [ 'type' => 'string', 'max' => 500, 'min' => 0, 'pattern' => '[0-9A-Za-z _-]+', ], 'PolicyDetails' => [ 'type' => 'structure', 'members' => [ 'PolicyType' => [ 'shape' => 'PolicyTypeValues', ], 'ResourceTypes' => [ 'shape' => 'ResourceTypeValuesList', ], 'ResourceLocations' => [ 'shape' => 'ResourceLocationList', ], 'TargetTags' => [ 'shape' => 'TargetTagList', ], 'Schedules' => [ 'shape' => 'ScheduleList', ], 'Parameters' => [ 'shape' => 'Parameters', ], 'EventSource' => [ 'shape' => 'EventSource', ], 'Actions' => [ 'shape' => 'ActionList', ], ], ], 'PolicyId' => [ 'type' => 'string', 'max' => 64, 'min' => 0, 'pattern' => 'policy-[A-Za-z0-9]+', ], 'PolicyIdList' => [ 'type' => 'list', 'member' => [ 'shape' => 'PolicyId', ], ], 'PolicyTypeValues' => [ 'type' => 'string', 'enum' => [ 'EBS_SNAPSHOT_MANAGEMENT', 'IMAGE_MANAGEMENT', 'EVENT_BASED_POLICY', ], ], 'ResourceLocationList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ResourceLocationValues', ], 'max' => 1, 'min' => 1, ], 'ResourceLocationValues' => [ 'type' => 'string', 'enum' => [ 'CLOUD', 'OUTPOST', ], ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], 'Code' => [ 'shape' => 'ErrorCode', ], 'ResourceType' => [ 'shape' => 'String', ], 'ResourceIds' => [ 'shape' => 'PolicyIdList', ], ], 'error' => [ 'httpStatusCode' => 404, ], 'exception' => true, ], 'ResourceTypeValues' => [ 'type' => 'string', 'enum' => [ 'VOLUME', 'INSTANCE', ], ], 'ResourceTypeValuesList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ResourceTypeValues', ], 'max' => 1, 'min' => 1, ], 'RetainRule' => [ 'type' => 'structure', 'members' => [ 'Count' => [ 'shape' => 'StandardTierRetainRuleCount', ], 'Interval' => [ 'shape' => 'StandardTierRetainRuleInterval', ], 'IntervalUnit' => [ 'shape' => 'RetentionIntervalUnitValues', ], ], ], 'RetentionArchiveTier' => [ 'type' => 'structure', 'members' => [ 'Count' => [ 'shape' => 'Count', ], 'Interval' => [ 'shape' => 'Interval', ], 'IntervalUnit' => [ 'shape' => 'RetentionIntervalUnitValues', ], ], ], 'RetentionIntervalUnitValues' => [ 'type' => 'string', 'enum' => [ 'DAYS', 'WEEKS', 'MONTHS', 'YEARS', ], ], 'Schedule' => [ 'type' => 'structure', 'members' => [ 'Name' => [ 'shape' => 'ScheduleName', ], 'CopyTags' => [ 'shape' => 'CopyTags', ], 'TagsToAdd' => [ 'shape' => 'TagsToAddList', ], 'VariableTags' => [ 'shape' => 'VariableTagsList', ], 'CreateRule' => [ 'shape' => 'CreateRule', ], 'RetainRule' => [ 'shape' => 'RetainRule', ], 'FastRestoreRule' => [ 'shape' => 'FastRestoreRule', ], 'CrossRegionCopyRules' => [ 'shape' => 'CrossRegionCopyRules', ], 'ShareRules' => [ 'shape' => 'ShareRules', ], 'DeprecateRule' => [ 'shape' => 'DeprecateRule', ], 'ArchiveRule' => [ 'shape' => 'ArchiveRule', ], ], ], 'ScheduleList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Schedule', ], 'max' => 4, 'min' => 1, ], 'ScheduleName' => [ 'type' => 'string', 'max' => 120, 'min' => 0, 'pattern' => '[0-9A-Za-z _-]+', ], 'SettablePolicyStateValues' => [ 'type' => 'string', 'enum' => [ 'ENABLED', 'DISABLED', ], ], 'ShareRule' => [ 'type' => 'structure', 'required' => [ 'TargetAccounts', ], 'members' => [ 'TargetAccounts' => [ 'shape' => 'ShareTargetAccountList', ], 'UnshareInterval' => [ 'shape' => 'Interval', ], 'UnshareIntervalUnit' => [ 'shape' => 'RetentionIntervalUnitValues', ], ], ], 'ShareRules' => [ 'type' => 'list', 'member' => [ 'shape' => 'ShareRule', ], 'max' => 1, 'min' => 0, ], 'ShareTargetAccountList' => [ 'type' => 'list', 'member' => [ 'shape' => 'AwsAccountId', ], 'min' => 1, ], 'SnapshotOwnerList' => [ 'type' => 'list', 'member' => [ 'shape' => 'AwsAccountId', ], 'max' => 50, 'min' => 0, ], 'StandardTierRetainRuleCount' => [ 'type' => 'integer', 'max' => 1000, 'min' => 0, ], 'StandardTierRetainRuleInterval' => [ 'type' => 'integer', 'min' => 0, ], 'StatusMessage' => [ 'type' => 'string', 'max' => 500, 'min' => 0, 'pattern' => '[\\p{all}]*', ], 'String' => [ 'type' => 'string', 'max' => 500, 'min' => 0, 'pattern' => '[\\p{all}]*', ], 'Tag' => [ 'type' => 'structure', 'required' => [ 'Key', 'Value', ], 'members' => [ 'Key' => [ 'shape' => 'String', ], 'Value' => [ 'shape' => 'String', ], ], ], 'TagFilter' => [ 'type' => 'string', 'max' => 256, 'min' => 0, 'pattern' => '[\\p{all}]*', ], 'TagKey' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^(?!aws:)[a-zA-Z+-=._:/]+$', ], 'TagKeyList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagKey', ], 'max' => 200, 'min' => 1, ], 'TagMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'TagKey', ], 'value' => [ 'shape' => 'TagValue', ], 'max' => 200, 'min' => 1, ], 'TagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'ResourceArn', 'Tags', ], 'members' => [ 'ResourceArn' => [ 'shape' => 'PolicyArn', 'location' => 'uri', 'locationName' => 'resourceArn', ], 'Tags' => [ 'shape' => 'TagMap', ], ], ], 'TagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'TagValue' => [ 'type' => 'string', 'max' => 256, 'pattern' => '[\\p{all}]*', ], 'TagsToAddFilterList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagFilter', ], 'max' => 50, 'min' => 0, ], 'TagsToAddList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Tag', ], 'max' => 45, 'min' => 0, ], 'Target' => [ 'type' => 'string', 'max' => 2048, 'min' => 0, 'pattern' => '^[\\w:\\-\\/\\*]+$', ], 'TargetRegion' => [ 'type' => 'string', 'max' => 16, 'min' => 0, 'pattern' => '([a-z]+-){2,3}\\d', ], 'TargetTagList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Tag', ], 'max' => 50, 'min' => 1, ], 'TargetTagsFilterList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagFilter', ], 'max' => 50, 'min' => 1, ], 'Time' => [ 'type' => 'string', 'max' => 5, 'min' => 5, 'pattern' => '^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$', ], 'TimesList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Time', ], 'max' => 1, ], 'Timestamp' => [ 'type' => 'timestamp', 'timestampFormat' => 'iso8601', ], 'UntagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'ResourceArn', 'TagKeys', ], 'members' => [ 'ResourceArn' => [ 'shape' => 'PolicyArn', 'location' => 'uri', 'locationName' => 'resourceArn', ], 'TagKeys' => [ 'shape' => 'TagKeyList', 'location' => 'querystring', 'locationName' => 'tagKeys', ], ], ], 'UntagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'UpdateLifecyclePolicyRequest' => [ 'type' => 'structure', 'required' => [ 'PolicyId', ], 'members' => [ 'PolicyId' => [ 'shape' => 'PolicyId', 'location' => 'uri', 'locationName' => 'policyId', ], 'ExecutionRoleArn' => [ 'shape' => 'ExecutionRoleArn', ], 'State' => [ 'shape' => 'SettablePolicyStateValues', ], 'Description' => [ 'shape' => 'PolicyDescription', ], 'PolicyDetails' => [ 'shape' => 'PolicyDetails', ], ], ], 'UpdateLifecyclePolicyResponse' => [ 'type' => 'structure', 'members' => [], ], 'VariableTagsList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Tag', ], 'max' => 45, 'min' => 0, ], ],];
