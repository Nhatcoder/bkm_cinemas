<?php

namespace App\Http\Requests\Tags;

use App\Rules\CheckRuleName;
use App\Rules\CheckRuleSlug;
use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
        $id = $this->route('id');
        $rules = [
            "name" => [
                "required",
                "min:3",
                "max:255",
                new CheckRuleName($id, 'tags')
            ],
            'slug' => [
                "required",
                "min:3",
                "max:255",
                new CheckRuleSlug($id),
            ],
            "order" => "nullable|numeric",
            "active" => "nullable|numeric",
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            "name.required" => __('validation.required', ['attribute' => __('language.name')]),
            "name.min" => __('validation.min', ['attribute' => __('language.name'), 'min' => 3]),
            "name.max" => __('validation.max', ['attribute' => __('language.name'), 'max' => 255]),
            "slug.required" => __('validation.required', ['attribute' => __('language.slug')]),
            "slug.min" => __('validation.min', ['attribute' => __('language.slug'), 'min' => 3]),
            "slug.max" => __('validation.max', ['attribute' => __('language.slug'), 'max' => 255]),
            "order.numeric" =>  __('validation.numeric', ['attribute' => __('language.order')]),
            "active.numeric" =>  __('validation.numeric', ['attribute' => __('language.order')]),
        ];
    }
}
