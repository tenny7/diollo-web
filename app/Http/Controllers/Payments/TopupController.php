<?php

namespace App\Http\Controllers\Payments;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CustomerNotification;
use Illuminate\Support\Facades\Notification;

class TopupController extends Controller
{
    
    // use AuthenticatesUsers;
    public function redirectToGateway(Request $request)
    {
       
        // $validatedData = $this->validate($request, [
        //     'first_name' => 'required|string',
        //     'last_name' => 'required|string',
        //     'email' => 'required|email|unique:users',
        //     'phone' => 'required|string',
        //     'password' => 'required|string',
        // ]);
        // $vendor = new User();
        // $vendor->fill($validatedData);
        // $request->session()->put('vendor', $vendor);

        // $ref_key = request()->cookie('ref');
        // $request->session()->put('ref_key', $ref_key);
        


            // get the email and amount
                $email = $request->email;
                $amount = $request->amount;
                // dd($amount);
                // $amount = 4000;
        		$total = $amount * 100;  //the amount in kobo

                $curl = curl_init();
                // dd($amount_paid);
        		curl_setopt_array($curl, array(
                    CURLOPT_URL               => "https://api.paystack.co/transaction/initialize",
                    CURLOPT_RETURNTRANSFER    => true,
                    CURLOPT_CUSTOMREQUEST     => "POST",
                            CURLOPT_POSTFIELDS            => json_encode([
                                'amount'                  => $total,
                                'email'                   => $email,
                                'callback_url'            =>'http://http://35.234.133.174/addfunds/payment/callback'
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
        // }else{
        //     return redirect('signin')->with('status', 'Please login ');
        // }


		// redirect to page so User can pay
		// uncomment this line to allow the user redirect to the payment page
		// header('Location: ' . $tranx['data']['authorization_url']);
    }

    //Callback URL for paystack
    public function handlePayStackCallback(Request $request)
    {
        // $vendor = session()->get('vendor');
        // dd($vendor);
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
            // // $user = Auth::user();
            // $vendor = session()->get('vendor');
            // $ref_key = session()->get('ref_key');
            // dd($ref_key);
            // dd($tranx->data->customer->email); 
            if(Auth::user()->email== $tranx->data->customer->email)
            {
               
                $amountPaid = $tranx->data->amount / 100;
               

                $wallet = Wallet::find(1);
                $wallet->amount += $amountPaid;
                $wallet->save();

                $user = User::find(Auth::id()); 
                $user->wallet_balance += $amountPaid;
                $user->save();

                $adminUser = User::where('role', User::ROLE_ADMIN)->get();
                Notification::send($adminUser, new CustomerNotification($user));

                $user = Auth::user();
                $wallet = $user->wallet_balance;

                // return back()->with('success','Your successfully topped-up your wallet');
                $success = 'You successfully topped-up your wallet';
                return view('user.wallet',compact('wallet','user','success'));
               
            }
            else
            {
                // dd('hey');
                return back()->with('error', 'Payment wasn\'t successful');
               
            }

        }
    }

   
}
