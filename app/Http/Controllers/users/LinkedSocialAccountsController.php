<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Socialite;

use App\Services\SocialAccountService;

use App\ConnectionSetting;

class LinkedSocialAccountsController extends Controller
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

        if($provider=='youtube'){
            $settingsArr = $connectionSettingObj->where('group_name', 'google')->pluck('setting_value', 'setting_name')->toArray();
        }else{
            $settingsArr = $connectionSettingObj->where('group_name', $provider)->pluck('setting_value', 'setting_name')->toArray();
        }

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
            ### Youtube
            case 'youtube':
                config(['services.youtube.client_id' => $settingsArr['client_id']]);
                config(['services.youtube.client_secret' => $settingsArr['client_secret']]);
                config(['services.youtube.redirect' => $settingsArr['redirect']]);
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
        
        if($provider=='youtube'){
            $settingsArr = $connectionSettingObj->where('group_name', 'google')->pluck('setting_value', 'setting_name')->toArray();
        }else{
            $settingsArr = $connectionSettingObj->where('group_name', $provider)->pluck('setting_value', 'setting_name')->toArray();
        }


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
            ### Youtube
            case 'youtube':
                config(['services.youtube.client_id' => $settingsArr['client_id']]);
                config(['services.youtube.client_secret' => $settingsArr['client_secret']]);
                config(['services.youtube.redirect' => $settingsArr['redirect']]);
            break;
        }


        try {
            $user = Socialite::with($provider)->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
        

        $accountService->newConnection(
            $user,
            $provider
        );
        
        return redirect('user/profile/settingsCallback');
    }
}
