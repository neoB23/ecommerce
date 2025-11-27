@extends('layout.app')
@vite('resources/css/app.css')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8 px-4">
    @foreach($products as $product)
    <div class="w-full max-w-sm bg-neutral-primary-soft p-6 border border-default rounded-base shadow-xs">
        <a href="#">
           <img class="rounded-base mb-6"
                src="data:image/jpeg;base64,{{ base64_encode($product->image) }}"
                alt="{{ $product->title }}" />
        </a>

        <div>

            {{-- Rating --}}
            <div class="flex items-center space-x-3 mb-6">
                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                    @for($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 {{ $i < floor($product->rating) ? 'text-fg-yellow' : 'text-gray-300' }}" 
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                             <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                        </svg>
                    @endfor
                </div>
                <span class="bg-brand-softer border border-brand-subtle text-fg-brand-strong text-xs font-medium px-1.5 py-0.5 rounded-sm">
                    {{ $product->rating }} out of 5
                </span>
            </div>

            {{-- Title --}}
            <a href="#">
                <h5 class="text-xl text-heading font-semibold tracking-tight">
                    {{ $product->title }}
                </h5>
            </a>

            {{-- NEW: Description --}}
            <p class="text-sm text-gray-600 mt-3 line-clamp-2">
                {{ $product->description }}
            </p>

            {{-- NEW: Stock --}}
            <p class="text-sm mt-2 font-medium 
                      {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                {{ $product->stock > 0 ? $product->stock . ' in stock' : 'Out of stock' }}
            </p>

            {{-- Price + Cart Button --}}
            <div class="flex items-center justify-between mt-6">
                <span class="text-3xl font-extrabold text-heading">
                    ${{ number_format($product->price) }}
                </span>

                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button type="submit"
                    class="inline-flex items-center text-white bg-black rounded hover:bg-brand-strong border border-transparent px-3 py-2">
                    <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" 
                                        stroke-width="2" 
                                        d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
                                </svg>
                    Add to cart
                </button>
            </form>


            </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
