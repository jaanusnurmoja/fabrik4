<?php
namespace Aws\LexModelBuildingService;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Lex Model Building Service** service.
 * @method \Aws\Result createBotVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createBotVersionAsync(array $args = [])
 * @method \Aws\Result createIntentVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createIntentVersionAsync(array $args = [])
 * @method \Aws\Result createSlotTypeVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createSlotTypeVersionAsync(array $args = [])
 * @method \Aws\Result deleteBot(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBotAsync(array $args = [])
 * @method \Aws\Result deleteBotAlias(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBotAliasAsync(array $args = [])
 * @method \Aws\Result deleteBotChannelAssociation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBotChannelAssociationAsync(array $args = [])
 * @method \Aws\Result deleteBotVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBotVersionAsync(array $args = [])
 * @method \Aws\Result deleteIntent(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIntentAsync(array $args = [])
 * @method \Aws\Result deleteIntentVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIntentVersionAsync(array $args = [])
 * @method \Aws\Result deleteSlotType(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSlotTypeAsync(array $args = [])
 * @method \Aws\Result deleteSlotTypeVersion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSlotTypeVersionAsync(array $args = [])
 * @method \Aws\Result deleteUtterances(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUtterancesAsync(array $args = [])
 * @method \Aws\Result getBot(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBotAsync(array $args = [])
 * @method \Aws\Result getBotAlias(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBotAliasAsync(array $args = [])
 * @method \Aws\Result getBotAliases(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBotAliasesAsync(array $args = [])
 * @method \Aws\Result getBotChannelAssociation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBotChannelAssociationAsync(array $args = [])
 * @method \Aws\Result getBotChannelAssociations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBotChannelAssociationsAsync(array $args = [])
 * @method \Aws\Result getBotVersions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBotVersionsAsync(array $args = [])
 * @method \Aws\Result getBots(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBotsAsync(array $args = [])
 * @method \Aws\Result getBuiltinIntent(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBuiltinIntentAsync(array $args = [])
 * @method \Aws\Result getBuiltinIntents(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBuiltinIntentsAsync(array $args = [])
 * @method \Aws\Result getBuiltinSlotTypes(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBuiltinSlotTypesAsync(array $args = [])
 * @method \Aws\Result getExport(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getExportAsync(array $args = [])
 * @method \Aws\Result getImport(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getImportAsync(array $args = [])
 * @method \Aws\Result getIntent(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getIntentAsync(array $args = [])
 * @method \Aws\Result getIntentVersions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getIntentVersionsAsync(array $args = [])
 * @method \Aws\Result getIntents(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getIntentsAsync(array $args = [])
 * @method \Aws\Result getMigration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getMigrationAsync(array $args = [])
 * @method \Aws\Result getMigrations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getMigrationsAsync(array $args = [])
 * @method \Aws\Result getSlotType(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSlotTypeAsync(array $args = [])
 * @method \Aws\Result getSlotTypeVersions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSlotTypeVersionsAsync(array $args = [])
 * @method \Aws\Result getSlotTypes(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSlotTypesAsync(array $args = [])
 * @method \Aws\Result getUtterancesView(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getUtterancesViewAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result putBot(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putBotAsync(array $args = [])
 * @method \Aws\Result putBotAlias(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putBotAliasAsync(array $args = [])
 * @method \Aws\Result putIntent(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putIntentAsync(array $args = [])
 * @method \Aws\Result putSlotType(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putSlotTypeAsync(array $args = [])
 * @method \Aws\Result startImport(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startImportAsync(array $args = [])
 * @method \Aws\Result startMigration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startMigrationAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 */
class LexModelBuildingServiceClient extends AwsClient {}
