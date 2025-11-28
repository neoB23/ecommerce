@vite('resources/css/app.css')
@section('title', 'KickCraze - Order History')
@include('components.navbar')
@include('components.subnav')

<div class="max-w-6xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-extrabold text-gray-900 mb-6 border-b border-gray-200 pb-2">Order History</h1>
    
    <div class="space-y-8">
        @forelse($orders as $order)
            {{-- 📦 Order Block: Professional, List-Based Structure --}}
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden transition duration-300 hover:shadow-xl">
                
                {{-- ## Order Header & Status --}}
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center p-4 bg-gray-50 border-b border-gray-200">
                    <div class="flex flex-wrap gap-x-8 gap-y-2 text-sm text-gray-700">
                        <div>
                            <span class="font-medium uppercase tracking-wider block">Order Placed</span>
                            <span class="text-gray-900 font-semibold">{{ $order->created_at->format('M d, Y') }}</span>
                        </div>
                        <div>
                            <span class="font-medium uppercase tracking-wider block">Total Paid</span>
                            <span class="text-gray-900 font-bold">${{ number_format($order->total_amount, 2) }}</span>
                        </div>
                        <div>
                            <span class="font-medium uppercase tracking-wider block">Order ID</span>
                            <span class="text-gray-900 font-semibold">#{{ $order->id }}</span>
                        </div>
                    </div>

                    {{-- Status Indicator (Prominent) --}}
                    <div class="mt-4 md:mt-0">
                        @php
                            $status = strtolower($order->status);
                            $isDelivered = $status === 'delivered';
                            // Strictly B/W/G palette
                            $statusClass = $isDelivered ? 'bg-black text-white' : 'bg-gray-200 text-gray-800';
                            $statusIcon = $isDelivered ? '✅' : '📦';
                        @endphp
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold tracking-wide {{ $statusClass }}">
                            {{ $statusIcon }} {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>

                {{-- ## Order Items and Actions --}}
                <div class="p-6">
                    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center space-y-4 lg:space-y-0">
                        
                        {{-- Product Summary --}}
                        <div class="flex items-center space-x-4 w-full lg:w-3/5">
                            {{-- Image and error handler --}}
                            <img src="{{ $order->product_image ?? 'Images/default.png' }}" 
                                 alt="Product from Order #{{ $order->id }}" 
                                 class="w-20 h-20 object-cover rounded-lg border border-gray-200 flex-shrink-0"
                                 onerror="this.onerror=null; this.src='https://placehold.co/80x80/e5e7eb/374151?text=Product';"
                            >
                            
                            {{-- Product Name (Placeholder) --}}
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">
                                    Product Name Placeholder
                                </h3>
                                <p class="text-sm text-gray-600 mt-1">
                                    {{-- Assuming a way to count items if it's a collection, otherwise use placeholder --}}
                                    @if(isset($order->item_count) && $order->item_count > 1) 
                                        + {{ $order->item_count - 1 }} more item(s)
                                    @else
                                        Quantity: {{ $order->quantity ?? 1 }}
                                    @endif
                                </p>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4 w-full lg:w-2/5 lg:justify-end">                   
                        </div>
                    </div>
                </div>

            </div>
            
        @empty
            {{-- Empty State --}}
            <div class="text-center py-20 bg-white rounded-xl border border-gray-200 shadow-inner">
                <p class="text-2xl font-bold text-gray-900 mb-2">No Past Orders Found</p>
                <p class="text-gray-600">Your order history is currently empty.</p>
                <a href="/" class="mt-4 inline-block text-black font-medium underline hover:no-underline">Start Shopping</a>
            </div>
        @endforelse
    </div>
</div>