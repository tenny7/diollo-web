<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\VerifyMail;
use App\Jobs\SendEmailJob;
// use App\Jobs\SendVerificationEmail;
use App\Models\VerifyUser;
use Illuminate\Http\Request;
use App\Events\VendorReferred;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Cookie;
use App\Notifications\CustomerNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CustomLoginController extends Controller
{
    use AuthenticatesUsers;

    

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('general.signin');
    }

    public function vendorForm()
    {
        return view('general.vendor');
    }

    public function affiliateForm()
    {
        return view('general.affiliate');
    }

    

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSignUpForm()
    {
        return view('general.signup');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended(Auth::user()->redirectTo());
        }
        // dd(redirect()->intended($this->redirectPath()));
        return redirect()->intended();
    }


    public function signupAffiliate(Request $request)
    {
        // $referred_by = Cookie::get('referral');
    $rules = [
        'firstname'    => 'required|string|max:255',
        'lastname'     => 'required|string|max:255',
        'email'        => 'required|email|max:255|unique:users',
        'phone'        => 'required|string|max:15',
        // 'location'  => 'required|string',
        'password'     => 'required|string|min:6',
        
    ];
    $this->validate($request, $rules);
    $data = [
        'first_name'    => $request->firstname,
        'last_name'     => $request->lastname,
        'email'         => $request->email,
        'phone'         => $request->phone,
        'role'          => User::ROLE_AFFILIATE,
        'password'      => Hash::make($request->password),
    ];
    

        $user = User::firstOrCreate($data);
        
        $adminUser = User::where('role', User::ROLE_ADMIN)->get();
        Notification::send($adminUser, new CustomerNotification($user));
        // $adminUser->notify(new CustomerNotification($user));
        // event(new VendorReferred(request()->cookie('ref'), $user));

        // event(new Registered($user));
        // dispatch(new SendVerificationEmail($user));
        // Mail::to($request->email)->send(new VerifyMail($user));
        // dd($user);
        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => sha1(time())
          ]);

        SendEmailJob::dispatch($user);

        // dd('hds');
        return $this->registered($request, $user)
                        ?: view('verification');
        
    }
    public function signupVendor(Request $request)
    {
        // $referred_by = Cookie::get('referral');
    $rules = [
        'firstname'    => 'required|string|max:255',
        'lastname'     => 'required|string|max:255',
        'email'        => 'required|email|max:255|unique:users',
        'phone'        => 'required|string|max:15',
        // 'location'  => 'required|string',
        'password'     => 'required|string|min:6',
        
    ];
    // 'referred_by' => $referred_by,
    $this->validate($request, $rules);
    $data = [
        'first_name'    => $request->firstname,
        'last_name'     => $request->lastname,
        'email'         => $request->email,
        'phone'         => $request->phone,
        // 'role'          => User::ROLE_VENDOR,
        'password'      => Hash::make($request->password),
    ];

        $user = User::firstOrCreate($data);
        $this->guard()->login($user);

        $adminUser = User::where('role', User::ROLE_ADMIN)->get();
        Notification::send($adminUser, new CustomerNotification($user));
        // $adminUser->notify(new CustomerNotification($user));
        // event(new VendorReferred(request()->cookie('ref'), $user));
        SendEmailJob::dispatch($user);

        return $this->registered($request, $user)
                        ?: view('welcome');
        
    }

    

    public function signup(Request $request)
    {
    // $referred_by = Cookie::get('referral');
    $rules = [
        'firstname'    => 'required|string|max:255',
        'lastname'     => 'required|string|max:255',
        'email'        => 'required|email|max:255|unique:users',
        'phone'        => 'required|string|max:15',
        // 'location'  => 'required|string',
        'password'     => 'required|string|min:6',
        
    ];
    // 'referred_by' => $referred_by,
    $this->validate($request, $rules);
    $data = [
        'first_name'    => $request->firstname,
        'last_name'     => $request->lastname,
        'email'         => $request->email,
        'phone'         => $request->phone,
        'role'          => User::ROLE_CUSTOMER,
        'password'      => Hash::make($request->password),
    ];

        
        // $this->guard()->login($user);
        $user = User::firstOrCreate($data);
        $adminUser = User::where('role', User::ROLE_ADMIN)->get();
        Notification::send($adminUser, new CustomerNotification($user));

        if($user)
        {
            $verifyUser = VerifyUser::create([
                'user_id' => $user->id,
                'token' => sha1(time())
              ]);
              $request->session()->put('userDetails', $user);

              SendEmailJob::dispatch($user);
              return $this->registered($request, $user)
                        ?: view('verification');
                    }
        
    }

    public function resendMail()
    {
        if(session()->has('userDetails'))
        {
            $user = session()->get('userDetails');
            SendEmailJob::dispatch($user); 
            return back()->with('success','A verification mail has been resent to your mail box');
        }
       
 
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(isset($verifyUser) )
        {
            $user = $verifyUser->user;
            // dd($user);
            if(!$user->verified) 
            {
                
                $verifyUser->user->verified = 1;
                $verifyUser->user->email_verified_at = Carbon::now();
                
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";
                return redirect()->intended(route('signin'))->with(['status' => $status]);
            } else {

                $status = "Your e-mail is already verified. You can now login.";
                return redirect()->intended(route('signin'))->with(['status' => $status]);
            }
        } 
        else 
        {
            return redirect('/signin')->with('warning', "Sorry your email cannot be identified.");
        }
        return redirect('/signin')->with('status', $status);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        
        $this->guard()->logout();
        return redirect('/signin')->with('status', 'We sent you an activation code. Check your email and click on the link to verify.');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if (!$user->verified) {
            auth()->logout();
            return back()->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
          }
          return redirect()->intended($this->redirectPath());
        return redirect()->intended();
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        //
    }
}
