@extends('layouts.app')

@section('title', $article->title)

@section('content')
<!-- Article Header -->
<article>
    <header class="bg-gradient-to-r from-teal-700 to-teal-600 text-white py-16">
        <div class="container mx-auto px-4 max-w-4xl">
            <nav class="text-sm mb-4">
                <a href="{{ route('home') }}" class="text-teal-100 hover:text-white">Beranda</a>
                <span class="mx-2">/</span>
                <a href="{{ route('articles.index') }}" class="text-teal-100 hover:text-white">Artikel</a>
                <span class="mx-2">/</span>
                <span class="text-white">{{ Str::limit($article->title, 50) }}</span>
            </nav>
            
            <h1 class="text-4xl md:text-5xl font-bold mb-6">{{ $article->title }}</h1>
            
            <div class="flex items-center text-teal-100 space-x-4">
                @if($article->author)
                <span>Oleh {{ $article->author->name }}</span>
                @endif
                <span>•</span>
                <span>{{ $article->published_at->format('d F Y') }}</span>
                <span>•</span>
                <span>{{ $article->views }} views</span>
            </div>
        </div>
    </header>

    <!-- Featured Image -->
    @if($article->featured_image)
    <div class="container mx-auto px-4 max-w-4xl -mt-8">
        <img src="{{ Storage::url($article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-96 object-cover rounded-lg shadow-xl">
    </div>
    @endif

    <!-- Article Content -->
    <section class="py-12">
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="bg-white rounded-lg shadow-md p-8 md:p-12">
                @if($article->excerpt)
                <div class="text-xl text-gray-600 italic mb-8 pb-8 border-b-2 border-gray-200">
                    {{ $article->excerpt }}
                </div>
                @endif

                <div class="prose prose-lg max-w-none">
                    {!! $article->content !!}
                </div>
            </div>
        </div>
    </section>

    <!-- Related Articles -->
    @if($relatedArticles->count() > 0)
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 max-w-4xl">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Artikel Terkait</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedArticles as $related)
                <article class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition">
                    @if($related->featured_image)
                    <img src="{{ Storage::url($related->featured_image) }}" alt="{{ $related->title }}" class="w-full h-40 object-cover">
                    @else
                    <div class="w-full h-40 bg-gradient-to-br from-teal-400 to-teal-600"></div>
                    @endif
                    
                    <div class="p-5">
                        <h3 class="text-lg font-bold mb-2 text-gray-800 line-clamp-2">{{ $related->title }}</h3>
                        <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $related->excerpt }}</p>
                        <a href="{{ route('articles.show', $related->slug) }}" class="text-teal-700 font-semibold text-sm hover:text-teal-900 transition">
                            Baca →
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- References Section -->
    @if($article->references && count($article->references) > 0)
    <section class="py-8 bg-gray-50">
        <div class="container mx-auto px-4 max-w-4xl">
            <h3 class="text-lg font-bold text-gray-800 mb-3">Referensi</h3>
            <ul class="text-sm text-gray-600 space-y-1">
                @foreach($article->references as $reference)
                <li>
                    • {{ $reference['source'] ?? '' }}
                    @if(isset($reference['year']) && $reference['year'])
                        ({{ $reference['year'] }})
                    @endif
                    @if(isset($reference['url']) && $reference['url'])
                        - <a href="{{ $reference['url'] }}" target="_blank" class="text-teal-600 hover:text-teal-800 underline">Link</a>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
    </section>
    @endif

    <!-- Back to Articles -->
    <section class="py-8">
        <div class="container mx-auto px-4 max-w-4xl text-center">
            <a href="{{ route('articles.index') }}" class="inline-block bg-teal-700 text-white px-8 py-3 rounded-lg font-semibold hover:bg-teal-800 transition">
                ← Kembali ke Daftar Artikel
            </a>
        </div>
    </section>
</article>
@endsection
