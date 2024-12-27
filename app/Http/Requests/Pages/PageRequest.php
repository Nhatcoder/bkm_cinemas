<?php

namespace App\Http\Requests\Pages;

use App\Rules\CheckRuleName;
use App\Rules\CheckRuleSlug;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PageRequest extends FormRequest
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
            'page.name' => [
                "required",
                "min:3",
                "max:250",
                new CheckRuleName($id, 'pages')
            ],
            'page.slug' => [
                "required",
                "min:3",
                "max:255",
                new CheckRuleSlug($id),
            ],
            'page.order' => 'nullable|numeric',
            'page.active' => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return [
            "page.name.required" => __('validation.required', ['attribute' => __('language.admin.name')]),
            "page.name.min" => __('validation.min', ['attribute' => __('language.admin.name'), 'min' => 3]),
            "page.name.max" => __('validation.max', ['attribute' => __('language.admin.name'), 'max' => 255]),
            "page.slug.required" => __('validation.required', ['attribute' => __('language.admin.slug')]),
            "page.slug.min" => __('validation.min', ['attribute' => __('language.admin.slug'), 'min' => 3]),
            "page.slug.max" => __('validation.max', ['attribute' => __('language.admin.slug'), 'max' => 255]),
            "page.order.numeric" =>  __('validation.numeric', ['attribute' => __('language.admin.order')]),
        ];
    }
}
