@extends('layouts.app')

@section('title', 'MalikaBakery - Home')

@section('content')

<!-- Hero Section -->
<section class="min-h-screen flex items-center">
    <div class="max-w-7xl mx-auto px-8 grid md:grid-cols-2 gap-10 items-center">

        <div>
            <h1 class="text-5xl font-bold text-[#5C4033] leading-tight mb-6">
                Roti Segar, <br> Dibuat Setiap Hari
            </h1>
            <p class="text-[#7A5C45] mb-8 text-lg">
                MalikaBakery menghadirkan roti dan kue dengan bahan pilihan,
                dipanggang fresh setiap pagi untuk menemani harimu.
            </p>
            <a href="{{ route('produk') }}"
               class="bg-[#8B5E3C] text-white px-6 py-3 rounded-full font-medium hover:bg-[#6f4a2f] transition">
                Lihat Produk
            </a>
        </div>

        <div class="flex justify-center">
            <img src="https://placehold.co/500x500/F3E5D8/8B5E3C?text=Foto+Roti"
                 alt="Roti MalikaBakery" class="rounded-3xl shadow-lg">
        </div>

    </div>
</section>

<!-- Tentang Singkat -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-8 text-center">
        <h2 class="text-3xl font-bold text-[#5C4033] mb-4">Tentang MalikaBakery</h2>
        <p class="text-[#7A5C45] max-w-2xl mx-auto">
            Berawal dari dapur rumahan, MalikaBakery tumbuh menjadi toko roti
            yang dicintai warga sekitar berkat rasa yang konsisten dan bahan berkualitas.
        </p>
    </div>
</section>

<!-- Produk Unggulan -->
<section class="py-20 bg-[#FAF3E0]">
    <div class="max-w-7xl mx-auto px-8">
        <h2 class="text-3xl font-bold text-[#5C4033] text-center mb-12">Produk Unggulan</h2>
        <div class="grid md:grid-cols-3 gap-8">

            @foreach (['Roti Coklat', 'Roti Keju', 'Donat Gula'] as $produk)
                <div class="bg-white rounded-2xl shadow-md p-6 text-center">
                    <img src="https://placehold.co/300x200/F3E5D8/8B5E3C?text={{ urlencode($produk) }}"
                         class="rounded-xl mb-4 w-full">
                    <h3 class="text-xl font-semibold text-[#5C4033]">{{ $produk }}</h3>
                </div>
            @endforeach

        </div>
    </div>
</section>

@endsection