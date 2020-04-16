<?php

namespace App\Http\Requests\V1;

use Pearl\RequestValidate\RequestAbstract;

class TicketRequest extends RequestAbstract
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
        $id = $this->route('id') ?: 0;
        return [
            'code' => 'required|string|max:50|unique:tickets,code,' . $id . ",id"
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
