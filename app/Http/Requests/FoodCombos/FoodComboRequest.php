<?php

namespace App\Http\Requests\FoodCombos;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class FoodComboRequest extends FormRequest
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
            "food_combo.name" => "required|min:3|max:250",
            "food_combo.price" => "required|min:6|max:7",
            "food" => "required",
            "food_combo.description" => "nullable|string|max:500",
            "food_combo.order" => "integer|numeric",
            "food_combo.active" => "integer|numeric",
            "item.*.quantity" => "integer|numeric",
        ];

        if ($this->isMethod('post')) {
            $rules['food_combo.image'] = [
                "required",
                "image",
                "mimes:jpeg,png,jpg,gif,webp",
                "max:2048",
            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['food_combo.image'] = [
                "nullable",
                "image",
                "mimes:jpeg,png,jpg,webp",
                "max:2048",
            ];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            "food_combo.name.required" => "Tên không được để trống!",
            "food_combo.name.min" => "Tên phải có ít nhất 3 ký tự!",
            "food_combo.name.max" => "Tên tối đa 250 ký tự!",
            "food_combo.price.required" => "Giá không được để trống!",
            "food_combo.price.min"=>"Giá phải >= 10.000 vnđ",
            "food_combo.price.max"=>"Giá phải < 1.000.000 vnđ",
            "food_combo.image.required" => "Hình ảnh không được để trống!",
            "food_combo.image.image" => "Tệp phải là hình ảnh!",
            "food_combo.image.mimes" => "Chỉ chấp nhận các định dạng jpeg, png, jpg, gif, webp!",
            "food_combo.image.max" => "Kích thước hình ảnh tối đa là 2MB!",
            "food_combo.description.max" => "Mô tả tối đa 500 ký tự!",
            "food_combo.order.integer" => "Số thứ tự phải là số nguyên!",
            "food_combo.order.numeric" => "Số thứ tự phải là số!",
            "food_combo.active.integer" => "Trạng thái không đúng!",
            "food_combo.active.numeric" => "Trạng thái không đúng!",
            "food.required" => "Danh sách món ăn không được để trống!",
            "item.*.quantity.integer" => "Số lượng món ăn phải là số nguyên!",
            "item.*.quantity.numeric" => "Số lượng món ăn phải là số!",
        ];
    }


    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        $response = response()->json([
            'errors' => $errors->messages(),
        ], 422);

        throw new HttpResponseException($response);
    }
}
