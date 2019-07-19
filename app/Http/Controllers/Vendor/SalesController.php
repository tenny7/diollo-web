<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Order;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = Store::where('vendor_id',Auth::id())->first();
        if($store)
        {
            $orderProducts = DB::table('order_product')->where('store_id',$store->id)->get();
            return view('vendors.sales.all', compact('orderProducts'));
        }
        else 
        {
            // dd(Auth::id());
            
            return view('vendors.sales.all'); 
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
    public function returns()
    {
        return view('vendors.sales.returns');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reserved()
    {
        return view('vendors.sales.reserved');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customers()
    {
        $store = Store::where('vendor_id',Auth::id())->first();
        if ($store) 
        {
            $orders = Order::where('store_id', $store->id)->get();
            return view('vendors.sales.customers',compact('orders'));
        }
        else 
        {
            return view('vendors.sales.customers');
        }
        
    }

    // public function bulkCustomerDelete(Request $request)
    // {
    //     $ids = $request->id;
    //     // return Response::json(['success' => 'success']);
    //     $promotions = User::whereIn('id',$ids)->delete();
    //     if($promotions)
    //     {
    //         return response()->json(['success' => 'Promotion(s) Deleted']);  
    //     }
    // }



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
    public function destroy($id)
    {
        //
    }
}
