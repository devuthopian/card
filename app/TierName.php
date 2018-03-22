<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TierName extends Model
{
    //

	protected $guarded = [];

    public function saveTierNames($requestArr){
    	
    	$tierNamesArr = $requestArr['tier'];
    	$nonDeleteTierNamesArr = array();

    	foreach ($tierNamesArr as $key => $tier) {
    		###
            $saveArr = array();
    		$saveArr['profile_id'] = $requestArr['profile_id'];
    		$saveArr['value'] = $key;
    		
    		### check already type name
    		$tierDetails = $this->where($saveArr)->first();

    		$saveArr['name'] = $tier;

    		if(!empty($tierDetails)){
    			$this->where('id', $tierDetails->id)->update($saveArr);
    		}else{
    			$tierDetails = $this->create($saveArr);

    		}

    		$nonDeleteTierNamesArr[] = $tierDetails->id;
    	}

    	$this->where('profile_id', $requestArr['profile_id'])
    	     ->whereNotIn('id',$nonDeleteTierNamesArr)
    	     ->delete();

    	
    }


    ### save Tier Name
    public function saveDefaultTierNames($profile_id){
        ### save Type Names
        $saveArr[0]['name'] = 'Tier 1';
        $saveArr[0]['value'] = 1;
        $saveArr[1]['name'] = 'Tier 2';
        $saveArr[1]['value'] = 2;
        $saveArr[2]['name'] = 'Tier 3';
        $saveArr[2]['value'] = 3;
        $saveArr[3]['name'] = 'Tier 4';
        $saveArr[3]['value'] = 4;
        $saveArr[4]['name'] = 'Tier 5';
        $saveArr[4]['value'] = 5;
        #### default type names enteries
        foreach ($saveArr as $valueArr) {
            $valueArr['profile_id'] = $profile_id;
            $this->create($valueArr);
        }
    }
}
