<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\favorite;
use App\Models\item;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function ajax_wishlist(Request $req)
    {
        $check = favorite::where([['user_id', Auth::id()], ['product_id', $req->id_pro]])->first();
        if ($check != null) {
            $delete_wl = favorite::where([['user_id', Auth::id()], ['product_id', $req->id_pro]])->delete();
            return "delete";
        } else {
            $regis_wl = favorite::create([
                'user_id' => Auth::id(),
                'product_id' => $req->id_pro,
            ]);
            return "create";
        }
    }

    public function product_remove(Request $req)
    {
        $check = favorite::where([['user_id', Auth::id()], ['product_id', $req->id_pro]])->first();
        if ($check != null) {
            $delete_wl = favorite::where([['user_id', Auth::id()], ['product_id', $req->id_pro]])->delete();
        }
        $data['wl_page'] = favorite::where("user_id", Auth::id())->join('products', 'products.id', '=', 'favorites.product_id')->get(['favorites.id as wl_id','favorites.user_id', 'products.*']);
        $banner_page = item::where('status', 1)
        ->where('page', 'wishlist')->first();
        return view('Customer.Favorite.listFavorite', compact('data','banner_page'));
    }
}
