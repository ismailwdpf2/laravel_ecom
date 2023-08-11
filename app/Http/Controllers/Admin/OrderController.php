<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function Pendingorder(){
    $pending_orders = Order::where('status', 'pending')->latest()->get();
    return view('admin.Pendingorder',compact('pending_orders'));
  }
  public function comporder(){
    return view('admin.completeOrder');
  }
}
