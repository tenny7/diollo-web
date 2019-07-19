<?php

namespace App\Http\Controllers\Affiliate;

use App\Models\ReferralLink;
use Illuminate\Http\Request;
use App\Charts\AffiliateChart;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ReferralRelationship;
use Illuminate\Support\Facades\Auth;

class AffiliateController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        
        $referrals = DB::table('referral_links')
                ->select(DB::raw('count(*) as count, MONTH(created_at) as month'))
                ->where('user_id', '=', $user->id)
                // ->whereRaw('referral_link_id',select(DB::raw('count(*) as count, MONTH(created_at) as month'))
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
                ->get()->toArray();
                

        $months = range(1, 12);
        
        
        $month_values = [];

        foreach ($months as $month) {
            
            $month_values[$month] = 0;
            
        }

        foreach ($referrals as $key => $value) {
            
            $month_values[$value->month] = $value->count;
        }

        $chart = new AffiliateChart;
        $chart->labels(["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]);
        
        $chart->dataset('Orders', 'bar', collect(array_values($month_values)))->options([
            'color' => '#ff0000',
            'backgroundColor' => '#ff0066',
            'fill' => '#ff0066',
            'borderColor' => '',
            'borderWidth' => 1,
        ]);

        // $categories = DB::table('categories')
        //         ->select(DB::raw('count(*) as count, name as name'))
        //         ->groupBy(DB::raw("name"))
        //         ->get()->toArray();$cat_values = [];
        // $cat_names = [];

        // foreach ($categories as $key => $value) {
        //     $cat_values[$value->name] = $value->count;
        //     array_push($cat_names,$value->name);
        // }

        // $donut = new CategoryCount;
        // $donut->labels($cat_names);
        
        // $donut->dataset('Categories', 'bar', collect(array_values($cat_values)))->options([
        //     'color' => '#ff0000',
        //     'backgroundColor' => ['#ff0066','#727cf5','#fd7e14','#02a8b5','#3b506c','#ff0066','#727cf5','#ff0066','#727cf5','#fd7e14','#02a8b5'],
        //     'fill' => '#ff0066',
        //     'borderColor' => '',
        //     'borderWidth' => 1,
        // ]);

        

        

        // ,'donut'
        // return view('admin.dashboard',compact('chart'));
        return view('affiliates.dashboard',compact('chart'));
    }

    public function vendorRefferred()
    {
        $user = Auth::user();

        $referralLink = ReferralLink::where('user_id',$user->id)->first();
        $referralRelationship = ReferralRelationship::where('referral_link_id',$referralLink->id)->get();
        // dd($referralRelationship);
        $names = [];
        foreach($referralRelationship as $referal)
        {
            array_push($names,$referal->user->fullname);
        }
        // $data['name'] = 

        // dd($names);
        // dd($referralRelationship->user->fullname);
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
        return view('affiliates.history', compact('user', 'names'));
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
