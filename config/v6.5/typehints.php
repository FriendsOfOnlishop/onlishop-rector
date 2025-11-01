<?php

declare(strict_types=1);

use FriendsOfOnlishop\Rector\Rule\ClassMethod\AddArgumentToClassWithoutDefault;
use FriendsOfOnlishop\Rector\Rule\ClassMethod\AddArgumentToClassWithoutDefaultRector;
use FriendsOfOnlishop\Rector\Rule\v65\AddBanAllToReverseProxyRector;
use PHPStan\Type\ArrayType;
use PHPStan\Type\BooleanType;
use PHPStan\Type\NullType;
use PHPStan\Type\ObjectType;
use PHPStan\Type\StringType;
use PHPStan\Type\TypeCombinator;
use Rector\Arguments\Rector\ClassMethod\ArgumentAdderRector;
use Rector\Arguments\ValueObject\ArgumentAdder;
use Rector\Config\RectorConfig;
use Rector\TypeDeclaration\Rector\ClassMethod\AddParamTypeDeclarationRector;
use Rector\TypeDeclaration\Rector\ClassMethod\AddReturnTypeDeclarationRector;
use Rector\TypeDeclaration\ValueObject\AddParamTypeDeclaration;
use Rector\TypeDeclaration\ValueObject\AddReturnTypeDeclaration;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../config.php');

    $nullableStringArrayType = TypeCombinator::union(new ArrayType(new StringType(), new StringType()), new NullType());

    $rectorConfig->ruleWithConfiguration(
        AddParamTypeDeclarationRector::class,
        [
            new AddParamTypeDeclaration('Onlishop\Core\Framework\DataAbstractionLayer\Indexing\EntityIndexer', 'iterate', 0, $nullableStringArrayType),
            new AddParamTypeDeclaration('Onlishop\Storefront\Theme\DataAbstractionLayer\ThemeIndexer', 'iterate', 0, $nullableStringArrayType),
            new AddParamTypeDeclaration('Onlishop\Core\Content\Flow\Indexing\FlowIndexer', 'iterate', 0, $nullableStringArrayType),
            new AddParamTypeDeclaration('Onlishop\Core\Content\Media\DataAbstractionLayer\MediaFolderConfigurationIndexer', 'iterate', 0, $nullableStringArrayType),
            new AddParamTypeDeclaration('Onlishop\Core\Content\Media\DataAbstractionLayer\MediaFolderIndexer', 'iterate', 0, $nullableStringArrayType),
            new AddParamTypeDeclaration('Onlishop\Core\Content\Media\DataAbstractionLayer\MediaIndexer', 'iterate', 0, $nullableStringArrayType),
            new AddParamTypeDeclaration('Onlishop\Core\Content\LandingPage\DataAbstractionLayer\LandingPageIndexer', 'iterate', 0, $nullableStringArrayType),
            new AddParamTypeDeclaration('Onlishop\Core\Content\ProductStream\DataAbstractionLayer\ProductStreamIndexer', 'iterate', 0, $nullableStringArrayType),
            new AddParamTypeDeclaration('Onlishop\Core\Content\Rule\DataAbstractionLayer\RuleIndexer', 'iterate', 0, $nullableStringArrayType),
            new AddParamTypeDeclaration('Onlishop\Storefront\Page\Product\Review\ReviewLoaderResult', 'setMatrix', 0, new ObjectType('Onlishop\Core\Content\Product\SalesChannel\Review\RatingMatrix')),
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        AddReturnTypeDeclarationRector::class,
        [
            new AddReturnTypeDeclaration('Onlishop\Core\Framework\Adapter\Twig\TemplateIterator', 'getIterator', new ObjectType('Traversable')),
            new AddReturnTypeDeclaration('Onlishop\Core\Content\Cms\DataResolver\CriteriaCollection', 'getIterator', new ObjectType('Traversable')),
            new AddReturnTypeDeclaration('Onlishop\Core\Checkout\Cart\CartBehavior', 'hasPermission', new BooleanType()),
            new AddReturnTypeDeclaration('Onlishop\Storefront\Page\Product\Review\ReviewLoaderResult', 'getMatrix', new ObjectType('Onlishop\Core\Content\Product\SalesChannel\Review\RatingMatrix')),
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        AddArgumentToClassWithoutDefaultRector::class,
        [
            new AddArgumentToClassWithoutDefault('Onlishop\Storefront\Framework\Captcha\AbstractCaptcha', 'supports', 1, 'captchaConfig', new ArrayType(new StringType(), new StringType())),
            new AddArgumentToClassWithoutDefault('Onlishop\Storefront\Framework\Cache\ReverseProxy\AbstractReverseProxyGateway', 'tag', 2, 'response', new ObjectType('Symfony\Component\HttpFoundation\Response')),
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        ArgumentAdderRector::class,
        [
            new ArgumentAdder('Onlishop\Core\Content\Media\Thumbnail\ThumbnailService', 'updateThumbnails', 2, 'strict', false, new BooleanType()),
        ],
    );

    $rectorConfig->rule(AddBanAllToReverseProxyRector::class);
};
