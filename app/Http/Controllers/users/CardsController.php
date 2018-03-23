<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
        // fetch cards
        $cardObj = new Card;
        $data['cards'] = $cardObj->orderBy('created_at', 'desc')
                            ->get();

        return view('users/profile/directory', $data);
    }

    ### Add / Edit / Duplicate Card
    public function add(Request $request){

        $cardObj = new Card;
        $cardImageObj = $request->file('image');
        $maskImageObj = $request->file('mask_image');
        $requestArr = $request->all();
        $logged_user_id = Auth::id();

        //dd($requestArr);

        ##### Copy Card
        if(!empty($requestArr['copy_card_id'])){
            $resultArr = $cardObj->duplicateCard($logged_user_id, $requestArr, $cardImageObj, $maskImageObj);
        }
        #### Update Card
        elseif(!empty($requestArr['card_id'])){
            $resultArr = $cardObj->updateCard($logged_user_id, $requestArr, $cardImageObj, $maskImageObj);
        }
        #### Duplicate Card
        else{
            $resultArr = $cardObj->addCard($logged_user_id, $requestArr, $cardImageObj, $maskImageObj);
        }
        
        if(!empty($resultArr)){
            return redirect('user/index/'.$requestArr['user_profile_id']);
        }
    }


    // edit card
    public function edit(Request $request, Card $card){
        $cardDetails = Card::where('id', $card->id)->with('type_name', 'tier_name')->first();
        return response()->json($cardDetails);
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


    // uploadCardImage
    public function uploadCardImage(Request $request){
        ### upload Image
        $cardImageObj = $request->qqfile;
        if(!empty($request->qquuid)){
            $imageName = md5(microtime()).'.'.$cardImageObj->getClientOriginalExtension();
            $resultArr =  $cardImageObj->move(public_path('uploads/card/originals'), $imageName);
            $saveArr['image'] = "$imageName";

            return response()->json(array(
                    'code' => 1, 
                    'message' => 'Image has been uploaded successfully.',
                    'dataArr' => $saveArr
                )
            );
        }
    }


    public function cropCardImage(Request $request){
        //dd($request->all());

        $fileName = $request->image_file_name;

        $largeImageLoc = 'uploads/card/originals/'.$fileName;

        $imageInfoArr = getimagesize($largeImageLoc);
        $fileType = $imageInfoArr['mime'];

        list($width_org, $height_org) = getimagesize($largeImageLoc);

        //get image coords
        $x = (int) $request->x;
        $y = (int) $request->y;
        $width = (int) $request->w;
        $height = (int) $request->h;

        //define the final size of the cropped image
        $width_new = $width;
        $height_new = $height;


        //crop and resize image
        $newImage = imagecreatetruecolor($width_new,$height_new);

        switch($fileType) {
            case "image/gif":
                $source = imagecreatefromgif($largeImageLoc); 
                break;
            case "image/pjpeg":
            case "image/jpeg":
            case "image/jpg":
                $source = imagecreatefromjpeg($largeImageLoc); 
                break;
            case "image/png":
            case "image/x-png":
                $source = imagecreatefrompng($largeImageLoc); 
                break;
        }


        imagecopyresampled($newImage,$source,0,0,$x,$y,$width_new,$height_new,$width,$height);

        $oldFileNamesArr = explode('.',$fileName);
        $newFileName = md5(microtime()).'.'.$oldFileNamesArr[1];
        $cropImageLoc = 'uploads/card/cropped/'.$newFileName;

        switch($fileType) {
            case "image/gif":
                imagegif($newImage,$cropImageLoc); 
                break;
            case "image/pjpeg":
            case "image/jpeg":
            case "image/jpg":
                imagejpeg($newImage,$cropImageLoc,90); 
                break;
            case "image/png":
            case "image/x-png":
                imagepng($newImage,$cropImageLoc);  
                break;
        }

        return response()->json(array(
                    'code' => 1, 
                    'message' => 'Image has been cropped successfully.',
                    'newFileName' => $newFileName
                )
            );

    }

}
