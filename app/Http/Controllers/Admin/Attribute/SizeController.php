<?php

namespace App\Http\Controllers\Admin\Attribute;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\attribute\size\AddRequest;
use App\Http\Requests\attribute\size\EditRequest;
Use App\Models\size;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $size=size::all();
        return view('Admin.Attribute.Size.List_size',compact('size'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Attribute.Size.Add_size');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        $size=size::create($request->all());
        if($size){
            return redirect()->route('size.index')->with('add_success','Thêm kích cỡ thành công!');
        }else{
            return redirect()->back()->with('error','Thêm kích cỡ thất bại!');
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
        $size=size::find($id);
        return view('Admin.Attribute.Size.Edit_size',compact('size'));
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
        $size=size::find($id);
        $size->update($request->all());
        if($size){
            return redirect()->route('size.index')->with('edit_success','Sửa kích cỡ thành công!');
        }else{
            return redirect()->back()->with('error','Sửa kích cỡ thất bại!');
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
        $size=size::find($id);
        $size->destroy($size->id);
        return redirect()->route('size.index')->with('delete_success','Xóa kích cỡ thành công!');
    }
}
