<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class MailPostRepassCusRequest extends FormRequest
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
            'email'=>'email|required|exists:users',
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Email không được để rỗng',
            'email.email'=>'Định dạng email không hợp lệ',
            'email.exists'=> "Địa chỉ email không chính xác",
        ];
    }
}
