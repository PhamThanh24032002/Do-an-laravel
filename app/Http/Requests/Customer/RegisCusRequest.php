<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class RegisCusRequest extends FormRequest
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
            'email'=>'required|unique:users',
            'password'=>'required',
            'confirm_password'=>'same:password',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên không được để rỗng',
            'email.required'=>'Email không được để rỗng',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Mật khẩu không được để rỗng',
            'confirm_password.same'=>'Xác nhận mật khẩu không chính xác',
        ];
    }
}
