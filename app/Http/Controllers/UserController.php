<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;

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

    public function stripe($price)

    {
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
        } else $count = "";

        $price = $price;
        return view('stripe', compact('count', 'price'));
    }

    public function stripePost(Request $request)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));



        Stripe\Charge::create([

            "amount" => 100 * 100,

            "currency" => "usd",

            "source" => $request->stripeToken,

            "description" => "Test payment from itsolutionstuff.com."

        ]);

        $cart = ProductCart::where('user_id', Auth::id())->get();
        $address = $request->address;
        $phone = $request->phone;
        $order = new Order();
        foreach ($cart as $cart_product) {
            $order->address = $address;
            $order->phone = $phone;
            $order->user_id = Auth::id();
            $order->product_id = $cart_product->product_id;
            $order->payment_status = 'Paid';
            $order->save();
            $cart_product->delete();
            $cart_product->save();
        }

        if ($order->payment_status == 'Paid') {
            $product = Product::where('id', '=', $order->product_id);
            $product->product_quantity--;
            $product->save();
        }

        return redirect()->back()->with('success', 'Payment successful!');
    }
}
