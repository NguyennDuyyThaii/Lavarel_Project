<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class SaveRegisterRequest extends FormRequest
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
                'min:8'
            ],
            'email' => [
                'required',
                'max:50',
                'email',
                Rule::unique('users')->ignore($this->id)
            ],
            'password' => [
                'required',
                'min:6',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/',
                'confirmed'
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Bạn phải nhập tên người dùng!",
            'name.min' => "Tên của người dùng phải ít nhất có 8 ký tự",
           

            'email.required' => "Không được để trống email",
            'email.max' => "Độ dài tối đa của email là 50 kí tự",
            'email.email' => "Email phải đúng định dạng",
            'email.unique' => "Email dùng để đăng kí đã tồn tại",

            'content.required' => "Nội dung bài viết không được để trống!",
            'content.min' => "Nội dung bài viết phải tối thiểu 100 kí tự",
            'content.unique' => "Có vẻ nội dùng bài viết được copy paste, bạn hãy xem lại",

            'password.required' => "Không được để trống mật khẩu",
            'password.min' => "Độ dài mật khẩu phải ít nhất có 6 ký tự",
            'password.regex' => "Mật khẩu không đúng định dạng",
            
        ];
    }
}
