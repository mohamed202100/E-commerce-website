<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(2);
        return view('admin.viewProducts', compact('products'));
    }

    public function create()
    {
        return view('admin.createProduct', [
            'categories' => Category::all()
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        $request = $request->validated();

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

    public function show(string $id)
    {
        return response()->json(Product::findOrFail($id));
    }

    public function edit($id)
    {
        return view('admin.editProduct', [
            'product' => Product::findOrFail($id),
            'categories' => Category::all()
        ]);
    }

    public function update(StoreProductRequest $request, $id)
    {
        $request = $request->validated();
        $product = Product::findOrFail($id);
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
        return redirect()->route('products.index')->with('update', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $image_path = public_path('products/' . $product->product_image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $product->delete();

        return redirect()->back()->with('delete', 'Product Deleted Successfully');
    }
    public function findProduct(Request $request)
    {
        $products = Product::where('product_title', 'LIKE', '%' . $request->search . '%')
            ->orWhere('product_description', 'LIKE', '%' . $request->search . '%')->paginate(2);
        return view('admin.viewProducts', compact('products'));
    }
}
