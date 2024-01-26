<?php
// This file was auto-generated from sdk-root/src/data/rds-data/2018-08-01/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2018-08-01', 'endpointPrefix' => 'rds-data', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceFullName' => 'AWS RDS DataService', 'serviceId' => 'RDS Data', 'signatureVersion' => 'v4', 'signingName' => 'rds-data', 'uid' => 'rds-data-2018-08-01', ], 'operations' => [ 'BatchExecuteStatement' => [ 'name' => 'BatchExecuteStatement', 'http' => [ 'method' => 'POST', 'requestUri' => '/BatchExecute', 'responseCode' => 200, ], 'input' => [ 'shape' => 'BatchExecuteStatementRequest', ], 'output' => [ 'shape' => 'BatchExecuteStatementResponse', ], 'errors' => [ [ 'shape' => 'SecretsErrorException', ], [ 'shape' => 'HttpEndpointNotEnabledException', ], [ 'shape' => 'DatabaseErrorException', ], [ 'shape' => 'DatabaseUnavailableException', ], [ 'shape' => 'TransactionNotFoundException', ], [ 'shape' => 'InvalidSecretException', ], [ 'shape' => 'ServiceUnavailableError', ], [ 'shape' => 'ForbiddenException', ], [ 'shape' => 'DatabaseNotFoundException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'BadRequestException', ], [ 'shape' => 'StatementTimeoutException', ], [ 'shape' => 'InternalServerErrorException', ], ], ], 'BeginTransaction' => [ 'name' => 'BeginTransaction', 'http' => [ 'method' => 'POST', 'requestUri' => '/BeginTransaction', 'responseCode' => 200, ], 'input' => [ 'shape' => 'BeginTransactionRequest', ], 'output' => [ 'shape' => 'BeginTransactionResponse', ], 'errors' => [ [ 'shape' => 'SecretsErrorException', ], [ 'shape' => 'HttpEndpointNotEnabledException', ], [ 'shape' => 'DatabaseErrorException', ], [ 'shape' => 'DatabaseUnavailableException', ], [ 'shape' => 'TransactionNotFoundException', ], [ 'shape' => 'InvalidSecretException', ], [ 'shape' => 'ServiceUnavailableError', ], [ 'shape' => 'ForbiddenException', ], [ 'shape' => 'DatabaseNotFoundException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'BadRequestException', ], [ 'shape' => 'StatementTimeoutException', ], [ 'shape' => 'InternalServerErrorException', ], ], ], 'CommitTransaction' => [ 'name' => 'CommitTransaction', 'http' => [ 'method' => 'POST', 'requestUri' => '/CommitTransaction', 'responseCode' => 200, ], 'input' => [ 'shape' => 'CommitTransactionRequest', ], 'output' => [ 'shape' => 'CommitTransactionResponse', ], 'errors' => [ [ 'shape' => 'SecretsErrorException', ], [ 'shape' => 'HttpEndpointNotEnabledException', ], [ 'shape' => 'DatabaseErrorException', ], [ 'shape' => 'DatabaseUnavailableException', ], [ 'shape' => 'TransactionNotFoundException', ], [ 'shape' => 'InvalidSecretException', ], [ 'shape' => 'ServiceUnavailableError', ], [ 'shape' => 'ForbiddenException', ], [ 'shape' => 'DatabaseNotFoundException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'BadRequestException', ], [ 'shape' => 'StatementTimeoutException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'NotFoundException', ], ], ], 'ExecuteSql' => [ 'name' => 'ExecuteSql', 'http' => [ 'method' => 'POST', 'requestUri' => '/ExecuteSql', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ExecuteSqlRequest', ], 'output' => [ 'shape' => 'ExecuteSqlResponse', ], 'errors' => [ [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'BadRequestException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'ForbiddenException', ], [ 'shape' => 'ServiceUnavailableError', ], ], 'deprecated' => true, 'deprecatedMessage' => 'The ExecuteSql API is deprecated, please use the ExecuteStatement API.', ], 'ExecuteStatement' => [ 'name' => 'ExecuteStatement', 'http' => [ 'method' => 'POST', 'requestUri' => '/Execute', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ExecuteStatementRequest', ], 'output' => [ 'shape' => 'ExecuteStatementResponse', ], 'errors' => [ [ 'shape' => 'SecretsErrorException', ], [ 'shape' => 'HttpEndpointNotEnabledException', ], [ 'shape' => 'DatabaseErrorException', ], [ 'shape' => 'DatabaseUnavailableException', ], [ 'shape' => 'TransactionNotFoundException', ], [ 'shape' => 'InvalidSecretException', ], [ 'shape' => 'ServiceUnavailableError', ], [ 'shape' => 'ForbiddenException', ], [ 'shape' => 'DatabaseNotFoundException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'BadRequestException', ], [ 'shape' => 'StatementTimeoutException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'UnsupportedResultException', ], ], ], 'RollbackTransaction' => [ 'name' => 'RollbackTransaction', 'http' => [ 'method' => 'POST', 'requestUri' => '/RollbackTransaction', 'responseCode' => 200, ], 'input' => [ 'shape' => 'RollbackTransactionRequest', ], 'output' => [ 'shape' => 'RollbackTransactionResponse', ], 'errors' => [ [ 'shape' => 'SecretsErrorException', ], [ 'shape' => 'HttpEndpointNotEnabledException', ], [ 'shape' => 'DatabaseErrorException', ], [ 'shape' => 'DatabaseUnavailableException', ], [ 'shape' => 'TransactionNotFoundException', ], [ 'shape' => 'InvalidSecretException', ], [ 'shape' => 'ServiceUnavailableError', ], [ 'shape' => 'ForbiddenException', ], [ 'shape' => 'DatabaseNotFoundException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'BadRequestException', ], [ 'shape' => 'StatementTimeoutException', ], [ 'shape' => 'InternalServerErrorException', ], [ 'shape' => 'NotFoundException', ], ], ], ], 'shapes' => [ 'AccessDeniedException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 403, 'senderFault' => true, ], 'exception' => true, ], 'Arn' => [ 'type' => 'string', 'max' => 100, 'min' => 11, ], 'ArrayOfArray' => [ 'type' => 'list', 'member' => [ 'shape' => 'ArrayValue', ], ], 'ArrayValue' => [ 'type' => 'structure', 'members' => [ 'booleanValues' => [ 'shape' => 'BooleanArray', ], 'longValues' => [ 'shape' => 'LongArray', ], 'doubleValues' => [ 'shape' => 'DoubleArray', ], 'stringValues' => [ 'shape' => 'StringArray', ], 'arrayValues' => [ 'shape' => 'ArrayOfArray', ], ], 'union' => true, ], 'ArrayValueList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Value', ], ], 'BadRequestException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'BatchExecuteStatementRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'secretArn', 'sql', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', ], 'secretArn' => [ 'shape' => 'Arn', ], 'sql' => [ 'shape' => 'SqlStatement', ], 'database' => [ 'shape' => 'DbName', ], 'schema' => [ 'shape' => 'DbName', ], 'parameterSets' => [ 'shape' => 'SqlParameterSets', ], 'transactionId' => [ 'shape' => 'Id', ], ], ], 'BatchExecuteStatementResponse' => [ 'type' => 'structure', 'members' => [ 'updateResults' => [ 'shape' => 'UpdateResults', ], ], ], 'BeginTransactionRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'secretArn', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', ], 'secretArn' => [ 'shape' => 'Arn', ], 'database' => [ 'shape' => 'DbName', ], 'schema' => [ 'shape' => 'DbName', ], ], ], 'BeginTransactionResponse' => [ 'type' => 'structure', 'members' => [ 'transactionId' => [ 'shape' => 'Id', ], ], ], 'Blob' => [ 'type' => 'blob', ], 'Boolean' => [ 'type' => 'boolean', ], 'BooleanArray' => [ 'type' => 'list', 'member' => [ 'shape' => 'BoxedBoolean', ], ], 'BoxedBoolean' => [ 'type' => 'boolean', 'box' => true, ], 'BoxedDouble' => [ 'type' => 'double', 'box' => true, ], 'BoxedFloat' => [ 'type' => 'float', 'box' => true, ], 'BoxedInteger' => [ 'type' => 'integer', 'box' => true, ], 'BoxedLong' => [ 'type' => 'long', 'box' => true, ], 'ColumnMetadata' => [ 'type' => 'structure', 'members' => [ 'name' => [ 'shape' => 'String', ], 'type' => [ 'shape' => 'Integer', ], 'typeName' => [ 'shape' => 'String', ], 'label' => [ 'shape' => 'String', ], 'schemaName' => [ 'shape' => 'String', ], 'tableName' => [ 'shape' => 'String', ], 'isAutoIncrement' => [ 'shape' => 'Boolean', ], 'isSigned' => [ 'shape' => 'Boolean', ], 'isCurrency' => [ 'shape' => 'Boolean', ], 'isCaseSensitive' => [ 'shape' => 'Boolean', ], 'nullable' => [ 'shape' => 'Integer', ], 'precision' => [ 'shape' => 'Integer', ], 'scale' => [ 'shape' => 'Integer', ], 'arrayBaseColumnType' => [ 'shape' => 'Integer', ], ], ], 'CommitTransactionRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'secretArn', 'transactionId', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', ], 'secretArn' => [ 'shape' => 'Arn', ], 'transactionId' => [ 'shape' => 'Id', ], ], ], 'CommitTransactionResponse' => [ 'type' => 'structure', 'members' => [ 'transactionStatus' => [ 'shape' => 'TransactionStatus', ], ], ], 'DatabaseErrorException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'DatabaseNotFoundException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 404, 'senderFault' => true, ], 'exception' => true, ], 'DatabaseUnavailableException' => [ 'type' => 'structure', 'members' => [], 'error' => [ 'httpStatusCode' => 504, ], 'exception' => true, 'fault' => true, ], 'DbName' => [ 'type' => 'string', 'max' => 64, 'min' => 0, ], 'DecimalReturnType' => [ 'type' => 'string', 'enum' => [ 'STRING', 'DOUBLE_OR_LONG', ], ], 'DoubleArray' => [ 'type' => 'list', 'member' => [ 'shape' => 'BoxedDouble', ], ], 'ErrorMessage' => [ 'type' => 'string', ], 'ExecuteSqlRequest' => [ 'type' => 'structure', 'required' => [ 'dbClusterOrInstanceArn', 'awsSecretStoreArn', 'sqlStatements', ], 'members' => [ 'dbClusterOrInstanceArn' => [ 'shape' => 'Arn', ], 'awsSecretStoreArn' => [ 'shape' => 'Arn', ], 'sqlStatements' => [ 'shape' => 'SqlStatement', ], 'database' => [ 'shape' => 'DbName', ], 'schema' => [ 'shape' => 'DbName', ], ], ], 'ExecuteSqlResponse' => [ 'type' => 'structure', 'members' => [ 'sqlStatementResults' => [ 'shape' => 'SqlStatementResults', ], ], ], 'ExecuteStatementRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'secretArn', 'sql', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', ], 'secretArn' => [ 'shape' => 'Arn', ], 'sql' => [ 'shape' => 'SqlStatement', ], 'database' => [ 'shape' => 'DbName', ], 'schema' => [ 'shape' => 'DbName', ], 'parameters' => [ 'shape' => 'SqlParametersList', ], 'transactionId' => [ 'shape' => 'Id', ], 'includeResultMetadata' => [ 'shape' => 'Boolean', ], 'continueAfterTimeout' => [ 'shape' => 'Boolean', ], 'resultSetOptions' => [ 'shape' => 'ResultSetOptions', ], 'formatRecordsAs' => [ 'shape' => 'RecordsFormatType', ], ], ], 'ExecuteStatementResponse' => [ 'type' => 'structure', 'members' => [ 'records' => [ 'shape' => 'SqlRecords', ], 'columnMetadata' => [ 'shape' => 'Metadata', ], 'numberOfRecordsUpdated' => [ 'shape' => 'RecordsUpdated', ], 'generatedFields' => [ 'shape' => 'FieldList', ], 'formattedRecords' => [ 'shape' => 'FormattedSqlRecords', ], ], ], 'Field' => [ 'type' => 'structure', 'members' => [ 'isNull' => [ 'shape' => 'BoxedBoolean', ], 'booleanValue' => [ 'shape' => 'BoxedBoolean', ], 'longValue' => [ 'shape' => 'BoxedLong', ], 'doubleValue' => [ 'shape' => 'BoxedDouble', ], 'stringValue' => [ 'shape' => 'String', ], 'blobValue' => [ 'shape' => 'Blob', ], 'arrayValue' => [ 'shape' => 'ArrayValue', ], ], 'union' => true, ], 'FieldList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Field', ], ], 'ForbiddenException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 403, 'senderFault' => true, ], 'exception' => true, ], 'FormattedSqlRecords' => [ 'type' => 'string', ], 'HttpEndpointNotEnabledException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'Id' => [ 'type' => 'string', 'max' => 192, 'min' => 0, ], 'Integer' => [ 'type' => 'integer', ], 'InternalServerErrorException' => [ 'type' => 'structure', 'members' => [], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, 'fault' => true, ], 'InvalidSecretException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'Long' => [ 'type' => 'long', ], 'LongArray' => [ 'type' => 'list', 'member' => [ 'shape' => 'BoxedLong', ], ], 'LongReturnType' => [ 'type' => 'string', 'enum' => [ 'STRING', 'LONG', ], ], 'Metadata' => [ 'type' => 'list', 'member' => [ 'shape' => 'ColumnMetadata', ], ], 'NotFoundException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 404, 'senderFault' => true, ], 'exception' => true, ], 'ParameterName' => [ 'type' => 'string', ], 'Record' => [ 'type' => 'structure', 'members' => [ 'values' => [ 'shape' => 'Row', ], ], ], 'Records' => [ 'type' => 'list', 'member' => [ 'shape' => 'Record', ], ], 'RecordsFormatType' => [ 'type' => 'string', 'enum' => [ 'NONE', 'JSON', ], ], 'RecordsUpdated' => [ 'type' => 'long', ], 'ResultFrame' => [ 'type' => 'structure', 'members' => [ 'resultSetMetadata' => [ 'shape' => 'ResultSetMetadata', ], 'records' => [ 'shape' => 'Records', ], ], ], 'ResultSetMetadata' => [ 'type' => 'structure', 'members' => [ 'columnCount' => [ 'shape' => 'Long', ], 'columnMetadata' => [ 'shape' => 'Metadata', ], ], ], 'ResultSetOptions' => [ 'type' => 'structure', 'members' => [ 'decimalReturnType' => [ 'shape' => 'DecimalReturnType', ], 'longReturnType' => [ 'shape' => 'LongReturnType', ], ], ], 'RollbackTransactionRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'secretArn', 'transactionId', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', ], 'secretArn' => [ 'shape' => 'Arn', ], 'transactionId' => [ 'shape' => 'Id', ], ], ], 'RollbackTransactionResponse' => [ 'type' => 'structure', 'members' => [ 'transactionStatus' => [ 'shape' => 'TransactionStatus', ], ], ], 'Row' => [ 'type' => 'list', 'member' => [ 'shape' => 'Value', ], ], 'SecretsErrorException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'ServiceUnavailableError' => [ 'type' => 'structure', 'members' => [], 'error' => [ 'httpStatusCode' => 503, ], 'exception' => true, 'fault' => true, ], 'SqlParameter' => [ 'type' => 'structure', 'members' => [ 'name' => [ 'shape' => 'ParameterName', ], 'value' => [ 'shape' => 'Field', ], 'typeHint' => [ 'shape' => 'TypeHint', ], ], ], 'SqlParameterSets' => [ 'type' => 'list', 'member' => [ 'shape' => 'SqlParametersList', ], ], 'SqlParametersList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SqlParameter', ], ], 'SqlRecords' => [ 'type' => 'list', 'member' => [ 'shape' => 'FieldList', ], ], 'SqlStatement' => [ 'type' => 'string', 'max' => 65536, 'min' => 0, ], 'SqlStatementResult' => [ 'type' => 'structure', 'members' => [ 'resultFrame' => [ 'shape' => 'ResultFrame', ], 'numberOfRecordsUpdated' => [ 'shape' => 'RecordsUpdated', ], ], ], 'SqlStatementResults' => [ 'type' => 'list', 'member' => [ 'shape' => 'SqlStatementResult', ], ], 'StatementTimeoutException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], 'dbConnectionId' => [ 'shape' => 'Long', ], ], 'error' => [ 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'String' => [ 'type' => 'string', ], 'StringArray' => [ 'type' => 'list', 'member' => [ 'shape' => 'String', ], ], 'StructValue' => [ 'type' => 'structure', 'members' => [ 'attributes' => [ 'shape' => 'ArrayValueList', ], ], ], 'TransactionNotFoundException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 404, 'senderFault' => true, ], 'exception' => true, ], 'TransactionStatus' => [ 'type' => 'string', 'max' => 128, 'min' => 0, ], 'TypeHint' => [ 'type' => 'string', 'enum' => [ 'JSON', 'UUID', 'TIMESTAMP', 'DATE', 'TIME', 'DECIMAL', ], ], 'UnsupportedResultException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'UpdateResult' => [ 'type' => 'structure', 'members' => [ 'generatedFields' => [ 'shape' => 'FieldList', ], ], ], 'UpdateResults' => [ 'type' => 'list', 'member' => [ 'shape' => 'UpdateResult', ], ], 'Value' => [ 'type' => 'structure', 'members' => [ 'isNull' => [ 'shape' => 'BoxedBoolean', ], 'bitValue' => [ 'shape' => 'BoxedBoolean', ], 'bigIntValue' => [ 'shape' => 'BoxedLong', ], 'intValue' => [ 'shape' => 'BoxedInteger', ], 'doubleValue' => [ 'shape' => 'BoxedDouble', ], 'realValue' => [ 'shape' => 'BoxedFloat', ], 'stringValue' => [ 'shape' => 'String', ], 'blobValue' => [ 'shape' => 'Blob', ], 'arrayValues' => [ 'shape' => 'ArrayValueList', ], 'structValue' => [ 'shape' => 'StructValue', ], ], 'union' => true, ], ],];
