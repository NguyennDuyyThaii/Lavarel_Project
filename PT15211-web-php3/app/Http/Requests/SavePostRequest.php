<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class SavePostRequest extends FormRequest
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
            'title' => [
                'required',
                'min:4',
                Rule::unique('posts')->ignore($this->id)
            ],
            'content' => [
                'required',
                'min:100',
                Rule::unique('posts')->ignore($this->id)
            ],
            'short_desc' => [
                'required',
                'min:30',
                Rule::unique('posts')->ignore($this->id)
            ],
            'danh_muc_id' => [
                'required'
            ],
            'author' => [
                'required',
                'min:4'
            ],
            'link' => 'required',
            'image' => ['mimes:jpg,jpeg,png','max:2048']
        ];
    }

    public function messages()
    {
        return [
            'link.required' => "Hãy nhập link bài viết!",

            'title.required' => "Hãy nhập tiêu đề bài viết!",
            'title.min' => "Tiêu đề bài viết ít nhất có 4 ký tự",
            'title.unique' => "Tiêu đề bài viết đã tồn tại",

            
            'image.mimes' => "Ảnh phải có các định dạng sau jpg, jpeg,png",
            'image.max' => "Dung lượng tối đa của ảnh là 2048",

            'content.required' => "Nội dung bài viết không được để trống!",
            'content.min' => "Nội dung bài viết phải tối thiểu 100 kí tự",
            'content.unique' => "Có vẻ nội dùng bài viết được copy paste, bạn hãy xem lại",

            'short_desc.required' => "Miêu tả ngắn không được để trống",
            'short_desc.min' => "Tiêu đề bài viết ít nhất có 4 ký tự",
            'short_desc.unique' => "Tiêu đề bài viết đã tồn tại",

            'danh_muc_id.required' => "Phải chọn danh mục cho bài viết",
            
            'author.required' => "Phải chọn tác giả cho bài viết",
            'author.min' => "Tác giải ít nhất phải có ít nhất 4 kí tự",
        ];
    }
}
