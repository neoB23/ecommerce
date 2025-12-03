@vite('resources/css/app.css')
@extends('admin.layout')

@section('content')
<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
    @csrf

    {{-- Title --}}
    <input type="text" name="title" placeholder="Title" class="border p-2 w-full mb-2" required>

    {{-- Category --}}
    <select name="category" class="border p-2 w-full mb-2" required>
        <option value="" disabled selected>Select Category</option>
        <option value="Men">Men</option>
        <option value="Women">Women</option>
        <option value="Kids">Kids</option>
        <option value="Sale">Sale</option>
    </select>

    {{-- Description --}}
    <textarea name="description" placeholder="Description" class="border p-2 w-full mb-2" required></textarea>

    {{-- Price --}}
    <input type="number" step="0.01" name="price" placeholder="Price" class="border p-2 w-full mb-2" required>

    {{-- Stock --}}
    <input type="number" name="stock" placeholder="Stock" class="border p-2 w-full mb-2" required>

    {{-- Image --}}
    <input type="file" name="image" class="border p-2 w-full mb-2" required>

    <button class="px-4 py-2 bg-blue-600 text-white">Add Product</button>
</form>
@endsection
