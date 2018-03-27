<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends Model
{
    use SoftDeletes;
    //
    protected $guarded = [];

    /**
     * Get cards
     */
    public function cards() {
        return $this->hasMany('App\Card');
    }

    /**
     * Get type names
     */
    public function type_names() {
        return $this->hasMany('App\TypeName', 'profile_id');
    }


    /**
     * Get type names
     */
    public function tier_names() {
        return $this->hasMany('App\TierName', 'profile_id');
    }

    /**
     * Get cards
     */
    public function invitations() {
        return $this->hasMany('App\Invitation', 'profile_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Get cards
     */
    public function released_cards() {
        return $this->hasMany('App\Card')->where('is_released', 1);
    }


    ### Removed Card
    function remove($requestArr){
    	return $this->where('id', $requestArr['profile_id'])->delete();
    }


    function getDefaultProfile($logged_user_id){
        return $this->where([
            ['user_id', $logged_user_id],
            ['is_default', 1]
        ])->value('id');
    }


    function setDefaultProfile($logged_user_id, $requestArr){
        $this->where('user_id', $logged_user_id)->update(['is_default'=>0]);
        return $this->where('id', $requestArr['profile_id'])->update(['is_default'=>1]);
    }

    /**
     * Reset Cover Image
     * @return Redirect
     */
    public function resetCoverImage($requestArr){
        return $this->where('id', $requestArr['profile_id'])->update(['cover_image'=>'']);
    }

    /**
     * Reset Profile Image
     * @return Redirect
     */
    public function resetProfileImage($requestArr){
        return $this->where('id', $requestArr['profile_id'])->update(['profile_image'=>'']);
    }

    /**
     * Reset Profile Background
     * @return Redirect
     */
    public function resetProfileBackground($requestArr){
        return $this->where('id', $requestArr['profile_id'])->update(['profile_background_image'=>'']);
    }

}
