<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_price',
        'product_quantity',
        'category_id',
        'subcategory_id',
        'category_name',
        'subcategory_name',
        'short_description',
        'long_description',
        'product_img',
        'slug',

    ];
}
