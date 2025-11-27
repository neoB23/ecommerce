<div class="flex justify-center items-center">
    <div>

        @php
            $images = [
                'images/s1.webp',
                'images/s2.webp',
                'images/s3.webp',
                'images/s1.webp',
                'images/s2.webp',
            ];
        @endphp

        <div class="mt-4">
            <h1 class="font-extrabold text-3xl text-left ml-4 text-black">Latest Release</h1>

            {{-- Buttons --}}
            <div class="flex justify-end mr-4">
                <button id="scrollLeft" class="p-2 bg-zinc-900 text-white rounded-full w-12 h-12">‹</button>
                <button id="scrollRight" class="p-2 bg-zinc-900 text-white rounded-full w-12 h-12">›</button>
            </div>

            {{-- slider --}}
            <div class="overflow-hidden">
                <div id="sliderTrack"
                    class="flex transition-transform duration-500 ease-in-out"
                    style="transform: translateX(0)">
                    
                    @foreach ($images as $img)
                        <img src="/{{ $img }}"
                            class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 h-auto"
                            style="flex: 0 0 33.33%">
                    @endforeach

                </div>
            </div>
        </div>

    </div>
</div>

{{-- Slider JS --}}
<script>
    const images = @json($images);
    const sliderTrack = document.getElementById('sliderTrack');

    let currentIndex = 0;

    document.getElementById('scrollLeft').addEventListener('click', () => {
        currentIndex = currentIndex === 0 ? images.length - 3 : currentIndex - 1;
        sliderTrack.style.transform = `translateX(-${currentIndex * (100/3)}%)`;
    });

    document.getElementById('scrollRight').addEventListener('click', () => {
        currentIndex = currentIndex === images.length - 3 ? 0 : currentIndex + 1;
        sliderTrack.style.transform = `translateX(-${currentIndex * (100/3)}%)`;
    });
</script>
