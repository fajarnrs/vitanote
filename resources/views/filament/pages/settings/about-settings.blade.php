<x-filament-panels::page>
    <div class="max-w-5xl">
        <form wire:submit="save" class="space-y-6">
            <!-- Konten Halaman -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">
                    Konten Halaman
                </h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
                    Informasi yang ditampilkan di halaman "Tentang Kami".
                </p>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Judul Halaman
                        </label>
                        <input 
                            type="text" 
                            wire:model="about_title" 
                            required
                            class="block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:text-white text-sm"
                            placeholder="Tentang VitaNote"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Isi Halaman
                        </label>
                        <textarea 
                            wire:model="about_content" 
                            rows="6"
                            class="block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:text-white text-sm font-mono"
                            placeholder="Tulis konten tentang website Anda di sini..."
                        ></textarea>
                        <p class="mt-1.5 text-xs text-gray-500 dark:text-gray-400">
                            Tekan Enter untuk membuat paragraf baru.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tim Kami -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">
                    Tim Kami
                </h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
                    Tambahkan anggota tim sebanyak yang Anda perlukan.
                </p>

                <div class="space-y-4">
                    @foreach ($team_members as $index => $member)
                        <div class="rounded-lg border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50 p-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama Anggota</label>
                                    <input
                                        type="text"
                                        wire:model="team_members.{{ $index }}.name"
                                        class="block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:text-white text-sm"
                                        placeholder="Nama lengkap"
                                    >
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Peran / Posisi</label>
                                    <input
                                        type="text"
                                        wire:model="team_members.{{ $index }}.role"
                                        class="block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:text-white text-sm"
                                        placeholder="Posisi di tim"
                                    >
                                </div>
                            </div>
                            <div class="mt-3 flex justify-end">
                                <button type="button" wire:click="removeMember({{ $index }})" class="text-sm text-red-600 hover:text-red-700">
                                    Hapus Anggota
                                </button>
                            </div>
                        </div>
                    @endforeach

                    <div>
                        <button type="button" wire:click="addMember" class="inline-flex items-center px-3 py-2 rounded-lg text-sm font-medium bg-primary-50 text-primary-700 hover:bg-primary-100 dark:bg-primary-900/20 dark:text-primary-400">
                            + Tambah Anggota
                        </button>
                    </div>

                    <div class="pt-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama Institusi</label>
                        <input 
                            type="text" 
                            wire:model="institution_name" 
                            class="block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:text-white text-sm"
                            placeholder="Nama universitas / organisasi"
                        >
                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="flex justify-start">
                <button 
                    type="submit"
                    class="inline-flex items-center px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium rounded-lg shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500"
                >
                    Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>
</x-filament-panels::page>
