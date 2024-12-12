<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class OrderRequest
{
    public function rules(): array
    {
        return [
            'number' => 'string|min:3|max:100',
        ];
    }
}
