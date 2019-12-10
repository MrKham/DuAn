<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class InitProjectRequest extends FormRequest
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
            'category_id' => 'required_without:category_name',
            'category_name' => 'max:30',
            'rule' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên dự án bắt buộc nhập',
            'category_id.required_without' => 'Lĩnh vực bắt buộc chọn',
            'rule.required' => 'Bạn phải đồng ý với điều khoản dịch vụ của Fundstart',
        ];
    }
}
