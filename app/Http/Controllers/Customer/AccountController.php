<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\favorite;
use App\Models\Cart;
use Socialite;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Customer\ChangePasswordCusRequest;
use App\Http\Requests\Customer\LoginCusRequest;
use App\Http\Requests\Customer\MailPostRepassCusRequest;
use App\Http\Requests\Customer\MyAccountRequest;
use App\Http\Requests\Customer\RegisCusRequest;
use App\Http\Requests\Customer\RePassCusRequest;
use App\Models\item;

class AccountController extends Controller
{
    public function get_data()
    {
        $data = [];
        if (Auth::check()) {
            $data['listFavorite'] = favorite::where("user_id", Auth::id())->get();
            $data['wl_page'] = favorite::where("user_id", Auth::id())->join('products', 'products.id', '=', 'favorites.product_id')->get(['favorites.id as wl_id', 'favorites.user_id', 'products.*']);
            $data['cl_page'] = cart::where("user_id", Auth::id())->join('products', 'products.id', '=', 'carts.product_id')->get(['carts.*', 'products.price as pro_price', 'products.image', 'products.name', 'products.sale_price'])->toArray();
        }
        return $data;
    }

    public function logincus()
    {
        $banner_page = item::where('status', 1)
        ->where('page', 'login')->first();
        $data = $this->get_data();
        return view('Customer.Account.Login', compact('data','banner_page'));
    }

    public function registercus()
    {
        $banner_page = item::where('status', 1)
        ->where('page', 'register')->first();
        $data = $this->get_data();
        return view('Customer.Account.register', compact('data','banner_page'));
    }

    public function post_logincus(LoginCusRequest $req)
    {
        // dd("ok");
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password, 'status' => 0])) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('error', "????ng nh???p th???t b???i");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('logincus');
    }

    public function post_registercus(RegisCusRequest $req)
    {
        
        $regis = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'status' => '1'
        ]);
        if ($regis) {
            $regis_=Mail::to($req->email)->send(new SendMail($req->email, "register",$req->_token));
            DB::table('password_resets')->insert([
                'email' => $req->email,
                'token' => $req->_token
             ]);
            return redirect()->route('logincus')->with('warning', 'Vui l??ng x??c nh???n email ????? ????ng nh???p t??i kho???n c???a b???n!');
        } else {
            return redirect()->back()->with('error','G???p l???i khi t???o t??i kho???n n??y');
        }
    }

    public function check_regis(Request $req)
    {   
        $check=DB::table('password_resets')->where('email',$req->email)->first();
        if($check->token==$req->_token){
            $acc = User::where('email', $req->email)->first();
            $update_regis = User::where('email', $req->email)->first();
            $update_regis->status = 0;
            $update_regis->save();
            return redirect()->route('logincus')->with('warning', 'X??c nh???n t??i kho???n th??nh c??ng!');
        }else{
            return redirect()->back()->with('error','X??c nh???n email th???t b???i');
        }
        
    }

    public function myaccount()
    {
        // dd("hehe");
        $banner_page = item::where('status', 1)
        ->where('page', 'register')->first();
        $data = $this->get_data();
        return view('Customer.Account.Myaccount', compact('banner_page','data'));
    }
    public function post_myaccount(MyAccountRequest $req){
        if ($req->has('fileInput')) {
            $file = $req->fileInput;
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $file_name);
         } else {
            $file_name = Auth::user()->image;
         }
         $id = (Auth::id());
         $update_admin = User::find($id);
         $update_admin->name = $req->name;
         $update_admin->phone = $req->phone;
         $update_admin->address = $req->address;
         $update_admin->image = $file_name;
         $update_admin->save();
         return redirect()->back()->with('edit_success', 'C???p nh???t th??ng tin th??nh c??ng!');
    }
    public function changepasscus(){
        $data = $this->get_data();
        $banner_page = item::where('status', 1)
        ->where('page', 'check_password')->first();
        return view('Customer.Account.ChangePassCus', compact('data','banner_page'));
    }
    public function post_changepasscus(ChangePasswordCusRequest $req){
        if (Hash::check($req->current_password, Auth::user()->password)) {
            $user = User::find(auth::id());
            $user->password = Hash::make($req->new_password);
            $user->save();
            return redirect()->back()->with('edit_success', '?????i m???t kh???u th??nh c??ng!');
         } else {
            return redirect()->back()->with('error', '?????i m???t kh???u th???t b???i!');
         }
    }
    public function get_email_to_repasscus(){
        $data = $this->get_data();
        $banner_page = item::where('status', 1)
        ->where('page', 'check_password')->first();
        return view('Customer.Account.GetEmailRepassCus',compact('data','banner_page'));
    }
    public function post_email_to_repasscus(MailPostRepassCusRequest $req){
        $check=User::where('email',$req->email)->first();
        if($check){
            DB::table('password_resets')->insert([
                'email' => $req->email,
                'token' => $req->_token
             ]);
            $send_mai=Mail::to($req->email)->send(new SendMail($req->email, "repasscus",$req->_token));
            if($send_mai){
                return redirect()->route('logincus')->with('warning', 'Vui l??ng x??c nh???n email ????? thay ?????i m???t kh???u c???a b???n!');
            }
        }else{
            return redirect()->back()->with('error','Kh??ng t??m th???y t??i kho???n email n??y');
        }
    }
    public function repasscus(Request $req){
        $email=$req->email;
        $_token=$req->_token;
        $banner_page = item::where('status', 1)
        ->where('page', 'check_password')->first();
        $data = $this->get_data();
        return view('Customer.Account.RePassCus',compact('data','banner_page'));
    }
    public function post_repasscus(RePassCusRequest $req){
        // dd($req->_token);
        $check=DB::table('password_resets')->where('email',$req->email)->first();
        if($check->token==$req->_token){
            $acc = User::where('email', $req->email)->first();
            $acc->update([
                'password' => Hash::make($req->password)
            ]);
            $info = DB::table('password_resets')->where('email', $req->email)->delete();
    
            return redirect()->route('logincus')->with('edit_success','?????i m???t kh???u th??nh c??ng');
        }else{
            return redirect()->back()->with('error','?????a ch??? email kh??ng ch??nh x??c ho???c ch??a ???????c x??c nh???n trong email');
        }
    }


    public function login_facebook($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback_facebook($provider)
    {
        $getInfo = Socialite::driver($provider)->user();
        $user = $this->createUser($getInfo, $provider);
        auth()->login($user);
        return redirect()->to('/');
    }

    function createUser($getInfo, $provider)
    {
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $user = User::create([
                'name'     => $getInfo->name,
                'email'    => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id
            ]);
        }
        return $user;
    }
}
