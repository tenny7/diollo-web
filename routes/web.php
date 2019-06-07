<?php

use App\Models\Bank;
use App\Models\Role;
use App\Models\Store;
use App\Models\OrderStatus;
use Gerardojbaez\GeoData\Models\City;
use Gerardojbaez\GeoData\Models\Region;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // $cities = City::where('country_code', 'NG')->get();
    $regions = Region::where('country_code', 'NG')->orderBy('name', 'ASC')->get();
    return view('welcome', compact('regions'));
})->name('welcome');

Route::get('get-banks', function(){
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
});

Route::get('/get-started', function () {
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
});
Route::get ('/states/{country_code}', '\Gerardojbaez\GeoData\Controllers\RegionsController@regions' )->name('states');

Route::get ('/cities/{country_code}/{region_id}', '\Gerardojbaez\GeoData\Controllers\CitiesController@cities' )->name('cities');

// Route::get('walletBalance','')
Route::get('/markAsRead', function(){
    return Response::json(auth()->user()->unreadNotifications->markAsRead());
});

Route::get('/storeDetails/{store_id}', function($store_id){
    $store = Store::find($store_id);
    $region = Region::find($store->region_id); 
    return Response::json([
        'store' => $store,
        'region' => [
            'name' => $region->name,
            'id' =>  $region->id
        ],
    ]);  
});

Route::get('/become-an-agent', 'AgentController@becomeAnAgent1')->name('agent.signup.one');
Route::post('/become-an-agent', 'AgentController@becomeAnAgent1Process')->name('agent.signupprocess.one');

Route::get('/become-an-agent/2', 'AgentController@becomeAnAgent2')->name('agent.signup.two');
Route::post('/become-an-agent/2', 'AgentController@becomeAnAgent2Process')->name('agent.signupprocess.two');

Route::get('/become-an-agent/3', 'AgentController@becomeAnAgent3')->name('agent.signup.three');
Route::post('/become-an-agent/3', 'AgentController@becomeAnAgent3Process')->name('agent.signupprocess.three');

Route::get('/become-a-vendor', 'CustomLoginController@vendorForm')->name('vendor.signup');
Route::post('/create-vendor', 'CustomLoginController@signupVendor')->name('storeVendor');

Route::get('/become-an-affiliate', 'CustomLoginController@affiliateForm')->name('affiliate.signup');
Route::post('/create-affiliate', 'CustomLoginController@signupAffiliate')->name('storeAffiliate');

Route::get('/show_regions/{country_code}','AgentController@showRegions')->name('country.regions');
Route::get('/show_city/{region_id}','AgentController@showCity')->name('region.city');
// Route::get('show_states/{id}', 'CustomerController@isShowingStates')->name('country.states');

Route::group(['middleware' => ['verified', 'auth']], function(){
    Route::group(['middleware' => 'role:affiliate'], function () {
        Route::group(['prefix' => '/affiliate', 'as' => 'affiliate.', 'namespace' => 'Affiliate'], function () {

            Route::get('/dashboard', 'AffiliateController@dashboard')->name('dashbaord');
            Route::get('/referral-history', 'AffiliateController@vendorRefferred')->name('history');
        });
    });
});

Route::group(['middleware' => ['verified', 'auth']], function(){
    Route::group(['middleware' => 'role:agent'], function(){

        Route::get('/agent/dashboard', 'AgentController@dashboard')->name('agent.dashboard')->middleware('verified');
        Route::get('/agent/application', 'AgentController@application')->name('agent.application');

        Route::group(['prefix' => '/agent', 'as' => 'agent.', 'namespace' => 'Agent'], function(){

            Route::group(['prefix' => 'stores', 'as' => 'stores.'], function(){
                Route::get('/all', 'StoresController@index')->name('index');
                Route::get('/complete', 'StoresController@complete')->name('complete');
                Route::get('/incomplete', 'StoresController@incomplete')->name('incomplete');
                Route::get('/new', 'StoresController@new')->name('new');
                Route::post('/save-store', 'StoresController@addStore')->name('add');
                Route::get('/view-store', 'StoresController@viewStore')->name('view');
                Route::get('/show-store/{store_id}', 'StoresController@showUpdateForm')->name('showUpdateForm');
                Route::post('/update-store/{store_id}', 'StoresController@updateStore')->name('update');
                
            });

            Route::group(['prefix' => 'vendors', 'as' => 'vendors.'], function(){
                Route::get('/all', 'VendorsController@index')->name('index');
                Route::get('/complete', 'VendorsController@complete')->name('complete');
                Route::get('/incomplete', 'VendorsController@incomplete')->name('incomplete');
                Route::get('/new', 'VendorsController@new')->name('new');
                
            });
        
            Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
                Route::get('/all', 'ProductsController@index')->name('index');
                Route::get('/featured', 'ProductsController@featured')->name('featured'); 
                Route::get('/add-to-featured/{product_slug}', 'ProductsController@addToFeatured')->name('addFeatured');
                Route::get('/clearance', 'ProductsController@clearance')->name('clearance');
                Route::get('/add-to-clearance/{product_slug}', 'ProductsController@addToClearance')->name('addClearance'); 
                Route::get('/new', 'ProductsController@new')->name('new');
                Route::post('/add-product', 'ProductsController@addProduct')->name('add');
                Route::get('/edit-product/{product_slug}', 'ProductsController@updateForm')->name('updateForm');
                Route::post('/update-product/{product_slug}', 'ProductsController@updateProduct')->name('update');
                Route::get('/delete-product/{product_slug}', 'ProductsController@destroy')->name('delete');
            });
        
            Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
                Route::get('/profile', 'SettingsController@profile')->name('profile');
                Route::post('/save-profile', 'SettingsController@saveProfile')->name('add');
                Route::get('/password', 'SettingsController@password')->name('password');
                Route::post('/save-password', 'SettingsController@updatePassword')->name('password.update');
                Route::get('/bank', 'SettingsController@bank')->name('bank');
                Route::post('/bank', 'SettingsController@updateBank')->name('saveBank');
            });
        });
    });
});

Route::view('/verification', 'verification');
Route::get('/user/verify/{token}', 'CustomLoginController@verifyUser');
Route::get('/search-website', 'SearchController@searchQuery')->name('search.query');
// Route::get('/verifyemail/{token}', 'CustomLoginController@verify')->name('verifyAccount');
Route::get('/signin', 'CustomLoginController@showLoginForm')->name('signin');
Route::post('/signin', 'CustomLoginController@authenticate')->name('signinAction');
Route::get('/create-user', 'CustomLoginController@showSignUpForm')->name('signup');
Route::post('/signup', 'CustomLoginController@signup')->name('signupAction');

Route::get('/logout', 'CustomLoginController@logout')->name('customer.logout');

Route::group(['prefix' => '/vendor', 'as' => 'vendor.', 'namespace' => 'Vendor'], function () {
    Route::get('/dashboard', 'VendorController@dashboard')->name('dashboard')->middleware('verified');
    // Route::get('/', 'VendorController@dashboard')->name('dashboard');
    // Route::get('/dashboard', function () {
    //     return 'Dashboard Page';
    // });
    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/all', 'ProductsController@index')->name('index');
        // Route::get('/featured', 'ProductsController@featured')->name('featured');
        // Route::get('/clearance', 'ProductsController@clearance')->name('clearance');
        Route::get('/edit-product/{product_slug}', 'ProductsController@updateForm')->name('updateForm');
        Route::post('/update-product/{product_slug}', 'ProductsController@updateProduct')->name('update');
        Route::get('/featured', 'ProductsController@featured')->name('featured'); 
        Route::get('/add-to-featured/{product_slug}', 'ProductsController@addToFeatured')->name('addFeatured');
        Route::get('/clearance', 'ProductsController@clearance')->name('clearance');
        Route::get('/add-to-clearance/{product_slug}', 'ProductsController@addToClearance')->name('addClearance');
        Route::get('/delete-product/{product_slug}', 'ProductsController@destroy')->name('delete');

        // Route::get('/', 'ProductsController@index')->name('index');
        // Route::get('create', 'AccountsController@create')->name('create');
        // Route::get('view/{id}', 'AccountsController@show')->name('show');
        // Route::post('store', 'AccountsController@store')->name('store');
        // Route::get('edit/{id}', 'AccountsController@edit')->name('edit');
        // Route::put('update', 'AccountsController@update')->name('update');
        // Route::post('destroy', 'AccountsController@destroy')->name('destroy');
    });


    Route::group(['prefix' => 'sales', 'as' => 'sales.'], function () {
        Route::get('/all', 'SalesController@index')->name('index');
        Route::get('/returns', 'SalesController@returns')->name('returns');
        Route::get('/reserved', 'SalesController@reserved')->name('reserved');
        Route::get('/customers', 'SalesController@customers')->name('customers');
    });

    Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
        Route::get('/general', 'SettingsController@general')->name('general');
        Route::get('/profile', 'SettingsController@profile')->name('profile');
        Route::post('/save-profile', 'SettingsController@saveProfile')->name('add');
        Route::get('/password', 'SettingsController@password')->name('password');
        Route::post('/save-password', 'SettingsController@updatePassword')->name('password.update');
        Route::get('/bank', 'SettingsController@bank')->name('bank');
        Route::post('/bank', 'SettingsController@updateBank')->name('saveBank');
        // Route::get('/profile', 'SettingsController@profile')->name('profile');
        // Route::get('/password', 'SettingsController@password')->name('password');
        // Route::get('/bank', 'SettingsController@bank')->name('bank');
    });

   
});

Route::group(['prefix' => '/customer', 'as' => 'customer.', 'namespace' => 'User'], function(){
    Route::get('/account-info', 'CustomerController@showAccountInfo')->name('accountInfo');
    Route::get('/stores', 'CustomerController@showStores')->name('stores');
    Route::get('/shop/{store_id}', 'CustomerController@showStorePage')->name('storePage');
    Route::get('/product/{product_id}', 'CustomerController@showProductPage')->name('productPage');
    // Route::get('/profile', 'CustomerController@profile')->name('profile');
});

Route::group(['prefix' => '/orders', 'as' => 'orders.', 'namespace' => 'Order'], function(){
    Route::get('order', 'OrderController@showOrderPage')->name('orderPage');
    Route::get('empty-order', 'OrderController@showOrderEmptyPage')->name('orderPageEmpty');
});





Route::group(['prefix' => '/admin', 'as' => 'admin.', 'namespace' => 'Admin'], function(){

        // Route::get('/admin/dashboard',)
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard')->middleware('verified');
    
    Route::group(['prefix' => 'stores', 'as' => 'stores.'], function(){
        Route::get('/all', 'StoresController@index')->name('index');
        Route::get('/complete', 'StoresController@complete')->name('complete');
        Route::get('/incomplete', 'StoresController@incomplete')->name('incomplete');
        Route::get('/new', 'StoresController@new')->name('new');
        Route::get('/view-store', 'StoresController@viewStore')->name('view');
        Route::get('/show-store/{store_id}', 'StoresController@showUpdateForm')->name('showUpdateForm');
        Route::post('/update-store/{store_id}', 'StoresController@updateStore')->name('update');
    });

    Route::group(['prefix' => 'promotions', 'as' => 'promotions.'], function(){
        Route::get('/all', 'PromotionsController@index')->name('index');
        Route::get('/complete', 'PromotionsController@complete')->name('complete');
        Route::get('/mark-as-completed/{promotion_id}', 'PromotionsController@completed')->name('completed');
        Route::get('/active', 'PromotionsController@active')->name('active');
        Route::get('/new', 'PromotionsController@new')->name('new');
        Route::post('/create-promotion', 'PromotionsController@addPromotion')->name('addPromotion');
        Route::get('/edit-promotion/{promotion_id}', 'PromotionsController@showUpdateForm')->name('showUpdateForm');
        Route::post('/update-promotion/{promotion_id}', 'PromotionsController@update')->name('update');
    });

    Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
        Route::get('/all', 'OrdersController@index')->name('index');
        Route::post('/create-order', 'OrdersController@addOrder')->name('addOrder');
        Route::get('/returns', 'OrdersController@returns')->name('returns');
        Route::get('/reserved', 'OrdersController@reserved')->name('reserved');
        Route::get('/customers', 'OrdersController@customers')->name('customers');
    });

    Route::group(['prefix' => 'agents', 'as' => 'agents.'], function () {
        Route::get('/all', 'AgentsController@index')->name('index');
        Route::get('/applications', 'AgentsController@applications')->name('applications');
        Route::get('/suspended', 'AgentsController@suspended')->name('suspended');
        Route::get('/agent-suspend/{agent_id}', 'AgentsController@suspendAgent')->name('suspend');
        Route::get('/view-agent-stores/{agent_id}', 'AgentsController@viewStores')->name('viewStores');
        Route::get('/new/{store_id}', 'StoresController@addAgentForm')->name('new');
        Route::post('add-agent', 'StoresController@addAgent')->name('addAgentToStore');
    });

    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/all', 'ProductsController@index')->name('index');
        Route::get('/edit-product/{product_slug}', 'ProductsController@updateForm')->name('updateForm');
        Route::post('/update-product/{product_slug}', 'ProductsController@updateProduct')->name('update');
        Route::get('/featured', 'ProductsController@featured')->name('featured'); 
        Route::get('/add-to-featured/{product_slug}', 'ProductsController@addToFeatured')->name('addFeatured');
        Route::get('/clearance', 'ProductsController@clearance')->name('clearance');
        Route::get('/add-to-clearance/{product_slug}', 'ProductsController@addToClearance')->name('addClearance');
        Route::get('/delete-product/{product_slug}', 'ProductsController@destroy')->name('delete');
    });

    Route::group(['prefix' => 'vendors', 'as' => 'vendors.'], function () {
        Route::get('/new/{store_id}', 'StoresController@addVendorForm')->name('new');
        Route::post('/add-vendor', 'StoresController@addVendor')->name('addVendorToStore');
    });

    Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
        // Route::get('/profile', 'SettingsController@profile')->name('profile');
        // Route::get('/password', 'SettingsController@password')->name('password');
        // Route::get('/bank', 'SettingsController@bank')->name('bank');
        Route::get('/general', 'SettingsController@general')->name('general');
        Route::get('/profile', 'SettingsController@profile')->name('profile');
        Route::post('/save-profile', 'SettingsController@saveProfile')->name('add');
        Route::get('/password', 'SettingsController@password')->name('password');
        Route::post('/save-password', 'SettingsController@updatePassword')->name('password.update');
        Route::get('/bank', 'SettingsController@bank')->name('bank');
        Route::post('/bank', 'SettingsController@updateBank')->name('saveBank');
    });
});



// Route::

// Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
    // Route::get('/order', 'OrdersController@showOrderPage')->name('orderPage');
    // Route::get('/returns', 'OrdersController@returns')->name('returns');
    // Route::get('/reserved', 'OrdersController@reserved')->name('reserved');
    // Route::get('/customers', 'OrdersController@customers')->name('customers');
// });

Auth::routes();
// ['verify' => true]

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
