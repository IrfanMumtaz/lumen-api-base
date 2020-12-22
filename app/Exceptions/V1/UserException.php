<?php

namespace App\Exceptions\V1;

use App\Exceptions\BaseException;

class UserException extends BaseException
{
    public static function userAlreadyActive(): self
    {
        return new self(
            'User you are trying to activate is already activated. If you are facing any issue please contact customer support team.',
            '422'
        );
    }

    public static function permission(): self
    {
        return new self(
            'User Doesnt has Permission',
            '403'
        );
    }


    public static function suspended(): self
    {
        return new self(
            'Your Account is Suspended',
            '403'
        );
    }

    public static function sessionExpired(): self
    {
        return new self(
            'User Session has Expired',
            '401'
        );
    }

    public static function block(): self
    {
        return new self(
            'Your account has been locked. Contact your support person to unlock it, then try again.',
            '365'
        );
    }
}
