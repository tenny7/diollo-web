<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Store;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Spatie\Geocoder\Geocoder;
// use Spatie\Geocoder\Facades\Geocoder;
use Gerardojbaez\GeoData\Models\City;
use Gerardojbaez\GeoData\Models\Region;
use Illuminate\Support\Facades\Response;
use Victorybiz\GeoIPLocation\GeoIPLocation;

class SiteController extends Controller
{
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
        // $ip_address = $request->ip();
        $stores = Store::all();
        $geoip = new GeoIPLocation();
        // dd($geoip);
        $fromLat = $geoip->getLatitude();
        $fromLon = $geoip->getLongitude();
        $col;
        $allDis = [];
        //dd($stores);
        foreach($stores as $key => $store)
        {
            
            
        $distance = $this->getDistance($store->id,$fromLat,$fromLon,'K');
        $allDis[] = $distance;
            // dd($distance);
            // $col = collect($distance);
            // dd($col);

           // array_push($distance_data,$distance);

            
        }
        // dd($allDis);
        // dd($distance);
        $region = Region::where('name',$geoip->getCity())->first();
            // dd($city);
        $stores = Store::where('region_id',$region->id)->get();
        
        // dd($stores);


        // dd(count($distance_data));
        // dd($distance_data[0]);
        $regions = Region::where('country_code', 'NG')->orderBy('name', 'ASC')->get();
        return view('welcome', compact('regions','stores','allDis'));
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
