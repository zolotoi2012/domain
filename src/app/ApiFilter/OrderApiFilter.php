<?php

namespace App\ApiFilter;

use App\Models\Order;

class OrderApiFilter implements ApiFilterInterface
{
    public function getFilters(): array
    {
        return [
            'number',
        ];
    }

    public function getEntityClass(): string
    {
        return Order::class;
    }
}
