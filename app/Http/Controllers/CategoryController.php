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
        $category = new Category;
        $category->category = $request->category;
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
        $category = Category::findOrFail($id);
        $category->category = $request->category;
        $category->save();
        return redirect()->route('categories.index')->with('update', 'Updated Successfully');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('delete', 'Category Deleted Successfully');
    }
}
