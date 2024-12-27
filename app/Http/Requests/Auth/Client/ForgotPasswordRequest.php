<?php

namespace App\Http\Requests\Auth\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ForgotPasswordRequest extends FormRequest
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
    public function rules()
    {
        return [
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'regex:/^[\w\.-]+@(?:gmail\.com|fpt\.edu\.vn)$/i',
                'exists:users,email',
            ],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập email.',
            'email.string' => 'Email phải là một chuỗi ký tự hợp lệ.',
            'email.email' => 'Email không hợp lệ.',
            'email.max' => 'Email phải có tối đa 255 ký tự.',
            'email.exists' => 'Email này không tồn tại trong hệ thống.',
            'email.regex' => 'Email không hợp lệ.',
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
