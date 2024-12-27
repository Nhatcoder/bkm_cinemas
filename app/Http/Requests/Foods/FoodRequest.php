<?php

namespace App\Http\Requests\Foods;

use Illuminate\Foundation\Http\FormRequest;

class FoodRequest extends FormRequest
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
        $rules = [
            "food.name" => [
                "required",
                "min:3",
                "max:255",
            ],
            "food.description" => [
                "nullable",
                "string",
                "max:500",
            ],
            "food.food_type_id" => "required|integer|numeric",
            "food.price" => "required|min:6|max:7",
            "food.order" => "integer|numeric",
            "food.active" => "integer|numeric",
        ];

        if ($this->isMethod('post')) {
            $rules['food.image'] = [
                "required",
                "image",
                "mimes:jpeg,png,jpg,gif,webp",
                "max:2048",
            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['food.image'] = [
                "nullable",
                "image",
                "mimes:jpeg,png,jpg,webp",
                "max:2048",
            ];
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages()
    {
        return [
          
            "food.name.required" => "Tên không được để trống!",
            "food.name.min" => "Tên ít nhất 3 ký tự!",
            "food.name.max" => "Tên tối đa 255 ký tự!",
            "food.image.required" => "Hình ảnh không được để trống!",
            "food.image.image" => "Tệp phải là hình ảnh!",
            "food.image.mimes" => "Chỉ chấp nhận các định dạng jpeg, png, jpg, gif!",
            "food.image.max" => "Kích thước hình ảnh tối đa là 2MB!",
            "food.description.max" => "Mô tả tối đa 1000 ký tự!",
            "food.price.required" => "Giá không được để trống!",
            "food.price.min"=>"Giá phải >= 10.000 vnđ",
            "food.price.max"=>"Giá phải < 1.000.000 vnđ",
            "food.food_type_id.required" => "Vui lòng chọn loại đồ ăn!",
            "food.food_type_id.integer" => "Loại đồ ăn không đúng!",
            "food.food_type_id.numeric" => "Loại đồ ăn không đúng!",
            "food.active.integer" => "Trạng thái không đúng!",
            "food.active.numeric" => "Trạng thái không đúng!",
            "food.order.integer" => "Số thứ tự phải là số!",
            "food.order.numeric" => "Số thứ tự phải là số!",
        ];
    }
}
