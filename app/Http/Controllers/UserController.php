<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home()
    {
        $products = Product::latest()->take(2)->get();
        return view('index', compact('products'));
    }

    public function allProducts()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    public function index()
    {
        if (Auth::check() && Auth::user()->user_type == 'admin') {
            return view('admin.dashboard');
        } elseif (Auth::user()->user_type == 'user') {
            return view('dashboard');
        }
    }

    public function productDetails($id)
    {
        $product = Product::findOrFail($id);
        return view('productDetails', compact('product'));
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $product_cart = new ProductCart();
        $product_cart->user_id = Auth::id();
        $product_cart->product_id = $product->id;
        $product_cart->save();

        return redirect()->back()->with('success', 'Product Added To Cart');
    }
}
