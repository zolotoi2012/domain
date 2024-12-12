<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'brand',
        'ean',
        'price',
        'image',
        'description',
        'is_sale',
        'color',
        'size',
        'is_active',
        'discount',
        'model',
        'weight',
        'currency',
        'amount_per_package',
        'short_description',
        'country_of_origin',
        'expiration_date',
    ];
}
