<?php

namespace App\Http\Requests\Blocks;

use App\Rules\CheckRuleName;
use App\Rules\CheckRuleSlug;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlockRequest extends FormRequest
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
            "block.name" => [
                "required",
                "min:3",
                "max:255",
                new CheckRuleName($id, 'blocks')],
            'block.slug' => [
                "required",
                "min:3",
                "max:255",
                new CheckRuleSlug($id),
            ],
            'block.page_id' => 'required|numeric',
            'block.block_type_id' => 'required|numeric',
            'block.order' => 'nullable|numeric',
            'block.active' => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return [
            "block.name.required" => __('validation.required', ['attribute' => __('language.admin.name')]),
            "block.name.min" => __('validation.min', ['attribute' => __('language.admin.name'), 'min' => 3]),
            "block.name.max" => __('validation.max', ['attribute' => __('language.admin.name'), 'max' => 255]),
            "block.slug.required" => __('validation.required', ['attribute' => __('language.admin.slug')]),
            "block.slug.min" => __('validation.min', ['attribute' => __('language.admin.slug'), 'min' => 3]),
            "block.slug.max" => __('validation.max', ['attribute' => __('language.admin.slug'), 'max' => 255]),
            'block.page_id.required' => __('validation.required', ['attribute' => __('language.admin.interfaces.pages.title')]),
            'block.page_id.numeric' => __('validation.numeric', ['attribute' => __('language.admin.interfaces.pages.title')]),
            'block.block_type_id.required' => __('validation.required', ['attribute' => __('language.admin.interfaces.blockTypes.blockType_sample')]),
            'block.block_type_id.numeric' => __('validation.numeric', ['attribute' => __('language.admin.interfaces.blockTypes.blockType_sample')]),
        ];
    }
}
