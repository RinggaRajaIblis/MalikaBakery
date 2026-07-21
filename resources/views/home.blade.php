@extends('layouts.app')

@section('title', 'MalikaBakery - Roti & Pastry Fresh Dipanggang Setiap Hari di Lombok')

@section('content')

<!-- Hero Section -->
<section class="relative bg-gradient-to-b from-[#FFFDF9] via-[#FDF8F0] to-[#F7EEDD] pt-12 pb-20 lg:pt-20 lg:pb-32 overflow-hidden">
    <!-- Decorative background elements -->
    <div class="absolute top-1/4 left-0 w-96 h-96 bg-[#F3E2CF] rounded-full blur-3xl opacity-50 -z-10"></div>
    <div class="absolute bottom-10 right-0 w-80 h-80 bg-[#E8D5C4] rounded-full blur-3xl opacity-40 -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-12 items-center">

            <!-- Hero Text Content -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#F3E5D8] border border-[#E8D0B5] text-[#8B5E3C] text-xs sm:text-sm font-semibold shadow-sm">
                    <span class="animate-pulse text-lg">🌾</span>
                    <span>Terfavorit di Lombok Sejak 2018</span>
                </div>

                <h1 class="font-serif-heading text-4xl sm:text-5xl lg:text-6xl font-extrabold text-[#4A2E1B] leading-tight tracking-tight">
                    Kehangatan <span class="text-[#D9822B] italic">Roti Fresh</span> Dari Oven Setiap Pagi
                </h1>

                <p class="text-[#6E5544] text-base sm:text-lg lg:text-xl max-w-2xl leading-relaxed mx-auto lg:mx-0 font-normal">
                    MalikaBakery menyajikan kelembutan roti artisan, croissant berlapis renyah, dan kue lembut yang dibuat dengan bahan alami premium tanpa pengawet sintesis.
                </p>

                <!-- Hero Action Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-4">
                    <a href="{{ route('produk') }}"
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-[#8B5E3C] hover:bg-[#6F4A2F] text-white px-8 py-4 rounded-full font-bold text-base shadow-lg shadow-[#8B5E3C]/30 hover:shadow-xl transition-all transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        Lihat Katalog Menu
                    </a>
                    
                    <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20mau%20order" target="_blank"
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white hover:bg-[#FAF3E0] text-[#8B5E3C] border-2 border-[#8B5E3C] px-8 py-4 rounded-full font-bold text-base shadow-sm hover:shadow transition-all">
                        <svg class="w-5 h-5 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        Pesan via WhatsApp
                    </a>
                </div>

                <!-- Small Features Counter Badge -->
                <div class="pt-6 grid grid-cols-2 gap-4 border-t border-[#EBDCCB]/80 max-w-lg mx-auto lg:mx-0">
                    <div>
                        <p class="font-serif-heading text-2xl font-bold text-[#4A2E1B]">100%</p>
                        <p class="text-xs text-[#8B5E3C] font-medium">Bahan Premium Alami</p>
                    </div>
                    <div>
                        <p class="font-serif-heading text-2xl font-bold text-[#4A2E1B]">10K+</p>
                        <p class="text-xs text-[#8B5E3C] font-medium">Pelanggan Puas</p>
                    </div>
                </div>

            </div>

            <!-- Hero Image Visual Collage -->
            <div class="lg:col-span-5 relative">
                <div class="relative mx-auto max-w-md lg:max-w-none">
                    
                    <!-- Main Hero Image Card -->
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                        <img src="{{ asset('images/Roti Paperoni Smoke Beef.jpeg') }}"
                             alt="Roti Segar MalikaBakery"
                             class="w-full h-[420px] sm:h-[480px] object-cover hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A0E]/70 via-transparent to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6 text-white">
                            <span class="inline-block px-3 py-1 bg-[#D9822B] text-xs font-bold uppercase tracking-wider rounded-md mb-2">Fresh Baked Today</span>
                            <h3 class="font-serif-heading text-xl font-bold">Roti & Pastry Fresh</h3>
                            <p class="text-xs text-[#F3E5D8] opacity-90">Dipanggang hangat pukul 07.00 WIB setiap hari</p>
                        </div>
                    </div>

                    <!-- Floating Badge Card 1 -->
                    <div class="absolute -top-6 -left-6 bg-white p-4 rounded-2xl shadow-xl border border-[#F0E6D8] hidden sm:flex items-center gap-3 animate-bounce-slow">
                        <div class="w-12 h-12 rounded-xl bg-[#FFF3E0] flex items-center justify-center text-2xl">🍞</div>
                        <div>
                            <p class="text-xs text-[#8B5E3C] font-semibold">100% Fresh Oven</p>
                            <p class="font-bold text-sm text-[#4A2E1B]">Lembut & Waffle Rich</p>
                        </div>
                    </div>



                </div>
            </div>

        </div>
    </div>
</section>

<!-- Section Features / Keunggulan -->
<section class="py-16 bg-white border-y border-[#F0E6D8]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-12">
            <h2 class="font-serif-heading text-3xl sm:text-4xl font-bold text-[#4A2E1B]">
                Mengapa Memilih <span class="text-[#D9822B]">MalikaBakery?</span>
            </h2>
            <p class="text-[#6E5544] mt-2 text-base">
                Komitmen kami menghadirkan cita rasa terbaik dalam setiap gigitan roti dan kue.
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <!-- Feature Item 1 -->
            <div class="bg-[#FFFDF9] p-8 rounded-2xl border border-[#F0E6D8] shadow-sm hover:shadow-md hover:border-[#D9822B] transition-all text-center group">
                <div class="w-16 h-16 rounded-2xl bg-[#FFF5EB] text-[#D9822B] flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <h3 class="font-serif-heading text-xl font-bold text-[#4A2E1B] mb-2">Dipanggang Harian</h3>
                <p class="text-sm text-[#7A5C45] leading-relaxed">
                    Setiap varian roti dipanggang segar di pagi hari agar selalu terasa lembut dan renyah.
                </p>
            </div>

            <!-- Feature Item 2 -->
            <div class="bg-[#FFFDF9] p-8 rounded-2xl border border-[#F0E6D8] shadow-sm hover:shadow-md hover:border-[#D9822B] transition-all text-center group">
                <div class="w-16 h-16 rounded-2xl bg-[#FFF5EB] text-[#D9822B] flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <h3 class="font-serif-heading text-xl font-bold text-[#4A2E1B] mb-2">100% Halal & Alami</h3>
                <p class="text-sm text-[#7A5C45] leading-relaxed">
                    Menggunakan tepung terigu pilihan, butter impor, dan tanpa pengawet sintetis.
                </p>
            </div>

            <!-- Feature Item 3 -->
            <div class="bg-[#FFFDF9] p-8 rounded-2xl border border-[#F0E6D8] shadow-sm hover:shadow-md hover:border-[#D9822B] transition-all text-center group">
                <div class="w-16 h-16 rounded-2xl bg-[#FFF5EB] text-[#D9822B] flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                </div>
                <h3 class="font-serif-heading text-xl font-bold text-[#4A2E1B] mb-2">Resep Otentik</h3>
                <p class="text-sm text-[#7A5C45] leading-relaxed">
                    Perpaduan sempurna resep keluarga tradisional dan teknik pastry modern.
                </p>
            </div>

            <!-- Feature Item 4 -->
            <div class="bg-[#FFFDF9] p-8 rounded-2xl border border-[#F0E6D8] shadow-sm hover:shadow-md hover:border-[#D9822B] transition-all text-center group">
                <div class="w-16 h-16 rounded-2xl bg-[#FFF5EB] text-[#D9822B] flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h3 class="font-serif-heading text-xl font-bold text-[#4A2E1B] mb-2">Layanan Pengiriman</h3>
                <p class="text-sm text-[#7A5C45] leading-relaxed">
                    Pengiriman cepat area Lombok agar roti tiba hangat dan siap dinikmati.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- Section Categories Showcase -->
<section class="py-20 bg-[#FAF3E0]/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div>
                <span class="text-xs font-bold text-[#D9822B] uppercase tracking-widest">Kategori Pilihan</span>
                <h2 class="font-serif-heading text-3xl sm:text-4xl font-bold text-[#4A2E1B] mt-1">
                    Varian Produk MalikaBakery
                </h2>
            </div>
            <a href="{{ route('produk') }}" class="inline-flex items-center gap-1.5 text-[#8B5E3C] font-semibold hover:text-[#D9822B] transition-colors mt-4 md:mt-0">
                Lihat Semua Menu →
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Category Card 1 -->
            <a href="{{ route('produk') }}" class="group relative rounded-2xl overflow-hidden shadow-md h-72 border border-[#E8D5C4]">
                <img src="{{ asset('images/Roti Almond.jpeg') }}" alt="Roti Almond" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A0E]/90 via-[#2C1A0E]/30 to-transparent"></div>
                <div class="absolute bottom-6 left-6 right-6 text-white">
                    <span class="text-xs text-[#D9822B] font-semibold uppercase tracking-wider">Top Varian</span>
                    <h3 class="font-serif-heading text-2xl font-bold mt-1">Roti Almond Slice</h3>
                    <p class="text-xs text-[#F0D5BE] mt-1">Renyah, manis, dengan irisan almond renyah</p>
                </div>
            </a>

            <!-- Category Card 2 -->
            <a href="{{ route('produk') }}" class="group relative rounded-2xl overflow-hidden shadow-md h-72 border border-[#E8D5C4]">
                <img src="{{ asset('images/Roti Coklat Keju.jpeg') }}" alt="Roti Cokelat Keju" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A0E]/90 via-[#2C1A0E]/30 to-transparent"></div>
                <div class="absolute bottom-6 left-6 right-6 text-white">
                    <span class="text-xs text-[#D9822B] font-semibold uppercase tracking-wider">Favorit Keluarga</span>
                    <h3 class="font-serif-heading text-2xl font-bold mt-1">Roti Manis</h3>
                    <p class="text-xs text-[#F0D5BE] mt-1">Cokelat lumer, keju gurih, pisang, & zebra</p>
                </div>
            </a>

            <!-- Category Card 3 -->
            <a href="{{ route('produk') }}" class="group relative rounded-2xl overflow-hidden shadow-md h-72 border border-[#E8D5C4]">
                <img src="{{ asset('images/Roti Paperoni Smoke Beef.jpeg') }}" alt="Roti Savory" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A0E]/90 via-[#2C1A0E]/30 to-transparent"></div>
                <div class="absolute bottom-6 left-6 right-6 text-white">
                    <span class="text-xs text-[#D9822B] font-semibold uppercase tracking-wider">Gurih & Lezat</span>
                    <h3 class="font-serif-heading text-2xl font-bold mt-1">Roti Savory / Daging</h3>
                    <p class="text-xs text-[#F0D5BE] mt-1">Abon sapi, smoked beef, sosis, & pizza</p>
                </div>
            </a>

            <!-- Category Card 4 -->
            <a href="{{ route('produk') }}" class="group relative rounded-2xl overflow-hidden shadow-md h-72 border border-[#E8D5C4]">
                <img src="{{ asset('images/Roti Sisir.jpeg') }}" alt="Roti Sisir Klasik" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A0E]/90 via-[#2C1A0E]/30 to-transparent"></div>
                <div class="absolute bottom-6 left-6 right-6 text-white">
                    <span class="text-xs text-[#D9822B] font-semibold uppercase tracking-wider">Favorit Sarapan</span>
                    <h3 class="font-serif-heading text-2xl font-bold mt-1">Roti Sisir Butter</h3>
                    <p class="text-xs text-[#F0D5BE] mt-1">Lembut beraroma butter murni tradisional</p>
                </div>
            </a>

        </div>
    </div>
</section>

<!-- Section Produk Terfavorit / Best Seller Grid -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="px-3 py-1 bg-[#FFF3E0] text-[#D9822B] font-bold text-xs uppercase tracking-widest rounded-full">Must Try</span>
            <h2 class="font-serif-heading text-3xl sm:text-4xl font-bold text-[#4A2E1B] mt-2">
                Produk Terfavorit Pelanggan
            </h2>
            <p class="text-[#7A5C45] mt-2 text-base">
                Pilihan roti paling laris yang dipanggang setiap pagi. Jangan sampai kehabisan!
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Item 1 -->
            <div class="bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 flex flex-col group">
                <div class="relative h-60 overflow-hidden bg-[#F8F3EC]">
                    <img src="{{ asset('images/Roti Abon.jpeg') }}" alt="Roti Abon Sapi" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-4 left-4 bg-[#D9822B] text-white text-xs font-bold px-3 py-1 rounded-full shadow">BEST SELLER</span>
                </div>
                <div class="p-6 flex-grow flex flex-col justify-between space-y-4">
                    <div>
                        <div class="flex justify-between items-start">
                            <h3 class="font-serif-heading text-xl font-bold text-[#4A2E1B] group-hover:text-[#D9822B] transition-colors">Roti Abon Sapi</h3>
                            <span class="font-bold text-lg text-[#8B5E3C]">Rp 8.000</span>
                        </div>
                        <p class="text-xs text-[#7A5C45] mt-2 leading-relaxed">
                            Roti lembut bertabur abon sapi pilihan lezat dengan lapisan mayones gurih istimewa.
                        </p>
                    </div>
                    <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20mau%20pesan%20Roti%20Abon%20Sapi" target="_blank"
                       class="w-full inline-flex items-center justify-center gap-2 bg-[#8B5E3C] hover:bg-[#6F4A2F] text-white py-2.5 rounded-xl font-semibold text-sm transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        Pesan Sekarang
                    </a>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 flex flex-col group">
                <div class="relative h-60 overflow-hidden bg-[#F8F3EC]">
                    <img src="{{ asset('images/Roti Coklat Keju.jpeg') }}" alt="Roti Cokelat Keju" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-4 left-4 bg-[#8B5E3C] text-white text-xs font-bold px-3 py-1 rounded-full shadow">BEST SELLER</span>
                </div>
                <div class="p-6 flex-grow flex flex-col justify-between space-y-4">
                    <div>
                        <div class="flex justify-between items-start">
                            <h3 class="font-serif-heading text-xl font-bold text-[#4A2E1B] group-hover:text-[#D9822B] transition-colors">Roti Cokelat Keju</h3>
                            <span class="font-bold text-lg text-[#8B5E3C]">Rp 8.000</span>
                        </div>
                        <p class="text-xs text-[#7A5C45] mt-2 leading-relaxed">
                            Perpaduan favorit klasik isian pasta cokelat manis lumer dan parutan keju cheddar gurih.
                        </p>
                    </div>
                    <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20mau%20pesan%20Roti%20Cokelat%20Keju" target="_blank"
                       class="w-full inline-flex items-center justify-center gap-2 bg-[#8B5E3C] hover:bg-[#6F4A2F] text-white py-2.5 rounded-xl font-semibold text-sm transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        Pesan Sekarang
                    </a>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 flex flex-col group">
                <div class="relative h-60 overflow-hidden bg-[#F8F3EC]">
                    <img src="{{ asset('images/Roti Paperoni Smoke Beef.jpeg') }}" alt="Roti Smoked Beef Pepperoni" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-4 left-4 bg-[#2C1A0E] text-white text-xs font-bold px-3 py-1 rounded-full shadow">PREMIUM CHOICE</span>
                </div>
                <div class="p-6 flex-grow flex flex-col justify-between space-y-4">
                    <div>
                        <div class="flex justify-between items-start">
                            <h3 class="font-serif-heading text-xl font-bold text-[#4A2E1B] group-hover:text-[#D9822B] transition-colors">Smoked Beef Pepperoni</h3>
                            <span class="font-bold text-lg text-[#8B5E3C]">Rp 8.000</span>
                        </div>
                        <p class="text-xs text-[#7A5C45] mt-2 leading-relaxed">
                            Roti gurih spesial bertabur potongan smoked beef, pepperoni, dan keju keemasan panggang.
                        </p>
                    </div>
                    <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20mau%20pesan%20Roti%20Smoked%20Beef%20Pepperoni" target="_blank"
                       class="w-full inline-flex items-center justify-center gap-2 bg-[#8B5E3C] hover:bg-[#6F4A2F] text-white py-2.5 rounded-xl font-semibold text-sm transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        Pesan Sekarang
                    </a>
                </div>
            </div>

        </div>

        <div class="mt-12 text-center">
            <a href="{{ route('produk') }}" class="inline-flex items-center gap-2 bg-[#F3E5D8] hover:bg-[#E8D5C4] text-[#4A2E1B] font-bold px-8 py-3.5 rounded-full transition-colors">
                Lihat Seluruh Varian Menu →
            </a>
        </div>

    </div>
</section>

<!-- Section Testimoni Pelanggan -->
<section class="py-20 bg-[#FFFDF9] border-t border-[#F0E6D8]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-xs font-bold text-[#D9822B] uppercase tracking-widest">Ulasan Jujur</span>
            <h2 class="font-serif-heading text-3xl sm:text-4xl font-bold text-[#4A2E1B] mt-1">
                Kata Pelanggan MalikaBakery
            </h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            
            <!-- Testimonial 1 -->
            <div class="bg-[#FFFDF9] p-8 rounded-2xl border border-[#F0E6D8] shadow-md flex flex-col justify-between space-y-6">
                <div>
                    <div class="flex text-[#D9822B] gap-1 mb-4">
                        ★★★★★
                    </div>
                    <p class="text-sm text-[#5C4033] leading-relaxed italic">
                        "Croissant-nya beneran renyah banget dan wangi butter-nya tercium waktu baru buka bungkus. Favorit keluarga setiap sarapan pagi!"
                    </p>
                </div>
                <div class="flex items-center gap-3 pt-4 border-t border-[#F0E6D8]">
                    <div class="w-10 h-10 rounded-full bg-[#E8D5C4] flex items-center justify-center font-bold text-[#8B5E3C]">
                        DS
                    </div>
                    <div>
                        <h4 class="font-bold text-sm text-[#4A2E1B]">Dian Sastro</h4>
                        <p class="text-xs text-[#8B5E3C]">Pelanggan Setia Malioboro</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-[#FFFDF9] p-8 rounded-2xl border border-[#F0E6D8] shadow-md flex flex-col justify-between space-y-6">
                <div>
                    <div class="flex text-[#D9822B] gap-1 mb-4">
                        ★★★★★
                    </div>
                    <p class="text-sm text-[#5C4033] leading-relaxed italic">
                        "Saya pesan snack box untuk acara kantor 50 box, respon via WA cepat dan semua roti datang kondisi hangat. Sangat direkomendasikan!"
                    </p>
                </div>
                <div class="flex items-center gap-3 pt-4 border-t border-[#F0E6D8]">
                    <div class="w-10 h-10 rounded-full bg-[#E8D5C4] flex items-center justify-center font-bold text-[#8B5E3C]">
                        BP
                    </div>
                    <div>
                        <h4 class="font-bold text-sm text-[#4A2E1B]">Budi Prasetyo</h4>
                        <p class="text-xs text-[#8B5E3C]">Event Coordinator</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-[#FFFDF9] p-8 rounded-2xl border border-[#F0E6D8] shadow-md flex flex-col justify-between space-y-6">
                <div>
                    <div class="flex text-[#D9822B] gap-1 mb-4">
                        ★★★★★
                    </div>
                    <p class="text-sm text-[#5C4033] leading-relaxed italic">
                        "Roti sobek cokelatnya jadi langganan anak-anak. Lembut banget bahkan sampai besok harinya. Bahan alaminya bikin tenang."
                    </p>
                </div>
                <div class="flex items-center gap-3 pt-4 border-t border-[#F0E6D8]">
                    <div class="w-10 h-10 rounded-full bg-[#E8D5C4] flex items-center justify-center font-bold text-[#8B5E3C]">
                        NR
                    </div>
                    <div>
                        <h4 class="font-bold text-sm text-[#4A2E1B]">Nadia Rahma</h4>
                        <p class="text-xs text-[#8B5E3C]">Ibu Rumah Tangga</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Call to Action Banner Section (Pesanan Khusus) -->
<section class="py-16 bg-gradient-to-r from-[#4A2E1B] to-[#6E492F] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <span class="inline-block px-4 py-1.5 rounded-full bg-[#D9822B] text-xs font-bold uppercase tracking-widest">Layanan Catering & Event</span>
        <h2 class="font-serif-heading text-3xl sm:text-4xl lg:text-5xl font-bold max-w-3xl mx-auto leading-tight">
            Butuh Roti & Snackbox Untuk Acara Spesial Anda?
        </h2>
        <p class="text-[#E8D5C4] max-w-2xl mx-auto text-base sm:text-lg">
            Kami melayani pesanan partai besar untuk ulang tahun, rapat kantor, pernikahan, dan syukuran dengan harga khusus.
        </p>
        <div class="pt-4 flex flex-col sm:flex-row justify-center gap-4">
            <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20ingin%20konsultasi%20pesanan%20snackbox/event" target="_blank"
               class="bg-[#D9822B] hover:bg-[#C06F1B] text-white font-bold px-8 py-4 rounded-full shadow-lg transition-all">
                Konsultasi Pesanan Acara (WhatsApp)
            </a>
            <a href="{{ route('kontak') }}"
               class="bg-transparent hover:bg-white/10 text-white border-2 border-white/40 font-bold px-8 py-4 rounded-full transition-all">
                Hubungi Lokasi Toko
            </a>
        </div>
    </div>
</section>

@endsection