@vite('resources/css/app.css')
@php
$cards = [
    [ "url" => "/imgs/abstract/1.jpg", "title" => "Title 1", "id" => 1 ],
    [ "url" => "/imgs/abstract/2.jpg", "title" => "Title 2", "id" => 2 ],
    [ "url" => "/imgs/abstract/3.jpg", "title" => "Title 3", "id" => 3 ],
    [ "url" => "/imgs/abstract/4.jpg", "title" => "Title 4", "id" => 4 ],
    [ "url" => "/imgs/abstract/5.jpg", "title" => "Title 5", "id" => 5 ],
    [ "url" => "/imgs/abstract/6.jpg", "title" => "Title 6", "id" => 6 ],
    [ "url" => "/imgs/abstract/7.jpg", "title" => "Title 7", "id" => 7 ],
];
@endphp

<div class="">
    <div class="flex h-48 items-center justify-center">
        <!-- <span class="font-semibold uppercase text-neutral-500">
            Scroll down
        </span> -->
    </div>

    {{-- Horizontal Scroll Carousel --}}
    <section id="scrollTarget" class="relative h-[300vh] ">
        <div class="sticky top-0 flex h-screen items-center overflow-hidden">
            <div id="scrollContainer" class="flex gap-4 transition-transform duration-75 will-change-transform">
                @foreach ($cards as $card)
                <div class="group relative h-[450px] w-[450px] overflow-hidden bg-neutral-200">
                    <div class="absolute inset-0 z-0 transition-transform duration-300 group-hover:scale-110"
                        style="
                            background-image: url('{{ $card['url'] }}');
                            background-size: cover;
                            background-position: center;
                        ">
                    </div>

                    <div class="absolute inset-0 z-10 grid place-content-center">
                        <p class="bg-gradient-to-br from-white/20 to-white/0 p-8 text-6xl font-black uppercase text-white backdrop-blur-lg">
                            {{ $card['title'] }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="flex h-48 items-center justify-center">
        <!-- <span class="font-semibold uppercase text-neutral-500">
            Scroll up
        </span> -->
    </div>
</div>

{{-- Scroll Logic --}}
<script>
document.addEventListener("scroll", () => {
    const target = document.getElementById("scrollTarget");
    const container = document.getElementById("scrollContainer");

    const rect = target.getBoundingClientRect();
    const progress = Math.min(Math.max((window.innerHeight - rect.top) / (rect.height - window.innerHeight), 0), 1);

    // Equivalent to Framer Motion useTransform: [0,1] -> [1% , -95%]
    const start = 1;
    const end = -95;
    const x = start + (end - start) * progress;

    container.style.transform = `translateX(${x}%)`;
});
</script>
