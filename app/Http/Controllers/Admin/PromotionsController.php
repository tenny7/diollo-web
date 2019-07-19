<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use App\Models\Store;
use App\Models\Promotion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gerardojbaez\GeoData\Models\City;
use Gerardojbaez\GeoData\Models\Region;
use Gerardojbaez\GeoData\Models\Country;

class PromotionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::all();
        return view('admin.promotions.all', compact('promotions'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function complete()
    {
        $promotions = Promotion::where('status', Promotion::STATUS_COMPLETED)->get();
        return view('admin.promotions.complete', compact('promotions'));
    }
    public function slider()
    {
        $promotions = Promotion::where('promo_type', 'slider')->get();
        return view('admin.promotions.slider', compact('promotions'));
    }
    public function storeBanner()
    {
        $promotions = Promotion::where('promo_type', 'store')->get();
        return view('admin.promotions.store', compact('promotions'));
    }
    public function newstock()
    {
        $promotions = Promotion::where('promo_type', 'newstock')->get();
        return view('admin.promotions.newStock', compact('promotions'));
    }
    public function topselling()
    {
        $promotions = Promotion::where('promo_type', 'topselling')->get();
        return view('admin.promotions.topselling', compact('promotions'));
    }

    public function completed($promotion_id)
    {
        $promotion = Promotion::find($promotion_id);
        // dd($promotion);
        $promotion->status = Promotion::STATUS_COMPLETED;
        if($promotion->save())
        {
            return redirect()->back()->with(['success' => 'Promotion Completed']);
        }
        
    }

    public function new()
    {
        $regions = Region::all();
        $stores = Store::all();
        return view('admin.promotions.new', compact('regions','stores'));
    }

    public function addPromotion(Request $request)
    {
        // dd($request->all());
        $validatedData = $this->validate($request,[
            'store_id'  => 'required',
            // 'phone'     => 'required',
            // 'email'     => 'required',
            'end_date'  => 'required',
            'promo_type'  => 'required',
            // 'impressions' => 'required',
            'started'   => 'required',
            // 'views'     => 'required',
            'status'    => 'required',
            'region_id' => 'required',
        ]);

        // dd($validatedData);
        $images = [];
        
        foreach($request->file('promo_image') as $imageName)
        {
            // $imageName = $request->promo_image;
            $folder = 'store/Promo';
            $BannerName = $imageName->getClientOriginalName();
            $BannerPath = $imageName->storeAs($folder,$BannerName,'public');


            $promotion = Promotion::firstOrCreate($validatedData);

            $photo = Image::firstOrCreate([
                'promotion_id'   =>  $promotion->id,
                'path'         =>  $BannerPath
            ]);

            if($photo)
            {
                $images[] = $photo->id;
            }
            $promotion->photos()->sync($images);

        }
        if($promotion->save())
        {
            return back()->with(['success' => 'Promotion added']);
        }
        
    }

    public function showUpdateForm($promotion_id)
    {
        $promotion = Promotion::find($promotion_id);
        return view('admin.promotions.update', compact('promotion'));
    }

    public function update(Request $request, $promotion_id)
    {
        // dd($request->all());
        $validatedData = $this->validate($request,[
            'store_id'  => 'required',
            'phone'     => 'required',
            'email'     => 'required',
            'duration'  => 'required',
            'impressions' => 'required',
            'started'   => 'required',
            'views'     => 'required',
            'status'    => 'required',
            'region_id' => 'required',
        ]);

        // dd($validatedData);

        $promotion = Promotion::find($promotion_id);
        $promotion->fill($validatedData);
        // dd($validatedData['duration']);
        preg_match('/([0-9])/',$validatedData['duration'],$match);
        $promotion->duration = $match[0];
        // $promotion->save();
        // dd($validatedData);

        // $duration = str_replace() $validatedData['duration'];
        if($promotion->save())
        {
            return back()->with(['success' => 'Promotion updated']);
        }
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function active()
    {
        $promotions = Promotion::where('status', Promotion::STATUS_ACTIVE)->get();
        return view('admin.promotions.active' , compact('promotions')   );
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
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bulkPromotionDelete(Request $request)
    {
        $ids = $request->id;
        // return Response::json(['success' => 'success']);
        $promotions = User::whereIn('id',$ids)->delete();
        if($promotions)
        {
            return response()->json(['success' => 'Promotion(s) Deleted']);  
        }
    }
}
