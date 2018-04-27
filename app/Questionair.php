<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionair extends Model
{
    //


    public function getDurationAttribute($value)
    {
        if($value <= 60){
        	return $value;
        }
        else{
        	$hours 		=  $value/60;
        	$minutes 	=  $value - intval($hours) * 60;
        	if($minutes!=0){
	        	return intval($hours).'hr(s) '.$minutes.'min(s)';
        	}
        	else{
        		return intval($hours).'hr(s)';
        	}
        }	
    }

    public function getCanResumeAttribute($value)
	{
    	if($value == 1){
    		return 'Yes';
    	}
    	else{
    		return 'No';
    	}
	}

    public function questions(){
        return $this->hasMany('App\Question');
    }
}
