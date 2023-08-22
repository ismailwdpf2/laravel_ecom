<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function Pendingorder(){
    $pending_orders = Order::where('status', 'pending')->latest()->get();
    return view('admin.Pendingorder',compact('pending_orders'));
  }
  public function view_order($id){
    // dd()
    $order = Order::with("orderdetails")->where('id',$id)->get();
    dd($order);
    return view('admin.viewOrder');
  }
}
