<?php
// This file was auto-generated from sdk-root/src/data/backup-gateway/2021-01-01/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2021-01-01', 'endpointPrefix' => 'backup-gateway', 'jsonVersion' => '1.0', 'protocol' => 'json', 'serviceFullName' => 'AWS Backup Gateway', 'serviceId' => 'Backup Gateway', 'signatureVersion' => 'v4', 'signingName' => 'backup-gateway', 'targetPrefix' => 'BackupOnPremises_v20210101', 'uid' => 'backup-gateway-2021-01-01', ], 'operations' => [ 'AssociateGatewayToServer' => [ 'name' => 'AssociateGatewayToServer', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AssociateGatewayToServerInput', ], 'output' => [ 'shape' => 'AssociateGatewayToServerOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'CreateGateway' => [ 'name' => 'CreateGateway', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateGatewayInput', ], 'output' => [ 'shape' => 'CreateGatewayOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'DeleteGateway' => [ 'name' => 'DeleteGateway', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteGatewayInput', ], 'output' => [ 'shape' => 'DeleteGatewayOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], 'idempotent' => true, ], 'DeleteHypervisor' => [ 'name' => 'DeleteHypervisor', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteHypervisorInput', ], 'output' => [ 'shape' => 'DeleteHypervisorOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], 'idempotent' => true, ], 'DisassociateGatewayFromServer' => [ 'name' => 'DisassociateGatewayFromServer', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DisassociateGatewayFromServerInput', ], 'output' => [ 'shape' => 'DisassociateGatewayFromServerOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'GetBandwidthRateLimitSchedule' => [ 'name' => 'GetBandwidthRateLimitSchedule', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetBandwidthRateLimitScheduleInput', ], 'output' => [ 'shape' => 'GetBandwidthRateLimitScheduleOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'GetGateway' => [ 'name' => 'GetGateway', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetGatewayInput', ], 'output' => [ 'shape' => 'GetGatewayOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'GetHypervisor' => [ 'name' => 'GetHypervisor', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetHypervisorInput', ], 'output' => [ 'shape' => 'GetHypervisorOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'GetHypervisorPropertyMappings' => [ 'name' => 'GetHypervisorPropertyMappings', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetHypervisorPropertyMappingsInput', ], 'output' => [ 'shape' => 'GetHypervisorPropertyMappingsOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'GetVirtualMachine' => [ 'name' => 'GetVirtualMachine', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetVirtualMachineInput', ], 'output' => [ 'shape' => 'GetVirtualMachineOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'ImportHypervisorConfiguration' => [ 'name' => 'ImportHypervisorConfiguration', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ImportHypervisorConfigurationInput', ], 'output' => [ 'shape' => 'ImportHypervisorConfigurationOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'ListGateways' => [ 'name' => 'ListGateways', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListGatewaysInput', ], 'output' => [ 'shape' => 'ListGatewaysOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'ListHypervisors' => [ 'name' => 'ListHypervisors', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListHypervisorsInput', ], 'output' => [ 'shape' => 'ListHypervisorsOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'ListTagsForResource' => [ 'name' => 'ListTagsForResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListTagsForResourceInput', ], 'output' => [ 'shape' => 'ListTagsForResourceOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'ListVirtualMachines' => [ 'name' => 'ListVirtualMachines', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListVirtualMachinesInput', ], 'output' => [ 'shape' => 'ListVirtualMachinesOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'PutBandwidthRateLimitSchedule' => [ 'name' => 'PutBandwidthRateLimitSchedule', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'PutBandwidthRateLimitScheduleInput', ], 'output' => [ 'shape' => 'PutBandwidthRateLimitScheduleOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], 'idempotent' => true, ], 'PutHypervisorPropertyMappings' => [ 'name' => 'PutHypervisorPropertyMappings', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'PutHypervisorPropertyMappingsInput', ], 'output' => [ 'shape' => 'PutHypervisorPropertyMappingsOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], 'idempotent' => true, ], 'PutMaintenanceStartTime' => [ 'name' => 'PutMaintenanceStartTime', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'PutMaintenanceStartTimeInput', ], 'output' => [ 'shape' => 'PutMaintenanceStartTimeOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'StartVirtualMachinesMetadataSync' => [ 'name' => 'StartVirtualMachinesMetadataSync', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'StartVirtualMachinesMetadataSyncInput', ], 'output' => [ 'shape' => 'StartVirtualMachinesMetadataSyncOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'TagResource' => [ 'name' => 'TagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'TagResourceInput', ], 'output' => [ 'shape' => 'TagResourceOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'TestHypervisorConfiguration' => [ 'name' => 'TestHypervisorConfiguration', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'TestHypervisorConfigurationInput', ], 'output' => [ 'shape' => 'TestHypervisorConfigurationOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'UntagResource' => [ 'name' => 'UntagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UntagResourceInput', ], 'output' => [ 'shape' => 'UntagResourceOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'UpdateGatewayInformation' => [ 'name' => 'UpdateGatewayInformation', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateGatewayInformationInput', ], 'output' => [ 'shape' => 'UpdateGatewayInformationOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'UpdateGatewaySoftwareNow' => [ 'name' => 'UpdateGatewaySoftwareNow', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateGatewaySoftwareNowInput', ], 'output' => [ 'shape' => 'UpdateGatewaySoftwareNowOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'UpdateHypervisor' => [ 'name' => 'UpdateHypervisor', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateHypervisorInput', ], 'output' => [ 'shape' => 'UpdateHypervisorOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ThrottlingException', ], ], ], ], 'shapes' => [ 'AccessDeniedException' => [ 'type' => 'structure', 'required' => [ 'ErrorCode', ], 'members' => [ 'ErrorCode' => [ 'shape' => 'string', ], 'Message' => [ 'shape' => 'string', ], ], 'exception' => true, ], 'ActivationKey' => [ 'type' => 'string', 'max' => 50, 'min' => 1, 'pattern' => '^[0-9a-zA-Z\\-]+$', ], 'AssociateGatewayToServerInput' => [ 'type' => 'structure', 'required' => [ 'GatewayArn', 'ServerArn', ], 'members' => [ 'GatewayArn' => [ 'shape' => 'GatewayArn', ], 'ServerArn' => [ 'shape' => 'ServerArn', ], ], ], 'AssociateGatewayToServerOutput' => [ 'type' => 'structure', 'members' => [ 'GatewayArn' => [ 'shape' => 'GatewayArn', ], ], ], 'AverageUploadRateLimit' => [ 'type' => 'long', 'box' => true, 'max' => 8000000000000, 'min' => 51200, ], 'BandwidthRateLimitInterval' => [ 'type' => 'structure', 'required' => [ 'DaysOfWeek', 'EndHourOfDay', 'EndMinuteOfHour', 'StartHourOfDay', 'StartMinuteOfHour', ], 'members' => [ 'AverageUploadRateLimitInBitsPerSec' => [ 'shape' => 'AverageUploadRateLimit', ], 'DaysOfWeek' => [ 'shape' => 'DaysOfWeek', ], 'EndHourOfDay' => [ 'shape' => 'HourOfDay', ], 'EndMinuteOfHour' => [ 'shape' => 'MinuteOfHour', ], 'StartHourOfDay' => [ 'shape' => 'HourOfDay', ], 'StartMinuteOfHour' => [ 'shape' => 'MinuteOfHour', ], ], ], 'BandwidthRateLimitIntervals' => [ 'type' => 'list', 'member' => [ 'shape' => 'BandwidthRateLimitInterval', ], 'max' => 20, 'min' => 0, ], 'ConflictException' => [ 'type' => 'structure', 'required' => [ 'ErrorCode', ], 'members' => [ 'ErrorCode' => [ 'shape' => 'string', ], 'Message' => [ 'shape' => 'string', ], ], 'exception' => true, ], 'CreateGatewayInput' => [ 'type' => 'structure', 'required' => [ 'ActivationKey', 'GatewayDisplayName', 'GatewayType', ], 'members' => [ 'ActivationKey' => [ 'shape' => 'ActivationKey', ], 'GatewayDisplayName' => [ 'shape' => 'Name', ], 'GatewayType' => [ 'shape' => 'GatewayType', ], 'Tags' => [ 'shape' => 'Tags', ], ], ], 'CreateGatewayOutput' => [ 'type' => 'structure', 'members' => [ 'GatewayArn' => [ 'shape' => 'GatewayArn', ], ], ], 'DayOfMonth' => [ 'type' => 'integer', 'box' => true, 'max' => 31, 'min' => 1, ], 'DayOfWeek' => [ 'type' => 'integer', 'box' => true, 'max' => 6, 'min' => 0, ], 'DaysOfWeek' => [ 'type' => 'list', 'member' => [ 'shape' => 'DayOfWeek', ], 'max' => 7, 'min' => 1, ], 'DeleteGatewayInput' => [ 'type' => 'structure', 'required' => [ 'GatewayArn', ], 'members' => [ 'GatewayArn' => [ 'shape' => 'GatewayArn', ], ], ], 'DeleteGatewayOutput' => [ 'type' => 'structure', 'members' => [ 'GatewayArn' => [ 'shape' => 'GatewayArn', ], ], ], 'DeleteHypervisorInput' => [ 'type' => 'structure', 'required' => [ 'HypervisorArn', ], 'members' => [ 'HypervisorArn' => [ 'shape' => 'ServerArn', ], ], ], 'DeleteHypervisorOutput' => [ 'type' => 'structure', 'members' => [ 'HypervisorArn' => [ 'shape' => 'ServerArn', ], ], ], 'DisassociateGatewayFromServerInput' => [ 'type' => 'structure', 'required' => [ 'GatewayArn', ], 'members' => [ 'GatewayArn' => [ 'shape' => 'GatewayArn', ], ], ], 'DisassociateGatewayFromServerOutput' => [ 'type' => 'structure', 'members' => [ 'GatewayArn' => [ 'shape' => 'GatewayArn', ], ], ], 'Gateway' => [ 'type' => 'structure', 'members' => [ 'GatewayArn' => [ 'shape' => 'GatewayArn', ], 'GatewayDisplayName' => [ 'shape' => 'Name', ], 'GatewayType' => [ 'shape' => 'GatewayType', ], 'HypervisorId' => [ 'shape' => 'HypervisorId', ], 'LastSeenTime' => [ 'shape' => 'Time', ], ], ], 'GatewayArn' => [ 'type' => 'string', 'max' => 500, 'min' => 50, 'pattern' => '^arn:(aws|aws-cn|aws-us-gov):backup-gateway(:[a-zA-Z-0-9]+){3}\\/[a-zA-Z-0-9]+$', ], 'GatewayDetails' => [ 'type' => 'structure', 'members' => [ 'GatewayArn' => [ 'shape' => 'GatewayArn', ], 'GatewayDisplayName' => [ 'shape' => 'Name', ], 'GatewayType' => [ 'shape' => 'GatewayType', ], 'HypervisorId' => [ 'shape' => 'HypervisorId', ], 'LastSeenTime' => [ 'shape' => 'Time', ], 'MaintenanceStartTime' => [ 'shape' => 'MaintenanceStartTime', ], 'NextUpdateAvailabilityTime' => [ 'shape' => 'Time', ], 'VpcEndpoint' => [ 'shape' => 'VpcEndpoint', ], ], ], 'GatewayType' => [ 'type' => 'string', 'enum' => [ 'BACKUP_VM', ], ], 'Gateways' => [ 'type' => 'list', 'member' => [ 'shape' => 'Gateway', ], ], 'GetBandwidthRateLimitScheduleInput' => [ 'type' => 'structure', 'required' => [ 'GatewayArn', ], 'members' => [ 'GatewayArn' => [ 'shape' => 'GatewayArn', ], ], ], 'GetBandwidthRateLimitScheduleOutput' => [ 'type' => 'structure', 'members' => [ 'BandwidthRateLimitIntervals' => [ 'shape' => 'BandwidthRateLimitIntervals', ], 'GatewayArn' => [ 'shape' => 'GatewayArn', ], ], ], 'GetGatewayInput' => [ 'type' => 'structure', 'required' => [ 'GatewayArn', ], 'members' => [ 'GatewayArn' => [ 'shape' => 'GatewayArn', ], ], ], 'GetGatewayOutput' => [ 'type' => 'structure', 'members' => [ 'Gateway' => [ 'shape' => 'GatewayDetails', ], ], ], 'GetHypervisorInput' => [ 'type' => 'structure', 'required' => [ 'HypervisorArn', ], 'members' => [ 'HypervisorArn' => [ 'shape' => 'ServerArn', ], ], ], 'GetHypervisorOutput' => [ 'type' => 'structure', 'members' => [ 'Hypervisor' => [ 'shape' => 'HypervisorDetails', ], ], ], 'GetHypervisorPropertyMappingsInput' => [ 'type' => 'structure', 'required' => [ 'HypervisorArn', ], 'members' => [ 'HypervisorArn' => [ 'shape' => 'ServerArn', ], ], ], 'GetHypervisorPropertyMappingsOutput' => [ 'type' => 'structure', 'members' => [ 'HypervisorArn' => [ 'shape' => 'ServerArn', ], 'IamRoleArn' => [ 'shape' => 'IamRoleArn', ], 'VmwareToAwsTagMappings' => [ 'shape' => 'VmwareToAwsTagMappings', ], ], ], 'GetVirtualMachineInput' => [ 'type' => 'structure', 'required' => [ 'ResourceArn', ], 'members' => [ 'ResourceArn' => [ 'shape' => 'ResourceArn', ], ], ], 'GetVirtualMachineOutput' => [ 'type' => 'structure', 'members' => [ 'VirtualMachine' => [ 'shape' => 'VirtualMachineDetails', ], ], ], 'Host' => [ 'type' => 'string', 'max' => 128, 'min' => 3, 'pattern' => '^.+$', ], 'HourOfDay' => [ 'type' => 'integer', 'box' => true, 'max' => 23, 'min' => 0, ], 'Hypervisor' => [ 'type' => 'structure', 'members' => [ 'Host' => [ 'shape' => 'Host', ], 'HypervisorArn' => [ 'shape' => 'ServerArn', ], 'KmsKeyArn' => [ 'shape' => 'KmsKeyArn', ], 'Name' => [ 'shape' => 'Name', ], 'State' => [ 'shape' => 'HypervisorState', ], ], ], 'HypervisorDetails' => [ 'type' => 'structure', 'members' => [ 'Host' => [ 'shape' => 'Host', ], 'HypervisorArn' => [ 'shape' => 'ServerArn', ], 'KmsKeyArn' => [ 'shape' => 'KmsKeyArn', ], 'LastSuccessfulMetadataSyncTime' => [ 'shape' => 'Time', ], 'LatestMetadataSyncStatus' => [ 'shape' => 'SyncMetadataStatus', ], 'LatestMetadataSyncStatusMessage' => [ 'shape' => 'string', ], 'LogGroupArn' => [ 'shape' => 'LogGroupArn', ], 'Name' => [ 'shape' => 'Name', ], 'State' => [ 'shape' => 'HypervisorState', ], ], ], 'HypervisorId' => [ 'type' => 'string', 'max' => 100, 'min' => 1, ], 'HypervisorState' => [ 'type' => 'string', 'enum' => [ 'PENDING', 'ONLINE', 'OFFLINE', 'ERROR', ], ], 'Hypervisors' => [ 'type' => 'list', 'member' => [ 'shape' => 'Hypervisor', ], ], 'IamRoleArn' => [ 'type' => 'string', 'max' => 2048, 'min' => 20, 'pattern' => '^arn:(aws|aws-cn|aws-us-gov):iam::([0-9]+):role/(\\S+)$', ], 'ImportHypervisorConfigurationInput' => [ 'type' => 'structure', 'required' => [ 'Host', 'Name', ], 'members' => [ 'Host' => [ 'shape' => 'Host', ], 'KmsKeyArn' => [ 'shape' => 'KmsKeyArn', ], 'Name' => [ 'shape' => 'Name', ], 'Password' => [ 'shape' => 'Password', ], 'Tags' => [ 'shape' => 'Tags', ], 'Username' => [ 'shape' => 'Username', ], ], ], 'ImportHypervisorConfigurationOutput' => [ 'type' => 'structure', 'members' => [ 'HypervisorArn' => [ 'shape' => 'ServerArn', ], ], ], 'InternalServerException' => [ 'type' => 'structure', 'members' => [ 'ErrorCode' => [ 'shape' => 'string', ], 'Message' => [ 'shape' => 'string', ], ], 'exception' => true, 'fault' => true, ], 'KmsKeyArn' => [ 'type' => 'string', 'max' => 500, 'min' => 50, 'pattern' => '^(^arn:(aws|aws-cn|aws-us-gov):kms:([a-zA-Z0-9-]+):([0-9]+):(key|alias)/(\\S+)$)|(^alias/(\\S+)$)$', ], 'ListGatewaysInput' => [ 'type' => 'structure', 'members' => [ 'MaxResults' => [ 'shape' => 'MaxResults', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListGatewaysOutput' => [ 'type' => 'structure', 'members' => [ 'Gateways' => [ 'shape' => 'Gateways', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListHypervisorsInput' => [ 'type' => 'structure', 'members' => [ 'MaxResults' => [ 'shape' => 'MaxResults', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListHypervisorsOutput' => [ 'type' => 'structure', 'members' => [ 'Hypervisors' => [ 'shape' => 'Hypervisors', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListTagsForResourceInput' => [ 'type' => 'structure', 'required' => [ 'ResourceArn', ], 'members' => [ 'ResourceArn' => [ 'shape' => 'ResourceArn', ], ], ], 'ListTagsForResourceOutput' => [ 'type' => 'structure', 'members' => [ 'ResourceArn' => [ 'shape' => 'ResourceArn', ], 'Tags' => [ 'shape' => 'Tags', ], ], ], 'ListVirtualMachinesInput' => [ 'type' => 'structure', 'members' => [ 'HypervisorArn' => [ 'shape' => 'ServerArn', ], 'MaxResults' => [ 'shape' => 'MaxResults', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListVirtualMachinesOutput' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'NextToken', ], 'VirtualMachines' => [ 'shape' => 'VirtualMachines', ], ], ], 'LogGroupArn' => [ 'type' => 'string', 'max' => 2048, 'min' => 0, 'pattern' => '^$|^arn:(aws|aws-cn|aws-us-gov):logs:([a-zA-Z0-9-]+):([0-9]+):log-group:[a-zA-Z0-9_\\-\\/\\.]+:\\*$', ], 'MaintenanceStartTime' => [ 'type' => 'structure', 'required' => [ 'HourOfDay', 'MinuteOfHour', ], 'members' => [ 'DayOfMonth' => [ 'shape' => 'DayOfMonth', ], 'DayOfWeek' => [ 'shape' => 'DayOfWeek', ], 'HourOfDay' => [ 'shape' => 'HourOfDay', ], 'MinuteOfHour' => [ 'shape' => 'MinuteOfHour', ], ], ], 'MaxResults' => [ 'type' => 'integer', 'box' => true, 'min' => 1, ], 'MinuteOfHour' => [ 'type' => 'integer', 'box' => true, 'max' => 59, 'min' => 0, ], 'Name' => [ 'type' => 'string', 'max' => 100, 'min' => 1, 'pattern' => '^[a-zA-Z0-9-]*$', ], 'NextToken' => [ 'type' => 'string', 'max' => 1000, 'min' => 1, 'pattern' => '^.+$', ], 'Password' => [ 'type' => 'string', 'max' => 100, 'min' => 1, 'pattern' => '^[ -~]+$', 'sensitive' => true, ], 'Path' => [ 'type' => 'string', 'max' => 4096, 'min' => 1, 'pattern' => '^[^\\x00]+$', ], 'PutBandwidthRateLimitScheduleInput' => [ 'type' => 'structure', 'required' => [ 'BandwidthRateLimitIntervals', 'GatewayArn', ], 'members' => [ 'BandwidthRateLimitIntervals' => [ 'shape' => 'BandwidthRateLimitIntervals', ], 'GatewayArn' => [ 'shape' => 'GatewayArn', ], ], ], 'PutBandwidthRateLimitScheduleOutput' => [ 'type' => 'structure', 'members' => [ 'GatewayArn' => [ 'shape' => 'GatewayArn', ], ], ], 'PutHypervisorPropertyMappingsInput' => [ 'type' => 'structure', 'required' => [ 'HypervisorArn', 'IamRoleArn', 'VmwareToAwsTagMappings', ], 'members' => [ 'HypervisorArn' => [ 'shape' => 'ServerArn', ], 'IamRoleArn' => [ 'shape' => 'IamRoleArn', ], 'VmwareToAwsTagMappings' => [ 'shape' => 'VmwareToAwsTagMappings', ], ], ], 'PutHypervisorPropertyMappingsOutput' => [ 'type' => 'structure', 'members' => [ 'HypervisorArn' => [ 'shape' => 'ServerArn', ], ], ], 'PutMaintenanceStartTimeInput' => [ 'type' => 'structure', 'required' => [ 'GatewayArn', 'HourOfDay', 'MinuteOfHour', ], 'members' => [ 'DayOfMonth' => [ 'shape' => 'DayOfMonth', ], 'DayOfWeek' => [ 'shape' => 'DayOfWeek', ], 'GatewayArn' => [ 'shape' => 'GatewayArn', ], 'HourOfDay' => [ 'shape' => 'HourOfDay', ], 'MinuteOfHour' => [ 'shape' => 'MinuteOfHour', ], ], ], 'PutMaintenanceStartTimeOutput' => [ 'type' => 'structure', 'members' => [ 'GatewayArn' => [ 'shape' => 'GatewayArn', ], ], ], 'ResourceArn' => [ 'type' => 'string', 'max' => 500, 'min' => 50, 'pattern' => '^arn:(aws|aws-cn|aws-us-gov):backup-gateway(:[a-zA-Z-0-9]+){3}\\/[a-zA-Z-0-9]+$', ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'members' => [ 'ErrorCode' => [ 'shape' => 'string', ], 'Message' => [ 'shape' => 'string', ], ], 'exception' => true, ], 'ServerArn' => [ 'type' => 'string', 'max' => 500, 'min' => 50, 'pattern' => '^arn:(aws|aws-cn|aws-us-gov):backup-gateway(:[a-zA-Z-0-9]+){3}\\/[a-zA-Z-0-9]+$', ], 'StartVirtualMachinesMetadataSyncInput' => [ 'type' => 'structure', 'required' => [ 'HypervisorArn', ], 'members' => [ 'HypervisorArn' => [ 'shape' => 'ServerArn', ], ], ], 'StartVirtualMachinesMetadataSyncOutput' => [ 'type' => 'structure', 'members' => [ 'HypervisorArn' => [ 'shape' => 'ServerArn', ], ], ], 'SyncMetadataStatus' => [ 'type' => 'string', 'enum' => [ 'CREATED', 'RUNNING', 'FAILED', 'PARTIALLY_FAILED', 'SUCCEEDED', ], ], 'Tag' => [ 'type' => 'structure', 'required' => [ 'Key', 'Value', ], 'members' => [ 'Key' => [ 'shape' => 'TagKey', ], 'Value' => [ 'shape' => 'TagValue', ], ], ], 'TagKey' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*)$', ], 'TagKeys' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagKey', ], ], 'TagResourceInput' => [ 'type' => 'structure', 'required' => [ 'ResourceARN', 'Tags', ], 'members' => [ 'ResourceARN' => [ 'shape' => 'ResourceArn', ], 'Tags' => [ 'shape' => 'Tags', ], ], ], 'TagResourceOutput' => [ 'type' => 'structure', 'members' => [ 'ResourceARN' => [ 'shape' => 'ResourceArn', ], ], ], 'TagValue' => [ 'type' => 'string', 'max' => 256, 'min' => 0, 'pattern' => '^[^\\x00]*$', ], 'Tags' => [ 'type' => 'list', 'member' => [ 'shape' => 'Tag', ], ], 'TestHypervisorConfigurationInput' => [ 'type' => 'structure', 'required' => [ 'GatewayArn', 'Host', ], 'members' => [ 'GatewayArn' => [ 'shape' => 'GatewayArn', ], 'Host' => [ 'shape' => 'Host', ], 'Password' => [ 'shape' => 'Password', ], 'Username' => [ 'shape' => 'Username', ], ], ], 'TestHypervisorConfigurationOutput' => [ 'type' => 'structure', 'members' => [], ], 'ThrottlingException' => [ 'type' => 'structure', 'required' => [ 'ErrorCode', ], 'members' => [ 'ErrorCode' => [ 'shape' => 'string', ], 'Message' => [ 'shape' => 'string', ], ], 'exception' => true, ], 'Time' => [ 'type' => 'timestamp', ], 'UntagResourceInput' => [ 'type' => 'structure', 'required' => [ 'ResourceARN', 'TagKeys', ], 'members' => [ 'ResourceARN' => [ 'shape' => 'ResourceArn', ], 'TagKeys' => [ 'shape' => 'TagKeys', ], ], ], 'UntagResourceOutput' => [ 'type' => 'structure', 'members' => [ 'ResourceARN' => [ 'shape' => 'ResourceArn', ], ], ], 'UpdateGatewayInformationInput' => [ 'type' => 'structure', 'required' => [ 'GatewayArn', ], 'members' => [ 'GatewayArn' => [ 'shape' => 'GatewayArn', ], 'GatewayDisplayName' => [ 'shape' => 'Name', ], ], ], 'UpdateGatewayInformationOutput' => [ 'type' => 'structure', 'members' => [ 'GatewayArn' => [ 'shape' => 'GatewayArn', ], ], ], 'UpdateGatewaySoftwareNowInput' => [ 'type' => 'structure', 'required' => [ 'GatewayArn', ], 'members' => [ 'GatewayArn' => [ 'shape' => 'GatewayArn', ], ], ], 'UpdateGatewaySoftwareNowOutput' => [ 'type' => 'structure', 'members' => [ 'GatewayArn' => [ 'shape' => 'GatewayArn', ], ], ], 'UpdateHypervisorInput' => [ 'type' => 'structure', 'required' => [ 'HypervisorArn', ], 'members' => [ 'Host' => [ 'shape' => 'Host', ], 'HypervisorArn' => [ 'shape' => 'ServerArn', ], 'LogGroupArn' => [ 'shape' => 'LogGroupArn', ], 'Name' => [ 'shape' => 'Name', ], 'Password' => [ 'shape' => 'Password', ], 'Username' => [ 'shape' => 'Username', ], ], ], 'UpdateHypervisorOutput' => [ 'type' => 'structure', 'members' => [ 'HypervisorArn' => [ 'shape' => 'ServerArn', ], ], ], 'Username' => [ 'type' => 'string', 'max' => 100, 'min' => 1, 'pattern' => '^[ -\\.0-\\[\\]-~]*[!-\\.0-\\[\\]-~][ -\\.0-\\[\\]-~]*$', 'sensitive' => true, ], 'ValidationException' => [ 'type' => 'structure', 'members' => [ 'ErrorCode' => [ 'shape' => 'string', ], 'Message' => [ 'shape' => 'string', ], ], 'exception' => true, ], 'VirtualMachine' => [ 'type' => 'structure', 'members' => [ 'HostName' => [ 'shape' => 'Name', ], 'HypervisorId' => [ 'shape' => 'string', ], 'LastBackupDate' => [ 'shape' => 'Time', ], 'Name' => [ 'shape' => 'Name', ], 'Path' => [ 'shape' => 'Path', ], 'ResourceArn' => [ 'shape' => 'ResourceArn', ], ], ], 'VirtualMachineDetails' => [ 'type' => 'structure', 'members' => [ 'HostName' => [ 'shape' => 'Name', ], 'HypervisorId' => [ 'shape' => 'string', ], 'LastBackupDate' => [ 'shape' => 'Time', ], 'Name' => [ 'shape' => 'Name', ], 'Path' => [ 'shape' => 'Path', ], 'ResourceArn' => [ 'shape' => 'ResourceArn', ], 'VmwareTags' => [ 'shape' => 'VmwareTags', ], ], ], 'VirtualMachines' => [ 'type' => 'list', 'member' => [ 'shape' => 'VirtualMachine', ], ], 'VmwareCategory' => [ 'type' => 'string', 'max' => 80, 'min' => 1, ], 'VmwareTag' => [ 'type' => 'structure', 'members' => [ 'VmwareCategory' => [ 'shape' => 'VmwareCategory', ], 'VmwareTagDescription' => [ 'shape' => 'string', ], 'VmwareTagName' => [ 'shape' => 'VmwareTagName', ], ], ], 'VmwareTagName' => [ 'type' => 'string', 'max' => 80, 'min' => 1, ], 'VmwareTags' => [ 'type' => 'list', 'member' => [ 'shape' => 'VmwareTag', ], ], 'VmwareToAwsTagMapping' => [ 'type' => 'structure', 'required' => [ 'AwsTagKey', 'AwsTagValue', 'VmwareCategory', 'VmwareTagName', ], 'members' => [ 'AwsTagKey' => [ 'shape' => 'TagKey', ], 'AwsTagValue' => [ 'shape' => 'TagValue', ], 'VmwareCategory' => [ 'shape' => 'VmwareCategory', ], 'VmwareTagName' => [ 'shape' => 'VmwareTagName', ], ], ], 'VmwareToAwsTagMappings' => [ 'type' => 'list', 'member' => [ 'shape' => 'VmwareToAwsTagMapping', ], ], 'VpcEndpoint' => [ 'type' => 'string', 'max' => 255, 'min' => 1, ], 'string' => [ 'type' => 'string', ], ],];
