<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\Resource;

class AddressResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return array(
            'id' => $this->id,
            'full_address' => $this->full_address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude
        );
    }
}
