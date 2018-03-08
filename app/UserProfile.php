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
     * Get cards
     */
    public function invitations() {
        return $this->hasMany('App\Invitation', 'profile_id');
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
}
