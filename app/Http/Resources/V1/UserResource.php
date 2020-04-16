<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'father_name' => $this->father_name,
            'cnic' => $this->cnic,
            'gender' => $this->gender,
            'date_of_birth' => $this->dob,
            'religion' => $this->religion,
            'nationality' => $this->nationality,
            'image' => $this->image,
            'status' => $this->status
        ];
    }
}
