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
Auth::routes();
//User 認証不要

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/item/', 'ItemController@index')->name('item.index');
Route::get('/item/detail/{id}', 'ItemController@detail')->name('item.detail');
Route::get('/login/twitter', 'Auth\OAuthLoginController@redirectToProvider')->name('twitter.login');
Route::get('/login/twitter/callback', 'Auth\OAuthLoginController@handleProviderCallback')->name('twitter.callback');
Route::get('auth/twitter/logout', 'TwitterController@logout');
Route::get('password/resetForm', 'ResetPasswordController@resetForm')->name('password.resetForm');
Route::post('password/confirm', 'ResetPasswordController@sendResetUrl')->name('password.sendResetUrl');
Route::get('password/{id}', 'ResetPasswordController@newPassForm');
Route::post('password/update', 'ResetPasswordController@passRevision')->name('password.passrevision');

//twitter ex routes
Route::get('tweetSearch', 'TwitterController@searchForm')->name('twitter.form');
Route::get('twitter', 'TwitterController@index')->name('twitter.searchResult');


//facebook messenger bot route
//Route::get('facebook_messenger_api', 'MessengerController@index')->middleware('verify');
//Route::post('facebook_messenger_api', 'MessengerController@index');


Route::group(['middleware' => 'auth:user'], function() {
	Route::post('cart/store', 'CartsController@store')->name('cart.store');
	Route::get('cart', 'CartsController@index')->name('cart.index');
	Route::get('cart/remove/{id}', 'CartsController@remove')->name('cart.remove');
	Route::get('delivery_adress', 'Delivery_Adress_InfoController@index')->name('adress.index');
	Route::get('delivery_adress/registerForm', 'Delivery_Adress_InfoController@registerForm')->name('adress.registerForm');
	Route::post('delivery_adress/register', 'Delivery_Adress_InfoController@register')->name('adress.register');
	Route::get('delivery_adress/editForm/{id}', 'Delivery_Adress_InfoController@editForm')->name('adress.editForm');
	Route::post('delivery_adress/edit/{id}', 'Delivery_Adress_InfoController@edit')->name('adress.edit');
	Route::get('delivery_adress/deleteForm/{id}', 'Delivery_Adress_InfoController@deleteForm')->name('adress.deleteForm');
	Route::post('delivery_adress/delete/{id}', 'Delivery_Adress_InfoController@delete')->name('adress.delete');
	Route::get('mypage', 'MyPageEditController@mypageForm')->name('mypage.form');
	Route::post('mypage/update', 'MyPageEditController@mypageUpdate')->name('mypage.update');
	Route::post('mypage/edit', 'MyPageEditController@mypageEdit')->name('mypage.edit');
	Route::get('mypage/authorize/{token}', 'MyPageEditController@authorizeMail')->name('mypage.authorize');
});

//admin
Route::group(['prefix' => 'admin'], function() {
	Route::get('/', function() {return redirect('/admin/home'); });
	Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'Admin\LoginController@login');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
	Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');
	Route::get('home', 'Admin\HomeController@index')->name('admin.home');
	Route::get('home/detail/{id}', 'Admin\ItemController@detail')->name('admin.detail');
	Route::get('add', 'Admin\ItemController@showAddForm')->name('admin.add');
	Route::post('add', 'Admin\ItemController@add')->name('admin.add_post');
	Route::get('edit', 'Admin\ItemController@showEditForm')->name('admin.edit');
	Route::post('edit', 'Admin\ItemController@edit')->name('admin.edit_post');
	Route::get('member_index', 'Admin\Member_IndexController@index')->name('admin.member_index');
	Route::get('member_detail/{id}', 'Admin\Member_IndexController@detail')->name('admin.member_detail');
});

