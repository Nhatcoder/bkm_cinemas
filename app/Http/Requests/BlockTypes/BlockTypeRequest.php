<?php

namespace App\Http\Requests\BlockTypes;

use App\Rules\CheckRuleName;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlockTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        $id = $this->route('id');
        return [
            "blockType.name" => [
                "required",
                "min:3",
                "max:255",
                new CheckRuleName($id, 'block_types')
            ],
            'blockType.order' => 'nullable|numeric',
            'blockType.active' => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return [
            "blockType.name.required" => __('validation.required', ['attribute' => __('language.admin.name')]),
            "blockType.name.min" => __('validation.min', ['attribute' => __('language.admin.name'), 'min' => 3]),
            "blockType.name.max" => __('validation.max', ['attribute' => __('language.admin.name'), 'max' => 255]),
            "blockType.order.numeric" => __('validation.numeric', ['attribute' => __('language.admin.order')]),
        ];
    }
}
