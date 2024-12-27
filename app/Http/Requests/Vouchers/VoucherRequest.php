<?php

namespace App\Http\Requests\Vouchers;

use App\Models\Voucher;
use App\Rules\CheckRuleName;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class VoucherRequest extends FormRequest
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
        $voucher = Voucher::find($id);
        $rules = [
            "voucher.name" => [
                "required",
                "min:3",
                "max:250",
                new CheckRuleName($id, 'vouchers')
            ],
            "voucher.code" => [
                "required",
                "min:5",
                "max:100",
                "unique:vouchers,code,".$id,
            ],

            "voucher.discount_value" => [
                "required",
                "numeric",
            ],
            "voucher.description" => [
                "max:250"
            ],
        ];
        if (request()->voucher['discount_condition'] == 'condition') {
            $rules['voucher.quantity'] = [
                "max:100",
            ];

            $rules["voucher.start_date"] = [
                "nullable",
            ];
            $rules["voucher.end_date"] = [
                'nullable',
            ];
        } else {
            $rules["voucher.quantity"] = [
                "required",
                "integer",
                $id ? 'min:0' : 'min:1',
                "max:100",
            ];

            // if (!$voucher || $this->hasChanged('voucher.start_date', $voucher->start_date)) {
            $rules["voucher.start_date"] = [
                "required",
                "date",
                'after_or_equal:' . now()->toDateTimeString(),
            ];
            // }
            // if (!$voucher || $this->hasChanged('voucher.end_date', $voucher->end_date)) {
            $rules["voucher.end_date"] = [
                "required",
                "date",
                'after:voucher.start_date',
            ];
            // }
        }





        return $rules;
    }
    /**
     * 
     *
     * @param string $field Tên trường input
     * @param string|null $currentValue Giá trị hiện tại trong database
     * @return bool
     */
    protected function hasChanged(string $field, ?string $currentValue): bool
    {
        $newValue = $this->input($field);

        // Nếu giá trị mới không được gửi hoặc cả hai đều rỗng, coi như không thay đổi
        if (!$newValue && !$currentValue) {
            return false;
        }

        // Chuyển đổi giá trị mới và giá trị cũ sang Carbon để so sánh
        $newDate = $newValue ? Carbon::createFromFormat('Y-m-d\TH:i', $newValue) : null;
        $currentDate = $currentValue ? Carbon::parse($currentValue) : null;

        // So sánh giá trị, coi như không thay đổi nếu hai giá trị bằng nhau
        return $newDate?->ne($currentDate);
    }


    public function messages()
    {
        return [
            "voucher.name.required" => "Tên voucher là bắt buộc.",
            "voucher.name.min" => "Tên voucher phải có ít nhất 3 ký tự.",
            "voucher.name.max" => "Tên voucher không được vượt quá 250 ký tự.",
            "voucher.code.required" => "Mã voucher là bắt buộc.",
            "voucher.code.min" => "Mã voucher phải có ít nhất 5 ký tự.",
            "voucher.code.max" => "Mã voucher không được vượt quá 100 ký tự.",
            "voucher.code.unique" => "Mã voucher đã tồn tại.",
            "voucher.quantity.required" => "Số lượng voucher là bắt buộc.",
            "voucher.quantity.integer" => "Số lượng voucher phải là một số nguyên.",
            "voucher.quantity.min" => "Số lượng voucher phải lớn hơn hoặc bằng 1.",
            "voucher.quantity.max" => "Số lượng voucher không được vượt quá 100.",
            "voucher.start_date.required" => "Ngày bắt đầu là bắt buộc.",
            "voucher.start_date.date" => "Ngày bắt đầu phải là một ngày hợp lệ.",
            "voucher.start_date.after_or_equal" => "Ngày bắt đầu phải lớn hơn hoặc bằng ngày hiện tại.",
            "voucher.end_date.required" => "Ngày kết thúc là bắt buộc.",
            "voucher.end_date.after" => "Ngày kết thúc phải lớn hơn ngày bắt đầu.",
            "voucher.discount_value.required" => "Giá trị giảm giá là bắt buộc.",
            "voucher.discount_value.numeric" => "Giá trị giảm giá phải là số.",
            "voucher.discount_value.min" => "Giá trị giảm giá phải lớn hơn hoặc bằng 1.",
            "voucher.discount_value.max" => "Giá trị giảm giá không được vượt quá 1,000,000.",
            "voucher.description.max" => "Mô tả không được vượt quá 250 ký tự.",
            // "voucher.condition_type.required" => "Bắt buộc chọn",
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
