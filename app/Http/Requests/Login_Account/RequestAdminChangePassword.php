<?php

namespace App\Http\Requests\Login_Account;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RequestAdminChangePassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public $check2 = "true";
    public function authorize()
    {
        // dd("hehe");
        // dd($pass=auth('admin')->user()->password);
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $email_now = $this->email;
        $admin = DB::table('admins')->where('email', $email_now)->first();
        // dd($admin);
        if($admin!=null){
            $pass = $admin->password;
            if(!Hash::check($this->password, $pass)) {
                $this->check2 = "";
            }
        }

        return [
            
            'current_password'=>"required",
            'new_password'=>'required',
            'confirm_password'=>'same:new_password',
            'check' => "same:$this->check2"
        ];
    }
    public function messages()
    {
        return [
            'current_password.required'=>'Mật khẩu không được để rỗng',
            'check.same'=>'Mật khẩu không chính xác',
            'new_password.required'=>'Mật khẩu mới không được rỗng',
            'confirm_password.same'=>'Xác nhận mật khẩu không chính xác',
        ];
    }
}
