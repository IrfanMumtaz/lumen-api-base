<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Businesses\AuthenticationBusiness;
use App\Http\Requests\AuthorizationRequest;
use App\Http\Resources\V1\AuthenticationResponse;

use Illuminate\Http\Request;
use DB;

class AuthController extends Controller
{
    public function getAccessToken(AuthorizationRequest $request)
    {
        $auth = AuthenticationBusiness::verifyLoginInfo($request);
        return new AuthenticationResponse($auth);
    }

    public function register(Request $request)
    {
        DB::beginTransaction();
        $auth = AuthenticationBusiness::register($request);
        DB::commit();
        return new AuthenticationResponse($auth);
    }
}
