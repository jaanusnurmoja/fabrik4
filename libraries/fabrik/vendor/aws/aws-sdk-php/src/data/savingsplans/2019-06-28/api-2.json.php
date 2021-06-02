<?php
// This file was auto-generated from sdk-root/src/data/savingsplans/2019-06-28/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2019-06-28', 'endpointPrefix' => 'savingsplans', 'globalEndpoint' => 'savingsplans.amazonaws.com', 'jsonVersion' => '1.0', 'protocol' => 'rest-json', 'serviceAbbreviation' => 'AWSSavingsPlans', 'serviceFullName' => 'AWS Savings Plans', 'serviceId' => 'savingsplans', 'signatureVersion' => 'v4', 'uid' => 'savingsplans-2019-06-28', ], 'operations' => [ 'CreateSavingsPlan' => [ 'name' => 'CreateSavingsPlan', 'http' => [ 'method' => 'POST', 'requestUri' => '/CreateSavingsPlan', ], 'input' => [ 'shape' => 'CreateSavingsPlanRequest', ], 'output' => [ 'shape' => 'CreateSavingsPlanResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], ], 'DeleteQueuedSavingsPlan' => [ 'name' => 'DeleteQueuedSavingsPlan', 'http' => [ 'method' => 'POST', 'requestUri' => '/DeleteQueuedSavingsPlan', ], 'input' => [ 'shape' => 'DeleteQueuedSavingsPlanRequest', ], 'output' => [ 'shape' => 'DeleteQueuedSavingsPlanResponse', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], ], 'DescribeSavingsPlanRates' => [ 'name' => 'DescribeSavingsPlanRates', 'http' => [ 'method' => 'POST', 'requestUri' => '/DescribeSavingsPlanRates', ], 'input' => [ 'shape' => 'DescribeSavingsPlanRatesRequest', ], 'output' => [ 'shape' => 'DescribeSavingsPlanRatesResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ValidationException', ], ], ], 'DescribeSavingsPlans' => [ 'name' => 'DescribeSavingsPlans', 'http' => [ 'method' => 'POST', 'requestUri' => '/DescribeSavingsPlans', ], 'input' => [ 'shape' => 'DescribeSavingsPlansRequest', ], 'output' => [ 'shape' => 'DescribeSavingsPlansResponse', ], 'errors' => [ [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ValidationException', ], ], ], 'DescribeSavingsPlansOfferingRates' => [ 'name' => 'DescribeSavingsPlansOfferingRates', 'http' => [ 'method' => 'POST', 'requestUri' => '/DescribeSavingsPlansOfferingRates', ], 'input' => [ 'shape' => 'DescribeSavingsPlansOfferingRatesRequest', ], 'output' => [ 'shape' => 'DescribeSavingsPlansOfferingRatesResponse', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], ], ], 'DescribeSavingsPlansOfferings' => [ 'name' => 'DescribeSavingsPlansOfferings', 'http' => [ 'method' => 'POST', 'requestUri' => '/DescribeSavingsPlansOfferings', ], 'input' => [ 'shape' => 'DescribeSavingsPlansOfferingsRequest', ], 'output' => [ 'shape' => 'DescribeSavingsPlansOfferingsResponse', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], ], ], 'ListTagsForResource' => [ 'name' => 'ListTagsForResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/ListTagsForResource', ], 'input' => [ 'shape' => 'ListTagsForResourceRequest', ], 'output' => [ 'shape' => 'ListTagsForResourceResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], ], ], 'TagResource' => [ 'name' => 'TagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/TagResource', ], 'input' => [ 'shape' => 'TagResourceRequest', ], 'output' => [ 'shape' => 'TagResourceResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], ], ], 'UntagResource' => [ 'name' => 'UntagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/UntagResource', ], 'input' => [ 'shape' => 'UntagResourceRequest', ], 'output' => [ 'shape' => 'UntagResourceResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], ], ], ], 'shapes' => [ 'Amount' => [ 'type' => 'string', ], 'ClientToken' => [ 'type' => 'string', ], 'CreateSavingsPlanRequest' => [ 'type' => 'structure', 'required' => [ 'savingsPlanOfferingId', 'commitment', ], 'members' => [ 'savingsPlanOfferingId' => [ 'shape' => 'SavingsPlanOfferingId', ], 'commitment' => [ 'shape' => 'Amount', ], 'upfrontPaymentAmount' => [ 'shape' => 'Amount', ], 'purchaseTime' => [ 'shape' => 'DateTime', ], 'clientToken' => [ 'shape' => 'ClientToken', 'idempotencyToken' => true, ], 'tags' => [ 'shape' => 'TagMap', ], ], ], 'CreateSavingsPlanResponse' => [ 'type' => 'structure', 'members' => [ 'savingsPlanId' => [ 'shape' => 'SavingsPlanId', ], ], ], 'CurrencyCode' => [ 'type' => 'string', 'enum' => [ 'CNY', 'USD', ], ], 'CurrencyList' => [ 'type' => 'list', 'member' => [ 'shape' => 'CurrencyCode', ], ], 'DateTime' => [ 'type' => 'timestamp', ], 'DeleteQueuedSavingsPlanRequest' => [ 'type' => 'structure', 'required' => [ 'savingsPlanId', ], 'members' => [ 'savingsPlanId' => [ 'shape' => 'SavingsPlanId', ], ], ], 'DeleteQueuedSavingsPlanResponse' => [ 'type' => 'structure', 'members' => [], ], 'DescribeSavingsPlanRatesRequest' => [ 'type' => 'structure', 'required' => [ 'savingsPlanId', ], 'members' => [ 'savingsPlanId' => [ 'shape' => 'SavingsPlanId', ], 'filters' => [ 'shape' => 'SavingsPlanRateFilterList', ], 'nextToken' => [ 'shape' => 'PaginationToken', ], 'maxResults' => [ 'shape' => 'MaxResults', ], ], ], 'DescribeSavingsPlanRatesResponse' => [ 'type' => 'structure', 'members' => [ 'savingsPlanId' => [ 'shape' => 'SavingsPlanId', ], 'searchResults' => [ 'shape' => 'SavingsPlanRateList', ], 'nextToken' => [ 'shape' => 'PaginationToken', ], ], ], 'DescribeSavingsPlansOfferingRatesRequest' => [ 'type' => 'structure', 'members' => [ 'savingsPlanOfferingIds' => [ 'shape' => 'UUIDs', ], 'savingsPlanPaymentOptions' => [ 'shape' => 'SavingsPlanPaymentOptionList', ], 'savingsPlanTypes' => [ 'shape' => 'SavingsPlanTypeList', ], 'products' => [ 'shape' => 'SavingsPlanProductTypeList', ], 'serviceCodes' => [ 'shape' => 'SavingsPlanRateServiceCodeList', ], 'usageTypes' => [ 'shape' => 'SavingsPlanRateUsageTypeList', ], 'operations' => [ 'shape' => 'SavingsPlanRateOperationList', ], 'filters' => [ 'shape' => 'SavingsPlanOfferingRateFiltersList', ], 'nextToken' => [ 'shape' => 'PaginationToken', ], 'maxResults' => [ 'shape' => 'PageSize', ], ], ], 'DescribeSavingsPlansOfferingRatesResponse' => [ 'type' => 'structure', 'members' => [ 'searchResults' => [ 'shape' => 'SavingsPlanOfferingRatesList', ], 'nextToken' => [ 'shape' => 'PaginationToken', ], ], ], 'DescribeSavingsPlansOfferingsRequest' => [ 'type' => 'structure', 'members' => [ 'offeringIds' => [ 'shape' => 'UUIDs', ], 'paymentOptions' => [ 'shape' => 'SavingsPlanPaymentOptionList', ], 'productType' => [ 'shape' => 'SavingsPlanProductType', ], 'planTypes' => [ 'shape' => 'SavingsPlanTypeList', ], 'durations' => [ 'shape' => 'DurationsList', ], 'currencies' => [ 'shape' => 'CurrencyList', ], 'descriptions' => [ 'shape' => 'SavingsPlanDescriptionsList', ], 'serviceCodes' => [ 'shape' => 'SavingsPlanServiceCodeList', ], 'usageTypes' => [ 'shape' => 'SavingsPlanUsageTypeList', ], 'operations' => [ 'shape' => 'SavingsPlanOperationList', ], 'filters' => [ 'shape' => 'SavingsPlanOfferingFiltersList', ], 'nextToken' => [ 'shape' => 'PaginationToken', ], 'maxResults' => [ 'shape' => 'PageSize', ], ], ], 'DescribeSavingsPlansOfferingsResponse' => [ 'type' => 'structure', 'members' => [ 'searchResults' => [ 'shape' => 'SavingsPlanOfferingsList', ], 'nextToken' => [ 'shape' => 'PaginationToken', ], ], ], 'DescribeSavingsPlansRequest' => [ 'type' => 'structure', 'members' => [ 'savingsPlanArns' => [ 'shape' => 'SavingsPlanArnList', ], 'savingsPlanIds' => [ 'shape' => 'SavingsPlanIdList', ], 'nextToken' => [ 'shape' => 'PaginationToken', ], 'maxResults' => [ 'shape' => 'MaxResults', ], 'states' => [ 'shape' => 'SavingsPlanStateList', ], 'filters' => [ 'shape' => 'SavingsPlanFilterList', ], ], ], 'DescribeSavingsPlansResponse' => [ 'type' => 'structure', 'members' => [ 'savingsPlans' => [ 'shape' => 'SavingsPlanList', ], 'nextToken' => [ 'shape' => 'PaginationToken', ], ], ], 'DurationsList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlansDuration', ], ], 'EC2InstanceFamily' => [ 'type' => 'string', ], 'FilterValuesList' => [ 'type' => 'list', 'member' => [ 'shape' => 'JsonSafeFilterValueString', ], ], 'InternalServerException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, ], 'JsonSafeFilterValueString' => [ 'type' => 'string', 'pattern' => '^[a-zA-Z0-9_ \\/.\\:\\-\\(\\)]+$', ], 'ListOfStrings' => [ 'type' => 'list', 'member' => [ 'shape' => 'String', ], ], 'ListTagsForResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', ], 'members' => [ 'resourceArn' => [ 'shape' => 'SavingsPlanArn', ], ], ], 'ListTagsForResourceResponse' => [ 'type' => 'structure', 'members' => [ 'tags' => [ 'shape' => 'TagMap', ], ], ], 'MaxResults' => [ 'type' => 'integer', 'max' => 1000, 'min' => 1, ], 'PageSize' => [ 'type' => 'integer', 'max' => 1000, 'min' => 0, ], 'PaginationToken' => [ 'type' => 'string', 'max' => 1024, 'pattern' => '^[A-Za-z0-9/=\\+]+$', ], 'ParentSavingsPlanOffering' => [ 'type' => 'structure', 'members' => [ 'offeringId' => [ 'shape' => 'UUID', ], 'paymentOption' => [ 'shape' => 'SavingsPlanPaymentOption', ], 'planType' => [ 'shape' => 'SavingsPlanType', ], 'durationSeconds' => [ 'shape' => 'SavingsPlansDuration', ], 'currency' => [ 'shape' => 'CurrencyCode', ], 'planDescription' => [ 'shape' => 'SavingsPlanDescription', ], ], ], 'Region' => [ 'type' => 'string', ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 404, ], 'exception' => true, ], 'SavingsPlan' => [ 'type' => 'structure', 'members' => [ 'offeringId' => [ 'shape' => 'SavingsPlanOfferingId', ], 'savingsPlanId' => [ 'shape' => 'SavingsPlanId', ], 'savingsPlanArn' => [ 'shape' => 'SavingsPlanArn', ], 'description' => [ 'shape' => 'String', ], 'start' => [ 'shape' => 'String', ], 'end' => [ 'shape' => 'String', ], 'state' => [ 'shape' => 'SavingsPlanState', ], 'region' => [ 'shape' => 'Region', ], 'ec2InstanceFamily' => [ 'shape' => 'EC2InstanceFamily', ], 'savingsPlanType' => [ 'shape' => 'SavingsPlanType', ], 'paymentOption' => [ 'shape' => 'SavingsPlanPaymentOption', ], 'productTypes' => [ 'shape' => 'SavingsPlanProductTypeList', ], 'currency' => [ 'shape' => 'CurrencyCode', ], 'commitment' => [ 'shape' => 'Amount', ], 'upfrontPaymentAmount' => [ 'shape' => 'Amount', ], 'recurringPaymentAmount' => [ 'shape' => 'Amount', ], 'termDurationInSeconds' => [ 'shape' => 'TermDurationInSeconds', ], 'tags' => [ 'shape' => 'TagMap', ], ], ], 'SavingsPlanArn' => [ 'type' => 'string', 'pattern' => 'arn:aws:[a-z]+:([a-z]{2}-[a-z]+-\\d{1}|):(\\d{12}):savingsplan\\/([0-9a-f]{8}-[0-9a-f]{4}-[1-5][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12})$', ], 'SavingsPlanArnList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlanArn', ], 'max' => 100, ], 'SavingsPlanDescription' => [ 'type' => 'string', 'pattern' => '^[a-zA-Z0-9_\\- ]+$', ], 'SavingsPlanDescriptionsList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlanDescription', ], ], 'SavingsPlanFilter' => [ 'type' => 'structure', 'members' => [ 'name' => [ 'shape' => 'SavingsPlansFilterName', ], 'values' => [ 'shape' => 'ListOfStrings', ], ], ], 'SavingsPlanFilterList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlanFilter', ], ], 'SavingsPlanId' => [ 'type' => 'string', ], 'SavingsPlanIdList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlanId', ], ], 'SavingsPlanList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlan', ], ], 'SavingsPlanOffering' => [ 'type' => 'structure', 'members' => [ 'offeringId' => [ 'shape' => 'UUID', ], 'productTypes' => [ 'shape' => 'SavingsPlanProductTypeList', ], 'planType' => [ 'shape' => 'SavingsPlanType', ], 'description' => [ 'shape' => 'SavingsPlanDescription', ], 'paymentOption' => [ 'shape' => 'SavingsPlanPaymentOption', ], 'durationSeconds' => [ 'shape' => 'SavingsPlansDuration', ], 'currency' => [ 'shape' => 'CurrencyCode', ], 'serviceCode' => [ 'shape' => 'SavingsPlanServiceCode', ], 'usageType' => [ 'shape' => 'SavingsPlanUsageType', ], 'operation' => [ 'shape' => 'SavingsPlanOperation', ], 'properties' => [ 'shape' => 'SavingsPlanOfferingPropertyList', ], ], ], 'SavingsPlanOfferingFilterAttribute' => [ 'type' => 'string', 'enum' => [ 'region', 'instanceFamily', ], ], 'SavingsPlanOfferingFilterElement' => [ 'type' => 'structure', 'members' => [ 'name' => [ 'shape' => 'SavingsPlanOfferingFilterAttribute', ], 'values' => [ 'shape' => 'FilterValuesList', ], ], ], 'SavingsPlanOfferingFiltersList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlanOfferingFilterElement', ], ], 'SavingsPlanOfferingId' => [ 'type' => 'string', ], 'SavingsPlanOfferingProperty' => [ 'type' => 'structure', 'members' => [ 'name' => [ 'shape' => 'SavingsPlanOfferingPropertyKey', ], 'value' => [ 'shape' => 'JsonSafeFilterValueString', ], ], ], 'SavingsPlanOfferingPropertyKey' => [ 'type' => 'string', 'enum' => [ 'region', 'instanceFamily', ], ], 'SavingsPlanOfferingPropertyList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlanOfferingProperty', ], ], 'SavingsPlanOfferingRate' => [ 'type' => 'structure', 'members' => [ 'savingsPlanOffering' => [ 'shape' => 'ParentSavingsPlanOffering', ], 'rate' => [ 'shape' => 'SavingsPlanRatePricePerUnit', ], 'unit' => [ 'shape' => 'SavingsPlanRateUnit', ], 'productType' => [ 'shape' => 'SavingsPlanProductType', ], 'serviceCode' => [ 'shape' => 'SavingsPlanRateServiceCode', ], 'usageType' => [ 'shape' => 'SavingsPlanRateUsageType', ], 'operation' => [ 'shape' => 'SavingsPlanRateOperation', ], 'properties' => [ 'shape' => 'SavingsPlanOfferingRatePropertyList', ], ], ], 'SavingsPlanOfferingRateFilterElement' => [ 'type' => 'structure', 'members' => [ 'name' => [ 'shape' => 'SavingsPlanRateFilterAttribute', ], 'values' => [ 'shape' => 'FilterValuesList', ], ], ], 'SavingsPlanOfferingRateFiltersList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlanOfferingRateFilterElement', ], ], 'SavingsPlanOfferingRateProperty' => [ 'type' => 'structure', 'members' => [ 'name' => [ 'shape' => 'JsonSafeFilterValueString', ], 'value' => [ 'shape' => 'JsonSafeFilterValueString', ], ], ], 'SavingsPlanOfferingRatePropertyList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlanOfferingRateProperty', ], ], 'SavingsPlanOfferingRatesList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlanOfferingRate', ], ], 'SavingsPlanOfferingsList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlanOffering', ], ], 'SavingsPlanOperation' => [ 'type' => 'string', 'max' => 255, 'pattern' => '^[a-zA-Z0-9_ \\/.:-]*$', ], 'SavingsPlanOperationList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlanOperation', ], ], 'SavingsPlanPaymentOption' => [ 'type' => 'string', 'enum' => [ 'All Upfront', 'Partial Upfront', 'No Upfront', ], ], 'SavingsPlanPaymentOptionList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlanPaymentOption', ], ], 'SavingsPlanProductType' => [ 'type' => 'string', 'enum' => [ 'EC2', 'Fargate', 'Lambda', 'SageMaker', ], ], 'SavingsPlanProductTypeList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlanProductType', ], ], 'SavingsPlanRate' => [ 'type' => 'structure', 'members' => [ 'rate' => [ 'shape' => 'Amount', ], 'currency' => [ 'shape' => 'CurrencyCode', ], 'unit' => [ 'shape' => 'SavingsPlanRateUnit', ], 'productType' => [ 'shape' => 'SavingsPlanProductType', ], 'serviceCode' => [ 'shape' => 'SavingsPlanRateServiceCode', ], 'usageType' => [ 'shape' => 'SavingsPlanRateUsageType', ], 'operation' => [ 'shape' => 'SavingsPlanRateOperation', ], 'properties' => [ 'shape' => 'SavingsPlanRatePropertyList', ], ], ], 'SavingsPlanRateFilter' => [ 'type' => 'structure', 'members' => [ 'name' => [ 'shape' => 'SavingsPlanRateFilterName', ], 'values' => [ 'shape' => 'ListOfStrings', ], ], ], 'SavingsPlanRateFilterAttribute' => [ 'type' => 'string', 'enum' => [ 'region', 'instanceFamily', 'instanceType', 'productDescription', 'tenancy', 'productId', ], ], 'SavingsPlanRateFilterList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlanRateFilter', ], ], 'SavingsPlanRateFilterName' => [ 'type' => 'string', 'enum' => [ 'region', 'instanceType', 'productDescription', 'tenancy', 'productType', 'serviceCode', 'usageType', 'operation', ], ], 'SavingsPlanRateList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlanRate', ], ], 'SavingsPlanRateOperation' => [ 'type' => 'string', 'max' => 255, 'pattern' => '^[a-zA-Z0-9_ \\/.:-]*$', ], 'SavingsPlanRateOperationList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlanRateOperation', ], ], 'SavingsPlanRatePricePerUnit' => [ 'type' => 'string', ], 'SavingsPlanRateProperty' => [ 'type' => 'structure', 'members' => [ 'name' => [ 'shape' => 'SavingsPlanRatePropertyKey', ], 'value' => [ 'shape' => 'JsonSafeFilterValueString', ], ], ], 'SavingsPlanRatePropertyKey' => [ 'type' => 'string', 'enum' => [ 'region', 'instanceType', 'instanceFamily', 'productDescription', 'tenancy', ], ], 'SavingsPlanRatePropertyList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlanRateProperty', ], ], 'SavingsPlanRateServiceCode' => [ 'type' => 'string', 'enum' => [ 'AmazonEC2', 'AmazonECS', 'AmazonEKS', 'AWSLambda', 'AmazonSageMaker', ], ], 'SavingsPlanRateServiceCodeList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlanRateServiceCode', ], ], 'SavingsPlanRateUnit' => [ 'type' => 'string', 'enum' => [ 'Hrs', 'Lambda-GB-Second', 'Request', ], ], 'SavingsPlanRateUsageType' => [ 'type' => 'string', 'max' => 255, 'pattern' => '^[a-zA-Z0-9_ \\/.:-]+$', ], 'SavingsPlanRateUsageTypeList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlanRateUsageType', ], ], 'SavingsPlanServiceCode' => [ 'type' => 'string', 'max' => 255, 'pattern' => '^[a-zA-Z]+$', ], 'SavingsPlanServiceCodeList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlanServiceCode', ], ], 'SavingsPlanState' => [ 'type' => 'string', 'enum' => [ 'payment-pending', 'payment-failed', 'active', 'retired', 'queued', 'queued-deleted', ], ], 'SavingsPlanStateList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlanState', ], ], 'SavingsPlanType' => [ 'type' => 'string', 'enum' => [ 'Compute', 'EC2Instance', 'SageMaker', ], ], 'SavingsPlanTypeList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlanType', ], ], 'SavingsPlanUsageType' => [ 'type' => 'string', 'max' => 255, 'pattern' => '^[a-zA-Z0-9_ \\/.:-]+$', ], 'SavingsPlanUsageTypeList' => [ 'type' => 'list', 'member' => [ 'shape' => 'SavingsPlanUsageType', ], ], 'SavingsPlansDuration' => [ 'type' => 'long', 'min' => 0, ], 'SavingsPlansFilterName' => [ 'type' => 'string', 'enum' => [ 'region', 'ec2-instance-family', 'commitment', 'upfront', 'term', 'savings-plan-type', 'payment-option', 'start', 'end', ], ], 'ServiceQuotaExceededException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 402, ], 'exception' => true, ], 'String' => [ 'type' => 'string', ], 'TagKey' => [ 'type' => 'string', ], 'TagKeyList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagKey', ], ], 'TagMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'TagKey', ], 'value' => [ 'shape' => 'TagValue', ], ], 'TagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'tags', ], 'members' => [ 'resourceArn' => [ 'shape' => 'SavingsPlanArn', ], 'tags' => [ 'shape' => 'TagMap', ], ], ], 'TagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'TagValue' => [ 'type' => 'string', ], 'TermDurationInSeconds' => [ 'type' => 'long', ], 'UUID' => [ 'type' => 'string', 'pattern' => '^(([0-9a-f]+)(-?))+$', ], 'UUIDs' => [ 'type' => 'list', 'member' => [ 'shape' => 'UUID', ], ], 'UntagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'tagKeys', ], 'members' => [ 'resourceArn' => [ 'shape' => 'SavingsPlanArn', ], 'tagKeys' => [ 'shape' => 'TagKeyList', ], ], ], 'UntagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'ValidationException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], ],];
