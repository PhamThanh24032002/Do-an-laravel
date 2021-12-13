<?php

namespace App\Http\Requests\Login_Account;

use Illuminate\Foundation\Http\FormRequest;

class RequestAdminResetPass extends FormRequest
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
            'password'=>'required',
            're_password'=>'required|same:password'
        ];
    }
    public function messages()
    {
        return [
            'password.required'=>'Mật khẩu không được để rỗng',
            're_password.required'=>'Vui lòng xác nhận mật khẩu',
            're_password.same'=>'Xác nhận mật khẩu không chính xác',
        ];
    }
}
