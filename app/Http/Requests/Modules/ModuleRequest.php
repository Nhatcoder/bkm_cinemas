<?php

namespace App\Http\Requests\Modules;

use App\Rules\CheckRuleName;
use Illuminate\Foundation\Http\FormRequest;

class ModuleRequest extends FormRequest
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
            'module.name' => [
                "required",
                "max:255",
                new CheckRuleName($id, 'modules', false)
            ],
        ];
    }

    public function messages()
    {
        return [
            "module.name.required" => __('validation.required', ['attribute' => __('language.admin.name')]),
            "module.name.max" => __('validation.max', ['attribute' => __('language.admin.name'), 'max' => 255]),
        ];
    }
}
