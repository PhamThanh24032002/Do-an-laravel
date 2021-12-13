<?php

namespace App\Http\Requests\Login_Account;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class RequestAdminUpdateProfile extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // dd(auth::guard('admin')->user()->id);
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id=auth::guard('admin')->user()->id;
        return [
            'name'=>'required',
            'email'=>"required|email|unique:admins,email,$id",
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Email không được để rỗng',
            'email.email'=>'Định dạng email không hợp lệ',
            'email.unique'=> "Địa chỉ email đã tồn tại",
            'name.required'=>'Tên không được để rỗng',
        ];
    }
}
