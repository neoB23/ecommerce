@include('components.lastnav')
@extends('layout.app')
@vite('resources/css/app.css')
@section('title', 'KickCraze - Sales shoes')

@section('content')

{{-- Main Content Container with slightly more space at the top --}}
<div class="max-w-7xl mx-auto pt-10 pb-16 px-4 sm:px-6 lg:px-8">
    {{-- Page Header: Margin bottom reduced to mb-4 for a tighter fit --}}
    <h1 class="text-4xl font-extrabold text-gray-900 mb-4 tracking-tight border-b-2 border-gray-900 pb-2 inline-block">
        Flash Sale Footwear
    </h1>
    
    {{-- Product Grid: Optimized for different screens --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 sm:gap-8">
        @foreach($products as $product)
        
        {{-- Product Card: Sleek Monochromatic Design --}}
        <div class="bg-white rounded-xl shadow-xl overflow-hidden flex flex-col transition duration-300 hover:scale-[1.02] hover:shadow-2xl relative group">
            
            
            {{-- Image Link & Container --}}
            <a href="{{ route('product.show', $product->id) }}" class="block overflow-hidden relative">
                
                {{-- Sale Badge (Fixed Position - Black Theme) --}}
                <span class="absolute top-0 left-0 bg-gray-900 text-white text-xs font-bold px-4 py-1.5 rounded-br-lg z-10 shadow-lg uppercase tracking-wider">
                    Sale
                </span>
                
                <img class="w-full h-64 object-cover object-center transition duration-500 group-hover:opacity-90 group-hover:scale-105"
                    src="data:image/jpeg;base64,{{ base64_encode($product->image) }}"
                    alt="{{ $product->title }}" />
            </a>

            <div class="p-5 flex flex-col flex-grow">
                
                {{-- Title & Category --}}
                <div class="flex-grow">
                    <a href="{{ route('product.show', $product->id) }}">
                        <h5 class="text-lg font-bold tracking-tight text-gray-900 line-clamp-2 hover:text-gray-700 transition">
                            {{ $product->title }}
                        </h5>
                    </a>
                    <p class="mt-1 text-sm font-medium text-gray-500 uppercase">
                        Sneakers Collection
                    </p>
                </div>
                
                {{-- Rating and Stock (Simplified) --}}
                <div class="flex items-center justify-between mt-3 mb-2">
                    
                    {{-- Rating Display --}}
                    <div class="flex items-center space-x-1">
                        <div class="flex items-center text-yellow-500">
                            {{-- Star Icons (Kept yellow for quality contrast) --}}
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-4 h-4 fill-current {{ $i < floor($product->rating) ? 'text-yellow-500' : 'text-gray-300' }}" 
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                                </svg>
                            @endfor
                        </div>
                        <span class="text-xs font-medium text-gray-600">
                            ({{ number_format($product->rating, 1) }} Review{{ floor($product->rating) == 1 ? '' : 's' }})
                        </span>
                    </div>

                    {{-- Stock Indicator (Pill style) --}}
                    @php
                        $inStock = $product->stock > 0;
                        $stockText = $inStock ? 'In Stock' : 'Sold Out';
                        $stockClass = $inStock ? 'bg-gray-100 text-gray-700' : 'bg-gray-200 text-gray-500';
                    @endphp
                    <span class="text-xs font-semibold px-2 py-0.5 rounded-full {{ $stockClass }}">
                        {{ $stockText }}
                    </span>
                </div>

                {{-- Price + View Details Button --}}
                <div class="flex items-center justify-between pt-3 border-t border-gray-100 mt-2">
                    {{-- Price (Black) --}}
                    <span class="text-2xl font-extrabold text-gray-900">
                        ${{ number_format($product->price, 2) }}
                    </span>

                    {{-- View Details Button (Black/Dark Gray) --}}
                    <a href="{{ route('product.show', $product->id) }}"
                        class="inline-flex items-center text-sm text-white bg-gray-900 font-semibold rounded-full px-4 py-2 hover:bg-gray-700 transition duration-200 transform hover:scale-105 shadow-lg">
                        <svg class="w-4 h-4 me-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                        Details
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection