<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('admin.allproduct');
    }
    public function addproduct(){
        $categories= Category::latest()->get();
        $subcategories= Subcategory::latest()->get();
        return view('admin.addproduct',compact('categories', 'subcategories'));
    }
    public function storeproduct(Request $request){
        $request->validate([
            'product_name'=> 'required',
            'price'=> 'required',
            'quantity'=> 'required',
            'product_description'=> 'required',
            'category_id'=> 'required',
            'category_name'=> 'required',
            'subcategory_id'=> 'required',
            'subcategory_name'=> 'required',
         ]);
    }
}
