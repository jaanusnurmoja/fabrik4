<?php
namespace Aws\Proton;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Proton** service.
 * @method \Aws\Result acceptEnvironmentAccountConnection(array $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptEnvironmentAccountConnectionAsync(array $args = [])
 * @method \Aws\Result cancelComponentDeployment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelComponentDeploymentAsync(array $args = [])
 * @method \Aws\Result cancelEnvironmentDeployment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelEnvironmentDeploymentAsync(array $args = [])
 * @method \Aws\Result cancelServiceInstanceDeployment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelServiceInstanceDeploymentAsync(array $args = [])
 * @method \Aws\Result cancelServicePipelineDeployment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelServicePipelineDeploymentAsync(array $args = [])
 * @method \Aws\Result createComponent(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createComponentAsync(array $args = [])
 * @method \Aws\Result createEnvironment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentAsync(array $args = [])
 * @method \Aws\Result createEnvironmentAccountConnection(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentAccountConnectionAsync(array $args = [])
 * @method \Aws\Result createEnvironmentTemplate(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentTemplateAsync(array $args = [])
 * @method \Aws\Result createEnvironmentTemplateVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentTemplateVersionAsync(array $args = [])
 * @method \Aws\Result createRepository(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createRepositoryAsync(array $args = [])
 * @method \Aws\Result createService(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceAsync(array $args = [])
 * @method \Aws\Result createServiceInstance(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceInstanceAsync(array $args = [])
 * @method \Aws\Result createServiceSyncConfig(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceSyncConfigAsync(array $args = [])
 * @method \Aws\Result createServiceTemplate(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceTemplateAsync(array $args = [])
 * @method \Aws\Result createServiceTemplateVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceTemplateVersionAsync(array $args = [])
 * @method \Aws\Result createTemplateSyncConfig(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createTemplateSyncConfigAsync(array $args = [])
 * @method \Aws\Result deleteComponent(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteComponentAsync(array $args = [])
 * @method \Aws\Result deleteDeployment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDeploymentAsync(array $args = [])
 * @method \Aws\Result deleteEnvironment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array $args = [])
 * @method \Aws\Result deleteEnvironmentAccountConnection(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentAccountConnectionAsync(array $args = [])
 * @method \Aws\Result deleteEnvironmentTemplate(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentTemplateAsync(array $args = [])
 * @method \Aws\Result deleteEnvironmentTemplateVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentTemplateVersionAsync(array $args = [])
 * @method \Aws\Result deleteRepository(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRepositoryAsync(array $args = [])
 * @method \Aws\Result deleteService(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceAsync(array $args = [])
 * @method \Aws\Result deleteServiceSyncConfig(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceSyncConfigAsync(array $args = [])
 * @method \Aws\Result deleteServiceTemplate(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceTemplateAsync(array $args = [])
 * @method \Aws\Result deleteServiceTemplateVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceTemplateVersionAsync(array $args = [])
 * @method \Aws\Result deleteTemplateSyncConfig(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTemplateSyncConfigAsync(array $args = [])
 * @method \Aws\Result getAccountSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountSettingsAsync(array $args = [])
 * @method \Aws\Result getComponent(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getComponentAsync(array $args = [])
 * @method \Aws\Result getDeployment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeploymentAsync(array $args = [])
 * @method \Aws\Result getEnvironment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentAsync(array $args = [])
 * @method \Aws\Result getEnvironmentAccountConnection(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentAccountConnectionAsync(array $args = [])
 * @method \Aws\Result getEnvironmentTemplate(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentTemplateAsync(array $args = [])
 * @method \Aws\Result getEnvironmentTemplateVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentTemplateVersionAsync(array $args = [])
 * @method \Aws\Result getRepository(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getRepositoryAsync(array $args = [])
 * @method \Aws\Result getRepositorySyncStatus(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getRepositorySyncStatusAsync(array $args = [])
 * @method \Aws\Result getResourcesSummary(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcesSummaryAsync(array $args = [])
 * @method \Aws\Result getService(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceAsync(array $args = [])
 * @method \Aws\Result getServiceInstance(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceInstanceAsync(array $args = [])
 * @method \Aws\Result getServiceInstanceSyncStatus(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceInstanceSyncStatusAsync(array $args = [])
 * @method \Aws\Result getServiceSyncBlockerSummary(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceSyncBlockerSummaryAsync(array $args = [])
 * @method \Aws\Result getServiceSyncConfig(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceSyncConfigAsync(array $args = [])
 * @method \Aws\Result getServiceTemplate(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceTemplateAsync(array $args = [])
 * @method \Aws\Result getServiceTemplateVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceTemplateVersionAsync(array $args = [])
 * @method \Aws\Result getTemplateSyncConfig(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getTemplateSyncConfigAsync(array $args = [])
 * @method \Aws\Result getTemplateSyncStatus(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getTemplateSyncStatusAsync(array $args = [])
 * @method \Aws\Result listComponentOutputs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listComponentOutputsAsync(array $args = [])
 * @method \Aws\Result listComponentProvisionedResources(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listComponentProvisionedResourcesAsync(array $args = [])
 * @method \Aws\Result listComponents(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listComponentsAsync(array $args = [])
 * @method \Aws\Result listDeployments(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeploymentsAsync(array $args = [])
 * @method \Aws\Result listEnvironmentAccountConnections(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentAccountConnectionsAsync(array $args = [])
 * @method \Aws\Result listEnvironmentOutputs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentOutputsAsync(array $args = [])
 * @method \Aws\Result listEnvironmentProvisionedResources(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentProvisionedResourcesAsync(array $args = [])
 * @method \Aws\Result listEnvironmentTemplateVersions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentTemplateVersionsAsync(array $args = [])
 * @method \Aws\Result listEnvironmentTemplates(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentTemplatesAsync(array $args = [])
 * @method \Aws\Result listEnvironments(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentsAsync(array $args = [])
 * @method \Aws\Result listRepositories(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listRepositoriesAsync(array $args = [])
 * @method \Aws\Result listRepositorySyncDefinitions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listRepositorySyncDefinitionsAsync(array $args = [])
 * @method \Aws\Result listServiceInstanceOutputs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceInstanceOutputsAsync(array $args = [])
 * @method \Aws\Result listServiceInstanceProvisionedResources(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceInstanceProvisionedResourcesAsync(array $args = [])
 * @method \Aws\Result listServiceInstances(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceInstancesAsync(array $args = [])
 * @method \Aws\Result listServicePipelineOutputs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listServicePipelineOutputsAsync(array $args = [])
 * @method \Aws\Result listServicePipelineProvisionedResources(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listServicePipelineProvisionedResourcesAsync(array $args = [])
 * @method \Aws\Result listServiceTemplateVersions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceTemplateVersionsAsync(array $args = [])
 * @method \Aws\Result listServiceTemplates(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceTemplatesAsync(array $args = [])
 * @method \Aws\Result listServices(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listServicesAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result notifyResourceDeploymentStatusChange(array $args = [])
 * @method \GuzzleHttp\Promise\Promise notifyResourceDeploymentStatusChangeAsync(array $args = [])
 * @method \Aws\Result rejectEnvironmentAccountConnection(array $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectEnvironmentAccountConnectionAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateAccountSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountSettingsAsync(array $args = [])
 * @method \Aws\Result updateComponent(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateComponentAsync(array $args = [])
 * @method \Aws\Result updateEnvironment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnvironmentAsync(array $args = [])
 * @method \Aws\Result updateEnvironmentAccountConnection(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnvironmentAccountConnectionAsync(array $args = [])
 * @method \Aws\Result updateEnvironmentTemplate(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnvironmentTemplateAsync(array $args = [])
 * @method \Aws\Result updateEnvironmentTemplateVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnvironmentTemplateVersionAsync(array $args = [])
 * @method \Aws\Result updateService(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceAsync(array $args = [])
 * @method \Aws\Result updateServiceInstance(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceInstanceAsync(array $args = [])
 * @method \Aws\Result updateServicePipeline(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServicePipelineAsync(array $args = [])
 * @method \Aws\Result updateServiceSyncBlocker(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceSyncBlockerAsync(array $args = [])
 * @method \Aws\Result updateServiceSyncConfig(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceSyncConfigAsync(array $args = [])
 * @method \Aws\Result updateServiceTemplate(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceTemplateAsync(array $args = [])
 * @method \Aws\Result updateServiceTemplateVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceTemplateVersionAsync(array $args = [])
 * @method \Aws\Result updateTemplateSyncConfig(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTemplateSyncConfigAsync(array $args = [])
 */
class ProtonClient extends AwsClient {}
