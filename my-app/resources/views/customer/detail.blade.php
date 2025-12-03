@include('components.lastnav')
@vite('resources/css/app.css')

@extends('layout.app')
@section('title', 'KickCraze')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->title }} | KickCraze</title>
    {{-- Vite directive for assets --}}
    @vite('resources/css/app.css')
    {{-- Font Awesome for Icons --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom styling to visually highlight the selected size button */
        .size-button.selected {
            /* This mimics a ring effect using border color and a shadow for consistency */
            border-color: #1f2937; /* Tailwind's gray-900 */
            box-shadow: 0 0 0 2px white, 0 0 0 4px #1f2937; /* Simulate ring-offset-2 ring-2 */
        }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased">
    
    {{-- SUCCESS NOTIFICATION COMPONENT (Floating, Top Right) --}}
    @if (session('success'))
        <div id="successNotification" 
             class="fixed top-6 right-6 z-50 p-4 rounded-xl shadow-2xl transition-transform transform duration-500 ease-in-out
                    bg-black border border-zinc-200 text-white flex items-center space-x-3"
             role="alert">
            <i class="fas fa-check-circle text-xl"></i>
            <div>
                <p class="font-bold">Success!</p>
                <p class="text-sm">{{ session('success') }}</p>
            </div>
        </div>
        {{-- Custom script to handle delayed redirection after showing notification --}}
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const notification = document.getElementById('successNotification');
                if (notification) {
                    // Show notification (it's initially visible via Blade, but we can animate it)
                    setTimeout(() => {
                        notification.classList.add('translate-x-full');
                    }, 2000); // Wait 2 seconds
                    
                    setTimeout(() => {
                        // Redirect to cart section
                        window.location.href = "{{ route('customer.cart') }}"; 
                    }, 2500); // Redirect after 2.5 seconds total
                }
            });
        </script>
    @endif
    {{-- END SUCCESS NOTIFICATION --}}

    <main class="min-h-screen pt-12 pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Back Button --}}
            <div class="mb-10">
                <a href="{{ url()->previous() ?? route('products.index') }}" 
                   class="inline-flex items-center text-lg font-bold text-gray-700 hover:text-gray-900 transition duration-150 p-2 rounded-lg bg-gray-100 hover:bg-gray-200">
                    <i class="fas fa-arrow-left mr-3"></i>
                    Back to All Shoes
                </a>
            </div>

            {{-- PRODUCT DETAILS SECTION --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24">

                {{-- 1. Product Image Area --}}
                <div class="bg-white p-8 md:p-12 rounded-2xl shadow-xl border border-gray-100 flex justify-center items-center h-full">
                    <img class="w-full max-h-[600px] object-contain transform transition duration-500 hover:scale-[1.03]"
                             src="data:image/jpeg;base64,{{ base64_encode($product->image) }}"
                             alt="{{ $product->title }} Shoe">
                </div>

                {{-- 2. Product Details and Action Area --}}
                <div class="flex flex-col justify-center py-6">

                    <p class="text-sm font-bold uppercase tracking-widest text-gray-500 mb-2">{{ $product->category }}</p>

                    {{-- Title --}}
                    <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 mb-4 leading-none">
                        {{ $product->title }}
                    </h1>

                    {{-- Price & Stock --}}
                    <div class="mb-8 pt-4 border-t border-gray-200">
                        <p class="text-4xl font-black text-gray-900">
                            ₱{{ number_format($product->price, 2) }}
                        </p>
                        <p class="text-lg mt-2 font-semibold {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                            <i class="fas {{ $product->stock > 0 ? 'fa-check-circle' : 'fa-times-circle' }} mr-1"></i>
                            {{ $product->stock > 0 ? 'In Stock ('.$product->stock.' available)' : 'Out of Stock' }}
                        </p>
                    </div>

                    {{-- Description --}}
                    <h2 class="text-xl font-bold text-gray-800 mb-3">Product Story</h2>
                    <p class="text-gray-600 mb-8 leading-loose">
                        {{ $product->description }}
                    </p>
                    
                    {{-- Add to Cart Form --}}
                    @if($product->stock > 0)
                        <form id="addToCartForm" action="{{ route('cart.add', $product->id) }}" method="POST" class="space-y-6">
                            @csrf
                            
                            {{-- START: Combined Size Selector and Review Link (Responsive) --}}
                            {{-- Uses flex-col for mobile stacking and flex-row for tablet/desktop side-by-side layout --}}
                            <div class="flex flex-col sm:flex-row sm:space-x-8 space-y-6 sm:space-y-0 items-start">
                                
                                {{-- Size Selector (Static) --}}
                                <div class="flex-grow">
                                    <h3 class="text-lg font-bold text-gray-800 mb-3 flex justify-between items-center">
                                        <span>Select Size (US Men's)</span>
                                        {{-- Error message for validation --}}
                                        <span id="sizeError" class="text-xs font-semibold text-red-500 opacity-0 transition-opacity duration-300">
                                            Please select a size!
                                        </span>
                                    </h3>
                                    <div class="flex flex-wrap gap-3">
                                        @php
                                            // Static list of sizes for demonstration
                                            $sizes = [7, 8, 9, 10, 11, 12];
                                        @endphp
                                        @foreach($sizes as $size)
                                            <button type="button" 
                                                    data-size="{{ $size }}"
                                                    class="size-button w-14 h-14 border border-gray-300 rounded-lg text-sm font-semibold 
                                                            hover:border-gray-900 transition-colors duration-200 bg-white shadow-sm">
                                                {{ $size }}
                                            </button>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="size" id="selectedSize" value="">
                                </div>

                                {{-- Minimalist Review Link/Summary --}}
                                <div class="flex-shrink-0 w-full sm:w-auto mt-0 sm:mt-0">
                                    <p class="text-lg font-bold text-gray-800 mb-3">Rating</p>
                                    <div class="flex items-center space-x-2">
                                        {{-- Static 4-star rating for presentation --}}
                                        <span class="text-xl text-yellow-500">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                        </span>
                                        <p class="text-gray-700 font-semibold">4.0</p>
                                        <a href="#reviews" class="text-sm text-gray-500 underline hover:text-gray-900 transition" aria-label="View 5 Customer Reviews">
                                            (5 Reviews)
                                        </a>
                                    </div>
                                    <button class="text-sm text-black font-semibold mt-2 hover:text-gray-700 transition">
                                        Write a Review
                                    </button>
                                </div>
                                
                            </div>
                            {{-- END: Combined Size Selector and Review Link (Responsive) --}}
                            {{-- Quantity Selector --}}
                            <div>
                                <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">Quantity</label>
                                <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stock > 10 ? 10 : $product->stock }}" 
                                        class="w-24 p-3 border border-gray-300 rounded-lg text-center focus:ring-gray-900 focus:border-gray-900 shadow-sm"
                                        required>
                            </div>

                            @auth
                                {{-- Add to Cart Button (Initially Disabled, requires size selection) --}}
                                <button type="submit" id="addToCartButton" disabled
                                        class="w-full px-8 py-4 rounded-xl bg-gray-900 text-white font-bold text-lg 
                                                transition duration-200 ease-in-out shadow-lg shadow-gray-900/30
                                                flex items-center justify-center space-x-2 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-gray-900">
                                    <i class="fas fa-shopping-cart text-lg"></i>
                                    <span>Add to Cart</span>
                                </button>
                            @else
                                {{-- Login Button --}}
                                <a href="{{ route('login') }}" 
                                class="w-full px-8 py-4 rounded-xl bg-gray-900 text-white font-bold text-lg 
                                        hover:bg-gray-700 transition duration-200 ease-in-out shadow-lg shadow-gray-900/40 text-center inline-block">
                                    Login to Purchase
                                </a>
                            @endauth
                        </form>
                    @else
                        {{-- Out of Stock Button --}}
                        <button disabled class="w-full px-8 py-4 rounded-xl bg-red-100 text-red-700 font-bold text-lg cursor-not-allowed border border-red-300">
                            <i class="fas fa-ban mr-2"></i> Sold Out
                        </button>
                    @endif
                </div>
            </div>
            {{-- REVIEW SECTION (Placeholder for full section) --}}
            <div id="reviews" class="mt-20 pt-16 border-t border-gray-200 hidden">
                {{-- Future content for full reviews goes here, linked by the minimalist snippet above --}}
            </div>
            
        </div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sizeButtons = document.querySelectorAll('.size-button');
            const addToCartButton = document.getElementById('addToCartButton');
            const selectedSizeInput = document.getElementById('selectedSize');
            const sizeError = document.getElementById('sizeError');
            // Function to update the selected size and button state
            function updateSizeSelection(selectedButton) {
                let selectedSize = '';         
                // Remove 'selected' class from all buttons
                sizeButtons.forEach(btn => {
                    btn.classList.remove('selected');
                });
                if (selectedButton) {
                    // Add 'selected' class to the clicked button
                    selectedButton.classList.add('selected');
                    selectedSize = selectedButton.dataset.size;
                }
                
                selectedSizeInput.value = selectedSize;
                if (selectedSize) {
                    // Enable button if a size is selected and button exists
                    if (addToCartButton) { 
                        addToCartButton.disabled = false;
                        sizeError.classList.add('opacity-0'); // Hide error
                    }
                } else {
                    // Disable button if no size is selected
                    if (addToCartButton) {
                        addToCartButton.disabled = true;
                    }
                }
            }
            // Attach click listeners to size buttons
            sizeButtons.forEach(button => {
                button.addEventListener('click', () => {
                    updateSizeSelection(button);
                });
            });
            // Handle form submission validation
            const form = document.getElementById('addToCartForm');
            if (form) {
                form.addEventListener('submit', (event) => {
                    if (!selectedSizeInput.value) {
                        event.preventDefault();
                        sizeError.classList.remove('opacity-0'); // Show error
                    }
                });
            }
            // Initial check: ensure the button is disabled on load if no size is pre-selected
            if (!selectedSizeInput.value && addToCartButton) {
                addToCartButton.disabled = true;
            }
        });
    </script>
</body>
</html>
@endsection