<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Transform\Rector\New_\NewToStaticCallRector;
use Rector\Transform\ValueObject\NewToStaticCall;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../config.php');

    $rectorConfig->ruleWithConfiguration(
        NewToStaticCallRector::class,
        [
            // RoutingException
            new NewToStaticCall('Onlishop\Core\Framework\Routing\Exception\InvalidRequestParameterException', 'Onlishop\Core\Framework\Routing\RoutingException', 'invalidRequestParameter'),
            new NewToStaticCall('Onlishop\Core\Framework\Routing\Exception\MissingRequestParameterException', 'Onlishop\Core\Framework\Routing\RoutingException', 'missingRequestParameter'),
            new NewToStaticCall('Onlishop\Core\Framework\Routing\Exception\LanguageNotFoundException', 'Onlishop\Core\Framework\Routing\RoutingException', 'languageNotFound'),

            // DataAbstractionLayerException
            new NewToStaticCall('Onlishop\Core\Framework\DataAbstractionLayer\Exception\InvalidSerializerFieldException', 'Onlishop\Core\Framework\DataAbstractionLayer\DataAbstractionLayerException', 'invalidSerializerField'),
            new NewToStaticCall('Onlishop\Core\Framework\DataAbstractionLayer\Exception\VersionMergeAlreadyLockedException', 'Onlishop\Core\Framework\DataAbstractionLayer\DataAbstractionLayerException', 'versionMergeAlreadyLocked'),

            // ElasticsearchException
            new NewToStaticCall('Onlishop\Elasticsearch\Exception\UnsupportedElasticsearchDefinitionException', 'Onlishop\Elasticsearch\ElasticsearchException', 'unsupportedElasticsearchDefinition'),
            new NewToStaticCall('Onlishop\Elasticsearch\Exception\ElasticsearchIndexingException', 'Onlishop\Elasticsearch\ElasticsearchException', 'indexingError'),
            new NewToStaticCall('Onlishop\Elasticsearch\Exception\ServerNotAvailableException', 'Onlishop\Elasticsearch\ElasticsearchException', 'serverNotAvailable'),

            // ProductExportException
            new NewToStaticCall('Onlishop\Core\Content\ProductExport\Exception\EmptyExportException', 'Onlishop\Core\Content\ProductExport\ProductExportException', 'productExportNotFound'),
            new NewToStaticCall('Onlishop\Core\Content\ProductExport\Exception\RenderFooterException', 'Onlishop\Core\Content\ProductExport\ProductExportException', 'renderFooterException'),
            new NewToStaticCall('Onlishop\Core\Content\ProductExport\Exception\RenderHeaderException', 'Onlishop\Core\Content\ProductExport\ProductExportException', 'renderHeaderException'),
            new NewToStaticCall('Onlishop\Core\Content\ProductExport\Exception\RenderProductException', 'Onlishop\Core\Content\ProductExport\ProductExportException', 'renderProductException'),
        ],
    );
};
