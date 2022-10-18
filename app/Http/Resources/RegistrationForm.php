<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationForm extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            "order_id" => $this->order_id,
            "name"=> $this->name,
            "graduation_year"=>$this->graduation_year,
            "image" => url('storage/images/'.$this->image),
            "mobile" => $this->mobile_1,
            "day_1" => [
                "lunch"=> $this->d1la,
                "dinner"=> $this->d1da,
                "lunch_pending" => $this->checkifNegative($this->d1la -  (int) $this->food_taken_details[0]['d1la_taken']),
                "dinner_pending" => $this->checkifNegative($this->d1da -  (int) $this->food_taken_details[0]['d1da_taken']),

            ],
            "day_2" => [
                "lunch"=> $this->d2la,
                "dinner"=> $this->d2da,
                "driver"=> $this->driver,
                "lunch_pending"=> $this->checkifNegative($this->d2la - (int) $this->food_taken_details[0]['d2la_taken']),
                "dinner_pending"=> $this->checkifNegative($this->d2da - (int) $this->food_taken_details[0]['d2da_taken']),
                "driver_pending"=> $this->checkifNegative($this->driver - (int) $this->food_taken_details[0]['driver_taken']),

            ],


        ];


    }

    public function checkifNegative($value)
    {
        return $value >= 0 ? $value : 0;
    }
}
