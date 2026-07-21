@extends('layouts.app')

@section('title', 'Katalog Menu & Produk - MalikaBakery')

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-b from-[#FAF3E0] to-[#FFFDF9] py-12 lg:py-16 border-b border-[#F0E6D8]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="px-4 py-1.5 rounded-full bg-[#F3E5D8] text-[#8B5E3C] font-bold text-xs uppercase tracking-widest">Katalog Pilihan</span>
        <h1 class="font-serif-heading text-4xl sm:text-5xl font-extrabold text-[#4A2E1B]">
            Menu Roti & Pizza Fresh
        </h1>
        <p class="text-[#7A5C45] text-base max-w-xl mx-auto">
            Semua roti & pizza dipanggang hangat setiap hari dari bahan-bahan pilihan tanpa pengawet sintetis.
        </p>
    </div>
</section>

<!-- Product Catalog Section -->
<section class="py-12 bg-white min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Filter Bar & Search Container -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-6 pb-10 border-b border-[#F0E6D8]">
            
            <!-- Category Filter Tabs -->
            <div class="flex items-center gap-2 overflow-x-auto w-full md:w-auto pb-2 md:pb-0 scrollbar-none" id="category-filters">
                <button onclick="setCategory('all', this)"
                        class="filter-btn px-5 py-2.5 rounded-full text-sm font-semibold whitespace-nowrap transition-all bg-[#8B5E3C] text-white shadow-md">
                    Semua (17)
                </button>
                <button onclick="setCategory('pizza', this)"
                        class="filter-btn px-5 py-2.5 rounded-full text-sm font-semibold whitespace-nowrap transition-all bg-[#FFF9F2] text-[#5C4033] hover:bg-[#F3E5D8] border border-[#E8D5C4]">
                    🍕 Pizza Special (4)
                </button>
                <button onclick="setCategory('manis', this)"
                        class="filter-btn px-5 py-2.5 rounded-full text-sm font-semibold whitespace-nowrap transition-all bg-[#FFF9F2] text-[#5C4033] hover:bg-[#F3E5D8] border border-[#E8D5C4]">
                    Roti Manis (7)
                </button>
                <button onclick="setCategory('savory', this)"
                        class="filter-btn px-5 py-2.5 rounded-full text-sm font-semibold whitespace-nowrap transition-all bg-[#FFF9F2] text-[#5C4033] hover:bg-[#F3E5D8] border border-[#E8D5C4]">
                    Roti Savory / Gurih (6)
                </button>
            </div>

            <!-- Search Input -->
            <div class="relative w-full md:w-72 flex-shrink-0">
                <input type="text"
                       placeholder="Cari roti atau pizza..."
                       id="search-input"
                       onkeyup="filterProducts()"
                       class="w-full pl-10 pr-4 py-2.5 bg-[#FFFDF9] border border-[#E8D5C4] rounded-full text-sm focus:outline-none focus:border-[#8B5E3C] focus:ring-2 focus:ring-[#8B5E3C]/20 text-[#4A2E1B]">
                <svg class="w-4 h-4 text-[#8B5E3C] absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>

        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 pt-10" id="product-grid">
            
            <!-- Pizza 1: Pizza Daging Mozzarella Extra Sosis Jagung -->
            <div class="product-item bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group"
                 data-category="pizza" data-name="pizza daging mozzarella extra sosis jagung">
                <div class="relative h-56 overflow-hidden bg-[#F8F3EC]">
                    <img src="{{ asset('images/Pizza daging mozzarella extra sosis jagung.jpeg') }}" alt="Pizza Daging Mozzarella Extra Sosis Jagung" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-3 left-3 bg-[#D9822B] text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow">SUPER SPECIAL</span>
                </div>
                <div class="p-5 flex-grow flex flex-col justify-between space-y-3">
                    <div>
                        <h3 class="font-serif-heading text-lg font-bold text-[#4A2E1B] group-hover:text-[#D9822B] transition-colors">Pizza Daging Mozzarella Extra Sosis Jagung</h3>
                        <p class="text-xs text-[#7A5C45] mt-1 line-clamp-2">Topping melimpah daging sapi, sosis panggang, jagung manis, & ekstra keju mozzarella mulur.</p>
                        <span class="inline-block mt-2 text-xs font-extrabold text-[#D9822B] bg-[#FFF3E0] px-3 py-1 rounded-full border border-[#E8D0B5]">Rp 140.000</span>
                    </div>
                    <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20mau%20pesan%20Pizza%20Daging%20Mozzarella%20Extra%20Sosis%20Jagung" target="_blank"
                       class="w-full inline-flex items-center justify-center gap-2 bg-[#8B5E3C] hover:bg-[#6F4A2F] text-white py-2 rounded-xl font-semibold text-xs transition-colors">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        Pesan via WA
                    </a>
                </div>
            </div>

            <!-- Pizza 2: Pizza Daging Mozzarella -->
            <div class="product-item bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group"
                 data-category="pizza" data-name="pizza daging mozzarella">
                <div class="relative h-56 overflow-hidden bg-[#F8F3EC]">
                    <img src="{{ asset('images/Pizza daging mozzarella.jpeg') }}" alt="Pizza Daging Mozzarella" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-3 left-3 bg-[#8B5E3C] text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow">BEST SELLER</span>
                </div>
                <div class="p-5 flex-grow flex flex-col justify-between space-y-3">
                    <div>
                        <h3 class="font-serif-heading text-lg font-bold text-[#4A2E1B] group-hover:text-[#D9822B] transition-colors">Pizza Daging Mozzarella</h3>
                        <p class="text-xs text-[#7A5C45] mt-1 line-clamp-2">Pizza gurih dengan topping daging sapi cincang bumbu spesial & keju mozzarella melted.</p>
                        <span class="inline-block mt-2 text-xs font-extrabold text-[#D9822B] bg-[#FFF3E0] px-3 py-1 rounded-full border border-[#E8D0B5]">Rp 85.000</span>
                    </div>
                    <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20mau%20pesan%20Pizza%20Daging%20Mozzarella" target="_blank"
                       class="w-full inline-flex items-center justify-center gap-2 bg-[#8B5E3C] hover:bg-[#6F4A2F] text-white py-2 rounded-xl font-semibold text-xs transition-colors">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        Pesan via WA
                    </a>
                </div>
            </div>

            <!-- Pizza 3: Pizza Extra Mozzarella -->
            <div class="product-item bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group"
                 data-category="pizza" data-name="pizza extra mozzarella">
                <div class="relative h-56 overflow-hidden bg-[#F8F3EC]">
                    <img src="{{ asset('images/pizza extra mozarella.jpeg') }}" alt="Pizza Extra Mozzarella" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-3 left-3 bg-[#2C1A0E] text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow">CHEESE LOVER</span>
                </div>
                <div class="p-5 flex-grow flex flex-col justify-between space-y-3">
                    <div>
                        <h3 class="font-serif-heading text-lg font-bold text-[#4A2E1B] group-hover:text-[#D9822B] transition-colors">Pizza Extra Mozzarella</h3>
                        <p class="text-xs text-[#7A5C45] mt-1 line-clamp-2">Pizza impian pecinta keju dengan lapisan ekstra keju mozzarella mulur yang tebal & gurih.</p>
                        <span class="inline-block mt-2 text-xs font-extrabold text-[#D9822B] bg-[#FFF3E0] px-3 py-1 rounded-full border border-[#E8D0B5]">Rp 80.000</span>
                    </div>
                    <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20mau%20pesan%20Pizza%20Extra%20Mozzarella" target="_blank"
                       class="w-full inline-flex items-center justify-center gap-2 bg-[#8B5E3C] hover:bg-[#6F4A2F] text-white py-2 rounded-xl font-semibold text-xs transition-colors">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        Pesan via WA
                    </a>
                </div>
            </div>

            <!-- Pizza 4: Pizza Mozzarella Ayam -->
            <div class="product-item bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group"
                 data-category="pizza" data-name="pizza mozzarella ayam">
                <div class="relative h-56 overflow-hidden bg-[#F8F3EC]">
                    <img src="{{ asset('images/pizza mozrella ayam.jpeg') }}" alt="Pizza Mozzarella Ayam" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-3 left-3 bg-[#8B5E3C] text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow">FAVORIT</span>
                </div>
                <div class="p-5 flex-grow flex flex-col justify-between space-y-3">
                    <div>
                        <h3 class="font-serif-heading text-lg font-bold text-[#4A2E1B] group-hover:text-[#D9822B] transition-colors">Pizza Mozzarella Ayam</h3>
                        <p class="text-xs text-[#7A5C45] mt-1 line-clamp-2">Pizza berisikan potongan daging ayam empuk berbumbu dan lelehan keju mozzarella keemasan.</p>
                        <span class="inline-block mt-2 text-xs font-extrabold text-[#D9822B] bg-[#FFF3E0] px-3 py-1 rounded-full border border-[#E8D0B5]">Rp 50.000</span>
                    </div>
                    <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20mau%20pesan%20Pizza%20Mozzarella%20Ayam" target="_blank"
                       class="w-full inline-flex items-center justify-center gap-2 bg-[#8B5E3C] hover:bg-[#6F4A2F] text-white py-2 rounded-xl font-semibold text-xs transition-colors">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        Pesan via WA
                    </a>
                </div>
            </div>

            <!-- Product 1: Roti Abon -->
            <div class="product-item bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group"
                 data-category="savory" data-name="roti abon sapi">
                <div class="relative h-56 overflow-hidden bg-[#F8F3EC]">
                    <img src="{{ asset('images/Roti Abon.jpeg') }}" alt="Roti Abon Sapi" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-3 left-3 bg-[#D9822B] text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow">BEST SELLER</span>
                </div>
                <div class="p-5 flex-grow flex flex-col justify-between space-y-3">
                    <div>
                        <h3 class="font-serif-heading text-lg font-bold text-[#4A2E1B] group-hover:text-[#D9822B] transition-colors">Roti Abon Sapi</h3>
                        <p class="text-xs text-[#7A5C45] mt-1 line-clamp-2">Roti lembut bertabur abon sapi lezat dan sapuan mayones gurih.</p>
                        <span class="inline-block mt-2 text-xs font-semibold text-[#8B5E3C]">Rp 8.000</span>
                    </div>
                    <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20mau%20pesan%20Roti%20Abon%20Sapi" target="_blank"
                       class="w-full inline-flex items-center justify-center gap-2 bg-[#8B5E3C] hover:bg-[#6F4A2F] text-white py-2 rounded-xl font-semibold text-xs transition-colors">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        Pesan via WA
                    </a>
                </div>
            </div>

            <!-- Product 2: Roti Almond -->
            <div class="product-item bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group"
                 data-category="manis" data-name="roti almond slice">
                <div class="relative h-56 overflow-hidden bg-[#F8F3EC]">
                    <img src="{{ asset('images/Roti Almond.jpeg') }}" alt="Roti Almond Slice" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-3 left-3 bg-[#8B5E3C] text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow">FAVORIT</span>
                </div>
                <div class="p-5 flex-grow flex flex-col justify-between space-y-3">
                    <div>
                        <h3 class="font-serif-heading text-lg font-bold text-[#4A2E1B] group-hover:text-[#D9822B] transition-colors">Roti Almond Slice</h3>
                        <p class="text-xs text-[#7A5C45] mt-1 line-clamp-2">Roti manis dengan topping irisan kacang almond renyah dan krim manis.</p>
                        <span class="inline-block mt-2 text-xs font-semibold text-[#8B5E3C]">Rp 10.000</span>
                    </div>
                    <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20mau%20pesan%20Roti%20Almond%20Slice" target="_blank"
                       class="w-full inline-flex items-center justify-center gap-2 bg-[#8B5E3C] hover:bg-[#6F4A2F] text-white py-2 rounded-xl font-semibold text-xs transition-colors">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        Pesan via WA
                    </a>
                </div>
            </div>

            <!-- Product 3: Roti Coklat Keju -->
            <div class="product-item bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group"
                 data-category="manis" data-name="roti cokelat keju">
                <div class="relative h-56 overflow-hidden bg-[#F8F3EC]">
                    <img src="{{ asset('images/Roti Coklat Keju.jpeg') }}" alt="Roti Cokelat Keju" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-3 left-3 bg-[#D9822B] text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow">BEST SELLER</span>
                </div>
                <div class="p-5 flex-grow flex flex-col justify-between space-y-3">
                    <div>
                        <h3 class="font-serif-heading text-lg font-bold text-[#4A2E1B] group-hover:text-[#D9822B] transition-colors">Roti Cokelat Keju</h3>
                        <p class="text-xs text-[#7A5C45] mt-1 line-clamp-2">Perpaduan sempurna cokelat lumer manis dan parutan keju gurih.</p>
                        <span class="inline-block mt-2 text-xs font-semibold text-[#8B5E3C]">Rp 8.000</span>
                    </div>
                    <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20mau%20pesan%20Roti%20Cokelat%20Keju" target="_blank"
                       class="w-full inline-flex items-center justify-center gap-2 bg-[#8B5E3C] hover:bg-[#6F4A2F] text-white py-2 rounded-xl font-semibold text-xs transition-colors">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        Pesan via WA
                    </a>
                </div>
            </div>

            <!-- Product 4: Roti Coklat -->
            <div class="product-item bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group"
                 data-category="manis" data-name="roti cokelat lumer">
                <div class="relative h-56 overflow-hidden bg-[#F8F3EC]">
                    <img src="{{ asset('images/Roti Coklat.jpeg') }}" alt="Roti Cokelat Lumer" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-3 left-3 bg-[#8B5E3C] text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow">FAVORIT ANAK</span>
                </div>
                <div class="p-5 flex-grow flex flex-col justify-between space-y-3">
                    <div>
                        <h3 class="font-serif-heading text-lg font-bold text-[#4A2E1B] group-hover:text-[#D9822B] transition-colors">Roti Cokelat Lumer</h3>
                        <p class="text-xs text-[#7A5C45] mt-1 line-clamp-2">Roti empuk dengan isian pasta cokelat yang manis dan lumer.</p>
                        <span class="inline-block mt-2 text-xs font-semibold text-[#8B5E3C]">Rp 8.000</span>
                    </div>
                    <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20mau%20pesan%20Roti%20Cokelat%20Lumer" target="_blank"
                       class="w-full inline-flex items-center justify-center gap-2 bg-[#8B5E3C] hover:bg-[#6F4A2F] text-white py-2 rounded-xl font-semibold text-xs transition-colors">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        Pesan via WA
                    </a>
                </div>
            </div>

            <!-- Product 5: Roti Daging -->
            <div class="product-item bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group"
                 data-category="savory" data-name="roti daging cincang">
                <div class="relative h-56 overflow-hidden bg-[#F8F3EC]">
                    <img src="{{ asset('images/Roti Daging.jpeg') }}" alt="Roti Daging Cincang" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-3 left-3 bg-[#D9822B] text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow">REKOMENDASI</span>
                </div>
                <div class="p-5 flex-grow flex flex-col justify-between space-y-3">
                    <div>
                        <h3 class="font-serif-heading text-lg font-bold text-[#4A2E1B] group-hover:text-[#D9822B] transition-colors">Roti Daging Cincang</h3>
                        <p class="text-xs text-[#7A5C45] mt-1 line-clamp-2">Roti gurih dengan isian daging sapi cincang bumbu rempah spesial.</p>
                        <span class="inline-block mt-2 text-xs font-semibold text-[#8B5E3C]">Rp 8.000</span>
                    </div>
                    <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20mau%20pesan%20Roti%20Daging%20Cincang" target="_blank"
                       class="w-full inline-flex items-center justify-center gap-2 bg-[#8B5E3C] hover:bg-[#6F4A2F] text-white py-2 rounded-xl font-semibold text-xs transition-colors">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        Pesan via WA
                    </a>
                </div>
            </div>

            <!-- Product 6: Roti Hotdog -->
            <div class="product-item bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group"
                 data-category="savory" data-name="roti hotdog sosis">
                <div class="relative h-56 overflow-hidden bg-[#F8F3EC]">
                    <img src="{{ asset('images/Roti Hotdog.jpeg') }}" alt="Roti Hotdog Sosis" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="p-5 flex-grow flex flex-col justify-between space-y-3">
                    <div>
                        <h3 class="font-serif-heading text-lg font-bold text-[#4A2E1B] group-hover:text-[#D9822B] transition-colors">Roti Hotdog Sosis</h3>
                        <p class="text-xs text-[#7A5C45] mt-1 line-clamp-2">Roti hotdog empuk dengan sosis panggang, mayones, dan saus gurih.</p>
                        <span class="inline-block mt-2 text-xs font-semibold text-[#8B5E3C]">Rp 8.000</span>
                    </div>
                    <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20mau%20pesan%20Roti%20Hotdog%20Sosis" target="_blank"
                       class="w-full inline-flex items-center justify-center gap-2 bg-[#8B5E3C] hover:bg-[#6F4A2F] text-white py-2 rounded-xl font-semibold text-xs transition-colors">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        Pesan via WA
                    </a>
                </div>
            </div>

            <!-- Product 7: Roti Keju -->
            <div class="product-item bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group"
                 data-category="manis" data-name="roti keju spesial">
                <div class="relative h-56 overflow-hidden bg-[#F8F3EC]">
                    <img src="{{ asset('images/Roti Keju.jpeg') }}" alt="Roti Keju Spesial" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-3 left-3 bg-[#D9822B] text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow">BEST SELLER</span>
                </div>
                <div class="p-5 flex-grow flex flex-col justify-between space-y-3">
                    <div>
                        <h3 class="font-serif-heading text-lg font-bold text-[#4A2E1B] group-hover:text-[#D9822B] transition-colors">Roti Keju Spesial</h3>
                        <p class="text-xs text-[#7A5C45] mt-1 line-clamp-2">Roti lembut dipanggang dengan parutan keju cheddar emas yang gurih.</p>
                        <span class="inline-block mt-2 text-xs font-semibold text-[#8B5E3C]">Rp 8.000</span>
                    </div>
                    <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20mau%20pesan%20Roti%20Keju%20Spesial" target="_blank"
                       class="w-full inline-flex items-center justify-center gap-2 bg-[#8B5E3C] hover:bg-[#6F4A2F] text-white py-2 rounded-xl font-semibold text-xs transition-colors">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        Pesan via WA
                    </a>
                </div>
            </div>

            <!-- Product 8: Roti Paperoni Smoke Beef -->
            <div class="product-item bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group"
                 data-category="savory" data-name="roti smoked beef pepperoni">
                <div class="relative h-56 overflow-hidden bg-[#F8F3EC]">
                    <img src="{{ asset('images/Roti Paperoni Smoke Beef.jpeg') }}" alt="Roti Smoked Beef Pepperoni" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-3 left-3 bg-[#2C1A0E] text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow">PREMIUM</span>
                </div>
                <div class="p-5 flex-grow flex flex-col justify-between space-y-3">
                    <div>
                        <h3 class="font-serif-heading text-lg font-bold text-[#4A2E1B] group-hover:text-[#D9822B] transition-colors">Roti Smoked Beef Pepperoni</h3>
                        <p class="text-xs text-[#7A5C45] mt-1 line-clamp-2">Roti savory bertabur smoked beef, pepperoni, dan keju melted.</p>
                        <span class="inline-block mt-2 text-xs font-semibold text-[#8B5E3C]">Rp 8.000</span>
                    </div>
                    <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20mau%20pesan%20Roti%20Smoked%20Beef%20Pepperoni" target="_blank"
                       class="w-full inline-flex items-center justify-center gap-2 bg-[#8B5E3C] hover:bg-[#6F4A2F] text-white py-2 rounded-xl font-semibold text-xs transition-colors">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        Pesan via WA
                    </a>
                </div>
            </div>

            <!-- Product 9: Roti Pisang Coklat Keju -->
            <div class="product-item bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group"
                 data-category="manis" data-name="roti pisang cokelat keju">
                <div class="relative h-56 overflow-hidden bg-[#F8F3EC]">
                    <img src="{{ asset('images/Roti Pisang Coklat Keju.jpeg') }}" alt="Roti Pisang Cokelat Keju" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-3 left-3 bg-[#8B5E3C] text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow">FAVORIT</span>
                </div>
                <div class="p-5 flex-grow flex flex-col justify-between space-y-3">
                    <div>
                        <h3 class="font-serif-heading text-lg font-bold text-[#4A2E1B] group-hover:text-[#D9822B] transition-colors">Roti Pisang Cokelat Keju</h3>
                        <p class="text-xs text-[#7A5C45] mt-1 line-clamp-2">Roti dengan isian pisang raja manis, cokelat, dan keju gurih.</p>
                        <span class="inline-block mt-2 text-xs font-semibold text-[#8B5E3C]">Rp 8.000</span>
                    </div>
                    <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20mau%20pesan%20Roti%20Pisang%20Cokelat%20Keju" target="_blank"
                       class="w-full inline-flex items-center justify-center gap-2 bg-[#8B5E3C] hover:bg-[#6F4A2F] text-white py-2 rounded-xl font-semibold text-xs transition-colors">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        Pesan via WA
                    </a>
                </div>
            </div>

            <!-- Product 10: Roti Pizza -->
            <div class="product-item bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group"
                 data-category="savory" data-name="roti mini pizza">
                <div class="relative h-56 overflow-hidden bg-[#F8F3EC]">
                    <img src="{{ asset('images/Roti Pizza.jpeg') }}" alt="Roti Mini Pizza" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-3 left-3 bg-[#D9822B] text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow">POPULER</span>
                </div>
                <div class="p-5 flex-grow flex flex-col justify-between space-y-3">
                    <div>
                        <h3 class="font-serif-heading text-lg font-bold text-[#4A2E1B] group-hover:text-[#D9822B] transition-colors">Roti Mini Pizza</h3>
                        <p class="text-xs text-[#7A5C45] mt-1 line-clamp-2">Roti ala pizza bertabur sosis, saus bolognese, dan keju panggang.</p>
                        <span class="inline-block mt-2 text-xs font-semibold text-[#8B5E3C]">Rp 8.000</span>
                    </div>
                    <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20mau%20pesan%20Roti%20Mini%20Pizza" target="_blank"
                       class="w-full inline-flex items-center justify-center gap-2 bg-[#8B5E3C] hover:bg-[#6F4A2F] text-white py-2 rounded-xl font-semibold text-xs transition-colors">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        Pesan via WA
                    </a>
                </div>
            </div>

            <!-- Product 11: Roti Sisir -->
            <div class="product-item bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group"
                 data-category="manis" data-name="roti sisir butter klasik">
                <div class="relative h-56 overflow-hidden bg-[#F8F3EC]">
                    <img src="{{ asset('images/Roti Sisir.jpeg') }}" alt="Roti Sisir Butter Klasik" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-3 left-3 bg-[#8B5E3C] text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow">KLASIK</span>
                </div>
                <div class="p-5 flex-grow flex flex-col justify-between space-y-3">
                    <div>
                        <h3 class="font-serif-heading text-lg font-bold text-[#4A2E1B] group-hover:text-[#D9822B] transition-colors">Roti Sisir Butter Klasik</h3>
                        <p class="text-xs text-[#7A5C45] mt-1 line-clamp-2">Roti sisir tradisional sangat lembut dengan harum butter murni.</p>
                        <span class="inline-block mt-2 text-xs font-semibold text-[#8B5E3C]">Rp 10.000</span>
                    </div>
                    <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20mau%20pesan%20Roti%20Sisir%20Butter%20Klasik" target="_blank"
                       class="w-full inline-flex items-center justify-center gap-2 bg-[#8B5E3C] hover:bg-[#6F4A2F] text-white py-2 rounded-xl font-semibold text-xs transition-colors">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        Pesan via WA
                    </a>
                </div>
            </div>

            <!-- Product 12: Roti Sosis -->
            <div class="product-item bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group"
                 data-category="savory" data-name="roti sosis spesial">
                <div class="relative h-56 overflow-hidden bg-[#F8F3EC]">
                    <img src="{{ asset('images/Roti Sosis.jpeg') }}" alt="Roti Sosis Spesial" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-3 left-3 bg-[#8B5E3C] text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow">FAVORIT ANAK</span>
                </div>
                <div class="p-5 flex-grow flex flex-col justify-between space-y-3">
                    <div>
                        <h3 class="font-serif-heading text-lg font-bold text-[#4A2E1B] group-hover:text-[#D9822B] transition-colors">Roti Sosis Spesial</h3>
                        <p class="text-xs text-[#7A5C45] mt-1 line-clamp-2">Roti bernutrisi dengan sosis panggang empuk dan saus keju.</p>
                        <span class="inline-block mt-2 text-xs font-semibold text-[#8B5E3C]">Rp 8.000</span>
                    </div>
                    <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20mau%20pesan%20Roti%20Sosis%20Spesial" target="_blank"
                       class="w-full inline-flex items-center justify-center gap-2 bg-[#8B5E3C] hover:bg-[#6F4A2F] text-white py-2 rounded-xl font-semibold text-xs transition-colors">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        Pesan via WA
                    </a>
                </div>
            </div>

            <!-- Product 13: Roti Zebra -->
            <div class="product-item bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group"
                 data-category="manis" data-name="roti zebra cokelat">
                <div class="relative h-56 overflow-hidden bg-[#F8F3EC]">
                    <img src="{{ asset('images/Roti Zebra.JPEG') }}" alt="Roti Zebra Cokelat" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-3 left-3 bg-[#D9822B] text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow">MANIS</span>
                </div>
                <div class="p-5 flex-grow flex flex-col justify-between space-y-3">
                    <div>
                        <h3 class="font-serif-heading text-lg font-bold text-[#4A2E1B] group-hover:text-[#D9822B] transition-colors">Roti Zebra Cokelat</h3>
                        <p class="text-xs text-[#7A5C45] mt-1 line-clamp-2">Roti manis lembut bermotif zebra dengan perpaduan rasa cokelat & vanila.</p>
                        <span class="inline-block mt-2 text-xs font-semibold text-[#8B5E3C]">Rp 10.000</span>
                    </div>
                    <a href="https://wa.me/6281933177181?text=Halo%20MalikaBakery,%20saya%20mau%20pesan%20Roti%20Zebra%20Cokelat" target="_blank"
                       class="w-full inline-flex items-center justify-center gap-2 bg-[#8B5E3C] hover:bg-[#6F4A2F] text-white py-2 rounded-xl font-semibold text-xs transition-colors">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        Pesan via WA
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Client-side Interactive Filter Script -->
<script>
    let activeCategory = 'all';

    function setCategory(category, btn) {
        activeCategory = category;
        document.querySelectorAll('.filter-btn').forEach(b => {
            b.className = "filter-btn px-5 py-2.5 rounded-full text-sm font-semibold whitespace-nowrap transition-all bg-[#FFF9F2] text-[#5C4033] hover:bg-[#F3E5D8] border border-[#E8D5C4]";
        });
        btn.className = "filter-btn px-5 py-2.5 rounded-full text-sm font-semibold whitespace-nowrap transition-all bg-[#8B5E3C] text-white shadow-md";
        filterProducts();
    }

    function filterProducts() {
        const searchQuery = document.getElementById('search-input').value.toLowerCase();
        const items = document.querySelectorAll('.product-item');

        items.forEach(item => {
            const itemCat = item.getAttribute('data-category');
            const itemName = item.getAttribute('data-name');

            const matchesCategory = (activeCategory === 'all' || itemCat === activeCategory);
            const matchesSearch = itemName.includes(searchQuery);

            if (matchesCategory && matchesSearch) {
                item.style.display = 'flex';
            } else {
                item.style.display = 'none';
            }
        });
    }
</script>

@endsection