<?php

namespace App\Services;

//use Laravel\Socialite\Contracts\User as ProviderUser;
use App\LinkedSocialAccount;
use App\User;
use App\UserProfile;

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
                'provider_name' => $provider,
            ]);

            return $user;

        }
    }
}
