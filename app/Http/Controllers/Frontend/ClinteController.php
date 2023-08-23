<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Shippinginfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;

class ClinteController extends Controller
{
    public function categorypage($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('product_category_id', $id)->latest()->get();
        return view('frontend.layouts.category', compact('category', 'products'));
    }
    public function singlepage($id)
    {
        $product = Product::findOrFail($id);
        $subcat_id = Product::where('id', $id)->value('product_subcategory_id');
        $related_product = Product::where('product_subcategory_id', $subcat_id)->latest()->get();
        return view('frontend.layouts.singlepage', compact('product', 'related_product'));
    }

    public function customerservice()
    {
        return view('frontend.layouts.customerservice');
    }
    public function userprofile()
    {
        return view('frontend.user.userprofile');
    }

    public function pendingOrder()
    {
        $pending_orders = Order::where('status', 'pending')->latest()->get();
        return view('frontend.user.pendingOrder', compact('pending_orders'));
    }
    public function userHistory()
    {
        return view('frontend.user.userHistory');
    }

    public function addtocart()
    {
        $userid = Auth::id();
        $cart_items = Cart::where('user_id', $userid)->get();
        return view('frontend.user.addtocart', compact('cart_items'));
    }
    public function checkout()
    {
        $userid = Auth::id();
        $cart_items = Cart::where('user_id', $userid)->get();
        $shipping_address = Shippinginfo::where('user_id', $userid)->first();
        return view('frontend.user.checkout', compact('cart_items', 'shipping_address'));
    }
    public function addproductcart(Request $request)
    {
        $product_price = $request->price;
        $quantity = $request->quantity;
        $price = $product_price * $quantity;
        Cart::insert([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'quantity' => $request->quantity,
            'price' => $price
        ]);
        return redirect()->route('addtocart')->with('message', 'your item added to cart successfully');
    }
    public function removecart($id)
    {
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('message', 'your item removed from cart successfully');
    }

    public function shippingaddress()
    {
        return view('frontend.user.shippingaddress');
    }
    
    public function Addshippingaddress(Request $request)
    {
        $this->validate($request, [
            'phone_number' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);

        Shippinginfo::insert([
            'user_id' => Auth::id(),
            'phone_number' => $request->phone_number,
            'city' => $request->city,
            'address' => $request->address,
        ]);

        return redirect()->route('checkout')->with('message', 'checkout success');
    }

    public function placeorder(Request $request)
    {

        $userid = Auth::id();
        $shipping_address = Shippinginfo::where('user_id', $userid)->first();
        $cart_items = Cart::where('user_id', $userid)->get();
        // dd($cart_items);
        $total = 0;
        foreach ($cart_items as $item) {
            $total = $item->subtotal;
        }

        $o = new Order();
        $o->user_id = Auth::id();
        $o->shipping_phoneNo = $shipping_address->phone_number;
        $o->shipping_city = $shipping_address->city;
        $o->shipping_address = $shipping_address->address;
        $o->payment = $request->payment;
        $o->discount = $request->discount;
        $o->trx_id = $request->trx_id;
        $o->comment = $request->comment;
        $o->total_price = $total;

        $o->save();

        foreach ($cart_items as $item) {
            $od = new OrderDetail();
            $od->product_id = $item->product_id;
            $od->quantity = $item->quantity;
            $od->price = $item->price;
            $od->total_price = $item->price * $item->quantity;
            $o->orderdetails()->save($od);
            $item->delete();
        }

        Shippinginfo::where('user_id', $userid)->first()->delete();
        // Cart::findOrFail($id)->delete();
        Cart::where('user_id', $userid)->delete();

        return redirect()->route('pendingOrder')->with('message', 'Your order has been processed. Order ID: ' . $o->id);
    }


    public function invoice($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }
    
        $orderDetails = OrderDetail::where('order_id', $id)->get();
        
        return view('frontend.user.invoice', compact('order', 'orderDetails'));
    
        
    }
}
