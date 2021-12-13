<?php

namespace App\Http\Controllers\Admin\map;

use App\Http\Controllers\Controller;
use App\Models\map;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class mapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $map = map::paginate(5);

        return view('Admin.google_maptes.list_map', compact('map'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Admin.google_maptes.add_map');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->status == 1) {
            $fin_map = map::where('status', 1)->get();
            if (count($fin_map) > 0) {
                return redirect()->back()->with('error', "Thêm mới bản đồ thất bại!");
            } 
            
        }else {
            
            $map = map::create([
                'links' => $request->links,
                'status' => $request->status,
            ]);
        }


        return redirect()->route('googlemap.index')->with('add_success', "Thêm mới bản đồ thành công");;
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
        $edit_map = map::find($id);
        return view('Admin.google_maptes.edit_map', compact('edit_map'));
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
        $edit_map = map::find($id);
        $map = $edit_map->update([
            'links' => $request->links,
            'status' => $request->status,
        ]);
        return redirect()->route('googlemap.index')->with('edit_success', "Sửa bản đồ thành công");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_map = map::find($id);
        $delete_map->delete();
        return redirect()->route('googlemap.index')->with('delete_success', "Xóa bản đồ thành công");;
    }
}
