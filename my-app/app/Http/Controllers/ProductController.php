<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Fetch Men's products
    public function mens() {
        $products = Product::where('category', 'men')->get();
        return view('pages.mens', compact('products'));
    }

    // Fetch Women's products
    public function womens() {
        $products = Product::where('category', 'women')->get();
        return view('pages.womens', compact('products'));
    }

    // Fetch Kids products
    public function kids() {
        $products = Product::where('category', 'kids')->get();
        return view('pages.kids', compact('products'));
    }

    // Fetch Sale products
    public function sale() {
        $products = Product::where('category', 'sale')->get();
        return view('pages.sale', compact('products'));
    }

    // Store product
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'required|string', // new
            'image' => 'nullable|image',
        ]);

        Product::create([
            'seller_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category' => $request->category, // new
            'image' => $request->image ? $request->image->store('products', 'public') : null,
        ]);

        return redirect()->back()->with('success', 'Product added successfully!');
    }
}
