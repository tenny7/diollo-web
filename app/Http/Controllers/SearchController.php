<?php

namespace App\Http\Controllers;

// use geolocation;
// use App\Services;
use App\Models\Store;
use App\Models\Product;
use App\Models\Category;
use App\Models\Wishlist;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Gerardojbaez\GeoData\Models\Region;
use Illuminate\Support\Facades\Response;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        
        $products= DB::table('stores')
                    ->join('products', 'stores.id', '=', 'products.store')
                    // ->whereIn('products.store', $store_data)
                    ->Where('products.name','LIKE', '%'.$request->search.'%')
                    ->groupBy('products.id')
                    ->get();

        if($products)
        {
            // dd(count($products)); 
            $categories = Category::all();
            return view('product-search',compact('products','categories'));
        }
        
    }

    public function searchQuery(Request $request)
    {

        $store_data = [];
        $stores = Store::where('region_id',$request->region_id)->get();
        foreach($stores as $store)
        {
            array_push($store_data, $store->id);
        }
        
        $products= DB::table('stores')
                    ->join('products', 'stores.id', '=', 'products.store')
                    ->whereIn('products.store', $store_data)
                    ->Where('products.name','LIKE', '%'.$request->search.'%')
                    ->groupBy('products.id')
                    ->get();

        if($products)
        {
            $categories = Category::all();
            return view('product-search',compact('products','categories'));
        }
        
    }

    public function topSelling()
    {
        $topSellingProducts = DB::table('order_product')
            ->select('product_id', DB::raw('count(*) as total'))
            ->groupBy('product_id')
            ->orderBy('total', 'desc')
            ->get();
        $promotion = Promotion::where('promo_type', 'topselling')->where('status',Promotion::STATUS_ACTIVE)->orderByRaw('RAND()')->take(1)->get();
    
        $categories = Category::all();
        return view('topselling', compact('topSellingProducts','categories','promotion'));
    }

    public function newStock()
    {
        $newStocks = Product::where('created_at', '>', Carbon::now()->subDays(7))->get();
        $categories = Category::all();
        $promotion = Promotion::inRandomOrder('created_at', 'DSC')->where('promo_type', 'newstock')->where('status','<>',Promotion::STATUS_COMPLETED)->take(1)->first();
        
        return view('newstock', compact('newStocks','categories','promotion'));
    }

    public function searchByCategory($id)
    {
        $products = Product::whereHas('categories', function ($query) use($id) {
            $query->where('category_id', $id);
        })->get(); 
        $categories = Category::all();
        return view('product-search', compact('products','categories'));
    }

    public function showSavedItem()
    { 
        $products = Wishlist::where('user_id', Auth::id())->get();
        return view('user.saveItem', compact('products'));
    }
    
    public function saveItem(Request $request)
    {
        $data = [
            'user_id'       => Auth::id(),
            'product_id'    => $request->id,
        ];
        $wishlist = Wishlist::firstOrCreate($data);
        return Response::json(['success' => 'Item Saved']);
    }




    function getDistance($addressFrom, $addressTo, $unit = ''){
        // Google API key
        $apiKey = 'AIzaSyC9EOguEuOmLUDK_QbG01n2FLMFxEQH4pc';
        
        // Change address format
        $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
        $formattedAddrTo     = str_replace(' ', '+', $addressTo);
        
        // Geocoding API request with start address
        $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key='.$apiKey);
        $outputFrom = json_decode($geocodeFrom);
        if(!empty($outputFrom->error_message)){
            return $outputFrom->error_message;
        }
        
        // Geocoding API request with end address
        $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);
        $outputTo = json_decode($geocodeTo);
        if(!empty($outputTo->error_message)){
            return $outputTo->error_message;
        }
        
        // Get latitude and longitude from the geodata
        $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
        $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
        $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
        $longitudeTo    = $outputTo->results[0]->geometry->location->lng;
        
        // Calculate distance between latitude and longitude
        $theta    = $longitudeFrom - $longitudeTo;
        $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
        $dist    = acos($dist);
        $dist    = rad2deg($dist);
        $miles    = $dist * 60 * 1.1515;
        
        // Convert unit and return distance
        $unit = strtoupper($unit);
        if($unit == "K"){
            return round($miles * 1.609344, 2).' km';
        }elseif($unit == "M"){
            return round($miles * 1609.344, 2).' meters';
        }else{
            return round($miles, 2).' miles';
        }
    }

    public function searchByDistance($id)
    {
        $store = Store::find($id);
        $region = Region::find($store->region_id);
        // get the state and country from the user ip e.h $state.','.$country
        $addressFrom = 'Calabar,Nigeria';
        $addressTo   = $region->name.',Nigeria';
        // Get distance in km
        $distance = $this->getDistance($addressFrom, $addressTo, "K");
        dd($distance);
        // returns the distance of a particular job from the users location
    }

    public function reviews($id,$rating)
    {
        $product= Product::find($id);
        return view('addcomment', compact('product','rating'));
    }







    // $addressFrom = 'Insert start address';
    // $addressTo   = 'Insert end address';


}
