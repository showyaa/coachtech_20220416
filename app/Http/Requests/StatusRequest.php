<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatusRequest extends FormRequest
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
            'status1' => 'required|max:10',
            'status2' => 'required|max:10',
            'status3' => 'required|max:10',
            'status4' => 'required|max:10',
            'status5' => 'required|max:10',
        ];
    }

    public function messages()
    {
        return [
            'status1.required' => '入力してください',
            'status1.max' => '10文字以内で入力してください',
            'status2.required' => '入力してください',
            'status2.max' => '10文字以内で入力してください',
            'status3.required' => '入力してください',
            'status3.max' => '10文字以内で入力してください',
            'status4.required' => '入力してください',
            'status4.max' => '10文字以内で入力してください',
            'status5.required' => '入力してください',
            'status5.max' => '10文字以内で入力してください',
        ];
    }
}
