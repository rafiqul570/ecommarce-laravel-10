<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'product_name',
        'product_price',
        'product_color',
        'product_size',
        'quantity',
           
       
     ];
 

 public function product()
    {
        return $this->belongsTo(Product::class);
    }


}