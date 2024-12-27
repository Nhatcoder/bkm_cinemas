<?php

namespace App\Http\Requests\Rewards;

use App\Rules\CheckRuleName;
use Illuminate\Foundation\Http\FormRequest;

class RewardRequest extends FormRequest
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
            "reward.name" => [
                "required",
                "min:3",
                "max:250",
                new CheckRuleName($id, 'rewards')
            ],
            "reward.points_required" => [
                "required",
                "integer",
                "min:1", // Đảm bảo số phải không âm, nếu cần
            ],


        ];
    }

    public function messages()
    {
        return [
            "reward.name.required" => "Tên quà tặng là bắt buộc.",
            "reward.name.min" => "Tên quà tặng phải có ít nhất 3 ký tự.",
            "reward.name.max" => "Tên quà tặng không được vượt quá 250 ký tự.",
            "reward.points_required.required" => "Điểm là bắt buộc.",
            "reward.points_required.integer" => "Điểm phải là số.",
            "reward.points_required.min" => "Điểm phải >= 1.",
            "reward.description.required" => "Mô tả là bắt buộc.",
            "reward.description.string" => "Mô tả phải là một chuỗi ký tự hợp lệ.",
            "reward.description.max" => "Mô tả không được vượt quá 100 ký tự.",
        ];
    }
}
