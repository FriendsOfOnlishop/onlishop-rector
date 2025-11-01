<?php
namespace FriendsOfOnlishop\Rector\Tests\Rector\v65\RedisConnectionFactoryCreateRector\Fixture;

use Onlishop\Core\Content\Media\Thumbnail\ThumbnailService;

$thumbnail = new ThumbnailService();

$thumbnail->generateThumbnails($media, $context);
?>

-----
<?php
namespace FriendsOfOnlishop\Rector\Tests\Rector\v65\RedisConnectionFactoryCreateRector\Fixture;

use Onlishop\Core\Content\Media\Thumbnail\ThumbnailService;

$thumbnail = new ThumbnailService();

$thumbnail->generate(new \Onlishop\Core\Content\Media\MediaCollection([$media]), $context);
?>
