<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Sync\V1\Service\SyncMap;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
abstract class SyncMapItemOptions {
    /**
     * @param int $ttl An alias for item_ttl
     * @param int $itemTtl How long, in seconds, before the Map Item expires
     * @param int $collectionTtl How long, in seconds, before the Map Item's parent
     *                           Sync Map expires and is deleted
     * @return CreateSyncMapItemOptions Options builder
     */
    public static function create($ttl = Values::NONE, $itemTtl = Values::NONE, $collectionTtl = Values::NONE) {
        return new CreateSyncMapItemOptions($ttl, $itemTtl, $collectionTtl);
    }

    /**
     * @param string $order How to order the Map Items returned by their key value
     * @param string $from The index of the first Sync Map Item resource to read
     * @param string $bounds Whether to include the Map Item referenced by the from
     *                       parameter
     * @return ReadSyncMapItemOptions Options builder
     */
    public static function read($order = Values::NONE, $from = Values::NONE, $bounds = Values::NONE) {
        return new ReadSyncMapItemOptions($order, $from, $bounds);
    }

    /**
     * @param array $data A JSON string that represents an arbitrary, schema-less
     *                    object that the Map Item stores
     * @param int $ttl An alias for item_ttl
     * @param int $itemTtl How long, in seconds, before the Map Item expires
     * @param int $collectionTtl How long, in seconds, before the Map Item's parent
     *                           Sync Map expires and is deleted
     * @return UpdateSyncMapItemOptions Options builder
     */
    public static function update($data = Values::NONE, $ttl = Values::NONE, $itemTtl = Values::NONE, $collectionTtl = Values::NONE) {
        return new UpdateSyncMapItemOptions($data, $ttl, $itemTtl, $collectionTtl);
    }
}

class CreateSyncMapItemOptions extends Options {
    /**
     * @param int $ttl An alias for item_ttl
     * @param int $itemTtl How long, in seconds, before the Map Item expires
     * @param int $collectionTtl How long, in seconds, before the Map Item's parent
     *                           Sync Map expires and is deleted
     */
    public function __construct($ttl = Values::NONE, $itemTtl = Values::NONE, $collectionTtl = Values::NONE) {
        $this->options['ttl'] = $ttl;
        $this->options['itemTtl'] = $itemTtl;
        $this->options['collectionTtl'] = $collectionTtl;
    }

    /**
     * An alias for `item_ttl`. If both parameters are provided, this value is ignored.
     *
     * @param int $ttl An alias for item_ttl
     * @return $this Fluent Builder
     */
    public function setTtl($ttl) {
        $this->options['ttl'] = $ttl;
        return $this;
    }

    /**
     * How long, in seconds, before the Map Item expires (time-to-live) and is deleted.  Can be an integer from 0 to 31,536,000 (1 year). The default value is `0`, which means the Map Item does not expire.  The Map Item will be deleted automatically after it expires, but there can be a delay between the expiration time and the resources's deletion.
     *
     * @param int $itemTtl How long, in seconds, before the Map Item expires
     * @return $this Fluent Builder
     */
    public function setItemTtl($itemTtl) {
        $this->options['itemTtl'] = $itemTtl;
        return $this;
    }

    /**
     * How long, in seconds, before the Map Item's parent Sync Map expires (time-to-live) and is deleted.  Can be an integer from 0 to 31,536,000 (1 year). The default value is `0`, which means the parent Sync Map does not expire. The Sync Map will be deleted automatically after it expires, but there can be a delay between the expiration time and the resources's deletion.
     *
     * @param int $collectionTtl How long, in seconds, before the Map Item's parent
     *                           Sync Map expires and is deleted
     * @return $this Fluent Builder
     */
    public function setCollectionTtl($collectionTtl) {
        $this->options['collectionTtl'] = $collectionTtl;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Sync.V1.CreateSyncMapItemOptions ' . \implode(' ', $options) . ']';
    }
}

class ReadSyncMapItemOptions extends Options {
    /**
     * @param string $order How to order the Map Items returned by their key value
     * @param string $from The index of the first Sync Map Item resource to read
     * @param string $bounds Whether to include the Map Item referenced by the from
     *                       parameter
     */
    public function __construct($order = Values::NONE, $from = Values::NONE, $bounds = Values::NONE) {
        $this->options['order'] = $order;
        $this->options['from'] = $from;
        $this->options['bounds'] = $bounds;
    }

    /**
     * How to order the Map Items returned by their `key` value. Can be: `asc` (ascending) or `desc` (descending) and the default is ascending. Map Items are [ordered lexicographically](https://en.wikipedia.org/wiki/Lexicographical_order) by Item key.
     *
     * @param string $order How to order the Map Items returned by their key value
     * @return $this Fluent Builder
     */
    public function setOrder($order) {
        $this->options['order'] = $order;
        return $this;
    }

    /**
     * The `key` of the first Sync Map Item resource to read. See also `bounds`.
     *
     * @param string $from The index of the first Sync Map Item resource to read
     * @return $this Fluent Builder
     */
    public function setFrom($from) {
        $this->options['from'] = $from;
        return $this;
    }

    /**
     * Whether to include the Map Item referenced by the `from` parameter. Can be: `inclusive` to include the Map Item referenced by the `from` parameter or `exclusive` to start with the next Map Item. The default value is `inclusive`.
     *
     * @param string $bounds Whether to include the Map Item referenced by the from
     *                       parameter
     * @return $this Fluent Builder
     */
    public function setBounds($bounds) {
        $this->options['bounds'] = $bounds;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Sync.V1.ReadSyncMapItemOptions ' . \implode(' ', $options) . ']';
    }
}

class UpdateSyncMapItemOptions extends Options {
    /**
     * @param array $data A JSON string that represents an arbitrary, schema-less
     *                    object that the Map Item stores
     * @param int $ttl An alias for item_ttl
     * @param int $itemTtl How long, in seconds, before the Map Item expires
     * @param int $collectionTtl How long, in seconds, before the Map Item's parent
     *                           Sync Map expires and is deleted
     */
    public function __construct($data = Values::NONE, $ttl = Values::NONE, $itemTtl = Values::NONE, $collectionTtl = Values::NONE) {
        $this->options['data'] = $data;
        $this->options['ttl'] = $ttl;
        $this->options['itemTtl'] = $itemTtl;
        $this->options['collectionTtl'] = $collectionTtl;
    }

    /**
     * A JSON string that represents an arbitrary, schema-less object that the Map Item stores. Can be up to 16KB in length.
     *
     * @param array $data A JSON string that represents an arbitrary, schema-less
     *                    object that the Map Item stores
     * @return $this Fluent Builder
     */
    public function setData($data) {
        $this->options['data'] = $data;
        return $this;
    }

    /**
     * An alias for `item_ttl`. If both parameters are provided, this value is ignored.
     *
     * @param int $ttl An alias for item_ttl
     * @return $this Fluent Builder
     */
    public function setTtl($ttl) {
        $this->options['ttl'] = $ttl;
        return $this;
    }

    /**
     * How long, in seconds, before the Map Item expires (time-to-live) and is deleted.  Can be an integer from 0 to 31,536,000 (1 year). The default value is `0`, which means the Map Item does not expire. The Map Item will be deleted automatically after it expires, but there can be a delay between the expiration time and the resources's deletion.
     *
     * @param int $itemTtl How long, in seconds, before the Map Item expires
     * @return $this Fluent Builder
     */
    public function setItemTtl($itemTtl) {
        $this->options['itemTtl'] = $itemTtl;
        return $this;
    }

    /**
     * How long, in seconds, before the Map Item's parent Sync Map expires (time-to-live) and is deleted.  Can be an integer from 0 to 31,536,000 (1 year). The default value is `0`, which means the parent Sync Map does not expire. This parameter can only be used when the Map Item's `data` or `ttl` is updated in the same request. The Sync Map will be deleted automatically after it expires, but there can be a delay between the expiration time and the resources's deletion.
     *
     * @param int $collectionTtl How long, in seconds, before the Map Item's parent
     *                           Sync Map expires and is deleted
     * @return $this Fluent Builder
     */
    public function setCollectionTtl($collectionTtl) {
        $this->options['collectionTtl'] = $collectionTtl;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Sync.V1.UpdateSyncMapItemOptions ' . \implode(' ', $options) . ']';
    }
}