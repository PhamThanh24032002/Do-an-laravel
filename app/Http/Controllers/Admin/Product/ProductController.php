<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Validation\Rule;

use App\Http\Controllers\Controller;
use App\Models\products;
use App\Models\product_image;
use App\Models\products_color;
use App\Models\products_size;
use App\Models\size;
use App\Models\color;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Requests\product\AddRequest;
use App\Http\Requests\product\EditRequest;
use App\Models\item;
use Illuminate\Support\Facades\DB;

use Livewire\Component;
use Livewire\WithPagination;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $listColor = color::all();
        $listCate = category::all();

        //Search module
        if (isset($_GET['s'])) {
            $search_text = $_GET['s'];
            $listPro = DB::table('products')
                ->where('name', 'LIKE', '%' . $search_text . '%')
                ->where('display', '=', '1')
                ->OrderBy('products.id', 'ASC')
                ->paginate(4);
        } else {
            $listPro = DB::table('products')
                ->where('display', '=', '1')
                ->OrderBy('products.id', 'ASC')
                ->paginate(4);
        }

        //Sort module
        if (isset($_GET['orderBy'])) {
            // dd($_GET['orderBy']);
            $sorting = $_GET['orderBy'];
            if ($sorting == 'name') {
                $listPro = DB::table('products')
                    ->where('display', '=', '1')
                    ->OrderBy('products.name', 'ASC')
                    ->paginate(4);
            } elseif ($sorting == 'priceAsc') {
                $listPro = DB::table('products')
                    ->where('display', '=', '1')
                    ->OrderBy('products.price', 'ASC')
                    ->paginate(4);
            } elseif ($sorting == 'priceDesc') {
                $listPro = DB::table('products')
                    ->where('display', '=', '1')
                    ->OrderBy('products.price', 'DESC')
                    ->paginate(4);
            } elseif ($sorting == 'new') {
                $listPro = DB::table('products')
                    ->where('display', '=', '1')
                    ->OrderBy('products.created_at', 'DESC')
                    ->paginate(4);
            } elseif ($sorting == 'sale') {
                $listPro = DB::table('products')
                    ->where('display', '=', '1')
                    ->where('sale_price', '>', 'price')
                    ->OrderBy('products.name', 'DESC')
                    ->paginate(4);
            }
        }
      
        return view('Admin.Product.list_product', compact('listPro', 'listCate', 'listColor'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listPro = products::all();
        $listColor = color::all();
        // dd($listColor);
        $listSize = size::all();
        $listCate = category::orderBy('name', 'ASC')->get();
        return view('Admin.Product.add_product', compact('listPro', 'listCate', 'listSize', 'listColor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request, products $product)
    {
        // dd('a');
        //dd($request->all());
        if ($request->hasFile('image')) {
            $file = $request->image;
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $file_name);
        }

        $pro = $product->add($request, $file_name);

        //dd('a');
        //product_image upload
        if ($request->hasFile('images')) {
            $files = $request->images;
            // dd($files);
            foreach ($files as $key => $value) {
                $file_names = $value->getClientOriginalName();
                $value->move(public_path('uploads'), $file_names);
                product_image::create([
                    'product_id' => $pro->id,
                    'image' => $file_names
                ]);
            }
        }

        if ($request->color) {
            // dd($request->color);
            foreach ($request->color as $key => $value) {
                products_color::create([
                    'product_id' => $pro->id,
                    'color_id' => $value
                ]);
            }
        }
        //dd("hehe");
        $sizes = $request->size;
        $prices = $request->prices;
        $import_prices = $request->importprices;

        if ($request->size) {
            // dd($request->size);
            for ($i = 0; $i < count($sizes); $i++) {
                //dd();
                //var_dump($sizes[$i] . ' ' .$prices[$i]);
                products_size::create([
                    'product_id' => $pro->id,
                    'size_id' => $sizes[$i],
                    'price' => $prices[$i],
                    'import_price' => $import_prices[$i]
                ]);
            }
            //die();
        }

        if ($product) {
            return redirect()->route('product.index')->with('delete_success', "Xóa danh mục thành công");
        } else {
            return redirect()->back()->with('error', 'Thêm sản phẩm thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $old_color = [];
        $old_size = [];

        $product = products::find($id);
        // dd($product);

        $proCate = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('categories.id', 'categories.name')
            ->where('products.id', $id)
            ->get();

        $proImg = DB::table('product_images')
            ->join('products', 'products.id', '=', 'product_images.product_id')
            ->select('product_images.image')
            ->where('products.id', $id)
            ->get();


        $proColor = DB::table('products')
            ->join('products_colors', 'products.id', '=', 'products_colors.product_id')
            ->select('products_colors.color_id')
            ->where('products.id', $id)
            ->get();
        foreach ($proColor as $item) {
            $old_color[] = $item->color_id;
        }

        $proSize = DB::table('products')
            ->join('products_sizes', 'products.id', '=', 'products_sizes.product_id')
            ->join('sizes', 'sizes.id', '=', 'products_sizes.size_id')
            ->select('products_sizes.size_id', 'sizes.name')
            ->where('products.id', $id)
            ->get('name');

        foreach ($proSize as $item) {
            $old_size[] = $item->size_id;
        }

        $sizes = DB::table('products_sizes')->where('product_id', $id)->get();

        $listColor = color::all();
        $listSize = size::all();
        $listCate = category::orderBy('name', 'ASC')->get();

        return view('Admin.Product.edit_product', compact('sizes', 'product', 'listCate', 'listColor', 'listSize', 'proCate', 'proColor', 'proSize', 'old_color', 'old_size', 'proImg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id)
    {
        // dd("jhehe");

        $product = products::find($id);

        //image covert        
        if ($request->hasFile('image')) {
            $file = $request->image;
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $file_name);
        } else {
            $file_name = $product->image;
        }


        $pro = $product->UpdatePro($request, $file_name, $id);

        //image_product upload
        if ($request->hasFile('images')) {
            $files = $request->images;

            $old_images = product_image::where('product_id', $id)->get();
            $id_images = $old_images;

            foreach ($old_images as $key => $value) {
                product_image::where('product_id', $id)->where('image', $value->image)->delete();
            }
            foreach ($files as $key => $value) {
                $file_names = $value->getClientOriginalName();
                $value->move(public_path('uploads'), $file_names);

                product_image::where('product_id', $id)->create([
                    'product_id' => $id,
                    'image' => $file_names
                ]);
            }
        } else {
            $file_names = $product->images;
        }

        if ($request->color) {
            //id_color la mau cu cua san pham

            $id_color = products_color::where('product_id', $id)->get();
            foreach ($id_color as $key => $value) {
                products_color::where('product_id', $id)->where('color_id', $value->color_id)->delete();
            }
            foreach ($request->color as $key => $value) {
                products_color::where('product_id', $id)->create([
                    'product_id' => $id,
                    'color_id' => $value
                ]);
            }
        }

        $id_size = products_size::where('product_id', $id)->get();
        foreach ($id_size as $key => $value) {
            products_size::where('product_id', $id)->where('size_id', $value->size_id)->delete();
        }
        if ($request->size) {
            $sizes = $request->size;
            $prices = $request->prices;
            $import_price = $request->importprices;
            for ($i = 0; $i < count($sizes); $i++) {
                products_size::create([
                    'product_id' => $pro->id,
                    'size_id' => $sizes[$i],
                    'price' => $prices[$i],
                    'import_price' => $import_price[$i]
                ]);
            }
        }

        if ($product) {
            // dd("hehe");
            return redirect()->route('product.index')->with('edit_success', "Xóa danh mục thành công");
        } else {
            // dd("hehe");
            return redirect()->back()->with('error', 'Sửa sản phẩm thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        $product = products::find($id);
        products::where('id', $id)->update([
            'display' => 0,
        ]);
        return redirect()->route('product.index')->with('delete_success', "Xóa sản phẩm thành công");
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->id;
        $deleteable = 0;
        $undeleteable = 0;
        // dd($ids);
        foreach ($ids as $id) {
            $product = products::find($id);
            // dd($product->id);
            if ($product->id == $id) {
                products::where('id', $id)->update([
                    'display' => 0,
                ]);
                $deleteable++;
            } else {
                $undeleteable++;
            }
        }
        return redirect()->route('product.index')->with('add_success', 'Đã xóa (' . $deleteable . ') sản phẩm. Chưa xóa (' . $undeleteable . ') sản phẩm.');
    }
}
