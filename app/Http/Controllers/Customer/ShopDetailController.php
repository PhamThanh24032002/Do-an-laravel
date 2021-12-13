<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\size;
use App\Models\products_size;
use App\Models\color;
use App\Models\products_color;
use App\Models\category;
use App\Models\favorite;
use App\Models\item;
use App\Models\product_image;
use App\Models\rating;
use App\Models\User;
use App\Models\orders_detail;
use App\Models\orders;

class ShopDetailController extends Controller
{
    public function get_data()
    {
        $data = [];
        if (Auth::check()) {
            $data['listFavorite'] = favorite::where("user_id", Auth::id())->get();
            $data['wl_page'] = favorite::where("user_id", Auth::id())->join('products', 'products.id', '=', 'favorites.product_id')->get(['favorites.id as wl_id', 'favorites.user_id', 'products.*']);
            $data['cl_page'] = Cart::where("user_id", Auth::id())->join('products', 'products.id', '=', 'carts.product_id')->get(['carts.*', 'products.price as pro_price', 'products.image', 'products.name', 'products.sale_price'])->toArray();
        }
        return $data;
    }

    public function price_size(Request $request, $id){
        dd('pS');
        if($request->ajax())
        {
            // dd($request->ajax());
            $output="";
            $products=DB::table('products')->where('title','LIKE','%'.$request->search."%")->get();
            if($products){
                foreach ($products as $key => $product) {
                $output.='<tr>'.
                '<td>'.$product->id.'</td>'.
                '<td>'.$product->title.'</td>'.
                '<td>'.$product->description.'</td>'.
                '<td>'.$product->price.'</td>'.
                '</tr>';
                }

            }
        }
    }

    public function shop_detail($id){
        //color product
        $user=auth::id();

        $color=DB::table('products_colors')
        ->join('colors', 'colors.id', '=', 'products_colors.color_id')
        ->where('product_id',$id)
        ->select('colors.name','colors.id','colors.values','products_colors.color_id','products_colors.product_id')
        ->get();

        //color product
        $size=DB::table('products_sizes')
        ->join('sizes', 'sizes.id', '=', 'products_sizes.size_id')
        ->where('products_sizes.product_id',$id)
        ->select('sizes.name','sizes.id','products_sizes.size_id','products_sizes.product_id','products_sizes.price')
        ->get();

        //color product
        $CatePro=DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->where('products.id',$id)
        ->select('categories.name','products.*')
        ->get();


        //product
        $pro = DB::table('products')
                // ->where('display', '=', '1')
                ->where('id', '=', $id)
                ->get();
        $product = $pro->all()[0];

        // rating 
        $Mrating=rating::where('product_id',$id)->avg('number');
        $Mrating=round($Mrating,1);
        $Crating=rating::where('product_id',$id)->count('user_id');
        // dd($Crating);

        //sub_image     
        $proImg = product_image::where('product_id',$product->id)->first();  
        $sub_img = $proImg;
        $proSubImg2 = product_image::where('product_id',$product->id)->limit(3)->get();;
        $sub_img_2= $proSubImg2[1];
        $proSubImg3 = product_image::where('product_id',$product->id)->limit(3)->get();
        $sub_img_3= $proSubImg3[2];
        
        
        // relate product 
        $relatePro = DB::table('products')
        ->where('display', '=', '1')
        ->where('category_id', '=', $product->category_id)
        ->limit(4)
        ->get();

        //sub relate image
        $Rsub_img = [];        
        foreach($relatePro as $key => $value){
            $RproImg = product_image::where('product_id',$value->id)->first();
            $Rsub_img[$value -> id] = $RproImg->image;
        }   
        $Rsub_img_2 = [];
        foreach($relatePro as $key => $value){
            $RproSubImg2 = product_image::where('product_id',$value->id)->limit(3)->get();
            $Rsub_img_2[$value -> id]= $RproSubImg2[1]->image;
        }
        
        $Rsub_img_3 = [];
        foreach($relatePro as $key => $value){
            $RproSubImg3 = product_image::where('product_id',$value->id)->limit(3)->get();
            $Rsub_img_3[$value -> id]= $RproSubImg3[2]->image;
        }

        
        $UserInfor=User::where('id',$user)->first();
        // dd($UserInfor);
        $showCmt= DB::table('users')
        ->join('comments', 'users.id', '=', 'comments.user_id')
        ->where('comments.status',1)
        ->where('comments.product_id',$id)
        ->get();
        // dd($showCmt);
        $userRating= DB::table('users')
        ->join('ratings', 'users.id', '=', 'ratings.user_id')
        ->where('ratings.status',1)
        ->where('ratings.product_id',$id)
        ->get();
        // dd($userRating[0]->product_id);
        $data = $this->get_data();

        $getOrder= DB::table('orders')
        ->join('orders_details', 'orders_details.order_id', '=', 'orders.id')
        ->where('orders.user_id',$user)
        ->where('orders.status',3)
        ->where('orders_details.product_id',$id)
        ->get();
        $getOrder=$getOrder->all();
        // dd($getOrder);
        $banner_page = item::where('status', 1)
        ->where('page', 'shop_detail')->first();
        // dd($banner_page);
        return view('Customer.Shop_detail', compact('banner_page','getOrder','product','data','color','size','sub_img','sub_img_2','sub_img_3','Rsub_img','Rsub_img_2','Rsub_img_3','relatePro','user','UserInfor','Mrating','Crating','showCmt','userRating','CatePro'));
    }
}
