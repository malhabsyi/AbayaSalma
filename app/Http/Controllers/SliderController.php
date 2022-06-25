<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index(){
        $slider = Slider::all();
        return view('slider.index',compact('slider'));
    }
    public function create(){
        return view('slider.create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'heading'=> 'required',
            'description'=> 'required',
            'link'=> 'required',
            'link-name'=> 'required',
            'image'=> 'required',
        ]);
        $slider = new Slider;
        $slider-> heading = $request->input('heading');
        $slider-> description = $request->input('description');
        $slider-> link = $request->input('link');
        $slider-> link_name = $request->input('link-name');
        if ($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file-> move('uploads/slider/',$filename);
            $slider->image = $filename;
        }
        $slider->status = $request->input('status') == true ? '1':'0';
        $slider->save();
        return redirect()->back()->with('status','Pesan : Banner telah ditambahkan');
    }

    public function edit($id){
        $slider = Slider::find($id);
        return view('slider.edit',compact('slider'));
    }
    public function update(Request $request,$id){
        $slider = Slider::find($id);
        $slider-> heading = $request->input('heading');
        $slider-> description = $request->input('description');
        $slider-> link = $request->input('link');
        $slider-> link_name = $request->input('link-name');
        if ($request->hasfile('image')){
            $destination = 'uploads/slider/'.$slider->image;
            if (File::exists($destination)){
                File::delete($destination);

            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file-> move('uploads/slider/',$filename);
            $slider->image = $filename;
        }
        $slider->status = $request->input('status') == true ? '1':'0';
        $slider->save();
        return redirect()->back()->with('status','Pesan : Banner telah diperbarui');
    }
}
