<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Serverless\V1\Service\Environment;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class DeploymentContext extends InstanceContext {
    /**
     * Initialize the DeploymentContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $serviceSid The SID of the Service to fetch the Deployment
     *                           resource from
     * @param string $environmentSid The SID of the environment used by the
     *                               Deployment to fetch
     * @param string $sid The SID that identifies the Deployment resource to fetch
     * @return \Twilio\Rest\Serverless\V1\Service\Environment\DeploymentContext
     */
    public function __construct(Version $version, $serviceSid, $environmentSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array(
            'serviceSid' => $serviceSid,
            'environmentSid' => $environmentSid,
            'sid' => $sid,
        );

        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/Environments/' . \rawurlencode($environmentSid) . '/Deployments/' . \rawurlencode($sid) . '';
    }

    /**
     * Fetch a DeploymentInstance
     *
     * @return DeploymentInstance Fetched DeploymentInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new DeploymentInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['environmentSid'],
            $this->solution['sid']
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Serverless.V1.DeploymentContext ' . \implode(' ', $context) . ']';
    }
}