<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClinteController extends Controller
{
    public function categorypage(){
        return view('frontend.category');
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
