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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api'], function () {
  	Route::Post('/login', 'UsersController@login');
});
Route::group(['prefix' => 'api'], function () {
  	Route::Post('/signup', 'UsersController@signup');
        
});

Route::group(['prefix' => 'api', 'middleware' => 'auth:api'], function () {
  	Route::resource('users', 'UsersController');
        Route::Get('speciesList', 'UsersController@speciesList');
        Route::Get('breedList/{id}', 'UsersController@breedList');
        Route::Get('categoryList', 'UsersController@categoryList');
        Route::Post('addPet', 'UsersController@petAdd');
        Route::Post('addBusiness', 'UsersController@businessAdd');
        Route::Post('addPost', 'UsersController@postAdd');
        Route::Get('postList', 'UsersController@postList');
        
});
// Route::group(['prefix' => 'api'], function () {
//   	Route::resource('users', 'UsersController');
// });

/* ================== Homepage + Admin Routes ================== */

require __DIR__.'/admin_routes.php';
