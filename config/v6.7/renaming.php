<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\ClassConstFetch\RenameClassConstFetchRector;
use Rector\Renaming\ValueObject\RenameClassAndConstFetch;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../config.php');

    $rectorConfig->ruleWithConfiguration(
        RenameClassConstFetchRector::class,
        [
            new RenameClassAndConstFetch('Onlishop\Core\Content\MailTemplate\Subscriber\MailSendSubscriberConfig', 'MAIL_CONFIG_EXTENSION', 'Onlishop\Core\Content\Flow\Dispatching\Action\SendMailAction', 'MAIL_CONFIG_EXTENSION'),
            new RenameClassAndConstFetch('Onlishop\Core\Content\MailTemplate\Subscriber\MailSendSubscriberConfig', 'ACTION_NAME', 'Onlishop\Core\Content\Flow\Dispatching\Action\SendMailAction', 'ACTION_NAME'),

            new RenameClassAndConstFetch('Onlishop\Core\Content\MailTemplate\MailTemplateActions', 'MAIL_TEMPLATE_MAIL_SEND_ACTION', 'Onlishop\Core\Content\Flow\Dispatching\Action\SendMailAction', 'ACTION_NAME'),

            new RenameClassAndConstFetch('Onlishop\Core\Framework\Adapter\Cache\Http\CacheResponseSubscriber', 'STATE_LOGGED_IN', 'Onlishop\Core\Framework\Adapter\Cache\CacheStateSubscriber', 'STATE_LOGGED_IN'),
            new RenameClassAndConstFetch('Onlishop\Core\Framework\Adapter\Cache\Http\CacheResponseSubscriber', 'STATE_CART_FILLED', 'Onlishop\Core\Framework\Adapter\Cache\CacheStateSubscriber', 'STATE_CART_FILLED'),

            new RenameClassAndConstFetch('Onlishop\Core\Framework\Adapter\Cache\Http\CacheResponseSubscriber', 'CURRENCY_COOKIE', 'Onlishop\Core\Framework\Adapter\Cache\Http\HttpCacheKeyGenerator', 'CURRENCY_COOKIE'),
            new RenameClassAndConstFetch('Onlishop\Core\Framework\Adapter\Cache\Http\CacheResponseSubscriber', 'CONTEXT_CACHE_COOKIE', 'Onlishop\Core\Framework\Adapter\Cache\Http\HttpCacheKeyGenerator', 'CONTEXT_CACHE_COOKIE'),
            new RenameClassAndConstFetch('Onlishop\Core\Framework\Adapter\Cache\Http\CacheResponseSubscriber', 'SYSTEM_STATE_COOKIE', 'Onlishop\Core\Framework\Adapter\Cache\Http\HttpCacheKeyGenerator', 'SYSTEM_STATE_COOKIE'),
            new RenameClassAndConstFetch('Onlishop\Core\Framework\Adapter\Cache\Http\CacheResponseSubscriber', 'INVALIDATION_STATES_HEADER', 'Onlishop\Core\Framework\Adapter\Cache\Http\HttpCacheKeyGenerator', 'INVALIDATION_STATES_HEADER'),
        ],
    );
};
