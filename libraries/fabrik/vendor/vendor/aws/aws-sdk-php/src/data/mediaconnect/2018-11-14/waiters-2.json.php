<?php
// This file was auto-generated from sdk-root/src/data/mediaconnect/2018-11-14/waiters-2.json
return [ 'version' => 2, 'waiters' => [ 'FlowActive' => [ 'description' => 'Wait until a flow is active', 'operation' => 'DescribeFlow', 'delay' => 3, 'maxAttempts' => 40, 'acceptors' => [ [ 'state' => 'success', 'matcher' => 'path', 'argument' => 'Flow.Status', 'expected' => 'ACTIVE', ], [ 'state' => 'retry', 'matcher' => 'path', 'argument' => 'Flow.Status', 'expected' => 'STARTING', ], [ 'state' => 'retry', 'matcher' => 'path', 'argument' => 'Flow.Status', 'expected' => 'UPDATING', ], [ 'state' => 'retry', 'matcher' => 'status', 'expected' => 500, ], [ 'state' => 'retry', 'matcher' => 'status', 'expected' => 503, ], [ 'state' => 'failure', 'matcher' => 'path', 'argument' => 'Flow.Status', 'expected' => 'ERROR', ], ], ], 'FlowStandby' => [ 'description' => 'Wait until a flow is in standby mode', 'operation' => 'DescribeFlow', 'delay' => 3, 'maxAttempts' => 40, 'acceptors' => [ [ 'state' => 'success', 'matcher' => 'path', 'argument' => 'Flow.Status', 'expected' => 'STANDBY', ], [ 'state' => 'retry', 'matcher' => 'path', 'argument' => 'Flow.Status', 'expected' => 'STOPPING', ], [ 'state' => 'retry', 'matcher' => 'status', 'expected' => 500, ], [ 'state' => 'retry', 'matcher' => 'status', 'expected' => 503, ], [ 'state' => 'failure', 'matcher' => 'path', 'argument' => 'Flow.Status', 'expected' => 'ERROR', ], ], ], 'FlowDeleted' => [ 'description' => 'Wait until a flow is deleted', 'operation' => 'DescribeFlow', 'delay' => 3, 'maxAttempts' => 40, 'acceptors' => [ [ 'state' => 'success', 'matcher' => 'status', 'expected' => 404, ], [ 'state' => 'retry', 'matcher' => 'path', 'argument' => 'Flow.Status', 'expected' => 'DELETING', ], [ 'state' => 'retry', 'matcher' => 'status', 'expected' => 500, ], [ 'state' => 'retry', 'matcher' => 'status', 'expected' => 503, ], [ 'state' => 'failure', 'matcher' => 'path', 'argument' => 'Flow.Status', 'expected' => 'ERROR', ], ], ], ],];
