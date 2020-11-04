<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Options;
use Twilio\Values;

abstract class ConnectAppOptions {
    /**
     * @param string $authorizeRedirectUrl The URL to redirect the user to after
     *                                     authorization
     * @param string $companyName The company name to set for the Connect App
     * @param string $deauthorizeCallbackMethod The HTTP method to use when calling
     *                                          deauthorize_callback_url
     * @param string $deauthorizeCallbackUrl The URL to call to de-authorize the
     *                                       Connect App
     * @param string $description A description of the Connect App
     * @param string $friendlyName A string to describe the resource
     * @param string $homepageUrl A public URL where users can obtain more
     *                            information
     * @param string $permissions The set of permissions that your ConnectApp will
     *                            request
     * @return UpdateConnectAppOptions Options builder
     */
    public static function update($authorizeRedirectUrl = Values::NONE, $companyName = Values::NONE, $deauthorizeCallbackMethod = Values::NONE, $deauthorizeCallbackUrl = Values::NONE, $description = Values::NONE, $friendlyName = Values::NONE, $homepageUrl = Values::NONE, $permissions = Values::NONE) {
        return new UpdateConnectAppOptions($authorizeRedirectUrl, $companyName, $deauthorizeCallbackMethod, $deauthorizeCallbackUrl, $description, $friendlyName, $homepageUrl, $permissions);
    }
}

class UpdateConnectAppOptions extends Options {
    /**
     * @param string $authorizeRedirectUrl The URL to redirect the user to after
     *                                     authorization
     * @param string $companyName The company name to set for the Connect App
     * @param string $deauthorizeCallbackMethod The HTTP method to use when calling
     *                                          deauthorize_callback_url
     * @param string $deauthorizeCallbackUrl The URL to call to de-authorize the
     *                                       Connect App
     * @param string $description A description of the Connect App
     * @param string $friendlyName A string to describe the resource
     * @param string $homepageUrl A public URL where users can obtain more
     *                            information
     * @param string $permissions The set of permissions that your ConnectApp will
     *                            request
     */
    public function __construct($authorizeRedirectUrl = Values::NONE, $companyName = Values::NONE, $deauthorizeCallbackMethod = Values::NONE, $deauthorizeCallbackUrl = Values::NONE, $description = Values::NONE, $friendlyName = Values::NONE, $homepageUrl = Values::NONE, $permissions = Values::NONE) {
        $this->options['authorizeRedirectUrl'] = $authorizeRedirectUrl;
        $this->options['companyName'] = $companyName;
        $this->options['deauthorizeCallbackMethod'] = $deauthorizeCallbackMethod;
        $this->options['deauthorizeCallbackUrl'] = $deauthorizeCallbackUrl;
        $this->options['description'] = $description;
        $this->options['friendlyName'] = $friendlyName;
        $this->options['homepageUrl'] = $homepageUrl;
        $this->options['permissions'] = $permissions;
    }

    /**
     * The URL to redirect the user to after we authenticate the user and obtain authorization to access the Connect App.
     *
     * @param string $authorizeRedirectUrl The URL to redirect the user to after
     *                                     authorization
     * @return $this Fluent Builder
     */
    public function setAuthorizeRedirectUrl($authorizeRedirectUrl) {
        $this->options['authorizeRedirectUrl'] = $authorizeRedirectUrl;
        return $this;
    }

    /**
     * The company name to set for the Connect App.
     *
     * @param string $companyName The company name to set for the Connect App
     * @return $this Fluent Builder
     */
    public function setCompanyName($companyName) {
        $this->options['companyName'] = $companyName;
        return $this;
    }

    /**
     * The HTTP method to use when calling `deauthorize_callback_url`.
     *
     * @param string $deauthorizeCallbackMethod The HTTP method to use when calling
     *                                          deauthorize_callback_url
     * @return $this Fluent Builder
     */
    public function setDeauthorizeCallbackMethod($deauthorizeCallbackMethod) {
        $this->options['deauthorizeCallbackMethod'] = $deauthorizeCallbackMethod;
        return $this;
    }

    /**
     * The URL to call using the `deauthorize_callback_method` to de-authorize the Connect App.
     *
     * @param string $deauthorizeCallbackUrl The URL to call to de-authorize the
     *                                       Connect App
     * @return $this Fluent Builder
     */
    public function setDeauthorizeCallbackUrl($deauthorizeCallbackUrl) {
        $this->options['deauthorizeCallbackUrl'] = $deauthorizeCallbackUrl;
        return $this;
    }

    /**
     * A description of the Connect App.
     *
     * @param string $description A description of the Connect App
     * @return $this Fluent Builder
     */
    public function setDescription($description) {
        $this->options['description'] = $description;
        return $this;
    }

    /**
     * A descriptive string that you create to describe the resource. It can be up to 64 characters long.
     *
     * @param string $friendlyName A string to describe the resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * A public URL where users can obtain more information about this Connect App.
     *
     * @param string $homepageUrl A public URL where users can obtain more
     *                            information
     * @return $this Fluent Builder
     */
    public function setHomepageUrl($homepageUrl) {
        $this->options['homepageUrl'] = $homepageUrl;
        return $this;
    }

    /**
     * A comma-separated list of the permissions you will request from the users of this ConnectApp.  Can include: `get-all` and `post-all`.
     *
     * @param string $permissions The set of permissions that your ConnectApp will
     *                            request
     * @return $this Fluent Builder
     */
    public function setPermissions($permissions) {
        $this->options['permissions'] = $permissions;
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
        return '[Twilio.Api.V2010.UpdateConnectAppOptions ' . \implode(' ', $options) . ']';
    }
}