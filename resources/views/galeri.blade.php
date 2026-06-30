@extends('layouts.app')

@section('title', 'Galeri - MalikaBakery')

@section('content')

<section class="pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-8">

        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-[#5C4033] mb-4">Galeri</h1>
            <p class="text-[#7A5C45]">Momen dan suasana di MalikaBakery</p>
        </div>

        <div class="grid md:grid-cols-3 gap-4">
            @foreach (range(1, 6) as $i)
                <img src="https://placehold.co/400x300/F3E5D8/8B5E3C?text=Galeri+{{ $i }}"
                     class="rounded-xl shadow-md w-full">
            @endforeach
        </div>

    </div>
</section>

@endsection