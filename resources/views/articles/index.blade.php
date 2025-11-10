@extends('layouts.app')

@section('title', 'Artikel Edukasi Vitamin')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-teal-700 to-teal-600 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Artikel Edukasi</h1>
        <p class="text-xl text-teal-50">Pelajari lebih dalam tentang vitamin, nutrisi, dan kesehatan</p>
    </div>
</section>

<!-- Articles Grid -->
<section class="py-12">
    <div class="container mx-auto px-4">
        @if($articles->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($articles as $article)
            <article class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition">
                @if($article->featured_image)
                <img src="{{ Storage::url($article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-56 object-cover">
                @else
                <div class="w-full h-56 bg-gradient-to-br from-teal-400 to-teal-600 flex items-center justify-center">
                    <svg class="w-20 h-20 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                @endif
                
                <div class="p-6">
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <span>{{ $article->published_at->format('d M Y') }}</span>
                        <span class="mx-2">•</span>
                        <span>{{ $article->views }} views</span>
                    </div>
                    
                    <h3 class="text-xl font-bold mb-3 text-gray-800 line-clamp-2">{{ $article->title }}</h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">{{ $article->excerpt }}</p>
                    
                    @if($article->author)
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <span>Oleh {{ $article->author->name }}</span>
                    </div>
                    @endif
                    
                    <a href="{{ route('articles.show', $article->slug) }}" class="inline-block text-teal-700 font-semibold hover:text-teal-900 transition">
                        Baca Selengkapnya →
                    </a>
                </div>
            </article>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $articles->links() }}
        </div>
        @else
        <div class="bg-white rounded-lg p-12 text-center">
            <svg class="w-20 h-20 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <p class="text-gray-500 text-lg">Belum ada artikel tersedia.</p>
        </div>
        @endif
    </div>
</section>
@endsection
