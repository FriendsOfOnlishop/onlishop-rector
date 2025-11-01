<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\ClassConstFetch\RenameClassConstFetchRector;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Renaming\ValueObject\RenameClassAndConstFetch;
use Rector\Renaming\ValueObject\RenameStaticMethod;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../config.php');

    $rectorConfig->ruleWithConfiguration(
        RenameMethodRector::class,
        [
            new MethodCallRename('Onlishop\Elasticsearch\Framework\Indexing\IndexerOffset', 'setNextDefinition', 'selectNextDefinition'),
            new MethodCallRename('Onlishop\Elasticsearch\Framework\Indexing\IndexerOffset', 'setNextLanguage', 'selectNextLanguage'),
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RenameStaticMethodRector::class,
        [
            new RenameStaticMethod('Onlishop\Core\Framework\DataAbstractionLayer\FieldSerializer\JsonFieldSerializer', 'encodeJson', 'Onlishop\Core\Framework\Util\Json', 'encode'),
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RenameClassRector::class,
        [
            'Onlishop\Core\Framework\DataAbstractionLayer\Event\BeforeDeleteEvent' => 'Onlishop\Core\Framework\DataAbstractionLayer\Event\EntityDeleteEvent',
            'Onlishop\Core\Framework\Api\Exception\ExceptionFailedException' => 'Onlishop\Core\Framework\Api\Exception\ExpectationFailedException',
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RenameClassConstFetchRector::class,
        [
            new RenameClassAndConstFetch('Onlishop\Core\Checkout\Cart', 'CHECKOUT_ORDER_PLACED', 'Onlishop\Core\Framework\Event\BusinessEvents', 'CHECKOUT_ORDER_PLACED'),
            new RenameClassAndConstFetch('Onlishop\Elasticsearch\Product\ElasticsearchProductDefinition', 'KEYWORD_FIELD', 'Onlishop\Elasticsearch\Framework\AbstractElasticsearchDefinition', 'KEYWORD_FIELD'),
            new RenameClassAndConstFetch('Onlishop\Elasticsearch\Product\ElasticsearchProductDefinition', 'BOOLEAN_FIELD', 'Onlishop\Elasticsearch\Framework\AbstractElasticsearchDefinition', 'BOOLEAN_FIELD'),
            new RenameClassAndConstFetch('Onlishop\Elasticsearch\Product\ElasticsearchProductDefinition', 'FLOAT_FIELD', 'Onlishop\Elasticsearch\Framework\AbstractElasticsearchDefinition', 'FLOAT_FIELD'),
            new RenameClassAndConstFetch('Onlishop\Elasticsearch\Product\ElasticsearchProductDefinition', 'INT_FIELD', 'Onlishop\Elasticsearch\Framework\AbstractElasticsearchDefinition', 'INT_FIELD'),
            new RenameClassAndConstFetch('Onlishop\Elasticsearch\Product\ElasticsearchProductDefinition', 'SEARCH_FIELD', 'Onlishop\Elasticsearch\Framework\AbstractElasticsearchDefinition', 'SEARCH_FIELD'),
        ],
    );
};
