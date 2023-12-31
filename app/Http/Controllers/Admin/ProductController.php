<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products= Product::latest()->get();
        return view('admin.allproduct',compact('products'));
    }

    public function addproduct()
    {
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        return view('admin.addproduct', compact('categories', 'subcategories'));
    }

    public function storeproduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'product_description' => 'required',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'), $img_name);
        $img_url = 'upload/'.$img_name;

        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_subcategory_id;
        $category_name = Category::where('id', $category_id)->value('category_name');
        $subcategory_name = Subcategory::where('id', $subcategory_id)->value('subcategory_name');

        Product::insert([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'price' => $request->price,
            'product_category_name' => $category_name,
            'product_subcategory_name' => $subcategory_name,
            'product_category_id' => $request->product_category_id,
            'product_subcategory_id' => $request->product_subcategory_id,
            'product_img' =>  $img_url,
            'quantity' => $request->quantity,
            'slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),        
        ]);

        Category::where('id', $category_id)->increment('product_count', 1);
        Subcategory::where('id', $subcategory_id)->increment('product_count', 1);

        return redirect()->route('allproduct')->with('message', 'Product Added successfully');
    }

    public function editProductImg($id){
        $productinfo = Product::findOrFail($id);
        return view('Admin.editProductImg', compact('productinfo'));
    }

    public function updateproductimg(Request $request){
        $request->validate([       
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $id= $request->id;
        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'), $img_name);
        $img_url = 'upload/'.$img_name;

        Product::findOrFail($id)->update([
            'product_img' =>  $img_url,
        ]);
        return redirect()->route('allproduct')->with('message', 'Image Updated successfully');
    }


    public function editproduct($id){
        $productinfo = Product::findOrFail($id);
        return view('Admin.editproduct', compact('productinfo'));
    }

    public function updateproduct(Request $request){
        $productid= $request->id;
        $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'product_description' => 'required',
        ]);
    Product:: findOrFail($productid)->update([
        'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),        
    ]);
    return redirect()->route('allproduct')->with('message', 'Product Updated successfully');
    }

    public function deleteproduct($id){
        
        $category_id= Product::where('id',$id)->value('product_category_id');
        $subcategory_id= Product::where('id',$id)->value('product_subcategory_id');       
        Product::findOrFail($id)->delete();

        Category::where('id', $category_id)->decrement('product_count', 1);
        Subcategory::where('id', $subcategory_id)->decrement('product_count', 1);
        return redirect()->route('allproduct')->with('message', 'Product Deleted successfully');
    }
}
