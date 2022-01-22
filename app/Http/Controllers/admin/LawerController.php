<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lawer;

class LawerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lawers = Lawer::get();
        //  $avatar = $lawers->getmedia('lawer');
        return view('admin.lawer.lawer',compact('lawers'));
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

        $lawer = lawer::create([
            'title' => $title,
            'desc' => $desc,
            
            
        ]);
        $lawer->addMedia($img)->toMediaCollection('lawer');
        
        session()->flash('edit','تم التعديل  بنجاح');
        return redirect(route('lawer.index'));
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
            
            $lawer = lawer::findorfail($id);
            $imgname = $lawer->img;
        
        if ($request->hasFile('img')) {
           if ($imgname !== null) {
                $lawer->clearMediaCollection('lawer');
            }
            $title = $request->title;
            $desc = $request->desc;
            $img = $request->file('img');
           
        }
        

        $lawer->update([
            'title' => $title,
            'desc' => $desc,
            'img' => $img,
            
        ]);
        $lawer->addMedia($img)->toMediaCollection('lawer');
        
        session()->flash('edit','تم التعديل  بنجاح');
        return redirect(route('lawer.index'));
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
