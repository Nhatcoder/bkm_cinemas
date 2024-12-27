<?php

namespace App\Http\Requests\Contacts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class ContactRequest extends FormRequest
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
            'contact.full_name' => 'required|string|max:255',
            'contact.email' => 'required|email|max:255',
            'contact.phone_number' => 'required|regex:/^(0[3,5,7,8,9])[0-9]{8}$/',
            'contact.title' => 'required|string|max:255',
            'contact.content' => 'required|string|min:10|max:1000',
        ];
    }
    public function messages()
    {
        return [
            'contact.full_name.required' => 'Họ và tên là bắt buộc!',
            'contact.email.required' => 'Email là bắt buộc!',
            'contact.email.email' => 'Email không đúng định dạng!',
            'contact.phone_number.required' => 'Số điện thoại là bắt buộc!',
            'contact.phone_number.regex' => 'Số điện thoại không đúng định dạng Việt Nam!',
            'contact.title.required' => 'Tiêu đề là bắt buộc!',
            'contact.content.required' => 'Nội dung là bắt buộc!',
            'contact.content.min' => 'Nội dung phải có ít nhất 10 ký tự!',
            'contact.content.max' => 'Nội dung không được vượt quá 1000 ký tự!',
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
