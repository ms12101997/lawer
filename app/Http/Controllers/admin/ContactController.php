<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = contact::first();
        return view('admin.contact.contact', compact('contact'));
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
        // $request->validate([
        //     'phone' => 'required|integer|max:100',
        //     'email' => 'required|string',
        //     'adress' => 'required|string',
            
        // ]);
        $phone = $request->phone;
        $email = $request->email;
        $adress = $request->adress;
        contact::create([
            'phone'=>$phone,
            'email'=>$email,
            'adress'=>$adress,
            
        ]);
        return redirect(route('admin.contacts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact=contact::findorfail($id);
        return view('admin.pages.contact.show',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact=contact::findorfail($id);
        return view('admin.pages.contact.edit',compact('contact'));
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
        
        $request->validate([
            'phone' => 'required|integer',
            'email' => 'required|string',
            'adress' => 'required|string',
            
        ]);
        $phone = $request->phone;
        $email = $request->email;
        $adress = $request->adress;
        contact::findorfail($id)->update([
            'phone'=>$phone,
            'email'=>$email,
            'adress'=>$adress,
            
        ]);
        return redirect(route('contact.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact=Contact::findorfail($id)->delete();
        return back();
    }
}
