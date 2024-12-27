<?php

namespace App\Http\Requests\Auth\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'required|string|max:255|regex:/^[a-zA-Z0-9]+$/',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'date_birth' => 'required|before_or_equal:today', // Thêm quy tắc trước hoặc bằng ngày hiện tại
            'city_id' => 'required|integer|exists:cities,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên đăng nhập.',
            "name.regex" => 'Tên đăng nhập không được bao gồm dấu cách và các ký tự đặc biệt.',
            'name.string' => 'Tên đăng nhập phải là một chuỗi ký tự hợp lệ.',
            'name.max' => 'Tên đăng nhập phải có tối đa 255 ký tự.',
            'first_name.required' => 'Vui lòng nhập họ của bạn.',
            'first_name.string' => 'Họ phải là một chuỗi ký tự hợp lệ.',
            'last_name.required' => 'Vui lòng nhập tên đệm của bạn.',
            'last_name.string' => 'Tên phải là một chuỗi ký tự hợp lệ.',
            'gender.required' => 'Vui lòng chọn giới tính.',
            'date_birth.required' => 'Vui lòng nhập ngày sinh.',
            'date_birth.before_or_equal' => 'Ngày sinh không được lớn hơn ngày hiện tại.',
            'city_id.required' => 'Vui lòng chọn tỉnh/thành phố.',
            'city_id.exists' => 'Tỉnh/thành phố không hợp lệ.',
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        $response = response()->json([
            'errors' => $errors->messages(),
        ], 422);

        throw new HttpResponseException($response);
    }
}
