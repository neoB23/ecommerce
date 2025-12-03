@vite('resources/css/app.css')
@extends('admin.layout')

@section('title', 'Products Management')

@section('content')

<div class="max-w-full">
    {{-- Main Content Card Wrapper --}}
    <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
        
        <div class="flex justify-between items-center mb-6 border-b pb-4">
            <h2 class="text-2xl font-bold text-gray-800">Product Inventory</h2>
            
            {{-- Add Product Button --}}
            <a href="{{ route('admin.products.create') }}"
               class="px-4 py-2 bg-gray-900 text-white font-medium rounded-lg hover:bg-gray-700 transition duration-150 ease-in-out shadow-md">
                <i class="fas fa-plus mr-1"></i> Add New Product
            </a>
        </div>

        {{-- Table Container for Scrolling --}}
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                
                {{-- Table Header --}}
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Stock
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>

                {{-- Table Body --}}
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($products as $product)
                    <tr>
                        {{-- Image --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img src="data:image/jpeg;base64,{{ base64_encode($product->image) }}" 
     alt="{{ $product->title }}" 
     class="w-16 h-16 object-cover rounded-md border border-gray-200 shadow-sm">

                        </td>
                        {{-- Title --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $product->title }}
                        </td>
                        {{-- Category --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            {{ $product->category }}
                        </td>
                        {{-- Price --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 font-semibold">
                            ₱{{ number_format($product->price, 2) }}
                        </td>
                        {{-- Stock (with Badge) --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($product->stock < 10)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Low ({{ $product->stock }})
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    In Stock ({{ $product->stock }})
                                </span>
                            @endif
                        </td>
                        {{-- Actions --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                            
                            {{-- Edit Button (Subtle Theme) --}}
                            <a href="{{ route('admin.products.edit', $product->id) }}"
                               class="px-3 py-2 border border-gray-300 bg-white text-gray-700 rounded-lg hover:bg-gray-100 transition duration-150 ease-in-out">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>

                            {{-- Delete Form (Red Theme for destructive action) --}}
                            <form action="{{ route('admin.products.destroy', $product->id) }}"
                                  method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" 
                                        class="px-3 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-150 ease-in-out"
                                        onclick="return confirm('Are you sure you want to permanently delete this product? This action cannot be undone.')">
                                    <i class="fas fa-trash-alt mr-1"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        {{-- Optional: Pagination Links --}}
        {{-- <div class="mt-6">
            {{ $products->links() }}
        </div> --}}

    </div>
</div>

@endsection