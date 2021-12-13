<?php

namespace App\Http\Requests\ContactAdmin;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegisterContact extends FormRequest
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
            'phone'=>"required",
            'email'=>'required|email',
            'address'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'phone.required'=>'Số điện thoại không được để rỗng',
            'email.required'=>'Email không được để rỗng',
            'email.email'=>'Email không đúng định dạng',
            'address.required'=>'Địa chỉ không được để rỗng',
        ];
    }
}
