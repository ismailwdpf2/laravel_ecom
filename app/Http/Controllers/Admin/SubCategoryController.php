<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

   public function index()
   {
      $subcategories = Subcategory::all();
      return view('admin.allsubcategory', compact('subcategories'));
   }
   public function addsubcategory()
   {
      $categories = Category::latest()->get();
      return view('admin.addsubcategory', compact('categories'));
   }
   public function storesubcategory(Request $request)
   {
      $subcategoy_id = $request->subcategory_id;

      $request->validate([
         'subcategory_name' => 'required|unique:subcategories',
         'category_id' => 'required'
      ]);
      $category_id = $request->category_id;
      $category_name = Category::where('id', $category_id)->value('category_name');
      Subcategory::insert([
         'subcategory_name' => $request->subcategory_name,
         'slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
         'category_id' => $category_id,
         'category_name' => $category_name
      ]);
      Category::where('id', $category_id)->increment('subcategory_count', 1);


      return redirect()->route('allsubcategory')->with('message', 'subcategory added successfully');
   }
   public function editsubcategory($id)
   {
      $subcategory_info = Subcategory::findOrFail($id);
      return view('admin.editsubcategory', compact('subcategory_info'));
   }

   
   public function updatesubcategory(Request $request)
   {
      $request->validate([
         'subcategory_name' => 'required|unique:subcategories',
      ]);
      $subcategory_id = $request->subcategory_id;
      Subcategory::findOrFail($subcategory_id)->update([
         'subcategory_name' => $request->subcategory_name,
         'slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
      ]);
      return redirect()->route('allsubcategory')->with('message', 'subcategory Update successfully');
   }
   public function deletesubcategory($id){
      $category_id= Subcategory::where('id',$id)->value('category_id');
      Subcategory::findOrFail($id)->delete();
      Category::where('id', $category_id)->decrement('subcategory_count', 1);
      return redirect()->route('allsubcategory')->with('message', 'subcategory Deleted successfully');
   }

}
