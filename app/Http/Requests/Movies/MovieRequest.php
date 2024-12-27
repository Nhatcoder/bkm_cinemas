<?php

namespace App\Http\Requests\Movies;

use App\Models\Movie;
use App\Rules\CheckRuleName;
use App\Rules\CheckRuleSlug;
use App\Rules\CheckRuleTitle;
use App\Rules\ValidImage;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class MovieRequest extends FormRequest
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
        $rules = [
            "movie.title" => [
                "required",
                "min:3",
                "max:250",
                new CheckRuleTitle($id, 'movies')
            ],
            'movie.slug' => [
                "required",
                "min:3",
                "max:255",
                new CheckRuleSlug($id),
            ],
            "movie.image" => "nullable|mimes:jpeg,jpg,png,svg,webp|max:2048",
            "movie.duration" => "required|numeric|min:1",
            "movie.director" => "required",
            "movie.trailer_url" => "required",
            "movie.format" => "required",
            "movie.age" => "required|numeric",
            "movie.country" => "required",
            "movie.language" => "required",
            "movie.order" => "nullable|numeric",
            "movie.hot" => "nullable|numeric",
            "genre_id" => "required",
            "movie.active" => "nullable|numeric",
            'movie.release_date' => 'required|date|before_or_equal:movie.premiere_date',
            'movie.premiere_date' => 'required|date|after_or_equal:today',
           
        ];
        if ($this->isMethod('put')) {
            $movie = Movie::find($id);
            // kiểm tra nếu như ngày công chiếu mà thay đổi giá trị lúc cập nhật thì mới validate, còn không thay đổi thì thôi
            if ($this->input('movie.premiere_date') !== $movie->premiere_date) {
                $rules['movie.premiere_date'] = 'required|date|after_or_equal:today';
            } else {
                unset($rules['movie.premiere_date']);
            }
        }

        return $rules;
    }

    public function messages()
    {
        return [
            "movie.title.required" => __('validation.required', ['attribute' => __('language.name',)]),
            "movie.title.min" => __('validation.min', ['attribute' => __('language.name'), 'min' => 3]),
            "movie.title.max" => __('validation.max', ['attribute' => __('language.name'), 'max' => 255]),
            "movie.slug.required" => __('validation.required', ['attribute' => __('language.slug')]),
            "movie.slug.min" => __('validation.min', ['attribute' => __('language.slug'), 'min' => 3]),
            "movie.slug.max" => __('validation.max', ['attribute' => __('language.slug'), 'max' => 255]),
            "movie.image.mimes" => __('validation.image.mimes', ['attribute' => __('language.image'), 'format' => 'jpeg, jpg, png, svg, webp']),
            "movie.image.max" => __('validation.image.max', ['attribute' => __('language.image'), 'max' => '2MB']),
            "movie.order.numeric" =>  __('validation.numeric', ['attribute' => __('language.order')]),
            "genre_id.required" => __('validation.required', ['attribute' => __('language.admin.movies.genre')]),
            "movie.duration.required" => __('validation.required', ['attribute' => __('language.admin.movies.duration')]),
            "movie.duration.min" => __('validation.min', ['attribute' => __('language.admin.movies.duration'), 'min' => 1]),
            "movie.duration.numeric" =>  __('validation.numeric', ['attribute' => __('language.admin.movies.duration')]),
            "movie.trailer_url.required" => __('validation.required', ['attribute' => __('language.admin.movies.trailer_url')]),
            "movie.format.required" => __('validation.required', ['attribute' => __('language.admin.movies.format')]),
            "movie.age.numeric" =>  __('validation.numeric', ['attribute' => __('language.admin.movies.age')]),
            "movie.age.required" => __('validation.required', ['attribute' => __('language.admin.movies.age')]),
            "movie.country.required" => __('validation.required', ['attribute' => __('language.admin.movies.country')]),
            "movie.director.required" => __('validation.required', ['attribute' => __('language.admin.movies.director')]),
            "movie.hot.numeric" =>  __('validation.numeric', ['attribute' => __('language.admin.hot')]),
            "movie.active.numeric" =>  __('validation.numeric', ['attribute' => __('language.admin.active')]),
            "movie.release_date.required" => __('validation.required', ['attribute' => __('language.admin.movies.release_date')]),
            'movie.release_date.before_or_equal' => 'Ngày phát hành phải bé hơn hoặc bằng ngày công chiếu!',
            "movie.premiere_date.required" => __('validation.required', ['attribute' => __('language.admin.movies.premiere_date')]),
            'movie.premiere_date.after_or_equal' => 'Ngày công chiếu phải lớn hơn hoặc bằng ngày hiện tại!',
        ];
    }
}
