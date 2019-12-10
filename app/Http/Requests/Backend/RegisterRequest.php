<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required',
            'r-email' => 'required|email|unique:users,email',
            'r-password' => 'required|min:6',
            'cf-password' => 'required|same:r-password',
            'g-recaptcha-response' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tài khoản bắt buộc nhập.',
            'r-email.required' => 'Email bắt buộc nhập',
            'r-email.email' => 'Email không đúng định dạng',
            'r-email.unique' => 'Email đã tồn tại',
            'r-password.required' => 'Mật khẩu bắt buộc nhập',
            'r-password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'cf-password.required' => 'Mật khẩu xác nhận bắt buộc nhập',
            'cf-password.same' => 'Mật khẩu xác nhận không trùng khớp',
            'g-recaptcha-response.required' => 'Vui lòng tích chọn captcha',
        ];
    }
}
