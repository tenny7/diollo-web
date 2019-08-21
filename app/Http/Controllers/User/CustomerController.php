<?php

namespace App\Http\Controllers\User;

use Exception;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Store;
use App\Models\Review;
use App\Models\Wallet;
use App\Models\Product;
use App\Models\Category;
use App\Models\Promotion;
use App\Jobs\RemoveReserve;
use Illuminate\Http\Request;
use App\Models\ProductReserve;
use willvincent\Rateable\Rating;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Gerardojbaez\GeoData\Models\City;
use Illuminate\Support\Facades\Session;
use Gerardojbaez\GeoData\Models\Country;
use Illuminate\Support\Facades\Response;

class CustomerController extends Controller
{

    

    public function payingFromWallet(Request $request)
    {
        $user = Auth::user();
        $amount = $request->amount;
        // dd($amount);
        $walletBalance  = Auth::user()->wallet_balance;
        if($walletBalance >= $amount)
        {
            
            $cartItems = Cart::where('user_id', Auth::user()->id)->get();
                
                $order = $user->orders()->Create([
                    'total'         => $amount,
                    'status'        => 1
                ]);

                foreach($cartItems as $cartItem)
                {
                    
                    $order->products()->attach($cartItem->id,[
                        'product_id'    => $cartItem->product_id,
                        'user_id'       => Auth::id(),
                        'store_id'      => $cartItem->store_id,
                        'qty'           => $cartItem->qty,
                        'price'         => $cartItem->price,
                    ]);

                    $product = Product::find($cartItem->product_id);
                    $product->qty -= $cartItem->qty;
                    $product->save();
                }

                $wallet = Wallet::find(1);
                $wallet->amount += $amount;
                $wallet->save();

                $user = User::find(Auth::id());
                $user->wallet_balance -= $amount;
                $user->save();
                
                    $removeItems = Cart::where('user_id', Auth::user()->id)->get();
                    foreach($removeItems as $removeItem)
                    {
                        try {
                            $product = Cart::where('user_id',$removeItem->user_id)->first()->each(function ($product, $key) {
                                $product->delete();
                            });
                            return back()->with('success','Payment successful!');
                        }
                        catch(\Exception $e) {
                            dd($e);
                        }
                    }
                   $total = 0; 
            return back()->with(['success' =>'Payment Successful','total' => $total ]);
        }
        elseif($walletBalance < $amount)
        {
            return back()->with('error','You have insufficient funds in your wallet. Please top up your wallet and try again');
        }
        
    }

    public function showPaymentForm($total)
    {
        return view('user.payFromWallet',compact('total'));
    }

    public function showWalletPage()
    {
        $user = Auth::user();
        $wallet = $user->wallet_balance;
        return view('user.wallet',compact('wallet','user'));
    }

    public function updateAccount(Request $request)
    {
        $validatedData = $this->validate($request,[
            'account_name' => 'required',
            'account_number' => 'required',
            'bank' => 'required',
        ]);

        $user = User::find(Auth::id());
        $user->fill($validatedData);
        $user->save();
        return back()->with('success','Account details updated');
    }

    public function topUp()
    {
        return view('user.topup');
    }
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
        $city = City::find($user->city_id);
        $countries = Country::all();
        return view('user.accountinfo', compact('user', 'city','countries'));
    }
    public function saveProfile(Request $request)
    {
       
        $rules =  [
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
            
        ];
        $data = [
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            
        ];
        
        $user = User::findOrFail(Auth::id());
        $user->update($data);
        
        return redirect()->back()->with(['success' => 'Profile Updated']);
        // return view('user.accountinfo', compact('user', 'city'));
    }

    public function updatePassword(Request $request)
    {
        $rules = [
            'old_password'  => 'required|string|min:8',
            'new_password'  => 'required|string|min:8',
            'c_password'    => 'required|string|min:8',
        ];

        $this->validate($request, $rules);

        $user = User::findOrFail(Auth::user()->id);
        if(Hash::check($request->old_password, $user->password))
        {
            if($request->new_password == $request->c_password)
            {
                $user->fill([
                    'password' => Hash::make($request->new_password)
                ])->save();
                
                return redirect()->back()->with(['success' => 'Password changed successfully']);
            }
        }
        elseif(!Hash::check($request->old_password, $user->password))
        {
            
            return redirect()->back()->with(['error' => 'old password incorrect']);
        } 
    }

    public function updateLocation(Request $request)
    {
        $rules =  [
            
            'street' => 'required|string',
            'country_code' => 'required|exists:countries,code',
            'region_id' => 'required|exists:regions,id',
            'city_id' => 'required',
        ];

        $city = City::where('name',$request->city_id)->first();
        $data = [
            'street' => $request->street,
            'country_code' => $request->country_code,
            'region_id' => $request->region_id,
            'city_id' => $city->id,
        ];

        $user = User::findOrFail(Auth::id());
        $user->update($data);
        
        return redirect()->back()->with(['success' => 'Profile Address Updated']);
        
    }

    public function productList()
    {
        $products = Product::all();
        $promotion = Promotion::inRandomOrder('created_at', 'DSC')->where('promo_type', 'store')->where('status','<>',Promotion::STATUS_COMPLETED)->first();
        $categories = Category::all();
        return view('products', compact('products','promotion','categories'));
    }



    public function showStores()
    {
        $stores = Store::all();
        $promotion = Promotion::inRandomOrder('created_at', 'DSC')->where('promo_type', 'store')->where('status','<>',Promotion::STATUS_COMPLETED)->first();
        // dd('sand');
        $categories = Category::all();
        return view('stores', compact('stores','promotion','categories'));
    }

    public function showProductPage($product_id) 
    {
        $product = Product::find($product_id);
        $productRating = Product::find($product_id);
        $ratingCount = Product::find($product_id)->ratings;
        // dd($productRating->averageRating);
        return view('product', compact('product','productRating','ratingCount'));
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
    public function review(Request $request)
    {
        $data = [
            'title' => $request->title,
            'review_text' => $request->review_text,
            'rating' => $request->rating,
            'user_id' => Auth::id(),
            'publish_as' => $request->publish_as,
            'reviewable_id' => $request->product_id,
            'reviewable_type' => $request->product_name,
        ];
        $product = Product::find($request->product_id);

        $rating = new Rating;
        $rating->rating = $request->rating;
        $rating->user_id = Auth::id();

        // $review = Review::
        
        $product->ratings()->save($rating);
        $review = new Review;
        $review->fill($data);
        $review->rating_id = $rating->id;
        $review->save();
        
        Product::find($request->product_id)->ratings;

        

        return back()->with('success', 'Review Added');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reserveForADay(Request $request)
    {
        $data = [
            'user_id'       => Auth::id(),
            'qty'           => $request->qty,
            'product_id'    => $request->id,
            'expiry_date'   => Carbon::now()->addMinutes(1440)
        ];
        $productReserve = ProductReserve::firstOrCreate($data);
        $product = Product::find($request->id);
        $product->qty -= $request->qty;
        $product->save();
        if($productReserve)
        {
            return Response::json(['success' => 'Items Reserved for 24 hours']);
        }
        
        
    }

    
}
