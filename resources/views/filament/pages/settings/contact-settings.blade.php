<x-filament-panels::page>
    <div class="max-w-5xl">
        <form wire:submit="save" class="space-y-6">
            <!-- Informasi Kontak -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">
                    Informasi Kontak
                </h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
                    Informasi kontak yang dapat dihubungi pengunjung.
                </p>

                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Email <span class="text-danger-600">*</span>
                            </label>
                            <input 
                                type="email" 
                                wire:model="contact_email" 
                                required
                                class="block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:text-white text-sm"
                                placeholder="email@example.com"
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Nomor WhatsApp/Telepon
                            </label>
                            <input 
                                type="tel" 
                                wire:model="contact_phone" 
                                class="block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:text-white text-sm"
                                placeholder="+62 812-3456-7890"
                            >
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Instagram
                            </label>
                            <input 
                                type="text" 
                                wire:model="contact_instagram" 
                                class="block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:text-white text-sm"
                                placeholder="@username"
                            >
                            <p class="mt-1.5 text-xs text-gray-500 dark:text-gray-400">
                                Username dengan tanda @
                            </p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Facebook Page
                            </label>
                            <input 
                                type="text" 
                                wire:model="contact_facebook" 
                                class="block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:text-white text-sm"
                                placeholder="facebook.com/page"
                            >
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Alamat / Institusi
                        </label>
                        <textarea 
                            wire:model="contact_address" 
                            rows="3"
                            class="block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-600 shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:text-white text-sm"
                            placeholder="Alamat lengkap institusi/organisasi"
                        ></textarea>
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
