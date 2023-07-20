<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  
public function test(){
    return view('userprofile');
}
public function index(){
    return view('admin.admindashboard');
}
}
