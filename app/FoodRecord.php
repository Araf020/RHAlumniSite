<?php

namespace App;

use App\RegistrationForm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FoodRecord extends Model
{
    public function userData()
    {
    	return $this->belongsTo('App\RegistrationForm','order_id','order_id');
    }

    
}
