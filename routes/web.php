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
	return redirect('login');
});

Route::get('/share/{invitation_hash}', 'InviteController@index');
Route::get('auth/{provider}/callback', 'Auth\SocialAccountController@handleProviderCallback');

Route::get('viewcard',['as' => 'card.view','uses' => 'users\ProfilesController@viewcard']);

Route::group(['middleware' => ['guest']], function () {
	Route::get('/configureUserInfo/{user}', 'InviteController@configureUserInfo');
	Route::post('/configureUserInfo/{user}', 'InviteController@configureUserInfo');
	Route::post('/registerName/{invitation_id}', 'InviteController@registerName');

	// Social Login
	Route::get('auth/{provider}', 'Auth\SocialAccountController@redirectToProvider');
	
});

Auth::routes();

## User panel Area
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
	Route::post('/user/profile/resetCoverImage', 'users\ProfilesController@resetCoverImage');
	Route::post('/user/profile/resetProfileImage', 'users\ProfilesController@resetProfileImage');
	Route::post('/user/profile/resetProfileBackground', 'users\ProfilesController@resetProfileBackground');

	

	// Settings
	//Route::get('/user/profile/settings', 'users\ProfilesController@settings');
	Route::match(['get', 'post'], '/user/profile/settings', 'users\ProfilesController@settings');
	Route::get('/user/profile/settingsCallback', 'users\ProfilesController@settingsCallback');

	
	// Tracking and Tracker
	Route::get('/user/profile/tracking', 'users\ProfilesController@tracking');
	Route::get('/user/profile/tracking2', 'users\ProfilesController@tracking2');
	Route::get('/user/profile/tracker', 'users\ProfilesController@tracker');


	// Card
	Route::post('/user/card/release', 'users\CardsController@release');
	Route::post('/user/card/remove', 'users\CardsController@remove');
	Route::post('/user/card/add', 'users\CardsController@add');
	Route::get('/user/card/{card}', 'users\CardsController@edit');
	Route::post('/user/card/uploadCardImage', 'users\CardsController@uploadCardImage');
	Route::post('/user/card/cropCardImage', 'users\CardsController@cropCardImage');

	// Card End
	Route::get('/user/profile/editCard', 'users\ProfilesController@editCard');

	Route::get('/card', 'CardController@index')->name('card');
	Route::get('/directory', 'CardController@viewdirectory')->name('directory');
	Route::post('/edit/card/{id}', 'CardController@edit');


	Route::post('/card/save', 'CardController@store');
	Route::post('/card/update/{id}', 'CardController@update');
	Route::get('/card/delete/{id}', 'CardController@destroy');

	Route::post('/sendInvitation', 'InviteController@sendInvitation');

	// Mobile Verification
	Route::post('/user/mobile_verification/sendOTP', 'users\MobileVerificationsController@sendOTP');
	Route::post('/user/mobile_verification/verifyOTP', 'users\MobileVerificationsController@verifyOTP');

	// Type Names
	Route::post('/user/typeNames/save', 'users\TypeNamesController@save');

	// Tier Names
	Route::post('/user/tierNames/save', 'users\TierNamesController@save');


	// Linked to Social Accounts
	Route::get('user/social_accounts/{provider}', 'users\LinkedSocialAccountsController@redirectToProvider');
	Route::get('user/social_accounts/{provider}/callback', 'users\LinkedSocialAccountsController@handleProviderCallback');
});


// Admin Routes
Route::prefix('admin')->group(function() {
	Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

	Route::group(['middleware' => ['web']], function () {
		Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
		
		// Users
		Route::get('users/manage', 'Admin\UsersController@index')->name('admin.user.manage');
		Route::post('/user/approve', 'Admin\UsersController@approve')->name('admin.user.approve');

		// Notes
		Route::get('notes', 'Admin\NotesController@index')->name('admin.notes');
		Route::post('notes/add', 'Admin\NotesController@add')->name('admin.notes.add');
		Route::get('note/{note}', 'Admin\NotesController@get')->name('admin.notes.get');
		
		// Connections
		Route::get('connections', 'Admin\ConnectionsController@index')->name('admin.connections');
		Route::post('connections/update', 'Admin\ConnectionsController@update')->name('admin.connections.update');
		//Route::get('note/{note}', 'Admin\NotesController@get')->name('admin.notes.get');

		Route::post('/logout', 'AdminController@logout')->name('admin.logout');
	});
});