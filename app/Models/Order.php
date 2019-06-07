<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id',
        'user_id',
        'discount_code',
        'discount_percent',
        'order_status_id',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('price', 'qty', 'tax_amount');
    }

    public function history()
    {
        return $this->hasMany(OrderHistory::class);
    }

    /**
     * Get all of the order's payments.
     */
    public function payments()
    {
        return $this->morphMany('App\Models\Payment', 'payable');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function getOrderStatusNameAttribute()
    {
        return $this->orderStatus->name;
    }
}
