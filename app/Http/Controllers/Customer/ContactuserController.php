<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\feedback;
use App\Models\map;
use Illuminate\Http\Request;
use App\Models\favorite;
use App\Models\Cart;
use App\Models\item;
use Illuminate\Support\Facades\Auth;

class ContactuserController extends Controller
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
    public function contact()
    {
        $data = $this->get_data();
        $contact= Contact::all();
        $googlemap = map::all();
        $banner_page = item::where('status', 1)
        ->where('page', 'contact')->first();
        return view('Customer.Contact',compact('contact','googlemap','data','banner_page'));
    }
    public function contactpost( Request $request)
    {
       $contactpost = feedback::create($request->all());
       return redirect()->back();
    }
}
