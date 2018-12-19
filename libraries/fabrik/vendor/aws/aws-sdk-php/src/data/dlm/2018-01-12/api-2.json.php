<?php
// This file was auto-generated from sdk-root/src/data/dlm/2018-01-12/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2018-01-12', 'endpointPrefix' => 'dlm', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceAbbreviation' => 'Amazon DLM', 'serviceFullName' => 'Amazon Data Lifecycle Manager', 'serviceId' => 'DLM', 'signatureVersion' => 'v4', 'signingName' => 'dlm', 'uid' => 'dlm-2018-01-12', ], 'operations' => [ 'CreateLifecyclePolicy' => [ 'name' => 'CreateLifecyclePolicy', 'http' => [ 'method' => 'POST', 'requestUri' => '/policies', ], 'input' => [ 'shape' => 'CreateLifecyclePolicyRequest', ], 'output' => [ 'shape' => 'CreateLifecyclePolicyResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'LimitExceededException', ], [ 'shape' => 'InternalServerException', ], ], ], 'DeleteLifecyclePolicy' => [ 'name' => 'DeleteLifecyclePolicy', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/policies/{policyId}/', ], 'input' => [ 'shape' => 'DeleteLifecyclePolicyRequest', ], 'output' => [ 'shape' => 'DeleteLifecyclePolicyResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'LimitExceededException', ], ], ], 'GetLifecyclePolicies' => [ 'name' => 'GetLifecyclePolicies', 'http' => [ 'method' => 'GET', 'requestUri' => '/policies', ], 'input' => [ 'shape' => 'GetLifecyclePoliciesRequest', ], 'output' => [ 'shape' => 'GetLifecyclePoliciesResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'LimitExceededException', ], ], ], 'GetLifecyclePolicy' => [ 'name' => 'GetLifecyclePolicy', 'http' => [ 'method' => 'GET', 'requestUri' => '/policies/{policyId}/', ], 'input' => [ 'shape' => 'GetLifecyclePolicyRequest', ], 'output' => [ 'shape' => 'GetLifecyclePolicyResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'LimitExceededException', ], ], ], 'UpdateLifecyclePolicy' => [ 'name' => 'UpdateLifecyclePolicy', 'http' => [ 'method' => 'PATCH', 'requestUri' => '/policies/{policyId}', ], 'input' => [ 'shape' => 'UpdateLifecyclePolicyRequest', ], 'output' => [ 'shape' => 'UpdateLifecyclePolicyResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'LimitExceededException', ], ], ], ], 'shapes' => [ 'CopyTags' => [ 'type' => 'boolean', ], 'Count' => [ 'type' => 'integer', 'max' => 1000, 'min' => 1, ], 'CreateLifecyclePolicyRequest' => [ 'type' => 'structure', 'required' => [ 'ExecutionRoleArn', 'Description', 'State', 'PolicyDetails', ], 'members' => [ 'ExecutionRoleArn' => [ 'shape' => 'ExecutionRoleArn', ], 'Description' => [ 'shape' => 'PolicyDescription', ], 'State' => [ 'shape' => 'SettablePolicyStateValues', ], 'PolicyDetails' => [ 'shape' => 'PolicyDetails', ], ], ], 'CreateLifecyclePolicyResponse' => [ 'type' => 'structure', 'members' => [ 'PolicyId' => [ 'shape' => 'PolicyId', ], ], ], 'CreateRule' => [ 'type' => 'structure', 'required' => [ 'Interval', 'IntervalUnit', ], 'members' => [ 'Interval' => [ 'shape' => 'Interval', ], 'IntervalUnit' => [ 'shape' => 'IntervalUnitValues', ], 'Times' => [ 'shape' => 'TimesList', ], ], ], 'DeleteLifecyclePolicyRequest' => [ 'type' => 'structure', 'required' => [ 'PolicyId', ], 'members' => [ 'PolicyId' => [ 'shape' => 'PolicyId', 'location' => 'uri', 'locationName' => 'policyId', ], ], ], 'DeleteLifecyclePolicyResponse' => [ 'type' => 'structure', 'members' => [], ], 'ErrorCode' => [ 'type' => 'string', ], 'ErrorMessage' => [ 'type' => 'string', ], 'ExecutionRoleArn' => [ 'type' => 'string', ], 'GetLifecyclePoliciesRequest' => [ 'type' => 'structure', 'members' => [ 'PolicyIds' => [ 'shape' => 'PolicyIdList', 'location' => 'querystring', 'locationName' => 'policyIds', ], 'State' => [ 'shape' => 'GettablePolicyStateValues', 'location' => 'querystring', 'locationName' => 'state', ], 'ResourceTypes' => [ 'shape' => 'ResourceTypeValuesList', 'location' => 'querystring', 'locationName' => 'resourceTypes', ], 'TargetTags' => [ 'shape' => 'TargetTagsFilterList', 'location' => 'querystring', 'locationName' => 'targetTags', ], 'TagsToAdd' => [ 'shape' => 'TagsToAddFilterList', 'location' => 'querystring', 'locationName' => 'tagsToAdd', ], ], ], 'GetLifecyclePoliciesResponse' => [ 'type' => 'structure', 'members' => [ 'Policies' => [ 'shape' => 'LifecyclePolicySummaryList', ], ], ], 'GetLifecyclePolicyRequest' => [ 'type' => 'structure', 'required' => [ 'PolicyId', ], 'members' => [ 'PolicyId' => [ 'shape' => 'PolicyId', 'location' => 'uri', 'locationName' => 'policyId', ], ], ], 'GetLifecyclePolicyResponse' => [ 'type' => 'structure', 'members' => [ 'Policy' => [ 'shape' => 'LifecyclePolicy', ], ], ], 'GettablePolicyStateValues' => [ 'type' => 'string', 'enum' => [ 'ENABLED', 'DISABLED', 'ERROR', ], ], 'InternalServerException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], 'Code' => [ 'shape' => 'ErrorCode', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, ], 'Interval' => [ 'type' => 'integer', 'min' => 1, ], 'IntervalUnitValues' => [ 'type' => 'string', 'enum' => [ 'HOURS', ], ], 'InvalidRequestException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], 'Code' => [ 'shape' => 'ErrorCode', ], 'RequiredParameters' => [ 'shape' => 'ParameterList', ], 'MutuallyExclusiveParameters' => [ 'shape' => 'ParameterList', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'LifecyclePolicy' => [ 'type' => 'structure', 'members' => [ 'PolicyId' => [ 'shape' => 'PolicyId', ], 'Description' => [ 'shape' => 'PolicyDescription', ], 'State' => [ 'shape' => 'GettablePolicyStateValues', ], 'ExecutionRoleArn' => [ 'shape' => 'ExecutionRoleArn', ], 'DateCreated' => [ 'shape' => 'Timestamp', ], 'DateModified' => [ 'shape' => 'Timestamp', ], 'PolicyDetails' => [ 'shape' => 'PolicyDetails', ], ], ], 'LifecyclePolicySummary' => [ 'type' => 'structure', 'members' => [ 'PolicyId' => [ 'shape' => 'PolicyId', ], 'Description' => [ 'shape' => 'PolicyDescription', ], 'State' => [ 'shape' => 'GettablePolicyStateValues', ], ], ], 'LifecyclePolicySummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'LifecyclePolicySummary', ], ], 'LimitExceededException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], 'Code' => [ 'shape' => 'ErrorCode', ], 'ResourceType' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 429, ], 'exception' => true, ], 'Parameter' => [ 'type' => 'string', ], 'ParameterList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Parameter', ], ], 'PolicyDescription' => [ 'type' => 'string', 'max' => 500, 'min' => 0, ], 'PolicyDetails' => [ 'type' => 'structure', 'members' => [ 'ResourceTypes' => [ 'shape' => 'ResourceTypeValuesList', ], 'TargetTags' => [ 'shape' => 'TargetTagList', ], 'Schedules' => [ 'shape' => 'ScheduleList', ], ], ], 'PolicyId' => [ 'type' => 'string', ], 'PolicyIdList' => [ 'type' => 'list', 'member' => [ 'shape' => 'PolicyId', ], ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], 'Code' => [ 'shape' => 'ErrorCode', ], 'ResourceType' => [ 'shape' => 'String', ], 'ResourceIds' => [ 'shape' => 'PolicyIdList', ], ], 'error' => [ 'httpStatusCode' => 404, ], 'exception' => true, ], 'ResourceTypeValues' => [ 'type' => 'string', 'enum' => [ 'VOLUME', ], ], 'ResourceTypeValuesList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ResourceTypeValues', ], 'max' => 1, 'min' => 1, ], 'RetainRule' => [ 'type' => 'structure', 'required' => [ 'Count', ], 'members' => [ 'Count' => [ 'shape' => 'Count', ], ], ], 'Schedule' => [ 'type' => 'structure', 'members' => [ 'Name' => [ 'shape' => 'ScheduleName', ], 'CopyTags' => [ 'shape' => 'CopyTags', ], 'TagsToAdd' => [ 'shape' => 'TagsToAddList', ], 'CreateRule' => [ 'shape' => 'CreateRule', ], 'RetainRule' => [ 'shape' => 'RetainRule', ], ], ], 'ScheduleList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Schedule', ], 'max' => 1, 'min' => 1, ], 'ScheduleName' => [ 'type' => 'string', 'max' => 500, 'min' => 0, ], 'SettablePolicyStateValues' => [ 'type' => 'string', 'enum' => [ 'ENABLED', 'DISABLED', ], ], 'String' => [ 'type' => 'string', ], 'Tag' => [ 'type' => 'structure', 'required' => [ 'Key', 'Value', ], 'members' => [ 'Key' => [ 'shape' => 'String', ], 'Value' => [ 'shape' => 'String', ], ], ], 'TagFilter' => [ 'type' => 'string', ], 'TagsToAddFilterList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagFilter', ], 'max' => 50, 'min' => 0, ], 'TagsToAddList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Tag', ], 'max' => 50, 'min' => 0, ], 'TargetTagList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Tag', ], 'max' => 50, 'min' => 1, ], 'TargetTagsFilterList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagFilter', ], 'max' => 50, 'min' => 1, ], 'Time' => [ 'type' => 'string', 'pattern' => '^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$', ], 'TimesList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Time', ], 'max' => 1, ], 'Timestamp' => [ 'type' => 'timestamp', ], 'UpdateLifecyclePolicyRequest' => [ 'type' => 'structure', 'required' => [ 'PolicyId', ], 'members' => [ 'PolicyId' => [ 'shape' => 'PolicyId', 'location' => 'uri', 'locationName' => 'policyId', ], 'ExecutionRoleArn' => [ 'shape' => 'ExecutionRoleArn', ], 'State' => [ 'shape' => 'SettablePolicyStateValues', ], 'Description' => [ 'shape' => 'PolicyDescription', ], 'PolicyDetails' => [ 'shape' => 'PolicyDetails', ], ], ], 'UpdateLifecyclePolicyResponse' => [ 'type' => 'structure', 'members' => [], ], ],];
