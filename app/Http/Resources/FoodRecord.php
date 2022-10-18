<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FoodRecord extends JsonResource
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
            'order_id' => $this->order_id,
            'added_by' => $this->added_by,
            'day_1' => [
                'lunch' => $this->d1lar,
                'dinner' => $this->d1dar,
            ],
            'day_2' => [
                'lunch' => $this->d2lar,
                'dinner' => $this->d2dar,
                'driver' => $this->driver_remaining,
            ],

        ];
    }
}
