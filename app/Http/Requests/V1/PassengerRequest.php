<?php

namespace App\Http\Requests\V1;

use Illuminate\Validation\Rule;
use Pearl\RequestValidate\RequestAbstract;

class PassengerRequest extends RequestAbstract
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
            'father_name' => 'required|string|max:50',
            'cnic' => 'required|numeric|digits:13|unique:users,cnic',
            'gender' =>  ['required', Rule::in(['M', 'F'])],
            'contact.phone' => 'required|numeric|digits_between:0,12',
            'contact.email' => 'required|email|max:50|unique:contacts,email',
            'address.full' => 'required|string|max:190',
            'address.latitude' => 'required|numeric|between:0,99.99999',
            'address.longitude' => 'required|numeric|between:0,99.99999',
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
