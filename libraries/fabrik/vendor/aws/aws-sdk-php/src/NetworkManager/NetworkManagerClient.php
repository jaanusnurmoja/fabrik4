<?php
namespace Aws\NetworkManager;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Network Manager** service.
 * @method \Aws\Result associateCustomerGateway(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associateCustomerGatewayAsync(array $args = [])
 * @method \Aws\Result associateLink(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associateLinkAsync(array $args = [])
 * @method \Aws\Result createDevice(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createDeviceAsync(array $args = [])
 * @method \Aws\Result createGlobalNetwork(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createGlobalNetworkAsync(array $args = [])
 * @method \Aws\Result createLink(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createLinkAsync(array $args = [])
 * @method \Aws\Result createSite(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createSiteAsync(array $args = [])
 * @method \Aws\Result deleteDevice(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDeviceAsync(array $args = [])
 * @method \Aws\Result deleteGlobalNetwork(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGlobalNetworkAsync(array $args = [])
 * @method \Aws\Result deleteLink(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLinkAsync(array $args = [])
 * @method \Aws\Result deleteSite(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSiteAsync(array $args = [])
 * @method \Aws\Result deregisterTransitGateway(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterTransitGatewayAsync(array $args = [])
 * @method \Aws\Result describeGlobalNetworks(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGlobalNetworksAsync(array $args = [])
 * @method \Aws\Result disassociateCustomerGateway(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateCustomerGatewayAsync(array $args = [])
 * @method \Aws\Result disassociateLink(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateLinkAsync(array $args = [])
 * @method \Aws\Result getCustomerGatewayAssociations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getCustomerGatewayAssociationsAsync(array $args = [])
 * @method \Aws\Result getDevices(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDevicesAsync(array $args = [])
 * @method \Aws\Result getLinkAssociations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getLinkAssociationsAsync(array $args = [])
 * @method \Aws\Result getLinks(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getLinksAsync(array $args = [])
 * @method \Aws\Result getSites(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSitesAsync(array $args = [])
 * @method \Aws\Result getTransitGatewayRegistrations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getTransitGatewayRegistrationsAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result registerTransitGateway(array $args = [])
 * @method \GuzzleHttp\Promise\Promise registerTransitGatewayAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateDevice(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDeviceAsync(array $args = [])
 * @method \Aws\Result updateGlobalNetwork(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGlobalNetworkAsync(array $args = [])
 * @method \Aws\Result updateLink(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLinkAsync(array $args = [])
 * @method \Aws\Result updateSite(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSiteAsync(array $args = [])
 */
class NetworkManagerClient extends AwsClient {}
