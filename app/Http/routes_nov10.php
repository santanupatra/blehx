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
    Route::get('/signup','UsersController@signup');
    Route::post('/user/store','UsersController@store');
    Route::get('/user/active/{id}','UsersController@active');
    Route::get('/user/signin','UsersController@signin');
    Route::post('/user/actionsignin','UsersController@actionsignin');
    Route::any('/campaign','CampignsController@index');
    Route::get('/campaign/{slug}','CampignsController@details');
    Route::post('/subscription/','UsersController@subscribe');
    Route::get('/fundraiser','CategoriesController@index');
    Route::get('/category/child/{id}','CategoriesController@childs');
    Route::get('/category/{id}','CategoriesController@detail');
    Route::any('/start-project','CampignsController@startproject');
    Route::post('/campaignfirststep','CampignsController@cereatecampaign');
    Route::get('/user/signincamp','UsersController@signincamp');
    Route::post('/user/actionsignincamp','UsersController@actionsignincamp');
    Route::get('/charitysignup','UsersController@charitysignup');
    Route::get('/charitythankyou','UsersController@charitythankyou');
    Route::get('/user/charityactive/{id}','UsersController@charityactive');
    Route::post('/user/storecharity','UsersController@storecharity');
    Route::put('/user/charityupdate/{id}','UsersController@charityupdate');
    Route::post('/user/sociallogin','UsersController@sociallogin');
    Route::post('/settype','UsersController@settype');
    Route::get('/checkemail/{email}','UsersController@checkemail');
    Route::get('/checkname/{first_name}','UsersController@checkname');
    Route::get('/following','FollowingsController@index');
    Route::get('/about-us','ContentsController@about');
    Route::get('/how-it-work','ContentsController@howit');
    Route::get('/charter','ContentsController@charter');
    Route::get('/allcampaigns/{slug}','CharitiesController@allcampaigns');
    Route::get('/curated-pages','CharitiesController@curated_pages');
    Route::any('/popular','CategoriesController@popular');
    Route::any('/newest','CategoriesController@newest');
    Route::any('/ending-soon','CategoriesController@ending_soon');
    Route::any('/most-funded','CategoriesController@most_funded');
    Route::any('/most-backed','CategoriesController@most_backed');
    // ...
});
Route::group(['middleware' => ['auth']], function(){
    Route::get('/user/logout','UsersController@logout');
    Route::get('/campaign/favorite/{user_id}/{campign_id}','CampignsController@favorite');
    Route::get('/myproject','CampignsController@myproject');
    Route::get('/deletecamp/{id}','CampignsController@deletecamp');
    Route::get('/archive/','CampignsController@archive');
    Route::get('/restore/{id}','CampignsController@restore');
    Route::get('/favorite','CampignsController@favorites');
    Route::get('/unfavorite/{id}','CampignsController@unfavorite');
    Route::post('/donate','DonationsController@index');
    Route::get('/campaign/edit/{slug}/{tab?}','CampignsController@editcampaign');
    Route::get('/success','DonationsController@paysuccess');
    Route::get('/failure','DonationsController@payfailure');
    Route::get('/mydonation','DonationsController@donationlists');
    Route::get('/profile','UsersController@profile');
    Route::put('/campaign/update/{id}','CampignsController@update');
    Route::put('/campaign/updatethird/{id}','CampignsController@updatethird');
    Route::put('/campaign/updatefourth/{id}','CampignsController@updatefourth');
    Route::put('/user/update/{id}','UsersController@update');
    Route::get('/charityprofile','UsersController@charityprofile');
    Route::any('/charitydasboard','CharitiesController@index');
    Route::get('/monthlyreport/{campaign?}','CharitiesController@monthlyreport');
    Route::post('/storeitem','CampignsController@storeitem');

});



/* ================== Homepage + Admin Routes ================== */

require __DIR__.'/admin_routes.php';
