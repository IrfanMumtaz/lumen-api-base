<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\Resource;

class ContactResource extends Resource
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
            'phone' => $this->phone,
            'email' => $this->email
        );
    }
}
