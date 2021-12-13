<?php

namespace App\Http\Controllers\Admin\slider;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\slider\addsliderRequest;
use App\Models\slider;
use Illuminate\Http\Request;

class sliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = slider::paginate(15);
        return view('Admin.Slider.list_silder',compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Slider.add_slider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addsliderRequest $request)
    {
        if ($request->status == 1) {
            $find_slide_by_status = slider::where('status',1)->where('position',$request->position)->get();
            if (count($find_slide_by_status)>0) {
                dd('casi nafy ddax co trang thai la hien');
            }else{
                if ($request->has('other_image')) {
                    $other_image = $request->other_image;
                    $des_pt_name = time() . $other_image->getClientOriginalName();
                    $other_image->move(public_path('imageslider'), $des_pt_name);
                }
                
                slider::create([
                    'name' => $request->name,
                    'link' => $request->link,
                    'position' => $request->position,
                    'status' => $request->status,
                    'image' => $des_pt_name
                ]);
            }
        }else{
            if ($request->has('other_image')) {
                $other_image = $request->other_image;
                $des_pt_name = time() . $other_image->getClientOriginalName();
                $other_image->move(public_path('imageslider'), $des_pt_name);
            }
            
            slider::create([
                'name' => $request->name,
                'link' => $request->link,
                'position' => $request->position,
                'status' => $request->status,
                'image' => $des_pt_name
            ]);
        }
        return redirect()->route('slider.index')->with('add_success', "Thêm mới Slider thành công");
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
        $old_slider = slider::find($id);
        return view('Admin.Slider.edit_slider',compact('old_slider'));
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

        $slider = slider::find($id);
        if ($request->status == 1) {
            $find_slder_showing = slider::where('status',1)->where('position',$slider->position)->first();
            if ($find_slder_showing!= null) {
                $find_main_slider = slider::find($find_slder_showing->id);
                $find_main_slider->update([
                    'status'=>0
                ]);
            }
            if ($request->has('other_image')) {
                $other_image = $request->other_image;
                $des_pt_name = time().$other_image->getClientOriginalName();
                $other_image->move(public_path('imageslider'), $des_pt_name);
            }else{
            
                $des_pt_name = $slider->image;
            };
            $slider =$slider->update([
                'name' => $request->name,
                'link' => $request->link,
                'position' => $request->position,
                'status' => $request->status,
                'image' => $des_pt_name
            ]);
        }else{
            if ($request->has('other_image')) {
                $other_image = $request->other_image;
                $des_pt_name = time().$other_image->getClientOriginalName();
                $other_image->move(public_path('imageslider'), $des_pt_name);
            }else{
            
                $des_pt_name = $slider->image;
            };
            $slider =$slider->update([
                'name' => $request->name,
                'link' => $request->link,
                'position' => $request->position,
                'status' => $request->status,
                'image' => $des_pt_name
            ]);
        }
        return redirect()->route('slider.index')->with('edit_success', "Sửa Slider thành công");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = slider::find($id);
        $find->delete();
        return redirect()->back()->with('delete_success', "Xóa Slider thành công");
    }
}
