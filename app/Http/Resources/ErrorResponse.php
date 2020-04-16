<?php

namespace App\Http\Resources;

use App\Exceptions\Error;

class ErrorResponse extends BaseResponse
{

    public function __construct(Error $error)
    {
        parent::__construct(null, $error, false, "Operation failed");
    }

    public function toArray($request)
    {
        return $this->wrapped();
    }
}
