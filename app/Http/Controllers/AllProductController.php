<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class AllProductController extends Controller
{
    public function index(){
        $product = product::all();
        return view('product_details.index',compact('product'));
    }
}
