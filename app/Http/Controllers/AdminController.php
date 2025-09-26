<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        return redirect()->route('categories.index')->with('update', 'Category Updated Successfully');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('delete', 'Category Deleted Successfully');
    }

    public function indexProducts()
    {
        $products = Product::all();
        return view('admin.viewProducts', compact('products'));
    }


    public function createProduct()
    {
        return view('admin.createProduct', [
            'categories' => Category::all()
        ]);
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'product_title'       => 'required|string|max:255',
            'product_category'    => 'required|string|max:255',
            'product_description' => 'required|string',
            'product_quantity'    => 'required|integer|min:1',
            'product_price'       => 'required|numeric|min:0',
            'product_image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product = new Product();
        $product->product_title       = $request->product_title;
        $product->product_category    = $request->product_category;
        $product->product_description = $request->product_description;
        $product->product_quantity    = $request->product_quantity;
        $product->product_price       = $request->product_price;

        if ($request->hasFile('product_image')) {
            $image     = $request->file('product_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('products'), $imageName);
            $product->product_image = $imageName;
        }
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product Added Successfully!');
    }
}
