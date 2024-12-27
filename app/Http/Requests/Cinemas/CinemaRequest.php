<?php

namespace App\Http\Requests\Cinemas;

use App\Rules\CheckRuleName;
use Illuminate\Foundation\Http\FormRequest;

class CinemaRequest extends FormRequest
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
            "cinema.name" => [
                "required",
                "min:3",
                "max:250",
                new CheckRuleName($id, 'cinemas')
            ],
            "cinema.address" => "required|string",
            "cinema.description" => "nullable|string|max:500",
            "cinema.phone" => "required|string",
            "cinema.image" => "nullable|image|mimes:jpeg,png,jpg,webp|max:2048",
            "cinema.email" => "required|email",
            "cinema.map" => "required|string",
            "cinema.area_id" => "required|integer|numeric",
            "cinema.active" => "required|integer|numeric",
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            "cinema.name.required"    => "Tên không được để trống!",
            "cinema.name.min"         => "Tên phải có ít nhất 3 ký tự!",
            "cinema.name.max"         => "Tên tối đa 250 ký tự!",
            "cinema.address.required" => "Địa chỉ không được để trống!",
            "cinema.description.max"  => "Mô tả tối đa 500 ký tự!",
            "cinema.phone.required"   => "Số điện thoại không được để trống!",
            "cinema.email.required"   => "Email không được để trống!",
            "cinema.email.email"      => "Email không đúng định dạng!",
            "cinema.map.required"     => "Bản đồ không được để trống!",
            "cinema.image.image"      => "Tệp phải là hình ảnh!",
            "cinema.image.mimes"      => "Chỉ chấp nhận các định dạng jpeg, png, jpg, gif, webp!",
            "cinema.image.max"        => "Kích thước hình ảnh tối đa là 2MB!",
            "cinema.area_id.required" => "Mã khu vực không được để trống!",
            "cinema.area_id.integer"  => "Mã khu vực phải là số nguyên!",
            "cinema.area_id.numeric"  => "Mã khu vực phải là số!",
            "cinema.active.required"  => "Trạng thái không được để trống!",
            "cinema.active.integer"   => "Trạng thái không đúng!",
            "cinema.active.numeric"   => "Trạng thái không đúng!",
        ];
    }
}
