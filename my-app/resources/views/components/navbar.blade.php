<header class="sticky top-0 z-40 bg-white shadow-sm border-b border-gray-100" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 lg:h-20 flex justify-between items-center">
        <a href="{{ url('/') }}" class="flex items-center gap-2">
            <img src="{{ asset('Images/logo.png') }}" class="w-7 h-7 lg:w-8 lg:h-8 object-contain" alt="KickCraze Logo"/>
            <h1 class="font-extrabold text-xl lg:text-2xl text-gray-900 tracking-wide">KickCraze</h1>
        </a>
        <div class="flex items-center gap-x-2 lg:gap-x-4">
            @guest <a href="{{ route('login') }}" class="p-2"> @endguest
            @auth <a href="{{ route('customer.cart') }}" class="p-2"> @endauth
                <svg class="w-6 h-6 text-gray-700 hover:text-black transition-colors duration-150" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19 7h-3V6a4 4 0 0 0-8 0v1H5a1 1 0 0 0-1 1v11a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V8a1 1 0 0 0-1-1m-9-1a2 2 0 0 1 4 0v1h-4Zm8 13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V9h2v1a1 1 0 0 0 2 0V9h4v1a1 1 0 0 0 2 0V9h2Z"/>
                </svg>
            </a>
            <div class="relative group hidden lg:block"> 
                <button class="text-gray-700 hover:text-black transition-colors duration-150 p-2 rounded-full">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd" d="M8 7a4 4 0 1 1 8 0a4 4 0 0 1-8 0m0 6a5 5 0 0 0-5 5a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3a5 5 0 0 0-5-5z" clip-rule="evenodd"/>
                    </svg>
                </button>

                <div class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-lg shadow-xl 
                            opacity-0 invisible 
                            group-hover:opacity-100 group-hover:visible 
                            transform scale-95 group-hover:scale-100 
                            transition-all duration-200 ease-in-out z-50">
                    
                    @auth
                        <a href="{{ route('customer.orders') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 border-b">My Purchase</a>
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
            <button type="button" @click="open = !open" class="lg:hidden p-2 text-gray-700 hover:text-black transition-colors duration-150">
                <svg x-show="!open" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                 <svg x-show="open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div> 
    <div x-show="open" 
         x-transition:enter="duration-200 ease-out"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="duration-100 ease-in"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right lg:hidden z-50">
        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y divide-gray-100">
            <div class="px-5 pt-5 pb-6">
                <div class="flex items-center justify-between">
                    {{-- Logo in Mobile Menu --}}
                    <a href="{{ url('/') }}" class="flex items-center gap-2">
                        <img src="{{ asset('Images/logo.png') }}" class="w-7 h-7 object-contain" alt="KickCraze Logo"/>
                        <h1 class="font-extrabold text-xl text-gray-900 tracking-wide">KickCraze</h1>
                    </a>
                    <button type="button" @click="open = false" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Close menu</span>
                         <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6">
                    <nav class="grid gap-y-4">
                        {{-- CATEGORIES (Sub-Nav Links) --}}
                        <a href="{{ route('mens') }}" class="text-base font-bold text-gray-900 hover:text-black">Men's</a>
                        <a href="{{ route('womens') }}" class="text-base font-bold text-gray-900 hover:text-black">Women's</a>
                        <a href="{{ route('kids') }}" class="text-base font-bold text-gray-900 hover:text-black">Kids'</a>

                        {{-- HOME / USER LINKS --}}
                        <a href="{{ route('customer.home') }}" class="text-base font-medium text-gray-700 hover:text-black border-t pt-4 mt-2">Home</a>
                        
                        {{-- Profile links are duplicated here for mobile convenience --}}
                        @auth
                            <a href="{{ route('customer.orders') }}" class="text-base font-medium text-gray-700 hover:text-black">My Purchase</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="w-full text-left text-base font-medium text-red-600 hover:text-red-700">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-base font-medium text-black">Sign In</a>
                            <a href="{{ route('register') }}" class="text-base font-medium text-gray-700 hover:text-black">Register</a>
                        @endauth
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>