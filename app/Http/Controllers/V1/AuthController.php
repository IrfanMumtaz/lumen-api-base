<?php

namespace App\Http\Controllers\V1;

use App\Exceptions\BaseException;
use App\Exceptions\Error;
use App\Http\Controllers\Controller;
use App\Http\Logics\AuthenticationLogic;
use App\Http\Requests\AuthorizationRequest;
use App\Http\Resources\SuccessResponse;
use App\Http\Resources\V1\AuthenticationResponse;

use DB;

class AuthController extends Controller
{
    public function getAccessToken(AuthorizationRequest $request)
    {
        $auth = (new AuthenticationLogic)->verifyLoginInfo($request);
        return new AuthenticationResponse($auth);
    }
}
