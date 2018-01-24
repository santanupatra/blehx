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
    
});

    Route::group(['middleware' => ['auth']], function(){
    Route::get('/user/logout','UsersController@logout');
    Route::get('/campaign/favorite/{user_id}/{campign_id}','CampignsController@favorite');
   
});

/* ================== Homepage + Admin Routes ================== */
require __DIR__.'/admin_routes.php';

/* ================== Api Routes ================== */
require __DIR__.'/api_routes.php';