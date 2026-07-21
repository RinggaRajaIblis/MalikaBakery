@extends('layouts.app')

@section('title', 'Kontak & Lokasi Toko - MalikaBakery Lombok')

@section('content')

<!-- Header Banner -->
<section class="bg-gradient-to-b from-[#FAF3E0] to-[#FFFDF9] py-12 lg:py-16 border-b border-[#F0E6D8]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="px-4 py-1.5 rounded-full bg-[#F3E5D8] text-[#8B5E3C] font-bold text-xs uppercase tracking-widest">Layanan Pelanggan</span>
        <h1 class="font-serif-heading text-4xl sm:text-5xl font-extrabold text-[#4A2E1B]">
            Hubungi & Kunjungi Kami
        </h1>
        <p class="text-[#7A5C45] text-base max-w-xl mx-auto">
            Punya pertanyaan seputar produk, ingin pesan snackbox, atau reservasi custom cake? Kami siap melayani Anda.
        </p>
    </div>
</section>

<!-- Contact Info & Interactive Form Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid lg:grid-cols-12 gap-12">
            
            <!-- Left Column: Contact Cards -->
            <div class="lg:col-span-5 space-y-6">
                <div>
                    <span class="text-xs font-bold text-[#D9822B] uppercase tracking-widest">Informasi Toko</span>
                    <h2 class="font-serif-heading text-3xl font-bold text-[#4A2E1B] mt-1">
                        MalikaBakery Lombok
                    </h2>
                    <p class="text-sm text-[#7A5C45] mt-2">
                        Silakan mampir ke outlet utama kami untuk menikmati aroma roti hangat langsung dari oven.
                    </p>
                </div>

                <div class="space-y-4">
                    
                    <!-- Address Card -->
                    <div class="p-5 bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] flex items-start gap-4 shadow-sm">
                        <div class="w-12 h-12 rounded-xl bg-[#FFF3E0] text-[#D9822B] flex items-center justify-center font-bold text-xl flex-shrink-0">📍</div>
                        <div>
                            <h3 class="font-bold text-[#4A2E1B] text-base">Alamat Utama</h3>
                            <p class="text-xs text-[#6E5544] mt-1 leading-relaxed">
                                8°33'57.2"S 116°06'30.3"E, Mataram, Lombok, Nusa Tenggara Barat
                            </p>
                        </div>
                    </div>

                    <!-- WhatsApp Card -->
                    <div class="p-5 bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] flex items-start gap-4 shadow-sm">
                        <div class="w-12 h-12 rounded-xl bg-[#E8F8EF] text-[#25D366] flex items-center justify-center font-bold text-xl flex-shrink-0">💬</div>
                        <div>
                            <h3 class="font-bold text-[#4A2E1B] text-base">WhatsApp & Telepon</h3>
                            <p class="text-xs text-[#6E5544] mt-1">CS Pemesanan: <a href="https://wa.me/6281933177181" target="_blank" class="text-[#8B5E3C] font-semibold hover:underline">+62 819-3317-7181</a></p>
                            <p class="text-xs text-[#6E5544]">Layanan Cepat: 07.00 - 20.00 WIB</p>
                        </div>
                    </div>

                    <!-- Email Card -->
                    <div class="p-5 bg-[#FFFDF9] rounded-2xl border border-[#F0E6D8] flex items-start gap-4 shadow-sm">
                        <div class="w-12 h-12 rounded-xl bg-[#FFF3E0] text-[#D9822B] flex items-center justify-center font-bold text-xl flex-shrink-0">✉️</div>
                        <div>
                            <h3 class="font-bold text-[#4A2E1B] text-base">Email Resmi</h3>
                            <p class="text-xs text-[#6E5544] mt-1">halo@malikabakery.com</p>
                            <p class="text-xs text-[#6E5544]">catering@malikabakery.com</p>
                        </div>
                    </div>

                    <!-- Opening Hours Card -->
                    <div class="p-5 bg-[#4A2E1B] text-white rounded-2xl border border-[#6E492F] shadow-md">
                        <h3 class="font-serif-heading font-bold text-lg text-[#D9822B] mb-2">Jam Buka Toko</h3>
                        <div class="text-xs space-y-1.5 text-[#E8D5C4]">
                            <p class="flex justify-between"><span>Senin - Jumat:</span> <span class="font-bold text-white">07.00 - 21.00 WIB</span></p>
                            <p class="flex justify-between"><span>Sabtu - Minggu:</span> <span class="font-bold text-white">06.30 - 21.30 WIB</span></p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Right Column: Interactive Form -->
            <div class="lg:col-span-7">
                <div class="bg-[#FFFDF9] rounded-3xl p-8 sm:p-10 border border-[#E8D5C4] shadow-lg relative">
                    
                    <div class="mb-8">
                        <span class="text-xs font-bold text-[#D9822B] uppercase tracking-widest">Kirim Pesan</span>
                        <h2 class="font-serif-heading text-2xl sm:text-3xl font-bold text-[#4A2E1B] mt-1">
                            Formulir Kontak
                        </h2>
                        <p class="text-xs text-[#7A5C45] mt-1">
                            Isi formulir di bawah ini untuk pertanyaan umum, saran, atau penawaran kerjasama.
                        </p>
                    </div>

                    <!-- Success Alert Banner (Hidden by default) -->
                    <div id="contact-success-alert" class="hidden mb-6 p-4 rounded-2xl bg-[#E8F8EF] border border-[#A7F3D0] text-[#065F46] text-xs font-semibold flex items-center gap-3">
                        <span class="text-lg">✅</span>
                        <div>
                            <p class="font-bold text-sm">Pesan Berhasil Terkirim!</p>
                            <p class="font-normal mt-0.5">Tim MalikaBakery akan segera merespon pesan Anda lewat email / WhatsApp dalam 1x24 jam.</p>
                        </div>
                    </div>

                    <form id="contact-form" onsubmit="handleContactSubmit(event)" class="space-y-5">
                        
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-bold text-[#4A2E1B] mb-1.5">Nama Lengkap *</label>
                                <input type="text" required placeholder="Contoh: Budi Santoso"
                                       class="w-full px-4 py-3 bg-white border border-[#E8D5C4] rounded-xl text-sm focus:outline-none focus:border-[#8B5E3C] focus:ring-2 focus:ring-[#8B5E3C]/20 text-[#4A2E1B]">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-[#4A2E1B] mb-1.5">Nomor WhatsApp *</label>
                                <input type="tel" required placeholder="Contoh: 08123456789"
                                       class="w-full px-4 py-3 bg-white border border-[#E8D5C4] rounded-xl text-sm focus:outline-none focus:border-[#8B5E3C] focus:ring-2 focus:ring-[#8B5E3C]/20 text-[#4A2E1B]">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-[#4A2E1B] mb-1.5">Alamat Email</label>
                            <input type="email" placeholder="email@contoh.com"
                                   class="w-full px-4 py-3 bg-white border border-[#E8D5C4] rounded-xl text-sm focus:outline-none focus:border-[#8B5E3C] focus:ring-2 focus:ring-[#8B5E3C]/20 text-[#4A2E1B]">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-[#4A2E1B] mb-1.5">Kategori Keperluan</label>
                            <select class="w-full px-4 py-3 bg-white border border-[#E8D5C4] rounded-xl text-sm focus:outline-none focus:border-[#8B5E3C] focus:ring-2 focus:ring-[#8B5E3C]/20 text-[#4A2E1B]">
                                <option>Tanya Produk & Harga</option>
                                <option>Pesanan Snackbox / Acara</option>
                                <option>Custom Cake Ulang Tahun</option>
                                <option>Kritik & Saran</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-[#4A2E1B] mb-1.5">Pesan Anda *</label>
                            <textarea rows="4" required placeholder="Tuliskan detail pertanyaan atau pesanan Anda..."
                                      class="w-full px-4 py-3 bg-white border border-[#E8D5C4] rounded-xl text-sm focus:outline-none focus:border-[#8B5E3C] focus:ring-2 focus:ring-[#8B5E3C]/20 text-[#4A2E1B]"></textarea>
                        </div>

                        <button type="submit"
                                class="w-full bg-[#8B5E3C] hover:bg-[#6F4A2F] text-white py-4 rounded-xl font-bold text-sm shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2">
                            <span>Kirim Pesan Sekarang</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>

                    </form>

                </div>
            </div>

        </div>

    </div>
</section>

<!-- Section Map Visualization & FAQ -->
<section class="py-16 bg-[#FAF3E0]/50 border-t border-[#F0E6D8]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        
        <!-- Location Map Representation -->
        <div class="bg-white rounded-3xl p-6 border border-[#E8D5C4] shadow-md space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="font-serif-heading text-xl font-bold text-[#4A2E1B]">Lokasi Peta MalikaBakery</h3>
                    <p class="text-xs text-[#7A5C45]">Mataram, Lombok, Nusa Tenggara Barat</p>
                </div>
                <a href="https://www.google.com/maps/place/8%C2%B033'57.2%22S+116%C2%B006'30.3%22E/@-8.5658799,116.105828,17z/data=!3m1!4b1!4m4!3m3!8m2!3d-8.5658799!4d116.1084029" target="_blank" class="text-xs font-bold text-[#8B5E3C] hover:underline">Buka di Google Maps →</a>
            </div>
            
            <!-- Map Frame Wrapper -->
            <div class="w-full h-80 rounded-2xl overflow-hidden bg-[#F3E5D8] relative border border-[#E8D5C4]">
                <iframe src="https://maps.google.com/maps?q=-8.5658799,116.1084029&hl=id&z=17&output=embed"
                        class="w-full h-full border-0" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-10">
                <span class="text-xs font-bold text-[#D9822B] uppercase tracking-widest">Pertanyaan Umum</span>
                <h2 class="font-serif-heading text-3xl font-bold text-[#4A2E1B] mt-1">
                    Frequently Asked Questions (FAQ)
                </h2>
            </div>

            <div class="space-y-4">
                
                <!-- FAQ Item 1 -->
                <div class="bg-white p-6 rounded-2xl border border-[#E8D5C4] shadow-sm">
                    <h3 class="font-bold text-[#4A2E1B] text-base flex justify-between items-center cursor-pointer" onclick="this.nextElementSibling.classList.toggle('hidden')">
                        <span>Q: Berapa lama roti MalikaBakery tahan disimpan?</span>
                        <span class="text-[#D9822B]">+</span>
                    </h3>
                    <p class="text-xs text-[#6E5544] mt-3 leading-relaxed border-t border-[#F0E6D8] pt-3">
                        Karena kami tidak menggunakan pengawet buatan, roti manis & savory terbaik dikonsumsi dalam 2-3 hari pada suhu ruangan. Untuk penyimpanan freezer bisa bertahan hingga 2 minggu.
                    </p>
                </div>

                <!-- FAQ Item 2 -->
                <div class="bg-white p-6 rounded-2xl border border-[#E8D5C4] shadow-sm">
                    <h3 class="font-bold text-[#4A2E1B] text-base flex justify-between items-center cursor-pointer" onclick="this.nextElementSibling.classList.toggle('hidden')">
                        <span>Q: Apakah bisa memesan snackbox untuk acara harian?</span>
                        <span class="text-[#D9822B]">+</span>
                    </h3>
                    <p class="text-xs text-[#6E5544] mt-3 leading-relaxed border-t border-[#F0E6D8] pt-3">
                        Sangat bisa! Kami menyediakan varian paket snackbox mulai dari Rp 15.000/box dengan isian 2-3 varian roti manis/pastry + minuman. Pemesanan H-1 disarankan untuk kuantitas di atas 30 box.
                    </p>
                </div>

                <!-- FAQ Item 3 -->
                <div class="bg-white p-6 rounded-2xl border border-[#E8D5C4] shadow-sm">
                    <h3 class="font-bold text-[#4A2E1B] text-base flex justify-between items-center cursor-pointer" onclick="this.nextElementSibling.classList.toggle('hidden')">
                        <span>Q: Berapa lama sebelum acara harus memesan Custom Cake?</span>
                        <span class="text-[#D9822B]">+</span>
                    </h3>
                    <p class="text-xs text-[#6E5544] mt-3 leading-relaxed border-t border-[#F0E6D8] pt-3">
                        Untuk pesanan kue ulang tahun dengan dekorasi khusus (custom cake), mohon melakukan pemesanan minimal H-3 sebelum tanggal acara melalui WhatsApp kami.
                    </p>
                </div>

            </div>
        </div>

    </div>
</section>

<!-- Form Submit Simulation JS -->
<script>
    function handleContactSubmit(e) {
        e.preventDefault();
        const alert = document.getElementById('contact-success-alert');
        alert.classList.remove('hidden');
        document.getElementById('contact-form').reset();
        
        // Scroll smoothly to alert
        alert.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
</script>

@endsection