<?php

namespace App\Http\Requests\Posts;

use App\Rules\CheckRuleName;
use App\Rules\CheckRuleSlug;
use App\Rules\ValidImage;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class PostRequest extends FormRequest
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
            "name" => [
                "required",
                "min:3",
                "max:250",
                new CheckRuleName($id, 'posts')
            ],
            'slug' => [
                "required",
                "min:3",
                "max:255",
                new CheckRuleSlug($id),
            ],
            "avatar" => "nullable|mimes:jpeg,jpg,png,svg,webp",
            "order" => "nullable|numeric",
            "hot" => "nullable|numeric",
            "parent_id" => "required",
            "active" => "nullable|numeric",
            'tags.*'=>'distinct',
        ];
    }

    public function messages()
    {
        return [
            "name.required" => __('validation.required', ['attribute' => __('language.name',)]),
            "name.min" => __('validation.min', ['attribute' => __('language.name'), 'min' => 3]),
            "name.max" => __('validation.max', ['attribute' => __('language.name'), 'max' => 255]),
            "slug.required" => __('validation.required', ['attribute' => __('language.slug')]),
            "slug.min" => __('validation.min', ['attribute' => __('language.slug'), 'min' => 3]),
            "slug.max" => __('validation.max', ['attribute' => __('language.slug'), 'max' => 255]),
            "avatar.mimes" => __('validation.image.mimes', ['attribute' => __('language.avatar'), 'format' => 'jpeg, jpg, png, svg, webp']),
            "order.numeric" =>  __('validation.numeric', ['attribute' => __('language.order')]),
            'parent_id.required' => __('validation.required', ['attribute' => __('language.category')]),
            "tags.*.distinct" => __('validation.distinct', ['attribute' => __('language.tags')]),
        ];
    }
}
