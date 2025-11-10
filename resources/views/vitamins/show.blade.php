@extends('layouts.app')

@section('title', 'Vitamin ' . $vitamin->name . ' - ' . ($vitamin->alternative_name ?? ''))

@section('content')
<!-- Breadcrumb & Header -->
<section class="bg-gradient-to-r from-teal-700 to-teal-600 text-white py-12">
    <div class="container mx-auto px-4">
        <nav class="text-sm mb-4">
            <a href="{{ route('home') }}" class="text-teal-100 hover:text-white">Beranda</a>
            <span class="mx-2">/</span>
            <a href="{{ route('vitamins.index') }}" class="text-teal-100 hover:text-white">Vitamin</a>
            @if($vitamin->category)
            <span class="mx-2">/</span>
            <a href="{{ route('vitamins.category', $vitamin->category->slug) }}" class="text-teal-100 hover:text-white">{{ $vitamin->category->name }}</a>
            @endif
            <span class="mx-2">/</span>
            <span class="text-white">Vitamin {{ $vitamin->name }}</span>
        </nav>
        
        <div class="flex items-start justify-between">
            <div>
                <h1 class="text-4xl md:text-5xl font-bold mb-3">Vitamin {{ $vitamin->name }}</h1>
                @if($vitamin->alternative_name)
                <p class="text-xl text-teal-100 mb-2">({{ $vitamin->alternative_name }})</p>
                @endif
                @if($vitamin->category)
                <span class="inline-block px-4 py-2 bg-white/20 rounded-lg text-sm">
                    {{ $vitamin->category->name }}
                </span>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Column -->
            <div class="lg:col-span-2">
                <!-- Description -->
                <div class="bg-white rounded-lg shadow-md p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Ringkasan</h2>
                    <p class="text-gray-700 leading-relaxed text-lg">{{ $vitamin->description }}</p>
                </div>

                <!-- Functions -->
                <div class="bg-white rounded-lg shadow-md p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Fungsi Utama</h2>
                    <div class="prose prose-lg max-w-none text-gray-700">
                        {!! nl2br(e($vitamin->functions)) !!}
                    </div>
                </div>

                <!-- Food Sources -->
                <div class="bg-white rounded-lg shadow-md p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Sumber Makanan</h2>
                    <div class="prose prose-lg max-w-none text-gray-700">
                        {!! nl2br(e($vitamin->food_sources)) !!}
                    </div>
                </div>

                <!-- Deficiency Symptoms -->
                @if($vitamin->deficiency_symptoms)
                <div class="bg-white rounded-lg shadow-md p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Gejala Defisiensi</h2>
                    <div class="prose prose-lg max-w-none text-gray-700">
                        {!! nl2br(e($vitamin->deficiency_symptoms)) !!}
                    </div>
                </div>
                @endif

                <!-- Toxicity Symptoms -->
                @if($vitamin->toxicity_symptoms)
                <div class="bg-white rounded-lg shadow-md p-8 mb-8 border-l-4 border-yellow-500">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Risiko Toksisitas</h2>
                    <div class="prose prose-lg max-w-none text-gray-700">
                        {!! nl2br(e($vitamin->toxicity_symptoms)) !!}
                    </div>
                </div>
                @endif

                <!-- Interesting Facts -->
                @if($vitamin->interesting_facts)
                <div class="bg-gradient-to-br from-teal-50 to-teal-100 rounded-lg shadow-md p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Fakta Menarik</h2>
                    <div class="prose prose-lg max-w-none text-gray-700">
                        {!! nl2br(e($vitamin->interesting_facts)) !!}
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Quick Info Card -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-8 sticky top-24">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Informasi Cepat</h3>
                    
                    @if($vitamin->category)
                    <div class="mb-4 pb-4 border-b">
                        <p class="text-sm font-semibold text-gray-600 mb-1">Jenis</p>
                        <p class="text-gray-800">{{ $vitamin->category->name }}</p>
                    </div>
                    @endif

                    @if($vitamin->daily_need)
                    <div class="mb-4 pb-4 border-b">
                        <p class="text-sm font-semibold text-gray-600 mb-1">AKG (Angka Kecukupan Gizi)</p>
                        <p class="text-gray-800 font-semibold text-lg">{{ $vitamin->daily_need }}</p>
                    </div>
                    @endif

                    @if($vitamin->alternative_name)
                    <div class="mb-4 pb-4 border-b">
                        <p class="text-sm font-semibold text-gray-600 mb-1">Nama Lain</p>
                        <p class="text-gray-800">{{ $vitamin->alternative_name }}</p>
                    </div>
                    @endif

                    <!-- Navigation -->
                    <div class="mt-6">
                        <a href="{{ route('vitamins.index') }}" class="block w-full text-center bg-teal-700 text-white px-4 py-3 rounded-lg font-semibold hover:bg-teal-800 transition">
                            ← Kembali ke Daftar
                        </a>
                    </div>
                </div>

                <!-- Related Vitamins -->
                @if($relatedVitamins->count() > 0)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Vitamin Berikutnya</h3>
                    <div class="space-y-4">
                        @foreach($relatedVitamins as $related)
                        <a href="{{ route('vitamins.show', $related->slug) }}" class="block p-4 bg-gray-50 rounded-lg hover:bg-teal-50 transition">
                            <h4 class="font-bold text-teal-700 mb-1">Vitamin {{ $related->name }}</h4>
                            @if($related->alternative_name)
                            <p class="text-sm text-gray-600">{{ $related->alternative_name }}</p>
                            @endif
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Reference Section -->
@if($vitamin->references && count($vitamin->references) > 0)
<section class="py-8 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h3 class="text-lg font-bold text-gray-800 mb-3">Referensi</h3>
            <ul class="text-sm text-gray-600 space-y-1">
                @foreach($vitamin->references as $reference)
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
    </div>
</section>
@endif
@endsection
