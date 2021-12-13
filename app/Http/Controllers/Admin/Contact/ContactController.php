<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactAdmin\RequestDetailContact;
use App\Http\Requests\ContactAdmin\RequestRegisterContact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_contacts = Contact::get();
        return view('admin.contact.list_contact', compact('list_contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.register_contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestRegisterContact $request)
    {
        $regis = Contact::create([
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address
        ]);
        if ($regis) {
            session()->flash('success', 'Tạo liên hệ thành công!');
        } else {
            session()->flash('error', 'Tạo liên hệ thất bại!');
        }
        return redirect()->route('admin.list.contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('admin.contact.detail_contact', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestDetailContact $request, $id)
    {
        $contact = Contact::find($id);
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->save();
        if ($contact) {
            session()->flash('success', 'Cập nhật liên hệ thành công!');
        } else {
            session()->flash('error', 'Cập nhật liên hệ thất bại!');
        }
        return redirect()->route('admin.list.contact');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::destroy($id);
        return redirect()->route('admin.list.contact')->with('delete_success', "Xóa danh mục thành công");
    }
}
