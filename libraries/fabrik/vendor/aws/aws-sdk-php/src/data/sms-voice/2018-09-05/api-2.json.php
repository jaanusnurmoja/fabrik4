<?php
// This file was auto-generated from sdk-root/src/data/sms-voice/2018-09-05/api-2.json
return [ 'metadata' => [ 'apiVersion' => '2018-09-05', 'endpointPrefix' => 'sms-voice.pinpoint', 'signingName' => 'sms-voice', 'serviceAbbreviation' => 'Pinpoint SMS Voice', 'serviceFullName' => 'Amazon Pinpoint SMS and Voice Service', 'serviceId' => 'Pinpoint SMS Voice', 'protocol' => 'rest-json', 'jsonVersion' => '1.1', 'uid' => 'pinpoint-sms-voice-2018-09-05', 'signatureVersion' => 'v4', ], 'operations' => [ 'CreateConfigurationSet' => [ 'name' => 'CreateConfigurationSet', 'http' => [ 'method' => 'POST', 'requestUri' => '/v1/sms-voice/configuration-sets', 'responseCode' => 200, ], 'input' => [ 'shape' => 'CreateConfigurationSetRequest', ], 'output' => [ 'shape' => 'CreateConfigurationSetResponse', ], 'errors' => [ [ 'shape' => 'TooManyRequestsException', ], [ 'shape' => 'BadRequestException', ], [ 'shape' => 'LimitExceededException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'AlreadyExistsException', ], ], ], 'CreateConfigurationSetEventDestination' => [ 'name' => 'CreateConfigurationSetEventDestination', 'http' => [ 'method' => 'POST', 'requestUri' => '/v1/sms-voice/configuration-sets/{ConfigurationSetName}/event-destinations', 'responseCode' => 200, ], 'input' => [ 'shape' => 'CreateConfigurationSetEventDestinationRequest', ], 'output' => [ 'shape' => 'CreateConfigurationSetEventDestinationResponse', ], 'errors' => [ [ 'shape' => 'BadRequestException', ], [ 'shape' => 'LimitExceededException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'NotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], [ 'shape' => 'AlreadyExistsException', ], ], ], 'DeleteConfigurationSet' => [ 'name' => 'DeleteConfigurationSet', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/v1/sms-voice/configuration-sets/{ConfigurationSetName}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DeleteConfigurationSetRequest', ], 'output' => [ 'shape' => 'DeleteConfigurationSetResponse', ], 'errors' => [ [ 'shape' => 'NotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], [ 'shape' => 'BadRequestException', ], [ 'shape' => 'InternalServiceErrorException', ], ], ], 'DeleteConfigurationSetEventDestination' => [ 'name' => 'DeleteConfigurationSetEventDestination', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/v1/sms-voice/configuration-sets/{ConfigurationSetName}/event-destinations/{EventDestinationName}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DeleteConfigurationSetEventDestinationRequest', ], 'output' => [ 'shape' => 'DeleteConfigurationSetEventDestinationResponse', ], 'errors' => [ [ 'shape' => 'NotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], [ 'shape' => 'BadRequestException', ], [ 'shape' => 'InternalServiceErrorException', ], ], ], 'GetConfigurationSetEventDestinations' => [ 'name' => 'GetConfigurationSetEventDestinations', 'http' => [ 'method' => 'GET', 'requestUri' => '/v1/sms-voice/configuration-sets/{ConfigurationSetName}/event-destinations', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetConfigurationSetEventDestinationsRequest', ], 'output' => [ 'shape' => 'GetConfigurationSetEventDestinationsResponse', ], 'errors' => [ [ 'shape' => 'NotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], [ 'shape' => 'BadRequestException', ], [ 'shape' => 'InternalServiceErrorException', ], ], ], 'SendVoiceMessage' => [ 'name' => 'SendVoiceMessage', 'http' => [ 'method' => 'POST', 'requestUri' => '/v1/sms-voice/voice/message', 'responseCode' => 200, ], 'input' => [ 'shape' => 'SendVoiceMessageRequest', ], 'output' => [ 'shape' => 'SendVoiceMessageResponse', ], 'errors' => [ [ 'shape' => 'TooManyRequestsException', ], [ 'shape' => 'BadRequestException', ], [ 'shape' => 'InternalServiceErrorException', ], ], ], 'UpdateConfigurationSetEventDestination' => [ 'name' => 'UpdateConfigurationSetEventDestination', 'http' => [ 'method' => 'PUT', 'requestUri' => '/v1/sms-voice/configuration-sets/{ConfigurationSetName}/event-destinations/{EventDestinationName}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'UpdateConfigurationSetEventDestinationRequest', ], 'output' => [ 'shape' => 'UpdateConfigurationSetEventDestinationResponse', ], 'errors' => [ [ 'shape' => 'NotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], [ 'shape' => 'BadRequestException', ], [ 'shape' => 'InternalServiceErrorException', ], ], ], ], 'shapes' => [ 'AlreadyExistsException' => [ 'type' => 'structure', 'exception' => true, 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 409, ], ], 'BadRequestException' => [ 'type' => 'structure', 'exception' => true, 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 400, ], ], 'Boolean' => [ 'type' => 'boolean', ], 'CallInstructionsMessageType' => [ 'type' => 'structure', 'members' => [ 'Text' => [ 'shape' => 'NonEmptyString', ], ], 'required' => [], ], 'CloudWatchLogsDestination' => [ 'type' => 'structure', 'members' => [ 'IamRoleArn' => [ 'shape' => 'String', ], 'LogGroupArn' => [ 'shape' => 'String', ], ], 'required' => [], ], 'CreateConfigurationSetEventDestinationRequest' => [ 'type' => 'structure', 'members' => [ 'ConfigurationSetName' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'ConfigurationSetName', ], 'EventDestination' => [ 'shape' => 'EventDestinationDefinition', ], 'EventDestinationName' => [ 'shape' => 'NonEmptyString', ], ], 'required' => [ 'ConfigurationSetName', ], ], 'CreateConfigurationSetEventDestinationResponse' => [ 'type' => 'structure', 'members' => [], ], 'CreateConfigurationSetRequest' => [ 'type' => 'structure', 'members' => [ 'ConfigurationSetName' => [ 'shape' => 'WordCharactersWithDelimiters', ], ], ], 'CreateConfigurationSetResponse' => [ 'type' => 'structure', 'members' => [], ], 'DeleteConfigurationSetEventDestinationRequest' => [ 'type' => 'structure', 'members' => [ 'ConfigurationSetName' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'ConfigurationSetName', ], 'EventDestinationName' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'EventDestinationName', ], ], 'required' => [ 'EventDestinationName', 'ConfigurationSetName', ], ], 'DeleteConfigurationSetEventDestinationResponse' => [ 'type' => 'structure', 'members' => [], ], 'DeleteConfigurationSetRequest' => [ 'type' => 'structure', 'members' => [ 'ConfigurationSetName' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'ConfigurationSetName', ], ], 'required' => [ 'ConfigurationSetName', ], ], 'DeleteConfigurationSetResponse' => [ 'type' => 'structure', 'members' => [], ], 'EventDestination' => [ 'type' => 'structure', 'members' => [ 'CloudWatchLogsDestination' => [ 'shape' => 'CloudWatchLogsDestination', ], 'Enabled' => [ 'shape' => 'Boolean', ], 'KinesisFirehoseDestination' => [ 'shape' => 'KinesisFirehoseDestination', ], 'MatchingEventTypes' => [ 'shape' => 'EventTypes', ], 'Name' => [ 'shape' => 'String', ], ], ], 'EventDestinationDefinition' => [ 'type' => 'structure', 'members' => [ 'CloudWatchLogsDestination' => [ 'shape' => 'CloudWatchLogsDestination', ], 'Enabled' => [ 'shape' => 'Boolean', ], 'KinesisFirehoseDestination' => [ 'shape' => 'KinesisFirehoseDestination', ], 'MatchingEventTypes' => [ 'shape' => 'EventTypes', ], ], 'required' => [], ], 'EventDestinations' => [ 'type' => 'list', 'member' => [ 'shape' => 'EventDestination', ], ], 'EventType' => [ 'type' => 'string', 'enum' => [ 'INITIATED_CALL', 'RINGING', 'ANSWERED', 'COMPLETED_CALL', 'BUSY', 'FAILED', 'NO_ANSWER', ], ], 'EventTypes' => [ 'type' => 'list', 'member' => [ 'shape' => 'EventType', ], ], 'GetConfigurationSetEventDestinationsRequest' => [ 'type' => 'structure', 'members' => [ 'ConfigurationSetName' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'ConfigurationSetName', ], ], 'required' => [ 'ConfigurationSetName', ], ], 'GetConfigurationSetEventDestinationsResponse' => [ 'type' => 'structure', 'members' => [ 'EventDestinations' => [ 'shape' => 'EventDestinations', ], ], ], 'InternalServiceErrorException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'exception' => true, 'error' => [ 'httpStatusCode' => 500, ], ], 'KinesisFirehoseDestination' => [ 'type' => 'structure', 'members' => [ 'DeliveryStreamArn' => [ 'shape' => 'String', ], 'IamRoleArn' => [ 'shape' => 'String', ], ], 'required' => [], ], 'LimitExceededException' => [ 'type' => 'structure', 'exception' => true, 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 412, ], ], 'NonEmptyString' => [ 'type' => 'string', ], 'NotFoundException' => [ 'type' => 'structure', 'exception' => true, 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 404, ], ], 'PlainTextMessageType' => [ 'type' => 'structure', 'members' => [ 'LanguageCode' => [ 'shape' => 'String', ], 'Text' => [ 'shape' => 'NonEmptyString', ], 'VoiceId' => [ 'shape' => 'String', ], ], 'required' => [], ], 'SSMLMessageType' => [ 'type' => 'structure', 'members' => [ 'LanguageCode' => [ 'shape' => 'String', ], 'Text' => [ 'shape' => 'NonEmptyString', ], 'VoiceId' => [ 'shape' => 'String', ], ], 'required' => [], ], 'SendVoiceMessageRequest' => [ 'type' => 'structure', 'members' => [ 'CallerId' => [ 'shape' => 'String', ], 'ConfigurationSetName' => [ 'shape' => 'WordCharactersWithDelimiters', ], 'Content' => [ 'shape' => 'VoiceMessageContent', ], 'DestinationPhoneNumber' => [ 'shape' => 'NonEmptyString', ], 'OriginationPhoneNumber' => [ 'shape' => 'NonEmptyString', ], ], ], 'SendVoiceMessageResponse' => [ 'type' => 'structure', 'members' => [ 'MessageId' => [ 'shape' => 'String', ], ], ], 'String' => [ 'type' => 'string', ], 'TooManyRequestsException' => [ 'type' => 'structure', 'exception' => true, 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 429, ], ], 'UpdateConfigurationSetEventDestinationRequest' => [ 'type' => 'structure', 'members' => [ 'ConfigurationSetName' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'ConfigurationSetName', ], 'EventDestination' => [ 'shape' => 'EventDestinationDefinition', ], 'EventDestinationName' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'EventDestinationName', ], ], 'required' => [ 'EventDestinationName', 'ConfigurationSetName', ], ], 'UpdateConfigurationSetEventDestinationResponse' => [ 'type' => 'structure', 'members' => [], ], 'VoiceMessageContent' => [ 'type' => 'structure', 'members' => [ 'CallInstructionsMessage' => [ 'shape' => 'CallInstructionsMessageType', ], 'PlainTextMessage' => [ 'shape' => 'PlainTextMessageType', ], 'SSMLMessage' => [ 'shape' => 'SSMLMessageType', ], ], ], 'WordCharactersWithDelimiters' => [ 'type' => 'string', ], '__boolean' => [ 'type' => 'boolean', ], '__double' => [ 'type' => 'double', ], '__integer' => [ 'type' => 'integer', ], '__long' => [ 'type' => 'long', ], '__string' => [ 'type' => 'string', ], '__timestampIso8601' => [ 'type' => 'timestamp', 'timestampFormat' => 'iso8601', ], '__timestampUnix' => [ 'type' => 'timestamp', 'timestampFormat' => 'unixTimestamp', ], ],];
