<?php

namespace App\Http\Requests\Actors;
use App\Rules\CheckRuleName;
use Illuminate\Foundation\Http\FormRequest;
class ActorRequest extends FormRequest
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
            "actor.name" => [
                "required",
                "min:3",
                "max:250",
                new CheckRuleName($id, 'actors')
            ],
            "actor.birth_date" => [
                "required",
                "date",
                "before:today",
            ],
            "actor.nationality" => [
                "required",
                "string",
                "max:100",
            ],
        ];
    }

    public function messages(){
        return [
            "actor.name.required" => "Tên diễn viên là bắt buộc.",
            "actor.name.min" => "Tên diễn viên phải có ít nhất 3 ký tự.",
            "actor.name.max" => "Tên diễn viên không được vượt quá 250 ký tự.",
            "actor.birth_date.required" => "Ngày sinh của diễn viên là bắt buộc.",
            "actor.birth_date.date" => "Ngày sinh của diễn viên phải là một ngày hợp lệ.",
            "actor.birth_date.before" => "Ngày sinh của diễn viên phải là ngày trước hôm nay.",
            "actor.nationality.required" => "Quốc tịch của diễn viên là bắt buộc.",
            "actor.nationality.string" => "Quốc tịch của diễn viên phải là một chuỗi ký tự hợp lệ.",
            "actor.nationality.max" => "Quốc tịch của diễn viên không được vượt quá 100 ký tự.",
        ];
    }
}
