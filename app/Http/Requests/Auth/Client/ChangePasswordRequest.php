<?php

namespace App\Http\Requests\Auth\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'old_password' => 'required',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => 'Vui lòng nhập mật khẩu hiện tại.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'confirm_password.required' => 'Vui lòng nhập lại mật khẩu.',
            'confirm_password.same' => 'Mật khẩu xác nhận không khớp với mật khẩu đã nhập.'
        ];
    }

    protected function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $user = Auth::user();

            if (!Hash::check($this->old_password, $user->password)) {
                $validator->errors()->add('old_password', 'Mật khẩu hiện tại của bạn không đúng.');
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
