<?php

namespace App\Exceptions\V1;

use App\Exceptions\BaseException;

class TokenException extends BaseException
{
    public static function pluginKeyHasBeenExpired(): self
    {
        return new self(
            'please validate plugin key is expired or in-active',
            '401'
        );
    }

    public static function invalidPluginToken()
    {
        return new self(
            'key is not valid with this domain',
            '401'
        );
    }

    public static function invalidToken()
    {
        return new self(
            'Invalid token',
            '401'
        );
    }
}
