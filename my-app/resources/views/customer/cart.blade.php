@include('components.lastnav')
@vite('resources/css/app.css')

@extends('layout.app')
@section('title', 'KickCraze | Cart & Checkout')
@section('content')

{{-- Include Font Awesome for icons --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

{{-- Main Container: Two-column layout (Cart Items + Checkout Form) --}}
<div class="max-w-7xl min-h-screen mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-8 border-b border-gray-200 pb-2">Shopping Cart & Delivery</h1>
    
    {{-- On mobile, columns stack (default flex-col). On desktop, they are split (lg:flex-row) --}}
    <div class="flex flex-col lg:flex-row gap-8">
        
        {{-- Left Column: Cart Items (Takes full width on mobile, 3/5 on desktop) --}}
        <div class="lg:w-3/5">
            <div class="bg-white shadow-lg rounded-xl overflow-hidden divide-y divide-gray-100 border border-gray-200">
                
                {{-- Select All Header --}}
                <div class="flex items-center justify-between p-4 bg-gray-50">
                    <div class="flex items-center space-x-3">
                        {{-- NOTE: items->count() is used here, ensure $items is defined or use mock data for testing --}}
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
                    {{-- Item container: Flex row on all sizes --}}
                    <div class="p-4 sm:p-6 flex items-start space-x-4 hover:bg-gray-50 transition">
                        
                        {{-- Checkbox --}}
                        <div class="pt-1 flex-shrink-0">
                            <input type="checkbox" form="bulkRemoveForm" name="selected[]" value="{{ $item->id }}" class="selectItem h-4 w-4 text-black border-gray-300 rounded focus:ring-0">
                        </div>

                        {{-- Product Content Wrapper (Handles responsive layout) --}}
                        <div class="flex flex-col sm:flex-row sm:gap-6 w-full">

                            {{-- Image and Main Product Info (Always next to each other on mobile/desktop) --}}
                            <div class="flex-shrink-0 flex gap-4 w-full sm:w-auto">
                                {{-- Product Image --}}
                                <img src="data:image/jpeg;base64,{{ base64_encode($item->product->image) }}" alt="{{ $item->product->title }}" 
                                    class="w-20 h-20 sm:w-24 sm:h-24 object-cover rounded-md border border-gray-200 flex-shrink-0"> 
                                
                                {{-- Item Info (Mobile View) --}}
                                <div class="flex flex-col justify-start sm:hidden pt-1 w-full">
                                    <span class="text-base font-semibold text-gray-900 block">{{ $item->product->title }}</span>
                                    <span class="text-xs text-gray-500">SKU: 12345</span>
                                    {{-- Display price clearly on mobile --}}
                                    <p class="text-lg font-bold text-gray-900 mt-2">${{ number_format($item->product->price * $item->quantity, 2) }}</p>
                                </div>
                            </div>
                            
                            {{-- Controls and Actions Container --}}
                            <div class="flex-grow mt-4 sm:mt-0 w-full 
                                        grid grid-cols-3 gap-2 sm:gap-4 items-center">

                                {{-- Item Info (Desktop/Tablet View) --}}
                                <div class="hidden sm:block col-span-1">
                                    <span class="text-lg font-semibold text-gray-900 block">{{ $item->product->title }}</span>
                                    <span class="text-sm text-gray-500">SKU: 12345</span>
                                </div>

                                {{-- Price & Quantity Controls --}}
                                <div class="col-span-2 sm:col-span-1 flex flex-col sm:flex-row sm:justify-center items-center gap-2 sm:gap-6">
                                    <p class="hidden sm:block text-gray-600 font-medium">${{ number_format($item->product->price, 2) }}</p>
                                    
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center space-x-2">
                                        @csrf
                                        @method('PATCH')
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" 
                                                class="w-16 text-center border border-gray-300 rounded-md shadow-sm text-gray-900 focus:ring-black focus:border-black p-1 text-sm">
                                        <button type="submit" class="text-xs text-gray-600 hover:text-gray-900 font-medium p-1 rounded-md hidden sm:inline-block">Update</button>
                                    </form>
                                </div>

                                {{-- Subtotal and Remove Action --}}
                                <div class="col-span-1 flex flex-col items-end space-y-1 sm:space-y-2">
                                    {{-- Subtotal (Desktop/Tablet only, hidden on mobile as it's above) --}}
                                    <p class="hidden sm:block text-lg font-bold text-gray-900">${{ number_format($item->product->price * $item->quantity, 2) }}</p>
                                    
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-sm text-gray-500 hover:text-red-600 hover:underline transition">
                                            Remove
                                        </button>
                                    </form>
                                </div>
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

        {{-- Right Column: Checkout Details & Summary (Full width on mobile, 2/5 on desktop) --}}
        @if($items->count() > 0)
        <div class="lg:w-2/5">
            <div class="lg:sticky lg:top-20 space-y-8">
                
                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    
                    {{-- 1. STATIC SHIPPING ADDRESS SECTION --}}
                    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 mb-8">
                        <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center border-b pb-2">
                            <i class="fas fa-truck mr-2 text-gray-700"></i> Delivery Address
                        </h2>
                        <div class="space-y-4">
                            
                            {{-- Full Name --}}
                            <div>
                                <label for="full_name" class="block text-xs font-medium text-gray-700 mb-1">Full Name</label>
                                <input type="text" id="full_name" name="full_name" 
                                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-black focus:border-black shadow-sm text-sm"
                                        placeholder="Juan Dela Cruz" required>
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                {{-- Street Address --}}
                                <div>
                                    <label for="street_address" class="block text-xs font-medium text-gray-700 mb-1">Street Address</label>
                                    <input type="text" id="street_address" name="street_address" 
                                            class="w-full p-2 border border-gray-300 rounded-md focus:ring-black focus:border-black shadow-sm text-sm"
                                            placeholder="Bldg/Unit, Street Name" required>
                                </div>
                                {{-- City / Municipality --}}
                                <div>
                                    <label for="city" class="block text-xs font-medium text-gray-700 mb-1">City</label>
                                    <input type="text" id="city" name="city" 
                                            class="w-full p-2 border border-gray-300 rounded-md focus:ring-black focus:border-black shadow-sm text-sm"
                                            placeholder="Manila" required>
                                </div>
                            </div>
                            <p class="text-xs text-red-500 italic mt-2">
                                Note: This address is static and will NOT be saved to the database.
                            </p>
                        </div>
                    </div>

                    {{-- 2. PAYMENT METHOD SELECTION --}}
                    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 mb-8">
                        <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center border-b pb-2">
                            <i class="fas fa-credit-card mr-2 text-gray-700"></i> Payment Method
                        </h2>
                        <div class="space-y-3">
                            
                            {{-- OPTION 1: Cash on Delivery (COD) --}}
                            <label for="payment_cod" class="flex items-center p-3 border border-black rounded-lg cursor-pointer transition duration-200 hover:bg-gray-50">
                                <input type="radio" id="payment_cod" name="payment_method" value="cod" class="h-4 w-4 text-black border-gray-300 focus:ring-0" checked>
                                <span class="ml-3 font-medium text-gray-900">Cash on Delivery (COD)</span>
                                <span class="ml-auto text-sm text-gray-500">
                                    <i class="fas fa-hand-holding-dollar"></i>
                                </span>
                            </label>

                            {{-- OPTION 2: Credit/Debit Card (Soon Available) --}}
                            <div class="relative">
                                <label for="payment_card" class="flex items-center p-3 border border-gray-300 rounded-lg cursor-not-allowed opacity-50 bg-gray-100">
                                    <input type="radio" id="payment_card" name="payment_method" value="card" class="h-4 w-4 text-black border-gray-300 focus:ring-0" disabled>
                                    <span class="ml-3 font-medium text-gray-700">Credit/Debit Card</span>
                                    <span class="ml-auto text-base text-gray-700 space-x-2">
                                        <i class="fab fa-cc-visa"></i>
                                        <i class="fab fa-cc-mastercard"></i>
                                    </span>
                                </label>
                                {{-- Overlay for "Soon Available" --}}
                                <div class="absolute inset-0 flex items-center justify-center rounded-lg pointer-events-none">
                                    <span class="bg-black text-white px-2 py-0.5 text-xs font-bold uppercase rounded-full tracking-wider shadow-md">Soon Available</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- 3. ORDER SUMMARY --}}
                    <div class="bg-gray-100 p-6 rounded-xl border border-gray-200">
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

                        {{-- Final Place Order Button --}}
                        <button type="submit" 
                                class="mt-6 w-full bg-black text-white text-lg font-semibold py-3 rounded-lg hover:bg-gray-800 transition shadow-lg focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-2" 
                                aria-label="Confirm order and checkout">
                            <i class="fas fa-lock mr-2"></i> Place Order
                        </button>
                    </div>
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
@endsection