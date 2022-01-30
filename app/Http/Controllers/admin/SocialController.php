<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Social;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials=Social::all();
        return view('admin.social.social',compact('socials'));
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
        //
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
        //
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
            'facebook' => 'required|max:100',
            'twitter' => 'required',
            'snapchat' => 'required',
            'linkedin' => 'required',
            'whatsapp' => 'required',
            
        ]);
        
        $social=Social::findorfail($id);
        $img = $request->file('img');

        if ($request->hasFile('img')) {
            $social->clearMediaCollection('logo');
            $social->addMedia($img)->toMediaCollection('logo');
            }

            $facebook = $request->facebook;
            $twitter = $request->twitter;
            $snapchat = $request->snapchat;
            $linkedin = $request->linkedin;
            $whatsapp = $request->whatsapp;
            $social->update([
                'facebook' => $facebook,
                'twitter' => $twitter,
                'snapchat' => $snapchat,
                'linkedin' => $linkedin,
                'whatsapp' => $whatsapp,
        ]);
        
        
        session()->flash('edit','تم التعديل  بنجاح');
        return redirect(route('social.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
