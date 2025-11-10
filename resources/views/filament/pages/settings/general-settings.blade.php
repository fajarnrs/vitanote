<x-filament-panels::page>
    <div class="max-w-5xl">
        <form wire:submit="save" class="space-y-6">
            <!-- Identitas Website -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">
                    Identitas Website
                </h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
                    Data ini akan digunakan di header dan SEO.
                </p>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Nama Website
                        </label>
                        <input 
                            type="text" 
                            wire:model="site_name" 
                            required
                            class="block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:text-white text-sm"
                            placeholder="VitaNote"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Tagline / Slogan
                        </label>
                        <input 
                            type="text" 
                            wire:model="site_tagline" 
                            required
                            class="block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:text-white text-sm"
                            placeholder="Kunci Kesehatan Tubuhmu"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Dekcripsi Singkat (SEO)
                        </label>
                        <textarea 
                            wire:model="site_description" 
                            rows="3"
                            class="block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:text-white text-sm"
                            placeholder="Maksimal 160 karakter untuk hasil optimal di mesin pencari."
                        ></textarea>
                        <p class="mt-1.5 text-xs text-gray-500 dark:text-gray-400">
                            Maksimal 160 karakter untuk hasil optimal di mesin pencari.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Branding -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">
                    Branding
                </h3>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                        Logo Website
                    </label>
                    
                    @if($site_logo)
                        <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-600">
                            <div class="flex items-center gap-4">
                                <img src="{{ Storage::url($site_logo) }}" alt="Logo" class="h-12 w-auto object-contain">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Logo saat ini</span>
                            </div>
                        </div>
                    @endif

                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-6 text-center hover:border-primary-400 dark:hover:border-primary-500 transition-colors bg-gray-50 dark:bg-gray-900">
                        <div class="flex flex-col items-center">
                            <svg class="w-10 h-10 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <label for="logo-upload" class="cursor-pointer">
                                <span class="text-sm font-medium text-primary-600 dark:text-primary-400 hover:text-primary-700">
                                    Klik untuk upload
                                </span>
                                <input 
                                    id="logo-upload"
                                    type="file" 
                                    wire:model="site_logo" 
                                    accept="image/png,image/jpeg,image/jpg,image/svg+xml"
                                    class="hidden"
                                >
                            </label>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                PNG, JPG, SVG maks 2MB
                            </p>
                            <div wire:loading wire:target="site_logo" class="mt-2">
                                <span class="text-sm text-primary-600 dark:text-primary-400">Mengupload...</span>
                            </div>
                        </div>
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
