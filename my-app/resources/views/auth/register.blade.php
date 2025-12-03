<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - KickCraze</title>
    <!-- Load Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
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
        /* Ensure the background image covers the height on mobile */
        @media (max-width: 767px) {
            .mobile-image-height {
                min-height: 250px; /* Reduced height on mobile */
            }
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">

<div class="flex flex-col md:flex-row min-h-screen">

    <!-- LEFT SIDE BACKGROUND IMAGE -->
    <div class="w-full md:w-1/2 bg-cover bg-center relative mobile-image-height flex items-center justify-center p-6 md:p-12"
         style="background-image: url('Images/bggg.jpg')">
        
        <!-- Dark overlay for text clarity -->
        <div class="absolute inset-0 bg-black/70"></div> 

        <!-- Back to Home Button -->
        <a href="{{ route('customer.home') }}" 
           class="absolute top-6 left-6 text-white px-5 py-2 border border-white/20 bg-black/50 text-base font-medium rounded-full hover:bg-black/70 transition duration-300 shadow-xl z-20">
            &larr; Back to Home
        </a>

        <!-- Branding Text (Added for visual appeal on the image panel) -->
        <div class="relative text-center text-white z-10 hidden md:block">
            <h2 class="text-6xl font-extrabold tracking-tight mb-4 drop-shadow-lg">
                Join KickCraze
            </h2>
            <p class="text-xl italic font-light max-w-sm mx-auto text-gray-300">
                "Find your perfect pair and step up your game."
            </p>
        </div>
    </div>

    <!-- RIGHT SIDE REGISTER FORM -->
    <div class="w-full md:w-1/2 flex items-center justify-center p-6 md:p-12 bg-white">
        <div class="w-full max-w-sm lg:max-w-md">

            <h1 class="font-extrabold text-3xl text-gray-900 mb-8 text-center">
                Create Your KickCraze Account
            </h1>

            <form method="POST" action="{{ route('register') }}">
                <!-- CRITICAL FIX: Include the CSRF token directive to prevent 419 errors -->
                @csrf 

                <!-- Full Name -->
                <div class="mb-5">
                    <label for="fullname" class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                    <input id="fullname" 
                           class="input-modern block w-full border-gray-300 rounded-lg shadow-sm focus:border-black focus:ring-0 focus:ring-black/20 py-3 px-4"
                           type="text"
                           name="fullname"
                           :value="old('fullname')"
                           placeholder="John Doe"
                           required autofocus autocomplete="fullname" />
                   @error('fullname')
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
@enderror
                </div>

                <!-- Email -->
                <div class="mb-5">
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                    <input id="email" 
                           class="input-modern block w-full border-gray-300 rounded-lg shadow-sm focus:border-black focus:ring-0 focus:ring-black/20 py-3 px-4"
                           type="email"
                           name="email"
                           :value="old('email')"
                           placeholder="you@example.com"
                           required autocomplete="username" />
                    @error('email')
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
@enderror
                </div>

                <!-- Hidden default role -->
                <input type="hidden" name="role" value="customer">
                <div>
                    
                </div>
                <!-- Password -->
                <div class="mt-4 mb-5">
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <input id="password" 
                               class="input-modern block w-full border-gray-300 rounded-lg shadow-sm focus:border-black focus:ring-0 focus:ring-black/20 pr-10 py-3"
                               type="password"
                               name="password"
                               placeholder="••••••••"
                               required autocomplete="new-password" />
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
                 @error('password')
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
@enderror

                <!-- Confirm Password -->
                <div class="mt-4 mb-8">
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">Confirm Password</label>
                    <div class="relative">
                        <input id="password_confirmation" 
                               class="input-modern block w-full border-gray-300 rounded-lg shadow-sm focus:border-black focus:ring-0 focus:ring-black/20 pr-10 py-3"
                               type="password"
                               name="password_confirmation"
                               placeholder="••••••••"
                               required autocomplete="new-password" />
                        <button type="button" id="toggleConfirmPassword" class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-600 hover:text-gray-900 focus:outline-none">
                            <!-- Eye Open Icon (Visible by default) -->
                            <svg id="confirmEyeOpenIcon" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <!-- Eye Closed Icon (Hidden by default) -->
                            <svg id="confirmEyeClosedIcon" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.879 13.879a3 3 0 10-4.243-4.243m4.243 4.243L21 21m-4.243-4.243L3 3M10 14a4 4 0 00-4 4v2" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.88 9.88c-.06.27-.11.55-.11.85a3 3 0 0 0 3 3c.3 0 .58-.05.85-.11M6.61 6.61A13.52 13.52 0 0 0 2 12s3 7 10 7a9.7 9.7 0 0 0 5.39-1.61M12 5a13.52 13.52 0 0 1 7.39 5.39M19.39 17.39c.07-.27.11-.56.11-.88a10 10 0 0 0-3-6.61M2 2l20 20" />
                            </svg>
                        </button>
                    </div>
                @error('password_confirmation')
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
@enderror
                </div>

                <!-- Login Link + Register Button -->
                <div class="flex flex-col-reverse md:flex-row justify-between items-center mt-8 gap-4">
                    
                    <!-- Login Link (Secondary action) -->
                    <div class="text-center w-full md:w-auto">
                        <span class="text-sm text-gray-600">
                            Already registered?
                        </span>
                        <a class="text-sm font-bold text-black hover:text-gray-700 transition underline ml-1" href="{{ route('login') }}">
                            Sign In
                        </a>
                    </div>
                    
                    <!-- Register Button (Primary Black Button) -->
                    <button type="submit"
                            class="w-full md:w-auto inline-flex items-center justify-center px-8 py-3 bg-black border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-wider hover:bg-gray-800 active:bg-gray-900 transition duration-200 ease-in-out shadow-lg transform hover:scale-[1.01] focus:outline-none focus:ring-4 focus:ring-black/30">
                        Register
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    // Helper function to handle the password toggle logic
    function setupPasswordToggle(toggleButtonId, inputId, openIconId, closedIconId) {
        const toggleButton = document.getElementById(toggleButtonId);
        const passwordInput = document.getElementById(inputId);
        const eyeOpenIcon = document.getElementById(openIconId);
        const eyeClosedIcon = document.getElementById(closedIconId);

        if (toggleButton && passwordInput && eyeOpenIcon && eyeClosedIcon) {
            toggleButton.addEventListener('click', function () {
                const isPassword = passwordInput.getAttribute('type') === 'password';
                
                // Toggle the type attribute
                passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
                
                // Toggle the icon visibility
                if (isPassword) {
                    // If it was password, switch to text (show closed eye icon)
                    eyeOpenIcon.classList.add('hidden');
                    eyeClosedIcon.classList.remove('hidden');
                } else {
                    // If it was text, switch back to password (show open eye icon)
                    eyeOpenIcon.classList.remove('hidden');
                    eyeClosedIcon.classList.add('hidden');
                }
            });
            
            // Set initial state: show the closed eye icon if the type is password, otherwise show open.
            if (passwordInput.getAttribute('type') === 'password') {
                eyeClosedIcon.classList.add('hidden');
                eyeOpenIcon.classList.remove('hidden');
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Setup for the main password field
        setupPasswordToggle('togglePassword', 'password', 'eyeOpenIcon', 'eyeClosedIcon');
        
        // Setup for the confirm password field
        setupPasswordToggle('toggleConfirmPassword', 'password_confirmation', 'confirmEyeOpenIcon', 'confirmEyeClosedIcon');
    });
</script>

</body>
</html>