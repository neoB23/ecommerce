@include('components.lastnav')
@vite('resources/css/app.css')

@extends('layout.app')
@section('title', 'KickCraze')
@section('content')

{{-- Top Message Slider --}}


  @include('components.Upper-sub-nav')

<div class="flex justify-center items-center mt-10">
    <div>
        @include('components.image-slide')
        {{-- Hero Text --}}
       <div class="text-center mt-8 px-4 max-w-5xl mx-auto">
            <h1 class="font-extrabold text-4xl sm:text-5xl text-gray-900 tracking-tight uppercase mb-2">KICKCRAZE</h1>
            <p class="font-light text-xl text-gray-600 mb-6">The latest footwear in fashion</p>
            <a href="{{ route('mens') }}" class="bg-zinc-900 text-white px-8 py-3 text-sm font-semibold rounded-full hover:bg-gray-800 transition duration-300 shadow-lg uppercase tracking-wider">
                Preview Now
            </a>
        </div>
        {{-- Product Images --}}
      <section id="category-grid" class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-5xl font-bold text-gray-900 text-center mb-8">Elevate Essentials</h2>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            {{-- Category 1: Men's --}}
            <a href="{{ route('mens') }}" class="group block overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition duration-300"> 
                <img src="/Images/mens.webp" alt="Men's Shoes" class="w-full h-56 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-4 bg-gray-50 text-center">
                    <p class="font-bold text-lg text-gray-900">Men's</p>
                </div>
            </a>
            
            {{-- Category 2: Women's --}}
            <a href="{{ route('womens') }}" class="group block overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition duration-300">
                <img src="/Images/womens.webp" alt="Women's Shoes" class="w-full h-56 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-4 bg-gray-50 text-center">
                    <p class="font-bold text-lg text-gray-900">Women's</p>
                </div>
            </a>
            
            {{-- Category 3: Kids' --}}
            <a href="{{ route('kids') }}" class="group block overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition duration-300">
                <img src="/Images/kids.webp" alt="Kids' Shoes" class="w-full h-56 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-4 bg-gray-50 text-center">
                    <p class="font-bold text-lg text-gray-900">Kids'</p>
                </div>
            </a>
            
            {{-- Category 4: New Releases --}}
            <a href="{{ route('sale') }}" class="group block overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition duration-300">
                <img src="/Images/nr.webp" alt="New Release Footwear" class="w-full h-56 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-4 bg-gray-50 text-center">
                    <p class="font-bold text-lg text-gray-900">New Releases</p>
                </div>
            </a>
        </div>
    </section>
        {{-- YouTube Video --}}
        <div class="flex justify-center items-center mt-4">
            <iframe 
                class="w-full h-96 mx-auto rounded-lg"
                src="https://www.youtube.com/embed/LBukoM3CLic?mute=1"
                title="YouTube video player"
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
            </iframe>
        </div>

        {{-- Description --}}
        <div class="flex justify-center items-center flex-col mt-4">
            <h1 class="text-5xl font-bold text-gray-900 text-center mb-8">Elevate Essentials</h1>
            <p class="font-light text-xl text-gray-600 mb-6 text-center">
                Designed with soft, heavyweight loopback cotton, the Wordmark Paris Hoodie provides sophistication and warmth for any occasion.<br>
                The front pocket provides small storage, while the seasonal Wordmark embroidery and vibrant blue shades <br> 
                nod to the City of Light and its alluring day-to-night transformation.
            </p>
        </div>

        
    </div>
    
</div>

@include('components.product-card')



@endsection
