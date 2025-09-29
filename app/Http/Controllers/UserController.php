<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home()
    {
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
        } else $count = "";

        $products = Product::latest()->take(2)->get();
        return view('index', compact('products', 'count'));
    }

    public function allProducts()
    {
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
        } else $count = "";

        $products = Product::all();
        return view('index', compact('products', 'count'));
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
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
        } else $count = "";

        $product = Product::findOrFail($id);
        return view('productDetails', compact('product', 'count'));
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

    public function cartProducts()
    {
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
            $cart = ProductCart::where('user_id', Auth::id())->get();
        } else $count = "";
        return view('viewCartProducts', compact('count', 'cart'));
    }

    public function removeFromCart($id)
    {
        $cart = ProductCart::findOrFail($id);
        $cart->delete();
        return redirect()->back()->with('delete', 'Removed Successfully');
    }

    public function confirmOrder(Request $request)
    {
        $cart = ProductCart::where('user_id', Auth::id())->get();
        $address = $request->address;
        $phone = $request->phone;
        foreach ($cart as $cart_product) {
            $order = new Order();
            $order->address = $address;
            $order->phone = $phone;
            $order->user_id = Auth::id();
            $order->product_id = $cart_product->product_id;
            $order->save();
            $cart_product->delete();
            $cart_product->save();
        }
        return redirect()->back()->with('confirm', 'Order Confirmed');
    }

    public function myOrders()
    {
        $orders = Order::where('user_id', '=', Auth::id())->get();
        return view('myOrders', compact('orders'));
    }
}
