<?php 

namespace App\Http\Responses;

use App\Models\Wallet;
use Illuminate\Contracts\Support\Responsable;

class CustomerPayfromResponse implements Responsable
{
    protected $auth;
    protected $users;
    protected $cart;
    protected $product;

    public function __consruct(Auth $auth,User $users,Cart $cart,Product $product)
    {
        $this->auth     = $auth;
        $this->users     = $users;
        $this->cart     = $cart;
        $this->product  = $product;
    }
    public function toResponse($request)
    {
        $user = $this->auth::user();
        $amount = $request->amount;
        $walletBalance  = $this->auth::user()->wallet_balance;
        $this->checkWalletBallance($walletBallance, $amount);

    }
    public function checkWalletBallance($walletBallance, $amount)
    {
        if ($walletBalance >= $amount) {
            $cartItems = $this->cart::where('user_id', $this->auth::user()->id)->get();
                        
            $order = $user->orders()->Create([
                            'total'         => $amount,
                            'status'        => 1
                        ]);

            foreach ($cartItems as $cartItem) {
                $order->products()->attach($cartItem->id, [
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

            $this->findWallet();

            $user = $this->users::find(Auth::id());
            $user->wallet_balance -= $amount;
            $user->save();
                        
            $removeItems = $this->cart::where('user_id', Auth::user()->id)->get();
            foreach ($removeItems as $removeItem) {
                try {
                    $product = Cart::where('user_id', $removeItem->user_id)->first()->each(function ($product, $key) {
                        $product->delete();
                    });
                    return back()->with('success', 'Payment successful!');
                } catch (\Exception $e) {
                    dd($e);
                }
            }
            $total = 0;
            return back()->with(['success' =>'Payment Successful','total' => $total ]);
        } elseif ($walletBalance < $amount) {
            return back()->with('error', 'You have insufficient funds in your wallet. Please top up your wallet and try again');
        }

    }

    public function findWallet()
    {
        Wallet::find(1);
        $wallet->amount += $amount;
        $wallet->save();
        return $wallet;

    }
}