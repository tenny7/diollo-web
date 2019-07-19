<?php

namespace App\Http\Controllers;

use DataTables;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Store;
use App\Mail\VerifyMail;
use App\Jobs\SendEmailJob;
use App\Models\VerifyUser;
use Illuminate\Http\Request;
use App\Models\AgentApplication;
use Illuminate\Support\Facades\DB;
use App\Charts\AgentYearStoreCount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Gerardojbaez\GeoData\Models\City;
use Gerardojbaez\GeoData\Models\Region;
use Illuminate\Support\Facades\Session;
use Gerardojbaez\GeoData\Models\Country;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function becomeAnAgent1()
    {
        session()->forget('agent');
        return view('agents.signup-step-1');
    }

    public function becomeAnAgent1Process(Request $request)
    {
        $validatedData = $this->validate($request, [
            'first_name' => ['required', 'alpha_dash'],
            'last_name' => ['required', 'alpha_dash'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        // Save the registration data in an array
        // $registration_data = $request->all();
        $agent = new User();
        $agent->fill($validatedData);
        $agent->role = User::ROLE_CUSTOMER;
        $agent->status = User::STATUS_INACTIVE;
        $agent->password = Hash::make($request->input('password'));
        $request->session()->put('agent', $agent);
        
        return redirect()->route('agent.signup.two');
    }

    public function showRegions($country_code)
    {
        $regions = Region::where('country_code', '=', $country_code)->get();
        
        return response()->json($regions);
    }

    public function showCity($region_id)
    {
        $cities = City::where('region_id', '=', $region_id)->get();
        return response()->json($cities);
    }
    

    public function becomeAnAgent2()
    {
        // var_dump(session('agent'));
        if(!session('agent')){
            return redirect()->route('agent.signup.one')->withInput()->withErrors("Please complete the first step");
        }
        $countries = Country::all();
        $states = Region::where('country_code','NG')->get();
        $cities = City::where('country_code','NG')->get();
        $genders = collect([
            [
                'name' => 'Female',
                'id' => User::GENDER_FEMALE
            ],
            [
                'name' => 'Male',
                'id' => User::GENDER_MALE
            ]
        ]);
        return view('agents.signup-step-2', [
            'countries'=>$countries,
            'genders' => $genders
            ]);
    }

    public function becomeAnAgent2Process(Request $request)
    {
        
        if(!session()->has('agent')){
            return redirect()->route('agent.signup.one')->withInput()->withErrors("Please complete the first step before attemting this one");
        }
        $validatedData = $this->validate($request, [
            'gender' => ['required', 'in:'.User::GENDER_MALE.','.User::GENDER_FEMALE],
            'birthday' => ['required', 'date'],
            'country_code' => ['required', 'exists:countries,code'],
            'region_id' => ['required', 'exists:regions,id'],
            'city_id' => ['required'],
            'street' => ['required', 'string']
        ]);

        $agent = session()->get('agent');
        $agent->fill($validatedData);
        $request->session()->put('agent', $agent);

        return redirect()->route('agent.signup.three');
    }

    public function becomeAnAgent3()
    {
        // var_dump(session('agent'));
        if(!session()->has('agent')){
            return redirect()->route('agent.signup.one')->withInput()->withErrors("Please complete the previous steps before attemting this one");
        }
        
        return view('agents.signup-step-3');
    }

    public function becomeAnAgent3Process(Request $request)
    {
        if(!session()->has('agent')){
            return redirect()->route('agent.signup.one')->withInput()->withErrors("Please complete the previous steps before attemting this one");
        }

        $validatedData = $this->validate($request, [
           'computer_use' => ['required', 'string'],
           'interest' => ['required', 'string'],
           'method' => ['required', 'string'],
           'relationship' => ['required', 'string'],
           'objection' => ['required', 'string'],
           'photo' => ['required', 'string'], 
           'recognition' => ['required', 'string'],
           'valid_id' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048']

        ]);

        DB::beginTransaction();
            try {
                $agent = session()->get('agent');
               
                // $agent->first_name = $agent->
                  $agent->valid_id = $request->valid_id->store('valid_ids');
                //   dd(session()->get('agent'));
                // dd(session()->get('first_name'));
                // dd(Session::get('first_name'));
                $city = City::where('name',$agent->city_id)->first();
                    // dd($city->id);
                    $data = [
                        'first_name' => $agent->first_name,
                        'last_name' => $agent->last_name,
                        'email' => $agent->email,
                        'phone' => $agent->phone,
                        'password' => $agent->password,
                        'gender' => $agent->gender,
                        'birthday' => $agent->birthday,
                        'country_code' => $agent->country_code,
                        'region_id' => $agent->region_id,
                        'city_id' => $city->id,
                        'street' => $agent->street
                    ];
                    // dd($agent->city_id);
                    
                    $user = User::firstOrCreate($data);
                    // $agent = session()->get('agent');
                    // dd($user->id);      
                  $application = new AgentApplication();
                // $application = AgentApplication::firstOrCreate($validatedData);
                      $application->fill($validatedData);
                      $application->user_id = $user->id;
                    $application->save();
                    // $agent->save();
                
                // dd('success');
            } catch (\Throwable $th) {
                //throw $th;
                dd($th->getMessage());
                // var_dump(json_encode($agent));
                // return back()->withInput()->withErrors($th->getMessage());
            }
        DB::commit();

        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => sha1(time())
          ]);
        //   Mail::to($user->email)->send(new VerifyMail($user));
        // $agent->sendEmailVerificationNotification();
        SendEmailJob::dispatch($user);

        // dd('hds');
        return $this->registered($request, $user)
                        ?: view('verification');
        // return redirect('/verification');

        $user = Auth::user();
        
        $stores = DB::table('stores')
                ->select(DB::raw('count(*) as count, MONTH(created_at) as month'))
                ->where('agent_id', '=', $user->id)
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
                ->get()->toArray();

        $months = range(1, 12);
        
        $month_values = [];

        foreach ($months as $month) {
            $month_values[$month] = 0;
            
        }

        foreach ($stores as $key => $value) {
            $month_values[$value->month] = $value->count;
        }

        $chart = new AgentYearStoreCount;
        $chart->labels(["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]);
        // $data = Store::where('agent_id', '=', $user->id)
        //         ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
        //         ->get()
        //         ->map(function ($item) {
        //             // Return the number of persons with that age
        //             return count($item);
        //         });
        //     return $data;
        $chart->dataset('Stores', 'line', collect(array_values($month_values)))->options([
            'color' => '#ff0000',
            'backgroundColor' => '#d2ddec',
            'fill' => '#087683',
            'borderColor' => 'red',
            'borderWidth' => 3
        ]);

        return view('agents.dashboard',compact('chart'));
    }

    protected function guard()
    {
        return Auth::guard();
    }
    protected function registered(Request $request, $user)
    {
        
        $this->guard()->logout();
        return redirect('/signin')->with('status', 'We sent you an activation code. Check your email and click on the link to verify.');
    }
    protected function authenticated(Request $request, $user)
    {
        if (!$user->verified) {
            auth()->logout();
            return back()->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
          }
          return redirect()->intended($this->redirectPath());
        return redirect()->intended();
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    public function dashboard()
    {
        // $user = Auth::user();
        
        $stores = DB::table('stores')
                ->select(DB::raw('count(*) as count, MONTH(created_at) as month'))
                // ->where('agent_id', '=', $user->id)
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
                ->get()->toArray();

        $months = range(1, 12);
        
        $month_values = [];

        foreach ($months as $month) {
            $month_values[$month] = 0;
            
        }

        foreach ($stores as $key => $value) {
            $month_values[$value->month] = $value->count;
        }

        $chart = new AgentYearStoreCount;
        $chart->labels(["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]);
        // $data = Store::where('agent_id', '=', $user->id)
        //         ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
        //         ->get()
        //         ->map(function ($item) {
        //             // Return the number of persons with that age
        //             return count($item);
        //         });
        //     return $data;
        $chart->dataset('Stores', 'line', collect(array_values($month_values)))->options([
            'color' => '#ff0000',
            'backgroundColor' => '#d2ddec',
            'fill' => '#087683',
            'borderColor' => 'red',
            'borderWidth' => 3
        ]);

        // $user = Auth::user();

        // foreach ($user->unreadNotifications as $notification) {
        //     dd($notification['data']);
        // }

        return view('agents.dashboard', compact('chart'));
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function application()
    {
        $user = Auth::user();
        $application = $user->agentApplications;
        return view('agents.application', ['application' => $application]);

        // if ($request->ajax()) {
            
        //     return Datatables::of($data)
        //             ->addIndexColumn()
        //             ->addColumn('username', function ($business) {
        //                 return $business->user->firstname.' '.$business->user->lastname;
        //             })
        //             ->addColumn('stage', function ($business) {
        //                 return $business->businessStage->name;
        //             })
        //             ->addColumn('country', function ($business) {
        //                 return $business->country->name;
        //             })
        //             ->editColumn('created_at', function ($business) {
        //                 return date('M d, Y', strtotime($business->created_at));
        //             })
        //             ->addColumn('action', function($business){
    
        //                 $btn = '<div class="btn-group" role="group">
        //                 <button id="btnGroupDrop1" type="button" class="item" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        //                     <i class="zmdi zmdi-more"></i>
        //                 </button>
        //                 <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"><a class="dropdown-item" href="'. route('businesses.view', ['business' => $business->id]) .'">View Business</a><hr>';

        //                 if($business->lawfirm_id != null){
        //                     $btn .= '<a class="dropdown-item" href="'. route('lawfirms.show', ['lawfirm' => $business->lawfirm_id]) .'">View Lawfirm</a>';
        //                 }

        //                 $btn .= '</div></div>';
    
        //                 return $btn;
        //             })
        //             ->rawColumns(['action'])
        //             ->make(true);
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeApplication(Request $request)
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
