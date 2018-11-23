<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Understand;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Rest\Preview\Understand\Assistant\AssistantFallbackActionsList;
use Twilio\Rest\Preview\Understand\Assistant\AssistantInitiationActionsList;
use Twilio\Rest\Preview\Understand\Assistant\DialogueList;
use Twilio\Rest\Preview\Understand\Assistant\FieldTypeList;
use Twilio\Rest\Preview\Understand\Assistant\ModelBuildList;
use Twilio\Rest\Preview\Understand\Assistant\QueryList;
use Twilio\Rest\Preview\Understand\Assistant\StyleSheetList;
use Twilio\Rest\Preview\Understand\Assistant\TaskList;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 * 
 * @property \Twilio\Rest\Preview\Understand\Assistant\FieldTypeList fieldTypes
 * @property \Twilio\Rest\Preview\Understand\Assistant\TaskList tasks
 * @property \Twilio\Rest\Preview\Understand\Assistant\ModelBuildList modelBuilds
 * @property \Twilio\Rest\Preview\Understand\Assistant\QueryList queries
 * @property \Twilio\Rest\Preview\Understand\Assistant\AssistantFallbackActionsList assistantFallbackActions
 * @property \Twilio\Rest\Preview\Understand\Assistant\AssistantInitiationActionsList assistantInitiationActions
 * @property \Twilio\Rest\Preview\Understand\Assistant\DialogueList dialogues
 * @property \Twilio\Rest\Preview\Understand\Assistant\StyleSheetList styleSheet
 * @method \Twilio\Rest\Preview\Understand\Assistant\FieldTypeContext fieldTypes(string $sid)
 * @method \Twilio\Rest\Preview\Understand\Assistant\TaskContext tasks(string $sid)
 * @method \Twilio\Rest\Preview\Understand\Assistant\ModelBuildContext modelBuilds(string $sid)
 * @method \Twilio\Rest\Preview\Understand\Assistant\QueryContext queries(string $sid)
 * @method \Twilio\Rest\Preview\Understand\Assistant\AssistantFallbackActionsContext assistantFallbackActions()
 * @method \Twilio\Rest\Preview\Understand\Assistant\AssistantInitiationActionsContext assistantInitiationActions()
 * @method \Twilio\Rest\Preview\Understand\Assistant\DialogueContext dialogues(string $sid)
 * @method \Twilio\Rest\Preview\Understand\Assistant\StyleSheetContext styleSheet()
 */
class AssistantContext extends InstanceContext {
    protected $_fieldTypes = null;
    protected $_tasks = null;
    protected $_modelBuilds = null;
    protected $_queries = null;
    protected $_assistantFallbackActions = null;
    protected $_assistantInitiationActions = null;
    protected $_dialogues = null;
    protected $_styleSheet = null;

    /**
     * Initialize the AssistantContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $sid A 34 character string that uniquely identifies this
     *                    resource.
     * @return \Twilio\Rest\Preview\Understand\AssistantContext 
     */
    public function __construct(Version $version, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('sid' => $sid, );

        $this->uri = '/Assistants/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a AssistantInstance
     * 
     * @return AssistantInstance Fetched AssistantInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new AssistantInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Update the AssistantInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return AssistantInstance Updated AssistantInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'FriendlyName' => $options['friendlyName'],
            'LogQueries' => Serialize::booleanToString($options['logQueries']),
            'UniqueName' => $options['uniqueName'],
            'CallbackUrl' => $options['callbackUrl'],
            'CallbackEvents' => $options['callbackEvents'],
            'FallbackActions' => Serialize::jsonObject($options['fallbackActions']),
            'InitiationActions' => Serialize::jsonObject($options['initiationActions']),
            'StyleSheet' => Serialize::jsonObject($options['styleSheet']),
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new AssistantInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Deletes the AssistantInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Access the fieldTypes
     * 
     * @return \Twilio\Rest\Preview\Understand\Assistant\FieldTypeList 
     */
    protected function getFieldTypes() {
        if (!$this->_fieldTypes) {
            $this->_fieldTypes = new FieldTypeList($this->version, $this->solution['sid']);
        }

        return $this->_fieldTypes;
    }

    /**
     * Access the tasks
     * 
     * @return \Twilio\Rest\Preview\Understand\Assistant\TaskList 
     */
    protected function getTasks() {
        if (!$this->_tasks) {
            $this->_tasks = new TaskList($this->version, $this->solution['sid']);
        }

        return $this->_tasks;
    }

    /**
     * Access the modelBuilds
     * 
     * @return \Twilio\Rest\Preview\Understand\Assistant\ModelBuildList 
     */
    protected function getModelBuilds() {
        if (!$this->_modelBuilds) {
            $this->_modelBuilds = new ModelBuildList($this->version, $this->solution['sid']);
        }

        return $this->_modelBuilds;
    }

    /**
     * Access the queries
     * 
     * @return \Twilio\Rest\Preview\Understand\Assistant\QueryList 
     */
    protected function getQueries() {
        if (!$this->_queries) {
            $this->_queries = new QueryList($this->version, $this->solution['sid']);
        }

        return $this->_queries;
    }

    /**
     * Access the assistantFallbackActions
     * 
     * @return \Twilio\Rest\Preview\Understand\Assistant\AssistantFallbackActionsList 
     */
    protected function getAssistantFallbackActions() {
        if (!$this->_assistantFallbackActions) {
            $this->_assistantFallbackActions = new AssistantFallbackActionsList(
                $this->version,
                $this->solution['sid']
            );
        }

        return $this->_assistantFallbackActions;
    }

    /**
     * Access the assistantInitiationActions
     * 
     * @return \Twilio\Rest\Preview\Understand\Assistant\AssistantInitiationActionsList 
     */
    protected function getAssistantInitiationActions() {
        if (!$this->_assistantInitiationActions) {
            $this->_assistantInitiationActions = new AssistantInitiationActionsList(
                $this->version,
                $this->solution['sid']
            );
        }

        return $this->_assistantInitiationActions;
    }

    /**
     * Access the dialogues
     * 
     * @return \Twilio\Rest\Preview\Understand\Assistant\DialogueList 
     */
    protected function getDialogues() {
        if (!$this->_dialogues) {
            $this->_dialogues = new DialogueList($this->version, $this->solution['sid']);
        }

        return $this->_dialogues;
    }

    /**
     * Access the styleSheet
     * 
     * @return \Twilio\Rest\Preview\Understand\Assistant\StyleSheetList 
     */
    protected function getStyleSheet() {
        if (!$this->_styleSheet) {
            $this->_styleSheet = new StyleSheetList($this->version, $this->solution['sid']);
        }

        return $this->_styleSheet;
    }

    /**
     * Magic getter to lazy load subresources
     * 
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws \Twilio\Exceptions\TwilioException For unknown subresources
     */
    public function __get($name) {
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown subresource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     * 
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws \Twilio\Exceptions\TwilioException For unknown resource
     */
    public function __call($name, $arguments) {
        $property = $this->$name;
        if (method_exists($property, 'getContext')) {
            return call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
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
        return '[Twilio.Preview.Understand.AssistantContext ' . implode(' ', $context) . ']';
    }
}