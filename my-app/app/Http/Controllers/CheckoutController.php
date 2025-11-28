<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // Show checkout page
    public function index()
    {
        $items = Cart::with('product')
                     ->where('user_id', Auth::id())
                     ->get();

        return view('customer.checkout', compact('items'));
    }

    // Process checkout
    public function process()
{
    $userId = Auth::id();
    
    $cartItems = Cart::with('product')
                     ->where('user_id', $userId)
                     ->get();

    if ($cartItems->isEmpty()) {
        return back()->with('error', 'Your cart is empty.');
    }

    // Check stock for each item
    foreach ($cartItems as $item) {
        if ($item->quantity > $item->product->stock) {
            return back()->with('error', $item->product->title . ' does not have enough stock.');
        }
    }

    // Calculate total
    $totalAmount = $cartItems->sum(function($item) {
        return $item->quantity * $item->product->price;
    });

    // Create the order
    OrderItem::create([
        'customer_id'  => $userId,
        'total_amount' => $totalAmount,
        'status'       => 'Pending',
    ]);

    // Reduce stock for each product
    foreach ($cartItems as $item) {
        $item->product->decrement('stock', $item->quantity);
    }

    // Clear the cart
    Cart::where('user_id', $userId)->delete();

    return redirect()->route('customer.orders')->with('success', 'Checkout complete!');
}
}
