<?php

namespace App\Http\Requests\Login_Account;

use App\Models\size;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RequestAdminLogin extends FormRequest
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
            'email' => 'email|required|exists:admins',
            'password' => "required",
            'check' => "same:$this->check2"
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email không được để rỗng',
            'email.email' => 'Định dạng email không hợp lệ',
            'email.exists' => "Địa chỉ email không chính xác",
            'password.required' => 'Mật khẩu không được để rỗng',
            'check.same' => 'Mật khẩu không chính xác',
        ];
    }
}
