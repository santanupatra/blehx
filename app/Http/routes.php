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
    Route::get('/prising','UsersController@prising');
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

    
});

    Route::group(['middleware' => ['auth']], function(){
    Route::get('/user/logout','UsersController@logout');
    Route::get('/campaign/favorite/{user_id}/{campign_id}','CampignsController@favorite');
    Route::post('product/addtocart','ProductsController@addtocart');
    Route::get('product/cartlist','ProductsController@cartlist');
    
   
});

/* ================== Homepage + Admin Routes ================== */
require __DIR__.'/admin_routes.php';

/* ================== Api Routes ================== */
require __DIR__.'/api_routes.php';