@vite('resources/css/app.css'){{-- Sticky Header: High contrast, always visible --}}<header class="sticky top-0 z-40 bg-white shadow-lg border-b border-gray-100/50" x-data="{ open: false }"><div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 lg:h-20 flex justify-between items-center">{{-- 1. Logo (Left Side, Always Visible) --}}
<a href="{{ url('/') }}" class="flex items-center gap-2 flex-shrink-0">
    {{-- Using placeholder image URL, replace with your asset path --}}
    <img src="{{ asset('Images/logo.png') }}" onerror="this.onerror=null; this.src='https://placehold.co/32x32/000000/ffffff?text=KC'" class="w-7 h-7 lg:w-8 lg:h-8 object-contain rounded" alt="KickCraze Logo"/>
    <h1 class="font-extrabold text-xl lg:text-2xl text-gray-900 tracking-wide uppercase">KickCraze</h1>
</a>

{{-- 2. Primary Navigation (Center: Desktop Search Bar) --}}
<nav class="hidden md:flex items-center flex-grow justify-center h-full ">
    <form action="" method="GET" class="flex items-center border border-gray-200 rounded-full px-3 py-1.5 focus-within:border-gray-900 transition duration-200 max-w-md w-full">

        <button type="submit" class="text-gray-500 hover:text-gray-700 p-0">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </button>
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search products..."
            class="w-full text-sm outline-none text-gray-900 bg-transparent placeholder-gray-500 ml-2 py-0.5"
        />
    </form>
</nav>

{{-- 3. Utility Icons (Right Side: Cart, Profile, Mobile Menu Toggle) --}}
<div class="flex items-center gap-x-2 lg:gap-x-4 flex-shrink-0">

    {{-- Shopping Cart Icon (Utility) --}}
    @guest <a href="{{ route('login') }}" class="p-2"> @endguest
    @auth <a href="{{ route('customer.cart') }}" class="p-2"> @endauth
        <svg class="w-6 h-6 text-gray-700 hover:text-black transition-colors duration-150" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path fill="currentColor" d="M19 7h-3V6a4 4 0 0 0-8 0v1H5a1 1 0 0 0-1 1v11a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V8a1 1 0 0 0-1-1m-9-1a2 2 0 0 1 4 0v1h-4Zm8 13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V9h2v1a1 1 0 0 0 2 0V9h4v1a1 1 0 0 0 2 0V9h2Z"/>
        </svg>
    </a>

    {{-- Profile Dropdown (Utility) --}}
    {{-- Hidden until md, then appears as a dropdown --}}
    <div class="relative group hidden md:block">
        <button class="text-gray-700 hover:text-black transition-colors duration-150 p-2 rounded-full">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" fill-rule="evenodd" d="M8 7a4 4 0 1 1 8 0a4 4 0 0 1-8 0m0 6a5 5 0 0 0-5 5a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3a5 5 0 0 0-5-5z" clip-rule="evenodd"/>
            </svg>
        </button>
        {{-- Dropdown Content --}}
        <div class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-lg shadow-xl
                     opacity-0 invisible
                     group-hover:opacity-100 group-hover:visible
                     transform scale-95 group-hover:scale-100
                     transition-all duration-200 ease-in-out z-50">
            @auth
                <a href="{{ route('customer.orders') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 border-b">My Purchases</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 font-semibold hover:bg-gray-50 border-b">Sign In</a>
                <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Register</a>
            @endauth
        </div>
    </div>

    {{-- Mobile Menu Toggle (Hamburger/X) --}}
    {{-- Updated class to lg:hidden to hide it on larger screens (1024px+) --}}
    <button type="button" @click="open = !open" class="lg:hidden p-2 text-gray-700 hover:text-black transition-colors duration-150">
        <svg x-show="!open" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
        <svg x-show="open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
</div>{{-- 4. Mobile Menu (Full-Width Drawer) --}}<div x-show="open" @click.outside="open = false"x-transition:enter="duration-300 ease-out"x-transition:enter-start="opacity-0 -translate-y-4"x-transition:enter-end="opacity-100 translate-y-0"x-transition:leave="duration-200 ease-in"x-transition:leave-start="opacity-100 translate-y-0"x-transition:leave-end="opacity-0 -translate-y-4"{{-- Updated class to lg:hidden --}}class="absolute top-16 lg:top-20 inset-x-0 p-2 transition transform origin-top lg:hidden z-30"><div class="rounded-lg shadow-2xl ring-1 ring-black ring-opacity-5 bg-white divide-y divide-gray-100 p-4">
    
    {{-- Mobile Search Input (Prominent) --}}
    <form action="" method="GET" class="pb-4">
        <div class="flex items-center border border-gray-300 rounded-lg px-4 py-2 focus-within:border-gray-900 transition duration-200">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search shoes..."
                class="w-full outline-none text-gray-900 text-base bg-transparent"
            />
            <button type="submit" class="text-gray-500 hover:text-gray-900 p-1">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </div>
    </form>

    <nav class="grid gap-y-4 pt-4">
        {{-- Main Categories (Kept for mobile fallback) --}}
        <a href="{{ route('mens') }}" @click="open = false" class="text-lg font-bold text-gray-900 hover:text-black block py-2">Men's</a>
        <a href="{{ route('womens') }}" @click="open = false" class="text-lg font-bold text-gray-900 hover:text-black block py-2">Women's</a>
        <a href="{{ route('kids') }}" @click="open = false" class="text-lg font-bold text-gray-900 hover:text-black block py-2">Kids'</a>
        <a href="{{ route('sale') }}" @click="open = false" class="text-lg font-bold text-red-600 hover:text-red-700 block py-2">Sales</a>
        
        {{-- Account Links --}}
        <div class="pt-4 mt-2 border-t border-gray-100">
            @auth
                <a href="{{ route('customer.orders') }}" @click="open = false" class="text-base font-medium text-gray-700 hover:text-black block py-2">My Purchases</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full text-left text-base font-medium text-red-600 hover:text-red-700 block py-2">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" @click="open = false" class="text-base font-semibold text-gray-900 block py-2">Sign In</a>
                <a href="{{ route('register') }}" @click="open = false" class="text-base font-medium text-gray-700 hover:text-black block py-2">Register</a>
            @endauth
        </div>
    </nav>
</div>
</div></header>