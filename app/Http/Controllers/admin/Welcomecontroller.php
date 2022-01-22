<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Welcome;

class Welcomecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $welcomes = Welcome::get();
        //  $avatar = $welcomes->getmedia('welcome');
        return view('admin.welcome.welcome',compact('welcomes'));
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
        $request->validate([
            'title' => 'required|string|max:100',
            'desc' => 'required|string',
            'img' => 'required|image|mimes:jpg,png',
            
        ]);
        $title = $request->title;
        $desc = $request->desc;
        $img = $request->file('img');

        $welcome = welcome::create([
            'title' => $title,
            'desc' => $desc,
            
            
        ]);
        $welcome->addMedia($img)->toMediaCollection('welcome');
        
        session()->flash('edit','تم التعديل  بنجاح');
        return redirect(route('welcome.index'));
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
            'title' => 'required|string|max:100',
            'desc' => 'required|string',
            'img' => 'required|image|mimes:jpg,png',
        ]);
            
            $welcome = welcome::findorfail($id);
            $imgname = $welcome->img;
        
        if ($request->hasFile('img')) {
           if ($imgname !== null) {
                $welcome->clearMediaCollection('welcome');
            }
            $title = $request->title;
            $desc = $request->desc;
            $img = $request->file('img');
           
        }
        

        $welcome->update([
            'title' => $title,
            'desc' => $desc,
            'img' => $img,
            
        ]);
        $welcome->addMedia($img)->toMediaCollection('welcome');
        
        session()->flash('edit','تم التعديل  بنجاح');
        return redirect(route('welcome.index'));
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
