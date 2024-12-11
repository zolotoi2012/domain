<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class ProductRequest
{
    public function rules(): array
    {
        return [
            'filter.name' => 'string|min:3|max:100',
        ];
    }
}
