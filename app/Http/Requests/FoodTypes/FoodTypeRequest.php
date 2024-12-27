<?php

namespace App\Http\Requests\FoodTypes;

use Illuminate\Foundation\Http\FormRequest;

class FoodTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "foodType.name" => [
                "required",
                "min:3",
                "max:255",
            ],
            "foodType.order" => "integer|numeric",
            "foodType.active" => "integer|numeric",
        ];
    }
    public function messages()
    {
        return [
            "foodType.name.required" => "Tên không được để trống!",
            "foodType.name.min" => "Tên ít nhất 3 ký tự!",
            "foodType.name.max" => "Tên tối đa 255 ký tự!",
        ];
    }
}
