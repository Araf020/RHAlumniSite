<?php

namespace App;

use App\BankStatement;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class TempRegForm extends Model
{
     protected $guarded = ['transaction_id'];
        /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function date_formated(){
    	return Carbon::parse($this->created_at)->toFormattedDateString();
    }
    public function hasBankStatement(){
        return $this->hasOne('App\BankStatement', 'order_id', 'order_id');
    }
}
