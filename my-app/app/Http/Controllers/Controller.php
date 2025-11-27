<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\ProductController;

abstract class Controller
{
    public function index()
    {
        // Fetch cart items for the logged-in user
        $items = Cart::where('user_id', Auth::id())
                     ->with('product') // eager load the related product
                     ->get();

        return view('customer.cart', compact('items'));
    }
}
