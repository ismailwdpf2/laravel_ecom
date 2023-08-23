<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = category::latest()->get();
        return view('admin.allcategory', compact('categories'));
    }

    public function addcategory()
    {
        return view('admin.addcategory');
    }

    public function storecategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories'
        ]);
        Category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ', '-', $request->category_name))
        ]);
        return redirect()->route('allcategory')->with('message', 'category added successfully');
    }

    //Edit category
    public function editcategory($id)
    {
        $category_info = category::findOrFail($id);
        return view('admin.editcategory', compact('category_info'));
    }

    //update category
    public function updatecategory(Request $request)
    {
        $categoy_id = $request->category_id;

        $request->validate([
            'category_name' => 'required|unique:categories'
        ]);

        category::findOrFail($categoy_id)->update([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ', '-', $request->category_name))
        ]);
        return redirect()->route('allcategory')->with('message', 'category updated successfully');
    }

    public function deletecategory($id)
    {
        category::findOrFail($id)->delete();
        return redirect()->route('allcategory')->with('message', 'category Deleted successfully');
    }
}
