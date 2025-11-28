@vite('resources/css/app.css')
@include('components.navbar')
@section('title', 'KickCraze - Cart')

{{-- Main Container: Two-column layout (Cart Items + Summary) --}}
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-8 border-b border-gray-200 pb-2">Your Shopping Cart</h1>
    
    <div class="flex flex-col lg:flex-row gap-8">
        
        {{-- Left Column: Cart Items (Similar to Amazon/Shopee product listing structure) --}}
        <div class="lg:w-3/4">
            <div class="bg-white shadow-lg rounded-xl overflow-hidden divide-y divide-gray-100 border border-gray-200">
                
                {{-- Select All Header --}}
                <div class="flex items-center justify-between p-4 bg-gray-50">
                    <div class="flex items-center space-x-3">
                        <input type="checkbox" id="selectAll" class="h-4 w-4 text-black border-gray-300 rounded focus:ring-0">
                        <label for="selectAll" class="text-sm font-medium text-gray-700">Select All ({{ $items->count() }} Items)</label>
                    </div>
                    
                    {{-- Bulk Remove Form (Action Bar) --}}
                    @if($items->count() > 0)
                    <form id="bulkRemoveForm" action="{{ route('cart.removeSelected') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-sm font-semibold text-gray-600 hover:text-gray-900 transition hover:bg-gray-200 p-1 rounded-md" title="Remove Selected Items">
                            Remove Selected
                        </button>
                    </form>
                    @endif
                </div>

                {{-- Cart Items List --}}
                @forelse($items as $item)
                    <div class="p-6 flex items-start space-x-6 hover:bg-gray-50 transition">
                        
                        {{-- Checkbox --}}
                        <div class="pt-1">
                            <input type="checkbox" form="bulkRemoveForm" name="selected[]" value="{{ $item->id }}" class="selectItem h-4 w-4 text-black border-gray-300 rounded focus:ring-0">
                        </div>

                        {{-- Product Image and Details --}}
                        <div class="flex-shrink-0">
                            {{-- Placeholder: Replace with actual image source --}}
                            <img src="data:image/jpeg;base64,{{ base64_encode($item->product->image) }}" alt="{{ $item->product->title }}" class="w-24 h-24 object-cover rounded-md border border-gray-200"> 
                        </div>

                        <div class="flex-grow grid grid-cols-3 gap-4 items-center">
                            {{-- Item Info --}}
                            <div class="col-span-1">
                                <span class="text-lg font-semibold text-gray-900 block">{{ $item->product->title }}</span>
                                <span class="text-sm text-gray-500">SKU: 12345</span>
                            </div>

                            {{-- Price & Quantity Controls --}}
                            <div class="col-span-1 flex justify-center space-x-6 items-center">
                                <p class="text-gray-600 font-medium">${{ number_format($item->product->price, 2) }}</p>
                                
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center space-x-2">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" 
                                           class="w-16 text-center border border-gray-300 rounded-md shadow-sm text-gray-900 focus:ring-black focus:border-black p-1 text-sm">
                                    <button type="submit" class="text-sm text-gray-600 hover:text-gray-900 font-medium">Update</button>
                                </form>
                            </div>

                            {{-- Subtotal and Remove Action --}}
                            <div class="col-span-1 flex flex-col items-end space-y-2">
                                <p class="text-lg font-bold text-gray-900">${{ number_format($item->product->price * $item->quantity, 2) }}</p>
                                
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-sm text-gray-500 hover:text-gray-700 hover:underline transition">
                                        Remove
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="text-center py-12 text-gray-500 bg-white">
                        <p class="text-lg">No items added to your cart.</p>
                        <a href="{{ route('customer.home') }}" class="text-black font-medium mt-2 block hover:underline">Continue Shopping</a>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Right Column: Summary/Checkout (Fixed position/sticky in a full implementation) --}}
        @if($items->count() > 0)
        <div class="lg:w-1/4">
            <div class="sticky top-20 bg-gray-100 p-6 rounded-xl border border-gray-200">
                <h2 class="text-xl font-bold text-gray-900 mb-4 border-b border-gray-300 pb-2">Order Summary</h2>
                
                {{-- Placeholder Calculations --}}
                @php
                    $subtotal = $items->sum(fn($item) => $item->product->price * $item->quantity);
                    $shipping = 10.00; // Example flat rate
                    $taxRate = 0.05; // Example 5% tax
                    $tax = $subtotal * $taxRate;
                    $grandTotal = $subtotal + $shipping + $tax;
                @endphp

                <div class="space-y-3 text-gray-700">
                    <div class="flex justify-between text-sm">
                        <span>Subtotal ({{ $items->count() }} items)</span>
                        <span class="font-medium">${{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span>Shipping Estimate</span>
                        <span class="font-medium">${{ number_format($shipping, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span>Tax Estimate ({{ $taxRate * 100 }}%)</span>
                        <span class="font-medium">${{ number_format($tax, 2) }}</span>
                    </div>
                </div>

                <div class="mt-4 pt-4 border-t border-gray-300 flex justify-between items-center">
                    <span class="text-lg font-bold text-gray-900">Order Total</span>
                    <span class="text-xl font-extrabold text-black">${{ number_format($grandTotal, 2) }}</span>
                </div>

                {{-- Checkout Button --}}
                <form action="{{ route('checkout.process') }}" method="POST" class="mt-6">
                    @csrf
                    <button class="w-full bg-black text-white text-lg font-semibold py-3 rounded-lg hover:bg-gray-800 transition shadow-lg focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-2" aria-label="Proceed to checkout">
                        Proceed to Checkout
                    </button>
                </form>
            </div>
        </div>
        @endif
        
    </div>
</div>

{{-- Select All Script --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectAllCheckbox = document.getElementById('selectAll');
        const itemCheckboxes = document.querySelectorAll('.selectItem');

        // Initial check for all items selected
        const updateSelectAll = () => {
             selectAllCheckbox.checked = itemCheckboxes.length > 0 && Array.from(itemCheckboxes).every(cb => cb.checked);
        };
        
        // Add listener to select/deselect all
        selectAllCheckbox.addEventListener('change', function() {
            itemCheckboxes.forEach(cb => cb.checked = this.checked);
        });

        // Add listener to update 'Select All' if individual items are unchecked
        itemCheckboxes.forEach(cb => {
            cb.addEventListener('change', updateSelectAll);
        });
        
        updateSelectAll(); // Run on load
    });
</script>