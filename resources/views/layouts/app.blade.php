<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', setting('site_name', 'VitaminInfo') . ': ' . setting('site_tagline', 'Kunci Kesehatan Tubuhmu'))</title>
    <meta name="description" content="@yield('description', setting('site_description', 'Portal informasi lengkap tentang vitamin dan nutrisi untuk kesehatan tubuh.'))">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .hero-pattern {
            background-color: #0f766e;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header & Navigation -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    @if(setting('site_logo'))
                        <img src="{{ Storage::url(setting('site_logo')) }}" alt="{{ setting('site_name', 'VitaminInfo') }}" class="h-10">
                    @else
                        <div class="bg-teal-700 text-white px-3 py-2 rounded-lg font-bold text-xl">
                            VIT
                        </div>
                    @endif
                    <span class="text-xl font-semibold text-gray-800">{{ setting('site_name', 'VitaminInfo') }}</span>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-6">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-teal-700 transition {{ request()->routeIs('home') ? 'text-teal-700 font-semibold' : '' }}">Beranda</a>
                    <a href="{{ route('vitamins.index') }}" class="text-gray-700 hover:text-teal-700 transition {{ request()->routeIs('vitamins.*') ? 'text-teal-700 font-semibold' : '' }}">Vitamin</a>
                    <a href="{{ route('articles.index') }}" class="text-gray-700 hover:text-teal-700 transition {{ request()->routeIs('articles.*') ? 'text-teal-700 font-semibold' : '' }}">Artikel</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-teal-700 transition {{ request()->routeIs('about') ? 'text-teal-700 font-semibold' : '' }}">Tentang Kami</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-teal-700 transition {{ request()->routeIs('contact') ? 'text-teal-700 font-semibold' : '' }}">Kontak</a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden mt-4 space-y-2">
                <a href="{{ route('home') }}" class="block py-2 text-gray-700 hover:text-teal-700">Beranda</a>
                <a href="{{ route('vitamins.index') }}" class="block py-2 text-gray-700 hover:text-teal-700">Vitamin</a>
                <a href="{{ route('articles.index') }}" class="block py-2 text-gray-700 hover:text-teal-700">Artikel</a>
                <a href="{{ route('about') }}" class="block py-2 text-gray-700 hover:text-teal-700">Tentang Kami</a>
                <a href="{{ route('contact') }}" class="block py-2 text-gray-700 hover:text-teal-700">Kontak</a>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-16">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">{{ setting('site_name', 'VitaminInfo') }}</h3>
                    <p class="text-gray-300 text-sm">
                        {{ setting('footer_description', 'Portal informasi lengkap tentang vitamin dan nutrisi untuk kesehatan tubuh Anda.') }}
                    </p>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Navigasi</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white">Beranda</a></li>
                        <li><a href="{{ route('vitamins.index') }}" class="text-gray-300 hover:text-white">Daftar Vitamin</a></li>
                        <li><a href="{{ route('articles.index') }}" class="text-gray-300 hover:text-white">Artikel Edukasi</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white">Tentang Kami</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Informasi</h4>
                    <p class="text-gray-300 text-sm mb-2">Email: {{ setting('contact_email', 'vitamininfo@gmail.com') }}</p>
                    <p class="text-gray-300 text-sm mb-2">IG: {{ setting('contact_instagram', '@vitaminkesehatan') }}</p>
                    <p class="text-gray-300 text-sm">{{ setting('institution_name', 'Poltekkes Kemenkes Semarang') }}</p>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-sm text-gray-400">
                <p>&copy; {{ date('Y') }} {{ setting('footer_copyright', 'VitaminInfo') }}. {{ setting('footer_disclaimer', 'Konten edukasi, bukan pengganti konsultasi medis') }}</p>
                @php
                    $team = setting('team_members', []);
                    $names = [];
                    if (is_array($team)) {
                        foreach ($team as $m) {
                            $n = is_array($m) ? ($m['name'] ?? null) : null;
                            if ($n) { $names[] = $n; }
                        }
                    }
                    // Fallback to legacy keys when JSON belum tersedia
                    if (empty($names)) {
                        $legacy1 = setting('team_member_1_name');
                        $legacy2 = setting('team_member_2_name');
                        $names = array_values(array_filter([$legacy1, $legacy2]));
                    }
                @endphp
                @if(!empty($names))
                    <p class="mt-2 text-xs">Tim: {{ implode(', ', $names) }}</p>
                @endif
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
