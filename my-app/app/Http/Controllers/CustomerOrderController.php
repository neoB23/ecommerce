<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderItem;

class CustomerOrderController extends Controller
{
    // Show all orders
    public function index()
    {
        $orders = OrderItem::with('product')
            ->where('customer_id', auth()->id()) // fixed
            ->orderBy('created_at', 'desc')
            ->get();

        return view('customer.orders', compact('orders'));
    }

    // Update order status
    public function updateStatus(Request $request, OrderItem $order)
    {
        $request->validate([
            'status' => 'required|in:Pending,Delivered',
        ]);

        $order->status = $request->status;

        if ($request->status === 'Delivered') {
            $order->delivered_at = now();
        }

        $order->save();

        return redirect()->back()->with('success', 'Order status updated.');
    }

    public function deliveredOrders()
    {
        $orders = OrderItem::with('product')
            ->where('customer_id', auth()->id()) // fixed
            ->orderBy('created_at', 'desc')
            ->get();

        return view('customer.orders', compact('orders'));
    }
}
