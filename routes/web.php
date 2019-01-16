<?php

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
    return view('welcome');
});

Route::group(['prefix' => '/vendor', 'as' => 'vendor.', 'namespace' => 'Vendor'], function () {
    Route::get('/dashboard', 'VendorController@dashboard')->name('dashboard');
    // Route::get('/', 'VendorController@dashboard')->name('dashboard');
    // Route::get('/dashboard', function () {
    //     return 'Dashboard Page';
    // });
    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/all', 'ProductsController@index')->name('index');
        Route::get('/featured', 'ProductsController@featured')->name('featured');
        Route::get('/clearance', 'ProductsController@clearance')->name('clearance');

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
        Route::get('/password', 'SettingsController@password')->name('password');
        Route::get('/bank', 'SettingsController@bank')->name('bank');
    });

   
});

Route::group(['prefix' => '/agent', 'as' => 'agent.', 'namespace' => 'Agent'], function(){

    Route::group(['prefix' => 'vendors', 'as' => 'vendors.'], function(){
        Route::get('/all', 'VendorsController@index')->name('index');
        Route::get('/complete', 'VendorsController@complete')->name('complete');
        Route::get('/incomplete', 'VendorsController@incomplete')->name('incomplete');
        Route::get('/new', 'VendorsController@new')->name('new');
    });

    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/all', 'ProductsController@index')->name('index');
        Route::get('/featured', 'ProductsController@featured')->name('featured');
        Route::get('/clearance', 'ProductsController@clearance')->name('clearance');
    });

    Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
        Route::get('/profile', 'SettingsController@profile')->name('profile');
        Route::get('/password', 'SettingsController@password')->name('password');
        Route::get('/bank', 'SettingsController@bank')->name('bank');
    });
});
