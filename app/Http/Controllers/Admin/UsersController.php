<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function approve(Request $request){
    	$user_id = $request->user_id;
    	User::where('id', $user_id)->update(['is_profile_approved'=>1]);

    	$returnArr = array(
    					'code' => 1,
    					'message' => 'User profile approved succesfully.',
    					'data' => array()
    				);
    	return response()->json($returnArr);
    }
}
