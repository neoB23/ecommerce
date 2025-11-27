@vite('resources/css/app.css')

<div class="flex min-h-screen">

    <!-- LEFT SIDE FULL HEIGHT BACKGROUND IMAGE -->
    <div class="w-1/2 bg-cover bg-center" 
         style="background-image: url('Images/bggg.jpg')">
         <a href="{{ route('customer.home') }}" class="text-white p-4 justify-center items-center text-center flex bg-black rounded ">Back</a>
    </div>

    <!-- RIGHT SIDE LOGIN FORM -->
    <div class="w-1/2 flex items-center justify-center ">
        <div class="w-full p-8 ">

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <h1 class="font-bold text-3xl mb-6">Welcome Back</h1>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email"
                                  class="block mt-1 w-full"
                                  type="email"
                                  name="email"
                                  :value="old('email')"
                                  required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password"
                                  class="block mt-1 w-full"
                                  type="password"
                                  name="password"
                                  required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mt-4">
                    <input id="remember_me"
                           type="checkbox"
                           class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                           name="remember">
                    <label for="remember_me" class="ml-2 text-sm text-gray-600">
                        Remember me
                    </label>
                </div>

                <!-- Create Account -->
                <div class="flex justify-between items-center mt-4">
                    <a href="{{ route('register') }}"
                       class="text-sm text-gray-600 hover:text-gray-900 underline">
                        Create Account
                    </a>
                </div>

                <!-- Login + Forgot Password -->
                <div class="flex justify-end items-center mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 mr-3"
                           href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif

                    <x-primary-button>Log in</x-primary-button>
                </div>

            </form>
        </div>
    </div>

</div>
