<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesManagementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company' => 'required|max:30',
            'name' => 'max:20',
            'tel' => 'numeric|max:11',
            'email' => 'email',
        ];
    }
    public function messages()
    {
        return [
            'company.required' => '会社名を入力してください',
            'name.max' => '20文字以内で入力してください',
            'tel.numeric' => '電話番号は数値で入力してください',
            'tel.max' => '電話番号は11桁以内で入力してください',
            'email.email' => 'メールアドレスの形式で入力してください'
        ];
    }
}
