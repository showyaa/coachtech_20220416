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
            'status' => 'required|max:10'
        ];
    }

    public function messages()
    {
        return [
            'status.required' => 'ステータス名を入力してください',
            'status.max' => 'ステータス名は10文字以内で入力してください',
        ];
    }
}
