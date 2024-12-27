<?php

namespace App\Http\Requests\Roles;

use App\Rules\CheckRuleName;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        $id = $this->route('id');
        return [
            'role.name' => [
                "required",
                "max:255",
                new CheckRuleName($id, 'roles', false)
            ],
            'role.type' => 'required',
            'role.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            "role.name.required" => __('validation.required', ['attribute' => __('language.admin.name')]),
            "role.name.max" => __('validation.max', ['attribute' => __('language.admin.name'), 'max' => 255]),
            "role.type.required" => __('validation.required', ['attribute' => __('language.admin.typeRole')]),
            'role.image.image' => __('validation.image'),
            'role.image.mimes' => __('validation.image.mimes', ['attribute' => __('language.admin.image'), 'format' => 'jpeg, jpg, png, svg, webp']),
            'role.image.max' => __('validation.image.max', ['attribute' => __('language.admin.image'), 'max' => '2MB']),
        ];
    }
}
