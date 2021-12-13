<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\category\AddcategoryRequest;
use App\Http\Requests\Admin\category\editcategoryRequest;
use App\Http\Requests\Admin\categoryRequest;
use App\Models\category;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Search module
        if (isset($_GET['s'])) {
            $search_text = $_GET['s'];
            // dd($search_text);
            $list_cate = DB::table('categories')
                ->where('name', 'LIKE', '%'.$search_text.'%')
                ->where('status', '=', '1')
                ->OrderBy('categories.id', 'ASC')
                ->paginate(8);
        } else {

            $list_cate = DB::table('categories')
                ->where('status', '=', '1')
                ->OrderBy('categories.id', 'ASC')
                ->paginate(8);
        }

        return view('Admin.Category.list_category', compact('list_cate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::orderBy('name', 'ASC')->get();;
        $list_cate = Category::orderBy('name', 'ASC')->paginate(8);
        return view('Admin.Category.add_category', compact('list_cate', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddcategoryRequest $request)
    {
        $add_category = category::create($request->all());

        return redirect()->back()->with('add_success', "Thêm mới danh mục thành công");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listCate = category::orderBy('name', 'ASC')->get();
        $list_cate = category::orderBy('name', 'ASC')->paginate(8);
        $edit_cate = category::find($id);
        return view('Admin.Category.edit_category', compact('edit_cate', 'list_cate', 'listCate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(editcategoryRequest $request, $id)
    {
        $find_cate = category::find($id)->update($request->only('name', 'status'));
        return redirect()->back()->with('edit_success', "Sửa danh mục thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

        $find_cate = Category::find($id);
        $cate_delete =products::where('category_id',$id)->first();
        if($cate_delete){
            return redirect()->route('category.index')->with('error', 'Danh Mục Này Có Sản Phẩm,Không Thể Xóa');
        }else{
            $find_cate->delete();
            return redirect()->back()->with('add_success','Xóa danh mục thành công');
        }
    }
}
