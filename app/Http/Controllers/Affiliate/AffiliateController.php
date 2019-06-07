<?php

namespace App\Http\Controllers\Affiliate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AffiliateController extends Controller
{
    public function dashboard()
    {
        return view('affiliates.dashboard');
    }

    public function vendorRefferred()
    {
        $user = Auth::user();
        dd($user->refferalrelationships);
        // dd($user->refferalrelationships());
        // $referredUsers = $user->getReferralRelationship();
        // $data = [];
        // foreach($referredUsers as $referredUser)
        // {
        //     foreach($referredUser as $referred)
        //     {
        //         $users = collect($referred);
        //         array_push($data, $users);
        //         // dd();
                
        //     }
        // }
        return view('affiliates.history', compact('user'));
        // dd($referredUsers);
        
        
        // @forelse(auth()->user()->getReferrals() as $referral)
        //                 <h4>
        //                     {{ $referral->program->name }}
        //                 </h4>
        //                 <code>
        //                     {{ $referral->link }}
        //                 </code>
        //                 <p>
        //                     Number of referred vendors: {{ $referral->relationships()->count() }}
        //                 </p>
        //     @empty
        //         No referrals
        //     @endforelse
    }
}
