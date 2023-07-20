<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('admin.allproduct');
    }
    public function addproduct(){
        return view('admin.addproduct');
    }
}
