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

Route::get('/', 'ProductController@index')->name('products.index');

Route::get('/product/{subCat}/{mainCat?}', 'ProductController@getProduct')->name('products.product');



Route::group(['prefix' => 'user'], function() {
    
	Route::get('/signup', 'UserController@signup')->name('user.signup');
	Route::post('/signup', 'UserController@signupValidate')->name('user.signup');

	Route::get('/signin', 'UserController@signin')->name('user.signin');
	Route::post('/signin', 'UserController@signinValidate')->name('user.signin');


	Route::group(['middleware' => 'auth'], function() {	

		Route::get('/profile', 'UserController@profile')->name('user.profile');

		Route::get('/logout', 'UserController@logout')->name('user.logout');
	  
	});

});

	Route::group(['middleware' => 'auth'], function() {
	    
		Route::get('/add-to-cart/{id}', 'CartController@addToShoppingCart')->name('cart.add');

		Route::get('/update-product/{id}', 'CartController@updateProduct')->name('cart.update');

		Route::get('/remove-product/{id}', 'CartController@removeProduct')->name('cart.remove');

		Route::get('/shopping-cart', 'CartController@shoppingCart')->name('cart.show');

		Route::get('/checkout', 'CartController@checkout')->name('cart.checkout');
		Route::post('/checkout', 'CartController@checkoutValidate')->name('cart.checkout');  

	});
	
Route::get('/contactus', function(){
	return view('contactus');
})->name('contactus');

Route::get('/about', function(){
	return view('about');
})->name('about');