<?php

namespace App\Services;

use App\DTO\QueryDTO;
use App\Models\Domain;
use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class QueryService
{
    public const TTLDuration = 60;

    public const RELATIONS = [
            "type_id" => "types",
            "category_id" => "categories",
            "brand_id" => "brands",
            "currency_id" => "currencies"
        ];

    public function buildQuery(array $data): QueryDTO {
//        $uuid = json_encode($filters);
//
//        $result = Cache::get($uuid);
//        if (!empty($result)) {
//            return (new QueryDTO())->setQuery($result)->setUuid($uuid);
//        }

        $uuid = Uuid::uuid();

        $query = Domain::query();

        $values = ["false" => False, "true" => True];

        foreach ($data["filters"] as $key => $value) {
            if (in_array($key, self::RELATIONS)) {
                $query = $query->with(self::RELATIONS[$key]);
            }

            if ($this->isValidFilter($key)) {
                if ($value == "false" || $value == "true") {
                    $query = $query->where($key, '=', $values[$value]);
                } else {
                    $query = $query->where($key, '=', $value);
                }
            }
        }



        if (empty($data["name"])) {
            $this->putToCache($query, $uuid);

            return (new QueryDTO())->setQuery($query)->setUuid($uuid);
        }

        $query->where('name', '=', $data["name"]);
        $this->putToCache($query, $uuid);

        return (new QueryDTO())->setQuery($query)->setUuid($uuid);
    }

    /**
     * @param  string  $key
     * @return bool
     */
    private function isValidFilter(string $key): bool
    {
        return in_array($key, \Schema::getColumnListing((new Domain)->getTable()));
    }

    /**
     * @param Builder $query
     * @param string $uuid
     * @return void
     */
    private function putToCache(Builder $query, string $uuid): void
    {
        try {
            Cache::put($uuid, $query, self::TTLDuration);
        } catch (\Exception $e) {
            echo "heeloooo";
            Log::error("Failed to cache products: " . $e->getMessage());
        }
    }
}
