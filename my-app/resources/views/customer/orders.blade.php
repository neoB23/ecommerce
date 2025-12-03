@include('components.lastnav')
@vite('resources/css/app.css')

@extends('layout.app')
@section('title', 'KickCraze | Order History')
@section('content')
<div class="max-w-6xl min-h-screen mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <h1 class="text-4xl font-extrabold text-gray-900 mb-8 border-b-2 border-gray-200 pb-3">My Orders</h1>
    
    <div class="space-y-8">
        @forelse($orders as $order)
            {{-- 📦 Order Block: Professional Card --}}
            <div class="bg-white rounded-xl shadow-2xl border border-gray-100 overflow-hidden transition duration-300 hover:shadow-xl">
                
                {{-- ## 1. Order Header & Status --}}
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center p-6 bg-gray-50 border-b border-gray-200">
                    
                    {{-- Metadata: Order ID, Date, Total --}}
                    <div class="flex flex-wrap gap-x-10 gap-y-2 text-sm text-gray-700">
                        
                        <div>
                            <span class="font-semibold uppercase tracking-wider block text-gray-500">Order Placed</span>
                            <span class="text-gray-900 font-bold text-base">{{ $order->created_at->format('M d, Y') }}</span>
                        </div>
                        
                        <div>
                            <span class="font-semibold uppercase tracking-wider block text-gray-500">Order ID</span>
                            <span class="text-gray-900 font-bold text-base">#{{ $order->id }}</span>
                        </div>
                        
                        <div>
                            <span class="font-semibold uppercase tracking-wider block text-gray-500">Total Paid</span>
                            <span class="text-black font-extrabold text-xl">${{ number_format($order->total_amount, 2) }}</span>
                        </div>
                    </div>

                    {{-- Status Indicator (Prominent) --}}
                    <div class="mt-4 md:mt-0">
                        @php
                            $status = strtolower($order->status);
                            // Define status colors (B&W/Grayscale/Green for success)
                            $statusClass = [
                                'delivered' => 'bg-green-100 text-green-800 border-green-200',
                                'shipped' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                                'pending' => 'bg-gray-100 text-gray-700 border-gray-300',
                                'cancelled' => 'bg-red-100 text-red-800 border-red-200',
                            ][$status] ?? 'bg-gray-100 text-gray-700 border-gray-300';
                            
                            $statusText = ucfirst($order->status);
                        @endphp
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold tracking-wider border {{ $statusClass }}">
                            {{ $statusText }}
                        </span>
                    </div>
                </div>

                {{-- ## 2. Order Items Preview and Actions --}}
                <div class="p-6">
                    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center space-y-4 lg:space-y-0">
                        
                        {{-- Product Summary & Preview --}}
                        <div class="flex items-center space-x-5 w-full lg:w-3/5">
                            
                            {{-- Image Preview/Placeholder --}}
                            <div class="flex-shrink-0 relative">
                                {{-- Mock Image Stack for multiple items (Visual cue) --}}
                                @if(($order->item_count ?? 2) > 1) 
                                <div class="w-16 h-16 bg-gray-200 rounded-lg absolute -top-1 -left-1 transform rotate-3 shadow-md border border-white"></div>
                                @endif
                                <img src="https://placehold.co/64x64/000000/FFFFFF?text=👟" 
                                    alt="Product Preview" 
                                    class="w-16 h-16 object-cover rounded-lg border-2 border-gray-300 relative z-10 shadow-lg">
                            </div>

                            {{-- Product Name and Details --}}
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 leading-snug">
                                    {{-- Placeholder Title - Replace with first item's title in a real app --}}
                                    KickCraze UltraBoost Running Shoe
                                </h3>
                                <p class="text-sm text-gray-600 mt-1 font-medium">
                                    {{-- Assuming item_count is available --}}
                                    Order contains <span class="font-semibold">{{ $order->item_count ?? 2 }}</span> {{ Str::plural('item', $order->item_count ?? 2) }}
                                </p>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                       
                    </div>
                </div>

            </div>
            
        @empty
            {{-- Empty State --}}
            <div class="text-center py-20 bg-white rounded-xl border border-gray-200 shadow-inner">
                <p class="text-3xl font-bold text-gray-900 mb-2">It's Quiet Here...</p>
                <p class="text-gray-600 text-lg">Your order history is currently empty. Time to find your next pair!</p>
                <a href="/" class="mt-6 inline-block text-lg font-semibold text-white bg-black px-8 py-3 rounded-lg hover:bg-gray-800 transition shadow-lg">
                    Start Shopping
                </a>
            </div>
        @endforelse
    </div>
</div>
@endsection