<?php

namespace App\Http\Requests\Notifications;

use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
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
        $rules = [
            "notification.title" => [
                "required",
                "min:5",
                "max:255",
            ],
            'notification.content' => [
                "required",
                "min:10",
                "max:255",
            ],
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            "notification.title.required" => 'Tiêu đề bắt buộc nhập',
            "notification.title.min" => 'Tối thiểu 5 kí tự',
            "notification.title.max" => 'Tối đa 255 kí tự',
            "notification.content.required" => 'Nội dung bắt buộc nhập',
            "notification.content.min" => 'Nội dung tối thiểu 10 kí tự',
            "notification.content.max" => 'Nội dung tối đa 255 kí tự',
        ];
    }
}
