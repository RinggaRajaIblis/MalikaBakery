<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MalikaBakery - Kehangatan Roti Segar Setiap Hari')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;0,800;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN Fallback & Vite -->
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .font-serif-heading {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>

<body class="bg-[#FFFDF9] text-[#4A3B32] antialiased flex flex-col min-h-screen selection:bg-[#D9822B] selection:text-white">



    <!-- Main Navbar -->
    <header class="sticky top-0 z-50 bg-[#FFFDF9]/90 backdrop-blur-md border-b border-[#F0E6D8] transition-all duration-300" id="main-header">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex justify-between items-center">
            
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-12 h-12 rounded-2xl overflow-hidden border-2 border-[#D9822B]/30 shadow-md group-hover:scale-105 transition-transform bg-white flex items-center justify-center">
                    <img src="{{ asset('images/Logo.jpeg') }}" alt="MalikaBakery Logo" class="w-full h-full object-cover">
                </div>
                <div class="flex flex-col">
                    <span class="font-serif-heading text-2xl font-bold tracking-tight text-[#4A2E1B] leading-none">Malika<span class="text-[#D9822B]">Bakery</span></span>
                    <span class="text-[10px] tracking-widest text-[#8B5E3C] font-semibold uppercase mt-0.5">Fresh Pastry & Bakery</span>
                </div>
            </a>

            <!-- Desktop Menu Links -->
            <ul class="hidden md:flex items-center gap-1 lg:gap-2 font-medium text-sm text-[#5C4033]">
                <li>
                    <a href="{{ route('home') }}"
                        class="px-4 py-2 rounded-full transition-all duration-200 {{ request()->routeIs('home') ? 'bg-[#8B5E3C] text-white shadow-sm font-semibold' : 'hover:text-[#8B5E3C] hover:bg-[#F9F0E6]' }}">
                        Beranda
                    </a>
                </li>
                <li>
                    <a href="{{ route('tentang') }}"
                        class="px-4 py-2 rounded-full transition-all duration-200 {{ request()->routeIs('tentang') ? 'bg-[#8B5E3C] text-white shadow-sm font-semibold' : 'hover:text-[#8B5E3C] hover:bg-[#F9F0E6]' }}">
                        Tentang Kami
                    </a>
                </li>
                <li>
                    <a href="{{ route('produk') }}"
                        class="px-4 py-2 rounded-full transition-all duration-200 {{ request()->routeIs('produk') ? 'bg-[#8B5E3C] text-white shadow-sm font-semibold' : 'hover:text-[#8B5E3C] hover:bg-[#F9F0E6]' }}">
                        Menu Produk
                    </a>
                </li>

                <li>
                    <a href="{{ route('kontak') }}"
                        class="px-4 py-2 rounded-full transition-all duration-200 {{ request()->routeIs('kontak') ? 'bg-[#8B5E3C] text-white shadow-sm font-semibold' : 'hover:text-[#8B5E3C] hover:bg-[#F9F0E6]' }}">
                        Kontak & Lokasi
                    </a>
                </li>
            </ul>

            <!-- Order via WA CTA Button (Desktop) -->
            <div class="hidden md:flex items-center">
                <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20ingin%20pesan%20roti" target="_blank"
                   class="inline-flex items-center gap-2 bg-[#D9822B] hover:bg-[#C06F1B] text-white px-5 py-2.5 rounded-full font-semibold text-sm shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                    Pesan Langsung
                </a>
            </div>

            <!-- Mobile Menu Toggle Button -->
            <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')"
                class="md:hidden text-[#4A2E1B] p-2 rounded-xl border border-[#E8D5C4] hover:bg-[#F9F0E6] focus:outline-none" aria-label="Toggle Navigation">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

        </nav>

        <!-- Mobile Menu Drawer -->
        <div id="mobile-menu" class="hidden md:hidden bg-[#FFFDF9] border-t border-[#F0E6D8] shadow-xl">
            <ul class="flex flex-col text-[#5C4033] font-medium p-4 gap-2">
                <li>
                    <a href="{{ route('home') }}"
                        class="block px-4 py-3 rounded-xl {{ request()->routeIs('home') ? 'bg-[#8B5E3C] text-white font-semibold' : 'hover:bg-[#F9F0E6]' }}">
                        Beranda
                    </a>
                </li>
                <li>
                    <a href="{{ route('tentang') }}"
                        class="block px-4 py-3 rounded-xl {{ request()->routeIs('tentang') ? 'bg-[#8B5E3C] text-white font-semibold' : 'hover:bg-[#F9F0E6]' }}">
                        Tentang Kami
                    </a>
                </li>
                <li>
                    <a href="{{ route('produk') }}"
                        class="block px-4 py-3 rounded-xl {{ request()->routeIs('produk') ? 'bg-[#8B5E3C] text-white font-semibold' : 'hover:bg-[#F9F0E6]' }}">
                        Menu Produk
                    </a>
                </li>

                <li>
                    <a href="{{ route('kontak') }}"
                        class="block px-4 py-3 rounded-xl {{ request()->routeIs('kontak') ? 'bg-[#8B5E3C] text-white font-semibold' : 'hover:bg-[#F9F0E6]' }}">
                        Kontak & Lokasi
                    </a>
                </li>
                <li class="pt-2">
                    <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20ingin%20pesan" target="_blank"
                       class="flex items-center justify-center gap-2 bg-[#D9822B] text-white py-3 rounded-xl font-semibold shadow">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        Pesan via WhatsApp
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <!-- Page Content Container -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Floating WhatsApp Widget -->
    <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20mau%20order" target="_blank"
       class="fixed bottom-6 right-6 z-50 bg-[#25D366] text-white p-4 rounded-full shadow-2xl hover:scale-110 transition-all duration-300 flex items-center justify-center group" aria-label="Chat WhatsApp">
        <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
        <span class="max-w-0 overflow-hidden whitespace-nowrap group-hover:max-w-xs transition-all duration-500 ease-in-out text-sm font-semibold pl-0 group-hover:pl-2">Chat Order</span>
    </a>

    <!-- Footer -->
    <footer class="bg-[#2C1A0E] text-[#E8D5C4] pt-16 pb-8 border-t border-[#3D2716]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-[#4A2E1B]">
                
                <!-- Column 1: Brand Info -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-11 h-11 rounded-xl overflow-hidden border border-[#D9822B]/40 bg-white flex items-center justify-center">
                            <img src="{{ asset('images/Logo.jpeg') }}" alt="MalikaBakery Logo" class="w-full h-full object-cover">
                        </div>
                        <span class="font-serif-heading text-2xl font-bold text-white tracking-wide">Malika<span class="text-[#D9822B]">Bakery</span></span>
                    </div>
                    <p class="text-sm text-[#C4B29E] leading-relaxed">
                        Menghadirkan kelezatan dan kehangatan roti manis, pastry lezat, serta kue tradisional buatan tangan berkualitas terbaik sejak 2018.
                    </p>
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-[#3D2716] text-xs text-[#D9822B] font-semibold">
                        <span>✔ 100% Halal & Tanpa Pengawet</span>
                    </div>
                </div>

                <!-- Column 2: Quick Links -->
                <div>
                    <h3 class="font-serif-heading text-lg font-semibold text-white mb-4">Navigasi Cepat</h3>
                    <ul class="space-y-2.5 text-sm text-[#C4B29E]">
                        <li><a href="{{ route('home') }}" class="hover:text-[#D9822B] transition-colors flex items-center gap-2"><span class="text-[#D9822B]">›</span> Beranda Utama</a></li>
                        <li><a href="{{ route('tentang') }}" class="hover:text-[#D9822B] transition-colors flex items-center gap-2"><span class="text-[#D9822B]">›</span> Tentang MalikaBakery</a></li>
                        <li><a href="{{ route('produk') }}" class="hover:text-[#D9822B] transition-colors flex items-center gap-2"><span class="text-[#D9822B]">›</span> Katalog Menu & Harga</a></li>

                        <li><a href="{{ route('kontak') }}" class="hover:text-[#D9822B] transition-colors flex items-center gap-2"><span class="text-[#D9822B]">›</span> Hubungi Kami & FAQ</a></li>
                    </ul>
                </div>

                <!-- Column 3: Jam Buka & Layanan -->
                <div>
                    <h3 class="font-serif-heading text-lg font-semibold text-white mb-4">Jam Operasional</h3>
                    <ul class="space-y-2 text-sm text-[#C4B29E]">
                        <li class="flex justify-between py-1 border-b border-[#3D2716]"><span>Senin - Jumat</span> <span class="font-semibold text-white">07.00 - 21.00 WIB</span></li>
                        <li class="flex justify-between py-1 border-b border-[#3D2716]"><span>Sabtu - Minggu</span> <span class="font-semibold text-white">06.30 - 21.30 WIB</span></li>
                        <li class="pt-2 text-xs text-[#D9822B] italic">*Roti fresh keluar oven pertama pukul 07.00 WIB setiap harinya.</li>
                    </ul>
                </div>

                <!-- Column 4: Alamat & Kontak -->
                <div class="space-y-3 text-sm text-[#C4B29E]">
                    <h3 class="font-serif-heading text-lg font-semibold text-white mb-4">Kunjungi Toko Kami</h3>
                    <p class="flex items-start gap-2 text-xs text-[#E8D5C4] leading-relaxed">
                        <svg class="w-5 h-5 text-[#D9822B] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        8°33'57.2"S 116°06'30.3"E, Mataram, Lombok, Nusa Tenggara Barat
                    </p>
                    <p class="text-xs text-[#E8D5C4] pt-1">
                        Buka: 07.00 - 21.00 WIB
                    </p>
                </div>

            </div>

            <!-- Bottom Copyright -->
            <div class="pt-8 border-t border-[#6E492F] flex flex-col sm:flex-row items-center justify-between text-xs text-[#F0D5BE] space-y-4 sm:space-y-0">
                <p>© {{ date('Y') }} MalikaBakery Lombok. All rights reserved. Crafted with care & warmth.</p>
                <div class="flex gap-6">
                    <a href="{{ route('home') }}" class="hover:underline">Kebijakan Privasi</a>
                    <a href="{{ route('home') }}" class="hover:underline">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>