<?php

namespace App\Http\Requests\Auth\Client;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'emailOrPhone' => [
                'required',
                'regex:/^(\+?\d{10,15}|[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,})$/'
            ],
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'emailOrPhone.required' => 'Vui lòng nhập email hoặc số điện thoại.',
            'emailOrPhone.regex' => 'Định dạng email hoặc số điện thoại không hợp lệ.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
        ];
    }

    protected function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $loginType = filter_var($this->emailOrPhone, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

            // Tìm người dùng dựa trên email hoặc số điện thoại
            $user = $loginType === 'email' 
                ? User::where('email', $this->emailOrPhone)->first() 
                : User::where('phone', $this->emailOrPhone)->first();

            // Nếu không tìm thấy người dùng
            if (!$user) {
                $validator->errors()->add('emailOrPhone', $loginType === 'email' 
                    ? 'Email này chưa được đăng ký.' 
                    : 'Số điện thoại này chưa được đăng ký.');
            } elseif ($user->status == 0) {
                $validator->errors()->add('emailOrPhone', 'Tài khoản của bạn đã bị khóa.');
            } 
            // Nếu tìm thấy người dùng nhưng mật khẩu không khớp
            elseif (!Hash::check($this->password, $user->password)) {
                $validator->errors()->add('password', 'Mật khẩu không đúng, vui lòng thử lại.');
            }
        });
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
