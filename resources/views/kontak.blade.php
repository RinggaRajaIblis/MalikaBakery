@extends('layouts.app')

@section('title', 'Kontak - MalikaBakery')

@section('content')

<section class="pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-8 grid md:grid-cols-2 gap-12">

        <div>
            <h1 class="text-4xl font-bold text-[#5C4033] mb-6">Hubungi Kami</h1>
            <p class="text-[#7A5C45] mb-6">
                Kunjungi toko kami atau hubungi lewat kontak di bawah ini untuk
                pemesanan dan pertanyaan seputar produk.
            </p>

            <ul class="space-y-3 text-[#5C4033]">
                <li><span class="font-semibold">Alamat:</span> Jl. Contoh No. 123, Yogyakarta</li>
                <li><span class="font-semibold">Telepon:</span> 0812-3456-7890</li>
                <li><span class="font-semibold">Email:</span> info@malikabakery.com</li>
                <li><span class="font-semibold">Jam Buka:</span> Setiap hari, 07.00 - 21.00</li>
            </ul>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-8">
            <h2 class="text-2xl font-semibold text-[#5C4033] mb-6">Kirim Pesan</h2>

            <form class="space-y-4">
                <div>
                    <label class="block text-[#5C4033] mb-1">Nama</label>
                    <input type="text" class="w-full border border-[#E8D5C4] rounded-lg px-4 py-2 focus:outline-none focus:border-[#8B5E3C]" placeholder="Nama Anda">
                </div>
                <div>
                    <label class="block text-[#5C4033] mb-1">Email</label>
                    <input type="email" class="w-full border border-[#E8D5C4] rounded-lg px-4 py-2 focus:outline-none focus:border-[#8B5E3C]" placeholder="email@contoh.com">
                </div>
                <div>
                    <label class="block text-[#5C4033] mb-1">Pesan</label>
                    <textarea rows="4" class="w-full border border-[#E8D5C4] rounded-lg px-4 py-2 focus:outline-none focus:border-[#8B5E3C]" placeholder="Tulis pesan Anda"></textarea>
                </div>
                <button type="button" class="bg-[#8B5E3C] text-white px-6 py-3 rounded-full font-medium hover:bg-[#6f4a2f] transition">
                    Kirim Pesan
                </button>
            </form>
        </div>

    </div>
</section>

@endsection