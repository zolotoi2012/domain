<?php

namespace App\DTO;

use Illuminate\Database\Eloquent\Builder;

class QueryDTO
{
    private Builder $query;

    private string $uuid;

    public function getQuery(): Builder
    {
        return $this->query;
    }

    public function setQuery(Builder $query): self
    {
        $this->query = $query;

        return $this;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }
}
