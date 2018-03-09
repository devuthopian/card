<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

use App\UserProfile;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the comments for the blog post.
     */
    public function user_profile() {
        return $this->hasOne('App\UserProfile');
    }

    // linked accounts
    public function accounts(){
        return $this->hasMany('App\LinkedSocialAccount');
    }

    /**
     * Get user profiles
     */
    public function user_profiles() {
        return $this->hasMany('App\UserProfile')->orderBy('id', 'asc');
    }

    public function reference_user_profile() {
        return $this->belongsTo('App\UserProfile', 'reference_profile_id');
    }

    public function updateProfile($requestArr, $profileImageObj){

        $saveArr['name'] = $requestArr['name'];
        $saveArr['description'] = $requestArr['description'];
        if(!empty($profileImageObj)){
            $imageName = time().'.'.$profileImageObj->getClientOriginalExtension();
            $profileImageObj->move(public_path('uploads/user/profile'), $imageName); 
            $saveArr['profile_image'] = $imageName;
        }

        $userProfileObj = new UserProfile;
        
        $userProfileObj->where('id', $requestArr['profile_id'])->update($saveArr);
        
        return array(
            'code' => 1,
            'message' => 'Profile updated successfully.',
            'data' => array()
        );
        
    }

    ### Create Profile
    public function createProfile($logged_user_id, $requestArr, $profileImageObj){

        $saveArr['name'] = $requestArr['name'];
        $saveArr['description'] = $requestArr['description'];
        $saveArr['user_id'] = $logged_user_id;
        if(!empty($profileImageObj)){
            $imageName = time().'.'.$profileImageObj->getClientOriginalExtension();
            $profileImageObj->move(public_path('uploads/user/profile'), $imageName); 
            $saveArr['profile_image'] = $imageName;
        }

        $userProfileObj = new UserProfile;
        $userProfileObj->create($saveArr);
        
        return array(
            'code' => 1,
            'message' => 'Profile saved successfully.',
            'data' => array()
        );
        
    }


    public function updateSettings($logged_user_id, $requestArr){
        $updatesArr['name'] = $requestArr['name'];
        $updatesArr['email'] = $requestArr['email'];
        return $this->where('id', $logged_user_id)->update($updatesArr);
    }


    public function changePassword($logged_user_id, $requestArr){
        $saveArr['password'] = Hash::make($requestArr['password']);
        return $this->where('id', $logged_user_id)->update($saveArr);
    }
}
