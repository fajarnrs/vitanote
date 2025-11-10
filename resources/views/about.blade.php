@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-teal-700 to-teal-600 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Tentang Kami</h1>
        <p class="text-xl text-teal-50">Tujuan situs & ruang lingkup proyek</p>
    </div>
</section>

<!-- Main Content -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Project Goals -->
            <div class="bg-white rounded-lg shadow-md p-8 mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">{{ setting('about_title', 'Tujuan Situs') }}</h2>
                <div class="prose prose-lg max-w-none text-gray-700">
                    {!! nl2br(e(setting('about_content', 'VitaminInfo adalah portal edukasi yang didedikasikan untuk memberikan informasi lengkap tentang vitamin.'))) !!}
                </div>
            </div>

            <!-- Team -->
            <div class="bg-white rounded-lg shadow-md p-8 mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Tim Kami</h2>

                @php
                    // Prefer the new JSON-based team_members
                    $members = setting('team_members', []);
                    if (!is_array($members) || empty($members)) {
                        // Fallback to legacy 2-member settings if JSON empty/not set
                        $fallback = [];
                        $n1 = setting('team_member_1_name');
                        $r1 = setting('team_member_1_role');
                        if (!empty($n1)) { $fallback[] = ['name' => $n1, 'role' => $r1]; }
                        $n2 = setting('team_member_2_name');
                        $r2 = setting('team_member_2_role');
                        if (!empty($n2)) { $fallback[] = ['name' => $n2, 'role' => $r2]; }
                        $members = $fallback;
                    }
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @forelse($members as $m)
                        @php
                            $name = is_array($m) ? ($m['name'] ?? '') : ($m->name ?? '');
                            $role = is_array($m) ? ($m['role'] ?? '') : ($m->role ?? '');
                            $parts = preg_split('/\s+/u', trim($name));
                            $first = $parts[0] ?? '';
                            $second = $parts[1] ?? '';
                            $initials = mb_strtoupper(mb_substr($first, 0, 1) . mb_substr($second ?: $first, 0, 1));
                        @endphp
                        <div class="text-center p-6 bg-gray-50 rounded-lg">
                            <div class="w-24 h-24 bg-teal-700 rounded-full mx-auto mb-4 flex items-center justify-center text-white text-2xl font-bold">
                                {{ $initials }}
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $name }}</h3>
                            @if(!empty($role))
                                <p class="text-gray-600">{{ $role }}</p>
                            @endif
                        </div>
                    @empty
                        <p class="text-gray-600">Belum ada anggota tim yang ditambahkan.</p>
                    @endforelse
                </div>

                @if(setting('institution_name'))
                    <div class="mt-8 text-center">
                        <p class="text-gray-600"><strong>Institusi:</strong> {{ setting('institution_name') }}</p>
                    </div>
                @endif
            </div>

            <!-- Project Scope -->
            <div class="bg-white rounded-lg shadow-md p-8 mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Ruang Lingkup Proyek</h2>
                <div class="prose prose-lg max-w-none text-gray-700">
                    <p class="mb-4">
                        Proyek ini mencakup:
                    </p>
                    <ul class="list-disc list-inside space-y-2">
                        <li>Informasi lengkap tentang vitamin larut lemak (A, D, E, K)</li>
                        <li>Informasi lengkap tentang vitamin larut air (B kompleks, C)</li>
                        <li>Artikel edukasi tentang nutrisi dan kesehatan</li>
                        <li>Fakta menarik dan sejarah penemuan vitamin</li>
                        <li>Panduan kebutuhan vitamin berdasarkan AKG Indonesia</li>
                    </ul>
                </div>
            </div>

            <!-- Disclaimer -->
            <div class="bg-yellow-50 border-l-4 border-yellow-500 rounded-lg p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Disclaimer</h2>
                <p class="text-gray-700">
                    <strong>Penting:</strong> Informasi yang disediakan di situs ini hanya untuk tujuan edukasi 
                    dan tidak dimaksudkan sebagai pengganti konsultasi medis profesional, diagnosis, atau perawatan. 
                    Selalu konsultasikan dengan dokter atau ahli gizi terkait kondisi kesehatan Anda.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
