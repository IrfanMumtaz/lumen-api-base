<?php

namespace App\Exceptions\V1;

use App\Exceptions\BaseException;

class UnAuthorizedException extends BaseException
{
    public static function userUnAuthorized(): self
    {
        return new self("User does not have valid access token!", '403');
    }

    public static function invalidCredentials(): self
    {
        return new self("Invalid Email or Password", '401');
    }

    public static function invalidLoginRole(): self
    {
        return new self('User does not have permission to login.', '403');
    }
}
