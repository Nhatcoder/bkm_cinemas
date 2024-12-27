<?php

namespace App\Http\Requests\Payments;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
        $rules =  [
            'payment.name' => 'required|min:3|max:255', 
            'payment.description' => 'nullable|string|max:500',
            "payment.active" => 'integer|numeric'
        ];

        if ($this->isMethod('post')) {
            $rules['payment.image'] = [
                "required",
                "image",
                "mimes:jpeg,png,jpg,gif,webp",
                "max:2048",
            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['payment.image'] = [
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
            "payment.name.required" => "Tên không được để trống!",
            "payment.name.min" => "Tên ít nhất 3 ký tự!",
            "payment.name.max" => "Tên tối đa 255 ký tự!",
            'payment.image.required' => 'Hình ảnh không được để trống!',
            'payment.image.image' => 'Tệp tải lên phải là hình ảnh.',
            "payment.image.mimes" => "Chỉ chấp nhận các định dạng jpeg, png, jpg, gif!",
            "payment.image.max" => "Kích thước hình ảnh tối đa là 2MB!",
            "payment.description.max" => "Mô tả tối đa 1000 ký tự!",
            "payment.active.integer" => "Trạng thái không đúng!",
            "payment.active.numeric" => "Trạng thái không đúng!",
        ];
    }
}
