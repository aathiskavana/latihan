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


Route::get('/', [
	'uses' 	=>	'ProductController@getIndex',
	'as'	=>	'shop.index'
]);

/*
	Cart
 */
Route::get('/add-to-cart/{id}', [
	'uses'	=>	'ProductController@getAddToCart', 
	'as'	=>	'product.AddToCart'
]);

Route::get('/shopping-cart', [
	'uses'	=>	'ProductController@getCart', 
	'as'	=>	'product.ShoppingCart'
]);

Route::get('/reduce/{id}', [
	'uses'	=>	'ProductController@getReduceByOne',
	'as'	=>	'product.getReduceByOne'
]);

Route::get('/remove/{id}', [
	'uses'	=>	'ProductController@getRemoveItem',
	'as'	=>	'product.RemoveItem'
]);

Route::get('/checkout', [
	'uses'	=>	'ProductController@getCheckout',
	'as'	=>	'checkout',
	'middleware' => 'auth'
]);

Route::post('/checkout', [
	'uses'	=>	'ProductController@postCheckout',
	'middleware' => 'auth'
]);



/*
	User
 */
Route::group(['prefix' => 'user'], function() {
	Route::group(['middleware' => 'guest'], function() {
	   Route::get('/signup', [
	   'uses' => 'UserController@getSignup',
	   'as'	=> 'user.signup'
	   ]);

	   Route::post('/signup', [
	   'uses' => 'UserController@postSignup',
	   ]);

	   Route::get('/signin', [
	   'uses' => 'UserController@getSignin',
	   'as'	=>	'user.signin'
	   ]);

	   Route::post('/signin', [
	   'uses' => 'UserController@postSignin',
	   ]);
	});
	
	Route::group(['middleware' => 'auth'], function() {
		Route::get('/profile', [
		'uses'	=>	'UserController@getProfile',
		'as'	=>	'user.profile'
		]);

		Route::get('/logout', [
		'uses'	=>	'UserController@getLogout',
		'as'	=>	'user.logout'
		]);
	});
	
});