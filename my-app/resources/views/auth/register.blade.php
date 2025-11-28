
@vite('resources/css/app.css')
@section('title', 'Register')

<div class="flex flex-col md:flex-row min-h-screen">

    <!-- LEFT SIDE BACKGROUND IMAGE -->
    <div class="w-full md:w-1/2 bg-cover bg-center relative"
         style="background-image: url('Images/bggg.jpg')">
        {{-- Updated Back button to match B/W theme and added shadow --}}
        <a href="{{ route('customer.home') }}" 
           class="absolute top-6 left-6 text-white px-4 py-2 bg-black text-sm font-semibold rounded-lg hover:bg-gray-800 transition duration-150 shadow-lg">
            ← Back to Home
        </a>
    </div>

    <!-- RIGHT SIDE REGISTER FORM -->
    <div class="w-full md:w-1/2 flex items-center justify-center p-6 md:p-12 bg-white">
        <div class="w-full max-w-sm lg:max-w-md">

            <h1 class="font-extrabold text-center justify-center items-center flex text-3xl text-gray-900 mb-8 text-center md:text-left">
                Create Your KickCraze Account
            </h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Full Name -->
                <div class="mb-4">
                    {{-- Replaced x-input-label --}}
                    <label for="fullname" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    {{-- Replaced x-text-input --}}
                    <input id="fullname" class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-black focus:ring-black"
                        type="text"
                        name="fullname"
                        :value="old('fullname')"
                        required autofocus autocomplete="fullname" />
                    {{-- Assuming x-input-error is fine, use as is --}}
                    <x-input-error :messages="$errors->get('fullname')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mt-4 mb-4">
                    {{-- Replaced x-input-label --}}
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    {{-- Replaced x-text-input --}}
                    <input id="email" class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-black focus:ring-black"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required autocomplete="username" />
                    {{-- Assuming x-input-error is fine, use as is --}}
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Hidden default role -->
                <input type="hidden" name="role" value="customer">

                <!-- Password -->
                <div class="mt-4 mb-4">
                    {{-- Replaced x-input-label --}}
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    {{-- Replaced x-text-input --}}
                    <input id="password" class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-black focus:ring-black"
                        type="password"
                        name="password"
                        required autocomplete="new-password" />
                    {{-- Assuming x-input-error is fine, use as is --}}
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    {{-- Replaced x-input-label --}}
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                    {{-- Replaced x-text-input --}}
                    <input id="password_confirmation" class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-black focus:ring-black"
                        type="password"
                        name="password_confirmation"
                        required autocomplete="new-password" />
                    {{-- Assuming x-input-error is fine, use as is --}}
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Login Link + Register Button -->
                <div class="flex flex-col md:flex-row justify-between items-center mt-8 gap-4">
                    
                    {{-- Login Link (Secondary action) --}}
                    <div class="text-center md:text-left w-full md:w-auto">
                        <a class="text-sm text-gray-600 hover:text-gray-900 transition underline" href="{{ route('login') }}">
                            Already registered?
                        </a>
                    </div>
                    
                    {{-- Register Button (Primary Black Button) --}}
                    <button type="submit"
                            class="w-full md:w-auto inline-flex items-center justify-center px-6 py-2 bg-black border border-transparent rounded-lg font-semibold text-sm text-white uppercase tracking-wider hover:bg-gray-800 transition shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black">
                        Register
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>


