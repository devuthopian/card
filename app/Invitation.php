<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $guarded = [];

    /**
     * Get the comments for the blog post.
     */
    public function user_profile() {
        return $this->belongsTo('App\UserProfile', 'profile_id');
    }

    public function users() {
        return $this->hasMany('App\User', 'invitation_id');
    }

    public function updateNeverExpireInviteUrl($invitation_id){
    	$invitationResultObj = $this->where('id', $invitation_id)->first();
    	if(!empty($invitationResultObj->never_expire)){
    		$returnArr = ['never_expire'=>0];
    		$this->where('id', $invitation_id)->update($returnArr);
    		$message = 'Link will expire after one day';
    	}else{
    		$returnArr = ['never_expire'=>1];
    		$this->where('id', $invitation_id)->update($returnArr);
    		$message = 'Link will not expire.';
    	}

    	return array(
    		'code' => 1,
    		'message' => $message,
    		'data' => $returnArr
    	);
    }

    public function validateInviteLink($invitation_id){
        $invitationIdArr = explode('_', $invitation_id);
        $conditionsArr['profile_id'] = $invitationIdArr[0];
        $conditionsArr['unique_id'] = $invitationIdArr[1];
        $invitationResultObj = $this->where($conditionsArr)->first();
        if(!empty($invitationResultObj)){
            if(!empty($invitationResultObj->never_expire)){
                return array(
                    'code' => 1,
                    'title' => '',
                    'message' => '',
                    'data' => $invitationResultObj
                );
            }else{
                $createdDateObj = $invitationResultObj->created_at;
                $createdDateObj->addDay();
                $created_date_time = strtotime($createdDateObj);
                $current_date_time = strtotime(now());

                if($current_date_time >= $created_date_time){
                    return array(
                        'code' => 0,
                        'title' => 'Expired',
                        'message' => 'Invitation Url has been expired',
                        'data' => array()
                    );
                } else {
                    return array(
                        'code' => 1,
                        'title' => '',
                        'message' => '',
                        'data' => $invitationResultObj
                    );
                }
            }
        }else{
            return array(
                'code' => 0,
                'title' => 'Invalid',
                'message' => 'Invitation Url is invalid.',
                'data' => array()
            );
        }
    }
}
