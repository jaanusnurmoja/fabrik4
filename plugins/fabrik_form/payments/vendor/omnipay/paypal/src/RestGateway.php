<?php
/**
 * PayPal Pro Class using REST API
 */

namespace Omnipay\PayPal;

use Omnipay\Common\AbstractGateway;
use Omnipay\PayPal\Message\ProAuthorizeRequest;
use Omnipay\PayPal\Message\CaptureRequest;
use Omnipay\PayPal\Message\RefundRequest;

/**
 * PayPal Pro Class using REST API
 *
 * This class forms the gateway class for PayPal REST requests via the PayPal REST APIs.
 *
 * The PayPal API uses HTTP verbs and a RESTful endpoint structure. OAuth 2.0 is used
 * as the API Authorization framework. Request and response payloads are formatted as JSON.
 *
 * The PayPal REST APIs are supported in two environments. Use the Sandbox environment
 * for testing purposes, then move to the live environment for production processing.
 * When testing, generate an access token with your test credentials to make calls to
 * the Sandbox URIs. When you’re set to go live, use the live credentials assigned to
 * your app to generate a new access token to be used with the live URIs.
 *
 * In order to use this for testing in sandbox mode you will need at least two sandbox
 * test accounts.  One will need to be a business account, and one will need to be a
 * personal account with credit card details.  To create these yo will need to go to
 * the sandbox accounts section of the PayPal developer dashboard, here:
 * https://developer.paypal.com/webapps/developer/applications/accounts
 * On that page click "Create Account" and follow the prompts.  When you are creating the
 * Personal account, ensure that it is created with a credit card -- either Visa or
 * MasterCard or one of the other types.  When you are testing in the sandbox, use the
 * credit card details you will receive for this Personal account rather than any other
 * commonly used test credit card numbers (e.g. visa card 4111111111111111 or 4444333322221111
 * both of which will result in Error 500 / INTERNAL_SERVICE_ERROR type errors from the
 * PayPal gateway).
 *
 * With each API call, you’ll need to set request headers, including an OAuth 2.0
 * access token. Get an access token by using the OAuth 2.0 client_credentials token
 * grant type with your clientId:secret as your Basic Auth credentials. For more
 * information, see Make your first call (link).  This class sets all of the headers
 * associated with the API call for you, including making preliminary calls to create
 * or update the OAuth 2.0 access token before each call you make, if required.  All
 * you need to do is provide the clientId and secret when you initialize the gateway,
 * or use the set*() calls to set them after creating the gateway object.
 *
 * To create production and sandbox credentials for your PayPal account:
 *
 * * Log into your PayPal account.
 * * Navigate to your Sandbox accounts at https://developer.paypal.com/webapps/developer/applications/accounts
 *   to ensure that you have a valid sandbox account to use for testing.  If you don't already have a sandbox
 *   account, one can be created on this page.  You will actually need 2 accounts, a personal account and a
 *   business account, the business account is the one you need to use for creating API applications. 
 * * Check your account status on https://developer.paypal.com/webapps/developer/account/status to ensure
 *   that it is valid for live transactions.
 * * Navigate to the My REST apps page: https://developer.paypal.com/webapps/developer/applications/myapps
 * * Click *Create App*
 * * On the next page, enter an App name and select the sandbox account to use, then click *Create app*.
 * * On the next page the sandbox account, endpoint, Client ID and Secret should be displayed.
 *   Record these.  The Sandbox account should match the one that you selected on the previous
 *   page, and the sandbox endpoint should be ai.sandbox.paypal.com
 * * Adjacent to *Live credentials* click *Show* to display your live credentials.  The endpoint
 *   for these should be api.paypal.com, there should also be a Client ID and Secret.
 *
 * You can create additional REST APIs apps for other websites -- because the webhooks are
 * stored per app then it pays to have one API app per website that you are using (and an
 * additional one for things like command line testing, etc).
 *
 * Example:
 *
 * <code>
 *   // Create a gateway for the PayPal RestGateway
 *   // (routes to GatewayFactory::create)
 *   $gateway = Omnipay::create('RestGateway');
 *
 *   // Initialise the gateway
 *   $gateway->initialize(array(
 *       'clientId' => 'MyPayPalClientId',
 *       'secret'   => 'MyPayPalSecret',
 *       'testMode' => true, // Or false when you are ready for live transactions
 *   ));
 *
 *   // Create a credit card object
 *   // DO NOT USE THESE CARD VALUES -- substitute your own
 *   // see the documentation in the class header.
 *   $card = new CreditCard(array(
 *               'firstName' => 'Example',
 *               'lastName' => 'User',
 *               'number' => '4111111111111111',
 *               'expiryMonth'           => '01',
 *               'expiryYear'            => '2020',
 *               'cvv'                   => '123',
 *               'billingAddress1'       => '1 Scrubby Creek Road',
 *               'billingCountry'        => 'AU',
 *               'billingCity'           => 'Scrubby Creek',
 *               'billingPostcode'       => '4999',
 *               'billingState'          => 'QLD',
 *   ));
 *
 *   // Do an authorisation transaction on the gateway
 *   if ($gateway->supportsAuthorize()) {
 *       try {
 *           $transaction = $gateway->authorize(array(
 *               'amount'        => '10.00',
 *               'currency'      => 'AUD',
 *               'description'   => 'This is a test authorize transaction.',
 *               'card'          => $card,
 *           ));
 *           $response = $transaction->send();
 *           $data = $response->getData();
 *           echo "Gateway authorize response data == " . print_r($data, true) . "\n";
 *  
 *           if ($response->isSuccessful()) {
 *               echo "Authorize transaction was successful!\n";
 *           }
 *       } catch (\Exception $e) {
 *           echo "Exception caught while attempting authorize.\n";
 *           echo "Exception type == " . get_class($e) . "\n";
 *           echo "Message == " . $e->getMessage() . "\n";
 *       }
 *      
 *   } else {
 *       echo "Gateway does not support authorize.\n";
 *   }
 * </code>
 *
 * Once you have processed some payments you can go to the PayPal sandbox site,
 * at https://www.sandbox.paypal.com/ and log in with the email address and password
 * of your PayPal sandbox business test account.  You will then see the result
 * of those transactions on the "My recent activity" list under the My Account
 * tab.
 *
 * TODO: Billing Plans and Agreements -- set up recurring payments.
 *
 * @link https://developer.paypal.com/docs/api/
 * @link https://devtools-paypal.com/integrationwizard/
 * @link http://paypal.github.io/sdk/
 * @link https://developer.paypal.com/docs/integration/direct/rest_api_payment_country_currency_support/
 * @link https://developer.paypal.com/docs/faq/
 * @link https://developer.paypal.com/docs/integration/direct/make-your-first-call/
 * @link https://developer.paypal.com/docs/integration/web/accept-paypal-payment/
 * @link https://developer.paypal.com/docs/api/#authentication--headers
 * @see Omnipay\PayPal\Message\AbstractRestRequest
 */
class RestGateway extends AbstractGateway
{
    public function getName()
    {
        return 'PayPal REST';
    }

    public function getDefaultParameters()
    {
        return array(
            'clientId'     => '',
            'secret'       => '',
            'token'        => '',
            'testMode'     => false,
        );
    }

    //
    // Tokens -- methods to set up, store and retrieve the OAuth 2.0 access token.
    //
    // @link https://developer.paypal.com/docs/api/#authentication--headers
    //

    /**
     * Get OAuth 2.0 client ID for the access token.
     * 
     * Get an access token by using the OAuth 2.0 client_credentials
     * token grant type with your clientId:secret as your Basic Auth
     * credentials.
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->getParameter('clientId');
    }

    /**
     * Set OAuth 2.0 client ID for the access token.
     * 
     * Get an access token by using the OAuth 2.0 client_credentials
     * token grant type with your clientId:secret as your Basic Auth
     * credentials.
     *
     * @param string $value
     * @return RestGateway provides a fluent interface
     */
    public function setClientId($value)
    {
        return $this->setParameter('clientId', $value);
    }

    /**
     * Get OAuth 2.0 secret for the access token.
     * 
     * Get an access token by using the OAuth 2.0 client_credentials
     * token grant type with your clientId:secret as your Basic Auth
     * credentials.
     *
     * @return string
     */
    public function getSecret()
    {
        return $this->getParameter('secret');
    }

    /**
     * Set OAuth 2.0 secret for the access token.
     * 
     * Get an access token by using the OAuth 2.0 client_credentials
     * token grant type with your clientId:secret as your Basic Auth
     * credentials.
     *
     * @param string $value
     * @return RestGateway provides a fluent interface
     */
    public function setSecret($value)
    {
        return $this->setParameter('secret', $value);
    }

    /**
     * Get OAuth 2.0 access token.
     *
     * @param bool $createIfNeeded [optional] - If there is not an active token present, should we create one?
     * @return string
     */
    public function getToken($createIfNeeded = true)
    {
        if ($createIfNeeded && !$this->hasToken()) {
            $response = $this->createToken()->send();
            if ($response->isSuccessful()) {
                $data = $response->getData();
                if (isset($data['access_token'])) {
                    $this->setToken($data['access_token']);
                    $this->setTokenExpires(time() + $data['expires_in']);
                }
            }
        }

        return $this->getParameter('token');
    }

    /**
     * Create OAuth 2.0 access token request.
     *
     * @return \Omnipay\PayPal\Message\RestTokenRequest
     */
    public function createToken()
    {
        return $this->createRequest('\Omnipay\PayPal\Message\RestTokenRequest', array());
    }

    /**
     * Set OAuth 2.0 access token.
     * 
     * @param string $value
     * @return RestGateway provides a fluent interface
     */
    public function setToken($value)
    {
        return $this->setParameter('token', $value);
    }

    /**
     * Get OAuth 2.0 access token expiry time.
     * 
     * @return integer
     */
    public function getTokenExpires()
    {
        return $this->getParameter('tokenExpires');
    }

    /**
     * Set OAuth 2.0 access token expiry time.
     * 
     * @param integer $value
     * @return RestGateway provides a fluent interface
     */
    public function setTokenExpires($value)
    {
        return $this->setParameter('tokenExpires', $value);
    }

    /**
     * Is there a bearer token and is it still valid?
     *
     * @return bool
     */
    public function hasToken()
    {
        $token = $this->getParameter('token');

        $expires = $this->getTokenExpires();
        if (!empty($expires) && !is_numeric($expires)) {
            $expires = strtotime($expires);
        }

        return !empty($token) && time() < $expires;
    }

    /**
     * Create Request
     *
     * This overrides the parent createRequest function ensuring that the OAuth
     * 2.0 access token is passed along with the request data -- unless the
     * request is a RestTokenRequest in which case no token is needed.  If no
     * token is available then a new one is created (e.g. if there has been no
     * token request or the current token has expired).
     *
     * @param string $class
     * @param array $parameters
     * @return \Omnipay\PayPal\Message\AbstractRestRequest
     */
    public function createRequest($class, array $parameters = array())
    {
        if (!$this->hasToken() && $class != '\Omnipay\PayPal\Message\RestTokenRequest') {
            // This will set the internal token parameter which the parent
            // createRequest will find when it calls getParameters().
            $this->getToken(true);
        }

        return parent::createRequest($class, $parameters);
    }

    //
    // Payments -- Create payments or get details of one or more payments.
    //
    // @link https://developer.paypal.com/docs/api/#payments
    //

    /**
     * Create a purchase request.
     *
     * PayPal provides various payment related operations using the /payment
     * resource and related sub-resources. Use payment for direct credit card
     * payments and PayPal account payments. You can also use sub-resources
     * to get payment related details.
     *
     * @link https://developer.paypal.com/docs/api/#create-a-payment
     * @param array $parameters
     * @return \Omnipay\PayPal\Message\RestPurchaseRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PayPal\Message\RestPurchaseRequest', $parameters);
    }

    /**
     * Completes a purchase request.
     *
     * @link https://developer.paypal.com/docs/api/#execute-an-approved-paypal-payment
     * @param array $parameters
     * @return Message\AbstractRestRequest
     */
    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PayPal\Message\RestCompletePurchaseRequest', $parameters);
    }

    // TODO: Look up a payment resource https://developer.paypal.com/docs/api/#look-up-a-payment-resource
    // TODO: Update a payment resource https://developer.paypal.com/docs/api/#update-a-payment-resource
    // TODO: List payment resources https://developer.paypal.com/docs/api/#list-payment-resources

    //
    // Authorizations -- Capture, reauthorize, void and look up authorizations.
    //
    // @link https://developer.paypal.com/docs/api/#authorizations
    // @link https://developer.paypal.com/docs/integration/direct/capture-payment/
    //

    /**
     * Create an authorization request.
     *
     * To collect payment at a later time, first authorize a payment using the /payment resource.
     * You can then capture the payment to complete the sale and collect payment.
     *
     * @link https://developer.paypal.com/docs/integration/direct/capture-payment/#authorize-the-payment
     * @link https://developer.paypal.com/docs/api/#authorizations
     * @param array $parameters
     * @return \Omnipay\PayPal\Message\RestAuthorizeRequest
     */
    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PayPal\Message\RestAuthorizeRequest', $parameters);
    }

    /**
     * Capture an authorization.
     *
     * Use this resource to capture and process a previously created authorization.
     * To use this resource, the original payment call must have the intent set to
     * authorize.
     *
     * @link https://developer.paypal.com/docs/api/#capture-an-authorization
     * @param array $parameters
     * @return \Omnipay\PayPal\Message\RestCaptureRequest
     */
    public function capture(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PayPal\Message\RestCaptureRequest', $parameters);
    }

    // TODO: Authorizations with payment_method == paypal.
    // TODO: Look up and refund captured payments.

    //
    // Sale Transactions -- Get and refund completed payments (sale transactions).
    // @link https://developer.paypal.com/docs/api/#sale-transactions
    //

    /**
     * Fetch a Sale Transaction
     *
     * To get details about completed payments (sale transaction) created by a payment request
     * or to refund a direct sale transaction, PayPal provides the /sale resource and related
     * sub-resources.
     *
     * @link https://developer.paypal.com/docs/api/#sale-transactions
     * @param array $parameters
     * @return \Omnipay\PayPal\Message\RestFetchTransactionRequest
     */
    public function fetchTransaction(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PayPal\Message\RestFetchTransactionRequest', $parameters);
    }

    /**
     * Refund a Sale Transaction
     *
     * To get details about completed payments (sale transaction) created by a payment request
     * or to refund a direct sale transaction, PayPal provides the /sale resource and related
     * sub-resources.
     *
     * @link https://developer.paypal.com/docs/api/#sale-transactions
     * @param array $parameters
     * @return \Omnipay\PayPal\Message\RestRefundRequest
     */
    public function refund(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PayPal\Message\RestRefundRequest', $parameters);
    }

    //
    // Vault: Store customer credit cards securely.
    //
    // @link https://developer.paypal.com/docs/api/#vault
    //

    /**
     * Store a credit card in the vault
     *
     * You can currently use the /vault API to store credit card details
     * with PayPal instead of storing them on your own server. After storing
     * a credit card, you can then pass the credit card id instead of the
     * related credit card details to complete a payment.
     * 
     * @link https://developer.paypal.com/docs/api/#store-a-credit-card
     * @param array $parameters
     * @return \Omnipay\PayPal\Message\RestCreateCardRequest
     */
    public function createCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PayPal\Message\RestCreateCardRequest', $parameters);
    }

    /**
     * Update a credit card in the vault
     *
     * @link https://developer.paypal.com/docs/api/#update-a-stored-credit-card
     * @param array $parameters
     * @return \Omnipay\PayPal\Message\RestUpdateCardRequest
     */
    public function updateCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PayPal\Message\RestUpdateCardRequest', $parameters);
    }

    /**
     * Delete a credit card from the vault.
     *
     * @link https://developer.paypal.com/docs/api/#delete-a-stored-credit-card
     * @param array $parameters
     * @return \Omnipay\PayPal\Message\RestDeleteCardRequest
     */
    public function deleteCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PayPal\Message\RestDeleteCardRequest', $parameters);
    }
}
