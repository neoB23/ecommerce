<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderItem;

class OrderController extends Controller
{
    // Show all orders
   public function index()
{
    // Eager load related product and user to avoid N+1 query
    $orders = OrderItem::with('product', 'user')->orderBy('created_at', 'desc')->get();
    return view('admin.orders.index', compact('orders'));
}

    // Update order status
    public function updateStatus(Request $request, OrderItem $order)
    {
        $request->validate([
            'status' => 'required|in:Pending,Delivered',
        ]);

        $order->status = $request->status;
      
        
        $order->save();

        return redirect()->back()->with('success', 'Order status updated.');
    }
}
