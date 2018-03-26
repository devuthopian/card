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

    /**
     * Get type names
     */
    public function type_name() {
        return $this->belongsTo('App\TypeName');
    }


    /**
     * Get tier names
     */
    public function tier_name() {
        return $this->belongsTo('App\TierName');
    }


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
        $saveArr['card_value'] = $requestArr['card_value'];
        $saveArr['type_name_id'] = $requestArr['type_name_id'];
        $saveArr['tier_name_id'] = $requestArr['tier_name_id'];
        $saveArr['description'] = $requestArr['description'];
        $saveArr['user_profile_id'] = $requestArr['user_profile_id'];
        $saveArr['rewards'] = $requestArr['rewards'];
        $saveArr['image'] = $requestArr['image_file_name'];
        $saveArr['cropped_image_file_name'] = $requestArr['cropped_image_file_name'];
        $saveArr['updated_by'] = $logged_user_id;
        $saveArr['created_by'] = $logged_user_id;

        #flag variables
        $saveArr['is_card_name'] = !empty($requestArr['is_card_name'])?1:0;
        $saveArr['is_bonus'] = !empty($requestArr['is_bonus'])?1:0;
        $saveArr['is_card_value'] = !empty($requestArr['is_card_value'])?1:0;
        $saveArr['is_type_name'] = !empty($requestArr['is_type_name'])?1:0;
        $saveArr['is_tier_name'] = !empty($requestArr['is_tier_name'])?1:0;
        $saveArr['is_rewards'] = !empty($requestArr['is_rewards'])?1:0;
        $saveArr['is_description'] = !empty($requestArr['is_description'])?1:0;

        
        /*### upload Image
        if(!empty($cardImageObj)){
            $imageName = time().'.'.$cardImageObj->getClientOriginalExtension();
            $cardImageObj->move(public_path('uploads/card'), $imageName); 
            $saveArr['image'] = $imageName;
        }*/

        ### upload mask Image
        if(!empty($maskImageObj)){
            $maskImageName = time().'_mask.'.$maskImageObj->getClientOriginalExtension();
            $maskImageObj->move(public_path('uploads/card'), $maskImageName); 
            $saveArr['mask_image'] = $maskImageName;
        }

        #### Save Card
        $saveArr['created_by'] = $logged_user_id;
        $this->create($saveArr);
            
        ### Return
        return array(
            'code' => 1,
            'message' => 'Card saved successfully.',
            'data' => array()
        );
    }


    ### Update Card
    function updateCard($logged_user_id, $requestArr, $cardImageObj, $maskImageObj){

        ### Create Save Array
        $saveArr['card_name'] = $requestArr['card_name'];
        $saveArr['bonus'] = $requestArr['bonus'];
        $saveArr['card_value'] = $requestArr['card_value'];
        $saveArr['type_name_id'] = $requestArr['type_name_id'];
        $saveArr['tier_name_id'] = $requestArr['tier_name_id'];
        $saveArr['description'] = $requestArr['description'];
        $saveArr['user_profile_id'] = $requestArr['user_profile_id'];
        $saveArr['rewards'] = $requestArr['rewards'];
        $saveArr['image'] = $requestArr['image_file_name'];
        $saveArr['cropped_image_file_name'] = $requestArr['cropped_image_file_name'];
        $saveArr['updated_by'] = $logged_user_id;


        #flag variables
        $saveArr['is_card_name'] = !empty($requestArr['is_card_name'])?1:0;
        $saveArr['is_bonus'] = !empty($requestArr['is_bonus'])?1:0;
        $saveArr['is_card_value'] = !empty($requestArr['is_card_value'])?1:0;
        $saveArr['is_type_name'] = !empty($requestArr['is_type_name'])?1:0;
        $saveArr['is_tier_name'] = !empty($requestArr['is_tier_name'])?1:0;
        $saveArr['is_rewards'] = !empty($requestArr['is_rewards'])?1:0;
        $saveArr['is_description'] = !empty($requestArr['is_description'])?1:0;


        ### upload Image
        /*if(!empty($cardImageObj)){
            $imageName = time().'.'.$cardImageObj->getClientOriginalExtension();
            $cardImageObj->move(public_path('uploads/card'), $imageName); 
            $saveArr['image'] = $imageName;
        }*/

        ### upload mask Image
        if(!empty($maskImageObj)){
            $maskImageName = time().'_mask.'.$maskImageObj->getClientOriginalExtension();
            $maskImageObj->move(public_path('uploads/card'), $maskImageName); 
            $saveArr['mask_image'] = $maskImageName;
        }

        $this->where('id', $requestArr['card_id'])->update($saveArr);

        ### Return
        return array(
            'code' => 1,
            'message' => 'Card saved successfully.',
            'data' => array()
        );

    }



     ### Duplicate Card
    function duplicateCard($logged_user_id, $requestArr, $cardImageObj, $maskImageObj){

        ### Create Save Array
        $saveArr['card_name'] = $requestArr['card_name'];
        $saveArr['bonus'] = $requestArr['bonus'];
        $saveArr['card_value'] = $requestArr['card_value'];
        $saveArr['type_name_id'] = $requestArr['type_name_id'];
        $saveArr['tier_name_id'] = $requestArr['tier_name_id'];
        $saveArr['description'] = $requestArr['description'];
        $saveArr['user_profile_id'] = $requestArr['user_profile_id'];
        $saveArr['rewards'] = $requestArr['rewards'];
        $saveArr['image'] = $requestArr['image_file_name'];
        $saveArr['cropped_image_file_name'] = $requestArr['cropped_image_file_name'];
        $saveArr['updated_by'] = $logged_user_id;
        $saveArr['created_by'] = $logged_user_id;


        #flag variables
        $saveArr['is_card_name'] = !empty($requestArr['is_card_name'])?1:0;
        $saveArr['is_bonus'] = !empty($requestArr['is_bonus'])?1:0;
        $saveArr['is_card_value'] = !empty($requestArr['is_card_value'])?1:0;
        $saveArr['is_type_name'] = !empty($requestArr['is_type_name'])?1:0;
        $saveArr['is_tier_name'] = !empty($requestArr['is_tier_name'])?1:0;
        $saveArr['is_rewards'] = !empty($requestArr['is_rewards'])?1:0;
        $saveArr['is_description'] = !empty($requestArr['is_description'])?1:0;


        ### upload mask Image
        if(!empty($maskImageObj)){
            $maskImageName = time().'_mask.'.$maskImageObj->getClientOriginalExtension();
            $maskImageObj->move(public_path('uploads/card'), $maskImageName); 
            $saveArr['mask_image'] = $maskImageName;
        }


        #### Get copy card details
        $copyCardDetails = $this->where('id', $requestArr['copy_card_id'])->first();

        #### 
        if(empty($saveArr['image'])){
            $copy_card_image = $copyCardDetails->image;
            if(!empty($copy_card_image) && (file_exists(public_path('uploads/card').'/'.$copy_card_image))){
                $fileNameArr = explode('.', $copy_card_image);
                $saveArr['image'] = $new_image_name = time().'.'.end($fileNameArr);
                copy(public_path('uploads/card').'/'.$copy_card_image, public_path('uploads/card').'/'.$new_image_name);
            }
        }

        if(empty($saveArr['mask_image'])){
            $copy_card_mask_image = $copyCardDetails->mask_image;
            if(!empty($copy_card_mask_image) && (file_exists(public_path('uploads/card').'/'.$copy_card_mask_image))){
                $maskFileNameArr = explode('.', $copy_card_mask_image);
                $saveArr['mask_image'] = $new_mask_image_name = time().'_mask.'.end($maskFileNameArr);
                copy(public_path('uploads/card').'/'.$copy_card_mask_image, public_path('uploads/card').'/'.$new_mask_image_name);
            }
        }


        $this->create($saveArr);

        ### Return
        return array(
            'code' => 1,
            'message' => 'Card saved successfully.',
            'data' => array()
        );

    }

}
