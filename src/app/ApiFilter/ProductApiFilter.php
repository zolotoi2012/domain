<?php

namespace App\ApiFilter;

use App\Models\Product;

class ProductApiFilter implements ApiFilterInterface
{
    public function getFilters(): array
    {
        return [
            'name',
            'category_id',
            'is_sale',
            'is_active',
            'is_present',
            'price',
            'brand_id',
            'currency_id',
            'model',
            'size',
            'os',
            'color',
            'serial_number',
            'discount',
            'processor',
            'camera',
            'guarantee',
        ];
    }

    public function getEntityClass(): string
    {
        return Product::class;
    }
}
