<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class ProductRequest
{
    public function rules(): array
    {
        return [
            'filter.name' => 'string|min:3|max:100',
            'filter.brand' => 'string|min:3|max:100',
            'filter.ean' => 'string|min:8|max:100',
            'filter.price' => 'float|min:1',
            'filter.image' => 'string|min:4|max:100',
            'filter.description' => 'string|min:3',
            'filter.is_sale' => 'boolean',
            'filter.color' => 'string|min:3|max:100',
            'filter.size' => 'string|max:2',
            'filter.is_active' => 'boolean',
            'filter.discount' => 'float',
            'filter.model' => 'string|min:3|max:100',
            'filter.weight' => 'string|min:3|max:100',
            'filter.currency' => 'string|max:3',
            'filter.amount_per_package' => 'string|min:3|max:100',
            'filter.short_description' => 'string|min:3|max:100',
            'filter.country_of_origin' => 'string|max:100',
        ];
    }
}
