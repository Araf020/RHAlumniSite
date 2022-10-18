<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankStatement extends Model
{
    public function userDetails(){
    	$look_in_temp_table = TempRegForm::where('order_id',$this->order_id)->first();
    	return $look_in_temp_table;
    }
}
