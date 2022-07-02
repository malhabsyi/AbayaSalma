<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PembelianController extends Controller
{
    public function index(){

        $pembelian = Pembelian::all();
        $product = Product::all();
        return view('pembelian.index',compact([
            'pembelian',
            'product',
        ]));
    }
    public function create(){
        return view('pembelian.create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'quantity'=> 'required',
     
        ]);
        $pembelian = new Pembelian;
        $pembelian-> quantity = $request->input('quantity');
        $pembelian->status_tf = $request->input('status_tf') == true ? '1':'0';
        $pembelian->total_harga = $request->input('total_harga');
        $pembelian->user_id = $request->input('user_id');
        $pembelian->product_id = $request->input('product_id');


        $pembelian->save();
        return redirect()->back()->with('status_tf','Pesan : Pembelian telah diperbarui');
    }

    public function edit($id){
        $pembelian = Pembelian::find($id);
        return view('pembelian.edit',compact('pembelian'));
    }
    public function update(Request $request,$id){
        $pembelian = Pembelian::find($id);
        $pembelian-> status_tf = $request->input('status_tf');

        if ($request->hasfile('bukti_tf')){
            $destination = 'uploads/bukti_tf/'.$pembelian->bukti_tf;
            if (File::exists($destination)){
                File::delete($destination);

            }
            $file = $request->file('bukti_tf');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file-> move('uploads/bukti_tf/',$filename);
            $pembelian->bukti_tf = $filename;
        }
        $pembelian->status_tf = $request->input('status_tf') == true ? '1':'0';
        $pembelian->save();
        return redirect()->back()->with('status_tf','Pesan : Pembelian telah diperbarui');
    }
}
