<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(array('before' => 'auth'), function(){

    Route::get('/home', 'HomeController@index');
    Route::get('/signup','UsersController@prising');
    Route::get('/signin','UsersController@signin');
    Route::get('/prising','ServicesController@allservice');
    Route::get('/contactus','UsersController@contactus');
    Route::post('/user/sendmail','UsersController@sendmail');
    Route::post('/user/store','UsersController@store');
    Route::get('/user/active/{id}','UsersController@active');
    Route::post('/user/actionsignin','UsersController@actionsignin');
    Route::get('/user/dashboard','UsersController@userDashboard');
    Route::get('/seller/dashboard','UsersController@sellerDashboard');
    Route::get('our_offer','ContentsController@ourOffer');
    Route::get('services','ContentsController@services');
    Route::get('datacenters','ContentsController@datacenter');
    Route::get('products','ProductsController@index');
    Route::get('product/details/{id}','ProductsController@details');
    Route::resource('/product/productlist','ProductsController@productlist');
    Route::resource('/service/servicelist','ServicesController@servicelist');
    Route::resource('/allservice','ServicesController@allservice');    
    Route::resource('/product/delete_cart','ProductsController@delete_cart');
    


    
});

    Route::group(['middleware' => ['auth']], function(){
    Route::get('/user/logout','UsersController@logout');
    Route::get('/campaign/favorite/{user_id}/{campign_id}','CampignsController@favorite');
    Route::resource('product/addtocart','ProductsController@addtocart');
    Route::get('product/cartlist','ProductsController@cartlist');
    Route::get('product/checkout','ProductsController@checkout');
    Route::get('product/create','ProductsController@create');
    Route::post('product/store','ProductsController@store');
    Route::get('product/list','ProductsController@list');
    Route::get('product/edit/{id}','ProductsController@edit');
    Route::get('product/delete/{id}','ProductsController@delete');

    Route::get('user/editprofile','UsersController@editprofile');
    Route::post('user/submitprofile','UsersController@submitprofile');
    Route::get('user/changepassword','UsersController@changepassword');
    Route::post('user/submitpassword','UsersController@submitpassword');

    Route::get('service/create','ServicesController@create');
    Route::post('service/store','ServicesController@store');
    Route::get('service/list','ServicesController@list');
    Route::get('service/edit/{id}','ServicesController@edit');
    Route::get('service/delete/{id}','ServicesController@delete');
    Route::resource('/service/details','ServicesController@details');

    Route::post('order/store','OrdersController@store');
    Route::get('order/payment/{order_id}','OrdersController@payment');
    Route::get('order/paypal/{order_id}','OrdersController@paypal');
    Route::get('myorder','OrdersController@my_order');
    Route::post('order/stripe_payment','OrdersController@stripe_payment');
    Route::get('order/success/{id}','OrdersController@success');
    Route::resource('order/paypal_payment','OrdersController@paypal_payment');
    Route::post('order/service_stripe_payment','OrdersController@service_stripe_payment');
    
   
});

/* ================== Homepage + Admin Routes ================== */
require __DIR__.'/admin_routes.php';

/* ================== Api Routes ================== */
require __DIR__.'/api_routes.php';