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
        dd($user);

        $authUser = $accountService->findOrCreate(
            $user,
            $provider
        );
        
        $result = auth()->login($authUser, true);
        return redirect('user/index');
    }
}
