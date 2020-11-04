<?php
// This file was auto-generated from sdk-root/src/data/personalize-events/2018-03-22/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2018-03-22', 'endpointPrefix' => 'personalize-events', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceFullName' => 'Amazon Personalize Events', 'serviceId' => 'Personalize Events', 'signatureVersion' => 'v4', 'signingName' => 'personalize', 'uid' => 'personalize-events-2018-03-22', ], 'operations' => [ 'PutEvents' => [ 'name' => 'PutEvents', 'http' => [ 'method' => 'POST', 'requestUri' => '/events', ], 'input' => [ 'shape' => 'PutEventsRequest', ], 'errors' => [ [ 'shape' => 'InvalidInputException', ], ], ], 'PutItems' => [ 'name' => 'PutItems', 'http' => [ 'method' => 'POST', 'requestUri' => '/items', ], 'input' => [ 'shape' => 'PutItemsRequest', ], 'errors' => [ [ 'shape' => 'InvalidInputException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'PutUsers' => [ 'name' => 'PutUsers', 'http' => [ 'method' => 'POST', 'requestUri' => '/users', ], 'input' => [ 'shape' => 'PutUsersRequest', ], 'errors' => [ [ 'shape' => 'InvalidInputException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], ], 'shapes' => [ 'Arn' => [ 'type' => 'string', 'max' => 256, 'pattern' => 'arn:([a-z\\d-]+):personalize:.*:.*:.+', ], 'Date' => [ 'type' => 'timestamp', ], 'ErrorMessage' => [ 'type' => 'string', ], 'Event' => [ 'type' => 'structure', 'required' => [ 'eventType', 'sentAt', ], 'members' => [ 'eventId' => [ 'shape' => 'StringType', ], 'eventType' => [ 'shape' => 'StringType', ], 'eventValue' => [ 'shape' => 'FloatType', ], 'itemId' => [ 'shape' => 'ItemId', ], 'properties' => [ 'shape' => 'EventPropertiesJSON', 'jsonvalue' => true, ], 'sentAt' => [ 'shape' => 'Date', ], 'recommendationId' => [ 'shape' => 'RecommendationId', ], 'impression' => [ 'shape' => 'Impression', ], ], ], 'EventList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Event', ], 'max' => 10, 'min' => 1, ], 'EventPropertiesJSON' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, ], 'FloatType' => [ 'type' => 'float', ], 'Impression' => [ 'type' => 'list', 'member' => [ 'shape' => 'ItemId', ], 'max' => 25, 'min' => 1, ], 'InvalidInputException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'Item' => [ 'type' => 'structure', 'required' => [ 'itemId', ], 'members' => [ 'itemId' => [ 'shape' => 'StringType', ], 'properties' => [ 'shape' => 'ItemProperties', 'jsonvalue' => true, ], ], ], 'ItemId' => [ 'type' => 'string', 'max' => 256, 'min' => 1, ], 'ItemList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Item', ], 'max' => 10, 'min' => 1, ], 'ItemProperties' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, ], 'PutEventsRequest' => [ 'type' => 'structure', 'required' => [ 'trackingId', 'sessionId', 'eventList', ], 'members' => [ 'trackingId' => [ 'shape' => 'StringType', ], 'userId' => [ 'shape' => 'UserId', ], 'sessionId' => [ 'shape' => 'StringType', ], 'eventList' => [ 'shape' => 'EventList', ], ], ], 'PutItemsRequest' => [ 'type' => 'structure', 'required' => [ 'datasetArn', 'items', ], 'members' => [ 'datasetArn' => [ 'shape' => 'Arn', ], 'items' => [ 'shape' => 'ItemList', ], ], ], 'PutUsersRequest' => [ 'type' => 'structure', 'required' => [ 'datasetArn', 'users', ], 'members' => [ 'datasetArn' => [ 'shape' => 'Arn', ], 'users' => [ 'shape' => 'UserList', ], ], ], 'RecommendationId' => [ 'type' => 'string', 'max' => 40, 'min' => 1, ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 404, ], 'exception' => true, ], 'StringType' => [ 'type' => 'string', 'max' => 256, 'min' => 1, ], 'User' => [ 'type' => 'structure', 'required' => [ 'userId', ], 'members' => [ 'userId' => [ 'shape' => 'StringType', ], 'properties' => [ 'shape' => 'UserProperties', 'jsonvalue' => true, ], ], ], 'UserId' => [ 'type' => 'string', 'max' => 256, 'min' => 1, ], 'UserList' => [ 'type' => 'list', 'member' => [ 'shape' => 'User', ], 'max' => 10, 'min' => 1, ], 'UserProperties' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, ], ],];
