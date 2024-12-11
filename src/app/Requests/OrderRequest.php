<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class OrderRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string|min:3|max:100',
        ];
    }
}
