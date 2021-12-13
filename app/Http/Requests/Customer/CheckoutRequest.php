<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'name'=>'required',
            'address'=>'required',
            'email' => 'email|required',
            'phone'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên không được để rỗng',
            'address.required'=>'Address không được để rỗng',
            'email.required' => 'Email không được để rỗng',
            'email.email' => 'Định dạng email không hợp lệ',
            // 'email.exists' => "Địa chỉ email không chính xác",
            'phone.required'=>'Phone không được để rỗng'
        ];
    }
}
