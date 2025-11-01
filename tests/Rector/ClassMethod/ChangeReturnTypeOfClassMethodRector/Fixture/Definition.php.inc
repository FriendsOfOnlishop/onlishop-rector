<?php declare(strict_types=1);

namespace FriendsOfOnlishop\Rector\Tests\Rector\ClassMethod\ChangeReturnTypeOfClassMethodRector\Fixture;

use OpenSearchDSL\Query\Compound\BoolQuery;
use Onlishop\Core\Framework\Context;
use Onlishop\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Onlishop\Elasticsearch\Framework\AbstractElasticsearchDefinition;

class ElasticsearchProductDefinition extends AbstractElasticsearchDefinition
{
    public function buildTermQuery(Context $context, Criteria $criteria): BoolQuery
    {
    }
}

-----
<?php declare(strict_types=1);

namespace FriendsOfOnlishop\Rector\Tests\Rector\ClassMethod\ChangeReturnTypeOfClassMethodRector\Fixture;

use OpenSearchDSL\BuilderInterface;
use OpenSearchDSL\Query\Compound\BoolQuery;
use Onlishop\Core\Framework\Context;
use Onlishop\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Onlishop\Elasticsearch\Framework\AbstractElasticsearchDefinition;

class ElasticsearchProductDefinition extends AbstractElasticsearchDefinition
{
    public function buildTermQuery(Context $context, Criteria $criteria): BuilderInterface
    {
    }
}
