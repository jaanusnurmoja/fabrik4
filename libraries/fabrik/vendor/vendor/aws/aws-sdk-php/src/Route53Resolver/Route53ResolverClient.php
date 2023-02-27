<?php
namespace Aws\Route53Resolver;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Route 53 Resolver** service.
 * @method \Aws\Result associateFirewallRuleGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associateFirewallRuleGroupAsync(array $args = [])
 * @method \Aws\Result associateResolverEndpointIpAddress(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associateResolverEndpointIpAddressAsync(array $args = [])
 * @method \Aws\Result associateResolverQueryLogConfig(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associateResolverQueryLogConfigAsync(array $args = [])
 * @method \Aws\Result associateResolverRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associateResolverRuleAsync(array $args = [])
 * @method \Aws\Result createFirewallDomainList(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createFirewallDomainListAsync(array $args = [])
 * @method \Aws\Result createFirewallRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createFirewallRuleAsync(array $args = [])
 * @method \Aws\Result createFirewallRuleGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createFirewallRuleGroupAsync(array $args = [])
 * @method \Aws\Result createResolverEndpoint(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createResolverEndpointAsync(array $args = [])
 * @method \Aws\Result createResolverQueryLogConfig(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createResolverQueryLogConfigAsync(array $args = [])
 * @method \Aws\Result createResolverRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createResolverRuleAsync(array $args = [])
 * @method \Aws\Result deleteFirewallDomainList(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFirewallDomainListAsync(array $args = [])
 * @method \Aws\Result deleteFirewallRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFirewallRuleAsync(array $args = [])
 * @method \Aws\Result deleteFirewallRuleGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFirewallRuleGroupAsync(array $args = [])
 * @method \Aws\Result deleteResolverEndpoint(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResolverEndpointAsync(array $args = [])
 * @method \Aws\Result deleteResolverQueryLogConfig(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResolverQueryLogConfigAsync(array $args = [])
 * @method \Aws\Result deleteResolverRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResolverRuleAsync(array $args = [])
 * @method \Aws\Result disassociateFirewallRuleGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateFirewallRuleGroupAsync(array $args = [])
 * @method \Aws\Result disassociateResolverEndpointIpAddress(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateResolverEndpointIpAddressAsync(array $args = [])
 * @method \Aws\Result disassociateResolverQueryLogConfig(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateResolverQueryLogConfigAsync(array $args = [])
 * @method \Aws\Result disassociateResolverRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateResolverRuleAsync(array $args = [])
 * @method \Aws\Result getFirewallConfig(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getFirewallConfigAsync(array $args = [])
 * @method \Aws\Result getFirewallDomainList(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getFirewallDomainListAsync(array $args = [])
 * @method \Aws\Result getFirewallRuleGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getFirewallRuleGroupAsync(array $args = [])
 * @method \Aws\Result getFirewallRuleGroupAssociation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getFirewallRuleGroupAssociationAsync(array $args = [])
 * @method \Aws\Result getFirewallRuleGroupPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getFirewallRuleGroupPolicyAsync(array $args = [])
 * @method \Aws\Result getResolverConfig(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getResolverConfigAsync(array $args = [])
 * @method \Aws\Result getResolverDnssecConfig(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getResolverDnssecConfigAsync(array $args = [])
 * @method \Aws\Result getResolverEndpoint(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getResolverEndpointAsync(array $args = [])
 * @method \Aws\Result getResolverQueryLogConfig(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getResolverQueryLogConfigAsync(array $args = [])
 * @method \Aws\Result getResolverQueryLogConfigAssociation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getResolverQueryLogConfigAssociationAsync(array $args = [])
 * @method \Aws\Result getResolverQueryLogConfigPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getResolverQueryLogConfigPolicyAsync(array $args = [])
 * @method \Aws\Result getResolverRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getResolverRuleAsync(array $args = [])
 * @method \Aws\Result getResolverRuleAssociation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getResolverRuleAssociationAsync(array $args = [])
 * @method \Aws\Result getResolverRulePolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getResolverRulePolicyAsync(array $args = [])
 * @method \Aws\Result importFirewallDomains(array $args = [])
 * @method \GuzzleHttp\Promise\Promise importFirewallDomainsAsync(array $args = [])
 * @method \Aws\Result listFirewallConfigs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listFirewallConfigsAsync(array $args = [])
 * @method \Aws\Result listFirewallDomainLists(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listFirewallDomainListsAsync(array $args = [])
 * @method \Aws\Result listFirewallDomains(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listFirewallDomainsAsync(array $args = [])
 * @method \Aws\Result listFirewallRuleGroupAssociations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listFirewallRuleGroupAssociationsAsync(array $args = [])
 * @method \Aws\Result listFirewallRuleGroups(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listFirewallRuleGroupsAsync(array $args = [])
 * @method \Aws\Result listFirewallRules(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listFirewallRulesAsync(array $args = [])
 * @method \Aws\Result listResolverConfigs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listResolverConfigsAsync(array $args = [])
 * @method \Aws\Result listResolverDnssecConfigs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listResolverDnssecConfigsAsync(array $args = [])
 * @method \Aws\Result listResolverEndpointIpAddresses(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listResolverEndpointIpAddressesAsync(array $args = [])
 * @method \Aws\Result listResolverEndpoints(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listResolverEndpointsAsync(array $args = [])
 * @method \Aws\Result listResolverQueryLogConfigAssociations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listResolverQueryLogConfigAssociationsAsync(array $args = [])
 * @method \Aws\Result listResolverQueryLogConfigs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listResolverQueryLogConfigsAsync(array $args = [])
 * @method \Aws\Result listResolverRuleAssociations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listResolverRuleAssociationsAsync(array $args = [])
 * @method \Aws\Result listResolverRules(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listResolverRulesAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result putFirewallRuleGroupPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putFirewallRuleGroupPolicyAsync(array $args = [])
 * @method \Aws\Result putResolverQueryLogConfigPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putResolverQueryLogConfigPolicyAsync(array $args = [])
 * @method \Aws\Result putResolverRulePolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putResolverRulePolicyAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateFirewallConfig(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFirewallConfigAsync(array $args = [])
 * @method \Aws\Result updateFirewallDomains(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFirewallDomainsAsync(array $args = [])
 * @method \Aws\Result updateFirewallRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFirewallRuleAsync(array $args = [])
 * @method \Aws\Result updateFirewallRuleGroupAssociation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFirewallRuleGroupAssociationAsync(array $args = [])
 * @method \Aws\Result updateResolverConfig(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResolverConfigAsync(array $args = [])
 * @method \Aws\Result updateResolverDnssecConfig(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResolverDnssecConfigAsync(array $args = [])
 * @method \Aws\Result updateResolverEndpoint(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResolverEndpointAsync(array $args = [])
 * @method \Aws\Result updateResolverRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResolverRuleAsync(array $args = [])
 */
class Route53ResolverClient extends AwsClient {}
