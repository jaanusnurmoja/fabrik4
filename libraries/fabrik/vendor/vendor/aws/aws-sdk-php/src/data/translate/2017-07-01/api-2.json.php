<?php
// This file was auto-generated from sdk-root/src/data/translate/2017-07-01/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2017-07-01', 'endpointPrefix' => 'translate', 'jsonVersion' => '1.1', 'protocol' => 'json', 'serviceFullName' => 'Amazon Translate', 'serviceId' => 'Translate', 'signatureVersion' => 'v4', 'signingName' => 'translate', 'targetPrefix' => 'AWSShineFrontendService_20170701', 'uid' => 'translate-2017-07-01', ], 'operations' => [ 'CreateParallelData' => [ 'name' => 'CreateParallelData', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateParallelDataRequest', ], 'output' => [ 'shape' => 'CreateParallelDataResponse', ], 'errors' => [ [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'LimitExceededException', ], [ 'shape' => 'TooManyRequestsException', ], [ 'shape' => 'TooManyTagsException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ConcurrentModificationException', ], [ 'shape' => 'InternalServerException', ], ], ], 'DeleteParallelData' => [ 'name' => 'DeleteParallelData', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteParallelDataRequest', ], 'output' => [ 'shape' => 'DeleteParallelDataResponse', ], 'errors' => [ [ 'shape' => 'ConcurrentModificationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], [ 'shape' => 'InternalServerException', ], ], ], 'DeleteTerminology' => [ 'name' => 'DeleteTerminology', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteTerminologyRequest', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'InternalServerException', ], ], ], 'DescribeTextTranslationJob' => [ 'name' => 'DescribeTextTranslationJob', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeTextTranslationJobRequest', ], 'output' => [ 'shape' => 'DescribeTextTranslationJobResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], [ 'shape' => 'InternalServerException', ], ], ], 'GetParallelData' => [ 'name' => 'GetParallelData', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetParallelDataRequest', ], 'output' => [ 'shape' => 'GetParallelDataResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'TooManyRequestsException', ], [ 'shape' => 'InternalServerException', ], ], ], 'GetTerminology' => [ 'name' => 'GetTerminology', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetTerminologyRequest', ], 'output' => [ 'shape' => 'GetTerminologyResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'TooManyRequestsException', ], [ 'shape' => 'InternalServerException', ], ], ], 'ImportTerminology' => [ 'name' => 'ImportTerminology', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ImportTerminologyRequest', ], 'output' => [ 'shape' => 'ImportTerminologyResponse', ], 'errors' => [ [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'LimitExceededException', ], [ 'shape' => 'TooManyRequestsException', ], [ 'shape' => 'TooManyTagsException', ], [ 'shape' => 'ConcurrentModificationException', ], [ 'shape' => 'InternalServerException', ], ], ], 'ListLanguages' => [ 'name' => 'ListLanguages', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListLanguagesRequest', ], 'output' => [ 'shape' => 'ListLanguagesResponse', ], 'errors' => [ [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'TooManyRequestsException', ], [ 'shape' => 'UnsupportedDisplayLanguageCodeException', ], [ 'shape' => 'InternalServerException', ], ], ], 'ListParallelData' => [ 'name' => 'ListParallelData', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListParallelDataRequest', ], 'output' => [ 'shape' => 'ListParallelDataResponse', ], 'errors' => [ [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'TooManyRequestsException', ], [ 'shape' => 'InternalServerException', ], ], ], 'ListTagsForResource' => [ 'name' => 'ListTagsForResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListTagsForResourceRequest', ], 'output' => [ 'shape' => 'ListTagsForResourceResponse', ], 'errors' => [ [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], ], ], 'ListTerminologies' => [ 'name' => 'ListTerminologies', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListTerminologiesRequest', ], 'output' => [ 'shape' => 'ListTerminologiesResponse', ], 'errors' => [ [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'TooManyRequestsException', ], [ 'shape' => 'InternalServerException', ], ], ], 'ListTextTranslationJobs' => [ 'name' => 'ListTextTranslationJobs', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListTextTranslationJobsRequest', ], 'output' => [ 'shape' => 'ListTextTranslationJobsResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'TooManyRequestsException', ], [ 'shape' => 'InvalidFilterException', ], [ 'shape' => 'InternalServerException', ], ], ], 'StartTextTranslationJob' => [ 'name' => 'StartTextTranslationJob', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'StartTextTranslationJobRequest', ], 'output' => [ 'shape' => 'StartTextTranslationJobResponse', ], 'errors' => [ [ 'shape' => 'TooManyRequestsException', ], [ 'shape' => 'UnsupportedLanguagePairException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'InternalServerException', ], ], ], 'StopTextTranslationJob' => [ 'name' => 'StopTextTranslationJob', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'StopTextTranslationJobRequest', ], 'output' => [ 'shape' => 'StopTextTranslationJobResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyRequestsException', ], [ 'shape' => 'InternalServerException', ], ], ], 'TagResource' => [ 'name' => 'TagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'TagResourceRequest', ], 'output' => [ 'shape' => 'TagResourceResponse', ], 'errors' => [ [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ConcurrentModificationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'TooManyTagsException', ], [ 'shape' => 'InternalServerException', ], ], ], 'TranslateDocument' => [ 'name' => 'TranslateDocument', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'TranslateDocumentRequest', ], 'output' => [ 'shape' => 'TranslateDocumentResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'LimitExceededException', ], [ 'shape' => 'TooManyRequestsException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'UnsupportedLanguagePairException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ServiceUnavailableException', ], ], ], 'TranslateText' => [ 'name' => 'TranslateText', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'TranslateTextRequest', ], 'output' => [ 'shape' => 'TranslateTextResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'TextSizeLimitExceededException', ], [ 'shape' => 'TooManyRequestsException', ], [ 'shape' => 'UnsupportedLanguagePairException', ], [ 'shape' => 'DetectedLanguageLowConfidenceException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ServiceUnavailableException', ], ], ], 'UntagResource' => [ 'name' => 'UntagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UntagResourceRequest', ], 'output' => [ 'shape' => 'UntagResourceResponse', ], 'errors' => [ [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'ConcurrentModificationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], ], ], 'UpdateParallelData' => [ 'name' => 'UpdateParallelData', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateParallelDataRequest', ], 'output' => [ 'shape' => 'UpdateParallelDataResponse', ], 'errors' => [ [ 'shape' => 'ConcurrentModificationException', ], [ 'shape' => 'InvalidParameterValueException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'LimitExceededException', ], [ 'shape' => 'TooManyRequestsException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], ], ], ], 'shapes' => [ 'AppliedTerminology' => [ 'type' => 'structure', 'members' => [ 'Name' => [ 'shape' => 'ResourceName', ], 'Terms' => [ 'shape' => 'TermList', ], ], ], 'AppliedTerminologyList' => [ 'type' => 'list', 'member' => [ 'shape' => 'AppliedTerminology', ], ], 'BoundedLengthString' => [ 'type' => 'string', 'max' => 10000, 'min' => 1, 'pattern' => '[\\P{M}\\p{M}]{1,10000}', ], 'Brevity' => [ 'type' => 'string', 'enum' => [ 'ON', ], ], 'ClientTokenString' => [ 'type' => 'string', 'max' => 64, 'min' => 1, 'pattern' => '^[a-zA-Z0-9-]+$', ], 'ConcurrentModificationException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'ConflictException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'ContentType' => [ 'type' => 'string', 'max' => 256, 'pattern' => '^[-\\w.]+\\/[-\\w.+]+$', ], 'CreateParallelDataRequest' => [ 'type' => 'structure', 'required' => [ 'Name', 'ParallelDataConfig', 'ClientToken', ], 'members' => [ 'Name' => [ 'shape' => 'ResourceName', ], 'Description' => [ 'shape' => 'Description', ], 'ParallelDataConfig' => [ 'shape' => 'ParallelDataConfig', ], 'EncryptionKey' => [ 'shape' => 'EncryptionKey', ], 'ClientToken' => [ 'shape' => 'ClientTokenString', 'idempotencyToken' => true, ], 'Tags' => [ 'shape' => 'TagList', ], ], ], 'CreateParallelDataResponse' => [ 'type' => 'structure', 'members' => [ 'Name' => [ 'shape' => 'ResourceName', ], 'Status' => [ 'shape' => 'ParallelDataStatus', ], ], ], 'DeleteParallelDataRequest' => [ 'type' => 'structure', 'required' => [ 'Name', ], 'members' => [ 'Name' => [ 'shape' => 'ResourceName', ], ], ], 'DeleteParallelDataResponse' => [ 'type' => 'structure', 'members' => [ 'Name' => [ 'shape' => 'ResourceName', ], 'Status' => [ 'shape' => 'ParallelDataStatus', ], ], ], 'DeleteTerminologyRequest' => [ 'type' => 'structure', 'required' => [ 'Name', ], 'members' => [ 'Name' => [ 'shape' => 'ResourceName', ], ], ], 'DescribeTextTranslationJobRequest' => [ 'type' => 'structure', 'required' => [ 'JobId', ], 'members' => [ 'JobId' => [ 'shape' => 'JobId', ], ], ], 'DescribeTextTranslationJobResponse' => [ 'type' => 'structure', 'members' => [ 'TextTranslationJobProperties' => [ 'shape' => 'TextTranslationJobProperties', ], ], ], 'Description' => [ 'type' => 'string', 'max' => 256, 'pattern' => '[\\P{M}\\p{M}]{0,256}', ], 'DetectedLanguageLowConfidenceException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], 'DetectedLanguageCode' => [ 'shape' => 'LanguageCodeString', ], ], 'exception' => true, ], 'Directionality' => [ 'type' => 'string', 'enum' => [ 'UNI', 'MULTI', ], ], 'DisplayLanguageCode' => [ 'type' => 'string', 'enum' => [ 'de', 'en', 'es', 'fr', 'it', 'ja', 'ko', 'pt', 'zh', 'zh-TW', ], ], 'Document' => [ 'type' => 'structure', 'required' => [ 'Content', 'ContentType', ], 'members' => [ 'Content' => [ 'shape' => 'DocumentContent', ], 'ContentType' => [ 'shape' => 'ContentType', ], ], ], 'DocumentContent' => [ 'type' => 'blob', 'max' => 102400, 'sensitive' => true, ], 'EncryptionKey' => [ 'type' => 'structure', 'required' => [ 'Type', 'Id', ], 'members' => [ 'Type' => [ 'shape' => 'EncryptionKeyType', ], 'Id' => [ 'shape' => 'EncryptionKeyID', ], ], ], 'EncryptionKeyID' => [ 'type' => 'string', 'max' => 400, 'min' => 1, 'pattern' => '(arn:aws((-us-gov)|(-iso)|(-iso-b)|(-cn))?:kms:)?([a-z]{2}-[a-z]+(-[a-z]+)?-\\d:)?(\\d{12}:)?(((key/)?[a-zA-Z0-9-_]+)|(alias/[a-zA-Z0-9:/_-]+))', ], 'EncryptionKeyType' => [ 'type' => 'string', 'enum' => [ 'KMS', ], ], 'Formality' => [ 'type' => 'string', 'enum' => [ 'FORMAL', 'INFORMAL', ], ], 'GetParallelDataRequest' => [ 'type' => 'structure', 'required' => [ 'Name', ], 'members' => [ 'Name' => [ 'shape' => 'ResourceName', ], ], ], 'GetParallelDataResponse' => [ 'type' => 'structure', 'members' => [ 'ParallelDataProperties' => [ 'shape' => 'ParallelDataProperties', ], 'DataLocation' => [ 'shape' => 'ParallelDataDataLocation', ], 'AuxiliaryDataLocation' => [ 'shape' => 'ParallelDataDataLocation', ], 'LatestUpdateAttemptAuxiliaryDataLocation' => [ 'shape' => 'ParallelDataDataLocation', ], ], ], 'GetTerminologyRequest' => [ 'type' => 'structure', 'required' => [ 'Name', ], 'members' => [ 'Name' => [ 'shape' => 'ResourceName', ], 'TerminologyDataFormat' => [ 'shape' => 'TerminologyDataFormat', ], ], ], 'GetTerminologyResponse' => [ 'type' => 'structure', 'members' => [ 'TerminologyProperties' => [ 'shape' => 'TerminologyProperties', ], 'TerminologyDataLocation' => [ 'shape' => 'TerminologyDataLocation', ], 'AuxiliaryDataLocation' => [ 'shape' => 'TerminologyDataLocation', ], ], ], 'IamRoleArn' => [ 'type' => 'string', 'max' => 2048, 'min' => 20, 'pattern' => 'arn:aws(-[^:]+)?:iam::[0-9]{12}:role/.+', ], 'ImportTerminologyRequest' => [ 'type' => 'structure', 'required' => [ 'Name', 'MergeStrategy', 'TerminologyData', ], 'members' => [ 'Name' => [ 'shape' => 'ResourceName', ], 'MergeStrategy' => [ 'shape' => 'MergeStrategy', ], 'Description' => [ 'shape' => 'Description', ], 'TerminologyData' => [ 'shape' => 'TerminologyData', ], 'EncryptionKey' => [ 'shape' => 'EncryptionKey', ], 'Tags' => [ 'shape' => 'TagList', ], ], ], 'ImportTerminologyResponse' => [ 'type' => 'structure', 'members' => [ 'TerminologyProperties' => [ 'shape' => 'TerminologyProperties', ], 'AuxiliaryDataLocation' => [ 'shape' => 'TerminologyDataLocation', ], ], ], 'InputDataConfig' => [ 'type' => 'structure', 'required' => [ 'S3Uri', 'ContentType', ], 'members' => [ 'S3Uri' => [ 'shape' => 'S3Uri', ], 'ContentType' => [ 'shape' => 'ContentType', ], ], ], 'Integer' => [ 'type' => 'integer', ], 'InternalServerException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'exception' => true, 'fault' => true, ], 'InvalidFilterException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'InvalidParameterValueException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'InvalidRequestException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'JobDetails' => [ 'type' => 'structure', 'members' => [ 'TranslatedDocumentsCount' => [ 'shape' => 'Integer', ], 'DocumentsWithErrorsCount' => [ 'shape' => 'Integer', ], 'InputDocumentsCount' => [ 'shape' => 'Integer', ], ], ], 'JobId' => [ 'type' => 'string', 'max' => 32, 'min' => 1, 'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-%@]*)$', ], 'JobName' => [ 'type' => 'string', 'max' => 256, 'min' => 1, 'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-%@]*)$', ], 'JobStatus' => [ 'type' => 'string', 'enum' => [ 'SUBMITTED', 'IN_PROGRESS', 'COMPLETED', 'COMPLETED_WITH_ERROR', 'FAILED', 'STOP_REQUESTED', 'STOPPED', ], ], 'Language' => [ 'type' => 'structure', 'required' => [ 'LanguageName', 'LanguageCode', ], 'members' => [ 'LanguageName' => [ 'shape' => 'LocalizedNameString', ], 'LanguageCode' => [ 'shape' => 'LanguageCodeString', ], ], ], 'LanguageCodeString' => [ 'type' => 'string', 'max' => 5, 'min' => 2, ], 'LanguageCodeStringList' => [ 'type' => 'list', 'member' => [ 'shape' => 'LanguageCodeString', ], ], 'LanguagesList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Language', ], ], 'LimitExceededException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'ListLanguagesRequest' => [ 'type' => 'structure', 'members' => [ 'DisplayLanguageCode' => [ 'shape' => 'DisplayLanguageCode', ], 'NextToken' => [ 'shape' => 'NextToken', ], 'MaxResults' => [ 'shape' => 'MaxResultsInteger', ], ], ], 'ListLanguagesResponse' => [ 'type' => 'structure', 'members' => [ 'Languages' => [ 'shape' => 'LanguagesList', ], 'DisplayLanguageCode' => [ 'shape' => 'DisplayLanguageCode', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListParallelDataRequest' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'NextToken', ], 'MaxResults' => [ 'shape' => 'MaxResultsInteger', ], ], ], 'ListParallelDataResponse' => [ 'type' => 'structure', 'members' => [ 'ParallelDataPropertiesList' => [ 'shape' => 'ParallelDataPropertiesList', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListTagsForResourceRequest' => [ 'type' => 'structure', 'required' => [ 'ResourceArn', ], 'members' => [ 'ResourceArn' => [ 'shape' => 'ResourceArn', ], ], ], 'ListTagsForResourceResponse' => [ 'type' => 'structure', 'members' => [ 'Tags' => [ 'shape' => 'TagList', ], ], ], 'ListTerminologiesRequest' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'NextToken', ], 'MaxResults' => [ 'shape' => 'MaxResultsInteger', ], ], ], 'ListTerminologiesResponse' => [ 'type' => 'structure', 'members' => [ 'TerminologyPropertiesList' => [ 'shape' => 'TerminologyPropertiesList', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListTextTranslationJobsRequest' => [ 'type' => 'structure', 'members' => [ 'Filter' => [ 'shape' => 'TextTranslationJobFilter', ], 'NextToken' => [ 'shape' => 'NextToken', ], 'MaxResults' => [ 'shape' => 'MaxResultsInteger', ], ], ], 'ListTextTranslationJobsResponse' => [ 'type' => 'structure', 'members' => [ 'TextTranslationJobPropertiesList' => [ 'shape' => 'TextTranslationJobPropertiesList', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'LocalizedNameString' => [ 'type' => 'string', 'max' => 256, 'min' => 1, ], 'Long' => [ 'type' => 'long', ], 'MaxResultsInteger' => [ 'type' => 'integer', 'max' => 500, 'min' => 1, ], 'MergeStrategy' => [ 'type' => 'string', 'enum' => [ 'OVERWRITE', ], ], 'NextToken' => [ 'type' => 'string', 'max' => 8192, 'pattern' => '\\p{ASCII}{0,8192}', ], 'OutputDataConfig' => [ 'type' => 'structure', 'required' => [ 'S3Uri', ], 'members' => [ 'S3Uri' => [ 'shape' => 'S3Uri', ], 'EncryptionKey' => [ 'shape' => 'EncryptionKey', ], ], ], 'ParallelDataArn' => [ 'type' => 'string', 'max' => 512, 'min' => 1, ], 'ParallelDataConfig' => [ 'type' => 'structure', 'members' => [ 'S3Uri' => [ 'shape' => 'S3Uri', ], 'Format' => [ 'shape' => 'ParallelDataFormat', ], ], ], 'ParallelDataDataLocation' => [ 'type' => 'structure', 'required' => [ 'RepositoryType', 'Location', ], 'members' => [ 'RepositoryType' => [ 'shape' => 'String', ], 'Location' => [ 'shape' => 'String', ], ], ], 'ParallelDataFormat' => [ 'type' => 'string', 'enum' => [ 'TSV', 'CSV', 'TMX', ], ], 'ParallelDataProperties' => [ 'type' => 'structure', 'members' => [ 'Name' => [ 'shape' => 'ResourceName', ], 'Arn' => [ 'shape' => 'ParallelDataArn', ], 'Description' => [ 'shape' => 'Description', ], 'Status' => [ 'shape' => 'ParallelDataStatus', ], 'SourceLanguageCode' => [ 'shape' => 'LanguageCodeString', ], 'TargetLanguageCodes' => [ 'shape' => 'LanguageCodeStringList', ], 'ParallelDataConfig' => [ 'shape' => 'ParallelDataConfig', ], 'Message' => [ 'shape' => 'UnboundedLengthString', ], 'ImportedDataSize' => [ 'shape' => 'Long', ], 'ImportedRecordCount' => [ 'shape' => 'Long', ], 'FailedRecordCount' => [ 'shape' => 'Long', ], 'SkippedRecordCount' => [ 'shape' => 'Long', ], 'EncryptionKey' => [ 'shape' => 'EncryptionKey', ], 'CreatedAt' => [ 'shape' => 'Timestamp', ], 'LastUpdatedAt' => [ 'shape' => 'Timestamp', ], 'LatestUpdateAttemptStatus' => [ 'shape' => 'ParallelDataStatus', ], 'LatestUpdateAttemptAt' => [ 'shape' => 'Timestamp', ], ], ], 'ParallelDataPropertiesList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ParallelDataProperties', ], ], 'ParallelDataStatus' => [ 'type' => 'string', 'enum' => [ 'CREATING', 'UPDATING', 'ACTIVE', 'DELETING', 'FAILED', ], ], 'Profanity' => [ 'type' => 'string', 'enum' => [ 'MASK', ], ], 'ResourceArn' => [ 'type' => 'string', 'max' => 512, 'min' => 1, ], 'ResourceName' => [ 'type' => 'string', 'max' => 256, 'min' => 1, 'pattern' => '^([A-Za-z0-9-]_?)+$', ], 'ResourceNameList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ResourceName', ], ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'S3Uri' => [ 'type' => 'string', 'max' => 1024, 'pattern' => 's3://[a-z0-9][\\.\\-a-z0-9]{1,61}[a-z0-9](/.*)?', ], 'ServiceUnavailableException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'exception' => true, 'fault' => true, ], 'StartTextTranslationJobRequest' => [ 'type' => 'structure', 'required' => [ 'InputDataConfig', 'OutputDataConfig', 'DataAccessRoleArn', 'SourceLanguageCode', 'TargetLanguageCodes', 'ClientToken', ], 'members' => [ 'JobName' => [ 'shape' => 'JobName', ], 'InputDataConfig' => [ 'shape' => 'InputDataConfig', ], 'OutputDataConfig' => [ 'shape' => 'OutputDataConfig', ], 'DataAccessRoleArn' => [ 'shape' => 'IamRoleArn', ], 'SourceLanguageCode' => [ 'shape' => 'LanguageCodeString', ], 'TargetLanguageCodes' => [ 'shape' => 'TargetLanguageCodeStringList', ], 'TerminologyNames' => [ 'shape' => 'ResourceNameList', ], 'ParallelDataNames' => [ 'shape' => 'ResourceNameList', ], 'ClientToken' => [ 'shape' => 'ClientTokenString', 'idempotencyToken' => true, ], 'Settings' => [ 'shape' => 'TranslationSettings', ], ], ], 'StartTextTranslationJobResponse' => [ 'type' => 'structure', 'members' => [ 'JobId' => [ 'shape' => 'JobId', ], 'JobStatus' => [ 'shape' => 'JobStatus', ], ], ], 'StopTextTranslationJobRequest' => [ 'type' => 'structure', 'required' => [ 'JobId', ], 'members' => [ 'JobId' => [ 'shape' => 'JobId', ], ], ], 'StopTextTranslationJobResponse' => [ 'type' => 'structure', 'members' => [ 'JobId' => [ 'shape' => 'JobId', ], 'JobStatus' => [ 'shape' => 'JobStatus', ], ], ], 'String' => [ 'type' => 'string', 'max' => 10000, 'pattern' => '[\\P{M}\\p{M}]{0,10000}', ], 'Tag' => [ 'type' => 'structure', 'required' => [ 'Key', 'Value', ], 'members' => [ 'Key' => [ 'shape' => 'TagKey', ], 'Value' => [ 'shape' => 'TagValue', ], ], ], 'TagKey' => [ 'type' => 'string', 'max' => 128, 'min' => 1, ], 'TagKeyList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagKey', ], 'max' => 200, 'min' => 0, ], 'TagList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Tag', ], 'max' => 200, 'min' => 0, ], 'TagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'ResourceArn', 'Tags', ], 'members' => [ 'ResourceArn' => [ 'shape' => 'ResourceArn', ], 'Tags' => [ 'shape' => 'TagList', ], ], ], 'TagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'TagValue' => [ 'type' => 'string', 'max' => 256, 'min' => 0, ], 'TargetLanguageCodeStringList' => [ 'type' => 'list', 'member' => [ 'shape' => 'LanguageCodeString', ], 'min' => 1, ], 'Term' => [ 'type' => 'structure', 'members' => [ 'SourceText' => [ 'shape' => 'String', ], 'TargetText' => [ 'shape' => 'String', ], ], ], 'TermList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Term', ], ], 'TerminologyArn' => [ 'type' => 'string', 'max' => 512, 'min' => 1, ], 'TerminologyData' => [ 'type' => 'structure', 'required' => [ 'File', 'Format', ], 'members' => [ 'File' => [ 'shape' => 'TerminologyFile', ], 'Format' => [ 'shape' => 'TerminologyDataFormat', ], 'Directionality' => [ 'shape' => 'Directionality', ], ], ], 'TerminologyDataFormat' => [ 'type' => 'string', 'enum' => [ 'CSV', 'TMX', 'TSV', ], ], 'TerminologyDataLocation' => [ 'type' => 'structure', 'required' => [ 'RepositoryType', 'Location', ], 'members' => [ 'RepositoryType' => [ 'shape' => 'String', ], 'Location' => [ 'shape' => 'String', ], ], ], 'TerminologyFile' => [ 'type' => 'blob', 'max' => 10485760, 'sensitive' => true, ], 'TerminologyProperties' => [ 'type' => 'structure', 'members' => [ 'Name' => [ 'shape' => 'ResourceName', ], 'Description' => [ 'shape' => 'Description', ], 'Arn' => [ 'shape' => 'TerminologyArn', ], 'SourceLanguageCode' => [ 'shape' => 'LanguageCodeString', ], 'TargetLanguageCodes' => [ 'shape' => 'LanguageCodeStringList', ], 'EncryptionKey' => [ 'shape' => 'EncryptionKey', ], 'SizeBytes' => [ 'shape' => 'Integer', ], 'TermCount' => [ 'shape' => 'Integer', ], 'CreatedAt' => [ 'shape' => 'Timestamp', ], 'LastUpdatedAt' => [ 'shape' => 'Timestamp', ], 'Directionality' => [ 'shape' => 'Directionality', ], 'Message' => [ 'shape' => 'UnboundedLengthString', ], 'SkippedTermCount' => [ 'shape' => 'Integer', ], 'Format' => [ 'shape' => 'TerminologyDataFormat', ], ], ], 'TerminologyPropertiesList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TerminologyProperties', ], ], 'TextSizeLimitExceededException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'TextTranslationJobFilter' => [ 'type' => 'structure', 'members' => [ 'JobName' => [ 'shape' => 'JobName', ], 'JobStatus' => [ 'shape' => 'JobStatus', ], 'SubmittedBeforeTime' => [ 'shape' => 'Timestamp', ], 'SubmittedAfterTime' => [ 'shape' => 'Timestamp', ], ], ], 'TextTranslationJobProperties' => [ 'type' => 'structure', 'members' => [ 'JobId' => [ 'shape' => 'JobId', ], 'JobName' => [ 'shape' => 'JobName', ], 'JobStatus' => [ 'shape' => 'JobStatus', ], 'JobDetails' => [ 'shape' => 'JobDetails', ], 'SourceLanguageCode' => [ 'shape' => 'LanguageCodeString', ], 'TargetLanguageCodes' => [ 'shape' => 'TargetLanguageCodeStringList', ], 'TerminologyNames' => [ 'shape' => 'ResourceNameList', ], 'ParallelDataNames' => [ 'shape' => 'ResourceNameList', ], 'Message' => [ 'shape' => 'UnboundedLengthString', ], 'SubmittedTime' => [ 'shape' => 'Timestamp', ], 'EndTime' => [ 'shape' => 'Timestamp', ], 'InputDataConfig' => [ 'shape' => 'InputDataConfig', ], 'OutputDataConfig' => [ 'shape' => 'OutputDataConfig', ], 'DataAccessRoleArn' => [ 'shape' => 'IamRoleArn', ], 'Settings' => [ 'shape' => 'TranslationSettings', ], ], ], 'TextTranslationJobPropertiesList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TextTranslationJobProperties', ], ], 'Timestamp' => [ 'type' => 'timestamp', ], 'TooManyRequestsException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], ], 'exception' => true, ], 'TooManyTagsException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'String', ], 'ResourceArn' => [ 'shape' => 'ResourceArn', ], ], 'exception' => true, ], 'TranslateDocumentRequest' => [ 'type' => 'structure', 'required' => [ 'Document', 'SourceLanguageCode', 'TargetLanguageCode', ], 'members' => [ 'Document' => [ 'shape' => 'Document', ], 'TerminologyNames' => [ 'shape' => 'ResourceNameList', ], 'SourceLanguageCode' => [ 'shape' => 'LanguageCodeString', ], 'TargetLanguageCode' => [ 'shape' => 'LanguageCodeString', ], 'Settings' => [ 'shape' => 'TranslationSettings', ], ], ], 'TranslateDocumentResponse' => [ 'type' => 'structure', 'required' => [ 'TranslatedDocument', 'SourceLanguageCode', 'TargetLanguageCode', ], 'members' => [ 'TranslatedDocument' => [ 'shape' => 'TranslatedDocument', ], 'SourceLanguageCode' => [ 'shape' => 'LanguageCodeString', ], 'TargetLanguageCode' => [ 'shape' => 'LanguageCodeString', ], 'AppliedTerminologies' => [ 'shape' => 'AppliedTerminologyList', ], 'AppliedSettings' => [ 'shape' => 'TranslationSettings', ], ], ], 'TranslateTextRequest' => [ 'type' => 'structure', 'required' => [ 'Text', 'SourceLanguageCode', 'TargetLanguageCode', ], 'members' => [ 'Text' => [ 'shape' => 'BoundedLengthString', ], 'TerminologyNames' => [ 'shape' => 'ResourceNameList', ], 'SourceLanguageCode' => [ 'shape' => 'LanguageCodeString', ], 'TargetLanguageCode' => [ 'shape' => 'LanguageCodeString', ], 'Settings' => [ 'shape' => 'TranslationSettings', ], ], ], 'TranslateTextResponse' => [ 'type' => 'structure', 'required' => [ 'TranslatedText', 'SourceLanguageCode', 'TargetLanguageCode', ], 'members' => [ 'TranslatedText' => [ 'shape' => 'TranslatedTextString', ], 'SourceLanguageCode' => [ 'shape' => 'LanguageCodeString', ], 'TargetLanguageCode' => [ 'shape' => 'LanguageCodeString', ], 'AppliedTerminologies' => [ 'shape' => 'AppliedTerminologyList', ], 'AppliedSettings' => [ 'shape' => 'TranslationSettings', ], ], ], 'TranslatedDocument' => [ 'type' => 'structure', 'required' => [ 'Content', ], 'members' => [ 'Content' => [ 'shape' => 'TranslatedDocumentContent', ], ], ], 'TranslatedDocumentContent' => [ 'type' => 'blob', 'sensitive' => true, ], 'TranslatedTextString' => [ 'type' => 'string', 'max' => 20000, 'pattern' => '[\\P{M}\\p{M}]{0,20000}', ], 'TranslationSettings' => [ 'type' => 'structure', 'members' => [ 'Formality' => [ 'shape' => 'Formality', ], 'Profanity' => [ 'shape' => 'Profanity', ], 'Brevity' => [ 'shape' => 'Brevity', ], ], ], 'UnboundedLengthString' => [ 'type' => 'string', ], 'UnsupportedDisplayLanguageCodeException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], 'DisplayLanguageCode' => [ 'shape' => 'LanguageCodeString', ], ], 'exception' => true, ], 'UnsupportedLanguagePairException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'String', ], 'SourceLanguageCode' => [ 'shape' => 'LanguageCodeString', ], 'TargetLanguageCode' => [ 'shape' => 'LanguageCodeString', ], ], 'exception' => true, ], 'UntagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'ResourceArn', 'TagKeys', ], 'members' => [ 'ResourceArn' => [ 'shape' => 'ResourceArn', ], 'TagKeys' => [ 'shape' => 'TagKeyList', ], ], ], 'UntagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'UpdateParallelDataRequest' => [ 'type' => 'structure', 'required' => [ 'Name', 'ParallelDataConfig', 'ClientToken', ], 'members' => [ 'Name' => [ 'shape' => 'ResourceName', ], 'Description' => [ 'shape' => 'Description', ], 'ParallelDataConfig' => [ 'shape' => 'ParallelDataConfig', ], 'ClientToken' => [ 'shape' => 'ClientTokenString', 'idempotencyToken' => true, ], ], ], 'UpdateParallelDataResponse' => [ 'type' => 'structure', 'members' => [ 'Name' => [ 'shape' => 'ResourceName', ], 'Status' => [ 'shape' => 'ParallelDataStatus', ], 'LatestUpdateAttemptStatus' => [ 'shape' => 'ParallelDataStatus', ], 'LatestUpdateAttemptAt' => [ 'shape' => 'Timestamp', ], ], ], ],];
