<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function index(){
    return view('admin.pendingorder');
  }
  public function comporder(){
    return view('admin.completeOrder');
  }
}
