<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;  // ← ADD THIS
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function deliveredOrders()
{
    $orders = OrderItem::with('product')
                       ->where('customer_id', auth()->id())
                       ->orderBy('created_at', 'desc')
                       ->get();

    return view('customer.orders', compact('orders'));
}


}
