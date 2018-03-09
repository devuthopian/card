<?php

namespace App\Services;

//use Laravel\Socialite\Contracts\User as ProviderUser;
use App\LinkedSocialAccount;
use App\User;

class SocialAccountService
{
    public function findOrCreate($socialLoginUserId, $providerUser, $provider)
    {

        $account = LinkedSocialAccount::where('provider_name', $provider)
                   ->where('provider_id', $providerUser->getId())
                   ->first();



        if ($account) {
            return $account->user;
        } else {
            $user = User::where('email', $providerUser->getEmail())->first();

            if (! $user) {
                $user = User::where('id', $socialLoginUserId)->update([  
                    'email' => $providerUser->getEmail()
                    /*'name'  => $providerUser->getName(),*/
                ]);
            }

            $user->accounts()->create([
                'provider_id'   => $providerUser->getId(),
                'provider_name' => $provider,
            ]);

            return $user;

        }
    }
}
