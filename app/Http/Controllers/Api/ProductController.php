<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return $products;
    }

    public function create()
    {
        return view('admin.createProduct', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->product_title       = $request->product_title;
        $product->product_category    = $request->product_category;
        $product->product_description = $request->product_description;
        $product->product_quantity    = $request->product_quantity;
        $product->product_price       = $request->product_price;

        $product->save();
        return "product added";
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

    public function update(Request $request, $id)
    {
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
        return  'Updated Successfully';
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
