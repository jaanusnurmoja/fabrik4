<?php
// This file was auto-generated from sdk-root/src/data/iotevents-data/2018-10-23/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2018-10-23', 'endpointPrefix' => 'data.iotevents', 'protocol' => 'rest-json', 'serviceFullName' => 'AWS IoT Events Data', 'serviceId' => 'IoT Events Data', 'signatureVersion' => 'v4', 'signingName' => 'ioteventsdata', 'uid' => 'iotevents-data-2018-10-23', ], 'operations' => [ 'BatchAcknowledgeAlarm' => [ 'name' => 'BatchAcknowledgeAlarm', 'http' => [ 'method' => 'POST', 'requestUri' => '/alarms/acknowledge', 'responseCode' => 202, ], 'input' => [ 'shape' => 'BatchAcknowledgeAlarmRequest', ], 'output' => [ 'shape' => 'BatchAcknowledgeAlarmResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalFailureException', ], [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'BatchDeleteDetector' => [ 'name' => 'BatchDeleteDetector', 'http' => [ 'method' => 'POST', 'requestUri' => '/detectors/delete', 'responseCode' => 200, ], 'input' => [ 'shape' => 'BatchDeleteDetectorRequest', ], 'output' => [ 'shape' => 'BatchDeleteDetectorResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalFailureException', ], [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'BatchDisableAlarm' => [ 'name' => 'BatchDisableAlarm', 'http' => [ 'method' => 'POST', 'requestUri' => '/alarms/disable', 'responseCode' => 202, ], 'input' => [ 'shape' => 'BatchDisableAlarmRequest', ], 'output' => [ 'shape' => 'BatchDisableAlarmResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalFailureException', ], [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'BatchEnableAlarm' => [ 'name' => 'BatchEnableAlarm', 'http' => [ 'method' => 'POST', 'requestUri' => '/alarms/enable', 'responseCode' => 202, ], 'input' => [ 'shape' => 'BatchEnableAlarmRequest', ], 'output' => [ 'shape' => 'BatchEnableAlarmResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalFailureException', ], [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'BatchPutMessage' => [ 'name' => 'BatchPutMessage', 'http' => [ 'method' => 'POST', 'requestUri' => '/inputs/messages', 'responseCode' => 200, ], 'input' => [ 'shape' => 'BatchPutMessageRequest', ], 'output' => [ 'shape' => 'BatchPutMessageResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalFailureException', ], [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'BatchResetAlarm' => [ 'name' => 'BatchResetAlarm', 'http' => [ 'method' => 'POST', 'requestUri' => '/alarms/reset', 'responseCode' => 202, ], 'input' => [ 'shape' => 'BatchResetAlarmRequest', ], 'output' => [ 'shape' => 'BatchResetAlarmResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalFailureException', ], [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'BatchSnoozeAlarm' => [ 'name' => 'BatchSnoozeAlarm', 'http' => [ 'method' => 'POST', 'requestUri' => '/alarms/snooze', 'responseCode' => 202, ], 'input' => [ 'shape' => 'BatchSnoozeAlarmRequest', ], 'output' => [ 'shape' => 'BatchSnoozeAlarmResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalFailureException', ], [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'BatchUpdateDetector' => [ 'name' => 'BatchUpdateDetector', 'http' => [ 'method' => 'POST', 'requestUri' => '/detectors', 'responseCode' => 200, ], 'input' => [ 'shape' => 'BatchUpdateDetectorRequest', ], 'output' => [ 'shape' => 'BatchUpdateDetectorResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalFailureException', ], [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'DescribeAlarm' => [ 'name' => 'DescribeAlarm', 'http' => [ 'method' => 'GET', 'requestUri' => '/alarms/{alarmModelName}/keyValues/', ], 'input' => [ 'shape' => 'DescribeAlarmRequest', ], 'output' => [ 'shape' => 'DescribeAlarmResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalFailureException', ], [ 'shape' => 'ServiceUnavailableException', ], ], ], 'DescribeDetector' => [ 'name' => 'DescribeDetector', 'http' => [ 'method' => 'GET', 'requestUri' => '/detectors/{detectorModelName}/keyValues/', ], 'input' => [ 'shape' => 'DescribeDetectorRequest', ], 'output' => [ 'shape' => 'DescribeDetectorResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalFailureException', ], [ 'shape' => 'ServiceUnavailableException', ], ], ], 'ListAlarms' => [ 'name' => 'ListAlarms', 'http' => [ 'method' => 'GET', 'requestUri' => '/alarms/{alarmModelName}', ], 'input' => [ 'shape' => 'ListAlarmsRequest', ], 'output' => [ 'shape' => 'ListAlarmsResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalFailureException', ], [ 'shape' => 'ServiceUnavailableException', ], ], ], 'ListDetectors' => [ 'name' => 'ListDetectors', 'http' => [ 'method' => 'GET', 'requestUri' => '/detectors/{detectorModelName}', ], 'input' => [ 'shape' => 'ListDetectorsRequest', ], 'output' => [ 'shape' => 'ListDetectorsResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'InternalFailureException', ], [ 'shape' => 'ServiceUnavailableException', ], ], ], ], 'shapes' => [ 'AcknowledgeActionConfiguration' => [ 'type' => 'structure', 'members' => [ 'note' => [ 'shape' => 'Note', ], ], ], 'AcknowledgeAlarmActionRequest' => [ 'type' => 'structure', 'required' => [ 'requestId', 'alarmModelName', ], 'members' => [ 'requestId' => [ 'shape' => 'RequestId', ], 'alarmModelName' => [ 'shape' => 'AlarmModelName', ], 'keyValue' => [ 'shape' => 'KeyValue', ], 'note' => [ 'shape' => 'Note', ], ], ], 'AcknowledgeAlarmActionRequests' => [ 'type' => 'list', 'member' => [ 'shape' => 'AcknowledgeAlarmActionRequest', ], 'min' => 1, ], 'Alarm' => [ 'type' => 'structure', 'members' => [ 'alarmModelName' => [ 'shape' => 'AlarmModelName', ], 'alarmModelVersion' => [ 'shape' => 'AlarmModelVersion', ], 'keyValue' => [ 'shape' => 'KeyValue', ], 'alarmState' => [ 'shape' => 'AlarmState', ], 'severity' => [ 'shape' => 'Severity', ], 'creationTime' => [ 'shape' => 'Timestamp', ], 'lastUpdateTime' => [ 'shape' => 'Timestamp', ], ], ], 'AlarmModelName' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^[a-zA-Z0-9_-]+$', ], 'AlarmModelVersion' => [ 'type' => 'string', 'max' => 128, 'min' => 1, ], 'AlarmState' => [ 'type' => 'structure', 'members' => [ 'stateName' => [ 'shape' => 'AlarmStateName', ], 'ruleEvaluation' => [ 'shape' => 'RuleEvaluation', ], 'customerAction' => [ 'shape' => 'CustomerAction', ], 'systemEvent' => [ 'shape' => 'SystemEvent', ], ], ], 'AlarmStateName' => [ 'type' => 'string', 'enum' => [ 'DISABLED', 'NORMAL', 'ACTIVE', 'ACKNOWLEDGED', 'SNOOZE_DISABLED', 'LATCHED', ], ], 'AlarmSummaries' => [ 'type' => 'list', 'member' => [ 'shape' => 'AlarmSummary', ], ], 'AlarmSummary' => [ 'type' => 'structure', 'members' => [ 'alarmModelName' => [ 'shape' => 'AlarmModelName', ], 'alarmModelVersion' => [ 'shape' => 'AlarmModelVersion', ], 'keyValue' => [ 'shape' => 'KeyValue', ], 'stateName' => [ 'shape' => 'AlarmStateName', ], 'creationTime' => [ 'shape' => 'Timestamp', ], 'lastUpdateTime' => [ 'shape' => 'Timestamp', ], ], ], 'BatchAcknowledgeAlarmRequest' => [ 'type' => 'structure', 'required' => [ 'acknowledgeActionRequests', ], 'members' => [ 'acknowledgeActionRequests' => [ 'shape' => 'AcknowledgeAlarmActionRequests', ], ], ], 'BatchAcknowledgeAlarmResponse' => [ 'type' => 'structure', 'members' => [ 'errorEntries' => [ 'shape' => 'BatchAlarmActionErrorEntries', ], ], ], 'BatchAlarmActionErrorEntries' => [ 'type' => 'list', 'member' => [ 'shape' => 'BatchAlarmActionErrorEntry', ], ], 'BatchAlarmActionErrorEntry' => [ 'type' => 'structure', 'members' => [ 'requestId' => [ 'shape' => 'RequestId', ], 'errorCode' => [ 'shape' => 'ErrorCode', ], 'errorMessage' => [ 'shape' => 'ErrorMessage', ], ], ], 'BatchDeleteDetectorErrorEntries' => [ 'type' => 'list', 'member' => [ 'shape' => 'BatchDeleteDetectorErrorEntry', ], ], 'BatchDeleteDetectorErrorEntry' => [ 'type' => 'structure', 'members' => [ 'messageId' => [ 'shape' => 'MessageId', ], 'errorCode' => [ 'shape' => 'ErrorCode', ], 'errorMessage' => [ 'shape' => 'ErrorMessage', ], ], ], 'BatchDeleteDetectorRequest' => [ 'type' => 'structure', 'required' => [ 'detectors', ], 'members' => [ 'detectors' => [ 'shape' => 'DeleteDetectorRequests', ], ], ], 'BatchDeleteDetectorResponse' => [ 'type' => 'structure', 'members' => [ 'batchDeleteDetectorErrorEntries' => [ 'shape' => 'BatchDeleteDetectorErrorEntries', ], ], ], 'BatchDisableAlarmRequest' => [ 'type' => 'structure', 'required' => [ 'disableActionRequests', ], 'members' => [ 'disableActionRequests' => [ 'shape' => 'DisableAlarmActionRequests', ], ], ], 'BatchDisableAlarmResponse' => [ 'type' => 'structure', 'members' => [ 'errorEntries' => [ 'shape' => 'BatchAlarmActionErrorEntries', ], ], ], 'BatchEnableAlarmRequest' => [ 'type' => 'structure', 'required' => [ 'enableActionRequests', ], 'members' => [ 'enableActionRequests' => [ 'shape' => 'EnableAlarmActionRequests', ], ], ], 'BatchEnableAlarmResponse' => [ 'type' => 'structure', 'members' => [ 'errorEntries' => [ 'shape' => 'BatchAlarmActionErrorEntries', ], ], ], 'BatchPutMessageErrorEntries' => [ 'type' => 'list', 'member' => [ 'shape' => 'BatchPutMessageErrorEntry', ], ], 'BatchPutMessageErrorEntry' => [ 'type' => 'structure', 'members' => [ 'messageId' => [ 'shape' => 'MessageId', ], 'errorCode' => [ 'shape' => 'ErrorCode', ], 'errorMessage' => [ 'shape' => 'ErrorMessage', ], ], ], 'BatchPutMessageRequest' => [ 'type' => 'structure', 'required' => [ 'messages', ], 'members' => [ 'messages' => [ 'shape' => 'Messages', ], ], ], 'BatchPutMessageResponse' => [ 'type' => 'structure', 'members' => [ 'BatchPutMessageErrorEntries' => [ 'shape' => 'BatchPutMessageErrorEntries', ], ], ], 'BatchResetAlarmRequest' => [ 'type' => 'structure', 'required' => [ 'resetActionRequests', ], 'members' => [ 'resetActionRequests' => [ 'shape' => 'ResetAlarmActionRequests', ], ], ], 'BatchResetAlarmResponse' => [ 'type' => 'structure', 'members' => [ 'errorEntries' => [ 'shape' => 'BatchAlarmActionErrorEntries', ], ], ], 'BatchSnoozeAlarmRequest' => [ 'type' => 'structure', 'required' => [ 'snoozeActionRequests', ], 'members' => [ 'snoozeActionRequests' => [ 'shape' => 'SnoozeAlarmActionRequests', ], ], ], 'BatchSnoozeAlarmResponse' => [ 'type' => 'structure', 'members' => [ 'errorEntries' => [ 'shape' => 'BatchAlarmActionErrorEntries', ], ], ], 'BatchUpdateDetectorErrorEntries' => [ 'type' => 'list', 'member' => [ 'shape' => 'BatchUpdateDetectorErrorEntry', ], ], 'BatchUpdateDetectorErrorEntry' => [ 'type' => 'structure', 'members' => [ 'messageId' => [ 'shape' => 'MessageId', ], 'errorCode' => [ 'shape' => 'ErrorCode', ], 'errorMessage' => [ 'shape' => 'ErrorMessage', ], ], ], 'BatchUpdateDetectorRequest' => [ 'type' => 'structure', 'required' => [ 'detectors', ], 'members' => [ 'detectors' => [ 'shape' => 'UpdateDetectorRequests', ], ], ], 'BatchUpdateDetectorResponse' => [ 'type' => 'structure', 'members' => [ 'batchUpdateDetectorErrorEntries' => [ 'shape' => 'BatchUpdateDetectorErrorEntries', ], ], ], 'ComparisonOperator' => [ 'type' => 'string', 'enum' => [ 'GREATER', 'GREATER_OR_EQUAL', 'LESS', 'LESS_OR_EQUAL', 'EQUAL', 'NOT_EQUAL', ], ], 'CustomerAction' => [ 'type' => 'structure', 'members' => [ 'actionName' => [ 'shape' => 'CustomerActionName', ], 'snoozeActionConfiguration' => [ 'shape' => 'SnoozeActionConfiguration', ], 'enableActionConfiguration' => [ 'shape' => 'EnableActionConfiguration', ], 'disableActionConfiguration' => [ 'shape' => 'DisableActionConfiguration', ], 'acknowledgeActionConfiguration' => [ 'shape' => 'AcknowledgeActionConfiguration', ], 'resetActionConfiguration' => [ 'shape' => 'ResetActionConfiguration', ], ], ], 'CustomerActionName' => [ 'type' => 'string', 'enum' => [ 'SNOOZE', 'ENABLE', 'DISABLE', 'ACKNOWLEDGE', 'RESET', ], ], 'DeleteDetectorRequest' => [ 'type' => 'structure', 'required' => [ 'messageId', 'detectorModelName', ], 'members' => [ 'messageId' => [ 'shape' => 'MessageId', ], 'detectorModelName' => [ 'shape' => 'DetectorModelName', ], 'keyValue' => [ 'shape' => 'KeyValue', ], ], ], 'DeleteDetectorRequests' => [ 'type' => 'list', 'member' => [ 'shape' => 'DeleteDetectorRequest', ], 'min' => 1, ], 'DescribeAlarmRequest' => [ 'type' => 'structure', 'required' => [ 'alarmModelName', ], 'members' => [ 'alarmModelName' => [ 'shape' => 'AlarmModelName', 'location' => 'uri', 'locationName' => 'alarmModelName', ], 'keyValue' => [ 'shape' => 'KeyValue', 'location' => 'querystring', 'locationName' => 'keyValue', ], ], ], 'DescribeAlarmResponse' => [ 'type' => 'structure', 'members' => [ 'alarm' => [ 'shape' => 'Alarm', ], ], ], 'DescribeDetectorRequest' => [ 'type' => 'structure', 'required' => [ 'detectorModelName', ], 'members' => [ 'detectorModelName' => [ 'shape' => 'DetectorModelName', 'location' => 'uri', 'locationName' => 'detectorModelName', ], 'keyValue' => [ 'shape' => 'KeyValue', 'location' => 'querystring', 'locationName' => 'keyValue', ], ], ], 'DescribeDetectorResponse' => [ 'type' => 'structure', 'members' => [ 'detector' => [ 'shape' => 'Detector', ], ], ], 'Detector' => [ 'type' => 'structure', 'members' => [ 'detectorModelName' => [ 'shape' => 'DetectorModelName', ], 'keyValue' => [ 'shape' => 'KeyValue', ], 'detectorModelVersion' => [ 'shape' => 'DetectorModelVersion', ], 'state' => [ 'shape' => 'DetectorState', ], 'creationTime' => [ 'shape' => 'Timestamp', ], 'lastUpdateTime' => [ 'shape' => 'Timestamp', ], ], ], 'DetectorModelName' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^[a-zA-Z0-9_-]+$', ], 'DetectorModelVersion' => [ 'type' => 'string', 'max' => 128, 'min' => 1, ], 'DetectorState' => [ 'type' => 'structure', 'required' => [ 'stateName', 'variables', 'timers', ], 'members' => [ 'stateName' => [ 'shape' => 'StateName', ], 'variables' => [ 'shape' => 'Variables', ], 'timers' => [ 'shape' => 'Timers', ], ], ], 'DetectorStateDefinition' => [ 'type' => 'structure', 'required' => [ 'stateName', 'variables', 'timers', ], 'members' => [ 'stateName' => [ 'shape' => 'StateName', ], 'variables' => [ 'shape' => 'VariableDefinitions', ], 'timers' => [ 'shape' => 'TimerDefinitions', ], ], ], 'DetectorStateSummary' => [ 'type' => 'structure', 'members' => [ 'stateName' => [ 'shape' => 'StateName', ], ], ], 'DetectorSummaries' => [ 'type' => 'list', 'member' => [ 'shape' => 'DetectorSummary', ], ], 'DetectorSummary' => [ 'type' => 'structure', 'members' => [ 'detectorModelName' => [ 'shape' => 'DetectorModelName', ], 'keyValue' => [ 'shape' => 'KeyValue', ], 'detectorModelVersion' => [ 'shape' => 'DetectorModelVersion', ], 'state' => [ 'shape' => 'DetectorStateSummary', ], 'creationTime' => [ 'shape' => 'Timestamp', ], 'lastUpdateTime' => [ 'shape' => 'Timestamp', ], ], ], 'DisableActionConfiguration' => [ 'type' => 'structure', 'members' => [ 'note' => [ 'shape' => 'Note', ], ], ], 'DisableAlarmActionRequest' => [ 'type' => 'structure', 'required' => [ 'requestId', 'alarmModelName', ], 'members' => [ 'requestId' => [ 'shape' => 'RequestId', ], 'alarmModelName' => [ 'shape' => 'AlarmModelName', ], 'keyValue' => [ 'shape' => 'KeyValue', ], 'note' => [ 'shape' => 'Note', ], ], ], 'DisableAlarmActionRequests' => [ 'type' => 'list', 'member' => [ 'shape' => 'DisableAlarmActionRequest', ], 'min' => 1, ], 'EnableActionConfiguration' => [ 'type' => 'structure', 'members' => [ 'note' => [ 'shape' => 'Note', ], ], ], 'EnableAlarmActionRequest' => [ 'type' => 'structure', 'required' => [ 'requestId', 'alarmModelName', ], 'members' => [ 'requestId' => [ 'shape' => 'RequestId', ], 'alarmModelName' => [ 'shape' => 'AlarmModelName', ], 'keyValue' => [ 'shape' => 'KeyValue', ], 'note' => [ 'shape' => 'Note', ], ], ], 'EnableAlarmActionRequests' => [ 'type' => 'list', 'member' => [ 'shape' => 'EnableAlarmActionRequest', ], 'min' => 1, ], 'EphemeralInputName' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^[a-zA-Z0-9][a-zA-Z0-9_.-]*$', ], 'EpochMilliTimestamp' => [ 'type' => 'long', 'max' => 9223372036854775807, 'min' => 1, ], 'ErrorCode' => [ 'type' => 'string', 'enum' => [ 'ResourceNotFoundException', 'InvalidRequestException', 'InternalFailureException', 'ServiceUnavailableException', 'ThrottlingException', ], ], 'ErrorMessage' => [ 'type' => 'string', ], 'EventType' => [ 'type' => 'string', 'enum' => [ 'STATE_CHANGE', ], ], 'InputPropertyValue' => [ 'type' => 'string', ], 'InternalFailureException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, 'fault' => true, ], 'InvalidRequestException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'KeyValue' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^[a-zA-Z0-9\\-_:]+$', ], 'ListAlarmsRequest' => [ 'type' => 'structure', 'required' => [ 'alarmModelName', ], 'members' => [ 'alarmModelName' => [ 'shape' => 'AlarmModelName', 'location' => 'uri', 'locationName' => 'alarmModelName', ], 'nextToken' => [ 'shape' => 'NextToken', 'location' => 'querystring', 'locationName' => 'nextToken', ], 'maxResults' => [ 'shape' => 'MaxResults', 'location' => 'querystring', 'locationName' => 'maxResults', ], ], ], 'ListAlarmsResponse' => [ 'type' => 'structure', 'members' => [ 'alarmSummaries' => [ 'shape' => 'AlarmSummaries', ], 'nextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListDetectorsRequest' => [ 'type' => 'structure', 'required' => [ 'detectorModelName', ], 'members' => [ 'detectorModelName' => [ 'shape' => 'DetectorModelName', 'location' => 'uri', 'locationName' => 'detectorModelName', ], 'stateName' => [ 'shape' => 'StateName', 'location' => 'querystring', 'locationName' => 'stateName', ], 'nextToken' => [ 'shape' => 'NextToken', 'location' => 'querystring', 'locationName' => 'nextToken', ], 'maxResults' => [ 'shape' => 'MaxResults', 'location' => 'querystring', 'locationName' => 'maxResults', ], ], ], 'ListDetectorsResponse' => [ 'type' => 'structure', 'members' => [ 'detectorSummaries' => [ 'shape' => 'DetectorSummaries', ], 'nextToken' => [ 'shape' => 'NextToken', ], ], ], 'MaxResults' => [ 'type' => 'integer', 'max' => 250, 'min' => 1, ], 'Message' => [ 'type' => 'structure', 'required' => [ 'messageId', 'inputName', 'payload', ], 'members' => [ 'messageId' => [ 'shape' => 'MessageId', ], 'inputName' => [ 'shape' => 'EphemeralInputName', ], 'payload' => [ 'shape' => 'Payload', ], 'timestamp' => [ 'shape' => 'TimestampValue', ], ], ], 'MessageId' => [ 'type' => 'string', 'max' => 64, 'min' => 1, 'pattern' => '^[a-zA-Z0-9_-]+$', ], 'Messages' => [ 'type' => 'list', 'member' => [ 'shape' => 'Message', ], 'min' => 1, ], 'NextToken' => [ 'type' => 'string', ], 'Note' => [ 'type' => 'string', 'max' => 256, ], 'Payload' => [ 'type' => 'blob', ], 'RequestId' => [ 'type' => 'string', 'max' => 64, 'min' => 1, 'pattern' => '^[a-zA-Z0-9_-]+$', ], 'ResetActionConfiguration' => [ 'type' => 'structure', 'members' => [ 'note' => [ 'shape' => 'Note', ], ], ], 'ResetAlarmActionRequest' => [ 'type' => 'structure', 'required' => [ 'requestId', 'alarmModelName', ], 'members' => [ 'requestId' => [ 'shape' => 'RequestId', ], 'alarmModelName' => [ 'shape' => 'AlarmModelName', ], 'keyValue' => [ 'shape' => 'KeyValue', ], 'note' => [ 'shape' => 'Note', ], ], ], 'ResetAlarmActionRequests' => [ 'type' => 'list', 'member' => [ 'shape' => 'ResetAlarmActionRequest', ], 'min' => 1, ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'error' => [ 'httpStatusCode' => 404, ], 'exception' => true, ], 'RuleEvaluation' => [ 'type' => 'structure', 'members' => [ 'simpleRuleEvaluation' => [ 'shape' => 'SimpleRuleEvaluation', ], ], ], 'Seconds' => [ 'type' => 'integer', ], 'ServiceUnavailableException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'error' => [ 'httpStatusCode' => 503, ], 'exception' => true, 'fault' => true, ], 'Severity' => [ 'type' => 'integer', 'box' => true, 'max' => 2147483647, 'min' => 0, ], 'SimpleRuleEvaluation' => [ 'type' => 'structure', 'members' => [ 'inputPropertyValue' => [ 'shape' => 'InputPropertyValue', ], 'operator' => [ 'shape' => 'ComparisonOperator', ], 'thresholdValue' => [ 'shape' => 'ThresholdValue', ], ], ], 'SnoozeActionConfiguration' => [ 'type' => 'structure', 'members' => [ 'snoozeDuration' => [ 'shape' => 'SnoozeDuration', ], 'note' => [ 'shape' => 'Note', ], ], ], 'SnoozeAlarmActionRequest' => [ 'type' => 'structure', 'required' => [ 'requestId', 'alarmModelName', 'snoozeDuration', ], 'members' => [ 'requestId' => [ 'shape' => 'RequestId', ], 'alarmModelName' => [ 'shape' => 'AlarmModelName', ], 'keyValue' => [ 'shape' => 'KeyValue', ], 'note' => [ 'shape' => 'Note', ], 'snoozeDuration' => [ 'shape' => 'SnoozeDuration', ], ], ], 'SnoozeAlarmActionRequests' => [ 'type' => 'list', 'member' => [ 'shape' => 'SnoozeAlarmActionRequest', ], 'min' => 1, ], 'SnoozeDuration' => [ 'type' => 'integer', ], 'StateChangeConfiguration' => [ 'type' => 'structure', 'members' => [ 'triggerType' => [ 'shape' => 'TriggerType', ], ], ], 'StateName' => [ 'type' => 'string', 'max' => 128, 'min' => 1, ], 'SystemEvent' => [ 'type' => 'structure', 'members' => [ 'eventType' => [ 'shape' => 'EventType', ], 'stateChangeConfiguration' => [ 'shape' => 'StateChangeConfiguration', ], ], ], 'ThresholdValue' => [ 'type' => 'string', ], 'ThrottlingException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'errorMessage', ], ], 'error' => [ 'httpStatusCode' => 429, ], 'exception' => true, ], 'Timer' => [ 'type' => 'structure', 'required' => [ 'name', 'timestamp', ], 'members' => [ 'name' => [ 'shape' => 'TimerName', ], 'timestamp' => [ 'shape' => 'Timestamp', ], ], ], 'TimerDefinition' => [ 'type' => 'structure', 'required' => [ 'name', 'seconds', ], 'members' => [ 'name' => [ 'shape' => 'TimerName', ], 'seconds' => [ 'shape' => 'Seconds', ], ], ], 'TimerDefinitions' => [ 'type' => 'list', 'member' => [ 'shape' => 'TimerDefinition', ], ], 'TimerName' => [ 'type' => 'string', 'max' => 128, 'min' => 1, ], 'Timers' => [ 'type' => 'list', 'member' => [ 'shape' => 'Timer', ], ], 'Timestamp' => [ 'type' => 'timestamp', ], 'TimestampValue' => [ 'type' => 'structure', 'members' => [ 'timeInMillis' => [ 'shape' => 'EpochMilliTimestamp', ], ], ], 'TriggerType' => [ 'type' => 'string', 'enum' => [ 'SNOOZE_TIMEOUT', ], ], 'UpdateDetectorRequest' => [ 'type' => 'structure', 'required' => [ 'messageId', 'detectorModelName', 'state', ], 'members' => [ 'messageId' => [ 'shape' => 'MessageId', ], 'detectorModelName' => [ 'shape' => 'DetectorModelName', ], 'keyValue' => [ 'shape' => 'KeyValue', ], 'state' => [ 'shape' => 'DetectorStateDefinition', ], ], ], 'UpdateDetectorRequests' => [ 'type' => 'list', 'member' => [ 'shape' => 'UpdateDetectorRequest', ], 'min' => 1, ], 'Variable' => [ 'type' => 'structure', 'required' => [ 'name', 'value', ], 'members' => [ 'name' => [ 'shape' => 'VariableName', ], 'value' => [ 'shape' => 'VariableValue', ], ], ], 'VariableDefinition' => [ 'type' => 'structure', 'required' => [ 'name', 'value', ], 'members' => [ 'name' => [ 'shape' => 'VariableName', ], 'value' => [ 'shape' => 'VariableValue', ], ], ], 'VariableDefinitions' => [ 'type' => 'list', 'member' => [ 'shape' => 'VariableDefinition', ], ], 'VariableName' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^[a-zA-Z][a-zA-Z0-9_]*$', ], 'VariableValue' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, ], 'Variables' => [ 'type' => 'list', 'member' => [ 'shape' => 'Variable', ], ], 'errorMessage' => [ 'type' => 'string', ], ],];
