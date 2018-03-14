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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/share', 'InviteController@index');

Route::group(['middleware' => ['guest']], function () {
	Route::get('/configureUserInfo/{user}', 'InviteController@configureUserInfo');
	Route::post('/configureUserInfo/{user}', 'InviteController@configureUserInfo');
	Route::post('/registerName/{invitation_id}', 'InviteController@registerName');

	// Social Login
	Route::get('auth/{provider}', 'Auth\SocialAccountController@redirectToProvider');
	Route::get('auth/{provider}/callback', 'Auth\SocialAccountController@handleProviderCallback');
});

Auth::routes();

## I user panel
Route::group(['middleware' => ['web']], function () {

	Route::get('/user/dashboard', 'users\CardsController@dashboard');

	// Profiles
	Route::post('/user/addProfile', 'users\ProfilesController@addProfile');
	Route::post('/user/editProfile', 'users\ProfilesController@editProfile');
	Route::post('/user/profile/remove', 'users\ProfilesController@removeProfile');
	Route::post('/user/profile/setDefault', 'users\ProfilesController@setDefault');
	Route::get('/user/profile/myProfiles', 'users\ProfilesController@myProfiles');
    Route::get('/user/index/{profile?}', 'users\ProfilesController@index');
	Route::post('/user/profile/generateInviteUrl', 'users\ProfilesController@generateInviteUrl');
	Route::post('/user/profile/updateNeverExpireInviteUrl', 'users\ProfilesController@updateNeverExpireInviteUrl');

	// Settings
	//Route::get('/user/profile/settings', 'users\ProfilesController@settings');
	Route::match(['get', 'post'], '/user/profile/settings', 'users\ProfilesController@settings');

	// Tracking and Tracker
	Route::get('/user/profile/tracking', 'users\ProfilesController@tracking');
	Route::get('/user/profile/tracking2', 'users\ProfilesController@tracking2');
	Route::get('/user/profile/tracker', 'users\ProfilesController@tracker');



	// Card
	Route::post('/user/card/release', 'users\CardsController@release');
	Route::post('/user/card/remove', 'users\CardsController@remove');
	Route::post('/user/card/add', 'users\CardsController@add');
	Route::get('/user/card/{card}', 'users\CardsController@edit');
	// Card End



	Route::get('/card', 'CardController@index')->name('card');
	Route::get('/directory', 'CardController@viewdirectory')->name('directory');
	Route::post('/edit/card/{id}', 'CardController@edit');


	Route::post('/card/save', 'CardController@store');
	Route::post('/card/update/{id}', 'CardController@update');
	Route::get('/card/delete/{id}', 'CardController@destroy');

	Route::post('/sendInvitation', 'InviteController@sendInvitation');
});
