<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
	use SoftDeletes;

	/**
	* @var string  Table Name
	*/
    protected $table = 'card';

    protected $guarded = [];


    ### Released Card
    function release($requestArr){
    	return $this->where('id', $requestArr['card_id'])->update(['is_released'=>1]);
    }

    ### Removed Card
    function remove($requestArr){
    	return $this->where('id', $requestArr['card_id'])->delete();
    }

    ### Add / Edit / Duplicate Card
    function addCard($logged_user_id, $requestArr, $cardImageObj, $maskImageObj){


        ### Create Save Array
        $saveArr['card_name'] = $requestArr['card_name'];
        $saveArr['bonus'] = $requestArr['bonus'];
        $saveArr['card_number'] = $requestArr['card_number'];
        $saveArr['gender'] = $requestArr['gender'];


        $saveArr['description'] = $requestArr['description'];
        $saveArr['user_profile_id'] = $requestArr['user_profile_id'];

        
        
        
        $saveArr['card_tier'] = $requestArr['card_tier'];
        $saveArr['rewards'] = $requestArr['rewards'];
        //$saveArr['card_background'] = $requestArr['card_background'];
       // $saveArr['theme_color'] = $requestArr['theme_color'];
        
        ### upload Image
        if(!empty($cardImageObj)){
            $imageName = time().'.'.$cardImageObj->getClientOriginalExtension();
            $cardImageObj->move(public_path('uploads/card'), $imageName); 
            $saveArr['image'] = $imageName;
        }

        ### upload mask Image
        if(!empty($maskImageObj)){
            $maskImageName = time().'_mask.'.$maskImageObj->getClientOriginalExtension();
            $maskImageObj->move(public_path('uploads/card'), $maskImageName); 
            $saveArr['mask_image'] = $maskImageName;
        }
        
         #### Save / Update / Copy Card
        if(!empty($requestArr['copy_card_id'])) {


            $saveArr['created_by'] = $logged_user_id;
            $copyCardDetails = $this->where('id', $requestArr['copy_card_id'])->first();

            if(empty($saveArr['image'])){
                $copy_card_image = $copyCardDetails->image;
                $fileNameArr = explode('.', $copy_card_image);
                $saveArr['image'] = $new_image_name = time().'.'.end($fileNameArr);
                copy(public_path('uploads/card').'/'.$copy_card_image, public_path('uploads/card').'/'.$new_image_name);
            }

            if(empty($saveArr['mask_image'])){
                $copy_card_mask_image = $copyCardDetails->mask_image;
                $maskFileNameArr = explode('.', $copy_card_mask_image);
                $saveArr['mask_image'] = $new_mask_image_name = time().'_mask.'.end($maskFileNameArr);
                copy(public_path('uploads/card').'/'.$copy_card_mask_image, public_path('uploads/card').'/'.$new_mask_image_name);
            }

            $this->create($saveArr);

        }else{
            #### Save / Update Card
            if(!empty($requestArr['card_id'])) {
                $saveArr['updated_by'] = $logged_user_id;
                $this->where('id', $requestArr['card_id'])->update($saveArr);
            }else{
                $saveArr['created_by'] = $logged_user_id;
                $this->create($saveArr);
            }
        }

        ### Return
        return array(
            'code' => 1,
            'message' => 'Card saved successfully.',
            'data' => array()
        );
    }
}
