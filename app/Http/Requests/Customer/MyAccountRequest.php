<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class MyAccountRequest extends FormRequest
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
            'phone'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên không được để rỗng',
            'address.required'=>'Email không được để rỗng',
            'phone.required'=>'Mật khẩu không được để rỗng',
        ];
    }
}
