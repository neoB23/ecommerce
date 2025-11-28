@extends('layout.app')
@vite('resources/css/app.css')
@section('title', 'KickCraze - Kids Shoes')
@section('content')

{{-- Notification container: Streamlined B/W/G notification --}}
<div id="notif"
     class="fixed top-6 right-6 bg-black text-white px-5 py-3 rounded-lg shadow-2xl 
            opacity-0 translate-x-10 transition-all duration-300 ease-out z-50 pointer-events-none">
    Item added to cart successfully.
</div>

<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Kids Shoes</h1> 

    {{-- Product Grid: Using lg:grid-cols-4 for better balance --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach($products as $product)
        
        {{-- Product Card: Clean, Balanced Look --}}
        <div class="bg-white border border-gray-200 rounded-xl shadow-md overflow-hidden flex flex-col transition duration-300 hover:shadow-xl hover:border-gray-300">
            
            {{-- Image Link --}}
            <a href="#">
               <img class="w-full h-56 object-cover" 
                    src="data:image/jpeg;base64,{{ base64_encode($product->image) }}"
                    alt="{{ $product->title }}" />
            </a>

            <div class="p-4 flex flex-col flex-grow">
                
                {{-- Title & Category --}}
                <a href="#" class="flex-grow">
                    <h5 class="text-lg font-semibold tracking-tight text-gray-900 hover:text-gray-700 transition line-clamp-2">
                        {{ $product->title }}
                    </h5>
                </a>
                <p class="mt-0.5 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Kids Shoes
                </p>

                {{-- Rating and Stock --}}
                <div class="flex items-center justify-between pt-2 border-t border-gray-100 mt-auto">
                    
                    {{-- Rating --}}
                    <div class="flex items-center space-x-1">
                        <div class="flex items-center">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-3.5 h-3.5 {{ $i < floor($product->rating) ? 'text-gray-900' : 'text-gray-300' }} fill-current" 
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                                </svg>
                            @endfor
                        </div>
                        <span class="text-xs font-medium text-gray-600">
                            {{ number_format($product->rating, 1) }}
                        </span>
                    </div>

                    {{-- Stock --}}
                    @php
                        $inStock = $product->stock > 0;
                        $stockText = $inStock ? 'In Stock' : 'Out of Stock';
                        $stockClass = $inStock ? 'text-gray-600' : 'text-red-700';
                    @endphp
                    <p class="text-xs font-semibold {{ $stockClass }}">
                        {{ $stockText }}
                    </p>
                </div>

                {{-- Price + Cart Button (Refined size) --}}
                <div class="flex items-center justify-between mt-3 border-t border-gray-100 pt-3">
                    <span class="text-xl font-extrabold text-gray-900">
                        ${{ number_format($product->price, 2) }}
                    </span>

                    @if($inStock)
                        @auth
                            {{-- Logged-in user, smaller button --}}
                            <form action="{{ route('cart.add', $product->id) }}" method="POST" onsubmit="event.preventDefault(); showNotif(); this.submit();">
                                @csrf
                                <button type="submit"
                                        class="inline-flex items-center text-sm text-white bg-black font-semibold rounded-lg px-3 py-1.5 hover:bg-gray-800 transition duration-150 shadow-md">
                                    <svg class="w-4 h-4 me-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    Add
                                </button>
                            </form>
                        @else
                            {{-- Not logged in, smaller button --}}
                            <a href="{{ route('login') }}"
                               class="inline-flex items-center text-sm text-white bg-black font-semibold rounded-lg px-3 py-1.5 hover:bg-gray-800 transition duration-150 shadow-md">
                                <svg class="w-4 h-4 me-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Add
                            </a>
                        @endauth
                    @else
                        {{-- Out of stock button (smaller) --}}
                        <button type="button" disabled
                                class="inline-flex items-center text-sm text-gray-900 bg-gray-200 font-semibold rounded-lg px-3 py-1.5 cursor-not-allowed shadow-inner opacity-70">
                            Out of Stock
                        </button>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- Notification Script --}}
<script>
function showNotif(message = 'Item added to cart successfully.') {
    const notif = document.getElementById('notif');
    notif.innerText = message;
    notif.classList.remove('opacity-0', 'translate-x-10');
    setTimeout(() => {
        notif.classList.add('opacity-0', 'translate-x-10');
    }, 3000);
}
</script>

@endsection