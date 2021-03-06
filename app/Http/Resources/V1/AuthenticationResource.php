<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\Resource;

class AuthenticationResource extends Resource
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
            'access_token' => $this['access_token'],
            'token_type' => $this['token_type'],
            'expiry' => $this['expires_at'],
            'user' => new UserResource($this['user']),
            'permissions' => $this['permissions']
        ];
    }
}
