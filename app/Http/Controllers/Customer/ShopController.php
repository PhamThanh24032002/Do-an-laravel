<?php

namespace App\Http\Controllers\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\products;
use App\Models\category;
use App\Models\color;
use App\Models\favorite;
use App\Models\item;
use App\Models\size;
use App\Models\product_image;
use App\Models\products_size;
use App\Models\products_color;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

class ShopController extends Controller
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
    public function list(Request $request)
    {                     
        $color=color::where('status','1')->get();
        $size=size::where('status','1')->get();
        $proPerPage=3;

        //display feature product
        $proFeature=products::where('display','1')
        ->limit(3)
        ->latest()
        ->get();

        $product = DB::table('products')
                ->where('display', '=', '1')
                ->OrderBy('products.id', 'ASC')
                ->paginate($proPerPage);
                // dd($product);


        //cate filter module
        if (isset($_GET['cateFilter'])) {
            $cate = $_GET['cateFilter'];
            // dd($cate);
            $product = DB::table('products')
                ->where('category_id', '=', $cate)
                ->where('display', '=', '1')
                ->OrderBy('products.id', 'ASC')
                ->paginate($proPerPage);                
        }
        //Search module
        if (isset($_GET['s'])) {
            $search_text = $_GET['s'];
            $product = DB::table('products')
                ->where('name', 'LIKE', '%' . $search_text . '%')
                ->where('display', '=', '1')
                ->OrderBy('products.id', 'ASC')
                ->paginate($proPerPage);                
        }
        
         //Sort module         
         if (isset($_GET['orderBy'])) {
            // dd($_GET['orderBy']);
            $sorting = $_GET['orderBy'];
            if ($sorting == 'name') {
                $product = DB::table('products')
                    ->where('display', '=', '1')
                    ->OrderBy('products.name', 'ASC')
                    ->paginate($proPerPage);
            } elseif ($sorting == 'priceAsc') {
                $product = DB::table('products')
                    ->where('display', '=', '1')
                    ->OrderBy('products.price', 'ASC')
                    ->paginate($proPerPage);
            } elseif ($sorting == 'priceDesc') {
                $product = DB::table('products')
                    ->where('display', '=', '1')
                    ->OrderBy('products.price', 'DESC')
                    ->paginate($proPerPage);
            } elseif ($sorting == 'new') {
                $product = DB::table('products')
                    ->where('display', '=', '1')
                    ->OrderBy('products.created_at', 'DESC')
                    ->paginate($proPerPage);
            } elseif ($sorting == 'sale') {
                $product = DB::table('products')
                    ->where('display', '=', '1')
                    ->where('sale_price', '>', 'price')
                    ->OrderBy('products.name', 'DESC')
                    ->paginate($proPerPage);
            } 
        }else{
            
        }
        $sub_img = [];        
        foreach($product as $key => $value){
            $proImg = product_image::where('product_id',$value->id)->first();
            $sub_img[$value -> id] = $proImg->image;
            // dd($sub_img);
        }   
        // dd($sub_img);
        $sub_img_2 = [];
        foreach($product as $key => $value){
            $proSubImg2 = product_image::where('product_id',$value->id)->limit(3)->get();
            $sub_img_2[$value -> id]= $proSubImg2[1]->image;
        }
        
        $sub_img_3 = [];
        foreach($product as $key => $value){
            $proSubImg3 = product_image::where('product_id',$value->id)->limit(3)->get();
            $sub_img_3[$value -> id]= $proSubImg3[2]->image;
        }

        //Proceduce

        
        // Filter module 
        $hasFilter=0;
        if (isset($_GET['priceFilter'])) {
            $priceFilter=explode(" - ",str_replace('$', '',$_GET['priceFilter']));  
            $hasFilter=1;                      
        }
        if (isset($_GET['sizeFilter'])) {
            $sizeFilter=$_GET['sizeFilter']; 
            $hasFilter=1;        
        }
        if (isset($_GET['colorFilter'])) {
            $colorFilter=$_GET['colorFilter'];   
            $hasFilter=1; 
        }
        // dd($product);
        if($hasFilter==1){
            if (isset($_GET['priceFilter']) && isset($_GET['sizeFilter'])){   
                $product=[];        
                $product1= DB::table('products')
                        ->join('products_sizes', 'products.id', '=', 'products_sizes.product_id')
                        ->where('products.display', '=', '1')
                        ->where('products_sizes.price', '>=', $priceFilter[0])
                        ->where('products_sizes.price', '<=', $priceFilter[1])
                        ->whereIn('products_sizes.size_id', $sizeFilter)
                        ->select('products.*')
                        ->distinct()
                        ->get();

                        $product = $product1;                                

            }else if (isset($_GET['priceFilter']) && isset($_GET['colorFilter'])){
                $product=[]; 
                // dd($colorFilter);
                $product1= DB::table('products')
                        ->join('products_sizes', 'products.id', '=', 'products_sizes.product_id')
                        ->join('products_colors', 'products.id', '=', 'products_colors.product_id')
                        ->where('products.display', '=', '1')
                        ->where('products_sizes.price', '>=', $priceFilter[0])
                        ->where('products_sizes.price', '<=', $priceFilter[1])
                        ->whereIn('products_colors.color_id', $colorFilter)
                        ->select('products.*')
                        ->distinct()
                        ->get();
                        $product = $product1;
                        // dd($product1);
                
            }else if (isset($_GET['colorFilter']) && isset($_GET['sizeFilter'])){
                $product=[]; 
                $product1= DB::table('products')
                        ->join('products_sizes', 'products.id', '=', 'products_sizes.product_id')
                        ->join('products_colors', 'products.id', '=', 'products_colors.product_id')
                        ->where('products.display', '=', '1')
                        ->where('products_sizes.price', '>=', $priceFilter[0])
                        ->where('products_sizes.price', '<=', $priceFilter[1])
                        ->whereIn('products_sizes.size_id', $sizeFilter)
                        ->whereIn('products_colors.color_id', $colorFilter)
                        ->select('products.*')
                        ->distinct()
                        ->get();
                        $product = $product1;
            }else if (isset($_GET['colorFilter']) && isset($_GET['sizeFilter']) && isset($_GET['priceFilter'])){
                $product=[];
                $product1= DB::table('products')
                        ->join('products_sizes', 'products.id', '=', 'products_sizes.product_id')
                        ->join('products_colors', 'products.id', '=', 'products_colors.product_id')
                        ->where('products.display', '=', '1')
                        ->where('products_sizes.price', '>=', $priceFilter[0])
                        ->where('products_sizes.price', '<=', $priceFilter[1])
                        ->whereIn('products_sizes.size_id', $sizeFilter)
                        ->whereIn('products_colors.color_id', $colorFilter)
                        ->select('products.*')
                        ->distinct()
                        ->get();
                        $product = $product1;
                        // dd($product);
            
            }else if (isset($_GET['priceFilter'])){
                $product=[];
                $product1= DB::table('products')
                        ->join('products_sizes', 'products.id', '=', 'products_sizes.product_id')
                        ->join('products_colors', 'products.id', '=', 'products_colors.product_id')
                        ->where('products.display', '=', '1')
                        ->where('products_sizes.price', '>=', $priceFilter[0])
                        ->where('products_sizes.price', '<=', $priceFilter[1])
                        // ->whereIn('products_sizes.size_id', $sizeFilter)
                        // ->whereIn('products_colors.color_id', $colorFilter)
                        ->select('products.*')
                        ->distinct()
                        ->get();
                        // dd($product1);
                        $product = $product1;
                    }else{
                        
                    }
                    // dd($product);
            $sub_img = [];            
            foreach($product as $key => $value){
                $proImg = product_image::where('product_id',$value->id)->first();
                // dd($value->id);
                $sub_img[$value->id] = $proImg->image;
            }   
            // dd($sub_img);
           
            
            $sub_img_2 = [];
            foreach($product as $key => $value){
                $proSubImg2 = product_image::where('product_id',$value->id)->limit(3)->get();
                $sub_img_2[$value->id]= $proSubImg2[1]->image;
                // dd($sub_img_2);
            }
            // dd($sub_img_2);
            
            $sub_img_3 = [];
            foreach($product as $key => $value){
                $proSubImg3 = product_image::where('product_id',$value->id)->limit(3)->get();
                $sub_img_3[$value->id]= $proSubImg3[2]->image;
            }
        }

        $product= $product;
        
        $ChildCate=category::where('parent_id','>',0)->where('status','=',1)->orderby('name','ASC')->get();
        $Cate=category::where('status','=',1)->orderby('name','ASC')->get();
        // dd($Cate);
        // dd($ChildCate);

        $countPro=count($product);
        $quantityAllProduct=count(products::where('display','1')->get());
        $banner_page = item::where('status', 1)
        ->where('page', 'shop')->first();
        // dd($product);
        $data = $this->get_data();

        $CurrentDate=\Carbon\Carbon::now();
        $a=$CurrentDate->addDay(-3);
        
        return view('Customer.Shop',compact('banner_page','a','data','product','color','size','proFeature','sub_img','sub_img_2','sub_img_3','countPro','quantityAllProduct','hasFilter','Cate','ChildCate'));
    }



}
