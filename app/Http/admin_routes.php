<?php

/* ================== Homepage ================== */
  #Route::get('/', 'HomeController@index');
//Route::get('/home', 'HomeController@index');
//Route::get('/', 'LA\DashboardController@index');
//Route::get('/', 'Auth\AuthController@showLoginForm');
//Route::get('/home', 'Auth\AuthController@showLoginForm');
//Route::get('/admin', 'Auth\AuthController@showLoginForm');

Route::group(array('before' => 'auth'), function(){
	Route::get('/', function () {
     #return view('auth.login');
     return redirect('/home');
	});
	Route::get('/admin', function () {
     return view('auth.login');
	});
});

/*Route::group(array('before' => 'auth'), function(){
	Route::get('/', function () {
     return view('auth.login');
	});
	Route::get('/admin', function () {
     return view('auth.login');
	});

});*/

Route::auth();

/* ================== Access Uploaded Files ================== */
Route::get('files/{hash}/{name}', 'LA\UploadsController@get_file');

/*
|--------------------------------------------------------------------------
| Admin Application Routes
|--------------------------------------------------------------------------
*/

$as = "";
if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
	$as = config('laraadmin.adminRoute').'.';

	Route::post(config('laraadmin.adminRoute'). '/adminlogin', 'LA\UsersController@submit_login');
	// Routes for Laravel 5.3
	#Route::get('/logout', 'LA\UsersController@admin_logout');
}

Route::group(['as' => $as, 'middleware' => ['auth', 'permission:ADMIN_PANEL']], function () {
	
	/* ================== Dashboard ================== */
	Route::get(config('laraadmin.adminRoute'), 'LA\DashboardController@index');
	Route::get(config('laraadmin.adminRoute'). '/add-user', 'LA\UsersController@add_user');
	Route::post(config('laraadmin.adminRoute'). '/submit_user', 'LA\UsersController@submit_user');
	Route::get(config('laraadmin.adminRoute'). '/dashboard', 'LA\DashboardController@index');
	Route::get(config('laraadmin.adminRoute'). '/sales', 'LA\DashboardController@sales');
	/* ================== Users ================== */
	Route::resource(config('laraadmin.adminRoute') . '/users', 'LA\UsersController');
	Route::get(config('laraadmin.adminRoute') . '/user_dt_ajax', 'LA\UsersController@dtajax');
	Route::get(config('laraadmin.adminRoute') . '/user_dt_ajax', 'LA\UsersController@dtajax');
	Route::resource(config('laraadmin.adminRoute') . '/charities', 'LA\CharitiesController');
	Route::any(config('laraadmin.adminRoute') . '/charity/{id}/edit', 'LA\CharitiesController@edit');
	Route::any(config('laraadmin.adminRoute') . '/charity/approve/{id}/{is_approve}', 'LA\CharitiesController@approve');
	Route::get(config('laraadmin.adminRoute') . '/charity/delete/{id}', 'LA\CharitiesController@destroy');
	Route::get(config('laraadmin.adminRoute') . '/charity/archive', 'LA\CharitiesController@archive');
        Route::get(config('laraadmin.adminRoute') . '/charity/restore/{id}', 'LA\CharitiesController@restore');

        /* ================== Uploads ================== */
	Route::resource(config('laraadmin.adminRoute') . '/uploads', 'LA\UploadsController');
	Route::post(config('laraadmin.adminRoute') . '/upload_files', 'LA\UploadsController@upload_files');
	Route::get(config('laraadmin.adminRoute') . '/uploaded_files', 'LA\UploadsController@uploaded_files');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_caption', 'LA\UploadsController@update_caption');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_filename', 'LA\UploadsController@update_filename');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_public', 'LA\UploadsController@update_public');
	Route::post(config('laraadmin.adminRoute') . '/uploads_delete_file', 'LA\UploadsController@delete_file');
	
	/* ================== Roles ================== */
	Route::resource(config('laraadmin.adminRoute') . '/roles', 'LA\RolesController');
	Route::get(config('laraadmin.adminRoute') . '/role_dt_ajax', 'LA\RolesController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_module_role_permissions/{id}', 'LA\RolesController@save_module_role_permissions');
	
	/* ================== Permissions ================== */
	Route::resource(config('laraadmin.adminRoute') . '/permissions', 'LA\PermissionsController');
	Route::get(config('laraadmin.adminRoute') . '/permission_dt_ajax', 'LA\PermissionsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_permissions/{id}', 'LA\PermissionsController@save_permissions');
	
	/* ================== Departments ================== */
	Route::resource(config('laraadmin.adminRoute') . '/departments', 'LA\DepartmentsController');
	Route::get(config('laraadmin.adminRoute') . '/department_dt_ajax', 'LA\DepartmentsController@dtajax');
	
	/* ================== Employees ================== */
	Route::resource(config('laraadmin.adminRoute') . '/employees', 'LA\EmployeesController');
	Route::get(config('laraadmin.adminRoute') . '/employee_dt_ajax', 'LA\EmployeesController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/change_password/{id}', 'LA\EmployeesController@change_password');
	

	/* ================== Backups ================== */
	Route::resource(config('laraadmin.adminRoute') . '/backups', 'LA\BackupsController');
	Route::get(config('laraadmin.adminRoute') . '/backup_dt_ajax', 'LA\BackupsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/create_backup_ajax', 'LA\BackupsController@create_backup_ajax');
	Route::get(config('laraadmin.adminRoute') . '/downloadBackup/{id}', 'LA\BackupsController@downloadBackup');




	/* ================== Categories ================== */
	Route::resource(config('laraadmin.adminRoute') . '/categories', 'LA\CategoriesController');
	Route::get(config('laraadmin.adminRoute') . '/category_dt_ajax', 'LA\CategoriesController@dtajax');
	Route::get(config('laraadmin.adminRoute'). '/add-category', 'LA\CategoriesController@add_category');





        

	/* ================== Events ================== */
	Route::resource(config('laraadmin.adminRoute') . '/events', 'LA\EventsController');
	Route::get(config('laraadmin.adminRoute') . '/event_dt_ajax', 'LA\EventsController@dtajax');

	/* ================== Banners ================== */
	Route::resource(config('laraadmin.adminRoute') . '/banners', 'LA\BannersController');
	Route::get(config('laraadmin.adminRoute') . '/banner_dt_ajax', 'LA\BannersController@dtajax');

	/* ================== Contents ================== */
	Route::resource(config('laraadmin.adminRoute') . '/contents', 'LA\ContentsController');
	Route::get(config('laraadmin.adminRoute') . '/content_dt_ajax', 'LA\ContentsController@dtajax');

	/* ================== Faq_Categories ================== */
	Route::resource(config('laraadmin.adminRoute') . '/faq_categories', 'LA\Faq_CategoriesController');
	Route::get(config('laraadmin.adminRoute') . '/faq_category_dt_ajax', 'LA\Faq_CategoriesController@dtajax');

	/* ================== Faqs ================== */
	Route::resource(config('laraadmin.adminRoute') . '/faqs', 'LA\FaqsController');
	Route::get(config('laraadmin.adminRoute') . '/faq_dt_ajax', 'LA\FaqsController@dtajax');

	/* ================== Blogs ================== */
	Route::resource(config('laraadmin.adminRoute') . '/blogs', 'LA\BlogsController');
	Route::get(config('laraadmin.adminRoute') . '/blog_dt_ajax', 'LA\BlogsController@dtajax');

	/* ================== Email_Templates ================== */
	Route::resource(config('laraadmin.adminRoute') . '/email_templates', 'LA\Email_TemplatesController');
	Route::get(config('laraadmin.adminRoute') . '/email_template_dt_ajax', 'LA\Email_TemplatesController@dtajax');

	/* ================== Analytics ================== */
	Route::resource(config('laraadmin.adminRoute') . '/analytics', 'LA\AnalyticsController');
	Route::get(config('laraadmin.adminRoute') . '/analytic_dt_ajax', 'LA\AnalyticsController@dtajax');

	/* ================== SEO_Keywords ================== */
	Route::resource(config('laraadmin.adminRoute') . '/seo_keywords', 'LA\SEO_KeywordsController');
	Route::get(config('laraadmin.adminRoute') . '/seo_keyword_dt_ajax', 'LA\SEO_KeywordsController@dtajax');

	/* ================== Sitemaps ================== */
	Route::resource(config('laraadmin.adminRoute') . '/sitemaps', 'LA\SitemapsController');
	Route::get(config('laraadmin.adminRoute') . '/sitemap_dt_ajax', 'LA\SitemapsController@dtajax');

        
        
        

	/* ================== Donations ================== */
	Route::resource(config('laraadmin.adminRoute') . '/donations', 'LA\DonationsController');
	Route::get(config('laraadmin.adminRoute') . '/donation_dt_ajax', 'LA\DonationsController@dtajax');

	/* ================== Campaigns ================== */
	Route::resource(config('laraadmin.adminRoute') . '/campaigns', 'LA\CampaignsController');
	Route::get(config('laraadmin.adminRoute') . '/campaign_dt_ajax', 'LA\CampaignsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/campaign_filterajax', 'LA\CampaignsController@filterajax');
	/* ================== Review ================== */
        Route::resource(config('laraadmin.adminRoute') . '/reviews', 'LA\ReviewsController');
	Route::get(config('laraadmin.adminRoute') . '/review_dt_ajax', 'LA\ReviewsController@dtajax');
	/* ================== Testimonial ================== */
       Route::resource(config('laraadmin.adminRoute') . '/testimonials', 'LA\TestimonialsController');
       Route::get(config('laraadmin.adminRoute') . '/testimonial_dt_ajax', 'LA\TestimonialsController@dtajax');
       
       /* ================== Start_Project ================== */
       Route::resource(config('laraadmin.adminRoute') . '/start_projects', 'LA\Start_ProjectsController');
       Route::get(config('laraadmin.adminRoute') . '/start_project_dt_ajax', 'LA\Start_ProjectsController@dtajax');
       
        /* ================== Following ================== */
       Route::resource(config('laraadmin.adminRoute') . '/followings', 'LA\FollowingsController');
       Route::get(config('laraadmin.adminRoute') . '/following_dt_ajax', 'LA\FollowingsController@dtajax');
        /* ================== How IT Work ================== */
       Route::resource(config('laraadmin.adminRoute') . '/how_it_works', 'LA\How_It_WorksController');
       Route::get(config('laraadmin.adminRoute') . '/how_it_work_dt_ajax', 'LA\How_It_WorksController@dtajax');
       


	/* ================== Site_Settings ================== */
	Route::resource(config('laraadmin.adminRoute') . '/site_settings', 'LA\Site_SettingsController');
	Route::get(config('laraadmin.adminRoute') . '/site_setting_dt_ajax', 'LA\Site_SettingsController@dtajax');

	/* ================== Campaign_Photos ================== */
	Route::resource(config('laraadmin.adminRoute') . '/campaign_photos', 'LA\Campaign_PhotosController');
	Route::get(config('laraadmin.adminRoute') . '/campaign_photo_dt_ajax', 'LA\Campaign_PhotosController@dtajax');
        
        /* ==================News Letter ================== */
	Route::resource(config('laraadmin.adminRoute') . '/newsletters', 'LA\NewlettersController');
	Route::resource(config('laraadmin.adminRoute') . '/sendnewsletter', 'LA\NewlettersController@sendnewsletter');

	/* ================== Fundraisers ================== */
	Route::resource(config('laraadmin.adminRoute') . '/fundraisers', 'LA\FundraisersController');
	Route::get(config('laraadmin.adminRoute') . '/fundraiser_dt_ajax', 'LA\FundraisersController@dtajax');

	/* ================== Testing_modules ================== */
	Route::resource(config('laraadmin.adminRoute') . '/testing_modules', 'LA\Testing_modulesController');
	Route::get(config('laraadmin.adminRoute') . '/testing_module_dt_ajax', 'LA\Testing_modulesController@dtajax');


	Route::get(config('laraadmin.adminRoute') . '/aboutus','LA\About_UsController@index');
	Route::any(config('laraadmin.adminRoute') . '/aboutus_update/{id}','LA\About_UsController@update');

	/* ================== Products ================== */
	Route::resource(config('laraadmin.adminRoute') . '/products', 'LA\ProductsController');
	Route::get(config('laraadmin.adminRoute') . '/product_dt_ajax', 'LA\ProductsController@dtajax');

	/* ================== Services ================== */
	Route::resource(config('laraadmin.adminRoute') . '/services', 'LA\ServicesController');
	Route::get(config('laraadmin.adminRoute') . '/service_dt_ajax', 'LA\ServicesController@dtajax');

	/* ================== Service_Categories ================== */
	Route::resource(config('laraadmin.adminRoute') . '/service_categories', 'LA\Service_CategoriesController');
	Route::get(config('laraadmin.adminRoute') . '/service_category_dt_ajax', 'LA\Service_CategoriesController@dtajax');

});
