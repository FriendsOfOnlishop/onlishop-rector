<?php

declare(strict_types=1);

use FriendsOfOnlishop\Rector\Rule\ClassMethod\ChangeReturnTypeOfClassMethod;
use FriendsOfOnlishop\Rector\Rule\ClassMethod\ChangeReturnTypeOfClassMethodRector;
use FriendsOfOnlishop\Rector\Rule\v67\AddEntityNameToEntityExtension;
use FriendsOfOnlishop\Rector\Rule\v67\AddLoggerToScheduledTaskConstructorRector;
use PhpParser\Node\Name\FullyQualified;
use Rector\Config\RectorConfig;
use Rector\Symfony\Set\SymfonySetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/v6.7/renaming.php');

    $rectorConfig->sets([
        SymfonySetList::SYMFONY_71,
        SymfonySetList::SYMFONY_72,
    ]);

    $rectorConfig->ruleWithConfiguration(AddEntityNameToEntityExtension::class, [
        'backwardsCompatible' => false,
    ]);

    $rectorConfig->rule(AddLoggerToScheduledTaskConstructorRector::class);
    $rectorConfig->ruleWithConfiguration(ChangeReturnTypeOfClassMethodRector::class, [
        new ChangeReturnTypeOfClassMethod('\Onlishop\Elasticsearch\Framework\AbstractElasticsearchDefinition', 'buildTermQuery', new FullyQualified('OpenSearchDSL\BuilderInterface')),
    ]);

    $rectorConfig->importNames();
    $rectorConfig->importShortClasses(false);
};
