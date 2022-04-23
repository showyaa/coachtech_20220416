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
            'company' => 'required|max:30',
            'name' => 'max:20|nullable',
            'tel' => 'numeric|digits_between:8,11|nullable',
            'email' => 'email|nullable',
        ];
    }
    public function messages()
    {
        return [
            'company.required' => '企業名を入力してください',
            'company.max' => '企業名は30文字以内で入力してください',
            'name.max' => '名前は20文字以内で入力してください',
            'tel.numeric' => '電話番号は数値で入力してください',
            'tel.digits_between' => '電話番号の桁数が正しくありません',
            'email.email' => 'メールアドレスの形式で入力してください',
            'setting_status.required' => 'ステータス名を入力してください',
            'setting_status.max' => 'ステータス名は10文字以内で入力してください',
        ];
    }
}
