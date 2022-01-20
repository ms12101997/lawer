<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $services = Service::orderBy('id','Desc')->get();
        return view('admin.services.service',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'title' => 'required|string|max:100',
            'desc' => 'required|string',
            'img' => 'required|image|mimes:jpg,png',
            'icon' => 'required|image|mimes:jpg,png',
        ]);
        $title = $request->title;
        $desc = $request->desc;
        $img = $request->file('img');
        $icon = $request->file('icon');
        // $ext=$img->getClientOriginalExtension();
        // $extt=$icon->getClientOriginalExtension();
        // $imgname=uniqid().".$ext";
        // $iconname=uniqid().".$extt"; 

        $service = Service::create([
            'title' => $title,
            'desc' => $desc,
            'img' => $img,
            'icon' => $icon,
        ]);
        $service->addMedia($img)->toMediaCollection();
        $service->addMedia($icon)->toMediaCollection('service');
        session()->flash('Add','تم إضافة الخدمة بنجاح');
        return redirect(route('services.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::findorfail($id);
        $avatars=$service->getmedia('service');
        return view('admin.services.show', compact('service','avatars'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $service = Service::findorfail($id);
        // return view('admin.pages.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:100',
            'desc' => 'required|string',
            'img' => 'nullable|image',
            'icon' => 'nullable|image',
        ]);
        $id=$request->id;
        $service = service::findOrFail($id);
        $imgname = $service->img;
        $iconname = $service->icon;
        if ($request->hasFile('img')) {
            if ($imgname !== null) {
                unlink(public_path('uploads/img/' . $imgname));
            }
            $img = $request->file('img');
            $ext = $img->getClientOriginalExtension();
            $imgname = uniqid() . ".$ext";
            $img->move(public_path('uploads/img'), $imgname);
        }
        if ($request->hasFile('icon')) {
            if ($iconname !== null) {
                unlink(public_path('uploads/icon/' . $iconname));
            }
            $icon = $request->file('icon');
            $ext = $img->getClientOriginalExtension();
            $iconname = uniqid() . ".$ext";
            $icon->move(public_path('uploads/icon'), $iconname);
        }


        $service->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'img' => $imgname,
            'icon' => $iconname,
        ]);
        session()->flash('edit','تم تحديث الخدمة بنجاح');
        return redirect(route('services.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $id = $request->id;
        $service=service::findorfail($id)->delete();
        // $service->clearMediaCollectionExcept( 'service',$service->getFirstMedia());
        session()->flash('delete','تم حذف الخدمة بنجاح');
        return redirect('/services');
    }
}
