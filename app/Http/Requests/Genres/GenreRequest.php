<?php

namespace App\Http\Requests\Genres;

use App\Models\Genre;
use App\Rules\CheckRuleName;
use App\Rules\CheckRuleSlug;
use Illuminate\Foundation\Http\FormRequest;

class GenreRequest extends FormRequest
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
                new CheckRuleName($id, 'genres')
            ],
            'slug' => [
                "required",
                "min:3",
                "max:255",
                new CheckRuleSlug($id),
            ],
            'position' => [
                function ($attribute, $value, $fail) use ($id) { // $id là ID của bản ghi hiện tại
                    if ($value > 0) {
                        // Kiểm tra tính duy nhất chỉ khi position > 0
                        if (Genre::where('position', $value)
                            ->whereNull('deleted_at')
                            ->where('id', '!=', $id) // Bỏ qua bản ghi hiện tại
                            ->exists()
                        ) {
                            $fail(__('language.admin.position'));
                        }
                    }
                },
            ],
            "avatar" => "mimes:jpeg,jpg,png,svg,webp|nullable|file|max:2048",
            "order" => "nullable|numeric",
        ];
        return $rules;
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
            "avatar.image" => __('validation.image'),
            "avatar.mimes" => __('validation.image.mimes', ['attribute' => __('language.admin.avatar'), 'format' => 'jpeg, jpg, png, svg, webp']),
            "avatar.max" => __('validation.image.max', ['attribute' => __('language.admin.avatar'), 'max' => '2MB']),
            "order.numeric" =>  __('validation.numeric', ['attribute' => __('language.admin.order')]),
            "position.unique" => __('validation.unique', ['attribute' => __('language.admin.genres.position')]),

        ];
    }
}
