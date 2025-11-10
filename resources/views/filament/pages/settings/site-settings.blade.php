<x-filament-panels::page>
    <!-- Minimal scoped CSS to ensure consistent sizing even if Tailwind utilities are purged/limited in the panel build -->
    <style>
        .ss-nav { width: 100%; }
        @media (min-width: 1024px) { .ss-nav { width: 16rem; } }
        .ss-nav h4 { margin-bottom: 0.5rem; font-size: 0.75rem; font-weight: 600; letter-spacing: .04em; text-transform: uppercase; color: rgb(107 114 128); }
        .ss-nav ul { display: grid; gap: .5rem; }
        .ss-nav button { display: flex; align-items: center; gap: .5rem; width: 100%; text-align: left; padding: .625rem 1rem; border-radius: .5rem; font-size: .875rem; font-weight: 600; background: var(--ss-btn-bg, #f9fafb); color: var(--ss-btn-fg, #374151); }
        .dark .ss-nav button { --ss-btn-bg: #1f2937; --ss-btn-fg: #d1d5db; }
        .ss-nav button:hover { background: #e0f2fe33; }
        .ss-nav button svg { width: 20px; height: 20px; }
        .ss-nav button.active { background: #fef3c7; color: #92400e; outline: 1px solid #fde68a; }
        .dark .ss-nav button.active { background: rgba(146, 64, 14, 0.15); color: #fbbf24; outline-color: #78350f; }
        .logo-preview { max-height: 80px; height: auto; width: auto; }
    </style>
    <div class="flex flex-col lg:flex-row gap-6" x-data="{ current: 'general' }" x-on:tab-select.window="current = $event.detail.tab">
        <!-- Internal Sidebar -->
        <nav class="ss-nav lg:sticky lg:top-24 self-start">
            <h4>Pengaturan</h4>
            <ul>
                <li>
                    <button type="button"
                        x-on:click="$dispatch('tab-select', { tab: 'general' })"
                        :class="current==='general' ? 'active' : ''"
                        class="">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5"/></svg>
                        <span>Umum</span>
                    </button>
                </li>
                <li>
                    <button type="button"
                        x-on:click="$dispatch('tab-select', { tab: 'about' })"
                        :class="current==='about' ? 'active' : ''"
                        class="">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 15.75v-1.5a3 3 0 013-3h4.5a3 3 0 013 3v1.5c0 .638.119 1.249.337 1.806zM15 7.5a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>Tentang Kami</span>
                    </button>
                </li>
                <li>
                    <button type="button"
                        x-on:click="$dispatch('tab-select', { tab: 'contact' })"
                        :class="current==='contact' ? 'active' : ''"
                        class="">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 6.75c0 8.284 6.716 15 15 15h1.5a2.25 2.25 0 002.25-2.25v-1.372a1.125 1.125 0 00-.852-1.09l-3.423-.855a1.125 1.125 0 00-1.173.417l-.97 1.293a.75.75 0 01-1.21.038 12.035 12.035 0 01-3.015-3.015.75.75 0 01.038-1.21l1.293-.97a1.125 1.125 0 00.417-1.173l-.855-3.423a1.125 1.125 0 00-1.09-.852H6.75A2.25 2.25 0 004.5 6.75v0z"/></svg>
                        <span>Kontak</span>
                    </button>
                </li>
                <li>
                    <button type="button"
                        x-on:click="$dispatch('tab-select', { tab: 'footer' })"
                        :class="current==='footer' ? 'active' : ''"
                        class="">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5.25h18M3 9.75h18M3 14.25h18M3 18.75h18"/></svg>
                        <span>Footer</span>
                    </button>
                </li>
            </ul>
        </nav>

        <!-- Content Panels -->
        <div class="flex-1 space-y-6">
            <!-- General -->
            <div x-show="current === 'general'" x-cloak class="space-y-6">
                <form wire:submit="saveGeneral" class="space-y-6">
                    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm p-6">
                        <h3 class="text-lg font-semibold mb-1 text-gray-900 dark:text-white">Identitas Website</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">Digunakan di header dan SEO.</p>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">Nama Website</label>
                                <input type="text" wire:model="site_name" class="w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 text-sm focus:border-primary-500 focus:ring-primary-500" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">Tagline / Slogan</label>
                                <input type="text" wire:model="site_tagline" class="w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 text-sm focus:border-primary-500 focus:ring-primary-500" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">Deskripsi Singkat (SEO)</label>
                                <textarea rows="3" wire:model="site_description" class="w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 text-sm focus:border-primary-500 focus:ring-primary-500" placeholder="Maksimal 160 karakter."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm p-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Branding</h3>
                        <div class="space-y-4">
                            @if($site_logo)
                                <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                                    <img src="{{ Storage::url($site_logo) }}" class="logo-preview" alt="Logo" />
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Logo saat ini</span>
                                </div>
                            @endif
                            <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-6 text-center">
                                <label class="cursor-pointer inline-flex items-center justify-center gap-2">
                                    <span class="text-sm font-medium text-primary-600 dark:text-primary-400">Pilih file logo</span>
                                    <input type="file" wire:model="site_logo" accept="image/*" class="hidden" />
                                </label>
                                <p class="text-xs text-gray-500 mt-2">PNG, JPG, SVG maksimal 2MB</p>
                                <div wire:loading wire:target="site_logo" class="mt-2 text-sm text-primary-600">Mengupload...</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-start">
                        <x-filament::button type="submit">Simpan Umum</x-filament::button>
                    </div>
                </form>
            </div>

            <!-- About -->
            <div x-show="current === 'about'" x-cloak class="space-y-6">
                <form wire:submit="saveAbout" class="space-y-6">
                    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm p-6">
                        <h3 class="text-lg font-semibold mb-1 text-gray-900 dark:text-white">Konten Halaman</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">Informasi untuk halaman Tentang Kami.</p>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">Judul</label>
                                <input type="text" wire:model="about_title" class="w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 text-sm focus:border-primary-500 focus:ring-primary-500" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">Isi</label>
                                <textarea rows="6" wire:model="about_content" class="w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 text-sm focus:border-primary-500 focus:ring-primary-500" placeholder="Tulis deskripsi..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm p-6 space-y-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Anggota Tim</h3>
                        </div>
                        <!-- Mode Switcher -->
                        <div class="flex items-center gap-4 text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Mode Input:</span>
                            <label class="inline-flex items-center gap-1">
                                <input type="radio" value="simple" wire:model="team_input_mode" class="text-primary-600 focus:ring-primary-500" />
                                <span>Sederhana (2 Orang)</span>
                            </label>
                            <label class="inline-flex items-center gap-1">
                                <input type="radio" value="dynamic" wire:model="team_input_mode" class="text-primary-600 focus:ring-primary-500" />
                                <span>Dinamis (Bebas)</span>
                            </label>
                        </div>

                        <!-- Simple Mode -->
                        <div x-data @class([ 'space-y-4' ]) x-show="$wire.team_input_mode === 'simple'">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-medium mb-1 text-gray-600 dark:text-gray-400">Nama Anggota 1</label>
                                    <input type="text" wire:model="team_member_1_name" class="w-full rounded-md border-gray-300 dark:bg-gray-900 dark:border-gray-600 text-sm focus:border-primary-500 focus:ring-primary-500" />
                                </div>
                                <div>
                                    <label class="block text-xs font-medium mb-1 text-gray-600 dark:text-gray-400">Peran / Posisi 1</label>
                                    <input type="text" wire:model="team_member_1_role" class="w-full rounded-md border-gray-300 dark:bg-gray-900 dark:border-gray-600 text-sm focus:border-primary-500 focus:ring-primary-500" />
                                </div>
                                <div>
                                    <label class="block text-xs font-medium mb-1 text-gray-600 dark:text-gray-400">Nama Anggota 2</label>
                                    <input type="text" wire:model="team_member_2_name" class="w-full rounded-md border-gray-300 dark:bg-gray-900 dark:border-gray-600 text-sm focus:border-primary-500 focus:ring-primary-500" />
                                </div>
                                <div>
                                    <label class="block text-xs font-medium mb-1 text-gray-600 dark:text-gray-400">Peran / Posisi 2</label>
                                    <input type="text" wire:model="team_member_2_role" class="w-full rounded-md border-gray-300 dark:bg-gray-900 dark:border-gray-600 text-sm focus:border-primary-500 focus:ring-primary-500" />
                                </div>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Gunakan mode ini jika hanya ingin menampilkan 2 anggota seperti sebelumnya.</p>
                        </div>

                        <!-- Dynamic Mode -->
                        <div x-data x-show="$wire.team_input_mode === 'dynamic'" x-cloak class="space-y-4">
                            <div class="flex justify-end">
                                <button type="button" wire:click="addMember" class="text-sm px-3 py-1.5 rounded-lg bg-primary-50 text-primary-700 hover:bg-primary-100 dark:bg-primary-900/30 dark:text-primary-400">+ Tambah Anggota</button>
                            </div>
                            @if (empty($team_members))
                                <div class="rounded-lg border border-dashed border-gray-300 dark:border-gray-700 p-6 text-center text-sm text-gray-600 dark:text-gray-400">
                                    Belum ada anggota tim. Klik "Tambah Anggota" untuk menambahkan.
                                </div>
                            @else
                                <div class="space-y-4">
                                    @foreach ($team_members as $index => $member)
                                        <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 bg-gray-50 dark:bg-gray-900/40">
                                            <div class="flex items-start gap-3">
                                                <div class="flex flex-col gap-1">
                                                    <button type="button" wire:click="moveMemberUp({{ $index }})" title="Pindah ke atas" class="p-1 rounded hover:bg-gray-200 dark:hover:bg-gray-800">
                                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.5 15.75l7.5-7.5 7.5 7.5"/></svg>
                                                    </button>
                                                    <button type="button" wire:click="moveMemberDown({{ $index }})" title="Pindah ke bawah" class="p-1 rounded hover:bg-gray-200 dark:hover:bg-gray-800">
                                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/></svg>
                                                    </button>
                                                </div>
                                                <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <div>
                                                        <label class="block text-xs font-medium mb-1 text-gray-600 dark:text-gray-400">Nama</label>
                                                        <input type="text" wire:model="team_members.{{ $index }}.name" class="w-full rounded-md border-gray-300 dark:bg-gray-900 dark:border-gray-600 text-sm focus:border-primary-500 focus:ring-primary-500" />
                                                    </div>
                                                    <div>
                                                        <label class="block text-xs font-medium mb-1 text-gray-600 dark:text-gray-400">Peran / Posisi</label>
                                                        <input type="text" wire:model="team_members.{{ $index }}.role" class="w-full rounded-md border-gray-300 dark:bg-gray-900 dark:border-gray-600 text-sm focus:border-primary-500 focus:ring-primary-500" />
                                                    </div>
                                                </div>
                                                <div class="ml-2">
                                                    <button type="button" wire:click="removeMember({{ $index }})" class="px-2 py-1 text-xs rounded bg-red-50 text-red-700 hover:bg-red-100">Hapus</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <p class="text-xs text-gray-500 dark:text-gray-400">Mode dinamis mendukung jumlah anggota tidak terbatas.</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">Nama Institusi</label>
                            <input type="text" wire:model="institution_name" class="w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 text-sm focus:border-primary-500 focus:ring-primary-500" />
                        </div>
                    </div>
                    <div class="flex justify-start">
                        <x-filament::button type="submit">Simpan Tentang Kami</x-filament::button>
                    </div>
                </form>
            </div>

            <!-- Contact -->
            <div x-show="current === 'contact'" x-cloak class="space-y-6">
                <form wire:submit="saveContact" class="space-y-6">
                    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm p-6">
                        <h3 class="text-lg font-semibold mb-1 text-gray-900 dark:text-white">Informasi Kontak</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">Data yang dapat dihubungi pengunjung.</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">Email</label>
                                <input type="email" wire:model="contact_email" class="w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 text-sm focus:border-primary-500 focus:ring-primary-500" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">Telepon / WhatsApp</label>
                                <input type="text" wire:model="contact_phone" class="w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 text-sm focus:border-primary-500 focus:ring-primary-500" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">Instagram</label>
                                <input type="text" wire:model="contact_instagram" placeholder="@username" class="w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 text-sm focus:border-primary-500 focus:ring-primary-500" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">Facebook</label>
                                <input type="text" wire:model="contact_facebook" class="w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 text-sm focus:border-primary-500 focus:ring-primary-500" />
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">Alamat / Institusi</label>
                                <textarea rows="3" wire:model="contact_address" class="w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 text-sm focus:border-primary-500 focus:ring-primary-500"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-start">
                        <x-filament::button type="submit">Simpan Kontak</x-filament::button>
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div x-show="current === 'footer'" x-cloak class="space-y-6">
                <form wire:submit="saveFooter" class="space-y-6">
                    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm p-6">
                        <h3 class="text-lg font-semibold mb-1 text-gray-900 dark:text-white">Footer</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">Konten bagian bawah situs.</p>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">Deskripsi Footer</label>
                                <textarea rows="3" wire:model="footer_description" class="w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 text-sm focus:border-primary-500 focus:ring-primary-500"></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">Disclaimer</label>
                                <input type="text" wire:model="footer_disclaimer" class="w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 text-sm focus:border-primary-500 focus:ring-primary-500" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">Copyright</label>
                                <input type="text" wire:model="footer_copyright" class="w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 text-sm focus:border-primary-500 focus:ring-primary-500" />
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Preview: © {{ date('Y') }} {{ $footer_copyright ?: 'VitaminInfo' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-start">
                        <x-filament::button type="submit">Simpan Footer</x-filament::button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-filament-panels::page>
