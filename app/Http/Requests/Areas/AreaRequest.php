<?php

namespace App\Http\Requests\Areas;

use Illuminate\Foundation\Http\FormRequest;

class AreaRequest extends FormRequest
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
            'area.name' => 'required|min:3|max:255|unique:areas,name,' . $id,
            'area.city_id' => 'required'
        ];
    }

    public function messages(){
        return [
            "area.name.required" => __('validation.required', ['attribute' => __('language.admin.areas.name')]),
            'area.name.min' => __('validation.min', ['attribute' => __('language.admin.areas.name')]),
            "area.name.max" => __('validation.max', ['attribute' => __('language.admin.areas.name'), 'max' => 255]),
            'area.name.unique' => __('validation.unique', ['attribute' => __('language.admin.areas.name')]),
            'area.city_id.required' => __('validation.required', ['attribute' => __('language.admin.cities.name')]),
        ];
    }
}
