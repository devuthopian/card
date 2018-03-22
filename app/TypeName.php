<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeName extends Model
{
    //

	protected $guarded = [];

    public function saveTypeNames($requestArr){
    	
    	$typeNamesArr = $requestArr['type'];
    	$nonDeleteTypeNamesArr = array();

    	foreach ($typeNamesArr as $key => $type) {
    		###
            $saveArr = array();
    		$saveArr['profile_id'] = $requestArr['profile_id'];
    		$saveArr['value'] = $key;
    		
    		### check already type name
    		$typeDetails = $this->where($saveArr)->first();

    		$saveArr['name'] = $type;

    		if(!empty($typeDetails)){
    			$this->where('id', $typeDetails->id)->update($saveArr);
    		}else{
    			$typeDetails = $this->create($saveArr);

    		}

    		$nonDeleteTypeNamesArr[] = $typeDetails->id;
    	}

    	$this->where('profile_id', $requestArr['profile_id'])
    	     ->whereNotIn('id',$nonDeleteTypeNamesArr)
    	     ->delete();

    	
    }


    ### save Type Name
    public function saveDefaultTypeNames($profile_id){
        ### save Type Names
        $saveArr[0]['name'] = 'A';
        $saveArr[0]['value'] = 1;
        $saveArr[1]['name'] = 'B';
        $saveArr[1]['value'] = 2;
        $saveArr[2]['name'] = 'C';
        $saveArr[2]['value'] = 3;
        $saveArr[3]['name'] = 'D';
        $saveArr[3]['value'] = 4;
        #### default type names enteries
        foreach ($saveArr as $valueArr) {
            $valueArr['profile_id'] = $profile_id;
            $this->create($valueArr);
        }
    }

}