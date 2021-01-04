<?php

namespace App\Http\Requests\V1;

use Illuminate\Validation\Rule;
use Pearl\RequestValidate\RequestAbstract;

class RegisterRequest extends RequestAbstract
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'gender' =>  ['required', Rule::in(['male', 'female'])],
            'email' => 'required|email|max:50|unique:users,username',
            'password' => 'required|string|max:50|confirmed',
            'password_confirmation' => 'required|max:50'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            //
        ];
    }
}
