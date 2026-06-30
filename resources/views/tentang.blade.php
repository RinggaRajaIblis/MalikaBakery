@extends('layouts.app')

@section('title', 'Tentang Kami - MalikaBakery')

@section('content')

<section class="min-h-screen flex items-center pt-24 pb-16">
    <div class="max-w-7xl mx-auto px-8 grid md:grid-cols-2 gap-12 items-center">

        <div class="flex justify-center">
            <img src="https://placehold.co/500x400/F3E5D8/8B5E3C?text=Toko+MalikaBakery"
                 alt="Toko MalikaBakery" class="rounded-3xl shadow-lg">
        </div>

        <div>
            <h1 class="text-4xl font-bold text-[#5C4033] mb-6">Cerita Kami</h1>
            <p class="text-[#7A5C45] mb-4 leading-relaxed">
                MalikaBakery berawal dari dapur rumahan kecil yang dibuat dengan
                cinta untuk keluarga dan tetangga sekitar. Berkat rasa yang
                konsisten dan bahan-bahan pilihan, MalikaBakery perlahan tumbuh
                menjadi toko roti yang dipercaya banyak pelanggan.
            </p>
            <p class="text-[#7A5C45] leading-relaxed">
                Kami percaya bahwa roti yang baik dibuat dengan proses yang
                sabar, bahan segar, dan dipanggang setiap hari — bukan sekadar
                produk massal. Itulah yang membuat MalikaBakery berbeda.
            </p>
        </div>

    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-8">
        <h2 class="text-3xl font-bold text-[#5C4033] text-center mb-12">Nilai Kami</h2>
        <div class="grid md:grid-cols-3 gap-8 text-center">

            <div class="p-6">
                <h3 class="text-xl font-semibold text-[#5C4033] mb-2">Bahan Pilihan</h3>
                <p class="text-[#7A5C45]">Menggunakan bahan baku berkualitas tanpa pengawet berlebihan.</p>
            </div>

            <div class="p-6">
                <h3 class="text-xl font-semibold text-[#5C4033] mb-2">Fresh Setiap Hari</h3>
                <p class="text-[#7A5C45]">Roti dipanggang setiap pagi agar selalu segar saat sampai ke tangan pelanggan.</p>
            </div>

            <div class="p-6">
                <h3 class="text-xl font-semibold text-[#5C4033] mb-2">Pelayanan Ramah</h3>
                <p class="text-[#7A5C45]">Mengutamakan kepuasan dan kenyamanan setiap pelanggan yang datang.</p>
            </div>

        </div>
    </div>
</section>

@endsection