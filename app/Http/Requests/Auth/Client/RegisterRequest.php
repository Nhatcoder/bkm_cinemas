<?php

namespace App\Http\Requests\Auth\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
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
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
                'regex:/^[\w\.-]+@(?:gmail\.com|fpt\.edu\.vn)$/i',
            ],
            'phone' => [
                'required',
                'string',
                'unique:users',
                'regex:/^(03|09|05|08)\d{8}$/', // Đầu số 03, 09, 05, hoặc 08 và 8 chữ số tiếp theo
            ],
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|same:password', // Xác nhận mật khẩu trùng với mật khẩu
            'gender' => 'required|in:male,female',
            'date_birth' => 'required|before_or_equal:today', // Thêm quy tắc trước hoặc bằng ngày hiện tại
            'city_id' => 'required|integer|exists:cities,id',
            'is_terms_accepted' => 'required|boolean',
            'is_subscribed_promotions' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            "name.regex" => 'Tên đăng nhập không được bao gồm dấu cách và các ký tự đặc biệt.',
            'name.required' => 'Vui lòng nhập tên đăng nhập.',
            'name.string' => 'Tên đăng nhập phải là một chuỗi ký tự hợp lệ.',
            'name.max' => 'Tên đăng nhập phải có tối đa 255 ký tự.',
            'first_name.required' => 'Vui lòng nhập họ của bạn.',
            'first_name.string' => 'Họ phải là một chuỗi ký tự hợp lệ.',
            'last_name.required' => 'Vui lòng nhập tên đệm của bạn.',
            'last_name.string' => 'Tên phải là một chuỗi ký tự hợp lệ.',
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email này đã được đăng ký.',
            'email.regex' => 'Email không hợp lệ.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'phone.unique' => 'Số điện thoại này đã được đăng ký.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password_confirmation.required' => 'Vui lòng nhập lại mật khẩu.',
            'password_confirmation.same' => 'Mật khẩu xác nhận không khớp với mật khẩu đã nhập.',
            'gender.required' => 'Vui lòng chọn giới tính.',
            'date_birth.required' => 'Vui lòng nhập ngày sinh.',
            'date_birth.before_or_equal' => 'Ngày sinh không được lớn hơn ngày hiện tại.',
            'city_id.required' => 'Vui lòng chọn tỉnh/thành phố.',
            'city_id.exists' => 'Tỉnh/thành phố không hợp lệ.',
            'is_terms_accepted.required' => 'Bạn cần đồng ý với các điều khoản của chúng tôi.',
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
