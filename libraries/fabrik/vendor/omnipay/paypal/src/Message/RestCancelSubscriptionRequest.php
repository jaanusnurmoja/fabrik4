<?php
/**
 * PayPal REST Cancel Subscription Request
 */

namespace Omnipay\PayPal\Message;

/**
 * PayPal REST Cancel Subscription Request
 *
 * Use this call to cancel an agreement after the buyer approves it.
 *
 * ### Request Data
 *
 * Pass the agreement id in the URI of a POST call.  Also include a description,
 * which is the reason for cancelling the subscription.
 *
 * ### Example
 *
 * To create the agreement, see the code example in RestCreateSubscriptionRequest.
 *
 * <code>
 *   // Create a gateway for the PayPal REST Gateway
 *   // (routes to GatewayFactory::create)
 *   $gateway = Omnipay::create('Paypal_Rest');
 *
 *   // Initialise the gateway
 *   $gateway->initialize(array(
 *       'clientId' => 'MyPayPalClientId',
 *       'secret'   => 'MyPayPalSecret',
 *       'testMode' => true, // Or false when you are ready for live transactions
 *   ));
 *
 *   // Do a cancel subscription transaction on the gateway
 *   $transaction = $gateway->cancelSubscription(array(
 *       'transactionReference'     => $subscription_id,
 *       'description'              => "Cancelling the agreement.",
 *   ));
 *   $response = $transaction->send();
 *   if ($response->isSuccessful()) {
 *       echo "Cancel Subscription transaction was successful!\n";
 *   }
 * </code>
 *
 * Note that the subscription_id that you get from calling the response's
 * getTransactionReference() method at the end of the completeSubscription
 * call will be different to the one that you got after calling the response's
 * getTransactionReference() method at the end of the createSubscription
 * call.  The one that you get from completeSubscription is the correct
 * one to use going forwards (e.g. for cancelling or updating the subscription).
 *
 * ### Request Sample
 *
 * This is from the PayPal web site:
 *
 * <code>
 * curl -v POST https://api.sandbox.paypal.com/v1/payments/billing-agreements/I-0LN988D3JACS/cancel \
 *     -H 'Content-Type:application/json' \
 *     -H 'Authorization: Bearer <Access-Token>' \
 *     -d '{
 *         "note": "Canceling the agreement."
 *     }'
 * </code>
 *
 * @link https://developer.paypal.com/docs/api/#cancel-an-agreement
 * @see RestCreateSubscriptionRequest
 * @see Omnipay\PayPal\RestGateway
 */
class RestCancelSubscriptionRequest extends AbstractRestRequest
{
    public function getData()
    {
        $this->validate('transactionReference', 'description');
        $data = array(
            'note'  => $this->getDescription(),
        );

        return $data;
    }

    /**
     * Get transaction endpoint.
     *
     * Subscriptions are executed using the /billing-agreements resource.
     *
     * @return string
     */
    protected function getEndpoint()
    {
        return parent::getEndpoint() . '/payments/billing-agreements/' .
            $this->getTransactionReference() . '/cancel';
    }
}
