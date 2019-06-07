<?php

namespace App\Http\Controllers\Agent;

use App\Models\User;
use App\Models\Brand;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ProductNotification;
use Illuminate\Support\Facades\Notification;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        // dd($products);
       
        return view('agents.products.all', compact('products'));
        
    }

    public function addProduct(Request $request)
    {

        // dd($request->all());
        $validatedData = $this->validate($request,[
            'name'              =>  'required|string',
            'code'              =>  'required|numeric',
            'description'       =>  'required|string',
            'quick_description' =>   'required|string',
            'qty'               =>  'required|numeric',
            'is_taxable'        =>  'required|numeric',
            'original_price'    =>  'required|numeric',
            'discount_price'    =>  'required|numeric',
            'meta_title'        =>  'required|string|max:255',
            'meta_description'  =>  'required|string|max:255',
            // 'product_image'  =>  'required|mimes:jpeg,jpg,png,bmp,gif,svg|max:2043',
            'brand'             =>  'required|numeric',
            'store'             =>  'required|numeric',
            'agent'             =>  'required|numeric',
            'waranty'           =>  'required|string'
        ]);

        $product = Product::firstOrCreate($validatedData);
        $product->slug = $product->name;
        $product->status = 1;
        $product->saveProductImages(collect($request->product_image));

       if($product->save())
        {
            $adminUser = User::where('role', User::ROLE_ADMIN)->get();
            Notification::send($adminUser, new ProductNotification($product));
            return redirect()->back()->with(['success' => 'Product Saved Successfully']); 
        }
        return redirect()->back()->with(['error' => 'Failed to save product']);
        
    }

    public function updateForm($product_slug)
    {
        $product = Product::where('slug', $product_slug)->first();
        $brands = Brand::all();
        $agents = User::where('role', User::ROLE_AGENT)->get();
        $stores = Store::all();

        
        // Auth::user()->notify(new ProductNotification($product));
        return view('agents.products.update', compact('product','brands','stores','agents'));
    }

    public function updateProduct(Request $request,$product_slug)
    {

        // dd($request->all());
        $validatedData = $this->validate($request,[
            'name'              =>  'required|string',
            // 'code'              =>  'required|numeric',
            'description'       =>  'required|string',
            'quick_description' =>   'required|string',
            'qty'               =>  'required|numeric',
            'is_taxable'        =>  'required|numeric',
            'original_price'    =>  'required|numeric',
            'discount_price'    =>  'required|numeric',
            'meta_title'        =>  'required|string|max:255',
            'meta_description'  =>  'required|string|max:255',
            // 'product_image'  =>  'required|mimes:jpeg,jpg,png,bmp,gif,svg|max:2043',
            'brand'             =>  'required|numeric',
            'store'             =>  'required|numeric',
            'agent'             =>  'required|numeric',
            'waranty'           =>  'required|string'
        ]);

        // $product = Product::find($request->product_id);
        $product = Product::where('slug',$product_slug)->first();
        $product->update($validatedData);
        // $product->slug = $product->name;
        $product->status = 1;
        // $product->saveProductImages(collect($request->product_image));

        // dd($product);
        
        if($product->save())
        {
            return redirect()->back()->with(['success' => 'Product Updated Successfully']); 
        }
        return redirect()->back()->with(['error' => 'Failed to Update product']);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function featured()
    {
        $products = Product::where('status',Product::FEATURED_PRODUCT)->get();
        return view('agents.products.featured', compact('products'));
    }

    public function addToFeatured($product_slug)
    {
        $product = Product::where('slug',$product_slug)->first();
        $product->status = Product::FEATURED_PRODUCT;
        if($product->save())
        {
            return redirect()->back()->with([
                'success' => $product->name.' '.'has been added to featured product '
                ]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function clearance()
    {
        $products = Product::where('status',Product::CLEARANCE_PRODUCT)->get();
        return view('agents.products.clearance', compact('products'));
    }

    public function addToClearance($product_slug)
    {
        $product = Product::where('slug',$product_slug)->first();
        $product->status = Product::CLEARANCE_PRODUCT;
        if($product->save())
        {
            return redirect()->back()->with([
                'success' => $product->name.' '.'has been added to clearance sales product '
                ]);
        }
    }


    public function new()
    {
        $brands = Brand::all();
        $agents = User::where('role', User::ROLE_AGENT)->get();
        $stores = Store::all();
        return view('agents.products.new', compact('brands','stores','agents'));
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
    public function destroy($product_slug)
    {
        $product = Product::where('slug',$product_slug)->first();
        
        if($product->delete())
        {
            return redirect()->back()->with([
                'success' => $product->name.' '.'has been deleted '
                ]);
        }
        else
        {
            return redirect()->back()->with([
                'error' => 'something went wrong'
                ]);
        }

    }
}
