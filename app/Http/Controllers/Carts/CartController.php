<?php

namespace App\Http\Controllers\Carts;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

class CartController extends Controller
{
    public function addToCart(Request $request,$product_id)
    {
        $validatedData = $this->validate($request, [
            'price'   => 'required',
            'qty'   => 'required',
            'product_id' => 'required'
        ]);

        if($request->ajax())
        {
            $product = Product::find($request->product_id);
            $data = [
                'product_id' => $product->id,
                'qty'       => $request->qty,
                'store_id' => $product->store,
                'price' => $request->price,
                'user_id' => Auth::id(),
            ];
            $cart = Cart::create($data);
            return Response::json(['success' => 'Added to Cart']);

        }
        
    }
    public function updateQty(Request $request,$id)
    {
        // $validatedData = $this->validate($request, [
        //     // 'price'   => 'required',
        //     // 'qty'   => 'required',
        //     // 'id' => 'required'
        //     'qty'   => 'required',
        //     'productId' => 'required'
        // ]);

        // if($request->ajax())
        // {
            // $product = Product::find($request->id);
            $cart = Cart::where('product_id',$id)->first();
            $cart->qty = $request->qty;
            if($cart->save())
            {
                // return Response::json(['success' => 'Quantity Updated ']);
                return back()->with(['success' => 'Quantity Updated ']);
            }
            

        // }
        
    }

    public function deleteFromCart(Request $request)
    {
        Response::json(['success' => 'Success']);
        $ids = $request->id;
        
        $carts = Cart::whereIn('product_id',$ids)->delete();
        if($carts)
        {
            return response()->json(['success' => 'Store Deleted']);  
        }
    }

    public function checkout(Request $request)
    {
        // $cart = 
    }

    // public function addCart($id)
    // {
    
    //     $product = Product::find($id);
 
    //     if(!$product) {
 
    //         abort(404);
 
    //     }
 
    //     $cart = session()->get('cart');
 
    //     // if cart is empty then this the first product
    //     if(!$cart) {
 
    //         $cart = [
    //                 $id => [
    //                     "name" => $product->name,
    //                     "quantity" => 1,
    //                     "price" => $product->price,
    //                     "photo" => $product->photo
    //                 ]
    //         ];
 
    //         session()->put('cart', $cart);
 
    //         return redirect()->back()->with('success', 'Product added to cart successfully!');
    //     }
 
    //     // if cart not empty then check if this product exist then increment quantity
    //     if(isset($cart[$id])) {
 
    //         $cart[$id]['quantity']++;
 
    //         session()->put('cart', $cart);
 
    //         return redirect()->back()->with('success', 'Product added to cart successfully!');
 
    //     }
 
    //     // if item not exist in cart then add to cart with quantity = 1
    //     $cart[$id] = [
    //         "name" => $product->name,
    //         "quantity" => 1,
    //         "price" => $product->price,
    //         "photo" => $product->photo
    //     ];
 
    //     session()->put('cart', $cart);
 
    //     return redirect()->back()->with('success', 'Product added to cart successfully!');
    // }
   
}
