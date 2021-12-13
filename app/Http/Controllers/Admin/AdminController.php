<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\SendMail;
use App\Http\Requests\Login_Account\RequestAdminUpdateProfile;
use App\Http\Requests\Login_Account\RequestAdminChangePassword;
use App\Http\Requests\Login_Account\RequestAdminRegisterAccount;
use App\Http\Requests\Login_Account\RequestAdminMailToRepass;
use App\Http\Requests\Login_Account\RequestAdminResetPass;
use App\Models\feedback;
use App\Models\orders;
use App\Models\orders_detail;
use App\Models\User;
use Facade\FlareClient\View;
use App\Models\statistic;
use App\Models\products;
use Carbon\Carbon;

use function Ramsey\Uuid\v1;

class AdminController extends Controller
{

   public function index()
   {
      return view('Admin.index');
   }

   public function profit()
   {
      $CurrentDate=\Carbon\Carbon::now('Asia/Ho_Chi_Minh');
      $YesterdayDate=\Carbon\Carbon::yesterday('Asia/Ho_Chi_Minh');      
      $last7dayDate=$CurrentDate->addDay(-7);
      $last30dayDate=Carbon::parse('first day of this month');
      $last365dayDate=$CurrentDate->addDay(-365);
      //old date
      $YesterdayDateOld=$CurrentDate->addDay(-2);
      $last7dayDateOld=$CurrentDate->addDay(-14);
      $last30dayDateOld=Carbon::parse('first day of last month');
      $last365dayDateOld=$CurrentDate->addDay(-730);
      
      // dd($last30dayDate);

      $ProductCount=products::where('display',1)->count();
      $UserCount=User::where('status',0)->count();

      //all time
      $TotalProfitAllTime=DB::table('orders')
      ->join('orders_details','orders.id','=','orders_details.order_id')
      ->where('orders.status',3)
      ->select('orders_details.profit')
      ->distinct()
      ->get();
      $TotalProfitAllTime=$TotalProfitAllTime->sum('profit');
      //today
      $TotalProfitToday=DB::table('orders')
      ->join('orders_details','orders.id','=','orders_details.order_id')
      ->where('orders.updated_at','>',$YesterdayDate)
      ->where('orders.status',3)
      ->select('orders_details.profit')
      ->distinct()
      ->get();
      $TotalProfitToday=$TotalProfitToday->sum('profit');

      //last 7 day
      $TotalProfit7Day=DB::table('orders')
      ->join('orders_details','orders.id','=','orders_details.order_id')
      ->where('orders.updated_at','>',$last7dayDate)
      ->where('orders.status',3)
      ->select('orders_details.profit')
      ->distinct()
      ->get();
      $TotalProfit7Day=$TotalProfit7Day->sum('profit');

      //last 30 day
      $TotalProfit30Day=DB::table('orders')
      ->join('orders_details','orders.id','=','orders_details.order_id')
      ->where('orders.updated_at','>',$last30dayDate)
      ->where('orders.status',3)
      ->select('orders_details.profit')
      ->distinct()
      ->get();
      $TotalProfit30Day=$TotalProfit30Day->sum('profit');

      //last 365 day
      $TotalProfit365Day=DB::table('orders')
      ->join('orders_details','orders.id','=','orders_details.order_id')
      ->where('orders.updated_at','>',$last365dayDate)
      ->where('orders.status',3)
      ->select('orders_details.profit')
      ->distinct()
      ->get();
      $TotalProfit365Day=$TotalProfit365Day->sum('profit');

      //compare with pass
      //today old
      $TotalProfitTodayOld=DB::table('orders')
      ->join('orders_details','orders.id','=','orders_details.order_id')
      ->where('orders.updated_at','<',$YesterdayDate)
      ->where('orders.updated_at','>',$YesterdayDateOld)
      ->where('orders.status',3)
      ->select('orders_details.profit')
      ->distinct()
      ->get();
      $TotalProfitTodayOld = $TotalProfitTodayOld->sum('profit');
      $DiffToday = $TotalProfitToday - $TotalProfitTodayOld;
      $PercentToday = ($DiffToday / $TotalProfitToday)*100;

      //last 7 day old
      $TotalProfit7DayOld=DB::table('orders')
      ->join('orders_details','orders.id','=','orders_details.order_id')
      ->where('orders.updated_at','<',$last7dayDate)
      ->where('orders.updated_at','>',$last7dayDateOld)
      ->where('orders.status',3)
      ->select('orders_details.profit')
      ->distinct()
      ->get();
      $TotalProfit7DayOld=$TotalProfit7DayOld->sum('profit');
      $Diff7Day = $TotalProfit7Day - $TotalProfit7DayOld;
      $Percent7Day = ($Diff7Day / $TotalProfit7Day)*100;

      //last 30 day old
      $TotalProfit30DayOld=DB::table('orders')
      ->join('orders_details','orders.id','=','orders_details.order_id')
      ->where('orders.updated_at','<',$last30dayDate)
      ->where('orders.updated_at','>',$last30dayDateOld)
      ->where('orders.status',3)
      ->select('orders_details.profit')
      ->distinct()
      ->get();
      $TotalProfit30DayOld=$TotalProfit30DayOld->sum('profit');
      $Diff30Day = $TotalProfit30Day - $TotalProfit30DayOld;
      $Percent30Day = ($Diff30Day / $TotalProfit30Day)*100;

      //last 365 day old
      $TotalProfit365DayOld=DB::table('orders')
      ->join('orders_details','orders.id','=','orders_details.order_id')
      ->where('orders.updated_at','<',$last365dayDate)
      ->where('orders.updated_at','>',$last365dayDateOld)
      ->where('orders.status',3)
      ->select('orders_details.profit')
      ->distinct()
      ->get();
      $TotalProfit365DayOld=$TotalProfit365DayOld->sum('profit');
      $Diff365Day = $TotalProfit365Day - $TotalProfit365DayOld;
      $Percent365Day = ($Diff365Day / $TotalProfit365Day)*100;

      //order
      $NewOrder=DB::table('orders')
      ->where('status',1)
      ->count();
      $ProcessingOrder=DB::table('orders')
      ->where('status',2)
      ->count();
      $CompletedOrder=DB::table('orders')
      ->where('status',3)
      ->count();
      $CancelledOrder=DB::table('orders')
      ->where('status',4)
      ->count();

      // $IdProduct=DB::table('orders')
      // ->join('orders_details','orders.id','=','orders_details.order_id')
      // ->where('orders.status',3)
      // ->selectRaw('COUNT (orders_details.product_id as id)')
      // ->groupBy('orders_details.product_id')
      // ->count();
      // dd($IdProduct);
      return view('Admin.profit',compact('TotalProfitAllTime','ProductCount','UserCount','TotalProfitToday','TotalProfit7Day','NewOrder','ProcessingOrder','CompletedOrder','CancelledOrder',
      'TotalProfit30Day','TotalProfit365Day','DiffToday','PercentToday','Diff7Day','Percent7Day','Diff30Day','Percent30Day','Diff365Day','Percent365Day'));
   }
   public function filter_by_date(Request $request)
   {
      $data = $request->all();
      $from_date = $data['from_date'];
      $to_date = $data['to_date'];
      $get = statistic::whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','ASC')->get();
         foreach($get as $key => $val){
            $chart_data[]= array(
               'period' => $val->order_date,
               'order' => $val->total_order,
               'sales' => $val->sales,
               'profit' => $val->profit,
               'quantity' => $val->quantity,
            );
         }
      echo $data = json_encode($chart_data);
   }
   public function dashboard_filter(Request $request)
   {
      $data = $request->all();
      $dauthangnay = \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
      $dauthangtruoc = \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
      $cuoithangtruoc = \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

      $sub7day = \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
      $sub365day = \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

      $now = \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

      if($data['dashboard_value']=='7ngay'){
         $get = statistic::whereBetween('order_date',[$sub7day,$now])->orderBy('order_date','ASC')->get();
      }elseif($data['dashboard_value']=='thangtruoc'){
         $get = statistic::whereBetween('order_date',[$dauthangtruoc,$cuoithangtruoc])->orderBy('order_date','ASC')->get();
      }elseif($data['dashboard_value']=='thangnay'){
         $get = statistic::whereBetween('order_date',[$dauthangnay,$now])->orderBy('order_date','ASC')->get();
      }else{
         $get = statistic::whereBetween('order_date',[$sub365day,$now])->orderBy('order_date','ASC')->get();
      }

      foreach($get as $key => $val){
         $chart_data[]= array(
            'period' => $val->order_date,
            'order' => $val->total_order,
            'sales' => $val->sales,
            'profit' => $val->profit,
            'quantity' => $val->quantity,
         );
      }
      echo $data = json_encode($chart_data);
   }
   public function days_order(Request $request)
   {
      $sub30day = \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->toDateString();
      $now = \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

      $get = statistic::whereBetween('order_date',[$sub30day,$now])->orderBy('order_date','ASC')->get();
         foreach($get as $key => $val){
            $chart_data[]= array(
               'period' => $val->order_date,
               'order' => $val->total_order,
               'sales' => $val->sales,
               'profit' => $val->profit,
               'quantity' => $val->quantity,
            );
         }
      echo $data = json_encode($chart_data);
   }


   public function feedback(Request $req)
   {
      $feedback = feedback::all();
      return view('admin.feedback', compact('feedback'));
   }
   public function feedback_post(Request $req)
   {
      $feedback = feedback::all();
      $pro = feedback::find($req->id);
      if ($pro->status == 0) {
         $pro->update([
            'status' => $req->status
         ]);
         return redirect()->back()->with('add_success', 'Cập nhật Trạng Thái thành công');
      } elseif ($pro->status == 1) {
         $pro->update([
            'status' => $req->status
         ]);
         return redirect()->back()->with('add_success', 'Cập nhật Trạng Thái thành công');
      }

      return view('admin.feedback', compact('feedback'));
   }
   public function update_profile()
   {
      return view('admin.auth.profile');
   }

   public function post_update_profile(RequestAdminUpdateProfile $req)
   {
      //  dd(auth('admin')->user()->image);
      if ($req->has('fileInput')) {
         $file = $req->fileInput;
         $file_name = $file->getClientOriginalName();
         $file->move(public_path('uploads'), $file_name);
      } else {
         $file_name = auth('admin')->user()->image;
      }
      $id = (auth::guard('admin')->user()->id);
      $update_admin = Admin::find($id);
      $update_admin->name = $req->name;
      $update_admin->email = $req->email;
      $update_admin->image = $file_name;
      $update_admin->save();
      return redirect()->back()->with('add_success', "Thêm mới Slider thành công");;
   }

   public function show_list_admin(Controller $contron)
   {
      // $contron->handle();
      $list_admin = Admin::get();
      return view('admin.auth.list_account_admin', compact('list_admin'));
   }

   public function show_detail_account_admin($id)
   {
      $detail_admin = Admin::find($id);
      return view('admin.auth.detail_account_admin', compact('detail_admin'));
   }

   public function update_detail_account_admin($id, Request $req)
   {

      $acc = Admin::find($id);
      $role_now = (auth::guard('admin')->user()->role);
      if ($role_now < $acc->role && $id != auth::guard('admin')->user()->id) {
         $acc->status = $req->status;
         $acc->role = $req->role;
         $acc->save();
         // session()->flash('success', 'Cập nhật thông tin thành công!');
         return redirect()->route('admin.list.admin')->with('add_success', "Cập nhật thông tin thành công!");
      } else {
         // session()->flash('error', 'Bạn không có quyền thực hiện chức năng này!');
         return redirect()->route('admin.list.admin')->with('error', "Bạn không có quyền thực hiện chứ năng này!");
      }
   }
   public function show_list_customer()
   {
      $list_customer = User::get();
      return view('admin.auth.list_account_customer', compact('list_customer'));
   }


   public function show_detail_account_customer($id)
   {
      $detail_customer = User::find($id);
      return view('admin.auth.detail_account_customer', compact('detail_customer'));
   }
   public function update_detail_account_customer($id, Request $req)
   {

      $acc = User::find($id);
      $role_now = (auth::guard('admin')->user()->role);
      if ($role_now == 0) {
         $acc->status = $req->status;
         $acc->save();
         // session()->flash('success', 'Cập nhật thông tin thành công!');
         return redirect()->route('admin.list.customer')->with('edit_success', "Cập nhật thông tin thành công!");
      } else {
         session()->flash('error', 'Bạn không có quyền thực hiện chức năng này!');
         return redirect()->route('admin.list.customer')->with('error', "Bạn không có quyền thực hiện chứ năng này!");
      }
   }

   public function show_change_password()
   {
      return view('admin.auth.change_password');
   }

   public function change_password(RequestAdminChangePassword $req)
   {
      if (Hash::check($req->current_password, auth('admin')->user()->password)) {
         $user = Admin::find(auth('admin')->user()->id);
         $user->password = Hash::make($req->new_password);
         $user->save();
         session()->flash('success', 'Đổi mật khẩu thành công!');
         return redirect()->route('change.password')->with('edit_success', "Đổi mật khẩu thất bại!");
      } else {
         return redirect()->route('change.password')->with('error', "Đổi mật khẩu thất bại!");
      }
   }

   public function show_register_account_admin()
   {
      return view('admin.auth.register_account_admin');
   }

   public function register_account_admin(RequestAdminRegisterAccount $req)
   {
      $regis = Admin::create([
         'name' => $req->name,
         'email' => $req->email,
         'password' => Hash::make($req->password),
         'role' => $req->role,
      ]);
      if ($regis) {
         return redirect()->route('admin.list.admin')->with('add_success', "Tạo tài khoản thành công!");
      } else {
         return redirect()->route('admin.list.admin')->with('error', "Tạo tài khoản thất bại!");
      }
   }

   public function delete_account_admin($id)
   {
      $acc = Admin::find($id);
      $role_now = (auth::guard('admin')->user()->role);
      if ($role_now < $acc->role && $id != auth::guard('admin')->user()->id) {
         $delete = Admin::destroy($id);
         // session()->flash('success', 'Xoá tài khoản thành công!');
         return redirect()->route('admin.list.admin')->with('delete_success', "Xoá tài khoản thành công!");
      } else {
         // session()->flash('error', 'Bạn không có quyền thực hiện chức năng này!');
         return redirect()->route('admin.list.admin')->with('error', "Bạn không có quyền thực hiện chức năng này!");
      }
   }

   public function show_mail_to_repass()
   {
      return view('admin.auth.mail_repass');
   }

   public function post_mail_to_repass(RequestAdminMailToRepass $req)
   {
      // dd($req->_token);
      $check = Admin::where('email', $req->email)->first();
      if ($check) {
         DB::table('password_resets')->insert([
            'email' => $req->email,
            'token' => $req->_token
         ]);
         Mail::to($req->email)->send(new SendMail($req->email, "repass", $req->_token));
         return redirect()->route('show.admin.login')->with('warning', "Vui lòng xác nhận trong email của bạn");
      } else {
         return redirect()->back()->with('error', "Thông tin không hợp lệ");
      }
   }

   public function show_reset_pass_admin(Request $req)
   {
      $email = $req->email;
      return view('admin.auth.form_repass', compact('email'));
   }

   public function reset_pass_admin(RequestAdminResetPass $req)
   {
      $acc = Admin::where('email', $req->email)->first();
      $acc->update([
         'password' => Hash::make($req->password)
      ]);
      $info = DB::table('password_resets')->where('email', $req->email)->delete();

      return redirect()->route('show.admin.login')->with('warning', "Lấy lại mật khẩu thành công");;
   }
}
