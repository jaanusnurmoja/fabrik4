<?php
namespace Aws\Comprehend;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Comprehend** service.
 * @method \Aws\Result batchDetectDominantLanguage(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDetectDominantLanguageAsync(array $args = [])
 * @method \Aws\Result batchDetectEntities(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDetectEntitiesAsync(array $args = [])
 * @method \Aws\Result batchDetectKeyPhrases(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDetectKeyPhrasesAsync(array $args = [])
 * @method \Aws\Result batchDetectSentiment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDetectSentimentAsync(array $args = [])
 * @method \Aws\Result batchDetectSyntax(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDetectSyntaxAsync(array $args = [])
 * @method \Aws\Result batchDetectTargetedSentiment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDetectTargetedSentimentAsync(array $args = [])
 * @method \Aws\Result classifyDocument(array $args = [])
 * @method \GuzzleHttp\Promise\Promise classifyDocumentAsync(array $args = [])
 * @method \Aws\Result containsPiiEntities(array $args = [])
 * @method \GuzzleHttp\Promise\Promise containsPiiEntitiesAsync(array $args = [])
 * @method \Aws\Result createDataset(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createDatasetAsync(array $args = [])
 * @method \Aws\Result createDocumentClassifier(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createDocumentClassifierAsync(array $args = [])
 * @method \Aws\Result createEndpoint(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createEndpointAsync(array $args = [])
 * @method \Aws\Result createEntityRecognizer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createEntityRecognizerAsync(array $args = [])
 * @method \Aws\Result createFlywheel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createFlywheelAsync(array $args = [])
 * @method \Aws\Result deleteDocumentClassifier(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDocumentClassifierAsync(array $args = [])
 * @method \Aws\Result deleteEndpoint(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEndpointAsync(array $args = [])
 * @method \Aws\Result deleteEntityRecognizer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEntityRecognizerAsync(array $args = [])
 * @method \Aws\Result deleteFlywheel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFlywheelAsync(array $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @method \Aws\Result describeDataset(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDatasetAsync(array $args = [])
 * @method \Aws\Result describeDocumentClassificationJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDocumentClassificationJobAsync(array $args = [])
 * @method \Aws\Result describeDocumentClassifier(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDocumentClassifierAsync(array $args = [])
 * @method \Aws\Result describeDominantLanguageDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDominantLanguageDetectionJobAsync(array $args = [])
 * @method \Aws\Result describeEndpoint(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEndpointAsync(array $args = [])
 * @method \Aws\Result describeEntitiesDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEntitiesDetectionJobAsync(array $args = [])
 * @method \Aws\Result describeEntityRecognizer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEntityRecognizerAsync(array $args = [])
 * @method \Aws\Result describeEventsDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventsDetectionJobAsync(array $args = [])
 * @method \Aws\Result describeFlywheel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFlywheelAsync(array $args = [])
 * @method \Aws\Result describeFlywheelIteration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFlywheelIterationAsync(array $args = [])
 * @method \Aws\Result describeKeyPhrasesDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeKeyPhrasesDetectionJobAsync(array $args = [])
 * @method \Aws\Result describePiiEntitiesDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describePiiEntitiesDetectionJobAsync(array $args = [])
 * @method \Aws\Result describeResourcePolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeResourcePolicyAsync(array $args = [])
 * @method \Aws\Result describeSentimentDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSentimentDetectionJobAsync(array $args = [])
 * @method \Aws\Result describeTargetedSentimentDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTargetedSentimentDetectionJobAsync(array $args = [])
 * @method \Aws\Result describeTopicsDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTopicsDetectionJobAsync(array $args = [])
 * @method \Aws\Result detectDominantLanguage(array $args = [])
 * @method \GuzzleHttp\Promise\Promise detectDominantLanguageAsync(array $args = [])
 * @method \Aws\Result detectEntities(array $args = [])
 * @method \GuzzleHttp\Promise\Promise detectEntitiesAsync(array $args = [])
 * @method \Aws\Result detectKeyPhrases(array $args = [])
 * @method \GuzzleHttp\Promise\Promise detectKeyPhrasesAsync(array $args = [])
 * @method \Aws\Result detectPiiEntities(array $args = [])
 * @method \GuzzleHttp\Promise\Promise detectPiiEntitiesAsync(array $args = [])
 * @method \Aws\Result detectSentiment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise detectSentimentAsync(array $args = [])
 * @method \Aws\Result detectSyntax(array $args = [])
 * @method \GuzzleHttp\Promise\Promise detectSyntaxAsync(array $args = [])
 * @method \Aws\Result detectTargetedSentiment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise detectTargetedSentimentAsync(array $args = [])
 * @method \Aws\Result detectToxicContent(array $args = [])
 * @method \GuzzleHttp\Promise\Promise detectToxicContentAsync(array $args = [])
 * @method \Aws\Result importModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise importModelAsync(array $args = [])
 * @method \Aws\Result listDatasets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listDatasetsAsync(array $args = [])
 * @method \Aws\Result listDocumentClassificationJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listDocumentClassificationJobsAsync(array $args = [])
 * @method \Aws\Result listDocumentClassifierSummaries(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listDocumentClassifierSummariesAsync(array $args = [])
 * @method \Aws\Result listDocumentClassifiers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listDocumentClassifiersAsync(array $args = [])
 * @method \Aws\Result listDominantLanguageDetectionJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listDominantLanguageDetectionJobsAsync(array $args = [])
 * @method \Aws\Result listEndpoints(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listEndpointsAsync(array $args = [])
 * @method \Aws\Result listEntitiesDetectionJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listEntitiesDetectionJobsAsync(array $args = [])
 * @method \Aws\Result listEntityRecognizerSummaries(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listEntityRecognizerSummariesAsync(array $args = [])
 * @method \Aws\Result listEntityRecognizers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listEntityRecognizersAsync(array $args = [])
 * @method \Aws\Result listEventsDetectionJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventsDetectionJobsAsync(array $args = [])
 * @method \Aws\Result listFlywheelIterationHistory(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listFlywheelIterationHistoryAsync(array $args = [])
 * @method \Aws\Result listFlywheels(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listFlywheelsAsync(array $args = [])
 * @method \Aws\Result listKeyPhrasesDetectionJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listKeyPhrasesDetectionJobsAsync(array $args = [])
 * @method \Aws\Result listPiiEntitiesDetectionJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPiiEntitiesDetectionJobsAsync(array $args = [])
 * @method \Aws\Result listSentimentDetectionJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listSentimentDetectionJobsAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result listTargetedSentimentDetectionJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTargetedSentimentDetectionJobsAsync(array $args = [])
 * @method \Aws\Result listTopicsDetectionJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTopicsDetectionJobsAsync(array $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @method \Aws\Result startDocumentClassificationJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startDocumentClassificationJobAsync(array $args = [])
 * @method \Aws\Result startDominantLanguageDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startDominantLanguageDetectionJobAsync(array $args = [])
 * @method \Aws\Result startEntitiesDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startEntitiesDetectionJobAsync(array $args = [])
 * @method \Aws\Result startEventsDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startEventsDetectionJobAsync(array $args = [])
 * @method \Aws\Result startFlywheelIteration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startFlywheelIterationAsync(array $args = [])
 * @method \Aws\Result startKeyPhrasesDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startKeyPhrasesDetectionJobAsync(array $args = [])
 * @method \Aws\Result startPiiEntitiesDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startPiiEntitiesDetectionJobAsync(array $args = [])
 * @method \Aws\Result startSentimentDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startSentimentDetectionJobAsync(array $args = [])
 * @method \Aws\Result startTargetedSentimentDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startTargetedSentimentDetectionJobAsync(array $args = [])
 * @method \Aws\Result startTopicsDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startTopicsDetectionJobAsync(array $args = [])
 * @method \Aws\Result stopDominantLanguageDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopDominantLanguageDetectionJobAsync(array $args = [])
 * @method \Aws\Result stopEntitiesDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopEntitiesDetectionJobAsync(array $args = [])
 * @method \Aws\Result stopEventsDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopEventsDetectionJobAsync(array $args = [])
 * @method \Aws\Result stopKeyPhrasesDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopKeyPhrasesDetectionJobAsync(array $args = [])
 * @method \Aws\Result stopPiiEntitiesDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopPiiEntitiesDetectionJobAsync(array $args = [])
 * @method \Aws\Result stopSentimentDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopSentimentDetectionJobAsync(array $args = [])
 * @method \Aws\Result stopTargetedSentimentDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopTargetedSentimentDetectionJobAsync(array $args = [])
 * @method \Aws\Result stopTrainingDocumentClassifier(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopTrainingDocumentClassifierAsync(array $args = [])
 * @method \Aws\Result stopTrainingEntityRecognizer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopTrainingEntityRecognizerAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateEndpoint(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEndpointAsync(array $args = [])
 * @method \Aws\Result updateFlywheel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFlywheelAsync(array $args = [])
 */
class ComprehendClient extends AwsClient {}
