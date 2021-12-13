<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\category;
use App\Models\logo;
use App\Models\product_image;
use App\Models\products;
use App\Models\slider;
use App\Models\rating;
use App\Models\Comment;
use App\Models\User;
use App\Models\orders;
use App\Models\orders_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\favorite;
use App\Models\Cart;
use App\Models\color;
use App\Models\products_size;
use App\Models\products_color;
use App\Models\size;
use App\Models\statistic;
use App\Http\Requests\Customer\CheckoutRequest;
use App\Models\item;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class CustomerController extends Controller
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
    public function index()
    {
       $slider = slider::where('status',1)->orderBy('position','asc')->get();
       
       $topbanner = Banner::where('status',1)->orderBy('position','asc')->limit(3)->get();
       $banner = Banner::where('status',1)->orderBy('position','desc')->limit(2)->get();

       $new_product = products::where('status',1)->orderBy('id','desc')->limit(8)->get();
       $Latest=Blog::orderBy('created_at','ASC')->limit(10)->get();
       $anh_phu = [];
       foreach ($new_product as $key => $value) {
           $anhPhu = product_image::where('product_id',$value->id)->first('image');
           $anh_phu[$value->id] = $anhPhu;
       }

       
       $sale_product = products::where('status',1)->where('sale_price','>',0)->orderBy('id','desc')->get();
       $data = $this->get_data();
       session()->flash('success', 'vào home');
        return view('Customer.Home',compact('data','slider','topbanner','banner','new_product','anh_phu','sale_product','Latest'))->with('add_success','trang home');
    }
    public function shop()
    {
        $data = $this->get_data();
        $category = category::all();
        $cate_user = category::where('status',1)->orderBy('name','ASC')->get() ;
        return view('Customer.Shop',compact('category','cate_user','data'));
    }
    
    public function rating(Request $request)
    {
        $rating = rating::where($request->only('user_id','product_id'))->first();
        // dd($request->only('user_id','product_id'));
        if($rating){
            $rating->update(['number'=>$request->number]);

        }else{
            rating::create($request->all());
        }
        return redirect()->back();
    }

    public function comment(Request $request)
    {
        $comment = Comment::where($request->only('user_id','product_id'))->first();
        if($comment){
            $comment->update(['content'=>$request->content]);
        }else{
            Comment::create($request->all());
        }
        return redirect()->back();
    }
 
    public function order_history()
    {
        $data = $this->get_data();
        $user=auth::id();
        $sum =0;
        if($user){
            $getOrder=orders::where('user_id',$user)
            ->orderby('created_at','DESC')
            ->paginate(8);
            // dd($getOrder[0]->total_price);

            $getOrderActive=orders::where('user_id',$user)
            ->where('status','<>','4')
            ->orderby('created_at','DESC')
            ->paginate(8);

            foreach($getOrderActive as $go){
                $sum = $sum + $go->total_price;
            }
            $banner_page = item::where('status', 1)
            ->where('page', 'orders_history')->first();
            // dd($sum);

            return view('Customer.OrderHistory',compact('banner_page','getOrder','data','sum'));
        }else{
            return view('Customer.Account.Login',compact('data'))->with('error','You need to login first!');
        }
    }

    public function cancel_order($id)
    {
        // dd($id);
        $affected = DB::table('orders')
        ->where('id', $id)
        ->update(['status' => 4]);
        return  redirect()->back();
    }

    public function detail_history($id)
    {
        $data = $this->get_data();
        $user=auth::id();
        if($user){
            $orderDetail= DB::table('orders_details')
            ->join('orders','orders.id','=','orders_details.order_id')
            ->join('products','products.id','=','orders_details.product_id')
            ->where('orders_details.order_id',$id)
            ->where('orders.user_id',$user)
            ->paginate(8);
            $banner_page = item::where('status', 1)
            ->where('page', 'Order_History_detail')->first();
            // dd($orderDetail);
            return view('Customer.DetailHistory',compact('banner_page','orderDetail','data'));
        }else{
            return view('Customer.Account.Login',compact('data'))->with('error','You need to login first!');
        }
    }

   

    
    public function blog()
    {
        $data = $this->get_data();
        return view('Customer.Blog', compact('data'));
    }
    public function blog_detail()
    {
        $data = $this->get_data();
        return view('Customer.Blog_detail', compact('data'));
    }
    public function contact()
    {
        $data = $this->get_data();
        return view('Customer.Contact', compact('data'));
    }
    public function checkout()
    {
        $cart = Cart::where('user_id', Auth::id())
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->join('sizes', 'sizes.id', '=', 'carts.size_id')
            ->join('colors', 'colors.id', '=', 'carts.color_id')
            ->join('products_sizes', function ($join) {
                $join->on('products_sizes.size_id', '=', 'carts.size_id');
                $join->on('products_sizes.product_id', '=', 'carts.product_id');
            })
            ->select('carts.*', 'products.name', 'sizes.name as size_name', 'colors.name as color_name', 'products_sizes.import_price', 'products_sizes.price as export_price', 'products.sale_price')
            ->get();
        // dd($cart);
        $banner_page = item::where('status', 1)
        ->where('page', 'checkout')->first();
        $data = $this->get_data();
        return view('Customer.Checkout', compact('banner_page','data', 'cart'));
    }
    public function post_checkout(CheckoutRequest $req)
    {
        $cart = Cart::where('user_id', Auth::id())
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->join('sizes', 'sizes.id', '=', 'carts.size_id')
            ->join('colors', 'colors.id', '=', 'carts.color_id')
            ->join('products_sizes', function ($join) {
                $join->on('products_sizes.size_id', '=', 'carts.size_id');
                $join->on('products_sizes.product_id', '=', 'carts.product_id');
            })
            ->select('carts.*', 'products.name', 'sizes.name as size_name', 'colors.name as color_name', 'products_sizes.import_price', 'products_sizes.price as export_price', 'products.sale_price')
            ->get();
        // dd(count($cart));
        if (count($cart)>0) {
            $orders = orders::create([
                'name' => $req->name,
                'email' => $req->email,
                'address' => $req->address,
                'phone' => $req->phone,
                'note' => $req->note,
                'status' => 0,
                'total_price' => $req->total,
                'user_id' => Auth::id()
            ]);
            $id_order_detail = $orders->id;
            //  dd($id_order_detail);
            foreach ($cart as $item) {
                $orders_detail = orders_detail::create([
                    'order_id' => $id_order_detail,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'profit' => $item->price - $item->import_price,
                    'product_id' => $item->product_id,
                    'color_id' => $item->color_id,
                    'size_id' => $item->size_id,
                ]);
            }
            if ($orders) {
                Cart::where('user_id', Auth::id())->delete();
                $data = $this->get_data();
                // $detail_checkout=orders_detail::where('order_id',$id_order_detail)->get();
                $complete_checkout=orders::where('user_id',Auth::id())->where('id',$id_order_detail)->first();
                $detail_checkout = orders_detail::where('order_id', $id_order_detail)
            ->join('products', 'products.id', '=', 'orders_details.product_id')
            ->join('sizes', 'sizes.id', '=', 'orders_details.size_id')
            ->join('colors', 'colors.id', '=', 'orders_details.color_id')
            ->join('products_sizes', function ($join) {
                $join->on('products_sizes.size_id', '=', 'orders_details.size_id');
                $join->on('products_sizes.product_id', '=', 'orders_details.product_id');
            })
            ->select('orders_details.*', 'products.name','products.image', 'sizes.name as size_name', 'colors.name as color_name', 'products_sizes.import_price', 'products_sizes.price as export_price', 'products.sale_price')
            ->get();
            // dd($detail_checkout);
                
                // quang anh update vao bang statistical
                    // $order_date=orders::where('status',3)->select('created_at')->get();
                    // $order_date = str_replace(']','',strchr($order_date.date("Y-m-d"),']'));
                    $tomorowDate = Carbon::tomorrow('Asia/Ho_Chi_Minh');
                    $yesterdayDate = Carbon::yesterday('Asia/Ho_Chi_Minh');
                    // ngayhomnay    
                    $order_date = Carbon::now('Asia/Ho_Chi_Minh') ->format("Y-m-d");      
                    // tong doanh so cuar order ngay hom nay
                    $sales = orders::where('status',3)
                    ->select('total_price')
                    ->where('updated_at','<',$tomorowDate)
                    ->where('updated_at','>',$yesterdayDate)
                    ->sum('total_price');
                    //tong loi nhuan hom nay
                    $profit = orders::where('orders.status',3)
                    ->join('orders_details','orders_details.order_id','=','orders.id')
                    ->select('orders_details.*','orders.*')
                    ->where('orders.updated_at','<',$tomorowDate)
                    ->where('orders.updated_at','>',$yesterdayDate)
                    ->sum('orders_details.profit');
                    //so luong san pham hom nay
                    $quantity = orders::where('orders.status',3)
                    ->join('orders_details','orders_details.order_id','=','orders.id')
                    ->select('orders_details.product_id')
                    ->where('orders.updated_at','<',$tomorowDate)
                    ->where('orders.updated_at','>',$yesterdayDate)
                    ->sum('orders_details.quantity');
                    //so luong order hom nay
                
                    $total_order=orders::where('status',3)
                    ->select('*')
                    ->where('updated_at','<',$tomorowDate)
                    ->where('updated_at','>',$yesterdayDate)
                    ->count();
                    //check ngay gan nhat
                    $nearDay=statistic::select('order_date')->orderBy('order_date','DESC')->first();
                    $nearId=statistic::select('id_statistical')->where('order_date',$nearDay->order_date)->orderBy('order_date','DESC')->first();
                    // dd($yesterdayDate->toDateString());
                    // dd($nearDay->order_date);
                    if($nearDay->order_date > $yesterdayDate->toDateString()){
                        // dd(123);
                        DB::table('tbl_statistical')
                            ->where('id_statistical',$nearId->id_statistical)
                            ->update([
                            'order_date' => $order_date,
                            'sales' => $sales,
                            'profit' => $profit,
                            'quantity' => $quantity,
                            'total_order' => $total_order,
                            ]);         
                    }else{       
                        // dd(456);
                        statistic::create([
                            'order_date' => $order_date,
                            'sales' => $sales,
                            'profit' => $profit,
                            'quantity' => $quantity,
                            'total_order' => $total_order,
                        ]);         
                    }                   
                    // dd($nearDay);

                return view('Customer.Complete_checkout', compact('data','complete_checkout','detail_checkout'));

            } else {
                return redirect()->back()->with('error','Đặt hàng thất bại!');
            }
        }else{
            return redirect()->back()->with('error','Đặt hàng thất bại!');
        }
    }
    public function cartproduct()
    {
        $banner_page = item::where('status', 1)
        ->where('page', 'view_cart')->first();
        $data = $this->get_data();
        $sizes = products_size::join('sizes', 'products_sizes.size_id', 'sizes.id')->get();
        $colors = products_color::join('colors', 'products_colors.color_id', 'colors.id')->get();
        return view('Customer.Cart.Cart', compact('banner_page','data', 'sizes', 'colors'));
    }
    public function favorite()
    {
        $banner_page = item::where('status', 1)
        ->where('page', 'Wishlist')->first();
        $data = $this->get_data();
        return view('Customer.Favorite.Favorite', compact('data','banner_page'));
    }
}
