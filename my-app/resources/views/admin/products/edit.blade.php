@vite('resources/css/app.css')
@extends('admin.layout')

@section('content')
<form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="p-6">
    @csrf
    @method('PUT')

    {{-- Title --}}
    <input type="text" name="title" value="{{ $product->title }}" placeholder="Title" class="border p-2 w-full mb-2" required>

    {{-- Category --}}
    <select name="category" class="border p-2 w-full mb-2" required>
        <option value="Men" {{ $product->category == 'Men' ? 'selected' : '' }}>Men</option>
        <option value="Women" {{ $product->category == 'Women' ? 'selected' : '' }}>Women</option>
        <option value="Kids" {{ $product->category == 'Kids' ? 'selected' : '' }}>Kids</option>
        <option value="Sale" {{ $product->category == 'Sale' ? 'selected' : '' }}>Sale</option>
    </select>

    {{-- Description --}}
    <textarea name="description" placeholder="Description" class="border p-2 w-full mb-2" required>{{ $product->description }}</textarea>

    {{-- Price --}}
    <input type="number" step="0.01" name="price" value="{{ $product->price }}" placeholder="Price" class="border p-2 w-full mb-2" required>

    {{-- Stock --}}
    <input type="number" name="stock" value="{{ $product->stock }}" placeholder="Stock" class="border p-2 w-full mb-2" required>

   @if($product->image)
    <img src="data:image/jpeg;base64,{{ base64_encode($product->image) }}" width="80" class="mb-3">
@endif

    <input type="file" name="image" class="border p-2 w-full mb-2">

    <button class="px-4 py-2 bg-green-600 text-white">Update</button>
</form>
@endsection
