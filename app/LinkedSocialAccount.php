<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkedSocialAccount extends Model
{
    //
    public function user(){
    	return $this->belongsTo('App\User');
	}
}
