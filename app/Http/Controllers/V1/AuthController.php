<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Businesses\V1\AuthBusiness;
use App\Http\Requests\V1\LoginRequest;
use App\Http\Resources\V1\AuthenticationResponse;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\V1\RegisterRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $auth = AuthBusiness::verifyLoginInfo($request);
        return new AuthenticationResponse($auth);
    }

    public function register(RegisterRequest $request)
    {
        DB::beginTransaction();
        $auth = AuthBusiness::register($request);
        DB::commit();
        return new AuthenticationResponse($auth);
    }
}
