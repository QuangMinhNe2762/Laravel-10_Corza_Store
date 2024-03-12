<?php

namespace App\Http\Requests\Slider;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormSliderRequest extends FormRequest
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
            'name'=>'required',
            'url'=>'required',
            'sort_by'=>'required',
            'image'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'Nhập tiêu đề',
            'url.required'=>'Nhập đường dẫn',
            'sort_by.required'=>'Nhập thứ tự slide',
            'image.required'=>'Thêm hình ảnh',
        ];
    }
}
