<?php

namespace App\Http\Controllers\User;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gerardojbaez\GeoData\Models\City;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('about');
    }
    public function help()
    {
        return view('help');
    }
    public function faq()
    {
        return view('faq');
    }
    
    public function showAccountInfo()
    {
        $user = Auth::user();
        // $city = City::find($user->city_id);
        // dd($city);
        return view('user.accountinfo', compact('user', 'city'));
    }

    public function showStores()
    {
        $stores = Store::all();
        // dd('sand');
        return view('stores', compact('stores'));
    }

    public function showProductPage($product_id) 
    {
        $product = Product::find($product_id);
        return view('product', compact('product'));
    }

    public function showStorePage($store_id)
    {
        // dd('helol');
        $store = Store::find($store_id);
        $products = Product::where('store', $store_id)->get();
        $clearances = Product::where('status', Product::CLEARANCE_PRODUCT)->where('store',$store_id)->get();
        
        return view('storePage', compact('store','products','clearances'));
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
    public function destroy($id)
    {
        //
    }
}
