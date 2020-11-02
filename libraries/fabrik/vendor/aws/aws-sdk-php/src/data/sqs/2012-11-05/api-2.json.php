<?php
// This file was auto-generated from sdk-root/src/data/sqs/2012-11-05/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2012-11-05', 'endpointPrefix' => 'sqs', 'protocol' => 'query', 'serviceAbbreviation' => 'Amazon SQS', 'serviceFullName' => 'Amazon Simple Queue Service', 'serviceId' => 'SQS', 'signatureVersion' => 'v4', 'uid' => 'sqs-2012-11-05', 'xmlNamespace' => 'http://queue.amazonaws.com/doc/2012-11-05/', ], 'operations' => [ 'AddPermission' => [ 'name' => 'AddPermission', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AddPermissionRequest', ], 'errors' => [ [ 'shape' => 'OverLimit', ], ], ], 'ChangeMessageVisibility' => [ 'name' => 'ChangeMessageVisibility', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ChangeMessageVisibilityRequest', ], 'errors' => [ [ 'shape' => 'MessageNotInflight', ], [ 'shape' => 'ReceiptHandleIsInvalid', ], ], ], 'ChangeMessageVisibilityBatch' => [ 'name' => 'ChangeMessageVisibilityBatch', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ChangeMessageVisibilityBatchRequest', ], 'output' => [ 'shape' => 'ChangeMessageVisibilityBatchResult', 'resultWrapper' => 'ChangeMessageVisibilityBatchResult', ], 'errors' => [ [ 'shape' => 'TooManyEntriesInBatchRequest', ], [ 'shape' => 'EmptyBatchRequest', ], [ 'shape' => 'BatchEntryIdsNotDistinct', ], [ 'shape' => 'InvalidBatchEntryId', ], ], ], 'CreateQueue' => [ 'name' => 'CreateQueue', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateQueueRequest', ], 'output' => [ 'shape' => 'CreateQueueResult', 'resultWrapper' => 'CreateQueueResult', ], 'errors' => [ [ 'shape' => 'QueueDeletedRecently', ], [ 'shape' => 'QueueNameExists', ], ], ], 'DeleteMessage' => [ 'name' => 'DeleteMessage', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteMessageRequest', ], 'errors' => [ [ 'shape' => 'InvalidIdFormat', ], [ 'shape' => 'ReceiptHandleIsInvalid', ], ], ], 'DeleteMessageBatch' => [ 'name' => 'DeleteMessageBatch', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteMessageBatchRequest', ], 'output' => [ 'shape' => 'DeleteMessageBatchResult', 'resultWrapper' => 'DeleteMessageBatchResult', ], 'errors' => [ [ 'shape' => 'TooManyEntriesInBatchRequest', ], [ 'shape' => 'EmptyBatchRequest', ], [ 'shape' => 'BatchEntryIdsNotDistinct', ], [ 'shape' => 'InvalidBatchEntryId', ], ], ], 'DeleteQueue' => [ 'name' => 'DeleteQueue', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteQueueRequest', ], ], 'GetQueueAttributes' => [ 'name' => 'GetQueueAttributes', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetQueueAttributesRequest', ], 'output' => [ 'shape' => 'GetQueueAttributesResult', 'resultWrapper' => 'GetQueueAttributesResult', ], 'errors' => [ [ 'shape' => 'InvalidAttributeName', ], ], ], 'GetQueueUrl' => [ 'name' => 'GetQueueUrl', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetQueueUrlRequest', ], 'output' => [ 'shape' => 'GetQueueUrlResult', 'resultWrapper' => 'GetQueueUrlResult', ], 'errors' => [ [ 'shape' => 'QueueDoesNotExist', ], ], ], 'ListDeadLetterSourceQueues' => [ 'name' => 'ListDeadLetterSourceQueues', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListDeadLetterSourceQueuesRequest', ], 'output' => [ 'shape' => 'ListDeadLetterSourceQueuesResult', 'resultWrapper' => 'ListDeadLetterSourceQueuesResult', ], 'errors' => [ [ 'shape' => 'QueueDoesNotExist', ], ], ], 'ListQueueTags' => [ 'name' => 'ListQueueTags', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListQueueTagsRequest', ], 'output' => [ 'shape' => 'ListQueueTagsResult', 'resultWrapper' => 'ListQueueTagsResult', ], ], 'ListQueues' => [ 'name' => 'ListQueues', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListQueuesRequest', ], 'output' => [ 'shape' => 'ListQueuesResult', 'resultWrapper' => 'ListQueuesResult', ], ], 'PurgeQueue' => [ 'name' => 'PurgeQueue', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'PurgeQueueRequest', ], 'errors' => [ [ 'shape' => 'QueueDoesNotExist', ], [ 'shape' => 'PurgeQueueInProgress', ], ], ], 'ReceiveMessage' => [ 'name' => 'ReceiveMessage', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ReceiveMessageRequest', ], 'output' => [ 'shape' => 'ReceiveMessageResult', 'resultWrapper' => 'ReceiveMessageResult', ], 'errors' => [ [ 'shape' => 'OverLimit', ], ], ], 'RemovePermission' => [ 'name' => 'RemovePermission', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'RemovePermissionRequest', ], ], 'SendMessage' => [ 'name' => 'SendMessage', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'SendMessageRequest', ], 'output' => [ 'shape' => 'SendMessageResult', 'resultWrapper' => 'SendMessageResult', ], 'errors' => [ [ 'shape' => 'InvalidMessageContents', ], [ 'shape' => 'UnsupportedOperation', ], ], ], 'SendMessageBatch' => [ 'name' => 'SendMessageBatch', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'SendMessageBatchRequest', ], 'output' => [ 'shape' => 'SendMessageBatchResult', 'resultWrapper' => 'SendMessageBatchResult', ], 'errors' => [ [ 'shape' => 'TooManyEntriesInBatchRequest', ], [ 'shape' => 'EmptyBatchRequest', ], [ 'shape' => 'BatchEntryIdsNotDistinct', ], [ 'shape' => 'BatchRequestTooLong', ], [ 'shape' => 'InvalidBatchEntryId', ], [ 'shape' => 'UnsupportedOperation', ], ], ], 'SetQueueAttributes' => [ 'name' => 'SetQueueAttributes', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'SetQueueAttributesRequest', ], 'errors' => [ [ 'shape' => 'InvalidAttributeName', ], ], ], 'TagQueue' => [ 'name' => 'TagQueue', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'TagQueueRequest', ], ], 'UntagQueue' => [ 'name' => 'UntagQueue', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UntagQueueRequest', ], ], ], 'shapes' => [ 'AWSAccountIdList' => [ 'type' => 'list', 'member' => [ 'shape' => 'String', 'locationName' => 'AWSAccountId', ], 'flattened' => true, ], 'ActionNameList' => [ 'type' => 'list', 'member' => [ 'shape' => 'String', 'locationName' => 'ActionName', ], 'flattened' => true, ], 'AddPermissionRequest' => [ 'type' => 'structure', 'required' => [ 'QueueUrl', 'Label', 'AWSAccountIds', 'Actions', ], 'members' => [ 'QueueUrl' => [ 'shape' => 'String', ], 'Label' => [ 'shape' => 'String', ], 'AWSAccountIds' => [ 'shape' => 'AWSAccountIdList', ], 'Actions' => [ 'shape' => 'ActionNameList', ], ], ], 'AttributeNameList' => [ 'type' => 'list', 'member' => [ 'shape' => 'QueueAttributeName', 'locationName' => 'AttributeName', ], 'flattened' => true, ], 'BatchEntryIdsNotDistinct' => [ 'type' => 'structure', 'members' => [], 'error' => [ 'code' => 'AWS.SimpleQueueService.BatchEntryIdsNotDistinct', 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'BatchRequestTooLong' => [ 'type' => 'structure', 'members' => [], 'error' => [ 'code' => 'AWS.SimpleQueueService.BatchRequestTooLong', 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'BatchResultErrorEntry' => [ 'type' => 'structure', 'required' => [ 'Id', 'SenderFault', 'Code', ], 'members' => [ 'Id' => [ 'shape' => 'String', ], 'SenderFault' => [ 'shape' => 'Boolean', ], 'Code' => [ 'shape' => 'String', ], 'Message' => [ 'shape' => 'String', ], ], ], 'BatchResultErrorEntryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'BatchResultErrorEntry', 'locationName' => 'BatchResultErrorEntry', ], 'flattened' => true, ], 'Binary' => [ 'type' => 'blob', ], 'BinaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Binary', 'locationName' => 'BinaryListValue', ], ], 'Boolean' => [ 'type' => 'boolean', ], 'BoxedInteger' => [ 'type' => 'integer', 'box' => true, ], 'ChangeMessageVisibilityBatchRequest' => [ 'type' => 'structure', 'required' => [ 'QueueUrl', 'Entries', ], 'members' => [ 'QueueUrl' => [ 'shape' => 'String', ], 'Entries' => [ 'shape' => 'ChangeMessageVisibilityBatchRequestEntryList', ], ], ], 'ChangeMessageVisibilityBatchRequestEntry' => [ 'type' => 'structure', 'required' => [ 'Id', 'ReceiptHandle', ], 'members' => [ 'Id' => [ 'shape' => 'String', ], 'ReceiptHandle' => [ 'shape' => 'String', ], 'VisibilityTimeout' => [ 'shape' => 'Integer', ], ], ], 'ChangeMessageVisibilityBatchRequestEntryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ChangeMessageVisibilityBatchRequestEntry', 'locationName' => 'ChangeMessageVisibilityBatchRequestEntry', ], 'flattened' => true, ], 'ChangeMessageVisibilityBatchResult' => [ 'type' => 'structure', 'required' => [ 'Successful', 'Failed', ], 'members' => [ 'Successful' => [ 'shape' => 'ChangeMessageVisibilityBatchResultEntryList', ], 'Failed' => [ 'shape' => 'BatchResultErrorEntryList', ], ], ], 'ChangeMessageVisibilityBatchResultEntry' => [ 'type' => 'structure', 'required' => [ 'Id', ], 'members' => [ 'Id' => [ 'shape' => 'String', ], ], ], 'ChangeMessageVisibilityBatchResultEntryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ChangeMessageVisibilityBatchResultEntry', 'locationName' => 'ChangeMessageVisibilityBatchResultEntry', ], 'flattened' => true, ], 'ChangeMessageVisibilityRequest' => [ 'type' => 'structure', 'required' => [ 'QueueUrl', 'ReceiptHandle', 'VisibilityTimeout', ], 'members' => [ 'QueueUrl' => [ 'shape' => 'String', ], 'ReceiptHandle' => [ 'shape' => 'String', ], 'VisibilityTimeout' => [ 'shape' => 'Integer', ], ], ], 'CreateQueueRequest' => [ 'type' => 'structure', 'required' => [ 'QueueName', ], 'members' => [ 'QueueName' => [ 'shape' => 'String', ], 'Attributes' => [ 'shape' => 'QueueAttributeMap', 'locationName' => 'Attribute', ], 'tags' => [ 'shape' => 'TagMap', 'locationName' => 'Tag', ], ], ], 'CreateQueueResult' => [ 'type' => 'structure', 'members' => [ 'QueueUrl' => [ 'shape' => 'String', ], ], ], 'DeleteMessageBatchRequest' => [ 'type' => 'structure', 'required' => [ 'QueueUrl', 'Entries', ], 'members' => [ 'QueueUrl' => [ 'shape' => 'String', ], 'Entries' => [ 'shape' => 'DeleteMessageBatchRequestEntryList', ], ], ], 'DeleteMessageBatchRequestEntry' => [ 'type' => 'structure', 'required' => [ 'Id', 'ReceiptHandle', ], 'members' => [ 'Id' => [ 'shape' => 'String', ], 'ReceiptHandle' => [ 'shape' => 'String', ], ], ], 'DeleteMessageBatchRequestEntryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'DeleteMessageBatchRequestEntry', 'locationName' => 'DeleteMessageBatchRequestEntry', ], 'flattened' => true, ], 'DeleteMessageBatchResult' => [ 'type' => 'structure', 'required' => [ 'Successful', 'Failed', ], 'members' => [ 'Successful' => [ 'shape' => 'DeleteMessageBatchResultEntryList', ], 'Failed' => [ 'shape' => 'BatchResultErrorEntryList', ], ], ], 'DeleteMessageBatchResultEntry' => [ 'type' => 'structure', 'required' => [ 'Id', ], 'members' => [ 'Id' => [ 'shape' => 'String', ], ], ], 'DeleteMessageBatchResultEntryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'DeleteMessageBatchResultEntry', 'locationName' => 'DeleteMessageBatchResultEntry', ], 'flattened' => true, ], 'DeleteMessageRequest' => [ 'type' => 'structure', 'required' => [ 'QueueUrl', 'ReceiptHandle', ], 'members' => [ 'QueueUrl' => [ 'shape' => 'String', ], 'ReceiptHandle' => [ 'shape' => 'String', ], ], ], 'DeleteQueueRequest' => [ 'type' => 'structure', 'required' => [ 'QueueUrl', ], 'members' => [ 'QueueUrl' => [ 'shape' => 'String', ], ], ], 'EmptyBatchRequest' => [ 'type' => 'structure', 'members' => [], 'error' => [ 'code' => 'AWS.SimpleQueueService.EmptyBatchRequest', 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'GetQueueAttributesRequest' => [ 'type' => 'structure', 'required' => [ 'QueueUrl', ], 'members' => [ 'QueueUrl' => [ 'shape' => 'String', ], 'AttributeNames' => [ 'shape' => 'AttributeNameList', ], ], ], 'GetQueueAttributesResult' => [ 'type' => 'structure', 'members' => [ 'Attributes' => [ 'shape' => 'QueueAttributeMap', 'locationName' => 'Attribute', ], ], ], 'GetQueueUrlRequest' => [ 'type' => 'structure', 'required' => [ 'QueueName', ], 'members' => [ 'QueueName' => [ 'shape' => 'String', ], 'QueueOwnerAWSAccountId' => [ 'shape' => 'String', ], ], ], 'GetQueueUrlResult' => [ 'type' => 'structure', 'members' => [ 'QueueUrl' => [ 'shape' => 'String', ], ], ], 'Integer' => [ 'type' => 'integer', ], 'InvalidAttributeName' => [ 'type' => 'structure', 'members' => [], 'exception' => true, ], 'InvalidBatchEntryId' => [ 'type' => 'structure', 'members' => [], 'error' => [ 'code' => 'AWS.SimpleQueueService.InvalidBatchEntryId', 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'InvalidIdFormat' => [ 'type' => 'structure', 'members' => [], 'exception' => true, ], 'InvalidMessageContents' => [ 'type' => 'structure', 'members' => [], 'exception' => true, ], 'ListDeadLetterSourceQueuesRequest' => [ 'type' => 'structure', 'required' => [ 'QueueUrl', ], 'members' => [ 'QueueUrl' => [ 'shape' => 'String', ], 'NextToken' => [ 'shape' => 'Token', ], 'MaxResults' => [ 'shape' => 'BoxedInteger', ], ], ], 'ListDeadLetterSourceQueuesResult' => [ 'type' => 'structure', 'required' => [ 'queueUrls', ], 'members' => [ 'queueUrls' => [ 'shape' => 'QueueUrlList', ], 'NextToken' => [ 'shape' => 'Token', ], ], ], 'ListQueueTagsRequest' => [ 'type' => 'structure', 'required' => [ 'QueueUrl', ], 'members' => [ 'QueueUrl' => [ 'shape' => 'String', ], ], ], 'ListQueueTagsResult' => [ 'type' => 'structure', 'members' => [ 'Tags' => [ 'shape' => 'TagMap', 'locationName' => 'Tag', ], ], ], 'ListQueuesRequest' => [ 'type' => 'structure', 'members' => [ 'QueueNamePrefix' => [ 'shape' => 'String', ], 'NextToken' => [ 'shape' => 'Token', ], 'MaxResults' => [ 'shape' => 'BoxedInteger', ], ], ], 'ListQueuesResult' => [ 'type' => 'structure', 'members' => [ 'QueueUrls' => [ 'shape' => 'QueueUrlList', ], 'NextToken' => [ 'shape' => 'Token', ], ], ], 'Message' => [ 'type' => 'structure', 'members' => [ 'MessageId' => [ 'shape' => 'String', ], 'ReceiptHandle' => [ 'shape' => 'String', ], 'MD5OfBody' => [ 'shape' => 'String', ], 'Body' => [ 'shape' => 'String', ], 'Attributes' => [ 'shape' => 'MessageSystemAttributeMap', 'locationName' => 'Attribute', ], 'MD5OfMessageAttributes' => [ 'shape' => 'String', ], 'MessageAttributes' => [ 'shape' => 'MessageBodyAttributeMap', 'locationName' => 'MessageAttribute', ], ], ], 'MessageAttributeName' => [ 'type' => 'string', ], 'MessageAttributeNameList' => [ 'type' => 'list', 'member' => [ 'shape' => 'MessageAttributeName', 'locationName' => 'MessageAttributeName', ], 'flattened' => true, ], 'MessageAttributeValue' => [ 'type' => 'structure', 'required' => [ 'DataType', ], 'members' => [ 'StringValue' => [ 'shape' => 'String', ], 'BinaryValue' => [ 'shape' => 'Binary', ], 'StringListValues' => [ 'shape' => 'StringList', 'flattened' => true, 'locationName' => 'StringListValue', ], 'BinaryListValues' => [ 'shape' => 'BinaryList', 'flattened' => true, 'locationName' => 'BinaryListValue', ], 'DataType' => [ 'shape' => 'String', ], ], ], 'MessageBodyAttributeMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'String', 'locationName' => 'Name', ], 'value' => [ 'shape' => 'MessageAttributeValue', 'locationName' => 'Value', ], 'flattened' => true, ], 'MessageBodySystemAttributeMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'MessageSystemAttributeNameForSends', 'locationName' => 'Name', ], 'value' => [ 'shape' => 'MessageSystemAttributeValue', 'locationName' => 'Value', ], 'flattened' => true, ], 'MessageList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Message', 'locationName' => 'Message', ], 'flattened' => true, ], 'MessageNotInflight' => [ 'type' => 'structure', 'members' => [], 'error' => [ 'code' => 'AWS.SimpleQueueService.MessageNotInflight', 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'MessageSystemAttributeMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'MessageSystemAttributeName', 'locationName' => 'Name', ], 'value' => [ 'shape' => 'String', 'locationName' => 'Value', ], 'flattened' => true, 'locationName' => 'Attribute', ], 'MessageSystemAttributeName' => [ 'type' => 'string', 'enum' => [ 'SenderId', 'SentTimestamp', 'ApproximateReceiveCount', 'ApproximateFirstReceiveTimestamp', 'SequenceNumber', 'MessageDeduplicationId', 'MessageGroupId', 'AWSTraceHeader', ], ], 'MessageSystemAttributeNameForSends' => [ 'type' => 'string', 'enum' => [ 'AWSTraceHeader', ], ], 'MessageSystemAttributeValue' => [ 'type' => 'structure', 'required' => [ 'DataType', ], 'members' => [ 'StringValue' => [ 'shape' => 'String', ], 'BinaryValue' => [ 'shape' => 'Binary', ], 'StringListValues' => [ 'shape' => 'StringList', 'flattened' => true, 'locationName' => 'StringListValue', ], 'BinaryListValues' => [ 'shape' => 'BinaryList', 'flattened' => true, 'locationName' => 'BinaryListValue', ], 'DataType' => [ 'shape' => 'String', ], ], ], 'OverLimit' => [ 'type' => 'structure', 'members' => [], 'error' => [ 'code' => 'OverLimit', 'httpStatusCode' => 403, 'senderFault' => true, ], 'exception' => true, ], 'PurgeQueueInProgress' => [ 'type' => 'structure', 'members' => [], 'error' => [ 'code' => 'AWS.SimpleQueueService.PurgeQueueInProgress', 'httpStatusCode' => 403, 'senderFault' => true, ], 'exception' => true, ], 'PurgeQueueRequest' => [ 'type' => 'structure', 'required' => [ 'QueueUrl', ], 'members' => [ 'QueueUrl' => [ 'shape' => 'String', ], ], ], 'QueueAttributeMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'QueueAttributeName', 'locationName' => 'Name', ], 'value' => [ 'shape' => 'String', 'locationName' => 'Value', ], 'flattened' => true, 'locationName' => 'Attribute', ], 'QueueAttributeName' => [ 'type' => 'string', 'enum' => [ 'All', 'Policy', 'VisibilityTimeout', 'MaximumMessageSize', 'MessageRetentionPeriod', 'ApproximateNumberOfMessages', 'ApproximateNumberOfMessagesNotVisible', 'CreatedTimestamp', 'LastModifiedTimestamp', 'QueueArn', 'ApproximateNumberOfMessagesDelayed', 'DelaySeconds', 'ReceiveMessageWaitTimeSeconds', 'RedrivePolicy', 'FifoQueue', 'ContentBasedDeduplication', 'KmsMasterKeyId', 'KmsDataKeyReusePeriodSeconds', ], ], 'QueueDeletedRecently' => [ 'type' => 'structure', 'members' => [], 'error' => [ 'code' => 'AWS.SimpleQueueService.QueueDeletedRecently', 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'QueueDoesNotExist' => [ 'type' => 'structure', 'members' => [], 'error' => [ 'code' => 'AWS.SimpleQueueService.NonExistentQueue', 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'QueueNameExists' => [ 'type' => 'structure', 'members' => [], 'error' => [ 'code' => 'QueueAlreadyExists', 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'QueueUrlList' => [ 'type' => 'list', 'member' => [ 'shape' => 'String', 'locationName' => 'QueueUrl', ], 'flattened' => true, ], 'ReceiptHandleIsInvalid' => [ 'type' => 'structure', 'members' => [], 'exception' => true, ], 'ReceiveMessageRequest' => [ 'type' => 'structure', 'required' => [ 'QueueUrl', ], 'members' => [ 'QueueUrl' => [ 'shape' => 'String', ], 'AttributeNames' => [ 'shape' => 'AttributeNameList', ], 'MessageAttributeNames' => [ 'shape' => 'MessageAttributeNameList', ], 'MaxNumberOfMessages' => [ 'shape' => 'Integer', ], 'VisibilityTimeout' => [ 'shape' => 'Integer', ], 'WaitTimeSeconds' => [ 'shape' => 'Integer', ], 'ReceiveRequestAttemptId' => [ 'shape' => 'String', ], ], ], 'ReceiveMessageResult' => [ 'type' => 'structure', 'members' => [ 'Messages' => [ 'shape' => 'MessageList', ], ], ], 'RemovePermissionRequest' => [ 'type' => 'structure', 'required' => [ 'QueueUrl', 'Label', ], 'members' => [ 'QueueUrl' => [ 'shape' => 'String', ], 'Label' => [ 'shape' => 'String', ], ], ], 'SendMessageBatchRequest' => [ 'type' => 'structure', 'required' => [ 'QueueUrl', 'Entries', ], 'members' => [ 'QueueUrl' => [ 'shape' => 'String', ], 'Entries' => [ 'shape' => 'SendMessageBatchRequestEntryList', ], ], ], 'SendMessageBatchRequestEntry' => [ 'type' => 'structure', 'required' => [ 'Id', 'MessageBody', ], 'members' => [ 'Id' => [ 'shape' => 'String', ], 'MessageBody' => [ 'shape' => 'String', ], 'DelaySeconds' => [ 'shape' => 'Integer', ], 'MessageAttributes' => [ 'shape' => 'MessageBodyAttributeMap', 'locationName' => 'MessageAttribute', ], 'MessageSystemAttributes' => [ 'shape' => 'MessageBodySystemAttributeMap', 'locationName' => 'MessageSystemAttribute', ], 'MessageDeduplicationId' => [ 'shape' => 'String', ], 'MessageGroupId' => [ 'shape' => 'String', ], ], ], 'SendMessageBatchRequestEntryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SendMessageBatchRequestEntry', 'locationName' => 'SendMessageBatchRequestEntry', ], 'flattened' => true, ], 'SendMessageBatchResult' => [ 'type' => 'structure', 'required' => [ 'Successful', 'Failed', ], 'members' => [ 'Successful' => [ 'shape' => 'SendMessageBatchResultEntryList', ], 'Failed' => [ 'shape' => 'BatchResultErrorEntryList', ], ], ], 'SendMessageBatchResultEntry' => [ 'type' => 'structure', 'required' => [ 'Id', 'MessageId', 'MD5OfMessageBody', ], 'members' => [ 'Id' => [ 'shape' => 'String', ], 'MessageId' => [ 'shape' => 'String', ], 'MD5OfMessageBody' => [ 'shape' => 'String', ], 'MD5OfMessageAttributes' => [ 'shape' => 'String', ], 'MD5OfMessageSystemAttributes' => [ 'shape' => 'String', ], 'SequenceNumber' => [ 'shape' => 'String', ], ], ], 'SendMessageBatchResultEntryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SendMessageBatchResultEntry', 'locationName' => 'SendMessageBatchResultEntry', ], 'flattened' => true, ], 'SendMessageRequest' => [ 'type' => 'structure', 'required' => [ 'QueueUrl', 'MessageBody', ], 'members' => [ 'QueueUrl' => [ 'shape' => 'String', ], 'MessageBody' => [ 'shape' => 'String', ], 'DelaySeconds' => [ 'shape' => 'Integer', ], 'MessageAttributes' => [ 'shape' => 'MessageBodyAttributeMap', 'locationName' => 'MessageAttribute', ], 'MessageSystemAttributes' => [ 'shape' => 'MessageBodySystemAttributeMap', 'locationName' => 'MessageSystemAttribute', ], 'MessageDeduplicationId' => [ 'shape' => 'String', ], 'MessageGroupId' => [ 'shape' => 'String', ], ], ], 'SendMessageResult' => [ 'type' => 'structure', 'members' => [ 'MD5OfMessageBody' => [ 'shape' => 'String', ], 'MD5OfMessageAttributes' => [ 'shape' => 'String', ], 'MD5OfMessageSystemAttributes' => [ 'shape' => 'String', ], 'MessageId' => [ 'shape' => 'String', ], 'SequenceNumber' => [ 'shape' => 'String', ], ], ], 'SetQueueAttributesRequest' => [ 'type' => 'structure', 'required' => [ 'QueueUrl', 'Attributes', ], 'members' => [ 'QueueUrl' => [ 'shape' => 'String', ], 'Attributes' => [ 'shape' => 'QueueAttributeMap', 'locationName' => 'Attribute', ], ], ], 'String' => [ 'type' => 'string', ], 'StringList' => [ 'type' => 'list', 'member' => [ 'shape' => 'String', 'locationName' => 'StringListValue', ], ], 'TagKey' => [ 'type' => 'string', ], 'TagKeyList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagKey', 'locationName' => 'TagKey', ], 'flattened' => true, ], 'TagMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'TagKey', 'locationName' => 'Key', ], 'value' => [ 'shape' => 'TagValue', 'locationName' => 'Value', ], 'flattened' => true, 'locationName' => 'Tag', ], 'TagQueueRequest' => [ 'type' => 'structure', 'required' => [ 'QueueUrl', 'Tags', ], 'members' => [ 'QueueUrl' => [ 'shape' => 'String', ], 'Tags' => [ 'shape' => 'TagMap', ], ], ], 'TagValue' => [ 'type' => 'string', ], 'Token' => [ 'type' => 'string', ], 'TooManyEntriesInBatchRequest' => [ 'type' => 'structure', 'members' => [], 'error' => [ 'code' => 'AWS.SimpleQueueService.TooManyEntriesInBatchRequest', 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'UnsupportedOperation' => [ 'type' => 'structure', 'members' => [], 'error' => [ 'code' => 'AWS.SimpleQueueService.UnsupportedOperation', 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'UntagQueueRequest' => [ 'type' => 'structure', 'required' => [ 'QueueUrl', 'TagKeys', ], 'members' => [ 'QueueUrl' => [ 'shape' => 'String', ], 'TagKeys' => [ 'shape' => 'TagKeyList', ], ], ], ],];
