<?php
// This file was auto-generated from sdk-root/src/data/outposts/2019-12-03/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2019-12-03', 'endpointPrefix' => 'outposts', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceAbbreviation' => 'Outposts', 'serviceFullName' => 'AWS Outposts', 'serviceId' => 'Outposts', 'signatureVersion' => 'v4', 'signingName' => 'outposts', 'uid' => 'outposts-2019-12-03', ], 'operations' => [ 'CreateOutpost' => [ 'name' => 'CreateOutpost', 'http' => [ 'method' => 'POST', 'requestUri' => '/outposts', ], 'input' => [ 'shape' => 'CreateOutpostInput', ], 'output' => [ 'shape' => 'CreateOutpostOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'NotFoundException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], ], 'DeleteOutpost' => [ 'name' => 'DeleteOutpost', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/outposts/{OutpostId}', ], 'input' => [ 'shape' => 'DeleteOutpostInput', ], 'output' => [ 'shape' => 'DeleteOutpostOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'NotFoundException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], ], ], 'DeleteSite' => [ 'name' => 'DeleteSite', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/sites/{SiteId}', ], 'input' => [ 'shape' => 'DeleteSiteInput', ], 'output' => [ 'shape' => 'DeleteSiteOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'NotFoundException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], ], ], 'GetOutpost' => [ 'name' => 'GetOutpost', 'http' => [ 'method' => 'GET', 'requestUri' => '/outposts/{OutpostId}', ], 'input' => [ 'shape' => 'GetOutpostInput', ], 'output' => [ 'shape' => 'GetOutpostOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'NotFoundException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], ], ], 'GetOutpostInstanceTypes' => [ 'name' => 'GetOutpostInstanceTypes', 'http' => [ 'method' => 'GET', 'requestUri' => '/outposts/{OutpostId}/instanceTypes', ], 'input' => [ 'shape' => 'GetOutpostInstanceTypesInput', ], 'output' => [ 'shape' => 'GetOutpostInstanceTypesOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'NotFoundException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], ], ], 'ListOutposts' => [ 'name' => 'ListOutposts', 'http' => [ 'method' => 'GET', 'requestUri' => '/outposts', ], 'input' => [ 'shape' => 'ListOutpostsInput', ], 'output' => [ 'shape' => 'ListOutpostsOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], ], ], 'ListSites' => [ 'name' => 'ListSites', 'http' => [ 'method' => 'GET', 'requestUri' => '/sites', ], 'input' => [ 'shape' => 'ListSitesInput', ], 'output' => [ 'shape' => 'ListSitesOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], ], ], 'ListTagsForResource' => [ 'name' => 'ListTagsForResource', 'http' => [ 'method' => 'GET', 'requestUri' => '/tags/{ResourceArn}', ], 'input' => [ 'shape' => 'ListTagsForResourceRequest', ], 'output' => [ 'shape' => 'ListTagsForResourceResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'NotFoundException', ], ], ], 'TagResource' => [ 'name' => 'TagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/tags/{ResourceArn}', ], 'input' => [ 'shape' => 'TagResourceRequest', ], 'output' => [ 'shape' => 'TagResourceResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'NotFoundException', ], ], ], 'UntagResource' => [ 'name' => 'UntagResource', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/tags/{ResourceArn}', ], 'input' => [ 'shape' => 'UntagResourceRequest', ], 'output' => [ 'shape' => 'UntagResourceResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'NotFoundException', ], ], ], ], 'shapes' => [ 'AccessDeniedException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 403, ], 'exception' => true, ], 'AccountId' => [ 'type' => 'string', 'max' => 12, 'min' => 12, 'pattern' => '\\d{12}', ], 'Arn' => [ 'type' => 'string', 'max' => 1011, 'pattern' => '^(arn:aws([a-z-]+)?:outposts:[a-z\\d-]+:\\d{12}:([a-z\\d-]+)/)[a-z]{2,8}-[a-f0-9]{17}$', ], 'AvailabilityZone' => [ 'type' => 'string', 'max' => 1000, 'min' => 1, 'pattern' => '^([a-zA-Z]+-){1,3}([a-zA-Z]+)?(\\d+[a-zA-Z]?)?$', ], 'AvailabilityZoneId' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^[a-zA-Z]+\\d-[a-zA-Z]+\\d$', ], 'ConflictException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], 'ResourceId' => [ 'shape' => 'String', ], 'ResourceType' => [ 'shape' => 'ResourceType', ], ], 'error' => [ 'httpStatusCode' => 409, ], 'exception' => true, ], 'CreateOutpostInput' => [ 'type' => 'structure', 'required' => [ 'Name', 'SiteId', ], 'members' => [ 'Name' => [ 'shape' => 'OutpostName', ], 'Description' => [ 'shape' => 'OutpostDescription', ], 'SiteId' => [ 'shape' => 'SiteId', ], 'AvailabilityZone' => [ 'shape' => 'AvailabilityZone', ], 'AvailabilityZoneId' => [ 'shape' => 'AvailabilityZoneId', ], 'Tags' => [ 'shape' => 'TagMap', ], ], ], 'CreateOutpostOutput' => [ 'type' => 'structure', 'members' => [ 'Outpost' => [ 'shape' => 'Outpost', ], ], ], 'DeleteOutpostInput' => [ 'type' => 'structure', 'required' => [ 'OutpostId', ], 'members' => [ 'OutpostId' => [ 'shape' => 'OutpostId', 'location' => 'uri', 'locationName' => 'OutpostId', ], ], ], 'DeleteOutpostOutput' => [ 'type' => 'structure', 'members' => [], ], 'DeleteSiteInput' => [ 'type' => 'structure', 'required' => [ 'SiteId', ], 'members' => [ 'SiteId' => [ 'shape' => 'SiteId', 'location' => 'uri', 'locationName' => 'SiteId', ], ], ], 'DeleteSiteOutput' => [ 'type' => 'structure', 'members' => [], ], 'ErrorMessage' => [ 'type' => 'string', 'max' => 1000, 'min' => 1, 'pattern' => '^[\\S \\n]+$', ], 'GetOutpostInput' => [ 'type' => 'structure', 'required' => [ 'OutpostId', ], 'members' => [ 'OutpostId' => [ 'shape' => 'OutpostId', 'location' => 'uri', 'locationName' => 'OutpostId', ], ], ], 'GetOutpostInstanceTypesInput' => [ 'type' => 'structure', 'required' => [ 'OutpostId', ], 'members' => [ 'OutpostId' => [ 'shape' => 'OutpostId', 'location' => 'uri', 'locationName' => 'OutpostId', ], 'NextToken' => [ 'shape' => 'Token', 'location' => 'querystring', 'locationName' => 'NextToken', ], 'MaxResults' => [ 'shape' => 'MaxResults1000', 'location' => 'querystring', 'locationName' => 'MaxResults', ], ], ], 'GetOutpostInstanceTypesOutput' => [ 'type' => 'structure', 'members' => [ 'InstanceTypes' => [ 'shape' => 'InstanceTypeListDefinition', ], 'NextToken' => [ 'shape' => 'Token', ], 'OutpostId' => [ 'shape' => 'OutpostId', ], 'OutpostArn' => [ 'shape' => 'OutpostArn', ], ], ], 'GetOutpostOutput' => [ 'type' => 'structure', 'members' => [ 'Outpost' => [ 'shape' => 'Outpost', ], ], ], 'InstanceType' => [ 'type' => 'string', ], 'InstanceTypeItem' => [ 'type' => 'structure', 'members' => [ 'InstanceType' => [ 'shape' => 'InstanceType', ], ], ], 'InstanceTypeListDefinition' => [ 'type' => 'list', 'member' => [ 'shape' => 'InstanceTypeItem', ], ], 'InternalServerException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, ], 'LifeCycleStatus' => [ 'type' => 'string', ], 'ListOutpostsInput' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'Token', 'location' => 'querystring', 'locationName' => 'NextToken', ], 'MaxResults' => [ 'shape' => 'MaxResults1000', 'location' => 'querystring', 'locationName' => 'MaxResults', ], ], ], 'ListOutpostsOutput' => [ 'type' => 'structure', 'members' => [ 'Outposts' => [ 'shape' => 'outpostListDefinition', ], 'NextToken' => [ 'shape' => 'Token', ], ], ], 'ListSitesInput' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'Token', 'location' => 'querystring', 'locationName' => 'NextToken', ], 'MaxResults' => [ 'shape' => 'MaxResults1000', 'location' => 'querystring', 'locationName' => 'MaxResults', ], ], ], 'ListSitesOutput' => [ 'type' => 'structure', 'members' => [ 'Sites' => [ 'shape' => 'siteListDefinition', ], 'NextToken' => [ 'shape' => 'Token', ], ], ], 'ListTagsForResourceRequest' => [ 'type' => 'structure', 'required' => [ 'ResourceArn', ], 'members' => [ 'ResourceArn' => [ 'shape' => 'Arn', 'location' => 'uri', 'locationName' => 'ResourceArn', ], ], ], 'ListTagsForResourceResponse' => [ 'type' => 'structure', 'members' => [ 'Tags' => [ 'shape' => 'TagMap', ], ], ], 'MaxResults1000' => [ 'type' => 'integer', 'box' => true, 'max' => 1000, 'min' => 1, ], 'NotFoundException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 404, ], 'exception' => true, ], 'Outpost' => [ 'type' => 'structure', 'members' => [ 'OutpostId' => [ 'shape' => 'OutpostId', ], 'OwnerId' => [ 'shape' => 'OwnerId', ], 'OutpostArn' => [ 'shape' => 'OutpostArn', ], 'SiteId' => [ 'shape' => 'SiteId', ], 'Name' => [ 'shape' => 'OutpostName', ], 'Description' => [ 'shape' => 'OutpostDescription', ], 'LifeCycleStatus' => [ 'shape' => 'LifeCycleStatus', ], 'AvailabilityZone' => [ 'shape' => 'AvailabilityZone', ], 'AvailabilityZoneId' => [ 'shape' => 'AvailabilityZoneId', ], 'Tags' => [ 'shape' => 'TagMap', ], 'SiteArn' => [ 'shape' => 'SiteArn', ], ], ], 'OutpostArn' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^arn:aws([a-z-]+)?:outposts:[a-z\\d-]+:\\d{12}:outpost/op-[a-f0-9]{17}$', ], 'OutpostDescription' => [ 'type' => 'string', 'max' => 1000, 'min' => 0, 'pattern' => '^[\\S ]*$', ], 'OutpostId' => [ 'type' => 'string', 'max' => 180, 'min' => 1, 'pattern' => '^(arn:aws([a-z-]+)?:outposts:[a-z\\d-]+:\\d{12}:outpost/)?op-[a-f0-9]{17}$', ], 'OutpostName' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^[\\S ]+$', ], 'OwnerId' => [ 'type' => 'string', 'max' => 12, 'min' => 12, 'pattern' => '\\d{12}', ], 'ResourceType' => [ 'type' => 'string', 'enum' => [ 'OUTPOST', ], ], 'ServiceQuotaExceededException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 402, ], 'exception' => true, ], 'Site' => [ 'type' => 'structure', 'members' => [ 'SiteId' => [ 'shape' => 'SiteId', ], 'AccountId' => [ 'shape' => 'AccountId', ], 'Name' => [ 'shape' => 'SiteName', ], 'Description' => [ 'shape' => 'SiteDescription', ], 'Tags' => [ 'shape' => 'TagMap', ], 'SiteArn' => [ 'shape' => 'SiteArn', ], ], ], 'SiteArn' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^arn:aws([a-z-]+)?:outposts:[a-z\\d-]+:\\d{12}:site/(os-[a-f0-9]{17})$', ], 'SiteDescription' => [ 'type' => 'string', 'max' => 1001, 'min' => 1, 'pattern' => '^[\\S ]+$', ], 'SiteId' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '^(arn:aws([a-z-]+)?:outposts:[a-z\\d-]+:\\d{12}:site/)?(os-[a-f0-9]{17})$', ], 'SiteName' => [ 'type' => 'string', 'max' => 1000, 'min' => 1, 'pattern' => '^[\\S ]+$', ], 'String' => [ 'type' => 'string', 'max' => 1000, 'min' => 1, 'pattern' => '^[\\S \\n]+$', ], 'TagKey' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^(?!aws:)[a-zA-Z+-=._:/]+$', ], 'TagKeyList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagKey', ], 'max' => 50, 'min' => 1, ], 'TagMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'TagKey', ], 'value' => [ 'shape' => 'TagValue', ], 'max' => 50, 'min' => 1, ], 'TagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'ResourceArn', 'Tags', ], 'members' => [ 'ResourceArn' => [ 'shape' => 'Arn', 'location' => 'uri', 'locationName' => 'ResourceArn', ], 'Tags' => [ 'shape' => 'TagMap', ], ], ], 'TagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'TagValue' => [ 'type' => 'string', 'max' => 256, 'pattern' => '^[\\S \\n]+$', ], 'Token' => [ 'type' => 'string', 'max' => 1005, 'min' => 1, 'pattern' => '^(\\d+)##(\\S+)$', ], 'UntagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'ResourceArn', 'TagKeys', ], 'members' => [ 'ResourceArn' => [ 'shape' => 'Arn', 'location' => 'uri', 'locationName' => 'ResourceArn', ], 'TagKeys' => [ 'shape' => 'TagKeyList', 'location' => 'querystring', 'locationName' => 'tagKeys', ], ], ], 'UntagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'ValidationException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'outpostListDefinition' => [ 'type' => 'list', 'member' => [ 'shape' => 'Outpost', ], ], 'siteListDefinition' => [ 'type' => 'list', 'member' => [ 'shape' => 'Site', ], ], ],];
