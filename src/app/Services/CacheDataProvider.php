<?php

namespace App\Services;

use App\Enum\EntityType;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Psr\SimpleCache\CacheInterface;

final readonly class CacheDataProvider implements DataProviderInterface
{
    private const DEFAULT_TTL = 3600;

    public function __construct(private DataProvider $original, private CacheInterface $cache, private int $ttl = self::DEFAULT_TTL)
    {
    }

    public function getDataByFilters(EntityType $entityType, Request $request): Collection
    {
        $filter = $request->get('filters', []);
        $key = $this->createKey($filter);

        if ($this->cache->has($key)) {
           return $this->cache->get($key);
        }

        $data = $this->original->getDataByFilters($entityType, $request);

        $this->cache->set($key, $data, $this->ttl);

        return $data;
    }

    public function createKey(array $filters): string|false
    {
        return hash('sha256', json_encode($filters));
    }
}
