<?php

namespace App\Http\Controllers\Payments;

use App\Models\User;
use App\Models\Wallet;
use App\Jobs\SendEmailJob;
use App\Models\Commitment;
use App\Models\VerifyUser;
use Illuminate\Http\Request;
use App\Events\VendorReferred;
use App\Models\CommitmentWallet;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\CustomerNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class VendorPayment extends Controller
{
    use AuthenticatesUsers;
    public function redirectToGateway(Request $request)
    {
       
        $validatedData = $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);
        $vendor = new User();
        $vendor->fill($validatedData);
        $request->session()->put('vendor', $vendor);

        $ref_key = request()->cookie('ref');
        $request->session()->put('ref_key', $ref_key);
        


            // get the email and amount
                $email = $request->email;
                $amount = 4000;
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
                                'callback_url'            =>'http:///35.230.142.66/vendor/payment/callback'
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
        $vendor = session()->get('vendor');
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
            // $user = Auth::user();
            $vendor = session()->get('vendor');
            $ref_key = session()->get('ref_key');
            // dd($ref_key);
            // dd($tranx->data->customer->email); 
            if($vendor->email== $tranx->data->customer->email)
            {
                $amountPaid = $tranx->data->amount / 100;
                $data = [
                    'first_name'    => $vendor->first_name,
                    'last_name'     => $vendor->last_name,
                    'email'         => $vendor->email,
                    'phone'         => $vendor->phone,
                    'password'      => Hash::make($vendor->password)
                ];
                $user = new User();
                $user->fill($data);


                $user->role = User::ROLE_VENDOR;
                $user->save();
                
                $payment_data = [
                    'user_id'   => $user->id,
                    'amount'    => $amountPaid,
                    'status'    => Commitment::STATUS_COMMITED,
                ];

                // $commitmentWallet = CommitmentWallet::find(1);

                $commitmentWallet = CommitmentWallet::find(1);
                $commitmentWallet->amount += $amountPaid;
                $commitmentWallet->save();

                $commitment = Commitment::firstOrCreate($payment_data);
                // ref_key
                // dd('helo');
                $adminUser = User::where('role', User::ROLE_ADMIN)->get();
                Notification::send($adminUser, new CustomerNotification($user));
                event(new VendorReferred($ref_key, $user));
                // dd('no');
               if(Auth::check())
               {    
                   if(Auth::user()->role == User::ROLE_AGENT)
                    {
                        $users = User::all();
                        $success = 'Vendor added';
                        return view('agents.vendors.new', compact('users','success'));
                    }else
                    {
                    $status = 'Please check your mail and click on the verification link sent to you';
                        $this->guard()->login($user);
                        return $this->registered($request, $user)
                        ?: redirect()->intended(route('signin'))->with(['status' => $status]);
                    }
                }
                else {
                    $status = 'Please check your mail and click on the verification link sent to you';
                        $verifyUser = VerifyUser::create([
                            'user_id' => $user->id,
                            'token' => sha1(time())
                        ]);

                        SendEmailJob::dispatch($user);
                        
                        return $this->registered($request, $user)
                        
                        ?: redirect()->intended(route('signin'))->with(['status' => $status]);
                }   
                   
                // return view('vendors.dashboard')->with('success', 'Payment successful');
            }
            else
            {
                return back()->with('error', 'Payment wasn\'t successful');
                // return Response::json(['error' => 'Donation unsuccessful']);
                // return view('users.subscription')->with('status', 'Your payment was not completed, please contact the administrator.');
            }

        }
    }

    protected function guard()
    {
        return Auth::guard();
    }

    protected function registered(Request $request, $user)
    {
        
        // $this->guard()->logout();
        // return redirect('/signin')->with('status', 'We sent you an activation code. Check your email and click on the link to verify.');
    }
}
