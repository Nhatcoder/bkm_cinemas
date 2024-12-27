<?php

namespace App\Http\Requests\Menus;

use App\Rules\CheckRuleSlug;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMenuRequest extends FormRequest
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
            'slug' => [
                "nullable",
                "min:3",
                "max:255",
                new CheckRuleSlug($id),
            ],
        ];
    }

    public function messages()
    {
        return [
            "slug.min" => __('validation.min', ['attribute' => __('language.admin.slug'), 'min' => 3]),
            "slug.max" => __('validation.max', ['attribute' => __('language.admin.slug'), 'max' => 255]),
        ];
    }
}
