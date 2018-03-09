<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Socialite;

use App\Services\SocialAccountService;

class SocialAccountController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider(Request $request, $provider)
    {
    	$request->session()->put('socialLoginUserId',$request->id);
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
    	$socialLoginUserId = $request->session()->get('socialLoginUserId');

        try {
            $user = Socialite::with($provider)->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }

        $authUser = $accountService->findOrCreate(
        	$socialLoginUserId,
            $user,
            $provider
        );

        auth()->login($authUser, true);

        return redirect()->to('/home');
    }
}
