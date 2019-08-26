<?php

namespace App\Http\Controllers\Order;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function showOrderPage()
    {
        $carts = Cart::where('user_id', Auth::id())->get();
        $total = Cart::where('user_id', Auth::id())->sum('price') ;
        $orders = Order::where('user_id',Auth::id())->get();
        return view('user.shoppingcart', compact('carts', 'total','orders'));
    }

    public function viewOrders()
    {
        // $orders = Order::all();
        // $orderProducts = DB::table('order_product')->get();
        $orders = Order::where('user_id',Auth::id())->distinct('order_id')->get();
        
        
        
        return view('user.order', compact('orders'));
    }
    public function listOrders($id)
    {
        $orderProducts = DB::table('order_product')->where('user_id',Auth::id())->where('order_id',$id)->get();
        return view('user.list', compact('orderProducts'));
    }

    public function addOrder(Request $request)
    {
        $validatedData = $this->validate($request,[
            'qty' => 'required',
            'price' => 'required',
            'tax_amount' => 'nullable',
            'product_id' => 'required',
        ]);
        $order = Order::firstOrCreate([

        ]);

        foreach ($product_id as $product)
        {
            $orederProduct = OrderProduct::firstOrCreate([
                'product_id' => $product['id']
                // 'order' => $product['id']
            ]);
        }

        // $order = new OrderProduct();
        $order->fill($validatedData);
        
    }
}
