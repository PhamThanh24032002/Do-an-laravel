<?php

namespace App\Http\Controllers\Admin\Logo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\logo\addlogoRequest;
use App\Models\logo;
use Illuminate\Http\Request;

class logoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_logo = logo::paginate(5);
        return view('Admin.Logo.list_logo', compact('list_logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Logo.add_logo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addlogoRequest $request)
    {

        if ($request->status == 1) {
            $fin_logos = logo::where('status', 1)->get();
            if (count($fin_logos) > 0) {
                return redirect()->back()->with('error', "Thêm mới logo thất bại!");
            }else{
                if ($request->has('other_image')) {
                    $other_image = $request->other_image;
                    $des_pt_name = time() . $other_image->getClientOriginalName();
                    $other_image->move(public_path('imagelogo'), $des_pt_name);
                }
                logo::create([
                    'status' => $request->status,
                    'image' => $des_pt_name
                ]);
            }
        } else {
            if ($request->has('other_image')) {
                $other_image = $request->other_image;
                $des_pt_name = time() . $other_image->getClientOriginalName();
                $other_image->move(public_path('imagelogo'), $des_pt_name);
            }
            logo::create([
                'status' => $request->status,
                'image' => $des_pt_name
            ]);
        }
        return redirect()->route('logo.index')->with('add_success', "Thêm mới logo thành công");;
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
        $old_logo = logo::find($id);
        return view('Admin.Logo.edit_logo', compact('old_logo'));
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

        $logo = logo::find($id);
        if ($request->status == 1) {
            $fin_logos = logo::where('status', 1)->get();
            if (count($fin_logos) > 0) {
                dd('ko thể add do có 1 cái hiện');
            }else{
                if ($request->has('other_image')) {
                    $other_image = $request->other_image;
                    $des_pt_name = time() . $other_image->getClientOriginalName();
                    $other_image->move(public_path('imagelogo'), $des_pt_name);
                } else {
                    $des_pt_name = $logo->image;
                };
                $logo = $logo->update([
                    'status' => $request->status,
                    'image' => $des_pt_name
                ]);
            }
        } else {
            if ($request->has('other_image')) {
                $other_image = $request->other_image;
                $des_pt_name = time() . $other_image->getClientOriginalName();
                $other_image->move(public_path('imagelogo'), $des_pt_name);
            } else {
                $des_pt_name = $logo->image;
            };
            $logo = $logo->update([
                'status' => $request->status,
                'image' => $des_pt_name
            ]);
        }

        return redirect()->route('logo.index')->with('warning', "Sửa logo thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fin_logo = logo::find($id);
        $fin_logo->delete();
        return redirect()->back()->with('delete_success', "Xóa logo thành công");;
    }
}
