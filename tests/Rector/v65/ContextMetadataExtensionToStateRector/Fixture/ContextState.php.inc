<?php
namespace FriendsOfOnlishop\Rector\Tests\Rector\v65\ContextMetadataExtensionToStateRector\Fixture;

$context = new \Onlishop\Core\Framework\Context();
$context->addExtension(\Onlishop\Core\Framework\DataAbstractionLayer\Indexing\EntityIndexerRegistry::USE_INDEXING_QUEUE, new \Onlishop\Core\Framework\Struct\ArrayEntity());
?>
-----
<?php
namespace FriendsOfOnlishop\Rector\Tests\Rector\v65\ContextMetadataExtensionToStateRector\Fixture;

use Onlishop\Core\Framework\Context;
use Onlishop\Core\Framework\DataAbstractionLayer\Indexing\EntityIndexerRegistry;

$context = new Context();
$context->addState(EntityIndexerRegistry::USE_INDEXING_QUEUE);
?>
