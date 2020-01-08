<?php

//Discord Login
Route::get('/oauth/discord', 'Auth\LoginController@redirectToProvider')->name('auth.discord');
Route::get('/oauth/discord/callback', 'Auth\LoginController@handleProviderCallback')->name('auth.discord.callback');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/private', function () {
    return view('privacy');
});
Auth::routes();

Route::group(['middleware' => 'auth'], function () {

	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('parama', 'PayseraGatewayController@Start')->name('icons');

	Route::post('/home/store', 'HomeController@finish')->name('homeReg');

	Route::get('orders', 'HomeController@orders')->name('orders');
	Route::get('orders/approved', 'HomeController@ordersA')->name('orders-done');
	Route::get('orders/denied', 'HomeController@ordersDe')->name('orders-deny');
	Route::get('service/create', 'HomeController@paslaugaC')->name('service-create');
	Route::post('service/store', 'HomeController@paslaugaS')->name('service-store');
	Route::get('service/list', 'HomeController@paslaugos')->name('service-list');
	Route::get('service/delete/{id}', 'HomeController@paslaugosD')->name('service-delete');
	Route::get('service/edit/{id}', 'HomeController@paslaugosE')->name('service-edit');
	Route::post('service/edit/update', 'HomeController@paslaugosES')->name('service-update');

});

//Donations
Route::post('/paysera/redirect', 'PayseraGatewayController@redirect')->name('paysera-redirect');
Route::get('/paysera/callback', 'PayseraGatewayController@callback')->name('paysera-callback');
Route::get('/paysera/sms', 'PayseraGatewayController@callback2')->name('paysera-callback2');
Route::get('/uzsakymas-pavyko', function () { return view('donate.accept'); });
Route::get('/uzsakymas-nepavyko', function () { return view('donate.cancel'); });


Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', 'HomeController@players')->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});



Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});