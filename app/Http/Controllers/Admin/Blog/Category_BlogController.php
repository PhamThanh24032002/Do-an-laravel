<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\category_blog\addcategoryblogRequest;
use App\Http\Requests\Admin\category_blog\editcategoryblogRequest;
use App\Models\Blog_category;
use Illuminate\Http\Request;

class Category_BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_cate_blog = Blog_category::paginate(5);
        return view('Admin.Blog.category_blog.list',compact('list_cate_blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_cate_blog = Blog_category::paginate(5);
        return view('Admin.Blog.category_blog.add',compact('list_cate_blog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addcategoryblogRequest $request)
    {
        $add_category = Blog_category::create($request->all());
       
        return redirect()->back()->with('add_success',"Thêm mới danh mục thành công");
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
        $list_cate_blog = Blog_category::paginate(5);
        $edit_cate_blog = Blog_category::find($id);
        return view('Admin.Blog.category_blog.edit',compact('edit_cate_blog','list_cate_blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(editcategoryblogRequest $request, $id)
    {
        $find_cate = Blog_category::find($id)->update($request->only('name','status'));
        return redirect()->back()->with('edit_success',"Sửa danh mục thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find_cate = Blog_category::find($id);
        $find_cate->delete();
        return redirect()->back()->with('delete_success',"Xóa danh mục thành công");
    }
}
