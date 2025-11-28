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

        {{-- Banner Slider Script --}}
<script>
    const images = @json($images);
    let currentIndex = 0;
    const heroBanner = document.getElementById('heroBanner');

    setInterval(() => {
        currentIndex = (currentIndex + 1) % images.length;
        heroBanner.src = images[currentIndex];
    }, 3000); // Banner changes every 3 seconds

    // Top message slider
   
</script>