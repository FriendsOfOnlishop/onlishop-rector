<?php

declare(strict_types=1);

use FriendsOfOnlishop\Rector\Rule\Class_\InterfaceReplacedWithAbstractClass;
use FriendsOfOnlishop\Rector\Rule\Class_\InterfaceReplacedWithAbstractClassRector;
use FriendsOfOnlishop\Rector\Rule\ClassConstructor\RemoveArgumentFromClassConstruct;
use FriendsOfOnlishop\Rector\Rule\ClassConstructor\RemoveArgumentFromClassConstructRector;
use FriendsOfOnlishop\Rector\Rule\v65\FakerPropertyToMethodCallRector;
use FriendsOfOnlishop\Rector\Rule\v65\MigrateCaptchaAnnotationToRouteRector;
use FriendsOfOnlishop\Rector\Rule\v65\MigrateLoginRequiredAnnotationToRouteRector;
use FriendsOfOnlishop\Rector\Rule\v65\MigrateRouteScopeToRouteDefaults;
use FriendsOfOnlishop\Rector\Rule\v65\ThumbnailGenerateSingleToMultiGenerateRector;
use Rector\Arguments\Rector\MethodCall\RemoveMethodCallParamRector;
use Rector\Arguments\ValueObject\RemoveMethodCallParam;
use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Transform\Rector\Assign\PropertyFetchToMethodCallRector;
use Rector\Transform\ValueObject\PropertyFetchToMethodCall;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../config.php');

    $rectorConfig->ruleWithConfiguration(
        RenameMethodRector::class,
        [
            new MethodCallRename('Onlishop\Core\Framework\Adapter\Twig\EntityTemplateLoader', 'clearInternalCache', 'reset'),
            new MethodCallRename('Onlishop\Core\Content\ImportExport\Processing\Mapping\Mapping', 'getDefault', 'getDefaultValue'),
            new MethodCallRename('Onlishop\Core\Content\ImportExport\Processing\Mapping\Mapping', 'getMappedDefault', 'getDefaultValue'),
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RenameClassRector::class,
        [
            'Onlishop\Core\Framework\Adapter\Asset\ThemeAssetPackage' => 'Onlishop\Storefront\Theme\ThemeAssetPackage',
            'Maltyxx\ImagesGenerator\ImagesGeneratorProvider' => 'bheller\ImagesGenerator\ImagesGeneratorProvider',
            'Onlishop\Core\Framework\Event\BusinessEventInterface' => 'Onlishop\Core\Framework\Event\FlowEventAware',
            'Onlishop\Core\Framework\Event\MailActionInterface' => 'Onlishop\Core\Framework\Event\MailAware',
            'Onlishop\Core\Framework\Log\LogAwareBusinessEventInterface' => 'Onlishop\Core\Framework\Log\LogAware',
            'Onlishop\Storefront\Event\ProductExportContentTypeEvent' => 'Onlishop\Core\Content\ProductExport\Event\ProductExportContentTypeEvent',
            'Onlishop\Storefront\Page\Product\Review\MatrixElement' => 'Onlishop\Core\Content\Product\SalesChannel\Review\MatrixElement',
            'Onlishop\Storefront\Page\Product\Review\RatingMatrix' => 'Onlishop\Core\Content\Product\SalesChannel\Review\RatingMatrix',
            'Onlishop\Storefront\Page\Address\Listing\AddressListingCriteriaEvent' => 'Onlishop\Core\Checkout\Customer\Event\AddressListingCriteriaEvent',
            'Onlishop\Administration\Service\AdminOrderCartService' => 'Onlishop\Core\Checkout\Cart\ApiOrderCartService',
            'Onlishop\Core\System\User\Service\UserProvisioner' => 'Onlishop\Core\Maintenance\User\Service\UserProvisioner',
            'Onlishop\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface' => 'Onlishop\Core\Framework\DataAbstractionLayer\EntityRepository',
            'Onlishop\Core\System\SalesChannel\Entity\SalesChannelRepositoryInterface' => 'Onlishop\Core\System\SalesChannel\Entity\SalesChannelRepository',
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RemoveMethodCallParamRector::class,
        [
            new RemoveMethodCallParam('Onlishop\Core\Checkout\Cart\Tax\Struct\CalculatedTaxCollection', 'merge', 1),
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RemoveArgumentFromClassConstructRector::class,
        [
            new RemoveArgumentFromClassConstruct('Onlishop\Core\Checkout\Customer\Exception\DuplicateWishlistProductException', 0),
            new RemoveArgumentFromClassConstruct('Onlishop\Core\Content\Newsletter\Exception\LanguageOfNewsletterDeleteException', 0),
        ],
    );

    $rectorConfig->rule(MigrateLoginRequiredAnnotationToRouteRector::class);
    $rectorConfig->rule(MigrateCaptchaAnnotationToRouteRector::class);
    $rectorConfig->rule(MigrateRouteScopeToRouteDefaults::class);
    $rectorConfig->rule(ThumbnailGenerateSingleToMultiGenerateRector::class);

    $rectorConfig->ruleWithConfiguration(
        PropertyFetchToMethodCallRector::class,
        [new PropertyFetchToMethodCall(
            'Onlishop\Core\Content\Flow\Dispatching\FlowState',
            'sequenceId',
            'getSequenceId',
            null,
        )],
    );

    $rectorConfig->ruleWithConfiguration(
        InterfaceReplacedWithAbstractClassRector::class,
        [
            new InterfaceReplacedWithAbstractClass('Onlishop\Core\Checkout\Cart\CartPersisterInterface', 'Onlishop\Core\Checkout\Cart\AbstractCartPersister'),
            new InterfaceReplacedWithAbstractClass('Onlishop\Core\Content\Sitemap\Provider\UrlProviderInterface', 'Onlishop\Core\Content\Sitemap\Provider\AbstractUrlProvider'),
            new InterfaceReplacedWithAbstractClass('Onlishop\Core\System\Snippet\Files\SnippetFileInterface', 'Onlishop\Core\System\Snippet\Files\GenericSnippetFile'),
        ],
    );

    $rectorConfig->rule(FakerPropertyToMethodCallRector::class);
};
