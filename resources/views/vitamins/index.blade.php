@extends('layouts.app')

@section('title', 'Daftar Vitamin dan Fungsinya')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-teal-700 to-teal-600 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Daftar Vitamin dan Fungsinya</h1>
        <p class="text-xl text-teal-50">Kenali berbagai jenis vitamin berdasarkan kategorinya</p>
    </div>
</section>

<!-- Filter/Search Section -->
<section class="bg-white shadow-sm py-6">
    <div class="container mx-auto px-4">
        <div class="flex flex-col gap-6">
            <div class="flex gap-2 flex-wrap items-center">
                <a href="{{ route('vitamins.index') }}" class="px-4 py-2 rounded-lg font-semibold bg-teal-700 text-white">
                    Semua
                </a>
                @foreach($categories as $cat)
                <a href="{{ route('vitamins.category', $cat->slug) }}" class="px-4 py-2 rounded-lg font-semibold text-gray-700 hover:bg-gray-100 transition">
                    {{ $cat->name }}
                </a>
                @endforeach
            </div>

            <!-- Search by Letter -->
            <div class="bg-teal-50 border border-teal-100 rounded-xl p-4">
                <form method="GET" action="{{ route('vitamins.index') }}" class="flex flex-col gap-3" x-data>
                    <div class="flex items-center gap-3">
                        <h3 class="text-sm font-semibold text-teal-800 whitespace-nowrap">Cari Vitamin</h3>
                        <div class="flex-1 flex gap-2">
                            <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Ketik nama vitamin..." class="w-full rounded-md border border-teal-200 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400" />
                            @if(!empty($q))
                                <a href="{{ route('vitamins.index', array_filter(['letters' => request('letters', [])])) }}" class="px-3 py-2 text-sm rounded-md bg-white text-teal-700 border border-teal-200 hover:bg-teal-100">Reset</a>
                            @endif
                            <button type="submit" class="px-4 py-2 text-sm rounded-md bg-teal-600 text-white hover:bg-teal-700">Cari</button>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        @foreach(($letters ?? range('A','Z')) as $L)
                            @php $checked = (isset($selectedLetters) && $selectedLetters->contains($L)); @endphp
                            <label class="cursor-pointer">
                                <input type="checkbox" name="letters[]" value="{{ $L }}" class="peer sr-only" @checked($checked) onchange="this.form.submit()" />
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-md text-sm font-semibold border peer-checked:bg-teal-600 peer-checked:text-white border-teal-200 text-teal-800 hover:bg-teal-100">{{ $L }}</span>
                            </label>
                        @endforeach
                        @if(request()->has('letters'))
                            <a href="{{ route('vitamins.index', array_filter(['q' => $q ?? ''])) }}" class="ml-2 text-sm text-teal-700 hover:underline">Hapus filter huruf</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@if(isset($vitamins) && $vitamins)
<!-- Alphabetical List when filtered by letters -->
<section class="py-10">
    <div class="container mx-auto px-4">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">
            @if(!empty($q))
                Hasil pencarian untuk: <span class="font-bold text-teal-700">"{{ $q }}"</span>
                @if($selectedLetters->isNotEmpty())
                    <span class="text-gray-600">— difilter huruf: </span><span class="font-bold text-teal-700">{{ implode(', ', $selectedLetters->toArray()) }}</span>
                @endif
            @elseif($selectedLetters->isNotEmpty())
                Vitamin yang diawali huruf: <span class="font-bold text-teal-700">{{ implode(', ', $selectedLetters->toArray()) }}</span>
            @endif
        </h2>

        @if($vitamins->count() > 0)
            <div class="bg-white rounded-lg border border-gray-200 divide-y">
                @foreach($vitamins as $v)
                    <a href="{{ route('vitamins.show', $v->slug) }}" class="block px-4 py-3 hover:bg-teal-50">
                        <span class="font-semibold text-teal-800">Vitamin {{ $v->name }}</span>
                        @if($v->alternative_name)
                            <span class="text-gray-500">— {{ $v->alternative_name }}</span>
                        @endif
                    </a>
                @endforeach
            </div>

            <div class="mt-6">{{ $vitamins->links() }}</div>
        @else
            <div class="bg-gray-50 rounded-lg p-10 text-center text-gray-600">Tidak ada vitamin untuk huruf tersebut.</div>
        @endif
    </div>
</section>
@else
<!-- Default: Vitamins by Category -->
<section class="py-12">
    <div class="container mx-auto px-4">
        @foreach($categories as $category)
        <div class="mb-16">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-3">{{ $category->name }}</h2>
                @if($category->description)
                <p class="text-gray-600 text-lg">{{ $category->description }}</p>
                @endif
            </div>

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
            <div class="bg-gray-50 rounded-lg p-8 text-center">
                <p class="text-gray-500">Belum ada vitamin dalam kategori ini.</p>
            </div>
            @endif
        </div>
        @endforeach
    </div>
</section>
@endif
@endsection
