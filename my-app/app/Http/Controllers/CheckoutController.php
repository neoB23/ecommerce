<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\OrderItem;
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

        // Create an order item with total amount
        $totalAmount = $cartItems->sum(function($item) {
            return $item->quantity * $item->product->price;
        });

        OrderItem::create([
            'customer_id'  => $userId,
            'total_amount' => $totalAmount,
            'status'       => 'Pending',
        ]);

        // Clear the cart
        Cart::where('user_id', $userId)->delete();

        // Redirect to purchases page
        return redirect()->route('customer.orders')->with('success', 'Checkout complete!');
    }
}
