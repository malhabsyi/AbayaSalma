<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\product;

class homepage extends Controller
{
    public function index(){
        $slider = Slider::where('status','0')->get();
        $product = product::all();
        return view ('homepage.index',compact([
            'slider',
            'product'
        ]));

    }
}
