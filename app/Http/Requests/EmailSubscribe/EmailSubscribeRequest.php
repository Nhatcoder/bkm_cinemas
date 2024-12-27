<?php

namespace App\Http\Requests\EmailSubscribe;
use App\Rules\CheckRuleName;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class EmailSubscribeRequest extends FormRequest
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
        return [
            "email" => [
                "required",
                "string",
                'email',
            ],
        ];
    }

    public function messages(){
        return [
            "email-subscribe.required" => "Email là bắt buộc.",
            "email-subscribe.string" => "Email phải là chuỗi.",
            "email-subscribe.mail" => "Email không đúng định dạng",
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        $response = response()->json([
            'errors' => $errors->messages(),
        ], 422);

        throw new HttpResponseException($response);
    }
}
