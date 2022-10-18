<?php

namespace App;

use App\BankStatement;
use App\FoodRecord;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RegistrationForm extends Model
{
    protected $order_id;
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

    public function date_formatted(){
    	return Carbon::parse($this->created_at)->toFormattedDateString();
    }

    public function hasBankStatement(){
        return $this->hasOne('App\BankStatement', 'order_id', 'order_id');
    }

    public function remainingToken(){
        return $this->hasOne('App\FoodRecord', 'order_id', 'order_id');
    }

    public function getSum(){
        $data = DB::table('food_records')->where('order_id',$this->order_id)
                          ->selectRaw('sum(d1lar) as day_1_lunch, sum(d1dar) as day_1_dinner, sum(d2lar) as day_2_lunch, sum(d2dar) as day_2_dinner, sum(driver_remaining) as driver_remaining')->get();
        return  $data;
    }

    public function takenFoodRecord($order_id)
    {
        return $taken_food_record = FoodRecord::where('order_id',$order_id)
                            ->selectRaw('sum(d1lar) as d1la_taken')
                            ->selectRaw('sum(d1dar) as d1da_taken')
                            ->selectRaw('sum(d2lar) as d2la_taken')
                            ->selectRaw('sum(d2dar) as d2da_taken')
                            ->selectRaw('sum(driver_remaining) as driver_taken')
                            ->get();
    }

    public function getDetails($order_id)
    {
      $data = $this->where('order_id',$order_id)->first();
      $data->food_taken_details = $this->takenFoodRecord($order_id);
      return $data;
    }

    public function getAllDetails()
    {
      $data = $this->all();
      foreach ($data as $single_order) {
        $single_order->food_taken_details = $this->takenFoodRecord($single_order['order_id']);
      }
      return $data;
    }
}
