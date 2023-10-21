<?php
// This file was auto-generated from sdk-root/src/data/managedblockchain-query/2023-05-04/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2023-05-04', 'endpointPrefix' => 'managedblockchain-query', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'ripServiceName' => 'chainquery', 'serviceFullName' => 'Amazon Managed Blockchain Query', 'serviceId' => 'ManagedBlockchain Query', 'signatureVersion' => 'v4', 'signingName' => 'managedblockchain-query', 'uid' => 'managedblockchain-query-2023-05-04', ], 'operations' => [ 'BatchGetTokenBalance' => [ 'name' => 'BatchGetTokenBalance', 'http' => [ 'method' => 'POST', 'requestUri' => '/batch-get-token-balance', 'responseCode' => 200, ], 'input' => [ 'shape' => 'BatchGetTokenBalanceInput', ], 'output' => [ 'shape' => 'BatchGetTokenBalanceOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], ], 'GetAssetContract' => [ 'name' => 'GetAssetContract', 'http' => [ 'method' => 'POST', 'requestUri' => '/get-asset-contract', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetAssetContractInput', ], 'output' => [ 'shape' => 'GetAssetContractOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], ], 'GetTokenBalance' => [ 'name' => 'GetTokenBalance', 'http' => [ 'method' => 'POST', 'requestUri' => '/get-token-balance', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetTokenBalanceInput', ], 'output' => [ 'shape' => 'GetTokenBalanceOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], ], 'GetTransaction' => [ 'name' => 'GetTransaction', 'http' => [ 'method' => 'POST', 'requestUri' => '/get-transaction', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetTransactionInput', ], 'output' => [ 'shape' => 'GetTransactionOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], ], 'ListAssetContracts' => [ 'name' => 'ListAssetContracts', 'http' => [ 'method' => 'POST', 'requestUri' => '/list-asset-contracts', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListAssetContractsInput', ], 'output' => [ 'shape' => 'ListAssetContractsOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], ], 'ListTokenBalances' => [ 'name' => 'ListTokenBalances', 'http' => [ 'method' => 'POST', 'requestUri' => '/list-token-balances', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListTokenBalancesInput', ], 'output' => [ 'shape' => 'ListTokenBalancesOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], ], 'ListTransactionEvents' => [ 'name' => 'ListTransactionEvents', 'http' => [ 'method' => 'POST', 'requestUri' => '/list-transaction-events', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListTransactionEventsInput', ], 'output' => [ 'shape' => 'ListTransactionEventsOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], ], 'ListTransactions' => [ 'name' => 'ListTransactions', 'http' => [ 'method' => 'POST', 'requestUri' => '/list-transactions', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListTransactionsInput', ], 'output' => [ 'shape' => 'ListTransactionsOutput', ], 'errors' => [ [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], ], ], 'shapes' => [ 'AccessDeniedException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'ExceptionMessage', ], ], 'error' => [ 'httpStatusCode' => 403, 'senderFault' => true, ], 'exception' => true, ], 'AssetContract' => [ 'type' => 'structure', 'required' => [ 'contractIdentifier', 'tokenStandard', 'deployerAddress', ], 'members' => [ 'contractIdentifier' => [ 'shape' => 'ContractIdentifier', ], 'tokenStandard' => [ 'shape' => 'QueryTokenStandard', ], 'deployerAddress' => [ 'shape' => 'ChainAddress', ], ], ], 'AssetContractList' => [ 'type' => 'list', 'member' => [ 'shape' => 'AssetContract', ], 'max' => 250, 'min' => 0, ], 'BatchGetTokenBalanceErrorItem' => [ 'type' => 'structure', 'required' => [ 'errorCode', 'errorMessage', 'errorType', ], 'members' => [ 'tokenIdentifier' => [ 'shape' => 'TokenIdentifier', ], 'ownerIdentifier' => [ 'shape' => 'OwnerIdentifier', ], 'atBlockchainInstant' => [ 'shape' => 'BlockchainInstant', ], 'errorCode' => [ 'shape' => 'String', ], 'errorMessage' => [ 'shape' => 'String', ], 'errorType' => [ 'shape' => 'ErrorType', ], ], ], 'BatchGetTokenBalanceErrors' => [ 'type' => 'list', 'member' => [ 'shape' => 'BatchGetTokenBalanceErrorItem', ], 'max' => 10, 'min' => 0, ], 'BatchGetTokenBalanceInput' => [ 'type' => 'structure', 'members' => [ 'getTokenBalanceInputs' => [ 'shape' => 'GetTokenBalanceInputList', ], ], ], 'BatchGetTokenBalanceInputItem' => [ 'type' => 'structure', 'required' => [ 'tokenIdentifier', 'ownerIdentifier', ], 'members' => [ 'tokenIdentifier' => [ 'shape' => 'TokenIdentifier', ], 'ownerIdentifier' => [ 'shape' => 'OwnerIdentifier', ], 'atBlockchainInstant' => [ 'shape' => 'BlockchainInstant', ], ], ], 'BatchGetTokenBalanceOutput' => [ 'type' => 'structure', 'required' => [ 'tokenBalances', 'errors', ], 'members' => [ 'tokenBalances' => [ 'shape' => 'BatchGetTokenBalanceOutputList', ], 'errors' => [ 'shape' => 'BatchGetTokenBalanceErrors', ], ], ], 'BatchGetTokenBalanceOutputItem' => [ 'type' => 'structure', 'required' => [ 'balance', 'atBlockchainInstant', ], 'members' => [ 'ownerIdentifier' => [ 'shape' => 'OwnerIdentifier', ], 'tokenIdentifier' => [ 'shape' => 'TokenIdentifier', ], 'balance' => [ 'shape' => 'String', ], 'atBlockchainInstant' => [ 'shape' => 'BlockchainInstant', ], 'lastUpdatedTime' => [ 'shape' => 'BlockchainInstant', ], ], ], 'BatchGetTokenBalanceOutputList' => [ 'type' => 'list', 'member' => [ 'shape' => 'BatchGetTokenBalanceOutputItem', ], 'max' => 10, 'min' => 0, ], 'BlockHash' => [ 'type' => 'string', 'pattern' => '(0x[A-Fa-f0-9]{64}|[A-Fa-f0-9]{64})', ], 'BlockchainInstant' => [ 'type' => 'structure', 'members' => [ 'time' => [ 'shape' => 'Timestamp', ], ], ], 'ChainAddress' => [ 'type' => 'string', 'pattern' => '[-A-Za-z0-9]{13,74}', ], 'ContractFilter' => [ 'type' => 'structure', 'required' => [ 'network', 'tokenStandard', 'deployerAddress', ], 'members' => [ 'network' => [ 'shape' => 'QueryNetwork', ], 'tokenStandard' => [ 'shape' => 'QueryTokenStandard', ], 'deployerAddress' => [ 'shape' => 'ChainAddress', ], ], ], 'ContractIdentifier' => [ 'type' => 'structure', 'required' => [ 'network', 'contractAddress', ], 'members' => [ 'network' => [ 'shape' => 'QueryNetwork', ], 'contractAddress' => [ 'shape' => 'ChainAddress', ], ], ], 'ContractMetadata' => [ 'type' => 'structure', 'members' => [ 'name' => [ 'shape' => 'String', ], 'symbol' => [ 'shape' => 'String', ], 'decimals' => [ 'shape' => 'Integer', ], ], ], 'ErrorType' => [ 'type' => 'string', 'enum' => [ 'VALIDATION_EXCEPTION', 'RESOURCE_NOT_FOUND_EXCEPTION', ], ], 'ExceptionMessage' => [ 'type' => 'string', 'min' => 1, ], 'GetAssetContractInput' => [ 'type' => 'structure', 'required' => [ 'contractIdentifier', ], 'members' => [ 'contractIdentifier' => [ 'shape' => 'ContractIdentifier', ], ], ], 'GetAssetContractOutput' => [ 'type' => 'structure', 'required' => [ 'contractIdentifier', 'tokenStandard', 'deployerAddress', ], 'members' => [ 'contractIdentifier' => [ 'shape' => 'ContractIdentifier', ], 'tokenStandard' => [ 'shape' => 'QueryTokenStandard', ], 'deployerAddress' => [ 'shape' => 'ChainAddress', ], 'metadata' => [ 'shape' => 'ContractMetadata', ], ], ], 'GetTokenBalanceInput' => [ 'type' => 'structure', 'required' => [ 'tokenIdentifier', 'ownerIdentifier', ], 'members' => [ 'tokenIdentifier' => [ 'shape' => 'TokenIdentifier', ], 'ownerIdentifier' => [ 'shape' => 'OwnerIdentifier', ], 'atBlockchainInstant' => [ 'shape' => 'BlockchainInstant', ], ], ], 'GetTokenBalanceInputList' => [ 'type' => 'list', 'member' => [ 'shape' => 'BatchGetTokenBalanceInputItem', ], 'max' => 10, 'min' => 1, ], 'GetTokenBalanceOutput' => [ 'type' => 'structure', 'required' => [ 'balance', 'atBlockchainInstant', ], 'members' => [ 'ownerIdentifier' => [ 'shape' => 'OwnerIdentifier', ], 'tokenIdentifier' => [ 'shape' => 'TokenIdentifier', ], 'balance' => [ 'shape' => 'String', ], 'atBlockchainInstant' => [ 'shape' => 'BlockchainInstant', ], 'lastUpdatedTime' => [ 'shape' => 'BlockchainInstant', ], ], ], 'GetTransactionInput' => [ 'type' => 'structure', 'required' => [ 'transactionHash', 'network', ], 'members' => [ 'transactionHash' => [ 'shape' => 'QueryTransactionHash', ], 'network' => [ 'shape' => 'QueryNetwork', ], ], ], 'GetTransactionOutput' => [ 'type' => 'structure', 'required' => [ 'transaction', ], 'members' => [ 'transaction' => [ 'shape' => 'Transaction', ], ], ], 'Integer' => [ 'type' => 'integer', 'box' => true, ], 'InternalServerException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'ExceptionMessage', ], 'retryAfterSeconds' => [ 'shape' => 'Integer', 'location' => 'header', 'locationName' => 'Retry-After', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, 'fault' => true, 'retryable' => [ 'throttling' => false, ], ], 'ListAssetContractsInput' => [ 'type' => 'structure', 'required' => [ 'contractFilter', ], 'members' => [ 'contractFilter' => [ 'shape' => 'ContractFilter', ], 'nextToken' => [ 'shape' => 'NextToken', ], 'maxResults' => [ 'shape' => 'ListAssetContractsInputMaxResultsInteger', ], ], ], 'ListAssetContractsInputMaxResultsInteger' => [ 'type' => 'integer', 'box' => true, 'max' => 250, 'min' => 1, ], 'ListAssetContractsOutput' => [ 'type' => 'structure', 'required' => [ 'contracts', ], 'members' => [ 'contracts' => [ 'shape' => 'AssetContractList', ], 'nextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListTokenBalancesInput' => [ 'type' => 'structure', 'required' => [ 'tokenFilter', ], 'members' => [ 'ownerFilter' => [ 'shape' => 'OwnerFilter', ], 'tokenFilter' => [ 'shape' => 'TokenFilter', ], 'nextToken' => [ 'shape' => 'NextToken', ], 'maxResults' => [ 'shape' => 'ListTokenBalancesInputMaxResultsInteger', ], ], ], 'ListTokenBalancesInputMaxResultsInteger' => [ 'type' => 'integer', 'box' => true, 'max' => 250, 'min' => 1, ], 'ListTokenBalancesOutput' => [ 'type' => 'structure', 'required' => [ 'tokenBalances', ], 'members' => [ 'tokenBalances' => [ 'shape' => 'TokenBalanceList', ], 'nextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListTransactionEventsInput' => [ 'type' => 'structure', 'required' => [ 'transactionHash', 'network', ], 'members' => [ 'transactionHash' => [ 'shape' => 'QueryTransactionHash', ], 'network' => [ 'shape' => 'QueryNetwork', ], 'nextToken' => [ 'shape' => 'NextToken', ], 'maxResults' => [ 'shape' => 'ListTransactionEventsInputMaxResultsInteger', ], ], ], 'ListTransactionEventsInputMaxResultsInteger' => [ 'type' => 'integer', 'box' => true, 'max' => 250, 'min' => 1, ], 'ListTransactionEventsOutput' => [ 'type' => 'structure', 'required' => [ 'events', ], 'members' => [ 'events' => [ 'shape' => 'TransactionEventList', ], 'nextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListTransactionsInput' => [ 'type' => 'structure', 'required' => [ 'address', 'network', ], 'members' => [ 'address' => [ 'shape' => 'ChainAddress', ], 'network' => [ 'shape' => 'QueryNetwork', ], 'fromBlockchainInstant' => [ 'shape' => 'BlockchainInstant', ], 'toBlockchainInstant' => [ 'shape' => 'BlockchainInstant', ], 'sort' => [ 'shape' => 'ListTransactionsSort', ], 'nextToken' => [ 'shape' => 'NextToken', ], 'maxResults' => [ 'shape' => 'ListTransactionsInputMaxResultsInteger', ], ], ], 'ListTransactionsInputMaxResultsInteger' => [ 'type' => 'integer', 'box' => true, 'max' => 250, 'min' => 1, ], 'ListTransactionsOutput' => [ 'type' => 'structure', 'required' => [ 'transactions', ], 'members' => [ 'transactions' => [ 'shape' => 'TransactionOutputList', ], 'nextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListTransactionsSort' => [ 'type' => 'structure', 'members' => [ 'sortBy' => [ 'shape' => 'ListTransactionsSortBy', ], 'sortOrder' => [ 'shape' => 'SortOrder', ], ], ], 'ListTransactionsSortBy' => [ 'type' => 'string', 'enum' => [ 'TRANSACTION_TIMESTAMP', ], ], 'Long' => [ 'type' => 'long', 'box' => true, ], 'NextToken' => [ 'type' => 'string', 'max' => 131070, 'min' => 0, ], 'OwnerFilter' => [ 'type' => 'structure', 'required' => [ 'address', ], 'members' => [ 'address' => [ 'shape' => 'ChainAddress', ], ], ], 'OwnerIdentifier' => [ 'type' => 'structure', 'required' => [ 'address', ], 'members' => [ 'address' => [ 'shape' => 'ChainAddress', ], ], ], 'QueryNetwork' => [ 'type' => 'string', 'enum' => [ 'ETHEREUM_MAINNET', 'BITCOIN_MAINNET', 'BITCOIN_TESTNET', 'ETHEREUM_SEPOLIA_TESTNET', ], ], 'QueryTokenId' => [ 'type' => 'string', 'pattern' => '[a-zA-Z0-9]{1,66}', ], 'QueryTokenStandard' => [ 'type' => 'string', 'enum' => [ 'ERC20', 'ERC721', 'ERC1155', ], ], 'QueryTransactionEventType' => [ 'type' => 'string', 'enum' => [ 'ERC20_TRANSFER', 'ERC20_MINT', 'ERC20_BURN', 'ERC20_DEPOSIT', 'ERC20_WITHDRAWAL', 'ERC721_TRANSFER', 'ERC1155_TRANSFER', 'BITCOIN_VIN', 'BITCOIN_VOUT', 'INTERNAL_ETH_TRANSFER', 'ETH_TRANSFER', ], ], 'QueryTransactionHash' => [ 'type' => 'string', 'pattern' => '(0x[A-Fa-f0-9]{64}|[A-Fa-f0-9]{64})', ], 'QueryTransactionStatus' => [ 'type' => 'string', 'enum' => [ 'FINAL', 'FAILED', ], ], 'QuotaCode' => [ 'type' => 'string', ], 'ResourceId' => [ 'type' => 'string', ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'required' => [ 'message', 'resourceId', 'resourceType', ], 'members' => [ 'message' => [ 'shape' => 'ExceptionMessage', ], 'resourceId' => [ 'shape' => 'ResourceId', ], 'resourceType' => [ 'shape' => 'ResourceType', ], ], 'error' => [ 'httpStatusCode' => 404, 'senderFault' => true, ], 'exception' => true, ], 'ResourceType' => [ 'type' => 'string', 'enum' => [ 'collection', ], ], 'ServiceCode' => [ 'type' => 'string', ], 'ServiceQuotaExceededException' => [ 'type' => 'structure', 'required' => [ 'message', 'resourceId', 'resourceType', 'serviceCode', 'quotaCode', ], 'members' => [ 'message' => [ 'shape' => 'ExceptionMessage', ], 'resourceId' => [ 'shape' => 'ResourceId', ], 'resourceType' => [ 'shape' => 'ResourceType', ], 'serviceCode' => [ 'shape' => 'ServiceCode', ], 'quotaCode' => [ 'shape' => 'QuotaCode', ], ], 'error' => [ 'httpStatusCode' => 402, 'senderFault' => true, ], 'exception' => true, ], 'SortOrder' => [ 'type' => 'string', 'enum' => [ 'ASCENDING', 'DESCENDING', ], ], 'String' => [ 'type' => 'string', ], 'ThrottlingException' => [ 'type' => 'structure', 'required' => [ 'message', 'serviceCode', 'quotaCode', ], 'members' => [ 'message' => [ 'shape' => 'ExceptionMessage', ], 'serviceCode' => [ 'shape' => 'ServiceCode', ], 'quotaCode' => [ 'shape' => 'QuotaCode', ], 'retryAfterSeconds' => [ 'shape' => 'Integer', 'location' => 'header', 'locationName' => 'Retry-After', ], ], 'error' => [ 'httpStatusCode' => 429, 'senderFault' => true, ], 'exception' => true, 'retryable' => [ 'throttling' => true, ], ], 'Timestamp' => [ 'type' => 'timestamp', ], 'TokenBalance' => [ 'type' => 'structure', 'required' => [ 'balance', 'atBlockchainInstant', ], 'members' => [ 'ownerIdentifier' => [ 'shape' => 'OwnerIdentifier', ], 'tokenIdentifier' => [ 'shape' => 'TokenIdentifier', ], 'balance' => [ 'shape' => 'String', ], 'atBlockchainInstant' => [ 'shape' => 'BlockchainInstant', ], 'lastUpdatedTime' => [ 'shape' => 'BlockchainInstant', ], ], ], 'TokenBalanceList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TokenBalance', ], 'max' => 250, 'min' => 0, ], 'TokenFilter' => [ 'type' => 'structure', 'required' => [ 'network', ], 'members' => [ 'network' => [ 'shape' => 'QueryNetwork', ], 'contractAddress' => [ 'shape' => 'ChainAddress', ], 'tokenId' => [ 'shape' => 'QueryTokenId', ], ], ], 'TokenIdentifier' => [ 'type' => 'structure', 'required' => [ 'network', ], 'members' => [ 'network' => [ 'shape' => 'QueryNetwork', ], 'contractAddress' => [ 'shape' => 'ChainAddress', ], 'tokenId' => [ 'shape' => 'QueryTokenId', ], ], ], 'Transaction' => [ 'type' => 'structure', 'required' => [ 'network', 'transactionHash', 'transactionTimestamp', 'transactionIndex', 'numberOfTransactions', 'status', 'to', ], 'members' => [ 'network' => [ 'shape' => 'QueryNetwork', ], 'blockHash' => [ 'shape' => 'BlockHash', ], 'transactionHash' => [ 'shape' => 'QueryTransactionHash', ], 'blockNumber' => [ 'shape' => 'String', ], 'transactionTimestamp' => [ 'shape' => 'Timestamp', ], 'transactionIndex' => [ 'shape' => 'Long', ], 'numberOfTransactions' => [ 'shape' => 'Long', ], 'status' => [ 'shape' => 'QueryTransactionStatus', ], 'to' => [ 'shape' => 'ChainAddress', ], 'from' => [ 'shape' => 'ChainAddress', ], 'contractAddress' => [ 'shape' => 'ChainAddress', ], 'gasUsed' => [ 'shape' => 'String', ], 'cumulativeGasUsed' => [ 'shape' => 'String', ], 'effectiveGasPrice' => [ 'shape' => 'String', ], 'signatureV' => [ 'shape' => 'Integer', ], 'signatureR' => [ 'shape' => 'String', ], 'signatureS' => [ 'shape' => 'String', ], 'transactionFee' => [ 'shape' => 'String', ], 'transactionId' => [ 'shape' => 'String', ], ], ], 'TransactionEvent' => [ 'type' => 'structure', 'required' => [ 'network', 'transactionHash', 'eventType', ], 'members' => [ 'network' => [ 'shape' => 'QueryNetwork', ], 'transactionHash' => [ 'shape' => 'QueryTransactionHash', ], 'eventType' => [ 'shape' => 'QueryTransactionEventType', ], 'from' => [ 'shape' => 'ChainAddress', ], 'to' => [ 'shape' => 'ChainAddress', ], 'value' => [ 'shape' => 'String', ], 'contractAddress' => [ 'shape' => 'ChainAddress', ], 'tokenId' => [ 'shape' => 'QueryTokenId', ], 'transactionId' => [ 'shape' => 'String', ], 'voutIndex' => [ 'shape' => 'Integer', ], ], ], 'TransactionEventList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TransactionEvent', ], 'max' => 250, 'min' => 0, ], 'TransactionOutputItem' => [ 'type' => 'structure', 'required' => [ 'transactionHash', 'network', 'transactionTimestamp', ], 'members' => [ 'transactionHash' => [ 'shape' => 'QueryTransactionHash', ], 'network' => [ 'shape' => 'QueryNetwork', ], 'transactionTimestamp' => [ 'shape' => 'Timestamp', ], ], ], 'TransactionOutputList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TransactionOutputItem', ], 'max' => 250, 'min' => 0, ], 'ValidationException' => [ 'type' => 'structure', 'required' => [ 'message', 'reason', ], 'members' => [ 'message' => [ 'shape' => 'ExceptionMessage', ], 'reason' => [ 'shape' => 'ValidationExceptionReason', ], 'fieldList' => [ 'shape' => 'ValidationExceptionFieldList', ], ], 'error' => [ 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], 'ValidationExceptionField' => [ 'type' => 'structure', 'required' => [ 'name', 'message', ], 'members' => [ 'name' => [ 'shape' => 'String', ], 'message' => [ 'shape' => 'String', ], ], ], 'ValidationExceptionFieldList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ValidationExceptionField', ], ], 'ValidationExceptionReason' => [ 'type' => 'string', 'enum' => [ 'unknownOperation', 'cannotParse', 'fieldValidationFailed', 'other', ], ], ],];
