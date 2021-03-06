<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserProfile;
use App\TypeName;
use App\TierName;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $userResultObj = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);


        $userProfileObj = new UserProfile;
        $userProfileArr['user_id'] = $userResultObj->id;
        $userProfileArr['name'] = $userResultObj->name;
        $userProfileArr['is_default'] = 1;
        $userProfileArr['profile_image'] = '';
        $userProfileArr['description'] = '';

        $userProfileResultObj = $userProfileObj->create($userProfileArr);

        
        ### Save Default Type and Tier Name
        $profile_id = $userProfileResultObj->id;
        
        $typeNameObj = new TypeName;
        $typeNameObj->saveDefaultTypeNames($profile_id);


        $tierNameObj = new TierName;
        $tierNameObj->saveDefaultTierNames($profile_id);

        return $userResultObj;

    }
}
