<?php

namespace App\Http\Controllers\Admin\bannerpage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Bannerpages\AddbannerRequest;
use App\Http\Requests\Admin\Bannerpages\editbannerRequest;
use App\Models\item;
use Illuminate\Http\Request;

class BannerPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = item::paginate(10);
        // dd("hehe");
        return view('Admin.Banner_Page.listbannerpage',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Admin.Banner_Page.addbannerpage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddbannerRequest $request)
    {
        
        if ($request->has('other_image')) {
            $other_image = $request->other_image;
            $des_pt_name = time() . $other_image->getClientOriginalName();
            $other_image->move(public_path('imageBanner'), $des_pt_name);
        }
    
        $test=item::create([
            'content' => $request->content,
            'page' => $request->page,
            'status' => $request->status,
            'image' => $des_pt_name
        ]);
        // if(item)
        return redirect()->route('banner_page.index')->with('add_success','Thêm mới banner thành công');
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
        $banner = item::find($id);
        return view('Admin.Banner_Page.editbannerpage',compact('banner'));
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
        $banner = item::find($id);
        if ($request->has('other_image')) {
            $other_image = $request->other_image;
            $des_pt_name = time().$other_image->getClientOriginalName();
            $other_image->move(public_path('imageBanner'), $des_pt_name);
        }else{
            $des_pt_name = $banner->image;
        };
        $banner =$banner->update([
            'content' => $request->content,
            'page' => $request->page,
            'status' => $request->status,
            'image' => $des_pt_name
        ]);
        return redirect()->route('banner_page.index')->with('edit_success','Cập nhật banner thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fin_banner = item::find($id);
        $fin_banner->delete();
        return redirect()->back()->with('delete_success',"Xóa banner thành công");;
    }
}
