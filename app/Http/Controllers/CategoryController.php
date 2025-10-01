<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.viewCategory', [
            "categories" => Category::all(),
        ]);
    }

    public function create()
    {
        return view('admin.createCategory');
    }

    public function store(Request $request)
    {
        $request = $request->validate([
            'category' => 'required|unique:categories|max:255|min:3',
        ]);
        $category = new Category;
        $category->category = $request['category'];
        $category->save();
        return redirect()->back()->with('category_message', 'Category Added Successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        return view('admin.edit', [
            'category' => Category::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request = $request->validate([
            'category' => 'required|unique:categories|max:255|min:3',
        ]);
        $category = Category::findOrFail($id);
        $category->category = $request['category'];
        $category->save();
        return redirect()->route('categories.index')->with('update', 'Updated Successfully');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('delete', 'Category Deleted Successfully');
    }
}
