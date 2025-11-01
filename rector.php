<?php

declare(strict_types=1);

use FriendsOfOnlishop\Rector\Set\OnlishopSetList;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/src',
    ]);

    $rectorConfig->importNames();

    $rectorConfig->sets([
        OnlishopSetList::ONLISHOP_6_5_0,
        OnlishopSetList::ONLISHOP_6_6_0,
        OnlishopSetList::ONLISHOP_6_6_4,
        OnlishopSetList::ONLISHOP_6_6_10,
        OnlishopSetList::ONLISHOP_6_7_0,
    ]);
};
