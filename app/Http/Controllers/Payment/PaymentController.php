<?php

namespace App\Http\Controllers\Payment;

use Paystack;

use App\Models\Cart;
use App\Models\Order;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);
        $user = Auth::user();
        $order = $user->orders()->create([
            // 'price' =>  
            'status' => '1'
        ]);

        $cartItems = Cart::all();
        foreach($cartItems as $cartItem)
        {
            $order->orderItems()->attach($cartItem->id,[
                'qty' => $cartItem->qty,
                'price' => $cartItem->price*$cartItem->qty,
            ]);
        }
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}