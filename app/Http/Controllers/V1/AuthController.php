<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Businesses\V1\AuthenticationBusiness;
use App\Http\Requests\V1\LoginRequest;
use App\Http\Resources\V1\AuthenticationResponse;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\V1\RegisterRequest;

class AuthController extends Controller
{
    public function getAccessToken(LoginRequest $request)
    {
        $auth = AuthenticationBusiness::verifyLoginInfo($request);
        return new AuthenticationResponse($auth);
    }

    public function register(RegisterRequest $request)
    {
        DB::beginTransaction();
        $auth = AuthenticationBusiness::register($request);
        DB::commit();
        return new AuthenticationResponse($auth);
    }
}
