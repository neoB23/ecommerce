@vite('resources/css/app.css')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Admin Dashboard</title>
    {{-- Ensure your Tailwind build process is running to generate CSS from these classes --}}
    @vite('resources/css/app.css') 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> 
    <style>
        /* Define the focus color (using a light gray for high contrast) */
        .active-link {
            background-color: #f3f4f6; /* Tailwind's gray-100 */
            color: #1f2937; /* Tailwind's gray-900 */
            border-radius: 0.5rem; /* rounded-lg */
        }
        /* Style for hover on dark background */
        .sidebar-link-inactive:hover {
            background-color: #1f2937; /* Tailwind's gray-900 */
        }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased">

    <div class="flex min-h-screen">
        
        <nav class="sidebar w-64 bg-gray-950 text-white flex flex-col p-4 shadow-2xl transition-all duration-300 ease-in-out z-20">
            
            {{-- KickCraze Logo/Branding --}}
           <div class="text-3xl space-x-4 font-bold text-white border-b border-gray-800 pb-5 mb-8 tracking-tighter flex items-center">
                {{-- Logo Image --}}
                <img src="{{ asset('Images/logo.png') }}" class="w-12 h-12 object-contain" alt="KickCraze Logo"/>
                KickCraze
            </div>

            {{-- Navigation Links (Orders & Products only) --}}
            <ul class="space-y-1 flex-grow">
                
                {{-- Dashboard Link (Dynamic) --}}
                <li>
                    <a href="{{ route('admin.dashboard') }}" 
                       class="@if(request()->routeIs('admin.dashboard')) active-link @else sidebar-link-inactive text-gray-300 hover:bg-gray-800 @endif 
                              flex items-center p-3 font-medium rounded-lg transition-colors">
                        {{-- Note: Changed icon from boxes to a dashboard icon for semantic clarity --}}
                        <i class="fas fa-tachometer-alt mr-3 w-5 text-center @if(request()->routeIs('admin.dashboard')) text-gray-900 @else text-gray-400 @endif"></i>
                        Dashboard
                    </a>
                </li>
                
                {{-- Products Link (Dynamic) --}}
                <li>
                    <a href="{{ route('admin.products.index') }}" 
                       class="@if(request()->routeIs('admin.products.*')) active-link @else sidebar-link-inactive text-gray-300 hover:bg-gray-800 @endif 
                              flex items-center p-3 font-medium rounded-lg transition-colors">
                        <i class="fas fa-boxes mr-3 w-5 text-center @if(request()->routeIs('admin.products.*')) text-gray-900 @else text-gray-400 @endif"></i>
                        Products
                    </a>
                </li>
                
                {{-- Orders Link (Dynamic) --}}
                <li>
                    <a href="{{ route('admin.orders.index') }}" 
                       class="@if(request()->routeIs('admin.orders.*')) active-link @else sidebar-link-inactive text-gray-300 hover:bg-gray-800 @endif 
                              flex items-center p-3 font-medium rounded-lg transition-colors">
                        <i class="fas fa-file-invoice-dollar mr-3 w-5 text-center @if(request()->routeIs('admin.orders.*')) text-gray-900 @else text-gray-400 @endif"></i>
                        Orders
                    </a>
                </li>
            </ul>

            {{-- Logout Function --}}
            <div class="pt-6 border-t border-gray-800">
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="sidebar-link-inactive flex items-center p-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white">
                    <i class="fas fa-sign-out-alt mr-3 w-5 text-center"></i>
                    Logout
                </a>
                {{-- Hidden Form for Logout --}}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>

        </nav>
        
        <div class="flex-1 flex flex-col overflow-hidden">
            
            {{-- Header: Clean Page Title --}}
            <header class="bg-white border-b border-gray-200 p-4 sticky top-0 z-10 shadow-sm">
                <h1 class="text-2xl font-semibold text-gray-800">
                    @yield('title', 'Admin Dashboard')
                </h1>
            </header>
            
            {{-- Main Content Section --}}
            <main class="flex-1 p-6 overflow-y-auto">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>