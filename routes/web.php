<?php
Route::get('/home', 'SiteController@index');
Route::get('user/login', 'UserController@getLogin');
Route::post('user/login', 'UserController@postLogin')->name('user.login');
Route::get('user/register', 'UserController@getRegister');
Route::post('user/register', 'UserController@postRegister');
Route::get('/auth/{provider}', 'SocialAuthController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'SocialAuthController@handleProviderCallback');
Route::get('user/logout', 'UserController@logout');

Route::group(['prefix' => 'admin', 'middleware' => 'adminmiddleware'], function () {

	Route::get('/', 'MotelController@getList');

	Route::group(['prefix' => 'category'], function () {
		Route::get('list', 'CategoryController@getList');

		Route::get('add', 'CategoryController@getAdd');
		Route::post('add', 'CategoryController@postAdd');

		Route::get('edit/{id}', 'CategoryController@getEdit');
		Route::post('edit/{id}', 'CategoryController@postEdit');

		Route::get('enable/{id}', 'CategoryController@enable');
		Route::get('disable/{id}', 'CategoryController@disable');
	});

	Route::group(['prefix' => 'convenient'], function () {
		Route::get('list', 'ConvenientController@getList');

		Route::get('add', 'ConvenientController@getAdd');
		Route::post('add', 'ConvenientController@postAdd');

		Route::get('edit/{id}', 'ConvenientController@getEdit');
		Route::post('edit/{id}', 'ConvenientController@postEdit');
	});

	Route::group(['prefix' => 'province'], function () {
		Route::get('list', 'ProvinceController@getList');

		Route::get('add', 'ProvinceController@getAdd');
		Route::post('add', 'ProvinceController@postAdd');

		Route::get('edit/{id}', 'ProvinceController@getEdit');
		Route::post('edit/{id}', 'ProvinceController@postEdit');

		Route::get('delete/{id}', 'ProvinceController@delete');
		Route::get('view/{id}', 'ProvinceController@view');
	});

	Route::group(['prefix' => 'district'], function () {
		Route::get('list', 'DistrictController@getList');

		Route::get('add', 'DistrictController@getAdd');
		Route::post('add', 'DistrictController@postAdd');

		Route::get('edit/{id}', 'DistrictController@getEdit');
		Route::post('edit/{id}', 'DistrictController@postEdit');
		Route::get('delete/{id}', 'DistrictController@delete');
	});

	Route::group(['prefix' => 'user'], function () {
		Route::get('list', 'UserController@getList');
		Route::get('enable/{id}', 'UserController@enable');
		Route::get('disable/{id}', 'UserController@disable');
		Route::get('delete/{id}', 'UserController@delete');
	});

	Route::group(['prefix' => 'motel'], function () {
		Route::get('list', 'MotelController@getList');
		Route::get('delete/{id}', 'MotelController@delete');
		Route::get('enable/{id}', 'MotelController@enable');
		Route::get('disable/{id}', 'MotelController@disable');
	});
});

Route::group(['prefix' => '/'], function () {
	Route::get('', 'SiteController@category');
	Route::post('searchmotel', 'MotelController@SearchMotelAjax');
	Route::post('searchajax', 'MotelController@SearchlAjax');
	Route::post('searchprovince', 'DistrictController@ProvinceAjax');
	Route::get('trang-chu.html', 'SiteController@trangchu');
	Route::get('tim-quanh-day.html', 'MotelController@timquanhday');
	Route::post('kqtimquanhday', 'MotelController@kqtimquanhday');
	Route::get('{slug}.html', 'SiteController@category');
	Route::get('{slug}/{motel}.html', 'SiteController@detail');
});

Route::group(['prefix' => 'user', 'middleware' => 'usermiddleware'], function () {
	Route::get('', 'UserController@getProfile');
	Route::group(['prefix' => 'motel'], function () {
		Route::get('add', 'MotelController@getAdd');
		Route::post('add', 'MotelController@postAdd');
		Route::get('edit/{id}', 'MotelController@getEdit');
		Route::post('edit/{id}', 'MotelController@postEdit');
		Route::get('enable/{id}', 'MotelController@enable2');
		Route::get('disable/{id}', 'MotelController@disable2');
	});
	Route::get('post', 'PostController@getAdd');
	Route::post('post', 'PostController@postPost');
	Route::get('profile', 'UserController@getProfile');
	Route::get('profile/edit', 'UserController@getEditprofile');
	Route::post('profile/edit', 'UserController@postEditprofile');
});
