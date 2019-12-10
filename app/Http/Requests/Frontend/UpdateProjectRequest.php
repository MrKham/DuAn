<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'expense' => 'required|numeric',
            'plan_days' => 'required|numeric',
            'registration_service' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên dự án bắt buộc nhập',
            'expense.required' => 'Kinh phí dự án bắt buộc nhập',
            'plan_days.required' => 'Số ngày dự định bắt buộc nhập',
            'registration_service.required' => 'Dịch vụ đăng ký bắt buộc nhập',
        ];
    }
}
