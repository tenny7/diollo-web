<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReserve extends Model
{
    protected $fillable = ['user_id','product_id','qty','expiry_date'];
}
