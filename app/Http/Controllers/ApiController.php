<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Shippinginfo;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ApiController extends Controller
{
   public function index(){
    $p = Product::all();
    $c = Category::all();
    $sub_c = Subcategory::all();
    $o = Order::all();
    $ship = Shippinginfo::all();
    $od= OrderDetail::all();
  
   return response()->json([
    'product' => $p,
    'category' => $c,
    'subcategory' => $sub_c,
    'order' => $o,
    'shippinginfo' => $ship,
    'orderdetail' => $od
    ]
   );
}
}
