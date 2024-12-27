<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $id = $this->route('id'); // Lấy id từ route (nếu có)

        // Nếu là thêm mới (không có $id), password là required
        $passwordRule = $id ? 'nullable|min:8' : 'required|min:8';

        return [
            'name' => 'required|max:255|regex:/^[a-zA-Z0-9]+$/',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => $passwordRule, // Quy tắc cho password
            'new_password' => 'nullable|min:8', // Quy tắc cho new_password chỉ cần khi cập nhật
            'role_id' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            "name.required" => __('validation.required', ['attribute' => __('language.admin.name')]),
            "name.max" => __('validation.max', ['attribute' => __('language.admin.name'), 'max' => 255]),
            "name.regex" => __('validation.regexNameUser', ['attribute' => __('language.admin.name')]),
            "email.required" => __('validation.required', ['attribute' => __('language.admin.email')]),
            "email.email" => __('validation.email', ['attribute' => __('language.admin.email')]),
            "email.max" => __('validation.max', ['attribute' => __('language.admin.email'), 'max' => 255]),
            "email.unique" => __('validation.unique', ['attribute' => __('language.admin.email')]),
            "password.required" => __('validation.required', ['attribute' => __('language.admin.members.users.password')]),
            "password.min" => __('validation.min', ['attribute' => __('language.admin.members.users.password'), 'min' => 8]),
            "new_password.min" => __('validation.min', ['attribute' => __('language.admin.members.users.newPassword'), 'min' => 8]),
            "role_id.required" => __('validation.required', ['attribute' => __('language.admin.members.users.role')]),
            'image.image' => __('validation.image'),
            'image.mimes' => __('validation.image.mimes', ['attribute' => __('language.admin.image'), 'format' => 'jpeg, jpg, png, svg, webp']),
            'image.max' => __('validation.image.max', ['attribute' => __('language.admin.image'), 'max' => '2MB']),
        ];
    }
}
