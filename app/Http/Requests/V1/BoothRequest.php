<?php

namespace App\Http\Requests\V1;

use Pearl\RequestValidate\RequestAbstract;

class BoothRequest extends RequestAbstract
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
            'name' => 'required|string|max:50',
            'merchant_id' => 'required|integer|exists:merchants,user_id',
            'contact.phone' => 'required|numeric|digits_between:0,12',
            'contact.email' => 'nullable|email|max:50|unique:contacts,email',
            'contact.s_phone' => 'nullable|numeric|digits_between:0,12',
            'contact.s_email' => 'nullable|email|max:50|unique:contacts,email',
            'address.full' => 'required|string|max:190',
            'address.latitude' => 'required|numeric|between:0,99.99999',
            'address.longitude' => 'required|numeric|between:0,99.99999',
            'address.city' => 'nullable|integer|exists:cities,id',
            'address.state' => 'nullable|integer|exists:states,id',
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