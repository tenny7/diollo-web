<?php

namespace App\Http\Controllers\Payments;

use App\Models\Cart;
use App\Models\Wallet;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function redirectToGateway(Request $request)
    {
       

        // check if the user attempting to pay is logged in
        if(Auth::check())
        {
            // dd($request->total);
            // check if the plan clicked on is pro plan
            // if(!empty($request->campaign_title)  && !empty($request->campaign_id) )
            // {
                // $payment_process_info = [
                //     'campaign_id'   => $request->campaign_id,
                //     'donor_id'      => Auth::user()->id
                // ];
                // $payassist = PayAssistant::create($payment_process_info);
                

                // $request->session()->put('ref_key', $ref_key);
                // get the email and amount
                $email = Auth::user()->email;
        		$total = $request->total * 100;  //the amount in kobo

                $curl = curl_init();
                // dd($amount_paid);
        		curl_setopt_array($curl, array(
                    CURLOPT_URL               => "https://api.paystack.co/transaction/initialize",
                    CURLOPT_RETURNTRANSFER    => true,
                    CURLOPT_CUSTOMREQUEST     => "POST",
                            CURLOPT_POSTFIELDS            => json_encode([
                                'amount'                  => $total,
                                'email'                   => $email,
                                'callback_url'            =>'http://localhost:8000/payment/callback'
                            ]),
                  
        		  CURLOPT_HTTPHEADER => [
        		    "authorization: Bearer sk_test_8fe87ec192bed4c5fdc426c359c9e989a2ccea48", //replace this with your own test key
        		    "content-type: application/json",
        		    "cache-control: no-cache"
        		  ],
        		));

                $response = curl_exec($curl);
                
                
                
        		$err = curl_error($curl);
                
        		if($err){
        		  // there was an error contacting the Paystack API
        		  die('Curl returned error: ' . $err);
        		}

        		$tranx = json_decode($response);
                // dd($tranx);

        		if(!$tranx->status){
                    // dd('helo');
        		  // there was an error from the API
        		  print_r('API returned error: ' . $tranx->message);
        		}

        		// comment out this line if you want to redirect the user to the payment page
        		// print_r($tranx);

                // store transaction reference so we can query in case user never comes back perhaps due to network issue
                // dd($tranx);
                $lastTransref = $tranx->data->reference;

                // redirect to page so User can pay
                return Redirect()->away($tranx->data->authorization_url);

            // }
        }else{
            return redirect('signin')->with('status', 'Please login ');
        }


		// redirect to page so User can pay
		// uncomment this line to allow the user redirect to the payment page
		// header('Location: ' . $tranx['data']['authorization_url']);
    }

    //Callback URL for paystack
    public function handlePayStackCallback(Request $request)
    {
        $curl = curl_init();
        $reference = isset($_GET['reference']) ? $_GET['reference'] : '';
        if(!$reference){
            die('No reference supplied');
        }

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
            CURLOPT_RETURNTRANSFER => true,
            // CURLOPT_SSL_VERIFYPEER => false,
            // CURLOPT_SSL_VERIFYHOST => 2,
            // CURLOPT_SSLVERSION => 6,
            // CURLOPT_USERAGENT => "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.1) Gecko/2008070208 Firefox/3.0.1",
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "authorization: Bearer sk_test_8fe87ec192bed4c5fdc426c359c9e989a2ccea48",
                "cache-control: no-cache"
            ],
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        if($err){
            // there was an error contacting the Paystack API
            return redirect('subscription')->with('status', 'There was an error connecting to Paystack API. Please try again');
        }

        $tranx = json_decode($response);


        if(!$tranx->status){
            // there was an error from the API
            return redirect('billing')->with('status', 'There was an error from Paystack API. Please try again');
        }
        // dd($request->campaign_id);
        if($tranx->data->status == 'success')
        {
            // transaction was successful...
            $user = Auth::user();
            
            if($user->email == $tranx->data->customer->email)
            {
                $amountPaid = $tranx->data->amount / 100;
                $cartItems = Cart::where('user_id', Auth::user()->id)->get();
                

                $order = $user->orders()->Create([
                    // 'store_id'      => $cartItem->store_id,
                    'total'         => $amountPaid,
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
                $wallet->amount += $amountPaid;
                $wallet->save();
                    // 'name'  => 'Passward account',
                    // 'amount' => ;
                

                // if($order)
                // {
                    $removeItems = Cart::where('user_id', Auth::user()->id)->get();
                    foreach($removeItems as $removeItem)
                    {
                        try {
                            $product = Cart::where('user_id',$removeItem->user_id)->first()->each(function ($product, $key) {
                                $product->delete();
                            });
                            Session::flash('success', 'Payment successful!'); 
                            Session::flash('alert-class', 'alert-success'); 
                            return redirect()->back();
                        }
                        catch(\Exception $e) {
                            dd($e);
                        }
                    }
                    
                // }

                
               
            }
            else
            {
                return back()->with('error', 'Payment wasn\'t successful');
                // return Response::json(['error' => 'Donation unsuccessful']);
                // return view('users.subscription')->with('status', 'Your payment was not completed, please contact the administrator.');
            }

        }
    }
}
