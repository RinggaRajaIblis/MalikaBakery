@extends('layouts.app')

@section('title', 'Tentang Kami - Perjalanan & Cerita MalikaBakery')

@section('content')

<!-- Header Hero Banner -->
<section class="bg-gradient-to-b from-[#FAF3E0] to-[#FFFDF9] py-16 lg:py-24 border-b border-[#F0E6D8]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <span class="px-4 py-1.5 rounded-full bg-[#F3E5D8] text-[#8B5E3C] font-bold text-xs uppercase tracking-widest">Tentang MalikaBakery</span>
        <h1 class="font-serif-heading text-4xl sm:text-5xl lg:text-6xl font-extrabold text-[#4A2E1B]">
            Cerita Kehangatan & Dedikasi Kami
        </h1>
        <p class="text-[#7A5C45] text-base sm:text-lg max-w-2xl mx-auto leading-relaxed">
            Menghadirkan kelezatan roti artisan dan pastry hangat setiap hari dengan bahan alami terbaik sejak 2018.
        </p>
    </div>
</section>

<!-- Story Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            
            <!-- Left Image Collage -->
            <div class="relative">
                <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                    <img src="{{ asset('images/toko1 (2).png') }}"
                         alt="Interior MalikaBakery"
                         class="w-full h-[400px] sm:h-[480px] object-cover">
                </div>
                <div class="absolute -bottom-8 -right-6 bg-[#4A2E1B] text-white p-6 rounded-2xl shadow-xl max-w-xs hidden sm:block border border-[#6E492F]">
                    <p class="font-serif-heading text-xl font-bold text-[#D9822B]">"Roti yang baik adalah roti yang dibuat dengan sabar."</p>
                    <p class="text-xs text-[#E8D5C4] mt-2 font-medium">— Malika, Founder & Head Baker</p>
                </div>
            </div>

            <!-- Right Content Text -->
            <div class="space-y-6">
                <span class="text-xs font-bold text-[#D9822B] uppercase tracking-widest">Kisah Awal Perjalanan</span>
                <h2 class="font-serif-heading text-3xl sm:text-4xl font-bold text-[#4A2E1B] leading-tight">
                    Berawal dari Dapur Rumahan Kecil di Lombok
                </h2>
                <p class="text-[#6E5544] text-base leading-relaxed">
                    MalikaBakery dirintis pada tahun 2018 dari sebuah dapur sederhana. Didorong oleh kecintaan mendalam pada aroma roti fresh dan pastry klasik, kami mulai membuat roti untuk tetangga dan kerabat terdekat.
                </p>
                <p class="text-[#6E5544] text-base leading-relaxed">
                    Berkat respon hangat dan kepercayaan masyarakat Lombok akan rasa yang konsisten dan bahan alami tanpa pengawet, MalikaBakery berkembang menjadi toko roti favorit tempat berkumpul keluarga dan pecinta pastry.
                </p>
                
                <div class="pt-4 grid grid-cols-2 gap-6 border-t border-[#F0E6D8]">
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-xl bg-[#FFF3E0] text-[#D9822B] flex items-center justify-center font-bold text-lg flex-shrink-0">✓</div>
                        <div>
                            <h3 class="font-bold text-[#4A2E1B] text-sm">Resep Otentik</h3>
                            <p class="text-xs text-[#7A5C45]">Formula adonan yang diuji bertahun-tahun.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-xl bg-[#FFF3E0] text-[#D9822B] flex items-center justify-center font-bold text-lg flex-shrink-0">✓</div>
                        <div>
                            <h3 class="font-bold text-[#4A2E1B] text-sm">Tanpa Pengawet</h3>
                            <p class="text-xs text-[#7A5C45]">Aman dikonsumsi seluruh anggota keluarga.</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- Vision & Mission Section -->
<section class="py-20 bg-[#FAF3E0]/60 border-y border-[#F0E6D8]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-bold text-[#D9822B] uppercase tracking-widest">Prinsip Utama</span>
            <h2 class="font-serif-heading text-3xl sm:text-4xl font-bold text-[#4A2E1B] mt-1">
                Visi & Misi MalikaBakery
            </h2>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            
            <!-- Vision Card -->
            <div class="bg-white p-8 sm:p-10 rounded-3xl border border-[#E8D5C4] shadow-md flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="w-14 h-14 rounded-2xl bg-[#8B5E3C] text-white flex items-center justify-center font-serif-heading font-bold text-2xl shadow">
                        V
                    </div>
                    <h3 class="font-serif-heading text-2xl font-bold text-[#4A2E1B]">Visi Kami</h3>
                    <p class="text-[#6E5544] text-base leading-relaxed">
                        Menjadi toko roti artisan terdepan dan paling dicintai di Indonesia yang dikenal karena kualitas bahan premium, inovasi rasa, dan kehangatan pelayanan khas Nusantara.
                    </p>
                </div>
                <div class="mt-6 pt-6 border-t border-[#F0E6D8] text-xs font-semibold text-[#8B5E3C]">
                    Kualitas Terbaik & Kehangatan Setiap Hari
                </div>
            </div>

            <!-- Mission Card -->
            <div class="bg-white p-8 sm:p-10 rounded-3xl border border-[#E8D5C4] shadow-md flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="w-14 h-14 rounded-2xl bg-[#D9822B] text-white flex items-center justify-center font-serif-heading font-bold text-2xl shadow">
                        M
                    </div>
                    <h3 class="font-serif-heading text-2xl font-bold text-[#4A2E1B]">Misi Kami</h3>
                    <ul class="space-y-3 text-[#6E5544] text-sm leading-relaxed">
                        <li class="flex items-start gap-2.5">
                            <span class="text-[#D9822B] font-bold">1.</span> Menyajikan produk roti dan pastry segar yang dipanggang setiap hari dari bahan alami berkualitas tinggi.
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-[#D9822B] font-bold">2.</span> Mempertahankan standar higienis dan kehalalan 100% di seluruh proses produksi.
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-[#D9822B] font-bold">3.</span> Memberikan pengalaman belanja hangat dan bersahabat bagi setiap pelanggan.
                        </li>
                    </ul>
                </div>
                <div class="mt-6 pt-6 border-t border-[#F0E6D8] text-xs font-semibold text-[#D9822B]">
                    Inovasi Berkelanjutan & Higienitas Terjamin
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Values Grid Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-bold text-[#D9822B] uppercase tracking-widest">Komitmen Kami</span>
            <h2 class="font-serif-heading text-3xl sm:text-4xl font-bold text-[#4A2E1B] mt-1">
                4 Pilar Kualitas MalikaBakery
            </h2>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <div class="p-6 bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] text-center space-y-3 shadow-sm">
                <div class="text-4xl">🍞</div>
                <h3 class="font-serif-heading text-xl font-bold text-[#4A2E1B]">Fresh Off Oven</h3>
                <p class="text-xs text-[#7A5C45] leading-relaxed">Roti dipanggang mulai jam 05.30 WIB agar saat toko buka adonan masih hangat.</p>
            </div>

            <div class="p-6 bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] text-center space-y-3 shadow-sm">
                <div class="text-4xl">🧈</div>
                <h3 class="font-serif-heading text-xl font-bold text-[#4A2E1B]">Pure Real Butter</h3>
                <p class="text-xs text-[#7A5C45] leading-relaxed">Memakai mentega murni tanpa campuran minyak nabati berlebih untuk kelembutan ekstra.</p>
            </div>

            <div class="p-6 bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] text-center space-y-3 shadow-sm">
                <div class="text-4xl">🌱</div>
                <h3 class="font-serif-heading text-xl font-bold text-[#4A2E1B]">Zero Preservative</h3>
                <p class="text-xs text-[#7A5C45] leading-relaxed">Bebas pengawet sintetis dan pelembut buatan, aman untuk anak-anak hingga lansia.</p>
            </div>

            <div class="p-6 bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] text-center space-y-3 shadow-sm">
                <div class="text-4xl">❤️</div>
                <h3 class="font-serif-heading text-xl font-bold text-[#4A2E1B]">Handcrafted</h3>
                <p class="text-xs text-[#7A5C45] leading-relaxed">Dibentuk dengan ketelitian tangan para pemanggang berpengalaman.</p>
            </div>

        </div>
    </div>
</section>

<!-- Meet Baker Team Section -->
<section class="py-20 bg-[#FFFDF9] border-t border-[#F0E6D8]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-bold text-[#D9822B] uppercase tracking-widest">Orang di Balik Dapur</span>
            <h2 class="font-serif-heading text-3xl sm:text-4xl font-bold text-[#4A2E1B] mt-1">
                Tim Pemanggang Berdedikasi
            </h2>
            <p class="text-[#7A5C45] mt-2 text-base">
                Para ahli yang menuangkan passion dan pengalaman dalam setiap lembar adonan.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            
            <!-- Baker 1 -->
            <div class="bg-white rounded-2xl overflow-hidden border border-[#E8D5C4] shadow-md text-center group">
                <div class="h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1577219491135-ce391730fb2c?auto=format&fit=crop&w=600&q=80" alt="Master Baker Malika" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-6 space-y-2">
                    <h3 class="font-serif-heading text-xl font-bold text-[#4A2E1B]">Malika Kirana</h3>
                    <p class="text-xs text-[#D9822B] font-bold uppercase tracking-wider">Founder & Head Baker</p>
                    <p class="text-xs text-[#7A5C45] pt-2 leading-relaxed">10+ tahun pengalaman di bidang pastry & artisan sourdough fermentation.</p>
                </div>
            </div>

            <!-- Baker 2 -->
            <div class="bg-white rounded-2xl overflow-hidden border border-[#E8D5C4] shadow-md text-center group">
                <div class="h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=600&q=80" alt="Pastry Specialist Hendra" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-6 space-y-2">
                    <h3 class="font-serif-heading text-xl font-bold text-[#4A2E1B]">Hendra Wijaya</h3>
                    <p class="text-xs text-[#D9822B] font-bold uppercase tracking-wider">Pastry Specialist</p>
                    <p class="text-xs text-[#7A5C45] pt-2 leading-relaxed">Ahli dalam pembuatan roti manis & gurih lembut bermutu tinggi.</p>
                </div>
            </div>

            <!-- Baker 3 -->
            <div class="bg-white rounded-2xl overflow-hidden border border-[#E8D5C4] shadow-md text-center group">
                <div class="h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1607631568010-a87245c0daf8?auto=format&fit=crop&w=600&q=80" alt="Cake Decorator Siti" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-6 space-y-2">
                    <h3 class="font-serif-heading text-xl font-bold text-[#4A2E1B]">Siti Aminah</h3>
                    <p class="text-xs text-[#D9822B] font-bold uppercase tracking-wider">Cake Decorator</p>
                    <p class="text-xs text-[#7A5C45] pt-2 leading-relaxed">Spesialis kreasi kue ulang tahun dan dekorasi tart estetis penuh detail.</p>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection