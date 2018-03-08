<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Card;
use Auth;
use DB;

class CardsController extends Controller
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

    public function dashboard(){
        $data['cards'] = DB::table('card')
            ->join('users', 'users.id', '=', 'card.created_by')
            ->select('users.name', 'card.card_name', 'card.description','card.image', 'card.id')
            ->where('card.deleted_at', null)
            ->get();

        return view('users/profile/directory', $data);
    }

    ### Add / Edit / Duplicate Card
    public function add(Request $request){

        $cardObj = new Card;
        $cardImageObj = $request->file('image');
        $requestArr = $request->all();
        $logged_user_id = Auth::id();
        $resultArr = $cardObj->addCard($logged_user_id, $requestArr, $cardImageObj);
        
        if(!empty($resultArr)){
            return redirect('user/index/'.$requestArr['user_profile_id']);
        }
    }


    // edit card
    public function edit(Request $request, Card $card){
        return response()->json($card);
    }

    // release card
    public function release(Request $request){
    	$requestArr = $request->all();
    	$cardObj = new Card;
    	$result = $cardObj->release($requestArr);


    	if(!empty($result)){
    		### response
        	return response()->json(array(
                    'code' => 1, 
                    'message' => 'Card has been released successfully.',
                    'data' => array()
                    )
                );
    	} else {
    		### response
        	return response()->json(array(
                    'code' => 0, 
                    'message' => 'Error in releasing card.',
                    'data' => array()
                    )
                );
    	}
    }


    // remove card
    public function remove(Request $request){
    	$requestArr = $request->all();
    	$cardObj = new Card;
    	$result = $cardObj->remove($requestArr);


    	if(!empty($result)){
    		### response
        	return response()->json(array(
                    'code' => 1, 
                    'message' => 'Card has been removed successfully.',
                    'data' => array()
                    )
                );
    	} else {
    		### response
        	return response()->json(array(
                    'code' => 0, 
                    'message' => 'Error in removing card.',
                    'data' => array()
                    )
                );
    	}
    }

}
