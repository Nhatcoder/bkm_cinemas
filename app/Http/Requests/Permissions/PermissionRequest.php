<?php

namespace App\Http\Requests\Permissions;

use App\Rules\CheckRuleName;
use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            // 'permission.module_id' => 'required',
            'permission.name' => [
                "required",
                "max:255",
                new CheckRuleName($id, 'permissions', false)
            ],
            'permission.value' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            // "permission.module_id.required" => __('validation.module', ['attribute' => __('language.admin.module')]),
            "permission.name.required" => __('validation.required', ['attribute' => __('language.admin.name')]),
            "permission.name.max" => __('validation.max', ['attribute' => __('language.admin.name'), 'max' => 255]),
            "permission.value.required" => __('validation.required', ['attribute' => __('language.admin.value')]),
            "permission.value.max" => __('validation.max', ['attribute' => __('language.admin.name'), 'max' => 255]),
        ];
    }
}
