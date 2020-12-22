<?php

namespace App\Exceptions\V1;

use App\Exceptions\BaseException;

class ModelException extends BaseException
{
    public static function dataNotFound(): self
    {
        return new self(
            'Data trying to access does not exists.',
            '404'
        );
    }
}
