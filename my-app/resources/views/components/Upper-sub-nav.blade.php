@vite('resources/css/app.css')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 pb-8 bg-white rounded-lg">
    
    <div class="mb-8 ">
        <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Today's Highlights</h2>
        
        {{-- Cleaned up grid structure for responsive display --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 ">
            
            {{-- LARGE BANNER (Main Focus) --}}
            {{-- ADDED max-h-[400px] on md screens to prevent excessive height --}}
            <a href="#" class="md:col-span-2 overflow-hidden rounded-lg shadow-md hover:shadow-lg transition duration-200">
                <img src="Images/men-s-shoes-clothing-accessories (1).png" 
                     alt="Men's Collection Banner" 
                     class="w-full h-48 md:h-full md:max-h-[400px] object-cover transform hover:scale-[1.02] transition duration-500 ease-in-out cursor-pointer" />
            </a>

            {{-- SMALL BANNERS (Stacked on the right) --}}
            <div class="grid grid-cols-2 md:grid-cols-1 gap-3">
                
                {{-- Top Small Banner --}}
                <a href="#" class="overflow-hidden rounded-lg shadow-md hover:shadow-lg transition duration-200">
                    <img src="Images/image.png" 
                         alt="New Arrivals Banner" 
                         class="w-full h-24 md:h-[194px] object-cover transform hover:scale-[1.02] transition duration-500 ease-in-out cursor-pointer" />
                </a>
                
                {{-- Bottom Small Banner --}}
                <a href="#" class="overflow-hidden rounded-lg shadow-md hover:shadow-lg transition duration-200">
                    <img src="Images/banner2.jfif" 
                         alt="Limited Stock Banner" 
                         class="w-full h-24 md:h-[194px] object-cover transform hover:scale-[1.02] transition duration-500 ease-in-out cursor-pointer" />
                </a>
            </div>
        </div>
    </div>


    <div class="mb-4">
        <h2 class="text-xl font-bold text-gray-900 mb-4 tracking-tight">KickCraze Services</h2>
        
        {{-- This section is unchanged, using the same clean icon bar --}}
        <div class="flex flex-wrap justify-between md:justify-around items-start gap-y-4 text-center">
            
            {{-- Item 1: 50% Off Fashion --}}
            <a href="#" class="flex flex-col items-center justify-center w-1/4 sm:w-auto p-2 group hover:text-black text-gray-700 transition-colors duration-150">
               <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="#000" d="M9.405 2.897a4 4 0 0 1 5.02-.136l.17.136l.376.32a2 2 0 0 0 .96.45l.178.022l.493.04a4 4 0 0 1 3.648 3.468l.021.2l.04.494a2 2 0 0 0 .36.996l.11.142l.322.376a4 4 0 0 1 .136 5.02l-.136.17l-.321.376a2 2 0 0 0-.45.96l-.022.178l-.039.493a4 4 0 0 1-3.468 3.648l-.201.021l-.493.04a2 2 0 0 0-.996.36l-.142.111l-.377.32a4 4 0 0 1-5.02.137l-.169-.136l-.376-.321a2 2 0 0 0-.96-.45l-.178-.021l-.493-.04a4 4 0 0 1-3.648-3.468l-.021-.2l-.04-.494a2 2 0 0 0-.36-.996l-.111-.142l-.321-.377a4 4 0 0 1-.136-5.02l.136-.169l.32-.376a2 2 0 0 0 .45-.96l.022-.178l.04-.493A4 4 0 0 1 7.197 3.75l.2-.021l.494-.04a2 2 0 0 0 .996-.36l.142-.111zM14.5 13a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3m-.207-4.707l-6 6a1 1 0 1 0 1.414 1.414l6-6a1 1 0 0 0-1.414-1.414M9.5 8a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3"/></g></svg>
                <p class="text-xs sm:text-sm mt-1 font-medium">50% Off Flash Sale</p>
            </a>
            
            {{-- Item 2: Kickcraze Mall --}}
            <a href="#" class="flex flex-col items-center justify-center w-1/4 sm:w-auto p-2 group hover:text-black text-gray-700 transition-colors duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><defs><mask id="SVGb4mctTCP"><g fill="none" stroke-linejoin="round" stroke-width="4"><path fill="#fff" stroke="#fff" d="M6 12.6V41a2 2 0 0 0 2 2h32a2 2 0 0 0 2-2V12.6z"/><path stroke="#fff" stroke-linecap="round" d="M42 12.6L36.333 5H11.667L6 12.6v0"/><path stroke="#000" stroke-linecap="round" d="M31.555 19.2c0 4.198-3.382 7.6-7.555 7.6s-7.556-3.402-7.556-7.6"/></g></mask></defs><path fill="#000" d="M0 0h48v48H0z" mask="url(#SVGb4mctTCP)"/></svg>
                <p class="text-xs sm:text-sm mt-1 font-medium">KickCraze Mall</p>
            </a>
            
            {{-- Item 3: On-time Delivery --}}
            <a href="#" class="flex flex-col items-center justify-center w-1/4 sm:w-auto p-2 group hover:text-black text-gray-700 transition-colors duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><g fill="none"><path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="#000" d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2m0 4a1 1 0 0 0-1 1v5a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V7a1 1 0 0 0-1-1"/></g></svg>
                <p class="text-xs sm:text-sm mt-1 font-medium">On-time Guarantee</p>
            </a>
            
            {{-- Item 4: Kickcraze Choice --}}
            <a href="#" class="flex flex-col items-center justify-center w-1/4 sm:w-auto p-2 group hover:text-black text-gray-700 transition-colors duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><path fill="#000" d="m12 21l-3.375 1.125q-.175.05-.325.075t-.3.025q-.8 0-1.4-.563T6 20.225v-5.45L3.4 10.55q-.15-.25-.225-.513T3.1 9.5t.075-.537t.225-.513l3.4-5.5q.275-.45.725-.7T8.5 2h7q.525 0 .975.25t.725.7l3.4 5.5q.15.25.225.513t.075.537t-.075.538t-.225.512L18 14.775v5.45q0 .875-.6 1.438t-1.4.562q-.15 0-.3-.025t-.325-.075zm-3.5-6h7l3.4-5.5L15.5 4h-7L5.1 9.5zm2.45-4.25l3.525-3.55q.275-.3.688-.288t.712.288q.3.3.313.713t-.288.712l-4.25 4.25q-.3.3-.7.3t-.7-.3L8.125 10.75q-.3-.3-.3-.712t.3-.713t.713-.3t.712.3z"/></svg>
                <p class="text-xs sm:text-sm mt-1 font-medium">KickCraze Choice</p>
            </a>
            
            {{-- Item 5: Free Shipping --}}
            <a href="#" class="flex flex-col items-center justify-center w-1/4 sm:w-auto p-2 group hover:text-black text-gray-700 transition-colors duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="48" viewBox="0 0 640 512"><path fill="#000" d="M64 96c0-35.3 28.7-64 64-64h288c35.3 0 64 28.7 64 64v32h50.7c17 0 33.3 6.7 45.3 18.7l45.3 45.3c12 12 18.7 28.3 18.7 45.3V384c0 35.3-28.7 64-64 64h-3.3c-10.4 36.9-44.4 64-84.7 64s-74.2-27.1-84.7-64H300.7c-10.4 36.9-44.4 64-84.7 64s-74.2-27.1-84.7-64H128c-35.3 0-64-28.7-64-64v-48H24c-13.3 0-24-10.7-24-24s10.7-24 24-24h112c13.3 0 24-10.7 24-24s-10.7-24-24-24H24c-13.3 0-24-10.7-24-24s10.7-24 24-24h176c13.3 0 24-10.7 24-24s-10.7-24-24-24H24c-13.3 0-24-10.7-24-24s10.7-24 24-24zm512 192v-50.7L530.7 192H480v96zM256 424a40 40 0 1 0-80 0a40 40 0 1 0 80 0m232 40a40 40 0 1 0 0-80a40 40 0 1 0 0 80"/></svg>
                <p class="text-xs sm:text-sm mt-1 font-medium">Free Shipping</p>
            </a>
            
            {{-- Item 6: Coins Rewards --}}
            <a href="#" class="flex flex-col items-center justify-center w-1/4 sm:w-auto p-2 group hover:text-black text-gray-700 transition-colors duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 512 512"><path fill="#000" d="M128 96V80c0-44.2 86-80 192-80s192 35.8 192 80v16c0 30.6-41.3 57.2-102 70.7c-2.4-2.8-4.9-5.5-7.4-8c-15.5-15.3-35.5-26.9-56.4-35.5c-41.9-17.5-96.5-27.1-154.2-27.1c-21.9 0-43.3 1.4-63.8 4.1c-.2-1.3-.2-2.7-.2-4.1zm304 257v-46.2c15.1-3.9 29.3-8.5 42.2-13.9c13.2-5.5 26.1-12.2 37.8-20.3V288c0 26.8-31.5 50.5-80 65m0-96v-33c0-4.5-.4-8.8-1-13c15.5-3.9 30-8.6 43.2-14.2s26.1-12.2 37.8-20.3v15.4c0 26.8-31.5 50.5-80 65zM0 240v-16c0-44.2 86-80 192-80s192 35.8 192 80v16c0 44.2-86 80-192 80S0 284.2 0 240m384 96c0 44.2-86 80-192 80S0 380.2 0 336v-15.4c11.6 8.1 24.5 14.7 37.8 20.3C79.7 358.4 134.3 368 192 368s112.3-9.7 154.2-27.1c13.2-5.5 26.1-12.2 37.8-20.3zm0 80.6V432c0 44.2-86 80-192 80S0 476.2 0 432v-15.4c11.6 8.1 24.5 14.7 37.8 20.3C79.7 454.4 134.3 464 192 464s112.3-9.7 154.2-27.1c13.2-5.5 26.1-12.2 37.8-20.3"/></svg>
                <p class="text-xs sm:text-sm mt-1 font-medium">Coins Rewards</p>
            </a>
            
            {{-- Item 7: Partner Promos --}}
            <a href="#" class="flex flex-col items-center justify-center w-1/4 sm:w-auto p-2 group hover:text-black text-gray-700 transition-colors duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><path fill="#000" d="M12.79 21L3 11.21v2c0 .53.21 1.04.59 1.41l7.79 7.79c.78.78 2.05.78 2.83 0l6.21-6.21c.78-.78.78-2.05 0-2.83z"/><path fill="#000" d="M11.38 17.41c.78.78 2.05.78 2.83 0l6.21-6.21c.78-.78.78-2.05 0-2.83L12.63.58A2.04 2.04 0 0 0 11.21 0H5C3.9 0 3 .9 3 2v6.21c0 .53.21 1.04.59 1.41zM7.25 3a1.25 1.25 0 1 1 0 2.5a1.25 1.25 0 0 1 0-2.5"/></svg>
                <p class="text-xs sm:text-sm mt-1 font-medium">Partner Promos</p>
            </a>
            
            {{-- Item 8: Supermarket (Placeholder for consistent grid) --}}
            <a href="#" class="flex flex-col items-center justify-center w-1/4 sm:w-auto p-2 group hover:text-black text-gray-700 transition-colors duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><path fill="#000" d="M4 4a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2a2 2 0 0 1-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 1-2-2a2 2 0 0 1 2-2V6a2 2 0 0 0-2-2zm11.5 3L17 8.5L8.5 17L7 15.5zm-6.69.04c.98 0 1.77.79 1.77 1.77a1.77 1.77 0 0 1-1.77 1.77c-.98 0-1.77-.79-1.77-1.77a1.77 1.77 0 0 1 1.77-1.77m6.38 6.38c.98 0 1.77.79 1.77 1.77a1.77 1.77 0 0 1-1.77 1.77c-.98 0-1.77-.79-1.77-1.77a1.77 1.77 0 0 1 1.77-1.77"/></svg>
                <p class="text-xs sm:text-sm mt-1 font-medium">Discount Vouchers</p>
            </a>
            
        </div>
    </div>
</div>