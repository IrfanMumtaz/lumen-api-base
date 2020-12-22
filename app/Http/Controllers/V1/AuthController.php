<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Businesses\AuthenticationBusiness;
use App\Http\Requests\AuthorizationRequest;
use App\Http\Resources\V1\AuthenticationResponse;

use DB;

class AuthController extends Controller
{
    public function getAccessToken(AuthorizationRequest $request)
    {
        $auth = AuthenticationBusiness::verifyLoginInfo($request);
        return new AuthenticationResponse($auth);
    }
}
