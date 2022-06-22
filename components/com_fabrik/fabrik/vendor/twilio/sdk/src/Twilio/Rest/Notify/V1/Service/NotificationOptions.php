<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Notify\V1\Service;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
abstract class NotificationOptions {
    /**
     * @param string $identity The `identity` value that identifies the new
     *                         resource's User
     * @param string $tag A tag that selects the Bindings to notify
     * @param string $body The notification body text
     * @param string $priority The priority of the notification
     * @param int $ttl How long, in seconds, the notification is valid
     * @param string $title The notification title
     * @param string $sound The name of the sound to be played for the notification
     * @param string $action The actions to display for the notification
     * @param array $data The custom key-value pairs of the notification's payload
     * @param array $apn The APNS-specific payload that overrides corresponding
     *                   attributes in a generic payload for APNS Bindings
     * @param array $gcm The GCM-specific payload that overrides corresponding
     *                   attributes in generic payload for GCM Bindings
     * @param array $sms The SMS-specific payload that overrides corresponding
     *                   attributes in generic payload for SMS Bindings
     * @param array $facebookMessenger Deprecated
     * @param array $fcm The FCM-specific payload that overrides corresponding
     *                   attributes in generic payload for FCM Bindings
     * @param string $segment A Segment to notify
     * @param array $alexa Deprecated
     * @param string $toBinding The destination address specified as a JSON string
     * @param string $deliveryCallbackUrl URL to send webhooks
     * @return CreateNotificationOptions Options builder
     */
    public static function create($identity = Values::NONE, $tag = Values::NONE, $body = Values::NONE, $priority = Values::NONE, $ttl = Values::NONE, $title = Values::NONE, $sound = Values::NONE, $action = Values::NONE, $data = Values::NONE, $apn = Values::NONE, $gcm = Values::NONE, $sms = Values::NONE, $facebookMessenger = Values::NONE, $fcm = Values::NONE, $segment = Values::NONE, $alexa = Values::NONE, $toBinding = Values::NONE, $deliveryCallbackUrl = Values::NONE) {
        return new CreateNotificationOptions($identity, $tag, $body, $priority, $ttl, $title, $sound, $action, $data, $apn, $gcm, $sms, $facebookMessenger, $fcm, $segment, $alexa, $toBinding, $deliveryCallbackUrl);
    }
}

class CreateNotificationOptions extends Options {
    /**
     * @param string $identity The `identity` value that identifies the new
     *                         resource's User
     * @param string $tag A tag that selects the Bindings to notify
     * @param string $body The notification body text
     * @param string $priority The priority of the notification
     * @param int $ttl How long, in seconds, the notification is valid
     * @param string $title The notification title
     * @param string $sound The name of the sound to be played for the notification
     * @param string $action The actions to display for the notification
     * @param array $data The custom key-value pairs of the notification's payload
     * @param array $apn The APNS-specific payload that overrides corresponding
     *                   attributes in a generic payload for APNS Bindings
     * @param array $gcm The GCM-specific payload that overrides corresponding
     *                   attributes in generic payload for GCM Bindings
     * @param array $sms The SMS-specific payload that overrides corresponding
     *                   attributes in generic payload for SMS Bindings
     * @param array $facebookMessenger Deprecated
     * @param array $fcm The FCM-specific payload that overrides corresponding
     *                   attributes in generic payload for FCM Bindings
     * @param string $segment A Segment to notify
     * @param array $alexa Deprecated
     * @param string $toBinding The destination address specified as a JSON string
     * @param string $deliveryCallbackUrl URL to send webhooks
     */
    public function __construct($identity = Values::NONE, $tag = Values::NONE, $body = Values::NONE, $priority = Values::NONE, $ttl = Values::NONE, $title = Values::NONE, $sound = Values::NONE, $action = Values::NONE, $data = Values::NONE, $apn = Values::NONE, $gcm = Values::NONE, $sms = Values::NONE, $facebookMessenger = Values::NONE, $fcm = Values::NONE, $segment = Values::NONE, $alexa = Values::NONE, $toBinding = Values::NONE, $deliveryCallbackUrl = Values::NONE) {
        $this->options['identity'] = $identity;
        $this->options['tag'] = $tag;
        $this->options['body'] = $body;
        $this->options['priority'] = $priority;
        $this->options['ttl'] = $ttl;
        $this->options['title'] = $title;
        $this->options['sound'] = $sound;
        $this->options['action'] = $action;
        $this->options['data'] = $data;
        $this->options['apn'] = $apn;
        $this->options['gcm'] = $gcm;
        $this->options['sms'] = $sms;
        $this->options['facebookMessenger'] = $facebookMessenger;
        $this->options['fcm'] = $fcm;
        $this->options['segment'] = $segment;
        $this->options['alexa'] = $alexa;
        $this->options['toBinding'] = $toBinding;
        $this->options['deliveryCallbackUrl'] = $deliveryCallbackUrl;
    }

    /**
     * The `identity` value that uniquely identifies the new resource's [User](https://www.twilio.com/docs/chat/rest/user-resource) within the [Service](https://www.twilio.com/docs/notify/api/service-resource). Delivery will be attempted only to Bindings with an Identity in this list. No more than 20 items are allowed in this list.
     *
     * @param string $identity The `identity` value that identifies the new
     *                         resource's User
     * @return $this Fluent Builder
     */
    public function setIdentity($identity) {
        $this->options['identity'] = $identity;
        return $this;
    }

    /**
     * A tag that selects the Bindings to notify. Repeat this parameter to specify more than one tag, up to a total of 5 tags. The implicit tag `all` is available to notify all Bindings in a Service instance. Similarly, the implicit tags `apn`, `fcm`, `gcm`, `sms` and `facebook-messenger` are available to notify all Bindings in a specific channel.
     *
     * @param string $tag A tag that selects the Bindings to notify
     * @return $this Fluent Builder
     */
    public function setTag($tag) {
        $this->options['tag'] = $tag;
        return $this;
    }

    /**
     * The notification text. For FCM and GCM, translates to `data.twi_body`. For APNS, translates to `aps.alert.body`. For SMS, translates to `body`. SMS requires either this `body` value, or `media_urls` attribute defined in the `sms` parameter of the notification.
     *
     * @param string $body The notification body text
     * @return $this Fluent Builder
     */
    public function setBody($body) {
        $this->options['body'] = $body;
        return $this;
    }

    /**
     * The priority of the notification. Can be: `low` or `high` and the default is `high`. A value of `low` optimizes the client app's battery consumption; however, notifications may be delivered with unspecified delay. For FCM and GCM, `low` priority is the same as `Normal` priority. For APNS `low` priority is the same as `5`. A value of `high` sends the notification immediately, and can wake up a sleeping device. For FCM and GCM, `high` is the same as `High` priority. For APNS, `high` is a priority `10`. SMS does not support this property.
     *
     * @param string $priority The priority of the notification
     * @return $this Fluent Builder
     */
    public function setPriority($priority) {
        $this->options['priority'] = $priority;
        return $this;
    }

    /**
     * How long, in seconds, the notification is valid. Can be an integer between 0 and 2,419,200, which is 4 weeks, the default and the maximum supported time to live (TTL). Delivery should be attempted if the device is offline until the TTL elapses. Zero means that the notification delivery is attempted immediately, only once, and is not stored for future delivery. SMS does not support this property.
     *
     * @param int $ttl How long, in seconds, the notification is valid
     * @return $this Fluent Builder
     */
    public function setTtl($ttl) {
        $this->options['ttl'] = $ttl;
        return $this;
    }

    /**
     * The notification title. For FCM and GCM, this translates to the `data.twi_title` value. For APNS, this translates to the `aps.alert.title` value. SMS does not support this property. This field is not visible on iOS phones and tablets but appears on Apple Watch and Android devices.
     *
     * @param string $title The notification title
     * @return $this Fluent Builder
     */
    public function setTitle($title) {
        $this->options['title'] = $title;
        return $this;
    }

    /**
     * The name of the sound to be played for the notification. For FCM and GCM, this Translates to `data.twi_sound`.  For APNS, this translates to `aps.sound`.  SMS does not support this property.
     *
     * @param string $sound The name of the sound to be played for the notification
     * @return $this Fluent Builder
     */
    public function setSound($sound) {
        $this->options['sound'] = $sound;
        return $this;
    }

    /**
     * The actions to display for the notification. For APNS, translates to the `aps.category` value. For GCM, translates to the `data.twi_action` value. For SMS, this parameter is not supported and is omitted from deliveries to those channels.
     *
     * @param string $action The actions to display for the notification
     * @return $this Fluent Builder
     */
    public function setAction($action) {
        $this->options['action'] = $action;
        return $this;
    }

    /**
     * The custom key-value pairs of the notification's payload. For FCM and GCM, this value translates to `data` in the FCM and GCM payloads. FCM and GCM [reserve certain keys](https://firebase.google.com/docs/cloud-messaging/http-server-ref) that cannot be used in those channels. For APNS, attributes of `data` are inserted into the APNS payload as custom properties outside of the `aps` dictionary. In all channels, we reserve keys that start with `twi_` for future use. Custom keys that start with `twi_` are not allowed and are rejected as 400 Bad request with no delivery attempted. For SMS, this parameter is not supported and is omitted from deliveries to those channels.
     *
     * @param array $data The custom key-value pairs of the notification's payload
     * @return $this Fluent Builder
     */
    public function setData($data) {
        $this->options['data'] = $data;
        return $this;
    }

    /**
     * The APNS-specific payload that overrides corresponding attributes in the generic payload for APNS Bindings. This property maps to the APNS `Payload` item, therefore the `aps` key must be used to change standard attributes. Adds custom key-value pairs to the root of the dictionary. See the [APNS documentation](https://developer.apple.com/library/content/documentation/NetworkingInternet/Conceptual/RemoteNotificationsPG/CommunicatingwithAPNs.html) for more details. We reserve keys that start with `twi_` for future use. Custom keys that start with `twi_` are not allowed.
     *
     * @param array $apn The APNS-specific payload that overrides corresponding
     *                   attributes in a generic payload for APNS Bindings
     * @return $this Fluent Builder
     */
    public function setApn($apn) {
        $this->options['apn'] = $apn;
        return $this;
    }

    /**
     * The GCM-specific payload that overrides corresponding attributes in the generic payload for GCM Bindings.  This property maps to the root JSON dictionary. See the [GCM documentation](https://firebase.google.com/docs/cloud-messaging/http-server-ref) for more details. Target parameters `to`, `registration_ids`, and `notification_key` are not allowed. We reserve keys that start with `twi_` for future use. Custom keys that start with `twi_` are not allowed. GCM also [reserves certain keys](https://firebase.google.com/docs/cloud-messaging/http-server-ref).
     *
     * @param array $gcm The GCM-specific payload that overrides corresponding
     *                   attributes in generic payload for GCM Bindings
     * @return $this Fluent Builder
     */
    public function setGcm($gcm) {
        $this->options['gcm'] = $gcm;
        return $this;
    }

    /**
     * The SMS-specific payload that overrides corresponding attributes in the generic payload for SMS Bindings.  Each attribute in this value maps to the corresponding `form` parameter of the Twilio [Message](https://www.twilio.com/docs/sms/send-messages) resource.  These parameters of the Message resource are supported in snake case format: `body`, `media_urls`, `status_callback`, and `max_price`.  The `status_callback` parameter overrides the corresponding parameter in the messaging service, if configured. The `media_urls` property expects a JSON array.
     *
     * @param array $sms The SMS-specific payload that overrides corresponding
     *                   attributes in generic payload for SMS Bindings
     * @return $this Fluent Builder
     */
    public function setSms($sms) {
        $this->options['sms'] = $sms;
        return $this;
    }

    /**
     * Deprecated.
     *
     * @param array $facebookMessenger Deprecated
     * @return $this Fluent Builder
     */
    public function setFacebookMessenger($facebookMessenger) {
        $this->options['facebookMessenger'] = $facebookMessenger;
        return $this;
    }

    /**
     * The FCM-specific payload that overrides corresponding attributes in the generic payload for FCM Bindings. This property maps to the root JSON dictionary. See the [FCM documentation](https://firebase.google.com/docs/cloud-messaging/http-server-ref#downstream) for more details. Target parameters `to`, `registration_ids`, `condition`, and `notification_key` are not allowed in this parameter. We reserve keys that start with `twi_` for future use. Custom keys that start with `twi_` are not allowed. FCM also [reserves certain keys](https://firebase.google.com/docs/cloud-messaging/http-server-ref), which cannot be used in that channel.
     *
     * @param array $fcm The FCM-specific payload that overrides corresponding
     *                   attributes in generic payload for FCM Bindings
     * @return $this Fluent Builder
     */
    public function setFcm($fcm) {
        $this->options['fcm'] = $fcm;
        return $this;
    }

    /**
     * The Segment resource is deprecated. Use the `tag` parameter, instead.
     *
     * @param string $segment A Segment to notify
     * @return $this Fluent Builder
     */
    public function setSegment($segment) {
        $this->options['segment'] = $segment;
        return $this;
    }

    /**
     * Deprecated.
     *
     * @param array $alexa Deprecated
     * @return $this Fluent Builder
     */
    public function setAlexa($alexa) {
        $this->options['alexa'] = $alexa;
        return $this;
    }

    /**
     * The destination address specified as a JSON string.  Multiple `to_binding` parameters can be included but the total size of the request entity should not exceed 1MB. This is typically sufficient for 10,000 phone numbers.
     *
     * @param string $toBinding The destination address specified as a JSON string
     * @return $this Fluent Builder
     */
    public function setToBinding($toBinding) {
        $this->options['toBinding'] = $toBinding;
        return $this;
    }

    /**
     * URL to send webhooks.
     *
     * @param string $deliveryCallbackUrl URL to send webhooks
     * @return $this Fluent Builder
     */
    public function setDeliveryCallbackUrl($deliveryCallbackUrl) {
        $this->options['deliveryCallbackUrl'] = $deliveryCallbackUrl;
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
        return '[Twilio.Notify.V1.CreateNotificationOptions ' . \implode(' ', $options) . ']';
    }
}