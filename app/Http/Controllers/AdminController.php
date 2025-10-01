<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function viewOrders()
    {
        $orders = Order::all();
        return view('admin.viewOrders', compact('orders'));
    }

    public function changeStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();
        return redirect()->back();
    }

    public function downloadPDF($id)
    {
        $data = Order::findOrFail($id);
        $pdf = Pdf::loadView('admin.invoice', compact('data'));
        return $pdf->download('customerOrder.pdf');
    }
}
