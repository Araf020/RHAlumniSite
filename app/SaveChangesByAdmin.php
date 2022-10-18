<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaveChangesByAdmin extends Model
{
    public function getParsedOldData()
    {
    	$raw_data = json_decode($this->old_data);
    	$data = '';
    	foreach ($raw_data as $key => $value) {
    		$data .= '<strong>'.$key .'</strong>:'. $value.'<br>';
    	}
    	return $data;
    }

    public function getParsedNewData()
    {
    	$raw_data = json_decode($this->new_data);
    	$data = '';
    	foreach ($raw_data as $key => $value) {
    		$data .= '<strong>'.$key .'</strong>:'. $value.'<br>';
    	}
    	return $data;
    }
}
