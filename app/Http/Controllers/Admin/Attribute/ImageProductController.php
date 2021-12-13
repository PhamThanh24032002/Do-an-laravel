<?php

namespace App\Http\Controllers\Admin\Attribute;

use App\Http\Controllers\Controller;
Use App\Models\product_image;
use Illuminate\Http\Request;

class ImageProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ImageProduct=product_image::all();
        return view('Admin.Product.add_product',compact('ImageProduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ImageProduct=product_image::create($request->all());
        if($ImageProduct){
            return redirect()->route('ImageProduct.index')->with('add_success','Thêm ảnh sản phẩm công!');
        }else{
            return redirect()->back()->with('error','Thêm ảnh sản phẩm thất bại');
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
        $ImageProduct=product_image::find($id);
        return view('Admin.Product.edit_product',compact('ImageProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ImageProduct=product_image::find($id);
        $ImageProduct->update($request->all());
        if($ImageProduct){
            return redirect()->route('ImageProduct.index')->with('edit_success','Cập nhật ảnh sản phẩm thành công!');
        }else{
            return redirect()->back()->with('error','Cập nhật ảnh sản phẩm thất bại!');
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
        $ImageProduct=product_image::find($id);
        $ImageProduct->destroy($ImageProduct->id);
        return redirect()->route('ImageProduct.index')->with('delete_success','Xóa ảnh sản phẩm thành công!');
    }
}
