<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function Pendingorder()
  {
    $pending_orders = Order::where('status', 'pending')->latest()->get();
    return view('admin.Pendingorder', compact('pending_orders'));
  }

  public function viewOrder($id)
  {
    $order = Order::with("orderdetails")->find($id);

    return view('admin.viewOrder', compact('order'));
  }
  public function updateOrder(Request $request, $id)
  {
    $order = Order::find($id);

    $order_details = new OrderDetail;
    $order_details->order_id = $request->id;
    $order_details->product_id = $request->product_id;
    $order_details->total_price = $request->total_price;
    $order_details->payment = $request->input('payment');
    $order_details->discount = $request->input('discount');
    $order_details->trx_id = $request->input('trx_id');
    $order_details->comment = $request->input('comment');

    $order_details->save();

    return redirect()->route('view_order', ['id' => $order->id])->with('success', 'Order details updated successfully.');
  }
}
