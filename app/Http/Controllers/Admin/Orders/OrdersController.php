<?php

namespace App\Http\Controllers\admin\Orders;

use App\Http\Controllers\Controller;
use App\Models\orders;
use App\Models\orders_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
   public function orders()
   {
      if (isset($_GET['s'])) {
         $search_text = $_GET['s'];
         // dd($search_text);
         $orders0 =  orders::leftjoin('users', 'users.id', '=', 'orders.user_id')
            ->select('orders.*', 'users.image as avata')
            ->where('orders.name', 'LIKE', '%' . $search_text . '%')
            ->where('orders.status', 0)
            ->orderBy('orders.id', 'DESC')
            ->paginate(9);
      } else {
         $orders0 = orders::leftjoin('users', 'users.id', '=', 'orders.user_id')
            ->select('orders.*', 'users.image as avata')
            ->where('orders.status', 0)
            ->orderBy('orders.id', 'DESC')
            ->paginate(9);
      }

      if (isset($_GET['s1'])) {
         $search_text = $_GET['s1'];
         // dd($search_text);
         $orders1 =  orders::leftjoin('users', 'users.id', '=', 'orders.user_id')
            ->select('orders.*', 'users.image as avata')
            ->where('orders.name', 'LIKE', '%' . $search_text . '%')
            ->where('orders.status', 1)
            ->orderBy('orders.id', 'DESC')
            ->paginate(9);
      } else {
         $orders1 = orders::leftjoin('users', 'users.id', '=', 'orders.user_id')
            ->select('orders.*', 'users.image as avata')
            ->where('orders.status', 1)
            ->orderBy('orders.id', 'DESC')
            ->paginate(9);
      }


      if (isset($_GET['s2'])) {
         $search_text = $_GET['s2'];
         // dd($search_text);
         $orders2 =  orders::leftjoin('users', 'users.id', '=', 'orders.user_id')
            ->select('orders.*', 'users.image as avata')
            ->where('orders.name', 'LIKE', '%' . $search_text . '%')
            ->where('orders.status', 2)
            ->orderBy('orders.id', 'DESC')
            ->paginate(9);
      } else {
         $orders2 = orders::leftjoin('users', 'users.id', '=', 'orders.user_id')
            ->select('orders.*', 'users.image as avata')
            ->where('orders.status', 2)
            ->orderBy('orders.id', 'DESC')
            ->paginate(9);
      }

      if (isset($_GET['s3'])) {
         $search_text = $_GET['s3'];
         // dd($search_text);
         $orders3 =  orders::leftjoin('users', 'users.id', '=', 'orders.user_id')
            ->select('orders.*', 'users.image as avata')
            ->where('orders.name', 'LIKE', '%' . $search_text . '%')
            ->where('orders.status', 3)
            ->orderBy('orders.id', 'DESC')
            ->paginate(9);
      } else {
         $orders3 = orders::leftjoin('users', 'users.id', '=', 'orders.user_id')
            ->select('orders.*', 'users.image as avata')
            ->where('orders.status', 3)
            ->orderBy('orders.id', 'DESC')
            ->paginate(9);
      }

      if (isset($_GET['s4'])) {
         $search_text = $_GET['s4'];
         // dd($search_text);
         $orders4 =  orders::leftjoin('users', 'users.id', '=', 'orders.user_id')
            ->select('orders.*', 'users.image as avata')
            ->where('orders.name', 'LIKE', '%' . $search_text . '%')
            ->where('orders.status', 4)
            ->orderBy('orders.id', 'DESC')
            ->paginate(9);
      } else {
         $orders4 = orders::leftjoin('users', 'users.id', '=', 'orders.user_id')
            ->select('orders.*', 'users.image as avata')
            ->where('orders.status', 4)
            ->orderBy('orders.id', 'DESC')
            ->paginate(9);
      }

      return view('admin.orders.orders', compact('orders0', 'orders1', 'orders2', 'orders3', 'orders4'));
   }

   public function orders_detail($order_id)
   {
      $order = orders::find($order_id);

      $orders_details = orders_detail::rightjoin('products', 'products.id', '=', 'orders_details.product_id')
         ->join('sizes', 'sizes.id', '=', 'orders_details.size_id')
         ->join('colors', 'colors.id', '=', 'orders_details.color_id')
         ->select('products.*', 'orders_details.quantity as quantity', 'orders_details.price as price', 'sizes.name as sizename', 'colors.name as colorname')
         ->where('order_id', $order_id)->get();

      return view('Admin.orders.orders_detail', compact('orders_details', 'order'));
   }
   public function orders_detail_post(Request $req, $order_id)
   {
      $pro = orders::find($order_id);
      if ($pro->status == 3) {
         // dd($order_id);

         return redirect()->back()->with('error', 'Đơn hàng của bạn đã giao, không thể cập nhật');
      } elseif ($pro->status == 2) {
         if ($req->status == 1) {
            return redirect()->back()->with('error', 'Đơn hàng của bạn đang giao, không hủy');
         } else {
            dd(77);
            $pro->update([
               'status' => $req->status
            ]);
            return redirect()->back()->with('add_success', 'Cập nhật đơn hàng thành công');
         }
      } else {
         if ($pro->status == 3) {
            $pro->update([
               'status' => $req->status
            ]);
         } else {
            $pro->update([
               'status' => $req->status
            ]);
         }


         return redirect()->back()->with('add_success', 'Cập nhật đơn hàng thành công');
      }
   }
}
