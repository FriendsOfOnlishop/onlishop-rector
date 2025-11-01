<?php declare(strict_types=1);

namespace Onlishop\Elasticsearch\Framework;

use OpenSearchDSL\Query\Compound\BoolQuery;
use Onlishop\Core\Framework\Context;
use Onlishop\Core\Framework\DataAbstractionLayer\Search\Criteria;

abstract class AbstractElasticsearchDefinition
{
    abstract public function buildTermQuery(Context $context, Criteria $criteria): BoolQuery;
}
