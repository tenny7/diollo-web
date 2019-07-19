<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATUS_PAID = 1;
    // const STATUS_RETURNED = 2;
    const STATUS_RESERVED = 2;
    protected $fillable = [
        // 'order_id',
        'user_id',
        'store_id',
        'total',
        'status',
        // 'discount_code',
        // 'discount_percent',
        // 'order_status_id',
    ];

    public  function isReserved()
    {
        return ($this->status == self::STATUS_RESERVED)?true:false;   
    }
    public  function isReturned()
    {
        return ($this->status == self::STATUS_RETURNED)?true:false;   
    }
    public  function isPaid()
    {
        return ($this->status == self::STATUS_PAID)?true:false;   
    }

    // public function OrderItems()
    // {

    // }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('price', 'qty')->withTimestamps();
        // , 'tax_amount'
    }

    public function history()
    {
        return $this->hasMany(OrderHistory::class);
    }

    /**
     * Get all of the order's payments.
     */
    // public function payments()
    // {
    //     return $this->morphMany('App\Models\Payment', 'payable');
    // }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function sales()
    {
        $sales = Order::all();
        // dd($carts);
        $total = 0;
        // $subtotal = collect();
        $sbbtotal = [];
        foreach($sales as $sale)
        {
            $total += $sale->total;
        //    $subtotal = $cart->qty * $cart->price;
        //    array_push($sbbtotal,$cart->qty  $cart->price);
        //    dd($subtotal); 
        }
        // $total = array_sum($sbbtotal);
        
        // dd($total);
        return number_format($total,2);
    }

    // public function orderStatus()
    // {
    //     return $this->belongsTo(OrderStatus::class);
    // }

    // public function getOrderStatusNameAttribute()
    // {
    //     return $this->orderStatus->name;
    // }
}
