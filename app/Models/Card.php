<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'product_name',
        'product_price',
        'quantity',
           
       
     ];
 }
