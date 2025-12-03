<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Display table of products
    public function index()
    {
        $products = Product::all(); // ✅ fetch products
        return view('admin.products.index', compact('products')); // ✅ correct view
    }

    // Show add form
    public function create()
    {
        return view('admin.products.create');
    }

    // Store new product
    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required',
        'category' => 'required|in:Men,Women,Kids,Sale',
        'description' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'image' => 'nullable|mimes:png,jpg,jpeg,webp,avif'

    ]);

    // Read image as binary
    $imageData = file_get_contents($request->file('image')->getRealPath());

    Product::create([
        'title' => $validated['title'],
        'category' => $validated['category'],
        'description' => $validated['description'],
        'price' => $validated['price'],
        'stock' => $validated['stock'],
        'image' => $imageData,
    ]);

    return redirect()->back()->with('success', 'Product created!');
}



    // Edit product
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // Update product
    public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $validated = $request->validate([
        'title' => 'required',
        'category' => 'required|in:Men,Women,Kids,Sale',
        'description' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'image' => 'nullable|mimes:png,jpg,jpeg,webp,avif'

    ]);

    if ($request->hasFile('image')) {
        $validated['image'] = file_get_contents($request->file('image')->getRealPath());
    }

    $product->update($validated);

    return redirect()->route('admin.products.index')->with('success', 'Product updated!');
}


    // Delete product
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Product deleted.');
    }
}
