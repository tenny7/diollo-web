<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function showOrderPage()
    {
        return view('user.order');
    }

    public function showOrderEmptyPage()
    {
        return view('user.orderEmpty');
    }

    public function addOrder(Request $request)
    {
        $validatedData = $this->validate($request,[
            'qty' => 'required',
            'price' => 'required',
            'tax_amount' => 'nullable',
            'product_id' => 'required',
        ]);

        $order = new OrderProduct();
        $order->fill($validatedData);
        
    }
}
