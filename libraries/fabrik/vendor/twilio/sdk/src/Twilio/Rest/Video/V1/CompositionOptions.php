<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Video\V1;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class CompositionOptions {
    /**
     * @param string $status Read only Composition resources with this status
     * @param \DateTime $dateCreatedAfter Read only Composition resources created
     *                                    on or after this [ISO
     *                                    8601](https://en.wikipedia.org/wiki/ISO_8601) date-time with time zone
     * @param \DateTime $dateCreatedBefore Read only Composition resources created
     *                                     before this ISO 8601 date-time with time
     *                                     zone
     * @param string $roomSid Read only Composition resources with this Room SID
     * @return ReadCompositionOptions Options builder
     */
    public static function read($status = Values::NONE, $dateCreatedAfter = Values::NONE, $dateCreatedBefore = Values::NONE, $roomSid = Values::NONE) {
        return new ReadCompositionOptions($status, $dateCreatedAfter, $dateCreatedBefore, $roomSid);
    }

    /**
     * @param array $videoLayout An object that describes the video layout of the
     *                           composition
     * @param string $audioSources An array of track names from the same group room
     *                             to merge
     * @param string $audioSourcesExcluded An array of track names to exclude
     * @param string $resolution A string that describes the columns (width) and
     *                           rows (height) of the generated composed video in
     *                           pixels
     * @param string $format The container format of the composition's media files
     * @param string $statusCallback The URL we should call to send status
     *                               information to your application
     * @param string $statusCallbackMethod The HTTP method we should use to call
     *                                     status_callback
     * @param bool $trim Whether to clip the intervals where there is no active
     *                   media in the composition
     * @return CreateCompositionOptions Options builder
     */
    public static function create($videoLayout = Values::NONE, $audioSources = Values::NONE, $audioSourcesExcluded = Values::NONE, $resolution = Values::NONE, $format = Values::NONE, $statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE, $trim = Values::NONE) {
        return new CreateCompositionOptions($videoLayout, $audioSources, $audioSourcesExcluded, $resolution, $format, $statusCallback, $statusCallbackMethod, $trim);
    }
}

class ReadCompositionOptions extends Options {
    /**
     * @param string $status Read only Composition resources with this status
     * @param \DateTime $dateCreatedAfter Read only Composition resources created
     *                                    on or after this [ISO
     *                                    8601](https://en.wikipedia.org/wiki/ISO_8601) date-time with time zone
     * @param \DateTime $dateCreatedBefore Read only Composition resources created
     *                                     before this ISO 8601 date-time with time
     *                                     zone
     * @param string $roomSid Read only Composition resources with this Room SID
     */
    public function __construct($status = Values::NONE, $dateCreatedAfter = Values::NONE, $dateCreatedBefore = Values::NONE, $roomSid = Values::NONE) {
        $this->options['status'] = $status;
        $this->options['dateCreatedAfter'] = $dateCreatedAfter;
        $this->options['dateCreatedBefore'] = $dateCreatedBefore;
        $this->options['roomSid'] = $roomSid;
    }

    /**
     * Read only Composition resources with this status. Can be: `enqueued`, `processing`, `completed`, `deleted`, or `failed`.
     *
     * @param string $status Read only Composition resources with this status
     * @return $this Fluent Builder
     */
    public function setStatus($status) {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * Read only Composition resources created on or after this [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) date-time with time zone.
     *
     * @param \DateTime $dateCreatedAfter Read only Composition resources created
     *                                    on or after this [ISO
     *                                    8601](https://en.wikipedia.org/wiki/ISO_8601) date-time with time zone
     * @return $this Fluent Builder
     */
    public function setDateCreatedAfter($dateCreatedAfter) {
        $this->options['dateCreatedAfter'] = $dateCreatedAfter;
        return $this;
    }

    /**
     * Read only Composition resources created before this ISO 8601 date-time with time zone.
     *
     * @param \DateTime $dateCreatedBefore Read only Composition resources created
     *                                     before this ISO 8601 date-time with time
     *                                     zone
     * @return $this Fluent Builder
     */
    public function setDateCreatedBefore($dateCreatedBefore) {
        $this->options['dateCreatedBefore'] = $dateCreatedBefore;
        return $this;
    }

    /**
     * Read only Composition resources with this Room SID.
     *
     * @param string $roomSid Read only Composition resources with this Room SID
     * @return $this Fluent Builder
     */
    public function setRoomSid($roomSid) {
        $this->options['roomSid'] = $roomSid;
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
        return '[Twilio.Video.V1.ReadCompositionOptions ' . \implode(' ', $options) . ']';
    }
}

class CreateCompositionOptions extends Options {
    /**
     * @param array $videoLayout An object that describes the video layout of the
     *                           composition
     * @param string $audioSources An array of track names from the same group room
     *                             to merge
     * @param string $audioSourcesExcluded An array of track names to exclude
     * @param string $resolution A string that describes the columns (width) and
     *                           rows (height) of the generated composed video in
     *                           pixels
     * @param string $format The container format of the composition's media files
     * @param string $statusCallback The URL we should call to send status
     *                               information to your application
     * @param string $statusCallbackMethod The HTTP method we should use to call
     *                                     status_callback
     * @param bool $trim Whether to clip the intervals where there is no active
     *                   media in the composition
     */
    public function __construct($videoLayout = Values::NONE, $audioSources = Values::NONE, $audioSourcesExcluded = Values::NONE, $resolution = Values::NONE, $format = Values::NONE, $statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE, $trim = Values::NONE) {
        $this->options['videoLayout'] = $videoLayout;
        $this->options['audioSources'] = $audioSources;
        $this->options['audioSourcesExcluded'] = $audioSourcesExcluded;
        $this->options['resolution'] = $resolution;
        $this->options['format'] = $format;
        $this->options['statusCallback'] = $statusCallback;
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        $this->options['trim'] = $trim;
    }

    /**
     * An object that describes the video layout of the composition in terms of regions. See [Specifying Video Layouts](https://www.twilio.com/docs/video/api/compositions-resource#specifying-video-layouts) for more info. Please, be aware that either video_layout or audio_sources have to be provided to get a valid creation request
     *
     * @param array $videoLayout An object that describes the video layout of the
     *                           composition
     * @return $this Fluent Builder
     */
    public function setVideoLayout($videoLayout) {
        $this->options['videoLayout'] = $videoLayout;
        return $this;
    }

    /**
     * An array of track names from the same group room to merge into the new composition. Can include zero or more track names. The new composition includes all audio sources specified in `audio_sources` except for those specified in `audio_sources_excluded`. The track names in this parameter can include an asterisk as a wild card character, which will match zero or more characters in a track name. For example, `student*` includes `student` as well as `studentTeam`. Please, be aware that either video_layout or audio_sources have to be provided to get a valid creation request
     *
     * @param string $audioSources An array of track names from the same group room
     *                             to merge
     * @return $this Fluent Builder
     */
    public function setAudioSources($audioSources) {
        $this->options['audioSources'] = $audioSources;
        return $this;
    }

    /**
     * An array of track names to exclude. The new composition includes all audio sources specified in `audio_sources` except for those specified in `audio_sources_excluded`. The track names in this parameter can include an asterisk as a wild card character, which will match zero or more characters in a track name. For example, `student*` excludes `student` as well as `studentTeam`. This parameter can also be empty.
     *
     * @param string $audioSourcesExcluded An array of track names to exclude
     * @return $this Fluent Builder
     */
    public function setAudioSourcesExcluded($audioSourcesExcluded) {
        $this->options['audioSourcesExcluded'] = $audioSourcesExcluded;
        return $this;
    }

    /**
     * A string that describes the columns (width) and rows (height) of the generated composed video in pixels. Defaults to `640x480`.
    The string's format is `{width}x{height}` where:

    * 16 <= `{width}` <= 1280
    * 16 <= `{height}` <= 1280
    * `{width}` * `{height}` <= 921,600

    Typical values are:

    * HD = `1280x720`
    * PAL = `1024x576`
    * VGA = `640x480`
    * CIF = `320x240`

    Note that the `resolution` imposes an aspect ratio to the resulting composition. When the original video tracks are constrained by the aspect ratio, they are scaled to fit. See [Specifying Video Layouts](https://www.twilio.com/docs/video/api/compositions-resource#specifying-video-layouts) for more info.
     *
     * @param string $resolution A string that describes the columns (width) and
     *                           rows (height) of the generated composed video in
     *                           pixels
     * @return $this Fluent Builder
     */
    public function setResolution($resolution) {
        $this->options['resolution'] = $resolution;
        return $this;
    }

    /**
     * The container format of the composition's media files. Can be: `mp4` or `webm` and the default is `webm`. If you specify `mp4` or `webm`, you must also specify one or more `audio_sources` and/or a `video_layout` element that contains a valid `video_sources` list, otherwise an error occurs.
     *
     * @param string $format The container format of the composition's media files
     * @return $this Fluent Builder
     */
    public function setFormat($format) {
        $this->options['format'] = $format;
        return $this;
    }

    /**
     * The URL we should call using the `status_callback_method` to send status information to your application on every composition event. If not provided, status callback events will not be dispatched.
     *
     * @param string $statusCallback The URL we should call to send status
     *                               information to your application
     * @return $this Fluent Builder
     */
    public function setStatusCallback($statusCallback) {
        $this->options['statusCallback'] = $statusCallback;
        return $this;
    }

    /**
     * The HTTP method we should use to call `status_callback`. Can be: `POST` or `GET` and the default is `POST`.
     *
     * @param string $statusCallbackMethod The HTTP method we should use to call
     *                                     status_callback
     * @return $this Fluent Builder
     */
    public function setStatusCallbackMethod($statusCallbackMethod) {
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        return $this;
    }

    /**
     * Whether to clip the intervals where there is no active media in the composition. The default is `true`. Compositions with `trim` enabled are shorter when the Room is created and no Participant joins for a while as well as if all the Participants leave the room and join later, because those gaps will be removed. See [Specifying Video Layouts](https://www.twilio.com/docs/video/api/compositions-resource#specifying-video-layouts) for more info.
     *
     * @param bool $trim Whether to clip the intervals where there is no active
     *                   media in the composition
     * @return $this Fluent Builder
     */
    public function setTrim($trim) {
        $this->options['trim'] = $trim;
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
        return '[Twilio.Video.V1.CreateCompositionOptions ' . \implode(' ', $options) . ']';
    }
}