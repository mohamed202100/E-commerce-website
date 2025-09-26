<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create()
    {
        return view('admin.createCategory');
    }
    public function store(Request $request)
    {
        $category = new Category;
        $category->category = $request->category;
        $category->save();
        return redirect()->back()->with('category_message', 'Category Added Successfully');
    }
    public function index()
    {
        return view('admin.viewCategory', [
            "categories" => Category::all(),
        ]);
    }
}
