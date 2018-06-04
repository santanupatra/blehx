<?php

Route::group(['prefix' => 'api'], function () {
    Route::Post('/login', 'API\UsersController@login');
  	Route::Post('/signup', 'API\UsersController@signup');
    Route::Post('/signupotp', 'API\UsersController@signupOtp');
    Route::Post('/orderhistory', 'API\UsersController@orderhistory');
    Route::Post('/orderdetails', 'API\UsersController@orderdetails');
    Route::Post('/userdetails', 'API\UsersController@userdetails');
    

    Route::Get('/category', 'API\ProductsController@productCategory');
    Route::Post('/veriefyotp', 'API\UsersController@veriefyotp');
    Route::Post('/product', 'API\ProductsController@productList');
    Route::Post('/productDetails', 'API\ProductsController@productDetails');
    Route::Post('/productAddCart', 'API\ProductsController@productAddCart');
    Route::Post('/productCart', 'API\ProductsController@productCart');
    Route::Post('/productCartRemove', 'API\ProductsController@productCartRemove');
    Route::Post('/addressupdate', 'API\ProductsController@addressupdate');
    Route::Post('/order', 'API\ProductsController@order');
    Route::Post('/service', 'API\ProductsController@serviceList');
    
    
    
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
        Route::Post('postLike', 'UsersController@postLike');
        Route::resource('pets', 'PetsController');
        Route::resource('organizations', 'OrganizationsController');
        Route::resource('comments', 'CommentsController');
        Route::Get('postRelatedCommentList/{post_id}', 'CommentsController@postRelatedCommentList');
        Route::resource('reports', 'ReportsController');
});
// Route::group(['prefix' => 'api'], function () {
//   	Route::resource('users', 'UsersController');
// });
