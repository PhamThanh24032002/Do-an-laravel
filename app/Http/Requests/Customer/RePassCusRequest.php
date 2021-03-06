<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class RePassCusRequest extends FormRequest
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
            'confirm_password'=>'same:password',
        ];
    }
    public function messages()
    {
        return [
            'password.required'=>'Mật khẩu không được để rỗng',
            'confirm_password.same'=>'Xác nhận mật khẩu không chính xác',
        ];
    }
}
