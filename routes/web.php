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

Route::get('/', 'SiteController@welcome')->name('welcome');
Route::post('save-testimonial', 'TestimonyController@store')->name('testimonial.submit');
Route::post('contact-us', 'FeedbackController@contactUs')->name('contact.us');

Route::get('get-banks','SiteController@getBanks');

Route::get('/get-started', 'SiteController@getStarted');
Route::get('/make-admin', 'SiteController@makeAdmin')->middleware('auth');

Route::get ('/states/{country_code}', '\Gerardojbaez\GeoData\Controllers\RegionsController@regions' )->name('states');

Route::get ('/cities/{country_code}/{region_id}', '\Gerardojbaez\GeoData\Controllers\CitiesController@cities' )->name('cities');

Route::get('/markAsRead', 'SiteController@markAsRead');

Route::get('/storeDetails/{store_id}','SiteController@storeDetails');
Route::post('/pay', 'Payments\PaymentController@redirectToGateway')->name('pay');

Route::get('/payment/callback', 'Payments\PaymentController@handlePayStackCallback');

Route::get('/become-an-agent', 'AgentController@becomeAnAgent1')->name('agent.signup.one');
Route::post('/become-an-agent', 'AgentController@becomeAnAgent1Process')->name('agent.signupprocess.one');

Route::get('/become-an-agent/2', 'AgentController@becomeAnAgent2')->name('agent.signup.two');
Route::post('/become-an-agent/2', 'AgentController@becomeAnAgent2Process')->name('agent.signupprocess.two');

Route::get('/become-an-agent/3', 'AgentController@becomeAnAgent3')->name('agent.signup.three');
Route::post('/become-an-agent/3', 'AgentController@becomeAnAgent3Process')->name('agent.signupprocess.three');

Route::get('/become-a-vendor', 'CustomLoginController@vendorForm')->name('vendor.signup');

// Route::post('/create-vendor', 'CustomLoginController@signupVendor')->name('storeVendor');
Route::post('/pay-commitment', 'Payments\VendorPayment@redirectToGateway')->name('storeVendor');
Route::post('/agent-pay-commitment', 'Payments\VendorPayment@redirectToGateway')->name('storeVendorAgent');
Route::get('/vendor/payment/callback', 'Payments\VendorPayment@handlePayStackCallback');
// Route::post('/create-vendor', 'CustomLoginController@signupVendor')->name('storeVendor');

Route::get('/become-an-affiliate', 'CustomLoginController@affiliateForm')->name('affiliate.signup');
Route::post('/create-affiliate', 'CustomLoginController@signupAffiliate')->name('storeAffiliate');

Route::get('/show_regions/{country_code}','AgentController@showRegions')->name('country.regions');
Route::get('/show_city/{region_id}','AgentController@showCity')->name('region.city');

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
                Route::get('/bulkVendorDelete', 'VendorsController@bulkVendorDelete')->name('bulkVendorDelete');
                
                
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

            Route::group(['prefix' => 'brand', 'as' => 'brand.'], function () {
                Route::get('/all', 'ProductsController@allBrands')->name('all');
                Route::get('/show-add-form', 'ProductsController@showBrandPage')->name('showBrandAdd');
                Route::post('/add', 'ProductsController@addBrand')->name('add')->middleware('role:admin,agent');
                Route::get('/show-update-form/{id}', 'ProductsController@showBrandUpdateForm')->name('showBrandUpdate');
                Route::post('/update/{id}', 'ProductsController@updateBrand')->name('update');
                
            });
        
        
            Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
                Route::get('/all', 'ProductsController@all')->name('all');
                Route::get('/show-add-form', 'ProductsController@showCategoryPage')->name('showCategoryAdd');
                Route::post('/add', 'ProductsController@addCategory')->name('add');
                Route::get('/show-update-form/{id}', 'ProductsController@showCategoryUpdateForm')->name('showCategoryUpdate');
                Route::post('/update/{id}', 'ProductsController@updateCategory')->name('update');
                
            });
        });
    });
});

Route::view('/verification', 'verification');
Route::get('/user/verify/{token}', 'CustomLoginController@verifyUser');
Route::get('/searching', 'SearchController@search')->name('search.stores');
Route::get('/search-website', 'SearchController@searchQuery')->name('search.query');
Route::get('/top-selling', 'SearchController@topSelling')->name('top.selling');
Route::get('/new-stock', 'SearchController@newStock')->name('new.stock');
Route::get('/search-by-category/{id}', 'SearchController@searchByCategory')->name('category.search');
Route::get('/search-by-distance/{id}', 'SearchController@searchByDistance')->name('search.geo.location');
Route::get('/show-saved-item', 'SearchController@showSavedItem')->name('saved.item');
Route::post('/save-item/{id}', 'SearchController@saveItem')->name('save.item');

// Route::post('reserve-for-one-day/{product_id}', 'CustomerController@reserveForAday')->name('reserve.for.onday');

Route::get('/review/{id}/{rating}', 'SearchController@reviews')->name('reviews')->middleware('auth');

Route::get('/signin', 'CustomLoginController@showLoginForm')->name('signin');
Route::post('/signin', 'CustomLoginController@authenticate')->name('signinAction');
Route::get('/resend-mail', 'CustomLoginController@resendMail')->name('resend.mail');
Route::get('/create-user', 'CustomLoginController@showSignUpForm')->name('signup');
Route::post('/signup', 'CustomLoginController@signup')->name('signupAction');
Route::get('/logout', 'CustomLoginController@logout')->name('customer.logout');

Route::group(['prefix' => '/vendor', 'as' => 'vendor.', 'namespace' => 'Vendor'], function () {
    Route::get('/dashboard', 'VendorController@dashboard')->name('dashboard')->middleware('verified');
   
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
        // Route::get('/bulkCustomerDelete', 'SalesController@bulkCustomerDelete')->name('bulkCustomerDelete');
        Route::get('/mark-as-reserved/{order_id}', 'SalesController@markAsReserved')->name('markReserved');
    });

    Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
        Route::get('/general', 'SettingsController@general')->name('general');
        Route::get('/profile', 'SettingsController@profile')->name('profile');
        Route::post('/save-profile', 'SettingsController@saveProfile')->name('add');
        Route::get('/password', 'SettingsController@password')->name('password');
        Route::post('/save-password', 'SettingsController@updatePassword')->name('password.update');
        Route::get('/bank', 'SettingsController@bank')->name('bank');
        Route::post('/bank', 'SettingsController@updateBank')->name('saveBank');
    });

   
});

Route::post('/topFund', 'Payments\TopupController@redirectToGateway')->name('addfund');
Route::get('/addfunds/payment/callback', 'Payments\TopupController@handlePayStackCallback');

Route::group(['prefix' => '/customer', 'as' => 'customer.', 'namespace' => 'User'], function(){
    Route::get('/account-info', 'CustomerController@showAccountInfo')->name('accountInfo')->middleware('auth');
    Route::get('/stores', 'CustomerController@showStores')->name('stores');
    Route::get('/shop/{store_id}', 'CustomerController@showStorePage')->name('storePage');
    Route::get('/product/{product_id}', 'CustomerController@showProductPage')->name('productPage');
    Route::get('/shop', 'CustomerController@productList')->name('shop');
    
    Route::get('wallet-show','CustomerController@showWalletPage')->name('wallet');
    Route::post('update-account','CustomerController@updateAccount')->name('account');
    Route::get('top-up', 'CustomerController@topUp')->name('top.up');
    Route::get('pay-from-wallet/{total}', 'CustomerController@showPaymentForm')->name('pay.from.wallet');
    Route::post('wallet-payment', 'CustomerController@payingFromWallet')->name('take.from.wallet');
    Route::post('add-review', 'CustomerController@review')->name('review.add');
    Route::post('update-profile', 'CustomerController@saveProfile')->name('profile.update');
    Route::post('update-password', 'CustomerController@updatePassword')->name('profile.password');
    Route::post('location-update', 'CustomerController@updateLocation')->name('profile.location');
    Route::get('reserve', 'CustomerController@reserveForADay')->name('reserve');
    
    // Route::get('add-fund', 'CustomerController@addFund')->name('addfund');

    
    // Route::get('/topup/payment/callback', 'Payments\TopupController@handlePayStackCallback');

    // Route::get('/profile', 'CustomerController@profile')->name('profile');
});

Route::group(['prefix' => '/orders', 'as' => 'orders.', 'namespace' => 'Order'], function(){
Route::get('order', 'OrderController@showOrderPage')->name('orderPage');
Route::get('view-orders', 'OrderController@viewOrders')->name('viewOrders');
Route::get('order-list/{id}', 'OrderController@listOrders')->name('orderList');
});





Route::group(['prefix' => '/admin', 'as' => 'admin.', 'namespace' => 'Admin'], function(){

        // Route::get('/admin/dashboard',)
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard')->middleware('auth');
    
    Route::group(['prefix' => 'stores', 'as' => 'stores.'], function(){
        Route::get('/all', 'StoresController@index')->name('index');
        Route::get('/complete', 'StoresController@complete')->name('complete');
        Route::get('/incomplete', 'StoresController@incomplete')->name('incomplete');
        Route::get('/new', 'StoresController@new')->name('new');
        Route::post('/save-store', 'StoresController@addStore')->name('add');
        Route::get('/view-store', 'StoresController@viewStore')->name('view');
        Route::get('/show-store/{store_id}', 'StoresController@showUpdateForm')->name('showUpdateForm');
        Route::post('/update-store/{store_id}', 'StoresController@updateStore')->name('update');
        Route::get('/bulkDelete', 'StoresController@bulkDelete');
        
    });

    Route::group(['prefix' => 'promotions', 'as' => 'promotions.'], function(){
        Route::get('/all', 'PromotionsController@index')->name('index');
        Route::get('/complete', 'PromotionsController@complete')->name('complete');
        Route::get('/storeBanner', 'PromotionsController@storeBanner')->name('storeBanner');
        Route::get('/topselling', 'PromotionsController@topselling')->name('topselling');
        Route::get('/newstock', 'PromotionsController@newstock')->name('newstock');
        Route::get('/slider', 'PromotionsController@slider')->name('slider');
        Route::get('/mark-as-completed/{promotion_id}', 'PromotionsController@completed')->name('completed');
        Route::get('/active', 'PromotionsController@active')->name('active');
        Route::get('/new', 'PromotionsController@new')->name('new');
        Route::post('/create-promotion', 'PromotionsController@addPromotion')->name('addPromotion');
        Route::get('/edit-promotion/{promotion_id}', 'PromotionsController@showUpdateForm')->name('showUpdateForm');
        Route::post('/update-promotion/{promotion_id}', 'PromotionsController@update')->name('update');
        Route::get('/bulkPromotionDelete', 'ProductsController@bulkPromotionDelete');
    });

    Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
        Route::get('/all', 'OrdersController@index')->name('index');
        Route::post('/create-order', 'OrdersController@addOrder')->name('addOrder');
        Route::get('/returns', 'OrdersController@returns')->name('returns');
        Route::get('/reserved', 'OrdersController@reserved')->name('reserved');
        Route::get('/mark-as-reserved/{order_id}', 'OrdersController@markAsReserved')->name('markReserved');
        Route::get('/mark-as-returned/{order_id}', 'OrdersController@markAsReturned')->name('markReturned');
        Route::get('/customers', 'OrdersController@customers')->name('customers');
        Route::get('/bulkOrdersDelete', 'OrdersController@bulkOrdersDelete');
    });

    Route::group(['prefix' => 'agents', 'as' => 'agents.'], function () {
        Route::get('/all', 'AgentsController@index')->name('index');
        Route::get('/applications', 'AgentsController@applications')->name('applications');
        Route::get('/approve/{id}', 'AgentsController@approve')->name('approve');
        Route::get('/reject/{id}', 'AgentsController@reject')->name('reject');
        Route::get('/suspended', 'AgentsController@suspended')->name('suspended');
        Route::get('/agent-suspend/{agent_id}', 'AgentsController@suspendAgent')->name('suspend');
        Route::get('/view-agent-stores/{agent_id}', 'AgentsController@viewStores')->name('viewStores');
        Route::get('/new/{store_id}', 'StoresController@addAgentForm')->name('new');
        Route::post('add-agent', 'StoresController@addAgent')->name('addAgentToStore');
        Route::get('/bulkAgentDelete', 'AgentsController@bulkAgentDelete');
    });

    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/all', 'ProductsController@index')->name('index');
        Route::get('/new', 'ProductsController@new')->name('new');
        Route::post('/add-product', 'ProductsController@addProduct')->name('add');
        Route::get('/edit-product/{product_slug}', 'ProductsController@updateForm')->name('updateForm');
        Route::post('/update-product/{product_slug}', 'ProductsController@updateProduct')->name('update');
        Route::get('/featured', 'ProductsController@featured')->name('featured'); 
        Route::get('/add-to-featured/{product_slug}', 'ProductsController@addToFeatured')->name('addFeatured');
        Route::get('/clearance', 'ProductsController@clearance')->name('clearance');
        Route::get('/add-to-clearance/{product_slug}', 'ProductsController@addToClearance')->name('addClearance');
        Route::get('/delete-product/{product_slug}', 'ProductsController@destroy')->name('delete');
        Route::get('/bulkProductDelete', 'ProductsController@bulkProductDelete');
    });
    
    Route::group(['prefix' => 'brand', 'as' => 'brand.'], function () {
        Route::get('/all', 'ProductsController@allBrands')->name('all');
        Route::get('/show-add-form', 'ProductsController@showBrandPage')->name('showBrandAdd');
        Route::post('/add', 'ProductsController@addBrand')->name('add')->middleware('role:admin,agent');
        Route::get('/show-update-form/{id}', 'ProductsController@showBrandUpdateForm')->name('showBrandUpdate');
        Route::post('/update/{id}', 'ProductsController@updateBrand')->name('update');
        Route::get('/bulkBrandDelete', 'ProductsController@bulkBrandDelete');
        
    });

    // Route::group(['prefix' => 'application', 'as' => 'application.'], function () {
    //     Route::get('/approve', 'ProductsController@allBrands')->name('approve');
       
        
    // });


    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/all', 'ProductsController@all')->name('all');
        Route::get('/show-add-form', 'ProductsController@showCategoryPage')->name('showCategoryAdd');
        Route::post('/add', 'ProductsController@addCategory')->name('add');
        Route::get('/show-update-form/{id}', 'ProductsController@showCategoryUpdateForm')->name('showCategoryUpdate');
        Route::post('/update/{id}', 'ProductsController@updateCategory')->name('update');
        Route::get('/bulkCategoryDelete', 'ProductsController@bulkCategoryDelete');
        
    });

    Route::group(['prefix' => 'vendors', 'as' => 'vendors.'], function () {
        Route::get('/new', 'VendorController@addVendorForm')->name('new');
        Route::post('/add-vendor', 'VendorController@addVendor')->name('addVendorToStore');
        Route::get('/bulkVendorsDelete', 'VendorController@bulkVendorsDelete');
    });

    Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
        Route::get('/general', 'SettingsController@general')->name('general');
        Route::get('/profile', 'SettingsController@profile')->name('profile');
        Route::post('/save-profile', 'SettingsController@saveProfile')->name('add');
        Route::get('/password', 'SettingsController@password')->name('password');
        Route::post('/save-password', 'SettingsController@updatePassword')->name('password.update');
        Route::get('/bank', 'SettingsController@bank')->name('bank');
        Route::post('/bank', 'SettingsController@updateBank')->name('saveBank');
    });
});


Route::post('/addToCart/{product_id}', 'Carts\CartController@addToCart')->name('cart.add');
Route::post('/addToCartSingle/{product_id}', 'Carts\CartController@addToCartSingle')->name('cart.add.single');
Route::get('/about', 'User\CustomerController@about')->name('about.us');
Route::get('/help', 'User\CustomerController@help')->name('help');
Route::get('/faq', 'User\CustomerController@faq')->name('faq');
Route::post('/update-cart-qty/{id}', 'Carts\CartController@updateQty')->name('updateQty');
Route::get('/bulkProductDelete', 'Carts\CartController@deleteFromCart');
// Route::


Auth::routes();
// ['verify' => true]

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

// Route::get('generate-pdf','DynamicPdfController@generatePDF')->name('generate.pdf');
