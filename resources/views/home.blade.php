@extends('layouts.app')

@section('title', 'Vitamin: Kunci Kesehatan Tubuhmu')

@section('content')
<!-- Hero Section -->
<section class="hero-pattern text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6">
            Vitamin: Kunci Kesehatan Tubuhmu
        </h1>
        <p class="text-xl md:text-2xl mb-8 text-teal-50 max-w-3xl mx-auto">
            Paragraf singkat edukasi tentang pentingnya vitamin untuk kesehatan tubuh
        </p>
        <a href="{{ route('vitamins.index') }}" class="inline-block bg-white text-teal-700 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-teal-50 transition shadow-lg">
            Jelajahi Vitamin
        </a>
    </div>
</section>

<!-- Short Education Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">Apa Itu Vitamin?</h2>
            <div class="prose prose-lg max-w-none text-gray-700">
                <p class="mb-4">
                    Vitamin adalah senyawa organik yang dibutuhkan tubuh dalam jumlah kecil untuk menjalankan berbagai fungsi vital. 
                    Meskipun dibutuhkan dalam jumlah sedikit, peran vitamin sangat penting untuk menjaga kesehatan, pertumbuhan, 
                    dan perkembangan tubuh yang optimal.
                </p>
                <p class="mb-4">
                    Vitamin terbagi menjadi dua kategori utama berdasarkan kelarutannya:
                </p>
                <ul class="list-disc list-inside mb-4 space-y-2">
                    <li><strong>Vitamin Larut Lemak</strong> (A, D, E, K) - Dapat disimpan dalam jaringan lemak tubuh</li>
                    <li><strong>Vitamin Larut Air</strong> (B kompleks, C) - Tidak dapat disimpan lama dan perlu asupan rutin</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Popular Vitamins Section (3x2 Grid) -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800">Vitamin Populer</h2>
            <p class="text-lg text-gray-600">Kenali 6-8 vitamin yang paling penting untuk kesehatan tubuh</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
            @forelse($popularVitamins as $vitamin)
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition p-6 border-t-4 border-teal-600">
                <div class="flex items-start justify-between mb-4">
                    <h3 class="text-2xl font-bold text-teal-700">Vitamin {{ $vitamin->name }}</h3>
                    @if($vitamin->category)
                    <span class="text-xs px-2 py-1 bg-teal-100 text-teal-800 rounded">
                        {{ $vitamin->category->name }}
                    </span>
                    @endif
                </div>
                <p class="text-sm text-gray-500 mb-3">{{ $vitamin->alternative_name }}</p>
                <p class="text-gray-700 mb-4 line-clamp-3">{{ Str::limit($vitamin->description, 120) }}</p>
                <a href="{{ route('vitamins.show', $vitamin->slug) }}" class="inline-block text-teal-700 font-semibold hover:text-teal-900 transition">
                    Lihat Detail →
                </a>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500">Belum ada data vitamin populer.</p>
            </div>
            @endforelse
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('vitamins.index') }}" class="inline-block bg-teal-700 text-white px-8 py-3 rounded-lg font-semibold hover:bg-teal-800 transition">
                Lihat Semua Vitamin
            </a>
        </div>
    </div>
</section>

<!-- Educational Articles Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800">Artikel Terbaru</h2>
            <p class="text-lg text-gray-600">Pelajari lebih dalam tentang vitamin dan nutrisi</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @forelse($articles as $article)
            <article class="bg-gray-50 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition">
                @if($article->featured_image)
                <img src="{{ Storage::url($article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gradient-to-br from-teal-400 to-teal-600"></div>
                @endif
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-3 text-gray-800 line-clamp-2">{{ $article->title }}</h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">{{ $article->excerpt }}</p>
                    <a href="{{ route('articles.show', $article->slug) }}" class="inline-block text-teal-700 font-semibold hover:text-teal-900 transition">
                        Baca Selengkapnya →
                    </a>
                </div>
            </article>
            @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500">Belum ada artikel tersedia.</p>
            </div>
            @endforelse
        </div>

        @if($articles->count() > 0)
        <div class="text-center mt-12">
            <a href="{{ route('articles.index') }}" class="inline-block bg-teal-700 text-white px-8 py-3 rounded-lg font-semibold hover:bg-teal-800 transition">
                Lihat Semua Artikel
            </a>
        </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-teal-700 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">
            Mulai Perjalanan Kesehatanmu
        </h2>
        <p class="text-xl mb-8 text-teal-50 max-w-2xl mx-auto">
            Pelajari lebih lanjut tentang vitamin yang dibutuhkan tubuhmu
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('vitamins.index') }}" class="inline-block bg-white text-teal-700 px-8 py-3 rounded-lg font-semibold hover:bg-teal-50 transition">
                Jelajahi Vitamin
            </a>
            <a href="{{ route('articles.index') }}" class="inline-block border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-teal-800 transition">
                Baca Artikel
            </a>
        </div>
    </div>
</section>
@endsection
