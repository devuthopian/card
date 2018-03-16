<?php

namespace App\Services;

//use Laravel\Socialite\Contracts\User as ProviderUser;
use App\LinkedSocialAccount;
use App\User;
use App\UserProfile;

use Auth;

class SocialAccountService
{
    public function findOrCreate($providerUser, $provider)
    {

        $account = LinkedSocialAccount::where('provider_name', $provider)
                   ->where('provider_id', $providerUser->getId())
                   ->first();

        if ($account) {
            return $account->user;
        } else {
            $user = User::where('email', $providerUser->getEmail())->first();

            if (empty($user->email)) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name'  => $providerUser->getName()
                ]);


                ### User Profile
                $userProfileObj = new UserProfile;
                $userProfileArr['user_id'] = $user->id;
                $userProfileArr['name'] = $user->name;
                $userProfileArr['profile_image'] = '';
                $userProfileArr['description'] = '';
                $userProfileArr['is_default'] = 1;
                $userResultObj = $userProfileObj->create($userProfileArr);


            }

            $user->accounts()->create([
                'provider_id'   => $providerUser->getId(),
                'name' => $providerUser->getName(),
                'provider_name' => $provider,
            ]);

            return $user;

        }
    }


    public function newConnection($providerUser, $provider){

        $account = LinkedSocialAccount::where('provider_name', $provider)
                   ->where('provider_id', $providerUser->getId())
                   ->first();

        $logged_user_id = Auth::id();



        if (empty($account)) {
            
            LinkedSocialAccount::create([
                'user_id' => $logged_user_id,
                'provider_id' => $providerUser->getId(),
                'name' => $providerUser->getNickName(),
                'provider_name' => $provider,
            ]);

        }

    }
}
