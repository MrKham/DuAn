<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class BlackListRequest extends FormRequest
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
                'email' => 'email|required|unique:black_lists,email,'.$this->route('blacklist'),
            ];
        return $rule;
    }
    public function messages()
    {
        return [
            'required' => 'Trường dữ liệu bắt buộc',
            'email' => 'Trường dữ liệu không đúng định dạng email',
            'unique' => 'Dữ liệu không được phép trùng lặp',
        ];
    }
}
