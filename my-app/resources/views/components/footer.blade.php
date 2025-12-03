@vite('resources/css/app.css')
<div class="bg-zinc-950 p-8">
    <div class="flex flex-col space-y-8 sm:space-y-0 sm:flex-row sm:justify-between">
        
        <!-- Brand Info -->
        <div class="text-white text-center sm:text-left">
            <h1 class="font-bold text-3xl">KickCraze</h1>
            <p>The latest footwear fashion</p>
        </div>

        <!-- Quick Links -->
        <div class="text-white text-center sm:text-left space-y-4 sm:flex-col sm:flex flex flex-col">
            <a href="{{ url('/') }}">FAQs</a>
            <a href="{{ url('/') }}">Size Chart</a>
            <a href="{{ url('/') }}">Contact Us</a>
        </div>

        <!-- Policies -->
        <div class="text-white text-center sm:text-right space-y-4 sm:flex-col sm:flex flex flex-col">
            <a href="{{ url('/') }}">Terms of Services</a>
            <a href="{{ url('/') }}">Refund Policy</a>
            <a href="{{ url('/') }}">About Us</a>
        </div>

    </div>
</div>
