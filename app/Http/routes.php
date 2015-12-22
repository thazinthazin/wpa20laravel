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
// */

Route::get('test', function(){
	return View::make('test');
});




// SHOP VIEW ROUTE
Route::group(['middleware' => ['redirectAdmin']], function(){

	Route::get('/', ['as' => 'home', 'uses' => function(){
		return view('ecomm.shop.pages.home');
	}]);
	Route::get('/about', ['as' => 'about', 'uses' => function(){
		return view('ecomm.shop.pages.about');
	}]);

	Route::get('/shop', 				['as' => 'shop_home' ,			'uses' => 'ShopController@index']);
	Route::get('/shop/product/{id}',	['as' => 'shop_product_show' ,	'uses' => 'ShopController@show' ]);
	Route::post('shop/addreview/{id}', 	['as' => 'shop_addreview', 			'uses'=> 'ShopController@addReview']);
	Route::get('/categories', 			['as' => 'shop_categories', 'uses' => 'ShopController@getCategory']);
	Route::get('/categories/{id}',		['as' => 'shop_categories_show', 'uses' => 'ShopController@showCategory'])->where('id', '[1-9][0-9]*');
	Route::get('/categories/sub-categories/{id}', ['as' => 'shop_subcategories_show', 'uses' => 'ShopController@showSubCategory']);
	Route::get('/contact', ['as' => 'shop_contact', 'uses'=>'ContactController@showForm']);
	Route::post('/contact', ['as' => 'shop_post_contact', 'uses' => 'ContactController@sendContactInfo']);
	// Product Search
	Route::get('/shop/search', ['as'=>'shop_search', 'uses'=> 'ShopController@getResults']);

	// Social Login
	Route::get('social/{provider}', ['as' => 'social_login', 'uses' => 'SocialController@redirectToProvider']);
	Route::get('social/{provider}/callback', 'SocialController@handleProviderCallback');

	//CUSTOMER PANEL ROUTE
	Route::get('/customer/login',	['as' => 'customer_login' , 'uses' => 'CustomerController@getLogin']);
	Route::post('/customer/login',	['as' => 'customer_post_login', 'uses' => 'CustomerController@postLogin']);
	Route::get('/customer/register',	['as' => 'customer_create', 'uses' => 'CustomerController@getCreate']);

	Route::group(['middleware' => 'senuser'], function(){
	Route::put('/customer/profile/{id}', ['as' => 'customer_profile_update', 'uses' => 'CustomerController@profileUpdate']);  
	Route::get('/customer/logout',	['as' => 'customer_logout', 'uses' => 'CustomerController@getLogout']);
	resource('/customer', 'CustomerController' , ['except' => array('show', 'create', 'destroy')]);


	Route::group(['prefix' => '/customer/my'], function(){
		Route::post('/cart/add/{productId}', 		['as' => 'cart_add', 'uses' => 'CartController@postAddToCart']);
		Route::put('/cart/update/{id}/{productId}',	['as' => 'cart_update', 'uses' => 'CartController@postUpdateCart'])->where('id', '[1-9][0-9]*');		
		Route::get('/cart', 			['as' => 'cart_show' , 'uses' => 'CartController@getIndex']);
		Route::delete('/cart/delete/{id}', ['as' => 'cart_delete', 'uses' => 'CartController@postDelete']);
		Route::post('/order/add', 			['as' => 'order_add', 'uses' => 'OrderController@postOrder']);
		Route::get('/order', 		['as' => 'order_show', 'uses' => 'OrderController@getIndex']);
		Route::get('/wishlist', 		['as'=> 'wishlist_show', 'uses' => 'WishlistController@getIndex']);
		Route::post('/wishlist/add/{productId}', ['as' => 'wishlist_add', 'uses' => 'WishlistController@postAddToWishlist']);
		Route::delete('/wishlist/delete/{id}', ['as' => 'wishlist_delete', 'uses' => 'WishlistController@getDelete']);
	});

	});

});

//ADMIN PANEL ROUTE
Route::group(['prefix' => 'admin/backend'], function(){
	Route::get('login',	['as' => 'admin_login' , 'uses' => 'Admin\AdminController@getLogin']);
	Route::post('login',	['as' => 'admin_post_login' , 'uses' => 'Admin\AdminController@postLogin']);
	
});

Route::group(['middleware' => ['senauth', 'onlyAdmin']], function(){
	Route::get('admin/dashboard',		['as' => 'admin_home', 'uses' => 'Admin\AdminController@index']);
	Route::get('admin/users', ['as' => 'admin_user', 'uses' => 'Admin\AdminController@getUser']);
	Route::delete('admin/user/delete/{id}', ['as' => 'admin_user_delete', 'uses' => 'Admin\AdminController@getDelete']);
	Route::get('admin/orders', ['as' => 'admin_order', 'uses' => 'Admin\AdminController@getOrder']);
	Route::get('admin/messages', ['as' => 'admin_message', 'uses' => 'Admin\AdminController@getMessage']); 
	Route::put('admin/messages/update/{id}', ['as' => 'admin_message_update', 'uses' => 'Admin\AdminController@postUpdateMessage']);

	resource('admin/categories', 'Admin\CategoryController', ['except' => 'show']);
	resource('admin/subcategories', 'Admin\SubCategoryController', ['only' => array('store', 'update', 'destroy')]);
	resource('admin/products', 'Admin\ProductController');
	Route::put('admin/products/avail/{id}', ['as' => 'admin.products.avail' , 'uses' => 'Admin\ProductController@postAvaChange']);
	Route::put('admin/products/instock/{id}', ['as' => 'admin.products.instock' , 'uses' => 'Admin\ProductController@postInstockChange']);
	Route::get('/admin/upload', ['as' => 'admin_upload', 'uses' => 'UploadController@index']);
	Route::post('admin/upload/file', ['as' => 'admin_upload_file', 'uses' => 'UploadController@uploadFile']);
	Route::delete('admin/upload/file', ['as' => 'admin_upload_deletefile', 'uses' => 'UploadController@deleteFile']);
	Route::post('admin/upload/folder', ['as' => 'admin_upload_folder', 'uses' => 'UploadController@createFolder']);
	Route::delete('admin/upload/folder', ['as' => 'admin_upload_deletefolder', 'uses' => 'UploadController@deleteFolder']);	
	Route::get('admin/logout',['as' => 'admin_logout', 'uses' => 'Admin\AdminController@getLogout']);
	Route::get('/ajax-subcat', function(){
		
		$cat_id = Input::get('cat_id');	

		$subcategories = App\SubCategory::where('category_id', '=' , $cat_id)->get();

		return Response::json($subcategories);
	});
});