<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bank;
use App\Models\Role;
use App\Models\User;
use App\Models\Store;
use App\Models\Wallet;
// use Spatie\Geocoder\Facades\Geocoder;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Testimony;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Spatie\Geocoder\Geocoder;
use App\Models\CommitmentWallet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Gerardojbaez\GeoData\Models\City;
use Gerardojbaez\GeoData\Models\Region;
use Illuminate\Support\Facades\Response;
use Victorybiz\GeoIPLocation\GeoIPLocation;

class SiteController extends Controller
{

    public function makeAdmin()
    {
        $user = User::find(Auth::id());
        $user->role = User::ROLE_ADMIN;
        $user->save();
        return back();
    }
    public function getBanks()
    {
        $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, config('app.list_banks'));
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
        $res = curl_exec($ch);
        $banksResponse = json_decode($res,false);
        $banks = $banksResponse->data;

        foreach($banks as $bank)
        {

            $details = [
                'bank'      => $bank->name,
                'code'      => $bank->code,
                'longcode'  => $bank->longcode,
                'type'      => $bank->type,
                'pay_with_bank' => $bank->pay_with_bank,
                'currency'  => $bank->currency,
                'gateway'   => $bank->gateway,
                'slug'      => $bank->slug,
            ];
            $saveBanks = Bank::firstOrCreate($details);
        }
    }


    function getDistance($storeId, $fromLat, $fromLon, $unit = ''){
      
        // Get latitude and longitude from the geodata
        $store = Store::find($storeId);
        $store_array = [];
        // foreach ($stores as $store) 
        // {
            $latitudeFrom    = $fromLat;
            $longitudeFrom   = $fromLon;
            $latitudeTo      = $store->latitude;
            $longitudeTo     = $store->longitude;
        
            // Calculate distance between latitude and longitude
            $theta    = $longitudeFrom - $longitudeTo;
            $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
            $dist    = acos($dist);
            $dist    = rad2deg($dist);
            $miles    = $dist * 60 * 1.1515;
        
            // Convert unit and return distance
            $unit = strtoupper($unit);
            if ($unit == "K") {
                return [
                    $store->name => round($miles * 1.609344, 2).' km'
                ];
                // return round($miles * 1.609344, 2).' km';
            } elseif ($unit == "M") {
                return round($miles * 1609.344, 2).' meters';
            } else {
                return round($miles, 2).' miles';
            }
            

        // }
    }


    

    public function welcome(Request $request)
    {
        // $stores = Store::all();
        $products = Product::latest()->get();
        $testimonials = Testimony::inRandomOrder('created_at','DSC')->take(5)->get();
        // dd($products);
        // $geoip = new GeoIPLocation();
        
        // $fromLat = $geoip->getLatitude();
        // $fromLon = $geoip->getLongitude();
        // $col;
        
        // $allDis = [];
        
        // foreach($stores as $key => $store)
        // {
        //     $region = Region::find($store->region_id);
        //     $distance = $this->getDistance($store->id,$fromLat,$fromLon,'K');
        //     $allDis[] = $distance;
        // }
        
       
        // $region = Region::where('name',$geoip->getCity())->first();
        // $regions = Region::where('country_code', 'NG')->orderBy('name', 'ASC')->get();

        // $featuredProducts = Product::where('status',Product::FEATURED_PRODUCT)->get();
        // $clearanceProducts = Product::where('status',Product::CLEARANCE_PRODUCT)->get();
        
        $topSellingProducts = DB::table('order_product')
            ->select('product_id', DB::raw('count(*) as total'))
            ->groupBy('product_id')
            ->orderBy('total', 'desc')
            ->get();
        $newStocks = Product::where('created_at', '>', Carbon::now()->subDays(7))->get();
        $homeSliders = Promotion::where('promo_type','slider')->where('status',Promotion::STATUS_ACTIVE)->orderByRaw('RAND()')->get();
        
        
        
        // return view('welcome', compact('regions','stores','allDis','featuredProducts','clearanceProducts','newStocks','topSellingProducts','homeSliders'));
        return view('welcome', compact('newStocks','topSellingProducts','homeSliders','products','testimonials'));
    }
    public function getStarted()
    {
        OrderStatus::insert([
            ['name' => 'Pending', 'is_default' => 1],
            ['name' => 'Paid', 'is_default' => 0],
            ['name' => 'Awaiting Pickup', 'is_default' => 0],
            ['name' => 'Completed', 'is_default' => 0],
            ['name' => 'Canceled', 'is_default' => 0],
        ]);
    
        Role::insert([
            ['name' => 'Customer', 'is_default' => 1],
            ['name' => 'Agent', 'is_default' => 0],
            ['name' => 'Vendor', 'is_default' => 0],
            ['name' => 'Affiliate', 'is_default' => 0],
            ['name' => 'Admin', 'is_default' => 0],
        ]);

        
        $user = User::firstOrCreate(
            [
                'first_name' => 'Nelly',
                'last_name' => 'Onovwiona',
                'phone' => '0908767878',
                'email' => 'diolloservices@gmail.com',
                'password' => Hash::make('nellywhite')
            ]
        );
        Wallet::firstOrCreate(
            [
                'owner_id' => $user->id,
                'name' => 'Passward Account',
                'amount' => 0.00
            ]
        );

        CommitmentWallet::firstOrCreate(
            [
                'name' => 'Commitment Account',
                'amount' => 0.00
            ]
        );
    
        return 'All Okay!';
    }

    public function storeDetails($store_id)
    {
        $store = Store::find($store_id);
        $region = Region::find($store->region_id); 
        return Response::json([
            'store' => $store,
            'region' => [
                'name' => $region->name,
                'id' =>  $region->id
            ],
        ]);
    }

    public function markAsRead()
    {
        return Response::json(auth()->user()->unreadNotifications->markAsRead());
    }
}
