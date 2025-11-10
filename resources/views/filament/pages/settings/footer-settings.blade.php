<x-filament-panels::page>
    <div class="max-w-5xl">
        <form wire:submit="save" class="space-y-6">
            <!-- Pengaturan Footer -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">
                    Pengaturan Footer
                </h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
                    Konten yang ditampilkan di bagian bawah website.
                </p>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Deskripsi Singkat Footer
                        </label>
                        <textarea 
                            wire:model="footer_description" 
                            rows="3"
                            class="block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:text-white text-sm"
                            placeholder="Deskripsi singkat yang muncul di footer website"
                        ></textarea>
                        <p class="mt-1.5 text-xs text-gray-500 dark:text-gray-400">
                            Teks yang muncul di bagian bawah setiap halaman.
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Teks Footer Utama
                        </label>
                        <input 
                            type="text" 
                            wire:model="footer_disclaimer" 
                            class="block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:text-white text-sm"
                            placeholder="Konten edukasi, bukan pengganti konsultasi medis"
                        >
                        <p class="mt-1.5 text-xs text-gray-500 dark:text-gray-400">
                            Peringatan atau catatan penting untuk pengunjung.
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Catatan atau Peringatan Penting
                        </label>
                        <input 
                            type="text" 
                            wire:model="footer_copyright" 
                            class="block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:text-white text-sm"
                            placeholder="Nama website/organisasi"
                        >
                        <p class="mt-1.5 text-xs text-gray-500 dark:text-gray-400">
                            Akan ditampilkan sebagai: © {{ date('Y') }} {{ $footer_copyright ?: 'VitaNote' }}
                        </p>
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
