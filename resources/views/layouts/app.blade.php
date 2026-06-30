<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MalikaBakery')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#FAF3E0]">

    <!-- Navbar -->
    <nav class="bg-white shadow-md fixed w-full z-50" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-8 py-4 flex justify-between items-center">

            <div class="text-3xl font-bold text-[#8B5E3C]">
                MalikaBakery
            </div>

            <!-- Menu desktop -->
            <ul class="hidden md:flex gap-8 text-[#5C4033] font-medium">
                <li>
                    <a href="{{ route('home') }}"
                        class="hover:text-[#8B5E3C] {{ request()->routeIs('home') ? 'text-[#8B5E3C] font-bold border-b-2 border-[#8B5E3C]' : '' }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('tentang') }}"
                        class="hover:text-[#8B5E3C] {{ request()->routeIs('tentang') ? 'text-[#8B5E3C] font-bold border-b-2 border-[#8B5E3C]' : '' }}">
                        Tentang Kami
                    </a>
                </li>
                <li>
                    <a href="{{ route('produk') }}"
                        class="hover:text-[#8B5E3C] {{ request()->routeIs('produk') ? 'text-[#8B5E3C] font-bold border-b-2 border-[#8B5E3C]' : '' }}">
                        Produk
                    </a>
                </li>
                <li>
                    <a href="{{ route('galeri') }}"
                        class="hover:text-[#8B5E3C] {{ request()->routeIs('galeri') ? 'text-[#8B5E3C] font-bold border-b-2 border-[#8B5E3C]' : '' }}">
                        Galeri
                    </a>
                </li>
                <li>
                    <a href="{{ route('kontak') }}"
                        class="hover:text-[#8B5E3C] {{ request()->routeIs('kontak') ? 'text-[#8B5E3C] font-bold border-b-2 border-[#8B5E3C]' : '' }}">
                        Kontak
                    </a>
                </li>
            </ul>

            <!-- Tombol hamburger, cuma muncul di mobile -->
            <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')"
                class="md:hidden text-[#5C4033] focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

        </div>

        <!-- Menu mobile, default hidden -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-[#E8D5C4]">
            <ul class="flex flex-col text-[#5C4033] font-medium px-8 py-4 gap-4">
                <li><a href="{{ route('home') }}"
                        class="{{ request()->routeIs('home') ? 'text-[#8B5E3C] font-bold' : '' }}">Home</a></li>
                <li><a href="{{ route('tentang') }}"
                        class="{{ request()->routeIs('tentang') ? 'text-[#8B5E3C] font-bold' : '' }}">Tentang Kami</a>
                </li>
                <li><a href="{{ route('produk') }}"
                        class="{{ request()->routeIs('produk') ? 'text-[#8B5E3C] font-bold' : '' }}">Produk</a></li>
                <li><a href="{{ route('galeri') }}"
                        class="{{ request()->routeIs('galeri') ? 'text-[#8B5E3C] font-bold' : '' }}">Galeri</a></li>
                <li><a href="{{ route('kontak') }}"
                        class="{{ request()->routeIs('kontak') ? 'text-[#8B5E3C] font-bold' : '' }}">Kontak</a></li>
            </ul>
        </div>
    </nav>

    <!-- Konten tiap halaman masuk sini -->
    @yield('content')

    <!-- Footer -->
    <footer class="bg-[#5C4033] text-white py-10">
        <div class="max-w-7xl mx-auto px-8 text-center">
            <p class="font-bold text-lg mb-2">MalikaBakery</p>
            <p class="text-sm text-[#E8D5C4]">© {{ date('Y') }} MalikaBakery. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>