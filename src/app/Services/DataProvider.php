<?php
declare(strict_types=1);

namespace App\Services;

use App\Enum\EntityType;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Spatie\QueryBuilder\QueryBuilder;

final class DataProvider implements DataProviderInterface
{
    public function __construct(private Registry $apiFilterRegistry)
    {
    }

    public function getDataByFilters(EntityType $entityType, Request $request): Collection
    {
        $apiFilter = $this->apiFilterRegistry->get($entityType->value);

        return QueryBuilder::for($apiFilter->getEntityClass())
            ->allowedFilters($apiFilter->getFilters())
            ->jsonPaginate()
            ->getCollection();
    }
}
