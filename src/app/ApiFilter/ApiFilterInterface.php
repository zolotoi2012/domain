<?php

namespace App\ApiFilter;

interface ApiFilterInterface
{
    public function getFilters(): array;
    public function getEntityClass(): string;
}
