<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\TierName;

class TierNamesController extends Controller
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
    	$tierNameObj = new TierName;
    	$requestArr = $request->all();
    	$tierNameObj->saveTierNames($requestArr);

        // fetch profile type names
        $tierNamesArr = TierName::where('profile_id', $requestArr['profile_id'])->pluck('name', 'id')->toArray();

    	return response()->json(array(
    		'code'=>1,
    		'message'=>'Tier names updated successfully.',
    		'dataArr'=>$tierNamesArr
    	));
    }
}
