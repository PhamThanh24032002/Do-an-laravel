<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\banner\addbannerRequest;
use App\Http\Requests\Admin\banner\editbannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class bannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::paginate(10);
        return  view('Admin.Banner.list_banner', compact('banner'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('Admin.Banner.add_banner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addbannerRequest $request)
    {
        if ($request->status == 1) {
            $find_banner_by_status = Banner::where('status', 1)->where('position', $request->position)->get();
            if (count($find_banner_by_status) > 0) {
                dd('casi nafy ddax co trang thai la hien');
            } else {
                if ($request->has('other_image')) {
                    $other_image = $request->other_image;
                    $des_pt_name = time() . $other_image->getClientOriginalName();
                    $other_image->move(public_path('imageBanner'), $des_pt_name);
                }
                Banner::create([
                    'position' => $request->position,
                    'name' => $request->name,
                    'links' => $request->links,
                    'status' => $request->status,
                    'image' => $des_pt_name
                ]);
            }
        } else {
            if ($request->has('other_image')) {
                $other_image = $request->other_image;
                $des_pt_name = time() . $other_image->getClientOriginalName();
                $other_image->move(public_path('imageBanner'), $des_pt_name);
            }
            Banner::create([
                'position' => $request->position,
                'name' => $request->name,
                'links' => $request->links,
                'status' => $request->status,
                'image' => $des_pt_name
            ]);
        }
        return redirect()->route('banner.index')->with('add_success', "Thêm mới banner thành công");;
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
        $old_banner = Banner::find($id);
        return view('Admin.Banner.edit_banner', compact('old_banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(editbannerRequest $request, $id)
    {
        $banner = Banner::find($id);
        if ($request->status == 1) {
            $find_banner_showing = Banner::where('status', 1)->where('position', $request->position)->first();
            if ($find_banner_showing != null) {
                $find_main_banner = Banner::find($find_banner_showing->id);
                $find_main_banner->update([
                    'status' => 0
                ]);
            }

            if ($request->has('other_image')) {
                $other_image = $request->other_image;
                $des_pt_name = time() . $other_image->getClientOriginalName();
                $other_image->move(public_path('imageBanner'), $des_pt_name);
            } else {
                $des_pt_name = $banner->image;
            };
            $banner = $banner->update([
                'name' => $request->name,
                'links' => $request->links,
                'position' => $request->position,
                'status' => $request->status,
                'image' => $des_pt_name
            ]);
        } else {
            if ($request->has('other_image')) {
                $other_image = $request->other_image;
                $des_pt_name = time() . $other_image->getClientOriginalName();
                $other_image->move(public_path('imageBanner'), $des_pt_name);
            } else {
                $des_pt_name = $banner->image;
            };
            $banner = $banner->update([
                'name' => $request->name,
                'links' => $request->links,
                'position' => $request->position,
                'status' => $request->status,
                'image' => $des_pt_name
            ]);
        }
        return redirect()->route('banner.index')->with('edit_success', "Sửa banner thành công");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fin_banner = Banner::find($id);
        $fin_banner->delete();
        return redirect()->back()->with('delete_success', "Xóa banner thành công");;
    }
}
