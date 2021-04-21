<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class SaveCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:4',
                Rule::unique('danhmuc')->ignore($this->id)
            ],
            'image' => ['required','mimes:jpg,jpeg,png','max:2048']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Hãy nhập tên danh mục!",
            'name.min' => "Tên danh mục ít nhất có 4 ký tự",
            'name.unique' => "Tên danh mục đã tồn tại",
            'image.required' => "Bạn phải chọn ảnh của danh mục!",
            'image.mimes' => "Ảnh phải có các định dạng sau jpg, jpeg,png",
            'image.max' => "Dung lượng tối đa của ảnh là 2048"
        ];
    }
}
