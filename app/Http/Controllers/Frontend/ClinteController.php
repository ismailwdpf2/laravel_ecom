<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ClinteController extends Controller
{
    public function categorypage($id){
        $category = Category::findOrFail($id);
        $products =Product::where('product_category_id', $id)->latest()->get();
        return view('frontend.category', compact('category','products'));
    }
    public function singlepage(){
        return view('frontend.singlepage');
    }
    public function addtocart(){
        return view('frontend.addtocart');
    }
    public function checkout(){
        return view('frontend.checkout');
    }
    public function userprofile(){
        return view('frontend.userprofile');
    }
    public function customerservice(){
        return view('frontend.customerservice');
    }

}
