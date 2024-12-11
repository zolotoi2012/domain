<?php

namespace App\Services;

use App\Enum\EntityType;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface DataProviderInterface
{
    public function getDataByFilters(EntityType $entityType, Request $request): Collection;
}
