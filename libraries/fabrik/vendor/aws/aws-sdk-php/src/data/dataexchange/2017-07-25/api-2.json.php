<?php
// This file was auto-generated from sdk-root/src/data/dataexchange/2017-07-25/api-2.json
return [ 'metadata' => [ 'apiVersion' => '2017-07-25', 'endpointPrefix' => 'dataexchange', 'signingName' => 'dataexchange', 'serviceFullName' => 'AWS Data Exchange', 'serviceId' => 'DataExchange', 'protocol' => 'rest-json', 'jsonVersion' => '1.1', 'uid' => 'dataexchange-2017-07-25', 'signatureVersion' => 'v4', ], 'operations' => [ 'CancelJob' => [ 'name' => 'CancelJob', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/v1/jobs/{JobId}', 'responseCode' => 204, ], 'input' => [ 'shape' => 'CancelJobRequest', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ConflictException', ], ], ], 'CreateDataSet' => [ 'name' => 'CreateDataSet', 'http' => [ 'method' => 'POST', 'requestUri' => '/v1/data-sets', 'responseCode' => 201, ], 'input' => [ 'shape' => 'CreateDataSetRequest', ], 'output' => [ 'shape' => 'CreateDataSetResponse', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ServiceLimitExceededException', ], [ 'shape' => 'AccessDeniedException', ], ], ], 'CreateJob' => [ 'name' => 'CreateJob', 'http' => [ 'method' => 'POST', 'requestUri' => '/v1/jobs', 'responseCode' => 201, ], 'input' => [ 'shape' => 'CreateJobRequest', ], 'output' => [ 'shape' => 'CreateJobResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], ], ], 'CreateRevision' => [ 'name' => 'CreateRevision', 'http' => [ 'method' => 'POST', 'requestUri' => '/v1/data-sets/{DataSetId}/revisions', 'responseCode' => 201, ], 'input' => [ 'shape' => 'CreateRevisionRequest', ], 'output' => [ 'shape' => 'CreateRevisionResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], ], ], 'DeleteAsset' => [ 'name' => 'DeleteAsset', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/v1/data-sets/{DataSetId}/revisions/{RevisionId}/assets/{AssetId}', 'responseCode' => 204, ], 'input' => [ 'shape' => 'DeleteAssetRequest', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ConflictException', ], ], ], 'DeleteDataSet' => [ 'name' => 'DeleteDataSet', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/v1/data-sets/{DataSetId}', 'responseCode' => 204, ], 'input' => [ 'shape' => 'DeleteDataSetRequest', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ConflictException', ], ], ], 'DeleteRevision' => [ 'name' => 'DeleteRevision', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/v1/data-sets/{DataSetId}/revisions/{RevisionId}', 'responseCode' => 204, ], 'input' => [ 'shape' => 'DeleteRevisionRequest', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ConflictException', ], ], ], 'GetAsset' => [ 'name' => 'GetAsset', 'http' => [ 'method' => 'GET', 'requestUri' => '/v1/data-sets/{DataSetId}/revisions/{RevisionId}/assets/{AssetId}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetAssetRequest', ], 'output' => [ 'shape' => 'GetAssetResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], ], ], 'GetDataSet' => [ 'name' => 'GetDataSet', 'http' => [ 'method' => 'GET', 'requestUri' => '/v1/data-sets/{DataSetId}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetDataSetRequest', ], 'output' => [ 'shape' => 'GetDataSetResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], ], ], 'GetJob' => [ 'name' => 'GetJob', 'http' => [ 'method' => 'GET', 'requestUri' => '/v1/jobs/{JobId}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetJobRequest', ], 'output' => [ 'shape' => 'GetJobResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], ], ], 'GetRevision' => [ 'name' => 'GetRevision', 'http' => [ 'method' => 'GET', 'requestUri' => '/v1/data-sets/{DataSetId}/revisions/{RevisionId}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetRevisionRequest', ], 'output' => [ 'shape' => 'GetRevisionResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], ], ], 'ListDataSetRevisions' => [ 'name' => 'ListDataSetRevisions', 'http' => [ 'method' => 'GET', 'requestUri' => '/v1/data-sets/{DataSetId}/revisions', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListDataSetRevisionsRequest', ], 'output' => [ 'shape' => 'ListDataSetRevisionsResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], ], ], 'ListDataSets' => [ 'name' => 'ListDataSets', 'http' => [ 'method' => 'GET', 'requestUri' => '/v1/data-sets', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListDataSetsRequest', ], 'output' => [ 'shape' => 'ListDataSetsResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], ], ], 'ListJobs' => [ 'name' => 'ListJobs', 'http' => [ 'method' => 'GET', 'requestUri' => '/v1/jobs', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListJobsRequest', ], 'output' => [ 'shape' => 'ListJobsResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], ], ], 'ListRevisionAssets' => [ 'name' => 'ListRevisionAssets', 'http' => [ 'method' => 'GET', 'requestUri' => '/v1/data-sets/{DataSetId}/revisions/{RevisionId}/assets', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListRevisionAssetsRequest', ], 'output' => [ 'shape' => 'ListRevisionAssetsResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], ], ], 'ListTagsForResource' => [ 'name' => 'ListTagsForResource', 'http' => [ 'method' => 'GET', 'requestUri' => '/tags/{resource-arn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListTagsForResourceRequest', ], 'output' => [ 'shape' => 'ListTagsForResourceResponse', ], 'errors' => [], ], 'StartJob' => [ 'name' => 'StartJob', 'http' => [ 'method' => 'PATCH', 'requestUri' => '/v1/jobs/{JobId}', 'responseCode' => 202, ], 'input' => [ 'shape' => 'StartJobRequest', ], 'output' => [ 'shape' => 'StartJobResponse', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ConflictException', ], ], ], 'TagResource' => [ 'name' => 'TagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/tags/{resource-arn}', 'responseCode' => 204, ], 'input' => [ 'shape' => 'TagResourceRequest', ], 'errors' => [], ], 'UntagResource' => [ 'name' => 'UntagResource', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/tags/{resource-arn}', 'responseCode' => 204, ], 'input' => [ 'shape' => 'UntagResourceRequest', ], 'errors' => [], ], 'UpdateAsset' => [ 'name' => 'UpdateAsset', 'http' => [ 'method' => 'PATCH', 'requestUri' => '/v1/data-sets/{DataSetId}/revisions/{RevisionId}/assets/{AssetId}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'UpdateAssetRequest', ], 'output' => [ 'shape' => 'UpdateAssetResponse', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ConflictException', ], ], ], 'UpdateDataSet' => [ 'name' => 'UpdateDataSet', 'http' => [ 'method' => 'PATCH', 'requestUri' => '/v1/data-sets/{DataSetId}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'UpdateDataSetRequest', ], 'output' => [ 'shape' => 'UpdateDataSetResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], ], ], 'UpdateRevision' => [ 'name' => 'UpdateRevision', 'http' => [ 'method' => 'PATCH', 'requestUri' => '/v1/data-sets/{DataSetId}/revisions/{RevisionId}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'UpdateRevisionRequest', ], 'output' => [ 'shape' => 'UpdateRevisionResponse', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ConflictException', ], ], ], ], 'shapes' => [ 'AccessDeniedException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => '__string', ], ], 'required' => [ 'Message', ], 'exception' => true, 'error' => [ 'httpStatusCode' => 403, ], ], 'Arn' => [ 'type' => 'string', ], 'AssetDestinationEntry' => [ 'type' => 'structure', 'members' => [ 'AssetId' => [ 'shape' => 'Id', ], 'Bucket' => [ 'shape' => '__string', ], 'Key' => [ 'shape' => '__string', ], ], 'required' => [ 'Bucket', 'AssetId', ], ], 'AssetDetails' => [ 'type' => 'structure', 'members' => [ 'S3SnapshotAsset' => [ 'shape' => 'S3SnapshotAsset', ], ], ], 'AssetEntry' => [ 'type' => 'structure', 'members' => [ 'Arn' => [ 'shape' => 'Arn', ], 'AssetDetails' => [ 'shape' => 'AssetDetails', ], 'AssetType' => [ 'shape' => 'AssetType', ], 'CreatedAt' => [ 'shape' => 'Timestamp', ], 'DataSetId' => [ 'shape' => 'Id', ], 'Id' => [ 'shape' => 'Id', ], 'Name' => [ 'shape' => 'AssetName', ], 'RevisionId' => [ 'shape' => 'Id', ], 'SourceId' => [ 'shape' => 'Id', ], 'UpdatedAt' => [ 'shape' => 'Timestamp', ], ], 'required' => [ 'AssetType', 'CreatedAt', 'DataSetId', 'Id', 'Arn', 'AssetDetails', 'UpdatedAt', 'RevisionId', 'Name', ], ], 'AssetName' => [ 'type' => 'string', ], 'AssetSourceEntry' => [ 'type' => 'structure', 'members' => [ 'Bucket' => [ 'shape' => '__string', ], 'Key' => [ 'shape' => '__string', ], ], 'required' => [ 'Bucket', 'Key', ], ], 'AssetType' => [ 'type' => 'string', 'enum' => [ 'S3_SNAPSHOT', ], ], 'CancelJobRequest' => [ 'type' => 'structure', 'members' => [ 'JobId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'JobId', ], ], 'required' => [ 'JobId', ], ], 'Code' => [ 'type' => 'string', 'enum' => [ 'ACCESS_DENIED_EXCEPTION', 'INTERNAL_SERVER_EXCEPTION', 'MALWARE_DETECTED', 'RESOURCE_NOT_FOUND_EXCEPTION', 'SERVICE_QUOTA_EXCEEDED_EXCEPTION', 'VALIDATION_EXCEPTION', 'MALWARE_SCAN_ENCRYPTED_FILE', ], ], 'ConflictException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => '__string', ], 'ResourceId' => [ 'shape' => '__string', ], 'ResourceType' => [ 'shape' => 'ResourceType', ], ], 'required' => [ 'Message', ], 'exception' => true, 'error' => [ 'httpStatusCode' => 409, ], ], 'CreateDataSetRequest' => [ 'type' => 'structure', 'members' => [ 'AssetType' => [ 'shape' => 'AssetType', ], 'Description' => [ 'shape' => 'Description', ], 'Name' => [ 'shape' => 'Name', ], 'Tags' => [ 'shape' => 'MapOf__string', ], ], 'required' => [ 'AssetType', 'Description', 'Name', ], ], 'CreateDataSetResponse' => [ 'type' => 'structure', 'members' => [ 'Arn' => [ 'shape' => 'Arn', ], 'AssetType' => [ 'shape' => 'AssetType', ], 'CreatedAt' => [ 'shape' => 'Timestamp', ], 'Description' => [ 'shape' => 'Description', ], 'Id' => [ 'shape' => 'Id', ], 'Name' => [ 'shape' => 'Name', ], 'Origin' => [ 'shape' => 'Origin', ], 'OriginDetails' => [ 'shape' => 'OriginDetails', ], 'SourceId' => [ 'shape' => 'Id', ], 'Tags' => [ 'shape' => 'MapOf__string', ], 'UpdatedAt' => [ 'shape' => 'Timestamp', ], ], ], 'CreateJobRequest' => [ 'type' => 'structure', 'members' => [ 'Details' => [ 'shape' => 'RequestDetails', ], 'Type' => [ 'shape' => 'Type', ], ], 'required' => [ 'Type', 'Details', ], ], 'CreateJobResponse' => [ 'type' => 'structure', 'members' => [ 'Arn' => [ 'shape' => 'Arn', ], 'CreatedAt' => [ 'shape' => 'Timestamp', ], 'Details' => [ 'shape' => 'ResponseDetails', ], 'Errors' => [ 'shape' => 'ListOfJobError', ], 'Id' => [ 'shape' => 'Id', ], 'State' => [ 'shape' => 'State', ], 'Type' => [ 'shape' => 'Type', ], 'UpdatedAt' => [ 'shape' => 'Timestamp', ], ], ], 'CreateRevisionRequest' => [ 'type' => 'structure', 'members' => [ 'Comment' => [ 'shape' => '__stringMin0Max16384', ], 'DataSetId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'DataSetId', ], 'Tags' => [ 'shape' => 'MapOf__string', ], ], 'required' => [ 'DataSetId', ], ], 'CreateRevisionResponse' => [ 'type' => 'structure', 'members' => [ 'Arn' => [ 'shape' => 'Arn', ], 'Comment' => [ 'shape' => '__stringMin0Max16384', ], 'CreatedAt' => [ 'shape' => 'Timestamp', ], 'DataSetId' => [ 'shape' => 'Id', ], 'Finalized' => [ 'shape' => '__boolean', ], 'Id' => [ 'shape' => 'Id', ], 'SourceId' => [ 'shape' => 'Id', ], 'Tags' => [ 'shape' => 'MapOf__string', ], 'UpdatedAt' => [ 'shape' => 'Timestamp', ], ], ], 'DataSetEntry' => [ 'type' => 'structure', 'members' => [ 'Arn' => [ 'shape' => 'Arn', ], 'AssetType' => [ 'shape' => 'AssetType', ], 'CreatedAt' => [ 'shape' => 'Timestamp', ], 'Description' => [ 'shape' => 'Description', ], 'Id' => [ 'shape' => 'Id', ], 'Name' => [ 'shape' => 'Name', ], 'Origin' => [ 'shape' => 'Origin', ], 'OriginDetails' => [ 'shape' => 'OriginDetails', ], 'SourceId' => [ 'shape' => 'Id', ], 'UpdatedAt' => [ 'shape' => 'Timestamp', ], ], 'required' => [ 'Origin', 'AssetType', 'Description', 'CreatedAt', 'Id', 'Arn', 'UpdatedAt', 'Name', ], ], 'DeleteAssetRequest' => [ 'type' => 'structure', 'members' => [ 'AssetId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'AssetId', ], 'DataSetId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'DataSetId', ], 'RevisionId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'RevisionId', ], ], 'required' => [ 'RevisionId', 'AssetId', 'DataSetId', ], ], 'DeleteDataSetRequest' => [ 'type' => 'structure', 'members' => [ 'DataSetId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'DataSetId', ], ], 'required' => [ 'DataSetId', ], ], 'DeleteRevisionRequest' => [ 'type' => 'structure', 'members' => [ 'DataSetId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'DataSetId', ], 'RevisionId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'RevisionId', ], ], 'required' => [ 'RevisionId', 'DataSetId', ], ], 'Description' => [ 'type' => 'string', ], 'Details' => [ 'type' => 'structure', 'members' => [ 'ImportAssetFromSignedUrlJobErrorDetails' => [ 'shape' => 'ImportAssetFromSignedUrlJobErrorDetails', ], 'ImportAssetsFromS3JobErrorDetails' => [ 'shape' => 'ListOfAssetSourceEntry', ], ], ], 'ExportAssetToSignedUrlRequestDetails' => [ 'type' => 'structure', 'members' => [ 'AssetId' => [ 'shape' => 'Id', ], 'DataSetId' => [ 'shape' => 'Id', ], 'RevisionId' => [ 'shape' => 'Id', ], ], 'required' => [ 'DataSetId', 'AssetId', 'RevisionId', ], ], 'ExportAssetToSignedUrlResponseDetails' => [ 'type' => 'structure', 'members' => [ 'AssetId' => [ 'shape' => 'Id', ], 'DataSetId' => [ 'shape' => 'Id', ], 'RevisionId' => [ 'shape' => 'Id', ], 'SignedUrl' => [ 'shape' => '__string', ], 'SignedUrlExpiresAt' => [ 'shape' => 'Timestamp', ], ], 'required' => [ 'DataSetId', 'AssetId', 'RevisionId', ], ], 'ExportAssetsToS3RequestDetails' => [ 'type' => 'structure', 'members' => [ 'AssetDestinations' => [ 'shape' => 'ListOfAssetDestinationEntry', ], 'DataSetId' => [ 'shape' => 'Id', ], 'Encryption' => [ 'shape' => 'ExportServerSideEncryption', ], 'RevisionId' => [ 'shape' => 'Id', ], ], 'required' => [ 'AssetDestinations', 'DataSetId', 'RevisionId', ], ], 'ExportAssetsToS3ResponseDetails' => [ 'type' => 'structure', 'members' => [ 'AssetDestinations' => [ 'shape' => 'ListOfAssetDestinationEntry', ], 'DataSetId' => [ 'shape' => 'Id', ], 'Encryption' => [ 'shape' => 'ExportServerSideEncryption', ], 'RevisionId' => [ 'shape' => 'Id', ], ], 'required' => [ 'AssetDestinations', 'DataSetId', 'RevisionId', ], ], 'ExportServerSideEncryption' => [ 'type' => 'structure', 'members' => [ 'KmsKeyArn' => [ 'shape' => '__string', ], 'Type' => [ 'shape' => 'ServerSideEncryptionTypes', ], ], 'required' => [ 'Type', ], ], 'GetAssetRequest' => [ 'type' => 'structure', 'members' => [ 'AssetId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'AssetId', ], 'DataSetId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'DataSetId', ], 'RevisionId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'RevisionId', ], ], 'required' => [ 'RevisionId', 'AssetId', 'DataSetId', ], ], 'GetAssetResponse' => [ 'type' => 'structure', 'members' => [ 'Arn' => [ 'shape' => 'Arn', ], 'AssetDetails' => [ 'shape' => 'AssetDetails', ], 'AssetType' => [ 'shape' => 'AssetType', ], 'CreatedAt' => [ 'shape' => 'Timestamp', ], 'DataSetId' => [ 'shape' => 'Id', ], 'Id' => [ 'shape' => 'Id', ], 'Name' => [ 'shape' => 'AssetName', ], 'RevisionId' => [ 'shape' => 'Id', ], 'SourceId' => [ 'shape' => 'Id', ], 'UpdatedAt' => [ 'shape' => 'Timestamp', ], ], ], 'GetDataSetRequest' => [ 'type' => 'structure', 'members' => [ 'DataSetId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'DataSetId', ], ], 'required' => [ 'DataSetId', ], ], 'GetDataSetResponse' => [ 'type' => 'structure', 'members' => [ 'Arn' => [ 'shape' => 'Arn', ], 'AssetType' => [ 'shape' => 'AssetType', ], 'CreatedAt' => [ 'shape' => 'Timestamp', ], 'Description' => [ 'shape' => 'Description', ], 'Id' => [ 'shape' => 'Id', ], 'Name' => [ 'shape' => 'Name', ], 'Origin' => [ 'shape' => 'Origin', ], 'OriginDetails' => [ 'shape' => 'OriginDetails', ], 'SourceId' => [ 'shape' => 'Id', ], 'Tags' => [ 'shape' => 'MapOf__string', ], 'UpdatedAt' => [ 'shape' => 'Timestamp', ], ], ], 'GetJobRequest' => [ 'type' => 'structure', 'members' => [ 'JobId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'JobId', ], ], 'required' => [ 'JobId', ], ], 'GetJobResponse' => [ 'type' => 'structure', 'members' => [ 'Arn' => [ 'shape' => 'Arn', ], 'CreatedAt' => [ 'shape' => 'Timestamp', ], 'Details' => [ 'shape' => 'ResponseDetails', ], 'Errors' => [ 'shape' => 'ListOfJobError', ], 'Id' => [ 'shape' => 'Id', ], 'State' => [ 'shape' => 'State', ], 'Type' => [ 'shape' => 'Type', ], 'UpdatedAt' => [ 'shape' => 'Timestamp', ], ], ], 'GetRevisionRequest' => [ 'type' => 'structure', 'members' => [ 'DataSetId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'DataSetId', ], 'RevisionId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'RevisionId', ], ], 'required' => [ 'RevisionId', 'DataSetId', ], ], 'GetRevisionResponse' => [ 'type' => 'structure', 'members' => [ 'Arn' => [ 'shape' => 'Arn', ], 'Comment' => [ 'shape' => '__stringMin0Max16384', ], 'CreatedAt' => [ 'shape' => 'Timestamp', ], 'DataSetId' => [ 'shape' => 'Id', ], 'Finalized' => [ 'shape' => '__boolean', ], 'Id' => [ 'shape' => 'Id', ], 'SourceId' => [ 'shape' => 'Id', ], 'Tags' => [ 'shape' => 'MapOf__string', ], 'UpdatedAt' => [ 'shape' => 'Timestamp', ], ], ], 'Id' => [ 'type' => 'string', ], 'ImportAssetFromSignedUrlJobErrorDetails' => [ 'type' => 'structure', 'members' => [ 'AssetName' => [ 'shape' => 'AssetName', ], ], 'required' => [ 'AssetName', ], ], 'ImportAssetFromSignedUrlRequestDetails' => [ 'type' => 'structure', 'members' => [ 'AssetName' => [ 'shape' => 'AssetName', ], 'DataSetId' => [ 'shape' => 'Id', ], 'Md5Hash' => [ 'shape' => '__stringMin24Max24PatternAZaZ094AZaZ092AZaZ093', ], 'RevisionId' => [ 'shape' => 'Id', ], ], 'required' => [ 'DataSetId', 'Md5Hash', 'RevisionId', 'AssetName', ], ], 'ImportAssetFromSignedUrlResponseDetails' => [ 'type' => 'structure', 'members' => [ 'AssetName' => [ 'shape' => 'AssetName', ], 'DataSetId' => [ 'shape' => 'Id', ], 'Md5Hash' => [ 'shape' => '__stringMin24Max24PatternAZaZ094AZaZ092AZaZ093', ], 'RevisionId' => [ 'shape' => 'Id', ], 'SignedUrl' => [ 'shape' => '__string', ], 'SignedUrlExpiresAt' => [ 'shape' => 'Timestamp', ], ], 'required' => [ 'DataSetId', 'AssetName', 'RevisionId', ], ], 'ImportAssetsFromS3RequestDetails' => [ 'type' => 'structure', 'members' => [ 'AssetSources' => [ 'shape' => 'ListOfAssetSourceEntry', ], 'DataSetId' => [ 'shape' => 'Id', ], 'RevisionId' => [ 'shape' => 'Id', ], ], 'required' => [ 'DataSetId', 'AssetSources', 'RevisionId', ], ], 'ImportAssetsFromS3ResponseDetails' => [ 'type' => 'structure', 'members' => [ 'AssetSources' => [ 'shape' => 'ListOfAssetSourceEntry', ], 'DataSetId' => [ 'shape' => 'Id', ], 'RevisionId' => [ 'shape' => 'Id', ], ], 'required' => [ 'DataSetId', 'AssetSources', 'RevisionId', ], ], 'InternalServerException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => '__string', ], ], 'required' => [ 'Message', ], 'exception' => true, 'error' => [ 'httpStatusCode' => 500, ], ], 'JobEntry' => [ 'type' => 'structure', 'members' => [ 'Arn' => [ 'shape' => 'Arn', ], 'CreatedAt' => [ 'shape' => 'Timestamp', ], 'Details' => [ 'shape' => 'ResponseDetails', ], 'Errors' => [ 'shape' => 'ListOfJobError', ], 'Id' => [ 'shape' => 'Id', ], 'State' => [ 'shape' => 'State', ], 'Type' => [ 'shape' => 'Type', ], 'UpdatedAt' => [ 'shape' => 'Timestamp', ], ], 'required' => [ 'Type', 'Details', 'State', 'CreatedAt', 'Id', 'Arn', 'UpdatedAt', ], ], 'JobError' => [ 'type' => 'structure', 'members' => [ 'Code' => [ 'shape' => 'Code', ], 'Details' => [ 'shape' => 'Details', ], 'LimitName' => [ 'shape' => 'JobErrorLimitName', ], 'LimitValue' => [ 'shape' => '__double', ], 'Message' => [ 'shape' => '__string', ], 'ResourceId' => [ 'shape' => '__string', ], 'ResourceType' => [ 'shape' => 'JobErrorResourceTypes', ], ], 'required' => [ 'Message', 'Code', ], ], 'JobErrorLimitName' => [ 'type' => 'string', 'enum' => [ 'Assets per revision', 'Asset size in GB', ], ], 'JobErrorResourceTypes' => [ 'type' => 'string', 'enum' => [ 'REVISION', 'ASSET', ], ], 'LimitName' => [ 'type' => 'string', 'enum' => [ 'Products per account', 'Data sets per account', 'Data sets per product', 'Revisions per data set', 'Assets per revision', 'Assets per import job from Amazon S3', 'Asset per export job from Amazon S3', 'Asset size in GB', 'Concurrent in progress jobs to import assets from Amazon S3', 'Concurrent in progress jobs to import assets from a signed URL', 'Concurrent in progress jobs to export assets to Amazon S3', 'Concurrent in progress jobs to export assets to a signed URL', ], ], 'ListDataSetRevisionsRequest' => [ 'type' => 'structure', 'members' => [ 'DataSetId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'DataSetId', ], 'MaxResults' => [ 'shape' => 'MaxResults', 'location' => 'querystring', 'locationName' => 'maxResults', ], 'NextToken' => [ 'shape' => '__string', 'location' => 'querystring', 'locationName' => 'nextToken', ], ], 'required' => [ 'DataSetId', ], ], 'ListDataSetRevisionsResponse' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'NextToken', ], 'Revisions' => [ 'shape' => 'ListOfRevisionEntry', ], ], ], 'ListDataSetsRequest' => [ 'type' => 'structure', 'members' => [ 'MaxResults' => [ 'shape' => 'MaxResults', 'location' => 'querystring', 'locationName' => 'maxResults', ], 'NextToken' => [ 'shape' => '__string', 'location' => 'querystring', 'locationName' => 'nextToken', ], 'Origin' => [ 'shape' => '__string', 'location' => 'querystring', 'locationName' => 'origin', ], ], ], 'ListDataSetsResponse' => [ 'type' => 'structure', 'members' => [ 'DataSets' => [ 'shape' => 'ListOfDataSetEntry', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListJobsRequest' => [ 'type' => 'structure', 'members' => [ 'DataSetId' => [ 'shape' => '__string', 'location' => 'querystring', 'locationName' => 'dataSetId', ], 'MaxResults' => [ 'shape' => 'MaxResults', 'location' => 'querystring', 'locationName' => 'maxResults', ], 'NextToken' => [ 'shape' => '__string', 'location' => 'querystring', 'locationName' => 'nextToken', ], 'RevisionId' => [ 'shape' => '__string', 'location' => 'querystring', 'locationName' => 'revisionId', ], ], ], 'ListJobsResponse' => [ 'type' => 'structure', 'members' => [ 'Jobs' => [ 'shape' => 'ListOfJobEntry', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListOfAssetDestinationEntry' => [ 'type' => 'list', 'member' => [ 'shape' => 'AssetDestinationEntry', ], ], 'ListOfAssetSourceEntry' => [ 'type' => 'list', 'member' => [ 'shape' => 'AssetSourceEntry', ], ], 'ListRevisionAssetsRequest' => [ 'type' => 'structure', 'members' => [ 'DataSetId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'DataSetId', ], 'MaxResults' => [ 'shape' => 'MaxResults', 'location' => 'querystring', 'locationName' => 'maxResults', ], 'NextToken' => [ 'shape' => '__string', 'location' => 'querystring', 'locationName' => 'nextToken', ], 'RevisionId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'RevisionId', ], ], 'required' => [ 'RevisionId', 'DataSetId', ], ], 'ListRevisionAssetsResponse' => [ 'type' => 'structure', 'members' => [ 'Assets' => [ 'shape' => 'ListOfAssetEntry', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListTagsForResourceRequest' => [ 'type' => 'structure', 'members' => [ 'ResourceArn' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'resource-arn', ], ], 'required' => [ 'ResourceArn', ], ], 'ListTagsForResourceResponse' => [ 'type' => 'structure', 'members' => [ 'Tags' => [ 'shape' => 'MapOf__string', 'locationName' => 'tags', ], ], ], 'MaxResults' => [ 'type' => 'integer', 'min' => 1, 'max' => 25, ], 'Name' => [ 'type' => 'string', ], 'NextToken' => [ 'type' => 'string', ], 'Origin' => [ 'type' => 'string', 'enum' => [ 'OWNED', 'ENTITLED', ], ], 'OriginDetails' => [ 'type' => 'structure', 'members' => [ 'ProductId' => [ 'shape' => '__string', ], ], 'required' => [ 'ProductId', ], ], 'RequestDetails' => [ 'type' => 'structure', 'members' => [ 'ExportAssetToSignedUrl' => [ 'shape' => 'ExportAssetToSignedUrlRequestDetails', ], 'ExportAssetsToS3' => [ 'shape' => 'ExportAssetsToS3RequestDetails', ], 'ImportAssetFromSignedUrl' => [ 'shape' => 'ImportAssetFromSignedUrlRequestDetails', ], 'ImportAssetsFromS3' => [ 'shape' => 'ImportAssetsFromS3RequestDetails', ], ], ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => '__string', ], 'ResourceId' => [ 'shape' => '__string', ], 'ResourceType' => [ 'shape' => 'ResourceType', ], ], 'required' => [ 'Message', ], 'exception' => true, 'error' => [ 'httpStatusCode' => 404, ], ], 'ResourceType' => [ 'type' => 'string', 'enum' => [ 'DATA_SET', 'REVISION', 'ASSET', 'JOB', ], ], 'ResponseDetails' => [ 'type' => 'structure', 'members' => [ 'ExportAssetToSignedUrl' => [ 'shape' => 'ExportAssetToSignedUrlResponseDetails', ], 'ExportAssetsToS3' => [ 'shape' => 'ExportAssetsToS3ResponseDetails', ], 'ImportAssetFromSignedUrl' => [ 'shape' => 'ImportAssetFromSignedUrlResponseDetails', ], 'ImportAssetsFromS3' => [ 'shape' => 'ImportAssetsFromS3ResponseDetails', ], ], ], 'RevisionEntry' => [ 'type' => 'structure', 'members' => [ 'Arn' => [ 'shape' => 'Arn', ], 'Comment' => [ 'shape' => '__stringMin0Max16384', ], 'CreatedAt' => [ 'shape' => 'Timestamp', ], 'DataSetId' => [ 'shape' => 'Id', ], 'Finalized' => [ 'shape' => '__boolean', ], 'Id' => [ 'shape' => 'Id', ], 'SourceId' => [ 'shape' => 'Id', ], 'UpdatedAt' => [ 'shape' => 'Timestamp', ], ], 'required' => [ 'CreatedAt', 'DataSetId', 'Id', 'Arn', 'UpdatedAt', ], ], 'S3SnapshotAsset' => [ 'type' => 'structure', 'members' => [ 'Size' => [ 'shape' => '__doubleMin0', ], ], 'required' => [ 'Size', ], ], 'ServerSideEncryptionTypes' => [ 'type' => 'string', 'enum' => [ 'aws:kms', 'AES256', ], ], 'ServiceLimitExceededException' => [ 'type' => 'structure', 'members' => [ 'LimitName' => [ 'shape' => 'LimitName', ], 'LimitValue' => [ 'shape' => '__double', ], 'Message' => [ 'shape' => '__string', ], ], 'required' => [ 'Message', ], 'exception' => true, 'error' => [ 'httpStatusCode' => 402, ], ], 'StartJobRequest' => [ 'type' => 'structure', 'members' => [ 'JobId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'JobId', ], ], 'required' => [ 'JobId', ], ], 'StartJobResponse' => [ 'type' => 'structure', 'members' => [], ], 'State' => [ 'type' => 'string', 'enum' => [ 'WAITING', 'IN_PROGRESS', 'ERROR', 'COMPLETED', 'CANCELLED', 'TIMED_OUT', ], ], 'TagResourceRequest' => [ 'type' => 'structure', 'members' => [ 'ResourceArn' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'resource-arn', ], 'Tags' => [ 'shape' => 'MapOf__string', 'locationName' => 'tags', ], ], 'required' => [ 'ResourceArn', 'Tags', ], ], 'ThrottlingException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => '__string', ], ], 'required' => [ 'Message', ], 'exception' => true, 'error' => [ 'httpStatusCode' => 429, ], ], 'Timestamp' => [ 'type' => 'timestamp', 'timestampFormat' => 'iso8601', ], 'Type' => [ 'type' => 'string', 'enum' => [ 'IMPORT_ASSETS_FROM_S3', 'IMPORT_ASSET_FROM_SIGNED_URL', 'EXPORT_ASSETS_TO_S3', 'EXPORT_ASSET_TO_SIGNED_URL', ], ], 'UntagResourceRequest' => [ 'type' => 'structure', 'members' => [ 'ResourceArn' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'resource-arn', ], 'TagKeys' => [ 'shape' => 'ListOf__string', 'location' => 'querystring', 'locationName' => 'tagKeys', ], ], 'required' => [ 'TagKeys', 'ResourceArn', ], ], 'UpdateAssetRequest' => [ 'type' => 'structure', 'members' => [ 'AssetId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'AssetId', ], 'DataSetId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'DataSetId', ], 'Name' => [ 'shape' => 'AssetName', ], 'RevisionId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'RevisionId', ], ], 'required' => [ 'RevisionId', 'AssetId', 'DataSetId', 'Name', ], ], 'UpdateAssetResponse' => [ 'type' => 'structure', 'members' => [ 'Arn' => [ 'shape' => 'Arn', ], 'AssetDetails' => [ 'shape' => 'AssetDetails', ], 'AssetType' => [ 'shape' => 'AssetType', ], 'CreatedAt' => [ 'shape' => 'Timestamp', ], 'DataSetId' => [ 'shape' => 'Id', ], 'Id' => [ 'shape' => 'Id', ], 'Name' => [ 'shape' => 'AssetName', ], 'RevisionId' => [ 'shape' => 'Id', ], 'SourceId' => [ 'shape' => 'Id', ], 'UpdatedAt' => [ 'shape' => 'Timestamp', ], ], ], 'UpdateDataSetRequest' => [ 'type' => 'structure', 'members' => [ 'DataSetId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'DataSetId', ], 'Description' => [ 'shape' => 'Description', ], 'Name' => [ 'shape' => 'Name', ], ], 'required' => [ 'DataSetId', ], ], 'UpdateDataSetResponse' => [ 'type' => 'structure', 'members' => [ 'Arn' => [ 'shape' => 'Arn', ], 'AssetType' => [ 'shape' => 'AssetType', ], 'CreatedAt' => [ 'shape' => 'Timestamp', ], 'Description' => [ 'shape' => 'Description', ], 'Id' => [ 'shape' => 'Id', ], 'Name' => [ 'shape' => 'Name', ], 'Origin' => [ 'shape' => 'Origin', ], 'OriginDetails' => [ 'shape' => 'OriginDetails', ], 'SourceId' => [ 'shape' => 'Id', ], 'UpdatedAt' => [ 'shape' => 'Timestamp', ], ], ], 'UpdateRevisionRequest' => [ 'type' => 'structure', 'members' => [ 'Comment' => [ 'shape' => '__stringMin0Max16384', ], 'DataSetId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'DataSetId', ], 'Finalized' => [ 'shape' => '__boolean', ], 'RevisionId' => [ 'shape' => '__string', 'location' => 'uri', 'locationName' => 'RevisionId', ], ], 'required' => [ 'RevisionId', 'DataSetId', ], ], 'UpdateRevisionResponse' => [ 'type' => 'structure', 'members' => [ 'Arn' => [ 'shape' => 'Arn', ], 'Comment' => [ 'shape' => '__stringMin0Max16384', ], 'CreatedAt' => [ 'shape' => 'Timestamp', ], 'DataSetId' => [ 'shape' => 'Id', ], 'Finalized' => [ 'shape' => '__boolean', ], 'Id' => [ 'shape' => 'Id', ], 'SourceId' => [ 'shape' => 'Id', ], 'UpdatedAt' => [ 'shape' => 'Timestamp', ], ], ], 'ValidationException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => '__string', ], ], 'required' => [ 'Message', ], 'exception' => true, 'error' => [ 'httpStatusCode' => 400, ], ], '__boolean' => [ 'type' => 'boolean', ], '__double' => [ 'type' => 'double', ], '__doubleMin0' => [ 'type' => 'double', ], 'ListOfAssetEntry' => [ 'type' => 'list', 'member' => [ 'shape' => 'AssetEntry', ], ], 'ListOfDataSetEntry' => [ 'type' => 'list', 'member' => [ 'shape' => 'DataSetEntry', ], ], 'ListOfJobEntry' => [ 'type' => 'list', 'member' => [ 'shape' => 'JobEntry', ], ], 'ListOfJobError' => [ 'type' => 'list', 'member' => [ 'shape' => 'JobError', ], ], 'ListOfRevisionEntry' => [ 'type' => 'list', 'member' => [ 'shape' => 'RevisionEntry', ], ], 'ListOf__string' => [ 'type' => 'list', 'member' => [ 'shape' => '__string', ], ], 'MapOf__string' => [ 'type' => 'map', 'key' => [ 'shape' => '__string', ], 'value' => [ 'shape' => '__string', ], ], '__string' => [ 'type' => 'string', ], '__stringMin0Max16384' => [ 'type' => 'string', 'min' => 0, 'max' => 16384, ], '__stringMin24Max24PatternAZaZ094AZaZ092AZaZ093' => [ 'type' => 'string', 'min' => 24, 'max' => 24, 'pattern' => '/^(?:[A-Za-z0-9+/]{4})*(?:[A-Za-z0-9+/]{2}==|[A-Za-z0-9+/]{3}=)?$/', ], ],];
