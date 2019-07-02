<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'product_id',
        'store_id',
        'user_id',
        'payment',
        'qty',
        'price',
        'tax_amount',
        'status',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public static function total()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        // dd($carts);
        $total = 0;
        // $subtotal = collect();
        $sbbtotal = [];
        foreach($carts as $cart)
        {
        //    $subtotal = $cart->qty * $cart->price;
           array_push($sbbtotal,$cart->qty * $cart->price);
        //    dd($subtotal); 
        }
        $total = array_sum($sbbtotal);
        // $total += $subtotal->sum();
        // dd($total);
        return $total;
    }
}
