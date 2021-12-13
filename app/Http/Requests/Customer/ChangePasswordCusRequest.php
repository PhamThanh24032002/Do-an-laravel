<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ChangePasswordCusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public $check2 = "true";
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

        $email_now = Auth::user()->email;
        $user = DB::table('users')->where('email', $email_now)->first();
        // dd($user);
        if($user!=null){
            $pass = $user->password;
            if(!Hash::check($this->current_password, $pass)) {
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
