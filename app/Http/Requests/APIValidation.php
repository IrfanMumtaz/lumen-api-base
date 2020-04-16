<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Pearl\RequestValidate\RequestAbstract;
use Illuminate\Support\Facades\Log;
use App\Exceptions\BaseException;
use App\Exceptions\Error;

class APIValidation extends RequestAbstract
{
    protected function failedValidation(Validator $validator)
    {
        Log::error($validator->errors()->toJson());
        throw new BaseException(Error::validationErrors($validator->errors()->toJson()));
    }
}
