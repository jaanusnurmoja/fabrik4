<?php

namespace Stripe;

/**
 * Class Source
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property string $client_secret
 * @property mixed $code_verification
 * @property int $created
 * @property string $currency
 * @property string $flow
 * @property bool $livemode
 * @property StripeObject $metadata
 * @property mixed $owner
 * @property mixed $receiver
 * @property mixed $redirect
 * @property string $statement_descriptor
 * @property string $status
 * @property string $type
 * @property string $usage
 *
 * @package Stripe
 */
class Source extends ApiResource
{

    const OBJECT_NAME = "source";

    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    /**
     * Possible string representations of source flows.
     * @link https://stripe.com/docs/api#source_object-flow
     */
    const FLOW_REDIRECT          = 'redirect';
    const FLOW_RECEIVER          = 'receiver';
    const FLOW_CODE_VERIFICATION = 'code_verification';
    const FLOW_NONE              = 'none';

    /**
     * Possible string representations of source statuses.
     * @link https://stripe.com/docs/api#source_object-status
     */
    const STATUS_CANCELED   = 'canceled';
    const STATUS_CHARGEABLE = 'chargeable';
    const STATUS_CONSUMED   = 'consumed';
    const STATUS_FAILED     = 'failed';
    const STATUS_PENDING    = 'pending';

    /**
     * Possible string representations of source usage.
     * @link https://stripe.com/docs/api#source_object-usage
     */
    const USAGE_REUSABLE   = 'reusable';
    const USAGE_SINGLE_USE = 'single_use';

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Source The detached source.
     */
    public function detach($params = null, $options = null)
    {
        self::_validateParams($params);

        $id = $this['id'];
        if (!$id) {
            $class = get_class($this);
            $msg = "Could not determine which URL to request: $class instance "
             . "has invalid ID: $id";
            throw new Error\InvalidRequest($msg, null);
        }

        if ($this['customer']) {
            $base = Customer::classUrl();
            $parentExtn = urlencode(Util\Util::utf8($this['customer']));
            $extn = urlencode(Util\Util::utf8($id));
            $url = "$base/$parentExtn/sources/$extn";

            list($response, $opts) = $this->_request('delete', $url, $params, $options);
            $this->refreshFrom($response, $opts);
            return $this;
        } else {
            $message = "This source object does not appear to be currently attached "
               . "to a customer object.";
            throw new Error\Api($message);
        }
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Source The detached source.
     *
     * @deprecated Use the `detach` method instead.
     */
    public function delete($params = null, $options = null)
    {
        $this->detach($params, $options);
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Collection The list of source transactions.
     */
    public function sourceTransactions($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/source_transactions';
        list($response, $opts) = $this->_request('get', $url, $params, $options);
        $obj = Util\Util::convertToStripeObject($response, $opts);
        $obj->setLastResponse($response);
        return $obj;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Source The verified source.
     */
    public function verify($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/verify';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}
