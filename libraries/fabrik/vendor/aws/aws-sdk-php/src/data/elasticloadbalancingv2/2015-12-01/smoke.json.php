<?php
// This file was auto-generated from sdk-root/src/data/elasticloadbalancingv2/2015-12-01/smoke.json
return [ 'version' => 1, 'defaultRegion' => 'us-west-2', 'testCases' => [ [ 'operationName' => 'DescribeLoadBalancers', 'input' => [], 'errorExpectedFromService' => false, ], [ 'operationName' => 'DescribeLoadBalancers', 'input' => [ 'LoadBalancerArns' => [ 'fake_load_balancer', ], ], 'errorExpectedFromService' => true, ], ],];
