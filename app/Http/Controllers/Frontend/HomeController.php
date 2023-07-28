<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $allproducts = Product::latest()->get();
        return view('frontend.home',compact('allproducts'));
    }
}
