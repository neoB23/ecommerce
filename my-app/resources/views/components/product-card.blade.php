@vite('resources/css/app.css')
@php
    $images = [
        'Images/s1.webp',
        'Images/s2.webp',
        'Images/s3.webp',
        'Images/s1.webp',
        'Images/s2.webp',
        'Images/s3.webp',
    ];
    $imageCount = count($images);
    $visibleItems = 3; 
@endphp

{{-- 
    The outer container is now FULL WIDTH (w-full) to occupy the entire space.
    The content inside (title, buttons, and slider track) is managed within max-w-7xl 
    for padding and alignment, but the actual sliding images will touch the edges 
    of the screen (or the main content area).
--}}
<div x-data="{ 
        currentIndex: 0, 
        imageCount: {{ $imageCount }},
        visibleItems: 3, 
        get maxIndex() { return this.imageCount - this.visibleItems },
        get transformValue() { 
            return `translateX(-${this.currentIndex * (100 / this.visibleItems)}%)` 
        },
        next() {
            if (this.currentIndex < this.maxIndex) {
                this.currentIndex++;
            }
        },
        prev() {
            if (this.currentIndex > 0) {
                this.currentIndex--;
            }
        }
    }" 
    class="relative w-full py-8">
    
    {{-- Header and Controls (Aligned to the main max-w-7xl grid) --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center mb-6">
        <h1 class="font-extrabold text-3xl text-gray-900 tracking-tight">Latest Releases</h1>

        {{-- Scroll Buttons --}}
        <div class="flex gap-3">
            <button @click="prev()" 
                    :disabled="currentIndex === 0" 
                    class="p-3 bg-gray-900 text-white rounded-full w-10 h-10 flex items-center justify-center hover:bg-gray-700 disabled:bg-gray-400 transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
            </button>
            <button @click="next()" 
                    :disabled="currentIndex === maxIndex" 
                    class="p-3 bg-gray-900 text-white rounded-full w-10 h-10 flex items-center justify-center hover:bg-gray-700 disabled:bg-gray-400 transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </button>
        </div>
    </div>

    {{-- Slider Container (This is where the magic happens) --}}
    {{-- We use the full width but apply horizontal padding to match the main content padding --}}
    <div class="overflow-hidden sm:px-6 lg:px-8">
        {{-- Slider Track (The images themselves) --}}
        <div id="sliderTrack"
            class="flex transition-transform duration-500 ease-in-out"
            x-bind:style="{ 'transform': transformValue }">
            
            @foreach ($images as $img)
                {{-- Images now stretch to fill the space allocated by the visibleItems calculation --}}
                <a href="#" class="flex-shrink-0 w-full sm:w-[33.333%] p-2"> 
                    <img src="/{{ $img }}"
                        alt="Latest Release Shoe"
                        class="w-full h-80 object-cover rounded-lg shadow-md hover:shadow-xl transition duration-300 transform hover:scale-[1.01]"
                    >
                </a>
            @endforeach

        </div>
    </div>
</div>