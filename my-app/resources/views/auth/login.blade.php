@vite('resources/css/app.css')
@section('title', 'Login')

<div class="flex flex-col md:flex-row min-h-screen">

    <div class="w-full md:w-1/2 bg-cover bg-center relative" 
         style="background-image: url('Images/bggg.jpg')">
        {{-- Updated Back button to match B/W theme and added shadow --}}
        <a href="{{ route('customer.home') }}" 
           class="absolute top-6 left-6 text-white px-4 py-2 bg-black text-sm font-semibold rounded-lg hover:bg-gray-800 transition duration-150 shadow-lg">
            ← Back to Home
        </a>
    </div>

    <div class="w-full md:w-1/2 flex items-center justify-center p-6 md:p-12 bg-white">
        <div class="w-full max-w-sm lg:max-w-md">

            {{-- Assuming <x-auth-session-status> is styled correctly, leave as is --}}
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <h1 class="font-extrabold text-center justify-center items-center flex text-3xl text-gray-900 mb-8 text-center md:text-left">
                Sign In to KickCraze
            </h1>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    {{-- Replaced x-input-label --}}
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    {{-- Replaced x-text-input --}}
                    <input id="email"
                           class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-black focus:ring-black"
                           type="email"
                           name="email"
                           :value="old('email')"
                           required autofocus />
                    {{-- Assuming x-input-error is fine, use as is --}}
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4 mb-6">
                    {{-- Replaced x-input-label --}}
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    {{-- Replaced x-text-input --}}
                    <input id="password"
                           class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-black focus:ring-black"
                           type="password"
                           name="password"
                           required />
                    {{-- Assuming x-input-error is fine, use as is --}}
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>


                {{-- Remember Me & Forgot Password (Moved for better flow) --}}
                <div class="flex items-center justify-between">
                    
                    {{-- Remember Me --}}
                    <div class="flex items-center">
                        <input id="remember_me"
                               type="checkbox"
                               class="h-4 w-4 text-black border-gray-300 rounded focus:ring-black"
                               name="remember">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-600">
                            Remember me
                        </label>
                    </div>

                    {{-- Forgot Password (Uncommented and styled) --}}
                    @if (Route::has('password.request'))
                        <a class="text-xs text-gray-500 hover:text-gray-900 transition underline"
                           href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                    @endif
                </div>
                
                
                {{-- Action Buttons --}}
                <div class="flex flex-col items-stretch mt-8 gap-4">
                    
                    {{-- Login Button (Primary Black Button) --}}
                    <button type="submit"
                            class="w-full inline-flex items-center justify-center px-4 py-2 bg-black border border-transparent rounded-lg font-semibold text-sm text-white uppercase tracking-wider hover:bg-gray-800 transition shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black">
                        Log in
                    </button>
                    
                    {{-- Create Account Link (Secondary action) --}}
                    <div class="text-center mt-2">
                        <span class="text-sm text-gray-600">
                            New here?
                        </span>
                        <a href="{{ route('register') }}"
                           class="text-sm font-semibold text-black hover:text-gray-700 transition underline ml-1">
                            Create an Account
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>