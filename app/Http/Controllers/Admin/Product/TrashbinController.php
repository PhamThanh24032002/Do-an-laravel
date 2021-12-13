<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;
use App\Models\category;
use App\Models\color;
use Illuminate\Support\Facades\DB;

class TrashbinController extends Controller
{
    public function index(Request $request)
    {              
        
        $listColor=color::all();
        $listCate=category::all();

        //Search module
        if(isset($_GET['s'])){
            $search_text=$_GET['s'];
            $listPro=DB::table('products')->where('name','LIKE','%'.$search_text.'%')
            ->where('display','=','0')
            ->OrderBy('products.id','ASC')
            ->paginate(4);
        }else{
            $listPro=DB::table('products')
            ->where('display','=','0')
            ->OrderBy('products.id','ASC')
            ->paginate(4);
        } 

        //Sort module
        if(isset($_GET['orderBy'])){
            // dd($_GET['orderBy']);
            $sorting=$_GET['orderBy'];
            if ($sorting=='name') {
                $listPro=DB::table('products')
                ->where('display','=','0')
                ->OrderBy('products.name','ASC')
                ->paginate(4);
            }elseif ($sorting=='priceAsc'){
                $listPro=DB::table('products')
                ->where('display','=','0')
                ->OrderBy('products.price','ASC')
                ->paginate(4);
            }elseif ($sorting=='priceDesc'){
                $listPro=DB::table('products')
                ->where('display','=','0')
                ->OrderBy('products.price','DESC')
                ->paginate(4);
            }elseif ($sorting=='new'){
                $listPro=DB::table('products')
                ->where('display','=','0')
                ->OrderBy('products.created_at','DESC')
                ->paginate(4);
            }elseif ($sorting=='sale'){
                $listPro=DB::table('products')
                ->where('display','=','0')
                ->where('sale_price','>','price')
                ->OrderBy('products.name','DESC')
                ->paginate(4);
            }
        }
        
        return view('Admin.Product.trashbin',compact('listPro','listCate','listColor'));
    }

    public function destroy($id)
    {
        $product=products::find($id);
        products::where('id', $id)->update([
            'display'=>1,
        ]);
        return redirect()->back()->with('delete_success', "Xóa sản phẩm thành công");;
    }

    public function recoverAll(Request $request)
    {
        $ids=$request->id;
        $recoverable=0;
        $unrecoverable=0;
        // dd($ids);
        foreach($ids as $id){
            $product=products::find($id);
            // dd($product->id);
            if ($product->id==$id) {
                products::where('id', $id)->update([
                    'display'=>1,
                ]);
                $recoverable++;
            }else{
                $unrecoverable++;
            }            
        }        
        return redirect()->route('trashbin.index')->with('add_success','Đã khôi phục ('. $recoverable.') sản phẩm. Chưa khôi phục ('. $unrecoverable.') sản phẩm.');
    }
}
