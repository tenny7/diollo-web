<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = [
        'product_id',
        'order_id',
        'qty',
        'price',
        'user_id',
    ];

    // public function product()
    // {
    //     return $this->belongTo(Product::class);
    //     // , 'tax_amount'
    // }
}
