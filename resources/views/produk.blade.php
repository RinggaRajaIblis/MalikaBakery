@extends('layouts.app')

@section('title', 'Produk - MalikaBakery')

@section('content')

<section class="pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-8">

        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-[#5C4033] mb-4">Produk Kami</h1>
            <p class="text-[#7A5C45]">Pilihan roti dan kue favorit pelanggan MalikaBakery</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach ([
                'Roti Coklat',
                'Roti Keju',
                'Donat Gula',
                'Roti Sosis',
                'Roti Pisang Coklat',
                'Brownies Kukus',
            ] as $produk)
                <div class="bg-white rounded-2xl shadow-md p-6 text-center hover:shadow-xl transition">
                    <img src="https://placehold.co/300x200/F3E5D8/8B5E3C?text={{ urlencode($produk) }}"
                         class="rounded-xl mb-4 w-full">
                    <h3 class="text-xl font-semibold text-[#5C4033]">{{ $produk }}</h3>
                    <p class="text-[#8B5E3C] font-medium mt-2">Rp 12.000</p>
                </div>
            @endforeach
        </div>

    </div>
</section>

@endsection