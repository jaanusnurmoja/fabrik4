<?php
// This file was auto-generated from sdk-root/src/data/support/2013-04-15/endpoint-rule-set-1.json
return [ 'version' => '1.0', 'parameters' => [ 'Region' => [ 'builtIn' => 'AWS::Region', 'required' => false, 'documentation' => 'The AWS region used to dispatch the request.', 'type' => 'String', ], 'UseDualStack' => [ 'builtIn' => 'AWS::UseDualStack', 'required' => true, 'default' => false, 'documentation' => 'When true, use the dual-stack endpoint. If the configured endpoint does not support dual-stack, dispatching the request MAY return an error.', 'type' => 'Boolean', ], 'UseFIPS' => [ 'builtIn' => 'AWS::UseFIPS', 'required' => true, 'default' => false, 'documentation' => 'When true, send this request to the FIPS-compliant regional endpoint. If the configured endpoint does not have a FIPS compliant endpoint, dispatching the request will return an error.', 'type' => 'Boolean', ], 'Endpoint' => [ 'builtIn' => 'SDK::Endpoint', 'required' => false, 'documentation' => 'Override the endpoint used to send this request', 'type' => 'String', ], ], 'rules' => [ [ 'conditions' => [ [ 'fn' => 'isSet', 'argv' => [ [ 'ref' => 'Endpoint', ], ], ], ], 'type' => 'tree', 'rules' => [ [ 'conditions' => [ [ 'fn' => 'booleanEquals', 'argv' => [ [ 'ref' => 'UseFIPS', ], true, ], ], ], 'error' => 'Invalid Configuration: FIPS and custom endpoint are not supported', 'type' => 'error', ], [ 'conditions' => [ [ 'fn' => 'booleanEquals', 'argv' => [ [ 'ref' => 'UseDualStack', ], true, ], ], ], 'error' => 'Invalid Configuration: Dualstack and custom endpoint are not supported', 'type' => 'error', ], [ 'conditions' => [], 'endpoint' => [ 'url' => [ 'ref' => 'Endpoint', ], 'properties' => [], 'headers' => [], ], 'type' => 'endpoint', ], ], ], [ 'conditions' => [ [ 'fn' => 'isSet', 'argv' => [ [ 'ref' => 'Region', ], ], ], ], 'type' => 'tree', 'rules' => [ [ 'conditions' => [ [ 'fn' => 'aws.partition', 'argv' => [ [ 'ref' => 'Region', ], ], 'assign' => 'PartitionResult', ], ], 'type' => 'tree', 'rules' => [ [ 'conditions' => [ [ 'fn' => 'stringEquals', 'argv' => [ [ 'fn' => 'getAttr', 'argv' => [ [ 'ref' => 'PartitionResult', ], 'name', ], ], 'aws', ], ], [ 'fn' => 'booleanEquals', 'argv' => [ [ 'ref' => 'UseFIPS', ], false, ], ], [ 'fn' => 'booleanEquals', 'argv' => [ [ 'ref' => 'UseDualStack', ], false, ], ], ], 'endpoint' => [ 'url' => 'https://support.us-east-1.amazonaws.com', 'properties' => [ 'authSchemes' => [ [ 'name' => 'sigv4', 'signingName' => 'support', 'signingRegion' => 'us-east-1', ], ], ], 'headers' => [], ], 'type' => 'endpoint', ], [ 'conditions' => [ [ 'fn' => 'stringEquals', 'argv' => [ [ 'fn' => 'getAttr', 'argv' => [ [ 'ref' => 'PartitionResult', ], 'name', ], ], 'aws-cn', ], ], [ 'fn' => 'booleanEquals', 'argv' => [ [ 'ref' => 'UseFIPS', ], false, ], ], [ 'fn' => 'booleanEquals', 'argv' => [ [ 'ref' => 'UseDualStack', ], false, ], ], ], 'endpoint' => [ 'url' => 'https://support.cn-north-1.amazonaws.com.cn', 'properties' => [ 'authSchemes' => [ [ 'name' => 'sigv4', 'signingName' => 'support', 'signingRegion' => 'cn-north-1', ], ], ], 'headers' => [], ], 'type' => 'endpoint', ], [ 'conditions' => [ [ 'fn' => 'stringEquals', 'argv' => [ [ 'fn' => 'getAttr', 'argv' => [ [ 'ref' => 'PartitionResult', ], 'name', ], ], 'aws-us-gov', ], ], [ 'fn' => 'booleanEquals', 'argv' => [ [ 'ref' => 'UseFIPS', ], false, ], ], [ 'fn' => 'booleanEquals', 'argv' => [ [ 'ref' => 'UseDualStack', ], false, ], ], ], 'endpoint' => [ 'url' => 'https://support.us-gov-west-1.amazonaws.com', 'properties' => [ 'authSchemes' => [ [ 'name' => 'sigv4', 'signingName' => 'support', 'signingRegion' => 'us-gov-west-1', ], ], ], 'headers' => [], ], 'type' => 'endpoint', ], [ 'conditions' => [ [ 'fn' => 'stringEquals', 'argv' => [ [ 'fn' => 'getAttr', 'argv' => [ [ 'ref' => 'PartitionResult', ], 'name', ], ], 'aws-iso', ], ], [ 'fn' => 'booleanEquals', 'argv' => [ [ 'ref' => 'UseFIPS', ], false, ], ], [ 'fn' => 'booleanEquals', 'argv' => [ [ 'ref' => 'UseDualStack', ], false, ], ], ], 'endpoint' => [ 'url' => 'https://support.us-iso-east-1.c2s.ic.gov', 'properties' => [ 'authSchemes' => [ [ 'name' => 'sigv4', 'signingName' => 'support', 'signingRegion' => 'us-iso-east-1', ], ], ], 'headers' => [], ], 'type' => 'endpoint', ], [ 'conditions' => [ [ 'fn' => 'stringEquals', 'argv' => [ [ 'fn' => 'getAttr', 'argv' => [ [ 'ref' => 'PartitionResult', ], 'name', ], ], 'aws-iso-b', ], ], [ 'fn' => 'booleanEquals', 'argv' => [ [ 'ref' => 'UseFIPS', ], false, ], ], [ 'fn' => 'booleanEquals', 'argv' => [ [ 'ref' => 'UseDualStack', ], false, ], ], ], 'endpoint' => [ 'url' => 'https://support.us-isob-east-1.sc2s.sgov.gov', 'properties' => [ 'authSchemes' => [ [ 'name' => 'sigv4', 'signingName' => 'support', 'signingRegion' => 'us-isob-east-1', ], ], ], 'headers' => [], ], 'type' => 'endpoint', ], [ 'conditions' => [ [ 'fn' => 'booleanEquals', 'argv' => [ [ 'ref' => 'UseFIPS', ], true, ], ], [ 'fn' => 'booleanEquals', 'argv' => [ [ 'ref' => 'UseDualStack', ], true, ], ], ], 'type' => 'tree', 'rules' => [ [ 'conditions' => [ [ 'fn' => 'booleanEquals', 'argv' => [ true, [ 'fn' => 'getAttr', 'argv' => [ [ 'ref' => 'PartitionResult', ], 'supportsFIPS', ], ], ], ], [ 'fn' => 'booleanEquals', 'argv' => [ true, [ 'fn' => 'getAttr', 'argv' => [ [ 'ref' => 'PartitionResult', ], 'supportsDualStack', ], ], ], ], ], 'type' => 'tree', 'rules' => [ [ 'conditions' => [], 'endpoint' => [ 'url' => 'https://support-fips.{Region}.{PartitionResult#dualStackDnsSuffix}', 'properties' => [], 'headers' => [], ], 'type' => 'endpoint', ], ], ], [ 'conditions' => [], 'error' => 'FIPS and DualStack are enabled, but this partition does not support one or both', 'type' => 'error', ], ], ], [ 'conditions' => [ [ 'fn' => 'booleanEquals', 'argv' => [ [ 'ref' => 'UseFIPS', ], true, ], ], ], 'type' => 'tree', 'rules' => [ [ 'conditions' => [ [ 'fn' => 'booleanEquals', 'argv' => [ true, [ 'fn' => 'getAttr', 'argv' => [ [ 'ref' => 'PartitionResult', ], 'supportsFIPS', ], ], ], ], ], 'type' => 'tree', 'rules' => [ [ 'conditions' => [], 'endpoint' => [ 'url' => 'https://support-fips.{Region}.{PartitionResult#dnsSuffix}', 'properties' => [], 'headers' => [], ], 'type' => 'endpoint', ], ], ], [ 'conditions' => [], 'error' => 'FIPS is enabled but this partition does not support FIPS', 'type' => 'error', ], ], ], [ 'conditions' => [ [ 'fn' => 'booleanEquals', 'argv' => [ [ 'ref' => 'UseDualStack', ], true, ], ], ], 'type' => 'tree', 'rules' => [ [ 'conditions' => [ [ 'fn' => 'booleanEquals', 'argv' => [ true, [ 'fn' => 'getAttr', 'argv' => [ [ 'ref' => 'PartitionResult', ], 'supportsDualStack', ], ], ], ], ], 'type' => 'tree', 'rules' => [ [ 'conditions' => [], 'endpoint' => [ 'url' => 'https://support.{Region}.{PartitionResult#dualStackDnsSuffix}', 'properties' => [], 'headers' => [], ], 'type' => 'endpoint', ], ], ], [ 'conditions' => [], 'error' => 'DualStack is enabled but this partition does not support DualStack', 'type' => 'error', ], ], ], [ 'conditions' => [], 'endpoint' => [ 'url' => 'https://support.{Region}.{PartitionResult#dnsSuffix}', 'properties' => [], 'headers' => [], ], 'type' => 'endpoint', ], ], ], ], ], [ 'conditions' => [], 'error' => 'Invalid Configuration: Missing Region', 'type' => 'error', ], ],];
