<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Socialite;

use App\Services\SocialAccountService;

use App\UserProfile;

class SocialAccountController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider(Request $request, $provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    /**
     * Obtain the user information
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request, $provider)
    {
    	$accountService = new SocialAccountService;

        try {
            $user = Socialite::with($provider)->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }

        $authUser = $accountService->findOrCreate(
            $user,
            $provider
        );

        ### User Profile
        $userProfileObj = new UserProfile;
        $userProfileArr['user_id'] = $authUser->id;
        $userProfileArr['name'] = $authUser->name;
        $userProfileArr['profile_image'] = '';
        $userProfileArr['description'] = '';
        $userProfileArr['is_default'] = 1;
        $userResultObj = $userProfileObj->create($userProfileArr);

        
        $result = auth()->login($authUser, true);
        return redirect('user/index');
    }
}