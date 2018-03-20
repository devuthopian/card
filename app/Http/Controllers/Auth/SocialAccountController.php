<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Socialite;

use App\Services\SocialAccountService;

use App\ConnectionSetting;

class SocialAccountController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider(Request $request, $provider)
    {

        #### GET API Settings
        $connectionSettingObj = new ConnectionSetting;
        $settingsArr = $connectionSettingObj->where('group_name', $provider)->pluck('setting_value', 'setting_name')->toArray();


        switch($provider){
            #### Facebook
            case 'facebook':
                Socialite::extend('facebook', function ($app) use ($settingsArr) {
                    return Socialite::buildProvider(\Laravel\Socialite\Two\FacebookProvider::class, $settingsArr);
                });
            break;
            #### Twitter
            case 'twitter':
                config(['services.twitter.client_id' => $settingsArr['client_id']]);
                config(['services.twitter.client_secret' => $settingsArr['client_secret']]);
                config(['services.twitter.redirect' => $settingsArr['redirect']]);
            break;
            #### Google
            case 'google':
                Socialite::extend('google', function ($app) use ($settingsArr) {
                    return Socialite::buildProvider(\Laravel\Socialite\Two\GoogleProvider::class, $settingsArr);
                });
            break;

        }

        return Socialite::driver($provider)->redirect();
    }

    
    /**
     * Obtain the user information
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request, $provider)
    {

        #### GET API Settings
    	$accountService = new SocialAccountService;
        $connectionSettingObj = new ConnectionSetting;
        $settingsArr = $connectionSettingObj->where('group_name', $provider)->pluck('setting_value', 'setting_name')->toArray();

        switch($provider){
            #### Facebook
            case 'facebook':
                Socialite::extend('facebook', function ($app) use ($settingsArr) {
                    return Socialite::buildProvider(\Laravel\Socialite\Two\FacebookProvider::class, $settingsArr);
                });
            break;
            #### Twitter
            case 'twitter':
                config(['services.twitter.client_id' => $settingsArr['client_id']]);
                config(['services.twitter.client_secret' => $settingsArr['client_secret']]);
                config(['services.twitter.redirect' => $settingsArr['redirect']]);
            break;
            #### Google
            case 'google':
                Socialite::extend('google', function ($app) use ($settingsArr) {
                    return Socialite::buildProvider(\Laravel\Socialite\Two\GoogleProvider::class, $settingsArr);
                });
            break;
        }



        #### get user Info and save
        try {
            $user = Socialite::with($provider)->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
        
        if(empty(Auth::id())){
            $authUser = $accountService->findOrCreate(
                $user,
                $provider
            );
            
            $result = auth()->login($authUser, true);
            return redirect('user/index');
        }else{
            
            $accountService->newConnection(
                $user,
                $provider
            );

            return redirect('user/profile/settingsCallback');
        }
    }
}
