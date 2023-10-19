<?php
namespace Aws\Route53Domains;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Route 53 Domains** service.
 *
 * @method \Aws\Result acceptDomainTransferFromAnotherAwsAccount(array $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptDomainTransferFromAnotherAwsAccountAsync(array $args = [])
 * @method \Aws\Result associateDelegationSignerToDomain(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associateDelegationSignerToDomainAsync(array $args = [])
 * @method \Aws\Result cancelDomainTransferToAnotherAwsAccount(array $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelDomainTransferToAnotherAwsAccountAsync(array $args = [])
 * @method \Aws\Result checkDomainAvailability(array $args = [])
 * @method \GuzzleHttp\Promise\Promise checkDomainAvailabilityAsync(array $args = [])
 * @method \Aws\Result checkDomainTransferability(array $args = [])
 * @method \GuzzleHttp\Promise\Promise checkDomainTransferabilityAsync(array $args = [])
 * @method \Aws\Result deleteDomain(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainAsync(array $args = [])
 * @method \Aws\Result deleteTagsForDomain(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTagsForDomainAsync(array $args = [])
 * @method \Aws\Result disableDomainAutoRenew(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disableDomainAutoRenewAsync(array $args = [])
 * @method \Aws\Result disableDomainTransferLock(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disableDomainTransferLockAsync(array $args = [])
 * @method \Aws\Result disassociateDelegationSignerFromDomain(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateDelegationSignerFromDomainAsync(array $args = [])
 * @method \Aws\Result enableDomainAutoRenew(array $args = [])
 * @method \GuzzleHttp\Promise\Promise enableDomainAutoRenewAsync(array $args = [])
 * @method \Aws\Result enableDomainTransferLock(array $args = [])
 * @method \GuzzleHttp\Promise\Promise enableDomainTransferLockAsync(array $args = [])
 * @method \Aws\Result getContactReachabilityStatus(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getContactReachabilityStatusAsync(array $args = [])
 * @method \Aws\Result getDomainDetail(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainDetailAsync(array $args = [])
 * @method \Aws\Result getDomainSuggestions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainSuggestionsAsync(array $args = [])
 * @method \Aws\Result getOperationDetail(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getOperationDetailAsync(array $args = [])
 * @method \Aws\Result listDomains(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainsAsync(array $args = [])
 * @method \Aws\Result listOperations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listOperationsAsync(array $args = [])
 * @method \Aws\Result listPrices(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPricesAsync(array $args = [])
 * @method \Aws\Result listTagsForDomain(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForDomainAsync(array $args = [])
 * @method \Aws\Result pushDomain(array $args = [])
 * @method \GuzzleHttp\Promise\Promise pushDomainAsync(array $args = [])
 * @method \Aws\Result registerDomain(array $args = [])
 * @method \GuzzleHttp\Promise\Promise registerDomainAsync(array $args = [])
 * @method \Aws\Result rejectDomainTransferFromAnotherAwsAccount(array $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectDomainTransferFromAnotherAwsAccountAsync(array $args = [])
 * @method \Aws\Result renewDomain(array $args = [])
 * @method \GuzzleHttp\Promise\Promise renewDomainAsync(array $args = [])
 * @method \Aws\Result resendContactReachabilityEmail(array $args = [])
 * @method \GuzzleHttp\Promise\Promise resendContactReachabilityEmailAsync(array $args = [])
 * @method \Aws\Result resendOperationAuthorization(array $args = [])
 * @method \GuzzleHttp\Promise\Promise resendOperationAuthorizationAsync(array $args = [])
 * @method \Aws\Result retrieveDomainAuthCode(array $args = [])
 * @method \GuzzleHttp\Promise\Promise retrieveDomainAuthCodeAsync(array $args = [])
 * @method \Aws\Result transferDomain(array $args = [])
 * @method \GuzzleHttp\Promise\Promise transferDomainAsync(array $args = [])
 * @method \Aws\Result transferDomainToAnotherAwsAccount(array $args = [])
 * @method \GuzzleHttp\Promise\Promise transferDomainToAnotherAwsAccountAsync(array $args = [])
 * @method \Aws\Result updateDomainContact(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDomainContactAsync(array $args = [])
 * @method \Aws\Result updateDomainContactPrivacy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDomainContactPrivacyAsync(array $args = [])
 * @method \Aws\Result updateDomainNameservers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDomainNameserversAsync(array $args = [])
 * @method \Aws\Result updateTagsForDomain(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTagsForDomainAsync(array $args = [])
 * @method \Aws\Result viewBilling(array $args = [])
 * @method \GuzzleHttp\Promise\Promise viewBillingAsync(array $args = [])
 */
class Route53DomainsClient extends AwsClient {}
