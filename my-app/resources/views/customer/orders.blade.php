@vite('resources/css/app.css')

@extends('layout.app')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($orders as $order)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Product image -->
            <img src="{{ $order->product_image ?? 'Images/default.png' }}" 
                 alt="Product" 
                 class="w-full h-48 object-cover">

            <div class="p-4">
                <h2 class="text-lg font-semibold mb-2">Order #{{ $order->id }}</h2>
                <p class="text-gray-700 mb-1">
                    Total Amount: <span class="font-bold">${{ number_format($order->total_amount, 2) }}</span>
                </p>
                <p class="text-gray-700 mb-1">
                    Status: 
                    @if(strtolower($order->status) === 'delivered')
                        <span class="font-bold text-green-600">{{ $order->status }} ✅</span>
                    @else
                        <span class="font-bold text-yellow-500">{{ $order->status }}</span>
                    @endif
                </p>
                <p class="text-gray-500 text-sm">
                    Placed on: {{ $order->created_at->format('F d, Y') }}
                </p>
            </div>
        </div>
    @empty
        <p class="col-span-3 text-center text-gray-500">No orders yet.</p>
    @endforelse
</div>
@endsection