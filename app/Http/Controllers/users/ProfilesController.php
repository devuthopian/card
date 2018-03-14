<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Auth;
use Validator;
use Carbon\Carbon;

use App\User;
use App\Card;
use App\UserProfile;
use App\Invitation;

class ProfilesController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, UserProfile $profile) {
        $logged_user_id = Auth::id();
        ### Default profile id
        $userProfileObj = new UserProfile;
        $default_profile_id = $userProfileObj->getDefaultProfile($logged_user_id);

        if(empty($profile->id)){
            return redirect('user/index/'.$default_profile_id);
        }

        $profile_id = $profile->id;

        $cardObj = new Card;
        $cardsObj = $cardObj->where('user_profile_id', $profile_id)
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);

        $data['profile'] = $profile;
        $data['cardsObj'] = $cardsObj;
        return view('users.profile.index', $data);
    }


    public function editProfile(Request $request){

    	$this->validate($request, [
	    	'profile_image' => 'mimes:jpeg,bmp,png', //only allow this type extension file.
		]);

    	$userObj = new User;
    	$profileImageObj = $request->file('profile_image');
    	$requestArr = $request->all();
    	$logged_user_id = Auth::id();
    	$resultArr = $userObj->updateProfile($requestArr, $profileImageObj);
    	
    	if(!empty($resultArr)){
    		return redirect('user/index/'.$requestArr['profile_id']);
    	}
    }


    public function generateInviteUrl(Request $request){
        
        $profile_id = $request->profile_id;
        $invitationObj = new Invitation;
        $invitationResultObj = $invitationObj->where('profile_id', $profile_id)->orderBy('id','DESC')->first();
        
        $invitationSaveArr['profile_id'] = $profile_id;
        $invitationSaveArr['never_expire'] = 1;

        if(!empty($invitationResultObj)){
            $invitationSaveArr['unique_id'] = ($invitationResultObj->unique_id+1);
        }else{
            $invitationSaveArr['unique_id'] = 1;
        }

        $resultArr = $invitationObj->create($invitationSaveArr);


        ### response
        return response()->json(array(
                    'code' => 1, 
                    'message' => 'Invitation link generated successfully.',
                    'data' => $resultArr
                    )
                );

    }


    public function updateNeverExpireInviteUrl(Request $request){
        $invitationObj = new Invitation;
        $invitation_id = $request->invitation_id;
        $resultArr = $invitationObj->updateNeverExpireInviteUrl($invitation_id);

        ### response
        return response()->json($resultArr);
    }

    ### My Profiles
    public function myProfiles(Request $request){
        $userObj = new User;
        $logged_user_id = Auth::id();
        $data['userDetailsObj'] = $userObj->where('id', $logged_user_id)->first();
        return view('users.profile.myProfiles', $data);
    }



    public function addProfile(Request $request){
        $this->validate($request, [
            'profile_image' => 'mimes:jpeg,bmp,png', //only allow this type extension file.
        ]);

        $userObj = new User;
        $profileImageObj = $request->file('profile_image');
        $requestArr = $request->all();
        $logged_user_id = Auth::id();
        $resultArr = $userObj->createProfile($logged_user_id, $requestArr, $profileImageObj);
        
        if(!empty($resultArr)){
            return redirect('user/profile/myProfiles');
        }
    }


    public function removeProfile(Request $request){
        $requestArr = $request->all();
        $userProfileObj = new UserProfile;
        $result = $userProfileObj->remove($requestArr);

        if(!empty($result)){
            ### response
            return response()->json(array(
                    'code' => 1, 
                    'message' => 'Profile has been removed successfully.',
                    'data' => array()
                    )
                );
        } else {
            ### response
            return response()->json(array(
                    'code' => 0, 
                    'message' => 'Error in removing profile.',
                    'data' => array()
                    )
                );
        }
    }



    public function setDefault(Request $request){
        $logged_user_id = Auth::id();
        $requestArr = $request->all();
        $userProfileObj = new UserProfile;
        $result = $userProfileObj->setDefaultProfile($logged_user_id, $requestArr);

        if(!empty($result)){
            ### response
            return response()->json(array(
                    'code' => 1, 
                    'message' => 'Profile has been set as default successfully.',
                    'data' => array()
                    )
                );
        } else {
            ### response
            return response()->json(array(
                    'code' => 0, 
                    'message' => 'Error in set profile as default.',
                    'data' => array()
                    )
                );
        }
    }

    // Tracking
    public function tracking(Request $request){
        $logged_user_id = Auth::id();
        $userObj = new User;
        $data['userResultObj'] = $userObj->where('id', $logged_user_id)->first();
        return view('users.profile.tracking2', $data);
    }

    // Tracking
    public function tracking2(Request $request){
        $logged_user_id = Auth::id();
        $userObj = new User;
        $data['userResultObj'] = $userObj->where('id', $logged_user_id)->first();
        return view('users.profile.tracking', $data);
    }

    // Tracker
    public function tracker(){
        $logged_user_id = Auth::id();
        $userObj = new User;
        $data['userDetailsObj'] = $userObj->where('id', $logged_user_id)->first();
        return view('users.profile.tracker', $data);
    }

    // Settings
    public function settings(Request $request){
        $userObj = new User;
        $logged_user_id = Auth::id();

        if($request->isMethod('post')){

            $requestArr = $request->all();

            ### save Settings
            if(!empty($requestArr['saveSettings'])){
                $settingResultObj = $userObj->updateSettings($logged_user_id, $requestArr);
                if(!empty($settingResultObj)){
                    return redirect('user/profile/settings')->with('account_status','Settings has been updated successfully.');
                }
            }

            ### verify Profile
            if(!empty($requestArr['profileVerification'])){
                $settingResultObj = $userObj->updateProfileSettings($logged_user_id, $requestArr);
                if(!empty($settingResultObj)){
                    return redirect('user/profile/settings?tab=profileVerification')->with('profile_status','Profile has been submitted for verification succesfully.');
                }
            }

            ### change Password
            if(!empty($requestArr['changePassword'])){

                $userResultObj = $userObj->where('id', $logged_user_id)->first();

                $this->validate($request, [
                    'password' => 'required|string|min:6|confirmed'
                ]);
                
                if(!Hash::check($requestArr['current_password'], $userResultObj->password)){
                    return back()->with('current_password','Wrong Password');
                }else{
                    $passwordResultObj = $userObj->changePassword($logged_user_id, $requestArr);

                    if(!empty($passwordResultObj)){
                        return redirect('user/profile/settings?tab=changePassword')->with('status','Password has been saved successfully.');
                    }
                }
            }
        }
        $current_tab = '';
        if(!empty($request->tab)){
            $current_tab = $request->tab;
        }
        $data['tab'] = $current_tab;
        return view('users.profile.settings', $data);
    }
}

?>