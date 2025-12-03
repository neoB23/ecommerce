<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KickCraze</title>
    <!-- Load Tailwind CSS CDN --><script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles for modern input focus effect */
        .input-modern {
            transition: all 0.2s ease-in-out;
        }
        .input-modern:focus {
            box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.1);
        }
        .input-modern:hover {
            border-color: #a0a0a0;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05), 0 1px 2px 0 rgba(0, 0, 0, 0.02);
        }
    </style>
</head>
<body class="font-sans antialiased">

<!-- @vite('resources/css/app.css') --><!-- @section('title', 'Login') --><div class="flex flex-col md:flex-row min-h-screen bg-gray-50">

    <!-- LEFT PANE: Visual Identity and Branding --><div class="w-full md:w-1/2 bg-cover bg-center relative p-10 md:p-20 flex items-center justify-center min-h-[300px] md:min-h-screen" 
         style="background-image: url('Images/bggg.jpg');">

        <div class="absolute inset-0 bg-black/70 backdrop-blur-sm"></div>

        <a href="{{ route('customer.home') }}" 
           class="absolute top-8 left-8 text-white px-5 py-2 border border-white/20 bg-black/50 text-base font-medium rounded-full hover:bg-black/70 transition duration-300 shadow-xl z-20">
            &larr; Back to Home
        </a>

        <div class="relative text-center text-white z-10">
            <h2 class="text-5xl md:text-6xl font-extrabold tracking-tight mb-4 drop-shadow-lg">
                KickCraze
            </h2>
            <p class="text-xl italic font-light max-w-sm mx-auto text-gray-300">
                "Step into style. Your next obsession starts here."
            </p>
        </div>
    </div>

    <!-- RIGHT PANE: Login Form --><div class="w-full md:w-1/2 flex items-center justify-center p-6 md:p-12">
        <div class="w-full max-w-md  p-8 md:p-10 rounded-xl ">

            <!-- Logo --><div class="flex justify-center mb-8">
                <img src="Images/logo.png" alt="KickCraze Logo" class="h-16 w-auto">
            </div>

            <!-- Title & Status --><x-auth-session-status class="mb-6" :status="session('status')" />

            <h1 class="font-extrabold text-4xl text-gray-900 mb-2">
                Welcome Back
            </h1>
            <p class="text-gray-500 mb-8">
                Sign in to access your dashboard and saved items.
            </p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Field --><div class="mb-5">
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                    <input id="email"
                           class="input-modern block w-full border-gray-300 rounded-lg shadow-sm focus:border-black focus:ring-0 focus:ring-black/20 py-3 px-4"
                           type="email"
                           name="email"
                           :value="old('email')"
                           placeholder="you@example.com"
                           required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password Field with Eye Toggle --><div class="mt-4 mb-6">
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <input id="password"
                               class="input-modern block w-full border-gray-300 rounded-lg shadow-sm focus:border-black focus:ring-0 focus:ring-black/20 pr-10 py-3"
                               type="password"
                               name="password"
                               placeholder="••••••••"
                               required />
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-600 hover:text-gray-900 focus:outline-none">
                            <!-- Eye Open Icon (Visible by default) -->
                            <svg id="eyeOpenIcon" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <!-- Eye Closed Icon (Hidden by default) -->
                            <svg id="eyeClosedIcon" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.879 13.879a3 3 0 10-4.243-4.243m4.243 4.243L21 21m-4.243-4.243L3 3M10 14a4 4 0 00-4 4v2" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.88 9.88c-.06.27-.11.55-.11.85a3 3 0 0 0 3 3c.3 0 .58-.05.85-.11M6.61 6.61A13.52 13.52 0 0 0 2 12s3 7 10 7a9.7 9.7 0 0 0 5.39-1.61M12 5a13.52 13.52 0 0 1 7.39 5.39M19.39 17.39c.07-.27.11-.56.11-.88a10 10 0 0 0-3-6.61M2 2l20 20" />
                            </svg>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
<div class="mb-5">
    <label for="role" class="block text-sm font-semibold text-gray-700 mb-2">Login As</label>
    <select name="role" id="role"
        class="input-modern block w-full border-gray-300 rounded-lg shadow-sm focus:border-black py-3 px-4"
        required>
        <option value="customer">Customer</option>
        <option value="admin">Admin</option>
    </select>
</div>

                <div class="flex flex-col max-w items-stretch gap-4">
                    
                    <button type="submit"
                            class="w-full inline-flex items-center justify-center px-6 py-3 bg-black border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-wider hover:bg-gray-800 active:bg-gray-900 transition duration-200 ease-in-out shadow-lg transform hover:scale-[1.01] focus:outline-none focus:ring-4 focus:ring-black/30">
                        Secure Sign In
                    </button>
                    
                    <div class="text-center mt-4">
                        <span class="text-sm text-gray-600">
                            New to KickCraze?
                        </span>
                        <a href="{{ route('register') }}"
                           class="text-sm font-bold text-black hover:text-gray-700 transition underline ml-1">
                            Create an Account
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeOpenIcon = document.getElementById('eyeOpenIcon');
        const eyeClosedIcon = document.getElementById('eyeClosedIcon');

        togglePassword.addEventListener('click', function () {
            const isPassword = passwordInput.getAttribute('type') === 'password';
            
            // Toggle the type attribute
            passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
            
            // Toggle the icon visibility using Tailwind classes
            if (isPassword) {
                // If it was password, switch to text (open eye)
                eyeOpenIcon.classList.add('hidden');
                eyeClosedIcon.classList.remove('hidden');
            } else {
                // If it was text, switch back to password (closed eye)
                eyeOpenIcon.classList.remove('hidden');
                eyeClosedIcon.classList.add('hidden');
            }
        });
    });
</script>

</body>
</html>