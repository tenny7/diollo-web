<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orders = Order::all();
        $orderProducts = DB::table('order_product')->get();
        // dd($orderProducts);
        
        return view('admin.orders.all', compact('orderProducts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function returns()
    {
        return view('admin.orders.returns');
    }

    public function markAsReturned($order_id)
    {
        $order = Order::find($order_id);
        $order->status = Order::STATUS_RETURNED;
        if($order->save())
        {
            return redirect()->back()->with(['success' => 'action completed']);
        }
        
    }
      
    public function markAsReserved($order_id)
    {
        $order = Order::find($order_id);
        $order->status = Order::STATUS_RESERVED;
        if($order->save())
        {
            return redirect()->back()->with(['success' => 'action completed']);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reserved()
    {
        return view('admin.orders.reserved');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customers()
    {
        return view('admin.orders.customers');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bulkOrdersDelete(Request $request)
    {
        $ids = $request->id;
        // return response()->json(['success' => $ids]); 
        $aa = OrderProduct::whereIn('order_id',$ids)->get();
        // $orders = Order::whereIn('id',$ids)->delete();
        return response()->json(['success' => $aa]);  
        // $orderProduct = OrderProduct::whereIn('order_id',$ids)->delete();
        if($orders)
        {
            return response()->json(['success' => 'Order(s) Deleted']);  
        }
    }
    
}
