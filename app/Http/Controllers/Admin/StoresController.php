<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Store;
use App\Models\Product;

use App\Models\Promotion;
use Illuminate\Http\Request;
// use Spatie\Geocoder\Facades\Geocoder;
use Spatie\Geocoder\Geocoder;
use App\Http\Controllers\Controller;
use Gerardojbaez\GeoData\Models\City;
use Gerardojbaez\GeoData\Models\Region;
use Gerardojbaez\GeoData\Models\Country;
use Illuminate\Support\Facades\Response;
// use Victorybiz\GeoIPLocation\GeoIPLocation;

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
        return view('admin.stores.new')->with([
            'countries' => $countries,
            'agents'    => $agents,
            'vendors'    => $vendors,
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
            'vendor_id'             => 'nullable|numeric',
            'agent_id'              => 'nullable|numeric',
            ];
            
            $this->validate($request, $rules);

            $logo = $request->bussiness_logo;
         
            $folder = 'store/bussinessLogo';
            $logoName = $logo->getClientOriginalName();
            $logoPath = $logo->storeAs($folder,$logoName,'public');

           
            $city = City::where('region_id', $request->region_id)->first();

            
            $client = new \GuzzleHttp\Client();

            $geocoder = new Geocoder($client);
            // dd($client);

            $geocoder->setApiKey('AIzaSyC9EOguEuOmLUDK_QbG01n2FLMFxEQH4pc');

            $geocoder->setCountry('NG');

            // $city = Region::find($city->id);
            // dd($city);

            $cityDetails = $geocoder->getCoordinatesForAddress($city->name);
            // dd($cityDetails);
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

            // dd('uee');
            return redirect()->back()->with(
                [
                    'success' => 'Store Added Successfully'
                ]
            );
                
    }

  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_slug)
    {
        $product = Product::where('slug',$product_slug)->first();
        $products = \DB::table('order_product')->where('product_id',$product->id)->delete();;
        
        if($product->delete())
        {
            return redirect()->back()->with([
                'success' => $product->name.' '.'has been deleted '
                ]);
        }
        else
        {
            return redirect()->back()->with([
                'error' => 'something went wrong'
                ]);
        }

    }
    
    public function bulkDelete(Request $request)
    {
        $ids = $request->id;
        // return response()->json($ids);

        $stores = Store::whereIn('id',$ids);
        
        $deletePromotions = Promotion::whereIn('store_id',$ids)->delete();
        $deleteProducts = Product::whereIn('store',$ids)->delete();
        
        if($stores->delete())
        {
            return response()->json(['success' => 'Store Deleted']);  
        }
    }
}
