<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;

use App\User;
use App\Invitation;
use App\UserProfile;
use App\TypeName;
use App\TierName;

use Mail;

class InviteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'registerName', 'configureUserInfo']]);
    }

    /**
     * Invitation Page
     * @param Request $request, $invitation_hash
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $invitation_hash){

        $logged_user_id = Auth::id();
        
        $invitationObj = new Invitation;

        $data['inviteReturnArr'] = $inviteReturnArr = $invitationObj->validateInviteLink($invitation_hash);
        
        if(!empty($logged_user_id)){
            return redirect('user/index/'.$inviteReturnArr['data']->profile_id);
        }
        
        $data['invitation_hash'] = $invitation_hash;
        
        return view('invite.index', $data);
    }

    /**
     * registerName
     * @param Request $request, $invitation_hash
     * @return \Illuminate\Http\Response
     */
    public function registerName(Request $request, $invitation_hash){

        $userObj = new User;
        $userProfileObj = new UserProfile;
        $invitationObj = new Invitation;

        $conditionsArr['invitation_hash'] = $invitation_hash;

        $invitationDetailsObj = $invitationObj->where($conditionsArr)->first();
        
        $newUserArr['name'] = $request->name;
        $newUserArr['invitation_id'] = $invitationDetailsObj->id;

        $newUser = $userObj->create($newUserArr);

        return redirect('configureUserInfo/'.$newUser->id);
    }

    
    /**
     * configure User Info
     * @param Request $request, User $user
     * @return \Illuminate\Http\Response
     */
    public function configureUserInfo(Request $request, User $user){

        ### Post Request
        if($request->isMethod('post')){

            $this->validate($request, [
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
            ]);

            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $userDetails = $user->update();

            ### User Profile
            $userProfileObj = new UserProfile;
            $userProfileArr['user_id'] = $user->id;
            $userProfileArr['name'] = $user->name;
            $userProfileArr['profile_image'] = '';
            $userProfileArr['description'] = '';
            $userProfileArr['is_default'] = 1;
            $userProfileResultObj = $userProfileObj->create($userProfileArr);
            

            ### Save Default Type and Tier Name
            $profile_id = $userProfileResultObj->id;

            $typeNameObj = new TypeName;
            $typeNameObj->saveDefaultTypeNames($profile_id);
            

            $tierNameObj = new TierName;
            $tierNameObj->saveDefaultTierNames($profile_id);


            ### Login after registartion
            Auth::login($user, true);
            return redirect('user/index/'.$user->reference_profile_id);
        }

        if(!empty($user->email) && !empty($user->password)){
            return redirect('login');
        }

        $data['user'] = $user;

        return view('invite.configureUserInfo', $data);
    }




    /**
     * send Invitation,
     *
     * @return \Illuminate\Http\Response
     */
    public function sendInvitation(Request $request) {
       
        $userObj = new User;

        $emailsArr = explode(',',$request->email);
        $emailDataArr['loggedUserInfo'] = Auth::user();
        

        ### invite code
        $loggedUserDetails = $userObj->where('id', Auth::id())->first();
        if(empty($loggedUserDetails->invite_code)){
            $emailDataArr['invite_code'] = $invite_code = md5(uniqid());
            $userObj->where('id', Auth::id())->update(['invite_code'=>$invite_code]);
        }else{
            $emailDataArr['invite_code'] = $loggedUserDetails->invite_code;
        }

        ### send emails
        foreach ($emailsArr as $key => $value) {
            Mail::send('emails.invite', $emailDataArr, function($message) use ($value) {
                $message->from(env('MAIL_USERNAME'), 'Need Secured');
                $message->to($value);
            });
        }

        ### response
        return response()->json(array(
                                'code' => 1, 
                                'message' => 'Invitation has been sent successfully.',
                                'data' => array()
                                )
                            );
        
    }

}
