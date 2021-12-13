<?php

namespace App\Http\Controllers\Admin\Attribute;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\attribute\color\AddRequest;
use App\Http\Requests\attribute\color\EditRequest;
Use App\Models\color;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $color=color::all();
        return view('Admin.Attribute.Color.List_color',compact('color'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          
        return view('Admin.Attribute.Color.Add_color');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        $color=color::create($request->all());
        if($color){
            return redirect()->route('color.index')->with('add_success','Thêm màu thành công!');
        }else{
            return redirect()->back()->with('error','Thêm màu thất bại!');
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
        $color=color::find($id);
        return view('Admin.Attribute.Color.Edit_color',compact('color'));
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
        $color=color::find($id);
        // dd('aaaa');
        $color->update($request->all());
        if($color){
            return redirect()->route('color.index')->with('edit_success','Sửa màu thành công!');
        }else{
            return redirect()->back()->with('error','Sửa màu thất bại!');
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
        $color=color::find($id);
        $color->destroy($color->id);
        return redirect()->route('color.index')->with('delete_success','Xóa màu thành công!');
    }
}
