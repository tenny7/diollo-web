<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Store;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
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
        return view('admin.stores.all', compact('stores'));
    }

    public function addVendorForm($store_id)
    {
        $store  = Store::find($store_id);
        $users   = User::all();
        return view('admin.vendors.new', compact('store','users'));
    }

    public function addAgentForm($store_id)
    {
        $store  = Store::find($store_id);
        $users   = User::where('role',User::ROLE_AGENT)->get();
        return view('admin.agents.new', compact('store','users'));
    }

    public function addAgent(Request $request)
    {
        $validatedData = $this->validate($request,[
            'agent_id' => 'required|numeric',
        ]);
        $agentToStore = Store::where('name',$request->store)->first();
        $agentToStore->fill($validatedData);
        $agentToStore->save();

        
        return redirect()->back()->with(['success' => 'Agent added to '. $request->store ]);
    }

    public function addVendor(Request $request)
    {
        $validatedData = $this->validate($request,[
            'vendor_id' => 'required|numeric',
        ]);
        $user = User::find($validatedData['vendor_id']);
        $user->role = User::ROLE_VENDOR;
        $agentToStore = Store::where('name',$request->store)->first();
        $agentToStore->fill($validatedData);
        $agentToStore->save();
        $user->save();

        
        return redirect()->back()->with(['success' => 'Vendor added to '. $request->store ]);
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
        $vendors = User::where('role',User::ROLE_VENDOR)->get();
        $store = Store::findOrFail($store_id);
        return view('admin.stores.update', compact('store','countries','agents','vendors'));
    }

    public function viewStore()
    {
        return view('admin.store.view');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function complete()
    {
        return view('admin.stores.complete');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function incomplete()
    {
        return view('admin.stores.incomplete');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        $countries = Country::all();
        $agents = User::where('role',User::ROLE_AGENT)->get();
        $vendors = User::where('role',User::ROLE_VENDOR)->get();
        // $regions = Region::where('country_code', $country->code)->get();
        // $region = Region::where('country_code', $country->code)->first();
        // $cities = City::where('region_id', $region->id)->get();
        // , 'regions'=>$regions, 'cities'=>$cities
        return view('admin.stores.new')->with([
            'countries' => $countries,
            'agents'    => $agents,
            'vendors'    => $vendors,
            ]);
    }

    // public function addStore(Request $request)
    // {
    //     $rules = [
    //         'bussiness_name'        => 'required|string',
    //         'bussiness_phone'       => 'required|string',
    //         'bussiness_address'     => 'required|string',
    //         'bussiness_description' => 'required|string',
    //         'opening_hours'         => 'required|string',
    //         'country_code'          => 'required|exists:countries,code',
    //         'region_id'             => 'required|exists:regions,id',
    //         'city_id'               => 'required',
    //         'street_address'        => 'required|string',
    //         'bussiness_logo'        => 'required|string|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'availability'          => 'required|numeric',
    //         'store_background_color'=> 'required|string',
    //         'vendor_id'             => 'required|string',
    //         'agent_id'              => 'required|numeric',
    //         ];

    //         $this->validate($request, $rules);

    //         $logo = $request->file('bussiness_logo');
    //         $folder = 'store/bussinessLogo/';
    //         $logoName = time().$logo->getClientOriginalName();
    //         $logoPath = $logo->storeAs($folder,$logoName,'public');

    //     $data = [
    //         'bussiness_name'        => $request->bussiness_name,
    //         'bussiness_phone'       => $request->bussiness_phone,
    //         'bussiness_address'     => $request->bussiness_address,
    //         'bussiness_description' => $request->bussiness_description,
    //         'opening_hours'         => $request->opening_hours,
    //         'country_code'          => $request->country_code,
    //         'region_id'             => $request->region_id,
    //         'city_id'               => $request->city_id,
    //         'street_address'        => $request->street_address,
    //         'bussiness_logo'        => $logoPath,
    //         'availability'          => $request->availability,
    //         'store_background_color'=> $request->store_background_color,
    //         'vendor_name'           => $request->vendor_name,
    //         'agent_name'            => $request->agent_name,
    //         ];

    //         $agentStore = Store::firstOrcreate($data);

    //         return redirect()->back()->with(
    //             [
    //                 'success' => 'Store Added Successfully'
    //             ]
    //         );
        
        

        
    // }

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
