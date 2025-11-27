@vite('resources/css/app.css')

@extends('layout.app')

@section('content')
<div class="flex justify-center items-center">
    <div>
        {{-- Banner Slider --}}
        @php
            $images = [
                '/images/banner1.jpg',
                '/images/banner2.jpg',
                '/images/banner3.jpg',
            ];
        @endphp

        <div class="justify-center items-center">
            <img id="heroBanner" src="{{ $images[0] }}" alt="banner" class="w-3/4 h-auto mx-auto">
        </div>

        {{-- Hero Text --}}
        <div class="text-center mt-4">
            <h1 class="font-extrabold text-3xl  text-black">KICKCRAZE</h1>
            <p class="font-thin  text-black">The latest footwear in fashion</p>
            <button class="bg-zinc-900 text-white p-3 text-xs rounded-full mt-2">Preview Now</button>
        </div>

        {{-- YouTube Video --}}
        <div class="flex justify-center items-center mt-4">
            <iframe 
                class="w-full h-96 mx-auto"
                src="https://www.youtube.com/embed/LBukoM3CLic?mute=1"
                title="YouTube video player"
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
            </iframe>
            
        </div>

        {{-- Description --}}
        <div class="flex justify-center items-center flex-col mt-4">
            <h1 class="font-bold text-2xl text-center  text-black">Elevate Essentials</h1>
            <p class="text-center text-sm  text-black">
                Designed with soft, heavyweight loopback cotton, the Wordmark Paris Hoodie provides sophistication and warmth for any occasion.<br>
                The front pocket provides small storage, while the seasonal Wordmark embroidery and vibrant blue shades <br> 
                nod to the City of Light and its alluring day-to-night transformation.
            </p>
        </div>

        {{-- Product Images --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
            <a href="{{ route('mens') }}"> 
                <img src="/images/mens.webp" alt="mens shoes" class="w-full rounded-lg">
            </a>
            <a href="{{ route('womens') }}" src="/images/womens.webp" alt="women shoes" class="w-full rounded-lg">
                <img src="/images/womens.webp" alt="mens shoes" class="w-full rounded-lg">
            </a>
            <a href="{{ route('kids') }}" src="/images/kids.webp" alt="kids shoes" class="w-full rounded-lg">
                <img src="/images/kids.webp" alt="mens shoes" class="w-full rounded-lg">
            </a>
            <a href="{{ route('sale') }}" src="/images/nr.webp" alt="new release" class="w-full rounded-lg">
                <img src="/images/nr.webp" alt="mens shoes" class="w-full rounded-lg">
            </a>
        </div>
    </div>
</div>

@include('components.product-card')

{{-- Banner Slider Script --}}
<script>
    const images = @json($images);
    let currentIndex = 0;
    const heroBanner = document.getElementById('heroBanner');

    setInterval(() => {
        currentIndex = (currentIndex + 1) % images.length;
        heroBanner.src = images[currentIndex];
    }, 3000); // Change every 3 seconds
</script>

@endsection

