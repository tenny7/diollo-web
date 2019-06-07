<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Bank;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Gerardojbaez\GeoData\Models\City;
use Gerardojbaez\GeoData\Models\Country;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function general()
    {
        return view('vendors.settings.general');
    }

    public function profile()
    {
        $user = Auth::user();
        $countries = Country::all();
        return view('vendors.settings.profile', compact('countries','user'));
    }

    public function saveProfile(Request $request)
    {

        // dd($request->all());
        $rules =  [
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
            'street' => 'required|string',
            'gender' => 'required|string',
            'country_code' => 'required|exists:countries,code',
            'region_id' => 'required|exists:regions,id',
            'city_id' => 'required',
        ];

        // dd($request->city_id);

        $city = City::where('name',$request->city_id)->first();
        $data = [
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'street' => $request->street,
            'gender' => $request->gender,
            'country_code' => $request->country_code,
            'region_id' => $request->region_id,
            'city_id' => $city->id,
            
        ];
        
        $user = User::findOrFail(Auth::id());
        $user->update($data);
        
        return redirect()->back()->with(['success' => 'Profile Updated']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function password()
    {

        return view('vendors.settings.password');
    }

    public function updatePassword(Request $request)
    {
        $rules = [
            'old_password'  => 'required|string|min:8',
            'new_password'  => 'required|string|min:8',
            'c_password'    => 'required|string|min:8',
        ];

        $this->validate($request, $rules);

        $user = User::findOrFail(Auth::user()->id);
        if(Hash::check($request->old_password, $user->password))
        {
            if($request->new_password == $request->c_password)
            {
                $user->fill([
                    'password' => Hash::make($request->new_password)
                ])->save();
                
                return redirect()->back()->with(['success' => 'Password changed successfully']);
            }
        }
        elseif(!Hash::check($request->old_password, $user->password))
        {
            
            return redirect()->back()->with(['error' => 'old password incorrect']);
        } 
        
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bank()
    {
        $banks = Bank::all();
        $user = Auth::user();
        return view('vendors.settings.bank', compact('banks','user'));
    }

    public function updateBank(Request $request)
    {
        $validateData = $this->validate($request,[
            'bank' => 'required|string',
            'account_name' => 'required|string',
            'account_number' => 'required|string',
            
        ]);
        

        $agent = User::where('id',Auth::id())->first();
        $agent->fill($validateData);
        $bank = Bank::where('bank', $request->bank)->first();
        $agent->bank_code = $bank->code;
        if($agent->save())
        {
            return redirect()->back()->with(['success' => 'Bank details saved']);
        }
        else{
            return redirect()->back()->with(['error' => 'Failed to save bank details']);
        }
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function profile()
    // {
    //     return view('vendors.settings.profile');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function password()
    // {
    //     return view('vendors.settings.password');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function bank()
    // {
    //     return view('vendors.settings.bank');
    // }


    // public function updateStore(Request $request, $store_id)
    // {
    //     $rules = [
    //         'bussiness_name'        => 'required|string',
    //         'bussiness_phone'       => 'required|string',
    //         'bussiness_email'       => 'required|string',
    //         'bussiness_description' => 'required|string',
    //         'opening_hours'         => 'required|string',
    //         'country_code'          => 'required|exists:countries,code',
    //         'region_id'             => 'required|exists:regions,id',
    //         'city_id'               => 'required',
    //         'street_address'        => 'required|string',
    //         'bussiness_logo'        => 'required|mimes:jpeg,png,bmp,gif,svg|max:2043',
    //         'availability'          => 'nullable',
    //         'store_background_color'=> 'required|string',
    //         'vendor_id'             => 'required|numeric',
    //         'agent_id'              => 'required|numeric',
    //         ];
            
    //         $this->validate($request, $rules);
    //         $logo = $request->bussiness_logo;
    //         $folder = 'store/bussinessLogo';
    //         $logoName = $logo->getClientOriginalName();
    //         $logoPath = $logo->storeAs($folder,$logoName,'public');

    //         $city = City::where('name', $request->city_id)->first();
    //         $data = [
    //             'name'              => $request->bussiness_name,
    //             'phones'            => $request->bussiness_phone,
    //             'email'             => $request->bussiness_email,
    //             'description'       => $request->bussiness_description,
    //             'opening_hours'     => $request->opening_hours,
    //             'country_code'      => $request->country_code,
    //             'region_id'         => $request->region_id,
    //             'city_id'           => $city->id,
    //             'address'           => $request->street_address,
    //             'logo'              => $logoPath,
    //             'availability'      => $request->availability == 'on'? 1 : 0,
    //             'color'             => $request->store_background_color,
    //             'vendor_id'         => $request->vendor_id,
    //             'agent_id'          => $request->agent_id,
    //             ];

    //         $agentStore = Store::findOrFail($store_id);
    //         $agentStore->update($data);

    //         return redirect()->back()->with(
    //             [
    //                 'success' => 'Store Updated Successfully'
    //             ]
    //         );

    // }

    // public function showUpdateForm($store_id)
    // {   
    //     $countries = Country::all();
    //     $agents = User::where('role', User::ROLE_AGENT)->get();
    //     $store = Store::findOrFail($store_id);
    //     return view('admin.stores.update', compact('store','countries','agents'));
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
