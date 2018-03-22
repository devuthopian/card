<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\TypeName;

class TypeNamesController extends Controller
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
	 * save type names
	 */
    public function save(Request $request){
    	$typeNameObj = new TypeName;
    	$requestArr = $request->all();
    	$typeNameObj->saveTypeNames($requestArr);

        // fetch profile type names
        $typeNamesArr = TypeName::where('profile_id', $requestArr['profile_id'])->pluck('name', 'id')->toArray();


    	return response()->json(array(
    		'code'=>1,
    		'message'=>'Type names updated successfully.',
    		'dataArr'=>$typeNamesArr
    	));
    }
}
