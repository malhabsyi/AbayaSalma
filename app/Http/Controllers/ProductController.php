<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
        $product = product::all();
        return view('product.index',compact('product'));
    }
    public function create(){
        return view('product.create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'product_name'=> 'required',
            'product_desc'=> 'required',
            'product_image'=> 'required',
            'product_harga' => 'required',
            'product_stock' => 'required',

            
        ]);
        $product = new product;
        $product-> product_name = $request->input('product_name');
        $product-> product_desc = $request->input('product_desc');
        $product-> product_harga = $request->input('product_harga');
        $product-> product_stock = $request->input('product_stock');
        if ($request->hasfile('product_image')){
            $file = $request->file('product_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file-> move('uploads/product/',$filename);
            $product->product_image = $filename;
        }
        $product->status = $request->input('status') == true ? '1':'0';
        $product->save();
        return redirect()->back()->with('status','Pesan : Product telah ditambahkan');
    }

    public function edit($id){
        $product = product::find($id);
        return view('product.edit',compact('product'));
    }
    public function update(Request $request,$id){
        $product = product::find($id);
        $product-> product_name = $request->input('product_name');
        $product-> product_desc = $request->input('product_desc');
        $product-> product_harga = $request->input('product_harga');
        $product-> product_stock = $request->input('product_stock');
        if ($request->hasfile('product_image')){
            $destination = 'uploads/product/'.$product->product_image;
            if (File::exists($destination)){
                File::delete($destination);

            }
            $file = $request->file('product_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file-> move('uploads/product/',$filename);
            $product->product_image = $filename;
        }
        $product->status = $request->input('status') == true ? '1':'0';
        $product->save();
        return redirect()->back()->with('status','Pesan : Product telah diperbarui');
    }
}
