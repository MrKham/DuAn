<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rule = [
            'name' => 'required',
            'telephone_o' => 'required',
            'address' => 'required',
            'email' => 'email|required|unique:users,email,'.$this->route('user'),
            'password' => 'required|min:6',
            'cf-password' => 'required|same:password'
        ];
        if ($this->method() == 'PUT'){
            unset($rule['password'], $rule['cf-password']);
        }
        return $rule;
    }
    public function messages()
    {
        return [
            'required' => 'Trường :attribute bắt buộc nhập',
            'email' => 'Trường :attribute không đúng định dạng email',
            'unique' => 'Dữ liệu không được phép trùng lặp',
            'min' => 'Trường :attribute phải có ít nhất 6 kí tự',
            'same' => 'Mật khẩu xác nhận không chính xác'
        ];
    }
}
