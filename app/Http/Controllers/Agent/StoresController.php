<?php

namespace App\Http\Controllers\Agent;

use App\Models\User;
use App\Models\Store;
use Illuminate\Http\Request;

use Spatie\Geocoder\Geocoder;
use App\Http\Controllers\Controller;
// use Spatie\Geocoder\Facades\Geocoder;
use Gerardojbaez\GeoData\Models\City;
use Gerardojbaez\GeoData\Models\Region;
use Gerardojbaez\GeoData\Models\Country;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::all();
        return view('agents.stores.all',compact('stores'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function complete()
    {
        return view('agents.stores.complete');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function incomplete()
    {
        return view('agents.stores.incomplete');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        $country = Country::first();
        $agents = User::where('role',User::ROLE_AGENT)->get();
        $countries = Country::all();
        $regions = Region::where('country_code', $country->code)->get();
        $region = Region::where('country_code', $country->code)->first();
        $cities = City::where('region_id', $region->id)->get();
        $vendors = User::where('role', User::ROLE_VENDOR)->get();

        return view('agents.stores.new')->with([
            'country'=>$country, 
            'regions'=>$regions, 
            'cities'=>$cities,
            'countries' => $countries,
            'agents' => $agents,
            'vendors' => $vendors,
            ]);
    }

    public function addStore(Request $request)
    {
        $rules = [
            'bussiness_name'        => 'required|string',
            'bussiness_phone'       => 'required|string',
            'bussiness_email'       => 'required|string',
            'bussiness_description' => 'required|string',
            'opening_hours'         => 'required|string',
            'country_code'          => 'required|exists:countries,code',
            'region_id'             => 'required|exists:regions,id',
            'city_id'               => 'required',
            'street_address'        => 'required|string',
            'bussiness_logo'        => 'required|mimes:jpeg,jpg,png,bmp,gif,svg|max:2043',
            'availability'          => 'nullable',
            'store_background_color'=> 'required|string',
            'vendor_id'             => 'required|numeric',
            'agent_id'              => 'required|numeric',
            ];
            
            $this->validate($request, $rules);

            // dd('hello');
            // $ip_address = $request->ip();
            
            // $userIP = $request->geoip($ip_address);
            // dd($userIP);
            $logo = $request->bussiness_logo;
            // dd($logo);
            $folder = 'store/bussinessLogo';
            $logoName = $logo->getClientOriginalName();
            $logoPath = $logo->storeAs($folder,$logoName,'public');

            $city = City::where('name', $request->city_id)->first();

            $client = new \GuzzleHttp\Client();

            $geocoder = new Geocoder($client);

            $geocoder->setApiKey('AIzaSyC9EOguEuOmLUDK_QbG01n2FLMFxEQH4pc');

            $geocoder->setCountry('NG');
            $regionName = $geocoder->setRegion($city->name);
           
            $cityDetails = $geocoder->getCoordinatesForAddress($city->name);
            // dd($cityDetails);

            // $city = City::find($city->id);
            // dd($city);
            // dd($geocoder->getCoordinatesForAddress($city->name));
            $data = [
                'name'              => $request->bussiness_name,
                'phones'            => $request->bussiness_phone,
                'email'             => $request->bussiness_email,
                'description'       => $request->bussiness_description,
                'opening_hours'     => $request->opening_hours,
                'country_code'      => $request->country_code,
                'region_id'         => $request->region_id,
                'city_id'           => $city->id,
                'address'           => $request->street_address,
                'logo'              => $logoPath,
                'availability'      => $request->availability == 'on'? 1 : 0,
                'color'             => $request->store_background_color,
                'vendor_id'         => $request->vendor_id,
                'agent_id'          => $request->agent_id,
                'latitude'          => $cityDetails['lat'],
                'longitude'          =>$cityDetails['lng'],
                ];

            $agentStore = Store::firstOrcreate($data);

            return redirect()->back()->with(
                [
                    'success' => 'Store Added Successfully'
                ]
            );
                
    }
    public function updateStore(Request $request, $store_id)
    {
        $rules = [
            'bussiness_name'        => 'required|string',
            'bussiness_phone'       => 'required|string',
            'bussiness_email'       => 'required|string',
            'bussiness_description' => 'required|string',
            'opening_hours'         => 'required|string',
            'country_code'          => 'required|exists:countries,code',
            'region_id'             => 'required|exists:regions,id',
            'city_id'               => 'required',
            'street_address'        => 'required|string',
            'bussiness_logo'        => 'required|mimes:jpeg,png,bmp,gif,svg|max:2043',
            'availability'          => 'nullable',
            'store_background_color'=> 'required|string',
            'vendor_id'             => 'required|numeric',
            'agent_id'              => 'required|numeric',
            ];
            
            $this->validate($request, $rules);
            $logo = $request->bussiness_logo;
            $folder = 'store/bussinessLogo';
            $logoName = $logo->getClientOriginalName();
            $logoPath = $logo->storeAs($folder,$logoName,'public');

            $city = City::where('name', $request->city_id)->first();
            $data = [
                'name'              => $request->bussiness_name,
                'phones'            => $request->bussiness_phone,
                'email'             => $request->bussiness_email,
                'description'       => $request->bussiness_description,
                'opening_hours'     => $request->opening_hours,
                'country_code'      => $request->country_code,
                'region_id'         => $request->region_id,
                'city_id'           => $city->id,
                'address'           => $request->street_address,
                'logo'              => $logoPath,
                'availability'      => $request->availability == 'on'? 1 : 0,
                'color'             => $request->store_background_color,
                'vendor_id'         => $request->vendor_id,
                'agent_id'          => $request->agent_id,
                ];

            $agentStore = Store::findOrFail($store_id);
            $agentStore->update($data);

            return redirect()->back()->with(
                [
                    'success' => 'Store Updated Successfully'
                ]
            );

    }

    public function showUpdateForm($store_id)
    {   
        $countries = Country::all();
        $agents = User::where('role', User::ROLE_AGENT)->get();
        $vendors = User::where('role', User::ROLE_VENDOR)->get();
        $store = Store::findOrFail($store_id);
        return view('agents.stores.update', compact('store','countries','agents','vendors'));
    }

    public function viewStore()
    {
        return view('agent.store.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
