<?php

namespace App\Http\Requests\Systems;

use App\Rules\CheckRuleName;
use App\Rules\CheckRuleSlug;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SystemRequest extends FormRequest
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
            "name" => [
                "required",
                "min:3",
                "max:255",
                new CheckRuleName($id, 'systems')
            ],
            'slug' => [
                "required",
                "min:3",
                "max:255",
                new CheckRuleSlug($id),
            ],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'order' => 'nullable|numeric',
            'active' => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return [
            "name.required" => __('validation.required', ['attribute' => __('language.admin.name')]),
            "name.min" => __('validation.min', ['attribute' => __('language.admin.name'), 'min' => 3]),
            "name.max" => __('validation.max', ['attribute' => __('language.admin.name'), 'max' => 255]),
            "slug.required" => __('validation.required', ['attribute' => __('language.admin.slug')]),
            "slug.min" => __('validation.min', ['attribute' => __('language.admin.slug'), 'min' => 3]),
            "slug.max" => __('validation.max', ['attribute' => __('language.admin.slug'), 'max' => 255]),
            'image.image' => __('validation.image'),
            'image.mimes' => __('validation.image.mimes', ['attribute' => __('language.admin.image'), 'format' => 'jpeg, jpg, png, svg, webp']),
            'image.max' => __('validation.image.max', ['attribute' => __('language.admin.image'), 'max' => '2MB']),
            'description.string' => __('validation.string', ['attribute' => __('language.admin.description')]),
            'description.max' => __('validation.max', ['attribute' => __('language.admin.content'), 'max' => 500]),
            'content.string' => __('validation.string', ['attribute' => __('language.admin.content')]),
            "order.numeric" =>  __('validation.numeric', ['attribute' => __('language.admin.order')]),
        ];
    }
}
