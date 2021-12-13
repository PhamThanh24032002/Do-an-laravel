<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;
use App\Models\products_size;
use Illuminate\Support\Facades\View;
use App\Models\products_color;
use App\Models\Cart;
use App\Models\product_image;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add_cart_shop_detail(Request $req,$id){
        // dd($id);
        dd($req->all());
        $price=products_size::where([['product_id',$id],['size_id',$req->size_id]])->join('products','products.id','products_sizes.product_id')->select('products_sizes.import_price','products_sizes.price','products.sale_price')->first();
        $check_exist = Cart::where([['user_id', Auth::id()], ['product_id', $id], ['color_id', $req->color_id], ['size_id', $req->size_id]])->first();
        $now_price=($price->price-$price->import_price)*(100-$price->sale_price)/100;
        if ($check_exist) {
            $check_exist->quantity += $req->quantity;
            $check_exist->save();
            return redirect()->back();
            
        } else {
            $cart = Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $id,
                'quantity' => $req->quantity,
                'price' => $now_price,
                'size_id' => $req->size_id,
                'color_id' => $req->color_id
                
            ]);
            return redirect()->back();
        }

    }
    public function ajax_quick_cart(Request $req)
    {   
        // $image
        // return $req->id_pro; 
        
        
        $proImg = product_image::where('product_id',$req->id_pro)->get(); 
        $product = Products::where('id', $req->id_pro)->first();
        $product_size = products_size::where('product_id', $req->id_pro)->join('sizes', 'size_id', 'sizes.id')->get();
        $product_color = products_color::where('product_id', $req->id_pro)->join('colors', 'color_id', 'colors.id')->get();
        // dd($product_color);
        
        return view('customer.cart.QuickCart', compact('product', 'product_size', 'product_color','proImg'));
    }

    public function change_detail_cart(Request $req)
    {
        $check_exist = Cart::find($req->id_pro);
        if ($check_exist) {
            if ($check_exist->quantity + $req->quantity_pro == 0) {
                $check_exist = Cart::find($req->id_pro)->delete();
            } else {
                $check_exist->quantity += $req->quantity_pro;
                $check_exist->size_id = $req->size_id;
                $check_exist->color_id = $req->color_id;
                $check_exist->price = $req->price_pro;
                
                $check_exist->save();
            }
        }
    }

    public function ajax_add_cart_mini(Request $req)
    {
        $check_exist = Cart::where([['user_id', Auth::id()], ['product_id', $req->id_pro], ['color_id', $req->color_id], ['size_id', $req->size_id]])->first();
        if ($check_exist) {
            $check_exist->quantity += $req->quantity_pro;
            $check_exist->save();
            session()->flash('add_success','Thêm sản phẩm vào giỏ hàng thành công!');
        } else {
            
            $cart = Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $req->id_pro,
                'quantity' => $req->quantity_pro,
                'price' => $req->price,
                'size_id' => $req->size_id,
                'color_id' => $req->color_id
            ]);
            session()->flash('add_success','Thêm sản phẩm vào giỏ hàng thành công!');
        }
        
    }

    public function cart_remove(Request $req)
    {
        Cart::find($req->id)->delete();
        // session()->flash('add_success','Thêm sản phẩm vào giỏ hàng thành công!');
    }

    public function cart_remove_mini(Request $req)
    {
        Cart::find($req->id)->delete();
    }

    public function render_cart_mini()
    {
        $data['cl_page'] = cart::where("user_id", Auth::id())->join('products', 'products.id', '=', 'carts.product_id')->get(['carts.*', 'products.price as pro_price', 'products.image', 'products.name', 'products.sale_price']);
        $view = view('customer.cart.list-minicart', compact('data'))->render();
        $quantity = count($data['cl_page']);
        return response()->json(["html" => $view, "quantity" => $quantity]);
    }

    public function render_cart()
    {
        $sizes = products_size::join('sizes', 'products_sizes.size_id', 'sizes.id')->get();
        $colors = products_color::join('colors', 'products_colors.color_id', 'colors.id')->get();
        $data['cl_page'] = cart::where("user_id", Auth::id())->join('products', 'products.id', '=', 'carts.product_id')->get(['carts.*', 'products.price as pro_price', 'products.image', 'products.name', 'products.sale_price']);
        return view('Customer.Cart.listcart', compact('data', 'sizes', 'colors'));
    }
}
