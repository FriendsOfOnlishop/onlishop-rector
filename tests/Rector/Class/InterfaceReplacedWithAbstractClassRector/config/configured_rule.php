<?php

declare(strict_types=1);

use FriendsOfOnlishop\Rector\Rule\Class_\InterfaceReplacedWithAbstractClass;
use FriendsOfOnlishop\Rector\Rule\Class_\InterfaceReplacedWithAbstractClassRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config_test.php');
    $rectorConfig->ruleWithConfiguration(
        InterfaceReplacedWithAbstractClassRector::class,
        [
            new InterfaceReplacedWithAbstractClass('CartFoo', 'AbstractCartFoo'),
            new InterfaceReplacedWithAbstractClass('Onlishop\Core\Checkout\Cart\CartPersisterInterface', '\Onlishop\Core\Checkout\Cart\AbstractCartPersister'),
        ],
    );
};
