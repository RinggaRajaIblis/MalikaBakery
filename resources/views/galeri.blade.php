@extends('layouts.app')

@section('title', 'Galeri Foto & Suasana Toko - MalikaBakery')

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-b from-[#FAF3E0] to-[#FFFDF9] py-12 lg:py-16 border-b border-[#F0E6D8]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="px-4 py-1.5 rounded-full bg-[#F3E5D8] text-[#8B5E3C] font-bold text-xs uppercase tracking-widest">Dokumentasi Momen</span>
        <h1 class="font-serif-heading text-4xl sm:text-5xl font-extrabold text-[#4A2E1B]">
            Galeri Suasana & Kehangatan Toko
        </h1>
        <p class="text-[#7A5C45] text-base max-w-xl mx-auto">
            Mengintip kehangatan suasana toko, etalase saji roti, dan hasil panggangan pizza & roti fresh MalikaBakery.
        </p>
    </div>
</section>

<!-- Gallery Section -->
<section class="py-12 bg-white min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Gallery Filter Tabs -->
        <div class="flex items-center justify-center gap-2 overflow-x-auto pb-6 mb-8 border-b border-[#F0E6D8]" id="gallery-tabs">
            <button onclick="filterGallery('all', this)" class="gallery-btn px-6 py-2.5 rounded-full text-sm font-semibold transition-all bg-[#8B5E3C] text-white shadow-md">
                Semua Momen (14)
            </button>
            <button onclick="filterGallery('pizza', this)" class="gallery-btn px-6 py-2.5 rounded-full text-sm font-semibold transition-all bg-[#FFF9F2] text-[#5C4033] hover:bg-[#F3E5D8] border border-[#E8D5C4]">
                🍕 Pizza Special (4)
            </button>
            <button onclick="filterGallery('toko', this)" class="gallery-btn px-6 py-2.5 rounded-full text-sm font-semibold transition-all bg-[#FFF9F2] text-[#5C4033] hover:bg-[#F3E5D8] border border-[#E8D5C4]">
                Suasana Toko (3)
            </button>
            <button onclick="filterGallery('baking', this)" class="gallery-btn px-6 py-2.5 rounded-full text-sm font-semibold transition-all bg-[#FFF9F2] text-[#5C4033] hover:bg-[#F3E5D8] border border-[#E8D5C4]">
                Hasil Baking (1)
            </button>
            <button onclick="filterGallery('roti', this)" class="gallery-btn px-6 py-2.5 rounded-full text-sm font-semibold transition-all bg-[#FFF9F2] text-[#5C4033] hover:bg-[#F3E5D8] border border-[#E8D5C4]">
                Varian Roti Fresh (6)
            </button>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- Pizza Photo 1 -->
            <div class="gallery-item group relative rounded-2xl overflow-hidden shadow-md h-80 border border-[#E8D5C4]" data-cat="pizza">
                <img src="{{ asset('images/Pizza daging mozzarella extra sosis jagung.jpeg') }}" alt="Pizza Daging Mozzarella Extra Sosis Jagung" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A0E]/80 via-transparent to-transparent opacity-90 group-hover:opacity-100 transition-opacity"></div>
                <div class="absolute bottom-5 left-5 right-5 text-white">
                    <span class="text-[10px] bg-[#D9822B] px-2.5 py-1 font-bold uppercase rounded-md tracking-wider">Super Special</span>
                    <h3 class="font-serif-heading text-lg font-bold mt-1">Pizza Extra Sosis & Jagung</h3>
                    <p class="text-xs text-[#F0D5BE]">Rp 140.000 — Mozzarella melimpah</p>
                </div>
            </div>

            <!-- Pizza Photo 2 -->
            <div class="gallery-item group relative rounded-2xl overflow-hidden shadow-md h-80 border border-[#E8D5C4]" data-cat="pizza">
                <img src="{{ asset('images/Pizza daging mozzarella.jpeg') }}" alt="Pizza Daging Mozzarella" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A0E]/80 via-transparent to-transparent opacity-90 group-hover:opacity-100 transition-opacity"></div>
                <div class="absolute bottom-5 left-5 right-5 text-white">
                    <span class="text-[10px] bg-[#8B5E3C] px-2.5 py-1 font-bold uppercase rounded-md tracking-wider">Best Seller</span>
                    <h3 class="font-serif-heading text-lg font-bold mt-1">Pizza Daging Mozzarella</h3>
                    <p class="text-xs text-[#F0D5BE]">Rp 85.000 — Daging cincang & keju leleh</p>
                </div>
            </div>

            <!-- Pizza Photo 3 -->
            <div class="gallery-item group relative rounded-2xl overflow-hidden shadow-md h-80 border border-[#E8D5C4]" data-cat="pizza">
                <img src="{{ asset('images/pizza extra mozarella.jpeg') }}" alt="Pizza Extra Mozzarella" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A0E]/80 via-transparent to-transparent opacity-90 group-hover:opacity-100 transition-opacity"></div>
                <div class="absolute bottom-5 left-5 right-5 text-white">
                    <span class="text-[10px] bg-[#2C1A0E] px-2.5 py-1 font-bold uppercase rounded-md tracking-wider">Cheese Lover</span>
                    <h3 class="font-serif-heading text-lg font-bold mt-1">Pizza Extra Mozzarella</h3>
                    <p class="text-xs text-[#F0D5BE]">Rp 80.000 — Keju mulur ekstra tebal</p>
                </div>
            </div>

            <!-- Pizza Photo 4 -->
            <div class="gallery-item group relative rounded-2xl overflow-hidden shadow-md h-80 border border-[#E8D5C4]" data-cat="pizza">
                <img src="{{ asset('images/pizza mozrella ayam.jpeg') }}" alt="Pizza Mozzarella Ayam" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A0E]/80 via-transparent to-transparent opacity-90 group-hover:opacity-100 transition-opacity"></div>
                <div class="absolute bottom-5 left-5 right-5 text-white">
                    <span class="text-[10px] bg-[#8B5E3C] px-2.5 py-1 font-bold uppercase rounded-md tracking-wider">Favorit</span>
                    <h3 class="font-serif-heading text-lg font-bold mt-1">Pizza Mozzarella Ayam</h3>
                    <p class="text-xs text-[#F0D5BE]">Rp 50.000 — Potongan ayam empuk & keju</p>
                </div>
            </div>

            <!-- Store Photo 1 -->
            <div class="gallery-item group relative rounded-2xl overflow-hidden shadow-md h-80 border border-[#E8D5C4]" data-cat="toko">
                <img src="{{ asset('images/toko1 (1).png') }}" alt="Suasana Display Roti Toko" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A0E]/80 via-transparent to-transparent opacity-90 group-hover:opacity-100 transition-opacity"></div>
                <div class="absolute bottom-5 left-5 right-5 text-white">
                    <span class="text-[10px] bg-[#D9822B] px-2.5 py-1 font-bold uppercase rounded-md tracking-wider">Suasana Toko</span>
                    <h3 class="font-serif-heading text-lg font-bold mt-1">Rak Display Roti Kayu</h3>
                    <p class="text-xs text-[#F0D5BE]">Sajian roti fresh berjejer hangat setiap pagi</p>
                </div>
            </div>

            <!-- Store Photo 2 -->
            <div class="gallery-item group relative rounded-2xl overflow-hidden shadow-md h-80 border border-[#E8D5C4]" data-cat="toko">
                <img src="{{ asset('images/toko1 (2).png') }}" alt="Interior Toko MalikaBakery" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A0E]/80 via-transparent to-transparent opacity-90 group-hover:opacity-100 transition-opacity"></div>
                <div class="absolute bottom-5 left-5 right-5 text-white">
                    <span class="text-[10px] bg-[#8B5E3C] px-2.5 py-1 font-bold uppercase rounded-md tracking-wider">Suasana Toko</span>
                    <h3 class="font-serif-heading text-lg font-bold mt-1">Interior Outlet MalikaBakery</h3>
                    <p class="text-xs text-[#F0D5BE]">Sudut toko yang hangat, bersih, dan nyaman</p>
                </div>
            </div>

            <!-- Baking Photo 3 -->
            <div class="gallery-item group relative rounded-2xl overflow-hidden shadow-md h-80 border border-[#E8D5C4]" data-cat="baking">
                <img src="{{ asset('images/toko1 (3).png') }}" alt="Nampan Roti Fresh Panggang" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A0E]/80 via-transparent to-transparent opacity-90 group-hover:opacity-100 transition-opacity"></div>
                <div class="absolute bottom-5 left-5 right-5 text-white">
                    <span class="text-[10px] bg-[#D9822B] px-2.5 py-1 font-bold uppercase rounded-md tracking-wider">Hasil Baking</span>
                    <h3 class="font-serif-heading text-lg font-bold mt-1">Roti Fresh Keluar Dari Oven</h3>
                    <p class="text-xs text-[#F0D5BE]">Varian roti panggang hangat siap dikemas</p>
                </div>
            </div>

            <!-- Store Photo 4 -->
            <div class="gallery-item group relative rounded-2xl overflow-hidden shadow-md h-80 border border-[#E8D5C4]" data-cat="toko">
                <img src="{{ asset('images/toko1 (4).png') }}" alt="Etalase Kaca Sajian Roti" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A0E]/80 via-transparent to-transparent opacity-90 group-hover:opacity-100 transition-opacity"></div>
                <div class="absolute bottom-5 left-5 right-5 text-white">
                    <span class="text-[10px] bg-[#8B5E3C] px-2.5 py-1 font-bold uppercase rounded-md tracking-wider">Suasana Toko</span>
                    <h3 class="font-serif-heading text-lg font-bold mt-1">Etalase Kaca Sajian Roti</h3>
                    <p class="text-xs text-[#F0D5BE]">Berbagai pilihan varian roti & kue fresh</p>
                </div>
            </div>

            <!-- Product Photo 5 -->
            <div class="gallery-item group relative rounded-2xl overflow-hidden shadow-md h-80 border border-[#E8D5C4]" data-cat="roti">
                <img src="{{ asset('images/Roti Abon.jpeg') }}" alt="Roti Abon Sapi Fresh" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A0E]/80 via-transparent to-transparent opacity-90 group-hover:opacity-100 transition-opacity"></div>
                <div class="absolute bottom-5 left-5 right-5 text-white">
                    <span class="text-[10px] bg-[#D9822B] px-2.5 py-1 font-bold uppercase rounded-md tracking-wider">Roti Fresh</span>
                    <h3 class="font-serif-heading text-lg font-bold mt-1">Roti Abon Sapi Melimpah</h3>
                    <p class="text-xs text-[#F0D5BE]">Dipanggang hangat dan siap disajikan</p>
                </div>
            </div>

            <!-- Product Photo 6 -->
            <div class="gallery-item group relative rounded-2xl overflow-hidden shadow-md h-80 border border-[#E8D5C4]" data-cat="roti">
                <img src="{{ asset('images/Roti Almond.jpeg') }}" alt="Roti Almond Slice" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A0E]/80 via-transparent to-transparent opacity-90 group-hover:opacity-100 transition-opacity"></div>
                <div class="absolute bottom-5 left-5 right-5 text-white">
                    <span class="text-[10px] bg-[#8B5E3C] px-2.5 py-1 font-bold uppercase rounded-md tracking-wider">Roti Special</span>
                    <h3 class="font-serif-heading text-lg font-bold mt-1">Roti Almond Renyah</h3>
                    <p class="text-xs text-[#F0D5BE]">Taburan irisan almond panggang harum</p>
                </div>
            </div>

            <!-- Product Photo 7 -->
            <div class="gallery-item group relative rounded-2xl overflow-hidden shadow-md h-80 border border-[#E8D5C4]" data-cat="roti">
                <img src="{{ asset('images/Roti Paperoni Smoke Beef.jpeg') }}" alt="Roti Smoked Beef Pepperoni" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A0E]/80 via-transparent to-transparent opacity-90 group-hover:opacity-100 transition-opacity"></div>
                <div class="absolute bottom-5 left-5 right-5 text-white">
                    <span class="text-[10px] bg-[#D9822B] px-2.5 py-1 font-bold uppercase rounded-md tracking-wider">Roti Savory</span>
                    <h3 class="font-serif-heading text-lg font-bold mt-1">Smoked Beef & Pepperoni</h3>
                    <p class="text-xs text-[#F0D5BE]">Topping smoked beef dan keju melted</p>
                </div>
            </div>

            <!-- Product Photo 8 -->
            <div class="gallery-item group relative rounded-2xl overflow-hidden shadow-md h-80 border border-[#E8D5C4]" data-cat="roti">
                <img src="{{ asset('images/Roti Coklat Keju.jpeg') }}" alt="Roti Cokelat Keju" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A0E]/80 via-transparent to-transparent opacity-90 group-hover:opacity-100 transition-opacity"></div>
                <div class="absolute bottom-5 left-5 right-5 text-white">
                    <span class="text-[10px] bg-[#8B5E3C] px-2.5 py-1 font-bold uppercase rounded-md tracking-wider">Roti Manis</span>
                    <h3 class="font-serif-heading text-lg font-bold mt-1">Roti Cokelat Keju Double</h3>
                    <p class="text-xs text-[#F0D5BE]">Isian lumer dan parutan keju keemasan</p>
                </div>
            </div>

            <!-- Product Photo 9 -->
            <div class="gallery-item group relative rounded-2xl overflow-hidden shadow-md h-80 border border-[#E8D5C4]" data-cat="roti">
                <img src="{{ asset('images/Roti Pizza.jpeg') }}" alt="Roti Mini Pizza" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A0E]/80 via-transparent to-transparent opacity-90 group-hover:opacity-100 transition-opacity"></div>
                <div class="absolute bottom-5 left-5 right-5 text-white">
                    <span class="text-[10px] bg-[#D9822B] px-2.5 py-1 font-bold uppercase rounded-md tracking-wider">Roti Savory</span>
                    <h3 class="font-serif-heading text-[#FFFFFF] font-bold mt-1 text-lg">Roti Mini Pizza Fresh</h3>
                    <p class="text-xs text-[#F0D5BE]">Dengan sosis sapi dan keju panggang</p>
                </div>
            </div>

            <!-- Product Photo 10 -->
            <div class="gallery-item group relative rounded-2xl overflow-hidden shadow-md h-80 border border-[#E8D5C4]" data-cat="roti">
                <img src="{{ asset('images/Roti Zebra.JPEG') }}" alt="Roti Zebra Cokelat" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A0E]/80 via-transparent to-transparent opacity-90 group-hover:opacity-100 transition-opacity"></div>
                <div class="absolute bottom-5 left-5 right-5 text-white">
                    <span class="text-[10px] bg-[#8B5E3C] px-2.5 py-1 font-bold uppercase rounded-md tracking-wider">Roti Manis</span>
                    <h3 class="font-serif-heading text-lg font-bold mt-1">Roti Zebra Motif Soft</h3>
                    <p class="text-xs text-[#F0D5BE]">Perpaduan vanila dan pasta cokelat lembut</p>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Gallery Filter JS -->
<script>
    function filterGallery(category, btn) {
        document.querySelectorAll('.gallery-btn').forEach(b => {
            b.className = "gallery-btn px-6 py-2.5 rounded-full text-sm font-semibold transition-all bg-[#FFF9F2] text-[#5C4033] hover:bg-[#F3E5D8] border border-[#E8D5C4]";
        });
        btn.className = "gallery-btn px-6 py-2.5 rounded-full text-sm font-semibold transition-all bg-[#8B5E3C] text-white shadow-md";

        document.querySelectorAll('.gallery-item').forEach(item => {
            if (category === 'all' || item.getAttribute('data-cat') === category) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }
</script>

@endsection