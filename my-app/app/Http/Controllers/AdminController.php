<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\OrderItem; // ← use OrderItem, not Order

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'productCount'    => Product::count(),
            'pendingOrders'   => OrderItem::where('status', 'Pending')->count(),
            'deliveredOrders' => OrderItem::where('status', 'Delivered')->count(),
        ]);
    }
}
