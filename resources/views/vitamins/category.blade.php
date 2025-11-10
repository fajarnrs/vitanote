@extends('layouts.app')

@section('title', $category->name . ' - Daftar Vitamin')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-teal-700 to-teal-600 text-white py-16">
    <div class="container mx-auto px-4">
        <nav class="text-sm mb-4">
            <a href="{{ route('home') }}" class="text-teal-100 hover:text-white">Beranda</a>
            <span class="mx-2">/</span>
            <a href="{{ route('vitamins.index') }}" class="text-teal-100 hover:text-white">Vitamin</a>
            <span class="mx-2">/</span>
            <span class="text-white">{{ $category->name }}</span>
        </nav>
        <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $category->name }}</h1>
        @if($category->description)
        <p class="text-xl text-teal-50 max-w-3xl">{{ $category->description }}</p>
        @endif
    </div>
</section>

<!-- Vitamins List -->
<section class="py-12">
    <div class="container mx-auto px-4">
        @if($category->vitamins->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($category->vitamins as $vitamin)
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition p-6 border-l-4 border-teal-600">
                <div class="flex items-start justify-between mb-4">
                    <h3 class="text-2xl font-bold text-teal-700">Vitamin {{ $vitamin->name }}</h3>
                </div>
                @if($vitamin->alternative_name)
                <p class="text-sm text-gray-500 mb-3">{{ $vitamin->alternative_name }}</p>
                @endif
                
                <div class="mb-4">
                    <h4 class="font-semibold text-gray-800 mb-2">Fungsi Utama:</h4>
                    <div class="text-gray-700 text-sm line-clamp-3">
                        {!! Str::limit(strip_tags($vitamin->functions), 150) !!}
                    </div>
                </div>

                <div class="mb-4">
                    <h4 class="font-semibold text-gray-800 mb-2">Sumber Makanan:</h4>
                    <div class="text-gray-700 text-sm line-clamp-2">
                        {!! Str::limit(strip_tags($vitamin->food_sources), 100) !!}
                    </div>
                </div>

                @if($vitamin->daily_need)
                <div class="mb-4">
                    <span class="text-sm font-semibold text-gray-800">AKG: </span>
                    <span class="text-sm text-gray-700">{{ $vitamin->daily_need }}</span>
                </div>
                @endif

                <a href="{{ route('vitamins.show', $vitamin->slug) }}" class="inline-block text-teal-700 font-semibold hover:text-teal-900 transition mt-2">
                    Lihat Detail →
                </a>
            </div>
            @endforeach
        </div>
        @else
        <div class="bg-gray-50 rounded-lg p-12 text-center">
            <p class="text-gray-500 text-lg">Belum ada vitamin dalam kategori ini.</p>
        </div>
        @endif
    </div>
</section>
@endsection
