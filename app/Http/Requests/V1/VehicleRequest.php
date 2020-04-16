<?php

namespace App\Http\Requests\V1;

use App\Http\Requests\APIValidation;
use Illuminate\Validation\Rule;
use Pearl\RequestValidate\RequestAbstract;

class VehicleRequest extends RequestAbstract
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
            'name' => 'required|string|max:50',
            'type' => ['required', Rule::in('Bus', 'Car', 'Motor Bike')],
            'make' => 'nullable|string|max:50',
            'model' => 'required|string|max:50',
            'year' => 'nullable|date_format:Y',
            'registration' => "required|string|max:8|unique:vehicles,registration," . $id . ",id",
            'color' => 'nullable|string|max:50',
            'chasis' => 'nullable|string|max:50',
            'engine' => 'nullable|string|max:50',
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
