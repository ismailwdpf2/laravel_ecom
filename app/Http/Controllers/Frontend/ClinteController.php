<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClinteController extends Controller
{
    public function categorypage($id){
        $category = Category::findOrFail($id);
        $products =Product::where('product_category_id', $id)->latest()->get();
        return view('frontend.layouts.category', compact('category','products'));
    }
    public function singlepage($id){
        $product = Product::findOrFail($id);
        $subcat_id = Product::where('id',$id)->value('product_subcategory_id');
        $related_product = Product::where('product_subcategory_id', $subcat_id)->latest()->get();
        return view('frontend.layouts.singlepage', compact('product','related_product'));
    }
    
    public function customerservice(){
        return view('frontend.layouts.customerservice');
    }
    public function userprofile(){
        return view('frontend.user.userprofile');
    }

    public function pendingOrder (){
        return view('frontend.user.pendingOrder');
    }
    public function userHistory(){
        return view('frontend.user.userHistory');
    }
   
    public function addtocart(){
        $userid =Auth::id();
        $cart_items = Cart::where('user_id', $userid)->get();
        return view('frontend.layouts.addtocart', compact('cart_items'));
    }
    public function checkout(){
        return view('frontend.layouts.checkout');
    }
    public function addproductcart(Request $request){
        $product_price = $request->price;
        $quantity = $request->quantity;
        $price = $product_price * $quantity;
        Cart::insert([       
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'quantity' => $request->quantity,
            'price' => $price
        ]);
        return redirect()->route('addtocart')->with('message','your item added to cart successfully');
    }
    public function removecart($id){
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('message','your item removed from cart successfully');
    }

    public function shippingaddress(){
        return view('frontend.user.shippingaddress');
    }
}
